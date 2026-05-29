<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ActeurController;
use App\Http\Controllers\RealisateurController;
use App\Http\Controllers\ScenaristeController;
use App\Http\Controllers\FilmAdminController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\SeanceController; // <-- IMPORT AJOUTÉ POUR ÉVITER LES ERREURS

//1. ROUTES PUBLIQUES (Accessibles à tous)

// Accueil et Catalogue
Route::get('/', [FilmController::class, 'filmsAccueil'])->name('accueil');
Route::get('/tous-les-films', [FilmController::class, 'index'])->name('films.index');
Route::get('/actuellement-au-cinema', [FilmController::class, 'filmsAuCinema'])->name('films.cinema');
Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');

// Détails des personnes
Route::get('/acteur-simple/{id}', [FilmController::class, 'acteurdetail'])->name('acteur.simple.show');
Route::get('/realisateur-simple/{id}', [FilmController::class, 'realisateurdetail'])->name('realisateur.simple.show');

// Séances et Recherches
Route::get('/seance', function () {
    $cinema = \App\Models\Cinema::inRandomOrder()->first();
    return redirect()->route('seance.show', $cinema->idCin);
})->name('seance');
Route::get('/seance/{cinema}', [CinemaController::class, 'show'])->name('seance.show');
Route::get('/recherche', [RechercheController::class, 'index'])->name('recherche');

// Authentification (Vues et Traitements)
Route::get('/connexion', function () { return view('pages.connexion'); });
Route::post('/connexion', [ConnexionController::class, 'login'])->name('login');

Route::get('/connexion_reservation', [ConnexionController::class, 'showLoginForm'])->name('login_reservation');
Route::post('/connexion_reservation', [ConnexionController::class, 'login_reservation'])->name('login_reservationPOST');

Route::get('/inscription', function () { return view('pages.Inscription'); });
Route::post('/inscription', [InscriptionController::class, 'sign_in'])->name('sign_in');

Route::get('/inscription_reservation', [InscriptionController::class, 'showRegistrationForm'])->name('inscription_reservation');
Route::post('/inscription_reservation', [InscriptionController::class, 'sign_in_reservation'])->name('sign_in_reservation');


//2. ROUTES UTILISATEURS CONNECTÉS (Nécessite d'être connecté)

Route::middleware('auth')->group(function () {
    Route::post('/deconnexion', [DeconnexionController::class, 'logout'])->name('logout');
    Route::post('/seance/reservation/{seance}', [ReservationController::class, 'reservation'])->name('reservation');
    Route::get('/mes-reservations', [ReservationController::class, 'mesReservations'])->name('pages.mes-reservations');
    Route::get('/reservation', function () { return view('pages.reservation'); });
});



//3. ROUTES ADMINISTRATEUR (Nécessite d'être connecté ET d'avoir le rôle 'admin')

