<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class FilmController extends Controller
{
    //Contrôle pour afficher tous les films dans la page tous les films
    public function index(Request $request)
    {
        // Genres (pour afficher les boutons)
        $genres = Genre::orderBy('libGenre')->get();

        // Genres sélectionnés via l'URL: /films?genres[]=1&genres[]=3
        $selectedGenres = array_map('intval', $request->input('genres', []));

        // Requête films
        $query = Film::query();

        // Appliquer le filtre genre si nécessaire
        if (!empty($selectedGenres)) {
            $query->whereIn('idGenre', $selectedGenres);
        }

        $films = $query->get();

        return view('pages.Tous_films', compact('films', 'genres', 'selectedGenres'));
    }
    //Contrôle les films qui s'affiche dans la page d'accueil
    public function filmsAccueil(){
        $filmsAuCinema = Film::where('dateSortie', '<=', now())
            ->orderBy('dateSortie', 'desc') // Les plus récents en premier
            ->take(6)
            ->get();
        $filmsProchainement = Film::where('dateSortie', '>', now())
            ->orderBy('dateSortie', 'asc')
            ->take(6)
            ->get();
        return view('pages.accueil', compact('filmsAuCinema', 'filmsProchainement'));
    }

    public function filmsAuCinema(Request $request)
    {
        // Genres (pour afficher les boutons)
        $genres = Genre::orderBy('libGenre')->get();

        // Genres sélectionnés via l'URL: /films?genres[]=1&genres[]=3
        $selectedGenres = array_map('intval', $request->input('genres', []));

        // Requête films
        $query = Film::query();

        // Appliquer le filtre genre si nécessaire
        if (!empty($selectedGenres)) {
            $query->whereIn('idGenre', $selectedGenres);
        }

        $films = $query->get();

        return view('pages.actuellement-au-cinema', compact('films', 'genres', 'selectedGenres'));
    }
}
