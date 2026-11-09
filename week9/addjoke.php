<?php
global $pdo;
if(isset($_POST["joketext"])) {
    try {
         include __DIR__ . "/includes/DatabaseConnection.php";
        // Insert dummies to joketext to update new joke data

        insertJoke($pdo, $_POST["joketext"]);

        // Mapping the insert joke function
        insert($pdo, "joke", [
                "authorid" => 208,
                "joketext" => $_POST["joketext"],
                "jokedate" => date("Y-m-d"),
                "pic" => $_POST["pic"]
            ]
        );

//        Added: Generic insert function
        function insert($pdo, $table, $values)
        {
            $query = "INSERT INTO `" . $table . "` (";

            foreach ($values as $key => $value) {
                $query .= ":" . $key . ",";
            }

            $query = rtrim($query, ",");
            $query .= ")";

            $stmt = $pdo->prepare($query);
            $stmt->execute($values);
        }


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
// Forward to the main html interface
include __DIR__ . "/templates/layout.html.php";