<?php

require 'db.php';

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();

require 'view/index.view.php';

?>




