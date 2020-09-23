 <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Product</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>admin/index"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="<?php echo base_url() ?>admin/index">Admin</a></li>
                                <li class="active"><a href="#">Product</a> </li>
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

                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Product</h4>
<a class="btn btn-sm btn-info mt-3 mr-2" href="<?php echo base_url() ?>products/add_product_section/<?php echo $this->uri->segment(3); ?>" style="float: right;">Add Colors,Images & Prices</a>
                                    </div>

                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
<table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Size</th>
                                                <th>Qty</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                         <?php $i=1; ?>
        <?php foreach($list as $d){ ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $d->size_name; ?></td> 
<td><?php echo $d->pcs_qty; ?></td> 
<td><ul class="table-controls">                                                         
<li><a href="<?php echo base_url(); ?>products/edit_image/<?php echo $d->pcs_id; ?>/<?php echo $this->uri->segment(3) ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a></li>

<li><a href="<?php echo base_url() ?>products/product_section/pcs_id/product_color_size_record/<?php echo $d->pcs_id?>/product_image_list/<?php echo $this->uri->segment(3) ?>" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to delete this ?');"><i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i></a></li> 


</ul></td>
</tr>
<?php $i++; } ?>
        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Sr. No.</th>
                                              
                                                <th>Size</th>
                                                <th>Qty</th>
                                                
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
    