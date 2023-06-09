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
        $this->load->model('assessment_m');
        $this->load->model('kompetensi_m');
        $this->load->model('task_kompetensi_m');
        $this->load->model('training_m');
        $level_akun = $this->session->userdata('level');
        // if ($level_akun != "user") {
        //     $this->session->set_flashdata('login', 'n_login');
        //     return redirect('login'); }
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
        $data['nik'] =  $this->session->userdata('nik');
        $id_jab =  $this->session->userdata('jabatan');
        $data['data'] = $this->karyawan_m->get_view_kar($nik);

        $data['judul'] = 'Profil Karyawan';
        $data['nama'] = $this->session->userdata('nama');
 
       $data['data_training'] = $this->training_m->get_all_tra_user($nik);
		$data['ss'] = $this->suggestionsystem_m->get_all_ss_user($nik);
		$data['continuesimprovement'] = $this->ci_m->get_all_ci_user($nik);
		$data['tk'] = $this->task_kompetensi_m->get_all_tk_kar($nik);

        $this->load->view('template_user/header', $data);
        $this->load->view('user/profil/data_karyawan');
        $this->load->view('template_user/footer');
    }
    public function update_karyawan()
	{
        $nik =  $this->session->userdata('nik');
		$data['judul'] = 'Update Karyawan';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['data'] = $this->karyawan_m->get_view_kar($nik);
		
		$data['dep'] = $this->departement_m->get_all_dep();
		$data['sec'] = $this->section_m->get_all_sec();
		$data['jab'] = $this->jabatan_m->get_all_jab();

		$this->load->view('template_user/header', $data);
		$this->load->view('user/profil/ubah_profil', $data);
		$this->load->view('template_user/footer');
	}
    public function proses_edit_karyawan($nik)
	{
		$config['upload_path']   = './assets/foto_profil/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			// $config['encrypt_name'] = TRUE;
			$config['file_name'] = $this->input->post('nik');
			//$config['max_size']      = 100; 
			//$config['max_width']     = 1024; 
			//$config['max_height']    = 768;  

			$this->load->library('upload', $config);
			// script upload file 1
			$this->upload->do_upload('foto');
			$file1 = $this->upload->data();
			if ($file1 == true) {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama_lengkap'),
				'jk' => $this->input->post('jk'),
				'tempat' => $this->input->post('tempat'),
				'tanggal_lahir' => $this->input->post('ttl'),
				'alamat' => $this->input->post('alamat'),
				'agama' => $this->input->post('agama'),
				'email' => $this->input->post('email'),
				'telpon' => $this->input->post('telpon'),
				'section' => $this->input->post('section'),
				'jabatan' => $this->input->post('jabatan'),
				'departement' => $this->input->post('departement'),
				'foto' => $this->input->post('foto'),
			);
			$this->db->where('nik', $nik);
			$this->db->update('karyawan', $data);
			$this->session->set_flashdata('pesan', 'ubah');
			return redirect('user/profil');
			}else{
					unlink(base_url('assets/foto_profil/') . $nik->foto);
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama_lengkap'),
				'jk' => $this->input->post('jk'),
				'tempat' => $this->input->post('tempat'),
				'tanggal_lahir' => $this->input->post('ttl'),
				'alamat' => $this->input->post('alamat'),
				'agama' => $this->input->post('agama'),
				'email' => $this->input->post('email'),
				'telpon' => $this->input->post('telpon'),
				'section' => $this->input->post('section'),
				'jabatan' => $this->input->post('jabatan'),
				'departement' => $this->input->post('departement'),
				'foto' => $this->input->post('foto'),
			);
			$this->db->where('nik', $nik);
			$this->db->update('karyawan', $data);
			$this->session->set_flashdata('pesan', 'ubah');
			return redirect('user/profil');
			}
			
	}
    public function password()
    {
        $data['nik'] =  $this->session->userdata('nik');
        $nik = $this->session->userdata('nik');
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

    // assessment
    public function assessment()
    {
        $data['judul'] = 'Data assessment';
		$data['nama'] = $this->session->userdata('nama');		
		$nik= $this->session->userdata('nik');		
		$data['data'] = $this->task_kompetensi_m->get_all_tk_kar($nik);
        $this->load->view('template_user/header', $data);
        $this->load->view('user/assessment/data_assessment', $data);
        $this->load->view('template_user/footer');
    }
}
