<?php
function totalJokes($pdo)
{
    $sql = "SELECT COUNT(*) FROM week8.joke";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
}
