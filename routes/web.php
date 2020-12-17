<?php

use Illuminate\Support\Facades\Route;
use MyVisions\Journal\Http\Controllers\ArticleController;

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/posts', [ArticleController::class, 'store'])->name('articles.store');