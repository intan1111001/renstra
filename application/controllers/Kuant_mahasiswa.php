<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuant_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Survei_model');
        $this->load->model('Kuant_mahasiswa_model');
        $this->load->model('Pegawai_model');
        $this->load->model('Elemen_model');
    }

    public function index()
    {
        $data['list'] = $this->Kuant_mahasiswa_model->get_all();
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/mahasiswa', $data);
	}
	
	public function indikator($id_survei = null, $id = null, $finish = 0)
    {
        if ($id_survei == null) {
            $id_survei = $_SESSION['id_survei'];
        }
        if ($id == null) {
            $id = $_SESSION['indikator_id'];
        }
        $res = $this->Elemen_model->getdatasurvei($id, $id_survei);
        $survei =  $this->Survei_model->get_by_id($id_survei);
        $tahun = date('Y', strtotime($survei->tanggal));
        
        if ($res['capaian'][0]->iskualitatif == '0') {
            return Redirect('Survey/indikator/' . $id_survei . '/' . $id . '/' . $finish);
        }
        
        $data['capaian'] = $res['capaian'];
        $data['subindikator'] = $res['subindikator'];
        $data['komponen'] = $res['komponen'];
        $data['id_survei'] = $id_survei;
        $data['survei'] = $survei;
        if ($this->Survei_model->get_unit_by_id($survei->unit)) {
            $data['unit_name'] = $this->Survei_model->get_unit_by_id($survei->unit)->nama_unit;
        } else {
            $data['unit_name']  = '';
        }
        $data['id_indikator'] = $id;
        $data['last_indikator'] = 0;
        $data['finish'] = $finish;
        $_SESSION['subindikator'] = $res['subindikator'];
        $list_indikator = $this->Elemen_model->get_id_indikator();
        $array_indikator_lenght = sizeof($list_indikator);
        $array_id = (array_search($id, array_column($list_indikator, 'id')));

        if (($array_id == $array_indikator_lenght-1 ) and ($array_id != 0)) {
            $data['id_back_indikator'] = $list_indikator[$array_id-1]['id'];
            $data['id_next_indikator'] = $list_indikator[$array_id]['id'];
            $data['last_indikator'] = 1;
        } elseif (($array_id == $array_indikator_lenght-1) and ($array_id == 0)) {
            $data['id_back_indikator'] = $list_indikator[0]['id'];
            $data['id_next_indikator'] = $list_indikator[0]['id'];
            $data['last_indikator'] = 1;
        } elseif ($array_id == 0) {
            $data['id_back_indikator'] = $list_indikator[0]['id'];
            $data['id_next_indikator'] = $list_indikator[$array_id+1]['id'];
        } else {
            $data['id_back_indikator'] = $list_indikator[$array_id-1]['id'];
            $data['id_next_indikator'] = $list_indikator[$array_id+1]['id'];
        }

        $data['masterpegawai'] = $this->Pegawai_model->get_all();

        
        $data['list'] = $this->Kuant_mahasiswa_model->get_by_unittahun($survei->unit, intval($tahun));

        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/mahasiswa', $data);
    }

	public function hapus()
	
    {
        $id=$this->input->get('id');

        $this->Kuant_mahasiswa_model->delete($id);
        Redirect(base_url() . 'Kuant_mahasiswa/indikator/' . $this->input->get('id_survei', true) . '/' . $this->input->get('id_indikator', true), false);
    }
    public function insert()
    {
        $data =[

        'tahun' => $this->input->post('tahun'),
        'reg_dayatampung' =>     $this->input->post('reg_dayatampung'),
        'reg_pendaftar' =>    $this->input->post('reg_pendaftar'),
        'reg_lulus' =>   $this->input->post('reg_lulus') ,
        'mhs_baru' =>   $this->input->post('mhs_baru') ,
        'mhs_aktif' =>  $this->input->post('mhs_aktif') ,
        'mhs_asing_full' => $this->input->post('mhs_asing_full') ,
        'mhs_asing_paruh' =>    $this->input->post('mhs_asing_paruh') ,
        'lulus_mhs' =>  $this->input->post('lulus_mhs') ,
        'lulus_minipk' =>   $this->input->post('lulus_minipk') ,
        'lulus_rataipk' =>  $this->input->post('lulus_rataipk') ,
        'lulus_maxipk' =>   $this->input->post('lulus_maxipk') ,
        'lulus_terlacak' => $this->input->post('lulus_terlacak') ,
        'lulus_tunggu' =>   $this->input->post('lulus_tunggu') ,
		'lulus_sesuai' =>   $this->input->post('lulus_sesuai') ,
		'unit' =>   $this->input->post('unit') ,
		



        ];

        $id=$this->input->post('id');
        if (!isset($id) || $id=='') {
            $this->Kuant_mahasiswa_model->insert($data);
        } else {
            $this->Kuant_mahasiswa_model->update($id, $data);
        }
		Redirect(base_url() . 'Kuant_mahasiswa/indikator/' . $this->input->post('id_survei', true) . '/' . $this->input->post('id_indikator', true), false);
	}

    public function get()
    {
        $id=$this->input->get('id');
        echo json_encode($this->Kuant_mahasiswa_model->get_by_id($id));
    }
}

    /* End of file  Kuant_mahasiswa.php */
