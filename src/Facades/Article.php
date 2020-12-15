<?php

namespace MyVisions\Journal\Facades;

use Illuminate\Support\Facades\Facade;

class Article extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'article';
    }
}