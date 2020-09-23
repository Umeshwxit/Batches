<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {



    public function __construct()

    {

        parent::__construct();

        $this->load->model('Comman_model');

        if(!$this->session->userdata('aid')){

            return redirect('Adminlogin');

        }

         $session_id=$this->session->userdata('aid');

        $table55  = 'admin';

        $where5  = array('admin_id'=> $session_id);

        $user =$this->Comman_model->getdata($table55, $where5);   

        // if ( $user->order_list=='0') {

        // redirect('Admin/not_permission');

        // }

    }



   

    public function index() {

            $this->load->view('admin/header');

            $this->load->view('admin/nav');

            $table  = 'orders';

            $where  = '';

            $oderBy = 'ord_id';        

            $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);    

            $this->load->view('admin/order/order_list',$data);

            $this->load->view('admin/footer');

    }







public function get_again_order($value='')

{

    $table = 'orders';

    $where  = '';

    $oderBy = 'ord_id';        

   $results =$this->Comman_model->getAllData($table, $where, $oderBy); 

            echo json_encode($results);



}

    public function delete()

    {

        $cname= $this->uri->segment(1);

        $coulom= $this->uri->segment(3);

        $table= $this->uri->segment(4);

        $id= $this->uri->segment(5);

        $fname= $this->uri->segment(6);     

        $where = array($coulom =>$id);

        $this->Comman_model->Deletedata($table, $where);

        $msg=$this->session->set_flashdata('msg','order Delete Successfully');

        redirect($cname.'/'.$fname);    

    }

    public function add()

    {

        $this->load->view('admin/header');

        $this->load->view('admin/nav');

        $this->load->view('admin/order/add');

        $this->load->view('admin/footer');

      

    }

    public function insert()

    {

        $order_name = $this->input->post('order_name');

        $ar_order_name = $this->input->post('ar_order_name');

        $order_url = str_replace(" ", "-", strtolower(trim($order_name)));

        $order_url = str_replace("&", "and", $order_url);

       if ($this->form_validation->run('orders') == FALSE) 

        {

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->load->view('admin/header');

            $this->load->view('admin/nav');

            $this->load->view('admin/order/add');

            $this->load->view('admin/footer');

        }

        else

        {

            $data = array('ar_order_name'=>$ar_order_name,'order_name' => $order_name, 'order_url' => $order_url);

            $result = $this->Comman_model->insertData('orders',$data);

                if ($result)

                {

                    $msg=$this->session->set_flashdata('msg','order Add Successfully');

                    return redirect("order");

                }

        }

    }

    public function edit()

    {

        $id= $this->uri->segment(3);

        $table1='orders';

        $where1= array('order_id' => $id);

        $data['update']=$this->Comman_model->getdata($table1, $where1);

        $this->load->view('admin/header');

        $this->load->view('admin/nav');

        $this->load->view('admin/order/edit',$data);

        $this->load->view('admin/footer');

    }

    public function updates()

    {

        $id= $this->input->post('id');

        $order_name = $this->input->post('order_name');

        $ar_order_name = $this->input->post('ar_order_name');

        $order_url = str_replace(" ", "-", strtolower(trim($order_name)));

        $order_url = str_replace("&", "and", $order_url);

       if ($this->form_validation->run('orders1') == FALSE) 

        {

           

       

        $table1='orders';

        $where1= array('order_id' => $id);

        $data['update']=$this->Comman_model->getdata($table1, $where1);

        $this->load->view('admin/header');

        $this->load->view('admin/nav');

        $this->load->view('admin/order/edit',$data);

        $this->load->view('admin/footer');

        }

        else

        {

            $TableName='orders';

            $data = array('ar_order_name'=>$ar_order_name,'order_name' => $order_name, 'order_url' => $order_url);

            $WhereData= array('order_id' =>$id);

            $result = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);

          //  $result = $this->Comman_model->insertData('orders',$data);

                if ($result)

                {

                    $msg=$this->session->set_flashdata('msg','order Add Successfully');

                    return redirect("order");

                }

        }

    }

    



        public function order_cancel_req(){



        $id=$this->uri->segment(4);

        $ord_status=$this->uri->segment(3);

        $TableName  = 'orders';

        $Data = array('ord_status' => $ord_status);

        $WhereData = array('ord_id' => $id);

        $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

        $msg=$this->session->set_flashdata('msg','Order Status Update Successfully');

        redirect("order/order_detail/".$id);



    }

    public function orderstatus_change(){



        $id=$this->input->post('id');

        $ord_status=$this->input->post('ord_status');

        $TableName  = 'orders';

        $Data = array('ord_status' => $ord_status);

        $WhereData = array('ord_id' => $id);

        $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

        $msg=$this->session->set_flashdata('msg','Order Status Update Successfully');



        $ord_user_id=$this->input->post('ord_user_id');

        $ord_driver_id=$this->input->post('ord_driver_id');



        // if ($ord_status=='3') {

        //     $table = 'order_products'; 

        //     $where= array('order_id' => $id);

        //     $oderBy = 'order_product_id';        

        //     $moreorder =$this->Comman_model->getAllData($table, $where, $oderBy); 

        //     foreach ($moreorder as $value) {

        //         $pcs_id=$value->pcs_id;

        //         $WhereData = array('pcs_id' => $pcs_id);

        //         $TableName  = 'product_color_size_record';

        //         $oldqty=$this->Comman_model->getdata($TableName, $WhereData);

        //         $order_quantity=$value->order_quantity+ $oldqty->pcs_qty; 

        //         $Data = array('pcs_qty' => $order_quantity);

        //         $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

        //     }

        // }



        $q=$this->db->query("SELECT `fcm_id` FROM `customer` WHERE `cust_id`='$ord_user_id' ");

        $data=$q->row();

        if ($data) {

            $did= $data->fcm_id;

        }else{

            $did='';

        }



        if($ord_status=='0') {  $ord_status= "Confirmed";} 

        if($ord_status=='1') {  $ord_status= "In Transit";} 

        if($ord_status=='2') {  $ord_status= " Delivered";} 

        if($ord_status=='3') {  $ord_status= "Canceled";}  

        if($ord_status=='4') {  $ord_status= "On The Way";}





        $q=$this->db->query("SELECT `fcmId` FROM `driver` WHERE `id`='$ord_driver_id' ");

        $data=$q->row();

        if ($data) {

            $fcmId= $data->fcmId;

        }else{

            $fcmId='';

        }

        $aaa=$this->send_notification_order($did,$ord_status,$id);

        $aa= $this->send_notification_assign($fcmId,$ord_status,$id);

        redirect("order");



    }



  public function order_detail($id)

    {



            $table1='orders';

            $where1= array('ord_id' => $id);

            $data['orderdetail']=$this->Comman_model->getdata($table1, $where1);



            $table   = 'order_products';

            $where  = array('order_id'=>$id);

            $oderBy = 'order_product_id';        

            $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
            // echo "<pre>";
            // print_r($data['list']);
            // die();
        

        

        $table  = 'driver';

        $where='';

        $oderBy = 'id';        

        $data['driver_list']  =$this->Comman_model->getAllData($table, $where, $oderBy); 

        





            $tableName = 'orders';

            $dataArray = array('ord_view_status' => '1');

            $this->db->where('ord_id',$id);

            $this->db->update($tableName, $dataArray);            



        $this->load->view('admin/header');

        $this->load->view('admin/nav');

        $this->load->view('admin/order/order_detail',$data);

        $this->load->view('admin/footer');

      

    }

       public function driver_list() {

            $this->load->view('admin/header');

            $this->load->view('admin/nav');

            $table  = 'driver';

      //      $where  = array('current_status' => 0,'status'=>1 );

              $where='';

                          $oderBy = 'id';        

            $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);    

            $this->load->view('admin/order/vendor_list',$data);

            $this->load->view('admin/footer');

    }

      public function assignorder()

    {

        $driver_id= $this->uri->segment(3);

        $orderid= $this->uri->segment(4);

        $TableName  = 'orders';

        $Data = array('ord_driver_id' =>$driver_id,'order_phase'=>'2','driver_order_status'=>'4');

        $WhereData = array('ord_id' => $orderid);

        $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);



        $this->db->query("UPDATE `order_products` SET `order_product_status`='3',driver_id='$driver_id'  WHERE `order_id`='$orderid' and `order_product_status` NOT IN(4,5,6)");







        $q=$this->db->query("SELECT `fcmId` FROM `driver` WHERE `id`='$driver_id' ");

        $data=$q->row();

        if ($data) {

        $did= $data->fcmId;

        }else{

        $did='';

        } 



            $orderid='You Have Assign Order . Order Id Is '.$orderid;

            $aaa=$this->send_notification_assign($did,$orderid );

           // print_r(  $aaa);

        $msg=$this->session->set_flashdata('msg','Driver Assign Successfully');

        redirect("order");



    }







 function send_notification_order($registrationIds,$status,$id)

   {

    define( 'API_ACCESS_KEY', 'AIzaSyB4hS3mmzigTGx5DcPfgx2TRN_Q6EM6ixQ' );

    $msg = array(

        'body'  => 'Order Status - '.$status,

        'title' =>'Order id #'.$id,

        'icon'  => 'myicon',/*Default Icon*/

        'sound' => 'mySound',/*Default sound*/

        'redirect_to'=>'order_detail'

    );

    $fields = array(

        'to'        => $registrationIds,

        'notification'  => $msg

    );    

    $headers = array(

        'Authorization: key=' . API_ACCESS_KEY,

        'Content-Type: application/json'

    );

    #Send Reponse To FireBase Server    

    $ch = curl_init();

    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );

    curl_setopt( $ch,CURLOPT_POST, true );

    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );

    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );

    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );

    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

    $result = curl_exec($ch);

    curl_close($ch);

    #Echo Result Of FireBase Server

      // echo "</br>";

    return $result;

   }





 function send_notification_assign($registrationIds,$status){

    define( 'API_ACCESS_KEY_driver', 'AIzaSyAvucAGUplFz0UPjxjfydZndKVoN6eXjUc' );

    $msg = array(

        'body'  => $status,

        'title' =>'Order Assign',

        'icon'  => 'myicon',/*Default Icon*/

        'sound' => 'mySound',/*Default sound*/

        'redirect_to'=>'order_detail'

    );

    $fields = array(

            'to'        => $registrationIds,

            'notification'  => $msg

        );    

    $headers = array

        (

            'Authorization: key=' . API_ACCESS_KEY_driver,

            'Content-Type: application/json'

        );

        #Send Reponse To FireBase Server    

        $ch = curl_init();

        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );

        curl_setopt( $ch,CURLOPT_POST, true );

        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );

        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );

        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );

        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

        $result = curl_exec($ch);

        curl_close($ch);

        #Echo Result Of FireBase Server

        // echo "</br>";

        return $result;

   }





