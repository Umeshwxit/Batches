<?php $this->load->view('home/header'); ?>

<style type="text/css">
	.bread-crumbs{justify-content: center;padding: 0;}.bread-crumbs li, .bread-crumbs li a{color: #fff;font-weight: bold;}.bread-crumbs li:before {color: #fff !important}
</style>

		<!-- END SECTION HEADER -->
		<!-- <section class="container">
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>
		</section> -->
		<section class="page-preview">
			<div class="h1 separator center">
			<?php echo $page_details->page_name ; ?>
				<ul class="bread-crumbs">
				<li><a href="<?php echo base_url() ?>">Home</a></li>
				<li><?php echo $page_details->page_name ; ?></li>
			</ul>
			</div>
			
		</section>
		<!-- START SECTION ABOUT -->


		
		<main class="about-content">
			<section class="about-company-wrap">
				<section class="about-company">
					<div class="container">				  
						<div class="col-sm-12 col-md-12">
							<h2><?php echo $page_details->page_name ; ?></h2>
							<p><?php echo $page_details->page_disc ; ?></p>
						</div>					 	
					</div>
				</section>
			</section> 		 
		</main>
		<!-- END SECTION ABOUT -->

<?php $this->load->view('home/footer'); ?>
