<?php

class users extends CI_Model{
	function login($email,$password){
		$this->db->select('email,user_id,usertype,username');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$this->db->limit(1);

		$query= $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}
		else{
			return false;
		}
	}
}



?>