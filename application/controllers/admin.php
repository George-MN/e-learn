<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_controller{
	function __construct(){
		parent::__construct();
		$this->load->model('serve');
		$this->load->model('course');
		$this->load->helper('url');
	}

	function courseedit(){
       $coursecode=$this->input->get('id');
       $data['resp']="";
       $data['mycourse']=$this->serve->getcourse($coursecode);
	   $this->load->view('admin/editcourse',$data);
	}
	function allcourse(){
		 $data['mycourses']=$this->course->allcourses();
	   $this->load->view('admin/contentmanagement',$data);
	}
	function createcourse(){
		$data['resp']="";
		$this->load->view('admin/createcourse',$data);
	}
	function insertcourse(){
		$this->load->library('form_validation');
		$coursename=$this->input->post('choice1');
		$coursecode=$this->input->post('choice3');
		$coursetype=$this->input->post('answer');
		$locate=0;
		echo $coursetype;
		$coursedesc=$this->input->post('choice4');
		$coursedet = array('coursename' => $coursename,
		                   'coursecode' => $coursecode,
		                   'description' => $coursedesc,
		                   'coursetype' => $coursetype ,
		                   'located' => $locate);
		$this->serve->insertcourse($coursedet);
		$data['resp']="*Course created successfully";
		$this->load->view('admin/createcourse',$data);

	}
	function privileges(){
		$data['users']=$this->serve->getusers();
		$this->load->view('admin/privileges',$data);

	}
	function create_user(){
		$data['uncourses']=$this->serve->getunallocated();
		$data['contwriter']=$this->serve->getcontwriters();
		$data['resp']="";
		$this->load->view('admin/locate',$data);
	}
	function insertcontup(){
		$userid=$this->input->post('userid');
		$courseid=$this->input->post('courseid');
		$coursereg = array('coursecode' => $courseid ,
		                   'user_id' => $userid );
		$this->serve->insertcoursereg($coursereg);
		$this->serve->updatecourse($courseid);
		$data['uncourses']=$this->serve->getunallocated();
		$data['contwriter']=$this->serve->getcontwriters();
		$data['resp']="The course has been allocated a content writer successfully";
		$this->load->view('admin/locate',$data);
		// echo $userid;
		// echo $courseid;
	}
	function courseeditchoice(){
		$coursename=$this->input->post('choice1');
		$coursetype=$this->input->post('answer');
		$coursecode=$this->input->post('choice3');
		$coursedesc=$this->input->post('choice4');
		$courseid=$this->input->post('coursecode');
		$this->serve->updatecoursedet($coursename,$coursetype,$coursecode,$coursedesc,$courseid);
		 //$coursecode=$this->input->get('id');
       $data['resp']="Course updated successfully";
       $data['mycourse']=$this->serve->getcourse($coursecode);
	   $this->load->view('admin/editcourse',$data);
	}
	function coursedelete(){
		$coursecode=$this->input->get('id');
		$this->serve->coursedelete($coursecode);
		$data['mycourses']=$this->course->allcourses();
	   $this->load->view('admin/contentmanagement',$data);

	}
	function useredit(){
		$userid=$this->input->get('id');
		$data['resp']="";
		$data['users']=$this->serve->useredit($userid);
		$this->load->view('admin/edituser',$data);

	}
	function usereditchoice(){
		$userid=$this->input->post('userid');
		$usertype=$this->input->post('type');
		if($usertype=='Admin'){
			$type=3;
		}
		else if($usertype=='Content writer'){
			$type=2;
		}
		else{
			$type=1;
		}
		$this->serve->updateuser($userid,$type);
		$data['resp']="User updated successfully";
		$data['users']=$this->serve->useredit($userid);
		$this->load->view('admin/edituser',$data);


	}
	function userdelete(){
		$userid=$this->input->get('id');
		$this->serve->userdelete($userid);
		$data['users']=$this->serve->getusers();
		$this->load->view('admin/privileges',$data);


	}
	function enrollment(){
		$this->load->view('admin/enrollreport');
	}
	function userconratio(){
		$this->load->view('admin/userconratio');
	}
	function quizperformance(){
		$this->load->view('admin/quizaveragereport');
	}
	function getusr(){
		$results=$this->serve->getenrollreport();
		echo json_encode($results);
	}
	function getuserratio(){
		$results=$this->serve->getuserratio();
		echo json_encode($results);
	}

	
}

?>