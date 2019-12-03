<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	function __construct(){
        parent::__construct();
        if ($this->session->level !== 'akademik') {
        	redirect('');
        }
		$this->load->model('Akademik/m_jurusan', 'jurusan');
    }

    public function index(){
		$r = $this->jurusan->get_jurusan();
		$x = '';
		if ($r !== 0) {
			foreach ($r as $d) {
				$x .= '<tr><td>'.$d['id'].'</td><td>'.$d['kode'].'</td><td>'.$d['jurusan'].'</td><td>'.$d['fak'].'</td><td><a href="'.base_url('ak/jurusan/up_jurusan/').$d['id'].'"><button type="button" class="btn btn-info"><i class="far fa-edit"></i> Edit</button></a> | <a href="#myModal" class="btn btn-danger trJur" data-id="'.$d['id'].'"data-toggle="modal"><i class="far fa-trash-alt"></i> Hapus</a></td></tr>';
			}	
		}
		$this->load->view('akademik/header');
		$this->load->view('akademik/jurusan', array('x' => $x));
		$this->load->view('akademik/footer');
	}

	public function up_jurusan($id){
		$r = $this->jurusan->get_jur_byID($id);
		$f = $this->jurusan->get_fak();
		$c = '';
		if ($f !== 0) {
			foreach ($f as $k) {
				$s = ($r->id_fakultas == $k['id']) ? 'selected' : '';
				$c .= '<option '.$s.' value="'.$k['id'].'">'.$k['kode'].'</option>';
			}
		} else {
			$c = '<option selected>Insert Fakultas Dulu</option>';
		}
		$this->load->view('akademik/header');
		$this->load->view('akademik/ed_jurusan', array('d' => $r, 'c' => $c));
		$this->load->view('akademik/footer');
	}

	public function ed_jurusan(){
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$jur = $this->input->post('jurusan');
		$fak = $this->input->post('fakultas');

		$data = array('kode' => $kode, 'jurusan' => $jur, 'id_fakultas' => $fak);
		$this->jurusan->ed_jurusan($id, $data);

		redirect('ak/jurusan');
	}

	public function del_jurusan($id){
		$this->jurusan->del_jurusan($id);
		redirect('ak/jurusan');
	}

	public function in_jurusan(){
		$f = $this->jurusan->get_fak();
		$c = '';
		if ($f !== 0) {
			foreach ($f as $k) {
				$c .= '<option value="'.$k['id'].'">'.$k['kode'].'</option>';
			}
		} else {
			$c = '<option selected>Insert Fakultas Dulu</option>';
		}
		$this->load->view('akademik/header');
		$this->load->view('akademik/in_jurusan', array('c' => $c));
		$this->load->view('akademik/footer');
	}

	public function tambah_jurusan(){
		$kode = $this->input->post('kode');
		$jur = $this->input->post('jurusan');
		$fak = $this->input->post('fakultas');
		$data = array('kode' => $kode, 'jurusan' => $jur, 'id_fakultas' => $fak);
		$this->jurusan->in_jurusan($data);
		redirect('ak/jurusan');
	}
}