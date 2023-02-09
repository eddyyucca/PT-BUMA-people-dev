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
        $data['judul'] = 'Dashboard Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        // $data['karyawan'] = $this->karyawan_m->get_all_kar();

        $this->load->view('template_user/header', $data);
        $this->load->view('user/home');
        $this->load->view('template_user/footer');
    }
}
