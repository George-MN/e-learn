<?php
defined('BASEPATH') or exit('no direct access allowed ');
class Writercourses extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->helper('url');
	}
	function mycourse($id){
      $this->db->select('courseregister.registration_id,course.coursename,course.description,courseregister.coursecode,course.coursetype');
		$this->db->from('courseregister');
		$this->db->join('course','courseregister.coursecode=course.coursecode','left');
		$this->db->where('courseregister.user_id',$id);
		$query=$this->db->get();
		
			return $query->result_array();
		

	}
	function mytopics($code){
		$this->db->select('*');
		$this->db->from('topic');
		$this->db->where('coursecode',$code);
		$this->db->where('status',0);
		$this->db->order_by('topicnumber');
		$resultquery=$this->db->get();
		if($this->db->affected_rows()>0){
			return $resultquery->result_array();
		}
		else{
			return false;
		}
	}
	function deletetopic($code){
		$this->db->set('status',1);
		$this->db->where('topicid',$code);
		$this->db->update('topic');
		
		$this->db->select('*');
		$this->db->from('topic');
		$this->db->where('topicid',$code);
		$query=$this->db->get();
		$row=$query->row();
			$mycoursecode=$row->coursecode;
			

		return $mycoursecode;

	}
	function addtopic($insert){
		
		$this->db->insert('topic',$insert);
		
	}
	function topicvideodata($id){
		$this->db->select('*');
		$this->db->from('topic');
		$this->db->where('topicid',$id);
		$query=$this->db->get();

		return $query->result_array();



	}
	
}


?>