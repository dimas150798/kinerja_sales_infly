<?php


class M_DataPegawai extends CI_Model
{

    public function Data_Pegawai()
    {
        $query   = $this->db->query("SELECT nama_pegawai, jabatan, status FROM data_pegawai
        WHERE status = 'Aktif'");

        return $query->result_array();
    }
}
