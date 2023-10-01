<?php 
//   header('URL : login.php');
        if (!$user_id > 0) {
        session_destroy();
        header("location: login.php");
    }
