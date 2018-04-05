<?php
session_start();
?>

<?php
	//register
	
	include "databaseinfo.php";
	$con=mysqli_connect($server, $login, $password, $dbname);

	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$email = $_POST['email'];
	$user_id = $_POST['id']; //school id
	$role_id = $_POST['permission']; //student or teacher
	$password= $_POST['password'];

	//$course= $_POST['course'];
	//$section= $_POST['section'];
	
	if($role_id == "Student")
		$role_id = 3;
	else
		$role_id = 2;

	$query="INSERT INTO id4888052_quickatt.users (user_id, role_id, firstname, lastname, email, pwd) VALUES ('$user_id', '$role_id', '$fname', '$lname', '$email', '$password');";
	$result=mysqli_query($con, $query);
	
	if($result)
	{
		echo "You have been successfully registered!";
		echo "<a href= 'homepage.html'>Return to homepage</a>";
	}

?>