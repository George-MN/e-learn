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
	function faqs(){
		$code=$this->session->userdata['logged_in']['username'];
		$this->db->select('*');
		$this->db->from('faqs');
		$myquery=$this->db->get();

		return $myquery->result_array();

	}
	function addfaqs($faqd){
		$this->db->insert('faqs',$faqd);
	}
	function uploadvid($videodetails){
		$this->db->insert('video',$videodetails);
	}
	function uploadpdf($pdfdetails){
		$this->db->insert('pdf',$pdfdetails);
	}
	function uploadaudio($audiodetails){
		$this->db->insert('audio',$audiodetails);
	}
	function View_assignment(){
		$userid=$this->session->userdata['logged_in']['username'];
		$this->db->select('*');
        $this->db->from('assignment');
        $this->db->join('topic','assignment.topicid=topic.topicid');
        $this->db->where('userid',$userid);
        $this->db->order_by('assignmentid','desc');
        $query=$this->db->get();
        // $row=$query->row();
        // $assignmentid=$row->assignmentid;
        return $query->result_array();
	}
	function allassignment($code){
		$this->db->select('*');
        $this->db->from('assignmentsub');
        $this->db->join('users','assignmentsub.userid=users.user_id');
        $this->db->where('assignmentid',$code);
        $this->db->order_by('assignmentsubid','desc');
        $query=$this->db->get();
        // $row=$query->row();
        // $assignmentid=$row->assignmentid;
        return $query->result_array();

	}
	function quiz_details_insert($inputs,$topicid){
		$this->db->insert('quiz',$inputs);

		$this->db->select('quizid');
		$this->db->from('quiz');
		$this->db->where('topicid',$topicid);
		$this->db->order_by('quizid','desc');
		$this->db->limit(1);
		$query=$this->db->get();
		$row=$query->row();
		$quizid=$row->quizid;
		return $quizid;

	}
	function question_insert($quiz_question,$quizid){
		$this->db->insert('quiz_questions',$quiz_question);

	}
	function getmaxquestion($quizid){
		$this->db->select('num_questions');
		$this->db->from('quiz');
		$this->db->where('quizid',$quizid);
		$this->db->order_by('num_questions','desc');
		$this->db->limit(1);
		$query=$this->db->get();
		$row = $query->row();
		$maxque =$row->num_questions;
		return $maxque;

	}
	function getquizname($quizid){
		$this->db->select('quizname');
		$this->db->from('quiz');
		$this->db->where('quizid',$quizid);
		$query=$this->db->get();
		$row = $query->row();
		$quizname =$row->quizname;
		return $quizname;
	}
	function getquizquestions($viewid){
		$this->db->select('*');
		$this->db->from('quiz_questions');
		$this->db->where('quiz_id',$viewid);
		$query=$this->db->get();
		return $query->result_array();
	}
	function getallquiz(){
	$userid= $this->session->userdata['logged_in']['userid'];
	$this->db->SELECT('*')  ;
	$this->db->from('topic'); 
    $this->db->JOIN('quiz','topic.topicid=quiz.topicid');  
    $this->db->JOIN('courseregister','topic.coursecode=courseregister.coursecode');
    $this->db->WHERE('courseregister.user_id',$userid);
    $query=$this->db->get();
    return $query->result_array();
	}
	function quizreport($report){
		$this->db->select('*');
		$this->db->from('quizscore');
		$this->db->join('quiz','quizscore.quizid=quiz.quizid');
		$this->db->join('users','quizscore.user_id=users.user_id');
		$this->db->where('quizscore.quizid',$report);
		$query=$this->db->get();
		return $query->result_array();
	}
	function getusersenrolled($code){
		$this->db->select('*');
		$this->db->from('courseregister');
		$this->db->join('users','courseregister.user_id=users.user_id');
		$this->db->where('coursecode',$code);
		$this->db->where('usertype',1);
		$query=$this->db->get();
		return $query->result_array();
	}


 

	
}


?>