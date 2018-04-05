<?php
sessions_start();
?>

<?php
//add course (student role ID = 3)
include "databaseinfo.php";
$con = mysqli_connect($server, $login, $password, $dbname); //connect to DB

$courseid = $_POST["course_id"];
$sectionid = $_POST["section_id"];
$userid = $_SESSION["userid"];

$query = "SELECT q.cid FROM id4888052_quickatt.classes q WHERE q.course_id = '$courseid' AND section_id = '$sectionid';";
$cidresult = mysqli_query($con, $query); //result is "cid"
$row = mysqli_fetch_array($cidresult);
$cid = $row["cid"]; //gets cid value

$queryadd = "INSERT INTO id4888052_quickatt.student_courses VALUES('$userid','$cid');";
$resultadd = mysqli_query($con, $queryadd);

if($resultadd)
{
	echo "The class $courseid , $sectionid has been successfully added.";
}
else
{
	echo "An error has occured.";
}


?>