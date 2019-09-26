<?php 
class Progress_model extends CI_Model 
 { 
   
 
    // get all 
 
    function get_all() 
        { 
            $strSql = 'CALL hasil_survey()';
            $query = $this->db->query($strSql);
            $data = $query->result_array();
            return $data;
        } 
}