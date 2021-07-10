<?php

namespace App\Http\Controllers\Backend\Modules\Translation;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\SentenceRepository;
use App\Repositories\TermRepository;
use App\Repositories\WordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranslationsController extends Controller
{

    public $user;
    public $languageRepository;
    public $categoryRepository;
    public $wordRepository;
    public $sentenceRepository;
    public $termRepository;

    public function __construct(LanguageRepository $languageRepository, CategoryRepository $categoryRepository, WordRepository $wordRepository, SentenceRepository $sentenceRepository, TermRepository $termRepository)
    {
        $this->languageRepository   = $languageRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->wordRepository       = $wordRepository;
        $this->sentenceRepository   = $sentenceRepository;
        $this->termRepository       = $termRepository;

        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    /**
     * Translation Create Page
     *
     * @return view
     */
    public function create()
    {
        if (is_null($this->user) || ! $this->user->can('translation.create')) {
            $message = 'You are not allowed to translate word/sentence !';
            return view('errors.403', compact('message'));
        }

        $categories = Category::printCategory(null, 3);
        return view('backend.pages.translations.create', compact('categories'));
    }

    /**
     * Store Language Translation
     *
     * @param Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || ! $this->user->can('translation.create')) {
            $message = 'You are not allowed to translate word/sentence !';
            return view('errors.403', compact('message'));
        }

        // Store now by checking permission and type
        $request->validate([
            'category_id'  => 'required',
            'type'         => 'required',
            'translations' => 'required'
        ]);

        // Check if all permission or specific language permission
        $user = Auth::user();

        if ($this->user->can('translation.all_language')) {
            $language_id = $request->language_id;
        } else {
            $language_id = $user->language_id;
        }

        if( ! empty( $language_id ) ) {
            $detail1 = $this->languageRepository->get_language_detail('code', 'en');
            $detail2 = $this->languageRepository->get_language_detail('id', $language_id);
            $chapter = $this->categoryRepository->get_category_detail('id', $request->category_id);

            if (!is_null($detail1) && !is_null($detail2) && !is_null($chapter)) {
                $data = $request->translations;

                if(($request->type === "sentence") && $user->can('translation.sentence')){
                    $this->sentenceRepository->update_sentence($detail1->code, $detail2->code, $data);
                }else if(($request->type === "word") && $user->can('translation.word')){
                    $this->wordRepository->update_word($detail1->code, $detail2->code, $data);
                }else if(($request->type === "term") && $user->can('translation.term')){
                    $this->termRepository->update_term($detail1->code, $detail2->code, $data);
                }

                session()->flash('success', 'Translation Updated !');
            }else {
                session()->flash( 'error', 'Please select a chapter or specific language' );
            }
        } else {
            session()->flash( 'error', 'Please select a language' );
        }

        return back();
    }

}
