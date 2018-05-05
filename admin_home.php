<?php
session_start();
?>
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

    <title>Admin Home Page</title>

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
                        xmlhttp.open("GET", "getuser_admin.php?q=" + str, true);
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
                <center>GO TO <a href= "prof_set.php">SETTINGS</a> PAGE</center>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2 class="display-1 text-info black-text">Adminstrator Home</h2>
                <br>
                <br>
                <br>
                <br>

                <form class="form-inline justify-content-center">

                    <select name="course_id" onchange="showCourse(this.value)" required="required" method="GET">
                    <option selected value="">---Please Select a User---</option> 
                        <?php
                        include "includes/databaseinfo.php";
                        $conn = mysqli_connect($server, $login, $password, $dbname);

                        $user = $_SESSION['userid'];
                        $class_query = "SELECT user_id,firstname, lastname from users;";
                        $result = $conn->query($class_query);
                        while($row = mysqli_fetch_array($result)){
                        $uid=$row['user_id'];
                        $fname = $row['firstname'];
                        $lname = $row['lastname'];
                        //submit 
                        echo "<option value='$uid'> $fname $lname</option>\n";
                        }
                        $conn->close();
                        ?>
            
                    </select>
                    <br>
                </form>

                <br>
                 
                <div class="form" style="color:red" id="txtHint"><b>The class attendance will be listed here...</b></div>

        </body>

</html>
