<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	public function get_auth_akademik($user, $pass){
		$q = $this->db->get_where('akademik', array('user' => $user, 'password' => md5($pass)));
		return ($q->num_rows() > 0) ? $q->row() : 0 ;
	}

	public function get_auth_dosen($user, $pass){
		$q = $this->db->get_where('dosen', array('nip' => $user, 'password' => md5($pass)));
		return ($q->num_rows() > 0) ? $q->row() : 0 ;
	}

	public function get_auth_mahasiswa($user, $pass){
		$q = $this->db->get_where('mahasiswa', array('nim' => $user, 'password' => md5($pass)));
		return ($q->num_rows() > 0) ? $q->row() : 0 ;
	}
}