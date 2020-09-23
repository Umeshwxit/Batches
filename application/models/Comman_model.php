<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Comman_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function insertData($table, $data) {
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        if (!empty($id > 0)) {
            return $id;
        } else {
            return false;
        }
    }
    function UpdateRecord($TableName, $Data, $WhereData = NULL) {
        if ($WhereData != NULL) {
            $this->db->where($WhereData);
        }
        $Result = $this->db->update($TableName, $Data);
        return $Result;
    }
    function Deletedata($table, $where) {
        $this->db->delete($table, $where);
    }
    public function getdata($table, $where) {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table)->row();
        return $query;
    }
   
    public function getdata_array($table, $where) {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table)->result_array();
        return $query;
    }
    public function getcartdata($table, $where) {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table)->result();
        return $query;
    }

    public function getAllData($table, $where, $oderBy = '') {
        $this->db->select('*');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($oderBy)) {
            $this->db->from($table);
            $this->db->order_by($oderBy, "DESC");
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
    function updateMedia($image, $folder, $height = 768, $width = 1024, $path = FALSE) 
        {
        $this->makedirs($folder);
        $realpath = $path ? '../uploads/' : 'uploads/';
        $allowed_types = "jpg|png|jpeg|mp4|avi|mov";
        $img_name = $this->authToken(); //generate random string for image name
        $img_sizes_arr = $this->image_sizes($folder); //predefined sizes in model
        //print_r($img_sizes_arr); die;
        //We will set min height and width according to thumbnail size
        $min_width = $img_sizes_arr['thumbnail']['width'];
        $min_height = $img_sizes_arr['thumbnail']['height'];
        $config = array('upload_path' => $realpath . $folder, 'allowed_types' => $allowed_types,
        //'max_size' => "10240", // File size limitation, initially w'll set to 10mb (Can be changed)
        //'max_height' => "4000", // max height in px
        //'max_width' => "4000", // max width in px
        //'min_width' => $min_width, // min width in px
        //'min_height' => $min_height, // min height in px
        'file_name' => $img_name, 'overwrite' => FALSE, 'remove_spaces' => TRUE, 'quality' => '100%',);
        $this->load->library('upload'); //upload library
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($image)) {
            $error = array('error' => $this->upload->display_errors());
            return $error; //error in upload
            
        }
        //image uploaded successfully - We will now resize and crop this image
        $image_data = $this->upload->data(); //get uploaded image data
        $this->load->library('image_lib'); //Load image manipulation library
        $thumb_img = '';
        foreach ($img_sizes_arr as $k => $v) {
            // create resize sub-folder
            $sub_folder = $folder . $v['folder'];
            $this->makedirs($sub_folder);
            $real_path = realpath(FCPATH . $realpath . $folder);
            $resize['image_library'] = 'gd2';
            $resize['source_image'] = $image_data['full_path'];
            $resize['new_image'] = $real_path . $v['folder'] . '/' . $image_data['file_name'];
            $resize['maintain_ratio'] = TRUE; //maintain original image ratio
            $resize['width'] = $v['width'];
            $resize['height'] = $v['height'];
            $resize['quality'] = '100%';
            // We need to know whether to use width or height edge as the hard-value.
            // After the original image has been resized, either the original image width’s edge or
            // the height’s edge will be the same as the container
            $dim = (intval($image_data["image_width"]) / intval($image_data["image_height"])) - ($v['width'] / $v['height']);
            $resize['master_dim'] = ($dim > 0) ? "height" : "width";
            $this->image_lib->initialize($resize);
            $is_resize = $this->image_lib->resize(); //create resized copies
            //image resizing maintaining it's aspect ratio is done. Now we will start cropping the resized image
            $source_img = $real_path . $v['folder'] . '/' . $image_data['file_name'];
            if ($is_resize && file_exists($source_img)) {
                $source_image_arr = getimagesize($source_img);
                $source_image_width = $source_image_arr[0];
                $source_image_height = $source_image_arr[1];
                $source_ratio = $source_image_width / $source_image_height;
                $new_ratio = $v['width'] / $v['height'];
                if ($source_ratio != $new_ratio) {
                    //image cropping config
                    $crop_config['image_library'] = 'gd2';
                    $crop_config['source_image'] = $source_img;
                    $crop_config['new_image'] = $source_img;
                    $crop_config['quality'] = "100%";
                    //$crop_config['maintain_ratio'] = FALSE;
                    $crop_config['maintain_ratio'] = TRUE;
                    $crop_config['width'] = $v['width'];
                    $crop_config['height'] = $v['height'];
                    if ($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))) {
                        $crop_config['y_axis'] = round(($source_image_width - $crop_config['width']) / 2);
                        $crop_config['x_axis'] = 0;
                    } else {
                        $crop_config['x_axis'] = round(($source_image_height - $crop_config['height']) / 2);
                        $crop_config['y_axis'] = 0;
                    }
                    //$crop_config['x_axis'] = 0;
                    //$crop_config['y_axis'] = 0;
                    $this->image_lib->initialize($crop_config);
                    $this->image_lib->crop();
                    $this->image_lib->clear();
                }
            }
        }
        if (empty($thumb_img)) $thumb_img = $image_data['file_name'];
        return $thumb_img;
    } // End Function
    function authToken() {
        return 'beatch_' . strtoupper(md5(base64_encode(rand()))); //.'_'.time();
        
    }
    function makedirs($folder = '', $mode = DIR_WRITE_MODE, $defaultFolder = 'uploads/') {
        if (!@is_dir(FCPATH . $defaultFolder)) {
            mkdir(FCPATH . $defaultFolder, $mode);
        }
        if (!empty($folder)) {
            if (!@is_dir(FCPATH . $defaultFolder . '/' . $folder)) {
                mkdir(FCPATH . $defaultFolder . '/' . $folder, $mode, true);
            }
        }
    } //End Function
    function image_sizes($folder) {
        $img_sizes = array();
        switch ($folder) {
            case 'slider':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'category':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'subcategory':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'banner':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'fcat':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'gallery':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'service':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'NoticesDoc':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'training':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'software':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
              case 'logo':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            case 'tranning_program':
                $img_sizes['thumbnail'] = array('width' => 100, 'height' => 100, 'folder' => '/thumb');
                $img_sizes['medium'] = array('width' => 250, 'height' => 250, 'folder' => '/medium');
            break;
            
        }
        return $img_sizes;
    }
    function uploadPDF($profile_image, $folder) {
        $this->makedirs($folder);
        $config = array('upload_path' => FCPATH . 'uploads/' . $folder, 'allowed_types' => "*", 'overwrite' => false, 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'encrypt_name' => TRUE, 'remove_spaces' => TRUE);
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($profile_image)) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $pdf = $this->upload->data(); //upload the image
            return $pdf['file_name'];
        }
    }








     function product_get($keyword)
{
    $this->db->select('*');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");
    $query = $this->db->join("brands","products.product_brand = brands.brand_id");
    // $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
    if(!empty($keyword)){
    $this->db->like('products.product_type', $keyword, 'both');
    }  
        $this->db->where('products.product_status', '1');  

      
      $query =  $this->db->order_by('products.product_id', 'pcs_id');
      $query->limit('15');
    $query = $this->db->get('products');
    // echo $this->db->last_query($query);
    $result = $query->result(); 
    return $result;
}


	function get_productById($pid){
	    
	     $query = $this->db->query("SELECT * FROM products WHERE product_url='$pid'");
         $result['product_detail'] = $query->result_array();
    for ($i=0; $i < count($result['product_detail']) ; $i++) { 
        
        if(!empty($cid)){
          $condition=$this->get_rows('wishlist',array('wish_user_id'=>$cid,
            'wish_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['wishlist']='true';
            }else{
                $result['product_detail'][$i]['wishlist']='false';
            }
           }else{
               $result['product_detail'][$i]['wishlist']='false';
           }

        if(empty($cid)){
            $session_id=$this->session->userdata('session_id');
            $condition=$this->get_rows('cart',array('cart_session_id'=>$session_id,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }
        }else{
            $cid=$this->session->userdata('cid');
            $condition=$this->get_rows('cart',array('cart_user_id'=>$cid,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }

        }


    }
    
    return $result['product_detail'];
    
	}
	
     function related_product($catid,$pid)
    {
    $this->db->select('*');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");
        $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
            $query = $this->db->join("brands","products.product_brand = brands.brand_id");


    $this->db->where('products.product_status', '1');  
    $this->db->where('products.product_id != ', $pid);  
    $this->db->where('products.product_cat', $catid);  
    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
      $query =  $this->db->order_by('products.product_id', 'RANDOM');
    $query =$this->db->limit('6');
    $query = $this->db->get('products');
    // echo $this->db->last_query($query);
    $result = $query->result(); 
    return $result;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    














    public function seo_url($url)
    {
         $category_url = str_replace(" ", "-", strtolower(trim($url)));
        return $category_url = str_replace("&", "and", $category_url);

    }

 public function get_product_list($key,$catid,$limit)
    {
        if($key){
        $Where=" products.`product_type` like '%$key%' ";
        }else{
        $Where='products.`product_type` like "" ';
        }

        if($catid){
        $cat_where="and products.product_cat ='$catid' ";
        }else{
        $cat_where='';
        }
         $lang=$this->session->userdata('site_lang');
 if ($lang=='english') { 
       $query=$this->db->query("SELECT brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   $Where and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.featured_on_home='yes' and products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");
}else{
       $query=$this->db->query("SELECT brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   $Where and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.featured_on_home='yes' and products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");

}
            return $query->result();

    }

    public function get_product_details($url){
        $lang=$this->session->userdata('site_lang');
        if ($lang=='english') { 
            $query=$this->db->query("SELECT products.product_id,products.product_title,products.product_sdisc,products.product_cat,products.product_subcat,products.product_childcat,products.product_brand,products.product_url,products.prid,products.vendor_id,products.note,products.materials, brands.brand_name, sizes.size_name, colors.color_name, colors.color_id, sizes.size_id, product_color_size_record.* FROM `products`, brands, product_color_size_record, colors, sizes WHERE product_color_size_record.pcs_product_rand_id = products.prid AND brands.brand_id = product_brand AND colors.color_id = product_color_size_record.pcs_color_id AND sizes.size_id = product_color_size_record.pcs_size  AND products.product_status = '1' AND products.product_url = '$url' ");
        }else{
            $query=$this->db->query("SELECT products.product_id,products.ar_product_title as product_title,products.product_sdisc,products.product_cat,products.product_subcat,products.product_childcat,products.product_brand,products.product_url,products.prid,products.vendor_id,products.ar_editor_notes as note,products.ar_materials as materials, brands.ar_brand_name as brand_name, sizes.ar_size_name as size_name, colors.ar_color_name as color_name, colors.color_id, sizes.size_id, product_color_size_record.* FROM `products`, brands, product_color_size_record, colors, sizes WHERE product_color_size_record.pcs_product_rand_id = products.prid AND brands.brand_id = product_brand AND colors.color_id = product_color_size_record.pcs_color_id AND sizes.size_id = product_color_size_record.pcs_size AND products.product_status = '1' AND products.product_url = '$url' ");
        }
        return $query->row();
    }


public function get_colour_by_prid($prid)
{
    $lang=$this->session->userdata('site_lang');
 if ($lang=='english') { 

   $query=$this->db->query("SELECT DISTINCT colors.color_id,colors.color_name FROM colors,`product_color_size_record` WHERE colors.color_id=product_color_size_record.pcs_color_id and product_color_size_record.pcs_product_rand_id='$prid' ");
}else{
   $query=$this->db->query("SELECT DISTINCT colors.color_id,colors.ar_color_name as color_name FROM colors,`product_color_size_record` WHERE colors.color_id=product_color_size_record.pcs_color_id and product_color_size_record.pcs_product_rand_id='$prid' ");

}
            return $query->result();

}


public function get_size_by_prid($prid,$colorid)
{
    $lang=$this->session->userdata('site_lang');
 if ($lang=='english') { 

   $query=$this->db->query("SELECT DISTINCT sizes.size_id,sizes.size_name FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");
        }else{
   $query=$this->db->query("SELECT DISTINCT sizes.size_id,sizes.ar_size_name as size_name FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");


        }
            return $query->result();

}



 public function new_arraival($limit)
    {
      
 $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  

       $query=$this->db->query("SELECT vendor_id,brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%new%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");
 }else{
       $query=$this->db->query("SELECT vendor_id,brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%new%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");
 }
            return $query->result();

    }
    public function hot_deal($limit)
    {
         $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
      
       $query=$this->db->query("SELECT vendor_id,brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%hot%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` ASC  limit $limit ");
     }else{

       $query=$this->db->query("SELECT vendor_id,brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%hot%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` ASC  limit $limit ");


     }

            return $query->result();

    }

     public function deal_of_the_day($limit)
    {

 $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
      
       $query=$this->db->query("SELECT vendor_id,brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%day%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");
     }else{

       $query=$this->db->query("SELECT vendor_id,brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.`product_type` like '%day%'  and products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` DESC  limit $limit ");

     }

            return $query->result();

    }






public function get_browsing($id ,$limit)
{

      $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
   $query=$this->db->query("SELECT vendor_id, brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_subcat ='$id'  and products.product_subcat ='$id' AND products.product_status = '1'  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");
}else{

   $query=$this->db->query("SELECT vendor_id, brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title  as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_subcat ='$id' AND products.product_status = '1' and products.product_subcat ='$id'  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");

}
            return $query->result();

}





