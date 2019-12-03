<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tahun extends CI_Model {
	public function get_tahun(){
		$q = $this->db->get('tahun_ajar');
		return ($q->num_rows() > 0) ? $q->result_array() : 0 ;
	}

	public function get_tahun_byID($id){
		$q = $this->db->get_where('tahun_ajar', array('id'=>$id));
		return ($q->num_rows() > 0) ? $q->row() : 0 ;
	}

	public function ed_tahun($id, $data){
		$this->db->where('id', $id);
		$this->db->update('tahun_ajar', $data);
	}

	public function in_tahun($data){
		$this->db->insert('tahun_ajar', $data);
	}
}
