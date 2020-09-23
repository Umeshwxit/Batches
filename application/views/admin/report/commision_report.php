
 <!--  BEGIN CONTENT PART  -->
   

        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Commision Report</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="#"><i class="flaticon-home-fill"></i></a></li>
                                <li><a href="#">Vendor</a></li>
                                <li class="active"><a href="#">Commision Report</a> </li>
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
                                            <th>Admin commision</th>
                                            <th>Vendor Amount</th>
                                            <th>Customer Paid</th>
                                            <th>Coupon Amonut</th>
                                            <th>Total Amonut</th>

                                            <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php $i=0;$total=0;
error_reporting(0);

foreach ($list as $each_data) {?>
                                            <tr>
<td style="display: none;"></td>
<td class="text-primary"><?php echo $orderid=$each_data->orderid; ?></td>
<td><?php


            $update = $this->Comman_model->getdata('orders', $where1=array('ord_id'=>$orderid));


 echo $update->ord_bill_fname." ".$update->ord_bill_lname; ?></td>
<td><?php echo $update->ord_date; ?></td>
<td><?php echo $each_data->admin_comm; ?></td>

<td><?php echo $each_data->vendor_amt; ?></td>  
<td><?php echo $update->ord_price; ?></td>  



<td>
    
<?php $coupon_code= $each_data->coupon_code;
if($coupon_code){
$data1=array('cup_name'=>$coupon_code);
            $check_coupon = $this->Comman_model->getdata('coupons', $data1);

            if ($check_coupon->cup_type=='percent') {
$ord_price=$update->ord_price;
            $total2= str_replace(",","", $ord_price);

$cup_value=$check_coupon->cup_value;
// echo    $total-$total*$cup_value/100
  $total=  $total2*10/9;


         // echo $value=$check_coupon->cup_value.'%';
        

            $value= $total*$check_coupon->cup_value/100;
            echo number_format($value,3);
   // echo $after_dis_amt= $total-$value;

            }else if($check_coupon->cup_type=='flat')
            {
$ord_price=$update->ord_price;

            echo number_format($check_coupon->cup_value,3);  
         } 

}else{
echo '0';

}

?>

</td>
<td>
    <?php  $each_data->coupon_code; ?>
<?php $coupon_code= $each_data->coupon_code;
if ($coupon_code) {
    
$data1=array('cup_name'=>$coupon_code);
            $check_coupon = $this->Comman_model->getdata('coupons', $data1);

            if ($check_coupon->cup_type=='percent') {
$ord_price=$update->ord_price;
$cup_value=$check_coupon->cup_value;
            $total2= str_replace(",","", $ord_price);

error_reporting(0);
// echo    $total-$total*$cup_value/100
echo    number_format($total2*10/9,2);


         // echo $value=$check_coupon->cup_value.'%';
        
    //         $value= $total*$check_coupon->cup_value/100;
    // $after_dis_amt= $total-$value;

            }else if($check_coupon->cup_type=='flat')
            {
$ord_price=$update->ord_price;

            $total2= str_replace(",","", $ord_price);

            echo $check_coupon->cup_value+$total2;  
         } 
     }else{
echo $ord_price=$update->ord_price;

     }
?>

</td>

<td class="align-center"><a href="<?php echo base_url() ?>order/order_detail/<?php echo $each_data->orderid  ?>"  class="btn btn-default btn-sm"><i class="icon-search"></i> View</a></td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Order ID</th>
                                            <th>Customer Name</th>
                                            <th>Order Date</th>                      
                                            <th>Admin commision</th>
                                            <th>Vendor Amount</th>
                                            <th>Customer Paid</th>
                                            <th>Coupon Amonut</th>
                                            <th>Total Amonut</th>

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