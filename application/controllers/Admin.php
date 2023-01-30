<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

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
}
