<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_Store extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_categories', 'tbl_categories.id = tbl_products.id_category', 'left');
        $this->db->order_by('id_product', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_data_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_categories');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

}