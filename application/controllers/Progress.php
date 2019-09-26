<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progress extends CI_Controller
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
     
        $this->load->model('Progress_model');
        $id = $this->session->userdata('username');
    

   
    }
 
    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect(base_url('auth'));
        }

        $data['list'] = $this->Progress_model->get_all();
 
        // print_r($data['master_unit']);
        // die();
        $this->load->view('template/head');
        $this->load->view('template/core_plugins');
        $this->load->view('survei/progress', $data);
    }
} 