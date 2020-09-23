<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends CI_Controller {

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
        // if ( $user->slider=='0') {
        // redirect('Admin/not_permission');
        // }


         

    }

   
    public function index() {

    


       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table	= 'slider';
        $where	= '';
        $oderBy = 'slide_id';        
        $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
        $this->load->view('admin/slider/slider_list',$data);
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
            $msg=$this->session->set_flashdata('msg','Slider Delete Successfully');

		redirect($cname.'/'.$fname);   	
    }


     public function add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
         $pro=$this->db->query("SELECT * FROM `products`  ORDER BY `product_id` ASC");
        $data['plist']=$pro->result();
        $this->load->view('admin/slider/add',$data);
        $this->load->view('admin/footer');
      
    }

      function add_slider() 
      {
         
            if ($this->form_validation->run('slider') == FALSE)
            {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/slider/add');
                $this->load->view('admin/footer');
            } 
            else 
            {
                $table='slider';
                 $data = array(
                    'slide_name' => $this->input->post('enname'),
                    'slide_sub_name' => $this->input->post('ensubname'),
                    // 'slide_sub_name_ar' => $this->input->post('arsubname'),
                    // 'slide_link' => $this->input->post('enlink'),
                    // 'slide_name_ar' => $this->input->post('arname'),
                    // 'slide_link_ar' => $this->input->post('arlink'),
                    // 'product_id'=>$this->input->post('product_id'),
                    // 'slider_desc'=>$this->input->post('slider_desc'),
                    // 'slider_desc_ar'=>$this->input->post('slider_desc_ar'),
 
                     );
                     
            // if(isset($_FILES) && !empty($_FILES) && $_FILES['file']['name']!=''){
            // $file = $this->Comman_model->updateMedia('file','slider');
            // $data['slide_img'] = $file; 
            // $data['slide_img_ar'] = $file; 
            // }


                $result = $this->Comman_model->insertData($table, $data);
                if ($result) {
                return redirect("slider");
            }
        }
    }


  public function edit()
    {
        $id= $this->uri->segment(3);
        $table='slider';
        $data = array('slide_id' => $id);
        $data['row'] = $this->Comman_model->getdata($table, $data);
         $pro=$this->db->query("SELECT * FROM `products`  ORDER BY `product_id` ASC");
        $data['plist']=$pro->result();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/slider/edit',$data);
        $this->load->view('admin/footer');
      
    }

public function update($id)
{
     

            if ($this->form_validation->run('updateslider') == FALSE)
            {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/slider/add');
                $this->load->view('admin/footer');
            } 
            else 
            {
                $table='slider';                
                 $data = array(
                    'slide_name' => $this->input->post('enname'),
                    'slide_sub_name' => $this->input->post('ensubname'),
                    // 'slide_sub_name_ar' => $this->input->post('arsubname'),
                    // 'slide_link' => $this->input->post('enlink'),
                    // 'product_id'=>$this->input->post('product_id'),
                    // 'slide_name_ar' => $this->input->post('arname'),
                    //  'slider_desc'=>$this->input->post('slider_desc'),
                    // 'slider_desc_ar'=>$this->input->post('slider_desc_ar'),
                    // 'slide_link_ar' => $this->input->post('arlink')
                     );

            // if(isset($_FILES) && !empty($_FILES) && $_FILES['file']['name']!=''){
            // $file = $this->Comman_model->updateMedia('file','slider');
            // $data['slide_img'] = $file; 
            // $data['slide_img_ar'] = $file; 
            // }

        $WhereData=array('slide_id'=>$id);
        $result = $this->Comman_model->UpdateRecord($table, $data, $WhereData );
            if ($result) {
            return redirect("slider");
            }
        }
    }
}?>