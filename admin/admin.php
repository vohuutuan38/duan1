<?php
include '../config/config.php';
include '../config/functions.php';

// Read page number from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 5; // Number of items per page

// Read products for the current page
$products = readProducts($page, $perPage);

// Get total product count for pagination
$totalProducts = getProductCount();

// Calculate total pages
$totalPages = ceil($totalProducts / $perPage);

// Display HTML for admin page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>

    <h2>Product List</h2>

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

        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['product_id']; ?></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['stock_quantity']; ?></td>
                <td><?php echo $product['image_url']; ?></td>
                <td><?php echo $product['category_id']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p>
        Pages:
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </p>

</body>

</html>