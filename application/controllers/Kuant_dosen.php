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
	    $this->load->model('Kuantdosen_model'); 
	    $this->load->model('Pegawai_model'); 
    } 
 
    public function index() 
    { 
        $data['masterpegawai'] = $this->Pegawai_model->get_all(); 
		$data['listsurvei'] = $this->Survei_model->get_all(); 
		$data['kuant_dosen'] = $this->Kuantdosen_model->get_all(); 
	    $this->load->view('template/head'); 
	    $this->load->view('template/core_plugins'); 
	    $this->load->view('kuantitatif/dosen', $data); 
    } 

    public function read($id){	
		header('Content-Type: application/json');
		echo json_encode($this->Kuantdosen_model->get_by_id($id));
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
			$id = $this->Kuantdosen_model->insert($data); 
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
			$id = $this->Kuantdosen_model->update($id,$data); 
		}
		Redirect(base_url().'Kuant_dosen/', false);
	}
 
	function delete($id) 
	{ 
		$this->Kuantdosen_model->delete($id); 
		Redirect(base_url().'Kuant_dosen/', false);
	} 
    
}

 