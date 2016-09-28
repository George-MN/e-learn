<?php 
include "db.php";



if(isset($_POST['email']))
{
	$email=htmlspecialchars(trim($_POST['email']));
	$password=$_POST['password'];
	$login=mysqli_num_rows(mysqli_query($conn, "select * from `users` where `email`='$email' and `password`='$password'"));
	if($login!=0)
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
}


?>