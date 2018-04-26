<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/jmstyle.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }

    </style>
</head>

<body>

    <?php
$q = $_GET['q'];
include "includes/databaseinfo.php";
$conn = mysqli_connect($server, $login, $password, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"ajax_demo");
//$cid = $_POST["cid"];
// The variable must be changed  wher it selects the class which the option was chosen
//$sql="SELECT * FROM id488052_quickatt.attendance WHERE cid = '$cid';";
//$sql="SELECT * FROM attendance WHERE course_id = '".$q."'";    
/*$sql = "SELECT attendance.cid, classes.course_id, classes.section_id, attendance.date,attendance.time,attendance.attend
FROM attendance
LEFT JOIN classes ON attendance.cid = classes.cid where course_id = '".$q."'";
*/

$sql = "SELECT * FROM attendance WHERE cid = '$q'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0){
    echo "<table class='table table-bordered' responsive >
    <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Attend</th>
    </tr>";
    //printf("Error: %s\n", mysqli_error($conn));
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['attend'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    //mysqli_close($con);
}
else
    echo "<center>NO RECORDS FOUND FOR THIS COURSE.<br></center>";

?>
</body>

</html>
