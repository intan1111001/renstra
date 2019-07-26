<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei extends CI_Controller {

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
		$this->load->model('Elemen_model'); 
		$this->load->model('Tindakan_model'); 
		$this->load->model('Dokpendukung_model');
		$id = '195709051988031002'; //super admin
		$pegawai = $this->Survei_model->get_pegawai($id);
		$newdata = array(
			'username'  => $id,
			'nama' => $pegawai[0]->nama,
			'jabatan' => $pegawai[0]->jabatan,
			'id_unit' => $pegawai[0]->id_unitkerja,
			'nama_unit' => $pegawai[0]->nama_unit,
			'nama_jastruk' => $pegawai[0]->nama_jastruk,
			'email' => $pegawai[0]->email
		);
		$this->session->set_userdata($newdata);
        } 
 
    public function index() 
        { 
		    
		$data['listsurvei'] = $this->Survei_model->get_all_survey($this->session->userdata('username')); 
		$data['master_unit'] = $this->Survei_model->get_unit(); 
		$data['surveyor'] = $this->session->userdata('nama'); 
		// print_r($data['master_unit']);
		// die();
        $this->load->view('template/head'); 
        $this->load->view('template/core_plugins'); 
        $this->load->view('survei/survei', $data); 
        } 
 
	public function indikator($id_survei,$id){	
		$res = $this->Elemen_model->getdatasurvei($id, $id_survei);
		$data['capaian'] = $res["capaian"]; 
		$data['subindikator'] = $res["subindikator"]; 
		$data['komponen'] = $res["komponen"]; 
		$data['id_survei'] = $id_survei; 
		$data['id_indikator'] = $id; 
		$_SESSION['subindikator'] = $res["subindikator"]; 
		$_SESSION['komponen'] = $res["komponen"]; 
         $this->load->view('template/head'); 
        $this->load->view('template/core_plugins'); 
        $this->load->view('survei/surveidetail', $data); 
	}

	public function read($id=1){	
		header('Content-Type: application/json');
		echo json_encode($this->Survei_model->get_by_id($id));
	}

	public function insert(){
		$data = array( 
			'tanggal' => date("Y-m-d", strtotime($this->input->post('tanggal', TRUE))),
			'surveyor' => $this->session->userdata('username'), 
			'status' => 1, 
			'modifieddate' => date('Y-m-d H:i:s') , 
			'createby' => $this->session->userdata('nama') , 
			'unit' =>  $this->input->post('unit', TRUE),
			'indikator_terakhir' =>  0,
		); 
		$id_survei = $this->Survei_model->insert($data); 
		Redirect(base_url().'Survei/indikator/'.$id_survei.'/1', false);
	}

	public function insert_detail(){
		$data_subindikator = $_SESSION['subindikator'];
		$komponen = $_SESSION['komponen'];
		foreach($data_subindikator as $data_subindikator_row){

			$check_exist_survei = $this->Tindakan_model->get_by_survei($this->input->post('id_survei', TRUE), $data_subindikator_row->id);

			if($check_exist_survei != null){
				$data = array( 
					'survei_id' => $this->input->post('id_survei', TRUE),
					'subindikator_id' => $data_subindikator_row->id, 
					'dilakukan' => $this->input->post('radio_'.$data_subindikator_row->id, TRUE), 
					'modifieddate' => date('Y-m-d H:i:s') 
				); 
				$this->Tindakan_model->update($check_exist_survei->id, $data); 
			}
			else{
				$data = array( 
					'survei_id' => $this->input->post('id_survei', TRUE),
					'subindikator_id' => $data_subindikator_row->id, 
					'dilakukan' => $this->input->post('radio_'.$data_subindikator_row->id, TRUE), 
					'modifieddate' => date('Y-m-d H:i:s') 
				); 
				$this->Tindakan_model->insert($data); 
			}
		}

		
		foreach($komponen as $komponen_row){
			$data = array( 
				'survei_id' => $this->input->post('id_survei', TRUE),
				'komponen_id' => $komponen_row->id, 
				'ketersediaan' => $this->input->post('sedia_'.$komponen_row->id, TRUE), 
				'kesesuaian' => $this->input->post('sesuai_'.$komponen_row->id, TRUE), 
				'modifieddate' => date('Y-m-d H:i:s') 
			); 
			$this->Dokpendukung_model->insert($data); 
		}

		Redirect(base_url().'Survei/indikator/'.$this->input->post('id_survei', TRUE).'/'.$this->input->post('id_indikator', TRUE), false);
	}
 
    
}

 