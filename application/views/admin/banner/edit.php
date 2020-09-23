        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Edit Banner</h3>
                        </div>
                      
                    </div>
                </div>
 <div class="row">              
   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <form action="<?php echo base_url() ?>banner/update/<?php echo $row->banner_id ?>"   method="post" enctype="multipart/form-data" >
                                    <div class="form-group mb-4">                                        <input type="hidden" name="banner_title" value="12">

                                        <label for="exampleFormControlTextarea1">  Image</label>
                                     <input type="file" class="form-control-file" id="file" name="file"> 
                                     <!-- <img src="<?php echo base_url() ?>uploads/banner/medium/<?php echo  $row->banner_img  ?>" style="width: 100px"> -->
                                     <img src="<?php echo  $row->banner_img  ?>" style="width: 100px">
                                    </div> 
                                    <input type="submit" value="Update" name="Update" class="mt-4 mb-4 btn btn-button-7">
                                </form>
                            </div>
                        </div>
                    </div>
                 </div> 
            </div>
        </div>
    </div>