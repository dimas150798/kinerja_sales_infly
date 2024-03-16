<?php

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_Terminasi_Perbulan extends CI_Controller
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

            // Menambahkan 0 di depan bulan jika kurang dari 10
            $BulanPerolehan = sprintf("%02d", $bulanGET);

            date_default_timezone_set("Asia/Jakarta");
            // Mendapatkan tanggal sekarang
            $ToDay              = date('d-m-Y');

            // Memisahkan Tanggal Sekarang
            $PecahToDay         = explode("-", $ToDay);

            // Kode Perolehan Tanggal Sekarang
            $KodePerolehan_Now  = $tahunGET . '-' . $BulanPerolehan;

            $data['PerolehanSales'] = $this->M_DataPerolehanTerminasi->Perolehan_Sales_Terminasi_Perbulan($KodePerolehan_Now);

            $data['DateNow'] = $ToDay;
            $data['YearGET']   = $tahunGET;
            $data['MonthGET']   = $bulanGET;
            $data['Name_MonthGET']   = $months[(int)$bulanGET];
            $data['title'] = 'Kinerja Sales';

            $data['Name_Month'] = $months[(int)$bulanGET];

            $this->load->view('template/V_Header', $data);
            $this->load->view('template/V_Sidebar', $data);
            $this->load->view('admin/terminasi/V_Terminasi_Perbulan', $data);
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

            // Menambahkan 0 di depan bulan jika kurang dari 10
            $BulanPerolehan = sprintf("%02d", $PecahToDay[1]);

            // Kode Perolehan Tanggal Sekarang
            $KodePerolehan_Now  = $PecahToDay[2] . '-' . $BulanPerolehan;

            $data['PerolehanSales'] = $this->M_DataPerolehanTerminasi->Perolehan_Sales_Terminasi_Perbulan($KodePerolehan_Now);

            $data['DateNow'] = $ToDay;
            $data['YearGET']   = NULL;
            $data['MonthGET']   = NULL;

            $data['Year']   = $PecahToDay[2];
            $data['Month']   = $PecahToDay[1];
            $data['Name_Month']   = $months[(int)$PecahToDay[1]];
            $data['title'] = 'Kinerja Sales';

            $data['Name_Month'] = $months[(int)$PecahToDay[1]];

            $this->load->view('template/V_Header', $data);
            $this->load->view('template/V_Sidebar', $data);
            $this->load->view('admin/terminasi/V_Terminasi_Perbulan', $data);
            $this->load->view('template/V_Footer', $data);
        }
    }
}
