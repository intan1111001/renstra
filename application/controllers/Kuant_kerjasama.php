<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuant_kerjasama extends CI_Controller
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

        $this->load->model('Kuant_kerjasama_model');
    }
 
    public function index()
    {
        
        $data['list'] = $this->Kuant_kerjasama_model->get_all();
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('kuantitatif/kerjasama', $data);
    }
 

    public function get()
    {
        $id=$this->input->get('id');
        echo json_encode($this->Kuant_kerjasama_model->get_by_id($id));
    }

    public function insert()
    {
        $data = [

            'lembaga' => $this->input->post('lembaga'),
            'tingkat' =>   $this->input->post('tingkat'),
            'manfaat' =>   $this->input->post('manfaat'),
    
           'judul' =>  $this->input->post('judul'),



        ];
    
        $id = $this->input->post('id');
        if (!isset($id) || $id == '') {
            $this->Kuant_kerjasama_model->insert($data);
        } else {
            $this->Kuant_kerjasama_model->update($id, $data);
        }
        redirect('Kuant_kerjasama/index');
    }
    public function hapus()
    {
        $id=$this->input->get('id');

        $this->Kuant_kerjasama_model->delete($id);
        redirect('Kuant_kerjasama/index');
    }
}
