<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_customerauth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_customerauth->customer_login($email, $password);
        if ($cek){
            $nama_customer = $cek->nama_customer;
            $email = $cek->email;
            $id = $cek->id_customer;

            // membuat session
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('nama_customer', $nama_customer);
            $this->ci->session->set_userdata('id_customer', $id);
            redirect('store');
        } else {
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
            redirect('customer/login'); 
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('customer/login'); 
        }
    }

    public function logout(){
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('nama_customer');
        $this->ci->session->unset_userdata('id_customer', $id);
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !');
        redirect('store'); 
    }

}

/* End of file Customer_login.php */
