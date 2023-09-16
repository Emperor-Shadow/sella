<?php
require_once('php_files/connection.php');
require_once('php_files/functions.php');

$email = null;
$pass = null;
$message = null;
// $_SESSION['$email'] =  null;


//if submit button has been clicked, get all informations from the POST array
if (isset($_POST['submit'])) { 
    $email = sanitize($_POST['email']);  
    $pass = sanitize($_POST['pass']);

    // echo(password_verify($pass, $row['password']));

    // print_r($_POST);
//checking if the both password entered are the same
        // if ($pass === $cpass) {

//turn the password into a hashed one
                      
            $get_email = "SELECT * FROM users WHERE email = ?";

            $statement_check = mysqli_prepare($connection , $get_email);
            mysqli_stmt_bind_param($statement_check , "s" ,  $email);
            mysqli_stmt_execute($statement_check);
            $check_result = mysqli_stmt_get_result($statement_check);
            $row = mysqli_fetch_array($check_result);


            if (is_array($row)) {
                  if (password_verify($pass , $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_type'] = $row['user_type'];
                    $message = success_msg("Login success");
                     header('Location: index.php');
                    // header('URL: login.php');
                    // session_redir
                    
                  } else {
                    $message = error_msg("Email or password incorrect");
                  }   
            } else {
                $message = error_msg("Email doesn't exist. Sign up instead");
      
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
       
          <div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100 d-md-inline-block d-none">
                <div class="auth-cover">
                  <div class="title text-center">
                    <h1 class="text-primary mb-10">Get Started</h1>
                    <p class="text-medium">
                  </div>
                  <div class="cover-image">
                    <img src="assets/images/auth/signin-image.svg" alt="" />
                  </div>
                  <div class="shape-image">
                    <img src="assets/images/auth/shape.svg" alt="" />
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">Sign Up Form</h6>
               
                  <form action="#" method="POST">
                    <div class="row">
                    
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
                            Remember me</label>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button type="submit" name="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                           Login
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                
                    <p class="text-sm text-medium text-dark text-center">
                     Dont have an account yet? <a href="signup.php">Create an account</a>
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
