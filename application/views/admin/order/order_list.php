  <script type="text/javascript">

  setInterval(function() {
  }, 3000); 

</script>
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Order</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>admin/index"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="<?php echo base_url() ?>admin/index">Admin</a></li>
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
                                            <th>Order Status</th>
                                            <th>Update Status</th>
                                            <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody  id="tabl">
                            <?php $i=0;foreach ($list as $each_data) {?>
                                            <tr >
                                                <td style="display: none;"></td>
        <td class="text-primary"><?php echo $each_data->ord_id; ?></td>
        <td><?php echo $each_data->ord_bill_fname." ".$each_data->ord_bill_lname; ?></td>
        <td><?php echo $each_data->ord_date; ?></td>
<?php if($each_data->ord_status!='3'){ ?>
  <script type="text/javascript">

  setInterval(function() {
    $('#co<?php echo $each_data->ord_id; ?>').load('<?php echo base_url(); ?>order/get_order_status/<?php echo $each_data->ord_id; ?>');

  }, 3000); 

  setInterval(function() {
    $('#drop<?php echo $each_data->ord_id; ?>').load('<?php echo base_url(); ?>order/get_order_status_drop/<?php echo $each_data->ord_id; ?>');

  }, 3000);



</script>
<?php } ?>
                <td class="align-center" id="co<?php echo $each_data->ord_id; ?>">
                <?php if($each_data->ord_status==0){?>

                <span class="badge badge-primary">CONFIRMED</span>
                <?php } if($each_data->ord_status==1){?>
                <span class="badge badge-warning">In Transit</span>
                <?php } if($each_data->ord_status==2){?>
                <span class="badge badge-success">Delivered</span>
                <?php } if($each_data->ord_status==3){?>
                <span class="badge badge-danger">Cancel</span>

                <?php } if($each_data->ord_status==4){?>
                <span class="badge badge-info">On The Way</span>
                <?php } if($each_data->ord_status==5){?>
                <span class="badge badge-info">Refund  Requested</span>
                <?php } if($each_data->ord_status==6){?>
                <span class="badge badge-info">Refund Disapproved</span>

                <?php } ?>


                </td>
                <td>
                <form action="<?php echo base_url(); ?>Order/orderstatus_change/" method="post">
                <input type="hidden" value="<?php echo $each_data->ord_id; ?>" name="id">
                <input type="hidden" value="<?php echo $each_data->ord_user_id; ?>" name="ord_user_id">
                <input type="hidden" value="<?php echo $each_data->ord_driver_id; ?>" name="ord_driver_id">


                <select name="ord_status" onchange="this.form.submit()" id="drop<?php echo $each_data->ord_id; ?>">
                <option>Select Status</option>
                <option   <?php if($each_data->ord_status=='1') {  echo "selected";} ?> value="1" >In Transit</option>
                <option   <?php if($each_data->ord_status=='0') {  echo "selected";} ?> value="0" >Confirmed</option>
                <option   <?php if($each_data->ord_status=='2') {  echo "selected";} ?>  value="2">Delivered</option>
                <option   <?php if($each_data->ord_status=='3') {  echo "selected";} ?>  value="3">Canceled</option>
                <option   <?php if($each_data->ord_status=='4') {  echo "selected";} ?>  value="4">On The Way</option>
                  <option   <?php if($each_data->ord_status=='5') {  echo "selected";} ?>  value="5">Refund  Requested</option>
                <option   <?php if($each_data->ord_status=='6') {  echo "selected";} ?>  value="6">Refund Disapproved</option>
                </select>
                </form>
                </td>
           
        
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
        </div>
        <!--  END CONTENT PART  -->
    </div>
   