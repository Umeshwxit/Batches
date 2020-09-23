<?php
class Ajax extends CI_Controller
{

	public function __construct() {
        parent::__construct();
        $this->load->model('Comman_model');
        
    }
    public function delete_row(){
		$id = $this->input->post('id');
		$where = array('id' =>$id);
		

	}
	public function find_subcat()
	{
	    	$cat = $this->input->post('cat_name');
	    	$table='subcategories';
	    	$where= array('subcategory_catid' =>$cat);
	    	$oderBy='';
	    	$this->load->model("Comman_model");
	    	$result['subcat'] = $this->Comman_model->getAllData($table, $where, $oderBy);
	    	if(empty($result['subcat'])){?>
	<option value="0" >Select Sub Category</option>
		<?php 	}else{
			foreach($result['subcat'] as $sub){
			?>
			<option value="<?php echo $sub->subcategory_id; ?>"><?php echo $sub->subcategory_name; ?></option>
			<?php
			}
			}

	}
	public function sizes_input(){
	     $size_id = $this->input->post('size_id');
	 
	    ?>
	       <input type="hidden"  name="size_id[]" value="<?php echo $size_id; ?>" id="<?php echo $size_id; ?> "/><br/>
	     MRP Price : <input  style="margin-bottom: 10px;"  onkeyup="get_value(this);" type="text" id="price_mrp<?php echo $size_id; ?>" name="price_mrp[]" value="" required class="<?php echo $size_id; ?>" /><br/>
	     Sale Price : <input style="margin-bottom: 10px;"  type="text" name="price_sale[]" value="" id="price_sale<?php echo $size_id; ?>" /><br/>
	     Quantity : <input style="margin-bottom: 10px;" type="text" name="quantity[]" value="" required><br/>
	     Sku :      <input style="margin-bottom: 10px;"  type="text" name="sku[]" value="" required><br/>
	     
	    <?php
	    
	}

	public function changeLanguage(){
		$language = $this->input->post('language');
		if(!empty($language)){
			if($language == "langEnglish"){
				$this->session->unset_userdata('site_lang');
				$this->session->set_userdata('site_lang','english');
			}else if($language == "langArabic"){
				$this->session->unset_userdata('site_lang');
				$this->session->set_userdata('site_lang','arabic');
			}
			echo 'true';
			die;
		}
	}

public function sizes_inputnew()
		{

	    $size_id = $this->input->post('size_id');
	    $prid = $this->input->post('prid');	    
	    $pscid = $this->input->post('pscid');	    
	    if($size_id!="0"){
	    $q=$this->db->query("SELECT * FROM `product_color_size_record` WHERE `pcs_id`='$pscid'  ");
	   $data= $q->row();

	    ?>

<input type="hidden"  name="size_id[]"  value="<?php echo $size_id; ?>" id="<?php echo $size_id; ?> "/><br/>
MRP Price : <input   style="margin-bottom: 10px;"  type="text" name="price_mrp[]"   value="<?php echo  $data->pcs_mrp ?>"  required="" class="<?php echo $size_id; ?>"  id="price_mrp<?php echo $size_id; ?>"  /><br/>


Sale Price : <input  style="margin-bottom: 10px;" type="text"  name="price_sale[]" id="price_sale<?php echo $size_id; ?>" value="<?php echo  $data->pcs_sale ?>"  /><br/>
Quantity : <input style="margin-bottom: 10px;" type="text" name="quantity[]"  value="<?php echo  $data->pcs_qty ?>" required><br/>
	     Sku :      <input style="margin-bottom: 10px;"  type="text" name="sku[]" value="<?php echo  $data->sku ?>" required><br/>

	      	    <?php
	    }else{
	        
	    }
	}
	function livesearch()
{
  // ini_set('display_errors', 0);

     $nam = $this->input->GET('q');

   $pro=$this->db->query("SELECT * FROM `products` WHERE `product_title` AND `product_status` = '1' LIKE '%$nam%' ORDER BY `product_id` ASC");
   $liv=$pro->result();
    if(empty($liv))
    {
        echo "no suggestion";
    }
    else
    {
    	echo "<ul style='padding:0'>";
       foreach ($liv as $key => $value) {
	# code...

        ?> <li style="list-style-type: none;padding:5px"  id="<?php echo $value->product_id; ?>" > <?php echo $value->product_title; ?> </li> 
        			<?php 
       }

       echo "</ul>";
       
    }
    
    
    
    
}


		public function user_login()
		{

		$this->load->model("Comman_model");
		$user_mobile = $this->input->post('user_mobile');
		$password = $this->input->post('password');
		$table='customer';
		$data = array('cust_phone' => $user_mobile,'cust_pass' => $password,'cust_type'=>'customer');
		$userdata = $this->Comman_model->getdata($table, $data);

	$table='customer';
		$data = array('cust_phone' => $user_mobile,'cust_type'=>'customer');
		$userdata1 = $this->Comman_model->getdata($table, $data);
		if (empty($userdata1)) {
			echo "false2";
		}else if (empty($userdata)) {
echo 'false';
return;
	// echo "Please Check Username password";

}else{

	if($userdata->cust_status=='1')
{

	$this->session->set_userdata('cid',$userdata->cust_id);
	$this->session->set_userdata('cust_fname',$userdata->cust_fname);
	$this->session->set_userdata('cust_lname',$userdata->cust_lname);
	$this->session->set_userdata('cust_email',$userdata->cust_email);
	$this->session->set_flashdata('login_success','Login Success');
	$guestid=$this->session->userdata('guestid'); 
	$loginuser=$this->session->userdata('cid'); 
	$TableName='cart';
	$data = array('cart_user_id'=>$loginuser);
	$WhereData= array('cart_user_id' =>$guestid);
	$result = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);
	$this->session->set_userdata('guestid',$loginuser);
		
	// echo "Login Success";

echo 'true';
return;
}
else
{
	echo 'false1';
return;
}


}


		}




	public function user_register(){
		$this->load->model("Comman_model");
		$cust_fname = $this->input->post('fname');
		$cust_lname = $this->input->post('lname');
		$cust_email = $this->input->post('email');
		$cust_phone = $this->input->post('user_mobile');
		$cust_pass = $this->input->post('password');
		$table='customer';
		$data1 = array('cust_phone' => $cust_phone,'cust_type'=>'customer');
		$usercust_phone = $this->Comman_model->getdata($table, $data1);
		$data11 = array('cust_email' => $cust_email,'cust_type'=>'customer');
		$usercust_email = $this->Comman_model->getdata($table, $data11);
		if (!empty($usercust_phone)) {
		echo "Phone already Exist";
		}else if (!empty($usercust_email)) {
		echo "Email already Exist";
		}else{
		$data = array(
			'cust_fname' => $cust_fname,
			'cust_lname' => $cust_lname, 
			'cust_email' => $cust_email,
			'cust_phone' => $cust_phone,
			'cust_pass' => $cust_pass,
			'cust_type' => 'customer',
			'cust_status' => 1
		);
		$result = $this->Comman_model->insertData('customer',$data);
		if ($result) {
				$this->session->set_userdata('cid',$result);
				$this->session->set_userdata('cust_fname',$cust_fname);
				$this->session->set_userdata('cust_lname',$cust_lname);
				$this->session->set_userdata('cust_email',$cust_email);
				$this->session->set_userdata('guestid',$result);
			echo "Register success";
		}else{
			echo "Unable to  success";
		} 
    }

}
public function get_image_by_colour()
{
	$colours = $this->input->post('colours');
	$sizes = $this->input->post('sizes');
	$prid = $this->input->post('prid');
	$images = $this->Comman_model->get_image_by_colour($prid,$colours);
	$str = $images->ps_gallery;
	$array = explode(",",$str);
	$productData = array();
	for ($i=0; $i <count($array) ; $i++){
		$productData['images'][$i] = $array[$i];
	}
	echo json_encode($productData);
}
	
public function get_size_by_colour(){
	$colours = $this->input->post('colours');
	$sizes = $this->input->post('sizes');
	$prid = $this->input->post('prid');
	$sizes = $this->Comman_model->get_size_by_colour($prid,$colours);
	$productSize = array();
	foreach($sizes as $key12 => $each_size ){   
		$productSize['size'][$key12] = $each_size->pcs_size.','.$each_size->size_name;
	}
	echo json_encode($productSize);
}

public function get_price_by_colour(){
	$colours = $this->input->post('colours');
	$sizes = $this->input->post('sizes');
	$prid = $this->input->post('prid');
	$price = $this->Comman_model->get_price_by_colour($prid,$colours);
	$productPrice = array();
	$productPrice['price'] = $price->pcs_sale;
	echo json_encode($productPrice);
}

public function get_price_by_size()
{
	$colours = $this->input->post('colours');
	$sizes = $this->input->post('sizes');
	$prid = $this->input->post('prid');
	$price = $this->Comman_model->get_price_by_size($prid,$sizes);
    echo $price->pcs_sale; ?>
    <input type="hidden" value="<?php echo $price->pcs_sale ?>" id="product_price" name="product_price"> 
<?php 
}

