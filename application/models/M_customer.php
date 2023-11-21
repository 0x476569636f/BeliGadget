<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model 
{
    public function register($data)
    {
        $this->db->insert('tbl_customers', $data);
    }
}

/* End of file M_customer.php */
