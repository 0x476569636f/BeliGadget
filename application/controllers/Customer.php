<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->model('m_customerauth');
    }

    public function register()
    {
        $this->form_validation->set_rules(
            'nama_customer',
            'Nama Lengkap',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'email',
            'E-mail',
            'required|is_unique[tbl_customers.email]',
            array(
                'required' => '%s Harus Di Isi !',
                'is_unique' => '%s Ini Sudah Terdaftar !'
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[8]',
            array(
                'required' => '%s Harus Di Isi !',
                'min_length' => '%s Minimal 8 Karakter'
            )
        );

        $this->form_validation->set_rules(
            'confirmpw',
            'Konfirmasi Password',
            'required|matches[password]',
            array(
                'required' => '%s Harus Di Isi !',
                'matches' => '%s Tidak Sama'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'content' => 'customer/v_register'
            );

            $this->load->view('customer/layout/wrapper', $data, false);
        } else {
            $data = array(
                'nama_customer' => $this->input->post('nama_customer'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
            );

            $this->m_customer->register($data);
            $this->session->set_flashdata('pesan', 'Registrasi Berhasil Silahkan Login !');
            redirect('customer/register');
        }
    }

    public function login()
    {
        $this->set_validation_rules();
        if ($this->form_validation->run()) {
            $this->process_login();
        }
        $data = array(
            'title' => 'Login Pelanggan',
            'content' => 'customer/v_login'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }

    public function dashboard()
    {
        $data = array(
            'title' => 'Dashboard Pelanggan',
            'content' => 'customer/v_dashboard'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }

    private function set_validation_rules()
    {
        $validation_rules = array(
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s Harus Di isi !'
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s Harus Di isi !'
                )
            )
        );
        $this->form_validation->set_rules($validation_rules);
    }

    private function process_login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $this->customer_login->login($email, $password);
    }

    public function logout()
    {
        $this->customer_login->logout();
    }
}

/* End of file Customer.php */
