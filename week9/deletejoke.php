<?php
global $pdo;
try {
    include __DIR__ . "/includes/DatabaseConnection.php";
    include __DIR__ . "/includes/DatabaseFunctions.php";

    //    deletejoke($pdo, $_POST["id"]);
    delete($pdo, "joke", "id", $_POST["id"]);

    // Added header
    header("location: jokes.php");
} catch (PDOException $e) {
    $title = "Cannot delete !!!";
    $output = "A reason that interrupted this process may come from: " . $e->getMessage();
}

include __DIR__ . "/templates/layout.html.php";
