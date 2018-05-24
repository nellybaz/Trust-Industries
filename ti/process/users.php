<?php
//register
$finished = false;
function register($fname, $lname, $address, $phone, $password){
  include('db.php');
  $fname = mysqli_real_escape_string($con, $fname);
  $lname = mysqli_real_escape_string($con, $lname);
  $address = mysqli_real_escape_string($con, $address);
  $phone = mysqli_real_escape_string($con, $phone);
  $password = mysqli_real_escape_string($con, $password);
  $password = md5($password);
  $date = date('y-m-d');

  //check phone number first
  $query2 = "SELECT * FROM users WHERE phone = '$phone'";
  $res2 = mysqli_query($con, $query2);
  $row = mysqli_num_rows($res2);
  if($row > 0){
    echo 3;
  }else{

  $query = "INSERT INTO users (fname, lname, address, phone, password, date_entered) VALUES ('{$fname}','{$lname}', '{$address}','{$phone}','{$password}', '{$date}' )";
  $res=  mysqli_query($con, $query);
  if($res){
    echo 1;
    //echo 1;
    $cookie_name = "user";
    $cookie_value = $phone;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    //session_start();
    $_SESSION['login'] = "yes";
  }
  else {
    echo 2;
  }
}
}


//login
function login($phone, $password){
  include('db.php');
  //$password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = md5($password);
  $phone = mysqli_real_escape_string($con, $phone);
  $query = "SELECT * FROM users WHERE phone = '$phone' AND password = '$password'";
  $res = mysqli_query($con, $query);
  $row = mysqli_num_rows($res);
  if($row > 0){
    echo 1;
    $cookie_name = "user";
    $cookie_value = $phone;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // cookie set for 30 days
    //session_start();
    $_SESSION['login'] = "yes";


  }
  else {
    echo 2;
  }
}


//reset password
function reset_password($email){

}


//add to cart

function addCart($product_id, $product_name, $user_identity, $price, $item_count){
  include 'db.php';
  $date = date('y-m-d');
  $query = "INSERT INTO ordering (product_id, product_name, user_identity, price, count,date_entered) VALUES ('{$product_id}','{$product_name}','{$user_identity}', '{$price}', '{$item_count}', '{$date}')";
  $res = mysqli_query($con, $query);
  if($res){
    return 1;
  }
  else {
    return 2;
  }

}

//delete item on cart
function deleteCartItem($user_identity, $cart_id){
  include 'db.php';
  $query = "DELETE FROM ordering WHERE id = '$cart_id' AND user_identity = '$user_identity'";
  $res = mysqli_query($con, $query);
  if($res){
    echo 1;
  }
  else {
    echo 2;
  }

}

function addtoCart($product_id, $user_identity, $item_count){
  include 'db.php';
  $q1 = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
  $res1 = mysqli_query($con, $q1);
  $row1 = mysqli_fetch_array($res1);
  $product_name = $row1['product_name'];
  $price = $row1['price'];
  $add = addCart($product_id, $product_name, $user_identity, $price, $item_count);
  if($add == 1){
    $query3 = "SELECT * FROM ordering WHERE user_identity = '$user_identity'";
    $res3 = mysqli_query($con, $query3);
    $count1 = mysqli_num_rows($res3);
    echo $count1;
  }elseif ($add == 2) {
    echo 'failed';
  }
}

function checkout($user_identity){
  include 'db.php';
  $query = "SELECT * FROM ordering WHERE user_identity = '$user_identity'";
  $res = mysqli_query($con, $query);
  while($row = mysqli_fetch_array($res)){
      $product_id = $row['product_id'];
      $query1 = "DELETE FROM ordering WHERE product_id = '$product_id'";
      $res1 = mysqli_query($con, $query1);

  }
  echo 1;

}
 ?>
