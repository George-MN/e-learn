<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Verifylogin extends CI_controller {

    function __construct() {
        parent:: __construct();
        
    }

    function index() {
        
        //credential validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->check_database($password, $email);

        if ($this->form_validation->run() == FALSE) {
            //form validation failed
            echo "failed";
            $data="Wrong username or password";
            $this->load->view('login_view.php',$data);
        } else {
           
            redirect('hades','refresh');
        }
    }

    function check_database($password, $email) {
        //validate against database
        $myemail = $this->input->post('email');

        //query database
        $result = $this->users->login($myemail, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $email = $row->email;
                $usertype = $row->usertype;
                $userid = $row->user_id;
                $sess_array = array(
                    'email' => $row->email,
                    'usertype' => $row->usertype,
                    'username' => $row->username,
                    'userid' => $row->user_id
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'invalid username or password');
            return FALSE;
        }
    }
    function signup(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('myemail', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mypassword', 'mypasswordver', 'trim|required|xss_clean|callback_check_database');
        $myemail=$this->input->post('myemail');
        $first=$this->input->post('mypassword');
        $second=$this->input->post('mypasswordver');
        if($first != $second){
             $data="Could not register, password mismatch";
            $this->load->view('login_view.php',$data);
        }
        else{
             $this->check_email($myemail,$first);
        }
       
       
    }
    function check_email($email,$password){
        $result=$this->users->checkem($email,$password);
        if($result==true){
            $this->form_validation->set_message('Successfully registred');
             $data="you can log in ";
            $this->load->view('login_view.php',$data);
        }
        else{
               $this->form_validation->set_message('Email already exists, please try another');
             $data="Use Another email ";
            $this->load->view('login_view.php',$data);
        }
        }

    

}

?>