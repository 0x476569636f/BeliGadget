<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_store');
        $this->load->model('m_sliders');
        $this->load->model('m_search');
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

    public function detail_product($id_product)
    {
        $data = array(
            'title' => 'Detail Product',
            'product' => $this->m_store->detail_product($id_product),
            'content' => 'customer/v_detail'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }

    public function search() {
        $search_title = $this->input->post('search_title');

    
        // Call a method in your model to get search results
        $data['products'] = $this->m_search->searchProducts($search_title);
        $data['title'] = $search_title;
        $data['content'] = 'customer/v_res';
        // Load your view
        $this->load->view('customer/layout/wrapper', $data);
    }
}

/* End of file Dashboard.php */
