<?php
    require_once("../../php_files/connection.php");
    require_once("../../php_files/functions.php");

    $id = (int) $_POST['id'];

    $query = "DELETE FROM `users` WHERE id = '$id'";
    $run_del_query = mysqli_query($connection , $query);
    $row = mysqli_affected_rows($connection);

    if ($row > 0) {
        $data = [
            'status' => 'success'
        ];
        echo json_encode($data);
    } else {
        $data = [
            'status' => '400'
        ];
        echo json_encode($data);
    }

    ?>