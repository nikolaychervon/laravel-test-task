<?php

use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.token')->group(function () {

    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('books', BookController::class);

    Route::get('authors/{author}/books', [BookController::class, 'indexByAuthor']);
});
