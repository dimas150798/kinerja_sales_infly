<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_Edit_Pelanggan_On_Net extends CI_Controller
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
        $data['DataStatus'] = $this->M_DataStatus->DataStatus_OnNet();
        $data['KodeSheets'] = $this->M_DataSheets->generateCode();

        $this->load->view('template/V_Header', $data);
        $this->load->view('template/V_Sidebar', $data);
        $this->load->view('admin/pelanggan_on_net/V_Edit_Pelanggan_On_Net', $data);
        $this->load->view('template/V_Footer', $data);
    }

    public function EditPelangganSave()
    {
        $data['DataPegawai'] = $this->M_DataPegawai->Data_Pegawai();
        $data['DataPaket'] = $this->M_DataPaket->Data_Paket();
        $data['DataArea'] = $this->M_DataArea->Data_Area();
        $data['DataStatus'] = $this->M_DataStatus->Data_Status();
        $data['KodeSheets'] = $this->M_DataSheets->generateCode();

        $KodePerolehan_Session = $this->session->userdata('KodePerolehan_GET') != NULL && $this->session->userdata('KodePerolehan_GET') != ''
            ? $this->session->userdata('KodePerolehan_GET')
            : $this->session->userdata('KodePerolehan_Now');

        // Mengambil data post pada view
        $id_sheet = $this->input->post('id_sheet');
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
        $biaya_instalasi = $this->input->post('biaya_instalasi');
        $biaya_bundling = $this->input->post('biaya_bundling');
        $nama_dp = $this->input->post('nama_dp');

        // Check Tanggal Instalasi Buat Kode Perolehan
        $TanggalInstalasi               = empty($tanggal_instalasi) ? null : $tanggal_instalasi;
        $PecahTgl_Instalasi             = explode("-", $TanggalInstalasi);
        $KodePerolehan_Tgl_Instalasi    = $PecahTgl_Instalasi[0] . '-' . $PecahTgl_Instalasi[1];

        $KodePerolehan_New              = empty($TanggalInstalasi) ? $KodePerolehan_Session : $KodePerolehan_Tgl_Instalasi;

        $CheckCustomer                  = $this->M_DataSheets->Check_Customer($KodePerolehan_New);


        // Menyimpan data pelanggan ke dalam array
        $dataSheets = array(
            'tanggal_customer'  => $tanggal_customer,
            'nama_customer'     => $nama_customer,
            'nama_paket'        => $paket,
            'branch_customer'   => $branch_customer,
            'alamat_customer'   => $alamat_customer,
            'email'             => $email,
            'telepon'           => $telepon,
            'status_customer'   => $status_customer,
            'tanggal_instalasi' => $TanggalInstalasi,
            'nama_sales'        => $nama_sales,
            'keterangan'        => $keterangan,
            'nama_dp'           => $nama_dp,
            'kode_perolehan'    => $KodePerolehan_New,
            'biaya_instalasi'   => $biaya_instalasi,
            'biaya_bundling'    => $biaya_bundling,
        );

        // Data Customer
        $this->db->where('id_sheet', $id_sheet);
        $this->db->update('data_sheets', $dataSheets);

        // Update Perolehan Perbulan dan Persales
        $this->M_DataPerolehanPerbulan->index();
        $this->M_DataPerolehanSales->index();

        // Notifikasi Tambah Data Berhasil
        $this->session->set_flashdata('Success_icon', 'success');
        $this->session->set_flashdata('Success_title', 'Edit Data Berhasil');

        redirect('admin/pelanggan_on_net/C_Pelanggan_On_Net');
    }
}
