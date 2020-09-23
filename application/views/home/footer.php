		<!-- START SECTION FOOTER -->
		<footer>
			<div class="base-block">
				<div class="container">
					<div class="row footer-nav">
						<div class="col-sm-4 col-md-2 col-lg-3">
							<div class="wrap-footer-nav">
								<p class="h4">About us</p>
								<nav>
									<ul>
										<li><a href="<?php echo base_url() ?>about-us">About us</a></li>
										<li><a href="<?php echo base_url() ?>blog-ring-sidebar">Blog Ring Sidebar</a></li>
										<li><a href="<?php echo base_url() ?>faq-page">FAQ Page</a></li>
										<li><a href="<?php echo base_url() ?>contact-us">Contact us</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-sm-4 col-md-2 col-lg-3">
							<div class="wrap-footer-nav">
								<p class="h4">categories</p>
								<nav><ul>
								    <?php
                                        $catdata=$this->Comman_model->getAlldata('categories', $where1=array(),$ord='');
                                        ?>
                                        
                                        <?php foreach($catdata as $each_cate){ ?>
                                        <li><a href="<?php echo base_url() ?>shop"><?php echo $each_cate->category_name ?></a></li>
                                        <?php } ?>
							
									<!--<li><a href="about-us.php">Coffe beans</a></li>-->
									<!--	<li><a href="#">Equipment</a></li>-->
									<!--	<li><a href="#">Accessories</a></li>-->
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-3">
							<div class="wrap-footer-nav">
								<p class="h4">customer services</p>
								<nav>	
                                        <?php
                                        $cmsdata=$this->Comman_model->getAlldata('pages', $where1=array(),$ord='');
                                        ?>
                                        <ul>
                                        <?php foreach($cmsdata as $each_page){ ?>
                                        <li><a href="<?php echo base_url() ?><?php echo $each_page->page_url ?>"><?php echo $each_page->page_name ?></a></li>
                                        <?php } ?>
										<!--			<li><a href="about-us.php">Privacy Policy</a></li>-->
										<!--<li><a href="#">Customer Services</a></li>-->
										<!--<li><a href="#">Orders And Returns</a></li>-->
										<!--<li><a href="contact.php">Advanced Search</a></li>-->
										
									
									</ul>
								</nav>
							</div>
						</div>
						 <?php
    $fdata=$this->Comman_model->getdata('footer_info', $where1=array('id'=>'1'));
            ?>
						<div class="col-sm-12 col-md-4 col-lg-3 wrap-footer-contact">
							<p class="h4">contact</p>
							<ul class="footer-contact">
								<li>Adress: <?php echo $fdata->address ?></li>
								<li><a href="tel:<?php echo $fdata->phone ?>">Phone: <span><?php echo $fdata->phone ?></span></a></li>
								<li><a href="mailto:<?php echo $fdata->email ?>">Email: <span><?php echo $fdata->email ?></span></a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-3">
							<div class="footer-logo-wrap">
								<div class="footer-logo white">
									<a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/logo.jpg"></a>
								</div>
								<p>Copyright © 2020 All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-sm-12 col-md-5">
							<div class="wrap-footer-subscribe">
								<p class="h4">subscribe to our newsletter</p>
                        <span id="Subscribe_error" style="color: #FFF;"></span>

								<form id="newsletter" class="subscribe-form">
									<input type="email" name="email" id="email" placeholder="Your e-mail" required>
									<button type="submit" id="Subscribe">subscribe</button>
								</form>
							</div>
						</div>
						<div class="col-sm-12 col-md-offset-0 col-md-3 col-md-offset-1 col-lg-offset-1">
							<div class="paymants-wrap">
								<p class="h4">We Are Social</p>
								<style type="text/css">.paymants a{color: #fff;font-size: 20px;padding: 8px;}</style>
								<div class="paymants">
									<a href="<?php echo $fdata->facebook ?>"><i class="fa fa-facebook"></i></a>
									<a href="<?php echo $fdata->twitter ?>"><i class="fa fa-twitter"></i></a>
									<a href="<?php echo $fdata->instagram ?>"><i class="fa fa-instagram"></i></a>
									<a href="<?php echo $fdata->g_plus ?>"><i class="fa fa-youtube"></i></a> 
								</div>
							</div>				
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END SECTION FOOTER -->
		<!-- Begin regiter form -->
		<div class="popup-register-form">
			<div class="wrap-register-form">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="popup-form-block">
								<div class="sign-up-text">
									<p class="h4">Don't have an account?</p>
									<p>Still not registered? Register and you will be able to comment and ask questions to specialists.</p>
									<p class="to-form to-signup-thumb">Sign Up</p>
								</div>
								<div class="sign-in-text">
									<p class="h4">Already have an account? Sign in</p>
									<p>If you already have an account, just enter your login information. So you can leave comments and ask questions to specialists.</p>
									<p class="to-form to-signin-thumb">Sign In</p>
								</div>
								<div class="wrap-form to-signup" id="wrap-sign-form">
									<div class="close-popup-form"><i class="fa fa-times" aria-hidden="true"></i></div>
									<form id="sign_up_form" class="sign-up">
										<p class="h4">Register</p>
										<span id="sign_error" class="text-danger  pb-2 font-weight-bold" style="font-size: 13px;"></span>
									
										<div class="form-info-wrap">
											<input type="text"  placeholder="Username"  id="sign_user_name">
											<label for="up-user"><i class="fa fa-user" aria-hidden="true"></i></label>
											<span id="sign_user_name_error" class="text-danger  pb-2 font-weight-bold" style="font-size: 13px;"></span>
										</div>
										<div class="form-info-wrap">
											<input type="email"  placeholder="E-mail"  id="sign_user_email" >
											<label for="up-email"><i class="fa fa-envelope" aria-hidden="true"></i></label>
											<span id="sign_user_email_error" class="text-danger  pb-2 font-weight-bold" style="font-size: 13px;"></span>
										</div>
										<div class="form-info-wrap">
											<input type="password"  placeholder="Password"  id="sign_user_password">
											<label for="up-pass"><i class="fa fa-lock" aria-hidden="true"></i></label>
											<span id="sign_user_password_error" class="text-danger  pb-2 font-weight-bold" style="font-size: 13px;"></span>
										</div>
										<button type="submit">Sign Up</button>
										<p class="to-form to-signin-thumb">Sign In</p>
									</form>
									<form id="login_form" class="sign-in">
										<p class="h4">Login</p>
										<div class="form-info-wrap">
											<input type="email"  placeholder="Username"  id="login_user_email">
											<label for="in-user"><i class="fa fa-user" aria-hidden="true"></i></label>
										</div>
										<span id="login_user_email_error" style="font-size: 13px;" class="text-danger text-capitalize pb-2 font-weight-bold"></span>
									
										<div class="form-info-wrap">
											<input type="password"  placeholder="Password"  id="login_user_password">
											<label for="in-pass"><i class="fa fa-lock" aria-hidden="true"></i></label>
										</div>
										<span id="login_user_password_error" style="font-size: 13px;" class="text-danger text-capitalize pb-2 font-weight-bold"></span>
									
										<button type="submit">Login</button>
										<p id="forgot" class="forgot">Forgot password?</p>
										<p class="to-form to-signup-thumb">Sign Up</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<div class="popup-register-form-succeed active">
				<div class="register-succeed-content">
					<div class="logo">
						<a href="index.php">Coffee<span>.</span></a>
					</div>
					<h3>Thanks for <br> your registration</h3>
				</div>
			</div>
		</div>
		<!-- End regiter form -->
		<!-- Begin forgot popup -->
		<div class="forgot-popup-wrap">
			<div class="forgot-popup">
				<p class="close-forgot"><i class="fa fa-times" aria-hidden="true"></i></p>
				<h4>Forgot password?</h4>
				<p id="forgot_response">Enter your email address and we will send you further instructions on how to reset the password.</p>
				<form id="forgot_form" class="forgot-popup-form">
					<input type="email" placeholder="E-mail" required id="forgot_user_email">
					<button type="submit">Restore password</button>
				</form>
				<p class="to-login">Back to login</p>
			</div>
		</div>
		<!-- End forgot popup -->
		<!-- START SECTION POPUP -->
		<div class="main-popup">
			<div class="popup-content">
				<div class="close-main-popup"><i class="fa fa-times" aria-hidden="true"></i></div>
				<div class="footer-logo-wrap">
					<div class="footer-logo white">
						<a href="index.php">CAMELLO</a>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="h1">newsletter</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean feugiat dictum lacus, ut hendrerit mi</p>
							<form action="#" class="popup-form">
								<div class="inner-wrap">
									<input type="text" placeholder="Name" required>
									<input type="email" placeholder="E-mail" required>
								</div>
								<button type="submit">subscribe</button>
							</form>						
						</div>
					</div>
				</div>
				<div class="do-not-show">
					<input type="checkbox" id="do-not-show">
					<label for="do-not-show">Do not show this popup again</label>
				</div>
			</div>
			<div class="bg-popup"></div>
		</div>
		<!-- END SECTION POPUP -->
		<p class="back-top" id="toTop"><i class="fa fa-angle-up" aria-hidden="true"></i></p>
		<!-- ===> Juery 3.2.1 JS <==== -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<!-- ===> Juery UI 1.12.1 JS <==== -->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<!-- ===> Bootstrap 3 JS <==== -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!-- ===> Slick slider JS <==== -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
		
		<!-- ===> Touchpunch JS <==== -->
		<script src="<?php echo base_url() ?>assets/libs/touchpunch/touchpunch.js"></script>
		
		<!-- Custom select -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		
		<!-- ===> Common JS <==== -->
		<script src="<?php echo base_url() ?>assets/js/common.js"></script>
		<!-- fiters js -->
		
 <script>
       	function isEmail(emailid) {
			var pattern = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
			return pattern.test(emailid);
		}
		
		// Subscribe Script  
  $('#Subscribe').on('click', function(event) {
    var email = $('#email').val();
    if(email==''  || (!isEmail(email)) )
    {
       $("#Subscribe_error").html('Enter Valid Email Address');
       return;
    }
    $.ajax({
      url : '<?php echo base_url() ?>home/add_subscribe',
      method : "POST",
      data : {email: email},
      dataType:"JSON",
      success: function(data){
        var res_data = JSON.stringify(data);
        var response = JSON.parse(res_data);
        var responseData = response['responseData'];           
        if(responseData=='success')
        {
          $("#Subscribe_error").html('Thankyou For Subscribing Our Newsletter');
        }else if(responseData=='alredy')
        {      
          $("#Subscribe_error").html('You Have Already Subscribed Our Newsletter');
        }
        $("#Subscribeform").trigger("reset");
      }
    });          
  });
  // // Subscribe Script
  // add to cart script
    $(document).on('click', '.productaddtocart', function(event) {  
             event.preventDefault();
            var size_id = $(this).data('size_id');
            var prid = $(this).data('prid');
            var product_id = $(this).data('product_id');
            var qty = 1;
            id=prid;
          var baseUrl = '<?php echo base_url(); ?>';
            $.ajax({
               url: baseUrl + "ajax/addtocart_new",
               type: "POST",
               data: {
                  'size_id': size_id,
                  'prid': prid,
                  'product_id': product_id ,
                  'qty':qty,
               },
               dataType: "json",
               success: function(data) {
                   
                   console.log(data);
                    var res_data = JSON.stringify(data);
                    var response = JSON.parse(res_data);
                    var msg = response.msg;
                        if(msg=='somthing_went_wrong'){
                      //  swal('somthing went wrong');
                        
                        }else if(msg=='out_of_stock'){
                        
                        swal({
							  title: "Sorry",
							  text: "Product Out of stock",
							  icon: "error",
							  button: "Okay",
							});
                        
                        
                        }else if(msg=='added_in_cart'){
                         $("#cart"+id+"").html('In cart');
                              
                        swal({
							  title: "Great",
							  text: "Product added to cart",
							  icon: "success",
							  button: "Okay",
							});
                        
                        
                        }else if(msg=='already_in_cart'){
                        swal({
							  title: "!Opps",
							  text: "Product Already in cart",
							  icon: "warning",
							  button: "Okay",
							});
                        
                        
                        
                        }
                           
                        var res_data = JSON.stringify(data);
                        var response = JSON.parse(res_data); 
                        var cartcount = response['cartcount'];
                        var carttotal = response['carttotal'];
                        $("#cart_total_header").html('$ '+carttotal); 
                        $("#totalcart").html(cartcount); 

                              
        
           }
            });
       });

    // add to wishlist
    $(document).on('click', '.productaddtowishlist', function(event) {  
             event.preventDefault();
            var size_id = $(this).data('size_id');
            var prid = $(this).data('prid');
             var id=prid;
            var product_id = $(this).data('product_id');
            var qty = 1;

          var baseUrl = '<?php echo base_url(); ?>';
            $.ajax({
               url: baseUrl + "ajax/add_towishlist",
               type: "POST",
               data: {
                  'size_id': size_id,
                  'prid': prid,
                  'product_id': product_id ,
                  'qty':qty,
               },
               dataType: "json",
               success: function(data) {
                      if(data.msg=='true'){
                 	     $("#"+id+"").removeClass('fa fa-heart-o');
                         $("#"+id+"").addClass('fa fa-heart');
                        swal({
							  title: "Great",
							  text: "Added to  wishlist",
							  icon: "success",
							  button: "Okay",
							}); 
                        }else if(data.msg='false'){
                 	     $("#"+id+"").removeClass('fa fa-heart');
                        
                 	     $("#"+id+"").addClass('fa fa-heart-o');
                         
                         // $(this);
                        // $(this).removeClass('fa fa-heart')
                         swal({
							  title: "Great",
							  text: "Removed From wishlist",
							  icon: "success",
							  button: "Okay",
							});
                       
                        }
                        $("#totalwish").html(data.count); 
                        
           }
            });
       });

    
    // signup
 $('#sign_user_email').focusout(function() {
        var mailValue = $(this).val();            
        if ((mailValue == '') || (!isEmail($('#sign_user_email').val()))) {
            $('#sign_user_email').addClass('has-error');
            $('#sign_user_email_error').show().text('Please enter a valid email address');
        } else if ((mailValue != '') && (isEmail($('#sign_user_email').val()))) {
            $('#email').removeClass('has-error');
            $('#sign_user_email_error').hide().text('');
        }
    });
    
    $('#sign_user_name').focusout(function() {
        var usernameValue = $(this).val();
        if (usernameValue == '') {
            $('#sign_user_name').addClass('has-error');
            $('#sign_user_name_error').show().text('Please enter a Username ');
        } else if (usernameValue != '') {
            $('#sign_user_name_error').removeClass('has-error');
            $('#sign_user_name_error').hide().text('');
        }
    });
   
   

    
     $(' #sign_user_password').focusout(function() {
        var passwordValue = $(this).val();
        if (passwordValue == '') {
            $(' #sign_user_password').addClass('has-error');
            $(' #sign_user_password_error').show().text('Password empty or invalid');
        } else if (passwordValue.length < 6) {
            $(' #sign_user_password').addClass('has-error');
            $(' #sign_user_password_error').show().text('Password must be at least 6 characters');
        } else if (passwordValue != '') {
            $(' #sign_user_password').removeClass('has-error');
            $(' #sign_user_password_error').hide().text('');
        }
    });


    


     $("#sign_up_form").submit(function(e){
        e.preventDefault();
         
          $('#sign_user_name').trigger("focusout");
          $('#sign_user_email').trigger("focusout");
          $('#sign_user_password').trigger("focusout");
          
          var name= $("#sign_user_name").val()
          var email=    $("#sign_user_email").val()
          var pass1= $("#sign_user_password").val()
        
           if((name != '') && 
             (email != '') && (isEmail(email)) && (pass1.length >= 6) && (pass1!='')  ) 
          {
            signup();

          }
          

     })
     function signup(argument) {
         var name= $("#sign_user_name").val()
          var email=    $("#sign_user_email").val()
          
          var password= $("#sign_user_password").val()
          
         $.ajax({
             url:'<?php echo base_url() ?>/registerAccount',
             method:'POST',
             dataType:'json',
             data:{
                name:name,
                email:email,
                password:password
                
             },
             success:function(res){
              // alert(res.error);
              if(res.error=="register"){
               window.location.href='<?php echo base_url() ?>';
              }else if(res.error=="something"){
                $("#sign_error").html('Something Went wrong please try again later');
              }else if(res.error=="email_already"){
              $("#sign_error").html('Email alredy exits');
              }
             }
          })
     }
     // login
     $('#login_user_email').focusout(function() {
        var mailValue = $(this).val();            
        if ((mailValue == '') || (!isEmail($('#login_user_email').val()))) {
            $('#login_user_email').addClass('has-error');
            $('#login_user_email_error').show().text('Please enter a valid email address');
        } else if ((mailValue != '') && (isEmail($('#login_user_email').val()))) {
            $('#email').removeClass('has-error');
            $('#login_user_email_error').hide().text('');
        }
    });

      $(' #login_user_password').focusout(function() {
        var passwordValue = $(this).val();
        if (passwordValue == '') {
            $(' #login_user_password').addClass('has-error');
            $(' #login_user_password_error').show().text('Password empty or invalid');
        }  else if (passwordValue != '') {
            $(' #login_user_password').removeClass('has-error');
            $(' #login_user_password_error').hide().text('');
        }
    });

    

     $("#login_form").submit(function(e){
        e.preventDefault();
        var email=    $("#login_user_email").val()
        var password= $("#login_user_password").val()
         $("#login_user_email").trigger('focusout');
         $("#login_user_password").trigger('focusout');
         if((email != '') && (isEmail(email))  && (password!='')){
         	$.ajax({
             url:'<?php echo base_url() ?>/loginAccount',
             method:'POST',
             dataType:'json',
             data:{
                email:email,
                password:password
             },
             success:function(res){
             	// console.log(res);
             	// return;
             	JSON.stringify(res);
             	
             	
             console.log(res.responseData);console.log(res.responsePassword);
             if(res['responseData']=='logged in successfully'){
             location.reload();
             }
              	
              if(res.responseData=='Email id not registered'){
              	$('#login_user_email_error').show().text('Email id not registered');
              	
              }
               if(res.responsePassword=='Invalid password'){
               	$('#login_user_email_error').show().text('Invalid password');
              	
              }
             }
          })

         }


          
          

     })




     // forgot password
     $("#forgot_form").submit(function(e){
     	e.preventDefault();
          var email=$("#forgot_user_email").val()
          $.ajax({
             url:'<?php echo base_url() ?>/forgotPassword',
             method:'POST',
             dataType:'json',
             data:{
             	email:email
             },
             success:function(res){
              JSON.stringify(res);
              $("#forgot_response").html(res.responseData)
               } 
           });
      })
    
    // newsletter subscribe
$("#newsletter").submit(function(e){
     	e.preventDefault();
          var email=$("#email").val();
          console.log(email);
          $.ajax(
{             url:'<?php echo base_url() ?>/add_subscribe',
             method:'POST',
             dataType:'json',
             data:{
             	email:email
             },
             success:function(res){
              JSON.stringify(res);
              console.log(res); 
           }
      })
 })


       </script>
	</body>
</html>