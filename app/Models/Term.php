<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Term extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'category', // Could be database ID or boolean
        'country', // Could be database ID or boolean
        'language', // Could be database ID or boolean
        'menu', // Boolean
        'footer', // Boolean
        'content', // Boolean
        'page_id', // If this is for any page

        'key', // key as slug

        // Translated values for different languages
        'en',
        'fi',
        'se',
        'no',
        'dk',
        'de',
        'it',
        'fr',
        'es',
        'pl',
        'al',
        'ru',
        'ar',
        'bn',
        'so',
        'ku',
        'vi',
        'cn',
        'sr',
        'tr',
        'ja',
        'uk',
        'ro',
        'nl',
        'el',
        'ind',
        'th',
        'pt',
        'lt',
        'fa',
        'hi',
        'order_nr',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get term detail by key / column
     *
     * @param string $code
     * @param string $keyValue
     * @param string $column_name, default = key
     *
     * @return Object term object
     */
    public static function singleTerm($code, $keyValue, $column_name = 'key')
    {
        $term = DB::table('terms')
            ->where($column_name, $keyValue)
            ->select(
                "en as default",
                "$code as name"
            )
            ->limit(1)
            ->first();

        if (!is_null($term)) {
            if (!empty($term->name))
                return trim($term->name);
            else
                return trim($term->default);
        }

        return trim($keyValue);
    }
}
