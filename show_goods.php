<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");


 function showy ($connection , $category_id) { 

            //fetch categories with the id sent with the post request 
                $fetch_cat = "SELECT category_name FROM categories WHERE id = '$category_id'";
                $run_fetch_cat = mysqli_query($connection , $fetch_cat);
                $row = mysqli_affected_rows($connection);
                $result = mysqli_fetch_assoc($run_fetch_cat);

            //get category name
                $category_name = $result['category_name'];

            //fetch all goods that falls under the category
                $fetch_goods = "SELECT * FROM products WHERE product_category = '$category_name'";
                $run_fetch = mysqli_query($connection , $fetch_goods);
                $row = mysqli_affected_rows($connection);

                
                if ($row > 0) {



                    while ($fetch_result = mysqli_fetch_assoc($run_fetch)) {

                    

            $product_id = $fetch_result['id'];
            $user_id = $_SESSION['id'];

            $check_query = "SELECT * FROM cart WHERE product_id = '$product_id' AND customer_id = '$user_id'";
                $run_query = mysqli_query($connection , $check_query);
                $rows = mysqli_affected_rows($connection);
                
                if ($rows == 0) {
                $btn_message = "Add to cart";
                } else {
                $btn_message = "Remove";
                }
                
                
                if ((int)$fetch_result['product_stock_quantity'] > 0) {
                $availability = "Available";
                } else {
                $availability = "Out of stock";
                }

                $new_name = $fetch_result['product_name'];
                if (strlen($new_name) > 20) {
                    $new_name = substr($new_name , 0,20).'...';
                }

                //     echo '<div class="card md:w-1/4 w-1/2 md:inline-block hover:shadow-lg text-center">

                //         <div class="card-img relative">

                //         <input type="hidden" value="'.$fetch_result['id'].'">
                //             <img src="../product_images/'.$fetch_result['product_picture'].'" alt="">
                //             <span style="z-index=: 10; top: 0; right: 0;" class="rounded-full flex text-center items-center justify-center inline-block h-10 w-10 absolute bg-red-500">-'.$fetch_result['discount'].percent.'</span>
                //         </div>
                //         <div class="card-footer">
                //                 <p>'.$new_name.'</p>
                                
                                
                                
                //                 <span class="price inline-block">
                //                     <p class="new-price">'.dollar.$fetch_result['product_new_price'].'</p>
                //                     <p class="previous-price">'.dollar.$fetch_result['product_old_price'].'</p>
                //                 </span>
                                
                                
                //                 <span class="text-xs inline-block" style="float:right;">
                //                 '.$availability.'
                //                 </span>
                                
                                
                                
                //             <div class="btn-action w-full flex space-apart" style="gap: 5px";>
                //                 <button class=" inline-block float-left text-xs add-to-cart rounded add-to-cart-'.$fetch_result['id'].'"  id="add-to-cart" onclick="add_to_cart('.$fetch_result['id'].')">'.$btn_message.'</button>
                //                 <button class=" inline-block float-right text-xs view-details" id="view-details"><a href = "product_detail.php?product_id='.+ $fetch_result['id'].'"> View details </a></button>
                //             </div>
                //             </div> 
                            
                // </div>';
                        // print_r($fetch_result);

                        echo '
                        <div class="col-lg-4 col-sm-6">
                        <div class="product text-center">
                          <div class="mb-3 position-relative">
                            <div class="badge text-white bg-danger" >-'.$fetch_result['discount'].percent.'</div><a class="d-block" style = "height: 150px;" href="detail.php?product_id='.+ $fetch_result['id'].'"><img class="img-fluid w-100 h-100" style="object-fit: contain;" src="product_images/'.$fetch_result['product_picture'].'" alt="..."></a>
                            <div class="product-overlay">
                              <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><img src="icons/heart.svg" alt="" style="height: 15px;"></a></li>
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark add-to-cart-'.$fetch_result['id'].'" onclick = "add_to_cart('.$fetch_result['id'].')">'.$btn_message.'</a></li>
                                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <h6> <a class="reset-anchor" href="detail.php?product_id='.+ $fetch_result['id'].'">'.$new_name.'</a></h6>
                          <p class="small text-muted">'.dollar.$fetch_result['product_new_price'].'</p>
                        </div>
                      </div>
                        ';
                    }

                } else {
                    echo "Not found";
                }

            // print_r($result);
     }





     $category_id = (int)$_POST['category']; 





     showy($connection , $category_id);   
