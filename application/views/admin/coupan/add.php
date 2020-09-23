<div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Add Coupon</h3>
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
                                <form action="<?php echo base_url(); ?>coupan/insert" method="POST">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Coupon Title</label>
                                        <input type="text" class="form-control" placeholder="Coupon Title" value="" name="cup_name" >
                                         <span style="color:red;"><?php echo form_error('cup_name'); ?></span>
                                    </div> 
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Coupon Type</label>
                                         <select name="cup_type"  class="form-control">
                                        <option value="">Select Coupon Type</option>
                                        <option value="flat">Flat Rate</option>
                                        <option value="percent">Percentage (%)</option>
                                    </select>
                                        <!-- <input type="text"  class="form-control" placeholder="Enter Email*" name="email" value="" required=""> -->
                                         <span style="color:red;"><?php echo form_error('cup_type'); ?></span>
                                    </div>  
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Coupon Value</label>
                                        <input type="text" class="form-control" placeholder="Coupon Value" name="cup_value" value="">
                                         <span style="color:red;"><?php echo form_error('cup_value'); ?></span>
                                    </div>   
                                    <div class="form-group mb-4">
                                        <label>Coupon Unlimited</label>
                                        Yes <input type="radio" name="is_unlimited" value="on">
                                        No <input type="radio" name="is_unlimited" checked="" value="off">
                                    </div> 

                                    <div class="form-group mb-4" id="coupan_qty_div">
                                        <label for="exampleFormControlTextarea1">Coupon Quantity</label>
                                        <input type="text" class="form-control" placeholder="Coupon Quantity" name="cup_qty">
                                         <span style="color:red;"><?php echo form_error('cup_qty'); ?></span>
                                    </div> 
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlTextarea1">Coupon Expiry</label>
                                        <input type="date" class="form-control" placeholder="Coupon Expiry" name="cup_expiry">
                                         <span style="color:red;"><?php echo form_error('cup_expiry'); ?></span>
                                    </div> 
                                    
                                    <input type="submit" value="Add" name="" class="mt-4 mb-4 btn btn-button-7">
                               
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script>
    $(document).ready(function(){
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='is_unlimited']:checked").val();
            if(radioValue=='on'){
                 $("#coupan_qty_div").hide();
                
            }else{
                 $("#coupan_qty_div").show();

            }
        });
    });
</script>


   

