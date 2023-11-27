<?php
function insert_client_user($username, $password, $avatar, $address, $phone, $email)
{
  $sql = "INSERT INTO Users(username,password,avatar,address,phone,email) VALUES('$username','$password','$avatar','$address','$phone','$email') ";
  pdo_execute($sql);
}
function insert_bill_user($username, $address, $phone)
{
  $sql = "INSERT INTO Users(username,address,phone) VALUES('$username','$address','$phone') ";
  pdo_execute($sql);
}
function checkuser($username, $password)
{
  $sql = "select *from Users where username='" . $username . "' and password='" . $password . "'";
  $user = pdo_query_one($sql);
  return $user;
}
function update_status($status, $user_id)
{
  $sql = "UPDATE `user` SET `status` = '$status' WHERE `user`.`user_id` =" . $user_id;
  pdo_execute($sql);
}
function check_user_bill($username)
{
  $sql = "select *from user where username='" . $username . "'";
  $user = pdo_query_one($sql);
  return $user;
}
function update_user($user_id, $username, $password, $avatar, $address, $phone, $email)
{
  if ($avatar != "") {
    $sql = "update Users set username='" . $username . "',password='" . $password . "',avatar='" . $avatar . "',address='" . $address . "',phone='" . $phone . "',email='" . $email . "' where user_id= " . $user_id;
  } else {
    $sql = "update Users set username='" . $username . "',password='" . $password . "',address='" . $address . "',phone='" . $phone . "',email='" . $email . "' where user_id= " . $user_id;
  }
  pdo_execute($sql);
}
function update_admin($username, $password, $avatar, $email, $phone, $address, $role, $user_id)
{
  if ($avatar != "") {
    $sql = "UPDATE `Users` SET `username` = '$username', `password` = '$password', `avatar` = '$avatar', `email` = '$email', `phone` = '$phone', `address` = '$address', `role` = '$role' WHERE `Users`.`user_id` =" . $user_id;
  } else {
    $sql = "UPDATE `Users` SET `username` = '$username', `password` = '$password', `email` = '$email', `phone` = '$phone', `address` = '$address', `role` = '$role' WHERE `Users`.`user_id` =" . $user_id;
  }
  pdo_execute($sql);
}
function check_password($username, $email, $phone)
{
  $sql = "select *from Users where username='" . $username . "'and email='" . $email . "'and phone='" . $phone . "' ";
  $user = pdo_query_one($sql);
  return $user;
}
function load_all_account()
{
  $sql = "SELECT * FROM Users ORDER BY user_id asc ";
  $list_account = pdo_query($sql);
  return $list_account;
}

function load_one_account($user_id)
{
  $sql = "SELECT * FROM Users WHERE user_id=" . $user_id;
  $ud = pdo_query_one($sql);
  return $ud;
}

function delete_account($user_id)
{
  $sql = "delete from Users where user_id=" . $user_id;
  pdo_execute($sql);
}
