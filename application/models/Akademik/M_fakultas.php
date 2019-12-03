<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fakultas extends CI_Model {
	public function get_fakultas(){
		$q = $this->db->get_where('fakultas', array('status' => 1));
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function get_fak_byID($id){
		$this->db->select('id, kode, fakultas');
		$this->db->where('id', $id);
		$q = $this->db->get('fakultas');
		return ($q->num_rows() > 0) ? $q->row() : 0 ;
	}

	public function ed_fakultas($id, $data){
		$this->db->where('id', $id);
		$this->db->update('fakultas', $data);
	}

	public function del_fakultas($id){
		$this->db->where('id', $id);
		$this->db->update('fakultas', array('status' => 0));
	}

	public function in_fakultas($data){
		$this->db->insert('fakultas', $data);
	}
}