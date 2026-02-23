(function () {

    //  On récupère les éléments importants de la page
    const openBtn = document.getElementById('openFilters');
    // On récupère le bouton qui ouvre la fenêtre des filtres (id="openFilters").

    const overlay = document.getElementById('filtersOverlay');
    // On récupère l'overlay : la zone qui contient le fond gris + le panneau de filtres.

    const closeBtn = document.getElementById('closeFilters');
    // On récupère le bouton qui ferme la fenêtre (souvent une croix).

    // Sécurité : si un des trois éléments n'existe pas → on arrête le script
    if (!openBtn || !overlay || !closeBtn) return;
    // Si un élément est introuvable (null), on arrête pour éviter des erreurs JavaScript.

    //  Deux fonctions simples pour ouvrir et fermer
    const open = () => {
        // Fonction appelée pour afficher la fenêtre des filtres.

        overlay.classList.add('active');
        // On ajoute la classe CSS "active".
        // En général, cette classe sert à rendre l'overlay visible.

        overlay.setAttribute('aria-hidden', 'false');
        // Accessibilité :
        // On indique aux lecteurs d'écran que la zone n'est plus cachée.
    };

    const close = () => {
        // Fonction appelée pour masquer la fenêtre des filtres.

        overlay.classList.remove('active');
        // On retire la classe "active".
        // Le CSS peut alors cacher la fenêtre.

        overlay.setAttribute('aria-hidden', 'true');
        // Accessibilité :
        // On indique aux lecteurs d'écran que la zone est cachée.
    };

    // On relie les clics aux fonctions
    openBtn.onclick = open;
    // Quand on clique sur le bouton "Filtres", on exécute la fonction open().

    closeBtn.onclick = close;
    // Quand on clique sur le bouton de fermeture (croix), on exécute close().

    // Fermer en cliquant sur le fond gris
    overlay.onclick = function(e) {
        // On écoute les clics sur toute la zone overlay.

        if (e.target === overlay) {
            // e.target = l'élément exact cliqué.
            // Si on clique directement sur le fond gris (overlay),
            // et pas sur un élément à l'intérieur (panneau, bouton, etc.)...

            close();
            // ...alors on ferme la fenêtre.
        }
    };

    //  Fermer avec la touche Échap
    document.onkeydown = function(e) {
        // On écoute les touches du clavier sur toute la page.

        if (e.key === 'Escape') {
            // Si la touche pressée est "Escape" (Échap)...

            close();
            // ...on ferme la fenêtre.
        }
    };

    //  Gérer les boutons "genre" (Comédie, Action, etc.)
    overlay.querySelectorAll('.pill').forEach(function(pill) {
        // On récupère tous les éléments avec la classe ".pill" à l'intérieur de l'overlay.
        // Chaque "pill" représente un genre (Action, Comédie, etc.).

        pill.onclick = function() {
            // Quand on clique sur une pastille (genre)...

            pill.classList.toggle('pill-active');
            // On ajoute ou retire la classe "pill-active".
            // "toggle" = interrupteur :
            // - si la classe existe, on la retire
            // - sinon, on l'ajoute
            // Cela permet de sélectionner/désélectionner plusieurs genres.
        };
    });

    //  Bouton "Réinitialiser"
    document.getElementById('resetFilters')?.addEventListener('click', function() {
        // On récupère le bouton "Réinitialiser" et on écoute son clic.
        // Le ?. (optional chaining) signifie :
        // "si ce bouton existe, ajoute l'événement ; sinon ne fais rien".
        // Cela évite une erreur si le bouton n'est pas présent dans la page.

        overlay.querySelectorAll('.pill').forEach(function(pill) {
            // On récupère toutes les pastilles de genre dans l'overlay.

            pill.classList.remove('pill-active');
            // On retire la classe "pill-active" à chaque pastille.
            // Résultat : tous les genres sont désélectionnés.
        });
    });

    //  Bouton "Appliquer"
    document.getElementById('applyFilters')?.addEventListener('click', function() {
        // On récupère le bouton "Appliquer" (s'il existe) et on écoute son clic.

        const params = new URLSearchParams();
        // URLSearchParams sert à construire proprement les paramètres d'URL.
        // Exemple : ?genres[]=28&genres[]=35

        overlay.querySelectorAll('.pill.pill-active').forEach(function(p) {
            // On récupère seulement les pastilles actuellement actives (sélectionnées).

            const id = p.dataset.genreId;
            // On lit l'attribut data-genre-id en HTML via dataset.
            // Exemple : <button data-genre-id="28">Action</button>
            // En JS, ça devient p.dataset.genreId.

            if (id) params.append('genres[]', id);
            // Si un id existe, on l'ajoute aux paramètres d'URL.
            // append() permet d'ajouter plusieurs valeurs avec la même clé (genres[]).
        });

        window.location.href = '/actuellement-au-cinema?' + params.toString();
        // On redirige l'utilisateur vers une nouvelle URL avec les filtres choisis.
        // Exemples :
        // /actuellement-au-cinema?genres[]=28
        // /actuellement-au-cinema?genres[]=28&genres[]=35

        close();
        // On ferme la fenêtre des filtres.
        // (Même si la page va généralement se recharger juste après la redirection.)
    });

})();
