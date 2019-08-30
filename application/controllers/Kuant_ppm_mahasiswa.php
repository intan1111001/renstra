<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuant_ppm_mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kuant_ppm_mahasiswa_model');
        $this->load->model('Pegawai_model');
    }

    public function index()
    {
        $data['list'] = $this->Kuant_ppm_mahasiswa_model->get_all();
        $data['masterpegawai'] = $this->Pegawai_model->get_all();
    
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/ppm_mahasiswa', $data);
    }
    public function insert()
    {
        $data = [

            'tahun' => $this->input->post('tahun'),
            'tipe' =>   $this->input->post('tipe'),
            'tema' =>   $this->input->post('tema'),
    
            'pegawai' =>    $this->input->post('pegawai'),

            'mahasiswa' =>  $this->input->post('mahasiswa'),
            'judul' =>  $this->input->post('judul'),



        ];
    
        $id = $this->input->post('id');
        if (!isset($id) || $id == '') {
            $this->Kuant_ppm_mahasiswa_model->insert($data);
        } else {
            $this->Kuant_ppm_mahasiswa_model->update($id, $data);
        }
        redirect('Kuant_ppm_mahasiswa/index');
    }
    public function get()
    {
        $id=$this->input->get('id');
        echo json_encode($this->Kuant_ppm_mahasiswa_model->get_by_id($id));
    }
    
    public function hapus()
    {
        $id=$this->input->get('id');

        $this->Kuant_ppm_mahasiswa_model->delete($id);
                redirect('Kuant_ppm_mahasiswa/index');
    }
}
        
    /* End of file  Kuant_ppm.php */
