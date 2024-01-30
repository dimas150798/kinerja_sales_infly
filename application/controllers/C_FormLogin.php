<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_FormLogin extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('email_login', 'email_login', 'required');
        $this->form_validation->set_rules('password_login', 'password_login', 'required');
        $this->form_validation->set_message('required', 'Masukan data terlebih dahulu');

        if ($this->form_validation->run() == false) {
            // Display login form
            $this->load->view('V_FormLogin');
        } else {
            // Check login data
            $email_login = $this->input->post('email_login');
            $password_login = $this->input->post('password_login');
            $checkDataLogin = $this->M_Login->CheckLogin($email_login, $password_login);

            if ($checkDataLogin == NULL) {
                $this->setLoginFailedView();
            } elseif ($checkDataLogin->id_akses == 1) {
                // Superadmin login
                $this->setSuperadminRedirect($checkDataLogin);
            } elseif ($checkDataLogin->id_akses == 2) {
                // User login
                $this->setUserRedirect($checkDataLogin);
            } else {
                $this->setLoginFailedView();
            }
        }
    }

    private function setLoginFailedView()
    {
        $this->session->set_flashdata('LoginGagal_icon', 'error');
        $this->session->set_flashdata('LoginGagal_title', 'Email atau Password Salah');
        $this->load->view('V_FormLogin');
    }

    private function setSuperadminRedirect($userData)
    {
        $this->session->set_userdata('email', $userData->email_login);
        redirect('superadmin/C_DashboardSuperadmin');
    }

    private function setUserRedirect($userData)
    {
        $this->session->set_userdata('email', $userData->email_login);
        redirect('admin/C_DashboardAdmin');
    }

    public function logout()
    {
        session_start();
        session_destroy();

        redirect('C_FormLogin');
    }
}
