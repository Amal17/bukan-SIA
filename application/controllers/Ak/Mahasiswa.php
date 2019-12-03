<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	function __construct(){
        parent::__construct();
        if ($this->session->level !== 'akademik') {
        	redirect('');
        }
		$this->load->model('Akademik/m_mahasiswa', 'mahasiswa');
    }

    public function index(){
    	$r = $this->mahasiswa->get_jurusan();
    	$t = $this->mahasiswa->get_tahun()->kode;
    	$a = $this->mahasiswa->get_angkatan();
    	if ($r !== 0) {
    		$j = '';
    		foreach ($r as $k) {
    			$j .= '<option value="'.$k['id'].'">'.$k['jurusan'].'</option>';
    		}
    	} else {
    		$j = '<option>Lengkapi Master Fakultas dan Jurusan</option>';
    	}
    	if ($a !== 0) {
    		$an = '';
    		foreach ($a as $k) {
    			$an .= '<option value="'.$k['tahun'].'">'.$k['tahun'].'</option>';
    		}
    	} else {
    		$an = '<option>Lengkapi Master Tahun Angkatan</option>';
    	}
    	$this->load->view('akademik/header');
		$this->load->view('akademik/mahasiswa', array('j'=>$j, 't'=>$t, 'a'=>$an));
		$this->load->view('akademik/footer');
	}

	public function tampil(){
		$angkatan = $this->input->post('angkatan');
		$jurusan = $this->input->post('jurusan');
		$r = $this->mahasiswa->get_mahasiswa($angkatan, $jurusan);

		$x = '';
		if ($r !== 0) {
			foreach ($r as $d) {
				$x .= '<tr><td>'.$d['id'].'</td><td>'.$d['nim'].'</td><td>'.$d['nama'].'</td></tr>';
			}
		} 
		$this->load->view('akademik/header');
		$this->load->view('akademik/v_mahasiswa', array('d'=>$x));
		$this->load->view('akademik/footer');
	}

	public function tambah(){
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('jurusan');
		
		$t = $this->mahasiswa->get_tahun()->tahun;
		$no = $this->mahasiswa->get_nim($jurusan, $t);
		$nim_jur = ($jurusan < 10) ? '0'.$jurusan : $jurusan;
		$nim_no = ($no<100) ? '0'.$no : ($no<10) ? '00'.$no : $no;
		$nim = $t.$nim_jur.$nim_no; 
		$data = array('nim'=>$nim,'nama'=>$nama,'angkatan'=>$t,'jurusan'=>$jurusan);
		$this->mahasiswa->in_mahasiswa($data);
		redirect('ak/mahasiswa');
	}
}