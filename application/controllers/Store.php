<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_store');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard Customers',
            'product' => $this->m_store->get_all_data(),
            'category' => $this->m_store->get_all_data_category(),
            'content' => 'customer/v_index'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }

    public function brand($id)
    {
        $category = $this->m_store->category($id);
        $data = array(
            'title' => 'Brand Gadget',
            'product' => $this->m_store->get_all_product_baseonbrand($id),
            'content' => 'customer/v_brand'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }
}

/* End of file Dashboard.php */
