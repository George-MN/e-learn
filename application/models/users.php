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
	function checkem($email,$password){
		$this->db->select('email,user_id,usertype,username');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->limit(1);
		$query= $this->db->get();
		if($query->num_rows()==1){
			$userdet = array('user_id' =>$email ,
			                 'email' =>$email,
			                 'username'=> $email,
			                 'category'=>1,
			                 'password'=>'password' );
			$this->db->insert('users',$userdet);
			return true;
		}
		else{
			return false;
		}

	}
}



?>