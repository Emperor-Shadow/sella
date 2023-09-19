<?php
   require_once("php_files/connection.php");
   require_once("php_files/functions.php");
   $user_id = $_SESSION['id'];
   $user_type = $_SESSION['user_type'];
   $count = $_SESSION['count'];

    if ($user_id > 0) { 

        $qq = "DELETE from cart WHERE customer_id = '$user_id'";
        $runqq = mysqli_query($connection , $qq);
        $row = mysqli_affected_rows($connection);
        if ($row > 0) {
            $data = ['status' => 'success'];
            echo 'done';
            echo json_encode($data);
        } else {
            $data = ['status' => 'failed'];
            echo 'failed';
            echo json_encode($data);
        }

    } else {
        $data = ['status' => 'failed one'];
        echo 'folad';
        echo json_encode($data);
    }