<?php 
require_once "DbMysql.php";

switch($_POST['rqstFunction']){
	case 'getallcourses':
		getid();
		break;
	case 'getmycourse':
	     getmycourses();
	    break;
	case 'assignments':
	      getassignments();
	     break;
	case 'getquizes':
	      getquizes();
	     break;
	case 'getquizquestion':
	     getquestion();
	     break;
	case 'getmytopics':
	     gettopics();
	     break;
	case 'getmytext':
	     gettext1();
	     break;
	case 'getvideos':
	      getvideos();
	      break;
	case 'getaudios':
	      getaudio();
	      break;
	case 'getpdfs':
	      getpdfs();
	      break;
	case 'regcourse':
	      regcourse();
	      break;
	case 'markquizquestion':
	      markresult();
	      break;
	case 'getquizresult':
	      quizresult();
	      break;
	case 'getassignmentre':
	      getassignmentreport();
	      break;
	case 'getfaqs':
	      getfaqs();
	      break;

}

function getid(){
	$db=new MysqlDb();
//print_r($conn);
$query="select * from course";
$queryresult=$db-> selectMultipleRow($query);
// if($queryresult){
//    $rows=array();
// 	while($row=mysqli_fetch_assoc($queryresult)){
// 		$rows[]=$row;
// 	}
 if($queryresult== false){
 	echo $db->getErrorMsg();
 }
	
	echo json_encode($queryresult);
//}
}
function getmycourses(){
	$db=new MysqlDb();

	$userid=strip_tags($_POST['userid']);
	$myqery="SELECT * FROM `courseregister` join course on courseregister.coursecode=course.coursecode where courseregister.user_id='$userid'";
	$queryresult1=$db-> selectMultipleRow($myqery);
	if($queryresult1 == false){
		echo $db->getErrorMsg();
	// 	$rows=array();
	// 	while($row=mysqli_fetch_assoc($queryresult)){
	// 	$rows[]=$row;
	 }
	echo json_encode($queryresult1);
	
}
function gettopics(){
	$db=new MysqlDb();
	$userid=strip_tags($_POST['userid']);
	$courseid=strip_tags($_POST['courseid']);

	$myqery="SELECT * FROM topic where coursecode='$courseid'";
	$queryresult=$db-> selectMultipleRow($myqery);
	if($queryresult== false){
		echo $db->getErrorMsg();
		
	}
	echo json_encode($queryresult);
	
}

