<?php include 'header.php';  ?>

<style type="text/css">
	.shipping-adress-form input,.coupon input{width: 100%;margin-bottom: 20px !important	;}
	.method-card input{width: auto;margin-right: 10px;}
	.contact-content{padding: 80px 0px;}
	.shipping-adress-form label{display: block;}
	.select2 {width: 100% !important;}
	.coupon {margin-top: 20px;}
	.coupon input {padding: 10px 20px !important}

	.shipping-adress-page-content h4{width: 100%;
margin-top: 20px;
margin-bottom: 20px;
padding-bottom: 15px;
border-bottom: 1px solid #d4d4d4;}
</style>


<section class="contact-content">

	 	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="separator">Checkout</h2>
				</div>
			</div>
		</div>

		<section class="shipping-adress-page-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-6">
						<h4>Shipping Adress</h4>
						<form action="#" class="shipping-adress-form" id="">
<h5 id="checkout_error" class="text-center text-danger"></h5>
							<div class="row">
								<div class="col-md-6">
								
									<input type="hidden" name="" id="coupon_code_value">
									<input type="hidden" name="" id="ctotal" value="<?php echo $total ?>">
									<label for="firstName">First Name</label>
									<input  value="<?php if(!empty($this->session->userdata('cid'))){ 
										echo $this->session->userdata('cust_fname'); } ?>" type="text" id="fname" placeholder="First Name">
									<span class="text-danger font-weight-bold" id="fname_error"></span>
								</div>
								<div class="col-md-6">
									<label for="lastName">Last Name</label>
									<input
									value="<?php if(!empty($this->session->userdata('cid'))){ 
										echo $this->session->userdata('cust_lname'); } ?>" type="text" id="lname" placeholder="Last Name">
									<span class="text-danger font-weight-bold" id="lname_error"></span>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<label for="email">Email Address</label>
									<input value="<?php if(!empty($this->session->userdata('cid'))){ 
										echo $this->session->userdata('cust_email'); } ?>" type="email" id="email" placeholder="Email Address" >
									<span class="text-danger font-weight-bold" id="emailError"></span>
								</div>
								<div class="col-md-6">
									<label for="number">Phone Number</label>
									<input value="<?php if(!empty($this->session->userdata('cid'))){ 
										echo $this->session->userdata('cust_phone'); } ?>" type="text" id="phone" class="mobile-numb" placeholder="Phone Number" >
									<span class="text-danger font-weight-bold" id="phone_error"></span>
								</div>
							</div>

							<label for="street">Street Adress</label>
							<input value="<?php if(!empty($this->session->userdata('cid'))){ 
										echo $this->session->userdata('street'); } ?>" type="text" id="street" placeholder="Street Adress" >
							<span class="text-danger font-weight-bold" id="street_error"></span>

							<div class="row">
								<div class="col-md-6">
									<label for="city">City</label>
									<input value="<?php if(!empty($this->session->userdata('cid'))){ 
										echo $this->session->userdata('city'); } ?>" type="text" id="city" placeholder="City" >
									<span class="text-danger font-weight-bold" id="city_error"></span>
								</div>
								<div class="col-md-6">
									<label for="postalCode">Zip / Postal Code</label>
									<input value="<?php if(!empty($this->session->userdata('cid'))){ 
										echo $this->session->userdata('zip'); } ?>" type="text" id="zip_code" placeholder="12345" >
									<span class="text-danger font-weight-bold" id="zip_code_error"></span>
								</div>
							</div>							

							<div class="row">
								<div class="col-md-6">
									<label for="country">Country</label>
									<select name="country" class="select" id="country">
										<option value="0" disabled selected>Country</option>
										<option value="1">USA</option>
										<option value="2">France</option>
										<option value="3">Germany</option>
									</select>
									<span class="text-danger font-weight-bold" id="country_error"></span>
								</div>
								<div class="col-md-6">
									<label for="state">State / Povince</label>
									<select name="state" class="select" id="state">
										<option value="0" disabled selected>Please select a region, state or provance</option>
										<option value="1">Alabama</option>
										<option value="2">Alaska</option>
										<option value="3">Arizona</option>
									</select>
									<span class="text-danger font-weight-bold" id="state_error"></span>
								</div>
							</div>



							<div class=" "> 
						<section class="check-form method-card">
							<label for="checkAdress">
								<input type="checkbox" name="check-adress" id="checkAdress" >My billing and shipping address are the different.
							</label>
						</section>
						<section  class="reinit-form" style="display: none;">
							<h4>Billing Adress</h4>
							<div class="check-false">
								 <label for="street">Street Adress</label>
							<input type="text" id="street2" placeholder="Street Adress" >
							<span class="text-danger font-weight-bold" id="street2_error"></span>

							<div class="row">
								<div class="col-md-6">
									<label for="city">City</label>
									<input type="text" id="city2" placeholder="City" >
									<span class="text-danger font-weight-bold" id="city2_error"></span>
								</div>
								<div class="col-md-6">
									<label for="postalCode">Zip / Postal Code</label>
									<input type="text" id="zip_code2" placeholder="12345" >
									<span class="text-danger font-weight-bold" id="zip_code2_error"></span>
								</div>
							</div>							

							<div class="row">
								<div class="col-md-6">
									<label for="country">Country</label>
									<select name="country" class="select" id="country2">
										<option value="0" disabled selected>Country</option>
										<option value="1">USA</option>
										<option value="2">France</option>
										<option value="3">Germany</option>
									</select>
									<span class="text-danger font-weight-bold" id="country2_error"></span>
								</div>
								<div class="col-md-6">
									<label for="state">State / Povince</label>
									<select name="state" class="select" id="state2">
										<option value="0" disabled selected>Please select a region, state or provance</option>
										<option value="1">Alabama</option>
										<option value="2">Alaska</option>
										<option value="3">Arizona</option>
									</select>
									<span class="text-danger font-weight-bold" id="state2_error"></span>
								</div>
							</div>
							</div> 
						</section>
					</div>
				    <?php if(empty($this->session->userdata('cid'))){ ?>
                   <section class="check-form method-card">
							<label for="createAccount">
								<input type="checkbox" name="check-adress" id="createAccount" >Create an account.
							</label>
						</section>
					<section class="account-form" style="display: none;">
						<h4></h4>
						<div class="row">
								<div class="col-md-6">
									<label for="pass1">Password</label>
									<input type="password" id="pass1" placeholder="Enter Password" >
									<span class="text-danger font-weight-bold" id="pass1_error"></span>
								</div>
								<div class="col-md-6">
									<label for="pass2">Confirm Password</label>
									<input type="password" id="pass2" placeholder="Confirm Password">
									<span class="text-danger font-weight-bold" id="pass2_error"></span>
								</div>
							</div>
					 </section>
				<?php } ?>
							<div class="ship-method">
								<h4>Shipping Methods</h4>
								<div class="method-card">
									<p class="bold">Select method</p>
									<label for="method1">
										<input type="radio" name="method" id="method1" checked value="cod">
										Cash on Delivery
									</label>
									<label for="method2">
										<input type="radio" name="method" id="method2" checked value="online">
										Online Payment
									</label> 
								</div> 
							</div>
							<div class="ship-submit">
								<button type="submit" id="submit_btn">Place Order</button>
							</div>
						</form>
					</div>
					<div class="col-sm-5 col-md-5 col-md-offset-0 col-lg-4 col-lg-offset-1">
						<div class="order-summary">
							<p class="h3">order summary</p>
							<div class="summury-price">					
								<p class="bold summury-accordeon">1 item in cart <span><i class="fa fa-angle-down" aria-hidden="true"></i></span></p>
								<div class="summury-accordeon-body">
								<?php foreach($cart_details as $each_cart ){ ?>
									<div class="summury-item-card">
										<img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $each_cart['ps_image']; ?>" style="width:50px;height: 50px" alt="card">
										<div class="card-desc">
											<p class="h4"><?php echo $each_cart['product_title'] ?></p>
											<p>$ <?php echo $each_cart['cart_price']; ?></p>
											<p class="summury-quantity">Quantity: <span><?php echo $each_cart['cart_qty']; ?></span></p>
										</div>
									</div>
								<?php } ?>
									
								</div>
								<div class="coupon">
								<p id="coupon_response" class="font-weight-bold">
									
								</p>
									<form id="apply_coupon">
                                            <input type="text" placeholder="Enter discount code" id="coupon_code" >
                                            <input type="hidden" id="total" value="<?php echo $total; ?>">
                                            <input type="submit" class="button white" value="apply discount">
											
                                            </form>

								</div>
								<button id="remove_coupon" style="display: none">remove coupon</button>

								<hr style="border-top: 1px solid #bbb">
								<p class="bold">subtotal <span>$ <span id="subtotal"><?php echo $total ?></span> 
									
								</span></p>
								<p class="bold" id="shipping_charge">shipping <span >$<?php echo $shipping; ?></span></p> 
								<hr style="border-top: 1px solid #bbb">
								<p class="bold summury-all-price">order total  $<span id="order_total"><?php echo $total; ?></span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END SECTION SHIPPING ADRESS -->