public function add_tocart(){
	$colour_id = $this->input->post('colour_id');
	$size_id = $this->input->post('size_id');
	$product_price = $this->input->post('product_price');
	$prid = $this->input->post('prid');
	$product_id = $this->input->post('product_id');
	$vendor_id = $this->input->post('vendor_id');
	$qty = $this->input->post('qty');
	error_reporting(0);
	$pcsid = $this->Comman_model->get_pcsid_by_sizecolour($prid,$colour_id,$size_id);	
	$pcs_id = $pcsid->pcs_id;
	$table1 = 'cart';
	$data1 = array(
		'cart_color_id' => $colour_id,
		'cart_size_id' => $size_id,
		'cart_product_id' => $product_id  ,
		'cart_user_id' => $this->session->userdata('guestid'),      
	);
	$check_cart = $this->Comman_model->getdata($table1, $data1);
	if($pcsid->pcs_qty <= 0){
		echo $this->lang->line('out_of_stock');
	}else{
		if(empty($check_cart )){
			$data = array(
				'cart_user_id' => $this->session->userdata('guestid'),
				'cart_product_id' => $product_id,
				'cart_vendor_id' => $vendor_id,
				'cart_qty' => 1,
				'cart_product_random' => $prid,
				'cart_price' => $product_price,
				'cart_color_id' => $colour_id,
				'cart_size_id' => $size_id,
				'cart_pcs_id' => $pcs_id	 
			);
			$result = $this->Comman_model->insertData('cart',$data);
			if($result){
				echo $this->lang->line('add_to_cart_success');
			}else{
				echo "Unable to add";
			}
		}else{
			echo $this->lang->line('already_to_cart');
		}
	}
	if(!empty($this->session->userdata('guestid'))){
		$ctable = 'cart';
		$cdata = array('cart_user_id' => $this->session->userdata('guestid'));
		$cartData = $this->Comman_model->getcartdata($ctable, $cdata);
		if(!empty($cartData)){
		   echo '.'.count($cartData);
		}
	}
}


	public function remove_cart(){
		$id = $this->input->post('cartid');
		$where = array('cart_id' =>$id);
		$this->Comman_model->Deletedata('cart', $where);
		echo "Remove from cart";
		if(!empty($this->session->userdata('guestid'))){
			$ctable = 'cart';
			$cdata = array('cart_user_id' => $this->session->userdata('guestid'));
			$cartData = $this->Comman_model->getcartdata($ctable, $cdata);
			if(!empty($cartData)){
			   echo '.'.count($cartData).',';
			}else{
			   echo '.0,'.$this->lang->line('cart_empty');
			}
		}
	}

public function update_cart_qtyminus()
{
	$cart_id = $this->input->post('cart_id');
	$cart_pcs_id = $this->input->post('cart_pcs_id');
	 $table1='product_color_size_record';
        $data1 = array(
        	'pcs_id' =>$cart_pcs_id        	      
        );
    
    	$check_cart = $this->Comman_model->getdata($table1, $data1);
    	$table='cart';
		$data = array(
		'cart_id' =>$cart_id        	      
		);
		$check_cart_qty = $this->Comman_model->getdata($table, $data);
    	if ($check_cart->pcs_qty>0) {
    			
    		if ($check_cart_qty->cart_qty>1) {

			$TableName='cart';
			$data = array('cart_qty'=>$check_cart_qty->cart_qty-1);
			$WhereData= array(
			'cart_id' =>$cart_id        	      
			);
			$result = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);		
			echo 'true';
			//echo "Cart updated";

    		}else{

    		//echo "Product Out Of Stock";
		echo 'false';

    		}
    	
    	}else{

		$where = array('cart_id' =>$cart_id);
		$this->Comman_model->Deletedata('cart', $where);

    		//echo "Product Out Of Stock";
		echo 'false';

    	}


}



public function update_cart_qtyplus()
{
	$cart_id = $this->input->post('cart_id');
	$cart_pcs_id = $this->input->post('cart_pcs_id');
	 $table1='product_color_size_record';
        $data1 = array(
        	'pcs_id' =>$cart_pcs_id        	      
        );

    	$check_cart = $this->Comman_model->getdata($table1, $data1);
    	$table='cart';
		$data = array(
		'cart_id' =>$cart_id        	      
		);
		$check_cart_qty = $this->Comman_model->getdata($table, $data);
    	if ($check_cart->pcs_qty>0) {
    			
    		if ($check_cart->pcs_qty>$check_cart_qty->cart_qty) {

    			$TableName='cart';
		$data = array('cart_qty'=>$check_cart_qty->cart_qty+1);
		$WhereData= array(
		'cart_id' =>$cart_id        	      
		);
		$result1 = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);		
		echo 'true';
    		//echo "Cart updated";
    		}else{
    		//echo "Product Out Of Stock";
		echo 'false';

    		}
    	
    	}else{

    	$where = array('cart_id' =>$cart_id);
		$this->Comman_model->Deletedata('cart', $where);

    		//echo "Product Out Of Stock";
		echo 'false';

    	}



}


public function get_cart_total()
{
	 $guestid=$this->session->userdata('guestid');


	 $q=$this->db->query("SELECT sum(`cart_qty`*`cart_price`) as total FROM `cart` WHERE `cart_user_id`='$guestid'");
	 $data=$q->row();
	echo  number_format($data->total,3);

    	
	
}

