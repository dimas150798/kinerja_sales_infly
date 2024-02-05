<?php
if (!function_exists('changeDateFormat')) {
    function changeDateFormat($format = 'd-m-Y', $givenDate = null)
    {
        return date($format, strtotime($givenDate));
    }
}

ini_set('display_errors', 'Off');
ini_set('error_reporting', E_ALL);
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_Data_On_Net extends CI_Controller
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

        if ((isset($_GET['day']) && $_GET['day'] != '') && $_GET['area'] !== '') {
            $dayGET = $_GET['day'];
            $areaGET = $_GET['area'];

            $split_dayGET = explode("-", $dayGET);

            $this->session->set_userdata('Tanggal_Instalasi', $dayGET);
            $this->session->set_userdata('Area_Now', $areaGET);

            $data['DayGET']     = $dayGET;
            $data['YearGET']   = $split_dayGET['0'];
            $data['MonthGET']   = $split_dayGET['1'];
            $data['AreaGET']   = $areaGET;
        } else {
            date_default_timezone_set("Asia/Jakarta");
            $ToDay = date('Y-m-d');

            $PecahToDay = explode("-", $ToDay);

            $this->session->set_userdata('Tanggal_Instalasi', $ToDay);
            $this->session->set_userdata('Area_Now', 'KBS');

            $data['YearGET']   = NULL;
            $data['MonthGET']   = NULL;
            $data['AreaGET']   = NULL;

            $data['Day']    = $ToDay;
            $data['Year']   = $PecahToDay[2];
            $data['Month']   = $PecahToDay[1];
            $data['Area']   = 'KBS';
        }

        $data['title'] = 'Kinerja Sales';
        $data['DataArea']       = $this->M_DataArea->Data_Area();

        $data['DataPelaggan']   = $this->M_DataSheets->PelangganOnNet_Area($this->session->userdata('Tanggal_Instalasi'), $this->session->userdata('Area_Now'));

        $Check_ON_Net           = $this->M_DataSheets->Check_Pelanggan_On_Net($this->session->userdata('Tanggal_Instalasi'), $this->session->userdata('Area_Now'));

        $Tanggal_Schedule       = $Check_ON_Net->tanggal_instalasi;

        // Mengambil nama hari dalam Bahasa Indonesia
        $Nama_Hari = date('l', strtotime($Tanggal_Schedule));
        $Hari_Indo = '';

        // Mengonversi nama hari ke dalam Bahasa Indonesia
        switch ($Nama_Hari) {
            case 'Monday':
                $Hari_Indo = 'Senin';
                break;
            case 'Tuesday':
                $Hari_Indo = 'Selasa';
                break;
            case 'Wednesday':
                $Hari_Indo = 'Rabu';
                break;
            case 'Thursday':
                $Hari_Indo = 'Kamis';
                break;
            case 'Friday':
                $Hari_Indo = 'Jumat';
                break;
            case 'Saturday':
                $Hari_Indo = 'Sabtu';
                break;
            case 'Sunday':
                $Hari_Indo = 'Minggu';
                break;
        }

        $tanggal_schedule_display = empty($Tanggal_Schedule) || $Tanggal_Schedule == '0000-00-00'
            ? 'Data Kosong'
            : date('d F Y', strtotime($Tanggal_Schedule));

        $data['hari_schedule'] = $Hari_Indo;
        $data['tanggal_schedule'] = $tanggal_schedule_display;

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/pelanggan_on_net/V_Data_On_Net', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function GetDataAjax()
    {

        $result = $this->M_DataSheets->PelangganOnNet_Area($this->session->userdata('KodePerolehan_Now'), $this->session->userdata('Area_Now'));

        $no = 0;
        $data = array();

        foreach ($result as $dataCustomer) {
            $tanggal_instalasi = ($dataCustomer['tanggal_instalasi'] == NULL || $dataCustomer['tanggal_instalasi'] == '0000-00-00');

            $row = array(
                '<div class="text-center text-table">' . ++$no  . '</div>',
                '<div class="text-center text-table">' . $dataCustomer['nama_customer']  . '</div>',
                '<div class="text-center text-table">' . $dataCustomer['nama_paket']  . '</div>',
                '<div class="text-center text-table">' . $dataCustomer['branch_customer']  . '</div>',
                '<div class="text-center text-table">' . $dataCustomer['nama_sales']  . '</div>',
                '<div class="text-center text-table">' . changeDateFormat('d-m-Y', $dataCustomer['tanggal_customer'])  . '</div>',
                '<div class="text-center text-table">' . $tanggal_instalasi ? '<span class="badge bg-danger">Data Kosong</span>' : '<span class="badge bg-success">' . changeDateFormat('d-m-Y', $dataCustomer['tanggal_instalasi']) . '</span>'  . '</div>',
                '<div class="text-table">' . $dataCustomer['alamat_customer']  . '</div>',
                '<div class="text-center text-table">' . $dataCustomer['telepon']  . '</div>',
                '<div class="text-center text-table">' . $dataCustomer['keterangan']  . '</div>',
                '<div class="text-center">
                    <a onclick="EditPelangganOnNet(' . $dataCustomer['id_sheet'] . ')" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                </div>'
            );
            $data[] = $row;
        }

        $output = array('data' => $data);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
