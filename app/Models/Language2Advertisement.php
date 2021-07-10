<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language2Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'advertisement_id',
    ];
}
