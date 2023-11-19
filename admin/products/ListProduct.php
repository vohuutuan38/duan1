<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
</head>
<body>

<?php
include_once '../../models/pdo.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    $productId = $_GET['delete_id'];
    $product = pdo_query_one("SELECT * FROM Products WHERE product_id = ?", $productId);

    if ($product) {
        pdo_execute("DELETE FROM Products WHERE product_id = ?", $productId);
        echo "<p>Sản phẩm '{$product['product_name']}' đã được xóa thành công!</p>";
    } else {
        echo "<p>Không tìm thấy sản phẩm.</p>";
    }
}

$sql = "SELECT * FROM Products";
$products = pdo_query($sql);

echo "<h2>Danh sách sản phẩm</h2>";

if ($products) {
    echo "<table border='1'>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Danh mục</th>
                <th>Thao tác</th>
            </tr>";

    foreach ($products as $product) {
        $updateUrl = "UpdateProduct.php?id=" . $product['product_id'];
        $deleteUrl = "ListProduct.php?delete_id=" . $product['product_id'];

        echo "<tr>
                <td>{$product['product_id']}</td>
                <td>{$product['product_name']}</td>
                <td>{$product['price']}</td>
                <td>{$product['description']}</td>
                <td>{$product['category_id']}</td>
                <td>
                    <a href='{$updateUrl}'>Sửa</a> | 
                    <a href='{$deleteUrl}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm?\")'>Xóa</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>Không có sản phẩm nào.</p>";
}
?>
</body>
</html>
