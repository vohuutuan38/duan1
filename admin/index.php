<?php
require_once '../models/pdo.php';

$category_sql = "SELECT * FROM Categories";
$categories = pdo_query($category_sql);

$product_sql = "SELECT * FROM Products";
$products = pdo_query($product_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product and Category Management</title>
    <style>
    </style>
</head>
<body>

    <h1>Product and Category Management</h1>

    <h2>Categories</h2>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li><?= $category['category_name'] ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Products</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock Quantity</th>
            <th>Image URL</th>
            <th>Category ID</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['product_id'] ?></td>
                <td><?= $product['product_name'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['stock_quantity'] ?></td>
                <td><?= $product['image_url'] ?></td>
                <td><?= $product['category_id'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
