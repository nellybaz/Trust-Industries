<!--footer starts-->
    <footer class="bd-footer text-muted">
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

    <p style="color:#FFFFFF; font-size:11px;">Copyright &copy; <?php echo date('Y'); ?>. Trust Industries Limited<br> All rights reserved.</p>
  </div>
</footer>
<!--footer ends-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  -->  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var url_with_path = window.location.pathname;

      $(document).ready(function(){

        //set redistration form aria-hidden
        $('#form-register').css('display', 'none');

        if(url_with_path == '/ti/views/product.php'){
        $('#login').css('display', 'block');
          $('#products-nav').addClass('active-nav');

        }
        else if (url_with_path == '/ti/views/team.php') {
          $('#team-nav').addClass('active-nav');
        }
        else if (url_with_path == '/ti/views/about.php') {
          $('#about-nav').addClass('active-nav');

        }

        else if (url_with_path == '/ti/views/blog.php') {
          $('#blog-nav').addClass('active-nav');

        }
        else if (url_with_path == '/ti/views/contact.php') {
          $('#contact-nav').addClass('active-nav');

        }
        else if (url_with_path == '/ti/views/career.php') {
          $('#career-nav').addClass('active-nav');

        }
      })
    </script>

    <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$('#register-show').click(function(){
    $('#form-login').css('display', 'none');
    $('#register-btn-show').css('display', 'none');
    $('.modal-title').text('Register');
    $('#form-register').css('display','block');

});
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#btn-login').click(function(){
      //alert('hi');
      var ph = $('#phone-input').val();
      var pw = $('#pword-input').val();
      if(ph == ""){
        $('.alert-login').html('Enter phone number!');
        $('.alert-login').css('display', 'inline');

      }else if (pw == "") {
        $('.alert-login').html('Enter password!');
        $('.alert-login').css('display', 'inline');
      }else{


      $.ajax({
        type: 'POST',
        url: "/ti/process/process.php",
        data: $('#form-login').serialize(),
        success: function(response){
          if(response == 1){
            $('.alert-login').html('Login Suucessful, start ordering!');
            $('.alert-login').css('display', 'inline');
            $('#form-login').css('display', 'none');
            $('#register-btn-show').css('display', 'none');


            setTimeout(function() {
                location.reload();
            }, 1000);
          }
          else if(response == 2) {
            //alert('not successful');
            $('.alert-login').html('Wrong password!');
            $('.alert-login').css('display', 'inline');
          }
          else {
            alert('Failed to login, please contact admin on 078650455');
          }
        },
      });
    }
  });



  //register botton click call register ajax
  $('#btn-register').click(function(){
    var ph = $('#phone-input2').val();
    var pw = $('#pword-input2').val();
    var add = $('#add-input').val();
    var fn = $('#fname-input').val();
    var ln = $('#lname-input').val();
    if(fn == ""){
      $('.alert-login').html('Enter phone first name!');
      $('.alert-login').css('display', 'inline');

    }else if (ln == "") {
      $('.alert-login').html('Enter last name!');
      $('.alert-login').css('display', 'inline');
    }else if (pw == "") {
      $('.alert-login').html('Enter password!');
      $('.alert-login').css('display', 'inline');
    }
    else if (ph == "") {
      $('.alert-login').html('Enter phone number!');
      $('.alert-login').css('display', 'inline');
    }
    else if (add == "") {
      $('.alert-login').html('Enter address!');
      $('.alert-login').css('display', 'inline');
    }else {


    $.ajax({
      type: 'POST',
      url: "/ti/process/process.php",
      data: $('#form-register').serialize(),
      success: function(response){
        if(response == 1){
          $('.alert-login').html('Thank you for registering. Start your online order');
          $('.alert-login').css('display', 'inline');
          $('#form-register').css('display', 'none');


          setTimeout(function() {
              location.reload();
          }, 2000);
        }
        else if(response == 2) {
          alert('not successful');
        }

        else if (response == 3) {
        $('.alert-login-txt').html('Phone number already exists, please login');
          $('.alert-login').css('display', 'inline');
          //$('#form-register').css('display', 'none');
        }
        else {
          alert(response);
        }
      },
    });
  }
});

//logout ajax
$('#logout').click(function(){

  $.ajax({
    type: 'POST',
    url: "/ti/process/process.php",
    data: 'logout',
    success: function(response){
      if(response == 1){

        $('.alert').html('Logout Sucessfully. We hope to see you soon!');
        $('.alert').css('display', 'inline');
        //location.reload();

        setTimeout(function() {
            window.location.replace("/ti/views/product.php");
        }, 2000);
      }
      else if(response == 2) {
        alert('Could not log out, try again');
      }
      else {
        alert('Failed, please try again.');
      }
    },
  });
});
  })


</script>

<script type="text/javascript">
function counterSub(id){
  var s = 'counter-figure_'+id;
  var x = document.getElementById(s);
  count = x.value;
//  alert(x.value);
  if(count>1){
  count--;
    }
  x.value = count;

}

  function counterAdd(id){
    var s = 'counter-figure_'+id;
    var x = document.getElementById(s);
    count = x.value;
  //  alert(x.value);
    count++;
    x.value = count;
  }
</script>

<script type="text/javascript">
    function addCart(id)
        {
          var prd_id = id;
          var count = document.getElementById('counter-figure_'+id).value;
          //(prd_id);
          $.ajax({
            url: '/ti/process/process.php',
            type: 'POST',
            data: {key:'addtoCart',
                  product_id: id,
                  itemcount: count
                },
            success: function(response){
              if(response != 'failed'){
                 var count = response;
                 $('.cart-count').html(count);
                 document.getElementById('counter-figure_'+id).value = 1;
              }else {
                alert('Sorry could not add your item to cart. Please try again, if problem persist, please contact admin on +250784650455');
              }
            },
          });

    }
</script>

<script type="text/javascript">
  function deleteCart(id){
    //alert(id);
    var id = id;
    $.ajax({
      url: '/ti/process/process.php',
      type: 'POST',
      data: {id:id,
            deleteCart: 'deleteCart',
      },
      success: function(response){
        if(response == 1){
          setTimeout(function() {
              location.reload();
          }, 1000);
        }
        else if (response == 2) {
          alert('Could not delete item, please contact admin on 0784650455. Thanks!');
        }
        else {
          alert('Failed, try again');
        }
      },
    });
  }
</script>

<script type="text/javascript">
  $('#checkout-btn').click(function(){
    $.ajax({
      url: '/ti/process/process.php',
      type: 'POST',
      data: 'checkout',
      success: function(response){
        if(response == 1){
          alert('Thank you for your orders. Our sales team will contact you, and delivery will be made in less than 12 hrs.');
          setTimeout(function() {
              location.reload();
          }, 1000);
        }
        else if (response == 2) {
          alert('Failed to checkout, please contact the administrator on 0784650455');
        }
        else {
          alert('Sorry, Failed');
        }

      }
      });

  });
</script>


  </body>
</html>
