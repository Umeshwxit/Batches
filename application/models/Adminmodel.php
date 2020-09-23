<?php
class Adminmodel extends CI_Model {
    /*************************************************login model start************************************************************/
    function login_valid($name, $pass) 
    {
        $query = $this->db->select("*")->where(['admin_email' => $name, 'admin_pass' => $pass,'role_type'=>1])->get("admin");
        //print($query->row());die;
        return $query->row();
    }

      function color_exist_check($prid) {
        $query = $this->db->select("pcs_color_id")->where(['pcs_product_rand_id' => $prid])->get('product_color_size_record');
        return $query->result_array();
    }
    function sizes_by_catid($cat) {
        $query = $this->db->select("*")->where(['size_cat_id' => $cat, 'size_status' => '1'])->get('sizes');
        return $query->result_array();
    }
    function cat_id_check($id) {
        $query = $this->db->select("product_cat,product_subcat")->where(['prid' => $id])->get('products');
        return $query->result_array();
    }
    function countfunction($table,$variable)
    {
        $query=$this->db->query("SELECT count(*) as $variable FROM $table");
        return $query->row();
        
    }
    

}?>