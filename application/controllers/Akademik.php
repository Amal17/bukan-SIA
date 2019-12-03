<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {
	function __construct(){
        parent::__construct();
        if ($this->session->level !== 'akademik') {
        	redirect('');
        }
    }

    public function index(){
		$this->load->view('akademik/header');
		$this->load->view('akademik/home');
		$this->load->view('akademik/footer');
	}
}