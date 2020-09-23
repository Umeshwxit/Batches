        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Add Slider</h3>
                        </div>
                      
                    </div>
                </div>
 <div class="row">              
   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <form action="<?php echo base_url() ?>slider/add_slider"   method="post" enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Slider Title" name="enname">
                                        <?php echo form_error('enname'); ?>
                                    </div> 
                      
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Sub Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Slider Sub Title" name="ensubname">
                                        <?php echo form_error('ensubname'); ?>
                                    </div> 
                                                  <!-- <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Title (ar)</label>
                                        <input type="text" class="form-control arabictxt" placeholder="Enter Slider Title" name="arname"  style="text-align: right;">
                                        <?php echo form_error('arname'); ?>

                                    </div>



                                     <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Sub Title (ar)</label>
                                        <input type="text" class="form-control arabictxt" placeholder="Enter Slider Sub Title" name="arsubname"  style="text-align: right;">
                                        <?php echo form_error('arsubname'); ?>
                                    </div>

                                      <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Button (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Slider Link" name="enlink">
                                        <?php echo form_error('enlink'); ?>

                                    </div> 
                                     <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Button (ar)</label>
                                        <input type="text" class="form-control arabictxt" placeholder="Enter Slider Link" name="arlink"  style="text-align: right;">
                                        <?php echo form_error('arlink'); ?>
                                        
                                    <!--</div>   
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Product</label>
                                      
                               <select class="form-control basic"  name="product_id" >
                                          <option>Select Product</option>
                                          <?php  foreach ($plist as $key => $value) { ?>
                                            <option  value="<?php echo $value->product_id ?>"><?php echo $value->product_title ?></option>
                                          <?php } ?>
                                        </select>
                      
                  
                                      </div>                   

                                          <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Short Description  (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Description Title" name="slider_desc">
                                        <?php echo form_error('slider_desc'); ?>
                                    </div> 
                                     <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Slider Short Description (ar)</label>
                                        <input type="text" class="form-control arabictxt" placeholder="Enter Description Title" name="slider_desc_ar"  style="text-align: right;">
                                        <?php echo form_error('slider_desc_ar'); ?>

                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlTextarea1"> Slider Image</label>
                <input type="file" class="form-control-file" id="file" name="file" accept=".png, .jpg, .jpeg"> 
                                    </div>--> 
                                    <input type="submit" value="Add" name="Add" class="mt-4 mb-4 btn btn-button-7">
                                </form>
                            </div>
                        </div>
                    </div>
                 </div> 
            </div>
        </div>
    </div>
    <!-- END MAIN CONTAINER -->

   