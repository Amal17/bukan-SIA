<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {
	public function get_krs(){
		$this->db->select('k.id, d.nama, k.kelas');
		$this->db->where('jurusan', $this->session->jurusan);
		$this->db->where('k.dosen = d.id');
		$q = $this->db->get('kelas k, dosen d');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function save_krs($id, $mk){
		$d = $this->get_dosen_byID($mk);
		$this->db->insert('krs', ['nim'=>$id, 'mk'=>$mk, 'dosen'=>$d]);
		$this->save_nilai(['nim'=>$id, 'mk'=>$mk]);
	}

	public function save_nilai($data){
		$this->db->insert('khs', $data);
	}

	public function get_dosen_byID($id){
		$this->db->select('dosen');
		$this->db->where('id', $id);
		$q = $this->db->get('kelas');
		return ($q->num_rows() > 0) ? $q->row()->dosen : 0 ;
	}

	public function get_khs(){
		$this->db->select('k.kelas, k.sks, d.nama, n.nilai');
		$this->db->where('n.nim', $this->session->nim);
		$this->db->where('n.mk = k.id');
		$this->db->where('k.dosen = d.id');
		$q = $this->db->get('khs n, kelas k, dosen d');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function status_krs(){
		$q = $this->db->get_where('config', ['ket'=>'krs']);
		return ($q->num_rows() > 0) ? $q->row()->st : 0 ;
	}
}