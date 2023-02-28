<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/movies', [MovieController::class, 'getAllMovieList'])->name('movies.index');

Route::delete('/{movieId}/delete', [MovieController::class, 'destroy']);

Route::post('/movie/store', [MovieController::class, 'store'])->name('movie.store');

Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
