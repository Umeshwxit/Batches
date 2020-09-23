<?php include 'header.php';  ?>

<style type="text/css">
	.tabs-box .tabs{display: block;}
	.myAccountPage{padding:50px 0px;} 
     .cart-card .product-control-buttons{position: relative;bottom: -10px;}
</style>

<div class="myAccountPage">
<div class="container">
	<section class="row">
		<h2 style="text-align: center;">My Account</h2>
		<div class="col-md-4">
			<div class="tabs-box">
				<ul class="tabs">
			        <li class="active" rel="tab1"><p class="h3">Profile</p></li>
			        <li rel="tab2"><p class="h3">My Orders</p></li>
			        <li rel="tab3"><p class="h3">Billing Info</p></li>
			        <li rel="tab4"><p class="h3">Setting</p></li>
			    </ul>
			</div>
		</div>
		<div class="col-md-8">
			<div class="tabs-box">			    
			    <div class="tab_container">
			        <p class="tab_active tab_accordion h3" rel="tab1">Profile <i class="fa fa-angle-down" aria-hidden="true"></i></p>

			        <div id="tab1" class="tab_content">
			            <form id="update_profile_form" class="contact-form">
							<h3>Profile Details</h3>
							<span id="update_profile_response" class="text-capitalize font-weight-bold"></span> 
							<label for="name">User  Name</label>
							<input type="text" id="profile_name" placeholder="Name" required="" value="<?php echo $userdata->cust_name ?>">

                                   <label for="name">First  Name</label>
                                   <input type="text" id="fname" placeholder="First Name" required="" value="<?php echo $userdata->cust_fname ?>">

                                   <label for="name">Last  Name</label>
                                   <input type="text" id="lname" placeholder=" Last Name" required="" value="<?php echo $userdata->cust_lname ?>">

							<label for="email">E-mail</label>
							<input type="email" id="profile_email" placeholder="E-mail" readonly="" value="<?php echo $userdata->cust_email ?>">
							<label for="phone">Phone Number</label>
							<input type="text" id="profile_phone" placeholder="Phone Number" required="" value="<?php echo $userdata->cust_phone ?>" maxlength="10" minlength="10"> 
							<button type="submit">Save Changes</button>
						</form>
			        </div>
			        <!-- end #tab1 -->
			        <p class="tab_accordion h3" rel="tab3">Billing Information <i class="fa fa-angle-down" aria-hidden="true"></i></p>
			        <div id="tab3" class="tab_content">
			            <form id="address_form" class="contact-form">
							<h3>Billing Address</h3> 
							<span id="update_address_response" class="text-capitalize font-weight-bold"></span>
							<label for="name">Address Line 1</label>
							<input type="text" id="street" placeholder="Address Line 1" required="" value="<?php echo $userdata->street ?>">
							<label for="name">Address Line 2 ( optional )</label>
							<input type="text" id="city" placeholder="Address Line 1" required="" value="<?php echo $userdata->city ?>"> 
							<button type="submit">Save Changes</button>
						</form>
			        </div>
			        <!-- end #tab2 -->
			        <p class="tab_accordion h3" rel="tab2">My Orders<i class="fa fa-angle-down" aria-hidden="true"></i></p>
			        <div id="tab2" class="tab_content">
			             <div class="ordersList">
                             <!--  order looping start -->
                              <?php foreach ($order_list as $each_order) {
                                   ?>
                                  
                             
                              <div class="wrap-cart">
                                   <div class="cart-card">
                                        <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $each_order['ps_image']; ?>" style="width:50px;height: 50px" alt="card">
                                        <div class="cart-card-info">
                                             <div class="cart-card-name">
                                                  <p class="h4"><?php echo $each_order['product_title'] ?></p>
                                                  <p><span>sku: </span><?php echo $each_order['sku']; ?></p>
                                                  <p class="availability"><i class="fa fa-check" aria-hidden="true"></i>
                                                  <?php if($each_order['pcs_qty']>0){ ?>In Stock<?php }else{ ?>Out of stock <?php } ?></p>
                                             </div>
                                             <div class="cart-card-price">
                                                  <p class="once-price">$<?php echo $each_order['pcs_sale']; ?></p>
                                             </div>
                                             <div class="product-control-buttons">
                                                  <span>Order Status</span>
                                             </div>
                                             <div class="cart-card-quantity">
                                                   <a class="btn btn-primary" href="<?php echo base_url('orders-details') ?>/<?php echo $each_order['order_id']; ?>/<?php echo $each_order['order_product_id']; ?>">View Details</a>
                                             </div>
                                        </div>
                                        
                                   </div> 
                              </div>
                         <?php } ?>
              <!--  order looping end -->

                                 
                            </div> 
			        </div>
			        <!-- end #tab3 -->
			        <p class="tab_accordion h3" rel="tab3">Setting <i class="fa fa-angle-down" aria-hidden="true"></i></p>
			        <div id="tab4" class="tab_content">
			            <form id="update_password_form" class="contact-form">
							<h3>Account Setting</h3>
							<span id="update_password_response" class="text-capitalize font-weight-bold"></span> 
							<label for="name">Old Password</label>
							<input type="password" id="old_password" placeholder="Enter Old Password" required=""> 
							<label for="name">New Password</label>
							<input type="password" id="new_password" placeholder=" New Password" required=""> 
							<label for="name">Confirm Password</label>
							<input type="password" id="confirm_password" placeholder="Confirm New Password" required=""> 
							<button type="submit">Submit</button>
						</form>
			        </div>
			        <!-- end #tab4 -->
			    </div>
			</div>
		</div>
	</section>
