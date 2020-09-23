        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Edit Category</h3>
                        </div>
                      
                    </div>
                </div>
 <div class="row">              
   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <form action="<?php echo base_url() ?>subcategory/update/<?php echo $row->subcategory_id ?>" method="post" enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Category</label>
                                        <select class="form-control" name="catid">
                                            <option value="0">Select Category</option>

                                            <?php foreach ($list as $each_cat) {?>
                                            <option value="<?php echo $each_cat->category_id ?>" <?php if($each_cat->category_id==$row->subcategory_catid){echo "selected";} ?>

                                                ><?php echo $each_cat->category_name ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Sub-Category Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Sub-Category Title" name="enname"  value="<?php echo $row->subcategory_name ?>">
                                        <?php echo form_error('enname'); ?>
                                    </div> 
                                    <!-- <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Sub-Category Title (ar)</label>-->
                                    <!--    <input type="text" class="form-control arabictxt" placeholder="Enter Sub-Category Title" name="arname" value="<?php echo $row->ar_subcategory_name ?>" style="text-align: right;">-->
                                    <!--    <?php echo form_error('arname'); ?>-->
                                    <!--</div>   -->

                            <!--<div class="form-group mb-4">-->
                            <!--<label for="exampleFormControlInput1">Commission Type</label>-->
                            <!--<select class="form-control" name="c_type">-->
                            <!--<option value="">Commission Type</option>-->
                            <!--<option <?php if($row->commision_type=='percent'){echo "selected";} ?> value="percent">percent</option>-->
                            <!--<option  <?php if($row->commision_type=='flat'){echo "selected";} ?>  value="flat">flat</option>-->

                            <!--</select>-->
                            <!--</div>-->

                            <!--            <div class="form-group mb-4">-->
                            <!--            <label for="exampleFormControlInput1">Commission Value</label>-->
                            <!--            <input type="text" class="form-control" placeholder="Commission Value" name="c_value" value="<?php echo $row->commision_value ?>" style="text-align: right;">-->
                            <!--            <?php echo form_error('c_value'); ?>-->
                            <!--            </div>                                  -->
                                    <input type="submit" value="Update" name="Update" class="mt-4 mb-4 btn btn-button-7">
                                </form>
                            </div>
                        </div>
                    </div>
                 </div> 
            </div>
        </div>
    </div>
    <!-- END MAIN CONTAINER -->

   