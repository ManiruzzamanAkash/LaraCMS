<?php

namespace Modules\Article\Database\Seeders;

use Modules\Article\Entities\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Life Style";
        $category->slug = "life-style";
        $category->parent_category_id = null;
        $category->save();

        $category2 = new Category();
        $category2->name = "Fashion";
        $category2->slug = "fashion";
        $category2->parent_category_id = $category->id;
        $category2->save();

        $category3 = new Category();
        $category3->name = "Earning";
        $category3->slug = "earning";
        $category3->parent_category_id = null;
        $category3->save();
    }
}
