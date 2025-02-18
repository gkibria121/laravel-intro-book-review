<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('books.index'));
Route::resource('books.reviews', ReviewController::class)->only(['create', 'update']);
Route::resource('/books', BookController::class);


Route::fallback(function () {
    return view('errors.not-found');
});
