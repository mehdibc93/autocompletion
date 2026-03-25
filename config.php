<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'autocompletion';
$user = 'root';
$pass = '';

// Options PDO (important pour éviter les bugs)
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Affiche les erreurs
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Résultats en tableau associatif
    PDO::ATTR_EMULATE_PREPARES => false // Sécurité + meilleures performances
];

try {
    // Connexion à la base de données
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass,
        $options
    );
} catch (PDOException $e) {
    // Message d'erreur clair
    die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
}
?>