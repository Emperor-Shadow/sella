<?php

    require_once("php_files/connection.php");
    require_once("php_files/functions.php");

    $product_id = (int)$_POST['product_id']; 
    $user_id = $_SESSION['id'];

    totalise($user_id ,$connection);

    
    $get_quantity = "SELECT amount FROM cart WHERE customer_id = '$user_id' AND product_id = '$product_id'";
    $run_get_quantity_query = mysqli_query($connection , $get_quantity);
    $get_result = mysqli_fetch_assoc($run_get_quantity_query);
    
    if ((int) $get_result['amount'] > 0) {

    $get_result['amount'] += 1;
      $new_result = $get_result['amount'];
      $update_amount = "UPDATE cart SET amount = '$new_result' WHERE customer_id = '$user_id' AND product_id = '$product_id'";
      $run_update = mysqli_query($connection, $update_amount);
      
      $row = mysqli_affected_rows($connection);
      
      if ($row > 0) {


        $load_cart_query = "SELECT * FROM cart WHERE customer_id = '$user_id' AND product_id = '$product_id'";
        $run_query = mysqli_query($connection , $load_cart_query);
        $row = mysqli_affected_rows($connection);
        
        if ($row > 0) {
          
          //get products information 
          
            while ($result = mysqli_fetch_assoc($run_query)) {
              
              $prod_amount = $result['amount'];
             
            }
          }


          





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











        $data = ['status' => 'success' , 'message' => 'incremented' , 'quantity' => $prod_amount , 'total' => $total];
        echo json_encode($data);
      } else {
        $data = ['status' => 'failed' , 'message' => 'error'];

        echo json_encode($data);
      }
    
      
    }  else {
      // $update_amount = "UPDATE cart SET amount = 1 WHERE customer_id = '$user_id' AND product_id = '$product_id'";
      // $run_update = mysqli_query($connection, $update_amount);
      echo 'something went wrong';
    } 
    
    ?>
    
    
    