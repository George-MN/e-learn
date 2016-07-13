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
		$this->load->view('admin/text');
	}
	function study(){
	$code=1;	
     $data['result']=$this->course->content($code);
     $this->load->view('admin/article',$data);
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
		if($this->course->registercourse($coursecode,$userid)){
			$data='course registered successfully';
			$this->load->view('admin/mycourse',$data);
		}
		else{
            $data='course could not be registered ';
            $this->load->view('admin/mycourse',$data);

        }
		
		
	}

}

?>