<?php 
defined('BASEPATH') or exit('no direct access allowed');
class Quizes extends CI_model{
	function __construct(){
		parent:: __construct();

	}
	function getmyquizes(){
		$userid=($this->session->userdata['logged_in']['userid']);
        $this->db->select('*');
        $this->db->from('myquizes');
        $this->db->where('user_id',$userid);
        $myquery=$this->db->get();
        return $myquery->result_array();
	}
	function question1($quizid){
		$this->db->select('*');
		$this->db->from('quiz_questions');
		$this->db->where('question_number',1);
		$this->db->where('quiz_id',$quizid);
		$query=$this->db->get();
		return $query->result_array();
	}
	function checkanswer($quizid,$qnum){
		$this->db->select('*');
		$this->db->from('quiz_questions');
		$this->db->where('question_number',$qnum);
		$this->db->where('quiz_id',$quizid);
		$query=$this->db->get();
		$row=$query->row();
			$correct=$row->correct;
			return $query;

	}
	function getmaxqestnum($quizid){
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
	function getquestion($quizid,$next){
		$this->db->select('*');
		$this->db->from('quiz_questions');
		$this->db->where('question_number',$next);
		$this->db->where('quiz_id',$quizid);
		$query=$this->db->get();
		return $query->result_array();
	}
	function insertscore($score){
		$this->db->insert('quizscore',$score);
	}
	function updatescore($userid,$quizid){
		$this->db->select('score');
		$this->db->from('quizscore');
		$this->db->where('quizid',$quizid);
		$this->db->where('user_id',$userid);
        $query=$this->db->get();
		$row = $query->row();
		$availscore =$row->score;

        $finscore=$availscore+5;
		$this->db->set('score',$finscore);
		$this->db->where('user_id',$userid);
		$this->db->where('quizid',$quizid);
		$this->db->update('quizscore');
	}
	function checkwhetherdone($quizid,$userid){
		$this->db->select('score');
		$this->db->from('quizscore');
		$this->db->where('quizid',$quizid);
		$this->db->where('user_id',$userid);
        $query=$this->db->get();
		$row = $query->row();
		if($row){
		$availscore = $row->score;
		return $availscore;
		 }
		 else{
		 	return false;
		 }
	}
	function viewmyresult($vid){
		$userid=($this->session->userdata['logged_in']['userid']);
	    $this->db->select('*');
		$this->db->from('quizscore');
		$this->db->join('quiz','quizscore.quizid=quiz.quizid');
		$this->db->join('users','quizscore.user_id=users.user_id');
		$this->db->where('quizscore.quizid',$vid);
		$this->db->where('quizscore.user_id',$userid);
		$query=$this->db->get();
		return $query->result_array();
	}
	function getallquiz(){
		$userid=($this->session->userdata['logged_in']['userid']);
	    $this->db->select('*');
		$this->db->from('quizscore');
		$this->db->join('quiz','quizscore.quizid=quiz.quizid');
		$this->db->join('users','quizscore.user_id=users.user_id');
		$this->db->where('quizscore.user_id',$userid);
		$query=$this->db->get();
		return $query->result_array();
	}

}
?>