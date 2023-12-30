<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");
    $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '' );
    $user_id = (int)$_SESSION['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

    if (isset($_POST['msg'])) {
        $msg = sanitize($_POST['msg']);

        $channel = 'admin_' . $user_id ;
        $time = time();
        $msg_type = 'text';

        $sql = "INSERT INTO messages ( user_id , message , channel , time , msg_type , reciever, sender ) VALUES ( '$user_id' , '$msg' , '$channel' , '$time' , '$msg_type' , 'admin' , '$user_id') ";

        $row = $db->exec($sql);
        if ($row > 0)  {
          $data = ['message' => 'success'];
          echo json_encode($data);
        } else {
            $data = ['message' => 'failed'];
            echo json_encode($data);
        }
    }
