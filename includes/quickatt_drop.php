<?php
session_start();
?>

<?php
//drop student (faculty permission role ID = 2)

include "databaseinfo.php";
$con = mysqli_connect($server, $login, $password, $dbname); //connect to DB

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
//$email=$_POST['email'];

$query= "DELETE FROM id4888052_quickatt.users q where q.firstname = '$fname' AND q.lastname = '$lname';"; //AND email = '$email'
$result = mysqli_query($con, $query);

	if($result)
	{
		echo "The student: ";
		echo "$fname $lname has been removed from the course. <br>";
	}
	else
		echo "An error has occurred.<br>";
?>