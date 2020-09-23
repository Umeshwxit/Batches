<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Comman_model');

        
	    $session_id = $this->session->userdata('session_id');
	     if($session_id!=''){
	    }else{
	    $random = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(25/strlen($x)) )),1,25);
	    $this->session->set_userdata('session_id', $random);

	    }
	    
    }
    
        function index()
        {
        $data['slider']  =$this->Comman_model->getAllData('slider', $where='', $oderBy='');
        $data['banners']  =$this->Comman_model->getAllData('banners', $where='', $oderBy='');
        $data['categories_list']  =$this->Comman_model->getAllData('categories', $where='', $oderBy='');
        // $all_products=$this->Comman_model->get_products('');
        // echo "<pre>";
        // print_r($all_products);
        // die();
        $data['f_product_list']  =$this->Comman_model->get_products('featured');
        $data['n_product_list']  =$this->Comman_model->get_products('new');
        $data['title']='Home | Batches';
        $this->load->view('home/index',$data);
        
        } 
        
        public  function get_products()
        {
         $data= $this->Comman_model->product_get('');
          echo "<pre>";
          print_r($data);
        }
       

        public function product($purl) 
    {
            $pdetails= $this->Comman_model->get_productById($purl);

            $response['title']=$pdetails[0]['product_title'];
            $prid=$pdetails[0]['prid'];
            $product_id=$pdetails[0]['product_id'];
            $product_cat=$pdetails[0]['product_cat']
            ;
            $product_brand=$pdetails[0]['product_brand'];
            $product_subcat=$pdetails[0]['product_subcat'];
            $response['product_detail']=$pdetails;
                         $response['varition']  =$this->Comman_model->getAlldata('product_color_size_record', $where=array('pcs_product_rand_id'=>$prid));
                        
                    
                         for($i=0;$i<count($response['varition']);$i++)
                         {
                           $pcs_size=  $response['varition'][$i]->pcs_size;
                                $catdata  =$this->Comman_model->getdata('sizes', $where=array('size_id'=>$pcs_size));
                                if(empty($catdata))
                                {
                                    $response['varition'][$i]->size_name='';
                                }else{
                                   $response['varition'][$i]->size_name=$catdata->size_name;
                                }
                        }
            $response['reveiws']  =$this->Comman_model->getAlldata('review', $where=array('product_id'=>$product_id));
                        
                    
                        
            $catdata  =$this->Comman_model->getdata('categories', $where=array('category_id'=>$product_cat));
            if(empty($catdata))
            {
            $response['product_detail']['category_name']='';
            $response['product_detail']['category_url']='';
            }else{
            $response['product_detail']['category_name']=$catdata->category_name;
            $response['product_detail']['category_url']=$catdata->category_url;
            
            }
            
            $branddata  =$this->Comman_model->getdata('brands', $where=array('brand_id'=>$product_brand));
            if(empty($branddata))
            {
             $response['product_detail']['brand_name']='';
            }else{
             $response['product_detail']['brand_name']=$branddata->brand_name;
            }
            
            $subcategorydata  =$this->Comman_model->getdata('subcategories', $where=array('subcategory_id'=>$product_subcat));
            if(empty($subcategorydata))
            {
                $response['product_detail']['subcategory_url']='';
                $response['product_detail']['subcategory_name']='';
            }else{
                $response['product_detail']['subcategory_url']=$subcategorydata->subcategory_url;
                $response['product_detail']['subcategory_name']=$subcategorydata->subcategory_name;
            } 
        // echo "<pre>";
        // print_r($response['reveiws']);
        
        // die();


        $response['related_product']= $this->Comman_model->related_product($product_cat,$product_id);


        $this->load->view('home/product',$response);
    } 
    
    public function contact($value='')
    {
      $result['title']='Home | Contact Us';
      $this->load->view('home/contact_us',$result);
    }
    

    public function about_us($value='')
    {
      $result['title']='Home | About Us';
      $this->load->view('home/about_us',$result);
    }
     
    public function faq_page($value='')
    {
      $result['title']='Home |FAQ';
      
      $result['faqs']=$this->Comman_model->getAlldata('faqs','');
      
       $this->load->view('home/faq_page',$result);
    }

     public function order_summary($order_id)
    {
      $result['title']='Home |Order Summary';
      $result['orderdetail']=$this->Comman_model->order_summary($order_id);


      $this->load->view('home/order_summary',$result);
    }

    public function order_invoice($order_id)
    { 

      $result['orderdetail']=$this->Comman_model->order_summary($order_id);
      $this->load->view('home/invoice',$result);

      // echo "<pre>";
      // print_r($result['orderdetail']);
    }

     


     
    public function Checkout($value='')
    {
      $result['title']='Home |Checkout';
       $session_id = $this->session->userdata('session_id');
        $cid = $this->session->userdata('cid');
       
        $result['cart_details'] = $this->Comman_model->cart_detail($session_id,$cid);
        if(empty($result['cart_details'])){
          redirect('home/cart');
          return;
        }


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
        $table11='order_shipping';
            $where1= array('id' =>'1');
        $shippingcharge=$this->Comman_model->getdata($table11, $where1);
$ord_shipping=$shippingcharge->shipping_value;
$total=$total+$ord_shipping;
$result['shipping']=$ord_shipping;
      $result['total']=number_format($total,3);
      
        // echo "<pre>";
        // print_r($result);
        // die();

      $this->load->view('home/checkout',$result);


    } 

        
        public function cart() 
        {
               $session_id = $this->session->userdata('session_id');
        $cid = $this->session->userdata('cid');
       
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
$result['total']=number_format($total,3);

                   $result['title']='Home | Cart';

        $this->load->view('home/cart',$result);
        } 
    
        
        
        function change_state(){
        $con_id =  $this->input->post('con');
        $result= $this->Comman_model->getAlldata('states',$where=array('state_catid'=>$con_id),$orderby='');
        ?>
        <option value="">Select State</option>
            <?php
            foreach($result as $r){ ?>
            <option value="<?php echo $r->state_id ; ?>"><?php echo $r->state_name ; ?></option>
            <?php         } 
        }
	
        
         
    public function registerAccount(){
             $inputData = $this->input->post();
        
            $userData = array();
            $email = $inputData['email'];
            $password= $inputData['password'];
            $cust_name = $inputData['name'];
            
            $saveUserRes = $this->Comman_model->getdata('customer',$where=array('cust_email'=>$email));
            $responseData = array();
            if ((empty($saveUserRes))) {
                
                $data=array(
                    'cust_name'=>$cust_name,
                    'cust_email'=>$email,
                    'cust_pass'=>md5($password),
                    );
               $id= $this->Comman_model->insertData('customer', $data);
               if($id){
                    $responseData['error'] = 'register';
                    $responseData['responseData'] = 'register success';
                    $this->session->set_userdata('cid',$id);
                    $this->session->set_userdata('cust_name',$cust_name);
                    
                    $cust_id=  $this->session->userdata('cid');
                    $session_id = $this->session->userdata('session_id');
                   if($session_id){
                        $q=$this->db->query("SELECT * FROM `cart` WHERE `cart_session_id`='$session_id'");
                        $sdata=$q->result();
                        
                        $q1=$this->db->query("SELECT * FROM `cart` WHERE `cart_user_id`='$cust_id'");
                        $cdata=$q1->result();
                       if(!empty($cdata))
                         { 
                                foreach ($sdata as $key12 => $each_value) {
                                $product_id=  $each_value->cart_product_id;
                                $cart_qty=  $each_value->cart_qty;
                                $cart_id=  $each_value->cart_id;
                                    foreach ($cdata as $key11 => $each_cart_pro) {
                                    $product_id1=  $each_cart_pro->cart_product_id;
                                    $cart_qty1=  $each_cart_pro->cart_qty;
                                        if (($product_id1 == $product_id) ) {
                                            $new_qty=$cart_qty1+$cart_qty;
                                            $this->db->query("UPDATE `cart` SET `cart_qty`='$new_qty' WHERE `cart_user_id`='$cust_id' and `cart_product_id`='$product_id1'  ");
                                            $this->db->query("DELETE FROM `cart` WHERE `cart_id`='$cart_id'");
                                        }else{
                                            $this->db->query("UPDATE `cart` SET `cart_user_id`='$cust_id' WHERE `cart_session_id`='$session_id'  ");
                                        }
                                    }
                                }
                    }else{
                        $this->db->query("UPDATE `cart` SET `cart_user_id`='$cust_id' WHERE `cart_session_id`='$session_id' ");
                    }
                }
               }else{
                     $responseData['error'] = "something";
                    $responseData['responseData'] = "Something went wrong";
               }
           
            } else {
                    $responseData['error'] = "email_already";
                    $responseData['responseData'] = "Email id not registered";
            }
            echo json_encode($responseData);
            die();
        
    }
    
    
        
        
    public function loginAccount(){
        $inputData = $this->input->post();
        // $inputData['email']$inputData['password']
            $userData = array();
            $userData['email'] =$inputData['email'];
            $userData['password'] = md5($inputData['password']);
            
            $saveUserRes = $this->Comman_model->loginData($userData);
            // echo "<pre>";
            // print_r($saveUserRes);
            // die();
            $responseData = array();
            if ((!empty($saveUserRes['userId'])) && (!empty($saveUserRes['emailId']))) {
                $this->session->set_userdata('cid', $saveUserRes['userId']);
                $this->session->set_userdata('cust_name', $saveUserRes['cust_name']);
                $this->session->set_userdata('cust_fname', $saveUserRes['cust_fname']);
                $this->session->set_userdata('cust_lname', $saveUserRes['cust_lname']);
                $this->session->set_userdata('cust_email', $saveUserRes['cust_email']);
                $this->session->set_userdata('cust_phone', $saveUserRes['cust_phone']);
                // $this->session->set_userdata('cust_phone', $saveUserRes['cust_phone
                //   ']);
                $this->session->set_userdata('country', $saveUserRes['country']);
                $this->session->set_userdata('state', $saveUserRes['state']);
                $this->session->set_userdata('city', $saveUserRes['city']);
                $this->session->set_userdata('street', $saveUserRes['street']);
                $this->session->set_userdata('zip', $saveUserRes['zip']);
               
                    $responseData['responseData'] = 'logged in successfully';
                    $responseData['responseID'] = $saveUserRes['userId'];
                    $cust_id=  $this->session->userdata('cid');
                    $session_id = $this->session->userdata('session_id');

          if($session_id){
                        $q=$this->db->query("SELECT * FROM `cart` WHERE `cart_session_id`='$session_id'");
                        $sdata=$q->result();
                        
                        $q1=$this->db->query("SELECT * FROM `cart` WHERE `cart_user_id`='$cust_id'");
                        $cdata=$q1->result();
                       if(!empty($cdata))
                         { 
                                foreach ($sdata as $key12 => $each_value) {
                                $product_id=  $each_value->cart_product_id;
                                $cart_qty=  $each_value->cart_qty;
                                $cart_id=  $each_value->cart_id;
                                    foreach ($cdata as $key11 => $each_cart_pro) {
                                    $product_id1=  $each_cart_pro->cart_product_id;
                                    $cart_qty1=  $each_cart_pro->cart_qty;
                                        if (($product_id1 == $product_id) ) {
                                            $new_qty=$cart_qty1+$cart_qty;
                                            $this->db->query("UPDATE `cart` SET `cart_qty`='$new_qty' WHERE `cart_user_id`='$cust_id' and `cart_product_id`='$product_id1'  ");
                                            $this->db->query("DELETE FROM `cart` WHERE `cart_id`='$cart_id'");
                                        }else{
                                            $this->db->query("UPDATE `cart` SET `cart_user_id`='$cust_id' WHERE `cart_session_id`='$session_id'  ");
                                        }
                                    }
                                }
                    }else{
                        $this->db->query("UPDATE `cart` SET `cart_user_id`='$cust_id' WHERE `cart_session_id`='$session_id' ");
                    }
                }
                
                
            } else if (!empty($saveUserRes['emailError']) || !empty($saveUserRes['passwordError'])) {
                if (!empty($saveUserRes['emailError'])) {
                    $responseData['responseEmail'] = 'Please enter a valid email address';
                }
                if (!empty($saveUserRes['passwordError'])) {
                    $responseData['responsePassword'] = 'Invalid password';
                }
            } else {
                    $baseurl = base_url() . 'signup';
                    $responseData['responseData'] = "Email id not registered";
            }
            echo json_encode($responseData);
            die();
        
    }
    


    public function shop(){

    $data['title']='Home | Shop';
    $this->load->library('pagination'); 
    $data['title'] = "Shop | Batches";
    $searchvalue=$this->input->get('searchvalue');
    $data['categories_list']= $this->Comman_model->getAlldata('categories',$where='',$orderby='');
    
    $data['size_list']= $this->Comman_model->getAlldata('sizes',$where='',$orderby='');
    if(!empty($_GET['search'])){ 
    $keyword=$_GET['search'];
     }else{
      $keyword='';
     }
    $category=@$_GET['category'];
    if($category)
    {
    $catdata= $this->Comman_model->getdata('categories',$where=array('category_url'=>$category));
      $category_id =$catdata->category_id;
      

    }else{
     $category_id='';    
    }
    $data['brands_list']= $this->Comman_model->getAlldata('brands',$category_id='',$orderby='');
   
    $data['products']=$this->Comman_model->get_products_where($keyword,$category_id);
    $total_rows= count($data['products']);
        $this->load->library('pagination');
        $config['base_url'] = base_url().'home/shop';
        $config['total_rows'] =$total_rows;
        $config['per_page'] =4;

        
        $config['full_tag_open']='<ul class="pagination">';
        $config['last_tag_close']="</ul>";
        $config['last_tag_open']='<li class="page-item">';
        $config['last_tag_close']="</li>";
        $config['first_tag_open']='<li class="page-item">';
        $config['first_tag_close']="</li>";
        $config['prev_tag_open']='<li class="page-item">';
        $config['prev_tag_close']="</li>";
        $config['last_tag_open']='<li class="page-item">';
        $config['last_tag_close']="</li>";
        $config['cur_tag_open']="<li class='page-item active'><a href='#' >";
        $config['cur_tag_close']="</a></li>";
        $config['num_tag_open']='<li class="page-item">';
        $config['num_tag_close']="</li>";
        $config['next_tag_open']='<li class="page-item">';
        $config['next_tag_close']="</li>";
        $config['num_links'] = 2;
        $this->pagination->initialize($config);        
                
        $offset=$this->uri->segment('3');
        $limit=$config['per_page'];
     $data['products']=$this->Comman_model->product_get_paginated($keyword,$limit,$offset,$category_id);
    // echo "<pre>";
    // print_r($data['products']);
    // die();

    $this->load->view('home/shop',$data);
    }
  
  
  
  
    public function cms($id) 
    {
    $table1='pages';
    $where1= array('page_url' => $id);
    $result['page_details']=$this->Comman_model->getdata($table1, $where1);
  
    if($result['page_details'])
    {

    $result['title']=  $result['page_details']->page_name.' | Batches ';
    $this->load->view('home/cms',$result);
    }
        
    
    }
    
