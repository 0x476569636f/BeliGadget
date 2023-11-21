<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_settings extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_shop_settings');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_shop_settings', $data);
    }
}

/* End of file M_settings.php */
