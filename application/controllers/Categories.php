<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_categories');
        

    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Kategori',
            'categories' => $this->m_categories->get_all_data(),
            'content' => 'admin/v_categories'
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_brand'=> $this->input->post('nama_brand'),
        );
        $this->m_categories->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !');
        redirect('categories');
    }

    //Update one item
    public function update($id = NULL)
    {
        $data = array(
            'id' => $id,
            'nama_brand' => $this->input->post('nama_brand'),
        );

        $this->m_categories->update($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Update !');
        redirect('categories');
    }

    //Delete one item
    public function delete($id = NULL)
    {
        $data = array(
            'id' => $id
        );
        $this->m_categories->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !');
        redirect('categories');
    }
}

/* End of file Category.php */
