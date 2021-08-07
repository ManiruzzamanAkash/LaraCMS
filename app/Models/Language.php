<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'code',
        'flag',
        'banner',
        'banner_caption',
        'country',
        'country_id'
    ];

    public $timestamps = false;
}
