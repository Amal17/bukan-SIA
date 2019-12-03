<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	function __construct(){
        parent::__construct();
        if ($this->session->level !== 'akademik') {
        	redirect('');
        }
		$this->load->model('Akademik/m_dosen', 'dosen');
    }
    public function index(){
		$r = $this->dosen->get_dosen();
		$x = '';
		if ($r !== 0) {
			foreach ($r as $d) {
				$x .= '<tr><td>'.$d['id'].'</td><td>'.$d['nip'].'</td><td>'.$d['nama'].'</td><td><a href="'.base_url('ak/dosen/up_dosen/').$d['id'].'"><button type="button" class="btn btn-info"><i class="far fa-edit"></i> Edit</button></a> | <a href="#myModal" class="btn btn-danger trash" data-id="'.$d['id'].'"data-toggle="modal"><i class="far fa-trash-alt"></i> Hapus</a></td></tr>';
			}	
		}
		$this->load->view('akademik/header');
		$this->load->view('akademik/dosen', array('x' => $x));
		$this->load->view('akademik/footer');
	}

	public function up_dosen($id){
		$r = $this->dosen->get_dosen_byID($id);
		$this->load->view('akademik/header');
		$this->load->view('akademik/ed_dosen', array('d' => $r));
		$this->load->view('akademik/footer');	
	}

	public function ed_dosen(){
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');

		$data = array('nip' => $nip, 'nama' => $nama);
		$this->dosen->ed_dosen($id, $data);

		redirect('ak/dosen');
	}

	public function del_dosen($id){
		$this->dosen->del_dosen($id);
		redirect('ak/dosen');
	}

	public function in_dosen(){
		$this->load->view('akademik/header');
		$this->load->view('akademik/in_dosen');
		$this->load->view('akademik/footer');
	}

	public function tambah_dosen(){
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$data = array('nip' => $nip, 'nama' => $nama);
		$this->dosen->in_dosen($data);
		redirect('ak/dosen');
	}

	public function ed_pass(){
		$id = $this->input->post('id');
		$pass = $this->input->post('pass');
		$data = array('id' => $id, 'password' => md5($pass));
		$this->dosen->ed_dosen($id, $data);
		redirect('ak/dosen');	
	}
}