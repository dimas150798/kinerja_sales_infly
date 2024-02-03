<?php

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_DashboardAdmin extends CI_Controller
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
        $this->M_UpdatePerolehanKode->index();
        $this->M_DataPerolehanPerbulan->index();
        $this->M_DataPerolehanSales->index();
        $this->M_DataPerolehanTerminasi->index();
        $this->M_SpreadsheetTerminasi->index();

        date_default_timezone_set("Asia/Jakarta");

        $today      = date('Y-m-d');
        $todayYmd   = date('Y-m-d', strtotime($today));

        // Memisahkan Tanggal Sekarang
        $pecahToday = explode("-", $today);

        $months = array(
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        );

        // Menambahkan 0 di depan bulan jika kurang dari 10
        $bulanPerolehan = sprintf("%02d", $pecahToday[1]);

        // Mendapatkan tanggal 1 bulan sebelumnya
        $dateOneMonthAgo = date('d-m-Y', strtotime('-1 month', strtotime($todayYmd)));
        $pecahBefore = explode("-", $dateOneMonthAgo);
        $bulanBefore = sprintf("%02d", $pecahBefore[1]);

        if (date('d', strtotime($todayYmd)) == 31) {
            // Ambil tanggal terakhir bulan sebelumnya
            $dateOneMonthAgo = date('d-m-Y', strtotime('last day of previous month', strtotime($todayYmd)));
        }

        // Memisahkan Tanggal 1 Bulan sebelumnya
        $pecahOneMonthAgo = explode("-", $dateOneMonthAgo);

        // Kode Perolehan Tanggal Sekarang
        $kodePerolehanNow = $pecahToday[0] . '-' . $pecahToday[1];

        // Kode Perolehan 1 Bulan Sebelumnnya
        $kodePerolehan = $pecahOneMonthAgo[2] . '-' . $pecahOneMonthAgo[1];

        // Data Tanggal Sekarang
        $data['TotalPelangganAll_Now']  = $this->M_DataSheets->TotalPelangganAktif($kodePerolehanNow);
        $data['TotalPelangganKBS_Now']  = $this->M_DataSheets->TotalPelangganAktif_KBS($kodePerolehanNow);
        $data['TotalPelangganTRW_Now']  = $this->M_DataSheets->TotalPelangganAktif_TRW($kodePerolehanNow);
        $data['TotalPelangganKNG_Now']  = $this->M_DataSheets->TotalPelangganAktif_KNG($kodePerolehanNow);
        $data['TotalPelangganDRG_Now']  = $this->M_DataSheets->TotalPelangganAktif_DRG($kodePerolehanNow);

        // Data Tanggal 1 Bulan Sebelumnya
        $data['TotalPelangganAll_Before']  = $this->M_DataSheets->TotalPelangganAktif($kodePerolehan);
        $data['TotalPelangganKBS_Before']  = $this->M_DataSheets->TotalPelangganAktif_KBS($kodePerolehan);
        $data['TotalPelangganTRW_Before']  = $this->M_DataSheets->TotalPelangganAktif_TRW($kodePerolehan);
        $data['TotalPelangganKNG_Before']  = $this->M_DataSheets->TotalPelangganAktif_KNG($kodePerolehan);
        $data['TotalPelangganDRG_Before']  = $this->M_DataSheets->TotalPelangganAktif_DRG($kodePerolehan);

        $data['PerolehanSales']         = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Perbulan($kodePerolehanNow);

        // Perolehan Rangked Perbulan Terminasi
        $data['PerolehanSalesPerbulan'] = $this->M_DataPerolehanTerminasi->Perolehan_Sales_Terminasi_Perbulan($kodePerolehanNow);

        // Perolehan Rangked Pertahun Terminasi
        $data['PerolehanSalesPertahun'] = $this->M_DataPerolehanTerminasi->Perolehan_Sales_Terminasi_Pertahun('2023');

        // Check Detail Perolehan Aktif
        $CheckPerolehan_Now     = $this->M_DataPerolehanSales->Check_Perolehan_Aktif($kodePerolehanNow);
        $CheckPerolehan_Before  = $this->M_DataPerolehanSales->Check_Perolehan_Aktif($kodePerolehan);

        $data['DateNow']        = date('d-m-Y');
        $data['DateBefore']     = $dateOneMonthAgo;
        $data['MonthNow']       = $months[(int)$bulanPerolehan];
        $data['MonthBefore']    = $months[(int)$bulanBefore];
        $data['Year']           = date('Y');
        $data['YearBefore']     = $pecahBefore['2'];
        $data['DatePoint_Now']      = date('d F Y', strtotime($CheckPerolehan_Now->tanggal_aktif));
        $data['DatePoint_Before']      = date('d F Y', strtotime($CheckPerolehan_Before->tanggal_aktif));


        $data['title']      = 'Kinerja Sales';

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/V_DashboardAdmin', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function ChartMonthBefore()
    {
        date_default_timezone_set("Asia/Jakarta");

        $today = date('Y-m-d');
        $beforeYmd = date('Y-m-d', strtotime($today));

        // Mendapatkan tanggal 1 bulan sebelumnya
        $dateOneMonthAgo = date('d-m-Y', strtotime('-1 month', strtotime($beforeYmd)));

        if (date('d', strtotime($beforeYmd)) == 31) {
            // Ambil tanggal terakhir bulan sebelumnya
            $dateOneMonthAgo = date('d-m-Y', strtotime('last day of previous month', strtotime($todayYmd)));
        }

        // Memisahkan Tanggal 1 Bulan sebelumnya
        $pecahOneMonthAgo = explode("-", $dateOneMonthAgo);

        // Kode Perolehan 1 Bulan Sebelumnnya
        $kodePerolehan = $pecahOneMonthAgo[2] . '-' . $pecahOneMonthAgo[1];

        $data = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Perbulan($kodePerolehan);

        $chartData = array(
            'categories' => array(),
            'data' => array(),
        );

        foreach ($data as $row) {
            $chartData['categories'][] = $row['nama_sales'];
            $chartData['data'][] = (int)$row['perolehan_sales_aktif'];
        }

        echo json_encode($chartData, JSON_NUMERIC_CHECK);
    }

    public function ChartMonthNow()
    {
        date_default_timezone_set("Asia/Jakarta");

        $today = date('Y-m-d');

        // Memisahkan Tanggal Sekarang
        $pecahToday = explode("-", $today);

        // Kode Perolehan Tanggal Sekarang
        $kodePerolehanNow = $pecahToday[0] . '-' . $pecahToday[1];

        $data = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Perbulan($kodePerolehanNow);

        $chartData = array(
            'categories' => array(),
            'data' => array(),
        );

        foreach ($data as $row) {
            $chartData['categories'][] = $row['nama_sales'];
            $chartData['data'][] = (int)$row['perolehan_sales_aktif'];
        }

        echo json_encode($chartData, JSON_NUMERIC_CHECK);
    }

    public function ChartDateNow()
    {
        date_default_timezone_set("Asia/Jakarta");

        $today = date('Y-m-d');

        $data = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Tanggal($today);

        $chartData = array(
            'categories' => array(),
            'data' => array(),
        );

        foreach ($data as $row) {
            $chartData['categories'][] = $row['nama_sales'];
            $chartData['data'][] = (int)$row['perolehan_sales_aktif'];
        }

        echo json_encode($chartData, JSON_NUMERIC_CHECK);
    }

    public function ChartDateBefore()
    {
        date_default_timezone_set("Asia/Jakarta");

        $today = date('Y-m-d');
        $beforeYmd = date('Y-m-d', strtotime($today));

        // Mendapatkan tanggal 1 bulan sebelumnya
        $dateOneMonthAgo = date('Y-m-d', strtotime('-1 month', strtotime($beforeYmd)));

        if (date('d', strtotime($beforeYmd)) == 31) {
            // Ambil tanggal terakhir bulan sebelumnya
            $dateOneMonthAgo = date('Y-m-d', strtotime('last day of previous month', strtotime($todayYmd)));
        }


        $data = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Tanggal($dateOneMonthAgo);

        $chartData = array(
            'categories' => array(),
            'data' => array(),
        );

        foreach ($data as $row) {
            $chartData['categories'][] = $row['nama_sales'];
            $chartData['data'][] = (int)$row['perolehan_sales_aktif'];
        }

        echo json_encode($chartData, JSON_NUMERIC_CHECK);
    }

    public function DasboardAdmin_V2()
    {
        $this->M_UpdatePerolehanKode->index();
        $this->M_DataPerolehanPerbulan->index();
        $this->M_DataPerolehanSales->index();
        $this->M_DataPerolehanTerminasi->index();
        $this->M_SpreadsheetTerminasi->index();

        date_default_timezone_set("Asia/Jakarta");

        $today = date('Y-m-d');
        $todayYmd = date('Y-m-d', strtotime($today));

        // Memisahkan Tanggal Sekarang
        $pecahToday = explode("-", $today);

        $months = array(
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        );

        // Menambahkan 0 di depan bulan jika kurang dari 10
        $bulanPerolehan = sprintf("%02d", $pecahToday[1]);

        // Mendapatkan tanggal 1 bulan sebelumnya
        $dateOneMonthAgo = date('d-m-Y', strtotime('-1 month', strtotime($todayYmd)));

        if (date('d', strtotime($todayYmd)) == 31) {
            // Ambil tanggal terakhir bulan sebelumnya
            $dateOneMonthAgo = date('d-m-Y', strtotime('last day of previous month', strtotime($todayYmd)));
        }

        // Memisahkan Tanggal 1 Bulan sebelumnya
        $pecahOneMonthAgo = explode("-", $dateOneMonthAgo);

        // Kode Perolehan Tanggal Sekarang
        $kodePerolehanNow = $pecahToday[0] . '-' . $pecahToday[1];

        // Kode Perolehan 1 Bulan Sebelumnnya
        $kodePerolehan = $pecahOneMonthAgo[2] . '-' . $pecahOneMonthAgo[1];

        // Data Tanggal Sekarang
        $data['TotalPelangganAll_Now']  = $this->M_DataSheets->TotalPelangganAktif($kodePerolehanNow);
        $data['TotalPelangganKBS_Now']  = $this->M_DataSheets->TotalPelangganAktif_KBS($kodePerolehanNow);
        $data['TotalPelangganTRW_Now']  = $this->M_DataSheets->TotalPelangganAktif_TRW($kodePerolehanNow);
        $data['TotalPelangganKNG_Now']  = $this->M_DataSheets->TotalPelangganAktif_KNG($kodePerolehanNow);

        // Data Tanggal 1 Bulan Sebelumnya
        $data['TotalPelangganAll_Before']  = $this->M_DataSheets->TotalPelangganAktif($kodePerolehan);
        $data['TotalPelangganKBS_Before']  = $this->M_DataSheets->TotalPelangganAktif_KBS($kodePerolehan);
        $data['TotalPelangganTRW_Before']  = $this->M_DataSheets->TotalPelangganAktif_TRW($kodePerolehan);
        $data['TotalPelangganKNG_Before']  = $this->M_DataSheets->TotalPelangganAktif_KNG($kodePerolehan);

        $data['PerolehanSales']         = $this->M_DataPerolehanSales->Perolehan_Sales_Active_Perbulan($kodePerolehanNow);

        // Perolehan Rangked Perbulan Terminasi
        $data['PerolehanSalesPerbulan'] = $this->M_DataPerolehanTerminasi->Perolehan_Sales_Terminasi_Perbulan($kodePerolehanNow);

        // Perolehan Rangked Pertahun Terminasi
        $data['PerolehanSalesPertahun'] = $this->M_DataPerolehanTerminasi->Perolehan_Sales_Terminasi_Pertahun(date('Y'));

        $data['DateNow']    = date('d-m-Y');
        $data['MonthNow']   = $months[(int)$bulanPerolehan];
        $data['Year']       = date('Y');
        $data['title']      = 'Kinerja Sales';

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/V_DashboardAdmin_V2', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function get_terminated_customers()
    {
        date_default_timezone_set("Asia/Jakarta");

        $today = date('Y-m-d');

        // Memisahkan Tanggal Sekarang
        $pecahToday = explode("-", $today);

        // Kode Perolehan Tanggal Sekarang
        $MONTH  = $pecahToday[1];
        $YEAR   = $pecahToday[0];

        // Load the model
        // Get the sales name from the POST data
        $salesName = $this->input->post('salesName');

        // Fetch terminated customers from the model
        $terminatedCustomers = $this->M_DataSheets->Pelanggan_Terminasi($YEAR, $MONTH, $salesName);
        // Generate HTML for terminated customers

        $months = array(
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        );

        $html = "<div>";
        foreach ($terminatedCustomers as $customer) {


            $html .= "<div class='ct_terminasi'><i class='bi bi-exclamation-triangle-fill'></i> {$customer['nama_pelanggan']} <br> (berlangganan : {$customer['jumlah_month']} Bulan)</div>";
            $html .= "<div class='ad_terminasi'><i class=''></i>{$customer['alamat_customer']} </div>";
        }
        $html .= "</div>";

        // Return the HTML to be displayed in the AJAX response
        echo $html;
    }
}
