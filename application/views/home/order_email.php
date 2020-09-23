<?php    

error_reporting(0);
$ord_key=$order_data[0]->ord_key;
$ord_id=$order_data[0]->ord_id;
$ord_bill_fname=$order_data[0]->ord_bill_fname;
$ord_qty=$order_data[0]->ord_qty;
$q= $this->db->query("SELECT * FROM orders WHERE ord_key='$ord_key' limit 1");
 $row1=$q->result_array();
$row=$row1[0];
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <div style="background:#2f2771;text-align:center;max-width: 1000px;margin: auto;">
  <div style="background:#2f2771;">
    <div style="background:#ffffff;margin: auto;border: 10px solid #2f2771;padding: 30px 15px;">
      <div style="font-family:Roboto Slab,sans-serif;color:#193769;font-size:18px;font-weight:bold;text-align:center;padding:12px 0px 0px">
          <center>
              <img src="http://paylater.com.kw/paylater/img/plLogo.svg" class="CToWUd"  style="background: #2f2771;height: 45px;">
          </center>
    </div>
    <hr style="border:1px solid #2f2771;width:80%">
    <div style="text-align:center;color:#193769;font-family:Roboto Slab,sans-serif;font-size:16px;font-weight:400;padding:20px;line-height:1.8">
          Hi <b> <?php echo $ord_bill_fname; ?>,</b> Thank you for your order your order id is #<?php echo $ord_id; ?> 


     <table class="table"  align="center" width="100%" border="1px" rules="all" >
                            <thead>
                                <tr>
                                  <th>Title</th>
                                    <th>Quantity</th>
                                  <!--   <th>Color</th>
                                    <th>Size</th> -->
                                    <th>Price</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $key => $value) {?>
                                <?php  
                 $pcsids=$value->pcs_id;
                $table1='product_color_size_record';
                $where1= array('pcs_id' => $pcsids);
                $pcsidsarray=$this->Comman_model->getdata($table1, $where1);
               
                ?>
                                <tr>
                                  
                                    <td>
                                        <?php   
                $pid=$value->product_id;
                $table1='products';
                $where1= array('product_id' => $pid);
                $product=$this->Comman_model->getdata($table1, $where1);
                echo $product->product_title;
            ?>
                                    </td>
                                    <td>
                                        <?php  echo $value->order_quantity ?>
                                    </td>
                                 <!--    <td><?php   
                $cid=$pcsidsarray->pcs_color_id;
                $table1='colors';
                $where1= array('color_id' => $cid);
                $color=$this->Comman_model->getdata($table1, $where1);
                echo $color->color_name;
            ?>

                                    </td>
                                    <td>
                                        <?php   
                $sid=$pcsidsarray->pcs_size;
                $table1='sizes';
                $where1= array('size_id' => $sid);
                $size=$this->Comman_model->getdata($table1, $where1);
                echo $size->size_name;
            ?>

                                    </td> -->
                                    <td>KD <?php  echo number_format($pcsidsarray->pcs_sale*$value->order_quantity,3) ?>
                                    </td>
                                  



                                </tr>
                                <?php }?>


                                <tr>
                                    <td><b>Payment Mode :- </b><?php  echo $order_data[0]->ord_payment ?></td>
                                    
                                    <td><b>Total : -</b></td>

                                    <td>KD <?php  echo  $order_data[0]->ord_price;  //number_format($orderdetail->ord_price,2); ?></td>
                                </tr>
                            </tbody>
                        </table>     
       
    </div>
    <div style="text-align:center;font-family:Roboto Slab,sans-serif;color:#193769;font-size:16px;font-weight:400;padding:20px;line-height:1.8">
        For any help or assistance, reach out to us anytime at <a style="font-size:12px" href="mailto:info@paylater.com" style="text-decoration: none; color: #0451A5"  target="_blank">info@paylater.com</a>
    </div>
    <hr style="border:1px solid #0451A5;width:80%">
    <div style="text-align:center;font-family:Roboto Slab,sans-serif;font-size:16px;font-weight:500;font-style:italic;color:#a9a9a9;line-height:1.8">
      Kind Regards,<br>
      <div style="text-align:center;font-family:Roboto Slab,sans-serif;color:#193769;font-size:16px;font-weight:bolder">
      paylater </div>
    </div>
  </div>
  <div style="font-family:Roboto Slab,sans-serif;text-align:center;color:#193769;padding: 0px 0 10px;font-family:Roboto Slab,sans-serif;font-size:15px;margin:auto;">
  <!--   <p style="font-family:Roboto Slab,sans-serif;font-size:15px;color:#fff;font-weight:600">For any queries, please call +965 180-0881
    <span ></span></p> -->
      <div class="yj6qo"></div><div class="adL"></div>
  </div></div>

</body>
</html>
