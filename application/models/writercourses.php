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

		return $query;

	}
	function topicname($code){
		$this->db->select('topicname');
		$this->db->from('topic');
		$this->db->where('topicid',$code);
		$query=$this->db->get();
		$row=$query->row();
		$topicname=$row->topicname;
		return $topicname;
	}
	function uploadtext($myvalues){
        $this->db->insert('text',$myvalues);
	}
	function alltopics(){
		$code=$this->session->userdata['logged_in']['username'];

		$this->db->select('topic.topicname,topic.topicid,course.coursecode');
		$this->db->from('topic');
		$this->db->join('course','course.coursecode=topic.coursecode','inner');
		$this->db->where('topic.topicauthor',$code);
		$this->db->order_by('coursecode');
		$query=$this->db->get();
		if($this->db->affected_rows()>0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
	function uploadassignment($myvalues){
		$this->db->insert('assignment',$myvalues);

	}
	function updateassignment($text,$id){

      $this->db->set('assignment',$text);
		$this->db->where('assignmentid',$id);
		$this->db->update('assignment');
	}
	function getassignmentid($topicid){
        $this->db->select('*');
        $this->db->from('assignment');
        $this->db->where('topicid',$topicid);
        $this->db->order_by('assignmentid','desc');
        $this->db->limit(1);
        $query=$this->db->get();
        // $row=$query->row();
        // $assignmentid=$row->assignmentid;
        return $query->result_array();
	}

	
}


?>