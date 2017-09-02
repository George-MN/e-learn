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
		//$mycode=$this->input->post('topic');
		$mycode=$this->input->get('myid');
		//$topicname=$this->writercourses->topicname($mycode);
		//print_r($_POST);
		echo "my id = ".$mycode;
		print_r($_FILES);

		

		//echo $topicname;
		// echo$_FILES['file']['name'];

		
		if(!empty($_FILES)){
			
			$filetname=$_FILES['file']['tmp_name'];
			$filesize=($_FILES['file']['size']/1024);
			$filename=microtime().$_FILES['file']['name'];
			$path='videos/'.$filename;
			$videodetails = array('topicid' =>$mycode ,
                                  'videopath'=>$path ,
                                  'size' =>$filesize ,
                                  'videotitle' =>$filename ,
			 );
			$link=$_SERVER['DOCUMENT_ROOT'].'/learn/resource/videos/'.$filename;
			
			move_uploaded_file($filetname, $link);

			$data['videos']=$this->writercourses->uploadvid($videodetails);


		}
		else{
			echo "Developer view: Could not upload";
		}
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
	function audiostudy(){
		$code=$this->input->post('id');
		$data['audio']=$this->course->myaudios($code);
		$this->load->view('admin/audiosc',$data);

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
		$userid=$code=$this->session->userdata['logged_in']['username'];

		if($assignid){
          $this->writercourses->updateassignment($text,$assignid);
          $upassid=$this->writercourses->getassignmentid($id);
          echo json_encode($upassid);
		}
		else{
			$textinput = array('topicid' => $id,
		                   'assignment' => $text,
		                   'duedate' =>$date,
		                   'userid' => $userid,);
		$this->writercourses->uploadassignment($textinput);
		$upassid=$this->writercourses->getassignmentid($id);
		echo json_encode($upassid);

		}

		

	}
    function questions(){
    	$data['faqs']=$this->writercourses->faqs();
    	$this->load->view('admin/faq',$data);
    
    }
    function faqsadd(){
    	$question=$this->input->post('faq');
    	$answer=$this->input->post('solution');
    	$date=date('y-m-d');
    	$name=$this->session->userdata['logged_in']['username'];
    	$faqd = array('faq' => $question,
    	              'answer'=>$answer,
    	              'author'=> $name,
    	              'adddate'=>$date, );
    	$this->writercourses->addfaqs($faqd);
    	$this->questions();
    }
    function uploadpdf(){
		//$mycode=$this->input->post('topic');
		$mycode=$this->input->get('myid');
		//$topicname=$this->writercourses->topicname($mycode);
		//print_r($_POST);
		echo "my id = ".$mycode;
		print_r($_FILES);

		

		//echo $topicname;
		// echo$_FILES['file']['name'];

		
		if(!empty($_FILES)){
			
			$filetname=$_FILES['file']['tmp_name'];
			$filesize=($_FILES['file']['size']/1024);
			$filename=microtime().$_FILES['file']['name'];
			$path='pdfs/'.$filename;
			$pdfdetails = array('topicid' =>$mycode ,
                                  'pdfpath'=>$path ,
                                  'size' =>$filesize ,
                                  'name' =>$filename ,
			 );
			$link=$_SERVER['DOCUMENT_ROOT'].'/learn/resource/pdfs/'.$filename;
			
			move_uploaded_file($filetname, $link);

			$data['videos']=$this->writercourses->uploadpdf($pdfdetails);


		}
		else{
			echo "Developer view: Could not upload";
		}
	}
	function uploadaudio(){
		//$mycode=$this->input->post('topic');
		$mycode=$this->input->get('myid');
		//$topicname=$this->writercourses->topicname($mycode);
		//print_r($_POST);
		echo "my id = ".$mycode;
		print_r($_FILES);

		

		//echo $topicname;
		// echo$_FILES['file']['name'];

		
		if(!empty($_FILES)){
			
			$filetname=$_FILES['file']['tmp_name'];
			$filesize=($_FILES['file']['size']/1024);
			$filename=microtime().$_FILES['file']['name'];
			$path='audios/'.$filename;
			$audiodetails = array('topicid' =>$mycode ,
                                  'audiopath'=>$path ,
                                  'size' =>$filesize ,
                                  'name' =>$filename ,
			 );
			$link=$_SERVER['DOCUMENT_ROOT'].'/learn/resource/audios/'.$filename;
			
			move_uploaded_file($filetname, $link);

			$data['videos']=$this->writercourses->uploadaudio($audiodetails);


		}
		else{
			echo "Developer view: Could not upload";
		}
	}
	function View_assignment(){
		$data['assignments']=$this->writercourses->View_assignment();
		$this->load->view('admin/assignsub',$data);
	}
	function allassignment(){
		$code=$this->input->post('id');
		$data['allassignment']=$this->writercourses->allassignment($code);
		$this->load->view('admin/submitted_assignment',$data);
	}
	function create_quiz(){
		$myid=$this->session->userdata['logged_in']['userid'];
		
		$data['mycourses']=$this->writercourses->mycourse($myid);
		$this->load->view('admin/create_quiz',$data);
	}
	function quiz_topics(){
		$code= $this->input->post("code");
		echo $code;
		$data['topics']= $this->course->alltopics($code);
		$this->load->view('admin/create_quiz_topic',$data);
	}
    function create_questions(){
    	$topicid=$this->input->post('code');
    	
    	$data['topicid']=$topicid;
    	$this->load->view('admin/quiz_details',$data);
    }
    function quiz_details(){
    	$quizname=  $this->input->post('quiz_name');

    	$questions=$this->input->post('num_questions');
    	$topicid= $this->input->post('topicid');
    	$inputs = array('quizname' => $quizname, 
    		            'num_questions' => $questions,
    		            'topicid' => $topicid,);
    	$data['quizid']=$this->writercourses->quiz_details_insert($inputs,$topicid);
    	$data['questionnum']=1;
    	$this->load->view('admin/quiz_questions',$data);

    }
    function quiz_question(){
    	$question=$this->input->post('question');
    	$choice1=$this->input->post('choice1');
    	$choice2=$this->input->post('choice2');
    	$choice3=$this->input->post('choice3');
    	$choice4=$this->input->post('choice4');
    	$answer=$this->input->post('answer');
    	$quizid=$this->input->post('quizid');
    	$questionnum=$this->input->post('questionnum');

    	
      $quiz_question = array('quiz_id' => $quizid, 
      	                     'question_number' => $questionnum,
      	                     'question' => $question,
      	                     'answer1' => $choice1,
      	                     'answer2' => $choice2,
      	                     'answer3' => $choice3,
      	                     'answer4' => $choice4,
      	                     'correct' => $answer);
      
      $this->writercourses->question_insert($quiz_question,$quizid);
      $maxquestion=$this->writercourses->getmaxquestion($quizid);
      $numberquestion=$questionnum;
      
      if (($numberquestion + 1)>$maxquestion) {
      	$data['quizid']=$quizid;
      	$data['quizname']=$this->writercourses->getquizname($quizid);

      	$this->load->view('admin/finish_set_quiz',$data);
      }
      else{
      	$data['questionnum']=$numberquestion + 1;
      	$data['quizid']=$quizid;
      	$this->load->view('admin/quiz_questions',$data);
      }

    }
    function view_quizdone(){
    	$viewid=$this->input->post('id');
    	$data['quiz']=$this->writercourses->getquizquestions($viewid);
    	$data['quizname']=$this->writercourses->getquizname($viewid);
    	$this->load->view('admin/viewquiz',$data);
    }
    function view_quiz(){
    	$data['quizes']=$this->writercourses->getallquiz();
    	$this->load->view('admin/allquiz',$data);

    }
    function quiz_taken(){
    	$data['quizes']=$this->writercourses->getallquiz();
    	$this->load->view('admin/quizdonedetails',$data);
    }
    function view_quizdone_report(){
    	$report=$this->input->post('id');
    	$data['details']=$this->writercourses->quizreport($report);
    	$this->load->view('admin/quizreport',$data);
    }
    function enrollment(){
    	$myid=$this->session->userdata['logged_in']['userid'];
		
		$data['mycourses']=$this->writercourses->mycourse($myid);
		$this->load->view('admin/enrollment',$data);

    }
    function users_doing(){
    	$code= $this->input->post('code');
    	$data["details"]= $this->writercourses->getusersenrolled($code);
    	$this->load->view('admin/enrolledusers',$data);
    }
    function mypdfs(){
    	$code=$this->input->post('id');
		$data['pdfs']=$this->writercourses->mypdfs($code);
		$this->load->view('admin/mypdfsc',$data);
    }


}


?>