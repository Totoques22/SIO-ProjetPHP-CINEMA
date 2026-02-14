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
    <h1 class="page-title">Tous les films</h1>

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
    <!-- POPUP FILTRES -->
    <div class="filters-overlay" id="filtersOverlay" aria-hidden="true">
        <div class="filters-panel" role="dialog" aria-modal="true" aria-labelledby="filtersTitle">
            <div class="filters-header">
                <h2 class="filters-title" id="filtersTitle">Filtres</h2>
                <button class="filters-close" id="closeFilters" type="button" aria-label="Fermer">✕</button>
            </div>

            <!-- GENRE -->
            <button class="filters-section-toggle" type="button" data-target="#genreSection" aria-expanded="true">
                Genre
                <span class="chev">▾</span>
            </button>

            <div class="filters-section" id="genreSection">
                <div class="genre-pills">
                    <button type="button" class="pill" data-genre="Comédie">Comédie</button>
                    <button type="button" class="pill pill-active" data-genre="Animation">Animation</button>
                    <button type="button" class="pill" data-genre="Aventure">Aventure</button>
                    <button type="button" class="pill" data-genre="Science fiction">Science fiction</button>
                    <button type="button" class="pill" data-genre="Horreur">Horreur</button>
                    <button type="button" class="pill" data-genre="Drame">Drame</button>
                    <button type="button" class="pill" data-genre="Action">Action</button>
                    <button type="button" class="pill" data-genre="Comédie musicale">Comédie musicale</button>
                    <button type="button" class="pill" data-genre="Fantastique">Fantastique</button>
                    <button type="button" class="pill" data-genre="Thriller">Thriller</button>
                </div>
            </div>

            <!-- ANNÉE -->
            <button class="filters-section-toggle" type="button" data-target="#yearSection" aria-expanded="false">
                Année de sortie
                <span class="chev">▾</span>
            </button>

            <div class="filters-section is-collapsed" id="yearSection">
                <div class="year-list">
                    <button type="button" class="year-item" data-year="2020-2029">
                        2020–2029 <span class="year-count">(21000)</span>
                    </button>
                    <button type="button" class="year-item" data-year="2010-2019">
                        2010–2019 <span class="year-count">(26000)</span>
                    </button>
                    <button type="button" class="year-item" data-year="2000-2009">
                        2000–2009 <span class="year-count">(23000)</span>
                    </button>
                    <button type="button" class="year-item" data-year="1990-1999">
                        1990–1999 <span class="year-count">(19000)</span>
                    </button>
                </div>
            </div>

            <div class="filters-footer">
                <button type="button" class="filters-reset" id="resetFilters">Réinitialiser</button>
                <button type="button" class="filters-apply" id="applyFilters">Appliquer</button>
            </div>
        </div>
    </div>

    <div class="movies-grid-6">
        @foreach($films as $film)
            <div class="movie-card">
                <div class="movie-poster">
                    <img src="{{ asset ('images/' . $film->imgFil) }}" alt="{{ $film->titreFil }}">
                </div>
                <div class="movie-title">{{ $film->titreFil }}</div>
            </div>
        @endforeach


    </div>
</div>
</body>
</html>
<script>
    (function () {
        const openBtn = document.getElementById('openFilters');
        const overlay = document.getElementById('filtersOverlay');
        const closeBtn = document.getElementById('closeFilters');

        if (!openBtn || !overlay || !closeBtn) return;

        const open = () => {
            overlay.classList.add('active');
            overlay.setAttribute('aria-hidden', 'false');
        };

        const close = () => {
            overlay.classList.remove('active');
            overlay.setAttribute('aria-hidden', 'true');
        };

        openBtn.addEventListener('click', open);
        closeBtn.addEventListener('click', close);

        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) close();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') close();
        });

        // Accordéons (Genre / Année)
        document.querySelectorAll('.filters-section-toggle').forEach((btn) => {
            btn.addEventListener('click', () => {
                const targetSel = btn.getAttribute('data-target');
                const section = document.querySelector(targetSel);
                if (!section) return;

                const isCollapsed = section.classList.contains('is-collapsed');
                section.classList.toggle('is-collapsed', !isCollapsed);
                btn.setAttribute('aria-expanded', isCollapsed ? 'true' : 'false');

                const chev = btn.querySelector('.chev');
                if (chev) chev.textContent = isCollapsed ? '▾' : '▸';
            });
        });

        // Sélection pills genre (multi-sélection)
        document.querySelectorAll('.pill').forEach((pill) => {
            pill.addEventListener('click', () => {
                pill.classList.toggle('pill-active');
            });
        });

        // Sélection année (1 seule)
        document.querySelectorAll('.year-item').forEach((item) => {
            item.addEventListener('click', () => {
                document.querySelectorAll('.year-item').forEach(i => i.classList.remove('pill-active'));
                item.classList.add('pill-active');
            });
        });

        // Reset / Apply (pour l'instant juste console.log)
        document.getElementById('resetFilters')?.addEventListener('click', () => {
            document.querySelectorAll('.pill').forEach(p => p.classList.remove('pill-active'));
            document.querySelectorAll('.year-item').forEach(i => i.classList.remove('pill-active'));
        });

        document.getElementById('applyFilters')?.addEventListener('click', () => {
            const genres = [...document.querySelectorAll('.pill.pill-active')].map(p => p.dataset.genre);
            const year = document.querySelector('.year-item.pill-active')?.dataset.year || null;
            console.log({ genres, year });

            // Ici tu peux soit:
            // - envoyer ces valeurs dans l'URL (?genres=...&year=...)
            // - ou faire une requête AJAX
            close();
        });
    })();
</script>
