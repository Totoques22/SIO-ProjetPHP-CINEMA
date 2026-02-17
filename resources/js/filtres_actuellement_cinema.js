(function () {                                      // Cette ligne crée un espace privé pour le code
    // Tout ce qui est dedans ne gêne pas le reste de la page

    // Étape 1 : On récupère les éléments importants de la page
    const openBtn   = document.getElementById('openFilters');   // Le bouton "Filtres" qui ouvre la fenêtre
    const overlay   = document.getElementById('filtersOverlay'); // La zone entière : fond gris + panneau filtres
    const closeBtn  = document.getElementById('closeFilters');   // Le bouton pour fermer (souvent une croix)

    // Sécurité : si un des trois éléments n'existe pas → on arrête le script
    if (!openBtn || !overlay || !closeBtn) return;

    // Étape 2 : Deux fonctions simples pour ouvrir et fermer
    const open = () => {
        overlay.classList.add('active');                // Ajoute une classe CSS qui rend la fenêtre visible
        overlay.setAttribute('aria-hidden', 'false');   // Indique aux lecteurs d'écran que c'est visible
    };

    const close = () => {
        overlay.classList.remove('active');             // Enlève la classe → cache la fenêtre
        overlay.setAttribute('aria-hidden', 'true');    // Indique aux lecteurs d'écran que c'est caché
    };

    // Étape 3 : On relie les clics aux fonctions
    openBtn.onclick  = open;                            // Quand on clique sur "Filtres" → on ouvre
    closeBtn.onclick = close;                           // Quand on clique sur la croix → on ferme

    // Étape 4 : Fermer en cliquant sur le fond gris
    overlay.onclick = function(e) {                     // Quand on clique n'importe où dans overlay
        if (e.target === overlay) {                     // Seulement si c'est vraiment le fond (pas un bouton dedans)
            close();                                    // → on ferme
        }
    };

    // Étape 5 : Fermer avec la touche Échap
    document.onkeydown = function(e) {                  // On écoute le clavier sur toute la page
        if (e.key === 'Escape') {                       // Si la touche est "Échap"
            close();                                    // → on ferme
        }
    };

    // Étape 6 : Gérer les boutons "genre" (Comédie, Action, etc.)
    overlay.querySelectorAll('.pill').forEach(function(pill) {
        pill.onclick = function() {                     // Quand on clique sur un bouton genre
            pill.classList.toggle('pill-active');       // On allume ou éteint (comme un interrupteur)
        };
    });

    // Étape 7 : Bouton "Réinitialiser"
    document.getElementById('resetFilters')?.addEventListener('click', function() {
        // On trouve tous les boutons genre et on les éteint
        overlay.querySelectorAll('.pill').forEach(function(pill) {
            pill.classList.remove('pill-active');
        });
    });

    // // Étape 8 : Bouton "Appliquer"
    // document.getElementById('applyFilters')?.addEventListener('click', function() {
    //
    //     // On crée une liste vide pour stocker les choix
    //     let selections = [];
    //
    //     // On regarde tous les boutons genre
    //     overlay.querySelectorAll('.pill').forEach(function(pill) {
    //         // Si le bouton est allumé (a la classe pill-active)
    //         if (pill.classList.contains('pill-active')) {
    //             // On ajoute la valeur qu'il contient (ex: "Comédie")
    //             selections.push(pill.dataset.value);
    //         }
    //     });
    //
    //     // On affiche la liste dans la console du navigateur (pour tester)
    //     console.log("Genres sélectionnés :", selections);
    //
    //     // On ferme la fenêtre une fois les choix récupérés
    //     close();
    // });

    // Étape 8 : Bouton "Appliquer"
    document.getElementById('applyFilters')?.addEventListener('click', function() {
        const params = new URLSearchParams();

        overlay.querySelectorAll('.pill.pill-active').forEach(function(p) {
            const id = p.dataset.genreId;
            if (id) params.append('genres[]', id);
        });

        window.location.href = '/actuellement-au-cinema?' + params.toString();

        close();
    });

})();   // Cette ligne lance tout le code immédiatement
