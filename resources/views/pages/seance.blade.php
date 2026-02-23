<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pathé Vaise - CineForAll</title>

    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="{{ asset('Header-style.css') }}">
    <link rel="stylesheet" href="{{ asset('cinema-style.css') }}">
</head>

<body class="cinema-body">
@include('pages.header')

<div class="main-content">

    <!-- Search + chips -->
    <div class="search-section cinema-search">
        <div class="search-container">
            <img src="{{ asset('images/loupe.png') }}"
                 width="35"
                 height="35"
            >
            <input type="text" value="Pathé Vaise" placeholder="Choisissez votre cinéma" />
        </div>

        <a class="cinema-chip" href="#">
            <span class="cinema-chip-city">Lyon</span>
            <span class="cinema-chip-name">Pathé Bellecour</span>
        </a>

        <a class="cinema-chip" href="#">
            <span class="cinema-chip-city">Lyon</span>
            <span class="cinema-chip-name">Pathé Carré de soie</span>
        </a>
    </div>

    <!-- Header cinéma -->
    <div class="cinema-header">
        <h1 class="cinema-title">PATHÉ VAISE</h1>
        <p class="cinema-subtitle">Lyon</p>
        <button class="info-btn" type="button" id="openCinemaPopup">Informations utiles</button>
    </div>

    <!-- Programme -->
    <div class="cinema-program">

        <!-- Film 1 -->
        <div class="showtime-row">
            <div class="showtime-poster">
                <img src="https://via.placeholder.com/260x390.png?text=Running+Man" alt="Running man" />
            </div>

            <div class="showtime-content">
                <div class="showtime-meta">
                    <h2 class="showtime-title">Running man</h2>
                    <p class="showtime-genre">Science-fiction (2h14)</p>
                </div>

                <!-- Horaires sous le titre -->
                <div class="showtime-times">
                    <div class="time-card">
                        <div class="time-card-top">
                            <span class="time-badge">Dolby</span>
                            <span class="time-lang">VF</span>
                        </div>
                        <div class="time-hour">13h00</div>
                        <div class="time-end">(fin 15h34)</div>
                    </div>

                    <div class="time-card">
                        <div class="time-card-top">
                            <span class="time-badge">&nbsp;</span>
                            <span class="time-lang">VF</span>
                        </div>
                        <div class="time-hour">14h10</div>
                        <div class="time-end">(fin 16h44)</div>
                    </div>

                    <div class="time-card">
                        <div class="time-card-top">
                            <span class="time-badge">&nbsp;</span>
                            <span class="time-lang">VF</span>
                        </div>
                        <div class="time-hour">15h00</div>
                        <div class="time-end">(fin 17h34)</div>
                    </div>

                    <div class="time-card">
                        <div class="time-card-top">
                            <span class="time-badge">&nbsp;</span>
                            <span class="time-lang">VOST</span>
                        </div>
                        <div class="time-hour">21h00</div>
                        <div class="time-end">(fin 23h34)</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="showtime-row">
            <div class="showtime-poster">
                <img src="https://via.placeholder.com/260x390.png?text=Wicked+Partie+II" alt="Wicked : Partie II" />
            </div>

            <div class="showtime-content">
                <div class="showtime-meta">
                    <h2 class="showtime-title">Wicked : Partie II</h2>
                    <p class="showtime-genre">Comédie musicale (2h18)</p>
                </div>

                <div class="showtime-times">
                    <div class="time-card">
                        <div class="time-card-top">
                            <span class="time-badge">Dolby 3D</span>
                            <span class="time-lang">VF</span>
                        </div>
                        <div class="time-hour">10h45</div>
                        <div class="time-end">(fin 13h23)</div>
                    </div>

                    <div class="time-card">
                        <div class="time-card-top">
                            <span class="time-badge">&nbsp;</span>
                            <span class="time-lang">VF</span>
                        </div>
                        <div class="time-hour">14h10</div>
                        <div class="time-end">(fin 16h48)</div>
                    </div>

                    <div class="time-card">
                        <div class="time-card-top">
                            <span class="time-badge">&nbsp;</span>
                            <span class="time-lang">VF</span>
                        </div>
                        <div class="time-hour">15h00</div>
                        <div class="time-end">(fin 17h38)</div>
                    </div>

                    <div class="time-card">
                        <div class="time-card-top">
                            <span class="time-badge">&nbsp;</span>
                            <span class="time-lang">VOST</span>
                        </div>
                        <div class="time-hour">21h00</div>
                        <div class="time-end">(fin 23h38)</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- POPUP INFOS CINÉMA -->
        <div class="cinema-popup-overlay" id="cinemaPopupOverlay" aria-hidden="true">
            <div class="cinema-popup" role="dialog" aria-modal="true" aria-labelledby="cinemaPopupTitle">
                <button class="cinema-popup-close" type="button" id="cinemaPopupClose" aria-label="Fermer">✕</button>

                <h2 class="cinema-popup-title" id="cinemaPopupTitle">A propos de<br>Pathé Vaise</h2>
                <p class="cinema-popup-subtitle">Rue des Docks – 69009<br>Lyon</p>

                <div class="cinema-popup-badges">
                    <div class="cinema-popup-badge">
                        <div class="badge-number">14</div>
                        <div class="badge-label">SALLES</div>
                    </div>
                    <div class="cinema-popup-badge">
                        <div class="badge-number">SALLE DOLBY</div>
                        <div class="badge-label">CINEMA</div>
                    </div>
                </div>

                <div class="cinema-popup-prices">
                    <h3 class="cinema-popup-section-title">Tarifs</h3>

                    <div class="price-row">
                        <span class="price-label">Moins de 14 ans</span>
                        <span class="price-value">4.50€</span>
                    </div>
                    <div class="price-row">
                        <span class="price-label">Matin</span>
                        <span class="price-value">7.40€</span>
                    </div>
                    <div class="price-row">
                        <span class="price-label">Etudiant</span>
                        <span class="price-value">7.20€</span>
                    </div>
                    <div class="price-row">
                        <span class="price-label">Plein tarif</span>
                        <span class="price-value">13.90€</span>
                    </div>

                    <div class="price-row">
                        <span class="price-label">Séance 3D</span>
                        <span class="price-value">+2€</span>
                    </div>
                    <div class="price-row">
                        <span class="price-label">Lunettes 3D</span>
                        <span class="price-value">+1€</span>
                    </div>
                    <div class="price-row">
                        <span class="price-label">Dolby cinéma hors 3D</span>
                        <span class="price-value">+8€</span>
                    </div>
                    <div class="price-row">
                        <span class="price-label">Dolby cinéma 3D</span>
                        <span class="price-value">+9€</span>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
@vite('resources/js/informations-utiles.js')
</body>
</html>



