<?php

defined('BASEPATH') or exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');

class C_DashboardUser extends CI_Controller
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

        $data['JumlahOnNet_All']        = $this->M_DataSheets->JumlahPelangganOnNet_All($KodePerolehan_Now);
        $data['JumlahOnNet_KBS']        = $this->M_DataSheets->JumlahPelangganOnNet_KBS_Today($Tanggal_Instalasi);
        $data['JumlahOnNet_TRW']        = $this->M_DataSheets->JumlahPelangganOnNet_TRW_Today($Tanggal_Instalasi);
        $data['JumlahOnNet_Kanigaran']  = $this->M_DataSheets->JumlahPelangganOnNet_Kanigaran_Today($Tanggal_Instalasi);
        $data['JumlahOnNet_Dringu']     = $this->M_DataSheets->JumlahPelangganOnNet_Dringu_Today($Tanggal_Instalasi);

        $this->load->view('template/user/V_Header', $data);
        $this->load->view('user/V_DashboardUser', $data);
        $this->load->view('template/user/V_Footer', $data);
    }
}
