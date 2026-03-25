<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'config.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q === '') {
    echo json_encode([
        'starts_with' => [],
        'contains' => []
    ]);
    exit;
}

$startsStmt = $pdo->prepare("
    SELECT id, nom
    FROM pokemon
    WHERE nom LIKE ?
    ORDER BY nom ASC
    LIMIT 5
");
$startsStmt->execute([$q . '%']);
$startsWith = $startsStmt->fetchAll();

$containsStmt = $pdo->prepare("
    SELECT id, nom
    FROM pokemon
    WHERE nom LIKE ?
      AND nom NOT LIKE ?
    ORDER BY nom ASC
    LIMIT 5
");
$containsStmt->execute(['%' . $q . '%', $q . '%']);
$contains = $containsStmt->fetchAll();

echo json_encode([
    'starts_with' => $startsWith,
    'contains' => $contains
], JSON_UNESCAPED_UNICODE);
?>