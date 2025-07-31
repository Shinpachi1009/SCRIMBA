<!DOCTYPE html>
<html>
<head>
    <title>EDIT</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form method="post">
        <label>Name: <input type="text" name="name"
        value="<?= $items['name'] ?>" required></label><br>
        <label>Quantity: <input type="number" name="quantity" 
        value="<?= $items['quantity'] ?>" required></label><br>
        <label>Phone: <input type="text" name="description"
        value="<?= $items['description'] ?>"></label><br>
        <button type="submit">Update</button>
    </form>
    <a href="/">Back to list</a>
</body>
</html>