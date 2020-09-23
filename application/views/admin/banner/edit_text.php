        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Edit Promo Title</h3>
                        </div>
                      
                    </div>
                </div>
 <div class="row">              
   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <form action="<?php echo base_url() ?>banner/updates_text/<?php echo $row->id ?>"   method="post" enctype="multipart/form-data" >
                                 <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1"> Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter  Title"
                                         name="msg" value="<?php echo $row->msg ?>">
                                        <?php echo form_error('msg'); ?>
                                    </div> 
                                     <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1"> Title (ar)</label>
                                        <input type="text" class="form-control " style="text-align: right;" placeholder="Enter  Title (ar)" name="ar_msg" value="<?php echo $row->ar_msg ?>"> 
                                        <?php echo form_error('ar_msg'); ?>
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
    <!-- END MAIN CONTAINER -->

   