<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films au cinéma - CineForAll</title>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="{{ asset('Header-style.css') }}">

</head>

<body class="films-body">
@include('pages.header')

<div style="width: 100%;">
    <h1 class="page-title">Actuellement au cinéma</h1>

    <div class="search-section">
        <div class="search-container">
            <span class="search-icon">🔍</span>
            <input type="text" placeholder="Choisissez votre cinéma">
        </div>
        <button class="filter-btn">
            <span class="filter-icon">≡</span>
            Filtres
        </button>
    </div>

    <div class="movies-grid">
        <!-- Movie card -->
        <div class="movie-card">
            <div class="movie-poster">
                <img src="https://www.themoviedb.org/t/p/w1280/3tbnGsJpxtndRkxHeq3uq7VymzI.jpg" alt="Running man">
            </div>
            <div class="movie-title">Running man</div>
        </div>

        <div class="movie-card">
            <div class="movie-poster">
                <img src="https://www.themoviedb.org/t/p/w1280/qMkHZ0OrQpv8yyU0og611uXBwKL.jpg" alt="Running man">
            </div>
            <div class="movie-title">Wicked: Partie II</div>
        </div>

        <div class="movie-card">
            <div class="movie-poster">
                <img src="https://www.themoviedb.org/t/p/w1280/cfGTBeMJU5C4Q2yEq8Nh6rPspn6.jpg" alt="Running man">
            </div>
            <div class="movie-title">Avatar : De feu et de cendres</div>
        </div>

        <div class="movie-card">
            <div class="movie-poster">
                <img src="https://www.themoviedb.org/t/p/w1280/hBI7Wrps6tDjhEzBxJgoPLhbmT1.jpg" alt="Running man">
            </div>
            <div class="movie-title">Zootopie 2</div>
        </div>

        <div class="movie-card">
            <div class="movie-poster">
                <img src="https://www.themoviedb.org/t/p/w1280/oflTA5ZezgU60G30auSIsmrKF6H.jpg" alt="Running man">
            </div>
            <div class="movie-title">Insaisissable 3 </div>
        </div>

        <div class="movie-card">
            <div class="movie-poster">
                <img src="https://www.themoviedb.org/t/p/w1280/gKfStbHwDEJgLJutv6abBQ3P1M1.jpg" alt="Running man">
            </div>
            <div class="movie-title">Jean Valjean</div>
        </div>


    </div>
</div>
</body>
</html>
