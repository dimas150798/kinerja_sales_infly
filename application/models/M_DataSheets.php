<?php


class M_DataSheets extends CI_Model
{

    public function TotalPelangganAktif($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet FROM data_sheets
        WHERE status_customer = 'active' AND kode_perolehan = '$KodePerolehan' ");

        return $query->num_rows();
    }

    public function TotalPelangganAktif_KBS($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet FROM data_sheets
        WHERE status_customer = 'active' AND branch_customer = 'KBS' AND kode_perolehan = '$KodePerolehan' ");

        return $query->num_rows();
    }

    public function TotalPelangganAktif_TRW($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet FROM data_sheets
        WHERE status_customer = 'active' AND branch_customer = 'TRW' AND kode_perolehan = '$KodePerolehan' ");

        return $query->num_rows();
    }

    public function TotalPelangganAktif_KNG($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet FROM data_sheets
        WHERE status_customer = 'active' AND branch_customer = 'Kanigaran' AND kode_perolehan = '$KodePerolehan' ");

        return $query->num_rows();
    }

    public function TotalPelangganAktif_DRG($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet FROM data_sheets
        WHERE status_customer = 'active' AND branch_customer = 'DRINGU' AND kode_perolehan = '$KodePerolehan' ");

        return $query->num_rows();
    }

    public function Pelanggan_All($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
        FROM data_sheets

        WHERE kode_perolehan = '$KodePerolehan'
        
        ORDER BY id_sheet DESC");

        return $query->result_array();
    }

    public function PelangganAktif($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, 
        telepon, status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
        FROM data_sheets

        WHERE status_customer = 'active' AND kode_perolehan = '$KodePerolehan'
        
        ORDER BY id_sheet DESC");

        return $query->result_array();
    }

