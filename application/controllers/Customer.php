<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->model('m_customerauth');
        $this->load->model('m_orders');
        $params = array('server_key' => 'SB-Mid-server-gBzBH8USgTUaGGBIA2jIIIQr', 'production' => false);
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
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

    public function account()
    {
        $this->form_validation->set_rules(
            'currentPassword',
            'Password Saat Ini',
            'required|min_length[8]|callback_check_current_password',
            array(
                'required' => '%s Harus Di Isi !',
                'min_length' => '%s Minimal 8 Karakter',
                'callback_check_current_password' => '%s Salah'
            )
        );

        $this->form_validation->set_rules(
            'newPassword',
            'Password Baru',
            'required|min_length[8]',
            array(
                'required' => '%s Harus Di Isi !',
                'min_length' => '%s Minimal 8 Karakter'
            )
        );

        $this->form_validation->set_rules(
            'confirmPassword',
            'Konfirmasi Password',
            'required|matches[newPassword]',
            array(
                'required' => '%s Harus Di Isi !',
                'matches' => '%s Tidak Sama'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Dashboard Pelanggan',
                'content' => 'customer/v_dashboard'
            );
    
            $this->load->view('customer/layout/wrapper', $data, false);
        } else {
            $data = array(
                'id_customer' => $this->session->userdata('id_customer'),
                'password' => md5($this->input->post('newPassword')),
            );

            $this->m_customer->update_password($data);
            $this->session->set_flashdata('pesan', 'Password Berhasil Di Update !');
            redirect('customer/account');
        }
    }

    public function check_current_password($currentPassword) {
        $user = $this->m_customer->get_customer_by_id($this->session->userdata('id_customer'));
    
        if (!$user || $user->password !== md5($currentPassword)) {
            $this->form_validation->set_message('check_current_password', 'Password saat ini salah');
            return FALSE;
        }
    
        return TRUE;
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

    public function my_orders()
    {
        $data = array(
            'title' => 'Pesanan Saya',
            'orders' => $this->m_orders->get_data_by_logged_id(),
            'content' => 'customer/v_my_orders'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }

    public function details_order($no_order)
    {
        $data = array(
            'title' => 'Pesanan Saya',
            'details' => $this->m_orders->get_details_order($no_order),
            'content' => 'customer/v_details_order'
        );

        $this->load->view('customer/layout/wrapper', $data, false);
    }

    // Midtrans
    public function token()
    {
        $no_order = $this->input->get('no_order');
        $grossamount = $this->input->get('grossamount');
        $nama = $this->input->get('nama');
        $alamat = $this->input->get('alamat');
        $no_hp = $this->input->get('no_hp');
        $datakeranjang = $this->m_orders->get_details_order($no_order);
        // Required
        $transaction_details = array(
            'order_id' => $no_order,
            'gross_amount' => (int)$grossamount, // no decimal allowed for creditcard
        );

        $item_details = array();
        
        foreach ($datakeranjang as $keranjang) {
            $item_details[] = array(
                'id' => $keranjang->id_product,
                'price' => $keranjang->price - ($keranjang->price * $keranjang->discount / 100),
                'quantity' => $keranjang->qty,
                'name' => $keranjang->product_name
            );
        }

        //Include ongkir
        $item_details[0]['price'] += $keranjang->ongkir;

        

        // // Optional
        // $item1_details = array(
        // 	'id' => 'a1',
        // 	'price' => (int)$grossamount,
        // 	'quantity' => 1,
        // 	'name' => "Apple"
        // );

        // // Optional
        // $item2_details = array(
        // 	'id' => 'a2',
        // 	'price' => 290000,
        // 	'quantity' => 2,
        // 	'name' => "Orange"
        // );

        // // Optional
        // $item_details = array($item1_details);

        // // Optional
        // $billing_address = array(
        // 	'first_name'    => "Andri",
        // 	'last_name'     => "Litani",
        // 	'address'       => "Mangga 20",
        // 	'city'          => "Jakarta",
        // 	'postal_code'   => "16602",
        // 	'phone'         => "081122334455",
        // 	'country_code'  => 'IDN'
        // );

        // // Optional
        $shipping_address = array(
            'first_name'    => $nama,
            'last_name'     => "",
            'address'       => $alamat,
            'city'          => "",
            'postal_code'   => "",
            'phone'         => $no_hp,
            'country_code'  => 'IDN'
        );

        // // Optional
        $customer_details = array(
            'first_name'    => $nama,
            'last_name'     => "",
            'email'         => "yangbeli@beligadget.com",
            'phone'         => $no_hp,
            'billing_address'  => $shipping_address,
            'shipping_address' => $shipping_address
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 1
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));
        $no_order = $result->order_id;
        $this->db->update('tbl_orders', ['status' => 1], ['no_order' => $no_order] );
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';
        redirect('customer/details_order/'.$no_order);
    }
}

/* End of file Customer.php */
