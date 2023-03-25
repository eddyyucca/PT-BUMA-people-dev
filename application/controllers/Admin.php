<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SebastianBergmann\Timer\Duration;

class Admin extends CI_Controller
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
		$this->load->helper(array('url'));
		$level_akun = $this->session->userdata('level');
		// if ($level_akun != "admin") {
		// 	$this->session->set_flashdata('login', 'n_login');
		// 	return redirect('login');
		// }
	}


	public function index()
	{
		$data['judul'] = 'PT. BUMA - SITE IPR';
		$data['nama'] = $this->session->userdata('nama');
		$data['total_karyawan'] = $this->karyawan_m->jumlah_karyawan();
		$data['total_section'] = $this->section_m->jumlah_section();
		$data['total_jabatan'] = $this->jabatan_m->jumlah_jabatan();
		$data['total_departement'] = $this->departement_m->jumlah_departement();
		$this->load->view('template/header', $data);
		$this->load->view('home/home');
		$this->load->view('template/footer');
	}
	// karyawan
	public function data_karyawan($num = '')
	{

		$perpage = 8;
		$offset = $this->uri->segment(3);
		$data['data'] = $this->karyawan_m->get_data($perpage, $offset)->result();
		$config['base_url'] = site_url('admin/data_karyawan/');
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

		$this->load->view('template/header', $data);
		$this->load->view('karyawan/data_karyawan', $data, $pagination);
		$this->load->view('template/footer');
	}

	public function search_data_karyawan($num = '')
	{
		$perpage = 8;
		$offset = $this->uri->segment(3);
		$cari = $this->input->post('cari');
		$data['data'] = $this->karyawan_m->cari_data($perpage, $offset, $cari)->result();
		$config['base_url'] = site_url('admin/search_data_karyawan');
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

		$this->load->view('template/header', $data);
		$this->load->view('karyawan/data_karyawan', $data, $pagination);
		$this->load->view('template/footer');
	}
	public function add_karyawan()
	{
		// dep,sec,jab
		$data['dep'] = $this->departement_m->get_all_dep();
		$data['sec'] = $this->section_m->get_all_sec();
		$data['jab'] = $this->jabatan_m->get_all_jab();

		$data['judul'] = 'Add Karyawan';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('template/header', $data);
		$this->load->view('karyawan/input_karyawan');
		$this->load->view('template/footer');
	}
	public function view_karyawan($nik)
	{
		// dep,sec,jab

		$data['data'] = $this->karyawan_m->get_view_kar($nik);

		$data['judul'] = 'Profil Karyawan';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('template/header', $data);
		$this->load->view('karyawan/view_karyawan');
		$this->load->view('template/footer');
	}
	public function edit_karyawan($nik)
	{
		$data['judul'] = 'Update Karyawan';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->karyawan_m->get_view_kar($nik);
		$this->load->view('template/header', $data);
		$this->load->view('karyawan/input_karyawan');
		$this->load->view('template/footer');
	}
	public function proses_tambah_karyawan()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[karyawan.nik]');
		if ($this->form_validation->run() === FALSE) {
			$this->add_karyawan();
		} else {
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
				'foto' => $file1['orig_name'],
				'level' => "user",
			);
			$this->db->insert('karyawan', $data);
			$this->session->set_flashdata('pesan', 'buat');
			return redirect('admin/data_karyawan');
		}
	}
	public function proses_edit_karyawan($nik)
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[karyawan.nik]');
		if ($this->form_validation->run() === FALSE) {
			$this->edit_karyawan($nik);
		} else {
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
				'level' => "user",
			);
			$this->db->where('nik', $nik);
			$this->db->update('karyawan', $data);
			$this->session->set_flashdata('pesan', 'ubah');
			return redirect('admin/data_karyawan');
		}
	}
	public function import()
	{

		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
			$arr_file = explode('.', $_FILES['file']['name']);
			$extension = end($arr_file);
			if ('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif ('xls' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			if (!empty($sheetData)) {
				for ($i = 1; $i < count($sheetData); $i++) {
					// $cek = $this->karyawan_m->cek_nik(115);

					$nik = $sheetData[$i][0];
					$nama = $sheetData[$i][1];
					$section = $sheetData[$i][3];
					$jabatan = $sheetData[$i][5];
					$departement = $sheetData[$i][7];
					// looping insert data
					$cek = $this->karyawan_m->cek_nik(($sheetData[$i][0]));
					if ($cek == false) {
						$data = array(
							'nik' => $nik,
							'nama' => $nama,
							'section' => $section,
							'jabatan' => $jabatan,
							'departement' => $departement,
							'password' => md5('12345678'),
							'level' => 'user',
						);
						$this->db->insert('karyawan', $data);
					} elseif ($cek == true) {
						$data2 = array(
							'nik' => $nik,
							'nama' => $nama,
							'section' => $section,
							'jabatan' => $jabatan,
							'departement' => $departement,
						);
						$this->db->where('$nik', $nik);
						$this->db->update('karyawan', $data2);
					}
				}
			}
		}
		$this->session->set_flashdata('pesan', 'import');
		return redirect('admin/data_karyawan');
	}
	public function upload_config($path)
	{
		if (!is_dir($path))
			mkdir($path, 0777, TRUE);
		$config['upload_path'] 		= './' . $path;
		$config['allowed_types'] 	= 'csv|CSV|xlsx|XLSX|xls|XLS';
		$config['max_filename']	 	= '255';
		$config['encrypt_name'] 	= TRUE;
		$config['max_size'] 		= 4096;
		$this->load->library('upload', $config);
	}



	// end karyawan

	// departement
	public function departement()
	{
		$data['judul'] = 'Data Departement';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->departement_m->get_all_dep();
		$this->load->view('template/header', $data);
		$this->load->view('departement/data_departement', $data);
		$this->load->view('template/footer');
	}
	public function create_departement()
	{
		$data['judul'] = 'Create Departement';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data);
		$this->load->view('departement/create_departement', $data);
		$this->load->view('template/footer');
	}
	public function edit_departement($id_dep)
	{
		$data['judul'] = 'Update Departement';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->departement_m->get_row_dep($id_dep);
		$this->load->view('template/header', $data);
		$this->load->view('departement/edit_departement', $data);
		$this->load->view('template/footer');
	}
	public function proses_tambah_dep()
	{
		$data = array(
			'nama_dep' => $this->input->post('nama_dep')
		);
		$this->db->insert('departement', $data);
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('admin/departement');
	}
	public function proses_edit_dep($id_dep)
	{
		$data = array(
			'nama_dep' => $this->input->post('nama_dep')
		);
		$this->db->where('id_dep', $id_dep);
		$this->db->update('departement', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('admin/departement');
	}
	public function delete_departement($id_dep)
	{
		$this->db->where('id_dep', $id_dep);
		$this->db->delete('departement');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/departement');
	}
	// end departement

	// section
	public function section()
	{
		$data['judul'] = 'Data Section';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->section_m->get_all_sec();
		$this->load->view('template/header', $data);
		$this->load->view('section/data_section', $data);
		$this->load->view('template/footer');
	}
	public function create_section()
	{
		$data['judul'] = 'Create Section';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data);
		$this->load->view('section/create_section', $data);
		$this->load->view('template/footer');
	}
	public function edit_section($id_sec)
	{
		$data['judul'] = 'Update Section';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->section_m->get_row_sec($id_sec);
		$this->load->view('template/header', $data);
		$this->load->view('section/edit_section', $data);
		$this->load->view('template/footer');
	}
	public function proses_tambah_section()
	{
		$data = array(
			'nama_sec' => $this->input->post('nama_sec')
		);
		$this->db->insert('section', $data);
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('admin/section');
	}
	public function proses_edit_sec($id_sec)
	{
		$data = array(
			'nama_section' => $this->input->post('nama_section')
		);
		$this->db->where('id_sec', $id_sec);
		$this->db->update('section', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('admin/section');
	}
	public function delete_section($id_sec)
	{

		$this->db->where('id_sec', $id_sec);
		$this->db->delete('section');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/section');
	}
	// end section

	// jabatan
	public function jabatan()
	{
		$data['judul'] = 'Data jabatan';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->jabatan_m->get_all_jab();
		$this->load->view('template/header', $data);
		$this->load->view('jabatan/data_jabatan', $data);
		$this->load->view('template/footer');
	}
	public function create_jabatan()
	{
		$data['judul'] = 'Create jabatan';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data);
		$this->load->view('jabatan/create_jabatan', $data);
		$this->load->view('template/footer');
	}
	public function edit_jabatan($id_jab)
	{
		$data['judul'] = 'Update jabatan';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->jabatan_m->get_row_jab($id_jab);
		$this->load->view('template/header', $data);
		$this->load->view('jabatan/edit_jabatan', $data);
		$this->load->view('template/footer');
	}
	public function proses_tambah_jab()
	{
		$data = array(
			'nama_jab' => $this->input->post('nama_jab'),
			'level' => $this->input->post('level')
		);
		$this->db->insert('jabatan', $data);
		$this->session->set_flashdata('pesan', 'buat');
		return redirect('admin/jabatan');
	}
	public function proses_edit_jab($id_jab)
	{
		$data = array(
			'nama_jab' => $this->input->post('nama_jab'),
			'level' => $this->input->post('level')
		);
		$this->db->where('id_jab', $id_jab);
		$this->db->update('jabatan', $data);
		$this->session->set_flashdata('pesan', 'ubah');
		return redirect('admin/jabatan');
	}
	public function delete_jab($id_jab)
	{

		$this->db->where('id_jab', $id_jab);
		$this->db->delete('jabatan');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/jabatan');
	}
	//end jabatan


	// continuesImprovement
	public function continuesimprovement()
	{
		$data['judul'] = 'Continues Improvement';
		$data['nama'] = $this->session->userdata('nama');
		$data['alert'] = false;

		$data['continuesimprovement'] = $this->ci_m->get_all_ci();
		$this->load->view('template/header', $data);
		$this->load->view('continuesimprovement/data_continuesimprovement', $data);
		$this->load->view('template/footer');
	}
	public function create_continuesimprovement()
	{
		$data['judul'] = 'Continues Improvement';
		$data['nama'] = $this->session->userdata('nama');

		$data['kar'] = $this->karyawan_m->get_all_kar();
		$this->load->view('template/header', $data);
		$this->load->view('continuesimprovement/create_continuesimprovement', $data);
		$this->load->view('template/footer');
	}
	public function update_continuesimprovement($nik, $pembuat)
	{
		$data['judul'] = 'Continues Improvement';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->ci_m->get_row_ci($pembuat);
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$this->load->view('template/header', $data);
		$this->load->view('continuesimprovement/edit_continuesimprovement', $data);
		$this->load->view('template/footer');
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
		return redirect('admin/continuesimprovement');
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
		return redirect('admin/continuesimprovement');
	}

	public  function delete_continuesimprovement($kode_tim)
	{
		$this->db->where('tim', $kode_tim);
		$this->db->delete('continuesimprovement');
		$this->db->where('kode_tim', $kode_tim);
		$this->db->delete('citt');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/continuesimprovement');
	}
	// end continuesImprovement

	// jenisKompetensi
	public function data_jeniskompetensi()
	{
		$data['judul'] = 'Data kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/jenis_kompetensi/data_kompetensi', $data);
		$this->load->view('template/footer');
	}
	public function create_kompetensi()
	{
		$data['judul'] = 'Create Kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/jenis_kompetensi/create_kompetensi', $data);
		$this->load->view('template/footer');
	}
	public function edit_kompetensi($id_kom)
	{
		$data['judul'] = 'Update kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_row_kom($id_kom);
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/jenis_kompetensi/edit_kompetensi', $data);
		$this->load->view('template/footer');
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
		$this->load->view('template/header', $data);
		$this->load->view('task_kompetensi/data_taskkompetensi', $data);
		$this->load->view('template/footer');
	}
	public function view_taskkompetensi($id_jab)
	{
		$data['judul'] = 'Data kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_row_level_kar($id_jab);
		$this->load->view('template/header', $data);
		$this->load->view('task_kompetensi/view_taskkompetensi', $data);
		$this->load->view('template/footer');
	}
	public function create_task_kompetensi()
	{
		$data['judul'] = 'Create Task Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['kompetensi'] = $this->kompetensi_m->get_all_kom();
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$this->load->view('template/header', $data);
		$this->load->view('task_kompetensi/create_taskkompetensi', $data);
		$this->load->view('template/footer');
	}
	public function view_kompetensi($nik)
	{
		$data['judul'] = 'Create Task Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_all_level();
		$this->load->view('template/header', $data);
		$this->load->view('task_kompetensi/view_kompetensi', $data);
		$this->load->view('template/footer');
	}
	
	public function update_task_kompetensi($id_kompetensi)
	{
		$data['judul'] = 'Update Task Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->task_kompetensi_m->get_row_tk($id_kompetensi);
		$data['jabatan'] = $this->jabatan_m->get_all_jab();
		$data['kompetensi'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template/header', $data);
		$this->load->view('task_kompetensi/edit_taskkompetensi', $data);
		$this->load->view('template/footer');
	}
	public function proses_tambah_task_kompetensi()
	{
		$data = array(
			'nik_kar' => $this->input->post('xp'),
			'date_kom' => date("Y-m-d"),
		);
		$nik = $this->input->post('xp');
		$date_kom = date("Y-m-d");
		$this->db->from('kompetensi_user');
        $this->db->where('nik_kar', $nik);
        $this->db->where('date_kom', $date_kom);
 		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			$this->session->set_flashdata('pesan', 'buat');
			return redirect('admin/task_kompetensi');
		}elseif($query->num_rows() < 1) {
			$this->db->insert('kompetensi_user', $data);
			$this->session->set_flashdata('pesan', 'sudahada');
			return redirect('admin/task_kompetensi');
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
		return redirect('admin/task_kompetensi');
	}
	public function delete_task_kompetensi($id_kompetensi)
	{
		$this->db->where('id_kompetensi', $id_kompetensi);
		$this->db->delete('kompetensi_user');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/task_kompetensi');
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
	
	// end task_kompetensi

	// suggestionsystem
	public function suggestionsystem()
	{
		$data['judul'] = 'Data Suggestion system';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->suggestionsystem_m->get_all_ss();
		$this->load->view('template/header', $data);
		$this->load->view('suggestionsystem/data_suggestionsystem', $data);
		$this->load->view('template/footer');
	}
	public function create_suggestionsystem()
	{
		$data['judul'] = 'Create Task suggestionsystem';
		$data['nama'] = $this->session->userdata('nama');

		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['section'] = $this->section_m->get_all_sec();

		$data['suggestionsystem'] = $this->suggestionsystem_m->get_all_ss();
		$this->load->view('template/header', $data);
		$this->load->view('suggestionsystem/create_suggestionsystem', $data);
		$this->load->view('template/footer');
	}
	public function update_suggestionsystem($id_ss)
	{
		$data['judul'] = 'Update Task suggestionsystem';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->suggestionsystem_m->get_row_ss($id_ss);
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['section'] = $this->section_m->get_all_sec();
		$this->load->view('template/header', $data);
		$this->load->view('suggestionsystem/edit_suggestionsystem', $data);
		$this->load->view('template/footer');
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
		return redirect('admin/suggestionsystem');
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
		return redirect('admin/suggestionsystem');
	}
	public function delete_suggestionsystem($id_ss)
	{
		$this->db->where('id_ss', $id_ss);
		$this->db->delete('suggestionsystem');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/suggestionsystem');
	}
	// end suggestionsystem

	// asesor
	public function data_asesor($num = '')
	{

		$perpage = 8;
		$offset = $this->uri->segment(3);
		$data['data'] = $this->karyawan_m->get_data_asesor($perpage, $offset)->result();
		$config['base_url'] = site_url('admin/asesor/');
		$config['total_rows'] = $this->karyawan_m->get_allassesor()->num_rows();
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
		$data['judul'] = 'Data Asesor';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data);
		$this->load->view('asesor/data_asesor', $data, $pagination);
		$this->load->view('template/footer');
	}


	public function ubah_asesor()
	{
		$data['judul'] = 'Data Asesor';
		$data['nama'] = $this->session->userdata('nama');
		$data['kar'] = $this->karyawan_m->getAll_user();
		$this->load->view('template/header', $data);
		$this->load->view('asesor/ubah_asesor', $data);
		$this->load->view('template/footer');
	}
	public function proses_ubah_asesor()
	{
		$data = array(
			"level" => "asesor"
		);

		$nik = $this->input->post('nik');
		$this->db->where('nik', $nik);
		$this->db->update('karyawan', $data);

		$this->session->set_flashdata('pesan', 'update');
		return redirect('admin/data_asesor');
	}
	public function proses_ubah_admin()
	{
		$data = array(
			"level" => "admin"
		);

		$nik = $this->input->post('nik');
		$this->db->where('nik', $nik);
		$this->db->update('karyawan', $data);

		$this->session->set_flashdata('pesan', 'update');
		return redirect('admin/data_asesor');
	}
	// end asesor
	// user
	public function proses_ubah_user()
	{
		$data = array(
			"level" => "user"
		);
		// 10034026
		$nik = $this->input->post('nik');
		$this->db->where('nik', $nik);
		$this->db->update('karyawan', $data);

		$this->session->set_flashdata('pesan', 'update');
		return redirect('admin/data_asesor');
	}
	// end user

	// training
	public function training()
	{
		$data['judul'] = 'Data Training';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->training_m->get_all_tra();
		$this->load->view('template/header', $data);
		$this->load->view('training/data_training', $data);
		$this->load->view('template/footer');
	}
	public function create_training()
	{
		$data['judul'] = 'Data Training';
		$data['nama'] = $this->session->userdata('nama');
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$this->load->view('template/header', $data);
		$this->load->view('training/create_training', $data);
		$this->load->view('template/footer');
	}
	public function edit_training($id_training)
	{
		$data['judul'] = 'Data Training';
		$data['nama'] = $this->session->userdata('nama');
		$data['kar'] = $this->karyawan_m->get_all_kar();
		$data['data'] = $this->training_m->get_row_tra($id_training);

		$this->load->view('template/header', $data);
		$this->load->view('training/edit_training', $data);
		$this->load->view('template/footer');
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
		return redirect('admin/training');
	}
	public function proses_edit_training()
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
		return redirect('admin/training');
	}
	public function delete_training($id_training)
	{
		$get = $this->training_m->get_row_tra($id_training);
		unlink($_SERVER['DOCUMENT_ROOT'] . '/assets/sertifikat_training/' . $get->training_foto);
		$this->db->where('id_training', $id_training);
		$this->db->delete('training');
		$this->session->set_flashdata('pesan', 'hapus');
		return redirect('admin/training');
	}
	// end training

	// assessment
	public function assessment()
	{
		$data['judul'] = 'Data assessment';
		$data['nama'] = $this->session->userdata('nama');		
		$data['data'] = $this->task_kompetensi_m->get_all_tk();
		$this->load->view('template/header', $data);
		$this->load->view('assessment/data_assessment', $data);
		$this->load->view('template/footer');
	}
	public function create_assessment($id_jab)
	{
		$data['judul'] = 'Data assessment';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_row_level_kar($id_jab);
		$this->load->view('template/header', $data);
		$this->load->view('assessment/create_assessment', $data);
		$this->load->view('template/footer');
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

		$this->load->view('template/header', $data);
		$this->load->view('assessment/edit_assessment', $data);
		$this->load->view('template/footer');
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
		return redirect('admin/assessment');
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
		return redirect('admin/assessment');
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

	// end assessment

	// plantkompetensi
	public function data_plankompetensi()
	{
		$data['judul'] = 'Data Plan kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->kompetensi_m->get_all_pk();
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/plan/data_plan', $data);
		$this->load->view('template/footer');
	}

	public function create_plan()
	{
		$data['judul'] = 'Create Plan';
		$data['nama'] = $this->session->userdata('nama');

		$data['plan'] = $this->kompetensi_m->get_all_plan();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/plan/create_plan', $data);
		$this->load->view('template/footer');
	}
	public function edit_plan($id_plan_t)
	{
		$data['judul'] = 'Create Plan';
		$data['nama'] = $this->session->userdata('nama');

		$data['plan'] = $this->kompetensi_m->get_all_plan();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$data['plan_kom'] = $this->kompetensi_m->get_kom($id_plan_t);
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/plan/edit_plan', $data);
		$this->load->view('template/footer');
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
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/plant/create_plant', $data);
		$this->load->view('template/footer');
	}
	// end plantkompetensi

	public function data_jenisplan()
	{
		$data['judul'] = 'Data Jenis Plan';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->kompetensi_m->get_all_plan();
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/jenis_plan/data_jenisplan', $data);
		$this->load->view('template/footer');
	}
	public function create_jenisplan()
	{
		$data['judul'] = 'Create Jenis Plan';
		$data['nama'] = $this->session->userdata('nama');
		$data['data'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/jenis_plan/create_jenisplan', $data);
		$this->load->view('template/footer');
	}
	public function edit_jenisplan($id_plan)
	{
		$data['judul'] = 'Update Jenis Plan';
		$data['nama'] = $this->session->userdata('nama');
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$data['data'] = $this->kompetensi_m->get_row_plan($id_plan);
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/jenis_plan/edit_jenisplan', $data);
		$this->load->view('template/footer');
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
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/target_level/data_level', $data);
		$this->load->view('template/footer');
	}
	public function create_levelkompetensi()
	{
		$data['judul'] = 'Data Level Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['jab'] = $this->jabatan_m->get_all_jab();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/target_level/create_level', $data);
		$this->load->view('template/footer');
	}
	public function edit_levelkompetensi($id_lp)
	{
		$data['judul'] = 'Data Level Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['jab'] = $this->jabatan_m->get_all_jab();
		$data['kom'] = $this->kompetensi_m->get_all_kom();
		$data['data'] = $this->kompetensi_m->get_row_level($id_lp);
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/target_level/edit_level', $data);
		$this->load->view('template/footer');
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
}
