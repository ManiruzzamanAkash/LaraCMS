<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Country::select('id')->count() === 0) {
            $countries = [
                [
                    'id'        => 1,
                    'name'      => 'United States of America',
                    'code'      => 'en',
                    'flag'      => 'en.png',
                ],
                [
                    'id'        => 2,
                    'name'      => 'Finland',
                    'code'      => 'fi',
                    'flag'      => 'fi.png',
                ],
                [
                    'id'        => 3,
                    'name'      => 'Germany',
                    'code'      => 'de',
                    'flag'      => 'de.png',
                ],
                [
                    'id'        => 4,
                    'name'      => 'Sweden',
                    'code'      => 'se',
                    'flag'      => 'se.png',
                ],
                [
                    'id'        => 5,
                    'name'      => 'Norwegian',
                    'code'      => 'no',
                    'flag'      => 'no.png',
                ],
                [
                    'id'        => 6,
                    'name'      => 'Greenland',
                    'code'      => 'dk',
                    'flag'      => 'dk.png',
                ],
                [
                    'id'        => 7,
                    'name'      => 'France',
                    'code'      => 'fr',
                    'flag'      => 'fr.png',
                ],
                [
                    'id'        => 8,
                    'name'      => 'Italy',
                    'code'      => 'it',
                    'flag'      => 'it.png',
                ],
                [
                    'id'        => 9,
                    'name'      => 'Spain',
                    'code'      => 'es',
                    'flag'      => 'es.png',
                ],
                [
                    'id'        => 10,
                    'name'      => 'Albanian',
                    'code'      => 'al',
                    'flag'      => 'al.png',
                ],
                [
                    'id'        => 11,
                    'name'      => 'Bangladesh',
                    'code'      => 'bn',
                    'flag'      => 'bn.png',
                ],
            ];
            Country::insert($countries);
        }
    }
}
