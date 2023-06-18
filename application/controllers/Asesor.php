<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SebastianBergmann\Timer\Duration;

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
		$this->load->model('kompetensi_m');
		$this->load->model('ci_m');
		$this->load->model('task_kompetensi_m');
		$this->load->model('suggestionsystem_m');
		$this->load->model('training_m');
		$this->load->model('assessment_m');
		$this->load->model('grade_m');
		$this->load->helper(array('url'));
		$level_akun = $this->session->userdata('level');
		if ($level_akun != "asesor") {
			$this->session->set_flashdata('login', 'n_login');
			return redirect('login');
		}
	}


	public function index()
	{
		$data['judul'] = 'PT. BUMA - SITE IPR';
		$data['nama'] = $this->session->userdata('nama');
		$data['total_karyawan'] = $this->karyawan_m->jumlah_karyawan();
		$data['total_section'] = $this->section_m->jumlah_section();
		$data['total_jabatan'] = $this->jabatan_m->jumlah_jabatan();
		$data['total_departement'] = $this->departement_m->jumlah_departement();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('home/home');
		$this->load->view('template_asesor/footer');
	}
	// karyawan
	public function data_karyawan($num = '')
	{
        $data['akun'] = $this->session->userdata('level');
		$perpage = 8;
		$offset = $this->uri->segment(3);
		$data['data'] = $this->karyawan_m->get_data($perpage, $offset)->result();
		$config['base_url'] = site_url('asesor/data_karyawan/');
		$config['total_rows'] = $this->karyawan_m->getAll()->num_rows();
		$config['per_page'] = $perpage;


		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$pagination = $this->pagination->initialize($config);
		$data['judul'] = 'Data Karyawan';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/karyawan/data_karyawan', $data, $pagination);
		$this->load->view('template_asesor/footer');
	}

	public function search_data_karyawan($num = '')
	{
        $data['akun'] = $this->session->userdata('level');
		$perpage = 8;
		$offset = $this->uri->segment(3);
		$cari = $this->input->post('cari');
		$data['data'] = $this->karyawan_m->cari_data($perpage, $offset, $cari)->result();
		$config['base_url'] = site_url('asesor/search_data_karyawan');
		$config['total_rows'] = $this->karyawan_m->getRow($cari)->num_rows();
		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$pagination = $this->pagination->initialize($config);

		//end

		$data['judul'] = 'Data Karyawan';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/karyawan/data_karyawan', $data, $pagination);
		$this->load->view('template_asesor/footer');
	}
	
	public function view_karyawan($nik)
	{
        $data['nik'] =  $nik;
		$karyawan = $this->karyawan_m->get_row_nik($nik);
        $id_jab =  $karyawan->jabatan;
        $data['data'] = $this->karyawan_m->get_view_kar($nik);

        $data['judul'] = 'Profil Karyawan';
        $data['nama'] = $this->session->userdata('nama');
      $data['data_training'] = $this->training_m->get_all_tra_user($nik);
		$data['ss'] = $this->suggestionsystem_m->get_all_ss_user($nik);
		$data['continuesimprovement'] = $this->ci_m->get_all_ci_user($nik);
		$data['tk'] = $this->task_kompetensi_m->get_all_tk_kar($nik);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/karyawan/view_karyawan',$data);
		$this->load->view('template_asesor/footer');
	}

	// end karyawan

	// continuesImprovement
	public function continuesimprovement()
	{
		$data['judul'] = 'Continues Improvement';
		$data['nama'] = $this->session->userdata('nama');
		$data['alert'] = false;

		$data['continuesimprovement'] = $this->ci_m->get_all_ci();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/continuesimprovement/data_continuesimprovement', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_continuesimprovement()
	{
		$data['judul'] = 'Continues Improvement';
		$data['nama'] = $this->session->userdata('nama');

		$data['kar'] = $this->karyawan_m->get_all_kar();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/continuesimprovement/create_continuesimprovement', $data);
		$this->load->view('template_asesor/footer');
	}
	public function update_continuesimprovement($nik, $pembuat)
	{
		$data['judul'] = 'Continues Improvement';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->ci_m->get_row_ci($pembuat);
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/continuesimprovement/edit_continuesimprovement', $data);
		$this->load->view('template_asesor/footer');
	}

	public  function proses_tambah_ci()
	{
		$x = $this->input->post('kar');

		$pembuat = $this->input->post('pembuat');
		$kode_tim = date('Ymdhis') . $pembuat;
		$data = array(
			'judul' => $this->input->post('judul'),
			'pembuat' => $this->input->post('pembuat'),
			't_implementasi' => $this->input->post('t_implementasi'),
			'tim' => $kode_tim,
		);
		$this->db->insert('continuesimprovement', $data);
		foreach ($x as $tim) {
			$data2 = array(
				'nama_tim' => $tim,
				'kode_tim' => $kode_tim
			);
			$this->db->insert('citt', $data2);
		}
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('asesor/continuesimprovement');
	}
	public  function proses_edit_ci($kode_tim)
	{

		$data = array(
			'judul' => $this->input->post('judul'),
			'pembuat' => $this->input->post('pembuat'),
			't_implementasi' => $this->input->post('t_implementasi'),
			'tim' => $kode_tim,
		);
		$this->db->where('tim', $kode_tim);
		$this->db->update('continuesimprovement', $data);
		$this->db->where('kode_tim', $kode_tim);
		$this->db->delete('citt');
		$x = $this->input->post('kar');
		foreach ($x as $tim) {
			$data2 = array(
				'nama_tim' => $tim,
				'kode_tim' => $kode_tim
			);
			$this->db->insert('citt', $data2);
		}
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('asesor/continuesimprovement');
	}

	public  function delete_continuesimprovement($kode_tim)
	{
		$this->db->where('tim', $kode_tim);
		$this->db->delete('continuesimprovement');
		$this->db->where('kode_tim', $kode_tim);
		$this->db->delete('citt');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('asesor/continuesimprovement');
	}
	// end continuesImprovement

	// jenisKompetensi
	public function data_jeniskompetensi()
	{
		$data['judul'] = 'Data kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/jenis_kompetensi/data_kompetensi', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_kompetensi()
	{
		$data['judul'] = 'Create Kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/jenis_kompetensi/create_kompetensi', $data);
		$this->load->view('template_asesor/footer');
	}
	public function edit_kompetensi($id_kom)
	{
		$data['judul'] = 'Update kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_row_kom($id_kom);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/jenis_kompetensi/edit_kompetensi', $data);
		$this->load->view('template_asesor/footer');
	}
	public function proses_tambah_kom()
	{
		$data = array(
			'j_kompetensi' => $this->input->post('j_kompetensi')
		);
		$this->db->insert('kompetensi', $data);
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('admin/data_jeniskompetensi');
	}
	public function proses_edit_kom($id_kom)
	{
		$data = array(
			'j_kompetensi' => $this->input->post('j_kompetensi')
		);
		$this->db->where('id_kom', $id_kom);
		$this->db->update('kompetensi', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('admin/data_jeniskompetensi');
	}
	public function delete_kompetensi($id_kom)
	{
		$this->db->where('id_kom', $id_kom);
		$this->db->delete('kompetensi');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/data_jeniskompetensi');
	}
	// end jenisKompetensi

	// task_kompetensi
	public function task_kompetensi()
	{
		$data['judul'] = 'Data kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->task_kompetensi_m->get_all_tk();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/task_kompetensi/data_taskkompetensi', $data);
		$this->load->view('template_asesor/footer');
	}
	public function view_taskkompetensi($id_jab)
	{
		$data['judul'] = 'Data kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_row_level_kar($id_jab);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/task_kompetensi/view_taskkompetensi', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_task_kompetensi()
	{
		$data['judul'] = 'Create Task Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['kompetensi'] = $this->kompetensi_m->get_all_kom();
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/task_kompetensi/create_taskkompetensi', $data);
		$this->load->view('template_asesor/footer');
	}
	public function view_kompetensi($nik)
	{
		$data['judul'] = 'Create Task Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_all_level();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/task_kompetensi/view_kompetensi', $data);
		$this->load->view('template_asesor/footer');
	}
	
	public function update_task_kompetensi($id_kompetensi)
	{
		$data['judul'] = 'Update Task Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->task_kompetensi_m->get_row_tk($id_kompetensi);
		$data['jabatan'] = $this->jabatan_m->get_all_jab();
		$data['kompetensi'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/task_kompetensi/edit_taskkompetensi', $data);
		$this->load->view('template_asesor/footer');
	}
	public function proses_tambah_task_kompetensi()
	{
		$data = array(
			'nik_kar' => $this->input->post('xp'),
			'date_kom' => $this->input->post('tanggal'),
			'asesor' => $this->session->userdata('nik'),
		);
		$nik = $this->input->post('xp');
		$date_kom = $this->input->post('tanggal');
		$this->db->from('kompetensi_user');
        $this->db->where('nik_kar', $nik);
        $this->db->where('date_kom', $date_kom);
 		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() < 1) {
			$this->db->insert('kompetensi_user', $data);
			$this->session->set_flashdata('pesan', 'buat');
			return redirect('asesor/task_kompetensi');
		}elseif($query->num_rows() >= 1) {
			$this->session->set_flashdata('pesan', 'sudahada');
			return redirect('asesor/task_kompetensi');
		}
	}
	public function proses_edit_task_kompetensi($id_kompetensi)
	{
		$data = array(
			'jabatan' => $this->input->post('jabatan'),
			'kompetensi' => $this->input->post('kompetensi'),
			't_kompetensi' => $this->input->post('t_kompetensi'),
			'level_kom' => $this->input->post('level'),
		);
		$this->db->where('id_kompetensi', $id_kompetensi);
		$this->db->update('kompetensi_user', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('asesor/task_kompetensi');
	}
	public function delete_task_kompetensi($id_kompetensi)
	{
		$this->db->where('id_kompetensi', $id_kompetensi);
		$this->db->delete('kompetensi_user');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('asesor/task_kompetensi');
	}
	public function delete_taskkompetensi($id_kom_user)
	{
		$this->db->where('id_kom_user', $id_kom_user);
		$this->db->delete('kompetensi_user');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('asesor/task_kompetensi');
	}

	function get_jabatan()
	{
		$nik = $this->input->post('nik');
		echo $this->kompetensi_m->get_jab_opt($nik);
		
	}
	function get_plan()
	{
		$id_kom = $this->input->post('id');
		echo $this->task_kompetensi_m->plan($id_kom);
	}
	function get_plan_kom()
	{
		$plan_t = $this->input->post('sub_id');
		echo $this->task_kompetensi_m->plan_kom($plan_t);
	}
	function get_sec()
	{
		$nik = $this->input->post('nik');
		echo $this->kompetensi_m->get_sec_opt($nik);
	}
	
	// end task_kompetensi

	// suggestionsystem
	public function suggestionsystem()
	{
		$data['judul'] = 'Data Suggestion system';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->suggestionsystem_m->get_all_ss();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/suggestionsystem/data_suggestionsystem', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_suggestionsystem()
	{
		$data['judul'] = 'Create Task suggestionsystem';
		$data['nama'] = $this->session->userdata('nama');

		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['section'] = $this->section_m->get_all_sec();

		$data['suggestionsystem'] = $this->suggestionsystem_m->get_all_ss();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/suggestionsystem/create_suggestionsystem', $data);
		$this->load->view('template_asesor/footer');
	}
	public function update_suggestionsystem($id_ss)
	{
		$data['judul'] = 'Update Task suggestionsystem';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->suggestionsystem_m->get_row_ss($id_ss);
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['section'] = $this->section_m->get_all_sec();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/suggestionsystem/edit_suggestionsystem', $data);
		$this->load->view('template_asesor/footer');
	}
	public function proses_tambah_suggestionsystem()
	{
		$data = array(
			'judul_ss' => $this->input->post('judul_ss'),
			't_implementasi_ss' => $this->input->post('t_implementasi_ss'),
			'section_ss' => $this->input->post('section_ss'),
			'pembuat_ss' => $this->input->post('pembuat_ss'),
		);
		$this->db->insert('suggestionsystem', $data);
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('asesor/suggestionsystem');
	}
	public function proses_edit_suggestionsystem($id_ss)
	{
		$data = array(
			'judul_ss' => $this->input->post('judul_ss'),
			't_implementasi_ss' => $this->input->post('t_implementasi_ss'),
			'section_ss' => $this->input->post('section_ss'),
			'pembuat_ss' => $this->input->post('pembuat_ss'),
		);
		$this->db->where('id_ss', $id_ss);
		$this->db->update('suggestionsystem', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('asesor/suggestionsystem');
	}
	public function delete_suggestionsystem($id_ss)
	{
		$this->db->where('id_ss', $id_ss);
		$this->db->delete('suggestionsystem');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('asesor/suggestionsystem');
	}
	// end suggestionsystem

	// training
	public function training()
	{
		$data['judul'] = 'Data Training';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->training_m->get_all_tra();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/training/data_training', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_training()
	{
		$data['judul'] = 'Data Training';
		$data['nama'] = $this->session->userdata('nama');
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/training/create_training', $data);
		$this->load->view('template_asesor/footer');
	}
	public function edit_training($id_training)
	{
		$data['judul'] = 'Data Training';
		$data['nama'] = $this->session->userdata('nama');
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['data'] = $this->training_m->get_row_tra($id_training);

		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/training/edit_training', $data);
		$this->load->view('template_asesor/footer');
	}
	public function proses_tambah_training()
	{
		$config['upload_path']   = './assets/sertifikat_training/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		// $config['file_name'] = $this->input->post('karyawan');
		//$config['max_size']      = 100; 
		//$config['max_width']     = 1024; 
		//$config['max_height']    = 768;  

		$this->load->library('upload', $config);
		// script upload file 1
		$this->upload->do_upload('sertifikat_training');
		$file1 = $this->upload->data();
		$data = array(
			'karyawan' => $this->input->post('karyawan'),
			'training' => $this->input->post('training'),
			'penyelenggara' => $this->input->post('penyelenggara'),
			'mulai_training' => $this->input->post('mulai_training'),
			'akhir_training' => $this->input->post('akhir_training'),
			'd_training' => $this->input->post('d_training'),
			'awal_st' => $this->input->post('awal_st'),
			'akhir_st' => $this->input->post('akhir_st'),
			'kredensial' => $this->input->post('kredensial'),
			'training_foto' => $file1['file_name'],
		);
		$this->db->insert('training', $data);
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('asesor/training');
	}
	public function proses_edit_training($id_training)
	{
		// get data foto
		$config['upload_path']   = './assets/sertifikat_training/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		// script upload file 1
		$this->upload->do_upload('sertifikat_training');
		$file1 = $this->upload->data();

		if ($file1['file_name'] == true) {
			$data = array(
				'karyawan' => $this->input->post('karyawan'),
				'penyelenggara' => $this->input->post('penyelenggara'),
				'mulai_training' => $this->input->post('mulai_training'),
				'akhir_training' => $this->input->post('akhir_training'),
				'd_training' => $this->input->post('d_training'),
				'awal_st' => $this->input->post('awal_st'),
				'akhir_st' => $this->input->post('akhir_st'),
				'kredensial' => $this->input->post('kredensial'),
				'training_foto' => $file1['file_name'],
			);
			$get = $this->training_m->get_row_tra($id_training);
			unlink($_SERVER['DOCUMENT_ROOT'] . '/assets/sertifikat_training/' . $get->training_foto);

		} elseif ($file1['file_name'] ==  false) {
			$data = array(
				'karyawan' => $this->input->post('karyawan'),
				'penyelenggara' => $this->input->post('penyelenggara'),
				'mulai_training' => $this->input->post('mulai_training'),
				'akhir_training' => $this->input->post('akhir_training'),
				'd_training' => $this->input->post('d_training'),
				'awal_st' => $this->input->post('awal_st'),
				'akhir_st' => $this->input->post('akhir_st'),
				'kredensial' => $this->input->post('kredensial')
			);
		}
		$this->db->where('id_training', $id_training);
		$this->db->update('training', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('asesor/training');
	}
	public function delete_training($id_training)
	{
		$get = $this->training_m->get_row_tra($id_training);
		unlink($_SERVER['DOCUMENT_ROOT'] . '/assets/sertifikat_training/' . $get->training_foto);
		$this->db->where('id_training', $id_training);
		$this->db->delete('training');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('asesor/training');
	}
	// end training

	// assessment
	public function assessment()
	{
		$data['judul'] = 'Data assessment';
		$data['nama'] = $this->session->userdata('nama');		
		$data['data'] = $this->task_kompetensi_m->get_all_tk();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/assessment/data_assessment', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_nilaiassessment($nik,$id_plan_t)
	{
		$data['judul'] = 'Create Assessment';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $nik;
		$data['id_plan_t'] = $id_plan_t;
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/assessment/nilai_assessment', $data);
		$this->load->view('template_asesor/footer');
	}
	public function edit_nilaiassessment($nik,$id_plan_t)
	{
		$data['judul'] = 'Edit Assessment';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $nik;
		$data['id_plan_t'] = $id_plan_t;
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/assessment/nilai_assessment', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_assessment($id_jab,$nik)
	{

		$data['judul'] = 'Data assessment';
		$data['nik'] = $nik;
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_row_level_kar($id_jab);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/assessment/create_assessment', $data);
		$this->load->view('template_asesor/footer');
	}
	public function edit_assessment($id_am)
	{
		$data['judul'] = 'Data assessment';
		$data['nama'] = $this->session->userdata('nama');
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['asesor'] = $this->karyawan_m->get_all_ar();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$data['t_kom'] = $this->task_kompetensi_m->get_all_tk();
		$data['data'] = $this->assessment_m->get_row_am($id_am);

		$this->load->view('template_asesor/header', $data);
		$this->load->view('assessment/edit_assessment', $data);
		$this->load->view('template_asesor/footer');
	}
	public function proses_tambah_assessment()
	{
		$config['upload_path']   = './assets/dokumen_pendukung/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		// $config['file_name'] = $this->input->post('karyawan');
		//$config['max_size']      = 100; 
		//$config['max_width']     = 1024; 
		//$config['max_height']    = 768;  

		$this->load->library('upload', $config);
		// script upload file 1
		$this->upload->do_upload('sertifikat');
		$file1 = $this->upload->data();
		$data = array(
			'karyawan' => $this->input->post('karyawan'),
			'asesor' => $this->input->post('asesor'),
			'kompetensi' => $this->input->post('kompetensi'),
			't_komp' => $this->input->post('t_komp'),
			'f_pendukung' => $file1['file_name'],
			'ket' => $this->input->post('ket'),
		);
		$this->db->insert('assessment', $data);
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('asesor/assessment');
	}
	public function proses_edit_assessment($id_am)
	{
		$config['upload_path']   = './assets/dokumen_pendukung/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		// $config['file_name'] = $this->input->post('karyawan');
		//$config['max_size']      = 100; 
		//$config['max_width']     = 1024; 
		//$config['max_height']    = 768;  

		$this->load->library('upload', $config);
		// script upload file 1
		$this->upload->do_upload('sertifikat');
		$file1 = $this->upload->data();

		if ($file1['file_name'] == true) {
			$data = array(
				'karyawan' => $this->input->post('karyawan'),
				'asesor' => $this->input->post('asesor'),
				'kompetensi' => $this->input->post('kompetensi'),
				't_komp' => $this->input->post('t_komp'),
				'f_pendukung' => $file1['file_name'],
				'ket' => $this->input->post('ket'),
			);
			$get = $this->assessment_m->get_row_am($id_am);
			unlink($_SERVER['DOCUMENT_ROOT'] . '/assets/dokumen_pendukung/' . $get->f_pendukung);
		} elseif ($file1['file_name'] ==  false) {
			$data = array(
				'karyawan' => $this->input->post('karyawan'),
				'asesor' => $this->input->post('asesor'),
				'kompetensi' => $this->input->post('kompetensi'),
				't_komp' => $this->input->post('t_komp'),
				'ket' => $this->input->post('ket'),
			);
		}

		$this->db->where('id_am', $id_am);
		$this->db->update('assessment', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('asesor/assessment');
	}
	public function delete_assessment($id_am)
	{
		$get = $this->assessment_m->get_row_am($id_am);
		unlink($_SERVER['DOCUMENT_ROOT'] . '/assets/dokumen_pendukung/' . $get->f_pendukung);

		$this->db->where('id_am', $id_am);
		$this->db->delete('assessment');

		$this->session->set_flashdata('pesan', 'hapus');
		
		return redirect('admin/assessment');
	}
	public function nilai_assessment($id_am,$nik)
	{
		$this->db->where('id_am', $id_am);
		$this->db->delete('assessment');

		$this->db->where('nik', $nik);
		$query = $this->db->get('karyawan')->row();
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect("admin/create_assessment/".$query->jabatan."/".$query->nik);
	}

	public function proses_tambah_nilaiassessment($nik,$id_plan_t)
	{

		$data = array(

			"karyawan" => $nik,
			"kompetensi" => $id_plan_t,
			"h_kom" => $this->input->post('nilai_assessment'), 
		);
		$this->db->insert('assessment', $data);
		$this->db->where('nik', $nik);
		$query = $this->db->get('karyawan')->row();

		return redirect("asesor/create_assessment/".$query->jabatan."/".$query->nik);
	}
	// end assessment

	// plantkompetensi
	public function data_plankompetensi()
	{
		$data['judul'] = 'Data Plan kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->kompetensi_m->get_all_pk();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/plan/data_plan', $data);
		$this->load->view('template_asesor/footer');
	}

	public function create_plan()
	{
		$data['judul'] = 'Create Plan';
		$data['nama'] = $this->session->userdata('nama');

		$data['plan'] = $this->kompetensi_m->get_all_plan();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/plan/create_plan', $data);
		$this->load->view('template_asesor/footer');
	}
	public function edit_plan($id_plan_t)
	{
		$data['judul'] = 'Create Plan';
		$data['nama'] = $this->session->userdata('nama');

		$data['plan'] = $this->kompetensi_m->get_all_plan();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$data['plan_kom'] = $this->kompetensi_m->get_kom($id_plan_t);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/plan/edit_plan', $data);
		$this->load->view('template_asesor/footer');
	}
	public function proses_tambah_plan()
	{

		$data = array(

			"plan_t" => $this->input->post('plan_t'),
			"target_p" => $this->input->post('target_p'),
		);
		$this->db->insert('plan_kom', $data);
		return redirect('admin/data_plankompetensi');
	}
	public function proses_edit_plan($id_plan_t)
	{
		$data = array(
			"plan_t" => $this->input->post('plan_t'),
			"target_p" => $this->input->post('target_p'),
		);
		$this->db->where('id_plan_t', $id_plan_t);
		$this->db->update('plan_kom', $data);
		return redirect('admin/data_plankompetensi');
	}
	public function delete_plan($id_plan_t)
	{
		$this->db->where('id_plan_t', $id_plan_t);
		$this->db->delete('plan_kom');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/data_plankompetensi');
	}

	// end plantkompetensi

	// pengembangan
	public function data_bidangpengembangan()
	{
		$data['judul'] = 'Create Plant';
		$data['nama'] = $this->session->userdata('nama');

		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/plant/create_plant', $data);
		$this->load->view('template_asesor/footer');
	}
	// end plantkompetensi

	public function data_jenisplan()
	{
		$data['judul'] = 'Data Jenis Plan';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->kompetensi_m->get_all_plan();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/jenis_plan/data_jenisplan', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_jenisplan()
	{
		$data['judul'] = 'Create Jenis Plan';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/jenis_plan/create_jenisplan', $data);
		$this->load->view('template_asesor/footer');
	}
	public function edit_jenisplan($id_plan)
	{
		$data['judul'] = 'Update Jenis Plan';
		$data['nama'] = $this->session->userdata('nama');
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$data['data'] = $this->kompetensi_m->get_row_plan($id_plan);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/jenis_plan/edit_jenisplan', $data);
		$this->load->view('template_asesor/footer');
	}
	public function proses_tambah_jenisplan()
	{
		$data = array(
			'nama_plan' => $this->input->post('nama_plan'),
			'kompetensi' => $this->input->post('kompetensi'),
		);
		$this->db->insert('plan', $data);
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('admin/data_jenisplan');
	}
	public function proses_edit_jenisplan($id_plan)
	{
		$data = array(
			'nama_plan' => $this->input->post('nama_plan'),
			'kompetensi' => $this->input->post('kompetensi'),
		);
		$this->db->where('id_plan', $id_plan);
		$this->db->update('plan', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('admin/data_jenisplan');
	}
	public function delete_jenisplan($id_plan)
	{
		$this->db->where('id_plan', $id_plan);
		$this->db->delete('plan');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/data_jenisplan');
	}
	// end jenisplant


	// data_levelkompetensi
	public function data_levelkompetensi()
	{
		$data['judul'] = 'Data Level Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_all_level();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/target_level/data_level', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_levelkompetensi()
	{
		$data['judul'] = 'Data Level Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['jab'] = $this->jabatan_m->get_all_jab();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/target_level/create_level', $data);
		$this->load->view('template_asesor/footer');
	}
	public function edit_levelkompetensi($id_lp)
	{
		$data['judul'] = 'Data Level Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['jab'] = $this->jabatan_m->get_all_jab();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$data['data'] = $this->kompetensi_m->get_row_level($id_lp);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('kompetensi/target_level/edit_level', $data);
		$this->load->view('template_asesor/footer');
	}
	public function proses_tambah_level_kom()
	{
		$data = array(
			"pk_level" => $this->input->post('pk_level', true),
			"lvl_jab" => $this->input->post('lvl_jab', true),
			"nilai_lp" => $this->input->post('nilai_lp', true),
		);
		$pk_level = $this->input->post('pk_level', true);
		$lvl_jab = $this->input->post('lvl_jab', true);
		$this->db->from('level_kom');
        $this->db->where('pk_level', $pk_level);
        $this->db->where('lvl_jab', $lvl_jab);
 		$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
			$this->session->set_flashdata('pesan', 'sudahada');
			return redirect('admin/data_levelkompetensi');
        }elseif($query->num_rows() < 1) {
			$this->db->insert('level_kom', $data);
			$this->session->set_flashdata('pesan', 'buat');
		return redirect('admin/data_levelkompetensi');
		}
		// var_dump($query->num_rows());
	}
	public function proses_edit_level_kom($id_lp)
	{
		$data = array(
			"pk_level" => $this->input->post('pk_level', true),
			"lvl_jab" => $this->input->post('lvl_jab', true),
			"nilai_lp" => $this->input->post('nilai_lp', true),
		);

		$this->db->where('id_lp', $id_lp);
		$this->db->update('level_kom', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('admin/data_levelkompetensi');
	}
	public function delete_level($id_lp)
	{
		$this->db->where('id_lp', $id_lp);
		$this->db->delete('level_kom');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/data_levelkompetensi');
	}
	// end data_levelkompetensi

	// Grade
	public function kompetensi_grade()
	{
		$data['judul'] = 'Data Grade';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['data'] = $this->grade_m->get_all_grade_kom();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/kompetensi_grade/data_kompetensi_grade', $data);
		$this->load->view('template_asesor/footer');
	}
	public function create_kompetensi_grade()
	{
		$data['judul'] = 'Create Grade Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['kompetensi'] = $this->kompetensi_m->get_all_kom();
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['data'] = $this->grade_m->get_all_grade();
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/kompetensi_grade/create_kompetensi_grade', $data);
		$this->load->view('template_asesor/footer');
	}
	
	public function edit_kompetensi_grade($id_grade)
	{
		$data['judul'] = 'Update Grade';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');

		$data['data'] = $this->grade_m->get_row_grade($id_grade);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/kompetensi_grade/kompetensi_edit_grade', $data);
		$this->load->view('template_asesor/footer');
	}
	public function view_penilaian_grade($grade_kode,$grade_sc)
	{
		$data['judul'] = 'Penilaian Grade Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');

		$data['data'] = $this->grade_m->get_all_grade_section($grade_sc);
		$data['data_sc'] = $this->grade_m->get_sc_grade($grade_kode);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/kompetensi_grade/view_penilaian_grade', $data);
		$this->load->view('template_asesor/footer');
	}
	public function nilai_grade_kompetensi()
	{
		$sec_grade = $this->input->post('section');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['nik_kar'] = $this->input->post('nik_kar');
		$data['section'] = $this->input->post('section');
		$data['judul'] = 'Create Grade Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['kompetensi'] = $this->kompetensi_m->get_all_kom();
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['data'] = $this->grade_m->get_grade_sec($sec_grade);
		$data['get_sec'] = $this->grade_m->get_grade_sec($sec_grade);
		$this->load->view('template_asesor/header', $data);
		$this->load->view('asesor_home/kompetensi_grade/penilaian_grade', $data);
		$this->load->view('template_asesor/footer');
	}
	public function penilaian_grade()
	{	$nilai =  $this->input->post('nilai');
		$random_number = rand(1,1000);
		$date = date("dmY");
		$kode = $date . $random_number;
		
		$data = array(
			'nik' => $this->input->post('nik_kar'),
			'tanggal_grade' => $this->input->post('tanggal'),
			'grade_sc' => $this->input->post('section'),
			'kode_nilai' => $kode,
		);
		$this->db->insert('grade_kom', $data);
		$this->session->set_flashdata('pesan', 'buat');
		foreach ($nilai as $t) {
			$data = array(
				'nilai_grade' =>  "1",
				'grade' => $t,
				'grade_kode' => $kode,
			);
			$this->db->insert('nilai_grade', $data);
			$this->session->set_flashdata('pesan', 'buat');
		}
		return redirect('asesor/kompetensi_grade');
	}
	public function proses_edit_kompetensi_grade($id_grade)
	{
		$data = array(
			'nama_grade' => $this->input->post('nama_grade'),
			'level_grade' => $this->input->post('level_grade'),
			'grade_section' => $this->input->post('grade_section')
		);
		$this->db->where('id_grade', $id_grade);
		$this->db->update('grade', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('asesor/kompetensi_grade');
	}
	public function delete_kompetensi_grade($id_grade)
	{
		$this->db->where('id_grade', $id_grade);
		$this->db->delete('grade');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('asesor/kompetensi_grade');
	}
	public function delete_kompetensi_grade_penilaian($kode_nilai)
	{
		$this->db->where('kode_nilai', $kode_nilai);
		$this->db->delete('grade_kom');
		$this->db->where('grade_kode', $kode_nilai);
		$this->db->delete('nilai_grade');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('asesor/kompetensi_grade');
	}
	//end grade


	// 
}
