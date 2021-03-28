<?php
session_start();
?>
<?php
	include("includes/connection.php");
	session_destroy();
	global $con;
	$sessionuid=$_COOKIE['sessionuid'];
	$sid=$_SESSION['sid'];
	$changestatus=mysqli_query($con,"update users set status='inactive' where user_id='$sessionuid'");
	$endsession=mysqli_query($con,"update user_sessions set end_time=NOW() where sessionid='$sid'");
	setcookie("sessionuid","",time() -0.5);
	header("location:index");
?>