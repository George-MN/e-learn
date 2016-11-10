<?php
defined('BASEPATH') OR exit('no direct access allowed');
class Content extends CI_controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('writercourses');
		$this->load->model('course');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('file');
		$this->load->library('upload');
		

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
		$code=$this->input->get('id');
		
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
	function uploadvid(){
		$mycode=$this->input->post('topic');
		$code=$_POST['topic'];
		//$topicname=$this->writercourses->topicname($mycode);
		print_r($_POST);
		print_r($_FILES);
		//echo $topicname;
		echo$_FILES['file']['name'];

		
		// if(!empty($_FILES)){
		// 	echo "hererrrererer";
		// 	$filetname=$_FILE['file']['tmp_name'];
		// 	$filename=time().$topicname.$_FILE['file']['name'];
		// 	$filetype=$_FILE['file']['type'];
		// 	$filesize=($_FILE['file']['size']/1024);
		// 	$path='videos/'.$filename;
		// 	$videodetails = array('topicid' =>$mycode ,
  //                                 'videopath'=>$path ,
  //                                 'size' =>$filesize ,
  //                                 'videotitle' =>$filename ,
		// 	 );
		// 	$link=base_url().'/resources/videos/'.$filename;
		// 	echo "hererrrererer";
		// 	move_uploaded_file($filetname, $link);

		// 	$data['videos']=$this->writercourses->uploadvid($videodetails);


		// }
		// else{
		// 	echo "Ndioooo";
		// }
	}
	function topicaddtext(){
       $code=$this->input->get('id');
		
		$data['code']=$code;
		$data['topic']=$this->writercourses->topicvideodata($code);
		$this->load->view('admin/addtext',$data);
	}
	function uploadtext(){
		$text=$this->input->post('aHTML');
		$id=$this->input->post('id');
		$textinput = array('topicid' => $id,
		                   'text' => $text, );
		$this->writercourses->uploadtext($textinput);


	}
	function topicaddpdf(){
		$code=$this->input->get('id');
		
		$data['code']=$code;
		$data['topic']=$this->writercourses->topicvideodata($code);
		$this->load->view('admin/pdfupload',$data);

	}
	function topicaddaudio(){
		$code=$this->input->get('id');
		
		$data['code']=$code;
		$data['topic']=$this->writercourses->topicvideodata($code);
		$this->load->view('admin/audioupload',$data);

	}
	function create_assignment(){
		$data['alltopic']=$this->writercourses->alltopics();
		$this->load->view('admin/contassignmentcreate',$data);
	}
	function contenttext(){
		$userid=($this->session->userdata['logged_in']['userid']);
    
        $data['myall']=$this->course->mycourses($userid);
		$this->load->view('admin/textcont',$data);

	}
	function texttopic(){
		$code= $this->input->post("id");
		$data['topics']= $this->course->alltopics($code);
		$this->load->view('admin/textcontopic',$data);

	}
	function textstudy(){
		$code= $this->input->post("id");
		
		
      $data['text']= $this->course->textcontent($code);
 //      if($data){
      	
      $this->load->view('admin/articlecont',$data);
	}
	function mypdf(){
		
		$userid=($this->session->userdata['logged_in']['userid']);
    
        $data['myall']=$this->course->mycourses($userid);

		$this->load->view('admin/pdfcontc',$data);
	}
	function pdftopic(){
		$code= $this->input->post("id");
		$data['topics']= $this->course->alltopics($code);
		$this->load->view('admin/pdfcontt',$data);
	}
	function audio(){
		$userid=($this->session->userdata['logged_in']['userid']);
    
        $data['myall']=$this->course->mycourses($userid);
		$this->load->view('admin/audiocontc',$data);
	}
	function audiotopic(){
		$code= $this->input->post("id");
		
		 $data['topics']= $this->course->alltopics($code);
		 $this->load->view('admin/audiocontt',$data);

}
    function video(){
		$userid=($this->session->userdata['logged_in']['userid']);
    
        $data['myall']=$this->course->mycourses($userid);

		$this->load->view('admin/videocontc',$data);
	}
	function videotopic(){
		$code= $this->input->post("id");
		$data['topics']= $this->course->alltopics($code);
		$this->load->view('admin/videocontt',$data);

}
    function studyvideo(){

		$code= $this->input->post("id");
		
		
      $data['videos']= $this->course->videos($code);
 //      if($data){
      	
      $this->load->view('admin/videoscont',$data);
 // }
	}
	function assignment(){
		$code=$this->input->post('code');

		$data['code']=$code;
		$data['topic']=$this->writercourses->topicvideodata($code);
		$this->load->view('admin/addassignment',$data);
	}
	function uploadassignment(){
		$text=$this->input->post('aHTML');
		$id=$this->input->post('id');
		$date=$this->input->post('dur');
		$assignid=$this->input->post('assid');
		if($assignid){
          $this->writercourses->updateassignment($text,$assignid);
          $upassid=$this->writercourses->getassignmentid($id);
          echo json_encode($upassid);
		}
		else{
			$textinput = array('topicid' => $id,
		                   'assignment' => $text,
		                   'duedate' =>$date,);
		$this->writercourses->uploadassignment($textinput);
		$upassid=$this->writercourses->getassignmentid($id);
		echo json_encode($upassid);

		}

		

	}



}


?>