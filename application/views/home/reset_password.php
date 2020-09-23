<?php $this->load->view('home/header') ?>

<style type="text/css">
	.resetPass{padding: 50px 0px;}
	.contact-form{padding-right: 0;border-right: none;}
</style>

	<div class="container resetPass">
		<h2 style="text-align: center;">Reset Password</h2>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<span id="update_password_response" class="text-capitalize font-weight-bold"></span> 
				<form  id="reset_form" class="contact-form"> 
					<label for="name">Password</label>
					<input type="password" id="new_password" placeholder="Enter New Password" required="">
					<input type="hidden" value="<?php echo $reset_token ?>" id="reset_token"> 
					<label for="name">Confirm Password</label>
					<input type="password" id="confirm_password" placeholder="Confirm New Password" required=""> 
					<button id="submit_btn" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>



<?php $this->load->view('home/footer') ?>
<script type="text/javascript">
	
		// update_password
		$("#reset_form").submit(function(e){
          e.preventDefault();
          confirm_password=$("#confirm_password").val();
          new_password=$("#new_password").val();
          reset_token=$("#reset_token").val();
          
          if(confirm_password!=new_password){
          	$("#update_password_response").html('New Password and Confirm password did not matched ')
          	$("#update_password_response").css('color','red')
          }else{
          	$.ajax({
          		url:'<?php echo base_url() ?>/renew_password',
          		method:'POST',
          		data:{
          			'new_password':new_password,
          			'reset_token':reset_token
          		},
          		dataType:'json',
          		success:function(response){

          			if(response.responseData==1){
          		      $("#update_password_response").html('Password has been updated succfully')
                       $("#update_password_response").css('color','green')		
          			}
          			if(response.responseData==0){
          				$("#update_password_response").html('Something went wrong please try again later')
          	            $("#update_password_response").css('color','red')
          			}
          			
          		}
          	})
          }

		});
	
</script>