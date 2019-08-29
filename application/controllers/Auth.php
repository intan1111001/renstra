<?php
        
defined('BASEPATH') or exit('No direct script access allowed');
        
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_model');
    }

    public function index()
    {
        
        if (!$this->session->userdata('username')) {
            $this->load->view('login');
        } else {
            redirect(base_url('survei'));
        }
    }
    public function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);


        if (($this->Auth_model->login($username, $password)) > 0) {
            $data_session = [
                'username' => $username,
                'status' => 'login'
                ];
         
            $this->session->set_userdata($data_session);
            redirect(base_url('survei'));
        } else {
            $this->session->set_flashdata('msg', 'Username Atau Password Salah');
            redirect(base_url('auth'));
        }
    }
    function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url('auth'));
    }
}
        
    /* End of file  Auth.php */
