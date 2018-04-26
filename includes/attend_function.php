<?php

include('databaseinfo.php'); 	// Connect to the db.
date_default_timezone_set('America/New_York');

$user = $_REQUEST['uid'];
$f = $_REQUEST['fname'];
$l = $_REQUEST['lname'];
$course = $_REQUEST['cid'];
$date = date('Y-m-d');
$time = date('H:i:s');
$att = 'P';

$check_duplicate = "SELECT * FROM attendance WHERE user_id='$user' AND cid='$course' AND date='$date'";	//checking for duplicate record
$check_result = mysqli_query($con, $check_duplicate);

if(mysqli_num_rows($check_result) > 0){
	echo "You Have Already Signed In For Today.<br>";
}
else{
	$check_time = "SELECT * from classes where cid='$course' ";	//checking times to assign P, L, or A
	$result_time = mysqli_query($con, $check_time);

	if(mysqli_num_rows($result_time) > 0){
		while($row = mysqli_fetch_array($result_time)){
			$start = $row['start_time'];
			$l_start = $row['late_start'];
			$l_end = $row['late_end'];
			$end = $row['end_time'];
		}
		if($time < $start OR $time > $end){
			die ("You Can't Sign in at Moment. Please, Try Again Later.");

		}
		else{
			if(($time >= $start) AND $time <= $l_start){
				$att = 'P';
			} 
			if(($time > $l_start) AND $time <= $l_end){
				$att = 'L';
			} 
			if(($time > $l_end) AND $time <= $end){
				$att = 'A';
			} 
		}

	}


	$insert_sql = "INSERT INTO attendance(user_id, firstname, lastname, cid, date, time, attend) VALUES ('$user', '$f', '$l', '$course', '$date', '$time','$att')";
	if(mysqli_query($con, $insert_sql)){
		echo "You Have SUCCESSFULLY logged in<br>";
	}
	else{
		echo "ERROR. Something Went Wrong.<br>";
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