</section>

<?php include 'footer.php';  ?>
<script type="text/javascript">
	$(document).ready(function (argument) {
	 if(localStorage.getItem('coupon_code')!=''){
	 	$("#coupon_code").val(localStorage.getItem('coupon_code'));
	 	
	 	$("#apply_coupon").trigger('submit');
	 }
	})

function createAccount(){$("#createAccount").on("click",
	function(){1!=$("#createAccount").prop("checked")
	?($(".account-form").hide(),$(".check-true").show())
	:($(".account-form").show(),$(".check-true").hide())
})}
createAccount();
	// apply_coupon
 // manage coupon 
$("#apply_coupon").submit(function(e){
   e.preventDefault();
var coupon_code=$("#coupon_code").val();
var total=$("#total").val();

$.ajax({
    url:"<?php echo(base_url())?>apply_coupon",
    method:"POST",
    data:{
         coupon_code:coupon_code,
         total:total
    },
    dataType:'JSON',
    success:function (response) {
             // total=toFixed(response.total,3);
     var total= response.total;
     $(".totalvaluee").html(total); 
     $("#cart_total_header").html('$'+total);
      $("#total").val(total);
      $("#ctotal").val(total);
      $("#coupon_code_value").val(coupon_code);
      $("#subtotal").html(total);
      $("#order_total").html(total);
      if(response.message=='Coupon Applied'){
         localStorage.setItem('coupon_code',coupon_code);
         coupon=localStorage.getItem('coupon_code');
         
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
    $("#coupon_code_value").val('');
   
    $(".totalvaluee").html(total); 
   
    
      $("#total").val(total);
       $(".totalvaluee").html(total); 
     $("#cart_total_header").html('$'+total);
      $("#ctotal").val(total);
      $("#subtotal").html(total);
      $("#order_total").html(total);
      $("#apply_coupon").css('display','block');
      $("#remove_coupon").css('display','none');

})

})


   function isEmail(emailid) {
      var pattern = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
      return pattern.test(emailid);
    }


    $('#email').focusout(function() {
        var mailValue = $(this).val();            
        if ((mailValue == '') || (!isEmail($('#email').val()))) {
            $('#email').addClass('has-error');
            $('#emailError').show().text('Please enter a valid email address');
        } else if ((mailValue != '') && (isEmail($('#email').val()))) {
            $('#email').removeClass('has-error');
            $('#emailError').hide().text('');
        }
    });
    
    $('#fname').focusout(function() {
        var usernameValue = $(this).val();
        if (usernameValue == '') {
            $('#fname').addClass('has-error');
            $('#fname_error').show().text('Please enter a first name');
        } else if (usernameValue != '') {
            $('#fname').removeClass('has-error');
            $('#fname_error').hide().text('');
        }
    });
   
    $('#lname').focusout(function() {
        var usernameValue = $(this).val();
        if (usernameValue == '') {
            $('#lname').addClass('has-error');
            $('#lname_error').show().text('Please enter a last name');
        } else if (usernameValue != '') {
            $('#lname').removeClass('has-error');
            $('#lname_error').hide().text('');
        }
    });

    $('#phone').focusout(function() {
        var phone = $(this).val();
        if (phone == '') {
            $('#phone').addClass('has-error');
            $('#phone_error').show().text('Please enter a mobile number');
        } else if (phone.length < 6) {
            $('#phone').addClass('has-error');
            $('#phone_error').show().text('mobile no. must be at least 10 characters'); 
             }
             else if (phone.length > 10) {
            $('#phone').addClass('has-error');
            $('#phone_error').show().text('mobile no. must be maximun 10 characters'); 
             }
              else if ($.type(phone)=='number') {
            $('#phone').addClass('has-error');
            $('#phone_error').show().text('only number allowed'); 
             }
        else if (phone != '') {
            $('#phone').removeClass('has-error');
            $('#phone_error').hide().text('');
        }
    });

    $('#street').focusout(function() {
        var street = $(this).val();
        if (street == '') {
            $('#street').addClass('has-error');
            $('#street_error').show().text('Please enter Street name');
        } else if (street != '') {
            $('#street').removeClass('has-error');
            $('#street_error').hide().text('');
        }
    });

     $('#city').focusout(function() {
        var city = $(this).val();
        if (city == '') {
            $('#city').addClass('has-error');
            $('#city_error').show().text('Please enter city name');
        } else if (city != '') {
            $('#city').removeClass('has-error');
            $('#city_error').hide().text('');
        }
    });

      $('#zip_code').focusout(function() {
        var zip_code = $(this).val();
        if (zip_code == '') {
            $('#zip_code').addClass('has-error');
            $('#zip_code_error').show().text('Please enter Zip code ');
        } else if (zip_code != '') {
            $('#zip_code').removeClass('has-error');
            $('#zip_code_error').hide().text('');
        }
    });
    
     $('#street2').focusout(function() {
        var street2 = $(this).val();
        if (street2 == '') {
            $('#street2').addClass('has-error');
            $('#street2_error').show().text('Please enter Street name');
        } else if (street2 != '') {
            $('#street2').removeClass('has-error');
            $('#street2_error').hide().text('');
        }
    });

     $('#city2').focusout(function() {
        var city2 = $(this).val();
        if (city2 == '') {
            $('#city2').addClass('has-error');
            $('#city2_error').show().text('Please enter city name');
        } else if (city2 != '') {
            $('#city2').removeClass('has-error');
            $('#city2_error').hide().text('');
        }
    });

      $('#zip_code2').focusout(function() {
        var zip_code2 = $(this).val();
        if (zip_code2 == '') {
            $('#zip_code2').addClass('has-error');
            $('#zip_code2_error').show().text('Please enter Zip code ');
        } else if (zip_code2 != '') {
            $('#zip_code2').removeClass('has-error');
            $('#zip_code2_error').hide().text('');
        }
    });
   
       $('#country').focusout(function() {
        var country = $(this).val();
        if (country == null) {
            $('#country').addClass('has-error');
            $('#country_error').show().text('Please select country ');
        } else if (country !=null) {
            $('#country').removeClass('has-error');
            $('#country_error').hide().text('');
        }
    });

 $('#state').focusout(function() {
        var state = $(this).val();
        if (state == null) {
            $('#state').addClass('has-error');
            $('#state_error').show().text('Please select state ');
        } else if (state !=null) {
            $('#state').removeClass('has-error');
            $('#state_error').hide().text('');
        }
    });

$('#country2').focusout(function() {
        var country2 = $(this).val();
        if (country2 == null) {
            $('#country2').addClass('has-error');
            $('#country2_error').show().text('Please select country ');
        } else if (country != null) {
            $('#country2').removeClass('has-error');
            $('#country2_error').hide().text('');
        }
    });

 $('#state2').focusout(function() {
        var state2 = $(this).val();
        if (state2 == null) {
            $('#state2').addClass('has-error');
            $('#state2_error').show().text('Please select state ');
        } else if (state2 != null) {
            $('#state2').removeClass('has-error');
            $('#state2_error').hide().text('');
        }
    });

   $(' #pass1').focusout(function() {
        var passwordValue = $(this).val();
        if (passwordValue == '') {
            $(' #pass1').addClass('has-error');
            $(' #pass1_error').show().text('Password empty or invalid');
        } else if (passwordValue.length < 6) {
            $(' #pass1').addClass('has-error');
            $(' #pass1_error').show().text('Password must be at least 6 characters');
        } else if (passwordValue != '') {
            $(' #pass1').removeClass('has-error');
            $(' #pass1_error').hide().text('');
        }
    });


    $('#pass2').focusout(function() {
        var passwordValue = $('#paa1').val();  
        var conpasswordValue = $(this).val();
        if (conpasswordValue == '') {
            $('#pass2').addClass('has-error');
            $('#pass2_error').show().text('Confirm Password empty or invalid');
        }
        else if (conpasswordValue != '') {
            $('#pass2').removeClass('has-error');
            $('#pass2_error').hide().text('');
        } 
        else if (conpasswordValue.length < 6) {
            $('#pass2').addClass('has-error');
            $('#pass2_error').show().text('Confirm Password must be at least 6 characters');
        } else if (conpasswordValue != passwordValue) {
            $('#pass2').addClass('has-error');
            $('#pass2_error').show().text('Your password and confirmation password do not match');
        } 
    });


      $("#submit_btn").on('click',function (e) {
      	e.preventDefault();
      	$('#email').trigger("focusout");
      	$("#fname").trigger("focusout");
      	$("#lname").trigger("focusout");
      	$("#phone").trigger("focusout");
      	$("#street").trigger('focusout');
      	$("#city").trigger('focusout');
      	$("#zip_code").trigger('focusout');
      	$("#country").trigger('focusout');
      	$("#state").trigger('focusout');
      	if($("#checkAdress").prop("checked") == true){
      		     var different_billing=true;
      		     // biilig details
				 var street2=$("#street2").val();
				 var city2=$("#city2").val();
				 var zip_code2=$("#zip_code2").val();
				 var state2=$("#state2").val();
				 var country2=$("#country2").val();
                $("#street2").trigger('focusout');
      	        $("#city2").trigger('focusout');
      	        $("#zip_code2").trigger('focusout');
            }else{
            	 var street2='';
				 var city2='';
				 var zip_code2='';
				 var state2='';
				 var country2='';
                 var different_billing=false;
            }
        if($("#createAccount").prop("checked") == true){
      		    var createAccount=true;
      		    var pass1=$("#pass1").val();
			    var pass2=$("#pass2").val();
                $("#pass1").trigger('focusout');
      	        $("#pass2").trigger('focusout');
      	        
            }else{
            	 var createAccount=false;
            	 var pass1='';
			     var pass2='';
            }
             // shipping_details
			 var fname=$("#fname").val();
			 var lname=$("#lname").val();
			 var email=$("#email").val();
			 var street=$("#street").val();
			 var phone=$("#phone").val();
			 
			 var city=$("#city").val();
			 var zip_code=$("#zip_code").val();
			 var state=$("#state").val();
			 var country=$("#country").val();
			 
			
			// account_details
			 
            

          if((fname != '') && (lname != '')  && (phone != '')  &&
             (email != '') && (isEmail($("#email").val())) && (createAccount==false) &&
             (different_billing==false)&& (state!=null) && (city!=null) ) 
          {
            checkout();

          }else if((fname != '') && (lname != '')  && (phone != '')  &&
             (email != '') && (isEmail($("#email").val())) && (createAccount==true) &&
             (different_billing==false) && (state!=null) && (city!=null) )
         {
          if((pass1.length >= 6) && (pass1!='') && (pass2!='') && (pass1==pass2))
          {
          	 checkout();
          }

         }else if((fname != '') && (lname != '')  && (phone != '')  &&
             (email != '') && (isEmail($("#email").val())) && (createAccount==false) &&
             (different_billing==true) && (state!=null) && (city!=null)){
         if((street2!='') && (zip_code2!='') && (state2!=null) && (city2!=null) ){
         	checkout();
         }


         }else if((fname != '') && (lname != '')  && (phone != '') &&
             (email != '') && (isEmail($("#email").val())) && (createAccount==true) &&
             (different_billing==true) && (state!=null) && (city!=null)){
            if((pass1.length >= 6) && (pass1!='') && (pass2!='') && (pass1==pass2) && (street2!='') && (zip_code2!='') && (state2!=null) && (city2!=null)){
            	checkout();
            }

         }

            
          
        function checkout() {
        	if($("#checkAdress").prop("checked") == true){
      		     var different_billing=true;
      		     // biilig details
				 var street2=$("#street2").val();
				 var city2=$("#city2").val();
				 var zip_code2=$("#zip_code2").val();
				 var state2=$("#state2").val();
				 var country2=$("#country2").val();
                
            }else{
            	 var street2='';
				 var city2='';
				 var zip_code2='';
				 var state2='';
				 var country2='';
                 var different_billing=false;
            }
        if($("#createAccount").prop("checked") ==true){
      		    var createAccount=true;
      		    var pass1=$("#pass1").val();
			    var pass2=$("#pass2").val();
               
      	        
            }else{
            	 var createAccount=false;
            	 var pass1='';
			     var pass2='';
            }
             // shipping_details
			 var fname=$("#fname").val();
			 var lname=$("#lname").val();
			 var email=$("#email").val();
			 var street=$("#street").val();
			 var phone=$("#phone").val();
			 
			 var city=$("#city").val();
			 var zip_code=$("#zip_code").val();
			 var state=$("#state").val();
			 var country=$("#country").val();
			 var coupon_code_value=$("#coupon_code_value").val();
			 var total=$("#ctotal").val();
			
			 $.ajax({
			 	url:"<?php echo base_url() ?>ajax/new_checkout",
			 	method:"POST",
			 	dataType:'JSON',
			 	data:{
                  firstname:fname,
                  lastname:lname,
                  email:email,
                  password:pass1,
                  street:street,
                  country:country,
                  city:city,
                  zipcode:zip_code,
                  mobile_number:phone,
                  state:state,
                  state2:state2,
                  coupon_code:coupon_code_value,
                  street2:street2,
                  country2:country2,
                  city2:city2,
                  zipcode2:zip_code2,
                  createAccount:createAccount,
                  different_billing:different_billing,
                  total:total
              },
			 	// beforeSend:function(){
			 	// 	$("#submit_btn").attr('disabled','disabled');
			 	// },
			 	success:function (response) {
			 	  if(response.message=="Email already exits"){
			 	  	$("#checkout_error").html("Email already exits Please try different");
			 	  	$("#checkout_error").focus();

			 	  }	
			 	  if(response.message=='done'){
			 	  	$order_id=response.order_id;
			 	  	 localStorage.setItem("coupon_code",'');    
			 	  	window.location.href="<?php echo base_url('orders-summary') ?>/"+$order_id;


			 	  }		 	
			 	}
			    })

        	
        }
            
        
             
                
           
      })

    





</script>