<?php
require 'database-connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

// Handle the form submission for creating or updating an item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'] ?? '';
    $user_id = $_SESSION['user_id'];

    // Check if an item with the same name already exists for this user
    $checkQuery = $pdo->prepare("SELECT id, quantity FROM storage WHERE name = ? AND user_id = ?");
    $checkQuery->execute([$name, $user_id]);
    $existingItem = $checkQuery->fetch();

    if ($existingItem) {
        // Update the existing item's quantity
        $newQuantity = $existingItem['quantity'] + $quantity;
        $updateQuery = $pdo->prepare("UPDATE storage SET quantity = ?, description = ? WHERE id = ?");
        $updateQuery->execute([$newQuantity, $description, $existingItem['id']]);
    } else {
        // Create a new item
        $query = $pdo->prepare("INSERT INTO storage (name, quantity, description, user_id) VALUES (?, ?, ?, ?)");
        $query->execute([$name, $quantity, $description, $user_id]);
    }
    // Redirect to the item show page after successful creation or update
    header("Location: /");
    exit;
}

require 'views/item/item-create.php';