<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuant_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('Kuant_mahasiswa_model');
    }

    public function index()
    {
        $data['list'] = $this->Kuant_mahasiswa_model->get_all();
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/mahasiswa', $data);
    }
     public function hapus()
    {
        $id=$this->input->get('id');

        $this->Kuant_mahasiswa_model->delete($id);
                redirect('Kuant_mahasiswa/index');

    }
    public function insert()
    {
      $data =[

  'tahun' => $this->input->post('tahun'),
   'reg_dayatampung' => 	$this->input->post('reg_dayatampung'),
  'reg_pendaftar' =>	$this->input->post('reg_pendaftar'),
   'reg_lulus' =>	$this->input->post('reg_lulus') ,
'mhs_baru' =>	$this->input->post('mhs_baru') ,
'mhs_aktif' =>	$this->input->post('mhs_aktif') ,
'mhs_asing_full' =>	$this->input->post('mhs_asing_full') ,
'mhs_asing_paruh' =>	$this->input->post('mhs_asing_paruh') ,
'lulus_mhs' =>	$this->input->post('lulus_mhs') ,
'lulus_minipk' =>	$this->input->post('lulus_minipk') ,
'lulus_rataipk' =>	$this->input->post('lulus_rataipk') ,
'lulus_maxipk' =>	$this->input->post('lulus_maxipk') ,
'lulus_terlacak' =>	$this->input->post('lulus_terlacak') ,
'lulus_tunggu' =>	$this->input->post('lulus_tunggu') ,
'lulus_sesuai' =>	$this->input->post('lulus_sesuai') ,


      ];

      $id=$this->input->post('id');
       if(!isset($id) || $id=="")
       {
          echo $id;
          die();
         $this->Kuant_mahasiswa_model->insert($data);
       } else {
         $this->Kuant_mahasiswa_model->update($id,$data);

       }
        redirect('Kuant_mahasiswa/index');

    }

    public function get()
    {
        $id=$this->input->get('id');
        echo json_encode( $this->Kuant_mahasiswa_model->get_by_id($id));
    }
}

    /* End of file  Kuant_mahasiswa.php */
