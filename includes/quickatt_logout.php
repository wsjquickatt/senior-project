<HTML>
<HEAD>
	<style type="text/css">
        <!--
        html, body, #tbl_wrap { height: 100%; width: 100%; padding: 0; margin: 0; }
        #td_wrap { vertical-align: middle; text-align: center; }
        -->
        </style>
</HEAD>
<BODY>

<table id="tbl_wrap"><tbody><tr><td id="td_wrap">
        <!-- START: Anything between these wrapper comment lines will be centered -->
<div style="border: 1px solid black; display: inline-block;">
<h4>Thank You!</h4>
</div>
        <!-- END: Anything between these wrapper comment lines will be centered -->
        </td></tr></tbody></table>
<?php
include ("databaseinfo.php");
	session_start();
	session_unset();
	session_destroy();
	mysqli_close($con);
	//logout screen?
	exit;
?>

</BODY>
</HTML>