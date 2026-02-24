document.addEventListener('DOMContentLoaded', () => {
    // Attend que toute la page HTML soit complètement chargée avant de commencer

    const gestionBtn = document.getElementById('gestionBtn');
    // Récupère le bouton "Gestion des films" dans le header

    const gestionPopup = document.getElementById('gestionPopup');
    // Récupère le menu popup qui contient Acteur / Réalisateur / etc.

    if (!gestionBtn || !gestionPopup) return;
    // Sécurité : si l'un des deux éléments n'existe pas sur la page → on arrête tout de suite

    gestionBtn.addEventListener('click', (e) => {
        // Quand on clique sur le bouton "Gestion des films"

        e.preventDefault();
        // Empêche le comportement par défaut (utile si le bouton change plus tard)

        e.stopPropagation();
        // Empêche le clic de remonter jusqu'au document
        // sinon le popup s'ouvrirait puis se refermerait immédiatement

        gestionPopup.classList.toggle('active');
        // Ajoute ou enlève la classe "active"
        // → si caché : il s'affiche
        // → si affiché : il se ferme
    });

    gestionPopup.addEventListener('click', (e) => {
        // Quand on clique dans le popup lui-même

        e.stopPropagation();
        // Empêche le clic dans le popup de remonter au document
        // (sinon le menu se fermerait immédiatement)
    });

    document.addEventListener('click', () => {
        // Quand on clique n'importe où ailleurs sur la page

        gestionPopup.classList.remove('active');
        // On enlève la classe "active" → le popup disparaît
    });

    document.addEventListener('keydown', (e) => {
        // Quand on appuie sur une touche du clavier

        if (e.key === 'Escape') {
            // Si la touche est "Échap"
            gestionPopup.classList.remove('active');
            // On ferme le popup
        }
    });
});
