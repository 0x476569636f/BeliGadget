<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customers');
        $this->load->model('m_settings');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pelanggan',
            'customers' => $this->m_customers->get_all_data(),
            'settings' => $this->m_settings->get_data(),
            'content' => 'admin/v_customers'
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //Delete an items
    public function delete($id_customer = null)
    {
        $data = array('id_customer' => $id_customer);
        $this->m_customers->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !');
        redirect('customers');
    }

}

/* End of file Costumers.php */
