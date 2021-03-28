<?php
if(!isset($_COOKIE['sessionuid'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Radley&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Courgette|Dancing+Script&display=swap" rel="stylesheet"><!-- quote link and p-->
</head>
<style>
body{
	background-color:#f7f5f5;
	overflow-x:hidden;
}
nav{
	background-color:white;
	width:100%;
	height:65px;
	position:fixed;
	top:0;
}
nav li a{
	display:block;
	float:left;
	margin-left:1px;
	text-decoration:none;
	font-size:1.5em;
	padding:35px;
	font-family: 'Radley', serif;
}
#signup{
	margin-right:100px;
}

#logo{
	font-family:'Shrikhand', cursive;
	font-size: 2.5em; 
	letter-spacing: 0px;  
	text-shadow: 1px 1px 2px #c4c4c4;
	padding:20px;
	margin-left:200px;
}
#logo:hover{
	background-color:white;
}
.semicircle {
      width: 700px;
      height: 500px;
      -webkit-border-radius: 450px;
      -moz-border-radius: 450px;
      border-radius: 450px;
      background: white;
	  margin-top:75px;
	  overflow:hidden;
	  margin-left:10px;
 }
 #quote{
	font-family: 'Dancing Script', cursive;
	font-size:3em;
 }
 p{
	 font-family: 'Courgette', cursive;
	 font-size:4em;
 }
 #join{
	 text-decoration:none;
	 display:block;
	 background-color:#1a70f0;
	 border-radius:10px;
	 width:300px;
	 font-size:2.5em;
	 text-align:center;
	 margin-left:175px;
	 color:white;
	 height:55px;
 }
 footer{
	background-image: linear-gradient(to right top, #0ce4cd, #00e9b5, #00eb92, #00ec63, #3aeb12);
	color:white;
	padding-top:20px;
 }
 #foot li{
	 float:left;
	 list-style-type:none;
	 margin-left:20px;
	 color:black;
 }
 li a{
	 color:black;
	 font-size:1.2em;
 }
 #logo1{
	font-family:'Shrikhand', cursive;
	font-size: 2em; 
	letter-spacing: 0px;  
	text-shadow: 1px 1px 2px #c4c4c4;
	padding:20px;
	margin-left:30px;
	text-decoration:none;
 }
 </style>
 <style>
 @media only screen and (max-width: 760px) {  
	#signin{
		display:none;
	}
	#signup{
		display:none;
	}	
	#logo{
		float:left;
		margin-left:150px;
	}
	nav{
		height:68px;
	}
	body{
		
	}
	.semicircle{
		display:none;
	}
	nav{
		width:100%;
	}
	#quote{
		font-family: 'Dancing Script', cursive;
		font-size:2em;
		margin-left:10px;
		text-color:-webkit-linear-gradient(left top,#FF4E50,#F9D423);
		text-color:-o-linear-gradient(left top,#FF4E50,#F9D423);
		text-color:-moz-linear-gradient(left top,#FF4E50,#F9D423);
 }
 p{
	 font-family: 'Courgette', cursive;
	 font-size:2.5em;
	 margin-left:10px;
 }
 #join{
	 text-decoration:none;
	 display:block;
	 background-color:#1a70f0;
	 width:300px;
	 font-size:2.5em;
	 text-align:center;
	 margin-left:100px;
	 height:55px;
 }
 #copy{
	 margin-left:50px;
 }
}
  
</style>
<body>
	<nav class="navbar sticky-top" id="nav">
		<div class="container-fluid " id="nav">
			<ul class="nav navbar-nav">				
				<li><a href="" id="logo">ConectYu</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="signin" id="signin">Signin</a></li>
				<li><a href="signup" id="signup">Signup</a></li>
			</ul>
		</div>
	</nav>
	<div class="row">
		<div class="col-sm-6">
			<div class="semicircle img img-reponsive"> <img src="index.jpg"></div>
		</div>
		<div class="col-sm-6">
			<h3 id="quote">Every genius now is a dreamer once!</h3><br><br>
			<p>Join the largest platform of professionals and make yourself a genius.</p><br><br>
			<a href="signup" id="join"/>Join</a>
		</div>
	</div><br><br>
	
	<footer>
		<h2 style="text-align:center">Our Services</h2><br>
		<div class="row">
			<div class="col-sm-2">
				<a href="" id="logo1">ConectYu</a>
			</div>
			<div class="col-sm-3">
				<ul>
					<li><a href="signin.php">Signin</a></li>
				</ul>
				<ul>
					<li><a href="signup.php">Signup</a></li>
				</ul>
				<ul>
					<li><a href="">Help</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul>
					<li><a href="">Companies</a></li>
				</ul>
				<ul>
					<li><a href="">Colleges</a></li>
				</ul>
				<ul>
					<li><a href="">Jobs</a></li>
				</ul>
				<ul>
					<li><a href="">Internships</a></li>
				</ul>
				<ul>
					<li><a href="">Patents</a></li>
				</ul>
				<ul>
					<li><a href="">Copyrights & TradeMarks</a></li>
				</ul>
			</div>
			<div class="col-sm-3">
				<ul>
					<li><a href="">Contact us</a></li>
				</ul>
				<ul>
					<li><a href="">About us</a></li>
				</ul>
				<ul>
					<li><a href="">Report</a></li>
				</ul>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-8" id="foot">
				<li><a href="">Privacy</a></li>
				<li><a href="">Data Policy</a></li>
				<li><a href="">Cookie Policy</a></li>
				<li><a href="">Terms& Conditions</a></li>

				<li><h4 id="copy" style="float:right;font-size:1.5em;margin-left:10px;">© Copyrights ConectYu 2020</h4></li>
			</div>
			<div class="col-sm-1">
			</div>
		</div>
			
	</footer>
</body>
</html>
<?php 
}else{
	session_start();
	$sessionuid=$_COOKIE['sessionuid'];
	$_SESSION['uid']=$sessionuid;
	echo "<script>window.open('home.php?user_id=$sessionuid','_self');</script>";
}
?>