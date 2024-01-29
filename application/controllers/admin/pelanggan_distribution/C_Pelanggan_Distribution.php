<?php
if (!function_exists('changeDateFormat')) {
    function changeDateFormat($format = 'd-m-Y', $givenDate = null)
    {
        return date($format, strtotime($givenDate));
    }
}

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_Pelanggan_Distribution extends CI_Controller
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
        if (isset($_GET['tahun']) && $_GET['tahun'] !== '' && isset($_GET['bulan']) && $_GET['bulan'] !== '') {
            $tahunGET = $_GET['tahun'];
            $bulanGET = $_GET['bulan'];

            $BulanPerolehan_GET = sprintf("%02d", $bulanGET);
            $KodePerolehan_GET = $tahunGET . '-' . $BulanPerolehan_GET;

            $data['KodePerolehan_Now']           = $KodePerolehan_GET;

            $this->session->set_userdata('KodePerolehan_GET', $KodePerolehan_GET);
            $this->session->set_userdata('YearGET', $tahunGET);
            $this->session->set_userdata('BulantGET', $bulanGET);

            $data['YearGET']   = $tahunGET;
            $data['MonthGET']   = $bulanGET;
        } else {
            date_default_timezone_set("Asia/Jakarta");
            $ToDay = date('d-m-Y');

            $PecahToDay = explode("-", $ToDay);

            $BulanPerolehan = sprintf("%02d", $PecahToDay[1]);

            $KodePerolehan_Now = $PecahToDay[2] . '-' . $BulanPerolehan;

            $data['KodePerolehan_Now']           = $KodePerolehan_Now;

            $this->session->set_userdata('KodePerolehan_Now', $KodePerolehan_Now);
            $this->session->set_userdata('Year', $PecahToDay[2]);
            $this->session->set_userdata('Month', $PecahToDay[1]);

            $data['YearGET']   = NULL;
            $data['MonthGET']   = NULL;

            $data['Year']   = $PecahToDay[2];
            $data['Month']   = $PecahToDay[1];
        }

        $kodePerolehan = $this->session->userdata('KodePerolehan_GET') != NULL && $this->session->userdata('KodePerolehan_GET') != ''
            ? $this->session->userdata('KodePerolehan_GET')
            : $this->session->userdata('KodePerolehan_Now');

        $data['title'] = 'Kinerja Sales';

        $data['JumlahDistribution_All'] = $this->M_DataSheets->JumlahPelangganDistribution_All($kodePerolehan);
        $data['JumlahDistribution_KBS'] = $this->M_DataSheets->JumlahPelangganDistribution_KBS($kodePerolehan);
        $data['JumlahDistribution_TRW'] = $this->M_DataSheets->JumlahPelangganDistribution_TRW($kodePerolehan);
        $data['JumlahDistribution_Kanigaran'] = $this->M_DataSheets->JumlahPelangganDistribution_Kanigaran($kodePerolehan);
        $data['JumlahDistribution_Dringu'] = $this->M_DataSheets->JumlahPelangganDistribution_Dringu($kodePerolehan);

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/pelanggan_distribution/V_Pelanggan_Distribution', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function GetDataAjax()
    {

        $kodePerolehan = $this->session->userdata('KodePerolehan_GET') != NULL && $this->session->userdata('KodePerolehan_GET') != ''
            ? $this->session->userdata('KodePerolehan_GET')
            : $this->session->userdata('KodePerolehan_Now');

        $result = $this->M_DataSheets->PelangganDistribution($kodePerolehan);

        $no = 0;
        $data = array();

        foreach ($result as $dataCustomer) {
            $tanggal_instalasi = ($dataCustomer['tanggal_instalasi'] == NULL || $dataCustomer['tanggal_instalasi'] == '0000-00-00');

            $row = array(
                ++$no,
                $dataCustomer['nama_customer'],
                $dataCustomer['nama_paket'],
                $dataCustomer['branch_customer'],
                $dataCustomer['nama_sales'],
                $dataCustomer['status_customer'],
                $dataCustomer['telepon'],
                changeDateFormat('d-m-Y', $dataCustomer['tanggal_customer']),
                $tanggal_instalasi ? '<span class="badge bg-danger">Data Kosong</span>' : '<span class="badge bg-success">' . changeDateFormat('d-m-Y', $dataCustomer['tanggal_instalasi']) . '</span>',
                $dataCustomer['alamat_customer'],
                $dataCustomer['keterangan'],
                $dataCustomer['nama_dp'],
                '<div class="text-center">
                    <a onclick="EditPelangganDistribution(' . $dataCustomer['id_sheet'] . ')" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                </div>'
            );
            $data[] = $row;
        }

        $output = array('data' => $data);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
