<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_dosen', 'dsn');
    }

	public function index(){
		$this->load->view('dosen/header');
		$this->load->view('dosen/home');
		$this->load->view('dosen/footer');
	}

	public function v_nilai(){
		$r = $this->dsn->get_kelas();

		if ($r !== 0) {
			$j = '';
    		foreach ($r as $k) {
    			$j .= '<option value="'.$k['id'].'">'.$k['kelas'].'</option>';
    		}
    	} else {
    		$j = '<option>Tidak Ada Kelas</option>';
    	}
		$this->load->view('dosen/header');
		$this->load->view('dosen/nilai', ['k'=>$j]);
		$this->load->view('dosen/footer');
	}

	public function tampil_nilai(){
		$kelas = $this->input->post('kelas');
		$r = $this->dsn->get_kelas();

		if ($r !== 0) {
			$j = '';
    		foreach ($r as $k) {
    			$j .= '<option value="'.$k['id'].'">'.$k['kelas'].'</option>';
    		}
    	} else {
    		$j = '<option>Tidak Ada Kelas</option>';
    	}

		$r = $this->dsn->get_mahasiswa($kelas);
		if ($r !== 0) {
			$m = '';
			$i = 0;
    		foreach ($r as $k) {
    			$m .= '<tr><td>'.$k['id'].'</td><td>'.$k['nim'].'</td><td>'.$k['nama'].'</td><td><input type="text" name="nilai'.$i.'" value="'.$k['nilai'].'"><input type="text" name="nim'.$i.'" hidden value="'.$k['nim'].'"></td></tr>';
    			$i++;
    		}
    		$m .= '<input type="text" name="max" hidden value="'.$i.'"><input type="text" name="mk" hidden value="'.$kelas.'">';
    	} else {
    		$m = 'Tidak Ada Mahasiswa';
    	}
		
		$this->load->view('dosen/header');
		$this->load->view('dosen/nilai_mahasiswa', ['k'=>$j, 'm'=>$m]);
		$this->load->view('dosen/footer');
	}

	public function save_nilai(){
		$n = $this->input->post('max');
		$kelas = $this->input->post('mk');

		if (isset($n)) {
			for ($i=0; $i<$n ; $i++) { 
				$nim = $this->input->post('nim'.''.$i);
				$nilai = $this->input->post('nilai'.''.$i);
				$this->dsn->save_nilai($nim, $kelas, $nilai);
			}
		}
		redirect('dosen/v_nilai');
	}
}