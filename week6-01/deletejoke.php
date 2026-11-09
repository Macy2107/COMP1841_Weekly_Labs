<?php
global $pdo;
try {
    include __DIR__ . "/includes/DatabaseConnection.php";

    $sql = "DELETE FROM week6.joke WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_POST["id"]);
    $stmt->execute();
    $title = "Delete joke";
} catch (PDOException $e) {
    $title = "Cannot delete !!!";
    $output = "A reason that interrupted this process may come from: " . $e->getMessage();
}

include __DIR__ . "/templates/layout.html.php";
