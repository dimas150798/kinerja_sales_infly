<?php


class M_DataArea extends CI_Model
{

    public function Data_Area()
    {
        $query   = $this->db->query("SELECT nama_area FROM data_area");

        return $query->result_array();
    }
}
