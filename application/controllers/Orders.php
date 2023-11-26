<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_orders');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Orders',
            'orders' => $this->m_orders->get_all_data(),
            'content' => 'admin/v_orders'
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    public function details($no_order)
    {
        $data = array(
            'title' => $no_order,
            'details' => $this->m_orders->get_details_order($no_order),
            'content' => 'admin/v_details_orders'
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    public function inputresi($no_order)
    {
        $data = array(
            'no_order' => $no_order,
            'no_resi' => $this->input->post('no_resi'),
        );

        $this->m_orders->updateresi($data);
        $this->session->set_flashdata('pesan', 'Resi Berhasil Di Update !');

        redirect('orders/details/'.$no_order);
    }

    public function gantistatus($no_order)
    {
        $data = array(
            'no_order' => $no_order,
            'status' => $this->input->post('status'),
        );

        $this->m_orders->gantistatus($data);
        $this->session->set_flashdata('pesan', 'Status Berhasil Di Update !');

        redirect('orders/details/'.$no_order);
    }
}

/* End of file Orders.php */
