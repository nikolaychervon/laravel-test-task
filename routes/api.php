<?php

use App\Http\Controllers\API\AuthorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.token')->group(function () {

    Route::apiResource('authors', AuthorController::class);
});
