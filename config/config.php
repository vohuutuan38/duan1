<?php
$servername = "localhost";
$port = "3306";
$username = "henry";
$password = "phong1999";
$dbname = "valiu";

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
