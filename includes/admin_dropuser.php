<?php
session_start();

	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
	
//add user ADMIN role

	include ("databaseinfo.php");
	
	$roleid = $_SESSION['roleid'];
	$userid = $_SESSION['userid'];

	$role_id = $_POST['role_id'];
	$user_id = $_POST['user_id'];

	$querycheck = "SELECT q.* FROM id4888052_quickatt.users q WHERE user_id = '$user_id' AND role_id = '$role_id';";
	$querydelete = "DELETE FROM id4888052_quickatt.users WHERE user_id = '$user_id' AND role_id = '$role_id';";

	$resultcheck = mysqli_query($con, $querycheck);
	$rowcount = mysqli_num_rows($resultcheck);
	if($rowcount>0)//result table IS NOT empty
	{
		$resultadd = mysqli_query($con, $querydelete);
		echo "User: $user_id, $fname $lname has been successfully dropped from QuickAtt records. <br>";
		echo "<br> <a href='../dropuserdb.php'> Go back. </a>";
	}
	else//if result table IS empty
	{
		echo "ERROR. User may not be in QuickAtt records!<br>";
		echo "<a href='../drop_userdb.php'> Go back. </a>";
	}

mysqli_close();
?>