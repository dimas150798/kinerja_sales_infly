<?php

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_JumlahPersales_Pertahun extends CI_Controller
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

        if ((isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $tahunGET                   = $_GET['tahun'];

            $data['PerolehanSales'] = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Pertahun($tahunGET);

            $data['YearGET']   = $tahunGET;
            $data['title'] = 'Kinerja Sales';

            $this->load->view('template/V_Header', $data);
            $this->load->view('template/V_Sidebar', $data);
            $this->load->view('admin/pelanggan_aktif/V_JumlahPersales_Pertahun', $data);
            $this->load->view('template/V_Footer', $data);
        } else {
            date_default_timezone_set("Asia/Jakarta");
            // Mendapatkan tanggal sekarang
            $ToDay              = date('d-m-Y');

            // Memisahkan Tanggal Sekarang
            $PecahToDay         = explode("-", $ToDay);

            $data['PerolehanSales'] = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Pertahun($PecahToDay[2]);

            $data['DateNow'] = $ToDay;
            $data['YearGET']   = NULL;
            $data['MonthGET']   = NULL;

            $data['Year']   = $PecahToDay[2];
            $data['title'] = 'Kinerja Sales';

            $this->load->view('template/V_Header', $data);
            $this->load->view('template/V_Sidebar', $data);
            $this->load->view('admin/pelanggan_aktif/V_JumlahPersales_Pertahun', $data);
            $this->load->view('template/V_Footer', $data);
        }
    }
}
