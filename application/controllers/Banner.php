<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends CI_Controller {

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
        // if ( $user->promo_banner=='0') {
        // redirect('Admin/not_permission');
        // }
        
    }


 public function add()
{
     

            if ($this->form_validation->run('update_banner') == FALSE)
            {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/banner/add');
                $this->load->view('admin/footer');
            } 
            else 
            {
                $table='banners';                
                 $data = array();
      
            if(isset($_FILES) && !empty($_FILES) && $_FILES['file']['name']!=''  ){
            $file = $this->Comman_model->updateMedia('file','banner');
            $data['banner_img'] = base_url().'/uploads/banner/'.$file; 
            }

        $result = $this->Comman_model->insertdata($table, $data );
            if ($result) {
            return redirect("banner");
            }
        }
    }


 public function delete($id)
    {
	
		$where = array('banner_id' =>$id);
		$this->Comman_model->Deletedata('banners', $where);
        $msg=$this->session->set_flashdata('msg',' Delete Successfully');
		redirect('banner');   	
    }
    
    
    public function index() {
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $table  = 'banners';
            $where  = '';
            $oderBy = 'banner_id';   
            $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);
            $this->load->view('admin/banner/banner_list',$data);
            $this->load->view('admin/footer');
        }


  public function banner_edit($id)
    {
        
        $table='banners';
        $data = array('banner_id' => $id);
        $data['row'] = $this->Comman_model->getdata($table, $data);
        $pro=$this->db->query("SELECT * FROM `products`  ORDER BY `product_id` ASC");
        $data['plist']=$pro->result();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/banner/edit',$data);
        $this->load->view('admin/footer');
      
    }

public function update($id)
{
     

            if ($this->form_validation->run('update_banner') == FALSE)
            {
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $table='banners';
        $data = array('banner_id' => $id);
        $data['row'] = $this->Comman_model->getdata($table, $data);
                $this->load->view('admin/header');
                $this->load->view('admin/nav');
                $this->load->view('admin/banner/edit',$data);
                $this->load->view('admin/footer');
            } 
            else 
            {
                $table='banners';                
                 $data = array(
                    'banner_title' => $this->input->post('banner_title'),
                    'banner_text' => $this->input->post('banner_text'),
                    'banner_btn' => $this->input->post('banner_btn'),
                       'ar_banner_title' => $this->input->post('ar_banner_title'),
                    'ar_banner_text' => $this->input->post('ar_banner_text'),
                    'ar_banner_btn' => $this->input->post('ar_banner_btn'),
                    'product_id '=>$this->input->post('banner_link')
                     );

            if(isset($_FILES) && !empty($_FILES) && $_FILES['file']['name']!=''  ){
            $file = $this->Comman_model->updateMedia('file','banner');
            // $data['banner_img'] =$file; 
            $data['banner_img'] = base_url().'/uploads/banner/'.$file; 
            }

        $WhereData=array('banner_id'=>$id);
        $result = $this->Comman_model->UpdateRecord($table, $data, $WhereData );
            if ($result) {
            return redirect("banner");
            }
        }
    }


 public function edit_text()
    {
        $id= $this->uri->segment(3);
        $table1='promo_msg';
        $where1= array('id' =>'1');
        $data['row']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/banner/edit_text',$data);
        $this->load->view('admin/footer');
    }
    public function updates_text()
    {
        $msg = $this->input->post('msg');
        $ar_msg = $this->input->post('ar_msg');

       if ($this->form_validation->run('pro_txt') == FALSE) 
        {
           
       
        $table1='promo_msg';
        $where1= array('id' => '1');
        $data['row']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/banner/edit_text',$data);
        $this->load->view('admin/footer');
        }
        else
        {
            $TableName='promo_msg';
            $data = array('ar_msg'=>$ar_msg,'msg' => $msg);
            $WhereData= array('id' =>'1');
            $result = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);
          //  $result = $this->Comman_model->insertData('brands',$data);
                if ($result)
                {
                    $msg=$this->session->set_flashdata('msg','Update Successfully');
                    return redirect("banner/edit_text/1");
                }
        }
    }
}?>