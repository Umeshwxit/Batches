 <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>vendor</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>admin/index"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="<?php echo base_url() ?>admin/index">Admin</a></li>
                                <li class="active"><a href="#">vendor</a> </li>
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

                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                        <h4>vendor</h4>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-6 text-right col-6">
                                        <a class="btn btn-sm btn-info mt-3 mr-2" href="#">Add</a>
                                    </div>

                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
<table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">                                        <thead>
                                            <tr>
                                               <th>Sr. No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                               <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                          <?php $i=1; ?>
        <?php foreach($list as $d){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><a href="<?php echo base_url() ?>products/index/<?php echo $d->admin_id; ?>"><?php echo $d->admin_fullname; ?></a></td>
            <td><?php echo $d->admin_email; ?></td>
            <td><?php echo $d->phone; ?></td>
            <td><?php echo $d->address; ?></td>              
            <td><ul class="table-controls">                                                         
                    <li><a href="<?php echo base_url() ?>report/vendor_order/<?php echo $d->admin_id ?>" data-toggle="tooltip" data-placement="top" title="Edit">View</a></li>

                                                    </ul></td> 
            
        </tr>
        <?php $i++; } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Sr. No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>                              
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
    