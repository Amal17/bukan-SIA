<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	function __construct(){
        parent::__construct();
        if ($this->session->level !== 'akademik') {
        	redirect('');
        }
		$this->load->model('Akademik/m_mahasiswa', 'mahasiswa');
		$this->load->model('Akademik/m_kelas', 'kelas');
		$this->load->model('Akademik/m_jurusan', 'jurusan');
        $this->load->model('Akademik/m_dosen', 'dosen');
    }

    public function index(){
    	$t = $this->mahasiswa->get_tahun()->kode;
    	$ta = $this->mahasiswa->get_tahun()->id;
    	$r = $this->mahasiswa->get_jurusan();
        $q = $this->dosen->get_dosen();

        $s = $this->mahasiswa->status_krs();
    	if ($r !== 0) {
    		$j = '';
    		foreach ($r as $k) {
    			$j .= '<option value="'.$k['id'].'">'.$k['jurusan'].'</option>';
    		}
    	} else {
    		$j = '<option>Lengkapi Master Fakultas dan Jurusan</option>';
    	}

        if ($q !== 0) {
            $d = '';
            foreach ($q as $k) {
                $d .= '<option value="'.$k['id'].'">'.$k['nama'].'</option>';
            }
        } else {
            $d = '<option>Lengkapi Master Dosen</option>';
        }            
        
        if ($s == 0) {
            $cs = '<option value="0" selected>Tutup</option><option value="1">Buka</option>';
        } else {
            $cs = '<option value="0">Tutup</option><option value="1" selected>Buka</option>';
        }  

    	$this->load->view('akademik/header');
		$this->load->view('akademik/kelas', array('t'=>$t, 'j'=>$j, 'ta'=>$ta, 'd'=>$d, 'cs'=>$cs));
		$this->load->view('akademik/footer');
    }

    public function tambah(){
    	$jurusan = $this->input->post('jurusan');
    	$ta = $this->input->post('ta');
    	$kelas = $this->input->post('kelas');
        $dosen = $this->input->post('dosen');
        $sks = $this->input->post('sks');

    	$data = ['jurusan'=>$jurusan, 'tahun_ajaran'=>$ta, 'kelas'=>$kelas, 'dosen'=>$dosen, 'sks'=>$sks];
    	$this->kelas->input($data);
    	redirect('ak/kelas');
    }

    public function tampil(){
    	$jurusan = $this->input->post('jurusan');
    	$ta = $this->input->post('ta');
    	$j = $this->jurusan->get_jur_byID($jurusan);
    	$r = $this->kelas->get($jurusan, $ta);
    	
    	$x = '';
    	if ($r !== 0) {
    		foreach ($r as $d) {
    			$x .= '<tr><td>'.$d['id'].'</td><td>'.$d['kelas'].'</td><td>'.$d['sks'].'</td><td>'.$d['dosen'].'</td><td><a href="#"'.base_url('ak/kelas/up_kelas/').$d['id'].'"><button type="button" class="btn btn-info"><i class="far fa-edit"></i> Edit</button></a> | <a href="#"#myModal" class="btn btn-danger trKel" data-id="'.$d['id'].'"data-toggle="modal"><i class="far fa-trash-alt"></i> Hapus</a></td></tr>';
    		}
    	}

    	$this->load->view('akademik/header');
		$this->load->view('akademik/v_kelas', ['x'=>$x, 'j'=>$j->jurusan]);
		$this->load->view('akademik/footer');
    }

    public function status_krs(){
        $this->kelas->up_krs($this->input->post('status'));
        redirect('ak/kelas');
    }
}