<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';


class Asesor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('departement_m');
        $this->load->model('jabatan_m');
        $this->load->model('section_m');
        $this->load->model('karyawan_m');
        $level_akun = $this->session->userdata('level');
        // if ($level_akun != "user") {
        //     $this->session->set_flashdata('login', 'n_login');
        //     // return redirect('login');
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
        $this->load->view('Asesor/home');
        $this->load->view('template_user/footer');
    }
}