function getassignments(){
	$db=new MysqlDb();
	$userid=strip_tags($_POST['userid']);
	$myqery="SELECT * FROM myassignment where user_id='$userid'";
	$queryresult2=$db-> selectMultipleRow($myqery);

	if($queryresult2 == false){
		echo $db->getErrorMsg();
	// 	$rows=array();
	// 	while($row=mysqli_fetch_assoc($queryresult)){
	// 	$rows[]=$row;
	 }
	echo json_encode($queryresult2);
}
function assignment(){
	$assid=strip_tags($_POST['assid']);
	$myqery="SELECT * FROM assignment where assignmentid='$assid'";
	$queryresult=mysqli_query($conn,$myqery);
	if($queryresult){
		$rows=array();
		while($row=mysqli_fetch_assoc($queryresult)){
		$rows[]=$row;
	}
	echo json_encode($rows);
	}
}
function getquizes(){
	$db=new MysqlDb();
	$userid=strip_tags($_POST['userid']);
	$myqery="SELECT * FROM myquizes where user_id='$userid'";
	$queryresult2=$db-> selectMultipleRow($myqery);
	if($queryresult2 == false){
		echo $db->getErrorMsg();
	// 	$rows=array();
	// 	while($row=mysqli_fetch_assoc($queryresult)){
	// 	$rows[]=$row;
	 }
	echo json_encode($queryresult2);
}
function getassignmentreport(){
	$db=new MysqlDb();
	$userid=strip_tags($_POST['userid']);
	$myqery="SELECT * FROM assignreport where userid='$userid'";
	$queryresult2=$db-> selectMultipleRow($myqery);
	if($queryresult2 == false){
		echo $db->getErrorMsg();
	// 	$rows=array();
	// 	while($row=mysqli_fetch_assoc($queryresult)){
	// 	$rows[]=$row;
	 }
	echo json_encode($queryresult2);
}
function getmaxqust($quizid){
	$db=new MysqlDb();
	$myqery="SELECT num_questions FROM quiz where quizid='$quizid'";
	$queryresult=$db->selectSingleRow($myqery);
	if($queryresult==false){
		echo $db->getErrorMsg();
	}
	
	return $queryresult['num_questions'];
	//return $correct;
}
function getquizquestion($quizid,$quenum){
	$db=new MysqlDb();

	$maxquestion=getmaxqust($quizid);
	if($quenum < $maxquestion){

		$next=$quenum + 1;
		$myqery="SELECT quiz_id,question,question_id,answer1,answer2,answer3,answer4,question_number FROM quiz_questions where quiz_id='$quizid' and question_number='$next'";

	$queryresult=$db->selectSingleRow($myqery);

	// if($queryresult== false){
	// 	echo $db->getErrorMsg();
	// 	// $rows=array();
	// 	// while($row=mysqli_fetch_assoc($queryresult)){
	// 	// $rows[]=$row;
	// }
	echo json_encode($queryresult);
	}
	
	
}
function getquestion(){
	 $quizid=strip_tags($_POST['quizid']);
	$quest=strip_tags($_POST['quest']);
	if(empty($quest)){
          $quenum=0;
          //$queryresult=getquizquestion($quizid,$quenum);
          //echo "meee";

	}

	

		$db=new MysqlDb();
	//$maxquestion=getmaxqust($quizid);
	$myqery="SELECT num_questions FROM quiz where quizid='$quizid'";
	$queryresult=$db->selectSingleRow($myqery);
	if($queryresult==false){
		echo $db->getErrorMsg();
	}
	
	$maxquestion= $queryresult['num_questions'];
	if($quest < $maxquestion){
		$next=$quest + 1;
		$myqery="SELECT quiz_id,question,question_id,answer1,answer2,answer3,answer4,question_number FROM quiz_questions where quiz_id='$quizid' and question_number='$next'";

	$queryresult1=$db->selectSingleRow($myqery);

	// if($queryresult== false){
	// 	echo $db->getErrorMsg();
	// 	// $rows=array();
	// 	// while($row=mysqli_fetch_assoc($queryresult)){
	// 	// $rows[]=$row;
	// }
	//print_r($queryresult1) ;
	echo json_encode($queryresult1);
	}
        //getquizquestion($quizid,$quest);
        //echo $queryresult['question'];
	

}
// function getquizquestion($quizid,$quest){
	
// 	if(empty($quest)){
//           $quenum=0;
//           //$queryresult=getquizquestion($quizid,$quenum);
//           //echo "meee";

// 	}

	

// 		$db=new MysqlDb();
// 	//$maxquestion=getmaxqust($quizid);
// 	$myqery="SELECT num_questions FROM quiz where quizid='$quizid'";
// 	$queryresult=$db->selectSingleRow($myqery);
// 	if($queryresult==false){
// 		echo $db->getErrorMsg();
// 	}
	
// 	$maxquestion= $queryresult['num_questions'];
// 	if($quest < $maxquestion){
// 		$next=$quest + 1;
// 		$myqery="SELECT quiz_id,question,question_id,answer1,answer2,answer3,answer4,question_number FROM quiz_questions where quiz_id='$quizid' and question_number='$next'";

// 	$queryresult1=$db->selectSingleRow($myqery);

// 	// if($queryresult== false){
// 	// 	echo $db->getErrorMsg();
// 	// 	// $rows=array();
// 	// 	// while($row=mysqli_fetch_assoc($queryresult)){
// 	// 	// $rows[]=$row;
// 	// }
// 	//print_r($queryresult1) ;
// 	echo json_encode($queryresult1);
// 	}
//         //getquizquestion($quizid,$quest);
//         //echo $queryresult['question'];
	

