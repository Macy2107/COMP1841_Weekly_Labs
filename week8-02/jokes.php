<?php
// Fixed: Added pdo as a global value
global $pdo;
try {
    include __DIR__ . "/includes/DatabaseConnection.php";
    include __DIR__ . "/includes/DatabaseFunctions.php";

    // Update SQL query to create  across the joke and author tables
    // Fixed: LEFT JOIN instead of INNER JOIN due to returns rows from left table (joke)
    $jokes = allJokes($pdo);
    $totalJokes = totalJokes($pdo);
    // Commented this line
//    $sql = "SELECT joke.id, joke.joketext, author.name, author.email FROM week8-01.joke
//    LEFT JOIN week8-01.author ON week8-01.joke.authorid = week8-01.author.id";

//    $jokes = $pdo->query($sql);
    $title = "My's Joke List";

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ob_start();
    include __DIR__ . "/templates/jokes.html.php";
    // Using the output buffering to store the file
    $output = ob_get_clean();


} catch (PDOException $e) {
    $title = "Warning: An error has been found !";
    $output = "Error found at: " . $e->getMessage();
}

function allJokes($pdo)
{
    $query = $pdo->prepare("SELECT joke.id, joke.joketext, author.name, author.email FROM week8.joke
    LEFT JOIN week8.author ON week8.joke.authorid = week8.author.id");

    $query->execute();
    return $query->fetchALL();

}

include __DIR__ . "/templates/layout.html.php";
