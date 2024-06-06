<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_orders');
        $this->load->model('m_settings');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Orders',
            'orders' => $this->m_orders->get_all_data(),
            'settings' => $this->m_settings->get_data(),
            'content' => 'admin/v_orders'
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    public function details($no_order)
    {
        $data = array(
            'title' => $no_order,
            'details' => $this->m_orders->get_details_order($no_order),
            'settings' => $this->m_settings->get_data(),
            'content' => 'admin/v_details_orders'
        );

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    public function inputresi($no_order)
    {
        $data = array(
            'no_order' => $no_order,
            'no_resi' => $this->input->post('no_resi'),
        );

        $this->m_orders->updateresi($data);
        $this->session->set_flashdata('pesan', 'Resi Berhasil Di Update !');

        redirect('orders/details/' . $no_order);
    }

    public function gantistatus($no_order)
    {
        $data = array(
            'no_order' => $no_order,
            'status' => $this->input->post('status'),
        );

        $this->m_orders->gantistatus($data);
        $this->session->set_flashdata('pesan', 'Status Berhasil Di Update !');

        redirect('orders/details/' . $no_order);
    }

    public function exportpdf($no_order)
    {
        $data = array(
            'title' => 'Pesanan Saya',
            'details' => $this->m_orders->get_details_order($no_order),
            'content' => 'customer/v_details_order'
        );
        $sroot      = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/beligadget/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();

        $this->load->view('invoice/invoice-pdf', $data);

        $paper_size  = 'A4'; // ukuran kertas 
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF 
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("invoice-$no_order.pdf", array('Attachment' => 0));
    }
}

/* End of file Orders.php */