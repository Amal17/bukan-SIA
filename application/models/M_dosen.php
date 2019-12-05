<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {
	public function get_kelas(){
		$id = $this->session->id_dosen;
		$q = $this->db->get_where('kelas', ['dosen'=>$id]);
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function get_mahasiswa($mk){
		$dosen = $this->session->id_dosen;
		
		$this->db->select('m.id, m.nim, m.nama, n.nilai');
		$this->db->where('k.mk', $mk);
		$this->db->where('k.dosen', $dosen);
		$this->db->where('m.nim = k.nim');
		$this->db->where('m.nim = n.nim');
		$this->db->where('k.mk = n.mk');
		$q = $this->db->get('krs k, mahasiswa m, khs n');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function save_nilai($nim, $mk, $nilai){
		$this->db->set('nilai', $nilai);
		$this->db->where('nim', $nim);
		$this->db->where('mk', $mk);
		$this->db->update('khs');
	}
}