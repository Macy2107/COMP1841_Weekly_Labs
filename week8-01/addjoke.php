<?php
global $pdo;
if(isset($_POST["joketext"])) {
    try {
         include __DIR__ . "/includes/DatabaseConnection.php";
        // Insert dummies to joketext to update new joke data

        insertJoke($pdo, $_POST["joketext"]);

//        Commented this, we don't need this one anymore
//        $sql = "INSERT INTO week8-01.joke SET
//                joketext = :joketext,
//                jokedate = CURDATE(),
//                authorid = 1"; // Tweak the addjoke.php function with the new authorid column
//                $stmt = $pdo->prepare($sql);
//                $stmt->bindValue(":joketext", $_POST["joketext"]);
//                $stmt->execute();
        header("location: jokes.php");

    } catch (PDOException $e) {
        $title = "New error found at database !!!";
        $output = "Database error found at: " . $e->getMessage();
    }
} else {
    $title = "Add a new joke";
    ob_start();
    include __DIR__ . "/templates/addjoke.html.php";
    // Add buffer to add a new joke
    $output = ob_get_clean();
}

// Mapping the insert joke function
function insertJoke($pdo, $joketext)
{
    $stmt = $pdo->prepare("INSERT INTO week8.joke (week8.joke.joketext, week8.joke.jokedate, week8.joke.authorid)
    VALUES (:joketext, CURDATE(), :authorid)");

    $values = [
        ":joketext" => $joketext,
        ":authorid" => $authorid
    ];

    $stmt->execute($values);
}

// Forward to the main html interface
include __DIR__ . "/templates/layout.html.php";