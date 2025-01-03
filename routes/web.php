<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;




Route::get('/', function () {
    return view('landingpage');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/tvshow', function () {
    return view('tvshow');
});

Route::get('/movie', function () {
    return view('movie');
});

Route::get('/movie', [MovieController::class, 'show']);

Route::get('/', [MovieController::class, 'elpi']);

Route::get('/login', [MovieController::class, 'lofo']); 
Route::post('/login', [MovieController::class, 'login'])->name('login');

Route::get('/executive', function () {
    return view('executive');
})->name('executive');

Route::get('/producer', function () {
    return view('producer');})->name('producer');

Route::get('/tvshow', [MovieController::class, 'getMoviesByGenre'])->name('tvshow.byGenre');

Route::get('/tvshow', [MovieController::class, 'tvshow'])->name('tvshow.tvshow');

Route::get('/executive', [MovieController::class, 'akt'])->name('executive');

Route::get('/movie', [MovieController::class, 'movee'])->name('movies.movee');

Route::get('/producer', [MovieController::class, 'index'])->name('producer.index');

Route::resource('producer', MovieController::class);
