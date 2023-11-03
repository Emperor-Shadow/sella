<?php
  require_once("php_files/connection.php");
  require_once("php_files/functions.php");

  $user_id = $_SESSION['id'];
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $email = $_SESSION['email'];
  $user_type = $_SESSION['user_type'];

//   header('URL : login.php');
      if (!$user_id > 0) {
      session_destroy();
      header("location: login.php");
  }

  if (isset($_POST['submit'])) {
    $addr = sanitize($_POST['home_add']);
    $city = sanitize($_POST['city']);
    $state = sanitize($_POST['state']);

    // print_r($_POST);
    $qq = "INSERT INTO `address`( `user_id`, `address`, `city`, `state`) VALUES ('$user_id' , '$addr','$city','$state')";
    $rq = mysqli_query($connection , $qq);
    $row = mysqli_affected_rows($connection);
    if ( $row > 0 ) {
        echo '<script> alert("Address saved") </script>';
        header( "Location: profile.php" );
    } else {
        $msg =  'Something went wrong';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique | Ecommerce bootstrap template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <style>
    .form-group{
        width: 100%;
        margin: 10px 0;
    }
    .form-group label {
        display: block;
    }
    .form-group input{
        padding: 0 15px;
        width: 100%;
        height: 50px;
        border-radius: 3px;
        outline: none;
        border: 1px solid black;
    }
  </style>
  <body>
    <div class="page-holder">
      <!-- navbar-->
    <?php require_once('nav.php'); ?>
   

    <section class="mt-5">
        <div class="col-10 mx-auto text-center text-black p-5 bg-light ">
            <h1> Add a new address </h1>
            <?php if ( !$msg  == "" ) { echo $msg; } ?>

            <!-- <div class="row"> 
                <a href="add_address.php" class="btn btn-warning col-3 text-white"> <i class="fa fa-plus"></i> Add address</a>
                <a href="order.php" class="btn btn-outline-warning col-3 ms-2"> <i class="fa fa-cart-flatbed text-warning"></i> My Order</a >
            </div> -->

            
        </div>

        <div class="row col-10 mx-auto mb-3">
            <div class="card col-md-6 mx-auto col-12">
            <div class="card-head ">
            </div>
            <div class="card-body">
               <form action="" method="POST">

               <div class="form-group">
                    <label for="" class="form-label">Home Address</label>
                    <input type="text" required name="home_add" placeholder="Your home address" id="">
                </div>
                
                <div class="form-group">
                    <label for="" class="form-label">City</label>
                    <input type="text" required name="city" placeholder="City" id="">
                </div>

                <div class="form-group">
                    <label for="" class="form-label">State</label>
                    <input type="text" required name="state" placeholder="State or province" id="">
                </div>

                <button class="btn-success rounded btn" name="submit" type="submit">Submit</button>
               </form>
            </div>

            
        </div>

        </div>
        
    </section>

    <aside>
        
    </aside>
      <?php require_once('footer.php'); ?>
      <!-- JavaScript files-->
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/glightbox/js/glightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/swiper/swiper-bundle.min.js"></script>
      <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
      <script src="js/front.js"></script>
      <script src="js/functionalities.js" defer></script>
      <script src="js/jquery.com_jquery-3.7.0.js"></script>
     
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</php>