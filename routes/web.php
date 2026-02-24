<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;

Route::get('/', function () {
    return view('pages.accueil');
})->name('accueil');

Route::get('/accueil', function () {
    return view('pages.accueil');
})->name('accueil');

//route de test
/*Route::get('/accueil', function () {
    return "Connexion effectuée";
})->name('accueil');*/

Route::get('/connexion', function () {
    return view('pages.connexion');
});
Route::post('/connexion', [ConnexionController::class, 'login'])->name('login');

Route::get('/inscription', function () {
    return view('pages.Inscription');
});
Route::post('/inscription', [InscriptionController::class, 'login'])->name('sign-in');

Route::get('/accueil-admin', function () {
    return view('pages.header-admin');
});

Route::get('/seance', function () {
    return view('pages.seance');
});

Route::get('/connexion_reservation', function () {
    return view('pages.connexion_reservation');
});

Route::get('/inscription_reservation', function () {
    return view('pages.inscription_reservation');
});

Route::get('/tous-les-films', [FilmController::class, 'index'])->name('films.index');

Route::get('/tous-les-films-admin', [FilmController::class, 'indexAdmin'])->name('films.admin.index');

Route::get('/actuellement-au-cinema', [FilmController::class, 'filmsAuCinema'])->name('films.cinema');

Route::get('/actuellement-au-cinema-admin', [FilmController::class, 'filmsAuCinemaAdmin'])->name('films.admin.cinema');

Route::get('/accueil', [FilmController::class, 'filmsAccueil'])->name('accueil');

Route::get('/accueil-admin', [FilmController::class, 'filmsAccueilAdmin'])->name('accueil.admin');

Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');

Route::get('/films-admin/{film}', [FilmController::class, 'showAdmin'])->name('films.admin.show');

Route::get('/gestion-films', [FilmController::class, 'GestionAdmin'])->name('films.admin.gestion');
