<?php
session_start();
?>
 
<html>
<body>

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
        <h2 class="black-text">Select Course to Take Attendance</h2>
       
<! TEST FORM to add course. needs variables for fname,lname, course, section, and password to implement >    
               
        <div class="login_form">
        <br>
        <form action="QR.html" method="post">

	        <select name="course_id" required="required">
			<option selected value="">---Please Select a Course---</option>
            <!Need to change and query from STUDENT_COURSE TABLE>   
				<?php

				include "includes/databaseinfo.php";
				$conn = mysqli_connect($server, $login, $password, $dbname);


				$class_query = "select * from classes";
				$result = $conn->query($class_query);
				while($row = mysqli_fetch_array($result)){
				$c_id = $row['cid'];
				$course_id = $row['course_id'];
				$s_id = $row['section_id'];
				//submit multiple variable 
				echo "<option value='$c_id, $course_id, $s_id'> $course_id - $s_id</option>\n";
				}
				$conn->close();
				?>
	                
			</select>
			<br>
	        <br>
	            <center><input class="form" type="submit"/></center>
	    </form>

		</div>
    </div>
</div>

<center><a href= "index.html">GO BACK TO LOGIN PAGE</a><br><br></center>
<center><a href= "QR.html">GO TO QR READER PAGE </a><br><br></center>
<center><p>MAKE A QR CODE: <a href= "http://goqr.me/" target="_blank"> http://goqr.me/</a></p><br><br></center>

</body>
</html>