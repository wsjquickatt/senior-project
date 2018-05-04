<?php
session_start();

	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
//add course (student role ID = 3)
include "databaseinfo.php";

$course_id = $_POST['course_id'];
$section_id= $_POST['section_id'];
$userid = $_SESSION['userid']; //requires session start
$roleid = $_SESSION['roleid'];
$fn = $_SESSION['first'];

$query = "SELECT q.cid FROM id4888052_quickatt.classes q WHERE q.course_id = '$course_id' AND q.section_id = '$section_id';";
$cidresult = mysqli_query($con, $query); //result is "cid"
$row = mysqli_fetch_array($cidresult);
$cid = $row["cid"]; //gets cid value

$queryadd = "INSERT INTO id4888052_quickatt.user_course(user_id, cid, role_id) VALUES('$userid','$cid', '$roleid');";

$querycheck= "SELECT q.* from id4888052_quickatt.user_course q WHERE cid = '$cid' AND user_id = '$userid';";
$checkresult = mysqli_query($con, $querycheck);
$rowcount = mysqli_num_rows($checkresult);

if($rowcount>0)//checks query for multi rows (table is populated)
{
	echo "You are already registered for the course $course_id - $section_id!";
	if($roleid == 3)
		echo "<br> <a href='../add_course.php'>Go back</a>";
	if($roleid == 2)
		echo "<br> <a href='../register_FacultyForCourse.php'>Go back</a>";
}
elseif($rowcount==0) //checks for empty table
{
	$addresult = mysqli_query($con, $queryadd);

	if($addresult)
	{
		echo "The class $course_id - $section_id has been successfully added to User: $fn.";
		if($roleid == 3)
			echo "<br> <a href='../add_course.php'>Go back</a>";
		if($roleid == 2)
			echo "<br> <a href='../register_FacultyForCourse.php'>Go back</a>";
	}
	else
	{	
		echo "An error has occured.";
		if($roleid == 3)
			echo "<br> <a href='../add_course.php'>Go back</a>";
		if($roleid == 2)
			echo "<br> <a href='../register_FacultyForCourse.php'>Go back</a>";
	}
}
else
{
	echo "An error has occurred. The course is unavailable.";
	if($roleid == 3)
		echo "<br> <a href='../add_course.php'>Go back</a>";
	if($roleid == 2)
		echo "<br> <a href='../register_FacultyForCourse.php'>Go back</a>";
}

mysqli_close($con);
?>