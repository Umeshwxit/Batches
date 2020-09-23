

<link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/editors/markdown/simplemde.min.css">
<div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3>Add Page</h3>
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
                                <form action="<?php echo base_url(); ?>page/insert" method="POST">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Page Title (en)</label>
                                        <input type="text" class="form-control" placeholder="Enter Page Title (en)*" value="" name="page_name" >
                                         <span style="color:red;"><?php echo form_error('page_name'); ?></span>
                                    </div> 
                                    <!--<div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Page Title (ar)</label>-->
                                    <!--    <input type="text"  class="form-control arabictxt" placeholder="Enter Page Title (ar)" name="page_name_ar" value=""  style="text-align: right;">-->
                                    <!--     <span style="color:red;"><?php echo form_error('page_name_ar'); ?></span>-->
                                    <!--</div>  -->


                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlInput1">Description (en)</label>
                                        <textarea  name="page_disc"></textarea>
                                         <span style="color:red;"><?php echo form_error('page_disc'); ?></span>
                                    </div>  
                                    <!--   <div class="form-group mb-4">-->
                                    <!--    <label for="exampleFormControlInput1">Description (ar)</label>-->
                                    <!--    <br>-->
                                    <!--    <textarea rows="20" cols="100"  name="page_disc_ar"  style="text-align: right;"></textarea>-->
                                    <!--     <span style="color:red;"><?php echo form_error('page_disc_ar'); ?></span>-->
                                    <!--</div>  -->
                                    
                                   
                                     
                                    <input type="submit" value="Add Page" name="" class="mt-4 mb-4 btn btn-button-7">
                               
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

   <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
   
<script>
    CKEDITOR.replace( 'page_disc' );
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin/plugins/editors/markdown/simplemde.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin/plugins/editors/markdown/custom-markdown.js"></script>