<?php 
 require_once("php_files/connection.php");
 require_once("php_files/functions.php");

    $id = $_POST['id'];

    $query = "SELECT * FROM products WHERE id = $id";
    $run_fetch = mysqli_query($connection  , $query);
    $row = mysqli_affected_rows($connection);
    $result = mysqli_fetch_assoc($run_fetch);

//    print_r($result);

    foreach ($result as $key) {
        # code...

        $data[] = $key ;
       
    } echo json_encode($data);
?>