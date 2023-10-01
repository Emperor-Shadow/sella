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
$msg = null;

// ??add product start
if (isset($_POST['add_to_product_btn'])) {

    $product_old_price  = null;

    $product_name = sanitize($_POST['product_name']);
    $product_category = sanitize($_POST['product_category']);
    $product_description = sanitize($_POST['product_description']);
    $product_new_price = (int)sanitize($_POST['product_new_price']);
     $product_quantity = (int) sanitize($_POST['product_quantity']);
     $product_discount = (int) sanitize($_POST['product_discount']);
     $product_picture = $_FILES['product_picture'];
     
     if ((int) $product_discount == 0) {
        $product_old_price = $product_new_price;
     }

     $product_image_name = $_FILES['product_picture']['name'];
     $product_image_type = $_FILES['product_picture']['type'];
     $product_image_size = $_FILES['product_picture']['size'];
     $product_tmp_name = $_FILES['product_picture']['tmp_name'];

     $product_new_image_name = $product_name.$product_image_name;

     $supported_types = [
        'image/jpg',
        'image/jpeg',
        'image/png',
        'image/webp'
      ];


      //check if image is supported

      if (in_array($product_image_type , $supported_types)) {
             
        //check if image size is not too big
            if ($product_image_size <= 2000000) {
                // move image to folder
                $upload = move_uploaded_file($product_tmp_name , '../../product_images/'. $product_new_image_name);
                        if ($upload) {
                            //if move is successful. then run a query to checkif product name exists before
                            $check_product = "SELECT * FROM products WHERE product_name = ?";
                            $statement_product_check = mysqli_prepare($connection , $check_product);
                            mysqli_stmt_bind_param($statement_product_check , "s" ,  $product_name);
                            mysqli_stmt_execute($statement_product_check);
                            $product_result = mysqli_stmt_fetch($statement_product_check);
                            $check_product_row = mysqli_affected_rows($connection);
                            
                            //if product doesnt exist. then add product info to the database
                            if ($check_product_row == 0) {
                                //a query to load user information into the database
                                            $add_product_query = "INSERT INTO `products`( `product_name`, `product_category`, `product_description`, `product_new_price`, `product_old_price`, `product_stock_quantity`, `discount`, `product_picture`) VALUES (?,?,?,?,?,?,?,?)";
                                            $stmt_product = mysqli_prepare($connection , $add_product_query);
                                            mysqli_stmt_bind_param($stmt_product , "ssssssss" , $product_name , $product_category , $product_description, $product_new_price ,  $product_old_price  , $product_quantity , $product_discount, $product_new_image_name );
                                            mysqli_stmt_execute($stmt_product);
                                            $row_product =mysqli_stmt_affected_rows($stmt_product);
                
                                            if ($row_product > 0) {
                                                $msg = "Product added successful";
                                                echo '<script> toastr.success('.$msg.') </script>';
                                            } else {
                                                $msg = "Product not added. Something went wrong";
                                                echo '<script> toastr.error('.$msg.') </script>';

                                            }
                            } else {
                                $msg = "Product exist. Add product category";
                                echo '<script> toastr.warning('.$msg.') </script>';

                            }   
                        }



            } else {
                $msg = "Image size cannot be greater than 2MB";
                echo '<script> toastr.error('.$msg.') </script>';

            }

      } else {
        $msg = "Unsupported file type";
        echo '<script> toastr.error('.$msg.') </script>';

      }

    //  print_r($_FILES);
    //  print_r($_POST);
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
                <a class="nav-link " href="add_category.php">
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
                <a class="nav-link active" href="add_prod.php">
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
          <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Products</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">

            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Product Name</label>
                <input type="text" name="product_name" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Product Description</label>
                <textarea name="product_description" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Category</label>
                <select name="product_category" class="form-control custom-select">
                <?php
                                    $fetch_cat = "SELECT category_name FROM categories ORDER BY id ASC";
                                    $run_fetch_cat = mysqli_query($connection , $fetch_cat);
                                    $row = mysqli_affected_rows($connection);

                                    if ($row == 0) {
                                        echo "No Category created";
                                    } else {
                                        while ($result = mysqli_fetch_assoc($run_fetch_cat)) {
                                            echo ' <option value="'.$result['category_name'].'">'.$result['category_name'].'</option>';
                                            
                                        }
                                    }
                                    ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">New Price</label>
                <input type="" name="product_new_price"  class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Stock quantity</label>
                <input type="" name="product_quantity" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Discount</label>
                <input type="" name="product_discount" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Picture</label>
                <input type="file" name="product_picture" class="form-control">
              </div>

              <button class="btn btn-primary" name="add_to_product_btn" type="submit">Add product</button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
            <!-- /.card -->
          </div>
        </div>
          <!-- /.col -->
          
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>


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

    if (parseInt(discount) > 0) {
        console.log('hi');
            
        var discount_price = (discount / 100) * nprice ;
       var new_price = (nprice - discount_price).toFixed(2) ;
        } else {
            discount_price = 0;
            new_price = nprice;
        }

        $.ajax({
            type: "POST",
            url: "updt_prod.php",
            data:  {
                'pid' : pid , 
                'name' : name ,
                'desc' : desc, 
                'nprice' : new_price ,
                'oprice' : oprice ,
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


</script>
</body>
</html>
