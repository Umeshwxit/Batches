<div id="content" class="main-content">

    <div class="container">

        <div class="page-header">

            <div class="row">

                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12   page-title">

                    <h3>Order Details #<?php echo $this->uri->segment(3); ?></h3>

                </div>



            </div>

        </div>

        <?php if($this->session->flashdata('error')){?>

        <div class="alert alert-danger mb-4" role="alert"> <i class="flaticon-cancel-12 close" data-dismiss="alert"></i>

            <strong>Error!</strong> <?php  echo $this->session->flashdata('msg');?></div>



        <?php  }            ?>





        <div class="row">





            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">

                <div class="statbox widget box box-shadow">



                    <div class="widget-content widget-content-area">

                        <h2>Customer Details</h2>

                        <table class="table">

                            <thead>

                                <tr>

                                    <th>First Name</th>

                                    <th>Last Name</th>

                                    <th>Email</th>

                                    <th>Phone</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td><?php  echo $orderdetail->ord_bill_fname ?></td>

                                    <td><?php  echo $orderdetail->ord_bill_lname ?></td>

                                    <td><?php  echo $orderdetail->ord_bill_email ?></td>

                                    <td><?php  echo $orderdetail->ord_bill_phone ?></td>

                                </tr>



                            </tbody>

                        </table>

                        <h5>Billing Details</h5>



                        <table class="table">



                            <tbody>

                                <tr>

                                    <td> First Name</td>

                                    <td><?php  echo $orderdetail->ord_ship_fname ?></td>



                                </tr>

                                <tr>

                                    <td> Last Name</td>

                                    <td><?php  echo $orderdetail->ord_ship_lname ?></td>



                                </tr>

                                <tr>

                                    <td> Email </td>

                                    <td><?php  echo $orderdetail->ord_ship_email ?></td>



                                </tr>

                                <tr>

                                    <td> Phone </td>

                                    <td><?php  echo $orderdetail->ord_ship_phone ?></td>



                                </tr>

                                <tr>

                                    <td>Address</td>

                                    <td>

                                        <b>Address</b> <?php  echo $orderdetail->ord_ship_address ?>

                                       

                                         <?php  echo $orderdetail->address ?>

                                      

                                        <span><b>City:</b><?php  echo $orderdetail->ord_ship_city ?> </span></br>

                                        <span><b>Zip:</b><?php  echo $orderdetail->ord_ship_zip ?> </span></br>

                                    </td>



                                </tr>

                           





                            </tbody>

                        </table>





                        <h4>Product List</h4>

                  

 

<table  class="table table-striped table-bordered table-hover" style="width:100%">

                            <thead>

                                <tr>

                                    <th>Image</th>

                                    <th>Title</th>

                                    <th>Quantity</th>

                                    

                                    <th>Size</th>

                                    <th>Price</th>

                                

                                </tr>

                            </thead>

                            <tbody>

                                <?php 

                                $total=0;

                                foreach ($list as $key => $value) {?>

                                <?php  

                 $pcsids=$value->pcs_id;

                $table1='product_color_size_record';

                $where1= array('pcs_id' => $pcsids);

                $pcsidsarray=$this->Comman_model->getdata($table1, $where1);

                 $pid=$value->product_id;

                $table1='products';

                $where1= array('product_id' => $pid);

                $product=$this->Comman_model->getdata($table1, $where1);

               

                ?>

                                <tr>

                                    <td><img src="<?php echo base_url() ?>uploads/gallery/<?php  echo $product->ps_image ?>"

                                            style="height:50px;widht:50px;"></td>

                                    <td>

                                        <?php   

               

                echo $product->product_title;

            ?>

                                    </td>

                                    <td>

                                        <?php  echo $value->order_quantity ?>

                                    </td>

                                    

                                    <td>

                                        <?php   

                $sid=$pcsidsarray->pcs_size;

                $table1='sizes';

                $where1= array('size_id' => $sid);

                $size=$this->Comman_model->getdata($table1, $where1);

                echo $size->size_name;

            ?>



                                    </td>

                                    <td>$ <?php  echo number_format($pcsidsarray->pcs_sale*$value->order_quantity,2);
                                    $total+=$pcsidsarray->pcs_sale*$value->order_quantity;

                                     ?>

                                    </td>

                                                                 </tr>

                                <?php }?>



<?php if ($orderdetail->ord_coupon) { ?>

                    <tr>

                   

                   

                    <td></td>

                    <td></td>

                    <td><b>Coupon Apply (<?php echo $orderdetail->ord_coupon; ?>): -</b></td>



                    <td>

                        

                       <?php   

            $coupon_code = $orderdetail->ord_coupon;   

              

            $data1=array('cup_name'=>$coupon_code);

            $check_coupon = $this->Comman_model->getdata('coupons', $data1);



            if ($check_coupon->cup_type=='percent') {

         echo $value=$check_coupon->cup_value.' %';

            $value= $total*$check_coupon->cup_value/100;

    $after_dis_amt= $total-$value;



            }else if($check_coupon->cup_type=='flat')

            {

            echo $check_coupon->cup_value.' flat';



    }?>

  



                    </td>

                    </tr>



<?php }?>

                                <tr>

                                    <td><b>Payment Mode :- </b></td>

                                    <td><?php  echo $orderdetail->ord_payment ?></td>

                                    <td></td>

                                    <td></td>

                                  

                                    <td style="    width: 111px;"><b>Shipping Cost:</b><b>SubTotal : </b><br><b>Total : -</b></td>



                                    <td style="    width: 95px;"> 

                                        $<?php  echo $orderdetail->ord_shipping ?><br>

                                        $ <?php  echo number_format($orderdetail->ord_price-$orderdetail->ord_shipping,3) ?>
                                        <br>$
                                        <?php echo number_format($orderdetail->ord_price,3) ?>

         

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>



    </div>

</div>

<!--  END CONTENT PART  -->



</div>

<!-- END MAIN CONTAINER -->