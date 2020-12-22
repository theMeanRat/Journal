<?php

namespace MyVisions\Journal\Http\Controllers;

use MyVisions\Journal\Events\ArticleWasCreated;
use MyVisions\Journal\Models\Article;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('capitalize');
    }

    public function index()
    {
        $articles = Article::all();

        return view('journal::articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('journal::articles.show', compact('article'));
    }

    public function store()
    {
        // We need to me authenticated to write and store and article.
        if (! auth()->check()) {
            abort(403, 'Only authenticated authors can create new articles.');
        }

        // Creating an article with the author object results in the article linked to the author.
        $author = auth()->user()->author;
        $article = $author->articles()->create($this->validateArticle());

        // Fire the event that an article was created
        event(new ArticleWasCreated($article));

        return redirect(route('articles.show', $article));
    }

    public function validateArticle()
    {
        $validatedAttributes = request()->validate([
            'title'               => 'required',
            'subtitle'            => 'required',
            'introduction'        => 'required',
            'content'             => 'required',
            'main_image'          => 'required',
            'article_category_id' => 'required',
            'slug'                => 'required'
        ]);

        $validatedAttributes['active'] = (request('active') ? true : false);

        return $validatedAttributes;
    }
}