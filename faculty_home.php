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
    width: 200px;
    margin: 0 auto;
}
    

        

    </style>
   
<head>
<script>
function showUser(str) {
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
        xmlhttp.open("GET","getcourse.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

     <div class="container-fluid">

<h1 class="red-text">QuickAtt</h1>
<h2 class="black-text">Faculty Home</h2>
<br>
 <br>
 <br>
 <br>
    
<form>




                        <select class="form" name="course_id" onchange="showUser(this.value)" required="required" method = "post">
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


$query2 = "select course_id, cid from classes";
$result2 = $conn->query($query2);
while($row = mysqli_fetch_array($result2)){

$course_id = $row['course_id'];
$cid = $row['cid'];

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