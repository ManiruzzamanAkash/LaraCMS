<?php

namespace App\Repositories;

use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class LanguageRepository
{

    /**
     * Get Languages List
     *
     * @return Array
     */
    public function get_languages($except_ids = [])
    {
        $query = DB::table('languages')
            ->select(
                'id',
                'name',
                'code',
                DB::raw('UPPER(code) as code_upper_case'),
                'country',
                DB::raw('CONCAT("' . asset('public/img/flags/') . '/", flag) AS flag')
            )
            ->orderBy('code', 'asc');

        if (!is_null($except_ids) && count($except_ids) > 0) {
            $query->whereNotIn('id', $except_ids);
        }

        $data = $query->get();

        return $data;
    }

    /**
     * Get Preferred Languages List
     *
     * @param int $language_id
     *
     * @return array
     */
    public function get_preferred_languages($language_id)
    {
        $query = DB::table('language_preferreds')
            ->join('languages', 'languages.id', '=', 'language_preferreds.preferred_language_id')
            ->select(
                'languages.id',
                'languages.name',
                'languages.code',
                DB::raw('UPPER(languages.code) as code_upper_case'),
                'languages.country',
                DB::raw('CONCAT("' . asset('public/img/flags/') . '/", languages.flag) AS flag')
            )
            ->where('language_preferreds.language_id', $language_id)
            ->orderBy('languages.name', 'asc');

        $data = $query->get();

        return $data;
    }


    /**
     * Get Language Detail By ID/Code/ Other SQL table's column
     *
     * @param string $column_name
     *
     * @param string $value
     *
     * @return Object $language Object
     */
    public function get_language_detail($column_name = 'id', $value)
    {

        if ($column_name === 'id') {
            $language = Language::find($value);
        } else {
            $language = Language::where($column_name, $value)->limit(1)->first();
        }

        return $language;
    }
}
