<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_customers extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_customers');
        $this->db->order_by('id_customer', 'desc');
        return $this->db->get()->result();
    }

    public function delete($data)
    {
        $this->db->where('id_customer', $data['id_customer']);
        $this->db->delete('tbl_customers', $data);
    }
}

/* End of file M_customers.php */
