<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('home/home');
		$this->load->view('template/footer');
	}
}
