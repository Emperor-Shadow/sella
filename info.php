<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");

    $user_id = $_SESSION['id'];

    $fn = sanitize($_POST['fname']);
    $ln = sanitize($_POST['lname']);
    $ea = sanitize($_POST['email']);

    $qq = "UPDATE users SET fname = '$fn' , lname = '$ln' , email = '$ea' WHERE id = '$user_id'";
    $rq = mysqli_query($connection , $qq);
    $row = mysqli_affected_rows($connection);
    
    if (  $row > 0 ) {
        $data = [ 'message' => 'Changed successful' ];
        echo json_encode($data);
    } else {
        $data = [ 'message' => 'No changes made' ];
        echo json_encode($data);
    }
