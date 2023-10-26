<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_adminauth');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_adminauth->admin_login($username, $password);
        if ($cek){
            $nama = $cek->nama;
            $username = $cek->username;

            // membuat session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama', $nama);
            redirect('admin');
        } else {
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
            redirect('adminauth/admin_login'); 
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('adminauth/admin_login'); 
        }
    }

    public function logout(){
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !');
        redirect('adminauth/admin_login'); 
    }

}

/* End of file Admin_login.php */
