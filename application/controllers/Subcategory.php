<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategory extends CI_Controller {

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
        $table  = 'subcategories';
        $where  = '';
        $oderBy = 'subcategory_id';        
        $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
        $this->load->view('admin/subcategory/subcategories_list',$data);
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
        $msg=$this->session->set_flashdata('msg','Sub-Category Delete Successfully');
        redirect($cname.'/'.$fname);    
    }



      public function add()
    {
        $table   = 'categories';
        $oderBy = 'category_id';        
        $data['list']  =$this->Comman_model->getAllData($table, $where='', $oderBy);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/subcategory/add',$data);
        $this->load->view('admin/footer');
      
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

 function add_subcategory() 
      {
        
$this->form_validation->set_message('check_default', 'The field is required');


            if ($this->form_validation->run('subcategory') == FALSE)
            {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $table   = 'categories';
    $oderBy = 'category_id';        
    $data['list']  =$this->Comman_model->getAllData($table, $where='', $oderBy);
       
                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/subcategory/add',$data);
                $this->load->view('admin/footer');
            } 
            else 
            {
                $cat_name=$this->input->post('enname');
                $url= $this->Comman_model->seo_url($cat_name);
                $table='subcategories';
                
                    $titleURL = strtolower(url_title($cat_name));
            if(isUrlExists('subcategories',$titleURL,'subcategory_url')){
            $titleURL = $titleURL.'-'.time(); 
            }
            
            
                 $data = array(
                    'subcategory_name' => $this->input->post('enname'),
                    // 'ar_subcategory_name' => $this->input->post('arname'),
                    'subcategory_url'=>$titleURL,
                    'subcategory_status'=>'1',
                    'subcategory_catid'=>$this->input->post('catid')
                  
                     );

                 if(isset($_FILES) && !empty($_FILES) && !empty($_FILES['file']['name'])){   
            $file = $this->Comman_model->updateMedia('file','subcategory');
            // $image = $file; 
             $data['subcategory_image'] = base_url().'/uploads/subcategory/medium/'.$file; 
            }
            
                //  if ($this->input->post('c_type')) {
                //     $data['commision_type']=$this->input->post('c_type');
                //     $data['commision_value']=$this->input->post('c_value');
                //  }



                $result = $this->Comman_model->insertData($table, $data);
                if ($result) {
                return redirect("subcategory");
            }
        }
    }

public function edit($id)
    {
        $id= $this->uri->segment(3);
    $table   = 'categories';
    $oderBy = 'category_id';        
    $data['list']  =$this->Comman_model->getAllData($table, $where='', $oderBy);
    
    $table='subcategories';
    $data1 = array('subcategory_id' => $id);
    $data['row'] = $this->Comman_model->getdata($table, $data1);


           $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/subcategory/edit',$data);
        $this->load->view('admin/footer');
      
    }

public function update($id)
{
    
$this->form_validation->set_message('check_default', 'The field is required');
     

            if ($this->form_validation->run('updatecategory') == FALSE)
            {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $table='categories';
        $data = array('category_id' => $id);
        $data['row'] = $this->Comman_model->getdata($table, $data);
                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/subcategory/edit',$data);
                $this->load->view('admin/footer');
            } 
            else 
            {
                 $cat_name=$this->input->post('enname');
                $url= $this->Comman_model->seo_url($cat_name);
                $table='subcategories';
                 $data = array(
                    'subcategory_name' => $this->input->post('enname'),
                    // 'ar_subcategory_name' => $this->input->post('arname'),
                    'subcategory_url'=>$url,
                    'subcategory_catid'=>$this->input->post('catid')
                  
                     );
                //   if ($this->input->post('c_type')) {
                //     $data['commision_type']=$this->input->post('c_type');
                //     $data['commision_value']=$this->input->post('c_value');
                //  }

             if(isset($_FILES) && !empty($_FILES) && $_FILES['file']['name']!=''  ){
            $file = $this->Comman_model->updateMedia('file','subcategory');
            $data['subcategory_image'] = $file; 
            }


        $WhereData=array('subcategory_id'=>$id);
        $result = $this->Comman_model->UpdateRecord($table, $data, $WhereData );
            if ($result) {
            return redirect("subcategory");
            }
        }
    }




}?>