<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<!--====>> Favicon icon CSS <<====-->
		<!-- <link href="img/favicon/favicon.ico" type="image/x-icon" rel="shortcut icon" >	 -->
		<!--====>> Font Awesome V4 CSS <<====-->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/font-awesome/css/font-awesome.min.css">	
		<!--====>> Bootstrap V3 CSS <<====-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
		<!--====>> Google Fonts CSS <<====-->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">	
		<!--====>> Slick Slider CSS <<====-->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
		<!-- Custom select -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />	
		<!--====>> Index CSS <<====-->
		<link href="<?php echo base_url() ?>assets/css/index.css" type="text/css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body class="home-page">
		<!--<div class="preloader">-->
		<!--	<div class="preloader-content">-->
		<!--		<div class="preloader-item-1"></div>-->
		<!--		<div class="preloader-item-2"></div>-->
		<!--		<div class="preloader-item-3"></div>-->
		<!--		<div class="preloader-item-4"></div>-->
		<!--		<div class="preloader-item-5"></div>-->
		<!--	</div>-->
		<!--</div>-->
		<!-- START SECTION HEADER -->
		<header>
			<div class="user-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<!-- START BLOCK INNER HEADER -->
							<div class="iner-user-header">
								<nav class="second-nav">
									<ul>
										<li><a href="tel:+965 9936 5011"><i class="fa fa-phone"></i> &nbsp; +965 9936 5011</a></li>
										<li><a href="mailto:Info@batcheskw.com"><i class="fa fa-envelope"></i> &nbsp;Info@batcheskw.com</a></li> 
									</ul>
								</nav>
								<div class="user-settings">
									<ul>
										<!-- <li class="language">
											<p class="check"><img src="img/US_icon.jpg" alt="US">English <i class="fa fa-angle-down" aria-hidden="true"></i></p>
											<ul>
												<li><a href="#"><img src="img/US_icon.jpg" alt="US">English</a></li>
												<li><a href="#"><img src="img/france_icon.jpg" alt="US">French</a></li>
												<li><a href="#"><img src="img/germany_icon.jpg" alt="US">German</a></li>
											</ul>
										</li>  -->
										<?php if(!empty($this->session->userdata('cid'))){ ?>

										<li><a href="<?php echo base_url('logout') ?>" ><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
										<li><a href="<?php echo base_url('account') ?> " > Hii, <span id="user_name"> <?php echo  $this->session->userdata('cust_name') ?></span> </a></li>
										
										<?php }else{ ?>
										<li><a href="#" class="header-sign"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a></li>
										<li><a href="#" class="header-login"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register</a></li>
									<?php } ?>
									</ul>
								</div>
							</div>
							<!-- END BLOCK INNER HEADER -->
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-header">
							<!-- START SECTION HEADER TOP -->
							<div class="main-header-top">
								<div class="logo">
									<div class="humburger"> <span></span> </div>
									<a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/logo.jpg"></a>
								</div>
								<form action="<?php echo base_url() ?>shop" class="search-form">									 
									<input type="search" name="search" placeholder="Search here...">
									<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form> 
								<div class="indicators"> 
									<a 
                                    <?php
                                     if(!empty($this->session->userdata('cid'))){ ?>
									href="<?php echo base_url('wishlist') ?>" class="indicator" <?php } else{ ?>
                                       class="header-sign indicator"
                                       <?php } ?>
										>
										<i class="fa fa-heart-o" aria-hidden="true"></i>
                                  <!--  wishlist count code by umesh -->

                                   <?php  if(!empty($this->session->userdata('cid'))){ 
                                      $wish_count=$this->Comman_model->get_rows('wishlist',array('wish_user_id'=>$this->session->userdata('cid')));
                                       }else{
                                       	$wish_count=0;
                                       }
                                        
                                   	?>

										<span class="indicator-count" id="totalwish"><?php echo $wish_count ?></span>
									</a>
									<a href="<?php echo base_url() ?>cart" class="indicator cart">
										<i class="fa fa-shopping-basket" aria-hidden="true"></i>
										<span class="indicator-count" id="totalcart">
										<?php 
                            $session_id = $this->session->userdata('session_id');
                            $cid = $this->session->userdata('cid');
                            $cartcount = $this->Comman_model->cart_detail($session_id,$cid);
                            echo count($cartcount);


										?>
										
										</span>
										<span class="basket-desc"><strong>Cart</strong> <span id="cart_total_header">$ <?php
										 $total=0;
        for($i=0;$i<count($cartcount); $i++) {
        $cart_qty=  $cartcount[$i]['cart_qty'];
        $cart_price=   $cartcount[$i]['cart_price'];
        $total+=$cart_price*$cart_qty;
        
    
        }echo $total;
        ?></span></span>
									</a>
								</div>
							</div>
							<!-- END SECTION HEADER TOP -->
							<!-- START SECTION HEADER MENU -->
							<div class="main-header-menu">
								<ul class="menu">
									<li class="close_menu">close</li>
									<li><a href="<?php echo base_url() ?>">Home</a></li>
					
									 <?php
                                        $catdata=$this->Comman_model->getAlldata('categories', $where1=array(),$ord='');
                                        ?>
                                      
                                        <?php foreach($catdata as $each_cate){ ?>
                                        <li><a href="<?php echo base_url() ?>shop/?category=<?php echo $each_cate->category_url ?>"><?php echo $each_cate->category_name ?></a></li>
                                        <?php } ?>
                                        
                                        
									<li><a href="<?php echo base_url() ?>about-us">About Us</a></li>
									<li><a href="<?php echo base_url() ?>contact-us">Contact Us</a></li>
								</ul>
							</div>
							<!-- END SECTION HEADER MENU -->
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- END SECTION HEADER --> 
		<style type="text/css">
			.swal-button {
    background-color: #103558!important;
    
}
		</style>