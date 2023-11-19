<?php
function insertProduct($product_name, $description, $price, $stock_quantity, $image_url, $category_id)
{
    $sql = "insert into product(product_name,description,price,stock_quantity,image_url,category_id) values('$product_name','$description','$price','$image_url','$stock_quantity','$category_id')";
    pdo_execute($sql);
    if ($sql) {
        $sql = "SELECT * FROM product order by product_id desc limit 1";
        $value = pdo_query_one($sql);
        $product_id = $value['product_id'];
    }
    return $sql;
}
function getAllProduct($value = "", $category_id = 0)
{
    $sql = "SELECT * FROM product where 1";
    if ($value != "") {
        $sql .= " and product_name like '%" . $value . "%'";
    }
    if ($category_id > 0) {
        $sql .= " and category_id=  '" . $category_id . "'";
    }
    $sql .= " ORDER BY product_id desc";
    $list_product = pdo_query($sql);
    return $list_product;
}

function getOneProduct($product_id)
{
    $sql = "select * from product where product_id=" . $product_id;
    $product_one = pdo_query_one($sql);
    return $product_one;
}
function deleteProduct($product_id)
{
    $sql = "delete  from product where product_id=" . $_GET['product_id'];
    $a = pdo_execute($sql);
    if ($sql) {
        $product_id = $a['product_id'];

        $sql = "delete from size where product_id=" . $_GET['product_id'];
        pdo_execute($sql);
    }
    return $sql;
}
function updateProduct($product_id, $product_name, $description, $price, $image_url, $category_id)
{
    $sql = "DELETE FROM `size` WHERE `product_id` =" . $product_id;
    pdo_execute($sql);
    if ($image_url != "") {
        $sql = "update product set product_name='" . $product_name . "',price='" . $price . "',image_url='" . $image_url . "',description='" . $description . "',category_id='" . $category_id . "' where product_id= " . $product_id;
    } else {
        $sql = "update product set product_name='" . $product_name . "',price='" . $price . "',description='" . $description . "',category_id='" . $category_id . "' where product_id= " . $product_id;
    }
    pdo_execute($sql);
    return $sql;
}
