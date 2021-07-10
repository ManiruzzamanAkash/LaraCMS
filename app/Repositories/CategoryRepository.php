<?php

namespace App\Repositories;

use App\Helpers\ArrayHelper;
use App\Models\Category;
use App\Models\Sentence;
use App\Models\Word;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public $languageRepository;

    public function __construct($languageRepository = null)
    {
        $this->languageRepository = $languageRepository;
    }
    /**
     * Get Category Detail By ID/Code/ Other SQL table's column
     *
     * @param string $column_name
     *
     * @param string $value
     *
     * @return Object $language Object
     */
    public function get_category_detail($column_name = 'id', $value)
    {

        if ($column_name === 'id') {
            $term = Category::find($value);
        } else {
            $term = Category::where($column_name, $value)->limit(1)->first();
        }

        return $term;
    }

    /**
     * Get Categories By Parent ID
     *
     * @param int $parent_id
     *
     * @return array
     */
    public function get_categories_by_parent_id($parent_id)
    {
        return Category::where('status', 1)
            ->where('parent_category_id', $parent_id)
            ->get()
            ->toArray();
    }

    /**
     * Get Categories Detail By Parent ID
     *
     * @param int $parent_id
     *
     * @return array
     */
    public function get_categories_detail_by_parent_id($parent_id)
    {
        $categories = Category::where('categories.status', 1)
            ->where('parent_category_id', $parent_id)
            ->select(
                'categories.id',
                'categories.name',
                'categories.slug',
                'categories.bg_color',
                'categories.text_color',
            )
            ->groupBy('categories.id')
            ->orderBy('categories.priority', 'asc')
            ->get()
            ->toArray();
        $words = DB::table('words')->select(
            DB::raw("COUNT('id') as total_words"),
            'chapter_id'
        )
            ->groupBy('chapter_id')
            ->get();

        $sentences = DB::table('sentences')->select(
            DB::raw("COUNT('id') as total_sentences"),
            'chapter_id'
        )
            ->groupBy('chapter_id')
            ->where('is_section', 0)
            ->get();

        foreach ($categories as $key => $parent_category) {
            // Now add total counts
            $words_count_data = ArrayHelper::objArraySearch($words, 'chapter_id', $parent_category['id']);
            $categories[$key]['total_words'] = is_null($words_count_data) ? 0 : $words_count_data->total_words;

            $sentence_count_data = ArrayHelper::objArraySearch($sentences, 'chapter_id', $parent_category['id']);
            $categories[$key]['total_sentences'] = is_null($sentence_count_data) ? 0 : $sentence_count_data->total_sentences;
        }

        return $categories;
    }

    /**
     * Get Categories By Two Languages
     *
     * @param string $language1_code
     * @param string $language2_code
     *
     * @return array category lists with it's childs and translations
     */
    public function get_categories_by_languages($language1_code, $language2_code)
    {

        $category_terms = $this->get_category_terms($language1_code, $language2_code);

        $categories = $this->get_categories_detail_by_parent_id(null);
        foreach ($categories as $key => $parent_category) {

            // Now add the two data name1, name2 from the $category_terms
            $data = ArrayHelper::objArraySearch($category_terms, 'category_id', $parent_category['id']);

            // Set to fallback default language of English
            $data->name1 = is_null($data->name1) ? $data->default : $data->name1;
            $data->name2 = is_null($data->name2) ? $data->default : $data->name2;
            $categories[$key]['translation'] = $data;

            // Find the childs and do same thing in the childs
            $categories[$key]['childs'] = $this->get_categories_detail_by_parent_id($parent_category['id']);

            foreach ($categories[$key]['childs'] as $key2 => $child_category) {
                $categories[$key]['childs'][$key2] = $child_category;
                $data2 = ArrayHelper::objArraySearch($category_terms, 'category_id', $child_category['id']);

                // Set to fallback default language of English
                $data2->name1 = is_null($data2->name1) ? $data2->default : $data2->name1;
                $data2->name2 = is_null($data2->name2) ? $data2->default : $data2->name2;
                $categories[$key]['childs'][$key2]['translation'] = $data2;
            }
        }

        // dd($categories);
        return $categories;
    }

    /**
     * Get Category Terms
     *
     * @param int $language1_code
     * @param int $language2_code
     *
     * @return array
     */
    public function get_category_terms($language1_code, $language2_code)
    {
        return DB::table('terms')
            ->select(
                'category as category_id',
                'en as default',
                "$language1_code as name1",
                "$language2_code as name2",
            )
            ->where('category', '!=', null)
            ->get()
            ->toArray();
    }

    public function get_related_categories(Category $category)
    {
        $categories = [];
        return $categories;

        $categories = DB::table('categories')
        ->orWhere('parent_category_id', $category->parent_category_id)
        ->get();
    }
}
