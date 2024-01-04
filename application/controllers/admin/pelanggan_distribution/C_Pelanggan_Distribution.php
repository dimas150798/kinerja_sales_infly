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

        $data['title'] = 'Kinerja Sales';

        $data['Jumlah_PelangganAktif'] = $this->M_DataSheets->Jumlah_PelangganAktif($this->session->userdata('KodePerolehan_Now'));
        $data['Jumlah_PelangganAktif_KBS'] = $this->M_DataSheets->Jumlah_PelangganAktif_KBS($this->session->userdata('KodePerolehan_Now'));
        $data['Jumlah_PelangganAktif_TRW'] = $this->M_DataSheets->Jumlah_PelangganAktif_TRW($this->session->userdata('KodePerolehan_Now'));
        $data['Jumlah_PelangganAktif_KNG'] = $this->M_DataSheets->Jumlah_PelangganAktif_Kanigaran($this->session->userdata('KodePerolehan_Now'));

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/pelanggan_distribution/V_Pelanggan_Distribution', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function GetDataAjax()
    {

        $result = $this->M_DataSheets->PelangganAktif($this->session->userdata('KodePerolehan_Now'));

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
                '<div class="text-center">
                    <a onclick="EditPelangganAktif(' . $dataCustomer['id_sheet'] . ')" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                </div>'
            );
            $data[] = $row;
        }

        $output = array('data' => $data);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
