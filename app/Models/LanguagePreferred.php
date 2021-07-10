<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguagePreferred extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'preferred_language_id'
    ];
}
