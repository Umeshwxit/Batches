      <head>





          <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">

          <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/editors/markdown/simplemde.min.css">



          <style type="text/css">

          .chosen-choices {

              height: 40px !important;

              border-radius: 20px;

              padding: 5px 12px !important;

              font-size: 16px;

          }



          .search-choice span {

              font-size: 13px;

              padding: 0px 5px;

              line-height: 15px;

          }

          </style>

      </head>

      <div id="content" class="main-content">

          <div class="container-fluid">

              <div class="page-header">

                  <div class="row">

                      <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">

                          <h3>Edit Products</h3>

                      </div>



                  </div>

              </div>

              <div class="row text-dark">

                  <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">

                      <!-- <div class="statbox widget box box-shadow"> -->

                      <div class="widget-content widget-content-area">

                          <form novalidate action="<?php echo base_url(); ?>products/update_product/<?php echo $update->product_id; ?>"  enctype="multipart/form-data" method="POST">

                              <input type="hidden" name="id" value="<?php echo $update->product_id; ?>">

                              <input type="hidden" name="prid" value="<?php echo $update->prid; ?>">





                              <div id="output"></div>





                              <div class="form-group mt-4">

                                  <label class="text-gray-dark">Product Name <span style="color: red">*</span> (en)</label>

                                  <input type="text" name="product_title" class="form-control"

                                      placeholder="product_title" value="<?php echo $update->product_title; ?>">

                                  <span style="color:red;"><?php echo form_error('product_title'); ?></span>



                              </div>

                              <!--<div class="form-group mt-4">-->

                              <!--    <label class="text-gray">Product name (ar)</label>-->

                              <!--    <input type="text" name="ar_product_title" class="form-control"-->

                              <!--        placeholder="ar_product_title" value="<?php echo $update->ar_product_title; ?>">-->

                              <!--    <span style="color:red;"><?php echo form_error('ar_product_title'); ?></span>-->



                              <!--</div>-->

                              <div class="categories ">

                                  <div class="row">

                                      <div class="col-md-12">

                                          <div class="row  m-0 p-0  ">

                                              <div class="col-md-3">

                                                  <label class="text-gray">Category <span style="color: red">*</span> </label>



                                                  <select class="form-control uv" name="product_cat" id="category_catid"

                                                      required>

                                                      <option value="0">Select Category</option>



                                                      <?php

                                    

                                     foreach($categories as $cat){

                                         ?>

                                                      <option <?php if($update->product_cat==$cat->category_id){ ?>

                                                          selected="selected" <?php } ?>

                                                          value="<?php echo $cat->category_id; ?>">

                                                          <?php echo $cat->category_name; ?></option>

                                                      <?php } ?>



                                                  </select>

                                                  <span

                                                      style="color:red;"><?php echo form_error('product_cat');?></span>

                                              </div>

                                              <div class="col-md-3">

                                                  <label class="text-gray">SubCategry <span style="color: red">*</span> </label>



                                                  <select class="form-control uv" name="product_subcat"

                                                      id="subcategory_catid">



                                                      <option value="0">Select SubCategry</option>



                                                      <?php

                                    $cid=$update->product_cat;

                                  $q=  $this->db->query("SELECT * FROM `subcategories` WHERE `subcategory_catid`='$cid' ");$subcategories=$q->result();

                                     foreach($subcategories as $scat){

                                         ?>

                                                      <option

                                                          <?php if($update->product_subcat==$scat->subcategory_id){ ?>

                                                          selected="selected" <?php } ?>

                                                          value="<?php echo $scat->subcategory_id; ?>">

                                                          <?php echo $scat->subcategory_name; ?></option>

                                                      <?php } ?>







                                                  </select>

                                                  <span

                                                      style="color:red;"><?php echo form_error('product_subcat'); ?></span>



                                              </div>

                                              <div class="col-md-3">

                                                  <label class="text-gray">Brand <span style="color: red">*</span> </label>



                                                  <select class="form-control uv" name="product_brand">

                                                      <option selected="" value="0"> Select Products brands</option>

                                                      <?php

                                    

                                     foreach($brands as $cat1){

                                         ?>

                                                      <option <?php if($update->product_brand==$cat1->brand_id) { ?>

                                                          selected="selected" <?php } ?>

                                                          value="<?php echo $cat1->brand_id; ?>">

                                                          <?php echo $cat1->brand_name; ?></option>

                                                      <?php } ?>

                                                  </select>

                                                  <span

                                                      style="color:red;"><?php echo form_error('product_brand'); ?></span>

                                              </div>



   <div class="col-md-3">

               <h5>Production Date</h5>

               <input type="date" name="production_date"  value="<?php echo $update->production_date ?>"   class="form-control" >

            </div>

                                        



                                          </div>



                                      </div>

                                  </div>



                              </div>

                              <div class="mt-3 text-dark">



                                  <h5>Product Type (Optional)</h5>

                                  <input type="checkbox" name="product_type[]" value="featured"

                                      <?php if (strpos($update->product_type,"featured") !== false) { echo "checked"; } ?>

                                      class="chekbox mr-1"><label>Best Seller</label><br>

                                  <input type="checkbox" name="product_type[]" value="new"

                                      <?php if (strpos($update->product_type,"new") !== false) { echo "checked"; } ?>

                                      class=" mr-1"><label>New arrivals</label><br>

                               

                              </div>

                         



                              <div class="editors">

                                  <div class="row layout-spacing">





                                      <div class="row">

                                          <div class="col-md-12 container">





                                              <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">

                           <li class="nav-item" onclick="changebg()">

                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">English</a>

                           </li>

                       

                        </ul>

                        <div class="tab-content" id="simpletabContent">

                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                              <h5>Short Description <span style="color: red" >*</span> (en)</h5>

                              <span style="color:red;"><?php echo form_error('product_sdisc'); ?></span>

                              <textarea name="product_sdisc" class='form-control' id="demo1" placeholder="Product short Description" required  rows="4" cols="50"><?php echo $update->product_sdisc;  ?></textarea>

                              <br/>

                           </div>

                         

                        </div>



                         <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">

                           <li class="nav-item" onclick="changebg()">

                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">English</a>

                           </li>

                          

                        </ul>

                        <div class="tab-content" id="simpletabContent">

                           <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">

                           <h5>Long Description<span style="color: red" >*</span>(en)</h5>

 <span style="color:red;"><?php echo form_error('product_disc'); ?></span>

 <textarea name="product_disc" id="demo2" class='form-control input2'  placeholder="Product long Description" required><?php echo $update->product_disc;  ?></textarea>

