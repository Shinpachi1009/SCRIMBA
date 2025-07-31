<?php
require 'database-connection.php';

// this will destroy the session and log the user out
session_destroy();
header("Location: /login");
exit;