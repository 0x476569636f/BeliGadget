<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Adminauth extends CI_Controller
{
    public function admin_login()
    {
        $this->load->library('form_validation');
        $this->load->model('m_adminauth');

        $this->set_validation_rules();

        if ($this->form_validation->run()) {
            $this->process_login();
        }

        $data = array(
            'title' => 'Login Admin',
        );

        $this->load->view('admin/v_admin_login', $data, false);
    }

    public function admin_logout()
    {
        $this->load->model('m_adminauth');
        $this->admin_login->logout();
    }

    private function set_validation_rules()
    {
        $validation_rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
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
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->admin_login->login($username, $password);
    }
}

/* End of file adminauth.php */
