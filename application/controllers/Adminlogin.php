<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {
	    function __construct(){
		parent::__construct();//to consider this function as a parent constructor
		
	}

	public function index()
	{
		$this->load->view('admin/login/index');
	}
	function admin_login()
	{
	
		
		$this->form_validation->set_rules('username','User Name','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		

		if ($this->form_validation->run() == FALSE)
		{		
				$this->form_validation->set_error_delimiters('<div class="error">','</div>');
				$this->load->view('admin/login/index');
		}
		else
		{
			 $name = $this->input->post('username');
			 $pass = $this->input->post('password');
		
			$this->load->model('Adminmodel');
			$result = $this->Adminmodel->login_valid($name,$pass);

			if($result){
				  	$id = $result->admin_id;
			
				 $this->session->set_userdata('aid',$id);
			
				return redirect("Admin");
			}else{ 
				$this->session->set_flashdata('login_error','Invalid Login Details');
				return redirect('adminlogin');
			}
				
		}
		
	}
}
