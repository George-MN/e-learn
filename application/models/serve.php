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

}

?>