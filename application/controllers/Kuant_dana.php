<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuant_dana extends CI_Controller {

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
	    $this->load->model('Kuant_dana_model'); 
    } 
 
    public function index() 
    { 
		$data['listsurvei'] = $this->Survei_model->get_all(); 
		$data['kuant_dana'] = $this->Kuant_dana_model->get_all(); 
	    $this->load->view('template/head'); 
	    $this->load->view('template/core_plugins'); 
	    $this->load->view('kuantitatif/dana', $data); 
    } 

    public function read($id){	
		header('Content-Type: application/json');
		echo json_encode($this->Kuant_dana_model->get_by_id($id));
    }
    

    public function insert(){
		$id = $this->input->post('id', TRUE);
		if($id == null && $id == ''){
			$data = array( 
				'unit' => $this->input->post('unit', TRUE), 
				'tahun' => $this->input->post('tahun', TRUE), 
				'jenis' => $this->input->post('jenis', TRUE), 
				'nominal_upps' => $this->input->post('nominal_upps', TRUE) , 
				'nominal_ps' =>  $this->input->post('nominal_ps', TRUE),
			); 
			$id = $this->Kuant_dana_model->insert($data); 
		}else{
			$data = array( 
				'unit' => $this->input->post('unit', TRUE), 
				'tahun' => $this->input->post('tahun', TRUE), 
				'jenis' => $this->input->post('jenis', TRUE), 
				'nominal_upps' => $this->input->post('nominal_upps', TRUE) , 
				'nominal_ps' =>  $this->input->post('nominal_ps', TRUE),
			); 
			$id = $this->Kuant_dana_model->update($id,$data); 
		}
		Redirect(base_url().'Kuant_dana/', false);
	}
 
	function delete($id) 
	{ 
		$this->Kuant_dana_model->delete($id); 
		Redirect(base_url().'Kuant_dana/', false);
	} 
    
}

 