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

	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['fname'];
	$role_id = $_POST['role_id'];
	$user_id = $_POST['user_id'];
	$password = $_POST['pwd'];

	$querycheck = "SELECT q.* FROM id4888052_quickatt.users q WHERE user_id = '$user_id' AND role_id = '$role_id' AND fname = '$fname' AND lname = '$lname';";

	$queryadd = "INSERT INTO id4888052_quickatt.users (user_id, role_id, firstname, lastname, email, pwd) VALUES ('$user_id', '$role_id', '$fname', '$lname', '$email', '$password');";
	$resultcheck = mysqli_query($con, $querycheck);
	$rowcount = mysqli_num_rows($resultcheck);
	if($rowcount>0)//result table IS NOT empty
	{
		echo "This user is already in QuickAtt records!<br>";
		echo "<a href='../add_userdb.php'>Go back. </a>";
	}
	else//if result table IS empty
	{
		$resultadd = mysqli_query($con, $queryadd);
		$a = "QuickAtt login credentials: ";
		$b = "Email: $email Password: $password";
		$msg = $a . $b;
		
		echo "User: $user_id, $fname $lname has been successfully added to QuickAtt records. The created password will be emailed to $email.<br>";
		mail("$email", "QuickAtt", $msg); //send email to new user
		echo "<a href='../admin_home.php'> Go back. </a>";
	}

mysqli_close();
?>