<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_store');
        $this->load->model('m_sliders');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard Customers',
            'product' => $this->m_store->get_all_data(),
            'category' => $this->m_store->get_all_data_category(),
            'slider' => $this->m_sliders->get_all_data_bystatus(),
            'content' => 'customer/v_index'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }

    public function brand($id)
    {
        $category = $this->m_store->category($id);
        $data = array(
            'title' => 'Gadget ' . $category->nama_brand,
            'product' => $this->m_store->get_all_product_baseonbrand($id),
            'content' => 'customer/v_brand'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }
}

/* End of file Dashboard.php */
