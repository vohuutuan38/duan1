<?php
function insert_comment($content, $product_id, $user_id, $date_comment)
{
    $sql = "INSERT INTO Comments (content,product_id,user_id,date_comment) VALUES ('$content','$product_id','$user_id','$date_comment')";
    pdo_execute($sql);
}
function load_all_cmt($product_id)
{
    $sql  = "SELECT * FROM Comments JOIN Users ON Comments.user_id=Users.user_id JOIN Products ON Comments.product_id=Products.product_id WHERE 1";
    if ($product_id > 0) {
        $sql .= " AND Comments.product_id='" . $product_id . "'";
    } else
        $sql .= "ORRDER BY id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
function load_all_comment()
{
    $sql = "SELECT * FROM Comments ORDER BY comment_id desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function delete_comment($id)
{
    $sql = "DELETE FROM Comments WHERE  comment_id =" . $id;
    pdo_execute($sql);
}