public function new_checkout($value='')
 {

 $firstname = $this->input->post('firstname'); 
 $lastname = $this->input->post('lastname');
 $email = $this->input->post('email');
 $password = $this->input->post('password');
 $street = $this->input->post('street');
 $country = $this->input->post('country');
 $city = $this->input->post('city');
  $state2 = $this->input->post('state2');
  $state = $this->input->post('state');
  $zipcode = $this->input->post('zipcode');
 $mobile_number = $this->input->post('mobile_number');
 $total = $this->input->post('total');
 $coupon_code = $this->input->post('coupon_code');
//  $firstname="umesh";
//  $lastname="vish";
//  $email="test@gmail.com";
//  $password="1233456";
//  $street="umesh ka ghr";
//  $city='indore';
//  $country="country";
//  $state="state";
//  $total="499";
//  $mobile_number="8224006280";
//  $zipcode="465686";
// $different_billing=false;


         
   $table11='order_shipping';
            $where1= array('id' =>'1');
           $shippingcharge=$this->Comman_model->getdata($table11, $where1);
$ord_shipping=$shippingcharge->shipping_value;
 
 $city2 = $this->input->post('city');
 $zipcode2 = $this->input->post('zipcode2');
 $street2 = $this->input->post('street2');
 $country2 = $this->input->post('country2');
 $createAccount=$this->input->post('createAccount');
  $different_billing=$this->input->post('different_billing');

  $response=[];


if($different_billing=='true'){
  $user_id=$this->session->userdata('cid');
  if(!empty($user_id)){
  	$billing_data=array('country'=>$country2,
  		                 'state'=>$state2,
  		                 'zip'=>$zipcode2,
  		                 'street'=>$street2,
  		                 'city'=>$city

  	                     );
    $address_updated = $this->Comman_model->UpdateRecord('customer',$billing_data,array('cust_id'=>$user_id));
 }
    $country =$country2;
    $state=$state2;
    $zipcode=$zipcode2;
    $street=$state2;
    $city=$city2;
  
}



// coustomer is already login
if(!empty($this->session->userdata('cid'))){
     
    $user_id=$this->session->userdata('cid');
    $ship_data=array(
                   'ship_cust_id'=>$user_id,
                   'ship_fname'=>$firstname,
                   'ship_lname'=>$lastname,
                   'ship_phone'=>$mobile_number,
                   'ship_address'=>$city,
                   'ship_city'=>$city,
                   'ship_state'=>$state,
                   'ship_country'=>$country,
                   'ship_zip'=>$zipcode
                    );
    $this->Comman_model->insertData('shipping',$ship_data);
           
    $user_id=$this->session->userdata('cid');
	$WhereData= array('cust_id' =>$user_id);
	$data=array(
                  'cust_fname'=>$firstname,
                  'cust_lname'=>$lastname,
                  'cust_email'=>$email,
                  'cust_phone'=>$mobile_number,
                  'cust_pass'=> md5($password),
                  'country'=>$country,
                  'state'=>$state,
                  'street'=>$street,
                  'zip'=>$zipcode,
                  'city'=>$city

                  );
	$result = $this->Comman_model->UpdateRecord('customer', $data, $WhereData);
    
   

	

    $otp=rand(0000,9999);
    $order_key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
    $order_key = "Batches".$order_key;
   $data=array(
	'ord_user_id'=>$user_id,
	'ord_shipping'=>$ord_shipping,
	'ord_key'=>$order_key,
	'ord_payment'=>'COD',
	'ord_bill_fname'=>$firstname,
	'ord_bill_lname'=>$lastname,
	'ord_bill_address'=>$street,
	'address'=>$city,
	'ord_bill_email'=>$email,
	'ord_bill_city'=>$city,
	'ord_bill_con'=>$country,
	'ord_bill_zip'=>$zipcode,
	'ord_bill_phone'=>$mobile_number,
	'ord_ship_fname'=>$firstname,
	'ord_ship_lname'=>$lastname,
	'ord_ship_address'=>$street,
	'ord_ship_email'=>$email,
	'ord_ship_city'=>$city,
	'ord_ship_con'=>$country,
	'ord_ship_zip'=>$zipcode,
	'ord_ship_phone'=>$mobile_number,
	'ord_price'=>$total,
	'order_qr_code'=>$otp
   
);

if ($coupon_code) {
	$data11 = array('cup_name' => $coupon_code);	
	$coupun_details=$this->Comman_model->getdata('coupons', $data11);
	$data['ord_coupon']=$coupun_details->cup_name;
	$data['ord_coupon_type']=$coupun_details->cup_type;
	$data['ord_coupon_value']=$coupun_details->cup_value;
}
 $order_id = $this->Comman_model->insertData('orders',$data);

if ($order_id) {
	$table1='cart';
	$where1 = array('cart_user_id' => $this->session->userdata('cid'));
	$cart = $this->Comman_model->getAllData($table1, $where1, $oderBy='');

	$total_admincomm=0;   
	$total_vendoramt=0;   
	foreach ($cart as $each_cart) {      	
		$pcs_id=$each_cart->cart_pcs_id;
		$product_id=$each_cart->cart_product_id;
		$vendor_id=$each_cart->cart_vendor_id;
		$order_quantity=$each_cart->cart_qty;
		$cart_id=$each_cart->cart_id;

		$data1=array(
			'order_id'=>$order_id,
			'pcs_id'=>$pcs_id,
			'product_id'=>$product_id,
			'vendor_id'=>$vendor_id,
			'order_quantity'=>$order_quantity
		);

		$resul = $this->db->query("UPDATE `product_color_size_record` SET `pcs_qty`=`pcs_qty`-$order_quantity WHERE `pcs_id`='$pcs_id'");		
		$data11 = array('pcs_id' => $pcs_id);
		

		$order_id1 = $this->Comman_model->insertData('order_products',$data1);
		$where11 = array('cart_id' =>$cart_id);
		$this->Comman_model->Deletedata('cart', $where11);
	}

	$comdata=array(
		'orderid'=>$order_id,
		'vendor_amt'=>$total_vendoramt,
	);
	$key=$order_key;
	$this->load->library('email');
	$subject = "Bathces Order";
	$data=array();
	$table = 'orders';
	$where = array('ord_key'=>$key);
	$oderBy = '';
	$data['order_data'] = $this->Comman_model->getAllData($table, $where, $oderBy);
	$toemail=$data['order_data'][0]->ord_bill_email;
	$ord_id=$data['order_data'][0]->ord_id;
	$table   = 'order_products';
	$where  = array('order_id'=>$ord_id);
	$oderBy = 'order_product_id';        
	$data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
	$mesg = $this->load->view('home/order_email',$data,true);

    $config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html',
		'priority'=>1,
    );

    $this->email->initialize($config);
    $fromemail='Info@batcheskw.com';
    $this->email->to($email);
    $this->email->from($fromemail, "Bathces Order");
    $this->email->subject($subject);
    $this->email->message($mesg);
    // $mail1 = $this->email->send();
    if ($this->email->send()) {
    //  echo "send";
    }else{
    	//echo "not send";
    }
   }
// order has been inserted
    $response['message']="done";
    $response['order_id']=$order_id;
    echo json_encode($response);

} 
// coustomer is a guest coustomer or new account creator
else {



// new account create_function

if($createAccount!="false"){
	// check_user for already exists
	$check_user=$this->Comman_model->getAlldata('customer',array('cust_email'=>$email));
  if(empty($check_user)){
  	// check_user for different_billing
  	if($different_billing=='true'){
      $data=array(
                  'cust_fname'=>$firstname,
                  'cust_lname'=>$lastname,
                  'cust_email'=>$email,
                  'cust_phone'=>$mobile_number,
                  'cust_pass'=>md5($password),
                  'country'=>$country2,
                  'state'=>$state2,
                  'street'=>$street2,
                  'zip'=>$zipcode2,
                  'city'=>$city2

                  );
      }else{
      	$data=array(
      		      'cust_name'=>$firstname,
                  'cust_fname'=>$firstname,
                  'cust_lname'=>$lastname,
                  'cust_email'=>$email,
                  'cust_phone'=>$mobile_number,
                  'cust_pass'=> md5($password),
                  'country'=>$country,
                  'state'=>$state,
                  'street'=>$street,
                  'zip'=>$zipcode,
                  'city'=>$city

                  );

      }


    $guestid=$this->session->userdata('session_id');

	$result = $this->Comman_model->insertData('customer', $data);
	$user_id=$result;
    $this->session->set_userdata('cid',$user_id);
    $this->session->set_userdata('cust_name', $firstname);
    $this->session->set_userdata('cust_fname', $firstname );
    $this->session->set_userdata('cust_lname', $lastname);
    $this->session->set_userdata('cust_email', $email);
    $this->session->set_userdata('cust_phone', $mobile_number);
    // $this->session->set_userdata('cust_phone', $saveUserRes['cust_phone
    //   ']);
    $this->session->set_userdata('country',$country);
    $this->session->set_userdata('state',$state);
    $this->session->set_userdata('city',$city);
    $this->session->set_userdata('street',$street);
    $this->session->set_userdata('zip',$zipcode);

    // $guestid=$this->session->userdata('session_id');

    $otp=rand(0000,9999);
    $order_key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
    $order_key = "Batches".$order_key;
   $data=array(
	'ord_user_id'=>$user_id,
	'ord_shipping'=>$ord_shipping,
	'ord_key'=>$order_key,
	'ord_payment'=>'COD',
	'ord_bill_fname'=>$firstname,
	'ord_bill_lname'=>$lastname,
	'ord_bill_address'=>$street,
	'address'=>$city,
	'ord_bill_email'=>$email,
	'ord_bill_city'=>$city,
	'ord_bill_con'=>$country,
	'ord_bill_zip'=>$zipcode,
	'ord_bill_phone'=>$mobile_number,
	'ord_ship_fname'=>$firstname,
	'ord_ship_lname'=>$lastname,
	'ord_ship_address'=>$street,
	'ord_ship_email'=>$email,
	'ord_ship_city'=>$city,
	'ord_ship_con'=>$country,
	'ord_ship_zip'=>$zipcode,
	'ord_ship_phone'=>$mobile_number,
	'ord_price'=>$total,
	'order_qr_code'=>$otp
   
);

if ($coupon_code) {
	$data11 = array('cup_name' => $coupon_code);	
	$coupun_details=$this->Comman_model->getdata('coupons', $data11);
	$data['ord_coupon']=$coupun_details->cup_name;
	$data['ord_coupon_type']=$coupun_details->cup_type;
	$data['ord_coupon_value']=$coupun_details->cup_value;
}
 $order_id = $this->Comman_model->insertData('orders',$data);

if ($order_id) {
	$table1='cart';
	$where1 = array('cart_session_id' => $this->session->userdata('session_id'));
	$cart = $this->Comman_model->getAllData($table1, $where1, $oderBy='');


	$total_admincomm=0;   
	$total_vendoramt=0;   
	foreach ($cart as $each_cart) {      	
		$pcs_id=$each_cart->cart_pcs_id;
		$product_id=$each_cart->cart_product_id;
		$vendor_id=$each_cart->cart_vendor_id;
		$order_quantity=$each_cart->cart_qty;
		$cart_id=$each_cart->cart_id;

		$data1=array(
			'order_id'=>$order_id,
			'pcs_id'=>$pcs_id,
			'product_id'=>$product_id,
			'vendor_id'=>$vendor_id,
			'order_quantity'=>$order_quantity
		);

		$resul = $this->db->query("UPDATE `product_color_size_record` SET `pcs_qty`=`pcs_qty`-$order_quantity WHERE `pcs_id`='$pcs_id'");		
		$data11 = array('pcs_id' => $pcs_id);
		// $commsion_value = $this->Comman_model->getdata('product_color_size_record', $data11);
		// $admin_commission=$commsion_value->admin_commission;
		// $vendor_commission=$commsion_value->vendor_commission;

		// $data1['admin_commision']=$admin_commission;
		// $data1['vendor_commission']=$vendor_commission;

		// $total_admincomm=$total_admincomm+$admin_commission;
		// $total_vendoramt=$total_vendoramt+$vendor_commission;

		$order_id1 = $this->Comman_model->insertData('order_products',$data1);
		$where11 = array('cart_id' =>$cart_id);
		$this->Comman_model->Deletedata('cart', $where11);
	}

	$comdata=array(
		'orderid'=>$order_id,
		'vendor_amt'=>$total_vendoramt,
	);
	$key=$order_key;
	$this->load->library('email');
	$subject = "Bathces Order";
	$data=array();
	$table = 'orders';
	$where = array('ord_key'=>$key);
	$oderBy = '';
	$data['order_data'] = $this->Comman_model->getAllData($table, $where, $oderBy);
	$toemail=$data['order_data'][0]->ord_bill_email;
	$ord_id=$data['order_data'][0]->ord_id;
	$table   = 'order_products';
	$where  = array('order_id'=>$ord_id);
	$oderBy = 'order_product_id';        
	$data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
	$mesg = $this->load->view('home/order_email',$data,true);

    $config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html',
		'priority'=>1,
    );

    $this->email->initialize($config);
    $fromemail='Info@batcheskw.com';
    $this->email->to($email);
    $this->email->from($fromemail, "Bathces Order");
    $this->email->subject($subject);
    $this->email->message($mesg);
    // $mail1 = $this->email->send();
    if ($this->email->send()) {
    //  echo "send";
    }else{
    	//echo "not send";
    }
   }
// order has been inserted
    $response['message']="done";
    $response['order_id']=$order_id;
    echo json_encode($response);

   }else{
      $response['message']="Email already exits";
      echo json_encode($response);

   }
}
// guest checkout 
else{
   
    $guestid=$this->session->userdata('session_id');
    $otp=rand(0000,9999);
    $order_key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
    $order_key = "Batches".$order_key;
   $data=array(
	'ord_user_id'=>$guestid,
	'ord_shipping'=>$ord_shipping,
	'ord_key'=>$order_key,
	'ord_payment'=>'COD',
	'ord_bill_fname'=>$firstname,
	'ord_bill_lname'=>$lastname,
	'ord_bill_address'=>$street,
	'address'=>$city,
	'ord_bill_email'=>$email,
	'ord_bill_city'=>$city,
	'ord_bill_con'=>$country,
	'ord_bill_zip'=>$zipcode,
	'ord_bill_phone'=>$mobile_number,
	'ord_ship_fname'=>$firstname,
	'ord_ship_lname'=>$lastname,
	'ord_ship_address'=>$street,
	'ord_ship_email'=>$email,
	'ord_ship_city'=>$city,
	'ord_ship_con'=>$country,
	'ord_ship_zip'=>$zipcode,
	'ord_ship_phone'=>$mobile_number,
	'ord_price'=>$total,
	'order_qr_code'=>$otp
   
);

if ($coupon_code) {
	$data11 = array('cup_name' => $coupon_code);	
	$coupun_details=$this->Comman_model->getdata('coupons', $data11);
	$data['ord_coupon']=$coupun_details->cup_name;
	$data['ord_coupon_type']=$coupun_details->cup_type;
	$data['ord_coupon_value']=$coupun_details->cup_value;
}
 $order_id = $this->Comman_model->insertData('orders',$data);

if ($order_id) {
	$table1='cart';
	$where1 = array('cart_session_id' => $this->session->userdata('session_id'));
	$cart = $this->Comman_model->getAllData($table1, $where1, $oderBy='');

	$total_admincomm=0;   
	$total_vendoramt=0;   
	foreach ($cart as $each_cart) {      	
		$pcs_id=$each_cart->cart_pcs_id;
		$product_id=$each_cart->cart_product_id;
		$vendor_id=$each_cart->cart_vendor_id;
		$order_quantity=$each_cart->cart_qty;
		$cart_id=$each_cart->cart_id;

		$data1=array(
			'order_id'=>$order_id,
			'pcs_id'=>$pcs_id,
			'product_id'=>$product_id,
			'vendor_id'=>$vendor_id,
			'order_quantity'=>$order_quantity
		);

		$resul = $this->db->query("UPDATE `product_color_size_record` SET `pcs_qty`=`pcs_qty`-$order_quantity WHERE `pcs_id`='$pcs_id'");		
		$data11 = array('pcs_id' => $pcs_id);
		// $commsion_value = $this->Comman_model->getdata('product_color_size_record', $data11);
		// $admin_commission=$commsion_value->admin_commission;
		// $vendor_commission=$commsion_value->vendor_commission;

		// $data1['admin_commision']=$admin_commission;
		// $data1['vendor_commission']=$vendor_commission;

		// $total_admincomm=$total_admincomm+$admin_commission;
		// $total_vendoramt=$total_vendoramt+$vendor_commission;

		$order_id1 = $this->Comman_model->insertData('order_products',$data1);
		$where11 = array('cart_id' =>$cart_id);
		$this->Comman_model->Deletedata('cart', $where11);
	}

	$comdata=array(
		'orderid'=>$order_id,
		'vendor_amt'=>$total_vendoramt,
	);
	$key=$order_key;
	$this->load->library('email');
	$subject = "Bathces Order";
	$data=array();
	$table = 'orders';
	$where = array('ord_key'=>$key);
	$oderBy = '';
	$data['order_data'] = $this->Comman_model->getAllData($table, $where, $oderBy);
	$toemail=$data['order_data'][0]->ord_bill_email;
	$ord_id=$data['order_data'][0]->ord_id;
	$table   = 'order_products';
	$where  = array('order_id'=>$ord_id);
	$oderBy = 'order_product_id';        
	$data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
	$mesg = $this->load->view('home/order_email',$data,true);

    $config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html',
		'priority'=>1,
    );

    $this->email->initialize($config);
    $fromemail='Info@batcheskw.com';
    $this->email->to($email);
    $this->email->from($fromemail, "Bathces Order");
    $this->email->subject($subject);
    $this->email->message($mesg);
    // $mail1 = $this->email->send();
    if ($this->email->send()) {
    //  echo "send";
    }else{
    	//echo "not send";
    }
   }
