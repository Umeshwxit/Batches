 <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Size</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>admin/index"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="<?php echo base_url() ?>admin/index">Admin</a></li>
                                <li class="active"><a href="#">Size</a> </li>
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
                                        <h4>Size</h4>
                                    </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6 text-right col-6">
                                        <a class="btn btn-sm btn-info mt-3 mr-2" href="<?php echo base_url(); ?>size/add">Add</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
<table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">                                        <thead>
                                            <tr>
                                                        <th>Sr. No.</th>
                                                <th>Category</th>
                                                <th>Subcategory </th>
                                                <th>Size Name (en)</th>
                                                <!--<th>Size Name (ar)</th>-->
                                               <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                           <?php $i=1; ?>
        <?php foreach($list as $d){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php
            $size_cat_id=$d->size_cat_id;
            $res=$this->db->query("SELECT * FROM `categories` WHERE `category_id`='$size_cat_id'");
             $cat=$res->row();
             if(!empty($cat))
             {
                echo $cat->category_name;
             }
              ?></td>
            <td><?php 
 $size_subcat_id=$d->size_subcat_id;
$res1=$this->db->query("SELECT * FROM `subcategories` WHERE `subcategory_id`='$size_subcat_id'");
             $subcat=$res1->row();
             if(!empty($subcat))
             {
                echo $subcat->subcategory_name;
             }
           ?></td>
            <td><?php echo $d->size_name; ?></td>
            <!--<td><?php echo $d->ar_size_name; ?></td>-->
            
           <td><ul class="table-controls">  
            <li><a href="<?php echo base_url() ?>size/edit/<?php echo $d->size_id ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a></li>

 <li>
     <?php if($d->size_id!='8'){?>
     <a href="<?php echo base_url() ?>size/delete/size_id/sizes/<?php echo $d->size_id?>/index/" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to delete this ?');"><i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i></a>
 
 <?php } ?>    </li>

 

                                                    </ul></td>
        </tr>
        <?php $i++; } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Category</th>
                                                <th>Subcategory </th>
                                                <th>Size Name (en)</th>
                                                <!--<th>Size Name (ar)</th>-->
                                                <th>Action</th>                                               
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
    