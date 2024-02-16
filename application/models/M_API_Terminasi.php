<?php


class M_API_Terminasi extends CI_Model
{
    public function API_Kebonsari()
    {
        $response = [];

        $json_string = 'https://kebonsari.inflydata.net/admin/TerminasiPelanggan/C_API_TerminasiPelanggan/ApiTerminasi';
        $jsondata = file_get_contents($json_string);
        $obj = json_decode($jsondata, TRUE);

        $arrayObj = count($obj);

        $getData = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
        FROM data_sheets")->result_array();

        foreach ($obj as $data) {
            $existingData = $this->db
                ->where('nama_customer', $data->name)
                ->where('tanggal_customer', $data->start_date)
                ->get('data_sheets')
                ->row();

            if (empty($existingData) || !isset($existingData->nama_customer)) {
                $insertData = [
                    "tanggal_customer"  => $data->start_date,
                    "nama_customer"     => $data->name,
                    "nama_paket"        => $data->nama_paket,
                    "branch_customer"   => 'KBS',
                    "alamat_customer"   => $data->address,
                    "status_customer"   => 'terminated',
                    "nama_sales"        => $data->nama_sales,
                ];

                // Menyisipkan data baru
                $this->db->insert("data_sheets", $insertData);
            } else {
                // Data sudah ada, lakukan sesuatu jika diperlukan
                // Misalnya, update data atau lakukan operasi lainnya
            }
        }
    }
}
