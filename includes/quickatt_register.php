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
<h2 class="display-1 text-info black-text">Register New User</h2>

<?php
	//register
	
	include "databaseinfo.php";

	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$email = $_POST['email'];
	$user_id = $_POST['id']; //school id
	$role_id = $_POST['permission']; //student or teacher
	$password= $_POST['password'];

	if($role_id == "Student")
		$role_id = 3; //student
	else
		$role_id = 2; //faculty

	$query="INSERT INTO id4888052_quickatt.users (user_id, role_id, firstname, lastname, email, pwd) VALUES ('$user_id', '$role_id', '$fname', '$lname', '$email', '$password');";
	$querycheck="SELECT q.* FROM id4888052_quickatt.users q WHERE user_id = '$user_id';";
	$resultcheck= mysqli_query($con, $querycheck);
	$rowcount = mysqli_num_rows($resultcheck);
	
	if($rowcount == 0)
	{
	    if(ctype_digit ($user_id)) // check if numberic value for userID
	    {
		    $result=mysqli_query($con, $query);	
		    if($result)
		    {
			    echo "You have been successfully registered!";
			    echo "<a href= '../index.html'> Return to login</a>";
		    }
		    else
		    {
			    echo "(1)There has been an error.";
			    echo "<a href='../new_user.html'> Try again. </a>";
			    
		    }
	    }
	    else
	    {
		    echo "Error!"; echo "<br>";
		    echo "(2)User ID must be ALL numeric values!"; echo "<br>";
		    echo "<a href= '../new_user.html'>Go back</a>";
	    }
	}
	else
	{
	    echo "(3)Unable to register... User ID $user_id is already registered.";
	    echo "<a href='../new_user.html'> Try again. </a>";
	}

mysqli_close($con);
?>
