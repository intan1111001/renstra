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

    function get_unit(){
        $this->simpeg->from('m_unit');        
        $this->simpeg->order_by("nama_unit", "ASC");        
        $query = $this->simpeg->get();
        return $query->result(); 
    }

    function get_pegawai($id, $id_unit='', $filter=''){
        $sql = " SELECT nip,nama, if(s.id_usergroup = 10, 'superadmin', if(t.keterangan = 'Dosen', 'Dosen', 'Pegawai')) as jabatan, 
        p.id_unitkerja , u.nama_unit, p.id_jastruk, j.nama_jastruk, p.email, p.id_tugastambahan, p.id_unittugastambahan
        FROM simpeg_0511.tbpegawai p inner join simpeg_0511.m_tipe t on p.id_tipe = t.id 
        inner join simpeg_0511.m_unit u on p.id_unitkerja = u.id
        LEFT JOIN simpeg_0511.m_jastruk j ON p.id_jastruk = j.id
        inner join simpeg_0511.tbsimpeguser s on s.id_pegawai = p.id ";

        if($id != null){
            $sql = $sql." Where nip= '$id'";
        }else if($id_unit != '' && $id_unit != null){
            $sql = $sql." Where id_unitkerja= '".$id_unit."' or id_unittugastambahan= '".$id_unit."' ";
        }else if($filter != '' && $filter != null){
            $sql = $sql.$filter;
        }

        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_all_survey($id){
        $sql = "select s.*,t.nama, nama_unit FROM rsb.survei s 
        INNER JOIN simpeg_0511.tbpegawai t ON s.surveyor = t.nip 
        INNER JOIN simpeg_0511.m_unit u ON s.unit = u.kode_unit 
        WHERE s.surveyor = '$id'";        
        $query = $this->db->query($sql);
        return $query->result();
    }
    }