<?php
//session_start();
include("includes/connection.php");
//include("header.php");
include("functions/functions.php");
if(!isset($_SESSION['uid'])){
	echo "<script>window.open('index.php','_self');</script>";
	return;
}
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
	<title>Find People</title>
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
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet"> <!-- recent searches -->
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}

#postid{
	line-height:20px;
}
#verticalopt{
	float:right;
	margin-right:2%;
	list-style-type:none;
	font-size:1.5em;
	margin-top:10px;
}
#verticalopt:hover{
	background-color:#e6e6e6;
	border-radius:50px;
}

#prf_pic1{
	width:50px;
	height:50px;
	border-radius:50px;
}
#post_labelname{
	font-size:1.6em;
	color:#34baeb;
	margin-top:0px;
	text-decoration:none;
}
#post_labelname:hover,#page_labelname:hover{
	text-decoration:none;
}
#page_labelname{
	font-size:1.6em;
	color:#34baeb;
	margin-top:0px;
	text-decoration:none;
	margin-left:-10px;
}
#userid{
	text-decoration:none;
	color:black;
	line-height:1px;
	font-size:0.9em;
}
#userid:hover{
	text-decoration:none;
}
#designation{
	font-size:1.2em;
}
#paneltab{
	margin-bottom:px;
}
#intimateLabel{
	margin-top:-20px;
	margin-left:0px;
	margin-bottom:0px;
	text-align:center;
}
#userNotFound{
	margin-top:-20px;
	margin-left:0px;
	margin-bottom:0px;
	text-align:center;
}
#removesearch{
	float:right;
	margin-top:10%;
	font-size:2em;
	color:#656966;
}
#removesearch:hover{
	text-decoration:none;
}
#suguserlink{
	color:black;
	background-color:white;
	padding:13px;
	margin-bottom:1px;
	padding:20px;
}
#suguserlink:hover{
	text-decoration:none;
	background-color:#e6e6e6;
}
#sugprfpic{
	width:48px;
	height:48px;
	border:2px solid #e6e6e6;
	border-radius:24px;
	float:left;
	margin-left:10px;
	margin-top:-10px;
	margin-right:20px;
}
#sugusername{
	font-size:1.2em;
	margin-left:15px;
}
#usermorebtn{
	color:black;
	font-size:1.3em;
	cursor:pointer;
	padding:10px;
	float:right;
	margin-top:-65px;
	margin-right:10px;
	list-style-type:none;
}
#moredropdown{
	margin-top:-15px;
	width:15%;
	margin-left:45%;
}
#foot li a{
	color:#6e6e6d;
}
.filters{
	list-style-type:none;
	text-align:center;
	border:solid #e6e6e6 1px;
	margin-top:8px;
	padding:7px;
	border-radius:30px;
	cursor:pointer;
	background-color:white;
	padding:5px;
}
.filters a{
	color:#626663;
}
.filters a:hover{
	color:black;
	text-decoration:none;
}
</style>
<style>
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
	margin-top:-10px;
	margin-left:-15px;
	position:fixed;
	z-index:1;
	color:red;
}
::-webkit-scrollbar {
   display:none;
}
@media only screen and (max-width: 760px) { 
	#search_btn,#searchbox{
		display:none;
	}
	#prfpiclink{
		display:none;
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
	#numnotifys{
		margin-top:-10px;
		margin-left:-15px;
		position:fixed;
		z-index:1;
		color:red;
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
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
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
						<script type="text/javascript">
							$("#searchbox").keyup(function(){
								var il = document.getElementById('intimateLabel');
								il.setAttribute('style','display:none;');
								var unf = document.getElementById('userNotFound');
								unf.setAttribute('style','display:none;');
								var recent = document.getElementById('recentsearches');
								recent.setAttribute('style','display:none;');
								var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
								var searchinput=document.getElementById("searchbox").value;
								
								if(document.getElementById('topradiobtn').checked){
									var filval=document.getElementById('topradiobtn').value;
								}else if(document.getElementById('allradiobtn').checked){
									var filval=document.getElementById('allradiobtn').value;
								}else if(document.getElementById('sturadiobtn').checked){
									var filval=document.getElementById('sturadiobtn').value;
								}else if(document.getElementById('orgradiobtn').checked){
									var filval=document.getElementById('orgradiobtn').value;
								}else if(document.getElementById('pageradiobtn').checked){
									var filval=document.getElementById('pageradiobtn').value;
								}else if(document.getElementById('othradiobtn').checked){
									var filval=document.getElementById('othradiobtn').value;
								}
								$.ajax({
									url:'functions/functions.php',
									data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter='+filval,
									type:'post',
									async:false,
									success:function(res){
										//$('.notifymenu').html('');
										$('.showSearchResults').html(res);
										$.ajax({
											url:'functions/functions.php',
											data:'showrecentsearches=1',
											type:'post',
											async:false,
											success:function(res){
												//$('.notifymenu').html('');
												$('.recentsearches').html(res);
											}
										});
									}
								});
							});
						</script>
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
									<a href=""> <img src="https://img.icons8.com/nolan/64/combo-chart.png" width="30px" height="30px"> &nbsp Your Activity</a><br>
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
									
									//opening notifications
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
	
	<div class="row" style="margin-top:64px;background-color:#fcfcfc;height:100%;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="row" id="filters" style="position:fixed;z-index:1;width:42.5%;padding:5px;">
				<div class="col-sm-2 col-xs-2">
					<li class="filters" id="topfilter"><a><input type="radio" style="display:none;" id="topradiobtn" name="searchfilter" value="top"  /> Top</a></li>
				</div>
				<div class="col-sm-2 col-xs-2">
					<li class="filters" id="stufilter"><a><input type="radio" style="display:none;" id="sturadiobtn" name="searchfilter" value="students" /> students</a></li>
				</div>
				<div class="col-sm-2 col-xs-2">
					<li class="filters" id="orgfilter" ><a><input type="radio" style="display:none;" id="orgradiobtn" name="searchfilter" value="orgs" /> orgs</a></li>
				</div>
				<div class="col-sm-2 col-xs-2">
					<li class="filters" id="pagefilter"><a><input type="radio" style="display:none;" id="pageradiobtn" name="searchfilter" value="pages"  /> pages</a></li>
				</div>
				<div class="col-sm-2 col-xs-2">
					<li class="filters" id="allfilter"><a><input type="radio" style="display:none;" id="allradiobtn" name="searchfilter" value="all" checked /> all</a></li>
				</div>
				<div class="col-sm-2 col-xs-2">
					<li class="filters" id="othfilter"><a><input type="radio" style="display:none;" id="othradiobtn" name="searchfilter" value="others"  /> others</a></li>
				</div>
			</div><br><br><br>
			<div class="row" style="position:fixed;z-index:1;width:42%;height:80%;overflow-x:hidden;overflow-y:auto;margin-right:1%;background-color:white;">
				<div class="row" style="padding:20px;">
					<div class="row" style="margin-top:0px;padding:10px;">
						<div class='alert alert-warning' id="userNotFound" style="display:none;">
							<strong>No results found for the searched user!</strong>
						</div>
					</div>
					<div class="row" style="margin-top:0px;">
						<div class="col-sm-12">
							<div class='alert alert-warning' id="intimateLabel" style='text-align:center;font-family:bold;font-size:1.5em;'>Search for someone to see the results! <i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
						</div>
					</div>
					
					<div class="showSearchResults" style="margin-top:-25px;"></div>
					
					<div class="row recentsearches" id="recentsearches"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default" style="position:fixed;width:20%;height:60%;overflow-y:auto;margin-top:10px;">
				<div class="panel-body">
					<div style="position:fixed;z-index:1;background-color:white;padding:15px;width:19.9%;margin-left:-1%;margin-top:-1%;border-bottom:1px solid #e6e6e6"><h4 style="margin-top:0px;margin-bottom:0px;font-family:'Merienda One',cursive;">People you may know</h4></div><br>
					<?php
						global $con;
						$sessionuser=$_SESSION['uid'];
						$select_userdata=mysqli_query($con,"select * from users where user_id='$sessionuser'");
						$row_userdata=mysqli_fetch_array($select_userdata);
						$city=$row_userdata['user_city'];
						$state=$row_userdata['user_state'];
						$country=$row_userdata['user_country'];
						$pincode=$row_userdata['user_pincode'];
						$user_designation=$row_userdata['user_designation'];
						$suggestedusers=array();
						$select_users=mysqli_query($con,"select * from users where ((user_pincode='$pincode' AND user_city like '%$city') OR (user_pincode='$pincode' AND user_city like '%$city%') OR (user_pincode='$pincode' AND user_city like '$city%')  OR user_pincode='$pincode') AND (user_id != '$sessionuser') AND (user_id not in (select followed_user from following where following_user='$sessionuser')) AND (user_id not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY reg_date LIMIT 10");
						$num_citypinusers=mysqli_num_rows($select_users);
						if($num_citypinusers != 0){
							while($row_citypinusers=mysqli_fetch_array($select_users)){
								if($sessionuser != $row_citypinusers['user_id']){
									array_push($suggestedusers,$row_citypinusers['user_id']);
								}
							}
						}
						
						$select_fuser=mysqli_query($con,"select followed_user from following where following_user='$sessionuser' AND user_type='user' LIMIT 15");
						while($row_fuser=mysqli_fetch_array($select_fuser)){
							$fuser=$row_fuser['followed_user'];
							$select_mutual=mysqli_query($con,"select following_user from following where (followed_user='$fuser') AND (following_user not in (select followed_user from following where following_user='$sessionuser')) AND (following_user!='$sessionuser') AND (following_user not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY date");
							$num_mutuals=mysqli_num_rows($select_mutual);
							if($num_mutuals != 0){
								while($row_mutual=mysqli_fetch_array($select_mutual)){
									if($sessionuser != $row_mutual['user_id']){
										array_push($suggestedusers,$row_mutual['following_user']);
									}
								}
							}
						}
						
						$arrlen1=count($suggestedusers); 
						if($arrlen1==0 or $arrlen1<4){
							$select_defusers=mysqli_query($con,"select user_id from users where (user_state like '$state' OR user_state like '%$state' OR user_state like '%$state%' OR user_state like '$state%') AND (user_id not in (select followed_user from following where following_user='$sessionuser')) AND (user_id not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY reg_date LIMIT 10");
							$num_defusers=mysqli_num_rows($select_defusers);
							if($num_defusers!=0){
								while($row_defusers=mysqli_fetch_array($select_defusers)){
									if($sessionuser != $row_defusers['user_id']){
										array_push($suggestedusers,$row_defusers['user_id']);
									}
								}
							}else{
								$select_defusers=mysqli_query($con,"select user_id from users where (user_country like '$country' OR user_country like '%$country' OR user_country like '%$country%' OR user_country like '$country%' OR user_country='$country') AND (user_id not in (select followed_user from following where following_user='$sessionuser')) AND (user_id not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY reg_date LIMIT 10");
								$num_defusers=mysqli_num_rows($select_defusers);
							}
						}
						$suggestedusers=array_unique($suggestedusers,SORT_REGULAR  );
						$suggestedusers=array_values($suggestedusers);
						$arrlen=count($suggestedusers);
						if($arrlen !=0){
						?>
							<div class="row" style="margin-top:17px;">
						<?php
						//echo print_r($suggestedusers);
							for($i=0;$i<$arrlen;$i++){
								$user = $suggestedusers[$i];
								$select_userdetails=mysqli_query($con,"select * from users where user_id='$user'");
								$row_details = mysqli_fetch_array($select_userdetails);
								$username=$row_details['user_name'];
								$profile_pic=$row_details['profile_pic'];
								$user_id=$row_details['user_id'];
								if(str_word_count($username)>2){
									$str=$username;  
									$string = explode(' ', $str, 3);
									$username="$string[0] $string[1]"; 
								}else{ 
									$username=$username;
								}
								
								?>
									
									<a href="profile.php?user_id=<?php echo $user_id; ?>" id="suguserlink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $profile_pic; ?>" id="sugprfpic"><p id="sugusername" style="color:black;white-space: pre-wrap;"><?php echo $username; ?></p>
									</a>
									
									<div class='dropdown'>
										<li id='usermorebtn' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu' id='moredropdown'>
											<li><a href='#'>Report...</a></li> 
											<li><a href="profile.php?user_id=<?php echo $user_id; ?>">view profile</a></li>  
											<li><a style='cursor:pointer;' onclick='sugstduserprf("<?php echo $user_id; ?>");'>Share</a></li>
										</ul>
									</div>
								<?php
							}
						?>
						</div>
						<?php
						}else{
							echo "
							<h4 style='color:#b3b5b4;text-align:center;margin-top:50%;font-family:bold;'>No suggested users to show!</h4>
							";
						}
					?>
				</div>
			</div><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="row" id="foot" style="position:fixed;margin-top:14%;padding:0px;width:20%;border-radius:5px;">
				<li><a href="">Privacy</a></li>
				<li><a href="">Data Policy</a></li>
				<li><a href="">Cookie Policy</a></li><br>
				<li><a href="">Terms& Conditions</a></li>

				<li><span id="copy" style="font-size:1.2em;color:#6e6e6d;">© Copyrights ConectYu 2020</span></li>
			</div>
			
			<!--  Sharing Profile As Message MOdal -->
				<div class="modal fade" id="shsearchedProfAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="panel-title"><p><strong>Share profile!</strong></p></div>	
							</div>
							<div class="modal-body" style="height:450px;overflow-y:auto;">
								<div class="panel panel-deafult">
									<div class="panel-body">
										<label style="width:80%;margin-top:-20px;">select users to share profile : </label>
										<input type="text" name="fwrduserid" id="fwrduserid" style="display:none;" />
										<input type="text" name="fwrdusertype" id="fwrdusertype" style="display:none;" />
										<div style="border:solid #e6e6e6 1px;">
											<div class="showuserstoshareprf"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-info" id="clsshrasmsgmodal" data-dismiss="modal" aria-label="Close" style="width:50%;margin-right:25%;" value="Done" />
							</div>
						</div>
					</div>
				</div>
			
				<!--  Sharing suggested Profiles As Message Modal -->
				<div class="modal fade" id="sugstdProfAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="panel-title"><p><strong>Share profile!</strong></p></div>	
							</div>
							<div class="modal-body" style="height:450px;overflow-y:auto;">
								<div class="panel panel-deafult">
									<div class="panel-body">
										<label style="width:80%;margin-top:-20px;">select users to share profile : </label>
										<input type="text" name="fwrduserid" id="fwrduserid" style="display:none;" />
										<input type="text" name="fwrdusertype" id="fwrdusertype" style="display:none;" />
										<div style="border:solid #e6e6e6 1px;">
											<div class="showuserstosharesugprf"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-info" id="clsshrasmsgmodal" data-dismiss="modal" aria-label="Close" style="width:50%;margin-right:25%;" value="Done" />
							</div>
						</div>
					</div>
				</div>
				
		</div>
	</div>
