<?php 
class Elemen_model extends CI_Model 
 
    { 
    public $table = 'elemen'; 
 
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

    function getdatasurvei($id){

        $sql = "select e.id id_elemen, e.capaian, e.jenis, i.id indokator_id, i.jenis indikator_jenis  FROM elemen e LEFT JOIN indikator i ON e.id = i.elemen_id where i.id = $id";
        $query = $this->db->query($sql);
        $capaian = $query->result();

        $sql = "select s.id, indikator_id, s.jenis FROM elemen e JOIN indikator i ON e.id = i.elemen_id JOIN subindikator s ON i.id = s.indikator_id  where i.id = $id";
        $query = $this->db->query($sql);
        $subindikator = $query->result();

        $sql = "select k.id,subindikator_id, k.jenis FROM elemen e JOIN indikator i ON e.id = i.elemen_id JOIN subindikator s ON i.id = s.indikator_id JOIN komponen k ON k.subindikator_id = s.id  where i.id = $id";
        $query = $this->db->query($sql);
        $komponen = $query->result();

        $data_final['capaian'] = $capaian;
        $data_final['subindikator'] = $subindikator;
        $data_final['komponen'] = $komponen;
        return $data_final;
        }
    }