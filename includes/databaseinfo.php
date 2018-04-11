<?php
	//server connection access

	$server="localhost";
	$login="id4888052_wsj";
	$password="quickatt";
	$dbname="id4888052_quickatt";

	$con = @mysqli_connect ("localhost", "id4888052_wsj", "quickatt", "id4888052_quickatt") OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );


?>