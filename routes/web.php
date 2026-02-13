<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

Route::get('/', function () {
    return view('pages.accueil');
});

Route::get('/connexion', function () {
    return view('pages.connexion');
});

Route::get('/inscription', function () {
    return view('pages.Inscription');
});

Route::get('/accueil-admin', function () {
    return view('pages.header-admin');
});

Route::get('/seance', function () {
    return view('pages.seance');
});

Route::get('/tous-les-films', [FilmController::class, 'index'])->name('films.index');

Route::get('/accueil', [FilmController::class, 'filmsAccueil'])->name('accueil');
