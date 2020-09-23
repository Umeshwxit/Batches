<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sitesetting extends CI_Controller {



	public function __construct()

    {

        parent::__construct();

        $this->load->model('Comman_model');

        if(!$this->session->userdata('aid')){

            return redirect('Adminlogin');

        }

       

    }









   

    public function update_return_day() {

       $this->load->view('admin/header');

       $this->load->view('admin/nav');

        $table   = 'site_setting';

        $where   = array('id'=>'1');



            $data['update']=$this->Comman_model->getdata($table, $where);



        $this->load->view('admin/update_refund_day',$data);

       $this->load->view('admin/footer');

    }





        function updates_days()

    {

        $id=$this->input->post('id');

        $days = $this->input->post('refund_day_limit');



        if ($this->form_validation->run('refund_days') == FALSE) 

        {

            $this->load->view('admin/header');

            $this->load->view('admin/nav');

            $table   = 'site_setting';

            $where   = array('id'=>'1');

            $data['update']=$this->Comman_model->getdata($table, $where);

            $this->load->view('admin/update_refund_day',$data);

            $this->load->view('admin/footer');



        }

        else

        {

            $TableName='site_setting';

            $WhereData= array('id' =>'1');

            $Data =array ('refund_day_limit' => $days);

                $result = $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

                if ($result)

                {

                    $msg=$this->session->set_flashdata('msg',' Update Successfully');

                    return redirect("Sitesetting/update_return_day");

                }

        }

    }

    

    public function shipping() {

        $this->load->view('admin/header');

        $this->load->view('admin/nav');

        $table   = 'order_shipping';

        $where   = array('id'=>'1');

        $data['update']=$this->Comman_model->getdata($table, $where);

        $this->load->view('admin/updates_shipping_value',$data);

        $this->load->view('admin/footer');

    }



    function updates_shipping(){

        $id=$this->input->post('id');

        $shipping_value = $this->input->post('shipping_value');

        if ($this->form_validation->run('shipping_valueform') == FALSE){

            $this->load->view('admin/header');

            $this->load->view('admin/nav');

            $table   = 'order_shipping';

            $where   = array('id'=>'1');

            $data['update']=$this->Comman_model->getdata($table, $where);

            $this->load->view('admin/updates_shipping_value',$data);

            $this->load->view('admin/footer');

        }else{

            $TableName='order_shipping';

            $WhereData= array('id' =>'1');

            $Data =array ('shipping_value' => $shipping_value);

            $result = $this->Comman_model->UpdateRecord($TableName, $Data, $WhereData);

            if ($result){

                $msg=$this->session->set_flashdata('msg',' Update Successfully');

                return redirect("Sitesetting/shipping");

            }

        }

    }

    

    public function deliverytime(){

        $this->load->view('admin/header');

        $this->load->view('admin/nav');

        $table = 'delivery_time';

        $where = array('id' => '1');

        $data['update'] = $this->Comman_model->getdata($table, $where);

        $this->load->view('admin/updates_deliverytime',$data);

        $this->load->view('admin/footer');

    }



    function deliverytime_updates()

    {

        $time = array();

        $toTime1= array();

        $fromTime1= array();

        $id=$this->input->post('id');

        $data = array();

        if(!empty($this->input->post('toTime')))

        {

            $toTime=implode(",", $this->input->post('toTime'));

            $fromTime=implode(",", $this->input->post('fromTime'));

            

           $toTime1=explode(",", $toTime);

           $fromTime1=explode(",", $fromTime);

            foreach ($toTime1 as $key => $value) 

            {

                $time = $value." - ".$fromTime1[$key];  

                $data[$key] = $time;

            }

        }



            

        $toTime=implode(",", $this->input->post('toTime'));

        $fromTime=implode(",", $this->input->post('fromTime'));

        // print_r($data);

        $toTime;

        $fromTime;

        $timej= json_encode($data);



        $WhereData =array ('id' => $id);

        // $Data =$timej;

       $Data= array ('time' => $timej,'toTime'=>$toTime,'fromTime'=>$fromTime);



                $result = $this->Comman_model->UpdateRecord('delivery_time', $Data, $WhereData);

                if($result)

                {

                    $msg=$this->session->set_flashdata('msg','Update Success');

                    return redirect("Sitesetting/deliverytime");

                }

                else

                {

                    $msg=$this->session->set_flashdata('msg','Update Success');

                    return redirect("Sitesetting/deliverytime");

                }

        

    } 



}

