<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_admins extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->order_by('id_admin', 'desc');
        return $this->db->get()->result();
    }
    
    public function is_username_exists($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('tbl_admin');

        return $query->num_rows() > 0;
    }


    public function add($data)
    {
        $this->db->insert('tbl_admin', $data);
    }

    public function update($data)
    {
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->update('tbl_admin', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->delete('tbl_admin', $data);
    }
}


/* End of file M_admins.php */
