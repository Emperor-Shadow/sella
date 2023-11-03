<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");

    // echo $_POST['id'];
    $id = $_POST['id'];
    $dd = "DELETE from address WHERE id = '$id'";
    $rn = mysqli_query($connection , $dd);
    $rr = mysqli_affected_rows($connection);
    if ( $rr > 0 ) {
        $data = [ 'response' => 200 , 'message' => 'done' ];
        echo json_encode($data);
    } else {
        $data = [ 'response' => 400 , 'message' => 'fail' ];
        echo json_encode($data);
    }