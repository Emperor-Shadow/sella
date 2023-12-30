<?php
require_once('../../php_files/functions.php');
    $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '' );
    

    if (isset($_POST['msg'])) {
        
        $cust_id = (int)$_POST['id'];
        $msg = sanitize($_POST['msg']);
        echo $cust_id;
        $channel = 'admin_' . $cust_id ;
        $time = time();
        $msg_type = 'text';

        $sql = "INSERT INTO messages ( user_id , message , channel , time , msg_type , reciever ,sender) VALUES ( '$cust_id' , '$msg' , '$channel' , '$time' , '$msg_type' , '$cust_id' , 'admin') ";

        $row = $db->exec($sql);
        if ($row > 0)  {
          $data = ['message' => 'success'];
          echo json_encode($data);
        // echo 'yes';
        } else {
            $data = ['message' => 'failed'];
            echo json_encode($data);
            // echo 'no';
        }
    }
