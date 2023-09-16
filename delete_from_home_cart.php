<?php

    require_once("../php_files/connection.php");
    require_once("../php_files/functions.php");

    $product_id = (int)$_POST['product_id']; 
    $user_id = $_SESSION['id'];
    //check if the product is already in the database
  $delete_query = "DELETE FROM cart WHERE customer_id = '$user_id' AND product_id = '$product_id'";
  
  $run_delete_query = mysqli_query($connection , $delete_query);
  $deleted_row = mysqli_affected_rows($connection);
  
  
        if ($deleted_row > 0) {
    echo $user_id;
    $data = ['status' => 'success' , 'message' => 'removed from cart' , 'count' => $amount_count , 'total' => $total];
    echo json_encode($data);
    
        } else {
          echo $product_id;
    $data = ['status' => 'failed' , 'message' => 'Something went wrong'];
    echo json_encode($data);
          }
    
    
?>