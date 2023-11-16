<?php

function readProducts($page, $perPage)
{
    global $conn;

    $offset = ($page - 1) * $perPage;

    $sql = "SELECT * FROM Products LIMIT $offset, $perPage";
    $result = $conn->query($sql);

    $products = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    return $products;
}

function getProductCount()
{
    global $conn;

    $sql = "SELECT COUNT(*) as count FROM Products";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    return $row['count'];
}
