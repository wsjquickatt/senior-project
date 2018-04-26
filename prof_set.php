<?php 
session_start();

//if submit is clicked but the admin login is not checked
if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['adminlogin']))) {	
	if (!empty($_POST['username']))
		$username = $_POST['username'];

	if (!empty($_POST['password']))
		$password = $_POST['password'];

	// if (authenticate_admin($username, $password) != true) {
	// 	include 'includes/footer.html';
	// 	exit();
	// }
}
?>

<html>
<head>
	<title>Instructor Home</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body class="text-center">
	<div class="container" id="page-container">
		<div class="row" id="banner-title">
			<div class="col-sm-12">
				<h1><i class="fa fa-gear"></i> Password and Time Settings </h1>
			</div>
		</div>
		<hr>
		<a href="faculty_home.php"><button style="float:left; background-color:#555555; color:white;">GO BACK TO HOME PAGE</button></a>
		<br><br>
	<div class="form-container">
		<h2> Select Course</h2>	
		<br>
	

	<form action="" method="post" >
			<!--Show result from functions here: -->
			<p id="alert1" style="display:none;" class="alert alert-info text-center"><span id="result1" ></span></p>	
			<div class="form-group">
				Course:&nbsp;  <select style="width:85px;" name="course" id="course" > 
                        <?php
                        include "includes/databaseinfo.php";
                        $conn = mysqli_connect($server, $login, $password, $dbname);
                        $user = $_SESSION['userid'];
                        $class_query = "SELECT a.cid, a.course_id, a.section_id FROM classes a, user_course b WHERE a.cid=b.cid AND b.user_id='$user'
                        ORDER BY a.course_id, a.section_id ASC ";
                        $result = $conn->query($class_query);
                        while($row = mysqli_fetch_array($result)){
                        $c_id = $row['cid'];
                        $course_id = $row['course_id'];
                        $s_id = $row['section_id'];
                        //submit cid
                        echo "<option value='$c_id'> $course_id - $s_id</option>\n";
                        }
                        $conn->close();
                        ?>n->close();
        				?>
				</select>
			</div>
			<br>
			<h2> Set QR Passcode</h2>	
			<br>
			<div class="form-group row">
				 <label for="key" class="col-sm-2 col-form-label">New QR Code:</label>
				 <div class="col-sm-10">
		    	 <input type="text" name="newkey" id="newkey" class="form-control" placeholder="New QR Code..." required />	
	    		 </div>
		    </div>
		    <div class="button-group">
			    <button name="setkey" id="setkey" value="setkey" class="button btn btn-warning"> Set Key </button>
		    </div>
	</form>


	<br><br><br>
	<h2> Set Allowed Sign-in Time:</h2>
	<br>
	<form action="" method="post">
			<!--Show result from functions here: -->
			<p id="alert2" style="display:none;" class="alert alert-info text-center"><span id="result2" ></span></p>	
			<div class="d-flex justify-content-center">

				<div class="d-flex justify-content-center">

			    	Class Start Time:&nbsp;  <select style="width:85px;" name="start" id="start" > 
					    <?php 
						for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
						    for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
						        echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
						                       .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';;
					    ?>
					</select>&nbsp;&nbsp;
					Late Start Time:&nbsp; <select style="width:85px;" name="late_start" id="late_start"> 
					    <?php 
						for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
						    for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
						        echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
						                       .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
					    ?>
					</select>&nbsp;&nbsp;
					Late End Time:&nbsp; <select style="width:85px;" name="late_end" id="late_end">  
					    <?php 
						for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
						    for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
						        echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
						                       .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
					    ?>
					</select>&nbsp;&nbsp;
					Class End Time:&nbsp; <select style="width:85px;" name="end" id="end"> 
					    <?php 
						for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
						    for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
						        echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
						                       .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
					    ?>
					</select>&nbsp;&nbsp;
				</div>

			</div>
			<br>
				<div class="button-group">	
				    <button name="settime" id="settime" value="settime" class="button btn btn-success"> Set Time </button>
	<!-- 				<button name="update" value="update" class="button btn btn-success">Update User</button>
					<button name="delete" value="delete" class="button btn btn-danger">Delete User</button> -->
			    </div>
	</form>


	<br><br><br>
	<h2> Clear Attendance records:</h2>
	<br>
	<form action="" method="post">
			<!--Show result from functions here: -->
			<p id="alert3" style="display:none;" class="alert alert-info text-center"><span id="result3" ></span></p>	

			<div class="button-group">	
			    <button name="clear_db" id="clear_db" value="clear_db" class="button btn btn-danger"> Clear Records </button>
		    </div>
	</form>

	</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>
