<?php
if (!function_exists('changeDateFormat')) {
    function changeDateFormat($format = 'd-m-Y', $givenDate = null)
    {
        return date($format, strtotime($givenDate));
    }
}


defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_Pelanggan_Terminasi extends CI_Controller
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

            $BulanPerolehan = sprintf("%02d", $bulanGET);
            $KodePerolehan_Now = $tahunGET . '-' . $BulanPerolehan;

            $data['KodePerolehan_Now']           = $KodePerolehan_Now;
            $this->session->set_userdata('KodePerolehan_Now', $KodePerolehan_Now);

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

            $data['YearGET']   = NULL;
            $data['MonthGET']   = NULL;

            $data['Year']   = $PecahToDay[2];
            $data['Month']   = $PecahToDay[1];
        }

        $data['title'] = 'Kinerja Sales';

        $data['JumlahTerminasi_All'] = $this->M_DataTerminasi->JumlahPelangganTerminasi_All($this->session->userdata('KodePerolehan_Now'));
        $data['JumlahTerminasi_KBS'] = $this->M_DataTerminasi->JumlahPelangganTerminasi_KBS($this->session->userdata('KodePerolehan_Now'));
        $data['JumlahTerminasi_TRW'] = $this->M_DataTerminasi->JumlahPelangganTerminasi_TRW($this->session->userdata('KodePerolehan_Now'));
        $data['JumlahTerminasi_Kanigaran'] = $this->M_DataTerminasi->JumlahPelangganTerminasi_Kanigaran($this->session->userdata('KodePerolehan_Now'));

        // $API_KBS = $this->M_API_Terminasi->API_Kebonsari();

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/pelanggan_terminasi/V_Pelanggan_Terminasi', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function GetDataAjax()
    {

        $result = $this->M_DataTerminasi->Pelanggan_Terminasi($this->session->userdata('KodePerolehan_Now'));

        $no = 0;
        $data = array();

        foreach ($result as $dataCustomer) {
            $status_cs = $dataCustomer['status'] == 'Lebih Dari';

            $row = array(
                ++$no,
                $dataCustomer['nama_pelanggan'],
                $dataCustomer['nama_paket'],
                $dataCustomer['area'],
                $dataCustomer['nama_sales'],
                $status_cs ? '<span class="badge bg-success">>6 Month</span>' : '<span class="badge bg-danger"><6 Month</span>',
                $dataCustomer['telepon'],
                changeDateFormat('d-m-Y', $dataCustomer['tanggal_registrasi']),
                changeDateFormat('d-m-Y', $dataCustomer['tanggal_terminasi']),
                $dataCustomer['alamat_customer'],
                $dataCustomer['keterangan'],
                $dataCustomer['nama_dp'],
                '<div class="text-center">
                    <a onclick="EditPelangganSurvey(' . $dataCustomer['id_terminasi_sheets'] . ')" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                </div>'
            );
            $data[] = $row;
        }

        $output = array('data' => $data);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function UpdateData()
    {
        $this->M_API_Terminasi->API_Kebonsari();
        $this->M_API_Terminasi->API_Kanigaran();

        $this->M_UpdatePerolehanKode->index();
        $this->M_DataPerolehanPerbulan->index();
        $this->M_DataPerolehanSales->index();
        $this->M_DataPerolehanTerminasi->index();
        $this->M_SpreadsheetTerminasi->index();

        // Notifikasi 
        $this->session->set_flashdata('Success_icon', 'success');
        $this->session->set_flashdata('Success_title', 'Update Data Berhasil');

        // Redirect ke halaman index
        redirect($_SERVER['HTTP_REFERER']); // Mengarahkan pengguna kembali ke halaman sebelumnya
    }
}
