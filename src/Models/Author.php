<?php

namespace MyVisions\Journal\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // No mass assignment protection. We can handle it ourselves.
    protected $guarded = [];

    protected static function newFactory()
    {
        return \MyVisions\Journal\Database\Factories\AuthorFactory::new();
    }

    public function user()
    {
        return $this->morphTo();
    }
}