<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_all_unit extends CI_Controller
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
        $this->load->model('Elemen_model');
        $this->load->model('Tindakan_model');
        $this->load->model('Dokpendukung_model');
        $id = $this->session->userdata('username');
    

        $pegawai = $this->Survei_model->get_pegawai($id);

        $newdata = [
            'username'  => $id,
            'nama' => $pegawai[0]->nama
        ];
        $this->session->set_userdata($newdata);
    }
 
    public function index()
    {
        // $id = 1;
        // $res = $this->Elemen_model->getdataallsurvei($id);
        
        // $data['capaian'] = $res['capaian'];
        // $data['subindikator'] = $res['subindikator'];
        //  $data['komponen'] = $res['komponen'];
        //  $data['id_survei'] = null;
        //  $data['id_indikator'] = $id;
        //  $data['last_indikator'] = 0;
        //  //$data['finish'] = $finish;
        //  $_SESSION['subindikator'] = $res['subindikator'];
        //  $_SESSION['komponen'] = $res['komponen'];
        //  $list_indikator = $this->Elemen_model->get_id_indikator();
        //  $array_indikator_lenght = sizeof($list_indikator);
        //  $array_id = (array_search($id, array_column($list_indikator, 'id')));
      


        // if (($array_id == $array_indikator_lenght-1 ) and ($array_id != 0)) {
        //     $data['id_back_indikator'] = $list_indikator[$array_id-1]['id'];
        //     $data['id_next_indikator'] = $list_indikator[$array_id]['id'];
        //     $data['last_indikator'] = 1;
        // } elseif (($array_id == $array_indikator_lenght-1) and ($array_id == 0)) {
        //     $data['id_back_indikator'] = $list_indikator[0]['id'];
        //     $data['id_next_indikator'] = $list_indikator[0]['id'];
        //     $data['last_indikator'] = 1;
        // } elseif ($array_id == 0) {
        //     $data['id_back_indikator'] = $list_indikator[0]['id'];
        //     $data['id_next_indikator'] = $list_indikator[$array_id+1]['id'];
       
        // } else {
        //     $data['id_back_indikator'] = $list_indikator[$array_id-1]['id'];
        //     $data['id_next_indikator'] = $list_indikator[$array_id+1]['id'];
        //  }
      
        
        // $this->load->view('template/head');
        // $this->load->view('template/core_plugins');
        // $this->load->view('survei/rekap_all', $data);

        $this->indikator(1);
    }

    public function indikator($id){
        $res = $this->Elemen_model->getdataallsurvei($id);
        
        $data['capaian'] = $res['capaian'];
        $data['subindikator'] = $res['subindikator'];
         $data['komponen'] = $res['komponen'];
         $data['id_survei'] = null;
         $data['id_indikator'] = $id;
         $data['last_indikator'] = 0;
         //$data['finish'] = $finish;
         $_SESSION['subindikator'] = $res['subindikator'];
         $_SESSION['komponen'] = $res['komponen'];
         $list_indikator = $this->Elemen_model->get_rekap_id_indikator();
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
      
        
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('survei/rekap_all', $data);
    }

    public function tindakan($indikator_id,$dilakukan,$subindikator_id)
    {
        header('Content-Type: application/json');
        echo json_encode($this->Elemen_model->getdetaildilakukan($indikator_id,$dilakukan,$subindikator_id));
    }

    public function dokpendukung($indikator_id,$ketersediaan, $kesesuaian, $subindikator_id, $komponen_id)
    {
        header('Content-Type: application/json');
        echo json_encode($this->Elemen_model->getdokpendukung($indikator_id,$ketersediaan, $kesesuaian, $subindikator_id, $komponen_id));
    }
}
