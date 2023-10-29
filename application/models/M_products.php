<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_products extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_categories', 'tbl_categories.id = tbl_products.id_category', 'left');
        $this->db->order_by('id_product', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_product)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->join('tbl_categories', 'tbl_categories.id = tbl_products.id_category', 'left');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_products', $data);
    }

    public function update($data)
    {
        $this->db->where('id_product', $data['id_product']);
        $this->db->update('tbl_products', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_product', $data['id_product']);
        $this->db->delete('tbl_products', $data);
    }
}

/* End of file M_products.php */
