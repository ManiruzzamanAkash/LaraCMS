<?php

namespace App\View\Components;

use App\Models\LanguageConnection;
use App\Repositories\LanguageRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class LanguageList extends Component
{
    /**
     * Lanauages
     *
     * @var array
     */
    public $langs;

    /**
     * List Render Type
     *
     * @var string
     */
    public $type;

    /**
     * Except Languages ID List
     *
     * @var array $ids
     */
    public $ids;

    /**
     * Preferred Language ID
     *
     * @var int $preferred ID
     */
    public $preferred;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $ids, $preferred = null)
    {

        $languageRepository = new LanguageRepository();
        $this->type         = $type;
        $this->ids          = $ids;
        $this->preferred    = $preferred;

        if ($this->ids === "" || $ids === null) {
            $this->ids = [];
        } else if (is_numeric($ids)) {
            $this->ids = [$ids];
        } else {
            $this->ids = $ids;
        }

        if (!is_null($this->preferred)) {
            // $this->langs = $languageRepository->get_preferred_languages($this->preferred);
            $this->langs = LanguageConnection::preferred_languages(['id' => $ids]);
        } else {
            $this->langs = $languageRepository->get_languages($this->ids);
        }

        foreach ($this->langs as $key => $language) {
            $url = "";

            if ($type === "detail") {
                $url = route('language.detail', $language->code);
            } else if ($type === "info") {
                $url = url('/') . '?lang=' . $language->code;
            } else if ($type === "conversion") {
                $id1_code = $languageRepository->get_language_detail('id', $ids)->code;
                $url = route('category.index', [$id1_code, $language->code]);
            }

            $language->url = $url;
            $this->langs[$key] = $language;
        }
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.language-list');
    }
}
