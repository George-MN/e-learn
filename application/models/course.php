<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->helper('url');
	}
	function allcourses(){
		// $this->db->select('coursename','category','coursecode','duration','testNo');
		// $this->db->from('course');
		$query=$this->db->get('course');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		
		
	}
	function mycourses($studentid){
      $this->db->select('registration_id,coursename,coursecode,coursetype');
		$this->db->from('courseregister');
		$this->db->where('user_id',$studentid);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else{
			return false;
		}
    

	}

	function getCourseByCode($courseCode)
	{
		$this->db->select('duration, coursetype');
		$this->db->from('course');
		$this->db->where('coursecode',$courseCode);
		$query=$this->db->get();
		return $query->result_array();
	}

	function content($code){
		 $this->db->select('text');
		$this->db->from('text');
		$this->db->where('textid',$code);
		$query=$this->db->get();
		return $query->result_array();

	}
	function registercourse($coursecode,$user_id){
		$this->db->insert('coursecode','user_id');
		$this->db->into('courseregister');
		$this->db->values($coursecode,$user_id);
		$query=$this->db->get();
		if($query){
			
		}

	}
}
  ?>