// order has been inserted
    $response['message']="done";
    $response['order_id']=$order_id;
    echo json_encode($response);
 
}
 

}

 

 }


public function checkout(){
$firstname = $this->input->post('firstname');
$lastname = $this->input->post('lastname');
$ord_delivery_time = $this->input->post('ord_delivery_time');
$ord_delivery_date = $this->input->post('ord_delivery_date');
$ord_delivery_date_to = $this->input->post('ord_delivery_date_to');
$email = $this->input->post('email');
$password = $this->input->post('password');
$full_address = $this->input->post('full_address');
$country = $this->input->post('country');
$city = $this->input->post('city');
$zipcode = $this->input->post('zipcode');
$address = $this->input->post('address');
$mobile_number = $this->input->post('mobile_number');
$total = $this->input->post('total');
$coupon_code = $this->input->post('coupon_code');


         
   $table11='order_shipping';
            $where1= array('id' =>'1');
           $shippingcharge=$this->Comman_model->getdata($table11, $where1);
$ord_shipping=$shippingcharge->shipping_value;



$html = $this->input->post('html');
if ($html=='on') {
	$cust_fname = $this->input->post('firstname');
	$cust_lname = $this->input->post('lastname');
	$cust_email = $this->input->post('email');
	$cust_phone = $this->input->post('mobile_number');
	$cust_pass = $this->input->post('password');
	$table='customer';
	$data1 = array('cust_phone' => $cust_phone,'cust_type'=>'customer');
	$usercust_phone = $this->Comman_model->getdata($table, $data1);
	$data11 = array('cust_email' => $cust_email,'cust_type'=>'customer');
	$usercust_email = $this->Comman_model->getdata($table, $data11);
	if (!empty($usercust_phone)) {
	
			$response['msg']="Phone already Exist";
    $response['order_id']=TRUE;
    echo json_encode($response);
    return;

	}else if (!empty($usercust_email)) {

	$response['msg']="Email already Exist";
    $response['order_id']=TRUE;
    echo json_encode($response);
    return;

	}else{
		$data11 = array(
			'cust_fname' => $cust_fname,
			'cust_lname' => $cust_lname, 
			'cust_email' => $cust_email,
			'cust_phone' => $cust_phone,
			'cust_pass' => $cust_pass,
			'cust_type' => 'customer',
			'cust_status' => 1
		);
		//$result = $this->Comman_model->insertData('customer',$data);
    $guestid=$this->session->userdata('guestid');

	$WhereData= array('cust_id' =>$guestid);
	$result = $this->Comman_model->UpdateRecord('customer', $data11, $WhereData);
    

	
	$this->session->set_userdata('cust_fname',$cust_fname);
	$this->session->set_userdata('cust_lname',$cust_lname);
	// $this->session->set_userdata('guestid',$result);
	$this->session->set_userdata('cid',$guestid);

//demo


$guestid=$this->session->userdata('guestid');
$otp=rand(0000,9999);
$order_key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
$order_key = "Bathces".$order_key;
$data=array(
	'ord_user_id'=>$guestid,
	'ord_shipping'=>$ord_shipping,
	'ord_key'=>$order_key,
	'ord_payment'=>'COD',
	'ord_bill_fname'=>$firstname,
	'ord_bill_lname'=>$lastname,
	'ord_bill_address'=>$full_address,
	'address'=>$address,
	'ord_bill_email'=>$email,
	'ord_bill_city'=>$city,
	'ord_bill_con'=>$country,
	'ord_bill_zip'=>$zipcode,
	'ord_bill_phone'=>$mobile_number,
	'ord_ship_fname'=>$firstname,
	'ord_ship_lname'=>$lastname,
	'ord_ship_address'=>$full_address,
	'ord_ship_email'=>$email,
	'ord_ship_city'=>$city,
	'ord_ship_con'=>$country,
	'ord_ship_zip'=>$zipcode,
	'ord_ship_phone'=>$mobile_number,
	'ord_price'=>$total,
	'order_qr_code'=>$otp,
	'ord_delivery_time_from'=>$ord_delivery_time,
					'ord_delivery_date'=>$ord_delivery_date,
					'ord_delivery_time_to'=>$ord_delivery_date_to
);

if ($coupon_code) {
	$data11 = array('cup_name' => $coupon_code);	
	$coupun_details=$this->Comman_model->getdata('coupons', $data11);
	$data['ord_coupon']=$coupun_details->cup_name;
	$data['ord_coupon_type']=$coupun_details->cup_type;
	$data['ord_coupon_value']=$coupun_details->cup_value;
}
$order_id = $this->Comman_model->insertData('orders',$data);
if ($order_id) {
	$table1='cart';
	$where1 = array('cart_user_id' => $this->session->userdata('guestid'));
	$cart = $this->Comman_model->getAllData($table1, $where1, $oderBy='');

	$total_admincomm=0;   
	$total_vendoramt=0;   
	foreach ($cart as $each_cart) {      	
		$pcs_id=$each_cart->cart_pcs_id;
		$product_id=$each_cart->cart_product_id;
		$vendor_id=$each_cart->cart_vendor_id;
		$order_quantity=$each_cart->cart_qty;
		$cart_id=$each_cart->cart_id;

		$data1=array(
			'order_id'=>$order_id,
			'pcs_id'=>$pcs_id,
			'product_id'=>$product_id,
			'vendor_id'=>$vendor_id,
			'order_quantity'=>$order_quantity
		);

		$resul = $this->db->query("UPDATE `product_color_size_record` SET `pcs_qty`=`pcs_qty`-$order_quantity WHERE `pcs_id`='$pcs_id'");		
		$data11 = array('pcs_id' => $pcs_id);
		$commsion_value = $this->Comman_model->getdata('product_color_size_record', $data11);
		$admin_commission=$commsion_value->admin_commission;
		$vendor_commission=$commsion_value->vendor_commission;

		$data1['admin_commision']=$admin_commission;
		$data1['vendor_commission']=$vendor_commission;

		$total_admincomm=$total_admincomm+$admin_commission;
		$total_vendoramt=$total_vendoramt+$vendor_commission;

		$order_id1 = $this->Comman_model->insertData('order_products',$data1);
		$where11 = array('cart_id' =>$cart_id);
		$this->Comman_model->Deletedata('cart', $where11);
	}

	$comdata=array(
		'orderid'=>$order_id,
		'vendor_amt'=>$total_vendoramt,
	);
	if ($coupon_code) {
		$data11 = array('cup_name' => $coupon_code);	
		$coupun_details=$this->Comman_model->getdata('coupons', $data11);
		$comdata['coupon_code']=$coupun_details->cup_name;
		$comdata['coupon_type']=$coupun_details->cup_type;
		$comdata['coupon_value']=$coupun_details->cup_value;
		$total2= str_replace(",","", $total);
		if($coupun_details->cup_type=='percent'){				
			$cup_value=$coupun_details->cup_value;
			$total1=   $total2*10/9;
			$cvalue= $total1*$coupun_details->cup_value/100;
		}else if($coupun_details->cup_type=='flat'){
			$cvalue= $coupun_details->cup_value;  
		} 
		$comdata['admin_comm']=$total_admincomm-$cvalue;
	}else{
		$comdata['admin_comm']=$total_admincomm;
	}

	$this->Comman_model->insertData('order_commsion',$comdata);
	$key=$order_key;

	$this->load->library('email');
	$subject = "Bathces Order";
	$data=array();
	$table = 'orders';
	$where = array('ord_key'=>$key);
	$oderBy = '';
	$data['order_data'] = $this->Comman_model->getAllData($table, $where, $oderBy);
	$toemail=$data['order_data'][0]->ord_bill_email;
	$ord_id=$data['order_data'][0]->ord_id;
	$table   = 'order_products';
	$where  = array('order_id'=>$ord_id);
	$oderBy = 'order_product_id';        
	$data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');

	$mesg = $this->load->view('home/order_email',$data,true);

    $config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html',
		'priority'=>1,
    );

    $this->email->initialize($config);
    $fromemail='info@paylater.com.kw';
    $this->email->to($email);
    $this->email->from($fromemail, "Bathces Order");
    $this->email->subject($subject);
    $this->email->message($mesg);
    // $mail1 = $this->email->send();
    if ($this->email->send()) {
    //  echo "send";
    }else{
    	//echo "not send";
    }

}

	$response['message']="done";
    $response['order_id']=$order_id;
    echo json_encode($response);
return;


    }
}else{

$guestid=$this->session->userdata('guestid');
$otp=rand(0000,9999);
$order_key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
$order_key = "Bathces".$order_key;
$data=array(
	'ord_user_id'=>$guestid,
	'ord_shipping'=>$ord_shipping,
	'ord_key'=>$order_key,
	'ord_payment'=>'COD',
	'ord_bill_fname'=>$firstname,
	'ord_bill_lname'=>$lastname,
	'ord_bill_address'=>$full_address,
	'address'=>$address,
	'ord_bill_email'=>$email,
	'ord_bill_city'=>$city,
	'ord_bill_con'=>$country,
	'ord_bill_zip'=>$zipcode,
	'ord_bill_phone'=>$mobile_number,
	'ord_ship_fname'=>$firstname,
	'ord_ship_lname'=>$lastname,
	'ord_ship_address'=>$full_address,
	'ord_ship_email'=>$email,
	'ord_ship_city'=>$city,
	'ord_ship_con'=>$country,
	'ord_ship_zip'=>$zipcode,
	'ord_ship_phone'=>$mobile_number,
	'ord_price'=>$total,
	'order_qr_code'=>$otp,
		'ord_delivery_time_from'=>$ord_delivery_time,
					'ord_delivery_date'=>$ord_delivery_date,
					'ord_delivery_time_to'=>$ord_delivery_date_to
);

if ($coupon_code) {
	$data11 = array('cup_name' => $coupon_code);	
	$coupun_details=$this->Comman_model->getdata('coupons', $data11);
	$data['ord_coupon']=$coupun_details->cup_name;
	$data['ord_coupon_type']=$coupun_details->cup_type;
	$data['ord_coupon_value']=$coupun_details->cup_value;
}
$order_id = $this->Comman_model->insertData('orders',$data);
if ($order_id) {
	$table1='cart';
	$where1 = array('cart_user_id' => $this->session->userdata('guestid'));
	$cart = $this->Comman_model->getAllData($table1, $where1, $oderBy='');

	$total_admincomm=0;   
	$total_vendoramt=0;   
	foreach ($cart as $each_cart) {      	
		$pcs_id=$each_cart->cart_pcs_id;
		$product_id=$each_cart->cart_product_id;
		$vendor_id=$each_cart->cart_vendor_id;
		$order_quantity=$each_cart->cart_qty;
		$cart_id=$each_cart->cart_id;

		$data1=array(
			'order_id'=>$order_id,
			'pcs_id'=>$pcs_id,
			'product_id'=>$product_id,
			'vendor_id'=>$vendor_id,
			'order_quantity'=>$order_quantity
		);

		$resul = $this->db->query("UPDATE `product_color_size_record` SET `pcs_qty`=`pcs_qty`-$order_quantity WHERE `pcs_id`='$pcs_id'");		
		$data11 = array('pcs_id' => $pcs_id);
		$commsion_value = $this->Comman_model->getdata('product_color_size_record', $data11);
		$admin_commission=$commsion_value->admin_commission;
		$vendor_commission=$commsion_value->vendor_commission;

		$data1['admin_commision']=$admin_commission;
		$data1['vendor_commission']=$vendor_commission;

		$total_admincomm=$total_admincomm+$admin_commission;
		$total_vendoramt=$total_vendoramt+$vendor_commission;

		$order_id1 = $this->Comman_model->insertData('order_products',$data1);
		$where11 = array('cart_id' =>$cart_id);
		$this->Comman_model->Deletedata('cart', $where11);
	}

	$comdata=array(
		'orderid'=>$order_id,
		'vendor_amt'=>$total_vendoramt,
	);
	if ($coupon_code) {
		$data11 = array('cup_name' => $coupon_code);	
		$coupun_details=$this->Comman_model->getdata('coupons', $data11);
		$comdata['coupon_code']=$coupun_details->cup_name;
		$comdata['coupon_type']=$coupun_details->cup_type;
		$comdata['coupon_value']=$coupun_details->cup_value;
		$total2= str_replace(",","", $total);
		if($coupun_details->cup_type=='percent'){				
			$cup_value=$coupun_details->cup_value;
			$total1=   $total2*10/9;
			$cvalue= $total1*$coupun_details->cup_value/100;
		}else if($coupun_details->cup_type=='flat'){
			$cvalue= $coupun_details->cup_value;  
		} 
		$comdata['admin_comm']=$total_admincomm-$cvalue;
	}else{
		$comdata['admin_comm']=$total_admincomm;
	}

	$this->Comman_model->insertData('order_commsion',$comdata);
	$key=$order_key;

	$this->load->library('email');
	$subject = "Bathces Order";
	$data=array();
	$table = 'orders';
	$where = array('ord_key'=>$key);
	$oderBy = '';
	$data['order_data'] = $this->Comman_model->getAllData($table, $where, $oderBy);
	$toemail=$data['order_data'][0]->ord_bill_email;
	$ord_id=$data['order_data'][0]->ord_id;
	$table   = 'order_products';
	$where  = array('order_id'=>$ord_id);
	$oderBy = 'order_product_id';        
	$data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');

	$mesg = $this->load->view('home/order_email',$data,true);

    $config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html',
		'priority'=>1,
    );

    $this->email->initialize($config);
    $fromemail='info@paylater.com.kw';
    $this->email->to($email);
    $this->email->from($fromemail, "Bathces Order");
    $this->email->subject($subject);
    $this->email->message($mesg);
    // $mail1 = $this->email->send();
    if ($this->email->send()) {
    //  echo "send";
    }else{
    	//echo "not send";
    }

}

	$response['msg']="done";
    $response['order_id']=$order_id;
    echo json_encode($response);


}  
}

