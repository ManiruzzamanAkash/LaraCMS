<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LanguageConnection extends Model
{
    use HasFactory;

    public $timestamp = false;

    public static function get_connections()
    {
        $connections = DB::table('language_connections')->get();

        $full_collections = [];

        foreach ($connections as $con) {
            $full_collections[$con->lang1][$con->lang2] = $con->total;
        }

        $languages = Language::orderBy('code', 'asc')->get();
        foreach ($languages as $lang1) {
            foreach ($languages as $lang2) {
                if (empty($full_collections[$lang1->id][$lang2->id])) {
                    $full_collections[$lang1->id][$lang2->id] = null;
                }
            }
        }
        return $full_collections;
    }

    public static function preferred_languages($args = [])
    {
        $id = null;
        if (isset($args['id'])) {
            $id = $args['id'];
        } elseif (isset($args['code'])) {
            $language = Language::where('code', $args['code'])->first();

            if (empty($language)){
                return [];
            } else {
                $id = $language->id;
            }
        } else {
            return [];
        }

        $connections = DB::table('language_connections')
            ->rightJoin('languages', 'languages.id', '=', 'language_connections.lang2')
            ->where('lang1', $id)
            ->select(
                'languages.id',
                'languages.name',
                'languages.code',
                DB::raw('UPPER(languages.code) as code_upper_case'),
                'languages.country',
                DB::raw('CONCAT("' . asset('public/img/flags/') . '/", languages.flag) AS flag')
            )
            ->orderBy('language_connections.total', 'desc')
            ->groupBy('languages.id')
            ->get();
        return $connections;
    }
}
