document.addEventListener('DOMContentLoaded', function () {
    // On attend que tout le code HTML de la page soit chargé et prêt
    // avant d'exécuter notre script (très important pour éviter les erreurs).

    function resetRow(row) {
        // Cette fonction sert à "nettoyer" une ligne.
        // Quand on clone (copie) une ligne, on copie aussi ce que l'utilisateur a tapé.
        // Cette fonction permet de remettre les champs à zéro sur la nouvelle ligne.

        row.querySelectorAll('select').forEach(function (select) {
            // On cherche tous les menus déroulants (<select>) dans cette ligne spécifique.

            select.selectedIndex = 0;
            // On les remet sur la première option (souvent l'option vide ou par défaut).
        });

        row.querySelectorAll('input').forEach(function (input) {
            // On cherche tous les champs de saisie (<input>) dans la ligne.

            if (input.type !== 'button' && input.type !== 'submit' && input.type !== 'hidden') {
                // On vérifie le type de l'input.
                // On ne veut pas vider la valeur des boutons ou des champs cachés du système.

                input.value = '';
                // Si c'est un champ texte classique, on vide le texte qu'il contient.
            }
        });
    }

    document.addEventListener('click', function (event) {
        // On écoute TOUS les clics qui se produisent n'importe où sur la page.
        // cela permet de détecter les clics même sur des
        // éléments qui n'existaient pas au chargement de la page (les nouvelles lignes créées).

        // ==========================================
        // ACTION : CLIC SUR LE BOUTON "+" (AJOUTER)
        // ==========================================
        const addBtn = event.target.closest('.js-add-row');
        // event.target représente l'élément exact qui a été cliqué (ex: l'icône dans le bouton).
        // closest() remonte l'arbre HTML pour trouver le parent le plus proche qui a la classe '.js-add-row'.
        // Si on a bien cliqué sur (ou dans) un bouton d'ajout, addBtn existera.

        if (addBtn) {
            // Si on a bien cliqué sur un bouton d'ajout :

            const currentRow = addBtn.closest('.js-repeat-row');
            // On trouve la ligne entière (le bloc) dans laquelle se trouve ce bouton.

            const list = addBtn.closest('.js-repeat-list');
            // On trouve le conteneur global qui englobe toutes ces lignes.

            if (!currentRow || !list) return;
            // Sécurité : si on ne trouve pas la ligne ou la liste, on arrête tout pour éviter un bug.

            const newRow = currentRow.cloneNode(true);
            // On crée une copie conforme (un clone) de la ligne actuelle.
            // Le "true" signifie qu'on copie la ligne ET tout ce qu'elle contient (ses enfants HTML).

            resetRow(newRow);
            // On fait appel à notre fonction définie plus haut pour vider les champs du clone.
            // Sinon, le clone contiendrait le même texte que la ligne d'origine.

            currentRow.insertAdjacentElement('afterend', newRow);
            // On insère le nouveau clone dans le code HTML, pile en dessous ('afterend')
            // de la ligne sur laquelle on vient de cliquer.

            return;
            // On arrête l'exécution de la fonction ici, puisque le travail d'ajout est terminé.
        }

        // ==========================================
        // ACTION : CLIC SUR LE BOUTON "×" (SUPPRIMER)
        // ==========================================
        const removeBtn = event.target.closest('.js-remove-row');
        // Même principe : on cherche si le clic correspond à un bouton de suppression (×).

        if (removeBtn) {
            // Si on a bien cliqué sur un bouton de suppression :

            const row = removeBtn.closest('.js-repeat-row');
            // On récupère la ligne à supprimer.

            const list = removeBtn.closest('.js-repeat-list');
            // On récupère le conteneur global.

            if (!row || !list) return;
            // Sécurité habituelle.

            const rows = list.querySelectorAll('.js-repeat-row');
            // On compte combien de lignes de ce type existent actuellement dans la liste.

            if (rows.length <= 1) {
                // Règle de gestion : s'il ne reste qu'UNE SEULE ligne, on ne la supprime pas.
                // On a toujours besoin d'au moins une ligne vide affichée à l'écran.

                row.querySelectorAll('select').forEach(function (select) {
                    select.selectedIndex = 0;
                    // Du coup, au lieu de supprimer la ligne HTML, on se contente
                    // de remettre son menu déroulant à zéro.
                });

                return;
                // On arrête l'exécution ici, la ligne est sauvée (mais vidée).
            }

            row.remove();
            // Si on a plus d'une ligne, alors on détruit purement et simplement
            // l'élément HTML de la page.
        }
    });

});