<br/>

                           </div>



                        </div>



                 

<div class="form-group mb-4">

                                        <label for="exampleFormControlInput1">Product Featured Image</label>

                                        <input type="file"  class="form-control" placeholder="Enter Email*" name="product_img" value=""  accept=".png, .jpg, .jpeg">

                                       <img src="<?php echo base_url() ?>uploads/gallery/<?php echo $update->ps_image; ?>"  style="width:100px" >

                                         <span style="color:red;"><?php echo form_error('product_img'); ?></span>

                                    </div>  

                                    <div class="form-group mb-4">

                                        <label for="exampleFormControlInput1">Product Image Gallery</label>

                                        <input type="file" class="form-control" placeholder="Product Image" name="files[]" multiple value="" accept=".png, .jpg, .jpeg">

                                         <span style="color:red;"><?php echo form_error('phone'); ?></span>

                                    </div>  





                                             



                                            



                                              <input type="submit" value="Save & Next" name=""

                                                  class="mt-4 mb-4 btn btn-primary" class="text-uppercase">

                          </form>

                      </div>

                  </div>

              </div>

          </div>

      </div>

      </div>

      </div>

      <!-- END MAIN CONTAINER -->





      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



      <script type="text/javascript">



         function get_row(this1) {



       $.post("<?php echo base_url(); ?>ajax/delete_row",

       {

         id:this1,

       },

       function(data){



       });

   

        }

$(document).ready(function() {

    $("#category_catid").change(function() {

        var cat = $("#category_catid").val();

        $.post("<?php echo base_url(); ?>ajax/find_subcat", {

                cat_name: cat,

            },

            function(data) {

                $("#subcategory_catid").html(data);

            });



    });

});

      </script>

      <script type="text/javascript">

$(document).ready(function() {

    $("#product_f_catdiv").hide();





    $("#featured_cat").click(function() {



        var array = $("#featured_cat:checked").val()



        if (array == 'yes') {

            // alert('show');

            $("#product_f_catdiv").show();

        } else {

            //  alert('hide');

            $("#product_f_catdiv").hide();

        }



    });









});

      </script>

      <script>

$(document).ready(function() {

    $(".addCF").click(function() {

        $("#customFields").append(

            '<tr valign="top"><th scope="row"><label for="customFieldName">Custom Field </label></th><td><input type="text" class="code" id="customFieldName" name="customFieldNamenew[]" value="" placeholder=" Title (en)" /> &nbsp; <input type="text" class="code" id="customFieldValue" name="customFieldValuenew[]" value="" placeholder=" Description  (en)" /> &nbsp; &nbsp; <a href="javascript:void(0);" class="remCF">Remove</a></td></tr>'

            );

    });

    $("#customFields").on('click', '.remCF', function() {

        $(this).parent().parent().remove();

    });

});

      </script>

      <script src="<?php echo base_url(); ?>admin/plugins/editors/markdown/simplemde.min.js"></script>

      <script src="<?php echo base_url(); ?>admin/plugins/editors/markdown/custom-markdown.js"></script>





      <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>





      <script type="text/javascript">

document.getElementById('output').innerHTML = location.search;

$(".chosen-select").chosen();

      </script>