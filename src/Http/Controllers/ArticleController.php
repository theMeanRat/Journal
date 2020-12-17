<?php

namespace MyVisions\Journal\Http\Controllers;

use MyVisions\Journal\Models\Article;

class ArticleController extends Controller
{
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
            abort(403, 'Only authenticated authors can create new artilces.');
        }

        // Creating an article with the author object results in the article linked to the author.
        $author = auth()->user()->author;
        $article = $author->articles()->create($this->validateArticle());

        return redirect(route('articles.show', $article));
    }

    public function validateArticle()
    {
        $validatedAttributes = request()->validate([
            'title'         => 'required',
            'subtitle'      => 'required',
            'introduction'  => 'required',
            'content'       => 'required',
            'main_image'    => 'required',
            'slug'          => 'required'
        ]);

        $validatedAttributes['active'] = (request('active') ? true : false);

        return $validatedAttributes;
    }
}