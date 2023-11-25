<?php


defined('BASEPATH') or exit('No direct script access allowed');


class Rajaongkir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_settings');
    }
    private $api_key = '9efc95c9adffc30eb74bff28c6accdf8';

    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            // print_r($array_response['rajaongkir']['results'])
            $data_provinsi = $array_response['rajaongkir']['results'];
            echo "<option value=''>-- PILIH PROVINSI --</option>";
            foreach ($data_provinsi as $key => $value) {
                echo "<option value='" . $value['province_id'] . "," . $value['province'] . "' id_provinsi='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
            }
        }
    }

    public function kota()
    {
        $provinsi_terpilih = $this->input->post('id_provinsi');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $provinsi_terpilih,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            // print_r($array_response['rajaongkir']['results'])
            $data_kota = $array_response['rajaongkir']['results'];
            foreach ($data_kota as $key => $value) {
                echo "<option value='" . $value['city_id'] . "," . $value['city_name'] ." " . $value['type'] ."'>" . $value['type'] . " " . $value['city_name'] . "</option>";
            }
        }
    }


    public function checkongkir()
    {
        $lokasi_toko = $this->m_settings->get_data()->lokasi;
        $destinasi = $this->input->post('destination');
        $courier = $this->input->post('courier');
        $weight = $this->input->post('weight');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$lokasi_toko&destination=$destinasi&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->api_key
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);

            $service = $array_response['rajaongkir']['results'][0]['costs'];
            
            if (!empty($array_response['rajaongkir']['results'])) {
                foreach ($service as $value) {
                    echo "<input class='form-check-input' type='radio' name='cost' id='value" . $value['service'] . "' value='" . $value['service'] . "' ongkir='" . $value['cost'][0]['value'] . "'>";
                    echo "<label class='form-check-label font-weight-normal mr-5' for='value" . $value['service'] . "' >" . "(" . $value['service'] . ")" . " " . $value['description'] . " Rp. " . $value['cost'][0]['value'] . "</label>";
                }
            } else {
                echo "<p>Ups Ada Yang Salah, Pastikan Sudah Mengisi Provinsi dan Kota</p>";
            }
        }
    }
}


/* End of file Rajaongkir.php */
