<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getPegawai'))
{
    function getPegawai($id)
    {
        $ci=& get_instance();
         $ci->simpeg = $ci->load->database('simpeg', TRUE);
         $strSql = 'select t.id,nip,nama, nama_jafung FROM tbpegawai t join m_jafung j on t.id_jafung = j.id WHERE id_tipe = 2 and t.id ='. $id ;
        $query = $ci->simpeg->query($strSql);
        $data = $query->row();
        return $data->nip .' - '.$data->nama;
    }   
}