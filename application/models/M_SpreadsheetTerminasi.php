<?php


class M_SpreadsheetTerminasi extends CI_Model
{
    public function index()
    {
        // Fetching terminated data sheets
        $getDataSheet = $this->db->query("SELECT id_sheet, kode_sheet, tanggal_customer, 
        nama_customer, nama_paket, branch_customer, alamat_customer, email, telepon, 
        status_customer, tanggal_instalasi, tanggal_terminasi, nama_sales, keterangan, kode_perolehan
        FROM data_sheets 
        WHERE status_customer = 'terminated'")->result_array();

        // Fetching termination data
        $getData = $this->db->query("SELECT id_terminasi_sheets, kode_terminasi_sheets, nama_pelanggan, tanggal_registrasi, tanggal_terminasi, nama_sales, area, keterangan FROM terminasi_sheets")->result_array();

        foreach ($getDataSheet as $obj) {
            $status = false;

            if (!empty($obj['nama_sales']) && !empty($obj['branch_customer'])) {
                foreach ($getData as $value) {

                    if ($obj['kode_sheet'] == $value['kode_terminasi_sheets'] && $obj['nama_sales'] == $value['nama_sales']) {
                        $status = true;

                        // Extracting and formatting dates
                        $TanggalRegistrasi = $obj['tanggal_instalasi'];
                        $TanggalTerminasi = $obj['tanggal_terminasi'];

                        // Separating the termination date
                        $pecahDay = explode("-", $TanggalTerminasi);

                        // Code Acquisition for the Current Date
                        $KodeTerminasi = $pecahDay[0] . '-' . $pecahDay[1];

                        // Calculating the difference in months between tanggal_instalasi and tanggal_customer
                        $diff = date_diff(new DateTime($TanggalRegistrasi), new DateTime($TanggalTerminasi));
                        $diffInMonths = $diff->y * 12 + $diff->m;

                        // Determining status based on the difference in months
                        $status = ($diffInMonths >= 0 && $diffInMonths <= 5) ? 'Kurang Dari' : 'Lebih Dari';

                        // Update data
                        $updateData = [
                            'kode_terminasi_sheets' => $obj['kode_sheet'],
                            'nama_pelanggan' => $obj['nama_customer'],
                            'tanggal_registrasi' => $TanggalRegistrasi,
                            'tanggal_terminasi' => $TanggalTerminasi,
                            'nama_sales' => $obj['nama_sales'],
                            'area' => $obj['branch_customer'],
                            'keterangan' => $obj['keterangan'],
                            'jumlah_month' => $diffInMonths,
                            'status' => $status,
                            'kode_terminasi' => $KodeTerminasi
                        ];

                        // Update data in the terminasi_sheets table
                        $this->db->where('id_terminasi_sheets', $value['id_terminasi_sheets']);
                        $this->db->update('terminasi_sheets', $updateData);
                    }
                }
            }

            if (!empty($obj['nama_sales']) && !empty($obj['branch_customer'])) {
                if (!$status && !empty($obj['kode_sheet'])) {

                    // Extracting and formatting dates
                    $TanggalRegistrasi = $obj['tanggal_instalasi'];
                    $TanggalTerminasi = $obj['tanggal_terminasi'];

                    // Separating the termination date
                    $pecahDay = explode("-", $TanggalTerminasi);

                    // Code Acquisition for the Current Date
                    $KodeTerminasi = $pecahDay[0] . '-' . $pecahDay[1];

                    // Calculating the difference in months between tanggal_instalasi and tanggal_customer
                    $diff = date_diff(new DateTime($TanggalRegistrasi), new DateTime($TanggalTerminasi));
                    $diffInMonths = $diff->y * 12 + $diff->m;

                    // Determining status based on the difference in months
                    $status = ($diffInMonths >= 0 && $diffInMonths <= 5) ? 'Kurang Dari' : 'Lebih Dari';

                    // Insert new data
                    $insertData = [
                        'kode_terminasi_sheets' => $obj['kode_sheet'],
                        'nama_pelanggan' => $obj['nama_customer'],
                        'tanggal_registrasi' => $TanggalRegistrasi,
                        'tanggal_terminasi' => $TanggalTerminasi,
                        'nama_sales' => $obj['nama_sales'],
                        'area' => $obj['branch_customer'],
                        'keterangan' => $obj['keterangan'],
                        'jumlah_month' => $diffInMonths,
                        'status' => $status,
                        'kode_terminasi' => $KodeTerminasi
                    ];

                    // Insert new data into the terminasi_sheets table
                    $this->db->insert("terminasi_sheets", $insertData);
                }
            }
        }
    }
}