Route::middleware(['auth'])->group(function () {
    Route::middleware(function ($request, $next) {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Accès refusé : vous n\'avez pas les droits d\'administration.');
        }
        return $next($request);
    })->group(function () {

        // Vues de l'administration (Accueil & Catalogue Admin)
        Route::get('/accueil-admin', [FilmAdminController::class, 'filmsAccueilAdmin'])->name('accueil.admin');
        Route::get('/tous-les-films-admin', [FilmAdminController::class, 'tousFilm'])->name('films.admin.index');
        Route::get('/actuellement-au-cinema-admin', [FilmAdminController::class, 'filmsAuCinemaAdmin'])->name('films.admin.cinema');
        Route::get('/films-admin/{film}', [FilmAdminController::class, 'show'])->name('films.admin.show');

        // Gestion des Films
        Route::get('/gestion-films', [FilmAdminController::class, 'index'])->name('films.admin.gestion');
        Route::get('/ajout-film/ajouter', [FilmAdminController::class, 'create'])->name('film.create');
        Route::post('/ajout-film/ajouter', [FilmAdminController::class, 'store'])->name('film.store');
        Route::get('/admin/films/{id}/edit', [FilmAdminController::class, 'edit'])->name('film.edit');
        Route::put('/admin/films/{id}', [FilmAdminController::class, 'update'])->name('film.update');
        Route::delete('/films/{film}', [FilmAdminController::class, 'destroy'])->name('films.destroy');

        // Gestion des Acteurs
        Route::get('/gestion-acteur', [ActeurController::class, 'index'])->name('acteur.admin.gestion');
        Route::get('/ajout-acteur/ajouter', [ActeurController::class, 'create'])->name('acteur.create');
        Route::post('/ajout-acteur/ajouter', [ActeurController::class, 'store'])->name('acteur.store');
        Route::get('/acteur/{id}', [ActeurController::class, 'show'])->name('acteur.show');
        Route::get('/admin/acteur/{id}/edit', [ActeurController::class, 'edit'])->name('acteur.edit');
        Route::put('/admin/acteur/{id}', [ActeurController::class, 'update'])->name('acteur.update');
        Route::delete('/acteur/{id}', [ActeurController::class, 'destroy'])->name('acteur.destroy');

        // Gestion des Réalisateurs
        Route::get('/gestion-realisateur', [RealisateurController::class, 'index'])->name('realisateur.admin.gestion');
        Route::get('/ajout-realisateur/ajouter', [RealisateurController::class, 'create'])->name('realisateur.create');
        Route::post('/ajout-realisateur/ajouter', [RealisateurController::class, 'store'])->name('realisateur.store');
        Route::get('/realisateur/{id}', [RealisateurController::class, 'show'])->name('realisateur.show');
        Route::get('/admin/realisateur/{id}/edit', [RealisateurController::class, 'edit'])->name('realisateur.edit');
        Route::put('/admin/realisateur/{id}', [RealisateurController::class, 'update'])->name('realisateur.update');
        Route::delete('/realisateur/{id}', [RealisateurController::class, 'destroy'])->name('realisateur.destroy');

        // Gestion des Scénaristes
        Route::get('/gestion-scenariste', [ScenaristeController::class, 'index'])->name('scenariste.admin.gestion');
        Route::get('/ajout-scenariste/ajouter', [ScenaristeController::class, 'create'])->name('scenariste.create');
        Route::post('/ajout-scenariste/ajouter', [ScenaristeController::class, 'store'])->name('scenariste.store');
        Route::get('/scenariste/{id}', [ScenaristeController::class, 'show'])->name('scenariste.show');
        Route::get('/admin/scenariste/{id}/edit', [ScenaristeController::class, 'edit'])->name('scenariste.edit');
        Route::put('/admin/scenariste/{id}', [ScenaristeController::class, 'update'])->name('scenariste.update');
        Route::delete('/scenariste/{id}', [ScenaristeController::class, 'destroy'])->name('scenariste.destroy');

        // Gestion des Cinémas
        Route::get('/gestion-cinema', [CinemaController::class, 'index'])->name('cinema.admin.gestion');
        Route::get('/ajout-cinema/ajouter', [CinemaController::class, 'create'])->name('cinema.create');
        Route::post('/ajout-cinema/ajouter', [CinemaController::class, 'store'])->name('cinema.store');
        Route::get('/admin/cinema/{id}/edit', [CinemaController::class, 'edit'])->name('cinema.edit');
        Route::put('/admin/cinema/{id}', [CinemaController::class, 'update'])->name('cinema.update');
        Route::delete('/cinema/{id}', [CinemaController::class, 'destroy'])->name('cinema.destroy');

        // Gestion des Programmations (Séances)
        Route::get('/gestion-programmation', [SeanceController::class, 'index'])->name('seance.admin.gestion');
        Route::get('/ajout-programme', [SeanceController::class, 'create'])->name('seance.create');
        Route::post('/ajout-programme', [SeanceController::class, 'store'])->name('seance.store');
        Route::get('/admin/seance/{id}/edit', [SeanceController::class, 'edit'])->name('seance.edit');
        Route::put('/admin/seance/{id}', [SeanceController::class, 'update'])->name('seance.update');
        Route::delete('/seance-admin/{id}', [SeanceController::class, 'destroy'])->name('seance.destroy');
    });
});
