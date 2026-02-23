(function () {

    const openBtn = document.getElementById('openFilters');
    // On récupère le bouton qui ouvre les filtres

    const overlay = document.getElementById('filtersOverlay');
    // On récupère le conteneur principal des filtres

    const closeBtn = document.getElementById('closeFilters');
    // On récupère le bouton qui ferme le panneau

    // Vérification de sécurité :
    // Si un des éléments n'existe pas dans la page HTML, on arrête le script.
    if (!openBtn || !overlay || !closeBtn) return;

    // Fonctions pour ouvrir / fermer le panneau

    const open = () => {
        // Fonction appelée pour afficher le panneau de filtres.

        overlay.classList.add('active');
        // On ajoute la classe CSS "active" à l'overlay.

        overlay.setAttribute('aria-hidden', 'false');
        // Accessibilité (lecteurs d'écran) :
        // On indique que cet élément n'est plus caché.
    };

    const close = () => {
        // Fonction appelée pour masquer le panneau de filtres.

        overlay.classList.remove('active');
        // On retire la classe CSS "active".
        // Le CSS peut alors cacher le panneau.

        overlay.setAttribute('aria-hidden', 'true');
        // Accessibilité :
        // On indique que cet élément est maintenant caché.
    };

    // Événements d'ouverture / fermeture

    openBtn.addEventListener('click', open);
    // Quand on clique sur le bouton d'ouverture, on exécute la fonction open().

    closeBtn.addEventListener('click', close);
    // Quand on clique sur le bouton de fermeture, on exécute la fonction close().

    overlay.addEventListener('click', (e) => {
        // On écoute les clics sur l'overlay.

        if (e.target === overlay) close();
        // e.target = l'élément exact cliqué.
        // Si on a cliqué directement sur le fond et non sur le panneau lui-même,
        // on ferme les filtres.
    });

    // Accordéons

    document.querySelectorAll('.filters-section-toggle').forEach((btn) => {
        // querySelectorAll(...) récupère tous les boutons qui ouvrent/ferment une section.
        // forEach(...) permet de traiter chaque bouton un par un.

        btn.addEventListener('click', () => {
            // Quand on clique sur un bouton d'accordéon...

            const targetSel = btn.getAttribute('data-target');
            // On lit l'attribut data-target du bouton.
            // Exemple : data-target="#genreSection"
            // Cela nous dit quelle section HTML doit être ouverte/fermée.

            const section = document.querySelector(targetSel);
            // On récupère dans la page l'élément ciblé par data-target.

            if (!section) return;
            // Sécurité : si la section n'existe pas, on arrête pour éviter une erreur.

            const isCollapsed = section.classList.contains('is-collapsed');
            // On vérifie si la section est actuellement repliée (fermée).
            // true  = repliée
            // false = ouverte

            section.classList.toggle('is-collapsed', !isCollapsed);
            // On change l'état de la section :
            // - si elle était fermée (isCollapsed = true), on enlève "is-collapsed" → elle s'ouvre
            // - si elle était ouverte (isCollapsed = false), on ajoute "is-collapsed" → elle se ferme
            //
            // Le 2e argument de toggle(force) permet de dire explicitement
            // si la classe doit être présente (true) ou absente (false).

            btn.setAttribute('aria-expanded', isCollapsed ? 'true' : 'false');
            // Accessibilité :
            // aria-expanded indique si le bouton contrôle une zone ouverte ou fermée.
            // Si la section était fermée, après clic elle devient ouverte → "true".
            // Sinon, elle devient fermée → "false".

            const chev = btn.querySelector('.chev');
            // On cherche le petit élément qui affiche la flèche (chevron) dans le bouton.

            if (chev) chev.textContent = isCollapsed ? '▾' : '▸';
            // Si la flèche existe :
            // - section ouverte  → ▾
            // - section fermée   → ▸
        });
    });

    // Sélection des genres (plusieurs choix possibles)

    document.querySelectorAll('.pill').forEach((pill) => {
        // On récupère toutes les "pastilles" de genre (chips / boutons).

        pill.addEventListener('click', () => {
            // Quand on clique sur une pastille...

            pill.classList.toggle('pill-active');
            // On active ou désactive cette pastille.
            // "toggle" = si la classe existe, on la retire ; sinon on l'ajoute.
            // Donc plusieurs genres peuvent être sélectionnés en même temps.
        });
    });

    //Sélection de l'année (un seul choix possible)

    document.querySelectorAll('.year-item').forEach((item) => {
        // On récupère toutes les options d'année.

        item.addEventListener('click', () => {
            // Quand on clique sur une année...

            document.querySelectorAll('.year-item').forEach(i => i.classList.remove('pill-active'));
            // On enlève d'abord la classe active sur TOUTES les années.
            // Ça permet d'avoir une sélection unique (comme des boutons radio).

            item.classList.add('pill-active');
            // Puis on active uniquement l'année sur laquelle on vient de cliquer.
        });
    });

    //Bouton "Réinitialiser"

    document.getElementById('resetFilters')?.addEventListener('click', () => {
        // On récupère le bouton "Réinitialiser" et on écoute son clic.
        // Le ?. (optional chaining) signifie :
        // "si le bouton existe, alors ajoute l'événement ; sinon ne fais rien"
        // Cela évite une erreur si ce bouton n'est pas présent sur la page.

        document.querySelectorAll('.pill').forEach(p => p.classList.remove('pill-active'));
        // On désactive tous les genres sélectionnés.

        document.querySelectorAll('.year-item').forEach(i => i.classList.remove('pill-active'));
        // On désactive aussi l'année sélectionnée.
    });

    // Bouton "Appliquer"

    document.getElementById('applyFilters')?.addEventListener('click', () => {
        // Même principe : on écoute le clic sur "Appliquer" seulement si le bouton existe.

        const params = new URLSearchParams();
        // URLSearchParams sert à construire proprement les paramètres d'URL.
        // Exemple final possible : ?genres[]=28&genres[]=35&year=2024

        document.querySelectorAll('.pill.pill-active').forEach(p => {
            // On récupère toutes les pastilles de genre actuellement actives.

            const id = p.dataset.genreId;
            // dataset permet de lire les attributs data-* en HTML.
            // Ici, on lit data-genre-id (ex: <button data-genre-id="28">Action</button>)
            // En JavaScript, data-genre-id devient dataset.genreId.

            if (id) params.append('genres[]', id);
            // Si un id existe, on l'ajoute dans l'URL sous la clé "genres[]".
            // append = on peut ajouter plusieurs valeurs avec le même nom.
        });

        // 1. On va chercher la barre de recherche dans le HTML grâce à son ID
        const searchInput = document.getElementById('searchBar');
        const searchValue = searchInput.value.trim();
        if (searchValue !== '') {
            params.set('recherche', searchValue);
        }

        const year = document.querySelector('.year-item.pill-active');
        // On cherche l'année actuellement sélectionnée (il n'y en a qu'une max).

        if (year) params.set('year', year.dataset.year);
        // Si une année est sélectionnée, on ajoute "year=..." dans l'URL.
        // set = une seule valeur (remplace si déjà présente).

        window.location.href = '/tous-les-films?' + params.toString();
        // Redirection de la page vers l'URL avec les filtres choisis.

        close();

    });

})();
