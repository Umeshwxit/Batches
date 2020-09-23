<div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Add Color</h3>
                        </div>
               
                    </div>
                </div>
          <?php if($this->session->flashdata('error')){?>
                      <div class="alert alert-danger mb-4" role="alert"> <i class="flaticon-cancel-12 close" data-dismiss="alert"></i> <strong>Error!</strong>  <?php  echo $this->session->flashdata('msg');?></div>

                <?php  }            ?>


 <div class="row">

              
   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            
                            <div class="widget-content widget-content-area">
                                <form action="<?php echo base_url(); ?>color/insert" method="POST">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Color Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Color Title (en)*" value="" name="color_name" >
                                         <span style="color:red;"><?php echo form_error('color_name'); ?></span>
                                    </div> 
                                    <!--<div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Color Title (ar)</label>-->
                                    <!--    <input type="text"  class="form-control arabictxt" placeholder="Enter Color Title (ar)" name="ar_color_name" value="" style="text-align: right;" >-->
                                    <!--     <span style="color:red;"><?php echo form_error('ar_color_name'); ?></span>-->
                                    <!--</div>  -->
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Color Value</label>
                                        <input type="color" class="form-control" placeholder="Enter Name" name="color_value" value="" >
                                         <span style="color:red;"><?php echo form_error('color_value'); ?></span>
                                    </div>   
                                    <input type="submit" value="Save" name="" class="mt-4 mb-4 btn btn-button-7">
                               
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

   

