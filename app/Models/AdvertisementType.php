<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdvertisementType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function advertisements()
    {
        return $this->belongsToMany(Advertisement::class, 'advertisement_types_selected', 'advertisement_type_id', 'advertisement_id');
    }

    public static function getTypesByParent( $parent_name )
    {
        return AdvertisementType::where('parent', $parent_name )->get();
    }


    public static function checkAdvertisementHasType($type_id, $advertisement_id)
    {
        return DB::table('advertisement_types_selected')
            ->where('advertisement_type_id', $type_id)
            ->where('advertisement_id', $advertisement_id)
            ->exists();
    }
}
