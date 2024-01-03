<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_Edit_Pelanggan_Survey extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email') == null) {

            // Notifikasi Login Terlebih Dahulu
            $this->session->set_flashdata('BelumLogin_icon', 'error');
            $this->session->set_flashdata('BelumLogin_title', 'Login Terlebih Dahulu');

            redirect('C_FormLogin');
        }
    }

    public function EditPelanggan($id_sheet)
    {
        $data['DataPelanggan']  = $this->M_DataSheets->Edit_Sheets($id_sheet);

        $data['DataPegawai'] = $this->M_DataPegawai->Data_Pegawai();
        $data['DataPaket'] = $this->M_DataPaket->Data_Paket();
        $data['DataArea'] = $this->M_DataArea->Data_Area();
        $data['DataStatus'] = $this->M_DataStatus->Data_Status();
        $data['KodeSheets'] = $this->M_DataSheets->generateCode();

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/pelanggan_survey/V_Edit_Pelanggan_Survey', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function EditPelangganSave()
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

        $data['DataPegawai'] = $this->M_DataPegawai->Data_Pegawai();
        $data['DataPaket'] = $this->M_DataPaket->Data_Paket();
        $data['DataArea'] = $this->M_DataArea->Data_Area();
        $data['DataStatus'] = $this->M_DataStatus->Data_Status();
        $data['KodeSheets'] = $this->M_DataSheets->generateCode();

        date_default_timezone_set("Asia/Jakarta");

        // Mendapatkan tanggal sekarang
        $ToDay              = date('d-m-Y');
        $PecahToDay         = explode("-", $ToDay);
        $kode_perolehan     = $PecahToDay[2] . '-' . $PecahToDay[1];

        // Mengambil data post pada view
        $id_sheet = $this->input->post('id_sheet');
        $kode_sheets = $this->input->post('kode_sheets');
        $tanggal_customer = $this->input->post('tanggal_customer');
        $nama_customer = $this->input->post('nama_customer');
        $paket = $this->input->post('paket');
        $branch_customer = $this->input->post('branch_customer');
        $alamat_customer = $this->input->post('alamat_customer');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $status_customer = $this->input->post('status_customer');
        $tanggal_instalasi = $this->input->post('tanggal_instalasi');
        $nama_sales = $this->input->post('nama_sales');
        $keterangan = $this->input->post('keterangan');

        $Split_TanggalInstalasi = explode("-", $tanggal_instalasi);
        $Kode_Perolehan_TanggalInstalasi = $Split_TanggalInstalasi[0] . '-' . $Split_TanggalInstalasi[1];

        if ($Kode_Perolehan_TanggalInstalasi == '-') {
            $kode_perolehan_now = $kode_perolehan;
        } else {
            $kode_perolehan_now = $Kode_Perolehan_TanggalInstalasi;
        }

        $CheckCustomer           = $this->M_DataSheets->Check_Customer($kode_perolehan);

        // Menyimpan data pelanggan ke dalam array
        $dataSheets = array(
            'kode_sheet'       => $kode_sheets,
            'tanggal_customer'  => $tanggal_customer,
            'nama_customer'     => $nama_customer,
            'nama_paket'        => $paket,
            'branch_customer'   => $branch_customer,
            'alamat_customer'   => $alamat_customer,
            'email'             => $email,
            'telepon'           => $telepon,
            'status_customer'   => $status_customer,
            'tanggal_instalasi' => $tanggal_instalasi,
            'nama_sales'        => $nama_sales,
            'keterangan'        => $keterangan,
            'kode_perolehan'    => $kode_perolehan_now,
        );

        // Data Customer
        if ($CheckCustomer->kode_sheet != $kode_sheets) {
            $this->db->where('id_sheet', $id_sheet);
            $this->db->update('data_sheets', $dataSheets);
        }

        // Update Perolehan Perbulan dan Persales
        $this->M_DataPerolehanPerbulan->index();
        $this->M_DataPerolehanSales->index();

        // Notifikasi Tambah Data Berhasil
        $this->session->set_flashdata('Success_icon', 'success');
        $this->session->set_flashdata('Success_title', 'Edit Data Berhasil');

        redirect('admin/pelanggan_survey/C_Pelanggan_Survey');
    }
}
