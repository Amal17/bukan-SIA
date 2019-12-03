<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAjar extends CI_Controller {
	function __construct(){
        parent::__construct();
        if ($this->session->level !== 'akademik') {
        	redirect('');
        }
		$this->load->model('Akademik/m_tahun', 'ta');
    }
    public function index(){
		$r = $this->ta->get_tahun();
		$x = '';
		if ($r !== 0) {
			foreach ($r as $d) {
				$status = ($d['status'] == 0) ? 'Non Aktif' : 'Aktif';
				$semester = ($d['semester'] == 0) ? 'Genap' : 'Ganjil';
				$x .= '<tr><td>'.$d['id'].'</td><td>'.$d['kode'].'</td><td>'.$d['tahun'].'</td><td>'.$semester.'</td><td>'.$status.'</td><td><a href="'.base_url('ak/TahunAjar/up_tahun/').$d['id'].'"><button type="button" class="btn btn-info"><i class="far fa-edit"></i> Edit</button></a></td></tr>';
			}	
		}
		$this->load->view('akademik/header');
		$this->load->view('akademik/tahun', array('x' => $x));
		$this->load->view('akademik/footer');
	}

	public function up_tahun($id){
		$r = $this->ta->get_tahun_byID($id);
		$sm = ($r->semester == 0) ? '<option value="0" selected>Genap</option><option value="1">Ganjil</option>' : '<option value="0">Genap</option><option value="1" selected>Ganjil</option>';
		$st = ($r->status == 0) ? '<option value="0" selected>Non Aktif</option><option value="1">Aktif</option>' : '<option value="0">Non Aktif</option><option value="1" selected>Aktif</option>';
		$this->load->view('akademik/header');
		$this->load->view('akademik/ed_tahun', array('d'=>$r,'sm'=>$sm,'st'=>$st));
		$this->load->view('akademik/footer');
	}

	public function ed_tahun(){
		$id = $this->input->post('id');
		$t = $this->input->post('tahun');
		$s = $this->input->post('semester');
		$st = $this->input->post('status');
		$k = ($s == 0) ? $t.'/2' : $t.'/1';

		$data = array('kode'=>$k, 'tahun'=>$t, 'semester'=>$s, 'status'=>$st);
		$this->ta->ed_tahun($id, $data);

		redirect('ak/TahunAjar');
	}

	public function in_tahun(){
		$this->load->view('akademik/header');
		$this->load->view('akademik/in_tahun');
		$this->load->view('akademik/footer');
	}

	public function tambah_tahun(){
		$t = $this->input->post('tahun');
		$s = $this->input->post('semester');
		$k = ($s == 0) ? $t.'/2' : $t.'/1';
		$data = array('kode'=>$k, 'tahun'=>$t, 'semester'=>$s);
		$this->ta->in_tahun($data);
		redirect('ak/TahunAjar');
	}
}