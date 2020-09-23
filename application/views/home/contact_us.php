<?php include 'header.php';  ?>

<style type="text/css">
	.contact-content{padding-top: 80px;}
	.contact-form input{width: 100%}
</style>

	<section class="contact-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="separator">contact us</h2>
					</div>
				</div>
			</div>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27814.422039668723!2d47.96435712398921!3d29.37606405632596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9c83ce455983%3A0xc3ebaef5af09b90e!2sKuwait%20City%2C%20Kuwait!5e0!3m2!1sen!2sin!4v1599689105919!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-9">
						<form class="contact-form" id="contact_form">
							<h3>Contact form</h3> 
                             <h4 id="response"></h4>
							<div class="row">
								<div class="col-md-4">
									<label for="name">Name</label>
									<input type="text" id="name" placeholder="Name" required="">
								</div>
								<div class="col-md-4">
									<label for="email">E-mail</label>
									<input type="email" id="email" placeholder="E-mail" required="">
								</div>
								<div class="col-md-4">
									<label for="phone">Phone Number</label>
									<input type="text" id="phone" placeholder="Phone Number" required="">
								</div>
								<div class="clearfix" style="clear: both;"></div>
							</div>
							
							
							
							<label for="mind">What's on your mind?</label>
							<textarea id="message" placeholder="What's on your mind?"></textarea>
							<button type="submit">submit</button>
						</form>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3">
						<div class="our-store-wrap">
							<h3>Our store</h3>
							<div class="block-our-store">
								<div class="store active-store" data-id="mark0">
									  <?php
    $fdata=$this->Comman_model->getdata('footer_info', $where1=array('id'=>'1'));
            ?>
									<div class="inner-store"> 
										<ul class="store-contact-list">
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<div class="store-contact">
													<p>E-mail :</p>
													<a href="mailto:<?php echo $fdata->email ?>"><?php echo $fdata->email ?></a>
												</div>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<div class="store-contact">
													<p>Phone :</p>
													<a href="tel:<?php echo $fdata->phone ?>"><?php echo $fdata->phone ?></a>
												</div>
											</li>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<div class="store-contact">
													<p>Mail office :</p>
													<a href="" target="_blank"><?php echo $fdata->address ?></a>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="store" data-id="mark1">
									 
									<div class="inner-store">
										<p class="h3">Store 2</p>
										<ul class="store-contact-list">
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<div class="store-contact">
													<p>E-mail</p>
													<a href="mailto:infocoffee@mail.com">infocoffee@mail.com</a>
												</div>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<div class="store-contact">
													<p>Phone</p>
													<a href="tel:+7856987897">+785 535 4875</a>
												</div>
											</li>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<div class="store-contact">
													<p>Mail office</p>
													<a href="https://goo.gl/maps/aWJtKBtGqky" target="_blank">Sed ut perspiciatis unde omnis <br> Hancock Street, New York</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="store" data-id="mark2">
									 
									<div class="inner-store">
										<p class="h3">Store 3</p>
										<ul class="store-contact-list">
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<div class="store-contact">
													<p>E-mail</p>
													<a href="mailto:infocoffee@mail.com">infocoffee@mail.com</a>
												</div>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<div class="store-contact">
													<p>Phone</p>
													<a href="tel:+7856987897">+785 741 9512</a>
												</div>
											</li>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<div class="store-contact">
													<p>Mail office</p>
													<a href="https://goo.gl/maps/WndKNkXBJ4N2" target="_blank">Sed ut perspiciatis unde omnis <br> Halsey Street, New York</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="store" data-id="mark3">
									<div class="schedule">
										<p class="h3">Hours of operation</p>
										<ul class="day-list">
											<li> <span>Monday</span><span class="currently">Closed</span> </li>
											<li> <span>Tuesday</span><span>8:00 - 20:00</span> </li>
											<li> <span>Wendnesday</span><span>8:00 - 20:00</span> </li>
											<li> <span>Thursday</span><span>8:00 - 20:00</span> </li>
											<li> <span>Friday</span><span>8:00 - 20:00</span> </li>
											<li> <span>Saturday</span><span>8:00 - 20:00</span> </li>
										</ul>
									</div>
									<div class="inner-store">
										<p class="h3">Store 4</p>
										<ul class="store-contact-list">
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<div class="store-contact">
													<p>E-mail</p>
													<a href="mailto:infocoffee@mail.com">infocoffee@mail.com</a>
												</div>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<div class="store-contact">
													<p>Phone</p>
													<a href="tel:+7856987897">+785 321 4397</a>
												</div>
											</li>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<div class="store-contact">
													<p>Mail office</p>
													<a href="https://goo.gl/maps/af6VJsEf2742" target="_blank">Sed ut perspiciatis unde omnis <br> Jefferson Ave, New York</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php include 'footer.php';  ?>
<script type="text/javascript">
	$("#contact_form").submit(function(e){
          e.preventDefault();
         var name=$("#name").val();
         var email=$("#email").val();
         var phone=$("#phone").val();
         var message=$("#message").val();
          
          $.ajax({
          		url:'<?php echo base_url() ?>contact_us',
          		method:'POST',
          		data:{
          			'name':name,
          			 'email':email,
          			 'phone':phone,
                     'message':message
          		},
          		
          		success:function(response){
          			if(response){
          		   
          		      $("#response").html('Thank you for contacting to us Stay Tuned')
          	           $("#response").css('color','green')
                             $("#user_name").html(name);		
          			}else{
          				$("#response").html('Something went wrong please try again later')
          	            $("#response").css('color','red')
          			}
          			$("#response").focus();
          			$("#response").fadeOut(5000)

          		}
          	})
          

		})
</script>
