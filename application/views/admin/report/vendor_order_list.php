
 <!--  BEGIN CONTENT PART  -->
   

        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Order</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="#">Vendor</a></li>
                                <li class="active"><a href="#">Order</a> </li>
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
                                        <h4>Order</h4>
                                    </div>
                                   
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
<table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">                                        <thead>
                                            <tr>
                                                <th style="display: none;"></th>
                                            <th>Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Order Date</th>                                         
                                            <th>admin commision</th>
                                            <th>vendor commission</th>
                                            <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php $i=0;foreach ($list as $each_data) {?>
                                            <tr>
<td style="display: none;"></td>
<td class="text-primary"><?php echo $each_data->ord_id; ?></td>
<td><?php echo $each_data->ord_bill_fname." ".$each_data->ord_bill_lname; ?></td>
<td><?php echo $each_data->ord_date; ?></td>
<td><?php echo $each_data->admin_commision; ?></td>
<td><?php echo $each_data->vendor_commission; ?></td>  

<td class="align-center"><a href="<?php echo base_url() ?>order/order_detail/<?php echo $each_data->ord_id  ?>"  class="btn btn-default btn-sm"><i class="icon-search"></i> View</a></td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer Name</th>
                                                <th>Order Date</th>
                                               
                                                <th>Order Status</th>
                                                <th>Update Status</th>
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