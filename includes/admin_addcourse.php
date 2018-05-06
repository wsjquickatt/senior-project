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
	$course_id = $_POST['course_id'];
	$section_id = $_POST['section_id'];
	$cid = $_POST['cid'];

	$querycheck = "SELECT q.* FROM id4888052_quickatt.classes q WHERE course_id = '$course_id' AND section_id = '$section_id';";
	$resultcheck = mysqli_query($con, $querycheck);
	$rowcount = mysqli_num_rows($resultcheck);

	$queryadd = "INSERT INTO id4888052_quickatt.classes (cid, course_id, section_id) VALUES ('$cid', '$course_id', '$section_id');";
	

	if($resultcheck)
	{
		if($rowcount > 0)
		{
		exit("This course, $course_id - $section_id is already in the system!");
		}
	}
	else
	{
		$resultadd = mysqli_query($con, $queryadd);
		if($resultadd)
		{
			if(mysqli_affected_rows($con))
			{
			echo "$course_id - $section_id was successfully added to Classes! <br><br>";
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
			echo "<br> <a href='../addclassdb.php'> Go back. </a>";
			}		
		}
		else
		{
			echo "An error has occurred.";
			echo "<a href='../addclassdb.php'> Go back.</a>";
		}
	}

mysqli_close($con);
?>