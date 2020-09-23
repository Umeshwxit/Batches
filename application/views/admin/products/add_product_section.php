<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="row">                    
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">
                            <h3> Additional Informations
</h3>
                        </div>
               
                    </div>
                </div>
    <?php if($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger mb-4" role="alert">
         <i class="flaticon-cancel-12 close" data-dismiss="alert"></i>
         <strong>Error!</strong>  <?php  echo $this->session->flashdata('msg');?></div>
    <?php  } ?>


 <div class="row">
   <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
<form action="<?php echo base_url(); ?>products/add_multipleimage" method="POST" enctype="multipart/form-data">
                                	<input type="hidden" name="prid" value="<?php echo $prid = $this->uri->segment(3); ?>">
                   
                                  

                                          
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlTextarea1">Select Sizes</label><br>
                           				
                           				  <?php
                     
                            foreach($size as $s){ 
                            ?>
                            <input type="checkbox" name="size_id<?php echo $s['size_id']; ?>" id="size_id<?php echo $s['size_id']; ?>" value="<?php echo $s['size_id']; ?>">&nbsp;&nbsp;<?php echo $s['size_name']; ?>
                            <p id="show<?php echo $s['size_id']; ?>"></p>
                            <script>
                            $(document).ready(function(){
                              $("#size_id<?php echo $s['size_id']; ?>").change(function(){
                                  var value = $('#size_id<?php echo $s['size_id']; ?>').prop('checked');
                                   var size_id = $("#size_id<?php echo $s['size_id']; ?>").val();
                                  if(value==false){
                                      size_id = Number("0");
                                  }
                                 
                                 
                                $.post("<?php echo base_url(); ?>ajax/sizes_input",
                                {
                                  size_id:size_id
                                },
                                function(data,status){
                                  $("#show<?php echo $s['size_id']; ?>").html(data);
                                });
                              });
                            });
                            </script>     
                            <?php 
                            } ?>
                            <input type="checkbox" name="size_id8" id="size_id8" value="8">&nbsp;&nbsp;Free
                            <p id="show8"></p>
                            <script>
                            $(document).ready(function(){
                              $("#size_id8").change(function(){
                                  var value = $('#size_id8').prop('checked');
                                   var size_id = $("#size_id8").val();
                                  if(value==false){
                                      size_id = Number("0");
                                  }
                                 
                                 
                                $.post("<?php echo base_url(); ?>ajax/sizes_input",
                                {
                                  size_id:size_id
                                },
                                function(data,status){
                                  $("#show8").html(data);
                                });
                              });
                            });
                            </script>  
                            
                                
                        
                           			
                                    </div> 
                                    
                                    <input type="submit" value="Add" name="" class="mt-4 mb-4 btn btn-button-7">
                               
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

<style>
[type="checkbox"]:not(:checked), [type="checkbox"]:checked{
    opacity:1;
    position:relative;
    left:0px;
}
</style>     
