<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Autocomplétion Pokémon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main class="hero">
        <div class="hero-box">
            <h1>PokéSearch</h1>
            <p>Recherchez un Pokémon avec autocomplétion en temps réel</p>

            <div class="hero-search">
                <form class="search-form" action="recherche.php" method="GET">
                    <input
                        type="text"
                        name="search"
                        class="autocomplete-input"
                        placeholder="Rechercher un Pokémon..."
                        autocomplete="off"
                    >
                    <button type="submit">Rechercher</button>
                </form>
                <ul class="autocomplete-list"></ul>
            </div>

            <a class="github-link" href="https://github.com/prenom-nom/autocompletion" target="_blank">
                Voir le projet GitHub
            </a>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>