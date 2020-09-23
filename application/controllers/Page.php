<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller 
{

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
        // if ( $user->cms_page=='0') {
        // redirect('Admin/not_permission');
        // }



    }
    public function index() {
       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table  = 'pages';
        $where  = '';
        $oderBy = 'page_id';        
      $data['pages_list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
        $this->load->view('admin/page/pages_list',$data);
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
        $this->load->view('admin/page/add');
        // $this->load->view('admin/footer');
      
    }
    public function insert()
    {


    
        if ($this->form_validation->run('pages') == FALSE) 
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $this->load->view('admin/page/add');
            // $this->load->view('admin/footer');
        }
        else
        {
             
            $page_name= $this->input->post('page_name');
            
        $page_disc_ar = $this->input->post('page_disc_ar');
        
               $titleURL = strtolower(url_title($page_name));
            if(isUrlExists('pages',$titleURL,'page_url')){
            $titleURL = $titleURL.'-'.time(); 
            }
            
        
             $data = array(
                 'page_name' => $this->input->post('page_name'),
                 'page_url' => $titleURL,
                 'page_disc'=>$this->input->post('page_disc')
                 );
            $result = $this->Comman_model->insertData('pages',$data);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Page Add Successfully');
                    return redirect("page");
                }

        }
   
    }
    public function edit()
    {
        $id= $this->uri->segment(3);
        $table1='pages';
        $where1= array('page_id' => $id);
        $data['update']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/page/edit',$data);
        // $this->load->view('admin/footer');
    }
    public function updates()
    {
        $id = $this->input->post('id');
       
        $page_name = $this->input->post('page_name');
        $page_name_ar = $this->input->post('page_name_ar');
        $page_url = str_replace(" ", "-", strtolower(trim($page_name)));
        $page_url = str_replace("&", "and", $page_url);
        $page_disc = $this->input->post('page_disc');
        $page_disc_ar = $this->input->post('page_disc_ar');
        
        if($page_name_ar=='')
        {
            $page_name_ar=$page_name;
        }
             if($page_disc_ar=='')
        {
            $page_disc_ar=$page_disc;
        }
        if ($this->form_validation->run('pages1') == FALSE) 
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $this->load->view('admin/page/add');
            $this->load->view('admin/footer');
        }
        else
        {
            $TableName='pages';
            $WhereData = array('page_id' =>$id);

             $data = array('page_name'=>$page_name,'page_name_ar' => $page_name_ar, 'page_disc'=>$page_disc,'page_disc_ar'=>$page_disc_ar);
            $result = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Update Add Successfully');
                    return redirect("page");
                }

        }
    }


}