</div>
</div>

<?php $this->load->view('home/footer') ?>

<script type="text/javascript">
	
     $(document).ready(function () {
		// update_password
		$("#update_password_form").submit(function(e){
          e.preventDefault();
          old_password=$("#old_password").val();
          new_password=$("#new_password").val();
          confirm_password=$("#confirm_password").val();
          
          if(confirm_password!=new_password){
          	$("#update_password_response").html('New Password and Confirm password did not matched ')
          	$("#update_password_response").css('color','red')
          }else{
          	$.ajax({
          		url:'<?php echo base_url() ?>/update_password',
          		method:'POST',
          		data:{
          			'old_password':old_password,
          			'new_password':new_password
          		},
          		dataType:'json',
          		success:function(response){
          			if(response.responseData==1){
          		      $("#update_password_response").html('Password has been updated succfully')
          	           $("#update_password_response").css('color','green')		
          			}else if(response.responseData==2){
          				$("#update_password_response").html('Old Password is Wrong')
          	            $("#update_password_response").css('color','red')
          			}else{
          				$("#update_password_response").html('Something went wrong please try again later')
          	            $("#update_password_response").css('color','red')
          			}
          			$("#update_password_response").fadeOut(5000)
          		}
          	})
          }

		})

		// update_profile
		$("#update_profile_form").submit(function(e){
          e.preventDefault();
          name=$("#profile_name").val();
           fname=$("#fname").val();
           lname=$("#lname").val();

          email=$("#profile_email").val();
          phone=$("#profile_phone").val();
          
          $.ajax({
          		url:'<?php echo base_url() ?>/update_profile',
          		method:'POST',
          		data:{
          			'name':name,
          			 'email':email,
          			 'phone':phone,
                          'fname':fname,
                          'lname':lname
          		},
          		
          		success:function(response){
          			if(response){
          		   
          		      $("#update_profile_response").html('Profile has been updated succfully')
          	           $("#update_profile_response").css('color','green')
                             $("#user_name").html(name);		
          			}else{
          				$("#update_profile_response").html('Something went wrong please try again later')
          	            $("#update_profile_response").css('color','red')
          			}
          			$("#update_profile_response").fadeOut(5000)
          		}
          	})
          

		})
      // update address
     
     $("#address_form").submit(function(e){
          e.preventDefault();
          city=$("#city").val();
          street=$("#street").val();
          $.ajax({
          		url:'<?php echo base_url() ?>/update_address',
          		method:'POST',
          		data:{
          			'street':street,
                     'city':city
          		},
          		
          		success:function(response){
          			if(response){
          		      
          		      $("#update_address_response").html('Address Has been updated succfully')
          	           $("#update_address_response").css('color','green')		
          			}else{
          				$("#update_address_response").html('Something went wrong please try again later')
          	            $("#update_address_response").css('color','red')
          			}
          			$("#update_address_response").fadeOut(5000)
          		}
          	})
          

		})
	});
</script>