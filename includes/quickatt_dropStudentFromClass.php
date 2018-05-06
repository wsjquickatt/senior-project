<?php
session_start();
	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}

/*
	drop student from class (faculty permission role = 2)
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

$student_id= $_POST['student_id']; //get student ID from HTML form
$checkquery= "SELECT q.* FROM id4888052_quickatt.user_course q WHERE user_id ='$student_id' AND cid = '$cid';"; //check if student not registered in class
$checkresult= mysqli_query($con, $checkquery);
$checkrowcount = mysqli_num_rows($checkresult);

$facultyquery = "SELECT q.* FROM id4888052_quickatt.user_course q WHERE user_id = '$userid' AND cid = '$cid';"; //check if valid course under faculty ID
$facultyresult = mysqli_query($con, $facultyquery);
$facultyrowcount = mysqli_num_rows($facultyresult);

if($roleid == 2) //faculty
{
	$query= "DELETE FROM id4888052_quickatt.user_course WHERE user_id = '$student_id' AND cid = '$cid' AND role_id = '3';"; //drop student from $cid
	if($facultyresult)
	{
		if($facultyrowcount > 0) //if populated
		{
			if($checkresult)
			{
				if($checkrowcount > 0) //if populated
				{
					$result = mysqli_query($con, $query); //deletes student ID from course
				}
				else
				{
					echo "The student ID, $student_id, is not registered for $course_id Section $section_id! <a href='../drop_StudentFromClass.php'> Try again. </a>";
					exit();
				}
			}
			else
			{
				echo "An error has occurred! <a href='../drop_StudentFromClass.php'> Go back. </a> ";
				exit();
			}
		}
		else
		{
			echo "You are not currently registered for $course_id Section $section_id! <a href='../drop_StudentFromClass.php'> Try again. </a>";
			exit();
		}
	}
	else
	{
		echo "An error has occurred. <a href='../drop_StudentFromClass.php'> Go back. </a>";
		exit();
	}	
}
else
{
	exit("You do not have approriate permission ID.");
}

if($result){
	if(mysqli_affected_rows($con))
	{
			echo "The student ID, $student_id, has been removed from $course_id - $section_id. <br>";
			echo "<a href='../drop_StudentFromClass.php'> Go Back. </a><br>";
	}
	else
	{
		echo "An error has occurred. (1) :: Result bool= $result :: CID= $cid ::";
		echo "The DROP operation did not execute.";
		exit();
	}
}
else
{
	echo "An error has occurred. (1) :: Result bool= $result :: CID= $cid ::";
	echo "The DROP operation did not execute.";
	exit();
}

mysqli_close($con);
?>