<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");

    $product_id = (int)$_POST['product_id']; 
    $user_id = (int) $_SESSION['id'];


    
    //get the amount of products in the cart of the logged user

    $amount_in_cart_query = "SELECT COUNT(*) FROM cart WHERE customer_id = '$user_id'";
    $amount_result = mysqli_query($connection , $amount_in_cart_query);
    $amount_array = mysqli_fetch_array($amount_result);
    $amount_count = (int)$amount_array['COUNT(*)'];
    $affected_rows = mysqli_affected_rows($connection);

    if ($affected_rows > 0) {
//check if the product is already in the database
    $check_query = "SELECT * FROM cart WHERE product_id = '$product_id' AND customer_id = '$user_id'";

    $run_query = mysqli_query($connection , $check_query);
    $rows = mysqli_affected_rows($connection);

  if ($rows == 0) {
  $amount = 1;
  $add_query = "INSERT INTO cart (`customer_id` , `product_id` , `amount`) VALUES ('$user_id' , '$product_id' , '$amount' )";
  $run_add_query = mysqli_query($connection , $add_query);
  $add_row = mysqli_affected_rows($connection);
  
        if ($add_row > 0) {



            $amount_in_cart_query = "SELECT COUNT(*) FROM cart WHERE customer_id = '$user_id'";
    $amount_result = mysqli_query($connection , $amount_in_cart_query);
    $amount_array = mysqli_fetch_array($amount_result);
    $amount_count = (int)$amount_array['COUNT(*)'];



    
    $data = ['status' => 'success' , 'message' => 'added' , 'count' => $amount_count];
    echo json_encode($data);
    
        } else {
          
    $data = ['status' => 'failed' , 'message' => 'failed'];
    echo json_encode($data);
    
          }
  
  
} else {
  $data = ['status' => 'success' , 'message' => 'in-cart'];
    echo json_encode($data);
}
    } else {
        $data = ['status' => 400 , 'message' => 'in-cart'];
        echo json_encode($data);
    }

    
    
    
    

    
    
    
?>