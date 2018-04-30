<?php
session_start();

	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
//admin function: add course

include "databaseinfo.php";
	$roleid = $_SESSION['roleid'];
	$userid = $_SESSION['userid'];
	$course_id = $_POST['courseid'];
	$section_id = $_POST['sectionid'];

	$querycheck = "SELECT q.* FROM id4888052_quickatt.classes q WHERE course_id = '$course_id' AND section_id = '$section_id';";
	$queryadd = "INSERT INTO id4888052_quickatt.classes (course_id, section_id) VALUES ($course_id, $section_id);";
	$resultcheck = mysqli_query($con, $query);

	if($resultcheck)
	{
		if(mysqli_num_rows($resultcheck) > 0)
		{
		exit("This course is already in the system!");
		}
	}
	else
	{
		$resultadd = mysqli_query($con, $queryadd);
		if($resultadd)
		{
			echo "$course_id - $section_id was successfully added to Classes! <br>";
			$query="SELECT q.* from id4888052_quickatt.classes q;";
			$result=mysqli_query($con, $query);
			
			echo "<TABLE border=1>\n";
			echo "<TR><TD>CID<TD>Course id<TD>Section ID\n";
			while($row=mysqli_fetch_array($result))
			{
				$course=$row['course_id'];
				$section=$row['section_id'];
				$cid=['cid'];

				echo "<TR><TD>$cid<TD>$course<TD>$section\n";
			}	
			echo "</TABLE>\n"		
		}
		else
		{
			exit("An error has occurred.");
		}
	}

mysqli_close($con);
?>