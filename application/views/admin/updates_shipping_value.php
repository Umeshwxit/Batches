            <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Update Shipping Amount</h3>
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
                                <form action="<?php echo base_url(); ?>Sitesetting/updates_shipping" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $update->id; ?>">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Shipping Amount</label>
                                        <input type="text" class="form-control" placeholder="Shipping Amount" value="<?php echo $update->shipping_value; ?>" name="shipping_value" >
                                         <span style="color:red;"><?php echo form_error('shipping_value'); ?></span>
                                    </div> 
                                    
                                    <input type="submit" value="Update" name="" class="mt-4 mb-4 btn btn-button-7">
                               
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

   

