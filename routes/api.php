<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\GenreController;

Route::name('genres.')->group(function () {
Route::get('/genres', [GenreController::class, 'index'])->name('index');
Route::post('/genres', [GenreController::class, 'store'])->name('store');
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('show');
Route::patch('/genres/{id}', [GenreController::class, 'update'])->name('update');
Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('destroy');
});

Route::name('movies.')->group(function () {
Route::get('/movies', [MovieController::class, 'index'])->name('index');
Route::post('/movies', [MovieController::class, 'store'])->name('store');
Route::post('/movies/{id}/publish', [MovieController::class, 'publish'])->name('publish');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('show');
Route::patch('/movies/{id}', [MovieController::class, 'update'])->name('update');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('destroy');
});