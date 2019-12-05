<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {
	public function input($data){
		$this->db->insert('kelas', $data);
	}

	public function get($id, $ta){
		$this->db->select('k.id, d.nama as dosen, k.kelas, k.sks');
		$this->db->where('tahun_ajaran', $ta);
		$this->db->where('jurusan', $id);
		$this->db->where('d.id = k.dosen');
		$q = $this->db->get('kelas k, dosen d');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;	
	}

	public function up_krs($s){
		$this->db->set('st', $s);
		$this->db->where('ket', 'krs');
		$this->db->update('config');
	}
}