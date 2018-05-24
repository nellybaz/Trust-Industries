<?php
session_start();
//include('db.php');
include('users.php');
//receiving login  data-ride
//echo 1;
if(isset($_POST['login'])){
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  //$password = mysqli_real_escape_string($con, $password);

  //$email = mysqli_real_escape_string($con, $phone);
login($phone, $password);

}
elseif (isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    register($fname, $lname, $address, $phone, $password);

}

elseif (isset($_POST['logout'])) {
    session_unset();
    if(setcookie('user', 'John Doe', time() - (86400 * 30), "/") ){ // unset cookie
        echo 1;
    }
}
//adding prodct to cart
elseif (isset($_POST['key'])) {
  //require_once '/ti/process/db.php';
  $product_id = $_POST['product_id'];
  $item_count = $_POST['itemcount'];
  $user_identity = $_COOKIE['user'];
  addtoCart($product_id, $user_identity, $item_count);

}

elseif (isset($_POST['deleteCart'])) {
    $cart_id = $_POST['id'];
    $user_identity = $_COOKIE['user'];
    deleteCartItem($user_identity, $cart_id);
}
elseif (isset($_POST['checkout'])) {
    $user_identity = $_COOKIE['user'];
    checkout($user_identity);
}

?>
