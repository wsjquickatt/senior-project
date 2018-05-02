<?php
session_start();
$user_id = $_SESSION['userid'];
?>



<html>
    <div class ="container-fluid">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
   
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
   
<link href="css/jmstyle.css" type="text/css" rel="stylesheet">
 
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script> 
$(function(){
  $("#header").load("includes/header_admin.html"); 
  //$("#footer").load("footer.html"); 
});
</script> 
</head>
<body>
<div id="header"></div>
<h2 class="display-1 text-info black-text">Drop User</h2>

<div class="login_div">


<!-- Add url to the action-->   
<form class ="login_form" action="" method = "post">
    
 
<input class="form-control input-sm" type="text" required placeholder="User ID"  name="userid" required=" required"><br>
    <br>
    <input class="form-control input-sm" type="text" required placeholder="First Name" name="fname" required="required"><br>
    <br>
    <input class="form-control input-sm" type="text" required placeholder="Last Name" name="section_id" required="required"><br>
    <br>
    <input type="radio" name="Role" value="2" checked> Professor<br>
  <input type="radio" name="Role" value="3"> Students<br>
  <button class="btn btn-primary" type="submit">Submit</button>

</form>
     
</div>

  </div>
</div>
