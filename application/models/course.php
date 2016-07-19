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
      $this->db->select('courseregister.registration_id,course.coursename,courseregister.coursecode,course.coursetype');
		$this->db->from('courseregister');
		$this->db->join('course','courseregister.coursecode=course.coursecode','left');
		$this->db->where('courseregister.user_id',$studentid);
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
	function registercourse($regdata,$coursecode){
		$checkresult=$this->checkcourse($coursecode);
          if($checkresult==0){
          	$this->db->insert('courseregister',$regdata);
          	if($this->db->affected_rows()>0){
			return $this->db->affected_rows();

		}
		else{
			return false;
		}
          }
          else{
          	return false;
          }
		
		
		

	}
	function checkcourse($code){
		$userid=($this->session->userdata['logged_in']['userid']);
		$this->db->select('coursecode');
		$this->db->from('courseregister');
		$this->db->where('coursecode',$code);
		$this->db->where('user_id',$userid);
		$query=$this->db->get();
		if($this->db->affected_rows()>0){
			return $this->db->affected_rows();

		}
		else{
			return false;
		}
		

	}
}
  ?>