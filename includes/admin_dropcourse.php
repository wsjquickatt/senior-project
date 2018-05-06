<html>
    <div class ="container-fluid">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
   
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
   
<link href="css/jmstyle.css" type="text/css" rel="stylesheet">
 
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script> 
$(function(){
  $("#header").load("includes/header_admin.html"); 
  //$("#footer").load("footer.html"); 
});
</script> 
</head>
<body>
<div id="header"></div>
<h2 class="display-1 text-info black-text">Drop Course From Database</h2>

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

	$querycheck2 = "SELECT q.* FROM id4888052_quickatt.classes q WHERE cid = '$cid';";
	$resultcheck2 = mysqli_query($con, $querycheck2);
	$rowcount2 = mysqli_num_rows($resultcheck2);
	
	$querydelete= "DELETE FROM id4888052_quickatt.classes WHERE course_id = '$course_id' AND section_id = '$section_id' AND cid = '$cid';";

	if($rowcount == 0)
	{
		echo "The course does not yet exist.";
		echo "<a href='../drop_classdb.php'> Go back </a>" . "or" . "<a href='../add_classdb.php'> Add course.</a>";
	}
	elseif($rowcount2 == 0)
	{
		echo "The course does not yet exist.";
		echo "<a href='../drop_classdb.php'> Go back </a>" . "or" . "<a href='../add_classdb.php'> Add course.</a>";
	}
	else
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
				$cid=$row['cid'];

				echo "<TR><TD>$cid<TD>$course<TD>$section\n";
			}	
				echo "</TABLE>\n";
				echo "<br> <a href='../drop_classdb.php'> Go back. </a>";
			}		
		}
		else
	    {
		    echo "An error has occurred.<br>";
		    echo "<br> <a href='../drop_classdb.php'> Go back. </a>";
	    }
	}
?>
<div class="login_div">
    </body>
    </html>
