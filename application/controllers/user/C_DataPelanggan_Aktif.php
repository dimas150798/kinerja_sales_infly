<?php

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_DataPelanggan_Aktif extends CI_Controller
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
        }

        $data['title'] = 'Kinerja Sales';


        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('user/V_DataPelanggan_Aktif', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function GetDataAjax()
    {

        $result = $this->M_DataSheets->PelangganAktif($this->session->userdata('KodePerolehan_Now'));

        $no = 0;
        $data = array();

        foreach ($result as $dataCustomer) {
            $row = array(
                ++$no,
                $dataCustomer['tanggal_customer'],
                $dataCustomer['nama_customer'],
                $dataCustomer['nama_paket'],
                $dataCustomer['branch_customer'],
                $dataCustomer['alamat_customer'],
                $dataCustomer['nama_sales'],
                '<div class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" data-bs-target="#dropdown" aria-expanded="false" aria-controls="dropdown">
                            Opsi
                        </button>
                        <div class="dropdown-menu text-black" style="background-color:aqua;">
                            <a onclick="EditDataPelanggan(' . $dataCustomer['id_sheet'] . ')" class="dropdown-item text-black">Edit</a>
                            <a onclick="TerminatedPelanggan(' . $dataCustomer['id_sheet'] . ')" class="dropdown-item text-black"><i class="bi bi-trash3-fill"></i> Terminated</a>
                        </div>
                    </div>
                </div>'
            );
            $data[] = $row;
        }

        $output = array('data' => $data);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function reports_sales()
    {
        $data = $this->M_DataPerolehan->getData();
        echo json_encode($data);
    }

    public function reports_status()
    {
        date_default_timezone_set("Asia/Jakarta");
        $toDay = date('Y-m-d');

        // Memisahkan Tanggal Sekarang
        $pecahDayNow = explode("-", $toDay);

        $data['tahunNow']   = $pecahDayNow[0];
        $data['bulanNow']   = $pecahDayNow[1];
        $data['tanggalNow'] = $pecahDayNow[2];

        $KodePerolehan_Now          = $pecahDayNow[0] . '-' . $pecahDayNow[1];


        $data = $this->M_Spreadsheet->GetAllDataSheet($KodePerolehan_Now);
        echo json_encode($data);
    }


    public function getTopSelling()
    {
        date_default_timezone_set("Asia/Jakarta");
        $toDay = date('Y-m-d');

        // Memisahkan Tanggal
        $pecahDay       = explode("-", $toDay);

        $tahun          = $pecahDay[0];
        $bulan          = $pecahDay[1];

        $result = $this->M_Spreadsheet->DataTopSelling($tahun, $bulan);

        $no = 0;

        foreach ($result as $dataCustomer) {
            $row = array();
            $row[] = '<div class="text-center">' . ++$no . '</div>';
            $row[] = '<div class="text-center">' . $dataCustomer['nama_sales'] . '</div>';
            $row[] = '<div class="text-center">' . $dataCustomer['jumlah'] . '</div>';
            $data[] = $row;
        }

        $ouput = array(
            'data' => $data
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($ouput));
    }
}
