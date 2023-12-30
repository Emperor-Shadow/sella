<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");

   $user_id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $user_type = $_SESSION['user_type'];
    require_once("php_files/logged_in.php");
        if (!$user_id > 0) {
        session_destroy();
        header("location: login.php");
    }
    $first_initial_array = str_split($fname);
    $first_initial = $first_initial_array[0];


    $msg = null;

    $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '' );

    if (isset($_POST['sendImageBtn'])) {

      $channel = 'admin_' . $user_id ;
      $time = time();

      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_type = $_FILES['image']['type'];
      $file_tmp_name = $_FILES['image']['tmp_name'];

      $supported_types = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp'
      ];

      $msg_type = 'image';

      $new_name = $user_id.$file_name;

      if (in_array($file_type , $supported_types)) {
            if ($file_size <= 2000000) {
                  $upload = move_uploaded_file($file_tmp_name , "message_images/".$new_name);
                  if ( $upload ) {
                    $sql = "INSERT INTO messages ( user_id , message , channel , time , msg_type , reciever ,sender) VALUES ( '$user_id' , '$new_name' , '$channel' , '$time' , '$msg_type' , 'admin' , '$user_id') ";
                    $row = $db->exec($sql);
                    if (!$row > 0) {
                        echo "Something went wrong";
                    } 
                  } else {
                    echo 'Something went wrong. Message not sent';
                  }
            } else {
              echo "File size is too large";
            }
      } else {
        echo "Invalid file format.";
      }
    }

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="admin/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/AdminLTE-3.2.0/dist/css/adminlte.min.css">
		<link rel="stylesheet" href="AOS - Animate on scroll library_files/aos.css">
    
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <?php require_once('nav.php'); ?>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row gy-3">
              <div class="col-lg-6">
                <h5 class="text-uppercase">Send a message to an admin's email</h5>
                <form action="#">
                  <div class="input-group">
                    <!-- <input class="form-control form-control-lg" type="email" aria-describedby="button-addon2"> -->
                    <textarea name="messageEmail" id="" cols="50" placeholder="Type your  message" rows="5"></textarea>
                  </div>
                  <button class="btn btn-dark mt-2" id="button-addon2" type="submit">Send Message</button>
                </form>
                <p class="text-sm text-muted mb-0"></p>
              </div>
              <div class="col-lg-6">
              <section class="py-3 col-12 my-1">
          <div class="container col-12 p-0">
            <div class="row col-12">
              <p>
                <?php 
                if ($msg !== null) {
                  echo $msg;
                }
              ?>
              </p>
              <div class="col-lg-12">
                <h5 class="text-uppercase">Live Chat</h5>
                

                <div class="row ">
          <div class="row ">
              <div class="col-12">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">

                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
              
                    </div>
                    <!--/.direct-chat-messages-->

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="#" method="post" class="textform" enctype="multipart/form-data">
                      <div class="input-group " id="text-input">
                        <input type="text" name="message" placeholder="Type Message ..."  class="message form-control">
                        <span class="input-group-append">
                          <button class="btn btn-warning sendPicBtn">Send</button>
                          <button class="btn-warning ml-1 px-3 rounded"> <i class="fas fa-image text-white"></i> </button>
                        </span>
                      </form>
                      </div>
                      <form action="#" method="post" class="formmsg imgmsg d-none" enctype="multipart/form-data">
                            <div class="input-group" id="file-input">
                              <input type="file" name="image" placeholder="Choose a picture" required class=" form-control">
                              <span class="input-group-append">
                                <button type="submit" name="sendImageBtn" class="btn btn-warning sendImageBtn">Send</button>
                                <button class="btn-warning ml-1 px-3 rounded"> <i class="fas fa-message text-white"></i> </button>
                              </span>
                            </div>
                      </form>
                      
                      
                    
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->
          

          


            

            <!-- PRODUCT LIST -->
           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>



              </div>
             </div>
          </div>
        </section>
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
  <script>
  $('.fa-image').click((e)=>{
      e.preventDefault();
      $('.textform').addClass('d-none');
      $('.imgmsg').removeClass('d-none');
    })

    $('.fa-message').click((e)=>{
      e.preventDefault();
      $('.imgmsg').addClass('d-none');
      $('.textform').removeClass('d-none');
    })



    $('.sendPicBtn').click( function (e) {
        e.preventDefault()
        let msg = $('.message').val();

        if (msg == '') {
          alert('Type in a message');
        } else {
           $.ajax({
            type: "POST",
            url: "send_message.php",
            data: {
                'msg' : msg
            },
            dataType: "JSON",
            success: function (response) {
                $('.message').val('');
            }
        });
        }
    } )

 var chatBox = $('.direct_chat_messages');
 var chatBox2 = document.querySelector('.direct_chat_messages');
    window.setInterval( ()=>{
        $.ajax({
          type : 'POST',
          url : 'messages_files/fetch_msg.php',
          dataType : 'text' ,
          success : function (response) {
            $('.direct-chat-messages').html(response);
            chatBox2.scrollTop = chatBox2.scrollHeight
          }
        })
    } , 1000)

    // $('#file-input').hide()


   


    

    
  </script>
        </html>