<?php

$months = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');


class M_DataTerminasi extends CI_Model
{
    public function Pelanggan_Terminasi($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_terminasi_sheets, kode_terminasi_sheets, 
        nama_pelanggan, tanggal_registrasi, tanggal_terminasi, nama_sales, nama_paket, 
        telepon, alamat_customer, area, keterangan, nama_dp, jumlah_month, 
        status, kode_terminasi FROM terminasi_sheets

        WHERE kode_terminasi = '$KodePerolehan'
        
        ORDER BY id_terminasi_sheets DESC");

        return $query->result_array();
    }

    // Jumlah Data Pelanggan Berstatus terminated All
    public function JumlahPelangganTerminasi_All($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_terminasi_sheets, kode_terminasi_sheets, 
        nama_pelanggan, tanggal_registrasi, tanggal_terminasi, nama_sales, nama_paket, 
        telepon, alamat_customer, area, keterangan, nama_dp, jumlah_month, 
        status, kode_terminasi FROM terminasi_sheets
        
        WHERE kode_terminasi = '$KodePerolehan'
        
        ORDER BY id_terminasi_sheets DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus terminated KBS
    public function JumlahPelangganTerminasi_KBS($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_terminasi_sheets, kode_terminasi_sheets, 
        nama_pelanggan, tanggal_registrasi, tanggal_terminasi, nama_sales, nama_paket, 
        telepon, alamat_customer, area, keterangan, nama_dp, jumlah_month, 
        status, kode_terminasi FROM terminasi_sheets
        
        WHERE kode_terminasi = '$KodePerolehan' AND area = 'KBS'
        
        ORDER BY id_terminasi_sheets DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus terminated TRW
    public function JumlahPelangganTerminasi_TRW($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_terminasi_sheets, kode_terminasi_sheets, 
            nama_pelanggan, tanggal_registrasi, tanggal_terminasi, nama_sales, nama_paket, 
            telepon, alamat_customer, area, keterangan, nama_dp, jumlah_month, 
            status, kode_terminasi FROM terminasi_sheets
            
            WHERE kode_terminasi = '$KodePerolehan' AND area = 'TRW'
            
            ORDER BY id_terminasi_sheets DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus terminated Kanigaran
    public function JumlahPelangganTerminasi_Kanigaran($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_terminasi_sheets, kode_terminasi_sheets, 
                nama_pelanggan, tanggal_registrasi, tanggal_terminasi, nama_sales, nama_paket, 
                telepon, alamat_customer, area, keterangan, nama_dp, jumlah_month, 
                status, kode_terminasi FROM terminasi_sheets
                
                WHERE kode_terminasi = '$KodePerolehan' AND area = 'Kanigaran'
                
                ORDER BY id_terminasi_sheets DESC");

        return $query->num_rows();
    }
}
