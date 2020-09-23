<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coupan extends CI_Controller 
{

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
        // if ( $user->coupon=='0') {
        // redirect('Admin/not_permission');
        // }
    }
    
    public function index() 
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $table	= 'coupons';
        $where	= '';
        $oderBy = 'cup_id'; 
        $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
        $this->load->view('admin/coupan/coupan_list',$data);
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
        $msg=$this->session->set_flashdata('msg','Coupan Delete Successfully');
		redirect($cname.'/'.$fname);   	
    }
    public function add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/coupan/add');
        $this->load->view('admin/footer');
      
    }
    public function insert()
    {
    	$cup_name = $this->input->post('cup_name');
        $cup_url = str_replace(" ", "-", strtolower(trim($cup_name)));
        $cup_url = str_replace("&", "and", $cup_url);
        $cup_value = $this->input->post('cup_value');
        $cup_qty = $this->input->post('cup_qty');
        $cup_type = $this->input->post('cup_type');
        $cup_expiry = $this->input->post('cup_expiry');
        $is_unlimited = $this->input->post('is_unlimited');
        if ($is_unlimited=='on') {
            $is_unlimited='1';
        }else{
            $is_unlimited='0';
        }
        if ($this->form_validation->run('coupan') == FALSE) 
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        	$this->load->view('admin/header');
	        $this->load->view('admin/nav');
	        $this->load->view('admin/coupan/add');
	        $this->load->view('admin/footer');
        }
        else
        {
        $data  = array('cup_name' => $cup_name, 'cup_url' => $cup_url, 'cup_value' => $cup_value, 'cup_type' => $cup_type, 'cup_expiry' => $cup_expiry,'is_unlimited'=>$is_unlimited);
        if ($cup_qty) {
        $data['cup_qty']=$cup_qty;
            }

            $result = $this->Comman_model->insertData('coupons',$data);
            if ($result)
            {
                $msg=$this->session->set_flashdata('msg','Coupan Add Successfully');
                return redirect("coupan");
            }
        }
    }
    public function edit()
    {
    	$id= $this->uri->segment(3);
        $table='coupons';
        $where=array('cup_id' =>$id);
    	$data['update']=$this->Comman_model->getdata($table, $where);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/coupan/edit',$data);
        $this->load->view('admin/footer');
      
    }
    public function updates()
    {
    	$id=$this->input->post('id');
    	$cup_name = $this->input->post('cup_name');
        $cup_url = str_replace(" ", "-", strtolower(trim($cup_name)));
        $cup_url = str_replace("&", "and", $cup_url);
        $cup_value = $this->input->post('cup_value');
        $cup_qty = $this->input->post('cup_qty');
        $cup_type = $this->input->post('cup_type');
        $cup_expiry = $this->input->post('cup_expiry');
         $is_unlimited = $this->input->post('is_unlimited');
        if ($is_unlimited=='on') {
            $is_unlimited='1';
        }else{
            $is_unlimited='0';
        }
        if ($this->form_validation->run('coupan1') == FALSE) 
        {
        	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        	$this->load->view('admin/header');
	        $this->load->view('admin/nav');
	        $this->load->view('admin/coupan/add');
	        $this->load->view('admin/footer');
        }
        else
        {
        	$TableName='coupons';
        	$WhereData =array('cup_id' => $id);
        	$data = array('cup_name' => $cup_name, 'cup_url' => $cup_url, 'cup_value' => $cup_value,'cup_type' => $cup_type, 'cup_expiry' => $cup_expiry,'is_unlimited'=>$is_unlimited);


              if ($cup_qty) {
        $data['cup_qty']=$cup_qty;
            }


                     $result = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Coupan Update Successfully');
                    return redirect("coupan");
                }
        }
    }
}