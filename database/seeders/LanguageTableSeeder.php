<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Language::select('id')->count() === 0) {

            $languages = [
                [
                    'id'            => 1,
                    'name'          => "English",
                    'short_name'    => "Eng",
                    'country_id'    => 1,
                    'country'       => 'United States of America',
                    'code'          => 'en',
                    'flag'          => 'en.png',
                ],
                [
                    'id'            => 2,
                    'name'          => "Finnish",
                    'short_name'    => "Finnish",
                    'country_id'    => 2,
                    'country'       => 'Finland',
                    'code'          => 'fi',
                    'flag'          => 'fi.png',
                ],
                [
                    'id'            => 3,
                    'name'          => "German",
                    'short_name'    => "Deutsch",
                    'country_id'    => 3,
                    'country'       => 'Germany',
                    'code'          => 'de',
                    'flag'          => 'de.png',
                ],
                [
                    'id'            => 4,
                    'name'          => "Svenska",
                    'short_name'    => "Svenska",
                    'country_id'    => 4,
                    'country'       => 'Sweden',
                    'code'          => 'se',
                    'flag'          => 'se.png',
                ],
                [
                    'id'            => 5,
                    'name'          => "Norsk",
                    'short_name'    => "Norsk",
                    'country_id'    => 5,
                    'country'       => 'Norwegian',
                    'code'          => 'no',
                    'flag'          => 'no.png',
                ],
                [
                    'id'            => 6,
                    'name'          => "Dansk",
                    'short_name'    => "Dansk",
                    'country_id'    => 6,
                    'country'       => 'Greenland',
                    'code'          => 'dk',
                    'flag'          => 'dk.png',
                ],
                [
                    'id'            => 7,
                    'name'          => "Francais",
                    'short_name'    => "Francais",
                    'country_id'    => 7,
                    'country'       => 'France',
                    'code'          => 'fr',
                    'flag'          => 'fr.png',
                ],
                [
                    'id'            => 8,
                    'name'          => "English",
                    'short_name'    => "Eng",
                    'country_id'    => 8,
                    'country'       => 'Italy',
                    'code'          => 'it',
                    'flag'          => 'it.png',
                ],
                [
                    'id'            => 9,
                    'name'          => "Italiano",
                    'short_name'    => "Italiano",
                    'country_id'    => 9,
                    'country'       => 'Spain',
                    'code'          => 'es',
                    'flag'          => 'es.png',
                ],
                [
                    'id'            => 10,
                    'name'          => "Spannish",
                    'short_name'    => "Espanol",
                    'country_id'    => 10,
                    'country'       => 'Albanian',
                    'code'          => 'al',
                    'flag'          => 'al.png',
                ],
                [
                    'id'            => 11,
                    'name'          => "Bangla",
                    'short_name'    => "Bangla",
                    'country_id'    => 11,
                    'country'       => 'Bangladesh',
                    'code'          => 'bn',
                    'flag'          => 'bn.png',
                ],
            ];
            Language::insert($languages);
        }
    }
}
