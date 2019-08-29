<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuant_dosen extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }

	function __construct() 
    { 
	    parent::__construct(); 
	    $this->load->model('Survei_model'); 
	    $this->load->model('Kuant_dosen_model'); 
		$this->load->model('Pegawai_model'); 
        $this->load->model('Elemen_model');

    } 
 
    public function index() 
    { 
        $data['masterpegawai'] = $this->Pegawai_model->get_all(); 
		$data['listsurvei'] = $this->Survei_model->get_all(); 
		$data['kuant_dosen'] = $this->Kuant_dosen_model->get_all(); 
	    $this->load->view('template/head'); 
	    $this->load->view('template/core_plugins'); 
		$this->load->view('kuantitatif/dosen', $data); 
		
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

        
        $data['kuant_dosen'] = $this->Kuant_dosen_model->get_by_unittahun($survei->unit, intval($tahun));

        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/dosen', $data);
    }


    public function read($id){	
		header('Content-Type: application/json');
		echo json_encode($this->Kuant_dosen_model->get_by_id($id));
    }
    
    public function readpegawai_byid($id=1){	
		header('Content-Type: application/json');
		echo json_encode($this->Pegawai_model->get_pegawai_by_id($id));
	}

    public function insert(){
		$id = $this->input->post('id', TRUE);
		if($id == null && $id == ''){
			$data = array( 
				'pegawai' => $this->input->post('pegawai', TRUE),
				'unit' => $this->input->post('unit', TRUE), 
				'tahun' => $this->input->post('tahun', TRUE), 
				's2' => $this->input->post('s2', TRUE), 
				's3' => $this->input->post('s3', TRUE) , 
				'keahlian' =>  $this->input->post('keahlian', TRUE),
				'jabatan' =>  $this->input->post('jabatan', TRUE),
				'serdos' =>  $this->input->post('serdos', TRUE),
				'sertifikat' =>  $this->input->post('sertifikat', TRUE),
				'mk_diampu_ps' =>  $this->input->post('mk_diampu_ps', TRUE),
				'mk_diampu_nonps' =>  $this->input->post('mk_diampu_nonps', TRUE),
				'pendidikan' =>  $this->input->post('pendidikan', TRUE),
				'penelitian' =>  $this->input->post('penelitian', TRUE),
				'pengabdian' =>  $this->input->post('pengabdian', TRUE),
				'tugastambahan' =>  $this->input->post('tugastambahan', TRUE),
				'status' =>  $this->input->post('status', TRUE),
				'artikel' =>  $this->input->post('artikel', TRUE),
				'sitasi' =>  $this->input->post('sitasi', TRUE),
			); 
			$id = $this->Kuant_dosen_model->insert($data); 
		}else{
			$data = array( 
				'pegawai' => $this->input->post('pegawai', TRUE),
				'unit' => $this->input->post('unit', TRUE), 
				'tahun' => $this->input->post('tahun', TRUE), 
				's2' => $this->input->post('s2', TRUE), 
				's3' => $this->input->post('s3', TRUE) , 
				'keahlian' =>  $this->input->post('keahlian', TRUE),
				'jabatan' =>  $this->input->post('jabatan', TRUE),
				'serdos' =>  $this->input->post('serdos', TRUE),
				'sertifikat' =>  $this->input->post('sertifikat', TRUE),
				'mk_diampu_ps' =>  $this->input->post('mk_diampu_ps', TRUE),
				'mk_diampu_nonps' =>  $this->input->post('mk_diampu_nonps', TRUE),
				'pendidikan' =>  $this->input->post('pendidikan', TRUE),
				'penelitian' =>  $this->input->post('penelitian', TRUE),
				'pengabdian' =>  $this->input->post('pengabdian', TRUE),
				'tugastambahan' =>  $this->input->post('tugastambahan', TRUE),
				'status' =>  $this->input->post('status', TRUE),
				'artikel' =>  $this->input->post('artikel', TRUE),
				'sitasi' =>  $this->input->post('sitasi', TRUE),
			); 
			$id = $this->Kuant_dosen_model->update($id,$data); 
		}
		Redirect(base_url() . 'Kuant_dosen/indikator/' . $this->input->post('id_survei', true) . '/' . $this->input->post('id_indikator', true), false);

	}
 
	function hapus() 
	{ 
		$id=$this->input->get('id');
		$this->Kuant_dosen_model->delete($id); 
		Redirect(base_url() . 'Kuant_dosen/indikator/' . $this->input->get('id_survei', true) . '/' . $this->input->get('id_indikator', true), false);
	} 
	public function get()
    {
        $id=$this->input->get('id');
        echo json_encode($this->Kuant_dosen_model->get_by_id($id));
    }
    
    
}

 