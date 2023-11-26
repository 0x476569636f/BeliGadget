<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model 
{
    public function register($data)
    {
        $this->db->insert('tbl_customers', $data);
    }

    public function update_password($data){
        $this->db->where('id_customer', $data['id_customer']);
        $this->db->update('tbl_customers', $data);
    }

    public function get_customer_by_id($customer_id)
    {
        $this->db->where('id_customer', $customer_id);
        return $this->db->get('tbl_customers')->row();
    }
}

/* End of file M_customer.php */
