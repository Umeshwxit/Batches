<?php include 'header.php'; ?>


<style type="text/css">
	.orders-details{padding: 60px 0px;}
	.delAdrs {
    margin-bottom: 20px;position: relative;
}
.delAdrs h3 {
    margin-bottom: 10px;
}
.invoice{position: absolute;right: 0;top: 0;}
</style>
<?php $userdata=$this->session->userdata(); ?>
<section class="orders-details">
<div class="container">
	<div class="row">

		<h2 style="text-align: center;">Order <?php $orderdetail[0]['ord_key'] ?> Details</h2>
		
	<div class="wrap-cart">
		
		<div class="delAdrs">
      		<h3>Delivery Address -  </h3>
      		<span><b><?php echo $orderdetail[0]['ord_bill_fname'] ?> <?php echo $orderdetail[0]['ord_bill_lname'] ?></b></span><br>
			<span><?php echo $orderdetail[0]['address'] ?>, <?php echo $orderdetail[0]['ord_bill_city'] ?>,  - <?php echo $orderdetail[0]['ord_bill_zip'] ?>, <?php echo $orderdetail[0]['ord_bill_con'] ?></span> <br>
			<p>
				<b>Email : </b> &nbsp; <?php echo $orderdetail[0]['ord_bill_email'] ?>
				<br>	
				<b>Phone number : </b> &nbsp; <?php echo $orderdetail[0]['ord_bill_phone'] ?>
			</p>
			<a class="btn btn-primary invoice" href="<?php echo base_url('home/order_invoice') ?>/<?php echo $orderdetail[0]['ord_id']  ?>">Download Invoice</a>
  		</div>

  		<hr>
	 
	 <?php foreach ($orderdetail as $single_order) {
	 	?>
	 	
	
	<!--  looping end -->
       <div class="cart-card">
            <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $single_order['ps_image']; ?>" style="width:50px;height: 50px" alt="card">
            <div class="cart-card-info">
                 <div class="cart-card-name">
                      <p class="h4"><?php echo $single_order['product_title']; ?></p>
                      <span><b>Quantity :</b> <?php echo $single_order['order_quantity']; ?> </span>

                 </div>
                 <div class="cart-card-price">
                      <p class="once-price">$<?php echo $single_order['ord_price']; ?></p>
                 </div>
                 <div class="">
                      <<span>Order  Status</span> <?php if($orderdetail[0]['ord_status']==0){ echo "Confirmed" ;}
                      

                      else if($orderdetail[0]['ord_status']==2){ echo "Deliverd" ;}

                      else if($orderdetail[0]['ord_status']==3){ echo "Canceled" ;}
                      else if($orderdetail[0]['ord_status']==4){ echo "On the way" ;}
                       ?>
                       <br>
                      <span><b>Orderd On :</b><?php echo date('d-m-Y',strtotime($orderdetail[0]['ord_date'])); ?> </span><br>
                     

                 </div>
                 <div class="cart-card-quantity">
                  <?php if($single_order['ord_status']==0){  ?>
                       <a  class="btn btn-primary order_cancel" data-order_product_id=" <?php echo $single_order['order_product_id']; ?>" href="javascript:void(0)">Cancel Order</a>
                  <?php }else{ ?>
                    <a  class="btn btn-primary " disabled href="javascript:void(0)">Canceled</a>
                  <?php 
                  } ?>
                 </div>
            </div>
            
       </div> 
       <?php } ?>
       <!-- looping end -->

  </div>
  <div><a class="btn btn-primary " href="<?php echo base_url() ?>">Back to home</a></div>
	</div>
</div>
</section>


<?php include 'footer.php'; ?>
<script type="text/javascript">
  $(".order_cancel").click(function (argument) {
    order_product_id=$(this).data('order_product_id');
    $.ajax({
      url:"<?php echo base_url() ?>update_order_product_status",
      method:"POST",
      data:{
        order_product_id:order_product_id
      },
      dataType:"json",
      success:function (response) {
        if(response.message){
          $(".order_cancel").html('Canceled');
          $(".order_cancel").attr('disabled' ,'disabled');
        }
      }
    })
  })
</script>