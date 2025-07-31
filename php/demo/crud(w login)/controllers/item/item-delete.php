<?php
require 'database-connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

// Handle the deletion of an item
if (isset($_GET["id"])) {
    $id = $_GET["id"];
   
    // Check if the item exists and belongs to the logged-in user
    $checkQuery = $pdo->prepare("SELECT id FROM storage WHERE id = ? AND user_id = ?");
    $checkQuery->execute([$id, $_SESSION['user_id']]);
    $item = $checkQuery->fetch();
    
    // If the item does not exist or does not belong to the user, return a 403 error
    if (!$item) {
        http_response_code(403);
        echo "You don't have permission to delete this item.";
        exit;
    }
    
    // Proceed to delete the item
    $query = $pdo->prepare("DELETE FROM storage WHERE id = ?");
    $query->execute([$id]);

    // Redirect to the item show page after successful deletion
    header("Location: /");
    exit;
// If the ID is not provided, return a 400 error
} else {
    http_response_code(400);
    echo "Bad Request: ID is required.";
}