<html>
<div class="container-fluid">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/jmstyle.css" type="text/css" rel="stylesheet">


    <!-- bootstrap for table -->

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!--JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="bootstable.min.js"></script>

    <script>
        $('#makeEditable').SetEditable();
        $('#makeEditable').SetEditable({
            $addButton: $('#but_add')
        });

    </script>
    <!--Previous code starts here-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(function() {
            $("#header").load("includes/header.html");
            //$("#footer").load("footer.html"); 
        });

    </script>
    </head>

    <body>
        <div id="header"></div>
        <!--Remaining section-->


        <head>
            <script>
                function showCourse(str) {
                    if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHint").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET", "getcourse_faculty.php?q=" + str, true);
                        xmlhttp.send();
                    }
                }

            </script>
        </head>

        <body>

            <div class="container-fluid">
                <br>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2 class="display-1 text-info black-text">Faculty Home</h2>
                <br>
                <br>
                <br>
                <br>

                <form class="form-inline justify-content-center">




                    <select name="course_id" onchange="showCourse(this.value)" required="required" method="GET">
<option selected value="">---Please Select a Course---</option> 

<?php

include "includes/databaseinfo.php";
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

$course_id = $row['course_id'];
//$cid = $row['cid'];

echo "<option value='$course_id'> $course_id</option>\n";
}
$conn->close();
?>
                
</select>
                    <br>



                </form>






                <br>
                <div class="form" id="txtHint"><b>The class attendance will be listed here...</b></div>




        </body>

</html>
