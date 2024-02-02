<?php

class M_DataPerolehanSales extends CI_Model
{
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $toDay = date('Y-m-d');

        // Memisahkan Tanggal
        $pecahDay       = explode("-", $toDay);

        $KodePerolehanDate = $pecahDay[0] . '-' . $pecahDay[1];

        $DataSheet = $this->db->query("SELECT
            nama_sales,
            kode_perolehan,
            COUNT(*) AS perolehan_sales_all,
            SUM(CASE WHEN status_customer = 'active' THEN 1 ELSE 0 END) AS perolehan_sales_aktif
        FROM
            data_sheets
            WHERE kode_perolehan = '$KodePerolehanDate' AND nama_sales != ''
        GROUP BY
            nama_sales,
            kode_perolehan
        ")->result_array();

        foreach ($DataSheet as $dataSheet) {
            $KodePerolehan      = $dataSheet['kode_perolehan'];
            $NamaSales          = $dataSheet['nama_sales'];
            $Perolehan_Sales_All    = $dataSheet['perolehan_sales_all'];
            $Perolehan_Sales_Aktif   = $dataSheet['perolehan_sales_aktif'];

            // Periksa apakah data sudah ada di tabel perolehan_sales
            $existingData = $this->db->get_where('perolehan_sales', [
                'kode_perolehan_sales'  => $KodePerolehan,
                'nama_sales'            => $NamaSales
            ])->row_array();

            if ($existingData) {
                // Jika data sudah ada, lakukan pembaruan
                $this->db->where('id_perolehan_sales', $existingData['id_perolehan_sales']);
                $this->db->update('perolehan_sales', [
                    'kode_perolehan_sales' => $KodePerolehan,
                    'perolehan_sales_all' => $Perolehan_Sales_All,
                    'perolehan_sales_aktif' => $Perolehan_Sales_Aktif,
                    'nama_sales' => $NamaSales,
                ]);
            } else {
                // Jika data belum ada, lakukan penyisipan
                $this->db->insert('perolehan_sales', [
                    'kode_perolehan_sales' => $KodePerolehan,
                    'perolehan_sales_all' => $Perolehan_Sales_All,
                    'perolehan_sales_aktif' => $Perolehan_Sales_Aktif,
                    'nama_sales' => $NamaSales,
                ]);
            }
        }
    }

    public function Perolehan_Sales_Active_Perbulan($KodePerolehan)
    {
        $query = $this->db->query("SELECT perolehan_sales.id_perolehan_sales, perolehan_sales.kode_perolehan_sales, perolehan_sales.perolehan_sales_all, perolehan_sales_aktif, UPPER(perolehan_sales.nama_sales) as nama_sales FROM perolehan_sales

        LEFT JOIN data_pegawai ON perolehan_sales.nama_sales = data_pegawai.nama_pegawai

        WHERE kode_perolehan_sales = '$KodePerolehan' AND perolehan_sales_aktif != 0
        GROUP BY nama_sales

        ORDER BY perolehan_sales_aktif DESC;");

        return $query->result_array();
    }

    public function Perolehan_Sales_Active_Pertahun($KodePerolehan)
    {
        $query = $this->db->query("SELECT
        nama_sales,
        SUBSTRING(kode_perolehan_sales, 1, 4) AS tahun,
        SUM(perolehan_sales_aktif) AS perolehan_sales_aktif,
        SUM(COALESCE(perolehan_sales_terminasi_6Month_Plus, 0)) AS LebihDari_6Bulan,
        SUM(COALESCE(perolehan_sales_terminasi_6Month_Minus, 0)) AS KurangDari_6Bulan,
        SUM(COALESCE(perolehan_sales_terminasi, 0)) AS total_terminasi,
        (SUM(COALESCE(perolehan_sales_terminasi, 0)) / SUM(COALESCE(perolehan_sales_aktif, 1))) * 100 AS persentase_terminasi
    FROM
        perolehan_sales
    LEFT JOIN
        data_pegawai ON perolehan_sales.nama_sales = data_pegawai.nama_pegawai 
    WHERE
        SUBSTRING(kode_perolehan_sales, 1, 4) = '$KodePerolehan' AND
        nama_sales != '' AND
        data_pegawai.status = 'Aktif' AND
        data_pegawai.jabatan = 'Sales'
    GROUP BY
        nama_sales  
    ORDER BY
        persentase_terminasi ASC, perolehan_sales_aktif DESC;");

        return $query->result_array();
    }

    public function Check_Perolehan($KodePerolehan, $NamaSales)
    {

        $result   = $this->db->query("SELECT kode_perolehan_sales, perolehan_sales_all, perolehan_sales_aktif, nama_sales FROM perolehan_sales
        WHERE kode_perolehan_sales = '$KodePerolehan' AND nama_sales = '$NamaSales';
        ");

        return $result->row();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function getData()
    {
        $query = $this->db->query("SELECT id_perolehan, kode_perolehan, jumlah_perolehan, nama_bulan
        FROM perolehan_perbulan
        WHERE kode_perolehan >= DATE_FORMAT(CURRENT_DATE, '%Y-%m')
           OR kode_perolehan >= DATE_FORMAT(DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH), '%Y-%m')
           OR kode_perolehan >= DATE_FORMAT(DATE_SUB(CURRENT_DATE, INTERVAL 2 MONTH), '%Y-%m')
           OR kode_perolehan >= DATE_FORMAT(DATE_SUB(CURRENT_DATE, INTERVAL 3 MONTH), '%Y-%m')
        ORDER BY kode_perolehan ASC");

        return $query->result_array();
    }

    public function JumlahData($KodePerolehan)
    {

        $query   = $this->db->query("SELECT id_perolehan_sales, kode_perolehan_sales, jumlah_perolehan_sales, nama_sales

        FROM perolehan_sales

        WHERE status_customer = 'active' AND  nama_customer != '' 
        AND kode_perolehan = '$KodePerolehan'
        ");

        return $query->result_array();
    }

    public function Perolehan_Sales_Active_Tanggal($Tanggal_Instalasi)
    {
        $query   = $this->db->query("SELECT
        nama_sales,
        kode_perolehan,
        COUNT(*) AS perolehan_sales_all,
        SUM(CASE WHEN status_customer = 'active' THEN 1 ELSE 0 END) AS perolehan_sales_aktif
    FROM
        data_sheets
        WHERE tanggal_instalasi = '$Tanggal_Instalasi' AND nama_sales != ''
    GROUP BY
        nama_sales,
        kode_perolehan;
        ");

        return $query->result_array();
    }
}
