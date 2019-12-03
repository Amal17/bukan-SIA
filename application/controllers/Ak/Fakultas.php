<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {
	function __construct(){
        parent::__construct();
        if ($this->session->level !== 'akademik') {
        	redirect('');
        }
		$this->load->model('Akademik/m_fakultas', 'fakultas');
    }
    
    public function index(){
		$r = $this->fakultas->get_fakultas();
		$x = '';
		if ($r !== 0) {
			foreach ($r as $d) {
				$x .= '<tr><td>'.$d['id'].'</td><td>'.$d['kode'].'</td><td>'.$d['fakultas'].'</td><td><a href="'.base_url('ak/fakultas/up_fakultas/').$d['id'].'"><button type="button" class="btn btn-info"><i class="far fa-edit"></i> Edit</button></a> | <a href="#myModal" class="btn btn-danger trFak" data-id="'.$d['id'].'"data-toggle="modal"><i class="far fa-trash-alt"></i> Hapus</a></td></tr>';
			}	
		}
		$this->load->view('akademik/header');
		$this->load->view('akademik/fakultas', array('x' => $x));
		$this->load->view('akademik/footer');
	}

	public function up_fakultas($id){
		$r = $this->fakultas->get_fak_byID($id);
		$this->load->view('akademik/header');
		$this->load->view('akademik/ed_fakultas', array('d' => $r));
		$this->load->view('akademik/footer');
	}

	public function ed_fakultas(){
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$fakultas = $this->input->post('fakultas');

		$data = array('kode' => $kode, 'fakultas' => $fakultas);
		$this->fakultas->ed_fakultas($id, $data);

		redirect('ak/fakultas');
	}

	public function del_fakultas($id){
		$this->fakultas->del_fakultas($id);
		redirect('ak/fakultas');
	}

	public function in_fakultas(){
		$this->load->view('akademik/header');
		$this->load->view('akademik/in_fakultas');
		$this->load->view('akademik/footer');
	}

	public function tambah_fakultas(){
		$kode = $this->input->post('kode');
		$fakultas = $this->input->post('fakultas');
		$data = array('kode' => $kode, 'fakultas' => $fakultas);
		$this->fakultas->in_fakultas($data);
		redirect('ak/fakultas');
	}
}