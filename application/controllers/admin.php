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
}

?>