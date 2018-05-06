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
<h2 class="display-1 text-info black-text">Add User to Database</h2>

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

	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['fname'];
	$role_id = $_POST['role_id'];
	$user_id = $_POST['user_id'];
	$password = $_POST['pwd'];

	$querycheck = "SELECT q.* FROM id4888052_quickatt.users q WHERE user_id = '$user_id' AND role_id = '$role_id' AND fname = '$fname' AND lname = '$lname';";

	$queryadd = "INSERT INTO id4888052_quickatt.users (user_id, role_id, firstname, lastname, email, pwd) VALUES ('$user_id', '$role_id', '$fname', '$lname', '$email', '$password');";
	$resultcheck = mysqli_query($con, $querycheck);
	$rowcount = mysqli_num_rows($resultcheck);
	if($rowcount>0)//result table IS NOT empty
	{
		echo "This user is already in QuickAtt records!<br>";
		echo "<a href='../add_userdb.php'>Go back. </a>";
	}
	else//if result table IS empty
	{
		$resultadd = mysqli_query($con, $queryadd);
		$a = "QuickAtt login credentials: ";
		$b = "Email: $email Password: $password";
		$msg = $a . $b;
		
		echo "User: $user_id, $fname $lname has been successfully added to QuickAtt records. The created password will be emailed to $email.<br>";
		mail("$email", "QuickAtt", $msg); //send email to new user
		echo "<a href='../admin_home.php'> Go back. </a>";
	}

mysqli_close();
?>
