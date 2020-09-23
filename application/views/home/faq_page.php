<?php include 'header.php';  ?>
<style type="text/css">
	.contact-content{padding:80px 0px;}
</style>

<section class="contact-content">
<div class="container ">
	<div class="row">
		<div class="col-md-12">
			<h2 class="separator">Frequntly Asked Question</h2>
		</div>
	</div>
</div>


<div class="container">
<div class="sidebar-categories"> 
	<ul class="accordeon">
		<?php foreach ($faqs as $faq) {
		?>
			<li>
			<p class="accordeon-head"><b><?php echo $faq->faq_title; ?></b> <i class="fa fa-angle-down" aria-hidden="true"></i></p>
			<ul class="accordeon-body" style="display: none;">
				<p><?php echo $faq->faq_desc; ?></p>
			</ul>
		</li>
	<?php 	} ?>

		
		
	</ul>
</div>
</div>
</section>

<?php include 'footer.php';  ?>