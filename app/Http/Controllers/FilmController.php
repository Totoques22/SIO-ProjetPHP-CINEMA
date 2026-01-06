<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();

        return view('pages.Tous_films', compact('films'));
    }
}