<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Size extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Comman_model');
                $this->load->helper('common_helper');

        if(!$this->session->userdata('aid')){
            return redirect('Adminlogin');
        }
        $session_id=$this->session->userdata('aid');
        $table55  = 'admin';
        $where5  = array('admin_id'=> $session_id);
        $user =$this->Comman_model->getdata($table55, $where5);   
        // if ( $user->defination=='0') {
        // redirect('Admin/not_permission');
        // }
    }

   
    public function index() {
       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table	= 'sizes';
        $where	= '';
        $oderBy = 'size_id'; 
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
        $this->load->view('admin/size/size_list',$data);
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
        $msg=$this->session->set_flashdata('msg','Size Delete Successfully');
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
		$TableName	= 'products';
        $Data	= array('product_status' => $status);
        $WhereData = array('product_id' => $id);
    	$this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);
    	$msg=$this->session->set_flashdata('msg','Size Status Update Successfully');
		redirect($cname.'/'.$fname); 
    }
     public function add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
          $table    = 'categories';
        $where  = '';
        $oderBy = ''; 
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
        $this->load->view('admin/size/add',$data);
        $this->load->view('admin/footer');
      
    }
    public function insert()
    {
        $size_name = $this->input->post('size_name');
        $ar_size_name = $this->input->post('ar_size_name');
        $cat_name = $this->input->post('cat_name');
        $subcat_name = $this->input->post('subcat_name');
         if ($this->form_validation->run('size') == FALSE) 
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $table    = 'categories';
            $where  = '';
            $oderBy = ''; 
            $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
            $this->load->view('admin/size/add',$data);
            $this->load->view('admin/footer');
        }
        else
        {
            
                $titleURL = strtolower(url_title($size_name));
            if(isUrlExists('sizes',$titleURL,'size_url')){
            $titleURL = $titleURL.'-'.time(); 
            }
            $data =array ('size_name' => $size_name, 'size_cat_id' => $cat_name, 'size_subcat_id' => $subcat_name, 'size_url' => $titleURL);
                $result = $this->Comman_model->insertData('sizes',$data);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Size Add Successfully');
                    return redirect("size");
                }
        }

    }
    public function edit()
    {
        $id= $this->uri->segment(3);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $table    = 'categories';
        $where  = '';
        $oderBy = ''; 
        //****************
        $table1='sizes';
        $where1=array('size_id' =>$id);
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
        $data['update']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/size/edit',$data);
        $this->load->view('admin/footer');
    }
    function updates()
    {
        $id=$this->input->post('id');
        $size_name = $this->input->post('size_name');
        $ar_size_name = $this->input->post('ar_size_name');
        $cat_name = $this->input->post('cat_name');
        $subcat_name = $this->input->post('subcat_name');
         if ($this->form_validation->run('size1') == FALSE) 
        {
            $id= $this->uri->segment(3);
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $table    = 'categories';
            $where  = '';
            $oderBy = ''; 
            //****************
            $table1='sizes';
            $where1=array('size_id' =>$id);
          $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
            $data['update']=$this->Comman_model->getdata($table1, $where1);
            $this->load->view('admin/size/edit',$data);
            $this->load->view('admin/footer');
        }
        else
        {
            $TableName='sizes';
            $WhereData= array('size_id' =>$id);

            $Data =array ('size_name' => $size_name, 'size_cat_id' => $cat_name, 'size_subcat_id' => $subcat_name);
                $result = $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Size Update Successfully');
                    return redirect("size");
                }
        }
    }
    

}
