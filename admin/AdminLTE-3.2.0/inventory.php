<?php
  ob_start();
  require_once("../../php_files/connection.php");
  require_once("../../php_files/functions.php");
  $user_id = $_SESSION['id'];
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
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <!-- /.col -->


          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <?php
      $user_id = $_SESSION['id'];

    $amount_in_pro_query = "SELECT COUNT(*) FROM products";

    $pro_result = mysqli_query($connection , $amount_in_pro_query);

    $pro_array = mysqli_fetch_array($pro_result);

    $pro_count = (int)$pro_array['COUNT(*)'];
?>
                <span class="info-box-number"><?php echo $pro_count; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All Users</span>
                <?php
      $user_id = $_SESSION['id'];

    $amount_in_user_query = "SELECT COUNT(*) FROM users";

    $user_result = mysqli_query($connection , $amount_in_user_query);

    $user_array = mysqli_fetch_array($user_result);

    $user_count = (int)$user_array['COUNT(*)'];
?>
                <span class="info-box-number"><?php echo $user_count; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
            
       
           
          <div class="row">
          <div class="card col-12">
              <div class="card-header border-transparent">
                <h3 class="card-title">Inventory</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive col-12">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>SKU</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>n * ordered</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    $select_trans = "SELECT * FROM products";
                    $run_q_trans = mysqli_query($connection ,$select_trans);
                    $row_trans = mysqli_num_rows($run_q_trans);
                    if ($row_trans > 0) {
                      
                       while ( $trans_result = mysqli_fetch_assoc($run_q_trans)) {
                        $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '' );
                        $iiid = $trans_result['id'];
                        $count = $db->query("SELECT * FROM order_tb WHERE product_id = '$iiid'");
                        $cnt = $count->rowCount();
                         echo '<tr>
                      <td><a>'.$trans_result['id'].'</a></td>
                      <td>'.$trans_result['product_name'].'</td>
                      <td class="text-wrap">'.$trans_result['product_description'].'</td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">'.$trans_result['product_category'].'</div>
                      </td>
                      <td>'.dollar .$trans_result['product_new_price'].'</td>
                      <td>'.$trans_result['product_stock_quantity'].'</td>
                      <td>'.$cnt.'</td>
                    </tr>';
                      }
                    } else {
                      echo '<!-- <tr>
                      <td><a href="">#</a></td>
                      <td>No product in inventory</td>
                      <td><span class="badge badge-warning">#</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">####</div>
                      </td>
                      
                    </tr>';
                     
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>


            

            <!-- PRODUCT LIST -->
           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
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


  -->
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
