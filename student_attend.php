<?php
session_start();
?>
 
<html>
<body>

<div class="container-fluid">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 -->    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
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
        <div class="d-flex justify-content-center">
            <div class="login_form">
            <br>
            <form action="QR.html" method="post">
        	        <select name="course_id" required="required">
        			<option selected value="">---Please Select a Course---</option>
                    <!Need to change and query from STUDENT_COURSE TABLE>   
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
        			<br>
        	        <br>
    	            <center><input class="form" type="submit"/></center>
    	    </form>
    		</div>
        </div>
    </div>
</div>

<center>GO BACK TO <a href= "student_home.php">HOME PAGE</a><br><br></center>
<center>CHANGE USER: <a href= "includes/quickatt_logout.php">Log Out</a><br><br></center>
<!-- <center><p>MAKE A QR CODE: <a href= "http://goqr.me/" target="_blank"> http://goqr.me/</a></p><br><br></center>
 -->
</body>
</html>