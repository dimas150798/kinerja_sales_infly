<?php

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_Terminasi_Pertahun extends CI_Controller
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

            date_default_timezone_set("Asia/Jakarta");
            // Mendapatkan tanggal sekarang
            $ToDay              = date('d-m-Y');

            // Mendapatkan tanggal 1 bulan sebelumnya
            $DateOneMonthAgo    = date('d-m-Y', strtotime('-1 month', strtotime($ToDay)));

            // Memisahkan Tanggal Sekarang
            $PecahToDay         = explode("-", $ToDay);

            // Memisahkan Tanggal 1 Bulan sebelumnya
            $PecahOneMonthAgo   = explode("-", $DateOneMonthAgo);

            // Kode Perolehan Tanggal Sekarang
            $KodePerolehan_Now  = $PecahToDay[2] . '-' . $PecahToDay[1];

            // Kode Perolehan 1 Bulan Sebelumnnya
            $KodePerolehan      = $PecahOneMonthAgo[2] . '-' . $PecahOneMonthAgo[1];

            $data['PerolehanSales'] = $this->M_DataPerolehanSales->Perolehan_Sales_Terminasi($tahunGET);


            $data['DateNow'] = $ToDay;
            $data['YearGET']   = $tahunGET;
            $data['title'] = 'Kinerja Sales';


            $this->load->view('template/V_Header', $data);
            $this->load->view('template/V_Sidebar', $data);
            $this->load->view('admin/terminasi/V_Terminasi_Pertahun', $data);
            $this->load->view('template/V_Footer', $data);
        } else {
            date_default_timezone_set("Asia/Jakarta");
            // Mendapatkan tanggal sekarang
            $ToDay              = date('d-m-Y');

            // Mendapatkan tanggal 1 bulan sebelumnya
            $DateOneMonthAgo    = date('d-m-Y', strtotime('-1 month', strtotime($ToDay)));

            // Memisahkan Tanggal Sekarang
            $PecahToDay         = explode("-", $ToDay);

            // Memisahkan Tanggal 1 Bulan sebelumnya
            $PecahOneMonthAgo   = explode("-", $DateOneMonthAgo);

            // Kode Perolehan Tanggal Sekarang
            $KodePerolehan_Now  = $PecahToDay[2] . '-' . $PecahToDay[1];

            // Kode Perolehan 1 Bulan Sebelumnnya
            $KodePerolehan      = $PecahOneMonthAgo[2] . '-' . $PecahOneMonthAgo[1];

            $data['PerolehanSales'] = $this->M_DataPerolehanSales->Perolehan_Sales_Terminasi($PecahToDay[2]);


            $data['DateNow'] = $ToDay;
            $data['YearGET']   = NULL;

            $data['Year']   = $PecahToDay[2];
            $data['title'] = 'Kinerja Sales';

            $this->load->view('template/V_Header', $data);
            $this->load->view('template/V_Sidebar', $data);
            $this->load->view('admin/terminasi/V_Terminasi_Pertahun', $data);
            $this->load->view('template/V_Footer', $data);
        }
    }
}
