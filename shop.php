<?php
  require_once("php_files/connection.php");
  require_once("php_files/functions.php");
  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
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
    <link rel="stylesheet" href="AOS - Animate on scroll library_files/aos.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
    <?php require_once('nav.php'); ?>
      <!--  Modal -->
      <!-- <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center " style="background-image: url(img/product-5.jpg)" href="img/product-5.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4 ">Red digital smartwatch</h2>
                    <p class="text-muted ">$250</p>
                    <p class="text-sm mb-4 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                        
                      </div>
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light mt-5">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
              <div class="col-lg-3 order-1 order-lg-1">
                <h5 class="text-uppercase mb-4">Categories</h5>
                <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold" onclick="showAll()">ALL</strong></div>
                <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">

   
                <?php
                     //fetch all categories from the database start

                        $fetch_cat = "SELECT * FROM categories ORDER BY id ASC";
                        $run_fetch_cat = mysqli_query($connection , $fetch_cat);
                        $row = mysqli_affected_rows($connection);

                        if ($row == 0) {
                            echo "No Category created";
                        } else {
                            while ($result = mysqli_fetch_assoc($run_fetch_cat)) {
                                echo '<li class="mb-2 cat-link"><a class="reset-anchor cat-'.$result['id'].'" onclick= "showGoods('.$result['id'].')">'.$result['category_name'].'</a></li>';                               
                            }
                        }

                     //fetch all categories from the database end
                        ?>
                </ul>
            
               
               
              </div>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-2 order-lg-2 mb-5 mb-lg-0"style="margin-left: -5px;">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0" >
                    <p class="text-sm text-muted mb-0 showy">Showing all results</p>
                  </div>
                 
                </div>
                <div class="row products">

                <?php load_all($connection); ?>

                 
              </div>
            </div>
          </div>
        </section>
        <?php
      //  $mail = new PHPMailer(true);

      //  try {
      //      //Server settings
      //      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      //      $mail->isSMTP();                                            //Send using SMTP
      //      $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
      //      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      //      $mail->Username   = '7d6a4551ce8563';                     //SMTP username
      //      $mail->Password   = '21b54ca7564b29';                               //SMTP password
      //      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      //      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
       
      //      //Recipients
      //      $mail->setFrom('from@example.com', 'Mailer');
      //      $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
      //      $mail->addAddress('ellen@example.com');               //Name is optional
      //      $mail->addReplyTo('info@example.com', 'Information');
      //      $mail->addCC('cc@example.com');
      //      $mail->addBCC('bcc@example.com');
      //        //Optional name
       
      //      //Content
      //      $mail->isHTML(true);                                  //Set email format to HTML
      //      $mail->Subject = 'Here is the subject';
      //      $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
      //      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
       
      //      $mail->send();
      //      echo 'Message has been sent';
      //  } catch (Exception $e) {
      //      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      //  }
        ?>
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