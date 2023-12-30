<?php
  require_once("../../php_files/connection.php");
// session_start();
  // $dbh = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
  require_once("../../php_files/functions.php");
  $user_id = $_SESSION['id'];
  $track_id = $_GET['id'];

  $add_query = "SELECT user_id FROM order_tb WHERE tracking_id = '$track_id'";
  $run_addr = mysqli_query($connection , $add_query);
  $cust_order_info = mysqli_fetch_assoc($run_addr);


  $cust_id = $cust_order_info['user_id'];

  $gt_cust = "SELECT email , fname , lname FROM users WHERE id = $cust_id";
  $run_gt_cust = mysqli_query($connection , $gt_cust);
  $cust_info = mysqli_fetch_assoc($run_gt_cust);
  // print_r($cust_info);



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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: <?php echo date("F d, Y")?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <?php 
                    
                    // echo($track_id);
                    $add_query = "SELECT * FROM address WHERE user_id = '$cust_id'";
                    $run_addr = mysqli_query($connection , $add_query);
                    $addr_arr = mysqli_fetch_assoc($run_addr);
                    // print_r($cust_addr); 


                    ?>
                    <strong><?php echo $cust_info['fname'] . ' ' . $cust_info['lname'] ; ?></strong><br>
                    <?php  echo $addr_arr['address']?><br>
                    <?php  echo $addr_arr['city'] . $addr_arr['state']?><br>
                    Email: <?php echo $cust_info['email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice <?php echo '#'. str_pad(mt_rand(0 , 9999) , 6,  STR_PAD_LEFT); ?></b><br>
                  <br>
                  <b>Order ID:</b> <?php echo $track_id; ?><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $add_query2 = "SELECT * FROM order_tb WHERE tracking_id = '$track_id'";
                        $run_addr2 = mysqli_query($connection , $add_query2);
                        $total = 0;
                        while ( $cust_order_info2 = mysqli_fetch_assoc($run_addr2)) {
                                    $prid = $cust_order_info2['product_id'];
                                    
                                    $selp = "SELECT * FROM products WHERE id = $prid";
                                    $add_query2 = mysqli_query($connection , $selp);
                                    $prodetails = mysqli_fetch_assoc($add_query2);
                                    $total += $prodetails['product_new_price'];

                                    echo '
                                    <tr>
                                    <td>'.$cust_order_info2['quantity'].'</td>
                                    <td>'.$prodetails['product_name'].'</td>
                                    <td>'.'P-' .$prodetails['id'].'</td>
                                    <td>'.$prodetails['product_description'].'</td>
                                    <td>'. dollar .$prodetails['product_new_price'].'</td>
                                  </tr>
                                    ';
                              } 
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <h1>
                    <?php 
                      $trans = "SELECT payment_type FROM transactions WHERE tracking_id = $track_id";
                      $transr = mysqli_query($connection , $trans);
                      $transarr = mysqli_fetch_assoc($transr);
                      echo $transarr['payment_type'];
                      ?>
                  </h1>
                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo dollar . $total ?></td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td><?php $tax = (9.3 / 100) * (int) $total; echo dollar.$tax; ?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo dollar . $tax + $total ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
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
</body>
</html>
