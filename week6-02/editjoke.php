<?php
include __DIR__ . "/includes/DatabaseConnection.php";
global $pdo;
    try {
        if(isset($_POST["joketext"])) {
        // Update Joke table at joketext and id
        $sql = "UPDATE week6.joke 
                SET joketext = :joketext 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $_POST["jokeid"]);
        $stmt->bindValue(":joketext", $_POST["joketext"]);
        $stmt->execute();
        header("location: jokes.php");

        // Fixed: Reconnect to PDO database
        $jokes = $pdo->query($sql);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } else {
            $sql = "SELECT * 
                    FROM week6.joke 
                    WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $_GET["id"]);
            $stmt->execute();
            $joke = $stmt->fetch();
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

// Forward to the main html interface
include __DIR__ . "/templates/layout.html.php";