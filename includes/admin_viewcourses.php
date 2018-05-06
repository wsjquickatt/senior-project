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
<h2 class="display-1 text-info black-text">View All Courses</h2>

<?php
//view all courses (ADMIN)

session_start();

	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
	//view ALL users list (admin role ID = 1) based on class ID
	include "databaseinfo.php";

	$role_id=$_SESSION['roleid'];
	
	$query = "SELECT q.* from id4888052_quickatt.classes q;";
	$result = mysqli_query($con, $query);

	echo "<TABLE border=1>\n";
	echo "<TR><TD>CID<TD>Course Name<TD>Section\n";
	while($row = mysqli_fetch_array($result)) //gets "user_id" 
	{
			$cid=$row['cid'];
			$coursename=$row['course_id'];
			$section=$row['section_id'];

			echo "<TR><TD>$cid<TD>$coursename<TD>$section\n";
	}
	echo"</TABLE>\n";
	
mysqli_close();


?>