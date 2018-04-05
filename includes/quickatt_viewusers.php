<?php
session_start();
?>

<?php
	//view ALL users list (faculty role ID = 2) based on class ID
	include "databaseinfo.php";
	$con=mysqli_connect($server, $login, $password, $dbname);

	$cid = $_POST['cid']; //get from HTML form which class to pull up

	$querylookup = "SELECT user_id from id4888052_quickatt.student_course where cid = '$cid';";
	$resultlookup = mysqli_query($con, $query);

	echo "<TABLE border=1>\n";
	echo "<TR><TD><TD>First Name<TD>Last Name<TD>Email\n";
	$count = 1;
	while($row1 = mysqli_fetch_array($resultlookup)) //gets "user_id" 
	{
		$user_id = $row1['user_id'];
		
		$query= "SELECT firstname, lastname, email from id4888052_quickatt.users where '$user_id';";
		$result = mysqli_query($con, $query);

		$row2 = mysqli_fetch_array($result) //gets information based on "user_id"
			$fname=$row2['firstname'];
			$lname=$row2['lastname'];
			$email=$row2['email'];

			echo "<TR><TD>$count<TD>$fname<TD>$lname<TD>$email\n";
			$count = $count + 1; //increment counter
	}
				echo"</TABLE>\n";

	/*if($result)
	{
		if (mysqli_num_rows($result)>0) 
		{
			$count = 1;
			echo "<TABLE border=1>\n";
			echo "<TR><TD><TD>First Name<TD>Last Name<TD>Email\n";
			//<TD>Password
			while($row = mysqli_fetch_array($result))
			{
				$fname=$row['firstname'];
				$lname=$row['lastname'];
				$email=$row['email'];

				echo "<TR><TD>$count<TD>$fname<TD>$lname<TD>$email\n";
				//<TD>$password
				$count = $count + 1;
			}
			    echo"</TABLE>\n";
		}
	}
*/

?>