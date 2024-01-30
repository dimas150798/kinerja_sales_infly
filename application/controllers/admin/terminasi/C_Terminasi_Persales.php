<?php
if (!function_exists('changeDateFormat')) {
    function changeDateFormat($format = 'd-m-Y', $givenDate = null)
    {
        return date($format, strtotime($givenDate));
    }
}


defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_Terminasi_Persales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email') == null) {

            // Notifikasi Login Terlebih Dahulu
            $this->session->set_flashdata('LoginGagal_icon', 'error');
            $this->session->set_flashdata('LoginGagal_title', 'Login Terlebih Dahulu');
            $this->session->sess_start();

            redirect('C_FormLogin');
        }
    }

    public function ShowPelanggan($id_pegawai)
    {
        date_default_timezone_set("Asia/Jakarta");
        // Mendapatkan tanggal sekarang
        $ToDay              = date('d-m-Y');

        // Memisahkan Tanggal Sekarang
        $PecahToDay         = explode("-", $ToDay);

        // Menambahkan 0 di depan bulan jika kurang dari 10
        $BulanPerolehan = sprintf("%02d", $PecahToDay[1]);

        // Kode Perolehan Tanggal Sekarang
        $KodeTerminasi          = $PecahToDay[2] . '-' . $BulanPerolehan;
        $IdSales                = $id_pegawai;

        $data['nama_pelanggan'] = $this->M_DataTerminasi->PelangganTerminasi_Persales($KodeTerminasi, $IdSales);

        $this->session->set_userdata('KodeTerminasi', $KodeTerminasi);
        $this->session->set_userdata('IdSales', $IdSales);

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/terminasi/V_Terminasi_Persales', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function GetDataAjax()
    {
        $result = $this->M_DataTerminasi->PelangganTerminasi_Persales($this->session->userdata('KodeTerminasi'), $this->session->userdata('IdSales'));

        $no = 0;
        $data = array();

        foreach ($result as $dataCustomer) {
            $row = array(
                ++$no,
                $dataCustomer['nama_pelanggan'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket'],
                $dataCustomer['nama_paket']
            );
            $data[] = $row;
        }

        $output = array('data' => $data);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
