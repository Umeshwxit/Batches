        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Edit Slider</h3>
                        </div>
                      
                    </div>
                </div>
 <div class="row">              
   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <form action="<?php echo base_url() ?>slider/update/<?php echo $row->slide_id ?>"   method="post" enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Slider Title" name="enname" value="<?php echo $row->slide_name ?>">
                                        <?php echo form_error('enname'); ?>
                                    </div> 
                                    <!-- <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Slider Title (ar)</label>-->
                                    <!--    <input type="text" class="form-control arabictxt" placeholder="Enter Slider Title" name="arname" value="<?php echo $row->slide_name_ar ?>"  style="text-align: right;">-->
                                    <!--    <?php echo form_error('arname'); ?>-->
                                    <!--</div>-->

                                    
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Sub Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Slider Sub Title" name="ensubname" value="<?php echo $row->slide_sub_name ?>">
                                        <?php echo form_error('ensubname'); ?>
                                    </div> 
                                    <!-- <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Slider Sub Title (ar)</label>-->
                                    <!--    <input type="text" class="form-control arabictxt" placeholder="Enter Slider Sub Title" name="arsubname" value="<?php echo $row->slide_sub_name_ar ?>"  style="text-align: right;">-->
                                    <!--    <?php echo form_error('arsubname'); ?>-->
                                    <!--</div>-->


                                    <!--  <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Slider Button (en)</label>-->
                                    <!--    <input type="text" class="form-control" placeholder="Enter Slider Link" name="enlink" value="<?php echo $row->slide_link ?>"> -->
                                    <!--    <?php echo form_error('enlink'); ?>-->

                                    <!--</div> -->
                                    <!-- <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Slider Button (ar)</label>-->
                                    <!--    <input type="text" class="form-control arabictxt" placeholder="Enter Slider Link" name="arlink" value="<?php echo $row->slide_link_ar ?>"  style="text-align: right;">-->
                                    <!--    <?php echo form_error('arlink'); ?>-->
                                    <!--</div> -->
                               <!--      <div class="form-group mb-4">-->
                               <!--         <label for="exampleFormControlInput1">Slider Product</label>-->
                                      
                               <!--<select class="form-control basic"  name="product_id" >-->
                               <!--           <option>Select Product</option>-->
                               <!--           <?php  foreach ($plist as $key => $value) { ?>-->
                               <!--             <option <?php if($row->product_id==$value->product_id){echo "selected";} ?> value="<?php echo $value->product_id ?>"><?php echo $value->product_title ?></option>-->
                               <!--           <?php } ?>-->
                               <!--         </select>-->
                      
                  
                               <!--       </div>  
                                              <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Short Description  (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Description Title" value="<?php echo $row->slider_desc ?>"  name="slider_desc">
                                        <?php echo form_error('slider_desc'); ?>
                                    </div> -->
                                    <!-- <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Slider Short Description (ar)</label>-->
                                    <!--    <input type="text" class="form-control arabictxt" placeholder="Enter Description Title" name="slider_desc_ar" value="<?php echo $row->slider_desc_ar ?>"  style="text-align: right;">-->
                                    <!--    <?php echo form_error('slider_desc_ar'); ?>-->

                                    <!--</div>
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlTextarea1"> Slider Image</label>
                                         <input type="file" class="form-control-file" id="file" name="file" accept=".png, .jpg, .jpeg"> 
                                    <img src="<?php echo base_url() ?>uploads/slider/<?php echo $row->slide_img ?>" style="width: 100px" >

                                    </div> -->
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

   