<?php

namespace MyVisions\Journal\Traits;

use MyVisions\Journal\Models\Author;

trait HasAuthor
{
    public function author()
    {
        return $this->morphOne(Author::class, 'user');
    }
}