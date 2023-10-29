<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_products');
        $this->load->model('m_categories');
    }

    public function index()
    {
        $data = array(
            'title' => 'Produk',
            'products' => $this->m_products->get_all_data(),
            'content' => 'admin/products/v_products',
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    public function add()
    {
        $this->form_validation->set_rules(
            'title',
            'Nama Produk',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'nama_brand',
            'Nama Brand',
            'required',
            array('required' => '%s Harus Di Isi')
        );

        $this->form_validation->set_rules(
            'price',
            'Harga Produk',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'weight',
            'Berat',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'discount',
            'Diskon Produk',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'description',
            'Deskripsi Produk',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        if ($this->form_validation->run() == True) {
            $config['upload_path'] = './assets/products_img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "img";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Product',
                    'category' => $this->m_categories->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'content' => 'admin/products/v_add',
                );
                $this->load->view('admin/layout/wrapper', $data, false);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/products_img/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'title' => $this->input->post('title'),
                    'id_category' => $this->input->post('nama_brand'),
                    'price' => $this->input->post('price'),
                    'weight' => $this->input->post('weight'),
                    'discount' => $this->input->post('discount'),
                    'description' => $this->input->post('description'),
                    'img' => $upload_data['uploads']['file_name'],
                );
                $this->m_products->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil DI tambahkan !');
                redirect('products');
            }
        }
        $data = array(
            'title' => 'Add Product',
            'category' => $this->m_categories->get_all_data(),
            'content' => 'admin/products/v_add',
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    public function update($id_product = NULL)
    {
        $this->form_validation->set_rules(
            'title',
            'Nama Produk',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'nama_brand',
            'Nama Brand',
            'required',
            array('required' => '%s Harus Di Isi')
        );

        $this->form_validation->set_rules(
            'price',
            'Harga Produk',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'weight',
            'Berat',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'discount',
            'Diskon Produk',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        $this->form_validation->set_rules(
            'description',
            'Deskripsi Produk',
            'required',
            array('required' => '%s Harus Di Isi !')
        );

        if ($this->form_validation->run() == True) {
            $config['upload_path'] = './assets/products_img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "img";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Update Product',
                    'category' => $this->m_categories->get_all_data(),
                    'product' => $this->m_products->get_data($id_product),
                    'error_upload' => $this->upload->display_errors(),
                    'content' => 'admin/products/v_update',
                );
                $this->load->view('admin/layout/wrapper', $data, false);
            } else {
                $product = $this->m_products->get_data($id_product);
                if ($product->img != "") {
                    unlink('./assets/products_img/' . $product->img);
                }
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/products_img/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_product' => $id_product,
                    'title' => $this->input->post('title'),
                    'id_category' => $this->input->post('nama_brand'),
                    'price' => $this->input->post('price'),
                    'weight' => $this->input->post('weight'),
                    'discount' => $this->input->post('discount'),
                    'description' => $this->input->post('description'),
                    'img' => $upload_data['uploads']['file_name'],
                );
                $this->m_products->update($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Update !');
                redirect('products');
            }
        }
        $data = array(
            'title' => 'Update Product',
            'category' => $this->m_categories->get_all_data(),
            'product' => $this->m_products->get_data($id_product),
            'content' => 'admin/products/v_update',
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //Delete one item
    public function delete($id_product = NULL)
    {
        // Hapus gambar
        $product = $this->m_products->get_data($id_product);
        if ($product->img != "") {
            unlink('./assets/products_img/' . $product->img);
        }
        //end
        $data = array('id_product' => $id_product);
        $this->m_products->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !');
        redirect('products');
    }
}


/* End of file Products.php */
