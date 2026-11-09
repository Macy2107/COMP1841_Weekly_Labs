<?php
global $pdo;
try {
    include __DIR__ . "/includes/DatabaseConnection.php";

    deletejoke($pdo, $_POST["id"]);
//    $sql = "DELETE FROM week8-01.joke WHERE id = :id";
//    $stmt = $pdo->prepare($sql);
//    $stmt->bindValue(":id", $_POST["id"]);
//    $stmt->execute();
//    $title = "Delete joke";

    // Added header
    header("location: jokes.php");
} catch (PDOException $e) {
    $title = "Cannot delete !!!";
    $output = "A reason that interrupted this process may come from: " . $e->getMessage();
}

function deletejoke($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM week8.joke
    WHERE id = :id");
    $values = [":id" => $id ];
    $stmt->execute($values);
}
include __DIR__ . "/templates/layout.html.php";
