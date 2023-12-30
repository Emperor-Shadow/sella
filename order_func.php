<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");
    $fname = $_SESSION['fname'];
    use Mailtrap\Config;
    use Mailtrap\EmailHeader\CategoryHeader;
    use Mailtrap\EmailHeader\CustomVariableHeader;
    use Mailtrap\Helper\ResponseHelper;
    use Mailtrap\MailtrapClient;
    use Symfony\Component\Mime\Address;
    use Symfony\Component\Mime\Email;
    use Symfony\Component\Mime\Header\UnstructuredHeader;
    
    require __DIR__ . '/vendor/autoload.php';
    $trackid = str_pad(mt_rand(0 , 9999) , 4, 'O' , STR_PAD_LEFT);

    // die(print_r($_POST));
    $ref_id = $_POST['reference'];
    $status = $_POST['status'];
    $amt_paid = $_POST['amt_paid'];
    // die($trackid);
    $user_id = $_SESSION['id'];

    $getq = "SELECT * FROM cart WHERE customer_id = '$user_id'";
    $runq = mysqli_query($connection , $getq);
    $row = mysqli_num_rows($runq);
    
    if ($row > 0) {

        while ( $result1 = mysqli_fetch_assoc($runq) ) {
            $rn = $result1['product_id'];
            $qnt = $result1['amount'];
            $insq = "INSERT INTO `order_tb`( `user_id`, `product_id` , `quantity` , `tracking_id`) VALUES ('$user_id','$rn', '$qnt' , '$trackid')";
            $rq = mysqli_query($connection , $insq);
            $rr = mysqli_affected_rows($connection);
        }

        if ( $rr > 0 ) {
            $insert_trans = "INSERT INTO `transactions`( `tracking_id`, `reference_id` , `user_id` , `status` , `amount_paid` , `payment_type`) VALUES ('$trackid','$ref_id', '$user_id' , '$status' , '$amt_paid' , 'online')";
            $insert_q = mysqli_query($connection , $insert_trans);
            $insert_row = mysqli_affected_rows($connection);
            if ( $insert_row > 0 ) {
                        $che = "SELECT * FROM order_tb WHERE user_id = '$user_id'";
                        $rch = mysqli_query($connection , $che);
                        $row = mysqli_num_rows($rch);

                        if ($row > 0) {

                                $ddd = "DELETE FROM `cart` WHERE customer_id = '$user_id'";
                                $rdo = mysqli_query($connection , $ddd);







                                
                                
                                // your API token from here https://mailtrap.io/api-tokens
                                $apiKey = getenv('30ae6b8bf6bab6f7ce251cddd2b71066');
                                $mailtrap = new MailtrapClient(new Config($apiKey));
                                
                                $email = (new Email())
                                    ->from(new Address('sella.com', 'Sella Ecommerce Store'))
                                    ->replyTo(new Address('reply@sella.com'))
                                    ->to(new Address('damilolasaheeb@gmail.com', 'Jon'))
                                    ->priority(Email::PRIORITY_HIGH)
                                    ->subject('Your Order has been made.')
                                    ->text('Thank you for buying from us :)')
                                    ->html(
                                        '<html>
                                        <body>
                                        <p><br>Hello '.$fname.'</br>
                                        Your order has been made.</p>
                                        <p><a href="https://mailtrap.io/blog/build-html-email/">Mailtrap’s Guide on How to Build HTML Email</a> is live on our blog</p>
                                        <img src="cid:logo">
                                        </body>
                                    </html>'
                                    )
                                    ->embed(fopen('https://mailtrap.io/wp-content/uploads/2021/04/mailtrap-new-logo.svg', 'r'), 'logo', 'image/svg+xml')
                                    ;
                                    
                                    // Headers
                                    $email->getHeaders()
                                    ->addTextHeader('X-Message-Source', 'domain.com')
                                    ->add(new UnstructuredHeader('X-Mailer', 'Mailtrap PHP Client')) // the same as addTextHeader
                                    ;
                                    
                                    // Custom Variables
                                    $email->getHeaders()
                                    ->add(new CustomVariableHeader('user_id', '45982'))
                                    ->add(new CustomVariableHeader('batch_id', 'PSJ-12'))
                                    ;
                                    
                                    // Category (should be only one)
                                    $email->getHeaders()
                                    ->add(new CategoryHeader('Integration Test'))
                                    ;
                                    
                                try {
                                    $response = $mailtrap->sending()->emails()->send($email); // Email sending API (real)
                                    
                                    var_dump(ResponseHelper::toArray($response)); // body (array)
                                } catch (Exception $e) {
                                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                                }
                                
                                // OR send email to the Mailtrap SANDBOX
                                
                                try {
                                    $response = $mailtrap->sandbox()->emails()->send($email, 1000001); // Required second param -> inbox_id
                                
                                    var_dump(ResponseHelper::toArray($response)); // body (array)
                                } catch (Exception $e) {
                                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                                }








                                $data = [ 'code' => '200', 'message' => 'success' ];
                                
                        } else {
                            $data = [ 'code' => '400', 'message' => 'Something went wrong' ];
                            
                        }
            } else {
                        $data = [ 'code' => '200', 'message' => 'success' ];
                        
            }


} else {
    $data = [ 'code' => '400', 'message' => 'Something went wrong' ];
    echo json_encode($data);
}

        echo json_encode($data);
        
    } else {
        $data =  ['status' => '400', 'message' => 'Cart is empty' ];
        echo json_encode($data);
    }
    ?>