<?php 
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");
    use Mailtrap\Config;
    use Mailtrap\EmailHeader\CategoryHeader;
    use Mailtrap\EmailHeader\CustomVariableHeader;
    use Mailtrap\Helper\ResponseHelper;
    use Mailtrap\MailtrapClient;
    use Symfony\Component\Mime\Address;
    use Symfony\Component\Mime\Email;
    use Symfony\Component\Mime\Header\UnstructuredHeader;
    
    require __DIR__ . '/vendor/autoload.php';





    $user_id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $name = $_SESSION['fname'];
    $user_type = $_SESSION['user_type'];
    require_once("php_files/logged_in.php");
    $count = $_SESSION['count'];
    $tt = (int)($_SESSION['total']);

    echo '<script> var amt = '.$tt.' </script>';

    totalise($user_id ,$connection);
    
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
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <body>
  <style>
   label {
        display: block;
    }
    
  </style>
    <div class="page-holder">
      <!-- navbar-->
     <?php require_once('nav.php') ?>
      <!--  Modal -->
      <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4">Red digital smartwatch</h2>
                    <p class="text-muted">$250</p>
                    <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5"><a class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" href="cart.php">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Cart</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
          <div class="alert alert-success alert-dismissible fade show" role="alert"> Order successful. Check your profile for the order status
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                    </tr>
                  </thead>
                  <tbody class="border-0">

                    <?php
                    //get all products id from the database with the id of the user start
                    $load_cart_query = "SELECT * FROM cart WHERE customer_id = '$user_id'";
                    $run_query = mysqli_query($connection , $load_cart_query);
                    $row = mysqli_affected_rows($connection);

                    if ($row > 0) {
                      
                      //get products information 
                      
                        while ($result = mysqli_fetch_assoc($run_query)) {
                          
                          $prod_amount = $result['amount'];
                        
                        $prod_id = $result['product_id'];
                        
                        $show = "SELECT * FROM products WHERE id = '$prod_id'";
                        $run_query_cart = mysqli_query($connection , $show);
                        $cart_result = mysqli_fetch_assoc($run_query_cart);
                        
                        $rows = mysqli_affected_rows($connection);
                        
                              if ($rows !== 0) {

                             $toto = $prod_amount > 1 ? $prod_amount * $cart_result['product_new_price'] : $cart_result['product_new_price'];
                   
                              
                              echo '
                              <tr class="'.$cart_result['id'].'">
                      <th class="ps-0 py-3 border-light" scope="row">
                        <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php?product_id='.+ $cart_result['id'].'"><img src="product_images/'.$cart_result['product_picture'].'" alt="..." width="70"/></a>
                          <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php?product_id='.+ $cart_result['id'].'">'.$cart_result['product_name'].'</a></strong></div>
                        </div>
                      </th>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small">'.dollar.number_format($cart_result['product_new_price'], 2, '.' , ',').'</p>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                          <div class="quantity">
                            <button class=" p-0"><img onclick = "minus_one('.$cart_result['id'].')"   src="icons/caret-left.svg" alt="" style="height: 15px;"></button>
                            <input readonly class="form-control form-control-sm border-0 shadow-0 p-0 quantity-'.$cart_result['id'].'" type="text" value = "'.$prod_amount.'" />
                            <button class=" p-0"><img onclick = "plus_one('.$cart_result['id'].')" src="icons/caret-right.svg" alt="" style="height: 15px;"></button>
                          </div>
                        </div>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small total">'.dollar.number_format($toto, 2, '.' , ',').'</p>
                      </td>
                      <td class="p-3 align-middle border-light"><a class="reset-anchor" href="#!"><img onclick = "delete_from_cart('.$cart_result['id'].')" src="icons/trash.svg" alt="" style="height: 15px;"></a></td>
                    </tr>
                              ';

                    // $total += $cart_result['product_new_price'];
                          
                          
                          
                        
                        } else {
                          echo "Something went wrong. Try reloading the page or add something to cart";
                        }
                        
                        }
                      
                    } else {
                      echo "Nothing in cart ";
                    }

                    //end
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-end">
                  </div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="col-12">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Cart total</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small tt"><?php echo dollar.number_format($_SESSION['total'], 2, '.' , ','); ?></span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span class="tt"><?php echo dollar.number_format($_SESSION['total'], 2, '.' , ','); ?></span></li>
                  
                  </ul>
                </div>
              </div>
              </div>
               <div class="col-12">
               <div class="card col-12">
            <div class="card-head w-100 d-flex justify-content-between px-3 py-2">
               
            </div>
            <div class="card-body">
                <?php
                $query = "SELECT * FROM address WHERE user_id = '$user_id'";
                $run = mysqli_query($connection , $query);
                $row = mysqli_num_rows($run);
                if ( $row > 0 ) {
                    while ( $result = mysqli_fetch_assoc($run) ) {
                        // echo $result['user_id'];
                        echo  '<div class =" addr-'.$result['id'].' my-1 p-1 d-flex justify-content-between align-items-center"> 
                            <div> 
                           
                           <label name="'.$result['user_id'].'" value="'.$result['user_id'].'"> <input id ="'.$result['user_id'].'" type="radio" checked name="'.$result['user_id'].'" value="'.$result['user_id'].'"> ' .' My Address</label> 
                            <label for=""> <b>Address</b> : '.$result['address'].'</label>
                            <label for=""> <b>City</b> : '.$result['city'].'</label>
                            <label for=""> <b>State</b> : '.$result['state'].'</label>
                            </div>
                            <div> 
                               <button class=" bg-none outline-none border-0" onclick="remove_addr('.$result['id'].')"> <i class="fa fa-trash"></i> </button> 
                            </div>
                        </div>
                        
                        ';
                    }
                    echo '<a onclick="order2()" class="btn btn-outline-dark btn-sm">CASH ON DELIVERY<i class="fas fa-long-arrow-alt-right ms-2"></i></a>
                    <a onclick="payWithPaystack()" class="btn btn-outline-dark btn-sm">CASH ONLINE<i class="fas fa-long-arrow-alt-right ms-2"></i></a>';
                } else {
                    echo "Please <a href='add_address.php'> add an address </a> to proceed with the checkout. ";
                }
                ?>
                
                <script>
                  // alert(amt)
                    function payWithPaystack(){
                      var handler = PaystackPop.setup({
                        key: 'pk_test_48df4f62a27539e53337216424ef40925b4d1db5',
                        email: "<?php echo $email; ?>",
                        amount: amt,
                        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                        metadata: {
                          custom_fields: [
                              {
                                  display_name: "<?php echo $name; ?>",
                                  variable_name: "mobile_number",
                                  value: "+2348012345678"
                              }
                          ]
                        },
                        callback: function(response){
                          console.log(response);
                          var payRes = response;
                          order(payRes);
                          // console.log(payRes.status);
                          // console.log(payRes.reference);
                          alert('success. transaction ref is ' + response.reference);
                        
                        },
                        onClose: function(){
                          // alert(amount)
                            alert('window closed');
                        }
                      });
                      handler.openIframe();
                    }
</script>

            </div>
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
      <script src="js/jquery.com_jquery-3.7.0.js"></script>
      <script src="js/functionalities.js"></script>
      <script src="https://js.paystack.co/v1/inline.js"></script>
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
        
        order = (payRes) => {
          // console.log(payRes);
          // console.log(payRes.reference);
          // console.log(payRes.status);
            $.ajax({
              type: "POST",
              url: "order_func.php",
              data : {
                  'reference' : payRes.reference,
                  'status' : payRes.status,
                  'amt_paid' : amt
              },
              dataType: "json",
              success: function (response) {
                if ( response.code == '200' ) {
                  $('.alert').text(response.message).show();
                  alert('Order has been made. CHeck your profile for your order tracking');
                  console.log(response.message);
                  location.reload();
                } else {
                  $('.alert').text(response.message).show();
                  console.log(response.message);
                  // location.reload();
                }
                
              }
            });
        }
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    </div>
  </body>
</html>