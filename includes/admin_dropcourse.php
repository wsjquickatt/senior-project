<?php
session_start();

	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
//drop course;  admin role

	include ("databaseinfo.php");
	
	$roleid = $_SESSION['roleid'];
	$userid = $_SESSION['userid'];
	$course_id = $_POST['course_id'];
	$section_id = $_POST['section_id'];
	$cid = $_POST['cid'];

	$querycheck = "SELECT q.* FROM id4888052_quickatt.classes q WHERE course_id = '$course_id' AND section_id = '$section_id';";
	$resultcheck = mysqli_query($con, $querycheck);
	$rowcount = mysqli_num_rows($resultcheck);

	$querydelete= "DELETE FROM id4888052_quickatt.users WHERE user_id = '$user_id';";
	if($resultcheck)
	{
		if($rowcount == 0)
		{
			exit("The course does not yet exist.");
		}
		elseif($rowcount > 0)
		{
			$resultdelete = mysqli_query($con, $querydelete);
			if($resultdelete)
			{
				if(mysqli_affected_rows($con))
				{
				echo "$course_id - $section_id was successfully deleted from Classes! <br>";
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
				echo "<br> <a href='../dropclassdb.php'> Go back. </a>";
				}		
			}
			else
			{
				echo "An error has occurred.";
				echo "<a href='../dropclassdb.php'> Go back.</a>";
			}
		}
	}

?>