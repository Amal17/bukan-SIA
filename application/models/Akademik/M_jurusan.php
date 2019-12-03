<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurusan extends CI_Model {
	public function get_jurusan(){
		$this->db->select('j.id, j.kode, j.jurusan, f.kode as fak');
		$this->db->where('j.status', 1);
		$this->db->where('j.id_fakultas = f.id');
		$q = $this->db->get('jurusan j, fakultas f');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function get_jur_byID($id){
		$this->db->select('id, kode, id_fakultas, jurusan');
		$this->db->where('id', $id);
		$q = $this->db->get('jurusan');
		return ($q->num_rows() > 0) ? $q->row() : 0 ;
	}

	public function ed_jurusan($id, $data){
		$this->db->where('id', $id);
		$this->db->update('jurusan', $data);
	}

	public function del_jurusan($id){
		$this->db->where('id', $id);
		$this->db->update('jurusan', array('status' => 0));
	}

	public function in_jurusan($data){
		$this->db->insert('jurusan', $data);
	}

	public function get_fak(){
		$this->db->select('id, kode');
		$q = $this->db->get('fakultas');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;	
	}
}