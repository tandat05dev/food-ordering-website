<?php

$host = "127.0.0.1";
$dbname = "restaurant";
$port = 3306;
$username = "root";
$password = "Tandat03082005@";

$dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    throw new Exception("Database error: " . $e->getMessage());
}