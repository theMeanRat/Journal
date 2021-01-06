<?php

use Illuminate\Support\Facades\Route;
use MyVisions\Journal\Http\Controllers\ArticleCategoryController;
use MyVisions\Journal\Http\Controllers\ArticleController;

// Article Categories
Route::get('/articleCategories', [ArticleCategoryController::class, 'index'])->name('articleCategories.index');
Route::get('/articleCategories/{articleCategory}', [ArticleCategoryController::class, 'show'])->name('articleCategories.show');
Route::post('/articleCategories', [ArticleCategoryController::class, 'store'])->name('articleCategories.store');

// Articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');