    // Jumlah Data Pelanggan Berstatus active All
    public function JumlahPelangganAktif_All($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
        FROM data_sheets

        WHERE status_customer = 'active' AND kode_perolehan = '$KodePerolehan'
        
        ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus active KBS
    public function JumlahPelangganAktif_KBS($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
            FROM data_sheets
    
            WHERE status_customer = 'active' AND branch_customer = 'KBS' AND kode_perolehan = '$KodePerolehan' 
            
            ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus active TRW
    public function JumlahPelangganAktif_TRW($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
            FROM data_sheets
    
            WHERE status_customer = 'active' AND branch_customer = 'TRW' AND kode_perolehan = '$KodePerolehan' 
            
            ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus active Kanigaran
    public function JumlahPelangganAktif_Kanigaran($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
            FROM data_sheets
    
            WHERE status_customer = 'active' AND branch_customer = 'Kanigaran' AND kode_perolehan = '$KodePerolehan' 
            
            ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus active Dringu
    public function JumlahPelangganAktif_Dringu($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
                FROM data_sheets
        
                WHERE status_customer = 'active' AND branch_customer = 'DRINGU' AND kode_perolehan = '$KodePerolehan' 
                
                ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Data Pelanggan Berstatus Survey
    public function PelangganSurvey($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
        FROM data_sheets
        
        WHERE status_customer = 'survey' AND kode_perolehan = '$KodePerolehan'
        
        ORDER BY id_sheet DESC");

        return $query->result_array();
    }

    // Jumlah Data Pelanggan Berstatus Survey All
    public function JumlahPelangganSurvey_All($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
            nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
            status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
            FROM data_sheets
            
            WHERE status_customer = 'survey' AND kode_perolehan = '$KodePerolehan'
            
            ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus Survey KBS
    public function JumlahPelangganSurvey_KBS($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                FROM data_sheets

                WHERE status_customer = 'survey' AND branch_customer = 'KBS' AND kode_perolehan = '$KodePerolehan'

                ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Pelanggan Berstatus Survey TRW
    public function JumlahPelangganSurvey_TRW($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                    nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                    status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                    FROM data_sheets
    
                    WHERE status_customer = 'survey' AND branch_customer = 'TRW' AND kode_perolehan = '$KodePerolehan'
    
                    ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Pelanggan Berstatus Survey Kanigaran
    public function JumlahPelangganSurvey_Kanigaran($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                        FROM data_sheets
        
                        WHERE status_customer = 'survey' AND branch_customer = 'Kanigaran' AND kode_perolehan = '$KodePerolehan'
        
                        ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Pelanggan Berstatus Survey Dringu
    public function JumlahPelangganSurvey_Dringu($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                            nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                            status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                            FROM data_sheets
            
                            WHERE status_customer = 'survey' AND branch_customer = 'DRINGU' AND kode_perolehan = '$KodePerolehan'
            
                            ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    public function PelangganOnNet($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer,
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
        FROM data_sheets
        
        WHERE status_customer = 'on net' AND kode_perolehan = '$KodePerolehan'
        
        ORDER BY id_sheet DESC");

        return $query->result_array();
    }

    // Jumlah Data Pelanggan Berstatus On Net All
    public function JumlahPelangganOnNet_All($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                FROM data_sheets
                
                WHERE status_customer = 'on net' AND kode_perolehan = '$KodePerolehan'
                
                ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus On Net Kebonsari
    public function JumlahPelangganOnNet_KBS($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                    nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                    status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                    FROM data_sheets
                    
                    WHERE status_customer = 'on net' AND branch_customer = 'KBS' AND kode_perolehan = '$KodePerolehan'
                    
                    ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus On Net Triwung
    public function JumlahPelangganOnNet_TRW($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                        FROM data_sheets
                        
                        WHERE status_customer = 'on net' AND branch_customer = 'TRW' AND kode_perolehan = '$KodePerolehan'
                        
                        ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus On Net Kanigaran
    public function JumlahPelangganOnNet_Kanigaran($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                            nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                            status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                            FROM data_sheets
                            
                            WHERE status_customer = 'on net' AND branch_customer = 'Kanigaran' AND kode_perolehan = '$KodePerolehan'
                            
                            ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus On Net Dringu
    public function JumlahPelangganOnNet_Dringu($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                                nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                                status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                                FROM data_sheets
                                
                                WHERE status_customer = 'on net' AND branch_customer = 'DRINGU' AND kode_perolehan = '$KodePerolehan'
                                
                                ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    public function PelangganOnNet_Area($Tanggal_Instalasi, $Branch_Customer)
    {
        $query   = $this->db->query("SELECT 
        data_sheets.id_sheet, 
        data_sheets.kode_sheet, 
        data_sheets.tanggal_customer, 
        data_sheets.nama_customer, 
        data_sheets.nama_paket, 
        data_sheets.branch_customer, 
        data_sheets.alamat_customer, 
        data_sheets.email, 
        data_sheets.telepon, 
        data_sheets.status_customer, 
        data_sheets.tanggal_instalasi, 
        data_sheets.nama_sales, 
        data_sheets.keterangan, 
        data_sheets.nama_dp,
        data_sheets.kode_perolehan, 
        data_sheets.biaya_instalasi,
        data_sheets.biaya_bundling,
        data_paket.harga_paket,
    FORMAT(SUM(COALESCE(data_paket.harga_paket, 0) + COALESCE(data_sheets.biaya_instalasi, 0) + COALESCE(data_sheets.biaya_bundling, 0)), 0) AS total
    
    FROM 
        data_sheets
    LEFT JOIN 
        data_paket ON data_sheets.nama_paket = data_paket.nama_paket
    WHERE 
        data_sheets.status_customer = 'on net' 
        AND data_sheets.tanggal_instalasi = '$Tanggal_Instalasi' 
        AND data_sheets.branch_customer = '$Branch_Customer'
        AND data_sheets.tanggal_instalasi != ''

        GROUP BY 
        data_sheets.id_sheet, 
        data_sheets.kode_sheet, 
        data_sheets.tanggal_customer, 
        data_sheets.nama_customer, 
        data_sheets.nama_paket, 
        data_sheets.branch_customer, 
        data_sheets.alamat_customer, 
        data_sheets.email, 
        data_sheets.telepon, 
        data_sheets.status_customer, 
        data_sheets.tanggal_instalasi, 
        data_sheets.nama_sales, 
        data_sheets.keterangan, 
        data_sheets.kode_perolehan, 
        data_sheets.biaya_instalasi,
        data_sheets.biaya_bundling
    ORDER BY 
        data_sheets.id_sheet DESC");

        return $query->result_array();
    }

    public function Check_Pelanggan_On_Net($Tanggal_Instalasi, $Branch_Customer)
    {

        $result   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
        FROM data_sheets
        
        WHERE status_customer = 'on net' AND tanggal_instalasi = '$Tanggal_Instalasi' AND branch_customer = '$Branch_Customer'
        
        ORDER BY id_sheet DESC ");

        return $result->row();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }


    // Data Pelanggan Distribution
    public function PelangganDistribution($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer,
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
        FROM data_sheets
        
        WHERE status_customer = 'need distribution' AND kode_perolehan = '$KodePerolehan'
        
        ORDER BY id_sheet DESC");

        return $query->result_array();
    }

    // Jumlah Data Pelanggan Berstatus Need Distribution All
    public function JumlahPelangganDistribution_All($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                FROM data_sheets
                
                WHERE status_customer = 'need distribution' AND kode_perolehan = '$KodePerolehan'
                
                ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus Need Distribution KBS
    public function JumlahPelangganDistribution_KBS($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                    nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                    status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                    FROM data_sheets
                    
                    WHERE status_customer = 'need distribution' AND branch_customer = 'KBS' AND kode_perolehan = '$KodePerolehan'
                    
                    ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus Need Distribution TRW
    public function JumlahPelangganDistribution_TRW($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                        FROM data_sheets
                        
                        WHERE status_customer = 'need distribution' AND branch_customer = 'TRW' AND kode_perolehan = '$KodePerolehan'
                        
                        ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus Need Distribution Kanigaran
    public function JumlahPelangganDistribution_Kanigaran($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                        FROM data_sheets
                        
                        WHERE status_customer = 'need distribution' AND branch_customer = 'Kanigaran' AND kode_perolehan = '$KodePerolehan'
                        
                        ORDER BY id_sheet DESC");

        return $query->num_rows();
    }

    // Jumlah Data Pelanggan Berstatus Need Distribution Dringu
    public function JumlahPelangganDistribution_Dringu($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
                            nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon,
                            status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
                            FROM data_sheets
                            
                            WHERE status_customer = 'need distribution' AND branch_customer = 'DRINGU' AND kode_perolehan = '$KodePerolehan'
                            
                            ORDER BY id_sheet DESC");

        return $query->num_rows();
    }




    public function GetDataSheet($tahun, $bulan)
    {
        $query = $this->db->query("SELECT id_sheet, kode_sheet, tanggal, nama_customer, nama_paket, branch, alamat, status, sales, month_cust, year_cust

        FROM data_sheet

        WHERE status = 'active' AND  nama_customer != '' 
        AND year_cust = '$tahun' AND month_cust = '$bulan'");

        return $query->result_array();
    }

    public function GetAllDataSheet($KodePerolehan)
    {
        $query = $this->db->query("SELECT status_customer, COUNT(*) as jumlah_customer
        FROM data_sheets
        WHERE nama_customer != '' 
        AND kode_perolehan = '$KodePerolehan'
        GROUP BY status_customer;");

        return $query->result_array();
    }

    public function DataTopSelling($tahun, $bulan)
    {
        $query = $this->db->query("SELECT
        nama_sales,
        COUNT(nama_customer) AS jumlah
    FROM
        data_sheets
    WHERE
        status_customer = 'active'
        AND nama_customer != ''
        AND SUBSTRING(kode_perolehan, 1, 4) = '$tahun' -- Mengambil 4 karakter pertama sebagai tahun
        AND SUBSTRING(kode_perolehan, 6, 2) = '$bulan' -- Mengambil 2 karakter setelah karakter ke-5 sebagai bulan
    GROUP BY
        nama_sales
    ORDER BY
        jumlah DESC;");

        return $query->result_array();
    }

    public function JumlahNewData($KodePerolehan)
    {

        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales, kode_perolehan

        FROM data_sheets

        WHERE status_customer = 'active' AND  nama_customer != '' 
        AND kode_perolehan = '$KodePerolehan'
        ");

        return $query->num_rows();
    }

    public function JumlahData($KodePerolehan)
    {

        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales, kode_perolehan

        FROM data_sheets

        WHERE status_customer = 'active' AND  nama_customer != '' 
        AND kode_perolehan = '$KodePerolehan'
        ");

        return $query->num_rows();
    }

    public function JumlahNewKBS($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales

        FROM data_sheets

        WHERE status_customer = 'active' AND  nama_customer != '' AND branch_customer = 'KBS'
        AND kode_perolehan = '$KodePerolehan'");

        return $query->num_rows();
    }

    public function JumlahKBS($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales

        FROM data_sheets

        WHERE status_customer = 'active' AND  nama_customer != '' AND branch_customer = 'KBS'
        AND kode_perolehan = '$KodePerolehan'");

        return $query->num_rows();
    }

    public function JumlahNewTRW($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales

        FROM data_sheets

        WHERE status_customer = 'active' AND  nama_customer != '' AND branch_customer = 'TRW'
        AND kode_perolehan = '$KodePerolehan'");

        return $query->num_rows();
    }

    public function JumlahTRW($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales

        FROM data_sheets

        WHERE status_customer = 'active' AND  nama_customer != '' AND branch_customer = 'TRW'
        AND kode_perolehan = '$KodePerolehan'");

        return $query->num_rows();
    }

    public function JumlahNewKanigaran($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales

        FROM data_sheets

        WHERE status_customer = 'active' AND  nama_customer != '' AND branch_customer = 'Kanigaran'
        AND kode_perolehan = '$KodePerolehan'");

        return $query->num_rows();
    }

    public function JumlahKanigaran($KodePerolehan)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales

        FROM data_sheets

        WHERE status_customer = 'active' AND  nama_customer != '' AND branch_customer = 'Kanigaran'
        AND kode_perolehan = '$KodePerolehan'");

        return $query->num_rows();
    }

    public function getLastSequenceNumber()
    {
        $year = date("Y");
        $month = date("m");

        $query = $this->db->query("SELECT MAX(SUBSTRING(kode_sheet, 14, 4)) AS last_number
        FROM data_sheets
        WHERE SUBSTRING(kode_sheet, 6, 4) = '$year' AND SUBSTRING(kode_sheet, 11, 2) = '$month'");
        $row = $query->row();

        if ($row->last_number !== null) {
            // Jika data ditemukan, kembalikan nilai terakhir + 1
            return (int)substr($row->last_number, -4);
        } else {
            // Jika data tidak ada, mulai dari 0
            return 0;
        }
    }

    public function generateCode()
    {
        $year = date("Y");
        $month = date("m");

        // Mendapatkan nomor urut terakhir dari database
        $lastNumber = $this->getLastSequenceNumber();

        // Membuat nomor urut baru dengan panjang tetap 4 digit
        $newNumber = sprintf('%04d', $lastNumber + 1);

        // Menggabungkan semua elemen untuk membentuk kode akhir
        $code = 'CUST/' . $year . '/' . $month . '/' . $newNumber;

        return $code;
    }

    public function Check_Customer($KodePerolehan)
    {

        $result   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer, nama_paket, branch_customer, alamat_customer, status_customer, nama_sales FROM data_sheets
        WHERE kode_sheet = '$KodePerolehan';
        ");

        return $result->row();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function Edit_Sheets($id_sheet)
    {
        $query   = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, nama_customer,
        nama_paket, branch_customer, alamat_customer, email, telepon, nama_sales, kode_perolehan, 
        status_customer, tanggal_instalasi, tanggal_terminasi, keterangan, nama_dp, biaya_instalasi, biaya_bundling
        FROM data_sheets

        WHERE id_sheet = '$id_sheet'
        
        ORDER BY tanggal_customer DESC");

        return $query->result_array();
    }
}
