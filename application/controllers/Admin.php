<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('departement_m');
		// $this->load->model('lowongan_m');
		// $this->load->model('admin_m');
		// $this->load->model('alumni_m');

		// $level_akun = $this->session->userdata('level');
		// if ($level_akun != "admin") {
		// 	return redirect('auth');
		// }
	}


	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('home/home');
		$this->load->view('template/footer');
	}
	public function data_karyawan()
	{
		$this->load->view('template/header');
		$this->load->view('karyawan/data_karyawan');
		$this->load->view('template/footer');
	}
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
		$data['judul'] = 'Data Departement';
		$data['nama'] = $this->session->userdata('nama');

		$this->load->view('template/header', $data, $data);
		$this->load->view('departement/create_departement', $data, $data);
		$this->load->view('template/footer');
	}
	public function edit_departement($id_dep)
	{
		$data['judul'] = 'Data Departement';
		$data['nama'] = $this->session->userdata('nama');

		$data['data'] = $this->departement_m->get_row_dep($id_dep);
		$this->load->view('template/header', $data);
		$this->load->view('departement/edit_departement', $data);
		$this->load->view('template/footer');
	}
	public function proses_tambah_dep()
	{
		$data = array(
			'nama_dep' => $this->input->post('nama_dep'),
			'status_dep' => '1',
		);
		$this->db->insert('departement', $data);
		return redirect('admin/departement');
	}
	public function proses_edit_dep($id_dep)
	{
		$data = array(
			'nama_dep' => '0',
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
}
