<?php
require_once 'config.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$results = [];

if ($search !== '') {
    $stmt = $pdo->prepare("
        SELECT *
        FROM pokemon
        WHERE nom LIKE ?
           OR type1 LIKE ?
           OR type2 LIKE ?
           OR description LIKE ?
        ORDER BY
            CASE
                WHEN nom LIKE ? THEN 1
                ELSE 2
            END,
            nom ASC
    ");

    $stmt->execute([
        '%' . $search . '%',
        '%' . $search . '%',
        '%' . $search . '%',
        '%' . $search . '%',
        $search . '%'
    ]);

    $results = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats - <?= htmlspecialchars($search) ?></title>
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
                        value="<?= htmlspecialchars($search) ?>"
                        autocomplete="off"
                    >
                    <button type="submit">Rechercher</button>
                </form>
                <ul class="autocomplete-list"></ul>
            </div>
        </div>
    </header>

    <main class="results-container">
        <h1 class="results-title">Résultats pour : "<?= htmlspecialchars($search) ?>"</h1>

        <?php if ($search === ''): ?>
            <div class="empty">
                <p>Veuillez saisir une recherche.</p>
            </div>
        <?php elseif (empty($results)): ?>
            <div class="empty">
                <p>Aucun résultat trouvé.</p>
            </div>
        <?php else: ?>
            <?php foreach ($results as $pokemon): ?>
                <a href="element.php?id=<?= $pokemon['id'] ?>">
                    <article class="result-card">
                        <h2><?= htmlspecialchars($pokemon['nom']) ?></h2>
                        <p>
                            <span class="badge"><?= htmlspecialchars($pokemon['type1']) ?></span>
                            <?php if (!empty($pokemon['type2'])): ?>
                                <span class="badge"><?= htmlspecialchars($pokemon['type2']) ?></span>
                            <?php endif; ?>
                        </p>
                        <p><?= htmlspecialchars($pokemon['description']) ?></p>
                    </article>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>

        <a class="github-link" href="https://github.com/prenom-nom/autocompletion" target="_blank">
            Voir le projet GitHub
        </a>
    </main>

    <script src="script.js"></script>
</body>
</html>