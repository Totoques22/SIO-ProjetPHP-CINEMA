<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/connexion', function () {
    return view('pages.connexion');
});

Route::get('/inscription', function () {
    return view('pages.Inscription');
});

Route::get('/accueil', function () {
    return view('pages.header');
});

Route::get('/accueil-admin', function () {
    return view('pages.header-admin');
});