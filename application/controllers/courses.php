<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Courses extends CI_controller{
	function __construct(){
		parent::__construct();
		$this->load->model('course');
	}
	function allcourses(){
		$data=array();
		
		$data['courses']=$this->course->allcourses();
		$this->load->view('admin/allcourse',$data);
	}
	function getmycourses(){
	$userid=($this->session->userdata['logged_in']['userid']);
    
    return $this->course->mycourses($userid);
	}
	function mycourses(){

		
    $userid=($this->session->userdata['logged_in']['userid']);
    $data['mycourses']=$this->course->mycourses($userid);
    $data['allcourse']=$this->course->allcourses();
    if($data){
    	$this->load->view('admin/mycourse',$data);
    }
    else{
    	$data['mycourses']='';
    	$this->load->view('admin/mycourse',$data);
    }
    

	
	}
	function content(){
		//$code=$this->uri->segment(3);
		$data['myall']=$this->getmycourses();

		$this->load->view('admin/text',$data);
	}
	
	function getCourseByCode()
	{
		$courseCode = $this -> input -> post('coursecode');
		$data =$this->course->getCourseByCode($courseCode);
		echo json_encode($data);
	}

	function registercourse(){
		$coursecode= $this -> input->post('coursecode');
		// $courseduration=$this-> input->post('duration');
		// $coursecategory=$this-> input->post('category');
		$userid=($this->session->userdata['logged_in']['userid']);
		$regdata = array('coursecode' => $coursecode,
		                  'user_id' => $userid);

		$result=$this->course->registercourse($regdata,$coursecode);
		if($result>0){
			$this->mycourses();
		}
		else{
            $data['report']='The course is already registered';
            $userid=($this->session->userdata['logged_in']['userid']);
    $data['mycourses']=$this->course->mycourses($userid);
    $data['allcourse']=$this->course->allcourses();
    if($data){
    	$this->load->view('admin/mycourse',$data);
    }
    else{
    	$data['mycourses']='';
    	$this->load->view('admin/mycourse',$data);
    }
		}

// 		if($this->course->registercourse($coursecode,$userid)){
// 			$data='course registered successfully';
// 			$this->load->view('admin/mycourse',$data);
// 		}
// 		else{
//             $data='course could not be registered ';
//             $this->load->view('admin/mycourse',$data);

//         }
		
		
	}
	function videos(){
		$data['videos']=$this->course->videos();
		$this->load->view('admin/videos',$data);
	}
	function mypdf(){
		$data['myall']=$this->getmycourses();

		$this->load->view('admin/pdfc',$data);
	}
	function audio(){
		$data['myall']=$this->getmycourses();

		$this->load->view('admin/audioc',$data);
	}
	function video(){
		$data['myall']=$this->getmycourses();

		$this->load->view('admin/videoc',$data);
	}
	function texttopic(){
		$code= $this->input->post("course");
		$data['topics']= $this->course->alltopics($code);
		$this->load->view('admin/textt',$data);

}
function videotopic(){
		$code= $this->input->post("course");
		$data['topics']= $this->course->alltopics($code);
		$this->load->view('admin/videot',$data);

}
function pdftopic(){
		$code= $this->input->post("course");
		$data['topics']= $this->course->alltopics($code);
		$this->load->view('admin/pdft',$data);

}
function audiotopic(){
		$code= $this->input->post("course");
		$data['topics']= $this->course->alltopics($code);
		$this->load->view('admin/audiot',$data);

}
function studyvideo(){

		$code= $this->input->post("id");
		
		
      $data['videos']= $this->course->videos($code);
 //      if($data){
      	
 $this->load->view('admin/videos',$data);
 // }
	}
	function textstudy(){

		$code= $this->input->post("id");
		
		
      $data['text']= $this->course->textcontent($code);
 //      if($data){
      	
      $this->load->view('admin/article',$data);
 // }
	}



}

?>