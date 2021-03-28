<?php
session_start();
include("includes/connection.php");
?>
<?php
if(isset($_GET['user_id'])){
	$user_id=$_GET['user_id'];
}else{
	echo "<script>window.open('signin.php','_self');</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Signin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet"> <!-- signin link -->
</head>
<style>
</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<nav  class="navbar navbar-default "id="homeheader">
				<div class="row">
					<div class="col-sm-2">
						<a href="" id="logo">ConectYu</a>
					</div>
					<div class="col-sm-4">
						<form method="get" action="find_people.php" name="searchform">
							<input type="text" placeholder="search..." id="searchbox" />
							<button type="submit" class="btn btn-deafult btn-md" name="search_btn" id="search_btn"><i class="glyphicon glyphicon-search">
							</i></button>
						</form>
					</div>
					<div class="col-sm-6 col-xs-12">
						<ul id="navlist">
							<li><a href="home.php?user_id=<?php echo $user_id; ?>"><i class="glyphicon glyphicon-home"></i></a></li>
							<li><a href="find_people.php?user_id=<?php echo $user_id; ?>""><i class="glyphicon glyphicon-search"></i><br></a></li>
							<li><a href=""><i class="glyphicon glyphicon-bell"></i></a></li>
							<li><a href=""><i class="glyphicon glyphicon-envelope"></i></a></li>
							<li><a href=""><i class="glyphicon glyphicon-book"></i></a></li>
							<li id="prfpiclink"><a href=""><img src="index.jpg" id="prf_pic"></a></li>
							<li id="menuhamburger"><a href="" ><i class="glyphicon glyphicon-menu-hamburger"></i></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
</body>
</html>