public function get_order_list_again()

{?>

    



     <script>

        $('#html5-extension').DataTable( {

            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5 mb-md-0 mb-5"i><"col-md-7"p>>> >',

            buttons: {

                buttons: [

                    { extend: 'copy', className: 'btn btn-default btn-rounded btn-sm mb-4' },

                    { extend: 'csv', className: 'btn btn-default btn-rounded btn-sm mb-4' },

                    { extend: 'excel', className: 'btn btn-default btn-rounded btn-sm mb-4' },

                    { extend: 'print', className: 'btn btn-default btn-rounded btn-sm mb-4' }

                ]

            },

            "language": {

                "paginate": {

                  "previous": "<i class='flaticon-arrow-left-1'></i>",

                  "next": "<i class='flaticon-arrow-right'></i>"

                },

                "info": "Showing page _PAGE_ of _PAGES_"

            }

        } );

    </script>

    <table id="html5-extension" class="table table-striped table-bordered table-hover" style="width:100%">                                        <thead>

                                            <tr>

                                                <th style="display: none;"></th>

                                            <th>Order ID</th>

                                            <th>Customer Name</th>

                                            <th>Order Date</th>                     

                                            <th>Order Status</th>

                                            <th>Update Status</th>

                                            <th>Assign Driver</th>

                                            <th>Action</th>

                                                

                                            </tr>

                                        </thead>

                                        <tbody>

                            <?php

                             $table = 'orders';

            $where  = '';

            $oderBy = 'ord_id';        

            $list  =$this->Comman_model->getAllData($table, $where, $oderBy); 

             $i=0;foreach ($list as $each_data) {?>

                                            <tr>

                                                <td style="display: none;"></td>

        <td class="text-primary"><?php echo $each_data->ord_id; ?></td>

        <td><?php echo $each_data->ord_bill_fname." ".$each_data->ord_bill_lname; ?></td>

        <td><?php echo $each_data->ord_date; ?></td>



                                   <td class="align-center">

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

<?php } ?>





                                </td>

                                 <td>

<form action="<?php echo base_url(); ?>Order/orderstatus_change/" method="post">

<input type="hidden" value="<?php echo $each_data->ord_id; ?>" name="id">

<input type="hidden" value="<?php echo $each_data->ord_user_id; ?>" name="ord_user_id">

<input type="hidden" value="<?php echo $each_data->ord_driver_id; ?>" name="ord_driver_id">





<select name="ord_status" onchange="this.form.submit()">

<option>Select Status</option>

<option   <?php if($each_data->ord_status=='1') {  echo "selected";} ?> value="1" >In Transit</option>

<option   <?php if($each_data->ord_status=='0') {  echo "selected";} ?> value="0" >Confirmed</option>

<option   <?php if($each_data->ord_status=='2') {  echo "selected";} ?>  value="2">Delivered</option>

<option   <?php if($each_data->ord_status=='3') {  echo "selected";} ?>  value="3">Canceled</option>

<option   <?php if($each_data->ord_status=='4') {  echo "selected";} ?>  value="4">On The Way</option>

</select>

</form>

</td>

           

                <td class="align-center">

            <?php  if($each_data->ord_driver_id=='0'){



                    $orderid=$each_data->ord_id;                

                    $is_assign=$this->Comman_model->getorder_submit_toadmin($orderid);

                    if(empty($is_assign)){  

                       if($each_data->ord_status=='3')

                       { 

                        echo '<span class="badge badge-danger">Cancel</span>';}else{

             ?>



            <a href="<?php echo base_url() ?>order/driver_list/<?php echo $each_data->ord_id  ?>"  class="btn btn-default btn-sm"><i class="icon-search"></i> Assign Driver</a>









        <?php } }else{



if($each_data->ord_status=='3')

                       { 

                        echo '<span class="badge badge-danger">Cancel</span>';}else{

                        ?>

<a href="<?php echo base_url() ?>order/order_detail/<?php echo $each_data->ord_id  ?>"  class="btn btn-default btn-sm"><i class="icon-search"></i> View</a>



<?php } }?>



            <?php } else{?>



            <?php 

            $ord_driver_id=$each_data->ord_driver_id;

            $table1='driver';

            $where1= array('id' => $ord_driver_id);

            $driver_data=$this->Comman_model->getdata($table1, $where1);



            ?> <a href="<?php echo base_url() ?>driver/order_list/<?php echo $each_data->ord_driver_id ?>"> <span class="badge badge-primary"><?php if(!empty($driver_data->name)){ echo $driver_data->name; } ?></span>

            </a>

            <?php } ?>

            </td>







                                  <td class="align-center"><a href="<?php echo base_url() ?>order/order_detail/<?php echo $each_data->ord_id; ?>"  class="btn btn-default btn-sm"><i class="icon-search"></i> View</a></td>





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

                                            <th>Assign Driver</th>

                                            <th>Action</th>                                         

                                            </tr>

                                        </tfoot>

                                    </table>

<?php }





