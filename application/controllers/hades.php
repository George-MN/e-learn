<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hades extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->helper('url');
	}
	function index(){
		if($this->session->userdata('logged_in')){
			$session_data=$this->session->userdata('logged_in');
			$useremail=$session_data['email'];
			$usertype=$session_data['usertype'];
			//$this->load->view('content',$useremail);
			if($usertype==1){
				$this->load->view('admin/index',$useremail);
			}
			else if($usertype==2){
				$this->load->view('content',$useremail);
			}
			else if($usertype==3){
				$this->load->view('homepage',$useremail);
			}
			else{
				$data='it seems your account has a problem. please contact the system admin';
				redirect('login',$data);
			}
		}
		else{
			redirect('login','refresh');
		}

	}
	function dash2(){
		$this->load->view('admin/index.php');
	}
	function logout(){
		//$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login','refresh');
	}
	function allcourse(){
		$this->load->view("admin/allcourse");
	}

}

?>