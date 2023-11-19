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
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'name'    => $this->input->post('name'),
            'price'   => $this->input->post('price'),
        );

        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }
}
