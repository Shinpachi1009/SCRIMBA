<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
<h1>Users</h1>
<a href="/create">Create New User</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['phone']) ?></td>
            <td>
                <a href="/edit/<?= $user['id'] ?>">Edit</a>
                <a href="/delete/<?= $user['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
