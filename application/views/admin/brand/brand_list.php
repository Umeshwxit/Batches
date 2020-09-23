 <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Brand</h3>
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
                                        <h4>Brand</h4>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-6 text-right col-6">
                                        <a class="btn btn-sm btn-info mt-3 mr-2" href="<?php echo base_url(); ?>brand/add">Add</a>

                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
<table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name (en)</th>
                                                <!--<th>Name (ar)</th>-->
                                              
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php $i=0;foreach ($list as $each_data) {?>
                                            <tr>
                                        <td class="text-primary"><?php echo $i=$i+1; ?></td>
                                        <td><?php echo $each_data->brand_name ?></td>
                                        <!--<td><?php echo $each_data->ar_brand_name ?></td>-->
                                                                                    
                                        <td><ul class="table-controls">                                                         
                                            <li><a href="<?php echo base_url() ?>brand/edit/<?php echo $each_data->brand_id; ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="flaticon-edit  bg-success p-1 text-white br-6 mb-1"></i></a></li>

 <li><a href="<?php echo base_url() ?>brand/delete/brand_id/brands/<?php echo $each_data->brand_id?>/index/" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to delete this ?');"><i class="flaticon-delete  bg-danger p-1 text-white br-6 mb-1"></i></a></li> 

                                                    </ul></td>
                                  
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                 <th>S.No</th>
                                                <th>Name (en)</th>
                                                <!--<th>Name (ar)</th>-->
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
    