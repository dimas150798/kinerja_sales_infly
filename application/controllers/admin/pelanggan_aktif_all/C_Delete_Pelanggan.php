<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_Delete_Pelanggan extends CI_Controller
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

    public function DeletePelanggan($id_sheet)
    {
        // Notifikasi Login Berhasil
        $this->session->set_flashdata('Success_icon', 'success');
        $this->session->set_flashdata('Success_title', 'Delete Data Berhasil');

        // Kondisi delete menggunakan id_customer
        $id_sheet = array(
            'id_sheet'       => $id_sheet
        );

        $this->M_CRUD->deleteData($id_sheet, 'data_sheets');

        // Update Perolehan Perbulan dan Persales
        $this->M_DataPerolehanPerbulan->index();
        $this->M_DataPerolehanSales->index();

        // Notifikasi Tambah Data Berhasil
        $this->session->set_flashdata('Success_icon', 'success');
        $this->session->set_flashdata('Success_title', 'Delete Data Berhasil');

        redirect('admin/pelanggan_aktif_all/C_Pelanggan_Aktif_All');
    }
}
