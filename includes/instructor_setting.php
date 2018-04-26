<?php

if (isset($_POST['action'])) {	//checking whic button has been clicked
    switch ($_POST['action']) {
        case 'settime':
            setTime();
            break;
        case 'setkey':
            setKey();
            break;
        case 'clear_db':
            clearTable();
            break;
    }
}
else{
    echo "asdsadasd";
}


function setTime(){	
include('databaseinfo.php'); // Connect to the db.

$c = $_REQUEST['course'];	//receive nput from ajax
$class_s = $_REQUEST['start'];
$late_s = $_REQUEST['late_start'];
$late_e = $_REQUEST['late_end'];
$class_e = $_REQUEST['end'];

		$update_sql = "UPDATE classes SET start_time = '$class_s', late_start = '$late_s', late_end = '$late_e', end_time = '$class_e' WHERE cid = '$c' ";
        $result = mysqli_query($con, $update_sql);

        if(mysqli_affected_rows($con) > 0){
            echo "The record has been updated successfully"; //if sql is successful
        }
        else{
            echo "Error. Something went wrong!"; //if sql fails
        }
	exit;
}



function setKey(){    
include('databaseinfo.php'); // Connect to the db.

$c = $_REQUEST['course'];   //receive nput from ajax
$newkey = $_REQUEST['newkey'];
//$newkey = (isset($_REQUEST['newkey']) ? $_REQUEST['newkey'] : null);   
//echo "the cid is $c and the key is $newkey <br>";

    if(!empty($newkey) AND $newkey != NULL ){
        // $update2_sql = "UPDATE qr SET key = '$newkey' WHERE cid = '$c' ";
        $update2_sql = "UPDATE `qr` SET `key`= '$newkey' WHERE `cid`= '$c' ";
        $result2 = mysqli_query($con, $update2_sql);

        if(mysqli_affected_rows($con) > 0){
            echo "The record has been updated successfully"; //if sql is successful
        }
        else{
            echo "Error. Something went wrong!"; //if sql fails
        }
    }
    else{
        echo "Invalid Input, Try Again!";
    }

    exit;
}



function clearTable(){    
include('databaseinfo.php'); // Connect to the db.

$c = $_REQUEST['course'];   //receive nput from ajax

    $delete_sql = "DELETE FROM attendance WHERE cid = '$c' ";
    $result = mysqli_query($con, $delete_sql);

    if(mysqli_affected_rows($con) > 0){
        echo "The record has been deleted successfully"; //if sql is successful
    }
    else{
        echo "Error. Something went wrong!"; //if sql fails
    }
    exit;
}

?> 