<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuant_ppm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kuant_ppm_model');
	}

	public function index()
	{
		$data['list'] = $this->Kuant_ppm_model->get_all();
		$this->load->view('template/head');
		$this->load->view('template/core_plugins');
		$this->load->view('kuantitatif/ppm', $data);
	}
	public function insert()
	{
		$data = [

			'tahun' => $this->input->post('tahun'),
			'tipe' => 	$this->input->post('tipe'),
			'jumlah' =>	$this->input->post('jumlah'),
			'jenis' =>	$this->input->post('jenis'),
			'subjek' =>	$this->input->post('subjek'),



		];

		$id = $this->input->post('id');
		if (!isset($id) || $id == "") {

			$this->Kuant_ppm_model->insert($data);
		} else {
			$this->Kuant_ppm_model->update($id, $data);
		}
		redirect('Kuant_ppm/index');
	}
	public function get()
    {
        $id=$this->input->get('id');
        echo json_encode( $this->Kuant_ppm_model->get_by_id($id));
	}
	
	public function hapus()
    {
        $id=$this->input->get('id');

        $this->Kuant_ppm_model->delete($id);
                redirect('Kuant_ppm/index');

    }
}
        
    /* End of file  Kuant_ppm.php */
