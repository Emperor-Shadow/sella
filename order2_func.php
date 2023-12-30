<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");

    $user_id = $_SESSION['id'];
    $amt_paid = $_SESSION['total'];

    $trackid = str_pad(mt_rand(0 , 9999) , 4, 'O' , STR_PAD_LEFT);

    $getq = "SELECT * FROM cart WHERE customer_id = '$user_id'";
    $runq = mysqli_query($connection , $getq);
    $row = mysqli_num_rows($runq);
    
    if ($row > 0) {

        while ( $result1 = mysqli_fetch_assoc($runq) ) {
            $rn = $result1['product_id'];
            $qnt = $result1['amount'];
            $insq = "INSERT INTO `order_tb`( `user_id`, `product_id` , `quantity` , `tracking_id`) VALUES ('$user_id','$rn', '$qnt' , '$trackid')";
            $rq = mysqli_query($connection , $insq);
            $rr = mysqli_affected_rows($connection);
        }
        if ( $rr > 0 ) {
            $insert_trans = "INSERT INTO `transactions`( `tracking_id` , `user_id` , `status` , `amount_paid` , `payment_type`) VALUES ('$trackid', '$user_id' , 'success' , '$amt_paid' , 'on-delivery')";
            $insert_q = mysqli_query($connection , $insert_trans);
            $insert_row = mysqli_affected_rows($connection);
            if ( $insert_row > 0 ) {
                        $che = "SELECT * FROM order_tb WHERE user_id = '$user_id'";
                        $rch = mysqli_query($connection , $che);
                        $row = mysqli_num_rows($rch);

                        if ($row > 0) {

                                $ddd = "DELETE FROM `cart` WHERE customer_id = '$user_id'";
                                $rdo = mysqli_query($connection , $ddd);
                                $_SESSION['total'] = 0;
                                $data = [ 'code' => '200', 'message' => 'success' ];
                                
                        } else {
                            $data = [ 'code' => '400', 'message' => 'Something went wrong' ];
                            
                        }
            } else {
                        $data = [ 'code' => '200', 'message' => 'success' ];
                        
            }


} else {
    $data = [ 'code' => '400', 'message' => 'Something went wrong' ];
    echo json_encode($data);
}


    } else {
        $data =  ['status' => '400', 'message' => 'Cart is empty' ];
        echo json_encode($data);
    }
    ?>