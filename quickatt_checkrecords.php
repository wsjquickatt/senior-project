<?php
session_start();
?>

<?php
//check attendance information/records
//student permission role ID = 2

include "databaseinfo.php";
$con = mysqli_connect($server, $login, $password, $dbname); //connect to DB
$user_id = $_SESSION['userid'];

$query1 = "SELECT * from id4888052_quickatt.users where user_id = '$user_id';"; //information from "users" table
$result = mysqli_query($con, $query1);
$row1 = mysqli_fetch_array($result);

$role_id = $row1['role_id'];
$firstname = $row1['firstname'];
$lastname = $row1['lastname'];
$email = $row1['email'];

echo "<br>";
echo "User ID: $user_id"; echo "<br>";
echo "Role ID: $role_id"; echo "<br>";
echo "First Name: $firstname"; echo "<br>";
echo "Last Name: $lastname"; echo "<br>";
echo "Email: $email"; echo "<br>";

$query2 = "SELECT cid from id4888052_quickatt.student_course where user_id = '$user_id';"; // displays "cid" from table
$cidresult = mysqli_query($con, $query2);

echo "<TABLE border=1>\n";
echo "<TR><TD><TD>Course ID<TD>Section\n";
while($row2 = mysqli_fetch_array($cidresult))
{
	$cid = $row2['cid'];

	$query3 = "SELECT course_id, section_id from id4888052_quickatt.classes where cid = '$cid';";
	$classesresult = mysqli_query($con, $query3);
	$row3 = mysqli_fetch_array($classesresult);

	$course_id = $row3['course_id'];
	$section_id = $row3['section_id'];

	echo "<TR><TD><TD>$course_id<TD>$section_id\n";
}

echo"</TABLE>\n";




?>