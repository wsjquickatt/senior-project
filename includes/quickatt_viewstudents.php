<?php
session_start();
	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
	//view ALL users list (faculty role ID = 2) based on class ID
	include "databaseinfo.php";

	$cid = $_POST['cid']; //get from HTML form which class to pull up
	$querylookup = "SELECT q.user_id from id4888052_quickatt.user_course q where q.cid = '$cid';";
	$resultlookup = mysqli_query($con, $query);

	echo "<TABLE border=1>\n";
	echo "<TR><TD><TD>ID<TD>First Name<TD>Last Name<TD>Email\n";
	$count = 1;
	while($row1 = mysqli_fetch_array($resultlookup)) //gets "user_id" 
	{
		$user_id = $row1['user_id'];
		
		$query= "SELECT user_id, firstname, lastname, email from id4888052_quickatt.users where user_id = '$user_id';";
		$result = mysqli_query($con, $query);

		$row2 = mysqli_fetch_array($result) //gets information based on "user_id"
			$fname=$row2['firstname'];
			$lname=$row2['lastname'];
			$email=$row2['email'];

			echo "<TR><TD>$count<TD>$user_id<TD>$fname<TD>$lname<TD>$email\n";
			$count = $count + 1; //increment counter
	}
echo "</TABLE>\n";

mysqli_close($con);
?>