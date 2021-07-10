<?php

namespace Database\Seeders;

use App\Models\AdvertisementType;
use Illuminate\Database\Seeder;

class AdvertisementTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (AdvertisementType::select('id')->count() === 0) {
            $types = [
                [
                    'name'   => "Biz Ads 1",
                    'slug'   => "biz1",
                    'parent' => "Home"
                ],
                [
                    'name'   => "Biz Ads 2",
                    'slug'   => "biz2",
                    'parent' => "Home"
                ],
                [
                    'name'   => "Biz Ads 3",
                    'slug'   => "biz3",
                    'parent' => "Home"
                ],
                [
                    'name'   => "Offer Ads 1",
                    'slug'   => "offer1",
                    'parent' => "Home"
                ],
                [
                    'name'   => "Offer Ads 2",
                    'slug'   => "offer2",
                    'parent' => "Home"
                ],
                [
                    'name'   => "Sponsor Ads 1",
                    'slug'   => "sponsor1",
                    'parent' => "Category"
                ],
                [
                    'name'   => "Sponsor Ads 2",
                    'slug'   => "sponsor2",
                    'parent' => "Category"
                ],
                [
                    'name'   => "Sponsor Ads 3",
                    'slug'   => "sponsor3",
                    'parent' => "Category"
                ],
                [
                    'name'   => "Sponsor Ads 4",
                    'slug'   => "sponsor4",
                    'parent' => "Category"
                ],
                [
                    'name'   => "Gold Ads",
                    'slug'   => "gold",
                    'parent' => "Chapter"
                ],
                [
                    'name'   => "Silver Ads",
                    'slug'   => "silver",
                    'parent' => "Chapter"
                ],
                [
                    'name'   => "Bronze Ads",
                    'slug'   => "bronze",
                    'parent' => "Chapter"
                ],
                [
                    'name'   => "Offer Chapter Ads",
                    'slug'   => "offer_chapter",
                    'parent' => "Chapter"
                ],
                [
                    'name'   => "Why DM Ads 1",
                    'slug'   => "dm1",
                    'parent' => "Why DM"
                ],
                [
                    'name'   => "Why DM Ads 2",
                    'slug'   => "dm2",
                    'parent' => "Why DM"
                ],
                [
                    'name'   => "Why DM Ads 3",
                    'slug'   => "dm3",
                    'parent' => "Why DM"
                ],
                [
                    'name'   => "Why DM Ads 4",
                    'slug'   => "dm4",
                    'parent' => "Why DM"
                ],
                [
                    'name'   => "Learn 1000 words 1 Ads",
                    'slug'   => "1000_1",
                    'parent' => "Learn 1000 Words"
                ],
                [
                    'name'   => "Learn 1000 words 2 Ads",
                    'slug'   => "1000_2",
                    'parent' => "Learn 1000 Words"
                ],

                [
                    'name'   => "Blog Ads 1",
                    'slug'   => "blog1",
                    'parent' => "Blog"
                ],
                [
                    'name'   => "Blog Ads 2",
                    'slug'   => "blog2",
                    'parent' => "Blog"
                ],
                [
                    'name'   => "Blog Ads 3",
                    'slug'   => "blog3",
                    'parent' => "Blog"
                ],
                [
                    'name'   => "Blog Ads 4",
                    'slug'   => "blog4",
                    'parent' => "Blog"
                ],
                [
                    'name'   => "Marketing Ads 1",
                    'slug'   => "marketing1",
                    'parent' => "Marketing"
                ],
                [
                    'name'   => "Marketing Ads 2",
                    'slug'   => "marketing2",
                    'parent' => "Marketing"
                ],
                [
                    'name'   => "Marketing Ads 3",
                    'slug'   => "marketing3",
                    'parent' => "Marketing"
                ],
                [
                    'name'   => "Marketing Ads 4",
                    'slug'   => "marketing4",
                    'parent' => "Marketing"
                ],
                [
                    'name'   => "Statistics Ads",
                    'slug'   => "statistics",
                    'parent' => "Info"
                ],
                [
                    'name'   => "Media Ads",
                    'slug'   => "media",
                    'parent' => "Info"
                ]
            ];
            AdvertisementType::insert($types);
        }
    }
}
