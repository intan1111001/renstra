<?php
class Kuant_prestasi_model extends CI_Model
{
    public $table = 'kuant_prestasi';

    public $id = 'id';

    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // get all

    public function get_all($filter = '')
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    public function get_by_unittahun($unit = '', $tahun = '')
    {
        $tahun_awal = $tahun-2;
        $where = 'tahun <= ' . $tahun . ' AND tahun >= ' . $tahun_awal . ' AND unit = ' . $unit;
        $this->db->where($where);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id

    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
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
}
