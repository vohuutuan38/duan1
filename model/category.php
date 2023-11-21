<?php

function category_all()
{
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM Categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function category_one($category_id)
{
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM Categories WHERE category_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$category_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function category_add($data = [])
{
    $conn = pdo_get_connection();
    $sql = "INSERT INTO categories(category_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function category_delete($category_id)
{
    $conn = pdo_get_connection();
    $sql = "DELETE FROM categories WHERE category_id={$category_id}";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function category_update($data = [])
{
    $conn = pdo_get_connection();
    $sql = "UPDATE `category` SET `category_name` = ? WHERE `category`.`category_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
