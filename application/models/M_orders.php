<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_orders extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('tbl_orders', $data);
    }

    public function simpan_detail_transaksi($datadetails)
    {
        $this->db->insert('tbl_detail_orders', $datadetails);
    }

    public function get_data_by_logged_id()
    {
        $loggedID = $this->session->userdata('id_customer');
        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->where('id_customer', $loggedID);
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    public function get_details_order($no_order)
    {
        $this->db->select('
        tbl_detail_orders.id_details,
        tbl_detail_orders.no_order,
        tbl_detail_orders.id_product,
        tbl_detail_orders.qty,
        tbl_orders.*,
        tbl_products.title AS product_name,
        tbl_products.price,
        tbl_products.weight,
        tbl_products.discount,
        tbl_products.img AS image
    ');
        $this->db->from('tbl_detail_orders');
        $this->db->join('tbl_orders', 'tbl_detail_orders.no_order = tbl_orders.no_order');
        $this->db->join('tbl_products', 'tbl_detail_orders.id_product = tbl_products.id_product');
        $this->db->where('tbl_detail_orders.no_order', $no_order);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }


    //admin
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result();
    }

    //Input Resi
    public function updateresi($data){
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('tbl_orders', $data);
    }

    //Ganti Status
    public function gantistatus($data){
        $this->db->where('no_order', $data['no_order']);
        $this->db->update('tbl_orders', $data);
    }
}


/* End of file M_orders.php */
