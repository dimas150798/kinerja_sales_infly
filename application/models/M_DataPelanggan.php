<?php


class M_DataPelanggan extends CI_Model
{

    public function DataDP_Pelanggan()
    {
        $query   = $this->db->query("SELECT nama_dp, COUNT(nama_dp) AS jumlah_dp
        FROM data_sheets
        WHERE status_customer = 'active' AND branch_customer = 'KBS' AND nama_dp IS NOT NULL AND nama_dp != ''
        GROUP BY nama_dp
        HAVING COUNT(nama_dp) > 1  
        ORDER BY `jumlah_dp` DESC");

        return $query->result_array();
    }
}
