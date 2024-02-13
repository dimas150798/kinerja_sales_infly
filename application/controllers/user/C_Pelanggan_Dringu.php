<?php

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_Pelanggan_Dringu extends CI_Controller
{

    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $ToDay = date('d-m-Y');
        $Tanggal_Instalasi = date('Y-m-d');

        $PecahToDay = explode("-", $ToDay);

        $BulanPerolehan = sprintf("%02d", $PecahToDay[1]);

        $KodePerolehan_Now = $PecahToDay[2] . '-' . $BulanPerolehan;

        $data['KodePerolehan_Now']           = $KodePerolehan_Now;

        $data['YearGET']   = NULL;
        $data['MonthGET']   = NULL;

        $data['Year']       = $PecahToDay[2];
        $data['Month']      = $PecahToDay[1];
        $data['Today']      = $ToDay;

        $data['DataPelaggan']   = $this->M_DataSheets->PelangganOnNet_Area_Today($Tanggal_Instalasi, 'Dringu');

        $this->load->view('template/user/V_Header', $data);
        $this->load->view('user/V_Pelanggan_Dringu', $data);
        $this->load->view('template/user/V_Footer', $data);
    }
}
