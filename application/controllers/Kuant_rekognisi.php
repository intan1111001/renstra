<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuant_rekognisi extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    // public function index()
    // {
    //  $this->load->view('welcome_message');
    // }

    function __construct()
    {
        parent::__construct();
        $this->load->model('Survei_model');
        $this->load->model('Kuant_rekognisi_model');
        $this->load->model('Pegawai_model');
    }
 
    public function index()
    {
        $data['masterpegawai'] = $this->Pegawai_model->get_all();
        $data['list'] = $this->Kuant_rekognisi_model->get_all();
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/rekognisi', $data);
    }


    
    public function readpegawai_byid($id = 1)
    {
        header('Content-Type: application/json');
        echo json_encode($this->Pegawai_model->get_pegawai_by_id($id));
    }

    public function insert()
    {
        $id = $this->input->post('id', true);
        if ($id == null && $id == '') {
            $data = [
                'pegawai' => $this->input->post('pegawai', true),
                'tahun' => $this->input->post('tahun', true),
                'rekognisi' =>  $this->input->post('rekognisi', true),
                'tingkat' =>  $this->input->post('tingkat', true),
                
            ];
            $id = $this->Kuant_rekognisi_model->insert($data);
        } else {
            $data = [
                'pegawai' => $this->input->post('pegawai', true),
                 'tahun' => $this->input->post('tahun', true),
                'rekognisi' =>  $this->input->post('rekognisi', true),
                'tingkat' =>  $this->input->post('tingkat', true),
       
            ];
            $id = $this->Kuant_rekognisi_model->update($id, $data);
        }
        Redirect(base_url() . 'Kuant_rekognisi/', false);
    }
	public function get()
    {
        $id=$this->input->get('id');
        echo json_encode( $this->Kuant_rekognisi_model->get_by_id($id));
	}
	
	public function hapus()
    {
        $id=$this->input->get('id');

        $this->Kuant_rekognisi_model->delete($id);
                redirect('Kuant_rekognisi/index');

    }
}
