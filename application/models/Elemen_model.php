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
            $strSql = 'select * FROM elemen WHERE isdelete = 0 order by id';
            $query = $this->db->query($strSql);
            $data = $query->result();
            return $data;
        } 

        
    function get_id_indikator() 
    { 
        $strSql = 'select i.id  FROM elemen e LEFT JOIN indikator i ON e.id = i.elemen_id where e.isdelete = 0 and i.isdelete = 0 order by id';
        $query = $this->db->query($strSql);
        $data = $query->result_array();
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

    function getdatasurvei($id,$id_survei){

        $sql = "select e.id id_elemen, e.capaian, e.jenis, i.id indokator_id, i.jenis indikator_jenis  FROM elemen e LEFT JOIN indikator i ON e.id = i.elemen_id where i.id = $id";
        $query = $this->db->query($sql);
        $capaian = $query->result();

        $sql = "select s.id, indikator_id, s.jenis, COALESCE(dilakukan,-1) AS dilakukan FROM elemen e JOIN indikator i ON e.id = i.elemen_id JOIN subindikator s ON i.id = s.indikator_id 
        LEFT JOIN tindakan t ON t.subindikator_id = s.id AND t.survei_id = $id_survei where i.id = $id";
        $query = $this->db->query($sql);
        $subindikator = $query->result();

        $sql = "select k.id,subindikator_id, k.jenis, COALESCE(ketersediaan,-1) ketersediaan,COALESCE(kesesuaian,-1) kesesuaian  FROM elemen e JOIN indikator i ON e.id = i.elemen_id JOIN subindikator s ON i.id = s.indikator_id JOIN komponen k ON k.subindikator_id = s.id  
        LEFT JOIN dokpendukung d ON d.komponen_id = k.id AND d.survei_id = $id_survei
        where i.id = $id";
        $query = $this->db->query($sql);
        $komponen = $query->result();

        $data_final['capaian'] = $capaian;
        $data_final['subindikator'] = $subindikator;
        $data_final['komponen'] = $komponen;
        return $data_final;
        }
    }