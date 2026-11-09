<?php
// Fixed: Added pdo as a global value
global $pdo;
try {
    include __DIR__ . "/includes/DatabaseConnection.php";

    $sql = "SELECT joketext FROM week5.joke";
    $jokes = $pdo->query($sql);
    $title = "My's Joke List";

    ob_start();
    include __DIR__ . "/templates/jokes.html.php";
    // Using the output buffering to store the file
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = "Warning: An error has been found !";
    $output = "Error found at: " . $e->getMessage();
}

include __DIR__ . "/templates/layout.html.php";
