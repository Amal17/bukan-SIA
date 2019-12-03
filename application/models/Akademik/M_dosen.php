<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {
	public function get_dosen(){
		$this->db->select('id, nip, nama');
		$this->db->where('status', 1);
		$q = $this->db->get('dosen');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function get_dosen_byID($id){
		$this->db->select('id, nip, nama');
		$this->db->where('id', $id);
		$q = $this->db->get('dosen');
		return ($q->num_rows() > 0) ? $q->row() : 0 ;
	}

	public function ed_dosen($id, $data){
		$this->db->where('id', $id);
		$this->db->update('dosen', $data);
	}

	public function del_dosen($id){
		$this->db->where('id', $id);
		$this->db->update('dosen', array('status' => 0));
	}

	public function in_dosen($data){
		$this->db->insert('dosen', $data);
	}
}