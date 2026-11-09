<?php
$pdo = new PDO('mysql:host=localhost;port=3306;
    dbname=week5;charset=utf8mb4', 'root', 'root');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);