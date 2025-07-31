<?php

require 'database-connection.php';

// Check if the user is logged in
if (!isset($_GET["id"])) {
    http_response_code(400);
    echo "Bad Request: ID is required.";
    exit;
}

// Fetch the item details for editing
$id = $_GET["id"];
$query = $pdo->prepare("SELECT * FROM storage WHERE id = ?");
$query->execute([$id]);
$items = $query->fetch();

// this will work after the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    // Validate the item ID belongs to the logged-in user
    $query = $pdo->prepare("UPDATE storage SET name = ?, quantity = ?, description = ? WHERE id = ?");
    $query->execute([$name, $quantity, $description, $id]);

    // Redirect to the item show page after successful update
    header("Location: /");
    exit;
}

require 'views/item/item-edit.php';