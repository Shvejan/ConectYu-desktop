<?php
session_start();
include("includes/connection.php");
include("header.php");
//include("functions/functions.php");
?>
<?php
if(isset($_SESSION['uid'])){
	$user_id=$_SESSION['uid'];
	$select_user="select * from users where user_id='$user_id'";
	$run_user=mysqli_query($con,$select_user);
	$row_user=mysqli_fetch_array($run_user);
	$prfpic=$row_user['profile_pic'];
	$user_name=$row_user['user_name'];
}else{
	echo "<script>window.open('logout.php','_self');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Activity</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php echo $user_id; ?>'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet"> <!-- signin link -->
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	
	<script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
		
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
.parent {
  display: flex;
  flex-direction: column;
}
.child {
  margin-top: auto;
}
span{
	float:left;
}
.useractivity{
	overflow-x:scroll;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50" id="body">
	
	<div class="row" style="margin-top:10%;">
		<div class="col-xs-3 col-sm-3 col-lg-3">
		</div>
		<div class="col-xs-6 col-sm-6 col-lg-6">
			<div class="panel panel-default" style="height:500px;width:100%;">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-1 col-lg-1">
							<div class="row">&nbsp &nbsp 25<span style="border-bottom:1px solid black;margin-right:-5px;width:10px;float:right;margin-top:10px;"></span></div>
							<div class="row" style="margin-top:60px;">&nbsp &nbsp 20<span style="border-bottom:1px solid black;margin-right:-5px;width:10px;float:right;margin-top:10px;"></span></div>
							<div class="row" style="margin-top:60px;">&nbsp &nbsp 15<span style="border-bottom:1px solid black;margin-right:-5px;width:10px;float:right;margin-top:10px;"></span></div>
							<div class="row" style="margin-top:60px;">&nbsp &nbsp 10<span style="border-bottom:1px solid black;margin-right:-5px;width:10px;float:right;margin-top:10px;"></span></div>
							<div class="row" style="margin-top:60px;">&nbsp &nbsp 5<span style="border-bottom:1px solid black;margin-right:-5px;width:10px;float:right;margin-top:10px;"></span></div>
							<div class="row" style="margin-top:60px;">&nbsp &nbsp 0</div>
						</div>
						<div class="col-sm-11 col-lg-11 useractivity" style="border-left:solid 1px #bdbcb9;border-bottom:solid 1px #bdbcb9;height:411px;" id="actvitydiv">
						</div>
						</div class="row">
							<span style="margin-left:4.2%;">&nbsp &nbsp 0</span>
							<span  style="margin-top:0px;">&nbsp &nbsp 5<i style="border-right:1px solid black;margin-top:-5px;height:50px;margin-right:0px;margin-left:20px;"></i></span>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-3 col-sm-3 col-lg-3">
		</div>
	</div>
	
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
	//alert(sessionuser);
	$.ajax({
		url:'functions/operations.php',
		data:'useractivity=1&sessionuser='+sessionuser+"&range=day",
		type:'post',
		success:function(res){
			$(".useractivity").html(res);
		}
	});
	return;
});

var asb=document.getElementById("activitydiv");
asb.scrollLeft=50;
</script>
<?php
?>