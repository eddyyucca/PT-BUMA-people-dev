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
		$this->load->model('kompetensi_m');
		$this->load->model('ci_m');
		$this->load->model('task_kompetensi_m');

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
		return redirect('admin/continuesimprovement');
	}

	public  function delete_continuesimprovement($kode_tim)
	{
		$this->db->where('tim', $kode_tim);
		$this->db->delete('continuesimprovement');
		$this->db->where('kode_tim', $kode_tim);
		$this->db->delete('citt');
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
		$this->load->view('kompetensi/data_kompetensi', $data);
		$this->load->view('template/footer');
	}
	public function create_kompetensi()
	{
		$data['judul'] = 'Create Kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/create_kompetensi', $data);
		$this->load->view('template/footer');
	}
	public function edit_kompetensi($id_kom)
	{
		$data['judul'] = 'Update kompetensi';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->kompetensi_m->get_row_kom($id_kom);
		$this->load->view('template/header', $data);
		$this->load->view('kompetensi/edit_kompetensi', $data);
		$this->load->view('template/footer');
	}
	public function proses_tambah_kom()
	{
		$data = array(
			'j_kompetensi' => $this->input->post('j_kompetensi')
		);
		$this->db->insert('kompetensi', $data);
		return redirect('admin/data_jeniskompetensi');
	}
	public function proses_edit_kom($id_kom)
	{
		$data = array(
			'j_kompetensi' => $this->input->post('j_kompetensi')
		);
		$this->db->where('id_kom', $id_kom);
		$this->db->update('kompetensi', $data);
		return redirect('admin/data_jeniskompetensi');
	}
	public function delete_kompetensi($id_kom)
	{
		$this->db->where('id_kom', $id_kom);
		$this->db->delete('kompetensi');
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
	public function create_task_kompetensi()
	{
		$data['judul'] = 'Create Task Kompetensi';
		$data['nama'] = $this->session->userdata('nama');
		$data['jabatan'] = $this->jabatan_m->get_all_jab();
		$data['kompetensi'] = $this->kompetensi_m->get_all_kom();
		$this->load->view('template/header', $data);
		$this->load->view('task_kompetensi/create_taskkompetensi', $data);
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
			'jabatan' => $this->input->post('jabatan'),
			'kompetensi' => $this->input->post('kompetensi'),
			't_kompetensi' => $this->input->post('t_kompetensi'),
			'level_kom' => $this->input->post('level'),
		);
		$this->db->insert('kompetensi_user', $data);
		return redirect('admin/task_kompetensi');
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
		return redirect('admin/task_kompetensi');
	}
	public function delete_task_kompetensi($id_kompetensi)
	{
		$this->db->where('id_kompetensi', $id_kompetensi);
		$this->db->delete('kompetensi_user');
		return redirect('admin/task_kompetensi');
	}
	// end task_kompetensi
}
