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
        } 
 
    public function index() 
        { 
            
		$data['listsurvei'] = $this->Survei_model->get_all(); 
        $this->load->view('template/head'); 
        $this->load->view('template/core_plugins'); 
        $this->load->view('survei/survei', $data); 
        } 
 
	public function indikator($id=1){	
		$res = $this->Elemen_model->getdatasurvei($id);
		$data['capaian'] = $res["capaian"]; 
		$data['subindikator'] = $res["subindikator"]; 
		$data['komponen'] = $res["komponen"]; 
         $this->load->view('template/head'); 
        $this->load->view('template/core_plugins'); 
        $this->load->view('survei/surveidetail', $data); 
	}
 
    
}

 