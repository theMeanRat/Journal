<?php

namespace MyVisions\Journal\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // No mass assignment protection. We can handle it ourselves.
    protected $guarded = [];

    protected static function newFactory()
    {
        return \MyVisions\Journal\Database\Factories\ArticleFactory::new();
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}