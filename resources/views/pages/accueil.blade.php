<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

    <!-- Lien vers tes fichiers CSS -->
    <link rel="stylesheet" href="{{ asset('Header-style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body class="films-body">

<!-- On inclut le header ici -->
@include('pages.header')

<div class="main-content">
    <!-- Barre de recherche -->
    <div class="search-section">
        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="text" placeholder="Choisissez votre cinéma">
        </div>
    </div>

    <!-- Section Films au cinéma -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Films au cinéma</h2>
            <a href="#" class="see-all-link">Tous les films actuellement au cinéma ›</a>
        </div>
        <div class="movies-grid-6">
            <!-- Tes cartes de films -->
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w1280/3tbnGsJpxtndRkxHeq3uq7VymzI.jpg" alt="Running man">
                </div>
                <div class="movie-title">Running man</div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w1280/qMkHZ0OrQpv8yyU0og611uXBwKL.jpg" alt="Wicked: Partie II">
                </div>
                <div class="movie-title">Wicked: Partie II</div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w1280/oflTA5ZezgU60G30auSIsmrKF6H.jpg" alt="Insaisissables 3">
                </div>
                <div class="movie-title">Insaisissables 3</div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w1280/gKfStbHwDEJgLJutv6abBQ3P1M1.jpg" alt="Jean Valjean">
                </div>
                <div class="movie-title">Jean Valjean</div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w1280/hBI7Wrps6tDjhEzBxJgoPLhbmT1.jpg" alt="Dossier 137">
                </div>
                <div class="movie-title">Zootopie 2</div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w1280/cfGTBeMJU5C4Q2yEq8Nh6rPspn6.jpg" alt="T'as pas changé">
                </div>
                <div class="movie-title">Avatar: De feu et de cendres</div>
            </div>
        </div>
    </div>

    <!-- Section Prochaine sortie -->
    <div class="section">
        <div class="section-header">
            <h2 class="section-title">Prochaine sortie</h2>
            <a href="#" class="see-all-link">Toutes les prochaine sortie ›</a>
        </div>
        <div class="movies-grid-6">
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w600_and_h900_face/szdrVdnS8XAzqFyzPDhYXaJk7EK.jpg" alt="Film 1">
                </div>
                <div class="movie-title">La femme de ménage</div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w600_and_h900_face/1WSOiU7XmLoEnYyADAEMQfGe9eN.jpg" alt="Film 2">
                </div>
                <div class="movie-title">Bob l'éponge, le film : Un pour tous, tous pirates !</div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w600_and_h900_face/5EbKjIowNw5yExzrhvu231GFVCf.jpg" alt="Film 3">
                </div>
                <div class="movie-title">Anaconda</div>
            </div>

        </div>
    </div>
</div>
</body>
</html>