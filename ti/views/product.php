
<?php
 include('product-header.php');


 ?>

 <?php
//getting ordered items
if(isset($_COOKIE['user'])){
  $phone = $_COOKIE['user'];

  include('../process/db.php');

  $query3 = "SELECT * FROM ordering WHERE user_identity = '$phone'";
  $res3 = mysqli_query($con, $query3);
  $count = mysqli_num_rows($res3);

}

  ?>

<!--jumbotron start-->
<div class="jumbotron jumbotron-fluid">
<div class="container" style="text-align:center;">
  <!--alert start-->
  <div class="alert alert-warning alert-dismissible fade show" role="alert">

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <!--alert end-->

  <h1 class="display-4" style="#4F4F4F;">
    <?php if(isset($_SESSION['login'])){
      $phone = $_COOKIE['user'];
      $con = mysqli_connect('localhost', 'root', '', 'trust_ind');
      if(!$con){
        echo "not connected";
      }
      $query = "SELECT * FROM users WHERE phone = '$phone' LIMIT 1";
      $res = mysqli_query($con, $query);
      $row = mysqli_fetch_array($res);
      if(mysqli_num_rows($res) > 0){
      echo "Welcome ". $row['fname'];
      //echo $_SESSION['login'];
    }
  }elseif(isset($_COOKIE['user'])) {
      echo "Our Products";
    }
    ?>

  </h1>
  <p style="color:#0A79F1" class="lead">Order trusted products for your home <br>Pay only on delivery.</p>
  <a href="checkout.php"><button type="button" class="btn btn-primary">Goto Cart</button></a>
</div>
</div>

<!--jumbotron end-->


<div id="product-holder" class="container ">
  <table>
    <tr>
      <td>
        <select style="width:100px;" class="custom-select custom-select-sm">
          <option selected>Category</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
      </select>
      </td>

      <td class="sp-search">
        &nbsp;
      </td>


      <td>
        <form class="form-inline form-search" style="font-size:11px;">

          <div class="form-group mx-sm-3 mb-2">

            <input type="password" class="form-control" id="inputPassword2" placeholder="search item...">
          </div>
          <button type="button" class="btn btn-primary mb-2">Search</button>
            <a class="nav-link mobile-cart" href="checkout.php"> <img style="width:20px; height:20px;" src="http://www.prolocofollonica.it/sites/prolocofollonica.it/files/superm..png" alt="shop online in rwanda">
              <span class="cart-count" style="color:#FFFFFF; background-color:#0091EA; border-radius:50%; padding:2px 6px 2px 5px;">
              <?php if(isset($_COOKIE['user'])){ echo $count;} else echo "0"; ?> </span> </a>
      </form>
      </td>
    </tr>
  </table>

  <div class="prod-card popular" style="text-align: center; margin-top: 50px;">
    <h3 style="font-size:18px; margin-bottom:50px; padding:5px;">POPULAR PRODUCTS</h3>
  </div>



  <div class="row" >

    <?php
    include('../process/db.php');
    $query2 = "SELECT * FROM product";
    $res2 = mysqli_query($con, $query2);
    //$row = mysqli_fetch_array($res2);
    while($row = mysqli_fetch_array($res2)){
      $product_id = $row['product_id'];

echo '

  <div class="col">
<!--start of prd-->
<div class="prod-card" id="'.$row['product_id'].'" style=" border-radius: 3px; width: 202px; height:332px; text-align:center; "  >
  <img class="prd-img" src="'.$row['image'].'" alt="trust-industry-product">
  <h4 class="prd-name"><b>'.$row['product_name'].'</b></h4>
  <p class="prd-text">'.$row['description'].'</p>
  <button type="button" class="btn btn-primary prd-btn" onclick="addCart('.$row['product_id'].')">Add to Cart</button>
  <div class="counter">
      <ul>
       <li> <button onclick="counterSub('.$row['product_id'].')" type="button" name="button">-</button> </li>
        <li >  <input id="counter-figure_'.$row['product_id'].'" class="counter-figure" style="width:60px;" type="number" min="1" name="counter-figure" value="1"> </li>
        <li><button type="button" name="button" onclick="counterAdd('.$row['product_id'].')">+</button></li>
      </ul>
  </div>
</div>
<!--end of prd-->
<input id="'.$row['product_id'].'_name" type="hidden" value="'.$row['product_name'].'">
<input id="'.$row['product_id'].'_id" type="hidden" value="'.$row['product_id'].'">
<input id="'.$row['product_id'].'_price" type="hidden" value="'.$row['price'].'">

  </div>
  ';

}
?>
</div>



</div>

<!--signup start-->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">




        <h5 class="modal-title" id="exampleModalLabel">Login</h5><br>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--form here-->

        <!--alert start-->
        <div style="position:relative; left:130px;" class="alert alert-login alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-login-txt"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <!--alert end-->

<!--form login-->

    <form method="post" id="form-login">
      <div class="form-group">
        <label for="phone-input">Phone</label>
        <input name="phone" type="text" class="form-control" id="phone-input" aria-describedby="emailHelp" placeholder="Enter your phone number">
      </div>

      <div class="form-group">
        <label for="pword-input">Password</label>
        <input name="password" type="password" class="form-control" id="pword-input" placeholder="Password">
      </div>
      <input type="hidden" name="login" value="">

      <button  id="btn-login" type="button" class="btn btn-primary">Login</button>
</form>
  <p id="register-btn-show">Don't have an account? Register <button class="btn-primary" style="border:none;" id="register-show">here</button></p>
<br>
<!--form login end-->



        <form id="form-register">

      <div class="form-group">
        <label for="fname-input">First Name</label>
        <input name="fname" type="text" class="form-control" id="fname-input" aria-describedby="emailHelp" placeholder="Enter first name">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
        <label for="lname-input">Last Name</label>
        <input name="lname" type="text" class="form-control" id="lname-input" aria-describedby="emailHelp" placeholder="Enter last name">
      </div>

      <div class="form-group">
        <label for="pword-input2">Password</label>
        <input name="password" type="password" class="form-control" id="pword-input2" placeholder="Password" required>
      </div>

      <div class="form-group">
        <label for="phone-input2">Phone</label>
        <input name="phone" type="text" class="form-control" id="phone-input2" aria-describedby="emailHelp" placeholder="Enter your phone number">
      </div>

      <div class="form-group">
        <label for="add-input">Address</label>
        <input name="address" type="text" class="form-control" id="add-input" aria-describedby="emailHelp" placeholder="Enter your correct address">
      </div>
      <input type="hidden" name="register" value="">
      <button  id="btn-register" name="register" type="button" class="btn btn-primary">Register</button>
</form>
        <!--form end-->




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Login Instead</button> -->
      </div>
    </div>
  </div>
</div>

<!--signup ends-->



<?php include('footer.php'); ?>
