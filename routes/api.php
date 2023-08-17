<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\GenreController;

Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::get('/genres/{id}', [MovieController::class, 'show'])->name('genres.show');
Route::patch('/genres/{id}', [GenreController::class, 'update'])->name('genres.update');
Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::patch('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');
