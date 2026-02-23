<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
class InscriptionController extends Controller {
    public function showLogin()
    {
        return view('pages.Inscription')->with('success', 'Inscription réussie');
    }

    public function login(Request $request)
    {
        dd("inscription OK");
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        /*Utilisateur::create([
            'name' => $request->username,
            'password' => Hash::make($request->password),
        ]);*/

        return redirect('/accueil')->with('success', 'Inscription réussie');
    }
}
