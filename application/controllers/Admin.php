<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Comman_model');
        $this->load->model('Adminmodel');
        if (!$this->session->userdata('aid')) {
            return redirect('Adminlogin');
        }
    }
    public function index() {
    //   $this->load->view('admin/header');
    //     $this->load->view('admin/nav');
        // $data['service'] = $this->Adminmodel->countfunction('service','service');	
        // $data['Tranning_Program'] = $this->Adminmodel->countfunction('tranning_program','program');	
        // $data['product'] = $this->Adminmodel->countfunction('product','product');	
        // $data['contactus'] = $this->Adminmodel->countfunction('contactus','contactus');	



        $this->load->view('admin/dashboard');
            
    }
    public function pages_list() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $table = 'pages';
        $where = '';
        $oderBy = 'page_id';
        $data['pages_list'] = $this->Comman_model->getAllData($table, $where, $oderBy ='');
        $this->load->view('admin/pages_list', $data);
        $this->load->view('admin/footer');
    }
    public function delete() {
        $cname = $this->uri->segment(1);
        $coulom = $this->uri->segment(3);
        $table = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $fname = $this->uri->segment(6);
        $where = array($coulom => $id);
        $this->Comman_model->Deletedata($table, $where);
        $msg = $this->session->set_flashdata('msg', 'Pages Delete Successfully');
        redirect($cname . '/' . $fname);
    }
    function logout() {
        $this->session->unset_userdata("aid");
        return redirect('Adminlogin');
    }
    public function profile() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $aid = $this->session->userdata('aid');
        $table = 'admin';
        $where = array('admin_id' => $aid);
        $data['admin_profile'] = $this->Comman_model->getdata($table, $where);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer');
    }
    public function update_profile() {
        $id = $this->input->post('id');
        $admin_fullname = $this->input->post('admin_fullname');
        // $oldpass = $this->input->post('oldpass');
        $npass = $this->input->post('npass');
        $cpass = $this->input->post('cpass');
        $TableName = 'admin';
        $WhereData = array('admin_id' => $id);
        $Data = array('admin_pass' => $npass, 'admin_fullname' => $admin_fullname);
        if ($npass == $cpass) {
            $result = $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);
            if ($result) {
                $this->session->set_flashdata('login_success', 'Update Successfully');
                return redirect("Admin/profile");
            }
        } else {
            $this->session->set_flashdata('login_error', 'Password & Confirm Password Not match');
            return redirect('Admin/profile');
        }
    }

     public function not_permission() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $aid = $this->session->userdata('aid');
        $table = 'admin';
        $where = array('admin_id' => $aid);
        $data['admin_profile'] = $this->Comman_model->getdata($table, $where);
        $this->load->view('admin/not_permission', $data);
        $this->load->view('admin/footer');
    }


function get_reloadchat($driver_id){

      $q= $this->db->query("SELECT * FROM `chat` where  driverId='$driver_id' ");
$msg=$q->result(); 
 foreach ($msg as  $each_msg) {
if($each_msg->sentBy==1){
 ?>



                          
                            <div class="message right appeared">
                                                        <!-- <div class="avatar"></div> -->
                                                        <div class="text_wrapper">
                                                            <div  style="text-align: right;"><span class="text"><?php  echo $each_msg->message ; ?></span></div>
                                                        </div>
                                                    </div>
                                                                        
<?php }else{?>
                                                  
                                                      <div class="message left appeared">
                                                        <!-- <div class="avatar"></div> -->
                                                        <div class="text_wrapper">
                                                            <div><p class="text"><?php  echo $each_msg->message ; ?></p></div>
                                                        </div>
                                                    </div>


                                              
<?php } } 
}
 public function footer_info()
    {
        $id= $this->uri->segment(3);
        $table1='footer_info';
        $where1= array('id' => $id);
        $data['update']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/footer_info',$data);
        $this->load->view('admin/footer');
    }
    public function footer_info_update()
    {
      $id=$this->input->post('id');
      if ($this->form_validation->run('footer') == FALSE) 
      {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $table1='footer_info';
        $where1= array('id' => $id);
        $data['update']=$this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/footer_info',$data);
        $this->load->view('admin/footer');
      }
      else
      {
      
        $WhereData = array('id' =>$id );
        $data = array(
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'facebook' => $this->input->post('facebook'),
            'twitter'=>$this->input->post('twitter'),
            'instagram'=> $this->input->post('instagram'),
            'email'=>$this->input->post('email'),
            'g_plus'=>$this->input->post('g_plus')
            );


          if(isset($_FILES) && !empty($_FILES) && $_FILES['file']['name']!=''  ){
            $file = $this->Comman_model->updateMedia('file','logo');
            $data['logo'] = $file; 
           
            }
     
        $result = $this->Comman_model->UpdateRecord('footer_info', $data, $WhereData);
        
        if ($result)
        {
            $msg=$this->session->set_flashdata('msg','Footer Update Successfully');
            return redirect("Admin/footer_info/".$id);
        }
      }
    }

    public function contactus() {
       $this->load->view('admin/header');
       $this->load->view('admin/nav');
        $table  = 'contactus';
        $where  = '';
        $oderBy = 'id';        
      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');
        $this->load->view('admin/contactus/list',$data);
       $this->load->view('admin/footer');
    }

}?>