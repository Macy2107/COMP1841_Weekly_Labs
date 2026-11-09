<?php
try {
    // Create connection to PDO
    // Fixed: The original connection host is localhost to "127.0.0.1"
    $pdo = new PDO('mysql:host=localhost;port=3306;
    dbname=week4;charset=utf8mb4', 'root', 'root');
    $output = "Database is successfully connected";

    // Retrieve joketext data from joke tabel
    // Assigned variable "jokes" and saved it to pdo query
    $jokes = $pdo->query("SELECT joketext FROM week4.joke");

} catch (PDOException $e) {
    $jokes = [];
    $output = "Cannot connect to the database" . $e->getMessage();
}

// Create a directory path to display the query results
include __DIR__ . '/templates/jokes.html.php';
