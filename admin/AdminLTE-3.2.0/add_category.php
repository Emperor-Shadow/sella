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

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];

// ??add to category code
if (isset($_POST['add_cat'])) { 
    $category_name = sanitize($_POST['category_name']); 

    $check_category = "SELECT * FROM categories WHERE category_name = ?";
        $statement_check = mysqli_prepare($connection , $check_category);
        mysqli_stmt_bind_param($statement_check , "s" ,  $category_name);
        mysqli_stmt_execute($statement_check);
        $category_result = mysqli_stmt_fetch($statement_check);
        $check_category_row = mysqli_affected_rows($connection);

        if ($check_category_row == 0) {
            //a query to load user information into the database
                        $add_category_query = "INSERT INTO categories (`category_name`) VALUES (?)";
                        $stmt = mysqli_prepare($connection , $add_category_query);
                        mysqli_stmt_bind_param($stmt , "s" , $category_name );
                        mysqli_stmt_execute($stmt);
                        $row =mysqli_stmt_affected_rows($stmt);

                        if ($row > 0) {
                            $msg = "Category added successful";
                            $category_name = null;
                            $_POST[] = [];
                        } else {
                            $msg = "Category not added. Something went wrong";
                        }
        } else {
            $msg = "Category exist. Add another category";
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
                <a class="nav-link active" href="add_category.php">
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
                <a class="nav-link" href="add_prod.php">
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

        <div class="col-md-6">
<div class="card card-primary">
  <?php if ($msg !== null) {
       echo $msg ;}?>
              <div class="card-header">
                <h3 class="card-title">Category Form</h3>
              </div>
              <!-- /.card-header -->

              <!-- add to category form -->
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Type a category</label>
                    <input type="text" name="category_name" class="form-control text-black" id="" placeholder="enter a category name">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="cat_btn" name="add_cat" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div> <br>





            <!-- edit category form -->
            <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Edit Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Category name</th>
                    <th>New name</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                ob_start();
                $cat_query = "SELECT * FROM categories";
                $run_query = mysqli_query($connection , $cat_query);
                $row = mysqli_affected_rows($connection);

                if ($row > 0) {


                    while ($result = mysqli_fetch_assoc($run_query)) {
                //     echo '
                //     <form class="p-3 form-'.$result['id'].'">
                //     <input type="text" class="input-'.$result['id'].'" name=""  value="'.$result['category_name'].'" style="background: transparent; color: white;">
                //     <span id="edit" class="editw edit-'.$result['id'].'" onclick = "edit('.$result['id'].')">Edit</span>
                //     <span class="del bg-red-500" onclick="deleteCat('.$result['id'].')">Delete</span>
                // </form>
                //     ';

                echo '
                <form class="form-'.$result['id'].'">
                 <tr class="tt-'.$result['id'].'">
                    <td class = "td-'.$result['id'].'">'.$result['category_name'].'</td>
                    <td><input type="text" name="" id="" class="form-control input-'.$result['id'].'"></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info"><i class="fas fa-save edit-'.$result['id'].'" onclick = "edit('.$result['id'].')" ></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash" onclick="deleteCat('.$result['id'].')"></i></a>
                      </div>
                    </td>
                  </tr>
                  </form>
                ';
                    }


                } else {
                    echo "No category found";
}
                
                
                ?>

                 
                 

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
             <!--// edit category form -->

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
    //edit and save categories to database start//
    edit = (id) => {

$.ajax({
    type: "post",
    url: "edit_cat.php",
    data: {
        'id' : id,
        'input_value' : $('.input-' + id).val()
    },
    dataType: "json",
    success: function (response) {
        if (response.status == 'success') {
            $('.td-' + id).text($('.input-' + id).val());
            $('.input-' + id).val("");
            toastr.success('Category changed')
        } else {
            toastr.error('CHange failed. try again');
        }
    }
});
}
//get all categories to be displayed for editing end//


    //delete categories from database start//
    deleteCat = (id) => {

        if (confirm('This is a disastrous and irreversible action. Are you sure you want to continue?')) {
    $.ajax({
            type: "post",
            url: "delete_cat.php",
            data: {
                'id' : id
            },
            dataType: "json",
            success: function (response) {
                if (response.status == 'success') {
                    $('.form-'+id).remove();
                    $('.tt-'+id).remove();
                    toastr.success('Category deleted successfully')
                } else {
                  toastr.error('Deletion failed. try again')

                }
            }
        });
        } else {
          toastr.warning('Phew. That was a close one. :)')
        }
    }
        //delete categories from database end//


    //     $('.toastrDefaultSuccess').click(function() {
    //   toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    // });
</script>
</body>
</html>
