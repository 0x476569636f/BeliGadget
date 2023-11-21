<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_customerauth extends CI_Model 
{
    public function customer_login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_customers');
        $this->db->where(array(
            'email' => $email, 
            'password' => $password
        ));
        return $this->db->get()->row();
        
    }
}

/* End of file M_customerauth.php */