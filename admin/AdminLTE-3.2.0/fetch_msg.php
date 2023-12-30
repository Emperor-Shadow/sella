<?php
session_start();
    $cust_id = $_POST['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '' );
    $allmsg = $db->query("SELECT * FROM messages JOIN users ON messages.user_id = users.id WHERE user_id = '$cust_id' ORDER BY time");
    while ($row = $allmsg->fetch(PDO::FETCH_ASSOC)) {
    $time = date("d M h:i a", $row['time']);
    if ( $row['msg_type'] == "image" ) {
            $message = "<img class='w-100' src='../../message_images/".$row['message']."'>";
        } else {
            $message = $row['message'];
        }
    if ($row['sender'] == 'admin') {
        
    echo '<div class="direct-chat-msg">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-right">Admin</span>
        <span class="direct-chat-timestamp float-left">'.$time.'</span>
    </div>
    <div class="direct-chat-text ms-0">
        '.$message.'
    </div>
    </div>';
    } else {
    echo '<div class="direct-chat-msg bg-dark right">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-left">'.$row['email'].'</span>
        <span class="direct-chat-timestamp float-right">'.$time.'</span>
    </div>
    <div class="direct-chat-text me-0">
    '.$message.'
    </div>
    </div>';
    }

    // print_r($row);
    }
    
                      ?> 