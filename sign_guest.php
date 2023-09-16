<?php 

require_once("php_files/connection.php");
require_once("php_files/functions.php");

// print_r($_POST);

    $fname = sanitize($_POST['fname']);
    $lname = sanitize($_POST['lname']);
    $email = sanitize($_POST['email']);  
    $pass = sanitize($_POST['password']);
    $user_type = 'standard';

    //turn the password into a hashed one
    $pass = password_hash($pass , PASSWORD_BCRYPT);

            
    $check_email = "SELECT * FROM users WHERE email = ?";
    $statement_check = mysqli_prepare($connection , $check_email);
    mysqli_stmt_bind_param($statement_check , "s" ,  $email);
    mysqli_stmt_execute($statement_check);
    $check_result = mysqli_stmt_fetch($statement_check);
    $check_num_row = mysqli_affected_rows($connection);

    if ($check_num_row == 0) {
    //a query to load user information into the database
                $register_user_query = "INSERT INTO users(`email` ,`fname`, `lname`, `password`, `user_type`) VALUES (?,?,?,?,?)";
                $stmt = mysqli_prepare($connection , $register_user_query);
                mysqli_stmt_bind_param($stmt , "sssss" , $email , $fname , $lname, $pass , $user_type );
                mysqli_stmt_execute($stmt);
                $row1 =mysqli_stmt_affected_rows($stmt);

                            echo "registered";


                            $gid = $_SESSION['id'];

                            //move the user product from the cart to the new user

                            // delete the guest user after they have registered
                            $dquery = "DELETE from guest_user WHERE id = '$gid'";
                            $rundel = mysqli_query($connection , $dquery);
                            $rd = mysqli_affected_rows($connection);
                            if ($rd > 0)  {
                                //get the new user information//
                                $get_email = "SELECT * FROM users WHERE email = ?";
                            $statement_check = mysqli_prepare($connection , $get_email);
                             mysqli_stmt_bind_param($statement_check , "s" ,  $email);
                            mysqli_stmt_execute($statement_check);
                            $check_result = mysqli_stmt_get_result($statement_check);
                            $row = mysqli_fetch_array($check_result);

                            if ($row > 0) {
                                $_SESSION['id'] = $row['id'];
                                $_SESSION['fname'] = $row['fname'];
                                $_SESSION['lname'] = $row['lname'];
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['user_type'] = $row['user_type'];

                                $new_id = $_SESSION['id'];


                                //then update the previous cart informartion with the new user//

                                $mquery = "UPDATE `cart` SET `customer_id`='$new_id', WHERE customer_id = '$gid'";
                                $rmq = mysqli_query($connection , $mquery);
                                $rrr = mysqli_affected_rows($connection); 
                                if ($rrr > 0) {
                                    echo 'All done';
                                }
                            } else {
                                echo 'Error';
                            }
                            }
                          $mmm = 'registered';
                        $data = ['msg' => $mmm , 'status' => 'success'];
                        echo json_encode($data);
                                  
        } else {
            // echo 'Email exist';
            $msg = 'Email exist';
        }
     