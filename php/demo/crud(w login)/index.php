<?php
session_start();

// index.php
// This file serves as the entry point for the application
$uri = $_SERVER["REQUEST_URI"];

//if the URI is empty, redirect to the home page
if ($uri == "/") {
    require 'controllers/item/item-show.php';
// If the URI is /create, load the item-create controller
} else if ($uri == '/create') {
    require 'controllers/item/item-create.php';
// If the URI matches /edit/{id}, load the item-edit controller
} else if ($uri == '/create') {
    require 'controllers/item/item-create.php';
// If the URI matches /edit/{id}, load the item-edit controller
} else if (preg_match('/^\/edit\/(\d+)$/', $uri, $matches)) {
    $_GET['id'] = $matches[1];
    require 'controllers/item/item-edit.php';
// If the URI matches /delete/{id}, load the item-delete controller
} else if (preg_match('/^\/delete\/(\d+)$/', $uri, $matches)) {
    $_GET['id'] = $matches[1];
    require 'controllers/item/item-delete.php';
// If the URI is /login, load the user-login controller
} else if ($uri == '/login') {
    require 'controllers/user/user-login.php';
// If the URI is /register, load the user-register controller
} else if ($uri == '/register') {
    require 'controllers/user/user-register.php';
// If the URI is /logout, load the user-logout controller
} else if ($uri == '/logout') {
    require 'controllers/user/user-logout.php';
} else {
    // If the URI does not match any known routes, return a 404 error
    http_response_code(404);
    echo "Page not found.";
}
?>