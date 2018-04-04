<html>
<div class="container-fluid">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

    <style>
        .red-text {
            color: red;
            font-family: Lato, Monospace;
            text-align: center;
            font-size: 80px;
        }

        .black-text {
            color: black;
        }

        h1 {
            font-family: Lato, Monospace;
            text-align: center;
            font-size: 80px;
        }

        h2 {
            font-family: Lato, Monospace;
            text-align: center;
            font-size: 40px;
        }


        div.form {
            display: block;
            text-align: center;
        }

        form {
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }

        .login_div {
            font-family: Lato, Monospace;
            position: absolute;
            text-align: center;

            width: 300px;
            height: 300px;

            /* Center form on page horizontally & vertically */
            top: 50%;
            left: 90%;
            margin-top: -150px;
            margin-left: -150px;
        }

        .login_form {
            width: 1300px;
            height: 300px;
            text-align: center;

            background: white;
            border-radius: 10px;

            margin: 0;
            padding: 0;
        }

        

    </style>
    <div class="container-fluid">

        <h1 class="red-text">QuickAtt</h1>
        <h2 class="black-text">Course Home</h2>
        
       
        <?php

include "databaseinfo.php";
    $con = mysqli_connect($server, $login, $password, $dbname);


// TEST Table to show  course id for student, date, time and attendance. Variable for user id must be changed.


$sql = "SELECT attendance.cid, classes.course_id,classes.section_id, attendance.date,attendance.time,attendance.attend
FROM attendance
LEFT JOIN classes ON attendance.cid = classes.cid where user_id = 7890";
$result = $con->query($sql);

if ($result->num_rows > 0) {
   
   echo "<TABLE border=1>\n";
	echo"<TABLE border=1\n";
    echo"<table class=container-fluid>\n";
    echo "<tr><th>Course ID</th><th>Course ID</th><th>SectionID</th><th>Date</th><th>Time</th><th>attend</th></tr>";
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["cid"]."</td><td>".$row["course_id"]."</td><td>".$row["section_id"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["attend"]."</td></tr>";
    }
 echo "</table>\n";

} else {
    echo "0 results";
}
$con->close();

?>
<! TEST FORM to add course. needs variables for fname,lname, course, section, and password to implement >    


            <body>
               
                 <div class="login_form">
                 <br>
                 <br>
                 <h2 class="black-text">Add Course</h2>
                 <br>
                <form action="quickatt_register.php" method="post">
                   



                     <select name="course_id" required="required">
<option selected value="">---Please Select a Course---</option> ...
<?php

include "databaseinfo.php";
$conn = mysqli_connect($server, $login, $password, $dbname);
// Check connection
/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/


$query2 = "select course_id from classes";
$result2 = $conn->query($query2);
while($row = mysqli_fetch_array($result2)){
//$c_id = $row['c_id'];
$course_id = $row['course_id'];
echo "<option value='$course_id'> $course_id</option>\n";
}
$conn->close();
?>
                
</select>
<br>
                    <br>
                        <input class="form" type="submit">
                        <br>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='QRScan.html'>Take Attendance</a>



</form>
                    </div>
                
            </body>
    </div>
</div>
</html>