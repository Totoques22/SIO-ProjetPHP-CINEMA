<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller {
    public function showLogin()
    {
        return view('pages.Connexion');
    }

    public function login(Request $request)
    {
        //dd("Connexion OK");

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);



        return redirect()->route('accueil')->with('success', 'Connexion effectuée');
    }
}
