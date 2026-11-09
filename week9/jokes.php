<?php
// Fixed: Added pdo as a global value
global $pdo;

try {
    include __DIR__ . "/includes/DatabaseConnection.php";
    include __DIR__ . "/includes/DatabaseFunctions.php";

    // Add results and recall the findAll function
    $result = findAll($pdo, "joke");
    $joke = [];
    foreach ($result as $joke) {
        // Foreign key connected with author table for name and email
        $author = find($pdo, "author", "id", $joke["authorid"])[0];

        $jokes[] = [
            "id" => $joke["id"],
            "joketext" => $joke["joketext"],
            "jokedate" => $joke["jokedate"],
            "pic" => $joke["pic"],
            "name" => $author["name"],
            "email" => $author["email"]
        ];
    }

    // Added jokes and authors to list
    $allJokes = findAll($pdo, "joke");
    $allAuthors = findAll($pdo, "author");

    $title = "My's Joke List";
    //  Added totalJokes
    $totalJokes = total($pdo, "joke");

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
    $query = $pdo->prepare("SELECT joke.id, joke.joketext, author.name, author.email FROM week9.joke
    LEFT JOIN week9.author ON week9.joke.authorid = week9.author.id");

    $query->execute();
    return $query->fetchALL();

}


include __DIR__ . "/templates/layout.html.php";
