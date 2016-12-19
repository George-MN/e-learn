<?php 
defined('BASEPATH') or exit('No direct access allowed');
class Progress extends CI_controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('quizes');
	}
	function quiz(){
		$data['details']=$this->quizes->getallquiz();
		$this->load->view('admin/progquiz',$data);
	}
}

?>	