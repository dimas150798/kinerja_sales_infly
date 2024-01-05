<?php


class M_DataPegawai extends CI_Model
{

    public function Data_Pegawai()
    {
        $query   = $this->db->query("SELECT nama_pegawai, jabatan, status FROM data_pegawai
        WHERE status = 'Aktif'
        
        ORDER BY nama_pegawai ASC");

        return $query->result_array();
    }
}
