<?php
require_once '../../models/pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];

    $category_sql = "INSERT INTO Categories (category_name) VALUES (?)";
    
    try {
        pdo_execute($category_sql, $category_name);
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
    <title>Add Category</title>
    <style>
        /* Thêm các định dạng CSS tại đây */
    </style>
</head>
<body>

    <h1>Add Category</h1>

    <form action="addCategory.php" method="post">
        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" required><br>
        <input type="submit" value="Add Category">
    </form>

    <a href="index.php">Back to Product and Category List</a>

</body>
</html>
