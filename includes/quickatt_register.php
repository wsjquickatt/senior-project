<HTML>
<HEAD>
	<style>
  .red-text {
    color: red;
      font-family: Lato, Monospace;
      text-align: center;
      font-size: 80px;
  }
</style>
</HEAD>
<BODY></BODY>
</HTML>

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
		    echo "<h1 class='red-text'>Error!</h1>"; echo "<br>";
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