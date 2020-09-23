<?php $this->load->view('home/header'); ?>

<!-- Begin home slider -->
<section>
	<div class="home-slider">
		<img src="<?php echo base_url() ?>assets/img/home-slider-1.jpg" alt="coffee">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="slider">
						<?php  foreach($slider as $each_slider){ ?>
						<div class="slide slide-1">
							<div class="slide-desc">
								<h1><?php echo $each_slider->slide_name ?></h1>
								<p class="h3 discount"><?php echo $each_slider->slide_sub_name ?></p>
								<a href="<?php echo base_url() ?>shop" class="button">shop now</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End home slider -->
<!-- START SECTION HOME -->
<main class="home-content">
	<section>
		<div class="container category-baner-wrap">
			<div class="row">

				<?php  foreach($categories_list as $each_cat){ ?>

				<div class="col-md-4">
					<div class="category-baner category-baner-1"
						style="background: url(<?php echo $each_cat->category_image ?>) no-repeat center;">
						<div class="category-baner-text">
							<!--<h2>new!</h2>-->
							<h3><?php echo $each_cat->category_name ?></h3>
							<a href="<?php echo base_url() ?>shop?category=<?php echo $each_cat->category_url ?>" class="button">shop now</a>
						</div>
					</div>
				</div>
				<?php } ?>


			</div>
		</div>

		<div class="featured-slider">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="h3">Our product</p>
						<p class="h2 separator">New Arrivals</p>
						<div class="prev-slider"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
						<div class="next-slider"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="slider">
							<?php foreach($n_product_list as $each_pro){ ?>
							<div class="card">
								<div class="product">
									<div class="product-prev">
										<a href="<?php echo base_url() ?>product/<?php  echo $each_pro['product_url'] ?>">
											<img src="<?php echo base_url() ?>uploads/gallery/<?php echo $each_pro['ps_image'] ?>"
												alt="product">
											<span
												class="product-label"><?php echo date('d-m-Y',strtotime($each_pro['production_date'])); ?></span>
										</a>
										<div class="hide-product-buttons">
											<a id="cart<?php echo $each_pro['prid']; ?>" href="javascript:void(0)" class="h5 productaddtocart"
												data-size_id="<?php echo $each_pro['size_id']; ?>"
												data-prid="<?php echo $each_pro['prid']; ?>"
												data-product_id="<?php echo $each_pro['product_id']; ?>"><i
													class="fa fa-shopping-basket" aria-hidden="true"></i> 
                                            <?php if($each_pro['cart']=='true'){ ?>
											In Cart <?php }else{ ?>
												Add To cart
											<?php } ?>
											</a>
											<a href="javascript:void(0)" >
												<i id="<?php echo $each_pro['prid']; ?>" class="follow <?php if($each_pro['wishlist']=='true'){ ?>fa fa-heart <?php }else{ ?>fa fa-heart-o <?php } ?> <?php 
											if(empty($this->session->userdata('cid'))){ ?>header-sign<?php }else{ ?>productaddtowishlist <?php } ?>" 
											     id="<?php echo $each_pro['prid']; ?>"
												data-size_id="<?php echo $each_pro['size_id']; ?>"
												data-prid="<?php echo $each_pro['prid']; ?>"
												data-product_id="<?php echo $each_pro['product_id']; ?>"
												 aria-hidden="true"></i> </a>
										</div>
									</div>
									<?php
		                            $pcs_mrp= $each_pro['pcs_mrp'];
		                            $pcs_sale= $each_pro['pcs_sale'];
		                            
		                            if($pcs_sale<='0.000')
		                            {
		                            $price=$pcs_mrp;
		                            $price1='';
		                            }else{
		                            $price=$pcs_sale; 
		                            $price1='$'.$pcs_mrp; } ?>
									<div class="product-name">
										<a href="<?php echo base_url() ?>product/<?php echo $each_pro['product_url'] ?>"
											class="h4"><?php echo $each_pro['product_title'] ?></a>
										<p class="price"><span><del> <?php echo $price1; ?></del></span> $<?php echo $price; ?></p>
									</div>
									<div class="product-desc">
										<p><?php echo $each_pro['size_name'] ?></p>
										<p class="product-rating">
											<?php 
											if(!empty($each_pro['rating'])){
                                             $rating=round($each_pro['rating']);
                                             for ($i=0; $i < 5; $i++) { 
                                             	if($rating>$i){
                                             	  echo '<span><i class="fa fa-star" aria-hidden="true"></i></span>';	
                                             	}else{
                                             		echo '<span><i class="fa fa-star-o" aria-hidden="true"></i></span>';
                                             	}
                                             }}
                                             else{
                                             	for ($i=0; $i < 5; $i++) { 
                                             	
                                             		echo '<span><i class="fa fa-star-o" aria-hidden="true"></i></span>';
                                             	
                                             }

                                             }
											 ?>
											
										</p>	
									</div>
								</div>
							</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<section class="base-block">
		<div class="best-seller-slider">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="h3">Our product</p>
						<p class="h2 separator">Best seller</p>
						<div class="prev-slider"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
						<div class="next-slider"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="slider">
							<?php foreach($f_product_list as $each_pro){ ?>
							<div class="card">
								<div class="product">
									<div class="product-prev">
										<a href="<?php echo base_url() ?>product/<?php echo $each_pro['product_url'] ?>">
											<img src="<?php echo base_url() ?>uploads/gallery/<?php echo $each_pro['ps_image'] ?>"
												alt="product">
											<span
												class="product-label"><?php echo date('d-m-Y',strtotime($each_pro['production_date'])); ?></span>
										</a>
									<div class="hide-product-buttons">
											<a id="cart<?php echo $each_pro['prid']; ?>" href="javascript:void(0)" class="h5 productaddtocart"
												data-size_id="<?php echo $each_pro['size_id']; ?>"
												data-prid="<?php echo $each_pro['prid']; ?>"
												data-product_id="<?php echo $each_pro['product_id']; ?>"><i
													class="fa fa-shopping-basket" aria-hidden="true"></i> 
                                            <?php if($each_pro['cart']=='true'){ ?>
											In Cart <?php }else{ ?>
												Add To cart
											<?php } ?>
											</a>
											<a href="javascript:void(0)" >
												<i id="<?php echo $each_pro['prid']; ?>" class="follow <?php if($each_pro['wishlist']=='true'){ ?>fa fa-heart <?php }else{ ?>fa fa-heart-o <?php } ?> <?php 
											if(empty($this->session->userdata('cid'))){ ?>header-sign<?php }else{ ?>productaddtowishlist <?php } ?>" 
											     id="<?php echo $each_pro['prid']; ?>"
												data-size_id="<?php echo $each_pro['size_id']; ?>"
												data-prid="<?php echo $each_pro['prid']; ?>"
												data-product_id="<?php echo $each_pro['product_id']; ?>"
												 aria-hidden="true"></i> </a>
										</div>
									</div>
									<?php
		                            $pcs_mrp= $each_pro['pcs_mrp'];
		                            $pcs_sale= $each_pro['pcs_sale'];
		                            
		                            if($pcs_sale<='0.000')
		                            {
		                            $price=$pcs_mrp;
		                            $price1='';
		                            }else{
		                            $price=$pcs_sale; 
		                            $price1='$'.$pcs_mrp; } ?>
									<div class="product-name">
										<a href="<?php echo base_url() ?>product/<?php echo $each_pro['product_url'] ?>"
											class="h4"><?php echo $each_pro['product_title'] ?></a>
										<p class="price"><span> <del> <?php echo $price1; ?></del></span> $<?php echo $price; ?></p>
									</div>
									<div class="product-desc">
										<p class="product-rating">
											<?php 
											if(!empty($each_pro['rating'])){
                                             $rating=round($each_pro['rating']);
                                             for ($i=0; $i < 5; $i++) { 
                                             	if($rating>$i){
                                             	  echo '<span><i class="fa fa-star" aria-hidden="true"></i></span>';	
                                             	}else{
                                             		echo '<span><i class="fa fa-star-o" aria-hidden="true"></i></span>';
                                             	}
                                             }}
                                             else{
                                             	for ($i=0; $i < 5; $i++) { 
                                             	
                                             		echo '<span><i class="fa fa-star-o" aria-hidden="true"></i></span>';
                                             	
                                             }

                                             }
											 ?>
											
										</p>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="brand-slider">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="prev-slider transparent"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
					<div class="next-slider transparent"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
					<div class="slider">
						<?php foreach($banners as $each_banner) { ?>
						<div class="card"><img src="<?php echo $each_banner->banner_img ?>" alt="logo brand 1"></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- END SECTION HOME -->
<?php $this->load->view('home/footer'); ?>