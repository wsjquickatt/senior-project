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
<h2 class="display-1 text-info black-text">View All Users</h2>

<?php
session_start();

	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
	//view ALL users list (admin role ID = 1) based on class ID
	include "databaseinfo.php";

	$role_id=$_SESSION['roleid'];
	
	$query = "SELECT q.* from id4888052_quickatt.users q;";
	$result = mysqli_query($con, $query);

	echo "<TABLE border=1>\n";
	echo "<TR><TD><TD>User ID<TD>Role ID<TD>First Name<TD>Last Name<TD>Email<TD>Password\n";
	$count = 1;
	while($row = mysqli_fetch_array($result)) //gets "user_id" 
	{
			$user_id=$row['user_id'];
			$role_id_DB=$row['role_id'];
			$fname=$row['firstname'];
			$lname=$row['lastname'];
			$email=$row['email'];
			$password=$row['pwd'];

			echo "<TR><TD>$count<TD>$user_id<TD>$role_id_DB<TD>$fname<TD>$lname<TD>$email<TD>$password\n";
			$count = $count + 1; //increment counter
	}
	echo"</TABLE>\n";
	
mysqli_close($con);
?>