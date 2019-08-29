<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuant_dana extends CI_Controller
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
        $this->load->model('Kuant_dana_model');
        $this->load->model('Pegawai_model');
        $this->load->model('Elemen_model');
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

        
        $data['kuant_dana'] = $this->Kuant_dana_model->get_by_unittahun($survei->unit, intval($tahun));

        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/dana', $data);
    }

    public function index()
    {
        $data['listsurvei'] = $this->Survei_model->get_all();
        $data['kuant_dana'] = $this->Kuant_dana_model->get_all();
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/dana', $data);
    }

    public function read($id)
    {
        header('Content-Type: application/json');
        echo json_encode($this->Kuant_dana_model->get_by_id($id));
    }
    

    public function insert()
    {
        $id = $this->input->post('id', true);
        if ($id == null && $id == '') {
            $data = [
                'unit' => $this->input->post('unit', true),
                'tahun' => $this->input->post('tahun', true),
                'jenis' => $this->input->post('jenis', true),
                'nominal_upps' => $this->input->post('nominal_upps', true) ,
                'nominal_ps' =>  $this->input->post('nominal_ps', true),
            ];
            $id = $this->Kuant_dana_model->insert($data);
        } else {
            $data = [
                'unit' => $this->input->post('unit', true),
                'tahun' => $this->input->post('tahun', true),
                'jenis' => $this->input->post('jenis', true),
                'nominal_upps' => $this->input->post('nominal_upps', true) ,
                'nominal_ps' =>  $this->input->post('nominal_ps', true),
            ];
            $id = $this->Kuant_dana_model->update($id, $data);
        }
		Redirect(base_url() . 'Kuant_dana/indikator/' . $this->input->post('id_survei', true) . '/' . $this->input->post('id_indikator', true), false);

    }
 
    function hapus()
    {
		
        $id=$this->input->get('id');

        $this->Kuant_dana_model->delete($id);
		Redirect(base_url() . 'Kuant_dana/indikator/' . $this->input->get('id_survei', true) . '/' . $this->input->get('id_indikator', true), false);
    }
}
