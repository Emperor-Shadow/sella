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
<style>

    ::-webkit-scrollbar-button{
      background-color: red;
    }
    ::-webkit-scrollbar-thumb{
      background-color: blue;
    }
    ::-webkit-scrollbar-track{
      background-color: red;
    }

</style>
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
                <a class="nav-link active" href="edit_product.php">
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
                <a class="nav-link" href="chang_user.php">
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
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>New price</th>
                      <th>Old price</th>
                      <th>Stock quantity</th>
                      <th >Discount</th>
                      <th>Save</th>
                      <th>Delete</th>

                    </tr>
                  </thead>
                  <tbody>

                  <!-- get all the products in a tabular form start -->

                  <?php

                    $fetch_all_products_query = "SELECT * FROM `products`";
                    $run_fetch_query = mysqli_query($connection , $fetch_all_products_query);
                    $row = mysqli_affected_rows($connection);

                    if ($row > 0) {
                            while($result = mysqli_fetch_assoc($run_fetch_query)) {
                       

                        echo '
                        <tr>
                        <td class = "id'.$result['id'].'" >'.$result['id'].'</td>
                        <td class = "name'.$result['id'].'" contenteditable>'.$result['product_name'].'</td>
                        <td class = " text-wrap desc'.$result['id'].'" contenteditable>'.$result['product_description'].'</td>
                        <td class = "nprice'.$result['id'].'" contenteditable>'.$result['product_new_price'].'</td>
                        <td class = "oprice'.$result['id'].'" contenteditable>'.$result['product_old_price'].'</td>
                        <td class = "stock'.$result['id'].'" contenteditable>'.$result['product_stock_quantity'].'</td>
                        <td class = "discount'.$result['id'].'" contenteditable>'.$result['discount'].'</td>
                        <td class = ""><button class = "btn btn-success" onclick = "save('.$result['id'].')">Save</button></td>
                        <td class = ""><button class = "btn btn-danger" onclick = "del('.$result['id'].')">Delete</button></td>
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

           <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
   

   save = (id) => {
    var pid = $('.id'+id).text();
    var name = $('.name'+id).text();
    var desc = $('.desc'+id).text();
    var nprice = $('.nprice'+id).text();
    var oprice = $('.oprice'+id).text();
    var stock = $('.stock'+id).text();
    var discount = $('.discount'+id).text();

    if (name == '') {
      alert('Product name cannot be empty')
    } else if ( desc == '' ) {
      alert('Product Description cannot be empty')
    } else if ( nprice == '' ) {
      alert('Product New Price cannot be empty')
    } else if ( oprice == '' ) {
      alert('Product Old Price cannot be empty')
    } else if ( stock == '' ) {
      alert('Product Stock cannot be empty')
    } else if ( discount == '' ) {
      alert('Product Discount cannot be empty')
    }

    if (parseInt(discount) > 0) {
        console.log('hi');
            
        var discount_price = (discount / 100) * nprice ;
       var new_price = (nprice - discount_price).toFixed(2) ;
       var old_price = nprice ;
        } else {
            discount_price = 0;
            new_price = nprice;
            old_price = nprice;
        }

        $.ajax({
            type: "POST",
            url: "updt_prod.php",
            data:  {
                'pid' : pid , 
                'name' : name ,
                'desc' : desc, 
                'nprice' : new_price ,
                'oprice' : old_price ,
                'stock' : stock ,
                'discount' : discount ,
            },
            dataType: "json",
            success: function (response) {

                toastr.success('Update successful');
                
            } , error: function (response) {
              toastr.error('SOmething went wrong');
            }
        });
    
    }


    del = (id) => {
      if (confirm('Disastrous action. Are you sure? :(')) {
 $.ajax({
            type: "POST",
            url: "del_prod.php",
            data:  {
                'id' : id
            },
            dataType: "json",
            success: function (response) {

                toastr.success('Deletion successful');
                
            } , error: function (response) {
              toastr.error('SOmething went wrong');
            }
        });
    
    } else {
      toastr.success('Phew! Close call :)');
    }
      }
       


</script>
</body>
</html>
