<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_adminauth extends CI_Model 
{
    public function admin_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where(array(
            'username' => $username, 
            'password' => $password
        ));
        return $this->db->get()->row();
        
    }
}

/* End of file M_auth.php */