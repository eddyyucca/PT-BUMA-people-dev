<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
		// $this->load->model('alumni_m');

		// $level_akun = $this->session->userdata('level');
		// if ($level_akun != "admin") {
		// 	return redirect('auth');
		// }
	}


	public function index()
	{
		$data['judul'] = 'PT. BUMA - SITE IPR';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('template/header', $data);
		$this->load->view('home/home');
		$this->load->view('template/footer');
	}
	// karyawan
	public function data_karyawan()
	{
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
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jk' => $this->input->post('jk'),
			'tempat' => $this->input->post('tempat'),
			'ttl' => $this->input->post('ttl'),
			'alamat' => $this->input->post('alamat'),
			'agama' => $this->input->post('agama'),
			'email' => $this->input->post('email'),
			'telpon' => $this->input->post('telpon'),
			'section' => $this->input->post('section'),
			'jabatan' => $this->input->post('jabatan'),
			'departement' => $this->input->post('departement'),
			'foto' => $this->input->post('foto'),
		);
		$this->db->insert('karyawan', $data);
		return redirect('admin/karyawan');
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
			'nama_section' => $this->input->post('nama_section')
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


}
