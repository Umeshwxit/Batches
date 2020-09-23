<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {



  public function __construct()

    {

        parent::__construct();

        $this->load->model('Comman_model');

        $this->load->model('Adminmodel');

        $this->load->helper('common_helper');



        if(!$this->session->userdata('aid')){

            return redirect('Adminlogin');

        }

         $session_id=$this->session->userdata('aid');

        $table55  = 'admin';

        $where5  = array('admin_id'=> $session_id);

        $user =$this->Comman_model->getdata($table55, $where5);   

        // if ( $user->product=='0') {

        // redirect('Admin/not_permission');

        // }

    }



       function check_default($array)

{

  

    if($array == '0')

    { 

    return FALSE;

    }else{

    return TRUE;

    }

}

    public function index() {

       $this->load->view('admin/header');

       $this->load->view('admin/nav');

       

        $table  = 'products';



        $vendor_id=$this->uri->segment(3);

        if ($vendor_id) {

        $where  =array('vendor_id'=>$vendor_id); 

        }else{



        $where  = '';

        }





        $oderBy = 'product_id'; 

        //*****************************

        $table1 = 'categories';

        $where1 = '';

        $oderBy1 = '';

        //*****************************

        $table2 = 'brands';

        $where2 = '';

        $oderBy2 = '';



    $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);

    $data['categories']  =$this->Comman_model->getAllData($table1, $where1, $oderBy1 = '');

    $data['brands']  =$this->Comman_model->getAllData($table2, $where2, $oderBy2 = '');        

    $this->load->view('admin/products/products_list',$data);

    $this->load->view('admin/footer');

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

        $msg=$this->session->set_flashdata('msg','Product Delete Successfully');

    redirect($cname.'/'.$fname);    

    }

      public function update()

    {

      $cname= $this->uri->segment(1);

    $coulom= $this->uri->segment(3);

    $table= $this->uri->segment(4);

    $id= $this->uri->segment(5);

    $fname= $this->uri->segment(6);

    $status= $this->uri->segment(7);    

    $prid= $this->uri->segment(8);

    // $prid= $this->uri->segment(9);



           $table55  = 'product_color_size_record';

        $where5  = array('pcs_product_rand_id'=> $prid);

        $variationdata =$this->Comman_model->getdata($table55, $where5);  

if (empty($variationdata)) {

    

      $msg=$this->session->set_flashdata('msg','Add Atleast 1 variation');



}else{





    $TableName  = 'products';

        $Data = array('product_status' => $status );

        $WhereData = array('product_id' => $id);

      $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

      $msg=$this->session->set_flashdata('msg','Product Status Update Successfully');

}







    redirect($cname.'/'.$fname.'/'); 

    }

    // public function update()

    // {

    //   $cname= $this->uri->segment(1);

    // $coulom= $this->uri->segment(3);

    // $table= $this->uri->segment(4);

    // $id= $this->uri->segment(5);

    // $fname= $this->uri->segment(6);

    // $status= $this->uri->segment(7);

    // $aa= $this->uri->segment(8);

    // $TableName  = 'products';

    //     $Data = array('product_status' => $status );

    //     $WhereData = array('product_id' => $id);

    //   $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

    //   $msg=$this->session->set_flashdata('msg','Product Status Update Successfully');

    // redirect($cname.'/'.$fname.'/'. $aa); 

    // }

    //------------------edit----------sheetal--------------

    public function product_image_list()

    {

    $prid= $this->uri->segment(3);

    $table='product_color_size_record';

    $where = array('pcs_product_rand_id' => $prid);

    $q=   $this->db->query("SELECT product_color_size_record.*,sizes.size_name FROM `product_color_size_record`,sizes WHERE  

    product_color_size_record.pcs_size=sizes.size_id and product_color_size_record.pcs_product_rand_id='$prid' ");

    $aa=  $q->result();

    $data['list'] = $q->result();

    $this->load->view('admin/header');

    $this->load->view('admin/nav');

    $this->load->view('admin/products/product_image_list',$data);

    $this->load->view('admin/footer');

    }

     public function product_section()

    {

        $cname= $this->uri->segment(1);

        $coulom= $this->uri->segment(3);

        $table= $this->uri->segment(4);

        $id= $this->uri->segment(5);

        $fname= $this->uri->segment(6);     

        $prid= $this->uri->segment(7);     

        $where = array($coulom =>$id);

        $this->Comman_model->Deletedata($table, $where);



         $table4 = 'product_color_size_record';

        $where4 =array('pcs_product_rand_id'=>$prid);

        $oderBy4 = '';

        $data =count($this->Comman_model->getAllData($table, $where, $oderBy = ''));      

        if ($data<=0) {

           $where = array('ps_prid' =>$prid);

        $this->Comman_model->Deletedata('product_section', $where);

        }







        $msg=$this->session->set_flashdata('msg','Product Delete Successfully');

        redirect($cname.'/'.$fname.'/'.$prid);    

    }

    public function add()

    {

         $data['prid']=$this->uri->segment(3);

         $this->load->view('admin/header');

       $this->load->view('admin/nav');

        $table  = 'products';

        $where  = '';

        $oderBy = 'product_id'; 

        //*****************************

        $table1 = 'categories';

        $where1 = '';

        $oderBy1 = '';

        //*****************************

        $table2 = 'brands';

        $where2 = '';

        $oderBy2 = '';

        //*******************************

        $table3 = 'tags';

        $where3 = '';

        $oderBy3 = '';

        

        //********************************

        $table4 = 'featured_category';

        $where4 = '';

        $oderBy4 = '';

        $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');

        $data['categories']  =$this->Comman_model->getAllData($table1, $where1, $oderBy1 = '');

        $data['brands']  =$this->Comman_model->getAllData($table2, $where2, $oderBy2 = '');

        $data['tag']  =$this->Comman_model->getAllData($table3, $where3, $oderBy3 = '');

        $data['fetcher']  =$this->Comman_model->getAllData($table4, $where4, $oderBy4 = '');



        $this->load->view('admin/products/add',$data);

        $this->load->view('admin/footer');

    }

    public function insert_product()

    {





$this->form_validation->set_message('check_default', 'The field is required');







      if ($this->form_validation->run('products') == FALSE) 

        {

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

          $data['prid']= $this->uri->segment(3);



        //*****************************

        $table1 = 'categories';

        $where1 = '';

        $oderBy1 = '';

        //*****************************

        $table2 = 'brands';

        $where2 = '';

        $oderBy2 = '';

    

      $data['categories']  =$this->Comman_model->getAllData($table1, $where1, $oderBy1 = '');

      $data['brands']  =$this->Comman_model->getAllData($table2, $where2, $oderBy2 = '');

        $this->load->view('admin/header');

        $this->load->view('admin/nav');

        $this->load->view('admin/products/add',$data);

        $this->load->view('admin/footer');

        } 

        else 

        {

               $prid=$this->input->post('prid');

                $data['prid']=$this->input->post('prid');

                $product_title = $this->input->post('product_title');

                $titleURL = strtolower(url_title($product_title));

                if(isUrlExists('products',$titleURL,'product_url')){

                $titleURL = $titleURL.'-'.time(); 

                }

                

                 $data = array(

                    'product_sdisc'=>$this->input->post('product_sdisc'),

                    'product_title' => $product_title, 

                    'product_url' => $titleURL,

                    'product_cat' => $this->input->post('product_cat'), 

                    'product_subcat' => $this->input->post('product_subcat'), 

                    'product_brand' => $this->input->post('product_brand'), 

                    'product_disc' => $this->input->post('product_disc'),

                    'prid' => $this->input->post('prid'), 
                     'product_status'=>1,

                    'production_date' => $this->input->post('production_date'), 

                 );



                if ($this->input->post('product_type')) {

                $product_type =  $this->input->post('product_type');

                $data['product_type']= implode(",",$product_type);

                } 



              $galleryname = "";

            if (!empty($_FILES['files']['name'][0])) {

            $filesCount = count($_FILES['files']['name']);

            for ($i = 0;$i < $filesCount;$i++) {

            $_FILES['file']['name'] = $_FILES['files']['name'][$i];

            $_FILES['file']['type'] = $_FILES['files']['type'][$i];

            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

            $_FILES['file']['error'] = $_FILES['files']['error'][$i];

            $_FILES['file']['size'] = $_FILES['files']['size'][$i];

            $file = $this->Comman_model->updateMedia('file','gallery');

            $galleryname = $galleryname . "," . $file;

            }

            

            

            $galleryname = trim($galleryname, ",");

            //echo $galleryname;die;

            $data['ps_gallery'] = $galleryname;

            }

            if(isset($_FILES) && !empty($_FILES) && !empty($_FILES['product_img']['name'])){    

            $file = $this->Comman_model->updateMedia('product_img','gallery');

            $data['ps_image'] = $file;   

            }





        $result = $this->Comman_model->insertData('products',$data);

             

    if($result){



        $msg=$this->session->set_flashdata('msg','Product Add Successfully');

        return redirect("products/add_product_section/".$prid);

    }



       

    }



    }

    public function edit()

    {

         $id=  $this->uri->segment(3);

         $this->load->view('admin/header');

       $this->load->view('admin/nav');



        $table1 = 'categories';

        $where1 = '';

        $oderBy1 = '';

        //*****************************

        $table2 = 'brands';

        $where2 = '';

        $oderBy2 = '';



        $table5 = 'products';

        $where5 = array('product_id' => $id ); 

        $data['categories']  =$this->Comman_model->getAllData($table1, $where1, $oderBy1 = '');

        $data['brands']  =$this->Comman_model->getAllData($table2, $where2, $oderBy2 = '');

        $data['update']  =$this->Comman_model->getdata($table5, $where5);

        $this->load->view('admin/products/edit',$data);

        $this->load->view('admin/footer');

    }

    public function update_product($product_id)

    {

        $prid = $this->input->post('prid');





        $this->form_validation->set_message('check_default', 'The field is required');

        if($this->form_validation->run('products1') == FALSE){

            

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

         //$id=  $this->uri->segment(3);

        $this->load->view('admin/header');

        $this->load->view('admin/nav');

       

        $table1 = 'categories';

        $where1 = '';

        $oderBy1 = '';

        //*****************************

        $table2 = 'brands';

        $where2 = '';

        $oderBy2 = '';

      



        $table5 = 'products';

        $where5 = array('product_id' => $product_id ); ;

       

        $data['categories']  =$this->Comman_model->getAllData($table1, $where1, $oderBy1 = '');

  

  

        $data['brands']  =$this->Comman_model->getAllData($table2, $where2, $oderBy2 = '');

        $data['update']  =$this->Comman_model->getdata($table5, $where5);

        $this->load->view('admin/products/edit',$data);

        $this->load->view('admin/footer');

        } 

        else 

        {

            $TableName='products';

            $WhereData= array('product_id' =>$product_id);

            $date=date('Y-m-d h:i:s');



  $Data = array(

                    'product_sdisc'=>$this->input->post('product_sdisc'),

                    'product_title' => $this->input->post('product_title'), 

                    'product_cat' => $this->input->post('product_cat'), 

                    'product_subcat' => $this->input->post('product_subcat'), 

                    'product_brand' => $this->input->post('product_brand'), 

                    'product_disc' => $this->input->post('product_disc'),

                    'production_date' => $this->input->post('production_date'), 



                 );



                if ($this->input->post('product_type')) {

                $product_type =  $this->input->post('product_type');

                $Data['product_type']= implode(",",$product_type);

                } 

                

    

            $galleryname = "";

            if (!empty($_FILES['files']['name'][0])) {

            $filesCount = count($_FILES['files']['name']);

            for ($i = 0;$i < $filesCount;$i++) {

            $_FILES['file']['name'] = $_FILES['files']['name'][$i];

            $_FILES['file']['type'] = $_FILES['files']['type'][$i];

            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

            $_FILES['file']['error'] = $_FILES['files']['error'][$i];

            $_FILES['file']['size'] = $_FILES['files']['size'][$i];

            $file = $this->Comman_model->updateMedia('file','gallery');

            $galleryname = $galleryname . "," . $file;

            }

            

            

            $galleryname = trim($galleryname, ",");

            //echo $galleryname;die;

            $Data['ps_gallery'] = $galleryname;

            }

            if(isset($_FILES) && !empty($_FILES) && !empty($_FILES['product_img']['name'])){    

            $file = $this->Comman_model->updateMedia('product_img','gallery');

            $Data['ps_image'] = $file;   

            }



     

 

     

            $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

        }

                $msg=$this->session->set_flashdata('msg','Product Update Successfully');

                 redirect("products");

    } 

    

       public function add_product_section()

       {



            $prid=$this->uri->segment(3);

            $result['provalues'] = $this->Adminmodel->cat_id_check($prid); 

            $catid = $result['provalues'][0]['product_cat'];

            $data['size'] = $this->Adminmodel->sizes_by_catid($catid);

         

            $this->load->view('admin/header');

            $this->load->view('admin/nav');

            $this->load->view('admin/products/add_product_section',$data);

            $this->load->view('admin/footer');

       } 

       

   public function add_multipleimage()

   {

    $prid = $this->input->post('prid');

    if ($this->form_validation->run('image') == FALSE) 

    {

    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

    }

    else

    {



        

        $size_id=$this->input->post('size_id');

        $price_mrp=$this->input->post('price_mrp');

        $price_sale=$this->input->post('price_sale');

        $quantity=$this->input->post('quantity');

        $sku=$this->input->post('sku');

        

        for ($i = 0;$i < count($size_id) ;$i++) {

            $data1=array('pcs_product_rand_id'=>$prid, 'pcs_size'=>$size_id[$i],'pcs_mrp'=>$price_mrp[$i],'pcs_sale'=>$price_sale[$i],'pcs_qty'=>$quantity[$i],'sku'=>$sku[$i]);

         

        //  print_r($data1);

            $result = $this->Comman_model->insertData('product_color_size_record',$data1);

        }

        

        if ($result)

        {

            $msg=$this->session->set_flashdata('msg',' Add Successfully');

            return redirect("products");

        }

        

       }

}

    





    public function update_product_section()

   {



      $prid = $this->input->post('prid');

        if ($this->form_validation->run('image') == FALSE) 

        {

         $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        }

        else

            {

                $ps_id=$this->input->post('ps_id');

                $WhereData = array('pcs_id' =>$ps_id);

                $size_id=$this->input->post('size_id');

                $price_mrp=$this->input->post('price_mrp');

                $price_sale=$this->input->post('price_sale');

                $quantity=$this->input->post('quantity');

                $sku=$this->input->post('sku');

                

                for ($i = 0;$i < count($size_id) ;$i++) {

                $data1=array('pcs_product_rand_id'=>$prid, 'pcs_size'=>$size_id[$i],'pcs_mrp'=>$price_mrp[$i],'pcs_sale'=>$price_sale[$i],'pcs_qty'=>$quantity[$i],'sku'=>$sku[$i]);

                         $result = $this->Comman_model->UpdateRecord('product_color_size_record',$data1,$WhereData);



                }

            

            

            

                if ($result)

                {

                    $msg=$this->session->set_flashdata('msg','Update Successfully');

                    return redirect("products");

                }

            

            }

   }

    







 public function edit_image()

    {



        $id=$this->uri->segment(3);

        $prid=$this->uri->segment(4);

        $table2='product_color_size_record';

        $where2 = array('pcs_id' => $id);

      



        $data['update']  =$this->Comman_model->getdata($table2, $where2);



  $result['provalues'] = $this->Adminmodel->cat_id_check($prid);

  $catid = $result['provalues'][0]['product_cat'];

  $subcatid = $result['provalues'][0]['product_subcat'];

     

  $data['sizes'] = $this->Adminmodel->sizes_by_catid($catid, $subcatid);



        $this->load->view('admin/header');

        $this->load->view('admin/nav');

        $this->load->view('admin/products/edit_product_section',$data);

        $this->load->view('admin/footer');

    }





 public function updated_product() {

       $this->load->view('admin/header');

       $this->load->view('admin/nav');

       

        $table  = 'products';



        $vendor_id=$this->uri->segment(3);

        if ($vendor_id) {

        $where  =array('vendor_id'=>$vendor_id,'product_status'=>'0'); 

        }else{



        $where  =array('product_status'=>'0'); 

    

        }





        $oderBy = 'update_at'; 

        //*****************************

        $table1 = 'categories';

        $where1 = '';

        $oderBy1 = '';

        //*****************************

        $table2 = 'brands';

        $where2 = '';

        $oderBy2 = '';



    $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);

    $data['categories']  =$this->Comman_model->getAllData($table1, $where1, $oderBy1 = '');

    $data['brands']  =$this->Comman_model->getAllData($table2, $where2, $oderBy2 = '');        

    $this->load->view('admin/products/updateproducts_list',$data);

    $this->load->view('admin/footer');

    }

















} ?>