public function get_image_by_colour($prid,$colorid)
{
   $query=$this->db->query("SELECT product_color_size_record.* FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");
            return $query->row();

}




public function get_size_by_colour($prid,$colorid)
{
       $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  

   $query=$this->db->query("SELECT product_color_size_record.*,sizes.size_name FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");
}else{
   $query=$this->db->query("SELECT product_color_size_record.*,sizes.ar_size_name as size_name FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");


}
            return $query->result();

}

public function get_price_by_colour($prid,$colorid)
{
   $query=$this->db->query("SELECT product_color_size_record.* FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_color_id='$colorid' ");
            return $query->row();

}


public function get_price_by_size($prid,$size_id)
{
   $query=$this->db->query("SELECT product_color_size_record.* FROM sizes,`product_color_size_record` WHERE sizes.size_id=product_color_size_record.pcs_size and product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_size='$size_id' ");
            return $query->row();

}



public function get_pcsid_by_sizecolour($prid,$colour_id,$size_id)
{

   $query=$this->db->query("SELECT product_color_size_record.* FROM `product_color_size_record` WHERE  product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_size='$size_id'  and product_color_size_record.pcs_color_id='$colour_id' ");
            return $query->row();

}
public function get_pcsid_by_prid($prid,$size_id)
{

   $query=$this->db->query("SELECT product_color_size_record.* FROM `product_color_size_record` WHERE  product_color_size_record.pcs_product_rand_id='$prid' and product_color_size_record.pcs_size='$size_id' ");
            return $query->row();

}