</body>
<html>
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
	
	//making the filters default when the page ready
	$(document).ready(function(){
		$("#topradiobtn"). prop("checked", true);
		var tbg=document.getElementById('topfilter');
		tbg.setAttribute('style','background-color:#e6e6e6');
		var abg=document.getElementById('allfilter');
		abg.setAttribute('style','background-color:white');
		var sbg=document.getElementById('stufilter');
		sbg.setAttribute('style','background-color:white');
		var obg=document.getElementById('orgfilter');
		obg.setAttribute('style','background-color:white');
		var pbg=document.getElementById('pagefilter');
		pbg.setAttribute('style','background-color:white');
		var othbg=document.getElementById('othfilter');
		othbg.setAttribute('style','background-color:white');
	});
	
	//showing results when the top filter is clicked.
	$("#topfilter").click(function(){
		var il = document.getElementById('intimateLabel');
		il.setAttribute('style','display:none;');
		var unf = document.getElementById('userNotFound');
		unf.setAttribute('style','display:none;');
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var searchinput=document.getElementById("searchbox").value;
		
		$("#topradiobtn").prop("checked", true);
		var tbg=document.getElementById('topfilter');
		tbg.setAttribute('style','background-color:#e6e6e6');
		var abg=document.getElementById('allfilter');
		abg.setAttribute('style','background-color:white');
		var sbg=document.getElementById('stufilter');
		sbg.setAttribute('style','background-color:white');
		var obg=document.getElementById('orgfilter');
		obg.setAttribute('style','background-color:white');
		var pbg=document.getElementById('pagefilter');
		pbg.setAttribute('style','background-color:white');
		var othbg=document.getElementById('othfilter');
		othbg.setAttribute('style','background-color:white');
		var filvalue=document.getElementById("topradiobtn").value;
		$.ajax({
			url:'functions/functions.php',
			data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter='+filvalue,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.showSearchResults').html(res);
				showRecentSearches();
			}
		});
	});
	
	//showing results when the students filter is clicked.
	$("#stufilter").click(function(){
		var il = document.getElementById('intimateLabel');
		il.setAttribute('style','display:none;');
		var unf = document.getElementById('userNotFound');
		unf.setAttribute('style','display:none;');
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var searchinput=document.getElementById("searchbox").value;
		
		$("#sturadiobtn").prop("checked", true);
		var tbg=document.getElementById('topfilter');
		tbg.setAttribute('style','background-color:white');
		var abg=document.getElementById('allfilter');
		abg.setAttribute('style','background-color:white');
		var sbg=document.getElementById('stufilter');
		sbg.setAttribute('style','background-color:#e6e6e6');
		var obg=document.getElementById('orgfilter');
		obg.setAttribute('style','background-color:white');
		var pbg=document.getElementById('pagefilter');
		pbg.setAttribute('style','background-color:white');
		var othbg=document.getElementById('othfilter');
		othbg.setAttribute('style','background-color:white');
		var filvalue=document.getElementById("sturadiobtn").value;
		$.ajax({
			url:'functions/functions.php',
			data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter='+filvalue,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.showSearchResults').html(res);
				showRecentSearches();
			}
		});
	});
	
	//showing results when the organizations filter is clicked.
	$("#orgfilter").click(function(){
		var il = document.getElementById('intimateLabel');
		il.setAttribute('style','display:none;');
		var unf = document.getElementById('userNotFound');
		unf.setAttribute('style','display:none;');
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var searchinput=document.getElementById("searchbox").value;
		
		$("#orgradiobtn").prop("checked", true);
		var tbg=document.getElementById('topfilter');
		tbg.setAttribute('style','background-color:white');
		var abg=document.getElementById('allfilter');
		abg.setAttribute('style','background-color:white');
		var sbg=document.getElementById('stufilter');
		sbg.setAttribute('style','background-color:white');
		var obg=document.getElementById('orgfilter');
		obg.setAttribute('style','background-color:#e6e6e6');
		var pbg=document.getElementById('pagefilter');
		pbg.setAttribute('style','background-color:white');
		var othbg=document.getElementById('othfilter');
		othbg.setAttribute('style','background-color:white');
		var filvalue=document.getElementById("orgradiobtn").value;
		
		$.ajax({
			url:'functions/functions.php',
			data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter='+filvalue,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.showSearchResults').html(res);
				showRecentSearches();
			}
		});
	});
	
	//showing results when the page filter is clicked.
	$("#pagefilter").click(function(){
		var il = document.getElementById('intimateLabel');
		il.setAttribute('style','display:none;');
		var unf = document.getElementById('userNotFound');
		unf.setAttribute('style','display:none;');
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var searchinput=document.getElementById("searchbox").value;
		
		$("#pageradiobtn").prop("checked", true);
		var tbg=document.getElementById('topfilter');
		tbg.setAttribute('style','background-color:white');
		var abg=document.getElementById('allfilter');
		abg.setAttribute('style','background-color:white');
		var sbg=document.getElementById('stufilter');
		sbg.setAttribute('style','background-color:white');
		var obg=document.getElementById('orgfilter');
		obg.setAttribute('style','background-color:white');
		var pbg=document.getElementById('pagefilter');
		pbg.setAttribute('style','background-color:#e6e6e6');
		var othbg=document.getElementById('othfilter');
		othbg.setAttribute('style','background-color:white');
		var filvalue=document.getElementById("pageradiobtn").value;
		$.ajax({
			url:'functions/functions.php',
			data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter='+filvalue,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.showSearchResults').html(res);
				showRecentSearches();
			}
		});
	});
	
	//showing results when the all filter is clicked.
	$("#allfilter").click(function(){
		var il = document.getElementById('intimateLabel');
		il.setAttribute('style','display:none;');
		var unf = document.getElementById('userNotFound');
		unf.setAttribute('style','display:none;');
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var searchinput=document.getElementById("searchbox").value;
		
		$("#allradiobtn").prop("checked", true);
		var tbg=document.getElementById('topfilter');
		tbg.setAttribute('style','background-color:white');
		var abg=document.getElementById('allfilter');
		abg.setAttribute('style','background-color:#e6e6e6');
		var sbg=document.getElementById('stufilter');
		sbg.setAttribute('style','background-color:white');
		var obg=document.getElementById('orgfilter');
		obg.setAttribute('style','background-color:white');
		var pbg=document.getElementById('pagefilter');
		pbg.setAttribute('style','background-color:white');
		var othbg=document.getElementById('othfilter');
		othbg.setAttribute('style','background-color:white');
		var filvalue=document.getElementById("allradiobtn").value;
		$.ajax({
			url:'functions/functions.php',
			data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter='+filvalue,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.showSearchResults').html(res);
				showRecentSearches();
			}
		});
	});
	
	//showing results when the others filter is clicked.
	$("#othfilter").click(function(){
		var il = document.getElementById('intimateLabel');
		il.setAttribute('style','display:none;');
		var unf = document.getElementById('userNotFound');
		unf.setAttribute('style','display:none;');
		var recent = document.getElementById('recentsearches');
		recent.setAttribute('style','display:display;');
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var searchinput=document.getElementById("searchbox").value;
		
		$("#othradiobtn").prop("checked", true);
		var tbg=document.getElementById('topfilter');
		tbg.setAttribute('style','background-color:white');
		var abg=document.getElementById('allfilter');
		abg.setAttribute('style','background-color:white');
		var sbg=document.getElementById('stufilter');
		sbg.setAttribute('style','background-color:white');
		var obg=document.getElementById('orgfilter');
		obg.setAttribute('style','background-color:white');
		var pbg=document.getElementById('pagefilter');
		pbg.setAttribute('style','background-color:white');
		var othbg=document.getElementById('othfilter');
		othbg.setAttribute('style','background-color:#e6e6e6');
		var filvalue=document.getElementById("othradiobtn").value;
		$.ajax({
			url:'functions/functions.php',
			data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter='+filvalue,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.showSearchResults').html(res);
				showRecentSearches();
			}
		});
	});
	
	//function for showing recent searches
	function showRecentSearches(){
		$.ajax({
			url:'functions/functions.php',
			data:'showrecentsearches=1',
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.recentsearches').html(res);
			}
		});
	}
	
	//function for search results
	function searchResults(){
		var il = document.getElementById('intimateLabel');
		il.setAttribute('style','display:none;');
		var unf = document.getElementById('userNotFound');
		unf.setAttribute('style','display:none;');
		var recent = document.getElementById('recentsearches');
		recent.setAttribute('style','display:none;');
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var searchinput=document.getElementById("searchbox").value;
		
		if(document.getElementById('topradiobtn').checked){
			var filval=document.getElementById('topradiobtn').value;
		}else if(document.getElementById('allradiobtn').checked){
			var filval=document.getElementById('allradiobtn').value;
		}else if(document.getElementById('sturadiobtn').checked){
			var filval=document.getElementById('sturadiobtn').value;
		}else if(document.getElementById('orgradiobtn').checked){
			var filval=document.getElementById('orgradiobtn').value;
		}else if(document.getElementById('pageradiobtn').checked){
			var filval=document.getElementById('pageradiobtn').value;
		}else if(document.getElementById('othradiobtn').checked){
			var filval=document.getElementById('othradiobtn').value;
		}
		$.ajax({
			url:'functions/functions.php',
			data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter='+filval,
			type:'post',
			async:false,
			success:function(res){
				//$('.notifymenu').html('');
				$('.showSearchResults').html(res);
				showRecentSearches();
			}
		});
	}
	
</script>
<?php
	if(isset($_GET['search_btn'])){
	?>
		<script type='text/javascript'>
			var il = document.getElementById('intimateLabel');
			il.setAttribute('style','display:none;');
			var recent = document.getElementById('recentsearches');
			recent.setAttribute('style','display:display;');
			var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
			var searchinput=<?php echo json_encode($_GET['searchbox']); ?>;
			$.ajax({
				url:'functions/functions.php',
				data:'searcuser=1&user_id='+sessionuser+'&searchinput='+searchinput+'&filter=top',
				type:'post',
				async:false,
				success:function(res){
					//$('.notifymenu').html('');
					$('.showSearchResults').html(res);
					showRecentSearches();
				}
			});
			
		</script>
	<?php
	}else{
		echo "
			<script type='text/javascript'>
				var il = document.getElementById('intimateLabel');
				il.setAttribute('style','display:display;');
				var recent = document.getElementById('recentsearches');
				recent.setAttribute('style','display:display;');
			</script>
		";
		?>
		<script>showRecentSearches();</script>
		<?php
	}
?>