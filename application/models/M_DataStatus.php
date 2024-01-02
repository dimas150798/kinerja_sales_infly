<?php


class M_DataStatus extends CI_Model
{

    public function Data_Status()
    {
        $query   = $this->db->query("SELECT nama_status FROM data_status
        ORDER BY nama_status ASC");

        return $query->result_array();
    }
}
