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
                                <form action="<?php echo base_url() ?>category/update/<?php echo $row->category_id ?>"   method="post" enctype="multipart/form-data" >
                                 <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Category Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Category Title" name="enname" value="<?php echo  $row->category_name  ?>">
                                        <?php echo form_error('enname'); ?>
                                    </div> 
                                    <!-- <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Category Title (ar)</label>-->
                                    <!--    <input type="text" class="form-control arabictxt" placeholder="Enter Category Title" name="arname" value="<?php echo  $row->ar_category_name  ?>" style="text-align: right;"> -->
                                    <!--    <?php echo form_error('arname'); ?>-->
                                    <!--</div>   -->
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlTextarea1">  Image (en)</label>
                                     <input type="file" class="form-control-file" id="file" name="file"  accept=".png, .jpg, .jpeg"> 
                                     <img src="<?php echo  $row->category_image  ?>" style="width: 100px">
                                    </div> 

                                    <!--  <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlTextarea1">  Image (ar)</label>-->
                                    <!-- <input type="file" class="form-control-file" id="file" name="ar_category_image"  accept=".png, .jpg, .jpeg"> -->
                                    <!-- <img src="<?php echo  $row->ar_category_image  ?>" style="width: 100px"> -->
                                    <!--</div>-->

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

   