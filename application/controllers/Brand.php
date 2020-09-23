<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Brand extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Comman_model');
                                $this->load->helper('common_helper');

        // if(!$this->session->userdata('aid')){
        //     return redirect('Adminlogin');
        // }
    }

   
    public function index() {
       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table	= 'brands';
        $where	= '';
        $oderBy = 'brand_id';        
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
        $this->load->view('admin/brand/brand_list',$data);
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
        $msg=$this->session->set_flashdata('msg','Brand Delete Successfully');
		redirect($cname.'/'.$fname);   	
    }
    public function add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/brand/add');
        $this->load->view('admin/footer');
      
    }
    public function insert()
    {
       if ($this->form_validation->run('brands') == FALSE) 
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $this->load->view('admin/brand/add');
            $this->load->view('admin/footer');
        }
        else
        {
              $brand_name = $this->input->post('brand_name');
        // $ar_brand_name = $this->input->post('ar_brand_name');
        
        
          $titleURL = strtolower(url_title($brand_name));
            if(isUrlExists('brands',$titleURL,'brand_url')){
            $titleURL = $titleURL.'-'.time(); 
            }
            
      
            $data = array('brand_name' => $brand_name, 'brand_url' => $titleURL);
            $result = $this->Comman_model->insertData('brands',$data);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Brand Add Successfully');
                    return redirect("brand");
                }
        }
    }
    public function edit()
    {
        $id= $this->uri->segment(3);
        $table1='brands';
        $where1= array('brand_id' => $id);
        $data['update']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/brand/edit',$data);
        $this->load->view('admin/footer');
    }
    public function updates()
    {
        $id= $this->input->post('id');
        $brand_name = $this->input->post('brand_name');
        // $ar_brand_name = $this->input->post('ar_brand_name');
       if ($this->form_validation->run('brands1') == FALSE) 
        {
           
       
        $table1='brands';
        $where1= array('brand_id' => $id);
        $data['update']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/brand/edit',$data);
        $this->load->view('admin/footer');
        }
        else
        {
            $TableName='brands';
            $data = array('brand_name' => $brand_name);
            $WhereData= array('brand_id' =>$id);
            $result = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);
          //  $result = $this->Comman_model->insertData('brands',$data);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Brand Add Successfully');
                    return redirect("brand");
                }
        }
    }
    

}
