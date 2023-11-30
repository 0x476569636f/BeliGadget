<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_getsumorders extends CI_Model
{
    public function bulanini()
    {
        $bulanini = date('m');

        $this->db->select_sum('total_bayar');
        $this->db->from('tbl_orders');
        $this->db->where("MONTH(tgl_order) = $bulanini");
        $query = $this->db->get();

        return $query->row()->total_bayar;
    }

    public function tahunini()
    {
        $tahunini = date('Y');

        $this->db->select_sum('total_bayar');
        $this->db->from('tbl_orders');
        $this->db->where("YEAR(tgl_order) = $tahunini");
        $query = $this->db->get();

        return $query->row()->total_bayar;
    }

    public function semua()
    {
        $this->db->select_sum('total_bayar');
        $this->db->from('tbl_orders');
        $query = $this->db->get();

        return $query->row()->total_bayar;
    }
}

/* End of file getorders.php */
