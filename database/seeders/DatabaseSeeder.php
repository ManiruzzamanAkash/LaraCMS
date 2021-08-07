<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            CategoryTableSeeder::class,
            PageTableSeeder::class,
            BlogTableSeeder::class,
            CountryTableSeeder::class,
            LanguageTableSeeder::class
        ]);
    }
}
