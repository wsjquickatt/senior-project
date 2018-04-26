<?php
session_start();
?>

<?php
	include "databaseinfo.php";
	//$con = mysqli_connect($server, $login, $password, $dbname); //connect to DB
	

	$email = $_POST["email"];
	$password = $_POST["password"];
	$query1 = "SELECT q.* from id4888052_quickatt.users q where q.email = '$email';";
	$query2 = "SELECT q.pwd from id4888052_quickatt.users q where q.pwd = '$password';";

	$result1 = mysqli_query($con, $query1);
	$result2 = mysqli_query($con, $query2);

	$row1 = mysqli_fetch_array($result1);
	$row2 = mysqli_fetch_array($result2);

	$email_DB = $row1['email'];
	$pwd_DB = $row2['pwd'];
	$role_id = $row1['role_id'];
	$user_id = $row1['user_id'];
	$fn = $row1['firstname'];
	$ln = $row1['lastname'];
	
		if($email_DB == $email)
		{
			if($pwd_DB == $password)
			{
				echo "Successful login!<br>";
				if($role_id == 1)
				{
					echo "<h3> Admin login </h3>";
					$_SESSION["roleid"] = 1; // set session var role id
					$_SESSION["userid"] = $user_id; //set session var user_id
					echo "<br>";
					echo "<a href='homepage.html'> Proceed to homepage</a><br>"; //for testing
				}
				if($role_id == 2)
				{
					echo "<h3> Staff login </h3>";
					$_SESSION["roleid"] = 2; // set session var role id
					$_SESSION["userid"] = $user_id; //set session var user_id

					header('Location: ../faculty_home.php');
					// echo "<br>";
					// echo "<a href='../prof_set.php'> Proceed to homepage</a><br>"; //for testing
				}
				if($role_id == 3)
				{
					echo "<h3> Student login </h3>";
					$_SESSION["roleid"] = 3; // set session var role id
					$_SESSION["userid"] = $user_id; //set session var user_id
					$_SESSION["first"] = $fn;
					$_SESSION["last"] = $ln;

					header('Location: ../student_home.php');
					//echo "<br>";
					//echo "<a href='../student_attend.php'> Proceed to homepage</a><br>"; //for testing
				}
			}

			else
			{
				echo "<br>";
				echo "<center>Incorrect login or password</center><br>";
				echo "<center><a href='../index.html'>Return to login</a></center><br>";
			}
		}
		else
		{
			echo "<br>";
			echo "<center>Incorrect login or password</center><br>";
			echo "<center><a href='../index.html'>Return to login</a></center><br>";
		}


?>