<?php /** @var array $pdo */ ?>
<?php
include __DIR__ . "/includes/DatabaseConnection.php";

function totalJokes($pdo)
{
    $query = $pdo->prepare("SELECT COUNT(*) FROM week8.joke");
    $row = $query->fetch();
    return $row[0];
}

echo totalJokes($pdo);
