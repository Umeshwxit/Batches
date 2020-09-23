 <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Customer Report</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>admin/index"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="<?php echo base_url() ?>admin/index">Admin</a></li>
                                <li class="active"><a href="#">Brand</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if($this->session->flashdata('msg')){?>
                    <div class="alert alert-success mb-4" role="alert"> <i class="flaticon-cancel-12 close" data-dismiss="alert"></i> <strong>Success!</strong> <?php  echo $this->session->flashdata('msg');?>  </div>
                <?php  }            ?>
                <div class="row" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6"   >
                                        <h4>Product Report</h4>
                                    </div>
                              <!--       <div class="col-xl-6 col-md-6 col-sm-6 text-right col-6">
                                        <a class="btn btn-sm btn-info mt-3 mr-2" href="<?php echo base_url(); ?>brand/add">Add</a>

                                </div> -->
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
<table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Product Name</th>
                                                <th>Product Category</th>
                                                <th>Product Brand</th>
                                                <th>View</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php $i=0;foreach ($list as $each_data) {?>
                                            <tr>
                                        <td class="text-primary"><?php echo $i=$i+1; ?></td>
                                        <td><?php echo $each_data->product_title; ?> </td>
                                     
                                        <td> <?php 
                                           $product_cat= $each_data->product_cat;
                                        if($product_cat=='')
                                        {}
                                    else
                                    {
                                        $procat=$this->db->query("SELECT * FROM `categories` WHERE `category_id`='$product_cat'");
                                       $pro= $procat->row();
                                       if(!empty($pro))
                                       {
                                        echo $pro->category_name;
                                        }
                                    }
                                         ?></td>
                                                                                    
                                        <td><?php
                                          $product_brand= $each_data->product_brand;
                                         if($product_brand=='')
                                         {}
                                     else
                                     {
                                         $bra=$this->db->query("SELECT * FROM `brands` WHERE `brand_id`='$product_brand'");
                                       $bra1= $bra->row();
                                       if(!empty($bra1))
                                       {
                                        echo $bra1->brand_name;
                                    }
                                     }

                                         ?> </td>
                                        <td> 
<a href="<?php echo base_url(); ?>Report/view_product_by_id/<?php echo $each_data->product_id ?>" >View</a>

                                        </td>
                                  
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Product Name</th>
                                         
                                                <th>Product Category</th>
                                                <th>Product Brand</th>
                                                <th>View</th>                                               
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->
    </div>
    <!-- END MAIN CONTAINER -->
    