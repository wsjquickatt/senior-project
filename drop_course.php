
<html>
    <div class ="container-fluid">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
   
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
   
<link href="css/jmstyle.css" type="text/css" rel="stylesheet">
 
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script> 
$(function(){
  $("#header").load("includes/header.html"); 
  //$("#footer").load("footer.html"); 
});
</script> 
</head>
<body>
<div id="header"></div>
<h2 class="display-1 text-info black-text">Drop Course</h2>

<div class="login_div">
   
<form class ="login_form" action="includes/quickatt_dropclass.php" method = "post">
    
 
    <br>
    <br>
    <input class="form-control input-sm" type="text" required placeholder="Course ID" name="course_id" required="required"><br>
    <br>
    <input class="form-control input-sm" type="text" required placeholder="Section ID" name="section_id" required="required"><br>
   
    <br>
  <button class="btn btn-primary btn-lg" type="submit">Submit</button>

</form>
     
</div>

  </div>
</div>
