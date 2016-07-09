<?php
class clinical extends CI_Model{
    function getAll(){
        $query=$this->db->query("SELECT * FROM courses where course_type='clinical'");
        return $query->result();
        //returns from this string in the db, converts it into an array
    }
}
?>