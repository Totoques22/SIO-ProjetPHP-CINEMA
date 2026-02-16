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
        <!-- POPUP FILTRES (Actuellement au cinéma) -->
        <div class="filters-overlay" id="filtersOverlay" aria-hidden="true">
            <div class="filters-panel filters-panel--big" role="dialog" aria-modal="true" aria-labelledby="filtersTitle">

                <div class="filters-header">
                    <h2 class="filters-title" id="filtersTitle">Filtres</h2>
                    <button class="filters-close" id="closeFilters" type="button" aria-label="Fermer">✕</button>
                </div>

                <!-- VERSION -->
                <div class="filters-block">
                    <div class="filters-block-title">Version</div>
                    <div class="genre-pills">
                        <button type="button" class="pill" data-filter="version" data-value="VF">VF</button>
                        <button type="button" class="pill" data-filter="version" data-value="VOST">VOST</button>
                    </div>
                </div>

                <!-- TYPE DE SALLE -->
                <div class="filters-block">
                    <div class="filters-block-title">Type de salle</div>
                    <div class="genre-pills">
                        <button type="button" class="pill" data-filter="room" data-value="Classique">Classique</button>
                        <button type="button" class="pill" data-filter="room" data-value="Dolby cinéma">Dolby cinéma</button>
                        <button type="button" class="pill" data-filter="room" data-value="IMAX">IMAX</button>
                        <button type="button" class="pill" data-filter="room" data-value="4DX">4DX</button>
                    </div>
                </div>

                <!-- GENRE -->
                <div class="filters-block">
                    <div class="filters-block-title">Genre</div>
                    <div class="genre-pills">
                        <button type="button" class="pill" data-filter="genre" data-value="Comédie">Comédie</button>
                        <button type="button" class="pill" data-filter="genre" data-value="Animation">Animation</button>
                        <button type="button" class="pill pill-active" data-filter="genre" data-value="Aventure">Aventure</button>
                        <button type="button" class="pill" data-filter="genre" data-value="Science fiction">Science fiction</button>
                        <button type="button" class="pill" data-filter="genre" data-value="Horreur">Horreur</button>
                        <button type="button" class="pill" data-filter="genre" data-value="Drame">Drame</button>
                        <button type="button" class="pill" data-filter="genre" data-value="Action">Action</button>
                        <button type="button" class="pill pill-active" data-filter="genre" data-value="Comédie musicale">Comédie musicale</button>
                        <button type="button" class="pill pill-active" data-filter="genre" data-value="Fantastique">Fantastique</button>
                        <button type="button" class="pill" data-filter="genre" data-value="Thriller">Thriller</button>
                    </div>
                </div>

                <div class="filters-footer">
                    <button type="button" class="filters-reset" id="resetFilters">Réinitialiser</button>
                    <button type="button" class="filters-apply" id="applyFilters">Appliquer</button>
                </div>
            </div>
        </div>

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
<script>
    (() => {
        const openBtn = document.getElementById('openFilters');
        const overlay = document.getElementById('filtersOverlay');
        const closeBtn = document.getElementById('closeFilters');
        if (!openBtn || !overlay || !closeBtn) return;

        const open = () => (overlay.classList.add('active'), overlay.setAttribute('aria-hidden','false'));
        const close = () => (overlay.classList.remove('active'), overlay.setAttribute('aria-hidden','true'));

        openBtn.onclick = open;
        closeBtn.onclick = close;
        overlay.onclick = e => e.target === overlay && close();
        document.onkeydown = e => e.key === 'Escape' && close();

        // Toggle pills (multi)
        overlay.querySelectorAll('.pill').forEach(p =>
            p.onclick = () => p.classList.toggle('pill-active')
        );

        // Reset
        document.getElementById('resetFilters')?.addEventListener('click', () => {
            overlay.querySelectorAll('.pill').forEach(p => p.classList.remove('pill-active'));
        });

        // Apply (ex : récupérer valeurs)
        document.getElementById('applyFilters')?.addEventListener('click', () => {
            const picked = [...overlay.querySelectorAll('.pill.pill-active')]
                .reduce((acc, el) => {
                    const k = el.dataset.filter;
                    const v = el.dataset.value;
                    (acc[k] ||= []).push(v);
                    return acc;
                }, {});

            console.log(picked);
            close();
        });
    })();
</script>

</html>

