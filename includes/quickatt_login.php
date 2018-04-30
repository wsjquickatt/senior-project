<?php
session_start();
include "databaseinfo.php";

/*
if(isset($_SESSION['login']) && $_SESSION['login'] == true){
	header("location: success.php");
}
*/
    $email = $_POST["email"];
	$password = $_POST["password"];
	$query = "SELECT q.* from id4888052_quickatt.users q where q.email = '$email' AND q.pwd = '$password';";

	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	if(mysqli_num_rows($result)>0)
	{
	$email_DB = $row['email'];
	$password_DB = $row['pwd'];
	$role_id = $row['role_id'];
	$user_id = $row['user_id'];
	}
		if(mysqli_num_rows($result) > 0)
		{
			if(($email == $email_DB) && ($password == $password_DB))
			{
				//echo "Successful login!<br>";
				$_SESSION['login'] = TRUE;
				if($role_id == 1)
				{
					echo "$email_DB / $email .. $password / $password_DB";
					//echo "<h3> Admin login </h3>";
					$_SESSION['roleid'] = 1; // set session var role id
					$_SESSION['userid'] = $user_id; //set session var user_id
					//echo "<br>";
					header('location: ../admin_home.php');
				}
				if($role_id == 2)
				{
						//echo "<h3> Instructor login </h3>";
					$_SESSION['roleid'] = 2; // set session var role id
					$_SESSION['userid'] = $user_id; //set session var user_id
					//echo "<br>";
					header('location: ../faculty_home.php');
				}
				if($role_id == 3)
				{
						//echo "<h3> Student login </h3>";
					$_SESSION['roleid'] = 3; // set session var role id
					$_SESSION['userid'] = $user_id; //set session var user_id
					//echo "<br>";
					header('location: ../student_home.php'); //student homepage
				}
			}
			else
			{
				$_SESSION['login'] = false;
				echo "Incorrect login or password<br>";
				echo "<a href='https://quickatt.000webhostapp.com/'>Return to login</a><br>";
			}
		}
		else
		{
			$_SESSION['login'] = false;
			echo "Incorrect login or password<br>";
			echo "<a href='https://quickatt.000webhostapp.com/'>Return to login</a><br>";
		}
mysqli_close($con);
?>