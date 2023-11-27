<?php
function load_all_statistical()
{
  $sql = "SELECT Categories.category_id as category_id,Categories.category_name as category_name,COUNT(Products.product_id) as countpr,MIN(Products.price) as minprice,MAX(Products.price) as maxprice,AVG(Products.price) as avgprice  FROM Products JOIN Categories ON Categories.category_id=Products.category_id GROUP BY Categories.category_id ORDER BY Categories.category_id DESC";
  $list_statistical = pdo_query($sql);
  return $list_statistical;
}
function count_bill()
{
  $sql = "SELECT Bill.ngaydathang, COUNT(Bill.bill_id) as amount_bill, SUM(Bill.total_money) as total_bill FROM Bill GROUP BY Bill.ngaydathang ORDER BY Bill.ngaydathang DESC";
  $count_bill = pdo_query($sql);
  return $count_bill;
}
function product_best_seller()
{
  $sql = "SELECT Cart.product_name, SUM(Cart.amount) as best_seller FROM Cart GROUP BY Cart.product_name ORDER BY count(Cart.amount) DESC LIMIT 1";
  $product_best_seller = pdo_query($sql);
  return $product_best_seller;
}
