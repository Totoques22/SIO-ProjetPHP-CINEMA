(function () {                                      // Cette ligne crée un espace privé pour le code
    // Tout le code à l’intérieur reste privé

    // On cherche les trois éléments principaux dans la page HTML
    const openBtn = document.getElementById('openFilters');     // Le bouton qui dit "Filtres" ou "Ouvrir les filtres"
    const overlay = document.getElementById('filtersOverlay');  // La grande zone qui contient le fond gris + le panneau des filtres
    const closeBtn = document.getElementById('closeFilters');   // Le bouton pour fermer (souvent une croix ✕)

    // Sécurité : si l’un des trois éléments n’est pas trouvé dans la page → on arrête tout de suite
    if (!openBtn || !overlay || !closeBtn) return;

    // Fonction qui ouvre le panneau de filtres
    const open = () => {
        overlay.classList.add('active');                // On ajoute le mot "active" à la liste des classes → ça le rend visible (grâce au CSS)
        overlay.setAttribute('aria-hidden', 'false');   // On dit aux lecteurs d’écran : "maintenant je suis visible"
    };

    // Fonction qui ferme le panneau de filtres
    const close = () => {
        overlay.classList.remove('active');             // On enlève le mot "active" → le panneau disparaît (grâce au CSS)
        overlay.setAttribute('aria-hidden', 'true');    // On dit aux lecteurs d’écran : "je suis caché"
    };

    // Quand on clique sur le bouton "Filtres" → on appelle la fonction open
    openBtn.addEventListener('click', open);

    // Quand on clique sur le bouton fermer (croix) → on appelle la fonction close
    closeBtn.addEventListener('click', close);

    // Quand on clique n’importe où dans la grande zone overlay
    overlay.addEventListener('click', (e) => {
        // On vérifie si on a cliqué vraiment sur le fond (pas sur un bouton ou le panneau à l’intérieur)
        if (e.target === overlay) close();             // Si oui → on ferme
    });

    // On écoute les touches du clavier sur toute la page
    document.addEventListener('keydown', (e) => {
        // Si la personne appuie sur la touche Échap
        if (e.key === 'Escape') close();               // → on ferme le panneau
    });

    // ───────────────────────────────────────────────
    // Gestion des sections qui se plient / déplient (accordéons Genre et Année)
    // ───────────────────────────────────────────────
    document.querySelectorAll('.filters-section-toggle').forEach((btn) => {
        // Pour chaque bouton d’accordéon
        btn.addEventListener('click', () => {
            const targetSel = btn.getAttribute('data-target');      // On lit l’attribut data-target (ex: "#genreSection")
            const section = document.querySelector(targetSel);      // On trouve la zone correspondante

            if (!section) return;                           // Si on ne la trouve pas → on arrête

            const isCollapsed = section.classList.contains('is-collapsed');  // Est-ce que c’est déjà replié ?
            section.classList.toggle('is-collapsed', !isCollapsed);          // On inverse : si replié → on déplie, et inversement

            // Accessibilité : on dit si c’est ouvert ou fermé
            btn.setAttribute('aria-expanded', isCollapsed ? 'true' : 'false');

            // On change la petite flèche à côté du titre
            const chev = btn.querySelector('.chev');
            if (chev) chev.textContent = isCollapsed ? '▾' : '▸';  // ▾ = ouvert, ▸ = fermé
        });
    });

    // ───────────────────────────────────────────────
    // Les "pastilles" de genres → on peut en choisir plusieurs
    // ───────────────────────────────────────────────
    document.querySelectorAll('.pill').forEach((pill) => {
        pill.addEventListener('click', () => {
            pill.classList.toggle('pill-active');   // On allume ou on éteint la pastille (comme un bouton on/off)
        });
    });

    // ───────────────────────────────────────────────
    // Les années → on ne peut en choisir qu’une seule
    // ───────────────────────────────────────────────
    document.querySelectorAll('.year-item').forEach((item) => {
        item.addEventListener('click', () => {
            // D’abord on enlève la sélection sur toutes les années
            document.querySelectorAll('.year-item').forEach(i => i.classList.remove('pill-active'));
            // Ensuite on met la sélection uniquement sur celle qu’on vient de cliquer
            item.classList.add('pill-active');
        });
    });

    // ───────────────────────────────────────────────
    // Bouton "Réinitialiser"
    // ───────────────────────────────────────────────
    document.getElementById('resetFilters')?.addEventListener('click', () => {
        // On éteint toutes les pastilles de genres
        document.querySelectorAll('.pill').forEach(p => p.classList.remove('pill-active'));
        // On éteint toutes les années sélectionnées
        document.querySelectorAll('.year-item').forEach(i => i.classList.remove('pill-active'));
    });

    // ───────────────────────────────────────────────
    // Bouton "Appliquer"
    // ───────────────────────────────────────────────
    // document.getElementById('applyFilters')?.addEventListener('click', () => {
    //     // On récupère tous les genres qui sont allumés
    //     const genres = [...document.querySelectorAll('.pill.pill-active')]
    //         .map(p => p.dataset.genre);                     // On crée un tableau avec leurs noms (ex: ["Action", "Drame"])
    //
    //     // On récupère l’année sélectionnée (ou rien si aucune)
    //     const year = document.querySelector('.year-item.pill-active')?.dataset.year || null;
    //
    //     // Pour l’instant on affiche juste le résultat dans la console du navigateur
    //     console.log({ genres, year });
    //
    //     // On ferme le panneau de filtres
    //     close();
    // });
    // APRÈS
    document.getElementById('applyFilters')?.addEventListener('click', () => {
        const params = new URLSearchParams();

        document.querySelectorAll('.pill.pill-active').forEach(p => {
            const id = p.dataset.genreId;
            if (id) params.append('genres[]', id);
        });

        // 1. On va chercher la barre de recherche dans le HTML grâce à son ID
        const searchInput = document.getElementById('searchBar');
        const searchValue = searchInput.value.trim();
        if (searchValue !== '') {
            params.set('recherche', searchValue);
        }

        const year = document.querySelector('.year-item.pill-active');
        if (year) params.set('year', year.dataset.year);

        window.location.href = '/tous-les-films?' + params.toString();

        close();
    });


})();                                               // On lance tout le code immédiatement (c’est obligatoire avec l’IIFE)


