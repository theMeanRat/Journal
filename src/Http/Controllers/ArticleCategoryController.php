<?php

namespace MyVisions\Journal\Http\Controllers;

use MyVisions\Journal\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('capitalize');
    }

    public function index()
    {
        $articleCategories = ArticleCategory::all();

        return view('journal::articleCategories.index', compact('articleCategories'));
    }

    public function show(ArticleCategory $articleCategory)
    {
        return view('journal::articleCategories.show', compact('articleCategory'));
    }

    public function update(ArticleCategory $articleCategory)
    {

    }

    public function store(Request $request)
    {
        // We need to me authenticated to write and store and article.
        if (! auth()->check()) {
            abort(403, 'Only authenticated authors can create new article categories.');
        }

        // Creating an article with the author object results in the article linked to the author.
        $articleCategory = ArticleCategory::create($this->validateArticleCategory($request));

        return redirect(route('articleCategories.show', $articleCategory));
    }

    public function validateArticleCategory($request)
    {
        return $request->validate([
            'name'         => 'required',
        ]);
    }
}