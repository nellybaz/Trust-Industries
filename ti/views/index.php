<?php
 session_start();
if(!isset($_COOKIE['user'])){
$cookie_name = "user";

$cookie_value = rand(1000000000, 9999999999);
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // cookie set for 30 days
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
        /*font-size: 16px; */
      }

      .jumbotron1{
        background-image: url(http://res.cloudinary.com/nellybaz/image/upload/v1526654723/carousel1.png);
      }
      .jumbotron2{
        background-image: url(http://res.cloudinary.com/nellybaz/image/upload/v1526654723/carousel1.png);
      }

      .jumbotron-text-big{
        font-size: 60px;
        font-family: Open Sans;
        font-weight: bold ! important;
        color: #7986CB;
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
        background-color: #E9E3DB ! important;
      }
      .nav-item a{
        color: #283593 ! important;
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
      td p {
        color: #828282 ! important;
      }
      .nav-box-shadow{

        box-shadow: 5px 2px 10px gray ! important;
      }

      @media only screen and (max-width:750px){
        table{
          margin: auto 10% ! important;
        }
        td img{
          width:50px;
          height:50px;
        }

        .jumbotron-text-big{
          font-size: 28px;
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
              <li class="nav-item">
                  <a class="nav-link" href="index.php" style="border-bottom:2px solid navy;">Home</a>
              </li>

            <!--  <li class="nav-item">
                  <a class="nav-link" href="about.php">ABOUT US</a>
              </li>-->
              <li class="nav-item">
                  <a class="nav-link" href="product.php">Our Products</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="team.php">Team</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="blog.php">Blog</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact us</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="career.php">Career</a>
              </li>
          </ul>
      </div>
  </nav>
    <!--nav ends -->

    <!--Carousel statr-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
          <!--  <img class="d-block w-100 carousel-img" src="http://res.cloudinary.com/nellybaz/image/upload/v1526654723/carousel1.png" alt="Trust Industries">

          -->
          <!--jumbotron in carousel-->
          <div class="jumbotron jumbotron1 jumbotron-fluid carousel-img">
                <div class="container jumb-text-holder" >
                  <h1 class="display-4 jumbotron-text-big">Solutions Manufacturers</h1>
                  <p id="lead" class="lead" style="color:#0A79F1;"></p>
                <a href="product.php"  <button style="width:247px; margin-top:25px; border-radius:10px;" type="button" class="btn btn-primary">Order Online</button> </a>
                </div>
            </div>
          </div>
          <div class="carousel-item">
          <!--  <img class="d-block w-100 carousel-img" src="" alt="Trust Industries">-->
            <div class="jumbotron jumbotron2 jumbotron1 jumbotron-fluid carousel-img">
                  <div class="container jumb-text-holder" >
                    <h1 class="display-4 jumbotron-text-big">When Clean means Clear</h1>
                    <p id="lead" class="lead" style="color:#0A79F1;"></p>
                  <a href="product.php"  <button style="width:247px; margin-top:25px; border-radius:10px;" type="button" class="btn btn-primary">Order Online</button> </a>
                  </div>
              </div>

          </div>
          <div class="carousel-item">
            <img class="d-block w-100 carousel-img" src="http://res.cloudinary.com/nellybaz/image/upload/v1526654723/carousel1.png" alt="Trust Industries">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
</div>

<div class="about-div container" style="text-align:center; margin-top:100px;" >
  <table align="center" style="margin-top:50px;">
    <tr>
      <td class="about-icon">
        <img src="http://res.cloudinary.com/nellybaz/image/upload/v1526670899/hand_wash.png" alt="trust-industry-trustworthy"><br><br>
      <p> <b> Hand Wash</b></p>
      </td>

        <td width="15%">
          &nbsp;
        </td>

      <td class="about-icon" >
        <img src="http://res.cloudinary.com/nellybaz/image/upload/v1526670908/floor-mop.png" alt="trust-industry-trustworthy"><br>
        <br><p><b>Tiles Cleaner Liquid</b></p>
      </td>

      <td width="15%">
        &nbsp;
      </td>

      <td class="about-icon" >
        <img src="http://res.cloudinary.com/nellybaz/image/upload/v1526670888/tiles.png" alt="trust-industry-trustworthy"><br>
        <br><p><b>Antiseptic floor cleaner</b></p>
      </td>

      <td width="15%">
        &nbsp;
      </td>

      <td class="about-icon">
        <img src="http://res.cloudinary.com/nellybaz/image/upload/v1526670882/window_cleaner.png" alt="trust-industry-trustworthy"><br>
        <br><p><b>Glass cleaner</b></p>
      </td>
    </tr>
  </table><br>

  <h1 style="font-size:18px; margin-top:40px; color:#686868;"><b>ABOUT US</b></h1><br>
<div class="about-text">


  <p style="line-height:27px; ">
    Trust Industries Ltd is a private manufacturing outfit head quartered in Rwanda. It was established in 2009 by Mr. Claver Mugabo, who is also the
majority shareholder. The company is overseen by a board of directors and headed by chief executive officer.

<p>TIL started as a small trading company and then successfully diversified into manufacturing, this was motivated by TIL’s desire to expand, improve
 efficiency, reduce cost and improve more competitive. The company produces various types of tissue paper, detergents and bar soaps and supplies
 them to the local market and for export mainly to Burundi, Congo and Uganda. Today, the company has about 28 products of various kind in its
line-up all of which have been established a noticeable presence in the local market.</p>

<p style="margin-bottom:50px;">In 2013, TIL made a backward integration from a trading company into manufacturing . It acquired new machines and implementation started in
 2013, Automation of some of processes in the production process, investment in working capital, investment in sales and promotions efforts to
boost sales, acquire spare parts for recycling plant, complete works( cabling, construction of shelves) in the factory, purchase of lap equipment.
</p>

  </p>
  </div>
</div>


<!--Carousel End-->
<div class="why-us-text" style="text-align:center; margin-top:100px; color:#828282;">
  <hr style="">
  <h3>Why Us?</h3>
  <hr>
</div><br>

<div class="container">
  <table style="margin-top:30px;">
    <tr>
      <td class="one" width="273px" style="text-align:center;">
        <img class="icon" src="http://res.cloudinary.com/nellybaz/image/upload/v1526663715/guarantee_1.png" alt="trust-industries"><br>
        <p class="icon-title">HIGH QUALITY</p><br>
        <p class="icon-text">At Trust Industries our products are created with you, our user in mind .</p>
      </td>

        <td width="25%">
          &nbsp;
        </td>

      <td class="two" width="273px" style="text-align:center;">
        <img class="icon" src="http://res.cloudinary.com/nellybaz/image/upload/v1526664092/guarantee.png" alt="trust-industries"><br>
        <p class="icon-title">SAFE TO USE</p><br>
        <p class="icon-text">Our products are made out of 100% organic materials and are not harmful to the skin.</p>
      </td>

    </tr>


    <tr>
      <td class="three" width="475px" style="text-align:center;">
        <img class="icon" src="http://res.cloudinary.com/nellybaz/image/upload/v1526664403/heartbeat.png" alt="trust-industries"><br>
        <p class="icon-title">ENVIROMENTALLY FRIENDLY</p><br>
        <p class="icon-text">products created with the family and their surroundings in mind, our products leave your home refreshed and
           clean with a fragrance that can last a lifetime.</p>
      </td>

        <td width="25%">
          &nbsp;
        </td>

      <td class="four" width="273px" style="text-align:center;">
        <img class="icon" src="http://res.cloudinary.com/nellybaz/image/upload/v1526664419/quality.png" alt="trust-industries"><br>
        <p class="icon-title">ECONOMICALLY FRIENDLY</p><br>
        <p class="icon-text">Our products are made out of 100% organic materials and are not harmful to the skin..</p>
      </td>

    </tr>
  </table>

</div>

<!--footer starts-->
    <footer style="margin-top:150px;" class="bd-footer text-muted">
  <div class="container-fluid p-3 p-md-5" style="text-align:center;">
    <p style="color:#FFFFFF;">Connect with us</p>
    <ul class="bd-footer-links" style="position:relative; right:20px;">
      <li>
        <a href="#">
           <img src="http://res.cloudinary.com/nellybaz/image/upload/v1526668732/fb_icon.png" alt="trust-industries-facebook">
        </a>
      </li>
      <li>
        <a href="#">
          <img src="http://res.cloudinary.com/nellybaz/image/upload/v1526668720/twitter_icon.png" alt="trust-industries-twitter">
        </a>
      </li>
      <li>
        <a href="#">
          <img src="http://res.cloudinary.com/nellybaz/image/upload/v1526668725/insta_icon.png" alt="trust-industries-instagram">
        </a>
      </li>
    </ul>

    <p style="color:#FFFFFF; font-size:11px;">Copyright &copy; 2018. Trust Industries Limited<br> All rights reserved.</p>
  </div>


  <!--about us-->




  <!--about end-->
</footer>
<!--footer ends-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    --><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


    <script>
    $(document).ready(function(){

      var i = 0;
      var txt = 'We create solutions that leave your home and suroundings clean and fresh...';
      var speed = 50;

      function typeWriter() {
      if (i < txt.length) {
        document.getElementById("lead").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
      }
      }
      var call =   typeWriter();

       $(".one").hide();
       $(".two").hide();
       $(".three").hide();
       $(".four").hide();

       $(window).scroll(function(){
         if ($(window).scrollTop() > 190){
            //$("td").show();
            $('.one').fadeIn(800);
          //  $('.two').slideIn(right, 2000);
            $('.two').fadeIn(1000);
            $('.three').fadeIn(1200);
            $('.four').fadeIn(1400);
            $('nav').addClass('nav-box-shadow');

         }
         else if($(window).scrollTop() < 190){
           $('nav').removeClass('nav-box-shadow');
         }
     });

    })


</script>

  </body>
</html>
