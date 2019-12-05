<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {
	public function get_jurusan(){
		$this->db->select('id, jurusan');
		$q = $this->db->get('jurusan');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function get_tahun(){
		$this->db->select('id, kode, tahun');
		$this->db->where('status', 1);
		$q = $this->db->get('tahun_ajar');
		return ($q->num_rows() > 0) ? $q->row() : 0 ;
	}

	public function get_angkatan(){
		$this->db->select('tahun');
		$this->db->distinct();
		$q = $this->db->get('tahun_ajar');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function get_nim($jurusan, $tahun){
		$this->db->select('count(nim) as nim');
		$this->db->where('jurusan', $jurusan);
		$this->db->where('angkatan', $tahun);
		$q = $this->db->get('mahasiswa');
		return ($q->num_rows() > 0) ? $q->row()->nim+1 : 0 ;
	}

	public function in_mahasiswa($data){
		$this->db->insert('mahasiswa', $data);
	}

	public function get_mahasiswa($angkatan,$jurusan){
		$this->db->select('id, nim, nama');
		$this->db->where('angkatan', $angkatan);
		$this->db->where('jurusan', $jurusan);
		$q = $this->db->get('mahasiswa');
		
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;	
	}

	public function status_krs(){
		$q = $this->db->get_where('config', ['ket'=>'krs']);
		return ($q->num_rows() > 0) ? $q->row()->st : 0 ;
	}
}