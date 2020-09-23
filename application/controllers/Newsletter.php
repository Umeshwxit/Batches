<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller 

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

        $table	= 'newsletter';

        $where	= array('status' =>1);

        $oderBy = 'id'; 

      $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy);

        $this->load->view('admin/newsletter',$data);

       $this->load->view('admin/footer');

    }

    public function delete()

    {

		
		$id= $this->uri->segment(3);

		
    $table='newsletter';
		$where = array('id' =>$id);

		$this->Comman_model->Deletedata($table, $where);

        $msg=$this->session->set_flashdata('msg','Newsletter Delete Successfully');

		redirect('Newsletter');   	

    }
    public function sent()
    {
       $id=$this->uri->segment(3);
       $email_data= $this->Comman_model->getdata('newsletter',array('id'=>$id));
       $email=$email_data->emails;
       $this->load->library('email');
                $config['protocol'] = 'sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                
                $message='newsletter testing';
                
               
                
                $this->email->from('info@Batches.com', 'Batches.com');
                $this->email->to($email);
                $this->email->subject('Newsletter of Batches');
                $this->email->message($message);    
                
                if($this->email->send()){
                  $msg=$this->session->set_flashdata('msg','Newsletter has been sent Successfully');

                 }
                 else{ 
                 }
            
         redirect('Newsletter');   
       
       
    }
    public function sent_all()
    {
      
       $email_data= $this->Comman_model->getAllData('newsletter',array('status'=>1));
      
       foreach ($email_data as $email) {
       $email=$email->emails;
       
       $this->load->library('email');
                $config['protocol'] = 'sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                
                $message='newsletter testing ';
                
               
                
                $this->email->from('info@Batches.com', 'Batches.com');
                $this->email->to($email);
                $this->email->subject('Newsletter of Batches');
                $this->email->message($message);    
                
                if($this->email->send()){
                  $msg=$this->session->set_flashdata('msg','Newsletter has been sent Successfully');
                     
                 }
                 else{ 
                 }
             }
            
         redirect('Newsletter');   
       
       
    }

    

}