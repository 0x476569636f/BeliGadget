<?php


defined('BASEPATH') or exit('No direct script access allowed');
class M_search extends CI_Model
{
    public function searchProducts($search_title)
    {
        // Add more conditions as needed
        $this->db->like('title', $search_title);
        $query = $this->db->get('tbl_products');

        return $query->result();
    }
}


/* End of file search.php */
