<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Helper function to check whether the url slug already exists
 */
if(!function_exists('isUrlExists')){
    function isUrlExists($tblName, $urlSlug,$urlcol){
        if(!empty($tblName) && !empty($urlSlug)){
            $ci = & get_instance();
            $ci->db->from($tblName);
            $ci->db->where($urlcol,$urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum>0)?true:false;
        }else{
            return true;
        }
    }
}