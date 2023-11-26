<?php

function load_all_bill($kyw = "", $user_id = 0)
{
    $sql = "SELECT * FROM Bill WHERE 1";
    if ($kyw != "") {
        $sql .= " and bill_id like '%" . $kyw . "%'";
    }
    if ($user_id > 0) {
        $sql .= " and user_id ='" . $user_id . "' ";
    }
    $sql .= " ORDER BY bill_id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function delete_bill($bill_id)
{

    $sql = "DELETE FROM Cart WHERE `bill_id` = {$bill_id}";
    pdo_execute($sql);

    $sql = "DELETE FROM Bill WHERE `bill_id` = {$bill_id}";
    pdo_execute($sql);
}
function update_bill($stt, $id)
{
    $sql = "UPDATE Bill SET status= '" . $stt . "' WHERE bill_id =" . $id;
    pdo_execute($sql);
}
function load_one_bill($id)
{
    $sql = "SELECT * FROM Bill WHERE bill_id=" . $id;
    $one_bill = pdo_query_one($sql);
    return $one_bill;
}
function load_bill_detail($id)
{
    $sql = "SELECT Cart.product_name, Cart.price,Cart.size_id, Cart.amount, Bill.total_money, Products.image,Bill.bill_id FROM Bill JOIN Cart ON Bill.bill_id=Cart.bill_id JOIN Products ON Cart.product_id=Products.product_id WHERE Bill.bill_id=" . $id;
    $one_bill = pdo_query($sql);
    return $one_bill;
}
//alo
function insert_bill($username, $email, $address, $phone, $total_money, $pttt, $status, $user_id, $ngaydathang)
{
    $sql = "INSERT INTO `Bill` (`fullname`, `email`, `address`, `phone`, `total_money`, `pttt`, `status`, `user_id`, `ngaydathang`) VALUES ('$username', '$email', '$address', '$phone', '$total_money', '$pttt', '$status', '$user_id', '$ngaydathang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_new_bill($username, $address, $phone, $total_money, $pttt, $status, $user_id, $ngaydathang)
{
    $sql = "INSERT INTO `Bill` (`fullname`, `address`, `phone`, `total_money`, `pttt`, `status`, `user_id`, `ngaydathang`) VALUES ('$username', '$address', '$phone', '$total_money', '$pttt', '$status', '$user_id', '$ngaydathang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($user_id, $price, $amount, $product_id, $size, $color, $bill_id, $product_name)
{

    $sql = "INSERT INTO `Cart` (`user_id`, `price`, `amount`, `product_name`, `product_id`, `size`,`color`,`bill_id`) VALUES ('$user_id', '$price', '$amount', '$product_name','$product_id', '$size','$color','$bill_id')";
    return pdo_execute($sql);
}
function list_cart($bill_id)
{
    $sql = "SELECT * FROM `Cart` WHERE `Cart`.`bill_id`=" . $bill_id;
    $cart =  pdo_query($sql);
    return $cart;
}
//đếm số sản phẩm
function count_cart($bill_id)
{
    $sql = "SELECT * FROM `Cart` WHERE `Cart`.`bill_id`=" . $bill_id;
    $cart =  pdo_query($sql);
    return sizeof($cart);
}
function total_cart()
{
    $total_price = 0;
    foreach ($_SESSION['fake_cart'] as $cart) {
        $total = $cart[2] * $cart[4];
        $total_price += $total;
    }
    return $total_price + 50;
}
function total_cart_admin()
{
    $total_price = 0;
    foreach ($_SESSION['admin_cart'] as $cart) {
        $total = $cart[3] * $cart[4];
        $total_price += $total;
    }
    return $total_price + 50;
}
function list_img_cart($user_id)
{
    $sql = "SELECT * FROM `Cart` JOIN `Products` ON `Cart`.`product_id` = `Products`.`product_id` JOIN `Bill` ON `Cart`.`bill_id`=`Bill`.`bill_id`  WHERE `Cart`.`user_id`=" . $user_id;
    $list_img_cart = pdo_query($sql);
    return $list_img_cart;
}
