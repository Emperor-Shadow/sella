//add to cart ajax code start//
function add_to_cart(id) {
      
    if ($('.add-to-cart-'+id).text() === "Add to cart") {
    
      $.ajax({
        type: "POST",
        url: "add_to_cart.php",
        data: {
            'product_id' : id
        },
        dataType: "json",
        success: function (response) {
         
            if (response.message == "added") {
              
              let count = response.count
              
              $('.count').text(count);
              
                $('.add-to-cart-'+id).text("Remove")

                console.log('add to cart')
                
            } else if (response.message == "in-cart") {
              $('.add-to-cart-'+id).text("Remove")
              console.log('add to cart')
            }
              
          
         
        } ,
        error: function (response) {
          console.log(response)
                     
          }
    });
    
    } else {
      
        $.ajax({
        type: "POST",
        url: "delete_from_cart.php",
        data: {
            'product_id' : id
        },
        dataType: "json",
        success: function (response) {
            if (response.status == "success") {

              console.log(response)
              
              $('.count').text(response.count);
                $('.add-to-cart-'+id).text("Add to cart")

            } else {
              alert('failed')
            }
         
        } ,
        error: function (response) {
          
          alert('Remove failed')
            
          }
    })
    }
}
//add to cart ajax code end//




//show goods when category is clicked code start//
function showGoods(id){
  
  $.ajax({
      type: "POST",
      url: "  show_goods.php",
      data: {
          'category' : id
      },
      dataType: "text",
      success: function (response) {
         $('.products').html(response);
         $('.showy').text('Showing all results for ' + document.querySelector('.cat-' + id).innerText);
      } ,
      error: function (response) {
          alert('Something went wrong');
        }
  });
}
//show goods when category is clicked code end//


//increase quantity plus one start//
function plus_one(id)  {

  $.ajax({
        type: "POST",
        url: "plus_one.php",
        data: {
            'product_id' : id
        },
        dataType: "json",
        success: function (response) {
            if (response.message === "incremented") {
             
              $('.quantity-'+id).val(response.quantity);
              $('.tt').text('$' + response.total)
        } 
      },
        error: function (response) {
            console.log(response)
            
          }
    });
    
}
//increase quantity plus one end//



//decrease quantity plus one start//
function minus_one (id) {
    
  $.ajax({
      type: "POST",
      url: "minus_one.php",
      data: {
          'product_id' : id
      },
      dataType: "json",
      success: function (response) {
          if (response.message === "decremented") {
           
            $('.quantity-'+id).val(response.quantity);
            $('.tt').text('$' + response.total)
      } 
    },
      error: function (response) {
        
          
        }
  });
  
}
//decrease quantity plus one end//

function delete_from_cart (id) {
  $.ajax({
  type: "POST",
  url: "delete_from_cart.php",
  data: {
      'product_id' : id
  },
  dataType: "json",
  success: function (response) {
      if (response.status == "success") {
        
        $('.price').text(response.total);
        
        $('.count').text(response.count);
        
          $('.add-to-cart-'+id).text("Add to cart")
      
      
      $("."+id).remove()
      
      
        
      } else {
        alert(response)
      }
  } ,
  error: function (response) {
      alert("error deleting to cart")
      
    }
});
}


//expand function to fetch the specific data when the expand button is clicked
expand = (id) => {
    $.ajax({
      type: "POST",
      url: "expand.php",
      data: {"id" : id},
      dataType: "json",
      success: function (response) {
        console.log(response[0]);
      }
    });
}