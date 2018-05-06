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
<h2 class="display-1 text-info black-text">Drop User From Database</h2>

<?php
session_start();

	if((!isset($_SESSION['login'])) || ($_SESSION['login'] == false))
	{
		header("location: index.html");
	}
	
//add user ADMIN role

	include ("databaseinfo.php");
	
	$roleid = $_SESSION['roleid'];
	$userid = $_SESSION['userid'];

	$role_id = $_POST['role_id'];
	$user_id = $_POST['user_id'];

	$querycheck = "SELECT q.* FROM id4888052_quickatt.users q WHERE user_id = '$user_id' AND role_id = '$role_id';";
	$querydelete = "DELETE FROM id4888052_quickatt.users WHERE user_id = '$user_id' AND role_id = '$role_id';";

	$resultcheck = mysqli_query($con, $querycheck);
	$rowcount = mysqli_num_rows($resultcheck);
	if($rowcount>0)//result table IS NOT empty
	{
		$resultdelete = mysqli_query($con, $querydelete);
		echo "User: $user_id, $fname $lname has been successfully dropped from QuickAtt records. <br>";
		echo "<br> <a href='../drop_userdb.php'> Go back. </a>";
	}
	else//if result table IS empty
	{
		echo "This user is not in QuickAtt records!<br>";
		echo "<a href='../drop_userdb.php'> Go back. </a>";
	}

mysqli_close();
?>
