<?php


class M_UpdatePerolehanKode extends CI_Model
{
    public function index()
    {
        $getData = $this->db->query("SELECT id_sheet, nama_customer, tanggal_instalasi, tanggal_customer
        FROM data_sheets ")->result_array();

        $UpdateData = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, nama_sales, keterangan, nama_dp, kode_perolehan
        FROM data_sheets
        
        ORDER BY id_sheet DESC")->result_array();

        foreach ($getData as $data) {
            foreach ($UpdateData as $update) {
                if ($data['id_sheet'] == $update['id_sheet']) {
                    $tanggal_perolehan = $data['tanggal_customer'];
                    $tanggal_instalasi = $data['tanggal_instalasi'];

                    // Check Tanggal Instalasi untuk Buat Kode Perolehan
                    $PecahTgl_Instalasi = $tanggal_instalasi ? explode("-", $tanggal_instalasi) : [null, null];
                    $KodePerolehan_Tgl_Instalasi = $PecahTgl_Instalasi[0] . '-' . $PecahTgl_Instalasi[1];

                    // Check Tanggal Perolehan untuk Buat Kode Perolehan
                    $PecahTgl_Perolehan = $tanggal_perolehan ? explode("-", $tanggal_perolehan) : [null, null];
                    $KodePerolehan_Tgl_Perolehan = $PecahTgl_Perolehan[0] . '-' . $PecahTgl_Perolehan[1];

                    // Gunakan KodePerolehan_Tgl_Perolehan jika Tanggal Instalasi NULL atau '0000-00-00', 
                    // atau gunakan KodePerolehan_Tgl_Instalasi jika Tanggal Instalasi tidak NULL dan bukan '0000-00-00'
                    $KodeAktif_New = ($tanggal_instalasi != NULL && $tanggal_instalasi != '0000-00-00' && $tanggal_instalasi != '')
                        ? $KodePerolehan_Tgl_Instalasi
                        : $KodePerolehan_Tgl_Perolehan;

                    $updateData = [
                        'kode_perolehan' => $KodeAktif_New
                    ];

                    // Memperbarui data
                    $this->db->where('id_sheet', $update['id_sheet']);
                    $this->db->update('data_sheets', $updateData);
                }
            }
        }
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
}
