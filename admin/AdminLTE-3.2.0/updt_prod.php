<?php ob_start();
require_once("../../php_files/connection.php");
require_once("../../php_files/functions.php");



  if (isset($_POST['pid'])) {
    // print_r($_POST);

    $id = (int)$_POST['pid'];
  $product_name = sanitize($_POST['name']);
  $product_description = sanitize($_POST['desc']);
  $product_old_price = (int)sanitize($_POST['oprice']);
  $product_quantity = (int)sanitize($_POST['stock']);
  $product_discount = (int)sanitize($_POST['discount']);
  $new_price = (float)sanitize($_POST['nprice']);


        //a query to update product information into the database
        $update_product_query = "UPDATE products SET  product_name = ?,  product_description = ?, product_new_price = ?, product_old_price = ?, product_stock_quantity = ?, discount = ?  WHERE  id = '$id'";

        $stmt_product = mysqli_prepare($connection , $update_product_query);

        mysqli_stmt_bind_param($stmt_product , "ssssss" , $product_name , $product_description, $new_price  , $product_old_price , $product_quantity , $product_discount);

        mysqli_stmt_execute($stmt_product);

        $row_product =mysqli_stmt_affected_rows($stmt_product);

        if ($row_product > 0) {
           $data = ['status' => 'success'];
           echo json_encode($data);
        } else {
            $data = ['status' => 'failed'];
            echo json_encode($data);       
         }
              
  }

$msg = null;

?>