<?php
session_start();
    $user_id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '' );
    $allmsg = $db->query("SELECT DISTINCT * FROM messages WHERE user_id = '$user_id' ORDER BY time");
    while ($row = $allmsg->fetch(PDO::FETCH_ASSOC)) {
    $time = date("d M h:i a", $row['time']);
    if ($row['sender'] == (int)$user_id) {
        if ( $row['msg_type'] == "image" ) {
            $message = "<img class='w-100' src='message_images/".$row['message']."'>";
        } else {
            $message = $row['message'];
        }
    echo '<div class="direct-chat-msg right">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-right">'.$fname . '-' . $lname.'</span>
        <span class="direct-chat-timestamp float-left">'.$time.'</span>
    </div>
    <div class="direct-chat-text me-0">
    '.$message.'
    </div>
    </div>';
    } else {
    echo '<div class="direct-chat-msg">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-left">Admin</span>
        <span class="direct-chat-timestamp float-right">'.$time.'</span>
    </div>
    <div class="direct-chat-text ms-0">
        '.$row['message'].'
    </div>
    </div>';
    }
    }
    
                      ?>