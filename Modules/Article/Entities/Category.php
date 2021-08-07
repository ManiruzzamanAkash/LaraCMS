<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'banner_image', 'logo_image', 'description', 'meta_description', 'parent_category_id', 'status', 'enable_bg', 'bg_color', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function pages()
    {
        return $this->hasMany(Page::class)->where('status', 1);
    }

    public function getChildCategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id', 'id')->select('id', 'name', 'slug', 'banner_image');
    }

    /**
     * getCategories
     *
     * @param integer $status
     * @param string $deleted_at
     * @param integer $parent_category_id
     * @return void
     */
    public static function getCategories($status = 1, $deleted_at = null, $parent_category_id = null)
    {
        $categories = Category::where('parent_category_id', $parent_category_id)
            ->where('status', $status)
            ->where('deleted_at', $deleted_at)
            ->select('id', 'name', 'slug', 'banner_image', 'logo_image')
            ->orderBy('priority', 'asc')
            ->get();
        return $categories;
    }

    /**
     * printCategory
     *
     * Prints the category on view directly
     *
     * @param integer $category_id
     * @param integer $layer
     * @return void
     */
    public static function printCategory($category_id = null, $layer = 3)
    {
        $html = "";
        $parentCategories = Category::select('id', 'name')->where('parent_category_id', null)->get();

        foreach ($parentCategories as $parent) {
            if ($category_id === $parent->id)    $selected = " selected";
            else  $selected = "";
            $html .= "<option value='" . $parent->id . "'" . $selected . ">" . $parent->name . "</option>";

            // Get Sub Categories
            $childCategories = Category::select('id', 'name')->where('parent_category_id', $parent->id)->get();
            foreach ($childCategories as $child) {


                if ($category_id === $child->id)    $selected = " selected";
                else  $selected = "";
                $html .= "<option value='" . $child->id . "' " . $selected . ">&nbsp;&nbsp;&nbsp;&nbsp;-- " . $child->name . "</option>";

                if ($layer === 3) {
                    // Get Sub Categories 2
                    $childCategories2 = Category::select('id', 'name')->where('parent_category_id', $child->id)->get();
                    foreach ($childCategories2 as $child2) {
                        if ($category_id === $child2->id)    $selected = " selected";
                        else  $selected = "";
                        $html .= "<option value='" . $child2->id . "' " . $selected . ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- " . $child2->name . "</option>";
                    }
                }
            }
        }
        return $html;
    }
}
