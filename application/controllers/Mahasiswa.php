<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_mahasiswa');
    }

	public function index(){
		$this->load->view('mahasiswa/home');
	}
}