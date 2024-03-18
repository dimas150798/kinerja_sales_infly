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

        if (isset($_GET['tahun']) && $_GET['tahun'] !== '' && isset($_GET['bulan']) && $_GET['bulan'] !== '') {
            $tahunGET = $_GET['tahun'];
            $bulanGET = $_GET['bulan'];

            $BulanPerolehan = sprintf("%02d", $bulanGET);
            $KodePerolehan_Now = $tahunGET . '-' . $BulanPerolehan;

            $data['KodePerolehan_Now']           = $KodePerolehan_Now;

            $data['YearGET']   = $tahunGET;
            $data['MonthGET']   = $bulanGET;

            $data['Name_MonthGET']   = $months[$bulanGET];

            $this->session->set_userdata('KodePerolehan_Now', $KodePerolehan_Now);
        } else {
            date_default_timezone_set("Asia/Jakarta");
            $ToDay = date('d-m-Y');

            $PecahToDay = explode("-", $ToDay);

            $BulanPerolehan = sprintf("%02d", $PecahToDay[1]);

            $KodePerolehan_Now = $PecahToDay[2] . '-' . $BulanPerolehan;

            $data['KodePerolehan_Now']           = $KodePerolehan_Now;

            $data['YearGET']   = NULL;
            $data['MonthGET']   = NULL;

            $data['Year']   = $PecahToDay[2];
            $data['Month']   = ltrim($PecahToDay[1], '0');


            $data['Name_Month']   = $months[ltrim($PecahToDay[1], '0')];

            $this->session->set_userdata('KodePerolehan_Now', $KodePerolehan_Now);
        }

        $data['title'] = 'Kinerja Sales';

        $data['PerolehanSales'] = $this->M_DataPerolehanTerminasi->Perolehan_Sales_Terminasi_Perbulan($this->session->userdata('KodePerolehan_Now'));

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/terminasi/V_Terminasi_Perbulan', $data);
        $this->load->view('template/V_Footer', $data);
    }
}
