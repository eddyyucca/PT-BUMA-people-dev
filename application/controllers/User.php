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
        // $this->load->model('alumni_m');

        // $level_akun = $this->session->userdata('level');
        // if ($level_akun != "admin") {
        // 	return redirect('auth');
        // }
    }

    public function index()
    {

        $data['total_karyawan'] = $this->karyawan_m->jumlah_karyawan();
        $data['total_section'] = $this->section_m->jumlah_section();
        $data['total_jabatan'] = $this->jabatan_m->jumlah_jabatan();
        $data['total_departement'] = $this->departement_m->jumlah_departement();
        $data['judul'] = 'Dashboard Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        // $data['karyawan'] = $this->karyawan_m->get_all_kar();

        $this->load->view('template_user/header', $data);
        $this->load->view('user/home');
        $this->load->view('template_user/footer');
    }
    public function profil()
    {
        // $nik =  $this->session->userdata('nik');
        $nik = 10000272;
        $data['data'] = $this->karyawan_m->get_view_kar($nik);

        $data['judul'] = 'Profil Karyawan';
        $data['nama'] = $this->session->userdata('nama');
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
}
