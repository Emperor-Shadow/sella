<?php
  ob_start();
  require_once("../../php_files/connection.php");
  require_once("../../php_files/functions.php");
  $user_id = $_SESSION['id'];

  $cust_id = (int) $_GET['id'];

  echo "<script> var cust_id = ".$cust_id." </script>";

  $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '' );
  if (isset($_POST['sendImageBtn'])) {

    $channel = 'admin_' . $user_id ;
    $time = time();

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
    $file_tmp_name = $_FILES['image']['tmp_name'];

    $supported_types = [
      'image/jpeg',
      'image/jpg',
      'image/png',
      'image/webp'
    ];

    $msg_type = 'image';

    $new_name = $user_id.$file_name;

    if (in_array($file_type , $supported_types)) {
          if ($file_size <= 2000000) {
                $upload = move_uploaded_file($file_tmp_name , "../../message_images/".$new_name);
                if ( $upload ) {
                  $sql = "INSERT INTO messages ( user_id , message , channel , time , msg_type , reciever ,sender) VALUES ( '$cust_id' , '$new_name' , '$channel' , '$time' , '$msg_type' , '$cust_id' , 'admin') ";
                  $row = $db->exec($sql);
                  if (!$row > 0) {
                      echo "Something went wrong";
                  } 
                } else {
                  echo 'Something went wrong. Message not sent';
                }
          } else {
            echo "File size is too large";
          }
    } else {
      echo "Invalid file format.";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../fontawesome-free-6.4.0-web/css/all.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index2.php" class="nav-link">Home</a>
      </li>
    </ul>

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index.php" class="brand-link">
      <span class="brand-text font-weight-light">SELLA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a  class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin Tools
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add a category</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Products
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">2</span>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  class="nav-link" href="add_prod.php" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add a product</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="edit_product.php">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit products</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">3</span>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" href="all_users.php">
                <a class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all users</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="chang_user.php">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change user type</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="delete_user.php">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete user</p>
                </a>
              </li>
              
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Board</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
              <li class="breadcrumb-item active">Admin Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">


        




          <div class="col-md-7">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <a href="index2.php" class="p-2"><p>Messages</p></a>
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>
                  </div>

                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                     
                    </div>
                                      
                    </div>
                  <div class="card-footer">


                      <div class="input-group textform">
                        <input type="text" placeholder="Type Message ..." class="form-control message" id="message">
                        <span class="input-group-append">
                          <input type="hidden" class="hid" name="" value="">
                          <button  class="btn send-Btn btn-warning">Send</button>
                          <button class="btn-warning ml-1 px-3 rounded"> <i class="fas fa-image text-white"></i> </button>
                        </span>
                      </div>

                      <form action="#" method="post" class="formmsg imgmsg d-none" enctype="multipart/form-data">
                            <div class="input-group" id="file-input">
                              <input type="file" name="image" placeholder="Choose a picture" required class=" form-control">
                              <span class="input-group-append">
                                <button type="submit" name="sendImageBtn" class="btn btn-warning sendImageBtn">Send</button>
                                <button class="btn-warning ml-1 px-3 rounded"> <i class="fas fa-user text-white"></i> </button>
                              </span>
                            </div>
                      </form>



                  </div>
                </div>
              </div>

          

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script>
  

  $('.send-Btn').click( function (e) {
        e.preventDefault()
        let msg = $('.message').val();
        let hid = $('.hid').val()

        if (msg === "") {
            alert('Message cant be empty')
        } else {
          $.ajax({
            type: "POST",
            url: "send_msg.php",
            data: {
                'msg' : msg ,
                'id' : cust_id
            },
            dataType: "JSON",
            success: function (response) {
              console.log(response.message);
              $('#message').val('');
            }
        });
        }

        
    } )

  window.setInterval( ()=>{
      $.ajax({
      url : "fetch_msg.php" ,
      method : "POST",
      data : {
          'id' : cust_id
      } ,
      dataType : "text" ,
      success : function (response) {
          $('.direct-chat-messages').html(response);
          // $('.hid').val(id)
      }
    })
      } ,1000 )
       

  function get_message (id) {
    //   $.ajax({
    //   url : "fetch_msg.php" ,
    //   method : "POST",
    //   data : {
    //       'id' : id
    //   } ,
    //   dataType : "text" ,
    //   success : function (response) {
    //       $('.direct-chat-messages').html(response);
    //       $('.hid').val(id)
    //   }
    // })
  }


  $('.fa-image').click((e)=>{
      e.preventDefault();
      $('.textform').addClass('d-none');
      $('.imgmsg').removeClass('d-none');
    })

    $('.fa-user').click((e)=>{
      e.preventDefault();
      $('.imgmsg').addClass('d-none');
      $('.textform').removeClass('d-none');
    })
</script>
</body>
</html>