public function mailtest($value='')
{
	$this->load->library('email');
$config['protocol'] = 'mail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

$this->email->initialize($config);
$this->email->from('your@example.com', 'Your Name');
$this->email->to('ashok.wxit@gmail.com');
$this->email->cc('another@another-example.com');
$this->email->bcc('them@their-example.com');

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');

$this->email->send();
    if ($this->email->send()) {
   echo "send1";
    }else{
    	echo "not send1";
    }
}
public function add_towishlist(){
	
	$size_id = $this->input->post('size_id');
	$prid = $this->input->post('prid');
	$product_id = $this->input->post('product_id');
	$qty = $this->input->post('qty');
    error_reporting(0);	
	$table1='wishlist';
	$data1 = array(
		'wish_size_id' =>$size_id,
		'wish_product_id' =>$product_id  ,
		'wish_user_id'=>$this->session->userdata('cid'),      
	);
    $check_cart = $this->Comman_model->getdata($table1, $data1);
	if(!empty($check_cart)){
		$where = array(
			'wish_user_id'=>$this->session->userdata('cid'),
			'wish_id' => $check_cart->wish_id,
		);
		$this->Comman_model->Deletedata('wishlist', $where);
	$result['msg']='false';			
	}else{
	  
	          
      $where=array('pcs_size'=>$size_id,'pcs_product_rand_id'=>$prid);
        $data1 = $this->Comman_model->getdata('product_color_size_record',$where);
                $pcs_mrp=$data1->pcs_mrp;
                $pcs_sale=$data1->pcs_sale;
                $pcs_id=$data1->pcs_id;
                if($pcs_sale<='0.000')
                {
                $price=$pcs_mrp;
                }else{
                $price=$pcs_sale; 
                }
            
            
            
		$data = array(
			'wish_user_id'=>$this->session->userdata('cid'),
			'wish_product_id'=>$product_id,
			'wish_qty'=>1,
			'wish_product_random'=>$prid,
			'wish_price'=>$price,
			'wish_size_id' =>$size_id,
			'wish_pcs_id' =>$pcs_id,
		);
		$result1 = $this->Comman_model->insertData('wishlist',$data);
		if($result1){
			 $result['msg']='true';
		}else{
		 $result['msg']='true';
		}
	}
   $where=array('wish_user_id'=>$this->session->userdata('cid'));
   $wish_count=$this->Comman_model->get_rows('wishlist',$where);
   $result['count']=$wish_count;    
    echo json_encode($result);

}



