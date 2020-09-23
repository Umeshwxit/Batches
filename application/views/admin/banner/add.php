        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Add Banner</h3>
                        </div>
                      
                    </div>
                </div>
 <div class="row">              
   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <form action="<?php echo base_url() ?>banner/add/"   method="post" enctype="multipart/form-data" >
                                    <div class="form-group mb-4">
                                        <input type="hidden" name="banner_title" value="12">
                                        <label for="exampleFormControlTextarea1">  Image</label>
                                     <input type="file" class="form-control-file" id="file" name="file" required="" accept=".png, .jpg, .jpeg"> 
                                    </div> 
                                    <input type="submit" value="Add" name="Add" class="mt-4 mb-4 btn btn-button-7">
                                </form>
                            </div>
                        </div>
                    </div>
                 </div> 
            </div>
        </div>
    </div>