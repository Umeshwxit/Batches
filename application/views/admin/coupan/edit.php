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
                                <form action="<?php echo base_url(); ?>coupan/updates" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $update->cup_id; ?>">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Coupon Title</label>
                                        <input type="text" class="form-control" placeholder="Coupon Title" value="<?php echo $update->cup_name; ?>" name="cup_name" >
                                         <span style="color:red;"><?php echo form_error('cup_name'); ?></span>
                                    </div> 
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Coupon Type</label>
                                        <?php  $coup=$update->cup_type; ?>
                                         <select name="cup_type"  class="form-control">
                                        <option value="">Select Coupon Type</option>
                                        <option <?php if($coup=='flat'){ ?>selected="selected" <?php } ?> value="flat">Flat Rate</option>
                                        <option <?php if($coup=='percent'){ ?>selected="selected" <?php } ?> value="percent">Percentage (%)</option>
                                    </select>
                                        <!-- <input type="text"  class="form-control" placeholder="Enter Email*" name="email" value="" required=""> -->
                                         <span style="color:red;"><?php echo form_error('cup_type'); ?></span>
                                    </div>  
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Coupon Value</label>
                                        <input type="text" class="form-control" placeholder="Coupon Value" name="cup_value" value="<?php echo $update->cup_value; ?>">
                                         <span style="color:red;"><?php echo form_error('cup_value'); ?></span>
                                    </div> 

                                      <div class="form-group mb-4">
                                        <label>Coupon Unlimited</label>
Yes <input type="radio" name="is_unlimited" <?php if($update->is_unlimited=='1'){echo "checked";} ?> value="on">
No <input type="radio" name="is_unlimited"  <?php if($update->is_unlimited=='0'){echo "checked";} ?>  value="off">
                                    </div> 
                                    <div class="form-group mb-4" id="coupan_qty_div">
                                        <label for="exampleFormControlTextarea1">Coupon Quantity</label>
                                        <input type="text" class="form-control" placeholder="Coupon Quantity" name="cup_qty" value="<?php echo $update->cup_qty; ?>">
                                         <span style="color:red;"><?php echo form_error('cup_qty'); ?></span>
                                    </div> 
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlTextarea1">Coupon Expiry</label>
                                        <input type="date" class="form-control" placeholder="Coupon Expiry" name="cup_expiry" value="<?php echo $update->cup_expiry; ?>">
                                         <span style="color:red;"><?php echo form_error('cup_expiry'); ?></span>
                                    </div>                                     
                                    <input type="submit" value="Update" name="" class="mt-4 mb-4 btn btn-button-7">                               
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<?php if($update->is_unlimited=='1'){ ?>
<script type="text/javascript">
      $(document).ready(function(){   
                 $("#coupan_qty_div").hide();  
    });

</script>
    <?php } ?>
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