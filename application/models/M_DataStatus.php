<?php


class M_DataStatus extends CI_Model
{

    public function DataStatus_New()
    {
        $query   = $this->db->query("SELECT nama_status FROM data_status
        WHERE nama_status IN ('survey', 'active', 'on net')
        ORDER BY nama_status ASC");

        return $query->result_array();
    }

    public function Data_Status()
    {
        $query   = $this->db->query("SELECT nama_status FROM data_status
                    WHERE nama_status != 'terminated'
                    ORDER BY nama_status ASC");

        return $query->result_array();
    }

    public function DataStatus_All()
    {
        $query   = $this->db->query("SELECT nama_status FROM data_status

        ORDER BY nama_status ASC");

        return $query->result_array();
    }
}
