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
        <button class="filter-btn" id="openFilters" type="button">
            <span class="filter-icon">≡</span>
            Filtres
        </button>
    </div>

    <div class="movies-grid-6">
{{--        @foreach($films as $film)--}}
{{--            <div class="movie-card">--}}
{{--                <div class="movie-poster">--}}
{{--                    <img src="{{ asset ('images/' . $film->imgFil) }}" alt="{{ $film->titreFil }}">--}}
{{--                </div>--}}
{{--                <div class="movie-title">{{ $film->titreFil }}</div>--}}
{{--            </div>--}}
{{--        @endforeach--}}


    </div>
</div>
</body>
</html>

