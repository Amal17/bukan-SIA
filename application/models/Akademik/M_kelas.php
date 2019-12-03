<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {
	public function input($data){
		$this->db->insert('kelas', $data);
	}

	public function get($id, $ta){
		$this->db->select('id, dosen, kelas');
		$this->db->where('tahun_ajaran', $ta);
		$q = $this->db->get('kelas');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;	
	}
}