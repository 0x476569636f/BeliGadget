<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Shopping extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => 'Keranjang',
            'content' => 'customer/v_shopping'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'name'    => $this->input->post('name'),
            'price'   => $this->input->post('price'),
            'discount' => $this->input->post('discount'),
            'weight' => $this->input->post('weight'),
            'img' => $this->input->post('img'),
        );

        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('shopping');
    }
}
