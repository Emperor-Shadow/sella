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
        <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-warning">
                      <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                      
                        <div class="info-box-content col-5">
                        <a href="inventory.php" class="text-white"><span class="info-box-text">Inventory</span></a>
                      </div>
                      
                      <!-- /.info-box-content col-5 -->
                    </div>
                    <div class="col-md-12">
              <h4 class="text-center bg-dark py-3">Messages</h4>
              <div class="bg-dark">
              <ul class="contacts-list">
              <?php
                  $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '' );
                  $allmsg1 = $db->query("SELECT DISTINCT user_id FROM messages");
                  while ($row1 = $allmsg1->fetch(PDO::FETCH_ASSOC)) {
                    $uid = $row1['user_id'];
                    $allmsg = $db->query("SELECT * FROM messages WHERE sender = '$uid' OR reciever = '$uid' ORDER BY time DESC LIMIT 1");
                  while ($row = $allmsg->fetch(PDO::FETCH_ASSOC)) {
                    $time = date("d M h:i a", $row['time']);
                    
                    echo '
                    <li>
                  <a href = "messages.php?id='.$row['user_id'].'">
                  <input type="hidden" class="'.$row['user_id'].'" value="'.$row['user_id'].'">
                    <div class="contacts-list-info ms-0">
                      <span class="contacts-list-name">
                        '.$time.'
                        <small class="contacts-list-date float-right">2/28/2015</small>
                      </span>
                      <span class="contacts-list-msg">'.$row['message'].'</span>
                    </div>
                  </a>
                </li>
                    ';
                  }
                  }
              ?>     
              </ul>
            </div>
              </div>
                    <!-- /.info-box -->

          </div>
          

          <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

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
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer Email</th>
                      <th>Status</th>
                      <th>Amount Paid</th>
                      <th>Payment type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr> -->
                    <?php
                    $select_trans = "SELECT * FROM transactions";
                    $run_q_trans = mysqli_query($connection ,$select_trans);
                    $row_trans = mysqli_num_rows($run_q_trans);
                    if ($row_trans > 0) {
                       while ( $trans_result = mysqli_fetch_assoc($run_q_trans)) {
                        $cust_id = $trans_result['user_id'];
                        $get_email = "SELECT email FROM users WHERE id = $cust_id";
                        $run_cust = mysqli_query($connection ,$get_email);
                        $email_arr = mysqli_fetch_assoc($run_cust);
                         echo '<tr>
                      <td><a href = "invoice.php?id='.$trans_result['tracking_id'].'">'.$trans_result['tracking_id'].'</a></td>
                      <td>'.$email_arr['email'].'</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">'.$trans_result['amount_paid'].'</div>
                      </td>
                      <td>'.$trans_result['payment_type'].'</td>
                    </tr>';
                      }
                    } else {
                      echo '<!-- <tr>
                      <td><a href="">#</a></td>
                      <td>No transaction has been made</td>
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
              <!-- /.card-footer -->
            </div>


            
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


  <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <!-- <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="far fa-circle text-danger"></i> Chrome</li>
                      <li><i class="far fa-circle text-success"></i> IE</li>
                      <li><i class="far fa-circle text-warning"></i> FireFox</li>
                      <li><i class="far fa-circle text-info"></i> Safari</li>
                      <li><i class="far fa-circle text-primary"></i> Opera</li>
                      <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                    </ul>
                  </div> -->
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
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
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script>
  // Get context with jQuery - using jQuery's .get() method.
  // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  // var pieData = {
  //   labels: [
  //     'Chrome',
  //     'IE',
  //     'FireFox',
  //     'Safari',
  //     'Opera',
  //     'Navigator'
  //   ],
  //   datasets: [
  //     {
  //       data: [700, 500, 400, 600, 300, 100],
  //       backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
  //     }
  //   ]
  // }
  // var pieOptions = {
  //   legend: {
  //     display: false
  //   }
  // }
  // // Create pie or douhnut chart
  // // You can switch between pie and douhnut using the method below.
  // // eslint-disable-next-line no-unused-vars
  // var pieChart = new Chart(pieChartCanvas, {
  //   type: 'doughnut',
  //   data: pieData,
  //   options: pieOptions
  // })
</script>
</body>
</html>
