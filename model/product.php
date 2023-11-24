<?php
function insert_product($product_name, $price, $image, $description, $category_id, $quantity, $color, $size)
{
    $sql = "insert into Products(product_name, price,image,description,category_id) values ('$product_name','$price','$image','$description','$category_id')";
    // echo "Debug: sql = $sql";
    // echo "Debug: price = $price";
    pdo_execute($sql);
    if ($sql) {
        // Lấy thông tin sản phẩm vừa thêm vào
        $sql = "SELECT * FROM Products ORDER BY product_id DESC LIMIT 1";
        $a = pdo_query_one($sql);
        $product_id = $a['product_id'];

        // Lấy thông tin từ form
        $quantity = $_POST['quantity'];
        $color = $_POST['color'];
        $size = $_POST['size'];

        // Kiểm tra số lượng mảng và thực hiện thêm vào ProductVariants
        if (is_numeric($quantity) && is_array($color) && is_array($size)) {
            // Lặp qua các mảng color và size để thêm biến vào ProductVariants
            foreach ($color as $key => $color_value) {
                $size_value = $size[$key];

                // Thêm biến vào ProductVariants
                $sql_variant = "INSERT INTO ProductVariants (product_id, stock_quantity, color, size) VALUES ('$product_id', '$quantity', '$color_value', '$size_value')";
                echo "Debug: sql = $sql_variant";
                pdo_execute($sql_variant);
            }
        } else {
            echo "Lỗi: Số lượng không hợp lệ hoặc mảng color/size rỗng.";
        }
    } else {
        echo "Lỗi: Không thể thêm sản phẩm.";
    }

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
    $sql = "DELETE FROM Products WHERE product_id=" . $product_id;
    $a = pdo_execute($sql);

    if ($a) {
        $sql = "DELETE FROM ProductVariants WHERE product_id=" . $product_id;
        pdo_execute($sql);
    }

    return $a;
}

function update_product($product_id, $product_name, $price, $image, $description, $category_id)
{
    $sql = "DELETE FROM `size` WHERE `product_id` =" . $product_id;
    pdo_execute($sql);
    if ($image != "") {
        $sql = "update Products set product_name='" . $product_name . "',price='" . $price . "',img='" . $image . "',description='" . $description . "',category_id='" . $category_id . "' where product_id= " . $product_id;
    } else {
        $sql = "update Products set product_name='" . $product_name . "',price='" . $price . "',description='" . $description . "',category_id='" . $category_id . "' where product_id= " . $product_id;
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
    $sql = "SELECT * FROM product WHERE category_id=4 LIMIT $begin,12";
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
