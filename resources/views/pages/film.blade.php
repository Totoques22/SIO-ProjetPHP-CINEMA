<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Détail film - CineForAll</title>

    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="{{ asset('Header-style.css') }}">
</head>

<body class="film-detail-body">
@include('pages.header')

<main class="film-detail-wrap">

    <section class="film-detail-card">

        <div class="film-detail-left">
            <div class="film-detail-poster">
                <img src="https://www.themoviedb.org/t/p/w1280/3tbnGsJpxtndRkxHeq3uq7VymzI.jpg" alt="Running man">
            </div>

            <p class="film-detail-rate">Noter le film :</p>
        </div>

        <div class="film-detail-right">
            <div class="film-detail-title-row">
                <h1 class="film-detail-title">Running man</h1>
                <span class="film-detail-note">Note : 3.6</span>
            </div>

            <div class="film-detail-meta">
                <p>Sortie : <strong>19 nov. 2025</strong></p>
                <p>Science fiction <strong>(2h14)</strong></p>
                <p>De <strong>Edgar Wright</strong></p>
            </div>

            <p class="film-detail-synopsis">
                Dans un futur proche, The Running Man est l’émission numéro un à la télévision : un jeu de survie
                impitoyable où des candidats, appelés les Runners, doivent échapper pendant 30 jours à des tueurs
                professionnels, sous l’œil avide d’un public captivé. Chaque jour passé augmente la récompense à la clé
                – et procure une dose d’adrénaline toujours plus intense.
            </p>
        </div>

    </section>

</main>

</body>
</html>
