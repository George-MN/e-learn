<?php
defined('BASEPATH') OR exit('no direct access allowed');
class Content extends CI_controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('writercourses');
		$this->load->helper('url');

	}
	function mycourses(){
		$myid=$this->session->userdata['logged_in']['userid'];
		
		$data['mycourses']=$this->writercourses->mycourse($myid);
		$this->load->view('admin/contmycourse',$data);
		

	}
	function courseedit(){
		$code=$this->input->post('code');
		$data['topics']=$this->writercourses->mytopics($code);
		$data['code']=$code;
		$this->load->view('admin/contmytopic',$data);
	}
	function topicdelete(){
		$code=$this->input->post('tid');
		$this->topics($code);
		
	}
	function getCourseByCode(){
		$code=$this->uri->segment(3);

	}
	function topics($code){
		$mycode=$this->writercourses->deletetopic($code);
		$data['topics']=$this->writercourses->mytopics($mycode);
		$data['code']=$mycode;

		$this->load->view('admin/contmytopic',$data,'refresh');

	}
	function topicaddvideo(){
		$code=$this->uri->segment(3);
		echo $code;
		$data['code']=$code;
		$data['topic']=$this->writercourses->topicvideodata($code);
		$this->load->view('admin/vidupload',$data);

}
    function addtopic(){
    	$name=($this->session->userdata['logged_in']['username']);
        $course=$this->input->post('coursecode');
         $tnumber=$this->input->post('category');
         $topic=$this->input->post('duration');
         $insert= array('topicname' =>$topic ,
                         'topicauthor'=>$name,
                         'coursecode'=>$course,
                         'topicnumber'=>$tnumber,
                         'status'=>0,
                          );
         $this->writercourses->addtopic($insert);
         $this->mycourseedit($course);
        
        

    }
    function mycourseedit($code){
		
		$data['topics']=$this->writercourses->mytopics($code);
		$data['code']=$code;
		$this->load->view('admin/contmytopic',$data);
	}
}

?>