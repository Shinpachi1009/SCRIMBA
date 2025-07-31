<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>STORAGE</title>
</head>
<body>
<h1>STORAGE</h1>
<?php if (isset($_SESSION['username'])): ?>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>! <a href="/logout">Logout</a></p>
    <a href="/create">Add Item/s</a>
<?php else: ?>
    <p><a href="/login">Login</a> or <a href="/register">Register</a></p>
<?php endif; ?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['id']) ?></td>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= htmlspecialchars($item['description']) ?></td>
            <td><?= htmlspecialchars($item['quantity']) ?></td>
            <td>
                <a href="/edit/<?= $item['id'] ?>">Edit</a>
                <a href="/delete/<?= $item['id'] ?>" onclick="return confirm('Do you want to delete this item?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>