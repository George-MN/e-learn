<?php 
defined('BASEPATH') or exit('No direct access allowed');
class Quiz extends CI_controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('quizes');
	}
	function myquiz(){
		$data['myquizes']=$this->quizes->getmyquizes();
		$this->load->view('admin/allquiz_user',$data);

        
	}
	function doquiz(){
		$quizid=$this->input->post('id');
		$userid=($this->session->userdata['logged_in']['userid']);
		$chscore=$this->quizes->checkwhetherdone($quizid,$userid);
		$data['myquizid']=$quizid;
		if($chscore){
			$data['question']='';
			$this->load->view('admin/doquiz',$data);
		}
		else{
		$data['question']=$this->quizes->question1($quizid);
		
		$this->load->view('admin/doquiz',$data);
	}
		
	}
	function nextquestion(){
		$quizid=$this->input->post('quizid');
		$qnum=$this->input->post('questionnumber');
		$answer=$this->input->post('a');
		$query=$this->quizes->checkanswer($quizid,$qnum);
		$max=$this->quizes->getmaxqestnum($quizid);
		$row=$query->row();
		$thecorrect=$row->correct;
		$questnum=$row->question_number;
        $next=$qnum+1;
        $userid=($this->session->userdata['logged_in']['userid']);
        if($qnum==1){
		if($answer == $thecorrect){
			
			$score = array('user_id' => $userid,
			               'score' =>5,
			               'quizid' =>$quizid,);
			$this->quizes->insertscore($score);
			
			
		}
		else{
              $score = array('user_id' => $userid,
			               'score' =>0,
			               'quizid' =>$quizid,);
			$this->quizes->insertscore($score);

		}
	}
	else{
		if($answer == $thecorrect){
			$this->quizes->updatescore($userid,$quizid);
		}
	}
	            $data['myquizid']=$quizid;
				$data['question']=$this->quizes->getquestion($quizid,$next);
			    $this->load->view('admin/doquiz',$data);
	

	}
	function viewresult(){
		$vid=$this->input->post('id');
		$data['details']=$this->quizes->viewmyresult($vid);
		$this->load->view('admin/viewresult',$data);
	}
}

?>