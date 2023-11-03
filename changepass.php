<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");

    $user_id = $_SESSION['id'];

    $cp = sanitize($_POST['cp']);
    $np = sanitize($_POST['np']);
    $cnp = sanitize($_POST['cnp']);

    $qry = "SELECT password FROM users WHERE id = '$user_id'";
    $rrq = mysqli_query($connection , $qry);
    $rss = mysqli_fetch_assoc($rrq);

    $op = $rss['password'];

    if (password_verify($cp , $op)) {
        if ( $np == $cnp ) {
            $pass = password_hash($np , PASSWORD_BCRYPT);

                $qq = "UPDATE users SET password = '$pass'";
                $rq = mysqli_query($connection , $qq);
                $row = mysqli_affected_rows($connection);
                
                if ( $row > 0 ) {
                    $data = [ 'message' => 'Password changed successful' ];
                    echo json_encode($data);
                } else {
                    $data = [ 'message' => 'Something went wrong' ];
                    echo json_encode($data);
                }
        

        } else {
            $data = [ 'message' => 'New passwords do not match'];
            echo json_encode($data);
        }
    } else {
        $data = [ 'message' => 'Incorrect password' , 'code' => 'np' ];
        echo json_encode($data);
    }
