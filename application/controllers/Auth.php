<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
    public function user_login()
    {
        $data['data'] = false;
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['judul'] = 'Login User';
        $this->load->view('auth/template_auth/header', $data);
        $this->load->view('auth/user_login', $data);
        $this->load->view('auth/template_auth/footer', $data);
    }

    public function auth_admin()
    {
        $this->form_validation->set_rules('nip', 'NIP Pegawai', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = false;

            $data['judul'] = 'Login';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('auth/template/footer');
        } else {

            $nip = $this->input->post('nip');
            $password =  md5($this->input->post('password'));
            $cek = $this->auth_m->login($nip, $password);
            if ($cek == true) {
                foreach ($cek as $row);
                $this->session->set_userdata('nip', $row->nip);
                $this->session->set_userdata('nama_lengkap', $row->nama_lengkap);
                $this->session->set_userdata('id_pegawai', $row->id_pegawai);
                $this->session->set_userdata('level', $row->level);
                if ($row->level == "admin") {
                    redirect('admin');
                } elseif ($row->level == "user") {
                    $this->session->set_Flashdata('pesan', "<div class='alert alert-danger' role='alert'>Password Salah !
                    </div>");
                    redirect("auth/index");
                }
            } else {
                $data['data'] = '<div class="alert alert-danger" role="alert">Password Salah !
            </div>';
                $data['judul'] = 'Login';
                $this->load->view('auth/template_auth/header', $data);
                $this->load->view('auth/index', $data);
                $this->load->view('auth/template_auth/footer');
            }
        }
    }
    public function auth_user()
    {
        $this->form_validation->set_rules('nip', 'NIP Pegawai', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = false;

            $data['judul'] = 'Login';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/user_login', $data);
            $this->load->view('auth/template/footer');
        }

        $nip = $this->input->post('nip');
        $password =  md5($this->input->post('password'));
        $cek = $this->auth_m->login($nip, $password);
        if ($cek == true) {
            foreach ($cek as $row);
            $this->session->set_userdata('nip', $row->nip);
            $this->session->set_userdata('nama_lengkap', $row->nama_lengkap);
            $this->session->set_userdata('id_pegawai', $row->id_pegawai);
            $this->session->set_userdata('bidang', $row->bidang);
            $this->session->set_userdata('level', $row->level);
            if ($row->level == "user") {
                redirect('user');
            } elseif ($row->level == "admin") {
                $this->session->set_Flashdata('pesan', "<div class='alert alert-danger' role='alert'>Password Salah !
        </div>");
                redirect("auth/user_login");
            }
        } else {
            $data['data'] = '<div class="alert alert-danger" role="alert">Password Salah !
            </div>';
            $data['judul'] = 'Login';
            $this->load->view('auth/template_auth/header', $data);
            $this->load->view('auth/user_login', $data);
            $this->load->view('auth/template_auth/footer');
        }
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
