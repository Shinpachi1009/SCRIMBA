<?php

$uri = $_SERVER['REQUEST_URI'];

if ($uri == '/' ) {
    require 'controller/index.php';
} else if ($uri == '/create') {
    require 'controller/create.php';
} else if (preg_match('/^\/delete\/(\d+)$/', $uri, $matches)) {
    $_GET['id'] = $matches[1];
    require 'controller/delete.php';
} else if (preg_match('/^\/edit\/(\d+)$/', $uri, $matches)) {
    $_GET['id'] = $matches[1];
    require 'controller/edit.php';
} else {
    http_response_code(404);
    echo "404 Not Found";
}