<?php
include("includes/connection.php");
?>
<?php
	global $con;
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
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css" media="screen"/>
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
	height:65px;
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
	float:left;
}
#search_btn{
	height:39.5px;
	margin-left:-1.5px;
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
	width:60px;
	margin-top:7px;
	margin-right:2%;
	padding-left:12px;
	font-size:20px;
}
#navlist li a:hover{
	color:black;
	text-decoration:none;
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
	margin-left:80%;
}
#notifytab{
	margin-top:6%;
	width:65%;
	height:500px;
	overflow-y:auto;
	border-radius:10px;
	cursor:default;
	overflow-x:hidden;
}
#notifymenu li{
	list-style-type:none;
	margin-left:2.5%;
	padding-left:5px;
	width:105%;
}
#notifymenu li a:hover{
	text-decoration:none;
	width:100%;
}
#notificationlabel{
	margin-left:5%;
	font-family:bold;
	font-size:1.6em;
	margin-top:5px;
	float:left;
	margin-right:5%;
}
#markallasreadlbl{
	font-family:bold;
	font-size:1.25em;
	color:#0765a3;
	margin-top:7px;
	cursor:pointer;
}
#markallasreadlbl:hover{
	text-decoration:underline;
}
#showallrequests{
	font-family:bold;
	font-size:1.25em;
	color:#0765a3;
	margin-top:7px;
	margin-left:5%;
	margin-top:-30px;
	cursor:pointer;
}
#showallrequests:hover{
	text-decoration:underline;
}
#showallrequests:active{
	border:none;
	background:none;
}
#numnotifys{
	margin-top:-15px;
	margin-left:-15px;
	position:fixed;
	z-index:1;
	color:red;
}
@media only screen and (max-width: 760px) { 
	#search_btn,#searchbox{
		display:none;
	}
	#prfpiclink{
		display:none;
	}
	#notifymenu{
		margin-top:6%;
		width:70%;
		height:500px;
		overflow-y:auto;
		border-radius:10px;
		cursor:default;
		overflow-x:hidden;
	}
}
</style>
<style>
.dropbtn {
  color: black;
  padding: 0px;
  font-size: px;
  border: none;
  cursor: pointer;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 10px 10px;
  text-decoration: none;
  display: block;
  margin-left:-40px;
}
.dropdown-content a:hover {
	text-decoration:none;
	color:black;
	background-color:#e6e6e6;
}
.show {
	display:block;
}
</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<nav  class="navbar navbar-default navbar-fixed-top" id="homeheader">
				<div class="row">
					<div class="col-sm-2 col-xs-8">
						<a href="" id="logo">ConectYu</a>
					</div>
					<div class="col-sm-4">
						<form method="get" action="find_people.php" name="searchform">
							<input type="text" class="form-control" placeholder="search..." name="searchbox" id="searchbox" required
							value="<?php echo isset($_GET["searchbox"]) ? htmlentities($_GET["searchbox"]) : ''; ?>" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1"/>
							<button type="submit" class="btn btn-deafult btn-md" name="search_btn" id="search_btn"><i class="glyphicon glyphicon-search">
							</i></button>
						</form>
					</div>
					<div class="col-sm-6 col-xs-12">
						<ul id="navlist">
							<li class="nav-item"><a href="home.php?user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-home"></i></a></li>
							<li class="nav-item"><a href="find_people.php"><i class="glyphicon glyphicon-search"></i></a></li>
							<li class="nav-item"><a href="messages.php?type=direct&user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-comment"></i></a></li>
							<li class="nav-item"><a href="explore.php?user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-book"></i></a></li>
							<!-- Notifications -->
							<li class=" nav-item dropdown" style="cursor:pointer;">
								<a id="notificationsicon" class="dropdown-toggle dropbtn" aria-hidden="true" onclick="showmorefunc()"><i class="glyphicon glyphicon-bell"></i>
								<span class="numnotifys" id="numnotifys"></span></a>
								<div class="dropdown-content notifytab" id="notifytab">
									<div class="row" style="border-bottom:solid 1px #e6e6e6;">
										<input type="button" value="Mark all as read" id="markallasreadlbl" style="border:none;background:none;width:30%;" />
										<input type="button" value="Requests" id="showallrequests" style="border:none;background:none;" />
										<input type="button" value="Notifications" id="notificationlabel" style="border:none;background:none;" />
										<!--h3 id="notificationlabel">Notifications</h3-->
										<!--p id="showallrequests" class="showallrequests">Requests</p-->
										<!--p id="markallasreadlbl" class="markallasreadlbl" style="width:63%;text-align:center;">Mark all as read</p-->
									</div>
									<ul class="notifymenu" id="notifymenu"></ul>
								</div>
							</li>
							<!--li class=" nav-item" style="cursor:pointer;">
								<a id="notificationsicon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-danger" id="notificationsbadge">0</span></a>
							</li-->
							<!-- Notifications End -->
							<li class="nav-item" id="prfpiclink"><a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>"><img src="<?php echo $prfpic; ?>" id="prf_pic"></a></li>
							<li class="nav-item" id="menuhamburger"><a class="toggle-btn" onclick="openNav()"><i class="glyphicon glyphicon-menu-hamburger"></i></a></li>
							
							<div id="mySidenav" class="sidenav">
							  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
								<div style="margin-top:-40px;margin-bottom:-20px">
									<a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>" ><img id="navprfpic" src="<?php echo $prfpic; ?>" ></a>
									<?php $str=$user_name;  if(str_word_count($str)>1){ $string=substr($str, 0, strrpos($str, ' '));}else{ $string=$user_name;} ?>
									<a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>" id="fname"><p><b><?php echo $string; ?></b></p></a><br>
									<a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>" id="prflnk"><p id="prflabel">Profile</p></a>
								</div>
								<hr>
								<div id="sidebarlinks">
									<a href="messages.php?type=direct&user_id=<?php echo $_SESSION['uid']; ?>" style="margin-top:5px;"><img src="https://img.icons8.com/color/48/000000/circled-envelope.png" width="30px" height="30px">  &nbsp Messages</a><br>
									<a href="activity.php"> <img src="https://img.icons8.com/nolan/64/combo-chart.png" width="30px" height="30px"> &nbsp Your Activity</a><br>
									<a href="exppages.php?user_id=<?php echo $_SESSION['uid']; ?>"><img src="https://img.icons8.com/nolan/64/open-book.png"/ width="30px" height="30px"> &nbsp Pages</a><br>
									<a href="ownevents.php?user_id=<?php echo $_SESSION['uid']; ?>"><img src="https://img.icons8.com/nolan/64/planner.png" width="30px" height="30px"/> &nbsp Events</a><br>
									<a href="jobs.php?user_desg=<?php echo $user_desig; ?>&user_id=<?php echo $_SESSION['uid']; ?>"><img src="https://img.icons8.com/color/48/000000/new-job.png" width="30px" height="30px"> &nbsp Jobs</a><br>
									<a href="internships.php?user_desg=<?php echo $user_desig; ?>&user_id=<?php echo $_SESSION['uid']; ?>"><img src="https://img.icons8.com/office/16/000000/set-as-resume.png" width="30px" height="30px"> &nbsp Internships</a><br>
									<a href="applypatents.php?user_id=<?php echo $_SESSION['uid']; ?>" style="cursor:pointer;"><img src="https://img.icons8.com/color/48/000000/registered-trademark--v1.png" width="30px" height="30px"> &nbsp Apply Patents</a>
									
									<hr><br>
									<a href="settings.php"><img src="https://img.icons8.com/dotty/80/000000/settings.png" width="30px" height="30px"> &nbsp Settings</a><br>
									<a href="help.php"><img src="https://img.icons8.com/carbon-copy/100/000000/ask-question.png" width="30px" height="30px"> &nbsp Help Center</a><br>
									<a href="report.php"><img src="https://img.icons8.com/windows/32/000000/complaint.png" width="30px" height="30px"> &nbsp Report</a><br>
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
									function showmorefunc() {
									  document.getElementById("notifytab").classList.toggle("show");
									}
									/*$('#settings').click(function(){
										//open bootsrap modal
										$('#settingsModal').modal({
										show: true
										});
									});*/
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
								
								<!-- SETTINGS MODAL 
								<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" style="font-size:2em;margin-right:10px;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<div class="panel-title"><p><strong>Settings</strong></p></div>	
											</div>
											<div class="modal-body">
												<div id="settingslinks">
													<a href="generalsettings.php?user_id=<?php// echo $_SESSION['uid']; ?>">General Settings</a>
													<a href="privacysettings.php?user_id=<?php// echo $_SESSION['uid']; ?>">Privacy Settings</a>
													<a href="">Notifications</a>
													<a href="">Security</a>
													<a href="">Request Verification</a>
													<a href="">Switch Account</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								-->
								
								 <script type="text/javascript">
									
									$("#signoutok").click(function(){
										window.open("logout.php","_self");
									});
									/*function toggleSidebar(){
										document.getElementById("sidebar").classList.toggle('active');
										$('#spanbtn1').css({'transform':'rotate(45deg)'});
										$('#spanbtn2').css('transform','rotate(-45deg)');
									}*/
									function openNav() {
									  document.getElementById("mySidenav").style.width = "250px";
									}

									function closeNav() {
									  document.getElementById("mySidenav").style.width = "0";
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
<script type="text/javascript">

	$(document).ready(function(){
		numUnreadNotifys();
		setInterval(function(){
			numUnreadNotifys();
		},1000);
	});
	$('#notificationlabel').click(function(){
		Notifications();
	});
	//showing notifications
	$('#notificationsicon').click(function(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/notification_operations.php',
			data:'notifications=1&user_id='+user_id,
			type:'post',
			success:function(res){
				$('.notifymenu').html(res);
			}
		});
	});
	function Notifications(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/notification_operations.php',
			data:'notifications=1&user_id='+user_id,
			type:'post',
			success:function(res){
				$('.notifymenu').html(res);
			}
		});
	}

	//marking all the notifications as read!
	$('#markallasreadlbl').click(function(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/notification_operations.php',
			data:'markallread=1&user_id='+user_id,
			type:'post',
			async:false,
			success:function(){
				Notifications();
				numUnreadNotifys();
			}
		});
		return false;
	});
	
	//showing all the requests on notification tab.
	$('#showallrequests').click(function(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/notification_operations.php',
			data:'showallrequests=1&user_id='+user_id,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.notifymenu').html(res);
			}
		});
	});
	
	//showing all the unread notifications using the badge
	function numUnreadNotifys(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/notification_operations.php',
			data:'unreadnotifys=1&user_id='+user_id,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.numnotifys').html(res);
			}
		});
	}
</script>
