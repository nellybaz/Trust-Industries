<?php

if(isset($_COOKIE['user'])){
  include '../process/db.php';
  $user_identity = $_COOKIE['user'];
  $query = "SELECT * FROM ordering WHERE user_identity = '$user_identity'";
  $res = mysqli_query($con, $query);
  //$row = mysqli_fetch_array($res);

}
 ?>

<?php include('product-header.php') ?>
<!--cart display-->
<div class="col-25" style="margin-bottom:50px;">
  <div class="container-c">
    <h4>Your Ordered Products
      <span class="price-c" style="color:black">
        <i class="fa fa-shopping-cart"></i>
        Total number: <b> <?php if(isset($_COOKIE['user'])){ $num = mysqli_num_rows($res); echo $num;} else{ echo "0";} ?> </b>
      </span>
    </h4>
    <br>
    <?php
    if(isset($_COOKIE['user'])){
    $total = 0;
    while($row = mysqli_fetch_array($res)){

      $total += $row['price'] * $row['count'];
      echo '<button class="btn btn-default" style="float:left; margin-right:15px;" type="button" onclick="deleteCart('.$row['id'].')">X</button> <p><a href="#">'.$row['product_name'].' <span>[x'.$row['count'].']</span></a> <span class="price-c">'.$row['price'].'</span></p>';
    }
}else{
  echo '<p>Your cart is empty. Go to <a href="/ti/views/product.php">store</a> to add items</p>';
}
    ?>



    <hr>
    <p>Total <span class="price-c" style="color:black"><b>
      <?php
      if(isset($_COOKIE['user'])){
       echo $total.' RwF';
     }
     else{
       echo '0 RwF';
     }
       ?>
  </b></span></p>
  </div>
</div>

<?php if(!isset($_SESSION['login'])){  echo '
<div class="container">
<div class="row-c">
 <div class="col-75">
   <div class="container-c">
     <form action="/action_page.php">

       <div class="row-c">
         <div class="col-50">
           <h3>Enter your delivery details</h3>
           <label for="fnam"><i class="fa fa-user"></i> Full Name</label>
           <input type="text" id="name" name="name" placeholder="e.g John Tumaini">
           <label for="email"><i class="fa fa-envelope"></i> Phone</label>
           <input type="text" id="phone" name="phone" placeholder="e.g 0784650455">
           <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
           <input type="text" id="address" name="address" placeholder="e.g KG 7 Ave ">
           <label for="city"><i class="fa fa-institution"></i> City</label>
           <input type="text" id="city" name="city" placeholder="e.g Kigali">
         </div>

       </div>
      <!-- <input type="submit" value="Checkout" class="btn-c"> -->
     </form>
   </div>
 </div>
</div>
</div>
 ';}?>


  <input type="button" id="checkout-btn" value="Checkout" class="btn-c">




<?php include('footer.php') ?>
