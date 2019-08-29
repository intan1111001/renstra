<?php
class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->simpeg = $this->load->database('simpeg', true);
    }
    
    function login($username, $password)
    {
            $where = ['username' => $username,
                    'password' => md5($password)
            ];
			 $data = $this->simpeg->get_where('tbsimpeguser', $where);
			 
            return $data->num_rows();
	}
	
}
