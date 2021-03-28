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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Apply Patents/Copyrights</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet"> <!-- h2 -->
	<script src="https://kit.fontawesome.com/6d15a9d73e.js" crossorigin="anonymous"></script><!-- fa fa-icons -->
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sriracha|Courgette&display=swap" rel="stylesheet">
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
#info{
	font-family: 'Merienda One',cursive;
	font-size:1.5em;

}
#orgname,#types{
	margin-right:25%;
	font-family: 'Courgette', cursive;
	font-size:2em;
}
#types{
	font-size:1.2em;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3 col-xs-0">
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<p id="info">Apply for <i>patents</i>, <i>Copyrights</i> or <i>Trademarks</i> through the following organizations.</p>
				</div>
				<div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-body">
							<a href="" class="btn" style="width:100%;">
								<img src="images/indiafilings.jpg" style="width:70px;height:70px;border-radius:35px;float:left;">
								<p id="orgname">India Filing</p>
								<p id="types">All types of Patents,Copyrights,Trademarks</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-0">
		</div>
	</div>
	
</body>
<html>
<?php

?>