<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_auth');
		if ($this->session->level == 'akademik') {
			redirect('akademik');
		} elseif ($this->session->level == 'dosen') {
			redirect('dosen');
		} elseif ($this->session->level == 'mahasiswa') {
			redirect('mahasiswa');
		}
    }

	public function index(){
		$this->load->view('login');
	}

	public function login(){
		$user = $this->input->post('user');
		$pass = $this->input->post('password');

		$r = $this->m_auth->get_auth_akademik($user, $pass);
		if ($r == 0) {
			$r = $this->m_auth->get_auth_dosen($user, $pass);
			if ($r == 0) {
				$r = $this->m_auth->get_auth_mahasiswa($user, $pass);
				if ($r == 0) {
					redirect('');
				} else {
					//Login mahasiswa
					$this->session->set_userdata('id_mahasiswa', $r->id);
					$this->session->set_userdata('nim', $r->nim);
					$this->session->set_userdata('level', 'mahasiswa');
					redirect('mahasiswa');
				}
			} else {
				//Login Dosen
				$this->session->set_userdata('id_dosen', $r->id);
				$this->session->set_userdata('nip', $r->nip);
				$this->session->set_userdata('level', 'dosen');
				redirect('dosen');
			}
		} else {
			//Login Akademik
			$this->session->set_userdata('id_akademik', $r->id);
			$this->session->set_userdata('user', $r->user);
			$this->session->set_userdata('level', 'akademik');
			redirect('akademik');
		}
	}
}
