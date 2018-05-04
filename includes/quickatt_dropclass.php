<?php
session_start();
	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}

/*
	drop classes (student permission role = 3) && (faculty permission role = 2)
	Takes HTML form value cid, session values userid and roleid
*/
include "databaseinfo.php"; //$con to connect to DB

$userid= $_SESSION['userid'];
$roleid= $_SESSION['roleid'];
$course_id= $_POST['course_id'];
$section_id= $_POST['section_id'];
$fn = $_SESSION['first'];


$classlookup= "SELECT q.* FROM id4888052_quickatt.classes q WHERE course_id = '$course_id' AND section_id = '$section_id';";
$resultlookup= mysqli_query($con, $classlookup);
$row= mysqli_fetch_array($resultlookup);

$cid= $row['cid'];

$checkquery= "SELECT q.* FROM id4888052_quickatt.user_course q WHERE user_id ='$userid' AND cid = '$cid';"; //check if not registered in class
$checkresult= mysqli_query($con, $checkquery);
$checkrowcount = mysqli_num_rows($checkresult);
if($roleid == 3) //student
{
	$query= "DELETE FROM id4888052_quickatt.user_course WHERE user_id = '$userid' AND cid = '$cid';";
	if($checkresult)
	{
		if($checkrowcount < 1)
		{
			echo "You are not registered for this course!<a href='../drop_course.php'> Try again.</a><br>";
			exit();
		}
	}
	else
	{
		echo "You are not registered for this course!<a href='../drop_course.php'> Try again.</a><br>";
		exit();
	}	
	$result = mysqli_query($con, $query);
}

if($roleid == 2) //faculty
{
	//$student_id= $_POST['student_id']; //get student ID from HTML form
	$query= "DELETE FROM id4888052_quickatt.user_course WHERE user_id = '$userid' AND cid = '$cid';"; //drop faculty from $cid
	if($checkresult)
	{
		if($checkrowcount < 1)
		{
			echo "You are not registered for this course!<a href='../drop_FacultyFromCourse.php'> Try again.</a><br>";
			exit();
		}
	}
	else
	{
		echo "You are not registered for this course!<a href='../drop_FacultyFromCourse.php'> Try again.</a><br>";
		exit();
	}	
	$result = mysqli_query($con, $query);
}

if($result){
	if(mysqli_affected_rows($con)) //<--- something wrong with bool value?
	{
		if($roleid == 2)
		{
			echo "The student, $fn, has been removed from $course_id - $section_id. <br>";
			echo "<a href='../drop_FacultyFromCourse.php'> Go Back. </a><br>";
		}
		if($roleid == 3)
		{
			echo "The class: $course_id - $section_id ... has been removed from $fn 's course list. <br>";
			echo "<a href='../drop_course.php'> Go Back. </a><br>";
		}
	}
	else
	{
		echo "An error has occurred. (1) :: Result bool= $result :: CID= $cid ::";
		echo "The DROP operation did not execute.";
	}
}
else
{
	echo "An error has occurred. (1) :: Result bool= $result :: CID= $cid ::";
	echo "The DROP operation did not execute.";
}

mysqli_close($con);
?>

