<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Inscription</title>
    <link rel="stylesheet" href="{{ asset('Connexion_style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
                <img src="{{ asset('logo_CineForAll.png') }}"
                 width="289.5"
                 height="260.5">


    <div class="form-section">
        <div class="form-card">
            <h1>Connexion</h1>

            <form>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="submit-btn">Se connecter</button>
            </form>

            <div class="login-link">
                Pas encore inscrit ? <a href="#">S'inscrire ici</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>
