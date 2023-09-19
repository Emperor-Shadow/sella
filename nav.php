<?php
  $user_id = $_SESSION['id'];

$amount_in_cart_query = "SELECT COUNT(*) FROM cart WHERE customer_id = '$user_id'";

$amount_result = mysqli_query($connection , $amount_in_cart_query);

$amount_array = mysqli_fetch_array($amount_result);

$amount_count = (int)$amount_array['COUNT(*)'];

$_SESSION['count'] = $amount_count;


if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: login.php');
}

?>
<header class="header bg-white w-100" style="position: fixed; top: 0; left: 0; z-index: 30;">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="fw-bold text-uppercase text-dark">Sella</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link active" href="index.php"> <i class="fa fa-home d-md-none"></i> Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="shop.php"> <i class="fa fa-shop d-md-none"></i> Shop</a>
                </li>
                <?php if ($_SESSION['user_type'] == 'admin') { echo '<li class="nav-item">
                  <!-- Link--><a class="nav-link" href="admin\AdminLTE-3.2.0/index2.php"> <i class="fa fa-user-secret d-md-none"></i> Admin Board</a>
                </li>
                
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-p d-md-none"></i> Pages</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.php">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.php">Category</a><a class="dropdown-item border-0 transition-link" href="cart.php">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.php">Checkout</a></div>
                </li>' ; } ?>
              </ul>
              <ul class="navbar-nav ms-auto">               
                <li class="nav-item"><a class="nav-link" href="cart.php">               <i class="fa fa-shopping-cart"></i>
 Cart<small class="text-gray fw-normal count">(<?php echo $_SESSION['count']; ?>)</small></a></li>
               <?php 
               if ( $_SESSION['user_type'] === 'guest' ) {
                echo ' <li class="nav-item"><a class="nav-link" href="#!"> <img src="icons/right-from-bracket.svg" style="height: 10px;" alt=""> Login</a></li>
                ';
               } else {
                echo ' <form method = "post" action = ""> <button class="nav-item btn btn-secondary p-0 m-0 bg-transparent border-0" type="submit" name="logout"><a class="nav-link" >                 <i class="fa fa-sign-out"></i>
                Logout</a></button>
                </form>';
               }
              ?>
                </ul>
            </div>
          </nav>
        </div>
        <?php $msg = null; if ($msg !== "") { echo $msg; }?>

        
      </header>