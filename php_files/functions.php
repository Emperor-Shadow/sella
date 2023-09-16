<?php


function success_msg ($msg) {
    return '<div class="alert alert-dismissible alert-success  col-7 mb-0 mx-auto fade show">'.$msg.' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

function error_msg ($msg) {
    return '<div class="alert alert-dismissible alert-danger  col-7 mb-0 mx-auto">'.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;
}

function sanitize ($input) {
    $connection = mysqli_connect('localhost' , 'root' ,'', 'ecommerce');
    return mysqli_real_escape_string($connection , strip_tags(trim($input)));
}



 
function totalise ($user_id , $connection) {

    $total = null;
  
  
    $load_cart_query = "SELECT * FROM cart WHERE customer_id = '$user_id'";
  
  $run_query = mysqli_query($connection , $load_cart_query);
  $row3 = mysqli_affected_rows($connection);
  
  if ($row3 > 0) {
    
    //get products information 
    
      while ($result = mysqli_fetch_assoc($run_query)) {
        
        $prd_amt = $result['amount'];
      
      $prod_id = $result['product_id'];
      
      $show = "SELECT * FROM products WHERE id = '$prod_id'";
      $run_query_cart = mysqli_query($connection , $show);
      $cart_result = mysqli_fetch_assoc($run_query_cart);
      
      
      
      $row2 = mysqli_affected_rows($connection);
      
            if ($row2 !== 0) {
                $total += $cart_result['product_new_price'] * $prd_amt;  
               
      } else {
        $total = 0.00;
      }
      
      }
    
  } else {
    $total = 0.00;
  }
  $_SESSION['total'] = $total; 
  }
  







//===== function to load all products from the database start =====//
  function load_all ($connection) {
    //   $category_id = (int)$_POST['category']; 
    
      $currency = '$';
    
    //fetch categories with the id sent with the post request 
      $fetch_cat = "SELECT * FROM categories";
      $run_fetch_cat = mysqli_query($connection , $fetch_cat);
      $row = mysqli_affected_rows($connection);
    
      while ( $result = mysqli_fetch_assoc($run_fetch_cat))  {
    
    //get category name
      $category_name = $result['category_name'];
    
    //fetch all goods that fslls under the category
      $fetch_goods = "SELECT * FROM products WHERE product_category = '$category_name'";
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
    
          echo '
          <div class="col-lg-4 col-sm-6">
          <div class="product text-center">
            <div class="mb-3 position-relative">
              <div class="badge text-white bg-danger" >-'.$fetch_result['discount'].percent.'</div><a class="d-block" style = "height: 150px;" href="detail.php?product_id='.+ $fetch_result['id'].'"><img class="img-fluid w-100 h-100" style="object-fit: contain;" src="product_images/'.$fetch_result['product_picture'].'" alt="..."></a>
              <div class="product-overlay">
                <ul class="mb-0 list-inline">
                  <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><img src="icons/heart.svg" alt="" style="height: 15px;"></a></li>
                  <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark add-to-cart-'.$fetch_result['id'].'" onclick = "add_to_cart('.$fetch_result['id'].')">'.$btn_message.'</a></li>
                  <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                </ul>
              </div>
            </div>
            <h6> <a class="reset-anchor" href="detail.php?product_id='.+ $fetch_result['id'].'">'.$new_name.'</a></h6>
            <p class="small text-muted">'.dollar.$fetch_result['product_new_price'].'</p>
          </div>
        </div>
          ';
              // print_r($fetch_result);
          }
       
    
      }
    
    // print_r($result);
     }
    
     }
  //===== function to load all products from the database start =====//


  //function to register a guest user into the database ======//

  function reg_guest ($connection ,$user_id , $fname , $user_type) {
    $register_user_query = "INSERT INTO guest_user(`id` ,`fname`,  `user_type`) VALUES ('$user_id', '$fname' , '$user_type')";
    $run_insert_guest = mysqli_query($connection , $register_user_query);
    $row = mysqli_affected_rows($connection);              
  }
 
