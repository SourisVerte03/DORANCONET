<?php
// Database credentials
define('DB_HOST', 'localhost'); // Replace with your database host
define('DB_USER', 'root'); // Replace with your database user
define('DB_NAME', 'collaborative_wall'); // Replace with your database name
define('DB_Port',"3306"); // Replace with your database port

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ":".DB_Port. ";dbname=" . DB_NAME, DB_USER);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}