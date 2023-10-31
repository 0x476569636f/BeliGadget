<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Sliders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sliders');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Sliders',
            'sliders' => $this->m_sliders->get_all_data(),
            'content' => 'admin/v_sliders'
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    public function add()
    {
        $config['upload_path'] = './assets/sliders/'; // Relative path; make sure this directory exists
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2000';
        $this->upload->initialize($config);
        $field_name = "img";

        if ($this->upload->do_upload($field_name)) {
            // File upload was successful
            $upload_data = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/sliders/' . $upload_data['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'nama_slider' => $this->input->post('nama_slider'),
                'link' => $this->input->post('link'),
                'status' => $this->input->post('status'),
                'img' => $upload_data['file_name'], // Use 'file_name' directly
            );

            $this->m_sliders->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            redirect('sliders');
        } else {
            // If there's an error with the upload
            $data = array(
                'title' => 'Data Sliders',
                'sliders' => $this->m_sliders->get_all_data(),
                'error' => $this->upload->display_errors(),
                'content' => 'admin/v_sliders',
            );
            $this->load->view('admin/layout/wrapper', $data);
        }
    }

    public function update($id_slider)
    {
        $data = array(
            'id_slider' => $id_slider,
            'status' => $this->input->post('status'),
        );  

        $this->m_sliders->update($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Update !');
        redirect('sliders');
    }

    //Delete one item
    public function delete($id_slider = NULL)
    {
        // Hapus gambar
        $slider = $this->m_sliders->get_data($id_slider);
        if ($slider->img != "") {
            unlink('./assets/sliders/' . $slider->img);
        }
        //end
        $data = array('id_slider' => $id_slider);
        $this->m_sliders->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !');
        redirect('sliders');
    }
}


/* End of file Sliders.php */
