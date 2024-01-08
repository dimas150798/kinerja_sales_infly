<?php

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_JumlahPersales_Perbulan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email') == null) {

            // Notifikasi Login Terlebih Dahulu
            $this->session->set_flashdata('LoginGagal_icon', 'error');
            $this->session->set_flashdata('LoginGagal_title', 'Login Terlebih Dahulu');

            redirect('C_FormLogin');
        }
    }

    public function index()
    {

        if ((isset($_GET['tahun']) && $_GET['tahun'] != '') && (isset($_GET['bulan']) && $_GET['bulan'] != '')) {
            $tahunGET                   = $_GET['tahun'];
            $bulanGET                   = $_GET['bulan'];

            // Menambahkan 0 di depan bulan jika kurang dari 10
            $bulanPerolehan = sprintf("%02d", $bulanGET);

            $months = array(
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            );

            date_default_timezone_set("Asia/Jakarta");

            // Kode Perolehan Tanggal Sekarang
            $KodePerolehan_Now  = $tahunGET . '-' . $bulanPerolehan;

            $data['PerolehanSales'] = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Perbulan($KodePerolehan_Now);

            $data['YearGET']   = $tahunGET;
            $data['MonthGET']   = $months[$bulanGET];
            $data['title'] = 'Kinerja Sales';

            $data['Name_Month'] = $months[(int)$bulanGET];

            $this->load->view('template/V_Header', $data);
            $this->load->view('template/V_Sidebar', $data);
            $this->load->view('admin/pelanggan_aktif/V_JumlahPersales_Perbulan', $data);
            $this->load->view('template/V_Footer', $data);
        } else {
            date_default_timezone_set("Asia/Jakarta");
            // Mendapatkan tanggal sekarang
            $ToDay              = date('d-m-Y');

            $months = array(
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            );

            // Memisahkan Tanggal Sekarang
            $PecahToDay         = explode("-", $ToDay);

            // Kode Perolehan Tanggal Sekarang
            $KodePerolehan_Now  = $PecahToDay[2] . '-' . $PecahToDay['1'];


            $data['PerolehanSales'] = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Perbulan($KodePerolehan_Now);


            $data['DateNow'] = $ToDay;
            $data['YearGET']   = NULL;
            $data['MonthGET']   = NULL;

            $data['Year']   = $PecahToDay[2];
            $data['Month']   = $months[(int)$PecahToDay[1]];
            $data['title'] = 'Kinerja Sales';

            $data['Name_Month'] = $months[(int)$PecahToDay[1]];

            $this->load->view('template/V_Header', $data);
            $this->load->view('template/V_Sidebar', $data);
            $this->load->view('admin/pelanggan_aktif/V_JumlahPersales_Perbulan', $data);
            $this->load->view('template/V_Footer', $data);
        }
    }
}
