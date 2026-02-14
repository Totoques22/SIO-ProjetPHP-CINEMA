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

Route::get('/actuellement-au-cinéma', function () {
    return view('pages.actuellement-au-cinema');
});

Route::get('/film', function () {
    return view('pages.film');
});

Route::get('/tous-les-films', [FilmController::class, 'index'])->name('films.index');

//Route::get('/actuellement-au-cinema', [FilmController::class, 'index'])->name('films.now');

Route::get('/accueil', [FilmController::class, 'filmsAccueil'])->name('accueil');
