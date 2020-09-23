<div id="content" class="main-content">

            <div class="container">

                <div class="page-header">

                    <div class="row">                    

                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">

                            <h3>Edit Footer info</h3>

                        </div>

                      

                    </div>

                </div>

 <div class="row">              

   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">

                        <div class="statbox widget box box-shadow">

                            <div class="widget-content widget-content-area">

 <?php if($this->session->flashdata('msg')){?>

                    <div class="alert alert-success mb-4" role="alert"> <i class="flaticon-cancel-12 close" data-dismiss="alert"></i> <strong>Success!</strong> <?php  echo $this->session->flashdata('msg');?>  </div>

                <?php  }            ?> 

            <!-- form start -->

            <form action="<?php echo base_url(); ?>Admin/footer_info_update" method="POST" enctype="multipart/form-data">

             <input type="hidden" name="id" value="<?php echo $update->id; ?>">

                <div class="form-group mb-4">

                    <label for="exampleFormControlInput1">Facebook </label>

                    <input type="text" class="form-control" placeholder="Enter Facebook" value="<?php echo $update->facebook; ?>" name="facebook" >

                     <span style="color:red;"><?php echo form_error('facebook'); ?></span>

                </div>

                

                 <div class="form-group mb-4">

                    <label for="exampleFormControlInput1">Twitter</label>

                    <input type="text" class="form-control" placeholder="Enter Twitter " value="<?php echo $update->twitter; ?>" name="twitter" >

                     <span style="color:red;"><?php echo form_error('twitter'); ?></span>

                </div>

                <div class="form-group mb-4">

                    <label for="exampleFormControlInput1">Instagram</label>

                    <input type="text" class="form-control" placeholder="Enter instagram" value="<?php echo $update->instagram;?>" name="instagram" >

                     <span style="color:red;"><?php echo form_error('instagram'); ?></span>

                </div>  
                
                         <div class="form-group mb-4">

                    <label for="exampleFormControlInput1">Youtube</label>

                    <input type="text" class="form-control" placeholder="Enter Youtube" value="<?php echo $update->g_plus;?>" name="g_plus" >

                     <span style="color:red;"><?php echo form_error('g_plus'); ?></span>

                </div>  
                

                <div class="form-group mb-4">

                    <label for="exampleFormControlInput1">Email</label>

                    <input type="text"class="form-control" placeholder="Enter  Email" value="<?php echo $update->email;?>" name="email" >

                     <span style="color:red;"><?php echo form_error('email'); ?></span>

                </div> 
                 <div class="form-group mb-4">

                    <label for="exampleFormControlInput1">address</label>

                    <input type="text"class="form-control" placeholder="Enter  address" value="<?php echo $update->address;?>" name="address" >

                     <span style="color:red;"><?php echo form_error('address'); ?></span>

                </div> 
                 <div class="form-group mb-4">

                    <label for="exampleFormControlInput1">Phone</label>

                    <input type="text"class="form-control" placeholder="Enter  phone" value="<?php echo $update->phone;?>" name="phone" >

                     <span style="color:red;"><?php echo form_error('phone'); ?></span>

                </div> 

                <!--<div class="form-group mb-4">-->

                <!--     <label for="exampleFormControlInput1">Header Logo</label>-->

                <!--     <input type="file" class="form-control" name="file" id="file">-->

                <!--     <img src="<?php echo base_url() ?>uploads/logo/<?php echo $update->logo; ?>" style="max-width: 30%;width: 100%;">-->

                <!--</div>-->

                <!--<div class="form-group mb-4">-->

                <!--     <label for="exampleFormControlInput1">Footer Logo</label>-->

                <!--     <input type="file" class="form-control" name="files" id="files">-->

                <!--     <img src="<?php echo base_url() ?>uploads/logo/<?php echo $update->footer_logo; ?>" style="max-width: 30%;width: 100%;">-->

                <!--</div>-->

      

      

                <button type="submit"  class="mt-4 mb-4 btn btn-button-7">Update</button>

             

            </form>

                  

                            </div>

                        </div>

                    </div>

                 </div> 

            </div>

        </div>

    </div>

