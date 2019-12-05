<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('m_mahasiswa', 'mhs');
    }

	public function index(){
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('mahasiswa/footer');
	}

	public function v_krs_off(){
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/krs_off');
		$this->load->view('mahasiswa/footer');
	}

	public function v_krs(){
		$p = $this->mhs->status_krs();
		if ($p == 0) {
			$this->v_krs_off();
			// exit();
		}

		$r = $this->mhs->get_krs();
		if ($r !== 0) {
			$x = '';
			$i = 0;
			foreach ($r as $d) {
				$x .= '<tr><td>'.$d['id'].'</td><td>'.$d['kelas'].'</td><td>'.$d['nama'].'</td><td><input type="checkbox" value="'.$d['id'].'" name="tes'.$i.'"></td></tr>';
				$i++;
			}
			$x .= '<input type="text" hidden value="'.$i.'" name="max"></input>';
		} else {
			$x = 'Tidak Ada data';
		}
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/krs', ['x'=>$x]);
		$this->load->view('mahasiswa/footer');
	}

	public function v_khs(){
		$r = $this->mhs->get_khs();
		if ($r !== 0) {
			$x = '';
			$i = 1;
			$tot_sks = 0;
			$tot_nilai = 0;
			foreach ($r as $d) {
				if ($d['nilai'] == 'A') {
					$angka = 4;
				} else if ($d['nilai'] == 'B+') {
					$angka = 3.5;
				} else if ($d['nilai'] == 'B') {
					$angka = 3;
				} else if ($d['nilai'] == 'C+') {
					$angka = 2.5;
				} else if ($d['nilai'] == 'C') {
					$angka = 2;
				} else if ($d['nilai'] == 'D+') {
					$angka = 1.5;
				} else if ($d['nilai'] == 'D') {
					$angka = 1;
				} else if ($d['nilai'] == 'E+') {
					$angka = 0.5;
				} else if ($d['nilai'] == 'E') {
					$angka = 0;
				}
				$x .= '<tr><td>'.$i.'</td><td>'.$d['kelas'].'</td><td>'.$d['nama'].'</td><td>'.$d['sks'].'</td><td>'.$d['nilai'].'</td><td>'.$angka.'</td><td>'.$angka*$d['sks'].'</td></tr>';
				$tot_sks += $d['sks'];
				$tot_nilai += $angka*$d['sks'];
				$i++;
			}
			$x .= '<tr><td><strong>IP</strong>:</td><td>'.$tot_nilai/$tot_sks.'</td><td><strong>Total SKS:</strong></td><td>'.$tot_sks.'</td><td></td><td><strong>Total Nilai</strong></td><td>'.$tot_nilai.'</td></tr>';
		} else {
			$x = 'Tidak Ada data';
		}
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/khs', ['x'=>$x]);
		$this->load->view('mahasiswa/footer');
	}

	public function krs(){
		$max = $this->input->post('max');
		$id = $this->session->nim;
		if (isset($max)){
			for ($i=0; $i<$max ; $i++) { 
				$x = $this->input->post('tes'.''.$i);
				if (isset($x)) {
					$this->mhs->save_krs($id, $x);
				}
			}
		}
		redirect('mahasiswa');
	}

}