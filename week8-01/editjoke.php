<?php
include __DIR__ . "/includes/DatabaseConnection.php";
include __DIR__ . "/includes/DatabaseFunctions.php";
global $pdo;
    try {
        if(isset($_POST["joketext"])) {
        // Update Joke table at joketext and id
        updateJoke($pdo, $_POST["jokeid"], $_POST["joketext"], 1);
        header("location: jokes.php");

        } else {
            $joke = getJoke($pdo, $_GET["id"]);
            // Fixed: Changed joke.php to editjoke.php
            // Should delete header from previous code
            $title = "Edit joke";

            // Forward to the editjoke HTML file
            // Use buffer to activate
            ob_start();
            include __DIR__ . "/templates/editjoke.html.php";
            $output = ob_get_clean();

        }

    } catch (PDOException $e) {
        $title = "New error found !!!";
        $output = "Error editing joke: " . $e->getMessage();
    }

function updateJoke($pdo, $jokeid, $joketext, $authorid)
{
    $stmt = $pdo->prepare("UPDATE week8.joke SET
    `joketext` = :joketext,
    `authorid` = :authorid
     WHERE `id` = :id");

    $values = [
        ":joketext" => $joketext,
        ":authorid" => $authorid,
        ":id" => $jokeid
    ];

    $stmt->execute($values);
}

// Get a single joke
function getJoke($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT * FROM week8.joke WHERE id = :id");
    $values = [":id" => $id];
    $stmt->execute($values);

    return $stmt->fetch();
}
// Forward to the main html interface
include __DIR__ . "/templates/layout.html.php";