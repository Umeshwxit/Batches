<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller 
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
        // if ( $user->customer=='0') {
        // redirect('Admin/not_permission');
        // }
    }
     public function index() {
       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table	= 'customer';
        $where	= array('cust_type' =>'customer');
        $oderBy = 'cust_id'; 
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
        $this->load->view('admin/customer/customer_list',$data);
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
        $msg=$this->session->set_flashdata('msg','Customer Delete Successfully');
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
		$TableName	= 'customer';
        $Data	= array('cust_status' => $status);
        $WhereData = array('cust_id' => $id);
    	$this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);
    	$msg=$this->session->set_flashdata('msg','Customer Status Update Successfully');
		redirect($cname.'/'.$fname); 
    }
}