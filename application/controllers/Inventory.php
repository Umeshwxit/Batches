<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends CI_Controller {

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
        if ( $user->inventory=='0') {
        redirect('Admin/not_permission');
        }
    }

   
    public function index() {
       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table	= 'products';
        $where	= '';
        $oderBy = 'product_id';        
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
        $this->load->view('admin/inventory/inventory_list',$data);
       $this->load->view('admin/footer');
    }

     public function stock($pid,$id) {
       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table  = 'product_color_size_record';
        $where  =  array('pcs_product_rand_id' => $id );
        $oderBy = 'pcs_id';        
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
        $this->load->view('admin/inventory/stock',$data);
       $this->load->view('admin/footer');
    }


}
?>