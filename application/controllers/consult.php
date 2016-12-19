<?php
defined('BASEPATH') OR exit('no direct access');
class Consult extends CI_controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('writercourses');
	}
	function questions(){
		$data['faqs']=$this->writercourses->faqs();
    	$this->load->view('admin/faquser',$data);
	}

}
?>