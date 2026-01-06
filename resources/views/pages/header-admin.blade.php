<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Header</title>
    <link rel="stylesheet" href="{{ asset('Header-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <div class="header-left">
        <a href="#" class="logo">
            <img src="{{ asset('images/logo_CineForAll.png') }}"
                 width="80"
                 height="71">
        </a>

        <nav>
            <a href="#">Films au cinéma</a>
            <a href="#">Cinémas</a>
            <a href="#">Tous les films</a>
            <a href="#">Gestions des films</a>
        </nav>
    </div>

    <div class="header-right">
        <button class="icon-btn search-icon" aria-label="Rechercher">
            <img src="{{ asset('images/loupe.png') }}"
                 width="45"
                 height="45"
            >
        </button>
        <button class="icon-btn user-icon" aria-label="Profil utilisateur">
            <img src="{{ asset('images/utilisateur.png') }}"
                 width="40"
                 height="40"
            >
        </button>
    </div>
</header>
</body>
</html>