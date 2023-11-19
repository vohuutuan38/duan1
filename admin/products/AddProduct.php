<?php
require_once '../../models/pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $image_url = $_POST['image_url'];
    $category_id = $_POST['category_id'];

    $product_sql = "INSERT INTO Products (product_name, description, price, stock_quantity, image_url, category_id) VALUES (?, ?, ?, ?, ?, ?)";
    
    try {
        pdo_execute($product_sql, $product_name, $description, $price, $stock_quantity, $image_url, $category_id);
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        // Xử lý lỗi tại đây nếu cần
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        /* Thêm các định dạng CSS tại đây */
    </style>
</head>
<body>

    <h1>Add Product</h1>

    <form action="addProduct.php" method="post">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required><br>
        <label for="description">Description:</label>
        <textarea name="description"></textarea><br>
        <label for="price">Price:</label>
        <input type="text" name="price" required><br>
        <label for="stock_quantity">Stock Quantity:</label>
        <input type="text" name="stock_quantity" required><br>
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url"><br>
        <label for="category_id">Category ID:</label>
        <input type="text" name="category_id"><br>
        <input type="submit" value="Add Product">
    </form>

    <a href="index.php">Back to Product and Category List</a>

</body>
</html>
