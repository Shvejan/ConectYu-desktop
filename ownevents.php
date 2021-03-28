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
	$username=$row_user['user_name'];
	$user_email=$row_user['user_email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Explore</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php echo $user_id; ?>'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet"> <!-- signin link -->
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
input[type="file"]{
	display:none;
}
</style>
<style>
#prf_pic1{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
}
#post_labelname{
	font-size:1.6em;
	color:black;
	margin-top:5px;
	text-decoration:none;
}
#post_labelname:hover{
	text-decoration:none;
}
#post_img{
	position:absolute;
	width:95%;
	height:580px;
	align:center;
}
#post_body{
	height:600px;
}
@media only screen and (max-width: 760px) {
	#dropdownmenu{
		margin-right:100px;
		margin-top:30px;
	}
}

</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<?php
				$eventsObj = new Events();
				$eventsObj->showEvents();
			?>
		</div>
		<div class="col-sm-3">
		</div>
	</div>
	
	
</body>
</html>


