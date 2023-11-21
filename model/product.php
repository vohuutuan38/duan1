<?php
function insert_product($product_name,$description ,$price,$quantity ,$image ,$category_id)
{
    $sql = "insert into Products(product_name,price,image,description,quantity,category_id) values('$product_name','$price','$image','$description','$quantity','$category_id')";
    pdo_execute($sql);
    // if ($sql) {
    //     $sql = "SELECT * FROM Products order by product_id desc limit 1";
    //     $a = pdo_query_one($sql);
    //     $product_id = $a['product_id'];
    //     $quantity = $_POST['quantity'];
    //     foreach ($quantity as $key => $quantity) {
    //         $sql = "INSERT INTO size (product_id,pr_size) values('$product_id','$quantity') ";
    //         pdo_execute($sql);
    //     }
    // }
    return $sql;
}
function loadall_product($kyw = "", $category_id = 0)
{
    $sql = "SELECT * FROM Products where 1";
    if ($kyw != "") {
        $sql .= " and product_name like '%" . $kyw . "%'";
    }
    if ($category_id > 0) {
        $sql .= " and category_id=  '" . $category_id . "'";
    }
    $sql .= " ORDER BY product_id desc";
    $list_product = pdo_query($sql);
    return $list_product;
}
function loadall_product_admin($kyw = "", $category_id = 0, $page = '')
{
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = '';
    }
    if ($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page * 7) - 7;
    }
    $sql = "SELECT * FROM Products where 1";
    if ($kyw != "") {
        $sql .= " and product_name like '%" . $kyw . "%'";
    }
    if ($category_id > 0) {
        $sql .= " and categori_id=  '" . $category_id . "'";
    }
    $sql .= " ORDER BY product_id desc LIMIT $begin,7";
    $list_product = pdo_query($sql);
    return $list_product;
}
function loadone_product($product_id)
{
    $sql = "select * from Products where product_id=" . $product_id;
    $product_one = pdo_query_one($sql);
    return $product_one;
}
function delete_product($product_id)
{
    $sql = "delete  from Products where product_id=" . $_GET['product_id'];
    $a = pdo_execute($sql);
    if ($sql) {
        $product_id = $a['product_id'];

        $sql = "delete from size where product_id=" . $_GET['product_id'];
        pdo_execute($sql);
    }
    return $sql;
}
function  update_product($product_id, $product_name, $price, $img, $description, $number_of_view, $category_id)
{
    $sql = "DELETE FROM `size` WHERE `product_id` =" . $product_id;
    pdo_execute($sql);
    if ($img != "") {
        $sql = "update Products set product_name='" . $product_name . "',price='" . $price . "',img='" . $img . "',description='" . $description . "',number_of_view='" . $number_of_view . "',category_id='" . $category_id . "' where product_id= " . $product_id;
    } else {
        $sql = "update product set product_name='" . $product_name . "',price='" . $price . "',description='" . $description . "',category_id='" . $category_id . "' where product_id= " . $product_id;
    }
    pdo_execute($sql);
    $pr_size = $_POST['pr_size'];
    foreach ($pr_size as $key => $pr_size) {
        $sql = "INSERT INTO size (product_id,pr_size) values('$product_id','$pr_size') ";
        pdo_execute($sql);
    }
    return $sql;
}
function loadall_size()
{
    $sql = "SELECT * FROM size";
    $list_size = pdo_query($sql);
    return $list_size;
}
function load_product_size($product_id)
{
    $sql = "SELECT * FROM `size` WHERE `product_id`=" . $product_id;
    $load_product_size = pdo_query($sql);
    return $load_product_size;
}
function loadall_product_home()
{
    $sql = "SELECT * FROM product where 1 order by product_id desc limit 0,8";
    $list_product = pdo_query($sql);
    return $list_product;
}
function loadall_product_home2()
{
    $sql = "SELECT * FROM product where 1 order by product_id desc limit 4,8";
    $list_product = pdo_query($sql);
    return $list_product;
}
function load_product_cungloai($product_id, $categori_id)
{
    $sql = "select * from product where categori_id=" . $categori_id . " and product_id<>" . $product_id . " LIMIT 0,8";
    $list_product = pdo_query($sql);
    return $list_product;
}

function load_all_product_man($page)
{
    $conn = pdo_get_connection();
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = '';
    }
    if ($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page * 12) - 12;
    }
    $sql = "SELECT * FROM product WHERE categori_id=4 LIMIT $begin,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function count_product_man()
{
    $sql = "SELECT * FROM product WHERE categori_id=4";
    $result = pdo_query($sql);
    return $result;
}
function load_all_product_women($page)
{
    $conn = pdo_get_connection();
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = '';
    }
    if ($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page * 12) - 12;
    }
    $sql = "SELECT * FROM product WHERE categori_id=2 LIMIT $begin,12";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function count_product_women()
{
    $sql = "SELECT * FROM product WHERE categori_id=2";
    $result = pdo_query($sql);
    return $result;
}
function search_pr($text_search)
{
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM product WHERE product_name LIKE '%$text_search%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
