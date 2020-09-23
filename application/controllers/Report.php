<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Comman_model');
        if (!$this->session->userdata('aid')) {
            return redirect('Adminlogin');
        }
    }
    public function index() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $table = 'customer';
        $where = array('cust_type' => 'customer');
        $oderBy = 'cust_id';
        $data['list'] = $this->Comman_model->getAllData($table, $where, $oderBy = '');
        $this->load->view('admin/report/report_customer', $data);
        $this->load->view('admin/footer');
    }
    public function view_order_by_id() {
        $id = $this->uri->segment(3);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $table = 'orders';
        $where = array('ord_user_id' => $id);
        $oderBy = '';
        $data['list'] = $this->Comman_model->getAllData($table, $where, $oderBy = '');

        $this->load->view('admin/report/report_view_order', $data);
        $this->load->view('admin/footer');
    }
    public function product_by_report() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $table = 'products';
        $where = '';
        $oderBy = 'product_id';
        $data['list'] = $this->Comman_model->getAllData($table, $where, $oderBy = '');
        $this->load->view('admin/report/product_report', $data);
        $this->load->view('admin/footer');
    }
    public function view_product_by_id() {
        $id = $this->uri->segment(3);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        // $table = 'order_products';
        // $where = array('product_id' => $id);
      $q=  $this->db->query("SELECT DISTINCT `order_id` FROM order_products WHERE  `product_id`='$id' ");
       $result= $q->result();
       $arrayName = array( );
       foreach ($result as $key => $value) {
         
        array_push($arrayName, $value->order_id);
       }

      $idds= implode(',',$arrayName);
      if (empty($idds)) {
        $idds='0';
      }else{
        $idds=$idds;
      }
        $q=  $this->db->query("SELECT * FROM `orders` WHERE `ord_id` IN (  $idds) ORDER BY `orders`.`ord_id` DESC");
         $data['list']= $q->result();
   
        $this->load->view('admin/report/report_view_product', $data);
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
        $msg = $this->session->set_flashdata('msg', 'Brand Delete Successfully');
        redirect($cname . '/' . $fname);
    }
    public function add() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/brand/add');
        $this->load->view('admin/footer');
    }
    public function insert() {
        $brand_name = $this->input->post('brand_name');
        $ar_brand_name = $this->input->post('ar_brand_name');
        $brand_url = str_replace(" ", "-", strtolower(trim($brand_name)));
        $brand_url = str_replace("&", "and", $brand_url);
        if ($this->form_validation->run('brands') == FALSE) {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $this->load->view('admin/brand/add');
            $this->load->view('admin/footer');
        } else {
            $data = array('ar_brand_name' => $ar_brand_name, 'brand_name' => $brand_name, 'brand_url' => $brand_url);
            $result = $this->Comman_model->insertData('brands', $data);
            if ($result) {
                $msg = $this->session->set_flashdata('msg', 'Brand Add Successfully');
                return redirect("brand");
            }
        }
    }
    public function edit() {
        $id = $this->uri->segment(3);
        $table1 = 'brands';
        $where1 = array('brand_id' => $id);
        $data['update'] = $this->Comman_model->getdata($table1, $where1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/brand/edit', $data);
        $this->load->view('admin/footer');
    }
    public function updates() {
        $id = $this->input->post('id');
        $brand_name = $this->input->post('brand_name');
        $ar_brand_name = $this->input->post('ar_brand_name');
        $brand_url = str_replace(" ", "-", strtolower(trim($brand_name)));
        $brand_url = str_replace("&", "and", $brand_url);
        if ($this->form_validation->run('brands1') == FALSE) {
            $table1 = 'brands';
            $where1 = array('brand_id' => $id);
            $data['update'] = $this->Comman_model->getdata($table1, $where1);
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $this->load->view('admin/brand/edit', $data);
            $this->load->view('admin/footer');
        } else {
            $TableName = 'brands';
            $data = array('ar_brand_name' => $ar_brand_name, 'brand_name' => $brand_name, 'brand_url' => $brand_url);
            $WhereData = array('brand_id' => $id);
            $result = $this->Comman_model->UpdateRecord($TableName, $data, $WhereData);
            //  $result = $this->Comman_model->insertData('brands',$data);
            if ($result) {
                $msg = $this->session->set_flashdata('msg', 'Brand Add Successfully');
                return redirect("brand");
            }
        }
    }
    public function order_list() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $table = 'orders';
        $where = '';
        $oderBy = 'order_id';
        $data['list'] = $this->Comman_model->getAllData($table, $where, $oderBy = '');
        $this->load->view('admin/report/order_list', $data);
        $this->load->view('admin/footer');
    }
    
 public function vendor() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
     $table  = 'admin';
            $where  = array('role_type'=>2);
            $oderBy = 'admin_id'; 
            $data['list']  =$this->Comman_model->getAllData($table, $where, $oderBy = '');


        $this->load->view('admin/report/vendor_list', $data);
        $this->load->view('admin/footer');
    }
    public function vendor_order($id)
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $data['list']  =$this->Comman_model->get_vendor_order($id);
        $this->load->view('admin/report/vendor_order_list', $data);
        $this->load->view('admin/footer');
            
    }
       public function commision() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $table  = 'order_commsion';
        $oderBy = 'id'; 
        $data['list']  =$this->Comman_model->getAllData($table, $where='', $oderBy = '');
        $this->load->view('admin/report/commision_report', $data);
        $this->load->view('admin/footer');
        }


    public function report_by_mostsaleproduct() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $q=$this->db->query("SELECT COUNT(*) AS totalpurches, order_products.`product_id`, products.product_title, products.product_cat, products.product_brand, products.vendor_id FROM products, `order_products` WHERE products.product_id = order_products.product_id GROUP BY order_products.`product_id` ORDER BY COUNT(*) DESC");
            $data['list']=$q->result();
        $this->load->view('admin/report/mostsaleproduct', $data);
        $this->load->view('admin/footer');
    }

      public function report_by_topseller() {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $q=$this->db->query("SELECT DISTINCT admin.admin_id, admin.admin_fullname,admin.admin_email,admin.address,admin.phone FROM admin, `order_products` WHERE admin.admin_id= order_products.vendor_id GROUP BY order_products.`product_id` ORDER BY COUNT(*) DESC");
            $data['list']=$q->result();
        $this->load->view('admin/report/topvendor', $data);
        $this->load->view('admin/footer');
    }





}
