<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <label>Name: <input type="text" name="name"
        value="<?= htmlspecialchars($user['name']) ?>" required></label><br>
        <label>Email: <input type="email" name="email" 
        value="<?= htmlspecialchars($user['email']) ?>" required></label><br>
        <label>Phone: <input type="text" name="phone"
        value="<?= htmlspecialchars($user['phone']) ?>"></label><br>
        <button type="submit">Update</button>
    </form>
    <a href="/">Back to list</a>
</body>
</html>