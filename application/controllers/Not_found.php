<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Not_found extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('not_found');
    }
}
