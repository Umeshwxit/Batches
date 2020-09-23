<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {

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
        $table	= 'categories';
        $where	= '';
        $oderBy = 'category_id';        
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
        $this->load->view('admin/category/category_list',$data);
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
        $msg=$this->session->set_flashdata('msg','Category Delete Successfully');
		redirect($cname.'/'.$fname);   	
    }


      public function add()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/category/add');
        $this->load->view('admin/footer');
      
    }
    function add_category() 
      {


            

            if ($this->form_validation->run('category') == FALSE)
            {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/category/add');
                $this->load->view('admin/footer');
            } 
            else 
            {
                $cat_name=$this->input->post('enname');
                $url= $this->Comman_model->seo_url($cat_name);
                $table='categories';
                
                    $titleURL = strtolower(url_title($cat_name));
            if(isUrlExists('categories',$titleURL,'category_url')){
            $titleURL = $titleURL.'-'.time(); 
            }



                 $data = array(
                    'category_name' => $this->input->post('enname'),
                    // 'ar_category_name' => $this->input->post('arname'),
                    'category_url'=>$titleURL,
                    'category_status'=>'1'
                  
                     );

                 if(isset($_FILES) && !empty($_FILES) && !empty($_FILES['file']['name'])){    
            $file = $this->Comman_model->updateMedia('file','category');
            $data['category_image'] = base_url().'uploads/category/'.$file; 

            }
            //  if(isset($_FILES) && !empty($_FILES) && $_FILES['ar_category_image']['name']!=''  ){
            // $file = $this->Comman_model->updateMedia('ar_category_image','category');
            // $data['ar_category_image'] =base_url().'uploads/category/'.$file; 
            // }


                $result = $this->Comman_model->insertData($table, $data);
                if ($result) {
                return redirect("category");
            }
        }
    }

 public function edit()
    {
        $id= $this->uri->segment(3);
        $table='categories';
        $data = array('category_id' => $id);
        $data['row'] = $this->Comman_model->getdata($table, $data);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/category/edit',$data);
        $this->load->view('admin/footer');
      
    }

public function update($id)
{
     

            if ($this->form_validation->run('updatecategory') == FALSE)
            {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $table='categories';
        $data = array('category_id' => $id);
        $data['row'] = $this->Comman_model->getdata($table, $data);
                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/category/edit',$data);
                $this->load->view('admin/footer');
            } 
            else 
            {
                $cat_name=$this->input->post('enname');
                $table='categories';                
                $data = array(
                        'category_name' => $this->input->post('enname'),
                        // 'ar_category_name' => $this->input->post('arname'),
                     );

            if(isset($_FILES) && !empty($_FILES) && $_FILES['file']['name']!=''  ){
            $file = $this->Comman_model->updateMedia('file','category');
            $data['category_image'] =base_url().'uploads/category/'.$file; 
            }
            //  if(isset($_FILES) && !empty($_FILES) && $_FILES['ar_category_image']['name']!=''  ){
            // $file = $this->Comman_model->updateMedia('ar_category_image','category');
            // $data['ar_category_image'] =base_url().'uploads/category/'.$file; 
            // }


        $WhereData=array('category_id'=>$id);
        $result = $this->Comman_model->UpdateRecord($table, $data, $WhereData );
            if ($result) {
            return redirect("category");
            }
        }
    }
    
     public function update_status()
    {
      $cname= $this->uri->segment(1);
    $coulom= $this->uri->segment(3);
    $table= $this->uri->segment(4);
    $id= $this->uri->segment(5);
    $fname= $this->uri->segment(6);
    $status= $this->uri->segment(7);
    $TableName  = 'categories';
        $Data = array('category_status' => $status );
        $WhereData = array('category_id' => $id);
      $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);
      $msg=$this->session->set_flashdata('msg','Category Status Update Successfully');
    redirect($cname.'/'.$fname); 
    }

}?>
