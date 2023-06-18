<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_m');
    }

    public function index()
    {
        $data['data'] = false;
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['judul'] = 'Login';
        $this->load->view('auth/template_auth/header', $data);
        $this->load->view('auth/index', $data);
        $this->load->view('auth/template_auth/footer', $data);
    }

    public function auth()
    {
        $this->form_validation->set_rules('nik', 'Nik Pegawai', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = false;

            $data['judul'] = 'Login';
            $this->load->view('auth/template_auth/header', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('auth/template_auth/footer');
        } else {

            $nik = $this->input->post('nik');
            $password =  md5($this->input->post('password'));
            $cek = $this->auth_m->login($nik, $password);
            $cek_nik = $this->auth_m->cek_nik($nik);

            if ($cek_nik == true) {
                if ($cek == true) {
                    foreach ($cek as $row);
                    $this->session->set_userdata('nik', $row->nik);
                    $this->session->set_userdata('nama', $row->nama);
                    $this->session->set_userdata('jabatan', $row->jabatan);
                    $this->session->set_userdata('level', $row->level);
                    if ($row->level == "admin") {
                        redirect('admin');
                    } elseif ($row->level == "user") {
                        redirect("user");
                    } elseif ($row->level == "asesor") {
                        redirect('asesor');
                    } else {
                        $this->session->set_flashdata('pesan', 'pass_salah');
                        return redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('pesan', 'pass_salah');
                    return redirect('login');
                }
            } elseif ($cek_nik == false) {
                $this->session->set_flashdata('pesan', 'nik_k');
                return redirect('login');
            }
        }
    }
    public function keluar()
    {
        $this->session->sess_destroy();
        return redirect('login');
    }
}
