<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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
		$this->load->model('ci_m');

		// $level_akun = $this->session->userdata('level');
		// if ($level_akun != "admin") {
		// 	return redirect('auth');
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
		$offset = $this->uri->segment(1);
		$data['data'] = $this->karyawan_m->get_data($perpage, $offset)->result();

		$config['base_url'] = site_url('admin/data_karyawan');
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

		$this->pagination->initialize($config);

		//end

		$data['judul'] = 'Data Karyawan';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data);
		$this->load->view('karyawan/data_karyawan');
		$this->load->view('template/footer');
	}

	public function search_data_karyawan()
	{
		$perpage = 8;
		$offset = $this->uri->segment(1);

		$cari = $this->input->post('cari');

		$data['data'] = $this->karyawan_m->cari_data($perpage, $offset, $cari)->result();

		$config['base_url'] = site_url('admin/search_data_karyawan');
		$config['total_rows'] = $this->karyawan_m->getRow($cari)->num_rows();
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

		$this->pagination->initialize($config);

		//end

		$data['judul'] = 'Data Karyawan';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data);
		$this->load->view('karyawan/data_karyawan');
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

		$data['judul'] = 'Add Karyawan';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('template/header', $data);
		$this->load->view('karyawan/view_karyawan');
		$this->load->view('template/footer');
	}
	public function edit_karyawan()
	{
		$data['judul'] = 'Update Karyawan';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('template/header', $data);
		$this->load->view('karyawan/input_karyawan');
		$this->load->view('template/footer');
	}
	public function proses_tambah_karyawan()
	{
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
			// 'foto' => $this->input->post('foto'),
			'level' => "user",
		);
		$this->db->insert('karyawan', $data);
		return redirect('admin/data_karyawan');
	}
	public function proses_edit_karyawan()
	{
		$data = array(
			'nama_dep' => $this->input->post('nama_dep')
		);
		$this->db->where('id_dep', $id_dep);
		$this->db->update('departement', $data);
		return redirect('admin/karyawan');
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
					// $cek = $this->karyawan_m->cek_nik(($sheetData[$i][0]));

					$nik = $sheetData[$i][0];
					$nama = $sheetData[$i][1];
					$section = $sheetData[$i][3];
					$jabatan = $sheetData[$i][5];
					$departement = $sheetData[$i][7];
					// looping insert data
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
				}
			}
		}
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
		return redirect('admin/departement');
	}
	public function proses_edit_dep($id_dep)
	{
		$data = array(
			'nama_dep' => $this->input->post('nama_dep')
		);
		$this->db->where('id_dep', $id_dep);
		$this->db->update('departement', $data);
		return redirect('admin/departement');
	}
	public function delete_departement($id_dep)
	{
		$this->db->where('id_dep', $id_dep);
		$this->db->delete('departement');
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
		return redirect('admin/section');
	}
	public function proses_edit_sec($id_sec)
	{
		$data = array(
			'nama_section' => $this->input->post('nama_section')
		);
		$this->db->where('id_sec', $id_sec);
		$this->db->update('section', $data);
		return redirect('admin/section');
	}
	public function delete_section($id_sec)
	{

		$this->db->where('id_sec', $id_sec);
		$this->db->delete('section');
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
			'nama_jab' => $this->input->post('nama_jab')
		);
		$this->db->insert('jabatan', $data);
		return redirect('admin/jabatan');
	}
	public function proses_edit_jab($id_jab)
	{
		$data = array(
			'nama_jab' => $this->input->post('nama_jab')
		);
		$this->db->where('id_jab', $id_jab);
		$this->db->update('jabatan', $data);
		return redirect('admin/jabatan');
	}
	public function delete_jab($id_jab)
	{

		$this->db->where('id_jab', $id_jab);
		$this->db->delete('jabatan');
		return redirect('admin/jabatan');
	}
	//end jabatan


	// continuesImprovement
	public function continuesimprovement()
	{
		$data['judul'] = 'Continues Improvement';
		$data['nama'] = $this->session->userdata('nama');

		$data['continuesimprovement'] = $this->ci_m->get_all_ci();
		$this->load->view('template/header', $data);
		$this->load->view('continuesimprovement/data_continuesimprovement');
		$this->load->view('template/footer');
	}
	// end continuesImprovement

}
