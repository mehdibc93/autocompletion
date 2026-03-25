<?php
require_once 'config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT * FROM pokemon WHERE id = ?");
$stmt->execute([$id]);
$pokemon = $stmt->fetch();

if (!$pokemon) {
    http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pokemon ? htmlspecialchars($pokemon['nom']) : 'Élément introuvable' ?>
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="topbar">
        <div class="topbar-content">
            <a href="index.php" class="logo">PokéSearch</a>

            <div class="search-area">
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
        </div>
    </header>

    <main class="element-container">
        <?php if (!$pokemon): ?>
            <div class="empty">
                <p>Élément introuvable.</p>
            </div>
        <?php else: ?>
            <article class="element-card">
                <div class="element-header">
                    <?php if (!empty($pokemon['image'])): ?>
                        <img src="<?= htmlspecialchars($pokemon['image']) ?>" alt="<?= htmlspecialchars($pokemon['nom']) ?>">
                    <?php endif; ?>

                    <div>
                        <h1><?= htmlspecialchars($pokemon['nom']) ?></h1>
                        <p>
                            <span class="badge"><?= htmlspecialchars($pokemon['type1']) ?></span>
                            <?php if (!empty($pokemon['type2'])): ?>
                                <span class="badge"><?= htmlspecialchars($pokemon['type2']) ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>

                <p><?= htmlspecialchars($pokemon['description']) ?></p>

                <br>
                <a href="recherche.php?search=<?= urlencode($pokemon['nom']) ?>" class="github-link">
                    Voir les résultats liés
                </a>
                <br>
                <a class="github-link" href="https://github.com/prenom-nom/autocompletion" target="_blank">
                    Voir le projet GitHub
                </a>
            </article>
        <?php endif; ?>
    </main>

    <script src="script.js"></script>
</body>
</html>