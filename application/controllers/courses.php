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
		//$data['recourse']=$this->course->mycourses();

		$this->load->view('admin/text');
	}
	function study(){

		$code= $this->input->post("id");
		
		
      $data['result']= $this->course->content($code);
      if($data){
      	//echo "meee";
     $this->load->view('admin/studytext',$data);
 }
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
		$this->load->view('admin/videos');
	}

}

?>