public function apply_coupon()
{

	 $coupon_code = $this->input->post('coupon_code');	
	 $total = $this->input->post('total');	
	$where=array('cup_name'=>$coupon_code);
	// echo json_encode($_POST);
	// die();
	$response=[];
    $check_coupon = $this->Comman_model->getdata('coupons', $where);
		if(empty( $check_coupon ))
		{
		$response['message']="Invalid Coupon Code";
		$response['total']=$total;

		 }
		 // else{
		// echo json_encode($check_coupon);
		// 	die();
		// }
		else if ($check_coupon->is_unlimited=='1') 
		{
			
			if ($check_coupon->cup_type=='percent') {
			$discount=$check_coupon->cup_value/100;
			$value=$discount*$total;
			$new_total=	$total-$value;
			}else if($check_coupon->cup_type=='flat')
			{
			$new_total=	$total-$check_coupon->cup_value;

			}
			

		$response['message']="Coupon Applied";
		$response['total']=$new_total;
		
          

		}else if($check_coupon->cup_expiry>date('Y-m-d'))
		{
			if ($check_coupon->cup_qty>0) {
				
				if ($check_coupon->cup_type=='percent') {
				$discount=$check_coupon->cup_value/100;
				$value=$discount*$total;
				$new_total=	$total-$value;
				}else if($check_coupon->cup_type=='flat')
				{
				$new_total=	$total-$check_coupon->cup_value;
				
				}
				$response['message']="Coupon Applied";
		        $response['total']=$new_total;
				$updated_qty=$check_coupon->cup_qty-1;
		        $response['result']	=$this->Comman_model->UpdateRecord('coupons',array('cup_qty'=>$updated_qty),array('cup_id'=>$check_coupon->cup_id));



          
			}else{
				$response['message']="Coupon out of stock";
		        $response['total']=$total;	
          
			}	

		}else{
		$response['message']="Coupon has been expired";
		 $response['total']=$total;	

		}
		echo json_encode($response);
	}

	public function apply_coupon_value()
{

	$coupon_code = $this->input->post('coupon_code');	
	$total = $this->input->post('total');	
	$data1=array('cup_name'=>$coupon_code);
	$check_coupon = $this->Comman_model->getdata('coupons', $data1);
	if ($check_coupon->cup_type=='percent') {
	$value=	$total*$check_coupon->cup_value/100;
	$after_dis_amt=	$total-$value;
	}else if($check_coupon->cup_type=='flat')
	{
	$after_dis_amt=	$total-$check_coupon->cup_value;

	}
	echo number_format($after_dis_amt,3);


	
}
public function get_notificationdata($value='')
{
	 
            $prev_date = date('Y-m-d', strtotime('-1 day'));
            $next_date = date('Y-m-d', strtotime('+1 day'));
            ?> 
            <li class="nav-item dropdown message-dropdown ml-lg-4">
             <?php 
             $q=$this->db->query("SELECT * FROM `products`,`admin` WHERE products.product_status = '0' AND products.vendor_id = admin.admin_id ORDER BY `products`.`update_at` DESC");
                    $latest_order=$q->result();
             ?>
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span title="Product Update" class="flaticon-edit-1"></span><span class="badge badge-success">
                        <?php if(!empty($latest_order)){ echo count($latest_order); }else{ echo '0';} ?>
                    </span>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="messageDropdown">
                  <?php 
             $q=$this->db->query("SELECT * FROM `products`,`admin` WHERE products.product_status = '0' AND products.vendor_id = admin.admin_id ORDER BY `products`.`update_at` DESC LIMIT 3");
                    $latest_order=$q->result();
             ?>   <?php
                    
                    foreach ($latest_order as $each_lorder) { ?>
                    <a class="dropdown-item" href="<?php echo base_url() ?>products/updated_product">                  
                        <div class="media">
                       
                            <div class="media-body">
                                <div class="mt-0">
                                    <p class="text mb-0"><?php echo $each_lorder->product_title;?></p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="meta-user-name mb-0">Product Id #<?php echo $each_lorder->product_id;?></p>
                                    <!-- <p class="meta-time mb-0  align-self-center">1 day ago</p> -->
                                </div>
                                <div class="d-flex justify-content-between">
                                   Vendor Name: <p class="meta-user-name mb-0"> <?php echo $each_lorder->admin_fullname;?></p>
                                    <!-- <p class="meta-time mb-0  align-self-center">1 day ago</p> -->
                                </div>
                                
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                    <a class="footer dropdown-item" href="<?php echo base_url() ?>products/updated_product">
                        <div class="btn btn-info mb-3 mr-2 btn-rounded"><i class="flaticon-arrow-right mr-3"></i> View All</div>
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown message-dropdown ml-lg-4">
                <?php 
                $q=$this->db->query("SELECT * FROM `products`,`admin`,`order_products` WHERE `products`.`product_id` = `order_products`.`product_id` AND `order_products`.`order_product_status` = '5' AND (`order_products`.`status_update_time` between '$prev_date 00:00:00' and '$next_date 23:59:00') AND `products`.`vendor_id` = `admin`.`admin_id` ORDER BY `order_products`.`status_update_time` DESC LIMIT 3");
                $latest_order=$q->result();
                ?>
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="refundDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span title="Product Cancel/Refund" class="flaticon-refresh-1"></span><span class="badge badge-success">
                           <?php if(!empty($latest_order)){ echo count($latest_order); }else{ echo '0';} ?>
                    </span>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="messageDropdown">
                    <?php foreach ($latest_order as $each_lorder) { ?>
                    <a class="dropdown-item" href="<?php echo base_url() ?>order/order_detail/<?php echo $each_lorder->order_id;?>">                  
                        <div class="media">
                       
                            <div class="media-body">
                                <div class="mt-0">
                                    <p class="text mb-0"><?php echo $each_lorder->product_title;?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="meta-user-name mb-0">Order Id #<?php echo $each_lorder->order_id;?></p>
                                    <!-- <p class="meta-time mb-0  align-self-center">1 day ago</p> -->
                                </div>
                                <div class="d-flex justify-content-between">
                                  Vendor Name:   <p class="meta-user-name mb-0"> <?php echo $each_lorder->admin_fullname;?></p>
                                    <!-- <p class="meta-time mb-0  align-self-center">1 day ago</p> -->
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                    <a class="footer dropdown-item" href="<?php echo base_url() ?>order">
                        <div class="btn btn-info mb-3 mr-2 btn-rounded"><i class="flaticon-arrow-right mr-3"></i> View All</div>
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown message-dropdown ml-lg-4">
                <?php 
                $q=$this->db->query("SELECT * FROM `orders` WHERE `ord_status` = '5' AND (`ord_status_update_time` between '$prev_date 00:00:00' and '$next_date 23:59:00') ORDER BY `ord_status_update_time` DESC LIMIT 3");
                $latest_order=$q->result();
                ?>
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="refundDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span title="Order Cancel/Refund" class="flaticon-refresh-1"></span><span class="badge badge-success">
                           <?php if(!empty($latest_order)){ echo count($latest_order); }else{ echo '0';} ?>
                    </span>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="messageDropdown">
                    <?php foreach ($latest_order as $each_lorder) { ?>
                    <a class="dropdown-item" href="<?php echo base_url() ?>order/order_detail/<?php echo $each_lorder->ord_id;?>">                  
                        <div class="media">
                       
                            <div class="media-body">
                                <div class="mt-0">
                                    <p class="text mb-0"><?php echo $each_lorder->ord_bill_fname;?> <?php echo $each_lorder->ord_bill_lname;?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="meta-user-name mb-0">Order Id #<?php echo $each_lorder->ord_id;?></p>
                                    <!-- <p class="meta-time mb-0  align-self-center">1 day ago</p> -->
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                    <a class="footer dropdown-item" href="<?php echo base_url() ?>order">
                        <div class="btn btn-info mb-3 mr-2 btn-rounded"><i class="flaticon-arrow-right mr-3"></i> View All</div>
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown message-dropdown ml-lg-4">
                 <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span title="Chat" class="flaticon-chat-line"></span><span class="badge badge-success">
                           <?php $q = $this->db->query("SELECT COUNT(*) FROM `chat` WHERE `is_read`='0' group by `driverId`,`sentBy`");
                    $data = $q->result();
                    if(!empty($data)){ echo count($data); }else{ echo '0';}
                ?>
                    </span>
                </a>

                <div class="dropdown-menu position-absolute" aria-labelledby="messageDropdown">
                   

<?php

$q=$this->db->query("SELECT DISTINCT driver.name,driver.id,chat.message FROM `chat`,driver WHERE driver.id=chat.driverId and chat.is_read='0' LIMIT 3


");
$latest_chat=$q->result();
foreach ($latest_chat as $each_drivers) { ?>
                    <a class="dropdown-item" href="<?php echo base_url()?>admin/index/<?php echo $each_drivers->id;?>">                  
                        <div class="media">
                       
                            <div class="media-body">
                                <div class="mt-0">
                                    <p class="text mb-0"><?php echo $each_drivers->message;?></p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="meta-user-name mb-0"><?php echo $each_drivers->name;?></p>
                                    <!-- <p class="meta-time mb-0  align-self-center">1 day ago</p> -->
                                </div>
                            </div>
                        </div>
                    </a>

                    <?php } ?>

                    <a class="footer dropdown-item" href="<?php echo base_url() ?>admin/index">
                        <div class="btn btn-info mb-3 mr-2 btn-rounded"><i class="flaticon-arrow-right mr-3"></i> View All</div>
                    </a>
                </div>

              
            </li>

      

<li class="nav-item dropdown message-dropdown ml-lg-4">
              <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span title="Orders" class="flaticon-menu-list"></span><span class="badge badge-success"><?php $q = $this->db->query("SELECT * FROM `orders` WHERE `ord_view_status` = '0'");
                    $data = $q->result();
                    if(!empty($data)){ echo count($data); }else{ echo '0';}
                ?></span>
                </a>

                <div class="dropdown-menu position-absolute" aria-labelledby="messageDropdown">
                    <a class="dropdown-item title" href="javascript:void(0);">
                        <i class="flaticon-chat-line mr-3"></i><span>You have <?php $q = $this->db->query("SELECT * FROM `orders` WHERE `ord_view_status` = '0'");
                    $data = $q->result();
                    if(!empty($data)){ echo count($data); }else{ echo '0';}
                ?> new order.</span>
                    </a>

<?php

$q=$this->db->query("SELECT * FROM `orders` WHERE `ord_view_status` = '0' ORDER BY `orders`.`ord_id` DESC LIMIT 3");
$latest_order=$q->result();
foreach ($latest_order as $each_lorder) { ?>
                    <a class="dropdown-item" href="<?php echo base_url() ?>order/order_detail/<?php echo $each_lorder->ord_id ?>">                  
                        <div class="media">
                       
                            <div class="media-body">
                                <div class="mt-0">
                                    <p class="text mb-0"><?php echo $each_lorder->ord_bill_fname;?> <?php echo $each_lorder->ord_bill_lname;?></p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="meta-user-name mb-0">Order Id #<?php echo $each_lorder->ord_id;?></p>
                                    <!-- <p class="meta-time mb-0  align-self-center">1 day ago</p> -->
                                </div>
                            </div>
                        </div>
                    </a>

                    <?php } ?>

                    <a class="footer dropdown-item" href="<?php echo base_url() ?>order">
                        <div class="btn btn-info mb-3 mr-2 btn-rounded"><i class="flaticon-arrow-right mr-3"></i> View more</div>
                    </a>
                </div>
            </li>
         

         <li class="nav-item dropdown message-dropdown ml-lg-4 mr-lg-4">
                
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="flaticon-user-12"></span>
                </a>
                <div class="dropdown-menu  position-absolute" aria-labelledby="userProfileDropdown">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Admin/profile">
                        <i class="mr-1 flaticon-user-6"></i> <span>My Profile</span>
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>Admin/logout">
                        <i class="mr-1 flaticon-power-button"></i> <span>Log Out</span>
                    </a>
                </div>
            </li><?php 
}





//ashok

	function addtocart_new()
	{
	     $this->load->model('Comman_model');
        $prid= $this->input->post('prid');
        $product_id= $this->input->post('product_id');
        $size_id= $this->input->post('size_id');
        $cart_qty= $this->input->post('qty');
        $session_id = $this->session->userdata('session_id');
        $cid = $this->session->userdata('cid');
        
      $where=array('pcs_size'=>$size_id,'pcs_product_rand_id'=>$prid);
      
        $data1 = $this->Comman_model->getdata('product_color_size_record',$where);
        if(empty($data1))
        {
            $result['msg']='somthing_went_wrong';
            
        }else{
            
            $stockqty=$data1->pcs_qty;
           
            if($stockqty <= '0')
            {
              $result['msg']='out_of_stock';    
            }else{
                
                $pcs_mrp=$data1->pcs_mrp;
                $pcs_sale=$data1->pcs_sale;
                $pcs_id=$data1->pcs_id;
                if($pcs_sale<='0.000')
                {
                $price=$pcs_mrp;
                }else{
                $price=$pcs_sale; 
                }
            
                
                if($cid){
                $where=array( 'cart_user_id'=>$cid,'cart_size_id'=>$size_id,'cart_product_random'=>$prid,'cart_product_id'=>$product_id);
                }else{
                $where=array('cart_session_id'=>$session_id, 'cart_size_id'=>$size_id,'cart_product_random'=>$prid,'cart_product_id'=>$product_id);
                }
            $cartdata = $this->Comman_model->getdata('cart',$where);
                if(empty($cartdata))
                {
                
                    if($cid){
                    $cartdata=array( 'cart_user_id'=>$cid,'cart_size_id'=>$size_id,'cart_product_random'=>$prid,'cart_price'=>$price,'cart_product_id'=>$product_id,'cart_qty'=>$cart_qty,'cart_pcs_id'=>$pcs_id);
                    }else{
                    $cartdata=array( 'cart_session_id'=>$session_id, 'cart_size_id'=>$size_id,'cart_product_random'=>$prid,'cart_price'=>$price,'cart_product_id'=>$product_id,'cart_qty'=>$cart_qty,'cart_pcs_id'=>$pcs_id);
                    }
                    $id=$this->Comman_model->insertData('cart',$cartdata);
                    if($id)
                    {
                    $result['msg']='added_in_cart';
                    }else{
                    $result['msg']='somthing_went_wrong';
                    }
                    
                }else{
                  $result['msg']='already_in_cart';
                
                }

       
                
            }
        }
        
 
        $result['cart_details'] = $this->Comman_model->cart_detail($session_id,$cid);
        
        $total=0;
        for($i=0;$i<count($result['cart_details']); $i++) {
        $cart_qty=   $result['cart_details'][$i]['cart_qty'];
        $cart_price=   $result['cart_details'][$i]['cart_price'];
        $total+=$cart_price*$cart_qty;
        
        // $row= $this->Comman_model->getdata('sizes',$where=array('size_id'=>$cart_size_id));
        // if($lang=='en'){
        // $result['cart_details'][$i]['size_name']=$row->size_name;
        // }else{
        // $result['cart_details'][$i]['size_name']=$row->ar_size_name;
        // }

        }
        $result['carttotal']=number_format($total,3);
        $result['cartcount'] = count($this->Comman_model->cart_detail($session_id,$cid));

           
        echo json_encode($result);

	}



	
   function get_variation()
   {
    
        $prid= $this->input->post('prid');
        $col_id= $this->input->post('colourid');
        
        
 $data['response'] = $this->get_size_by_color($prid,$col_id);
        
        
        echo json_encode($data);

   }
   
   function get_product_images()
   { 
           $prid= $this->input->post('prid');
        $col_id= $this->input->post('colourid');
        
        
 $data['response'] = $this->get_size_by_color($prid,$col_id);
 
 ?>
 <script>
 $(document).ready(function(){ 
                     $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
 });

 </script>
 
            <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
            data-infinite="true"
            data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
            data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
            data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
            data-nav-for="#sliderSyncingThumb">
            <?php
            $gallery =  $data['response'][0]->ps_gallery;
          
            $gal = array();
            $gal = explode(",",$gallery);
            foreach($gal as $g){
            if($g!=''){
            ?>
            <div class="js-slide">
            <img class="img-fluid ashoknewimg" src="<?php echo base_url(); ?>uploads/gallery/<?php echo $g; ?>" alt="Image Description">
            </div>
            <?php    }    }    ?>
            
            
            </div>
            
            <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
            data-infinite="true"
            data-slides-show="5"
            data-is-thumbs="true"
            data-nav-for="#sliderSyncingNav">
            <?php
            $gallery =  $data['response'][0]->ps_gallery;
           
            $gal = array();
            $gal = explode(",",$gallery);
            foreach($gal as $g){
            if($g!=''){
            ?>
            
            <div class="js-slide" style="cursor: pointer;">
            <img class="img-fluid" src="<?php echo base_url(); ?>uploads/gallery/<?php echo $g; ?>" alt="Image Description">
            </div>
            <?php    }    }    ?>
            
            </div>
<?php }
   
   
   
   
   
   
   
   
   
   
   function get_size_by_color($prid,$col_id)
{
   $q= $this->db->query(" SELECT product_color_size_record.*, sizes.size_name, colors.color_name FROM sizes, colors, product_color_size_record WHERE 
   product_color_size_record.pcs_color_id = '$col_id' AND
   colors.color_id = product_color_size_record.pcs_color_id AND
   sizes.size_id = product_color_size_record.pcs_size and 
   product_color_size_record.pcs_product_rand_id='$prid' ORDER BY pcs_id ASC ");
    return $q->result();
}
    
 

   function get_pricebysize()
   {
        $prid= $this->input->post('prid');
        $size_id= $this->input->post('size_id');
        $where=array('pcs_size'=>$size_id,'pcs_product_rand_id'=>$prid);
        $data = $this->Comman_model->getdata('product_color_size_record',$where);
        echo json_encode($data);

   }
   
   
  public function RemoveCart(){
	    $session_id = $this->session->userdata('session_id');
        $cid = $this->session->userdata('cid'); 
     $cartId = $this->input->post('cartId');

		$this->db->query("DELETE FROM `cart` WHERE `cart_id`='$cartId' ");

       $result['cart_details'] = $this->Comman_model->cart_detail($session_id,$cid);
                $total=0;
        for($i=0;$i<count($result['cart_details']); $i++) {
         $cart_qty=   $result['cart_details'][$i]['cart_qty'];
         $cart_price=   $result['cart_details'][$i]['cart_price'];
         $total+=$cart_price*$cart_qty;
         $cart_size_id=   $result['cart_details'][$i]['cart_size_id'];
         
         $cart_product_random=   $result['cart_details'][$i]['cart_product_random'];
         $cart_product_id=   $result['cart_details'][$i]['cart_product_id'];
        $row= $this->Comman_model->getdata('product_color_size_record',$where=array('pcs_product_rand_id'=>$cart_product_random,'pcs_size'=>$cart_size_id));
        $result['cart_details'][$i]['sku']=$row->sku;
        $row= $this->Comman_model->getdata('sizes',$where=array('size_id'=>$cart_size_id));
        $result['cart_details'][$i]['size_name']=$row->size_name;
     
        $row= $this->Comman_model->getdata('products',$where=array('product_id'=>$cart_product_id));
             $result['cart_details'][$i]['product_title']=$row->product_title;
            $result['cart_details'][$i]['product_url']=$row->product_url;
            $result['cart_details'][$i]['ps_image']=$row->ps_image;

        }

        $result['carttotal']=number_format($total,3);
        $result['cartcount'] = count($this->Comman_model->cart_detail($session_id,$cid));
		echo json_encode($result);
	
	}

   public function clear_cart($value='')
   {
   	if(!empty($this->session->userdata('cid'))){
   		$where=array('cart_user_id'=>$this->session->userdata('cid'));
   	}else{
   		$where=array('cart_session_id'=>$this->session->userdata('session_id'));
   	
   	}
   echo 	$this->Comman_model->delete_record('cart', $where);
   
   }

	public function remove_wishlist(){
        $result=array();
        $id = $this->input->post('wish_id');
        $where = array('wish_id' =>$id);
        $this->Comman_model->Deletedata('wishlist', $where);
        $wish_count=$this->Comman_model->get_rows('wishlist',array('wish_user_id'=>$this->session->userdata('cid')));
        $result['msg'] = 'true';
        $result['count']=$wish_count;
        echo json_encode($result);
	}



   	public function increaseDecreaseCart(){
          $session_id = $this->session->userdata('session_id');
        $cid = $this->session->userdata('cid'); 
         $productId = $this->input->post('productId');
        $cartId = $this->input->post('cartId');
        $qty = $this->input->post('qty');
        $size_id = $this->input->post('size_id');
        $prid = $this->input->post('prid');
        if($cid){
        $data11 = array('cart_id' => $cartId,'cart_user_id' => $cid, 'cart_product_id' => $productId,'cart_size_id'=>$size_id);
        }else{
        $data11 = array('cart_id' => $cartId,'cart_session_id' => $session_id, 'cart_product_id' => $productId,'cart_size_id'=>$size_id);
        }
        	 $table1='product_color_size_record';
             $data1 = array('pcs_size'=>$size_id,'pcs_product_rand_id'=>$prid);

    	$check_cart = $this->Comman_model->getdata($table1, $data1);
    	$result['ms11g']=$check_cart;
    	if($check_cart->pcs_qty > 0){
    	
		$product = $this->Comman_model->getData('cart',$data11);
		if(!empty($product)){
			$this->db->set('cart_qty',$qty);
			$this->db->where('cart_id',$cartId);
			$this->db->update('cart');
             $result['productPrice'] = number_format($product->cart_price * $qty,3);

		}
    	}else{
    	   $result['msg']='out_of_stock'; 
    	}
	
        
        $result['cart_details'] = $this->Comman_model->cart_detail($session_id,$cid);
        
        $total=0;
        for($i=0;$i<count($result['cart_details']); $i++) {
        $cart_qty=   $result['cart_details'][$i]['cart_qty'];
        $cart_price=   $result['cart_details'][$i]['cart_price'];
        $total+=$cart_price*$cart_qty;

        
        }
        $result['carttotal']=number_format($total,3);
        $result['cartcount'] = count($this->Comman_model->cart_detail($session_id,$cid));
		echo json_encode($result);
	
	}

	public function add_reveiw()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$rating=$this->input->post('rating');
		$reveiw=$this->input->post('review');
		$product_id=$this->input->post('product_id');
        $data=array(
                   'name'=>$name,
                   'email'=>$email,
                   'rating'=>$rating,
                   'reveiw'=>$reveiw,
                   'product_id'=>$product_id,
                   'rev_date'=>date('Y-m-d')
                   );
	$result=$this->Comman_model->insertData('review',$data);
	
		echo json_encode(array('message'=>TRUE));
	
	}
   public function update_order_product_status()
   { 
   	$order_product_id=$this->input->post('order_product_id');
    $data=array('order_product_status'=>4);
   $result=  $this->Comman_model->UpdateRecord('order_products',$data,array('order_product_id'  =>$order_product_id));
   $response=array();
   if($result){
   	$response['message']="updated successfully";
    }else{
    	$response['message']="somthing_went_wrong";
    }
    echo json_encode($response);
   }

    public function update_order_status()
   { 
   	$order_id=$this->input->post('order_id');
    $data=array('ord_status'=>3);
   $result=  $this->Comman_model->UpdateRecord('orders',$data,array('ord_id'  =>$order_id));
   $response=array();
   if($result){
   	$response['message']="updated successfully";
    }else{
    	$response['message']="somthing_went_wrong";
    }
    echo json_encode($response);
   }
    
 




}
?>