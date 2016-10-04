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
      $this->db->select('courseregister.registration_id,course.coursename,course.description,courseregister.coursecode,course.coursetype');
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
		$userid= $this->session->userdata['logged_in']['userid'];
		$this->db->select('topicid, topicnumber');
		$this->db->from('session');
		$this->db->where('coursecode',$code);
		$this->db->where('user_id',$userid);
		$query=$this->db->get();
		if($this->db->affected_rows()>0){
			// print_r($query);
			// echo $query['topicid'][1];
			//echo "huree";
			$row=$query->row();
			$topic=$row->topicid;
			$topicnum=$row->topicnumber;

	    $this->db->select('text,topicid,topicnumber');
		$this->db->from('text');
		$this->db->where('topicid',$topic);
		$this->db->where('topicnumber',$topicnum);
		$query1=$this->db->get();
        //echo $this->db->affected_rows();
		return $query1->result_array();
         }
		
         else{
         	
        $this->db->select('topic.topicid,text.text,text.topicnumber');
		$this->db->from('topic');
		$this->db->join('text','text.topicid=topic.topicid', 'right');
		$this->db->where('topic.coursecode',$code);
		$this->db->limit(1);
		$query2=$this->db->get();
		return $query2->result_array();
         }
		

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
	function videos(){
		$this->db->select('*');
		$this->db->from('video');
		$this->db->where('topicid',1);
		$muquery=$this->db->get();
		if($this->db->affected_rows()>0){
			 
			return $muquery->result_array();
		}
		else{
			return false;
		}
	}
	function alltopics($code){
		$this->db->select('*');
		$this->db->from('topic');
		$this->db->where('coursecode',$code);
		$this->db->order_by('topicnumber');
		$resultquery=$this->db->get();
		if($this->db->affected_rows()>0){
			return $resultquery->result_array();
		}
		else{
			return false;
		}
	}
	function textcontent($code){
		

	    $this->db->select('*');
		$this->db->from('text');
		$this->db->where('topicid',$code);
		$query1=$this->db->get();
       if($this->db->affected_rows()>0){
			return $query1->result_array();
		}
		else{
			return false;
		}
         }
     
}
  ?>