<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_getstatsorders extends CI_Model
{
    public function pending()
    {
        $this->db->select('COUNT(*) as pending_count');
        $this->db->from('tbl_orders');
        $this->db->where('status', 0); 
        $query = $this->db->get();

        return $query->row()->pending_count;
    }

    public function success()
    {
        $this->db->select('COUNT(*) as success_count');
        $this->db->from('tbl_orders');
        $this->db->where('status', 3);
        $query = $this->db->get();

        return $query->row()->success_count;
    }

    public function canceled()
    {
        $this->db->select('COUNT(*) as canceled_count');
        $this->db->from('tbl_orders');
        $this->db->where('status', 4); // Adjust the status value as needed
        $query = $this->db->get();

        return $query->row()->canceled_count;
    }
}

/* End of file m_getstatsorders.php */
