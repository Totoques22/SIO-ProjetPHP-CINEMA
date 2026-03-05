<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter un cinéma</title>

    <link rel="stylesheet" href="/styles.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body class="add-actor-body">

@include('pages.header-admin')

<main class="add-actor-page">
    <h1 class="add-actor-title">Ajouter un cinéma</h1>

    <form class="add-actor-form" action="/cinema/ajouter" method="POST">
        @csrf

        <div class="add-actor-grid">
            <input
                type="text"
                name="nom"
                class="add-actor-input"
                placeholder="Nom"
                required
            />

            <input
                type="text"
                name="adresse"
                class="add-actor-input"
                placeholder="Adresse"
                required
            />

            <input
                type="text"
                name="code_postal"
                class="add-actor-input"
                placeholder="Code postal"
            />

            <input
                type="text"
                name="ville"
                class="add-actor-input"
                placeholder="Ville"
            />

            <input
                type="number"
                name="nb_salles"
                class="add-actor-input"
                placeholder="Nombre de salles"
                min="1"
            />

            <input
                type="number"
                name="nb_places"
                class="add-actor-input"
                placeholder="Nombre de places"
                min="1"
            />

            <div class="special-rooms-box">
                <p class="special-rooms-title">Salles spéciales</p>

                <div class="special-rooms-grid">
                    <label class="special-room-item">
                        <input type="checkbox" name="salles_speciales[]" value="IMAX">
                        <span>IMAX</span>
                    </label>

                    <label class="special-room-item">
                        <input type="checkbox" name="salles_speciales[]" value="4DX">
                        <span>4DX</span>
                    </label>

                    <label class="special-room-item">
                        <input type="checkbox" name="salles_speciales[]" value="Dolby Cinema">
                        <span>Dolby Cinema</span>
                    </label>


                    <label class="special-room-item">
                        <input type="checkbox" name="salles_speciales[]" value="3D">
                        <span>3D</span>
                    </label>

                    <label class="special-room-item">
                        <input type="checkbox" name="salles_speciales[]" value="VIP">
                        <span>VF</span>
                    </label>

                    <label class="special-room-item">
                        <input type="checkbox" name="salles_speciales[]" value="VO">
                        <span>VO</span>
                    </label>

                </div>
            </div>
        </div>

        <div class="add-actor-actions">
            <button type="submit" class="add-actor-submit">Ajouter</button>
        </div>
    </form>
</main>

</body>
</html>
