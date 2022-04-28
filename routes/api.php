<?php

use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.token')->group(function () {

    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('books', BookController::class);

    // Получение списка книг для авторов
    Route::get('authors/{author}/books', [BookController::class, 'indexByAuthor']);

    // Дополнительный функционал
    Route::get('authors/{author}/books/{book}', [BookController::class, 'showByAuthor']);
    Route::get('books/{book}/authors/{author}', [AuthorController::class, 'showForBook']);
});
