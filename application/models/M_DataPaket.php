<?php


class M_DataPaket extends CI_Model
{

    public function Data_Paket()
    {
        $query   = $this->db->query("SELECT nama_paket FROM data_paket");

        return $query->result_array();
    }
}
