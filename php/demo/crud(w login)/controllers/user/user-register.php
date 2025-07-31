<?php
//this file handles user registration
require 'database-connection.php';

//after the user submits the registration form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    //this will hash the password before storing it
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    try {
        //this will insert the new user into the database
        $query = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $query->execute([$username, $email, $password]);
        
        // Store user ID and username in session after successful registration
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $username;
        // Redirect to the home page after successful registration
        header("Location: /");
        exit;
    // If the username or email already exists, an exception will be thrown    
    } catch (PDOException $e) {
        $error = "Registration failed. Username or email might already be taken.";
    }
}

require 'views/user/user-register.php';