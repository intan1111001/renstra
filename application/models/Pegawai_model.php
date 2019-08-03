<?php 
class Pegawai_model extends CI_Model 
 
    { 
    public $table = 'tbpegawai'; 
 
    public $id = 'id'; 
 
    public $order = 'DESC'; 
 
    function __construct() 
        { 
        parent::__construct(); 
        $this->simpeg = $this->load->database('simpeg', TRUE);
        } 
 
    // get all 
 
    function get_all() 
        { 
            $strSql = 'select id,nip,nama FROM tbpegawai WHERE id_tipe = 2';
            $query = $this->simpeg->query($strSql);
            $data = $query->result();
            return $data;
        } 

        
    function get_pegawai_by_id($id) 
    { 
        $strSql = 'select t.id,nip,nama, nama_jafung FROM tbpegawai t join m_jafung j on t.id_jafung = j.id WHERE id_tipe = 2 and t.id ='. $id ;
        $query = $this->simpeg->query($strSql);
        $data = $query->result();
        return $data;
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

    }