// }
function getprevscore($userid,$quizid){
	include "db.php";
	$myqery="SELECT * FROM quizscore where quizid='$quizid' and user_id='$userid'";
	$queryresult=mysqli_query($conn,$myqery);
	if(!$queryresult){
		echo mysql_errno();
	}
	$row=mysqli_fetch_assoc($queryresult);
	$correct=$row['score'];
	return $correct;
}
function markresult(){
	include "db.php";
	$userid=strip_tags($_POST['userid']);
	$quizid=strip_tags($_POST['quizid']);
	$quenum=strip_tags($_POST['quenum']);
	$quesid=strip_tags($_POST['quesid']);
	$answer=strip_tags($_POST['answer']);

	$myqery="SELECT correct FROM quiz_questions where question_id='$quesid' and question_number='$quenum'";
	$queryresult=mysqli_query($conn,$myqery);
	$row=mysqli_fetch_assoc($queryresult);
	$correct=$row['correct'];

	if($correct == $answer){
		if($quenum==1){
			$score=5;
			$query1="insert into quizscore(user_id,quizid,score) values('$userid','$quizid','$score')";
			$queryresult1=mysqli_query($conn,$query1);

			getquizquestion($quizid,$quenum);
		}
		else{
			$prevscore=getprevscore($userid,$quizid);
			$score=$prevscore + 5;
			$query2="update quizscore set score='$score' where user_id='$userid' and quizid='$quizid'";
			$queryresult2=mysqli_query($conn,$query2);
			getquizquestion($quizid,$quenum);

		}
	}
	else{
		if($quenum==1){
			$score=0;
			$query3="insert into quizscore(user_id,quizid,score) values('$userid','$quizid','$score')";
			$queryresult3=mysqli_query($conn,$query1);
			getquizquestion($quizid,$quenum);
		}
		else{
			getquizquestion($quizid,$quenum);
		}
	}
	
}
function quizresult(){
	include "db.php";
	$userid=strip_tags($_POST['userid']);
	//$quizid=strip_tags($_POST['quizid']);
	$myqery="SELECT * FROM quizresult where user_id='$userid'";
	$queryresult=mysqli_query($conn,$myqery);
	if($queryresult){
		$rows=array();
		while($row=mysqli_fetch_assoc($queryresult)){
		$rows[]=$row;
	}
	echo json_encode($rows);
	}

}
function gettext1(){
	$db=new MysqlDb();
	$userid=strip_tags($_POST['userid']);
	$topicid=strip_tags($_POST['topicid']);
	$myqery="SELECT * FROM `text` where topicid='$topicid' order by 'textid'";
	$queryresult=$db-> selectMultipleRow($myqery);
	if($queryresult==false){
		echo $db->getErrorMsg();
	}
	echo json_encode($queryresult);
	

}
function getpdfs(){
	$db=new MysqlDb();
	$topicid=strip_tags($_POST['topicid']);
	$myqery="SELECT * FROM `pdf` where topicid='$topicid'";
	$queryresult=$db-> selectMultipleRow($myqery);
	if($queryresult==false){
		echo $db->getErrorMsg();
	}
	echo json_encode($queryresult);
	
}
function getaudio(){
	$db=new MysqlDb();
	$topicid=strip_tags($_POST['topicid']);
	$myqery="SELECT * FROM `audio` where topicid='$topicid'";
	$queryresult=$db->selectMultipleRow($myqery);
	if($queryresult==false){
		echo $db->getErrorMsg();
	}
	echo json_encode($queryresult);
}
function getvideos(){
	$db=new MysqlDb();
	$topicid=strip_tags($_POST['topicid']);
	$myqery="SELECT * FROM `video` where topicid='$topicid'";
	$queryresult=$db->selectMultipleRow($myqery);
	if($queryresult==false){
		echo $db->getErrorMsg();
	}
	echo json_encode($queryresult);
	
}
function getfaqs(){
	include"db.php";
	$myqery="SELECT * FROM `faqs`";
	$queryresult=mysqli_query($conn,$myqery);
	if($queryresult){
		$rows=array();
		while($row=mysqli_fetch_assoc($queryresult)){
		$rows[]=$row;
	}
	echo json_encode($rows);
	}
}
function regcourse(){
	$db=new MysqlDb();
	$courseid=strip_tags($_POST['courseid']);
	$userid=strip_tags($_POST['userid']);
	$query= "SELECT * FROM `courseregister` where coursecode='$courseid' and user_id='$userid'";
	$queryresult=$db->selectSingleRow($query);
	if($queryresult==false){
		//echo $db->getErrorMsg();
		echo "error";
	}
	$num=$db->countAffected();
	if($num==false){
		//echo $db->getErrorMsg();
		echo "error";
	}
	if ($num && $num>0) {
		echo "false";
	}
	else{
		 include "db.php";
         $myquery="INSERT INTO courseregister(coursecode,user_id) values ('$courseid','$userid')";
         //$queryresult1=$db->insertSingleRecord($table,$myquery);
         $res=mysqli_query($conn,$myquery);
	if(!$res){
		echo mysql_errno();
		
	}
	else{
		echo "inserted";

	}

		//echo $num;
	}
	//echo json_encode($queryresult);
}

?>