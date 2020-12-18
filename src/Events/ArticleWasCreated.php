<?php

namespace MyVisions\Journal\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use MyVisions\Journal\Models\Article;

class ArticleWasCreated
{
    use Dispatchable, SerializesModels;

    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
}