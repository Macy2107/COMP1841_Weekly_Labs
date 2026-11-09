<?php
// Added generic findAll function to find jokes and authors
function findAll($pdo, $table) {
    $stmt = $pdo->prepare("SELECT * FROM `" . $table . "`");
    $stmt->execute();
    return $stmt->fetchALL();
}

function update($pdo, $table, $primaryKey, $values)
{
    $query = "UPDATE `" . $table . "` SET ";

    foreach($values as $key => $value) {
        $query .= "`" . $key . "` = :" . $key . ",";
    }

        $query = rtrim($query, ",");
        $query .= " WHERE `" . $primaryKey . "` = :primaryKey";
        $values["primaryKey"] = $values["id"];

    $stmt = $pdo->prepare($query);
    $stmt->execute($values);

}


// Added Generic function find (findById because find is more generic)
function find($pdo, $table, $primaryKey, $values)
{
    $query = "SELECT * FROM `" . $table . "` WHERE `" . $primaryKey . "` = :value";
    $values = [":value" => $values];
    $stmt = $pdo->prepare($query);
    $stmt->execute($values);
    return $stmt->fetchAll();
}

// Added total generic function
function total($pdo, $table)
{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `" . $table . "`");
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
}

// Added generic allAuthors function
function all($pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM week9.author");
    $stmt->execute();
    return $stmt->fetchALL();
}

// Added generic deleteAuthor function
function delete($pdo, $table, $field, $value)
{
    $values = [":value" => $value];
    $stmt = $pdo->prepare("DELETE FROM `" . $table . "` WHERE `"
        . $field . "` = :value");
    $stmt->execute($values);
}

// Added InsertAuthor generic function
function insert($pdo, $table, $values)
{
    $query = "INSERT INTO `" . $table . "` (";
    foreach ($values as $key => $value) {
        $query .= "`" . $key . "`,";
    }
    // Remove last comma from query array
    $query = rtrim($query, ",");
    $query .= ") VALUES (";
    foreach ($values as $key => $value) {
        $query .= ":" . $key . ",";
    }
    $query = rtrim($query, ",");
    $query .= ")";

    $stmt = $pdo->prepare($query);
    $stmt->execute($values);

}

// Added generic Save function
function save($pdo, $table, $primaryKey, $record)
{
    try {
        if (empty($record[$primaryKey])) {
            unset($record[$primaryKey]);
        }
        insert($pdo, $table, $record);
    } catch (PDOException $e) {
        if (isset($e->errorInfo[1]) && $e->errorInfo[1] == 1062) {
            // Only update when the key already exists (duplicate entry)
            update($pdo, $table, $primaryKey, $record);
        } else {
            throw $e;
        }
    }
}