<?php
include("connection.php");
?>
<?php
	$u_id=$_SESSION['uid'];
	$select_user="select * from users where user_id='$u_id'";
	$run_user=mysqli_query($con,$select_user);
	$row_user=mysqli_fetch_array($run_user);
	$prfpic=$row_user['profile_pic'];
	$user_name=$row_user['user_name'];
	$user_desig=$row_user['user_designation'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu - Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="stylesfile.css" media="screen"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">	<!-- Logo -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet"> <!-- h2 -->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet"><!-- Tagline -->
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}

#homeheader{
	background-color:white;
	padding:10px;
}
#logo{
	font-family:'Shrikhand', cursive;
	font-size: 2em; 
	letter-spacing: 0px;  
	text-shadow: 1px 1px 2px #c4c4c4;
	color:black;
	float:right;
}
#logo:hover{
	text-decoration:none;
}
#searchbox{
	width:80%;
	height:40px;
	border:2px solid #e6e6e6;
	border-radius:5px;
	padding:10px;
}
#search_btn{
	height:39.5px;
	margin-left:-4px;
	width:20%;
}
#search_btn:hover{
	background-color:#bdbbbb;
}
#navlist{
	list-style-type:none;
}
#navlist li a{
	float:left;
	color:#626663;
	display:block;
	width:50px;
	margin-top:7px;
	margin-right:2%;
	padding-left:12px;
	font-size:20px;
}
#navlist li a:hover{
	color:black;
}
#menuhamburger{
	float:right;
	margin-right:2%;
	margin-top:3px;
	cursor:pointer;
}
#prf_pic{
	width:40px;
	height:40px;
	border-radius:20px;
}
#prfpiclink{
	margin-left:81%;
}
</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<nav  class="navbar navbar-default navbar-fixed-top" id="homeheader">
				<div class="row">
					<div class="col-sm-2">
						<a href="" id="logo">ConectYu</a>
					</div>
					<div class="col-sm-4">
						<form method="get" action="find_people.php" name="searchform">
							<input type="text" placeholder="search..." name="searchbox" id="searchbox" required />
							<button type="submit" class="btn btn-deafult btn-md" name="search_btn" id="search_btn"><i class="glyphicon glyphicon-search">
							</i></button>
						</form>
					</div>
					<div class="col-sm-6 col-xs-12">
						<ul id="navlist">
							<li><a href="home.php?user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-home"></i></a></li>
							<li><a href="find_people.php"><i class="glyphicon glyphicon-search"></i></a></li>
							<li><a href=""><i class="glyphicon glyphicon-bell"></i></a></li>
							<li><a href="messages.php?user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-envelope"></i></a></li>
							<li><a href="explore.php?user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-book"></i></a></li>
							<li id="prfpiclink"><a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>"><img src="<?php echo $prfpic; ?>" id="prf_pic"></a></li>
							<li id="menuhamburger"><a class="toggle-btn" onclick="toggleSidebar()"><i class="glyphicon glyphicon-menu-hamburger"></i></a></li>
								<div id="sidebar">
									<div class="toggle-btn"  onclick="toggleSidebar()">
										<span id="spanbtn1"></span>
										<span id="spanbtn2"></span>
									</div><br>
		
										<a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>" ><img id="navprfpic" src="<?php echo $prfpic; ?>" ></a>
										<?php $str=$user_name;  if(str_word_count($str)>1){ $string=substr($str, 0, strrpos($str, ' '));}else{ $string=$user_name;} ?>
										<a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>" id="fname"><b><?php echo $string; ?></b><br>
										<p id="prflabel">Profile</p></a>
										<hr>
										<div id="sidebarlinks">
										<a href="messages.php?user_id=<?php echo $_SESSION['uid']; ?>" style="margin-top:5px;"><img src="https://img.icons8.com/color/48/000000/circled-envelope.png" width="30px" height="30px">  &nbsp Messages</a><br>
										<a href=""> <img src="https://img.icons8.com/nolan/64/combo-chart.png" width="30px" height="30px"> &nbsp Your Activity</a><br>
										<a href="jobs.php?user_desg=<?php echo $user_desig; ?>&user_id=<?php echo $_SESSION['uid']; ?>"><img src="https://img.icons8.com/color/48/000000/new-job.png" width="30px" height="30px"> &nbsp Jobs</a><br>
										<a href="internships.php?user_desg=<?php echo $user_desig; ?>&user_id=<?php echo $_SESSION['uid']; ?>"><img src="https://img.icons8.com/office/16/000000/set-as-resume.png" width="30px" height="30px"> &nbsp Internships</a><br>
										<a href="" style="cursor:pointer;"><img src="https://img.icons8.com/color/48/000000/registered-trademark--v1.png" width="30px" height="30px"> &nbsp Apply Patents</a>
										
										<hr><br>
										<a id="settings"><img src="https://img.icons8.com/dotty/80/000000/settings.png" width="30px" height="30px"> &nbsp Settings</a><br>
										<a href=""><img src="https://img.icons8.com/carbon-copy/100/000000/ask-question.png" width="30px" height="30px"> &nbsp Help</a><br>
										<a href=""><img src="https://img.icons8.com/windows/32/000000/complaint.png" width="30px" height="30px"> &nbsp Report</a><br>
										<a href=""><img src="https://img.icons8.com/dotty/100/000000/high-importance.png" width="30px" height="30px"> &nbsp About</a><br>
										<hr>
										<br>
										<a  id="signout"><img src="https://img.icons8.com/nolan/64/logout-rounded.png" width="30px" height="30px"> &nbsp <b style="font-size:1.2em;">Sign out</b></a>
										<hr>
									</div>
								</div> 
								
								<script type="text/javascript">
									$('#signout').click(function(){
										//open bootsrap modal
										$('#signoutModal').modal({
										show: true
										});
									});
									$('#settings').click(function(){
										//open bootsrap modal
										$('#settingsModal').modal({
										show: true
										});
									});
								</script>
								<!-- SIGNOUT MODAL -->
								<div class="modal fade" id="signoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  data-backdrop="false">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<div class="panel-title"><p><strong>Confirmation page</strong></p></div>	
											</div>
											<div class="modal-body">
												<p><img src="https://img.icons8.com/carbon-copy/100/000000/question-mark.png" width="50px" height="50px"> &nbsp <b style="font-family:bold;font-size:1.5em;">Are you sure, Do you want to sign out?</b></p>
												
											</div>
											<div class="modal-footer">
												<button class="btn btn-info" type="button" id="signoutok">Confirm</button>
												<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
											</div>
										</div>
									</div>
								</div>
								
								<!-- SETTINGS MODAL -->
								<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" style="font-size:2em;margin-right:10px;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<div class="panel-title"><p><strong>Settings</strong></p></div>	
											</div>
											<div class="modal-body">
												<div id="settingslinks">
													<a href="generalsettings.php?user_id=<?php echo $_SESSION['uid']; ?>">General Settings</a>
													<a href="">Privacy Settings</a>
													<a href="">Notifications</a>
													<a href="">Security</a>
													<a href="">Request Verification</a>
													<a href="">Switch Account</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
								 <script type="text/javascript">
									
									$("#signoutok").click(function(){
										window.open("logout.php","_self");
									});
									function toggleSidebar(){
										document.getElementById("sidebar").classList.toggle('active');
										$('#spanbtn1').css({'transform':'rotate(45deg)'});
										$('#spanbtn2').css('transform','rotate(-45deg)');
									}
								</script>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
</body>
</html>