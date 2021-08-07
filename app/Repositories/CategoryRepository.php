<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
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

        return $categories;
    }
}
