<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuant_mahasiswa_model extends CI_Model
{
    public $table = 'kuant_mahasiswa';

    public $id = 'id';

    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // get all

    public function get_all($filter = "")
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
        // return $this->db->get("laporan");
    }

    // get data by id

    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result_array();
	}
	
	
    function get_by_unittahun($unit = '', $tahun = '')
    {
        $tahun_awal = $tahun-2;
        $where = 'tahun <= ' . $tahun . ' AND tahun >= ' . $tahun_awal . ' AND unit = ' . $unit;
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // insert data

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $insertId = $this->db->insert_id();
        return  $insertId;
    }

    // update data

    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function get_unit()
    {
        $this->simpeg->from('m_unit');
        $this->simpeg->order_by("nama_unit", "ASC");
        $query = $this->simpeg->get();
        return $query->result();
    }


    public function updatelastindikator($id, $indikator)
    {
        $sql = "update survei set indikator_terakhir = $indikator, modifieddate= now() where id = $id";
        $query = $this->db->query($sql);
    }

    public function submitsurvei($id)
    {
        $sql = "update survei set status = 2, modifieddate= now() where id = $id";
        $query = $this->db->query($sql);
    }
}

/* End of file Kuant_mahasiswa.php */
