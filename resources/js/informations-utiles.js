(function () {

       const openBtn = document.getElementById('openCinemaPopup');
    // On récupère dans le HTML l'élément qui a l'id "openCinemaPopup"

    const overlay = document.getElementById('cinemaPopupOverlay');
    // On récupère l'overlay, avec l'id "cinemaPopupOverlay".

    const closeBtn = document.getElementById('cinemaPopupClose');
    // On récupère le bouton qui sert à fermer la popup.

    if (!openBtn || !overlay || !closeBtn) return;
    // Vérification de sécurité :
    // Si un des éléments n'existe pas dans la page, on arrête le script.
    const open = () => {
        // Fonction "open" : elle sert à ouvrir / afficher la popup.

        overlay.classList.add('active');
        // On ajoute la classe CSS "active" à l'overlay.
        // En général, cette classe est utilisée en CSS pour afficher la popup.

        overlay.setAttribute('aria-hidden', 'false');
        // Accessibilité :
        // On indique que l'élément n'est plus caché (visible pour les lecteurs d'écran).

    };
    // Fin de la fonction open()

    const close = () => {
        // Fonction "close" : elle sert à fermer / masquer la popup.

        overlay.classList.remove('active');
        // On retire la classe CSS "active".
        // Le CSS peut alors cacher la popup.

        overlay.setAttribute('aria-hidden', 'true');
        // Accessibilité :
        // On indique que l'élément est caché.
    };
    // Fin de la fonction close()

    openBtn.addEventListener('click', open);
    // Quand on clique sur le bouton d'ouverture,
    // on exécute la fonction open().

    closeBtn.addEventListener('click', close);
    // Quand on clique sur le bouton de fermeture,
    // on exécute la fonction close().

    // clic en dehors de la popup
    // Commentaire : ici on gère le cas où l'utilisateur clique sur le fond (overlay).

    overlay.addEventListener('click', (e) => {
        // On écoute les clics sur l'overlay.
        // "e" = l'événement de clic (event).

        if (e.target === overlay) close();
        // e.target = l'élément exact cliqué.
        // Si on a cliqué directement sur le fond et non sur le panneau lui-même,
        // on ferme les filtres..
    });

})();
