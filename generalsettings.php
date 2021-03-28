<?php
session_start();
include("includes/connection.php");
include("header.php");
include("functions/functions.php");
?>
<?php
	$u_id=$_SESSION['uid'];
	$select_user="select * from users where user_id='$u_id'";
	$run_user=mysqli_query($con,$select_user);
	$row_user=mysqli_fetch_array($run_user);
	$prfpic=$row_user['profile_pic'];
	$user_name=$row_user['user_name'];
	$user_email=$row_user['user_email'];
	$phno=$row_user['user_phno'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-settings</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php $user_id ?>'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet"> <!-- signin link -->
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
#returnlink{
	padding:5px;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<!-- CODE FOR GENERAL SETTINGS -->
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<a href="settings.php" style="font-size:2em;color:black;" id="returnlink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<span style="font-size:1.5em;font-family: 'Merienda One',cursive;margin-left:4.5%;"><strong>Account Settings</strong></span>
				</div>
				<div class="panel-body" id="gsettings">
					<a href="activity.php" id="">Your Login Activity</a><hr>
					<a href="savedposts.php?user_id=<?php echo $_SESSION['uid']; ?>" id="">Saved Posts</a><hr>
					<a href="likedposts.php?user_id=<?php echo $_SESSION['uid']; ?>" id="">Liked Posts</a><hr>
					<a id="">Languages</a><hr>
					<a href="syncingcontacts.php" id="">Contacts Syncing</a><hr>
					<a href="datausage.php" id="">Data usage</a>
					
				</div>
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</body>
</html>
