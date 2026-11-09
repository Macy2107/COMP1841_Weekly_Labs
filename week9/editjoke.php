<?php
// Fixed: Added values as a global variable
global $values;
include __DIR__ . "/includes/DatabaseConnection.php";
include __DIR__ . "/includes/DatabaseFunctions.php";
global $pdo;
    try {
        if(isset($_POST["joketext"])) {

            // Added Save
            save($pdo, "joke", "id",
                [   "id" => $_POST["jokeid"],
                    "joketext" => $_POST["joketext"],
                    "jokedate" => date("Y-m-d"),
                    "pic" => $_POST["pic"] ?? "",
                    "authorid" => 208
                ]);

            header("location: jokes.php");
            exit;
        } else {
            if (isset($_GET["id"])) {
                $joke = find($pdo, "joke", "id", $_GET["id"]) [0] ?? null;
            } else {
                $joke = null;
            }
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