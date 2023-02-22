<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('departement_m');
        $this->load->model('jabatan_m');
        $this->load->model('section_m');
        $this->load->model('karyawan_m');
        $this->load->model('suggestionsystem_m');
        $this->load->model('ci_m');
        $level_akun = $this->session->userdata('level');
        // if ($level_akun != "user") {
        //     $this->session->set_flashdata('login', 'n_login');
        //     return redirect('login');
    }


    public function index()
    {
        $data['total_karyawan'] = $this->karyawan_m->jumlah_karyawan();
        $data['total_section'] = $this->section_m->jumlah_section();
        $data['total_jabatan'] = $this->jabatan_m->jumlah_jabatan();
        $data['total_departement'] = $this->departement_m->jumlah_departement();
        $data['judul'] = 'Dashboard Karyawan';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template_user/header', $data);
        $this->load->view('user/home', $data);
        $this->load->view('template_user/footer');
    }
    public function profil()
    {
        $nik =  $this->session->userdata('nik');
        $data['data'] = $this->karyawan_m->get_view_kar($nik);

        $data['judul'] = 'Profil Karyawan';
        $data['nama'] = $this->session->userdata('nama');

        $data['suggestionsystem'] = $this->suggestionsystem_m->get_all_ss_user($nik);

        $data['continuesimprovement'] = $this->ci_m->get_all_ci($nik);
        $this->load->view('template_user/header', $data);
        $this->load->view('user/profil/data_karyawan');
        $this->load->view('template_user/footer');
    }
    public function password()
    {
        // $nik =  $this->session->userdata('nik');
        $nik = 10000272;
        $data['data'] = $this->karyawan_m->get_row_nik($nik);
        $data['judul'] = 'Setting Password';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template_user/header', $data);
        $this->load->view('user/profil/ubah_password', $data);
        $this->load->view('template_user/footer');
    }
    public function proses_ubah_password($nik)
    {
        $password = md5($this->input->post('password_lama'));
        $cek = $this->karyawan_m->cek_pass($password, $nik);
        $pass1 = $this->input->post('password_baru');
        $pass2 = $this->input->post('u_password');

        if ($pass1 == $pass2) {
            if ($cek == true) {
                $data_update = array(
                    "password" => md5($this->input->post('password_baru'))
                );
                $this->db->where('nik', $nik);
                $this->db->update('karyawan', $data_update);
                $this->session->set_flashdata('pesan', 'update');
                return redirect('user/password');
            } else {

                $this->session->set_flashdata('pesan', 'salah');
                return redirect('user/password');
            }
        } else {
            $this->session->set_flashdata('pesan', 'mtc');
            return redirect('user/password');
        }
    }
    //  suggestionsystem
    public function suggestionsystem()
    {
        $data['judul'] = 'Data Suggestion system';
        $data['nama'] = $this->session->userdata('nama');
        $nik =  $this->session->userdata('nik');
        $data['data'] = $this->suggestionsystem_m->get_all_ss_user($nik);
        $this->load->view('template_user/header', $data);
        $this->load->view('user/suggestionsystem/data_suggestionsystem', $data);
        $this->load->view('template_user/footer');
    }
    // end suggestionsystem

    // continuesImprovement
    public function continuesimprovement()
    {
        $data['judul'] = 'Continues Improvement';
        $data['nama'] = $this->session->userdata('nama');
        $data['alert'] = false;
        $nik =  $this->session->userdata('nik');
        $data['continuesimprovement'] = $this->ci_m->get_all_ci_user($nik);
        $this->load->view('template_user/header', $data);
        $this->load->view('user/continuesImprovement/data_continuesimprovement', $data);
        $this->load->view('template_user/footer');
    }
    // end continuesImprovement
}
