<?php include 'header.php'; ?>

	<!-- END SECTION HEADER -->
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="bread-crumbs">
						<li><a href="index.html">Home</a></li>
						<li>Shoping Cart</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- START SECTION CART -->
		<section class="cart-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>shoping cart</h2>
					</div>
				</div>
				<div class="row">
				    <?php if(empty($cart_details)){ ?>
				    <center><h4>Your Cart is Empty</h4></center>
				    <?php } else{ ?>
					<div class="col-md-8">
						<div class="wrap-cart">
                <?php foreach($cart_details as $each_cart ){ ?>

							<div class="cart-card" id="trid<?php echo $each_cart['cart_id']; ?>">
								<img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $each_cart['ps_image']; ?>" style="width:100px" alt="card">
								<div class="cart-card-info">
									<div class="cart-card-name">
										<p class="h4"><?php echo $each_cart['product_title'] ?></p>
										<p><span>sku: </span> <?php echo $each_cart['sku'] ?></p>
										<p class="availability"><i class="fa fa-check" aria-hidden="true"></i> In Stock</p>
									</div>
									<div class="cart-card-price">
										<p class="once-price">$<?php echo $each_cart['cart_price'] ?></p>
									</div>
									<div class="cart-card-quantity">
										<div class="quantity">
											<div class="inner-quantity">
												<p>Quantity</p>
												<div class="counter">
<i class="fa fa-caret-left  decreaseCart"  aria-hidden="true" data-id="<?php echo $each_cart['cart_product_id']; ?>"  data-prid ="<?php echo $each_cart['cart_product_random']; ?>"  data-size_id="<?php echo $each_cart['cart_size_id']; ?>"  data-value="<?php echo $each_cart['cart_id']; ?>"></i>
<input class="count pCartCount<?php echo $each_cart['cart_id']; ?>"  value="<?php echo $each_cart['cart_qty']; ?>">
<i class="fa fa-caret-right  increaseCart" aria-hidden="true" data-id="<?php echo $each_cart['cart_product_id']; ?>"  data-prid ="<?php echo $each_cart['cart_product_random']; ?>"  data-size_id="<?php echo $each_cart['cart_size_id']; ?>"  data-value="<?php echo $each_cart['cart_id']; ?>"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="cart-card-all-prise">
										<p class="all-price">$<span  id="total<?php echo $each_cart['cart_id']; ?>" ><?php echo number_format($each_cart['cart_price']*$each_cart['cart_qty'],3) ?></span></p>
									</div>
								</div>
								<div class="product-control-buttons"> 
									<span class="delete-product"  data-value="<?php echo $each_cart['cart_id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></span>
								</div>
							</div>
							
							<?php } ?>
						</div>
						<div class="cart-control-buttons">
							<a href="<?php echo base_url('shop') ?>" class="continue-shopping"><i class="fa fa-arrow-left" aria-hidden="true"></i> continue shopping</a>
							<a id="clear_cart" type="button">Clear shopping cart</a>
							
						</div>
					</div>
					<div class="col-md-4">
						
							<div class="cart-totals">
								<p class="h4">cart totals</p>
								<div class="subtotal">
									<p><span>subtotal</span> $<span class="totalvaluee">  <?php echo $total; ?></span> </p>
								</div>
								<div class="shipping">
									<p><span>shipping</span></p>
									<div class="shipping-form">
										<input type="radio" name="ship" id="ship1" checked>
										<label for="ship1">Flat rate: $30</label>
										<input type="radio" name="ship" id="ship2">
										<label for="ship2">Free shipping</label>
										<input type="radio" name="ship" id="ship3">
										<label for="ship3">Local pickup</label>
										 
									</div>
								</div>
							</div>
							<div class="order-totals" >
								<p class="h4">order totals  $<span class="totalvaluee"><?php echo $total; ?></span></p>
								<div class="inner-order-totals">
									<p class="h5 cupon-head active_accordeon">apply cupon <i class="fa fa-angle-down" aria-hidden="true"></i></p>
									<div class="cupon-accordeon ">
										<div class="cupon-form">
                                            <p id="coupon_response" class="font-weight-bold"></p>
											<form id="apply_coupon">
                                            <input type="text" placeholder="Enter discount code" id="coupon_code" >
                                            <input type="hidden" id="total" value="<?php echo $total; ?>">
                                            <input type="submit" class="button white" value="apply discount">
											
                                            </form>
                                          <button id="remove_coupon" style="display: none">remove coupon</button>

										</div>
									</div>
								</div>
							</div>
							<button ><a href="<?php echo base_url('checkout') ?>" style="color:white">proceed to checkout</a></button>
						
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- END SECTION CART -->


<?php include 'footer.php'; ?>

<script>
    // $(document).ready(function (argument) {
    //  if(localStorage.getItem('coupon_code')!=''){
    //     $("#coupon_code").val(localStorage.getItem('coupon_code'));
        
    //     $("#apply_coupon").trigger('submit');
    //  }
    // })
    var baseUrl = '<?php echo base_url(); ?>';
    $( ".increaseCart" ).click(function (event) {
        event.preventDefault();
        var productId = $(this).attr('data-id');
        var cartID = $(this).attr('data-value');
        
        var size_id = $(this).attr('data-size_id');
        var prid = $(this).attr('data-prid');
        
        var getProCount = $('.pCartCount'+cartID).val();
        if(getProCount >= 1){
            var quantity = parseInt(getProCount) + 1;
            $('.pCartCount'+cartID).val(quantity);  
            $.ajax({
                url: baseUrl + "ajax/increaseDecreaseCart",
                type: "POST",
                data: {
                    'cartId': cartID,
                    'productId': productId,
                    'qty': quantity,
                    'size_id':size_id,
                    'prid':prid
                },
                dataType: "JSON",
                success: function(data) {
                            console.log(data);
                    var res_data = JSON.stringify(data);
                    var response = JSON.parse(res_data);
                    var msg = response.msg;
                        if(msg=='somthing_went_wrong'){
                      //  swal('somthing went wrong');
                        
                        }else if(msg=='out_of_stock'){
                        
                        swal('Product is out of stock');
                        
                        
                        }else if(msg=='added_in_cart'){
                        swal('Product has been added to cart');
                        
                        
                        
                        }else if(msg=='already_in_cart'){
                        swal('Product Already Into Your cart');
                        
                        
                        
                        }
                           
                var res_data = JSON.stringify(data);
                var response = JSON.parse(res_data); 
                var jsonStr = response['cart_details'];
                var cartcount = response['cartcount'];
                var carttotal = response['carttotal'];
                var productPrice = response['productPrice'];
                
                $("#cart_total_header").html('$'+carttotal); 
                $(".totalvaluee").html(carttotal); 
                $("#total").val(carttotal);
                $("#totalcart").html(cartcount); 
                if(productPrice){
                $('#total'+cartID).html(productPrice);
                }

                              
        
                }
            });
        }
    });
     $( ".decreaseCart" ).click(function (event) {
        event.preventDefault();
        var productId = $(this).attr('data-id');
        var cartID = $(this).attr('data-value');
        var size_id = $(this).attr('data-size_id');
        var colour_id = $(this).attr('data-colour_id');
        var prid = $(this).attr('data-prid');
        var getProCount = $('.pCartCount'+cartID).val();
        if(getProCount > 1){
            var quantity = parseInt(getProCount) - 1;
            $('.pCartCount'+cartID).val(quantity);  
            $.ajax({
                url: baseUrl + "ajax/increaseDecreaseCart",
                type: "POST",
                data: {
                    'cartId': cartID,
                    'productId': productId,
                    'qty': quantity,
                    'size_id':size_id,
                    'colour_id':colour_id,
                    'prid':prid
                },
                dataType: "JSON",
                success: function(data) {
                            console.log(data);
                    var res_data = JSON.stringify(data);
                    var response = JSON.parse(res_data);
                    var msg = response.msg;
                        if(msg=='somthing_went_wrong'){
                      //  swal('somthing went wrong');
                        
                        }else if(msg=='out_of_stock'){
                        
                        swal('Product is out of stock');
                        
                        
                        }else if(msg=='added_in_cart'){
                        swal('Product has been added to cart');
                        
                        }else if(msg=='already_in_cart'){
                        swal('Product Already Into Your cart');
                        }
                           
                var res_data = JSON.stringify(data);
                var response = JSON.parse(res_data); 
                var jsonStr = response['cart_details'];
                var cartcount = response['cartcount'];
                var carttotal = response['carttotal'];
                var productPrice = response['productPrice'];
                $("#cart_total_header").html('$'+carttotal); 
                $(".totalvaluee").html(carttotal); 
                $("#total").val(carttotal);
                $("#totalcart").html(cartcount); 
                if(productPrice){
                $('#total'+cartID).html(productPrice);
                }

                }
            });
        }
    });

      $( ".delete-product" ).click(function (event) {
        event.preventDefault();
       
        var cartID = $(this).attr('data-value');
            $.ajax({
                url: baseUrl + "ajax/RemoveCart",
                type: "POST",
                data: {
                    'cartId': cartID,
             
                },
                dataType: "JSON",
                success: function(data) {
                            console.log(data);
                    var res_data = JSON.stringify(data);
                    var response = JSON.parse(res_data);
                    var msg = response.msg;
                        if(msg=='somthing_went_wrong'){
                            //  swal('somthing went wrong');
                        }else if(msg=='out_of_stock'){
                        swal('Product is out of stock');
                        
                        }
 
                        var cartcount = response['cartcount'];
                        var carttotal = response['carttotal'];
                        $("#cart_total_header").html('$ '+carttotal); 
                        $("#totalcart").html(cartcount); 
                         $(".totalvaluee").html(carttotal); 
                        $("#total").val(carttotal);

                       $('#trid'+cartID).remove();
                       if(cartcount<='0.000')
                       {
                           window.location.reload();
                       }
                    

 
                }
            });

            
        
    });
   // clear_cart
   $("#clear_cart").click(function() {
     var confirmation=confirm("Do you reallay want to clear all cart data");
    if(confirmation){
       $.ajax({
        url:'<?php echo base_url(); ?>clear_cart',
        method:'POST',
        data:{
            clear_cart:'true'
        },
        success:function(res) {
            location.reload();
        }

       })
    }
   })
  // manage coupon 
$("#apply_coupon").submit(function(e){
   e.preventDefault();
var coupon_code=$("#coupon_code").val();
var total=$("#total").val();
console.log(total)
$.ajax({
    url:"<?php echo(base_url())?>apply_coupon",
    method:"POST",
    data:{
         coupon_code:coupon_code,
         total:total
    },
    dataType:'JSON',
    success:function (response) {
        console.log(response);
     // total=toFixed(response.total,3);
     var total= response.total;
     $(".totalvaluee").html(total); 
      $("#total").val(total);
      if(response.message=='Coupon Applied'){
         localStorage.setItem('coupon_code',coupon_code);
         coupon=localStorage.getItem('coupon_code');
         console.log(coupon);
         $("#apply_coupon").css('display','none');
         $("#remove_coupon").css('display','block');
        $("#coupon_response").html("Coupon Applied")
        $("#coupon_response").css('color','green');

      }else if(response.message=='Coupon out of stock'){
        $("#coupon_response").html("Coupon out of stock")
        $("#coupon_response").css('color','red');


      }else if(response.message=='Invalid Coupon Code'){
         $("#coupon_response").html("Invalid Coupon Code")
        $("#coupon_response").css('color','red');
     

      }else if(response.message=='Coupon has been expired'){

         $("#coupon_response").html("Coupon has been expired")
        $("#coupon_response").css('color','red');
     

      }


     
    }
})

$("#remove_coupon").on('click',function (argument) {
    $("#coupon_response").html("")
    $("#coupon_response").html("Coupon Removed");
    $("#coupon_response").css('color','green');
    localStorage.setItem("coupon_code",'');    
    total="<?php echo $total ?>";
    console.log(total);
    $(".totalvaluee").html(total); 
   coupon= localStorage.getItem('coupon_code');
    console.log(coupon);
      $("#total").val(total);
      $("#apply_coupon").css('display','block');
      $("#remove_coupon").css('display','none');

})

})

</script>
