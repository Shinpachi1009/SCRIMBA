<?php 
require 'database-connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

// Fetch all items for the logged-in user
$query = $pdo->prepare("SELECT * FROM storage WHERE user_id = ?");
$query->execute([$_SESSION['user_id']]);
$items = $query->fetchAll();

require 'views/item/item-show.php';
?>