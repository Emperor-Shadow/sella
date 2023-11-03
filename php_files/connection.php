<?php
session_start();
$connection = mysqli_connect('localhost' , 'root' ,'', 'ecommerce');
// error_reporting(0);

define( "dollar" , '₦');
define( "percent" , '%');

function profile_refresh ($connection , $user_id) {
    $qry = "SELECT * FROM users WHERE id = '$user_id'";
    $rrq = mysqli_query($connection , $qry);
    $rss = mysqli_fetch_assoc($rrq);
    $_SESSION['id'] = $rss['id'];
    $_SESSION['fname'] = $rss['fname'];
    $_SESSION['lname'] = $rss['lname'];
    $_SESSION['email'] = $rss['email'];
    $_SESSION['user_type'] = $rss['user_type'];
}

// $c_date = date();