public function check_product_intocart($prid,$colour_id,$size_id)
{

}

public function search($search,$tags,$sub_cat,$brand,$colour,$order,$size,$price)
{

//die();

    if($order == '1'){
    
         $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1' and   product_color_size_record.pcs_product_rand_id=products.prid GROUP BY product_color_size_record.pcs_product_rand_id  ORDER BY product_color_size_record.pcs_sale ASC ");

    }else if($order == '2'){

          $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1'  and   product_color_size_record.pcs_product_rand_id=products.prid  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY product_color_size_record.pcs_sale DESC ");
         
    }else if($order == '3'){    

        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1'  and   product_color_size_record.pcs_product_rand_id=products.prid  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY products.product_id DESC ");
    }
    elseif($price)
        {
  
          $prc=explode("-",$price);
          $p1=$prc[0];
          $p2=$prc[1];
            $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1'  and   product_color_size_record.pcs_product_rand_id=products.prid   and `product_color_size_record`.`pcs_sale` BETWEEN $p2 AND  $p1 GROUP BY product_color_size_record.pcs_product_rand_id ASC ");
        }

    else{
        
         $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id  AND products.product_status = '1' and   product_color_size_record.pcs_product_rand_id=products.prid   GROUP BY product_color_size_record.pcs_product_rand_id ");
    }
    // echo $order;
    // die();
    if(!empty($tags)){
        $tags_where="AND FIND_IN_SET(".$tags.", products.tagIds)";
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$tags_where." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);        
    }else{
        $tags_where="";
    }
    if(!empty($search)){
        $search="AND (products.product_title LIKE '%$search%' OR products.ar_product_title LIKE '%$search%')";
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$search." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $search="";
    }
    if(!empty($sub_cat)){
        $sub_cat="AND products.product_subcat = ".$sub_cat;
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$sub_cat." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $sub_cat="";
    }
    if(!empty($brand)){
        $brand="AND products.product_brand = ".$brand;
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$brand." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $brand="";
    }
    if(!empty($colour)){
        $colour="AND product_color_size_record.pcs_color_id = ".$colour;
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$colour." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $colour="";
    }
    if(!empty($size)){
        $size="AND product_color_size_record.pcs_size = ".$size;
        $query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.ar_product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$size." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        $size='';
    }
    $lang = $this->session->userdata('site_lang');
    if(!empty($lang) && ($lang == 'english')){  
        //$query = $this->db->query("SELECT products.vendor_id,brands.brand_name,product_color_size_record.*, products.product_id, products.product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND product_color_size_record.pcs_product_rand_id = products.prid ".$tags_where." ".$search." ".$sub_cat." ".$brand." ".$colour." ".$size." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }else{
        //$query = $this->db->query("SELECT products.vendor_id,brands.ar_brand_name as brand_name,product_color_size_record.*, products.product_id, products.ar_product_title as product_title, products.product_url, products.product_type FROM products, brands, product_color_size_record WHERE products.product_brand = brands.brand_id AND  product_color_size_record.pcs_product_rand_id = products.prid ".$tags_where." ".$search." ".$sub_cat." ".$brand." ".$colour." ".$size." AND products.product_status = '1' GROUP BY product_color_size_record.pcs_product_rand_id ".$order);
    }
    return $query->result();
}
//--------------13-02-2020-----------------
public function see_all($id ,$limit)
{

      $lang=$this->session->userdata('site_lang');
 if ($lang=='english') {  
   $query=$this->db->query("SELECT vendor_id, brands.brand_name,product_color_size_record.*,products.product_id,products.product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_type ='$id' AND products.product_status = '1'  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");
}else{

   $query=$this->db->query("SELECT vendor_id, brands.ar_brand_name as brand_name,product_color_size_record.*,products.product_id,products.ar_product_title  as product_title,products.product_url,products.product_type FROM `products`,brands,product_color_size_record WHERE   products.product_brand=brands.brand_id and product_color_size_record.pcs_product_rand_id=products.prid and products.product_type ='$id'  AND products.product_status = '1'  GROUP BY product_color_size_record.pcs_product_rand_id ORDER BY `products`.`product_id` asc  limit $limit ");

}
            return $query->result();

}
public function solutions_limit()
{
    $sql=$this->db->query("SELECT * FROM `solutions` ORDER BY id LIKE 6");
    return $sql->result();
}
//----------------------



     function randomproduct_get()
{
    $this->db->select('*');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    // $query = $this->db->join("categories","categories.category_id = products.product_id");
    // $query = $this->db->join("brands","products.product_brand = brands.brand_id");
    // $query = $this->db->join("colors","colors.color_id = product_color_size_record.pcs_color_id");
    // $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
    // $this->db->like('products.product_type', $keyword, 'both');  
    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
      $query =  $this->db->order_by('products.product_id', 'RANDOM');
    $query =$this->db->limit('8');
    $query = $this->db->get('products');
    // echo $this->db->last_query($query);
    $result = $query->result(); 
    return $result;
}


   function product_bycategory($keyword)
{
    $this->db->select('*');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");

    $this->db->where('products.product_status','1');  
    $this->db->where('products.product_cat',$keyword);  
    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
    //   $query =  $this->db->order_by('products.product_id', 'RANDOM');
    $query =$this->db->limit('8');
    $query = $this->db->get('products');
    // echo $this->db->last_query($query);
    $result = $query->result(); 
    return $result;
}

    
    
	

    function count_allproduct($where)
    {
    
    $this->db->select('*');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");
    $this->db->where('products.product_status', '1');  
    $this->db->where($where);  
    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
    $query =$this->db->limit('6');
    $query = $this->db->get('products');
    $result = $query->result(); 
    return $result;
    
    }
    
    function get_size_by_color($prid,$col_id)
{
   $q= $this->db->query("   SELECT product_color_size_record.*, sizes.size_name, colors.color_name FROM sizes, colors, product_color_size_record WHERE 
   product_color_size_record.pcs_color_id = '$col_id' AND
   colors.color_id = product_color_size_record.pcs_color_id AND
   sizes.size_id = product_color_size_record.pcs_size and 
   product_color_size_record.pcs_product_rand_id='$prid' ORDER BY product_color_size_record.pcs_id DESC ");
    return $q->result();
}

	
	function cart_detail($session,$cid){
	    
				
				$query = $this->db->query("SELECT * FROM cart WHERE cart_session_id='$session' OR (cart_user_id='$cid' AND cart_user_id!='')");
					
				//print_r($query->result_array);die;
		return $query->result_array();	
	}
	
	
    
    
    function wishlist_detail($session,$cid){
    $query = $this->db->query(" SELECT * FROM `wishlist` WHERE `wish_user_id`='$cid'  ");
    return $query->result_array();	
    }
	
public function loginData($arrPostedData){
        $arrResult = array();
        if ($arrPostedData['email']) {
            $where = "cust_email ='" . $arrPostedData['email'] . "'";
            $this->db->select('*');
            $this->db->where($where);
            $this->db->from('customer');
            $result1 = $this->db->get()->result_array();
            if (!empty($result1)) {
                if (($arrPostedData['email']) && ($arrPostedData['password'])) {
                    $where = "cust_email ='" . $arrPostedData['email'] . "' AND cust_pass ='" . $arrPostedData['password'] . "' AND cust_status= 1";
                    $this->db->select('*');
                    $this->db->where($where);
                    $this->db->from('customer');
                    $result = $this->db->get()->result_array();
                    if (!empty($result)) {
                        $arrResult['userId'] = $result[0]['cust_id'];
                        $arrResult['emailId'] = $result[0]['cust_email'];
                        $arrResult['cust_name'] = $result[0]['cust_name'];
                        $arrResult['cust_fname'] = $result[0]['cust_fname'];
                        $arrResult['cust_lname'] = $result[0]['cust_lname'];
                        $arrResult['cust_email'] = $result[0]['cust_email'];
                        $arrResult['cust_phone'] = $result[0]['cust_phone'];
                        $arrResult['country'] = $result[0]['country'];
                        $arrResult['city'] = $result[0]['city'];
                        $arrResult['state'] = $result[0]['state'];
                        $arrResult['street'] = $result[0]['street'];
                        $arrResult['zip'] = $result[0]['zip'];

                    } else {
                        if ($arrPostedData['email'] != $result1[0]['cust_email']) {
                            $arrResult['emailError'] = 'Please enter a valid email address';
                        }
                        if ($arrPostedData['password'] != $result1[0]['cust_pass']) {
                            $arrResult['passwordError'] = 'Invalid      password';
                        }
                    }
                }
            } else {
                $arrResult['error'] = "We can't find an account with this email address.";
            }
        }
        return $arrResult;
    }
    
       function shop_product($keyword,$catid,$brand,$subcat,$limit='',$offset='')
{
        $this->db->select('*');
        $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
        $query = $this->db->join("categories","categories.category_id = products.product_id");
        $query = $this->db->join("brands","products.product_brand = brands.brand_id");
        $query = $this->db->join("colors","colors.color_id = product_color_size_record.pcs_color_id");
        $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
            if(!empty($subcat)){
            $this->db->where('products.product_subcat',$subcat);
            }
            
            if(!empty($brand)){
            $this->db->where('products.product_brand',$brand);
            }
            if(!empty($catid)){
            $this->db->where('products.product_cat',$catid);
            }
            
            if(!empty($keyword)){
            $this->db->or_like('products.product_title', $keyword, 'both');  
            $this->db->or_like('products.ar_product_title', $keyword, 'both');  
            $this->db->or_like('categories.category_name', $keyword, 'both');  
            $this->db->or_like('categories.ar_category_name', $keyword, 'both');  
            $this->db->or_like('brands.brand_name', $keyword, 'both');  
            $this->db->or_like('brands.ar_brand_name', $keyword, 'both');  
            }
        $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
        if($limit){
        $query =$this->db->limit($limit,$offset);
        }
        $query = $this->db->get('products');
// echo $this->db->last_query($query);
        $result = $query->result();
        return $result;
}
   
   
public function fetchalldata($column='',$tblname,$where='',$where1='',$join_ary = array(),$group_by='',$order_by='',$limit='',$offset='')
{
    $this->db->select($column);
    $this->db->from($tblname);
    if ($where) {
        $this->db->where($where);
    }
    if ($where1) {
        $this->db->where($where1);
    }
    if($group_by){
        $this->db->group_by($group_by);
    }
    if($order_by){
        $this->db->order_by($order_by,'DESC');
    }
    if (is_array($join_ary) && count($join_ary) > 0) {
            foreach ($join_ary as $ky => $vl) {
                $this->db->join($vl['table'], $vl['condition']);
            }
        }
    if($limit){
      $this->db->limit($limit,$offset);
    }
    $result=$this->db->get('')->result();
    // echo $this->db->last_query();
    return $result;
}
 // model code coded by umesh
public function get_rows($table,$where){
     $query=  $this->db->select('*')
                        ->from($table)
                        ->where($where)
                        ->get();
    return $query->num_rows();


    }

public function getOrders($where)
{
    $this->db->select('*');
     $query = $this->db->join("products","order_products.product_id = products.product_id");
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("orders","order_products.order_id = orders.ord_id");
    if(!empty($where)){
   $query = $this->db->where($where);  
    
    }
    $query =$this->db->where('orders.ord_user_id', $this->session->userdata('cid'));  

    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
    $query =  $this->db->order_by('products.product_id', 'pcs_id');
   
    $query = $this->db->get('order_products');
    $result=$query->result_array();
    return $result;
}

public function order_summary($order_id)
{
    $this->db->select('*');
     $query = $this->db->join("products","order_products.product_id = products.product_id");
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("orders","order_products.order_id = orders.ord_id");
    if(!empty($where)){
   $query = $this->db->where($where);  
    
    }
    $query =$this->db->where('orders.ord_id', $order_id);  

    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
    $query =  $this->db->order_by('products.product_id', 'pcs_id');
   
    $query = $this->db->get('order_products');
    $result=$query->result_array();
    return $result;
}

public function get_data($table){
     $query=  $this->db->select('*')
                        ->from($table)
                        ->order_by('id','desc')
                        ->get();
    return $query->result();


    }
    public function get_categories()
{
    $query = $this->db->get('product_category');
    $return = array();

    foreach ($query->result() as $category)
    {
        $return[$category->id] = $category;
        $return[$category->id]->subs = $this->get_sub_categories($category->id); // Get the categories sub categories
    }
    return $return;
  
}

public function get_sub_categories($category_id)
{
    $this->db->where('category_id', $category_id);
    $query = $this->db->get('sub_category');
    return $query->result();
}
public function get_brand($cat_id,$sub_cat_id)
{   $this->db->select('b.brand_name,b.brand_id');
    $this->db->from('products p');
    $this->db->group_by('product_brand');
    $this->db->join('brands  b','p.product_brand=b.brand_id', 'left');
    
    if(empty($sub_cat_id)&& !empty($cat_id)){
        $this->db->where('p.product_cat',$cat_id);
    }elseif(!empty($sub_cat_id)&& !empty($cat_id)){
    $this->db->where(array('p.product_cat'=>$cat_id,'p.product_subcat'=>$sub_cat_id));
            
    }
    $query=   $this->db->get();
    return  $query->result();
}

public function get_num_rows($max,$min,$cat_id,$sub_cat_id,$brand,$search){
    $query=$this->db->select('*');
    $query=$this->db->from('products');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");
    $query = $this->db->join("brands","products.product_brand = brands.brand_id");
    $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
    if(!empty($search)){
        $query=$this->db->like('products.product_title',$search,'after');
    }    
    $query = $this->db->where('products.product_status', '1');  
    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
     if(!empty($min) && !empty($max)){
    $query=    $this->db->where(array('product_color_size_record.pcs_sale>='=>$min,'product_color_size_record.pcs_sale<='=>$max));
        }
        if(empty($sub_cat_id)&& !empty($cat_id)){
        $query=    $this->db->where('products.product_cat',$cat_id);
        }elseif(!empty($sub_cat_id)&& !empty($cat_id)){
       $query= $this->db->where(array('products.product_cat'=>$cat_id,'products.product_subcat'=>$sub_cat_id));
             
        }     
       
        if(!empty($brand)){
       $query= $this->db->where_in('products.product_brand',$brand);
        }
        $query=   $this->db->get();
        return  $query->num_rows();
    }

    public function filter_data($max,$min,$cat_id,$sub_cat_id,$brand,$order_by,$srt,$limit,$offset,$search){
     $query=$this->db->select('*');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");
    $query = $this->db->join("brands","products.product_brand = brands.brand_id");
    $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
        
     $query = $this->db->where('products.product_status', '1');  
     if(!empty($search)){
        $query=$this->db->like('products.product_title',$search,'after');
    }   
     $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
     $query =  $this->db->order_by($order_by, $srt);
     if(!empty($min) && !empty($max)){
        $this->db->where(array('product_color_size_record.pcs_sale>='=>$min,'product_color_size_record.pcs_sale<='=>$max));
        }
        if(empty($sub_cat_id)&& !empty($cat_id)){
            $this->db->where('products.product_cat',$cat_id);
        }elseif(!empty($sub_cat_id)&& !empty($cat_id)){
        $this->db->where(array('products.product_cat'=>$cat_id,'products.product_subcat'=>$sub_cat_id));
             
        }     
        
        if(!empty($brand)){
        $this->db->where_in('products.product_brand',$brand);
        }
        // $this->db->order_by('ps.ps_price_sale','asc');
        
            $this->db->limit($limit,$offset);
        
        $query=   $this->db->get('products');
   $cid= $this->session->userdata('cid');  
    $result['product_detail'] = $query->result_array();
    for ($i=0; $i < count($result['product_detail']) ; $i++) { 
        
        if(!empty($cid)){
          $condition=$this->get_rows('wishlist',array('wish_user_id'=>$cid,
            'wish_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['wishlist']='true';
            }else{
                $result['product_detail'][$i]['wishlist']='false';
            }
           }else{
               $result['product_detail'][$i]['wishlist']='false';
           }

        if(empty($cid)){
            $session_id=$this->session->userdata('session_id');
            $condition=$this->get_rows('cart',array('cart_session_id'=>$session_id,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }
        }else{
            $cid=$this->session->userdata('cid');
            $condition=$this->get_rows('cart',array('cart_user_id'=>$cid,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }

        }


    }
    return $result['product_detail'];

        }

    // products with pagination by umesh
    function product_get_paginated($keyword,$limit,$offset,$category_id)
{
    $this->db->select('*');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");
    $query = $this->db->join("brands","products.product_brand = brands.brand_id");
    $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
    if(!empty($keyword)){
    $this->db->like('products.product_title',$keyword, 'after');
    }  
    $this->db->where('products.product_status', '1'); 
    if(!empty($category_id)){
        $this->db->where('products.product_cat',$category_id); 
    } 
    
    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
      $query =  $this->db->order_by('products.product_id', 'pcs_id');
    $query =$this->db->limit($limit,$offset);
    $query = $this->db->get('products');
    // echo $this->db->last_query($query);
    $result['product_detail'] = $query->result_array();
    for ($i=0; $i < count($result['product_detail']) ; $i++) { 
        
        if(!empty($cid)){
          $condition=$this->get_rows('wishlist',array('wish_user_id'=>$cid,
            'wish_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['wishlist']='true';
            }else{
                $result['product_detail'][$i]['wishlist']='false';
            }
           }else{
               $result['product_detail'][$i]['wishlist']='false';
           }

        if(empty($cid)){
            $session_id=$this->session->userdata('session_id');
            $condition=$this->get_rows('cart',array('cart_session_id'=>$session_id,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }
        }else{
            $cid=$this->session->userdata('cid');
            $condition=$this->get_rows('cart',array('cart_user_id'=>$cid,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }

        }


    }
    return $result['product_detail'];
}

public function test($value='')
{
     $query=$this->db->select('AVG(rating)')
                        ->where(array('product_id'=>15))->get('review');
          $select_rat=   $query->result_array();
       return $select_rat;
}


// coded by umesh 
function get_products($keyword)
{
    $this->db->select('*');
    
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");
   
    
    $query = $this->db->join("brands","products.product_brand = brands.brand_id");
    $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
    if(!empty($keyword)){
    $this->db->like('products.product_type', $keyword, 'both');
    }  
        $this->db->where('products.product_status', '1');  

    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
    $query =  $this->db->order_by('products.product_id', 'pcs_id');
   
    $query = $this->db->get('products');
    // echo $this->db->last_query($query);
    if(!empty($this->session->userdata('cid'))){
    $cid=$this->session->userdata('cid');
     }
    $result['product_detail'] = $query->result_array();
    for ($i=0; $i < count($result['product_detail']) ; $i++) { 
        
        
        $query=$this->db->select('AVG(rating)')
                        ->where(array('product_id'=>$result['product_detail'][$i]['product_id']))->get('review');
          $select_rat=$query->result_array();
        $rating=$select_rat[0]['AVG(rating)'];

        $result['product_detail'][$i]['rating']=$rating;

        if(!empty($cid)){
          $condition=$this->get_rows('wishlist',array('wish_user_id'=>$cid,
            'wish_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['wishlist']='true';
            }else{
                $result['product_detail'][$i]['wishlist']='false';
            }
           }else{
               $result['product_detail'][$i]['wishlist']='false';
           }

        if(empty($cid)){
            $session_id=$this->session->userdata('session_id');
            $condition=$this->get_rows('cart',array('cart_session_id'=>$session_id,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }
        }else{
            $cid=$this->session->userdata('cid');
            $condition=$this->get_rows('cart',array('cart_user_id'=>$cid,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }

        }


    }
    
   return $result['product_detail'];
     
    
}
function get_products_where($keyword,$category_id)
{
    $this->db->select('*');
    $query = $this->db->join("product_color_size_record","products.prid = product_color_size_record.pcs_product_rand_id");
    $query = $this->db->join("categories","categories.category_id = products.product_cat");
    $query = $this->db->join("brands","products.product_brand = brands.brand_id");
    $query = $this->db->join("sizes","sizes.size_id = product_color_size_record.pcs_size");
    if(!empty($keyword)){
    $this->db->like('products.product_title', $keyword, 'after');
    }  
    if (!empty($category_id)) {
     $this->db->where('products.product_cat', $category_id) ;
       
     }
        $this->db->where('products.product_status', '1');  
       

    $query = $this->db->group_by('product_color_size_record.pcs_product_rand_id');
      $query =  $this->db->order_by('products.product_id', 'pcs_id');
    
    $query = $this->db->get('products');
    // echo $this->db->last_query($query);
    if(!empty($this->session->userdata('cid'))){
    $cid=$this->session->userdata('cid');
     }
    $result['product_detail'] = $query->result_array();
    for ($i=0; $i < count($result['product_detail']) ; $i++) { 
        
        if(!empty($cid)){
          $condition=$this->get_rows('wishlist',array('wish_user_id'=>$cid,
            'wish_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['wishlist']='true';
            }else{
                $result['product_detail'][$i]['wishlist']='false';
            }
           }else{
               $result['product_detail'][$i]['wishlist']='false';
           }

        if(empty($cid)){
            $session_id=$this->session->userdata('session_id');
            $condition=$this->get_rows('cart',array('cart_session_id'=>$session_id,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }
        }else{
            $cid=$this->session->userdata('cid');
            $condition=$this->get_rows('cart',array('cart_user_id'=>$cid,
            'cart_product_random'=>$result['product_detail'][$i]['prid']));
            if($condition){
                $result['product_detail'][$i]['cart']='true';
            }else{
                $result['product_detail'][$i]['cart']='false';
            }

        }


    }
    
   return $result['product_detail'];
     
    
}
public function get_max($value='')
    {
           $this->db->select_max('pcs_mrp');
           $res1 = $this->db->get('product_color_size_record');
           $data= $res1->result_array();
          
           $data1['max']=$data[0]['pcs_mrp'];
           $this->db->select_min('pcs_mrp');
           $res1 = $this->db->get('product_color_size_record');
           $data= $res1->result_array();
          
           $data1['min']=$data[0]['pcs_mrp'];
           return $data1;
    }

   public function delete_record($table,$where)
   {
       $query=$this->db->where($where)->delete($table);
       if($query){
        return TRUE;
       }else{
        return FALSE ;
       }
   }


   
}
?>