public function filter_product()
{
	$results=array();
	$where='';
	$where1='';
  $per_page = 30;


$pagedata = ($this->input->post('page')) ? $this->input->post('page') : 1;
$brands = ($this->input->post('brands')) ? $this->input->post('brands') : null;
$category = ($this->input->post('category')) ? $this->input->post('category') : null;
$searchvalue = ($this->input->post('searchvalue')) ? $this->input->post('searchvalue') : null;
$sizes = ($this->input->post('sizes')) ? $this->input->post('sizessizes') : null;
$colors = ($this->input->post('colors')) ? $this->input->post('colors') : null;
$segment = $this->input->post('segment');

$subcategoryid = ($this->input->post('subcategoryid')) ? $this->input->post('subcategoryid') : null;




	// print_r($genders);
	$join = array(
            array(
                'table' => 'categories',
                'condition' => 'categories.category_id = products.product_cat',
            ),
            array(
                'table' => 'brands',
                'condition' => 'brands.brand_id = products.product_brand',
            ),
             array(
                'table' => 'product_color_size_record',
                'condition' => 'product_color_size_record.pcs_product_rand_id = products.prid',
            ),
            
        );
		if ($brands) {
			for ($i=0; $i < count($brands) ; $i++) {
				$where.='products.product_brand='.$brands[$i];
				if($i<count($brands)-1)
				{
					$where.=' or ';
				}
			}
		}
		
			if ($colors) {
			for ($i=0; $i < count($colors) ; $i++) {
				$where.='product_color_size_record.pcs_color_id='.$colors[$i];
				if($i<count($colors)-1)
				{
					$where.=' or ';
				}
			}
		}
					if ($sizes) {
			for ($i=0; $i < count($sizes) ; $i++) {
				$where.='product_color_size_record.pcs_size='.$sizes[$i];
				if($i<count($sizes)-1)
				{
					$where.=' or ';
				}
			}
		}
		
		
			if ($category) {
			for ($i=0; $i < count($category) ; $i++) {
				$where.='products.product_cat='.$category[$i];
				if($i<count($category)-1)
				{
					$where.=' or ';
				}
			}
		}
		
		
			
		if($subcategoryid && !$searchvalue  && !$category && !$sizes && !$colors && !$brands)
{
    $where.=' products.product_status=1 ';
    $where.='  or products.product_subcat='.$subcategoryid;
}


		if ($searchvalue  && !$category && !$sizes && !$colors && !$brands) {
		     $where.="  products.product_title like '%".$searchvalue."%' ";
            $where.="  or products.product_url like '%".$searchvalue."%' or products.product_disc like '%".$searchvalue."%' or brands.brand_name like '%".$searchvalue."%' or categories.category_name  like '%".$searchvalue."%' ";
                
        }
    

  $ttl_product=$this->Comman_model->fetchalldata('count(products.product_id) as ttl_product','products',$where,$where1,$join,'product_color_size_record.pcs_product_rand_id','`product_color_size_record`.`pcs_id`','','');
	$products=$this->Comman_model->fetchalldata('*','products',$where,$where1,$join,'product_color_size_record.pcs_product_rand_id','`product_color_size_record`.`pcs_id`',$per_page,$per_page*($pagedata-1));
// echo $this->db->last_query();

    $response = array('status' =>1 ,'data'=> $products,'total_product'=>$ttl_product);
	echo json_encode($response);
}



  
  public function logout(){
    $this->session->unset_userdata('cid');
    $this->session->unset_userdata('session_id');
    return redirect(base_url());
  }
  
   
     public function forgotPassword(){
        $inputData = $this->input->post();        
        $responseData = array();
        $email=$this->input->post('email');
        $where1= array('cust_email' => $email);
        $emailcheck=$this->Comman_model->getdata('customer', $where1);
        if($emailcheck){
             $this->load->library('email');
                $config['protocol'] = 'sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $email = $this->input->post('email');
               // $password = $this->input->post('password');
               
               $encryption=md5($email);
               $data=array('reset_token'=>$encryption);
               $where=array('cust_email'=>$email);
			         $this->Comman_model->UpdateRecord('customer', $data, $where);
                  $url = base_url().'reset_password/'.$encryption;

                $message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml"><head><title>Forgot Password</title></head><body>';
                $message .="Follow this link to reset password<br>";
                $message .="<br><a href='".$url."' target='_blank'>".'Click Here'."</a><br>";
                $message .='</body></html>';
                $this->email->from('info@Batches.com', 'Batches.com');
                $this->email->to($email);
                $this->email->subject('Forgot Password');
                $this->email->message($message);    
                
                if($this->email->send()){ }else{ }
            $responseData['responseData']='We Have Sent Password Reset Link On Your Email Address ';
        }
        else{
                $responseData['responseData']='Please Enter a Valid Email Address';
            }
        
        echo json_encode($responseData);
        die();
    }
    
    public function reset_password($encryption) 
        {
         if(!empty($encryption)){
        $result['title']='Home | Reset Password';
        
        $result['banner5']  =$this->Comman_model->getdata('banners', $where=array('banner_id'=>'5'));
        $result['reset_token']=$encryption;
        $this->load->view('home/reset_password',$result);
       }else{
        
       }
        }
        
    public function wishlist() 
    {
        $result['title']='Home | Wishlist';
    $cid = $this->session->userdata('cid');
    
    if(empty($cid))
    {
    redirect(base_url());
    }
      $session_id = $this->session->userdata('session_id');
        $cid = $this->session->userdata('cid');
        $lang='en';
        $result['cart_details'] = $this->Comman_model->wishlist_detail($session_id,$cid);
      
                $total=0;
        for($i=0;$i<count($result['cart_details']); $i++) {
         $cart_color_id= $result['cart_details'][$i]['wish_color_id'];
         $cart_qty=   $result['cart_details'][$i]['wish_qty'];
         $cart_price=   $result['cart_details'][$i]['wish_price'];
         $cart_size_id=   $result['cart_details'][$i]['wish_size_id'];
         $cart_product_random=   $result['cart_details'][$i]['wish_product_random'];
        $cart_product_id=   $result['cart_details'][$i]['wish_product_id'];
        $row= $this->Comman_model->getdata('product_color_size_record',$where=array('pcs_product_rand_id'=>$cart_product_random));
        
        $result['cart_details'][$i]['product_qty']=$row->pcs_qty;

        $result['cart_details'][$i]['sku']=$row->sku;
        
        $row= $this->Comman_model->getdata('sizes',$where=array('size_id'=>$cart_size_id));
        if($lang=='en'){
        $result['cart_details'][$i]['size_name']=$row->size_name;
        }else{
        $result['cart_details'][$i]['size_name']=$row->ar_size_name;
        }
        
        $row= $this->Comman_model->getdata('products',$where=array('product_id'=>$cart_product_id));
        if($lang=='en'){
        $result['cart_details'][$i]['product_title']=$row->product_title;
        $result['cart_details'][$i]['product_url']=$row->product_url;
        $result['cart_details'][$i]['product_image']=$row->ps_image;
        
        }else{
        $result['cart_details'][$i]['product_title']=$row->ar_product_title;
        $result['cart_details'][$i]['product_url']=$row->product_url;
        }

            
        }
       
        

        $result['banner5']  =$this->Comman_model->getdata('banners', $where=array('banner_id'=>'5'));


    $this->load->view('home/wishlist',$result);
    }
    
   
    
        public function orders_details($order_id,$product_id) 
    {

    $cid = $this->session->userdata('cid');
    
    if(empty($cid))
    {
    redirect(base_url());
    }
        
            $data['title']='Home | Orders';
            
            $where=array('orders.ord_id'=>$order_id,'order_products.order_product_id'=>$product_id);
             $data['orderdetail']=$this->Comman_model->getOrders($where);
             if(empty($data['orderdetail'])){
              echo "something went wrong";
              die();
              redirect('account');
             }
             // echo "<pre>";
             // print_r($data['orderdetail']);
             // die();
             $data['banner5']  =$this->Comman_model->getdata('banners', $where=array(' banner_id'=>'5'));
        $this->load->view('home/orders_details',$data);
    }
    
    
    
    
        public function account()  
        {
            $result['title']='Home | Account';
            $cid = $this->session->userdata('cid');
            if(empty($cid)) { redirect(base_url()); }
            $result['order_list']  =$this->Comman_model->getOrders('');
            // echo "<pre>";
            // echo $this->session->userdata('cid');
            // print_r($result['order_list']);
            // die();
            $result['banner5']  =$this->Comman_model->getdata('banners', $where=array('banner_id'=>'5'));
            $where11 = array('cust_id' =>$cid);
            $result['userdata'] = $this->Comman_model->getData('customer', $where11);
            
            $this->load->view('home/my_account',$result);
        }
        
                public function myaddress() 
        {
            $result['title']='Home | Account';
            $cid = $this->session->userdata('cid');
            if(empty($cid)) { redirect(base_url()); }
            $result['address_list']  =$this->Comman_model->getAllData('shipping', $where=array('ship_cust_id'=>$cid));
            $result['banner5']  =$this->Comman_model->getdata('banners', $where=array('banner_id'=>'5'));
            $this->load->view('home/myaddress',$result);
        }
        
               public function add_address() 
        {
            $result['title']='Home | Account';
            $cid = $this->session->userdata('cid');
            if(empty($cid)) { redirect(base_url()); }
            $result['address_list']  =$this->Comman_model->getAllData('shipping', $where=array('ship_cust_id'=>$cid));
            $result['banner5']  =$this->Comman_model->getdata('banners', $where=array('banner_id'=>'5'));
            $this->load->view('home/add_address',$result);
        }
        
        
              public function edit_address($id) 
        {
            $result['title']='Home | Account';
            $cid = $this->session->userdata('cid');
            if(empty($cid)) { redirect(base_url()); }
            $result['address_row']  =$this->Comman_model->getdata('shipping', $where=array('ship_cust_id'=>$cid,'ship_id'=>$id));
            $result['banner5']  =$this->Comman_model->getdata('banners', $where=array('banner_id'=>'5'));
            $this->load->view('home/edit_address',$result);
        }
        
        

        
        
        
                 public function delete_address($id) 
        {
            $cid = $this->session->userdata('cid');
            if(empty($cid)) { redirect(base_url()); }
            $where = array('ship_id' =>$id,'ship_cust_id'=>$cid);
            $this->Comman_model->Deletedata('shipping', $where);
        }
        
        
                 
    public function add_user_address(){
        $inputData = $this->input->post();
  $cid = $this->session->userdata('cid');
            $userData = array();
            $user_fname = $inputData['user_fname'];
            $user_lname= $inputData['user_lname'];
            $phone = $inputData['phone'];
            $ship_city = $inputData['ship_city'];
            $ship_zip = $inputData['ship_zip'];
            $ship_country = $inputData['ship_country'];
            $ship_address = $inputData['ship_address'];
            $ship_state = $inputData['ship_state'];

                $data=array(
                    'ship_cust_id'=>$cid,
                    'ship_fname'=>$user_fname,
                    'ship_lname'=>$user_lname,
                    'ship_phone'=>$phone,
                    'ship_address'=>$ship_address,
                    'ship_city'=>$ship_city,
                    'ship_state'=>$ship_state,
                    'ship_country'=>$ship_country,
                    'ship_zip'=>$ship_zip,
                    );
                    
               $id= $this->Comman_model->insertData('shipping', $data);
               if($id){
                    $responseData['responseData'] = 'register';
               }else{
                     $responseData['responseData'] = "something";
               }
            echo json_encode($responseData);
            die();
        
    }
    
       public function edit_user_address(){
        $inputData = $this->input->post();
  $cid = $this->session->userdata('cid');
            $userData = array();
            $user_fname = $inputData['user_fname'];
            $user_lname= $inputData['user_lname'];
            $phone = $inputData['phone'];
            $ship_city = $inputData['ship_city'];
            $ship_zip = $inputData['ship_zip'];
            $ship_country = $inputData['ship_country'];
            $ship_address = $inputData['ship_address'];
            $ship_state = $inputData['ship_state'];
            $ship_id = $inputData['ship_id'];

                $data=array(
                    'ship_cust_id'=>$cid,
                    'ship_fname'=>$user_fname,
                    'ship_lname'=>$user_lname,
                    'ship_phone'=>$phone,
                    'ship_address'=>$ship_address,
                    'ship_city'=>$ship_city,
                    'ship_state'=>$ship_state,
                    'ship_country'=>$ship_country,
                    'ship_zip'=>$ship_zip,
                    );
                    
                    $result = $this->Comman_model->UpdateRecord('shipping', $data, $WhereData=array('ship_id'=>$ship_id) );
                    
               if($result){
                    $responseData['responseData'] = 'register';
               }else{
                     $responseData['responseData'] = "something";
               }
            echo json_encode($responseData);
            die();
        
    }
    
    
        
        

   

 public function change_password() 
    {
    $cid = $this->session->userdata('cid');
    
    if(empty($cid))
    {
    redirect(base_url());
    }
        $result['title']='Home | Change Password';

        $result['order_list']  =$this->Comman_model->getAllData('orders', $where=array('ord_user_id'=>$cid));
        $result['banner5']  =$this->Comman_model->getdata('banners', $where=array('banner_id'=>'5'));
        $this->load->view('home/change_password',$result);
    }   
    
     public function checkold_password(){
        $inputData = $this->input->post();        
        $responseData = array();
        $userValue=$this->input->post('userValue');
        $cid = $this->session->userdata('cid');

        $where1= array('cust_id' => $cid,'cust_pass'=>md5($userValue));
        
        $emailcheck=$this->Comman_model->getdata('customer', $where1);
        if($emailcheck)
        {
          $responseData['responseData']='Password Match';
        }
        else
        {
         $responseData['responseData']='Password Not Match';
        }
        
        echo json_encode($responseData);
        die();
    }
     
    public function update_profile(){
      $inputData=$this->input->post();
      $name=$inputData['name'];
      $fname=$inputData['fname'];
      $lname=$inputData['lname'];
      $email=$inputData['email'];
      $phone=$inputData['phone'];
      
      $data=  array('cust_name' => $name,
                    'cust_phone' =>$phone,
                    'cust_email'=>$email,
                     'cust_fname'=>$fname,
                     'cust_lname'=>$lname
                       );
      $where=array('cust_id'=>$this->session->userdata('cid'));
      $this->session->set_userdata($data);
      $update = $this->Comman_model->UpdateRecord('customer', $data, $where);
        if($update){
            
            echo TRUE;
        }
        else{
                echo FALSE;
            }
       
        die();
      }
     
     public function update_address(){
      $inputData=$this->input->post();
      $city=$inputData['city'];
      $street=$inputData['street'];
      
      $data=  array('city' => $city,
                    'street' =>$street
                    );
      $where=array('cust_id'=>$this->session->userdata('cid'));
      $update = $this->Comman_model->UpdateRecord('customer', $data, $where);
        if($update){
            
            echo TRUE;
        }
        else{
                echo FALSE;
            }
       
        die();
      }


     public function update_password(){
        
        $inputData = $this->input->post();        
        $responseData = array();
        
        $new_password=$this->input->post('new_password');
        $old_password=$this->input->post('old_password');

        $cid = $this->session->userdata('cid');

        $WhereData1 = array('cust_id' => $cid);
        $data1 = array('cust_pass' =>md5($new_password));
        
        $where1= array('cust_id' => $cid,'cust_pass'=>md5($old_password));
        
        $emailcheck=$this->Comman_model->getdata('customer', $where1);
        if(empty($emailcheck))
        {
           $responseData['responseData']=2;

        }else{
         
         $update = $this->Comman_model->UpdateRecord('customer', $data1, $WhereData1);
        if($update){
            
            $responseData['responseData']=1;
        }
        else{
                $responseData['responseData']=0;
            }
        
        }
        echo json_encode($responseData);
        die();
    }
    public function renew_password(){
        
        $inputData = $this->input->post();        
        $responseData = array();
        $reset_token=$this->input->post('reset_token');
        $new_password=$this->input->post('new_password');
        
        

        $WhereData = array('reset_token' => $reset_token);
        $data = array('cust_pass' =>md5($new_password));
        
         
         $update = $this->Comman_model->UpdateRecord('customer', $data, $WhereData);
        if($update){
            
            $responseData['responseData']=1;
         }
        else{
                $responseData['responseData']=0;
            }
        
        
        echo json_encode($responseData);
        
    }
    
    
    
    
    public function update_user(){
        $inputData = $this->input->post();        
        $responseData = array();
        
        $user_fname=$this->input->post('user_fname');
        $user_lname=$this->input->post('user_lname');
        $phone=$this->input->post('phone');
        $cid = $this->session->userdata('cid');
        $WhereData1 = array('cust_id' => $cid);
        $data1 = array('cust_fname' =>$user_fname,'cust_lname'=>$user_lname,'cust_phone'=>$phone);
        
        $update = $this->Comman_model->UpdateRecord('customer', $data1, $WhereData1);
        if($update){
            
            $responseData['responseData']='Update Successfully';
        }
        else{
                $responseData['responseData']='Something went wrong';
            }
        
        echo json_encode($responseData);
        die();
    }
    
 public function add_subscribe(){
        $inputData = $this->input->post();        
        $responseData = array();
      
        $email=$this->input->post('email'); 
        $data1=array('emails'=>$email);
        
                $check=$this->Comman_model->getdata('newsletter',$data1);
                if(!empty($check))
                {
                $responseData['responseData']='alredy';
                
                
                }else{
                            $data1['status']='1';
                        $emailcheck=$this->Comman_model->insertData('newsletter',$data1);
                        if($emailcheck)
                        {
                        $responseData['responseData']='success';
                        }
                        else
                        {
                        $responseData['responseData']='fail';
                        } 
                  }
        
        
        
      
        
        echo json_encode($responseData);
        die();
    }
    
            
      
  
  
      
            public function contact_us()
  {  
      
        $data['title'] = "Contact us | Batches";
        $data['banner5']  =$this->Comman_model->getdata('banners', $where=array('banner_id'=>'5'));
        $message=array(
                  'name'=>$this->input->post('name'),
                  'email'=>$this->input->post('email'),
                  'phone'=>$this->input->post('phone'),
                  'message'=>$this->input->post('message')
                  );

		    $result= $this->Comman_model->insertData('contactus',$message);
        $email=$this->input->post('email');
       
                 $config=array(
                              'charset'=>'utf-8',
                              'wordwrap'=> TRUE,
                              'mailtype' => 'html',
                              'priority'=>1,
                              );

                $this->email->initialize($config);
                $fromemail=$email;
                $this->email->to('Info@batcheskw.com');
                $this->email->from($fromemail, "Bathces Order");
                $this->email->subject('testing');
                $this->email->message($this->input->post('message'));
                echo "TRUE";
                
        
     
 } 
    // the filteration code done by umesh
    public function my_filters(){
        $max=$this->input->post('max');
        $min=$this->input->post('min');
        $cat=$this->input->post('cat');
        $per_page=$this->input->post('per_page');
        $sub_cat=$this->input->post('sub_cat');
        $brand= $this->input->post('brand');
        $order_by=$this->input->post('order_by');
        $srt=$this->input->post('srt');
        $search=$this->input->post('search');
        $num_rows=$this->Comman_model->get_num_rows($max,$min,$cat,$sub_cat,$brand,$search);
        $total_rows= $num_rows;
        $this->load->library('pagination');
        $config['base_url'] = '#';
        $config['total_rows'] =$total_rows;
        $config['per_page'] =$per_page;
        $config['uri_segment']=3;
        $config['use_page_numbers']=TRUE;
        
        $config['full_tag_open']='<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['last_tag_close']="</ul></nav>";
        $config['last_tag_open']='<li class="page-item">';
        $config['last_tag_close']="</li>";
        $config['first_tag_open']='<li class="page-item">';
        $config['first_tag_close']="</li>";
        $config['prev_tag_open']='<li class="page-item">';
        $config['prev_tag_close']="</li>";
        $config['last_tag_open']='<li class="page-item">';
        $config['last_tag_close']="</li>";
        $config['cur_tag_open']="<li class='page-item active'><a href='#'>";
        $config['cur_tag_close']="</a></li>";
        $config['num_tag_open']='<li class="page-item">';
        $config['num_tag_close']="</li>";
        $config['next_tag_open']='<li class="page-item">';
        $config['next_tag_close']="</li>";
        
        $this->pagination->initialize($config);        
        // getting products 
        $limit=$config['per_page'];
        $offset=($this->uri->segment('3')-1)*$limit;
        $products=$this->Comman_model->filter_data($max,$min,$cat,$sub_cat,$brand,$order_by,$srt,$limit,$offset,$search);
        
        // getting brands
        $brands=$this->Comman_model->get_brand($cat,$sub_cat);
        
        // // pagination links
        // 'pagination_links'=>$this->pagination->create_links(),
    // json response
        $output=array('pagination_links'=>$this->pagination->create_links(),'brands'=>$brands,'products'=>$products);
        echo json_encode($output);
    }
    
    
}
  
    ?>