<?php
require 'database-connection.php';

// this will check if the user is already logged in after clicking the login button
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // this will check the database for the user credentials
    $query = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $query->execute([$username]);
    $user = $query->fetch();

    // Verify the password
    if ($user && password_verify($password, $user['password'])) {

        // Store user ID and username in session after successful login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: /");
        exit;
        // If the credentials are incorrect, an error message will be displayed
    } else {
        $error = "Invalid username or password.";
    }
}

require 'views/user/user-login.php';