<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");


   $user_id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $user_type = $_SESSION['user_type'];
    require_once("php_files/logged_in.php");
  //   header('URL : login.php');
        if (!$user_id > 0) {
        session_destroy();
        header("location: login.php");
    }


    // $fname = $_SESSION['fname'];
    // $lname = $_SESSION['lname'];
    // $email = $_SESSION['email'];
    // $user_type = $_SESSION['user_type'];

    $first_initial_array = str_split($fname);
    $first_initial = $first_initial_array[0];

// five($connection);


// if ((int)$_SESSION['id'] > 0) {
//   $user_id = $_SESSION['id'];

//  // echo "<pre>";
//  print_r($_SESSION);
//  // echo "</pre>";
//  $fname = $_SESSION['fname'];
//  $lname = $_SESSION['lname'];
//  $email = $_SESSION['email'];
//  $user_type = $_SESSION['user_type'];

//  $first_initial_array = str_split($fname);
//  $first_initial = $first_initial_array[0];

//  // reg_guest($connection ,$user_id , $fname , $user_type);
//  } else {
//      //if user is a guest then save info in a session and register the user

//      $unique_id = sprintf("%06d" , rand(0,999999));

//      $_SESSION['id'] = $unique_id;
//      $_SESSION['fname'] = 'Guest User';
//      $_SESSION['lname'] = null;
//      $_SESSION['email'] = 'guestuser@gmail.com';
//      $_SESSION['user_type'] = 'guest';

     
//      $fname = $_SESSION['fname'];
//      $lname = $_SESSION['lname'];
//      $user_type = $_SESSION['user_type'];
//      $user_id = $_SESSION['id'];
//      reg_guest($connection ,$user_id , $fname , $user_type);
//  }
//check if the user is a guest or not staart

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// require 'vendor/autoload.php';

// //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'user@example.com';                     //SMTP username
//     $mail->Password   = 'secret';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('from@example.com', 'Mailer');
//     $mail->addAddress('damilolasaheeb@gmail.com', 'Joe User');     //Add a recipient
//     $mail->addReplyTo('info@example.com', 'Information');
//     $mail->addCC('cc@example.com');
//     $mail->addBCC('bcc@example.com');

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sella | Ecommerce bootstrap template</title>
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="icons/all.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
		<link rel="stylesheet" href="AOS - Animate on scroll library_files/aos.css">
    
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <?php require_once('nav.php'); ?>
      <!--  Modal -->
      <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center gtt" style="background-image: url('img/product-5.jpg');" href="img/product-5.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none gtb" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none gtg" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4 prod_name1"></h2>
                    <p class="text-muted prod_pr1"></p>
                    <p class="text-sm mb-4 prod_des1"></p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                    </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal end -->

      
      <!-- HERO SECTION-->
      <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(img/hero-banner-alt.jpg)">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="shop.php">Browse collections</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
          </header>
          <div class="row">
            <div data-aos="fade-up" class="col-md-4"><a class="category-item" href="shop.php"><img class="img-fluid" src="img/cat-img-1.jpg" alt=""/><strong class="category-item-title">Clothes</strong></a>
            </div>
            <div data-aos="fade-up" class="col-md-4"><a class="category-item mb-4" href="shop.php"><img class="img-fluid" src="img/cat-img-2.jpg" alt=""/><strong class="category-item-title">Shoes</strong></a><a class="category-item" href="shop.php"><img class="img-fluid" src="img/cat-img-3.jpg" alt=""/><strong class="category-item-title">Watches</strong></a>
            </div>
            <div data-aos="fade-up" class="col-md-4"><a class="category-item" href="shop.php"><img class="img-fluid" src="img/cat-img-4.jpg" alt=""/><strong class="category-item-title">Electronics</strong></a>
            </div>
          </div>
        </section>
        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
          <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
          </header>
          <div class="row">
           

            <?php
            function five ($connection) {
            
                $fetch_goods = "SELECT * FROM products LIMIT 4";
                $run_fetch = mysqli_query($connection , $fetch_goods);
                $row = mysqli_affected_rows($connection);
              
                
                if ($row > 0) {
              
              
              
                    while ($fetch_result = mysqli_fetch_assoc($run_fetch)) {
              
                       
              
              $product_id = $fetch_result['id'];
              $user_id = $_SESSION['id'];
              
              $check_query = "SELECT * FROM cart WHERE product_id = '$product_id' AND customer_id = '$user_id'";
                $run_query = mysqli_query($connection , $check_query);
                $rows = mysqli_affected_rows($connection);
                
                if ($rows == 0) {
                  $btn_message = "Add to cart";
                } else {
                  $btn_message = "Remove";
                }
                
                
                if ((int)$fetch_result['product_stock_quantity'] > 0) {
                  $availability = "Available";
                } else {
                  $availability = "Out of stock";
                }
              
                $new_name = $fetch_result['product_name'];
                if (strlen($new_name) > 20) {
                    $new_name = substr($new_name , 0,20).'...';
                }
              
           
                        // print_r($fetch_result);
          
                        echo '
                        <div class="col-xl-3 col-lg-4 col-sm-6" >
                        <div class="product text-center">
                          <div class="position-relative mb-3">
                            <div class="badge text-white bg-primary">Sale</div><a style = "height: 300px; width: 100%" class="d-inline-block" ><img class="img-fluid w-100 h-100" style = "object-fit: cover;" src="product_images/'.$fetch_result['product_picture'].'" alt="..."></a>
                            <div class="product-overlay">
                              <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark add-to-cart-'.$fetch_result['id'].'" id="add-to-cart" onclick = "add_to_cart('.$fetch_result['id'].')" >'.$btn_message.'</a></li>
                                <li class="list-inline-item me-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand" onclick ="expand('.$fetch_result['id'].')"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <h6> <a class="reset-anchor" href="detail.php?product_id='.+ $fetch_result['id'].'">'.$fetch_result['product_name'].'</a></h6>
                          <p class="small text-muted">'.dollar.$fetch_result['product_new_price'].'</p>
                        </div>
                      </div>
                        ';
                    }
                 
              
                }
              
              // print_r($result);
               }
              
               


               five($connection);
            ?>
          </div>
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center gy-3">
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Festivaloffers</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row gy-3">
              <div class="col-lg-6">
                <h5 class="text-uppercase">Let's be friends!</h5>
                <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group">
                    <input class="form-control form-control-lg" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                    <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
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
      <script src="AOS - Animate on scroll library_files/jquery-1.11.3.min.js.download"></script>
		<script src="AOS - Animate on scroll library_files/highlight.min.js.download"></script>
		<script src="AOS - Animate on scroll library_files/aos.js.download"></script>
          <script>
        AOS.init({
				easing: 'ease-out-back',
				duration: 1000
			});
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
            div.innerphp = ajax.responseText;
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
        </html>