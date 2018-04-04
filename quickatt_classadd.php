<?php
session_start();
?>

<?php
//add course (student role ID = 3)
include "databaseinfo.php";
$con = mysqli_connect($server, $login, $password, $dbname); //connect to DB

$courseid = $_POST['course_id'];
$sectionid = $_POST['section'];
//$userid = $_SESSION['userid']; //requires session start
$userid = $_POST['user_id'];

$query = "SELECT q.cid FROM id4888052_quickatt.classes q WHERE q.course_id = '$courseid' AND q.section_id = '$sectionid';";
$cidresult = mysqli_query($con, $query); //result is "cid"
$row = mysqli_fetch_array($cidresult);
$cid = $row["cid"]; //gets cid value

$queryadd = "INSERT INTO id4888052_quickatt.student_course VALUES('$userid','$cid');";

$querycheck= "SELECT q.* from id4888052_quickatt.student_course q WHERE cid = '$cid' AND user_id = '$userid';";
$checkresult = mysqli_query($con, $querycheck);
$rowcount = mysqli_num_rows($checkresult);

if($rowcount>0)//checks query for multi rows (table is populated)
{
	echo "You are already registered for the course $courseid - $sectionid!";
	echo "<br>";
}
elseif($rowcount==0) //checks for empty table
{
	$addresult = mysqli_query($con, $queryadd);

	if($addresult)
	{
		echo "The class $courseid - $sectionid has been successfully added to User: $userid.";
	}
	else
	{	
		echo "An error has occured.";
	}

}


?>