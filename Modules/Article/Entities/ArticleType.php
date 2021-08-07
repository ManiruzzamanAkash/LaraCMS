<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->hasMany(Page::class, 'article_type_id', 'id');
    }
}
