<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            width: 200px;
            background-color: #555;
            padding: 20px;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #4CAF50;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        form {
            margin-top: 20px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <header>
        <h1>Trang quản trị</h1>
    </header>

    <nav>
        <a href="admin.php">Dashboard</a>
        <a href="admin.php?page=products">Quản lý Sản phẩm</a>
    </nav>

    <div class="content">
        <?php
        include '../models/pdo.php';
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        switch ($page) {
            case 'products':
                include 'products/ListProduct.php';
                break;
            default:
                echo "<h2>Chào mừng đến trang quản trị!</h2>";
                break;
        }
        ?>
    </div>

</body>

</html>