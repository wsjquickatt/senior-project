<!doctype html>
<html>
<head>
<?php
session_start();
?>
<meta charset="utf-8">
<title>Show MySQL DB Data</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script> 
$(function(){
  $("#header").load("includes/header.html"); 
  //$("#footer").load("footer.html"); 
});
</script> 
</head>
<body>
<div id="header"></div>
<!--Remaining section-->

<div class="container-fluid">


        
		<h2 class="black-text">Check Records</h2>
</br>
</br>
</br>
</br>
</head>

<body>

<div class="container">
	
<table class="table table-bordered">
 <thead>
 <tr>
 <th>Class ID</th>
 <th>Course ID</th>
 <th>Section ID</th>
 <th>Date</th>
 <th>Time</th>
 <th>Attend</th>
 </tr>
 </thead>
 <tbody>
 <tr>
			<?php
			include("includes/databaseinfo.php");
			$con = mysqli_connect($server, $login, $password, $dbname);
			//$_SESSION["userid"] = $user_id;

			/*Value need to bechanged to student Id Variable
			//Test Varaible
			$sql = "SELECT attendance.cid, classes.course_id,classes.section_id, attendance.date,attendance.time,attendance.attend
FROM attendance
LEFT JOIN classes ON attendance.cid = classes.cid where user_id = 7890";
*/

$sql = "SELECT attendance.cid, classes.course_id,classes.section_id, attendance.date,attendance.time,attendance.attend
FROM attendance
LEFT JOIN classes ON attendance.cid = classes.cid where user_id = $user_id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  
	 while($row = $result->fetch_assoc()) {
		 echo "<tr><td>".$row["cid"]."</td><td>".$row["course_id"]."</td><td>".$row["section_id"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["attend"]."</td></tr>";
	 }
  echo "</table>\n";
 
 } else {
	 echo "0 results";
 }
 $con->close();


			?>
</table>

</div>
</body>
</html>