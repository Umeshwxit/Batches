<html xmlns="http://www.w3.org/1999/xhtml"><head>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

	<title>Batches Order Invoice</title>

  </head>



<body style="background: #f5f5f5">
<script type="text/javascript">
	
      window.onload = function() { window.print(); }
 
</script>


 

	<div style="width:800px; margin:auto; background-color:#fff; min-height:500px; border:2px groove #ccc;border-radius: 5px;">

 





		<table style="color: #333;font-family: sans-serif;font-size: 15px;font-weight: 300;text-align: center;border-collapse: separate;border-spacing: 0;width: 99%;margin: 6px auto; color: #333;

  font-family: sans-serif;font-size: 15px;font-weight: 300;text-align: center;border-collapse: separate;border-spacing: 0;width: 99%;margin: 20px auto 0; ">

			<tbody><tr>

				<td style="text-align:left; padding:10px;" width="70%">

					<img style="height: 60px;width: auto;" src="http://bhatiagro.com/batches/assets/img/logo.jpg" width="200">

				</td>

				<td style="text-align:left; padding:10px;">

					<span style="margin: 5px 0;display: block;"><strong style="font-weight: bold;">Date:

							&nbsp;</strong> <?php echo date('d-m-Y',strtotime($orderdetail[0]['ord_date'])); ?></span>

					<span style="margin: 5px 0;display: block;"><strong style="font-weight: bold;">Account#:

							&nbsp;</strong>98765432</span>

					<span style="margin: 5px 0;display: block;"><strong style="font-weight: bold;">Order Id:

							&nbsp;</strong>  <?php echo  $orderdetail[0]['ord_key'] ?></span>



				</td>

			</tr>

		</tbody></table>



		<div style="font-family: sans-serif;padding: 0 15px;margin-top: 30px; ">

			<p><strong>Dear <?php echo $orderdetail[0]['ord_bill_fname'] ?></strong></p>

			<p>Thank you for placing your order with <b>Batches "Coffee Beans & Equipment"</b>. Your order details are below. We will send a confirmation once your item(s) ship. 

		</div>



		<table style="margin-top:14px;color: #333;font-family: sans-serif;font-size: 15px;font-weight: 300;text-align: center;border-collapse: separate;border-spacing: 0;width: 99%;margin: 6px auto; 

  font-family: sans-serif;font-size: 15px;font-weight: 300;text-align: center;border-collapse: separate;border-spacing: 0;width: 99%;margin: 50px auto; ">

			<tbody><tr>

				<td style="text-align:left; padding:10px;" width="48%">

					<div style="background: #f1f1f1;padding: 7px 10px;margin-bottom: 10px"><strong style="font-weight:bold;">Shipping Address :</strong><br></div>

					<div style="padding-left: 10px;">

				 		

				 		<span><b><?php echo $orderdetail[0]['ord_ship_fname'] ?> <?php echo $orderdetail[0]['ord_ship_lname'] ?></b></span><br>
			<span><?php echo $orderdetail[0]['address'] ?>, <?php echo $orderdetail[0]['ord_ship_city'] ?>,  - <?php echo $orderdetail[0]['ord_ship_zip'] ?>, <?php echo $orderdetail[0]['ord_ship_con'] ?></span> <br>
 
				 		<span><strong>Phone : </strong><?php echo $orderdetail[0]['ord_ship_phone'] ?></span>

					</div>

				</td>

				<td style="text-align:left; padding:10px;" width="48%">

					<div style="background: #f1f1f1;padding: 7px 10px;margin-bottom: 10px"><strong style="font-weight:bold;">Billing Address :</strong><br></div>

					<div style="padding-left: 10px;">

				 		

				 		<span><b><?php echo $orderdetail[0]['ord_bill_fname'] ?> <?php echo $orderdetail[0]['ord_ship_lname'] ?></b></span><br>
			<span><?php echo $orderdetail[0]['address'] ?>, <?php echo $orderdetail[0]['ord_bill_city'] ?>,  - <?php echo $orderdetail[0]['ord_bill_zip'] ?>, <?php echo $orderdetail[0]['ord_bill_con'] ?></span> <br>
 
				 		<span><strong>Phone : </strong><?php echo $orderdetail[0]['ord_bill_phone'] ?></span>

					</div>

				</td>

			</tr>

			<tr>

				<td style="text-align:left; padding:10px;" width="48%">

					<div style="background: #f1f1f1;padding: 7px 10px;margin-bottom: 10px"><strong style="font-weight:bold;">Payment Information :</strong><br></div>

					<div style="padding-left: 10px;">

					Cash On Delivery<br> 

					</div>

				</td>

			</tr>

		</tbody></table>

 

                

                

				<table style="color: #333;font-family: sans-serif;font-size: 15px;font-weight: 300;text-align: center;border-collapse: separate;border-spacing: 0;width: 97%;margin: 50px auto 0px; ">

			<thead>

				<tr>

					<th style="font-weight: bold; padding:10px;border: 2px solid #fff; border-bottom:1px solid #ddd;background: #f1f1f1">Item Image</th>

					<th style="font-weight: bold; padding:10px;border: 2px solid #fff; border-bottom:1px solid #ddd;background: #f1f1f1">Item Name</th>

					<th style="font-weight: bold; padding:10px;border: 2px solid #fff; border-bottom:1px solid #ddd;background: #f1f1f1">Quantity</th>

					<th style="font-weight: bold; padding:10px;border: 2px solid #fff; border-bottom:1px solid #ddd;background: #f1f1f1">Price</th>

					<th style="font-weight: bold; padding:10px;border: 2px solid #fff; border-bottom:1px solid #ddd;background: #f1f1f1">Total</th>

				</tr>

			</thead>

			<tbody> 

                 <?php 
                  $total=0;
                 foreach ($orderdetail as $single_order) { ?>
                 
				<tr>

					<td style="border-bottom: 1px solid #ddd; padding:10px;"><img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $single_order['ps_image']; ?>" width="70" height="70"></td>

					<td style="border-bottom: 1px solid #ddd; padding:10px;">

						<div style="width: 300px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;"><?php echo $single_order['product_title']; ?></div>

					</td>

					<td style="border-bottom: 1px solid #ddd; padding:10px;"><?php echo $single_order['order_quantity']; ?></td>

					<td style="border-bottom: 1px solid #ddd; padding:10px;"><?php echo $single_order['pcs_sale']; ?></td>

					<td style="border-bottom: 1px solid #ddd; padding:10px;">$<?php echo $single_order['pcs_sale']*$single_order['order_quantity']; ?></td>

				</tr> 
              <?php $total+=$single_order['pcs_sale']*$single_order['order_quantity']; } ?>
               

				<tr>

					<td colspan="5" style="text-align:right; padding:10px;border-bottom: 1px solid #ddd; padding:10px;">

						<div style="margin-bottom: 5px"><strong style="font-weight:bold;">Sub Total : </strong>$<?php echo  $orderdetail[0]['ord_price']-$orderdetail[0]['ord_shipping'] ?>/- </div>

						<div style="margin-bottom: 10px"><strong style="font-weight:bold;">Shipping : </strong>$<?php echo  $orderdetail[0]['ord_shipping']; ?></div>
						


						<div style="width: 160px;float: right;border-top: 1px solid #ccc;padding-top: 8px;"><strong style="font-weight:bold;">Total : </strong>$<?php echo  $orderdetail[0]['ord_price'] ?>/- </div>

					</td>

				</tr>

				 

			</tbody>

		</table>

		 





		<table style="font-size:15px;font-weight:400;font-family:PT Sans Narrow,Tahoma,Arial,sans-serif;line-height:22px;padding:15px 25px" width="630" cellspacing="0" cellpadding="0" border="0" align="center">

			<tbody><tr>

				<td style="padding:10px 25px;max-width: 250px;;" valign="middle" align="center">

					<p style="margin:0px">

						<strong style="font-weight:bold">Batches "Coffee Beans & Equipment"<br>+965 9874 654</strong>

					</p> 

				</td>

			</tr>

			<tr>

				<td style="text-align: center;font-size: 18px;padding: 7px 0px;">Connect with Us</td>

			</tr>

			<tr>

				<td valign="middle" align="center">

					<a href="#"><img src="http://cripcoin.co/hardwaredev/assets/img/fb.png" alt="" style="display:inline block"></a>

					<a href="#"><img src="http://cripcoin.co/hardwaredev/assets/img/tt.png" alt="" style="display:inline block"></a>

					<a href="#"><img src="http://cripcoin.co/hardwaredev/assets/img/yt.png" alt="" style="display:inline block"></a>

					<a href="#"><img src="http://cripcoin.co/hardwaredev/assets/img/ig.png" alt="" style="display:inline block"></a> 

				</td>

			</tr>

			<tr>

				<td style="padding:10px 25px" valign="middle" align="center">

					<p style="margin:0px"> 11 Harbor Park Drive, Port Washington, N.Y. 11050	</p>

					<p style="margin:0px"> 	© 2020 Industries | All Rights Reserved. Company No. #545435	</p>

				</td>

			</tr>  

		</tbody></table>

 

	</div>





</body></html>