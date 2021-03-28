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
	<title>ConectYu-Post</title>
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
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
#prf_pic12{
	width:44px;
	height:44px;
	border:#e6e6e6 solid 2px;
	border-radius:22px;
}
#post_labelname1{
	font-size:1.6em;
	color:black;
	margin-top:5px;
	text-decoration:none;
	margin-left:0px;
}
#post_labelname1:hover{
	text-decoration:none;
}

</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="commentdetails"></div>
		</div>
		<div class="col-sm-4">
		</div>
	<div>
	



</body>
</html>
<?php 
	if(isset($_GET['user_id']) and isset($_GET['post_id'])){
?>
	<script type="text/javascript">
		$(document).ready(function(){
			comment_details();
			setInterval(function(){
				comment_details();
			},30000);
			//$(document).scrollTop($(document).height()); 
		});
		function comment_details(){
			var postid=<?php echo json_encode($_GET['post_id']); ?>;
			var userid=<?php echo json_encode($_GET['user_id']); ?>;
			$.ajax({
				url:'functions/operations.php',
				data:'postdetails=1'+'&user_id='+userid+'&post_id='+postid,
				type:'post',
				success:function(data){
					$('.commentdetails').html(data);
				}
			});
		}
	</script>
<?php }elseif(isset($_GET['user_id']) and isset($_GET['file_id'])){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			pagecomment_details();
			setInterval(function(){
				pagecomment_details();
			},50000);
			//$(document).scrollTop($(document).height()); 
		});
		function pagecomment_details(){
			var postid=<?php echo json_encode($_GET['file_id']); ?>;
			var userid=<?php echo json_encode($_GET['user_id']); ?>;
			$.ajax({
				url:'functions/operations.php',
				data:'pagepostdetails=1'+'&user_id='+userid+'&post_id='+postid,
				type:'post',
				success:function(data){
					$('.commentdetails').html(data);
				}
			});
		}
	</script>
<?php } ?>
