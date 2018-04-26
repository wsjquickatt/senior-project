<?php


if (isset($_POST['action'])) {	//checking whic button has been clicked
    switch ($_POST['action']) {
        case 'insert':
            insertAttend();
            break;
        case 'key':
            getkey();
            break;
    }
}


function getkey(){		// function to retrieve QR code key from database
include('databaseinfo.php'); 	// Connect to the db.

	$getkey_sql = "SELECT * FROM qr";
	$result = mysqli_query($con, $getkey_sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$key = $row['key'];
		}
		return $key;
	}
	else{
		echo "error";
	}
exit;
}


function insertAttend(){	
include('databaseinfo.php'); 	// Connect to the db.

$time = gettimeofday();

	$insert_sql = "INSERT INTO attendance('user_id', 'firstname', 'lastname', 'cid', 'date', 'time', 'attend') VALUES ('','','','','', $time,'P')";
	$insert_result = mysqli_query($con, $insert_sql);

	if(mysqli_num_rows($insert_result) > 0){
		echo "You have successfully logged in";
	}
	else{
		echo "Error. Something went wrong.";
	}
exit;
}

?>