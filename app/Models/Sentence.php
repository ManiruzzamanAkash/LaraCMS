<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sentence extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'category',
        'chapter_id',
        'chapter',
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
        'is_section',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
