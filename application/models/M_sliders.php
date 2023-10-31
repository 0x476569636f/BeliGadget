<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_sliders extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_sliders');
        $this->db->order_by('id_slider', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_data_bystatus()
    {
        $this->db->select('*');
        $this->db->from('tbl_sliders');
        $this->db->order_by('status', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_slider)
    {
        $this->db->select('*');
        $this->db->from('tbl_sliders');
        $this->db->where('id_slider', $id_slider);
        return $this->db->get()->row();
    }

    // Add Slider
    public function add($data){
        $this->db->insert('tbl_sliders', $data);
    }

    //Update Slider
    public function update($data)
    {
        $this->db->where('id_slider', $data['id_slider']);
        $this->db->update('tbl_sliders', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_slider', $data['id_slider']);
        $this->db->delete('tbl_sliders', $data);
    }
}

/* End of file M_sliders.php */
