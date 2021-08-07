<?php

namespace Modules\Article\Database\Seeders;

use Modules\Article\Entities\Page;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new Page();
        $page->title = "About Us";
        $page->slug = "about-us";
        $page->description = "<div>Welcome to our about us page <br /></div>";
        $page->save();

        $page = new Page();
        $page->title = "Contact Us";
        $page->slug = "contact-us";
        $page->description = "<div>Welcome to our contact us page <br /></div>";
        $page->save();
    }
}
