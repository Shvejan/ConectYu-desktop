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
#subpage{
	width:100%;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3 col-xs-2">
		</div>
		<div class="col-sm-6" style="background-color:white;padding:20px;">
			<h3 style="margin-top:-15px;font-family: 'Merienda One', cursive;">Connect, share, showcase your products and services with people in your community, organization, team or group.</h3><br>
			<div class="row">
				<div class="col-sm-6">
					<img src="images/page3.png" width="100%" height="50%" />
				</div>
				<div class="col-sm-6">
					<form name="post_form" method="post" action="" enctype="multipart/form-data">
						<div class="alert alert-danger" width="100%" style="display:none;" id="caterror">Please select the category for your page</div>
						<label>Name of the page</label>
						<input class="form-control" type="text" name="pagename" id="pagename" placeholder="Name of the page" required />
						<br>
						<label>Descrition</label>
						<textarea rows="2" cols="10" class="form-control" name="pagedesc" id="pagedesc" placeholder="write..." required ></textarea>
						<br>
						<label>Category</label>
						<select class="form-control" name="pagecat" id="pagecat" onchange="pagecatfun();" required >
							<option>select your page category</option>
							<option>Entrepreneur</option>
							<option>Bussiness/Brand</option>
							<option>Social Activist</option>
							<option>Venture Catalyst</option>
							<option>Investor</option>
							<option>Organization</option>
							<option>Educational Institution</option>
							<option>Sports Person</option>
							<option>Comics</option>
							<option>public figure</option>
							<option>Others</option>
						</select>
						<div id="pagecat1" style="display:none">
							<br>
							<input class="form-control" type="text" name="pagecat1" placeholder="specify the category of your page" />
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<p>By clicking on submit, you will agree to <a href="">page policy</a>,<a href="">Terms & conditions</a>.<p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-8">
								<input type="submit" class="btn btn-info btn-md" id="subpage" name="subpage" value="submit" />
							</div>
							<div class="col-sm-2">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-2">
		</div>
	</div>
</body>
</html>
<?php
if(isset($_POST['subpage'])){
	global $con;
	$category=htmlentities(mysqli_real_escape_string($con,$_POST['pagecat']));
	if($category=="select your page category"){
	?>
	<script>
		$('#creatingpagemodal').modal({
			show: true
		});
	</script>
<?php	
	}
}
?>
