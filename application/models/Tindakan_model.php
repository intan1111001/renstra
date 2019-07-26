<?php 
class Tindakan_model extends CI_Model 
 
    { 
    public $table = 'tindakan'; 
 
    public $id = 'id'; 
 
    public $order = 'DESC'; 
 
    function __construct() 
        { 
        parent::__construct(); 
        } 
 
    // get all 
 
    function get_all($filter = "") 
        { 
            $this->db->order_by($this->id, $this->order); 
            return $this->db->get($this->table)->result(); 
        } 
 
    // get data by id 
 
    function get_by_id($id) 
        { 
        $this->db->where($this->id, $id); 
        return $this->db->get($this->table)->row(); 
        } 
 
    // insert data 
 
    function insert($data) 
        { 
        $this->db->insert($this->table, $data); 
        } 
 
    // update data 
 
    function update($id, $data) 
        { 
        $this->db->where($this->id, $id); 
        $this->db->update($this->table, $data); 
        } 
 
    // delete data 
 
    function delete($id) 
        { 
        $this->db->where($this->id, $id); 
        $this->db->delete($this->table); 
        } 

    function get_by_survei($id,$indikator_id) 
        { 
        $this->db->where("survei_id", $id); 
        $this->db->where("subindikator_id", $indikator_id); 
        return $this->db->get($this->table)->row(); 
        } 

    }