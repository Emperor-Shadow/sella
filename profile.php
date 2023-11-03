<?php
  require_once("php_files/connection.php");
  require_once("php_files/functions.php");

  $user_id = $_SESSION['id'];

  profile_refresh ($connection , $user_id);

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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <style>
   label {
        display: block;
    }
    
  </style>
  <body>
    <div class="page-holder">
      <!-- navbar-->
    <?php require_once('nav.php'); ?>


    <section class="mt-5">
        <div class="col-12 mx-auto text-black p-5 bg-light ">
            <h1> <?php echo $fname . ' ' . $lname ?> </h1>

            <p class="py-1"> Email : <?php echo $email ?> </p>
            <p class="py-1"> Username : <?php echo $fname . '-' . $lname ?> </p>

            <div class="row"> 

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <a href="add_address.php" class="btn btn-success col-md-3 col-5 text-white"> <i class="fa fa-plus"></i> Add address</a>
                <a href="order.php" class="btn btn-outline-success col-md-3 col-5 ms-2"> <i class="fa fa-cart-flatbed text-success"></i> My Order</a >
            </div>

            
        </div>


        <div class="row col-12 mx-auto mb-3">
            <div class="col-md-6">
                            <div class="card col-12">
                            <div class="card-head w-100 d-flex justify-content-between px-3 py-2">
                                <p class="d-inline-block">Addresses</p> 
                                <a href="add_address.php">Add Address</a>
                            </div>
                            <div class="card-body">
                                <?php
                                $query = "SELECT * FROM address WHERE user_id = '$user_id'";
                                $run = mysqli_query($connection , $query);
                                $row = mysqli_num_rows($run);
                                if ( $row > 0 ) {
                                    while ( $result = mysqli_fetch_assoc($run) ) {
                                        // echo $result['user_id'];
                                        echo  '<div class =" addr-'.$result['id'].' my-2 p-4 bg-light d-flex justify-content-between align-items-center" style = "height: 200px; overflow-y: scroll;"> 
                                            <div class="px-2"> 
                                        <!--- <input type="radio" name="'.$result['user_id'].'" value="'.$result['user_id'].'"> ' .' -->
                                        <b>My Address</b> 
                                            <label for="" > <b>Address</b> : '.$result['address'].'</label>
                                            <label for=""> <b>City</b> : '.$result['city'].'</label>
                                            <label for=""> <b>State</b> : '.$result['state'].'</label>
                                            </div>
                                            <div> 
                                            <button class=" bg-none outline-none border-0" onclick="remove_addr('.$result['id'].')"> <i class="fa fa-trash"></i> </button> 
                                            </div>
                                        </div>
                                        ';
                                    }
                                } else {
                                    echo "No address added yet!";
                                }
                                ?>
                            </div>

                            
                        </div>

                        <div class="card d-inline-block col-12">
                            <div class="card-head w-100 d-flex justify-content-between px-3 py-2">
                                <p class="d-inline-block ">Orders</p> 
                                <a href="shop.php">Place an order</a>
                            </div>
                            <div class="card-body" style = "height: 150px; overflow-y: scroll;">
                            <div class="table-responsive">
                                            <table class="table">
                                <thead>
                                        <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">OrderId</th>
                                        </tr>
                                    </thead>
                                        
                                <?php
                                
                                $query = "SELECT * FROM order_tb WHERE user_id = '$user_id'";
                                $run = mysqli_query($connection , $query);
                                $row = mysqli_num_rows($run);
                                if ( $row > 0 ) {
                                    while ( $result = mysqli_fetch_assoc($run) ) {
                                        // $torder = new DateTime($result['time_ordered']);
                                        //     $tcurrent = new DateTime();

                                        //     $tdiff = $tcurrent->diff($torder);
                                        //     $totalMinutes = $tdiff->days * 24 * 60 + $tdiff->h * 60 + $tdiff -> i;
                                        //     $totalSeconds = $totalMinutes * 60 + $tdiff->s;

                                        //     if ($totalSeconds < 60) {
                                        //         $timeago = $totalSeconds. 'secs ago';
                                        //     } else if ( $totalMinutes < 60 ) {
                                        //         $timeago = $totalMinutes. 'min ago';
                                        //     } else if ( $tdiff->d == 0 ) {
                                        //         $timeago = $tdiff->h . 'h' . $tdiff->i . 'min ago';
                                        //     } else {
                                        //         $timeago = $tdiff->d . 'days ago';
                                        //     }

                                        $trackid = $result['tracking_id'];
                                        $pid = $result['product_id'];
                                    $getq = "SELECT * FROM products WHERE id = '$pid'";
                                    $runq = mysqli_query($connection , $getq);
                                    $row = mysqli_num_rows($runq);

                                    if (!$row > 0) {
                                        echo 'Something went wrong';
                                    } else {

                                        while ( $res = mysqli_fetch_assoc($runq) ) {
                                            
                                            echo '
                                            <tr>
                                            <td class="text-wrap">'.$res['product_name'].'</td>
                                            <td class="text-wrap">'.$trackid.'</td>
                                        </tr>
                                            ';

                                        }
                                    }
                                    }
                                } else {
                                    echo "No Order yet!";
                                }
                                
                                ?>  </table>
                                        </div>
                            </div>
                            
                            </div>
                            <!-- <a href="track.php" class=" px-2 py-2 ms-4"> <button class="btn btn-success">Track Order</button> </a> -->
                            
        </div>
                    <div class="col-md-6 py-2">
                         <h4>Account management</h4>
                         <h5 class="px-4">Profile Details</h5>
                        <form action="">
                                <div class="form-group col-10 mx-auto">
                                        <div class="form-label"> First Name </div>
                                        <input class="fg fn w-100 px-2 py-2 bg-light text-dark rounded border-1" type="text" value = "<?php echo $fname; ?>" name="" id="">
                                </div>

                                <div class="form-group col-10 mx-auto">
                                        <div class="form-label"> Last Name </div>
                                        <input class="fg ln w-100 px-2 py-2 bg-light text-dark rounded border-1" type="text" value = "<?php echo $lname; ?>" name="" id="">
                                </div>

                                <div class="form-group col-10 mx-auto">
                                        <div class="form-label"> Email Address</div>
                                        <input class="fg ea w-100 px-2 py-2 bg-light text-dark rounded border-1" type="email" class="" value = "<?php echo $email; ?>" name="" id="">
                                </div>
                                <button class="btn btn-outline-success  d-block my-2 px-3 col-10 mx-auto" id="editDetails">Save</button>
                        </form>
                        

                        <h5 class="px-4">Change Password</h5>
                        <form action="">
                                <div class="form-group col-10 mx-auto">
                                        <div class="form-label">Current Password</div>
                                        <input class="fg cp w-100 px-2 py-2 bg-light text-dark rounded border-1" type="password"  name="" id="">
                                                                       </div>

                                <div class="form-group col-10 mx-auto">
                                        <div class="form-label"> New Password </div>
                                        <input class="fg np w-100 px-2 1 py-2 bg-light text-dark rounded border-1" type="password" name="" id="">
                                                                       </div>

                                <div class="form-group col-10 mx-auto">
                                        <div class="form-label"> Confirm Passwrod </div>
                                        <input class="fg cnp w-100 px-2 py-2 bg-light text-dark rounded border-1" type="password" class="" name="" id="">
                                                                       </div>
                                <button class="btn btn-outline-success  d-block my-2 px-3 col-10 mx-auto" id="editPass">Save</button>
                        </form>
                        
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
        
            $('.alert').hide()

        remove_addr = (i) => {
  $.ajax({
      type: "post",
      url: "remove_addr.php",
      data: {
          'id' : i
      },
      dataType: "json",
      success: function (response) {
        if ( response.message === "done" ) {
             $('.addr-'+ i).remove()
             $('.alert').text('Address deleted successfully').show();
        } else {
            $('.alert').text('Something went wrong').show();
        }
         
      }
  });
// alert(i)
}
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</php>