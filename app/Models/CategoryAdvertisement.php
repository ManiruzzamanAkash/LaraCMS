<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAdvertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'advertisement_id'
    ];

}
