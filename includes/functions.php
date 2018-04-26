<?php
function getkey(){		// function to retrieve QR code key from database
include('databaseinfo.php'); 	// Connect to the db.


	$value = "";
	$course = isset($_SESSION['courseid']) ? $_SESSION['courseid'] : '';
	if(!empty($course)){

		$getkey_sql = "SELECT * FROM qr WHERE cid='$course'";
		$result = mysqli_query($con, $getkey_sql);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				$key = $row['key'];
			}
			$value = $key;
			return $value;
		}
		else{
			return $value;
		}

	}
	else{
		die ("Invalid Course. Try Again.<br>");
	}
exit;
}


?>