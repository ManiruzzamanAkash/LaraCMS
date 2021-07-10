<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Advertisement extends Model
{
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'language_advertisements', 'advertisement_id', 'language_id');
    }

    public function languages2()
    {
        return $this->belongsToMany(Language::class, 'language2_advertisements', 'advertisement_id', 'language_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_advertisements', 'advertisement_id', 'category_id');
    }

    public function types()
    {
        return $this->belongsToMany(AdvertisementType::class, 'advertisement_types_selected', 'advertisement_id', 'advertisement_type_id');
    }

    /**
     * Get Advertisement detail
     *
     * @since 1.0.0
     *
     * @param array $args
     *
     * @return object|string|null
     */
    public static function getAdvertisementDetail($args = [])
    {
        $advertisement = null;

        $defaults = [
            'language_code1'        => null,
            'language_code2'        => null,
            'type'                  => null,
            'chapter_id'            => null,
            'is_full_advertisement' => false
        ];

        $args = array_merge($defaults, $args);

        // Find Language
        $language  = null;
        $language2 = null;

        if (! empty($args['language_code1'])) {
            $language = DB::table('languages')->select('id')->where('code', $args['language_code1'])->first();
        }

        if (! empty($args['language_code2'])) {
            $language2 = DB::table('languages')->select('id')->where('code', $args['language_code2'])->first();
        }

        // Find Type
        $type = null;
        if (! empty($args['type'])) {
            $type = DB::table('advertisement_types')->select('id')->where('slug', $args['type'])->first();
        }

        // If only first language is provided
        if (! empty($language) && ! empty($type)) {
            $advertisement = DB::table('advertisements as a')
                ->join('advertisement_types_selected as ats', 'a.id', '=', 'ats.advertisement_id')
                ->join('language_advertisements as la', 'a.id', '=', 'la.advertisement_id')
                ->where('ats.advertisement_type_id', $type->id)
                ->where('la.language_id', $language->id)
                ->where('a.deleted_at', null)
                ->first();
        }


        // If both first and second language is provided
        if (! empty($language) && ! empty($language2) && ! empty($type)) {
            $advertisement = DB::table('advertisements as a')
                ->join('advertisement_types_selected as ats', 'a.id', '=', 'ats.advertisement_id')
                ->join('language_advertisements as la', 'a.id', '=', 'la.advertisement_id')
                ->join('language2_advertisements as la2', 'a.id', '=', 'la2.advertisement_id')
                ->where('ats.advertisement_type_id', $type->id)
                ->where('la.language_id', $language->id)
                ->where('la2.language_id', $language2->id)
                ->where('a.deleted_at', null)
                ->first();
        }

        // Find Advertisement by Language & Chapter & Type
        if (! empty($args['chapter_id']) && ! empty($language) && ! empty($type)) {
            $advertisement = DB::table('advertisements as a')
                ->join('advertisement_types_selected as ats', 'a.id', '=', 'ats.advertisement_id')
                ->join('language_advertisements as la', 'a.id', '=', 'la.advertisement_id')
                ->join('category_advertisements as ca', 'a.id', '=', 'ca.advertisement_id')
                ->where('ats.advertisement_type_id', $type->id)
                ->where('la.language_id', $language->id)
                ->where('ca.category_id', $args['chapter_id'])
                ->where('a.deleted_at', null)
                ->first();
        }

        // If both second languages, chapter and type provided
        if (! empty($args['chapter_id']) && ! empty($language) && ! empty($language2) && ! empty($type)) {
            $advertisement = DB::table('advertisements as a')
                ->join('advertisement_types_selected as ats', 'a.id', '=', 'ats.advertisement_id')
                ->join('language_advertisements as la', 'a.id', '=', 'la.advertisement_id')
                ->join('language2_advertisements as la2', 'a.id', '=', 'la2.advertisement_id')
                ->join('category_advertisements as ca', 'a.id', '=', 'ca.advertisement_id')
                ->where('ats.advertisement_type_id', $type->id)
                ->where('la.language_id', $language->id)
                ->where('la2.language_id', $language2->id)
                ->where('ca.category_id', $args['chapter_id'])
                ->where('a.deleted_at', null)
                ->first();
        }

        if (! empty($advertisement)) {
            if ($args['is_full_advertisement']) {
                return $advertisement;
            }

            return $advertisement->description;
        }

        return null;
    }
}
