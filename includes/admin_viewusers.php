<?php
session_start();

	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
	//view ALL users list (admin role ID = 1) based on class ID
	include "databaseinfo.php";

	$role_id=$_SESSION['roleid'];
	
	$query = "SELECT q.* from id4888052_quickatt.users q;";
	$result = mysqli_query($con, $query);

	echo "<TABLE border=1>\n";
	echo "<TR><TD><TD>User ID<TD>Role ID<TD>First Name<TD>Last Name<TD>Email<TD>Password\n";
	$count = 1;
	while($row = mysqli_fetch_array($result)) //gets "user_id" 
	{
			$user_id=$row['user_id'];
			$role_id_DB=$row['role_id'];
			$fname=$row['firstname'];
			$lname=$row['lastname'];
			$email=$row['email'];
			$password=$row['pwd'];

			echo "<TR><TD>$count<$user_id<TD>$role_id_DB<TD>$fname<TD>$lname<TD>$email<TD>$password\n";
			$count = $count + 1; //increment counter
	}
				echo"</TABLE>\n";

?>