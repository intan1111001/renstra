<?php 
class Survei_model extends CI_Model 
 
    { 
    public $table = 'survei'; 
 
    public $id = 'id'; 
 
    public $order = 'DESC'; 
 
    function __construct() 
        { 
        parent::__construct(); 
        $this->simpeg = $this->load->database('simpeg', TRUE);
        } 
 
    // get all 
 
    function get_all($filter = "") 
        { 
            $this->db->order_by($this->id, $this->order); 
            return $this->db->get($this->table)->result(); 
        // return $this->db->get("laporan");
        } 
 
    // get data by id 
 
    function get_by_id($id) 
        { 
        $this->sifasum->where($this->id, $id); 
        return $this->sifasum->get($this->table)->row(); 
        } 
 
    // insert data 
 
    function insert($data) 
        { 
        $this->sifasum->insert($this->table, $data); 
        } 
 
    // update data 
 
    function update($id, $data) 
        { 
        $this->sifasum->where($this->id, $id); 
        $this->sifasum->update($this->table, $data); 
        } 
 
    // delete data 
 
    function delete($id) 
        { 
        $this->sifasum->where($this->id, $id); 
        $this->sifasum->delete($this->table); 
        } 
    }