public function update_driver_into_order_product()

    {

         $order_product_id= $this->input->post('order_product_id');

         $order_id= $this->input->post('order_id');

         $driver_id= $this->input->post('driverid');



        $TableName  = 'order_products';

        $Data = array('driver_id' =>$driver_id);

        $WhereData = array('order_product_id' => $order_product_id);

        $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);



        $q=$this->db->query("SELECT `fcmId` FROM `driver` WHERE `id`='$driver_id' ");

        $data=$q->row();

        if ($data) {

        $did= $data->fcmId;

        }else{

        $did='';

        }

        //$orderid='You Have Assign Order . Order Id Is '.$order_id;

        $q1=$this->db->query("SELECT `product_id` FROM `order_products` WHERE `order_product_id`='$order_product_id' ");

        $data1=$q1->row();

        if(!empty($data1)){

            $q2=$this->db->query("SELECT `product_title` FROM `products` WHERE `product_id`='$data1->product_id' ");

            $data2=$q2->row();

            $orderid='you have a product pickup '.$data2->product_title.' (Order Id : '.$order_id.')';

        }else{

            $orderid='You Have Assign Order .';

        }

        $aaa=$this->send_notification_assign($did,$orderid);

        //print_r(  $aaa);

        $msg=$this->session->set_flashdata('msg','Driver Assign Successfully');

        redirect("order/order_detail/".$order_id);



    }







  public function product_status_update()

    {

        $status= $this->uri->segment(3);

        $order_product_id= $this->uri->segment(4);

        $order_id= $this->uri->segment(5);

        if ($status=='4') {

         $table1='order_products';

        $where1= array('order_product_id' => $order_product_id);

        $order_data=$this->Comman_model->getdata($table1, $where1);

          $pcs_id= $order_data->pcs_id;

         $order_quantity= $order_data->order_quantity;





     $table1='product_color_size_record';

        $where1= array('pcs_id' => $pcs_id);

        $stock=$this->Comman_model->getdata($table1, $where1);

$pcs_qty=$stock->pcs_qty;



            $TableName  = 'product_color_size_record';

        $Data = array('pcs_qty' =>$order_quantity+$pcs_qty);

        $WhereData = array('pcs_id' => $pcs_id);

        $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);



        }



        $TableName  = 'order_products';

        $Data = array('order_product_status' =>$status);

        $WhereData = array('order_product_id' => $order_product_id);

        $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

        redirect("order/order_detail/".$order_id);



            }









