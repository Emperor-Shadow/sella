<?php
ob_start();
require_once("../../php_files/connection.php");
require_once("../../php_files/functions.php");
$user_id = $_SESSION['id'];

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if (!(int)$user_id > 0) {
    session_destroy();
    header("location: ../../login.php");
}


  if (isset($_POST['pid'])) {
    // print_r($_POST);

    $id = (int)$_POST['pid'];
  $product_name = sanitize($_POST['name']);
  $product_description = sanitize($_POST['desc']);
  $product_old_price = (int)sanitize($_POST['oprice']);
  $product_quantity = (int)sanitize($_POST['stock']);
  $product_discount = (int)sanitize($_POST['discount']);
  $new_price = (float)sanitize($_POST['nprice']);


        //a query to update product information into the database
        $update_product_query = "UPDATE products SET  product_name = ?,  product_description = ?, product_new_price = ?, product_old_price = ?, product_stock_quantity = ?, discount = ?  WHERE  id = '$id'";

        $stmt_product = mysqli_prepare($connection , $update_product_query);

        mysqli_stmt_bind_param($stmt_product , "ssssss" , $product_name , $product_description, $new_price  , $product_old_price , $product_quantity , $product_discount);

        mysqli_stmt_execute($stmt_product);

        $row_product =mysqli_stmt_affected_rows($stmt_product);

        if ($row_product > 0) {
           $data = ['status' => 'success'];
           echo json_encode($data);
        } else {
            $data = ['status' => 'failed'];
            echo json_encode($data);       
         }
              
  }

$msg = null;


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
  <link rel="stylesheet" href="../AdminLTE-3.2.0/plugins/toastr/toastr.css">

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
        <a href="index3.html" class="nav-link">Home</a>
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
            <a  class="nav-link" href="index2.php">
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
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="add_category.php">
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
              <li class="nav-item" href = "add_prod.php">
                <a class="nav-link" href="add_prod.php">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add a product</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link">
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
                <span class="badge badge-info right">2</span>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="all_users.php">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all users</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="chang_user.php">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change user type</p>
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
            <h1 class="m-0">Dashboard v2</h1>
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
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All products</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th>Email Address</th>
                      <th>User Type</th>
                      <th></th>

                    </tr>
                  </thead>
                  <tbody>

                  <!-- get all the products in a tabular form start -->

                  <?php

                    $fetch_all_products_query = "SELECT * FROM `users`";
                    $run_fetch_query = mysqli_query($connection , $fetch_all_products_query);
                    $row = mysqli_affected_rows($connection);

                    if ($row > 0) {
                            while($result = mysqli_fetch_assoc($run_fetch_query)) {
                       

                        echo '
                        <tr>
                        <td class = "id'.$result['id'].'" >'.$result['id'].'</td>
                        <td class = "nprice'.$result['id'].'" contenteditable>'.$result['email'].'</td>
                        <td class = "type-'.$result['id'].'" contenteditable>'.$result['user_type'].'</td>
                        <td> <button class = "btn btn-success" onclick = "change('.$result['id'].')"> Change </button></td>

                      </tr>
                        ';   
                    } 
                }

                  ?>

                  <!-- get all the products in a tabular form end -->
<!-- 
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>

                    </tr> -->
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
          <!-- /.col -->
          
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

        
      </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
</div>
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
<script src="../AdminLTE-3.2.0/plugins/toastr/toastr.min.js"></script>

<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script>
   
        change = (id) => {
            let typ = $('.type-' + id);
            //check if the user is a standard user and change them to an admin;
            if ( typ.text() === 'standard') {
                $.ajax({
                    type: "POST",
                    url: "adminize.php",
                    data: {
                        'id' : id
                    },
                    dataType: "JSON",
                    success: function (response) {   
                    typ.text('admin');
                        toastr.success('Change applied');
                    }
                });
            } 
            //else change them to a standard user
            else {
                $.ajax({
                    type: "POST",
                    url: "standardize.php",
                    data: {
                        'id' : id
                    },
                    dataType: "JSON",
                    success: function (response) { 
                        toastr.success('Change applied');
                        typ.text('standard');

                    }
                });
            }
        }
  


</script>
</body>
</html>
