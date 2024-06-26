<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_settings');
        $this->load->model('m_getsumorders');
        $this->load->model('m_getstatsorders');
    }
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'settings' => $this->m_settings->get_data(),
            'sumorders_m' => $this->m_getsumorders->bulanini(),
            'sumorders_y' => $this->m_getsumorders->tahunini(),
            'sumorders'  => $this->m_getsumorders->semua(),
            'pending' => $this->m_getstatsorders->pending(),
            'success' => $this->m_getstatsorders->success(),
            'canceled' => $this->m_getstatsorders->canceled(),
            'content' => 'admin/v_dashboard'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function settings()
    {
        $this->form_validation->set_rules(
            'nama_toko',
            'Nama Toko',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'kota',
            'Kota',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'alamat_toko',
            'Alamat Toko',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Settings Toko',
                'settings' => $this->m_settings->get_data(),
                'content' => 'admin/v_settings'
            );
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'email' => $this->input->post('email'),
            );

            $this->m_settings->update($data);
            $this->session->set_flashdata('pesan', 'Berhasil Terupdate');
            redirect('admin/settings');
        }
    }
}


/* End of file admin.php */
