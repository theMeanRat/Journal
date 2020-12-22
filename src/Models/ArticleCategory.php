<?php

namespace MyVisions\Journal\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    // No mass assignment protection. We can handle it ourselves.
    protected $guarded = [];

    protected static function newFactory()
    {
        return \MyVisions\Journal\Database\Factories\ArticleCategoryFactory::new();
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}