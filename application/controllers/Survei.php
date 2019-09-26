<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survei extends CI_Controller
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
        if (!$this->session->userdata('username')) {
            redirect(base_url('auth'));
        }
        $_SESSION['indikator'] = $data_indikator = $this->Elemen_model->get_id_indikator();
        $_SESSION['indikator_id'] = $data_indikator[0];
        $data['indikator_id'] = $data_indikator[0];
        $data['listsurvei'] = $this->Survei_model->get_all_survey($this->session->userdata('username'));
        $data['master_unit'] = $this->Survei_model->get_unit();
        $data['surveyor'] = $this->session->userdata('nama');
        // print_r($data['master_unit']);
        // die();
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('survei/survei', $data);
    }
 
    public function indikator($id_survei = null, $id = null, $finish = 0)
    {
        if (!$this->session->userdata('username')) {
            redirect(base_url('auth'));
        }
        if ($id_survei == null) {
            $id_survei = $_SESSION['id_survei'];
        }
        if ($id == null) {
            $id = $_SESSION['indikator_id'];
        }
        $res = $this->Elemen_model->getdatasurvei($id, $id_survei);
        $survei =  $this->Survei_model->get_by_id($id_survei);

        if (sizeof($res['capaian'])>0) {        
        if ($res['capaian'][0]->iskualitatif != '0'  ) {
            return Redirect($res['capaian'][0]->iskualitatif . '/indikator/' . $id_survei . '/' . $id . '/' . $finish);
        }
          
        } else {
            return Redirect( 'Survei/indikator/' . $id_survei . '/' . 1 . '/' . $finish);
          
        }
        
        $data['capaian'] = $res['capaian'];
        $data['subindikator'] = $res['subindikator'];
        $data['komponen'] = $res['komponen'];
        $data['id_survei'] = $id_survei;
        $data['id_indikator'] = $id;
        $data['last_indikator'] = 0;
        $data['finish'] = $finish;
        $_SESSION['subindikator'] = $res['subindikator'];
        $_SESSION['komponen'] = $res['komponen'];
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
      
        
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('survei/surveidetail', $data);
    }

    public function read($id = 1)
    {
        header('Content-Type: application/json');
        echo json_encode($this->Survei_model->get_by_id($id));
    }

    public function insert()
    {
        $data = [
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal', true))),
            'surveyor' => $this->session->userdata('username'),
            'status' => 1,
            'modifieddate' => date('Y-m-d H:i:s') ,
            'createby' => $this->session->userdata('nama') ,
            'unit' =>  $this->input->post('unit', true),
            'indikator_terakhir' =>  0,
        ];
        $id_survei = $this->Survei_model->insert($data);
        $_SESSION['id_survei'] = $id_survei;
        Redirect(base_url() . 'Survei/indikator/' . $id_survei . '/1', false);
    }

    public function insert_detail()
    {
        $data_subindikator = $_SESSION['subindikator'];
        $komponen = $_SESSION['komponen'];
        foreach ($data_subindikator as $data_subindikator_row) {
            $check_exist_survei = $this->Tindakan_model->get_by_survei($this->input->post('id_survei', true), $data_subindikator_row->id);

            if ($check_exist_survei != null) {
                $data = [
                    'survei_id' => $this->input->post('id_survei', true),
                    'subindikator_id' => $data_subindikator_row->id,
                    'dilakukan' => $this->input->post('radio_' . $data_subindikator_row->id, true),
            
                    'modifieddate' => date('Y-m-d H:i:s')
                    
                ];
                $this->Tindakan_model->update($check_exist_survei->id, $data);
            } else {
                $data = [
                    'survei_id' => $this->input->post('id_survei', true),
                    'subindikator_id' => $data_subindikator_row->id,
                    'dilakukan' => $this->input->post('radio_' . $data_subindikator_row->id, true),
                    
                    'modifieddate' => date('Y-m-d H:i:s')
                ];
                $this->Tindakan_model->insert($data);
            }
        }

        
        foreach ($komponen as $komponen_row) {
            $check_exist_survei = $this->Dokpendukung_model->get_by_survei($this->input->post('id_survei', true), $komponen_row->id);
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'docx|doc|pdf|jpg|jpeg|png';
            $config['max_size'] = 200000;

            
            $file = null;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file_' . $komponen_row->id)) {
               
                $file =  md5(microtime()) . '-'.$this->upload->file_name;
			}
		

        
            if ($check_exist_survei != null) {
              if($file !== null ) {
                $data = [
                    'survei_id' => $this->input->post('id_survei', true),
                    'komponen_id' => $komponen_row->id,
                    'ketersediaan' => $this->input->post('sedia_' . $komponen_row->id, true),
                    'kesesuaian' => $this->input->post('sesuai_' . $komponen_row->id, true),
                    'keterangan' => $this->input->post('keterangan_' . $komponen_row->id, true),
                  
                    'file' => $file,
            
                    'modifieddate' => date('Y-m-d H:i:s')
                ];
               } else {
                $data = [
                    'survei_id' => $this->input->post('id_survei', true),
                    'komponen_id' => $komponen_row->id,
                    'ketersediaan' => $this->input->post('sedia_' . $komponen_row->id, true),
                    'kesesuaian' => $this->input->post('sesuai_' . $komponen_row->id, true),
                    'keterangan' => $this->input->post('keterangan_' . $komponen_row->id, true),
                  
               
                    'modifieddate' => date('Y-m-d H:i:s')
                ];
                
              }
                $this->Dokpendukung_model->update($check_exist_survei->id, $data);
            } else {
                $data = [
                    'survei_id' => $this->input->post('id_survei', true),
                    'komponen_id' => $komponen_row->id,
                    'ketersediaan' => $this->input->post('sedia_' . $komponen_row->id, true),
                    'kesesuaian' => $this->input->post('sesuai_' . $komponen_row->id, true),
                    'keterangan' => $this->input->post('keterangan_' . $komponen_row->id, true),
			          		'modifieddate' => date('Y-m-d H:i:s'),
				          	'file' => $file,
                ];
                $this->Dokpendukung_model->insert($data);
            }
        }
        $this->Survei_model->updatelastindikator($this->input->post('id_survei', true), $this->input->post('id_indikator', true));
        Redirect(base_url() . 'Survei/indikator/' . $this->input->post('id_survei', true) . '/' . $this->input->post('id_indikator', true), false);
    }
 
    public function submit($id_survei)
    {
        $this->Survei_model->submitsurvei($id_survei);
        Redirect(base_url(), false);
    }
}
