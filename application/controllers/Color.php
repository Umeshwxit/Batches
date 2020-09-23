<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Color extends CI_Controller {

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
        if ( $user->defination=='0') {
        redirect('Admin/not_permission');
        }
    }

   
    public function index() {
       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table	= 'colors';
        $where	= '';
        $oderBy = 'color_id'; 
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
        $this->load->view('admin/color/color_list',$data);
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
        $msg=$this->session->set_flashdata('msg','Color Delete Successfully');
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
		$TableName	= 'colors';
        $Data	= array('status' => $status);
        $WhereData = array('color_id' => $id);
    	$this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);
    	$msg=$this->session->set_flashdata('msg','Product Status Update Successfully');
		redirect($cname.'/'.$fname); 
    }
    public function add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/color/add');
        $this->load->view('admin/footer');
      
    }
    public function insert()
    {
        $color_name = $this->input->post('color_name');
        $color_value = $this->input->post('color_value');
        $color_url = str_replace(" ", "-", strtolower(trim($color_name)));
        $color_url = str_replace("&", "and", $color_url);
        // $ar_color_name = $this->input->post('ar_color_name');
        if ($this->form_validation->run('colors') == FALSE) 
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
       $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/color/add');
        $this->load->view('admin/footer');
      

        }
        else
        {
            $data = array('color_name' => $color_name, 'color_url' => $color_url, 'color_value' => $color_value);
                $result = $this->Comman_model->insertData('colors',$data);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Color Add Successfully');
                    return redirect("color");
                }

        }
    }
    public function edit()
    {
        $id= $this->uri->segment(3);
        $table1='colors';
        $where1= array('color_id' => $id);
        $data['update']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/color/edit',$data);
        $this->load->view('admin/footer');
      
    }
    function updates()
    {
        $id = $this->input->post('id');
        $color_name = $this->input->post('color_name');
        $color_value = $this->input->post('color_value');
        $color_url = str_replace(" ", "-", strtolower(trim($color_name)));
        $color_url = str_replace("&", "and", $color_url);
        // $ar_color_name = $this->input->post('ar_color_name');
        if ($this->form_validation->run('colors1') == FALSE) 
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
              
                $table1='colors';
                $where1= array('color_id' => $id);
                $data['update']=$this->Comman_model->getdata($table1, $where1);
                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/color/edit',$data);
                $this->load->view('admin/footer');
      

        }
        else
        {
            $TableName='colors';
            $WhereData= array('color_id' => $id );
            $Data = array('color_name' => $color_name, 'color_url' => $color_url, 'color_value' => $color_value);
             $result = $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Color Add Successfully');
                    return redirect("color");
                }

        }
    }

    

}
