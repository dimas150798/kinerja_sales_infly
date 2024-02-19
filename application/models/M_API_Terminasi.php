<?php


class M_API_Terminasi extends CI_Model
{

    public function API_Kebonsari()
    {
        $json_string = 'https://kebonsari.inflydata.net/admin/TerminasiPelanggan/C_API_TerminasiPelanggan/ApiTerminasi';
        $jsondata = file_get_contents($json_string);
        $obj = json_decode($jsondata, TRUE);

        $arrayObj = count($obj);

        $getData = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
        FROM data_sheets")->result_array();

        for ($i = 0; $i < $arrayObj; $i++) {
            $dataExist = false;

            foreach ($getData as $data) {
                // Memeriksa apakah data dengan nama sales dan nama customer yang sama sudah ada (case-insensitive)
                if (strcasecmp($data['nama_sales'], $obj[$i]['nama_sales']) === 0 && strcasecmp($data['nama_customer'], $obj[$i]['name']) === 0) {
                    $dataExist = true;

                    $tanggal_instalasi  = $obj[$i]['start_date'];

                    $Split_Tanggal      = explode("-", $tanggal_instalasi);

                    $KodePerolehan      = $Split_Tanggal[0] . '-' . $Split_Tanggal[1];

                    $updateData = [
                        "tanggal_customer"  => $obj[$i]['start_date'],
                        "tanggal_instalasi" => $obj[$i]['start_date'],
                        "tanggal_terminasi" => $obj[$i]['stop_date'],
                        "nama_paket"        => $obj[$i]['nama_paket'],
                        "nama_customer"     => $obj[$i]['name'], // Mengubah 'nama_customer' menjadi 'name'
                        "nama_sales"        => $obj[$i]['nama_sales'],
                        "branch_customer"   => 'KBS',
                        "alamat_customer"   => $obj[$i]['address'],
                        "keterangan"        => $obj[$i]['keterangan'],
                        "status_customer"   => 'terminated',
                        "kode_perolehan"    => $KodePerolehan
                    ];

                    $this->db->where('nama_customer', $data['nama_customer']);
                    $this->db->where('nama_sales', $data['nama_sales']);
                    $this->db->update("data_sheets", $updateData);
                }
            }

            // Jika data belum ada, sisipkan data baru
            if (!$dataExist) {
                $tanggal_instalasi  = $obj[$i]['start_date'];

                $Split_Tanggal      = explode("-", $tanggal_instalasi);

                $KodePerolehan      = $Split_Tanggal[0] . '-' . $Split_Tanggal[1];

                $insertData = [
                    "tanggal_customer"  => $obj[$i]['start_date'],
                    "tanggal_instalasi" => $obj[$i]['start_date'],
                    "tanggal_terminasi" => $obj[$i]['stop_date'],
                    "nama_paket"        => $obj[$i]['nama_paket'],
                    "nama_customer"     => $obj[$i]['name'], // Mengubah 'nama_customer' menjadi 'name'
                    "nama_sales"        => $obj[$i]['nama_sales'],
                    "branch_customer"   => 'KBS',
                    "alamat_customer"   => $obj[$i]['address'],
                    "keterangan"        => $obj[$i]['keterangan'],
                    "status_customer"   => 'terminated',
                    "kode_perolehan"    => $KodePerolehan
                ];

                $this->db->insert("data_sheets", $insertData);
            }
        }
    }

    public function API_Kanigaran()
    {
        $json_string = 'https://kanigaran.inflydata.net/admin/TerminasiPelanggan/C_API_TerminasiPelanggan/ApiTerminasi';
        $jsondata = file_get_contents($json_string);
        $obj = json_decode($jsondata, TRUE);

        $arrayObj = count($obj);

        $getData = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, nama_sales, keterangan, kode_perolehan
        FROM data_sheets")->result_array();

        for ($i = 0; $i < $arrayObj; $i++) {
            $dataExist = false;

            foreach ($getData as $data) {
                // Memeriksa apakah data dengan nama sales dan nama customer yang sama sudah ada (case-insensitive)
                if (strcasecmp($data['nama_sales'], $obj[$i]['nama_sales']) === 0 && strcasecmp($data['nama_customer'], $obj[$i]['name']) === 0) {
                    $dataExist = true;

                    $tanggal_instalasi  = $obj[$i]['start_date'];

                    $Split_Tanggal      = explode("-", $tanggal_instalasi);

                    $KodePerolehan      = $Split_Tanggal[0] . '-' . $Split_Tanggal[1];

                    $updateData = [
                        "tanggal_customer"  => $obj[$i]['start_date'],
                        "tanggal_instalasi" => $obj[$i]['start_date'],
                        "tanggal_terminasi" => $obj[$i]['stop_date'],
                        "nama_paket"        => $obj[$i]['nama_paket'],
                        "nama_customer"     => $obj[$i]['name'], // Mengubah 'nama_customer' menjadi 'name'
                        "nama_sales"        => $obj[$i]['nama_sales'],
                        "branch_customer"   => 'Kanigaran',
                        "alamat_customer"   => $obj[$i]['address'],
                        "keterangan"        => $obj[$i]['keterangan'],
                        "status_customer"   => 'terminated',
                        "kode_perolehan"    => $KodePerolehan
                    ];

                    $this->db->where('nama_customer', $data['nama_customer']);
                    $this->db->where('nama_sales', $data['nama_sales']);
                    $this->db->update("data_sheets", $updateData);
                }
            }

            // Jika data belum ada, sisipkan data baru
            if (!$dataExist) {
                $tanggal_instalasi  = $obj[$i]['start_date'];

                $Split_Tanggal      = explode("-", $tanggal_instalasi);

                $KodePerolehan      = $Split_Tanggal[0] . '-' . $Split_Tanggal[1];

                $insertData = [
                    "tanggal_customer"  => $obj[$i]['start_date'],
                    "tanggal_instalasi" => $obj[$i]['start_date'],
                    "tanggal_terminasi" => $obj[$i]['stop_date'],
                    "nama_paket"        => $obj[$i]['nama_paket'],
                    "nama_customer"     => $obj[$i]['name'], // Mengubah 'nama_customer' menjadi 'name'
                    "nama_sales"        => $obj[$i]['nama_sales'],
                    "branch_customer"   => 'Kanigaran',
                    "alamat_customer"   => $obj[$i]['address'],
                    "keterangan"        => $obj[$i]['keterangan'],
                    "status_customer"   => 'terminated',
                    "kode_perolehan"    => $KodePerolehan
                ];

                $this->db->insert("data_sheets", $insertData);
            }
        }
    }
}
