<?php 

// database-connection.php
// This file establishes a connection to the database using PDO
$host = 'localhost';
$user = 'root';
$password = '12345';
$charset = 'utf8mb4';
$dbname = 'simple_crud';

// Data Source Name (DSN) for the database connection
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    // Set the PDO error mode to exception
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Create a new PDO instance
// This will throw an exception if the connection fails
try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
