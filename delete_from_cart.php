<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");


    $total = null;

    $product_id = (int)$_POST['product_id']; 
    $user_id = $_SESSION['id'];
    
 


 

    //check if the product is already in the database
  $delete_query = "DELETE FROM cart WHERE customer_id = '$user_id' AND product_id = '$product_id'";
  
  $run_delete_query = mysqli_query($connection , $delete_query);
  $deleted_row = mysqli_affected_rows($connection);
  
  
        if ($deleted_row > 0) {






          $amount_in_cart_query = "SELECT COUNT(*) FROM cart WHERE customer_id = '$user_id'";
          $amount_result = mysqli_query($connection , $amount_in_cart_query);
              $amount_array = mysqli_fetch_array($amount_result);
              $amount_count = (int)$amount_array['COUNT(*)'];
          
              // $_SESSION['count'] = $amount_count;
             
          
          
          
              // getting total of all products
          
          $load_cart_query = "SELECT * FROM cart WHERE customer_id = '$user_id'";
          
          $run_query = mysqli_query($connection , $load_cart_query);
          $row = mysqli_affected_rows($connection);
          
          if ($row > 0) {
            
            //get products information 
            
              while ($result = mysqli_fetch_assoc($run_query)) {
              
              $prod_id = $result['product_id'];
              
              $show = "SELECT * FROM products WHERE id = '$prod_id'";
              $run_query_cart = mysqli_query($connection , $show);
              $cart_result = mysqli_fetch_assoc($run_query_cart);
              
              $rows = mysqli_affected_rows($connection);
              
                            if ($rows !== 0) {
                        
          
                          $total += $cart_result['product_new_price'];
                      
                      } else {
                        $total = 0.00;
                      }
                      
                      }
                    
                  } else {
                    $total = 0.00;
                  }
          
          
          
                $_SESSION['total'] = $total; 





    $data2 = ['status' => 'success' , 'message' => 'removed from cart' , 'count' => $amount_count , 'total' => $total];
    echo json_encode($data2);
    
        } else {

          echo $product_id;
    $data2 = ['status' => 'failed' , 'message' => 'Something went wrong'];
    echo json_encode($data2);

          }
    
    
?>