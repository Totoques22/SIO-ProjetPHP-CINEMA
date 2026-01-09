<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    //Contrôle pour afficher tous les films dans la page tous les films
    public function index()
    {
        $films = Film::all();

        return view('pages.Tous_films', compact('films'));
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
}