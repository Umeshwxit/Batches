<div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Add Size
</h3>
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
                                <form action="<?php echo base_url(); ?>size/insert" method="POST">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Category</label><select class="form-control" id="cat_name" name="cat_name">
                                             <option value="">Select Category</option>
                                         <?php foreach($list as $d){ ?>
                                        <option value="<?php echo $d->category_id; ?>"><?php echo $d->category_name; ?></option>
                                        <?php } ?>
                                         </select>
                                         <span style="color:red;"><?php echo form_error('name'); ?></span>
                                    </div> 
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Sub Category</label>
                                         <select name="subcat_name" id="subcat_name" class="form-control input2" required>
                                        
                                    </select>
                                         <span style="color:red;"><?php echo form_error('email'); ?></span>
                                    </div>  
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Size Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="size_name" value="">
                                         <span style="color:red;">
                                            <?php echo form_error('size_name'); ?>
                                                
                                            </span>
                                    </div>   
                                    <!--<div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlTextarea1">Size Title (ar)</label>-->
                                    <!--    <input type="text" class="form-control arabictxt" placeholder="Size Title ar" name="ar_size_name"  style="text-align: right;">-->
                                    <!--     <span style="color:red;"><?php echo form_error('ar_size_name'); ?></span>-->
                                    <!--</div> -->
                                    
                                    <input type="submit" value="Add " name="" class="mt-4 mb-4 btn btn-button-7">
                               
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#cat_name").change(function(){
var cat_name = $("#cat_name").val();
$.post("<?php echo base_url(); ?>ajax/find_subcat",
{
cat_name:cat_name,
},
function(data,status){
$("#subcat_name").html(data);
//alert(data);
});
});
});
</script>

   

