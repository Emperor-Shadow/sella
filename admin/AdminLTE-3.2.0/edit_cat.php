<?php
    require_once("../../php_files/connection.php");
    require_once("../../php_files/functions.php");



    $id = $_POST['id'];
    $category_edited = sanitize($_POST['input_value']);


    //go into the database and add the effect of the corressponding change
    $change_query = "UPDATE `categories` SET `category_name`='$category_edited' WHERE id = '$id'";
    $run_change_query = mysqli_query($connection , $change_query);
    $row = mysqli_affected_rows($connection);

    if ($row > 0) {
        $data = [
            'status' => 'success' ,
        ];

        echo json_encode($data);
    } else {

        $data = [
            'status' => 'failed' ,
        ];

        echo json_encode($data);
    }

?>