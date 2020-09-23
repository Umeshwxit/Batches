<?php $this->load->view('home/header') ?>
 

<style type="text/css">
	.cart-card .product-control-buttons{position: relative;bottom: -10px;}
</style>

	<!-- END SECTION HEADER -->
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="bread-crumbs">
						<li><a href="index.html">Home</a></li>
						<li>Wishlist</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- START SECTION CART -->
		<section class="cart-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>My Wishlist</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
                       <?php if(empty($cart_details)){ ?>
				    <center><h4>Your Wishlist is Empty</h4></center>
				    <?php } else{ ?>

                       <?php foreach ($cart_details as $each_pro) {
                       	?>
                       
						<div class="wrap-cart">
							<div class="cart-card">
								<img style="height: 100px;width: 100px" src="<?php echo base_url() ?>uploads/gallery/<?php echo $each_pro['product_image']?>" alt="card">
								<div class="cart-card-info">
									<div class="cart-card-name">
										<p class="h4"><?php echo $each_pro['product_title']; ?></p>
										<p><span>sku: </span><?php echo $each_pro['sku'] ?></p>
										<p class="availability"><i class="fa fa-check" aria-hidden="true"></i> 
										<?php if($each_pro['product_qty']>0){
										?>In Stock <?php }else{ ?>Out of stock<?php } ?></p>
									</div>
									<div class="cart-card-price">
										<p class="once-price"><?php echo $each_pro['wish_price']; ?></p>
									</div>
									<div class="cart-card-quantity">
										<a  href="javascript:void(0)" class="h5 productaddtocart btn btn-primary"
												data-size_id="<?php echo $each_pro['wish_size_id']; ?>"
												data-prid="<?php echo $each_pro['wish_product_random']; ?>"
												data-product_id="<?php echo $each_pro['wish_product_id']; ?>"><i
													class="fa fa-shopping-basket" aria-hidden="true"></i> Move To cart</a>
									</div>
									<div class="product-control-buttons">
									<span class="delete-product" data-value=
									"<?php echo $each_pro['wish_id'] ?>"><i class="fa fa-times" aria-hidden="true"></i> Remove</span>
								</div>
								</div>
								
							</div> 
						 </div> 
                        <?php } }?>
						


					</div> 
				</div>
			</div>
		</section>
		<!-- END SECTION CART --> 






<?php $this->load->view('home/footer') ?>
<script type="text/javascript">
	$( ".delete-product" ).click(function (event) {
        event.preventDefault();
       
        var wish_id = $(this).attr('data-value');
        
            $.ajax({
                url: "<?php echo base_url() ?>/remove_wishlist",
                type: "POST",
                data: {
                    'wish_id': wish_id,
             
                },
                dataType: "JSON",
                success: function(data) {
                
                var res_data = JSON.stringify(data);
                var response = JSON.parse(res_data);
                $("#totalwish").html(response.count);
                if(response.count==0){
                    
                }
                window.location.reload();
                       
                        
                    

 
                }
            });
        
    });
</script>