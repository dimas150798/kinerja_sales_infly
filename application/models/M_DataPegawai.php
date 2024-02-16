<?php


class M_DataPegawai extends CI_Model
{

    public function Data_Pegawai()
    {
        $query   = $this->db->query("SELECT nama_pegawai, jabatan, status FROM data_pegawai
        WHERE status = 'Aktif' OR status = 'Another'
        
        ORDER BY nama_pegawai ASC");

        return $query->result_array();
    }

    public function DataPegawai_All()
    {
        $query   = $this->db->query("SELECT nama_pegawai, jabatan, status FROM data_pegawai
        
        ORDER BY nama_pegawai ASC");

        return $query->result_array();
    }
}
