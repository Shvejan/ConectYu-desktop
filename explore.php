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
#expnav{
	position:fixed;
	background-color:white;
	width:100%;
	padding:10px;
	margin-left:0.1%;
	z-index:1;
}
.expnavlinks{
	color:#626663;
	font-size:1.2em;
	display:block;
	text-align:center;
	cursor:pointer;
}
.expnavlinks:hover{
	text-decoration:none;
	color:black;
}
#createpagebtn{
	width:100%;
}
#subpage{
	width:100%;
}
input[type="file"]{
	display:none;
}
#prfskipbtn{
	width:70%;
}
#prfcontinue{
	width:25%;
}
#pagelink{
	color:black;
	background-color:white;
	padding:10px;
	display:block;
	margin-bottom:5px;
}
#pagelink:hover{
	color:black;
	text-decoration:none;
	background-color:#f5f6f7;
}
#pagprfpic{
	width:60px;
	height:60px;
	border-radius:30px;
	float:left;
	border:solid 1px #e6e6e6;
}
#apgname{
	margin-left:80px;
	margin-top:0px;
}
#apgfollowers{
	margin-left:80px;
	margin-top:0px;
	color:#969493;
}
#yourpageslabel{
	font-family:'Merienda one', cursive;
	margin-top:0px;
}
#pagepluslbl{
	float:right;
	margin-top:3%;
	margin-right:10%;
	font-size:2.3em;
	color:#e6e6e6;
}
#searchconscore{
	border-radius:23px;
	float:right;
}
#scoresearchicon{
	float:right;
	margin-top:-5.3%;
	font-size:1.3em;
	margin-right:3%;
	background-color:white;
	cursor:pointer;
}
#prfpic1{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
}
#postlabelname{
	font-size:1.6em;
	color:black;
	margin-top:15px;
	text-decoration:none;
}
#postlabelname:hover{
	text-decoration:none;
}
#designation{
	margin-top:-30px;
	color:black;
}
#designation:hover,#credits:hover{
	text-decoration:none;
}
#credits{
	color:black;
	margin-top:-5px;
	font-size:1.2em;
	font-family:'Merienda One',cursive;
}
#scorepaneltab{
	height:82px;
}
#dropdownmenu{
	margin-left:50px;
	margin-top:30px;
}
.dropdown{
	cursor:pointer;
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
	<nav class="navbar navbar-default navbar-fixed-top navbar-sticky" id="expnav" style="margin-top:64px;">
		<div class="row">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-3">
						<a href="explore.php?user_id=<?php echo $_SESSION['uid']; ?>" id="newsfeed" class="expnavlinks newsfeed" style="color:black;font-size:;"><i class="fa fa-newspaper-o" aria-hidden="true" style="color:black;font-size:1.25em;"></i> News Feed</a>
					</div>
					<div class="col-sm-3">
						<a  href="expuserscore.php?user_id=<?php echo $_SESSION['uid']; ?>" id="conectyuscore" class="expnavlinks conectyuscore"><i class="fa fa-bar-chart" aria-hidden="true" style="color:#626663;font-size:1.2em;"></i> ConectYu Score</a>
					</div>
					<div class="col-sm-3">
						<a href="exppages.php?user_id=<?php echo $_SESSION['uid']; ?>" id="pages" class="expnavlinks pages"><i class="fa fa-columns" aria-hidden="true" style="color:#626663;font-size:1.2em;"></i> Pages</a>
					</div>
					<div class="col-sm-3">
						<a href="expevents.php?user_id=<?php echo $_SESSION['uid']; ?>" id="events" class="expnavlinks events"><i class="fa fa-calendar" aria-hidden="true" style="color:#626663;font-size:1.2em;"></i> Events</a>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
			</div>
		</div>
	</nav>
	
	<div id="expnewsfeed">
		<div class="row" style="margin-top:95px;">
			<div class="col-sm-3">
			</div>
			<div class=" homeupdates col-sm-5">
				
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
	<div id="exppages">
		
	</div>
</body>
</html>

<script type="text/javascript">
	
	/*function list_updates(){
		//var userid=<?php echo json_encode($_SESSION['uid']); ?>
		/*$.ajax({
			url:'functions/functions.php',
			data:'homeupdates=1',
			type:'post',
			success:function(res){
				$('.homeupdates').html(res);
			}
		});
	}*/
	$(document).ready(function(){
		fun();
		setInterval(function(){
			fun();
		},50000);
	});
	function fun(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'homeupdates=1'+'&user_id='+user_id,
			type:'post',
			success:function(res){
				$('.homeupdates').html(res);
			}
		});
	}
</script>

<script type="text/javascript">
	/*$('#prfcontinue').click(function(){
		var pageprfpic=document.getElementById('pageprfpic').value;
		var filename = pageprfpic.replace(/C:\\fakepath\\/i, '')
		$.ajax({
			url:'explore.php',
			data:'setpageprf=1&pagefile='+filename,
			type:'post',
			success:function(res){
				alert('success');
			}
		});
	});*/
</script>
<?php 
//showing  users with conectyu scoresearchicon on search
if(isset($_POST['searchscore'])){
	global $con;
	
}

?>