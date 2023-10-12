<?php
    require_once("../../php_files/connection.php");
    require_once("../../php_files/functions.php");

    $id = (int) $_POST['id'];

    $gg = "SELECT product_picture FROM products WHERE id = $id";
    $rrr = mysqli_query($connection , $gg);
    if (mysqli_num_rows($rrr) > 0) {
        $pic = mysqli_fetch_assoc($rrr);

       $done = unlink("../../product_images/".$pic['product_picture']);
       if ($done) {
        $query = "DELETE FROM `products` WHERE id = '$id'";
    $run_del_query = mysqli_query($connection , $query);
    $row = mysqli_affected_rows($connection);

    if ($row > 0) {
        $data = [
            'status' => 'success'
        ];
        echo json_encode($data);

    } else {
        $data = [
            'status' => 'failed'
        ];
        echo json_encode($data);
    }
       }

    }

    

    ?>