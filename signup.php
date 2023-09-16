<?php
require_once('php_files/connection.php');
require_once('php_files/functions.php');

$fname = null;
$lname = null;
$email = null;
$pass = null;
$message = null;
$_SESSION['$fname'] = null;
$_SESSION['$lname'] = null;
$_SESSION['$email'] =  null;
$_SESSION['$user_type'] = null;

//if submit button has been clicked, get all informations from the POST array
if (isset($_POST['submit'])) {
    $fname = sanitize($_POST['fname']);
    $lname = sanitize($_POST['lname']);
    $email = sanitize($_POST['email']);  
    $pass = sanitize($_POST['pass']);
    $user_type = 'standard';


    // print_r($_POST);


//turn the password into a hashed one
            $pass = password_hash($pass , PASSWORD_BCRYPT);

            
            $check_email = "SELECT * FROM users WHERE email = ?";
            $statement_check = mysqli_prepare($connection , $check_email);
            mysqli_stmt_bind_param($statement_check , "s" ,  $email);
            mysqli_stmt_execute($statement_check);
            $check_result = mysqli_stmt_fetch($statement_check);
            $check_num_row = mysqli_affected_rows($connection);

            if ($check_num_row == 0) {
            //a query to load user information into the database
                        $register_user_query = "INSERT INTO users(`email` ,`fname`, `lname`, `password`, `user_type`) VALUES (?,?,?,?,?)";
                        $stmt = mysqli_prepare($connection , $register_user_query);
                        mysqli_stmt_bind_param($stmt , "sssss" , $email , $fname , $lname, $pass , $user_type );
                        mysqli_stmt_execute($stmt);
                        $row =mysqli_stmt_affected_rows($stmt);

                                if ($row > 0) {
                                    echo "registered";
                                    $_SESSION['id'] = $row['id'];
                                    $_SESSION['fname'] = $row['fname'];
                                    $_SESSION['lname'] = $row['lname'];
                                    $_SESSION['email'] = $row['email'];
                                    $_SESSION['user_type'] = $row['user_type'];
                                    header('location: index.php');
                            } else {
                                $message = error_msg("Something went wrong. try again");
                            }                 
                } else {
                    $message = error_msg("Email already exist with us. Sign in instead");
                }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign Up</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>

  <!-- //alert starts -->
    <?php if ($message !== null) {
       echo $message ;}?>
         
         <!--alert ends  -->
        
        <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

      <!-- ========== signin-section start ========== -->
      <section class="signin-section">
        <div class="container-fluid">
        
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
       
        
            <div class="col-lg-5 mx-auto">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">Sign Up Form</h6>
               
                  <form action="#" method="POST">
                    <div class="row">
                      <div class=" col-6">
                        <div class="input-style-1">
                          <label>First Name</label>
                          <input type="text" placeholder="First Name" required name="fname" />
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="input-style-1">
                          <label>Last Name</label>
                          <input type="text" placeholder="Last Name" required name="lname" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Email</label>
                          <input type="email" placeholder="Email" required name="email" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" placeholder="Password" required name="pass" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="form-check checkbox-style mb-30">
                          <input class="form-check-input" type="checkbox" value="" id="checkbox-not-robot" />
                          <label class="form-check-label" for="checkbox-not-robot">
                            I'm not robot</label>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button type="submit" name="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                            Sign Up
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                
                    <p class="text-sm text-medium text-dark text-center">
                      Already have an account? <a href="login.php">Sign In</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      <!-- ========== signin-section end ========== -->

      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
          
          
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
