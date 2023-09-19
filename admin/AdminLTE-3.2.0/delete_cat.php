<?php
    require_once("../../php_files/connection.php");
    require_once("../../php_files/functions.php");

    $id = (int) $_POST['id'];

    $query = "DELETE FROM `categories` WHERE categories.id = '$id'";
    $run_del_query = mysqli_query($connection , $query);
    $row = mysqli_affected_rows($connection);

    if ($row > 0) {
        $data = [
            'status' => 'success'
        ];
        echo $data;
    } else {
        $data = [
            'status' => 'failed'
        ];
        echo $data;
    }

    ?>