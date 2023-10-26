<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'content' => 'admin/v_dashboard'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* End of file admin.php */
