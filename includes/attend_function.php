<?php

include('databaseinfo.php'); 	// Connect to the db.
date_default_timezone_set('America/New_York');

$user = $_REQUEST['uid'];
$f = $_REQUEST['fname'];
$l = $_REQUEST['lname'];
$course = $_REQUEST['cid'];
$date = date('Y-m-d');
$time = date('H:i:s');

$check_duplicate = "SELECT * FROM attendance WHERE user_id='$user' AND cid='$course' AND date='$date'";
$check_result = mysqli_query($con, $check_duplicate);

if(mysqli_num_rows($check_result) > 0){
	echo "You have already signed in for today.<br>";
}
else{
	$insert_sql = "INSERT INTO attendance(user_id, firstname, lastname, cid, date, time, attend) VALUES ('$user', '$f', '$l', '$course', '$date', '$time','P')";
	if(mysqli_query($con, $insert_sql)){
		echo "You have successfully logged in<br>";
	}
	else{
		echo "Error. Something went wrong.<br>";
	}

	// echo date('l jS \of F Y h:i:s A');
	// echo "The user is $user<br>";
	// echo "The name is $f<br>";
	// echo "The last name is $l<br>";
	// echo "The course is $course<br>";
	// echo date('Y-m-d')."<br>";
	// echo date('H:i:s')."<br>";
}

exit;
?>