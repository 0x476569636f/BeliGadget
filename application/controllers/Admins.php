<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admins extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admins');
    }

    public function index()
    {
        $data = array(
            'title' => 'Admins',
            'admin' => $this->m_admins->get_all_data(),
            'content' => 'admin/v_admins'
        );

        $this->load->view('admin/layout/wrapper', $data, false);
        
    }

    //Add new item
    public function add()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        );

        $this->m_admins->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !');
        redirect('admins');
    }

    //Update an item
    public function update($id_admin = NULL)
    {
        $data = array(
            'id_admin' => $id_admin,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' =>  md5($this->input->post('password')),

        );
        $this->m_admins->update($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Update !');
        redirect('admins');
    }

    //Delete an items
    public function delete($id_admin = null)
    {
        $data = array('id_admin' => $id_admin);
        $this->m_admins->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !');
        redirect('admins');
    }
}


/* End of file Admins.php */
