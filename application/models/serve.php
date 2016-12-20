<?php 
defined('BASEPATH') or exit('no direct access allowed');
class Serve extends CI_model{
    function __construct(){
    	parent:: __construct();
    }
    function getcourse($coursecode){
    	$this->db->select('*');
    	$this->db->from('course');
    	$this->db->where('coursecode',$coursecode);
    	$query=$this->db->get();
    	return $query->result_array();

    }
    function insertcourse($coursedet){
        $this->db->insert('course',$coursedet);
    }
    function getusers(){
        $this->db->select('*');
        $this->db->from('users');
       
        $query=$this->db->get();
        return $query->result_array();

    }
    function getunallocated(){
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('located',0);
        $query=$this->db->get();
        return $query->result_array();
    }
    function getcontwriters(){
         $this->db->select('*');
        $this->db->from('users');
         $this->db->where('usertype',2);
       
        $query=$this->db->get();
        return $query->result_array();
    }
    function insertcoursereg($coursereg){
        $this->db->insert('courseregister',$coursereg);

    }
    function updatecourse($courseid){
         $this->db->set('located',1);
        $this->db->where('coursecode',$courseid);
        $this->db->update('course');
    }
    function updatecoursedet($coursename,$coursetype,$coursecode,$coursedesc,$courseid){
          $this->db->set('coursename',$coursename);
           $this->db->set('coursetype',$coursetype);
            $this->db->set('coursecode',$coursecode);
             $this->db->set('description',$coursedesc);
        $this->db->where('coursecode',$courseid);
        $this->db->update('course');
    }
    function coursedelete($coursecode){
        $this->db->where('coursecode',$coursecode);
        $this->db->delete('course');
        //\ $this->db->where('coursecode',$coursecode);
    }
    function useredit($userid){
         $this->db->select('*');
        $this->db->from('users');
         $this->db->where('user_id',$userid);
       
        $query=$this->db->get();
        return $query->result_array();
    }
    function updateuser($userid,$type){
          $this->db->set('usertype',$type);
        $this->db->where('user_id',$userid);
        $this->db->update('users');
    }
    function userdelete($userid){
         $this->db->where('user_id',$userid);
        $this->db->delete('users');
    }

}

?>