public function get_order_status($id)

{

    $table1='orders';

        $where1= array('ord_id' => $id);

        $each_data=$this->Comman_model->getdata($table1, $where1); ?>

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



<?php }



public function get_order_status_drop($id)

{

    $table1='orders';

        $where1= array('ord_id' => $id);

        $each_data=$this->Comman_model->getdata($table1, $where1); ?>

        

                   <option>Select Status</option>



                <option   <?php if($each_data->ord_status=='1') {  echo "selected";} ?> value="1" >In Transit</option>

                <option   <?php if($each_data->ord_status=='0') {  echo "selected";} ?> value="0" >Confirmed</option>

                <option   <?php if($each_data->ord_status=='2') {  echo "selected";} ?>  value="2">Delivered</option>

                <option   <?php if($each_data->ord_status=='3') {  echo "selected";} ?>  value="3">Canceled</option>



                <option   <?php if($each_data->ord_status=='4') {  echo "selected";} ?>  value="4">On The Way</option>

                <option   <?php if($each_data->ord_status=='5') {  echo "selected";} ?>  value="5">Refund  Requested</option>

                <option   <?php if($each_data->ord_status=='6') {  echo "selected";} ?>  value="6">Refund Disapproved</option>



<?php 





}













        public function product_submit_toadmin()

        {

            $status= $this->uri->segment(3);

            $order_product_id= $this->uri->segment(4);

            $order_id= $this->uri->segment(5);

            $driver_id= $this->uri->segment(6);

            $TableName  = 'order_products';

            $Data = array('order_product_status' =>$status);

            $WhereData = array('order_product_id' => $order_product_id);

            $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

            $q=$this->db->query("SELECT * FROM `order_products` WHERE `order_id`='$order_id' and `order_product_status` NOT IN(4,5,6,3)");

            $data=$q->result();

            if (empty($data)) {

            $TableName  = 'orders';

            $Data = array('driver_order_status' =>'3');

            $WhereData = array('ord_id' => $order_id);

            $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);



                 $q=$this->db->query("SELECT `fcmId` FROM `driver` WHERE `id`='$driver_id' ");

        $data=$q->row();

        if ($data) {

        $did= $data->fcmId;

        }else{

        $did='';

        }      

            $msg='Submited To Admin';

       

        $aaa=$this->send_notification_assign($did,$msg);



            }else{



           }

        redirect("order/order_detail/".$order_id);



        }



public function aprrove_all()

        {

            $status= $this->uri->segment(3);

            $order_product_id= $this->uri->segment(4);

            $order_id= $this->uri->segment(5);

            $this->db->query("UPDATE `order_products` SET `order_product_status`='3'  WHERE `order_id`='$order_product_id' and `order_product_status` NOT IN(4,5,6)");



                $TableName  = 'orders';

                $Data = array('driver_order_status' =>'3');

                $WhereData = array('ord_id' => $order_product_id);

                $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);



                $q1=$this->db->query("SELECT `driver_id` FROM `order_products` WHERE  `order_id`='$order_product_id' and `order_product_status` NOT IN(4,5,6) ");

                $driverdetail=   $q1->result();

                foreach ($driverdetail as $key => $value) {

                $driver_id=$value->driver_id;

                $q=$this->db->query("SELECT `fcmId` FROM `driver` WHERE `id`='$driver_id' ");

                $data=$q->row();

                if ($data) {

                $did= $data->fcmId;

                $msg='Submited To Admin';

                $aaa=$this->send_notification_assign($did,$msg);

                }else{

                $did='';

                }      



}

            redirect("order/order_detail/".$order_id);



        }





}

