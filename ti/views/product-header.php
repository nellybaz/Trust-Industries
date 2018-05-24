<?php
 session_start();
//getting ordered items
if(isset($_COOKIE['user'])){
 $phone = $_COOKIE['user'];

 include('../process/db.php');

 $query3 = "SELECT * FROM ordering WHERE user_identity = '$phone'";
 $res3 = mysqli_query($con, $query3);
 $count = mysqli_num_rows($res3);

}



 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--w3schools css-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!--checkout css -->
    <link rel="stylesheet" href="checkout.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Trust Industries Limited</title>
    <style media="screen">

      * {
        font-family: Open Sans ! important;
      }
      .carousel-img{
        height: 450px ! important;
      }
      .float-right{

      }

      .nav-link:hover{
      border-bottom: 2px solid navy;
      }

      .jumbotron{
        background-image: url(http://res.cloudinary.com/nellybaz/image/upload/v1526654723/carousel1.png);

      }

      .jumbotron-text-big{
        font-size: 60px;
        font-family: Open Sans;
        font-weight: bold ! important;
        color: #FFFFFF;
      }
      .lead{
        color: #FFFFFF;
      }
      .trust-logo{
        width: 100px;
        height: 70px;
        margin-left: 90px;
      }

      .jumb-text-holder{
        text-align: center;
        position: relative;
        top: 100px;
      }

      .nav-list-holder{
        margin-right: 100px;
        color: #FFFFFF;
        font-weight: bold;
      }

      .bg-light{
        background-color: #FFFFFF ! important;
      }
      .nav-item a{
        color: #686868 ! important;
      }

      .icon-title{
        color: #1A1A1A;
        font-size: 14px;
        font-weight: 600;
      }
      .icon-text{
        color: #1A1A1A;
        font-size: 14px;

      }
      .icon{

      }

      .bd-footer-links li{
        display: inline;
        color: #FFFFFF ! important;
      }

      footer{
        background-color: #A3A3A3;

      }
      nav{

        box-shadow: 5px 2px 10px gray ! important;
      }

      .about-icon{

        font-size: 11px;
      }

      .about-icon p{
        color: #575757;

      }

      .about-text{
        font-size: 14px;
        color: #828282;

      }
      .prd-img{
        width: 100px;
        height: 150px;
        padding:10px 0 30px 0;
        transition: transform .2s;
      }

      .prd-img:hover{
        transform: scale(1.2);
      }
      .prd-name, .prd-text{
        padding:  0 30px;
        font-size: 12px;
      }

      .prd-btn{
        background-color: #329EE0 ! important;
        margin: 0 30px;
        font-size: 12px;
        border-radius: 10px;
        width: 70%;
        height: 28px;
        transition: transform .2s;
      }

      .prd-btn:hover{
        transform: scale(1.2);
      }

      .jumbotron-team{
        background-image: url('http://res.cloudinary.com/nellybaz/image/upload/v1526828416/Mask_Group.png');
        text-align: center;
        color: #FFFFFF;
      }

      .card-team {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 250px;
    text-align: center;
}

.card-team:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container-team-card {
    padding: 2px 16px;
}
.team-img{
  width: 180px ! important;
  border-radius:50% ;
  height: 200px;
  padding:15px 0;

}
.prod-card{
  margin-bottom: 30px;
  box-shadow: 2px 2px 5px #828282;
}

.active-nav{
  border-bottom: 2px solid navy;
}

footer{
  margin-top: 50px;

}

#login{
  display: none;
}
.alert, .alert-login{
  display: none;
}

.counter{
  margin-top: 20px;
  position: relative;
  right: 15px;
}
.counter ul li {
  display: inline;
}

.prod-card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.popular{
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.sp-search{
  width: 50%;
}
.mobile-cart{
  display: none;
}

@media only screen and (max-width:750px){
  .prod-card{
    margin: auto 18%;
  }
  .mobile-cart{
    display: inline;
  }

  .sp-search{
    width: 10%;
  }

  .display-4{
    font-size: 28px;
  }

  .count-pc{
    display: none;
  }

  .form-search{
    position:relative ! important;
    top:30px ! important;
  }
}



    </style>
  </head>
  <body>
    <!--Navigation start-->

  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">

      <div class="mx-auto order-0">
          <a class="navbar-brand mx-auto" href="index.php">
            <img class="trust-logo" src="http://res.cloudinary.com/nellybaz/image/upload/v1526660862/oie_transparent-2.png" alt="trust industries">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 nav-list-holder" >
          <ul class="navbar-nav ml-auto">
              <li id="home-nav" class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
              </li>

              <li id="products-nav" class="nav-item">
                  <a id="product" class="nav-link" href="product.php">Our Products</a>
              </li>

              <li id="blog-nav" class="nav-item">
                  <a class="nav-link" href="blog.php">Blog</a>
              </li>

              <li id="career-nav" class="nav-item">
                  <a class="nav-link" href="career.php">Career</a>
              </li>

              <li id="login-nav" class="nav-item">
                <?php if(isset($_SESSION['login'])){
                  echo '<a href="#"  id="logout" class="nav-link" style=" padding:5px; ">Logout</a>';
                }else{
                echo '  <a id="login" data-toggle="modal" data-target="#exampleModal" class="nav-link" href="#" style="padding:5px;">Register/Login</a>';
                } ?>
              </li>
              <li id="team-nav" class="nav-item count-pc">
                  <a class="nav-link" href="checkout.php"> <img style="width:20px; height:20px;" src="http://www.prolocofollonica.it/sites/prolocofollonica.it/files/superm..png" alt="shop online in rwanda">
                     <span class="cart-count " style="color:#FFFFFF; background-color:#0091EA; border-radius:50%; padding:2px 6px 2px 5px;"> <?php if(isset($_COOKIE['user'])){ echo $count;} else echo "0"; ?> </span> </a>
              </li>
          </ul>
      </div>
  </nav>

    <!--nav ends -->
