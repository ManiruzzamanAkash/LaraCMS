<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Repositories\CategoryRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\SentenceRepository;
use App\Repositories\TermRepository;
use App\Repositories\WordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranslationsAPIController extends Controller
{

    public $languageRepository;
    public $categoryRepository;
    public $wordRepository;
    public $sentenceRepository;
    public $termRepository;

    function __construct(LanguageRepository $languageRepository, CategoryRepository $categoryRepository, WordRepository $wordRepository, SentenceRepository $sentenceRepository, TermRepository $termRepository)
    {
        $this->languageRepository = $languageRepository;
        $this->categoryRepository = $categoryRepository;
        $this->wordRepository     = $wordRepository;
        $this->sentenceRepository = $sentenceRepository;
        $this->termRepository     = $termRepository;
    }

    /**
     * Get Translation API Data
     *
     * @param Request $request
     *
     * @return void
     */
    public function getTranslationDataByChapter(Request $request)
    {
        $request->validate([
            'chapter_id' => 'required',
            'type'       => 'required'
        ]);

        $user        = Auth::user();
        $language_id = $request->language_id;

        if (!empty($language_id)) {
            $detail1 = $this->languageRepository->get_language_detail('code', 'en');
            $detail2 = $this->languageRepository->get_language_detail('id', $language_id);
            $chapter = $this->categoryRepository->get_category_detail('id', $request->chapter_id);

            if (!is_null($detail1) && !is_null($detail2) && !is_null($chapter)) {
                $type      = $request->type;

                if ($type === "word") {
                    $words     = $this->wordRepository->get_word_list($detail1->code, $detail2->code, $chapter->id);
                    return view('backend.pages.translations.partials.translation-list', compact('words', 'type', 'detail1', 'detail2'));
                } else if ($type === "sentence") {
                    $sentences = $this->sentenceRepository->get_sentence_list($detail1->code, $detail2->code, $chapter->id);
                    return view('backend.pages.translations.partials.translation-list', compact('sentences', 'type', 'detail1', 'detail2'));
                } else if ($type === "term") {
                    $terms = $this->termRepository->get_term_list($detail1->code, $detail2->code);
                    return view('backend.pages.translations.partials.translation-list', compact('terms', 'type', 'detail1', 'detail2'));
                }
            }
        } else {
            session()->flash('error', 'Please select a language');
            return null;
        }
        return null;

        // if (!is_null($detail1) && !is_null($detail2) && !is_null($chapter)) {
        //     $words              = $this->wordRepository->get_word_list($code1, $code2, $chapter->id);
        //     $sentences          = $this->sentenceRepository->get_sentence_list($code1, $code2, $chapter->id);
        //     // $related_categories = $this->categoryRepository->get_related_categories($chapter);

        //     return view('frontend.pages.categories.translation', compact('detail1', 'detail2', 'chapter', 'words', 'sentences'));
        // }

    }

    public function getTranslationDataForPage(Request $request)
    {
        $request->validate([
            'language_id' => 'required',
            'article'     => 'required'
        ]);

        $user        = Auth::user();
        $language_id = $request->language_id;
        $page_id  = $request->article;

        if (!empty($language_id)) {
            $detail1 = $this->languageRepository->get_language_detail('code', 'en');
            $detail2 = $this->languageRepository->get_language_detail('id', $language_id);

            $page = Page::find($page_id);

            if (!is_null($detail1) && !is_null($detail2) && !is_null($page_id)) {
                $page_title_data            = $this->termRepository->get_term_detail_by_key($detail1->code, $detail2->code, 'pt' . $page_id);
                $page_description_data      = $this->termRepository->get_term_detail_by_key($detail1->code, $detail2->code, 'pd' . $page_id);
                $page_meta_description_data = $this->termRepository->get_term_detail_by_key($detail1->code, $detail2->code, 'pmd' . $page_id);
                $term = [
                    'id'               => $page->id,
                    'title'            => $page_title_data ? (!empty($page_title_data->name2 ) ? $page_title_data->name2 : $page_title_data->default) : '',
                    'description'      => $page_description_data ? (!empty($page_description_data->name2 ) ? $page_description_data->name2 : $page_description_data->default) : '',
                    'meta_description' => $page_meta_description_data ? (!empty($page_meta_description_data->name2 ) ? $page_meta_description_data->name2 : $page_meta_description_data->default) : '',
                ];
                return $term;
            }
        } else {
            session()->flash('error', 'Please select a language');
            return null;
        }
        return null;
    }
}
