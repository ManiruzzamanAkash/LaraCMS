<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Article\Database\Seeders\ArticleDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolePermissionsTableSeeder::class,
            AdminTableSeeder::class,
            BlogTableSeeder::class,
            CountryTableSeeder::class,
            LanguageTableSeeder::class,

            // Seed Databases of Article Module
            ArticleDatabaseSeeder::class
        ]);
    }
}
