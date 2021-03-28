<?php
//session_start();
include("includes/connection.php");
include("functions/functions.php");
include("groupoperations.php");
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
	$username=$row_user['user_name'];
	$user_email=$row_user['user_email'];
	$user_desig=$row_user['user_designation'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Messages</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php $user_id ?>'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
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
	width:60px;
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
	margin-left:80%;
}

#messageheaderleft{
	position:fixed;
	width:67%;
	background-color:white;
	padding:8px;
	margin-top:-15px;
	height:30px;
}
#messageheaderleft2{
	position:fixed;
	width:34.1%;
	background-color:white;
	padding:8px;
	margin-top:-16px;
	height:30px;
	margin-left:32.9%;
}
#messageheaderright{
	position:fixed;
	background-color:white;
	margin-left:-1.05%;
	width:33%;
	margin-top:-16px;
	height:40px;
}
/* Styling code for showing users on modals */

#modalprfpic{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
	float:left;
	margin-right:0px;
}
#modalusername{
	margin-right:200px;
	font-size:1.6em;
	color:black;
	margin-top:10px;
	text-decoration:none;
}
.modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;
}
#messagetolist{
	 overflow-y: auto;
	 overflow-x:hidden;
}
input[type="file"]{
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
#msgmoredrpdown{
	float:right;
	margin-right:3%;
	list-style-type:none;
	margin-top:4px;
	font-size:1.4em;
	cursor:pointer;
	padding:5px;
}
#msgmoredroplist{
	margin-top:-10px;
	margin-left:81%;
	position:absolute;
	z-index:2;
}
#preview{
	border:#e6e6e6 solid 2px;
	border-radius:30px;
	float:left;
}
#msgwithpic,#msgwithpic2{
	width:50% auto;
	float:left;
}
#setmsgtoprfpic{
	width:60px;
	height:60px;
	border:#757573 solid 1px;
	border-radius:30px;
	float:left;
	margin-left:2%;
}
#setmsgtousername{
	font-size:1.6em;
	color:black;
	margin-top:2px;
	float:left;
	margin-left:3%;
}
#lastmessage{
	margin-top:-25px;
	margin-left:15.5%;
	color:#969493;
	float:left;
}
.setmsgtouser{
	width:100%;
}
.setmsgtouser:hover{
	text-decoration:none;
	background-color:#f2f2f2;
	width:100%;
}
#grpmember,#fwrdmember{
	float:right;
	margin-right:5%;
	margin-top:20px;
}
#editgrppicbtn{
	margin-left:30%;
	margin-top:-180px;
	width:120px;
	color:#34baeb;
	font-family:bold;
	font-size:1.2em;
}
#viewgrppicbtn{
	margin-left:30%;
	margin-top:-110px;
	width:120px;
	color:white;
	font-family:bold;
	font-size:1.2em;
}
#addgrpmemlabel{
	font-family:bold;
	font-size:1.2em;
	background-color:white;
	color:black;
}
#exitfrmgroup{
	font-family:bold;
	font-size:1.2em;
}
#addgrpmemlabel:hover,#exitfrmgroup:hover{
	color:black;
	background-color:white;
}
#messagepic{
	font-size:7em;
	margin-left:35%;
	margin-top:20%;
	border:6px solid #9d9e9d;
	color:#9d9e9d;
	padding:40px;
	border-radius:50%;
}
#sendfilesbtn{
	font-size:1.5em;
	float:right;
	margin-right:4%;
	margin-top:8px;
	cursor:pointer;
}
#myDropdown{
	margin-top:-10px;
	margin-left:75%;
	position:absolute;
	z-index:2;
}
#sendfilebtn:hover{
	background-color:#e6e6e6;
}
#sendfilebtn{
	margin-left:0px;
	display:block;
	padding:7px;
	margin:-10px;
}
#lastseenlabel{
	font-size:1em;
	color:#9d9e9d;
	margin-top:-10px;
	margin-left:1%;
	font-family:bold;
}
</style>
<style>
.dropbtn, .notifydropbtn {
  color: black;
  padding: 0px;
  font-size: px;
  border: none;
  cursor: pointer;
}
.drpdwn {
  position: relative;
  display: inline-block;
}
.drpdwn li{
  list-style-type:none;
  text-decoration:none;
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
			<nav  class="navbar navbar-default navbar-fixed-top"id="homeheader">
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
							<li class="nav-item"><a href="home.php?user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-home"></i></a></li>
							<li class="nav-item"><a href="find_people.php"><i class="glyphicon glyphicon-search"></i></a></li>
							<li class="nav-item"><a href="messages.php?type=direct&user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-comment"></i></a></li>
							<li class="nav-item"><a href="explore.php?user_id=<?php echo $_SESSION['uid']; ?>"><i class="glyphicon glyphicon-book"></i></a></li>
							<!-- Notifications -->
							<li class=" nav-item dropdown" style="cursor:pointer;">
								<a id="notificationsicon" class="dropdown-toggle notifydropbtn" aria-hidden="true" onclick="shownotifcs()"><i class="glyphicon glyphicon-bell"></i>
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
							<li id="prfpiclink"><a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>"><img src="<?php echo $prfpic; ?>" id="prf_pic"></a></li>
							<li id="menuhamburger"><a class="toggle-btn" onclick="openNav()"><i class="glyphicon glyphicon-menu-hamburger"></i></a></li>
								<div id="mySidenav" class="sidenav">
								  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
									<div style="margin-top:-40px;margin-bottom:-20px">
										<a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>" ><img id="navprfpic" src="<?php echo $prfpic; ?>" ></a>
										<?php $str=$username;  if(str_word_count($str)>1){ $string=substr($str, 0, strrpos($str, ' '));}else{ $string=$username;} ?>
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
									function shownotifcs() {
									  document.getElementById("notifytab").classList.toggle("show");
									}
									/*$('#settings').click(function(){
										//open bootsrap modal
										$('#settingsModal').modal({
										show: true
										});
									})*/;
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
			</nav><br><br>
		</div>
	</div>
	<!-- Code for navbar ends here -->

	<div class="row" style="margin-top:40px;">
		<div class="col-sm-8" style="border-right:1px solid #e6e6e6;height:88.9%;overflow:hidden;">
			<div class="row">
				<div class="col-sm-12">
				<?php if($_GET['user_id'] != $_SESSION['uid']){ ?>
					<nav  class="navbar navbar-default dropdown drpdwn" id="messageheaderleft">
						<a href="home.php?user_id=<?php echo $_SESSION['uid']; ?>" id="goback"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<?php
							if($_GET['user_id'] != $_SESSION['uid'] AND $_GET['type'] == "direct"){
								global $con;
								$user_id=$_GET['user_id'];
								$select_user="select * from users where user_id='$user_id'";
								$run_user=mysqli_query($con,$select_user);
								$row_user=mysqli_fetch_array($run_user);
								$user_name=$row_user['user_name'];
								$user_status=$row_user['status'];
								if($user_status=="inactive"){
									$check_active=mysqli_query($con,"select end_time from user_sessions where user_id='$user_id' ORDER BY start_time DESC LIMIT 1");
									$row_lseen=mysqli_fetch_array($check_active);
									$date=$row_lseen['end_time'];
									$time=strtotime($date);
									$lastdate=date("d/m/Y",$time);
									$today=date("d/m/Y",time());
									if($lastdate==$today){
										$lasttime=date("h:i A",$time);
										$lastseen="Today at $lasttime";
									}else{
										$lasttime=date("h:i A",$time);
										$lastseen="On $lastdate at $lasttime";
									}
								}
						?>
							<a href="profile.php?user_id=<?php echo $user_id; ?>" id="usernameinmsgnav"><?php echo $user_name; ?></a>
							<?php 
								$uid=$_SESSION['uid'];
								$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$user_id'");
								$row_status=mysqli_fetch_array($check_actstatus);
								$act_status=$row_status['activity_status'];
								if($act_status=="everyone"){
									if($user_status=="inactive"){ ?>
										<span id="lastseenlabel">Last seen <?php echo $lastseen; ?></span>
									<?php }else{ ?>
										<span id="lastseenlabel">Active now</span>
									<?php
									}
								}elseif($act_status=="followcon"){
									$check_follower=mysqli_query($con,"select * from following where following_user='$user_id' AND followed_user='$uid' AND status='accepted'");
									$num_followers=mysqli_num_rows($check_follower);
									$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$user_id' AND status='accepted') OR (connect_by='$user_id' AND connect_with='$uid' AND status='accepted')");
									$num_con=mysqli_num_rows($check_con);
									if($num_followers != 0 OR $num_con != 0){
										if($user_status=="inactive"){ ?>
											<span id="lastseenlabel">Last seen <?php echo $lastseen; ?></span>
											<?php }else{ ?>
												<span id="lastseenlabel">Active now</span>
											<?php
										}
									}
								}
							
							}elseif($_GET['user_id'] != $_SESSION['uid'] AND $_GET['type'] == "group"){
								$grpid=$_GET['user_id'];
								$select_user="select grp_name from groups where grp_id='$grpid'";
								$run_user=mysqli_query($con,$select_user);
								$row_user=mysqli_fetch_array($run_user);
								$user_name=$row_user['grp_name'];
								
								$sessionuser=$_SESSION['uid'];
								$checkexistmem=mysqli_query($con,"select * from group_members where grp_id='$grpid' AND grp_member='$sessionuser'");
								$numexistmem=mysqli_num_rows($checkexistmem);
						?>
							<a href="" id="usernameinmsgnav"><?php echo $user_name; ?></a>
						<?php
							}
						?>
						 
						 <!-- dropdown for showing more options -->
						<i class="fa fa-ellipsis-v dropdown-toggle dropbtn" aria-hidden="true" id="msgmoredrpdown" onclick="showmorefunc()"></i>
							<ul class="dropdown-content" id="msgmoredroplist"> 
							<?php if($_GET['type']=="group"){ ?>
									<li><a id="showgroupinfo" style="cursor:pointer;">Group info</a></li>  
									<li><a href="#">Report group...</a></li>
									<li><a id="cleargrpchat" style="cursor:pointer;">Clear chat</a></li>
									<li><a id="exitgroup" style="cursor:pointer;">Exit group</a></li>
							<?php if($numexistmem == 0){ ?>
								<li><a id="deletegrpconversation" style="cursor:pointer;">Delete conversation</a></li>
							<?php } 
								}elseif($_GET['type']=="direct"){ ?>
									<li><a href="#">Report user...</a></li>  
									<li><a href="#">Share profile</a></li>    
									<li><a href="profile.php?user_id=<?php echo $_GET['user_id']; ?>">View profile</a></li>
								<li><a id="deleteconversation" style="cursor:pointer;">Delete conversation</a></li> 
							<?php } ?>	
							</ul> 
							<!-- drop down for sending files -->
							<i class="fa fa-th-large filesbtn" id="sendfilesbtn" aria-hidden="true" onclick="sendfilesfunc()"></i>
							  <ul id="myDropdown" class="dropdown-content">
								<a><label id="sendfilebtn" style="cursor:pointer;"><img src="https://img.icons8.com/fluent/48/000000/file.png" width="25px" height="25px"/>  Document</label></a>
								<a id="selectimgtosend" style="cursor:pointer;"><img src="https://img.icons8.com/fluent/48/000000/picture.png"width="25px" height="25px"/>  <b>Picture</b></a>
							  </ul>
						<script>
							//opening the modal for sending a pic or video
							$("#selectimgtosend").click(function(){
								$("#insertMspPicModal").modal({
									show : true
								});
							});
							
							//opening the modal for sending a pic or video
							$("#sendfilebtn").click(function(){
								$("#insertMspPicModal").modal({
									show : true
								});
							});
							
							function showmorefunc() {
							  document.getElementById("msgmoredroplist").classList.toggle("show");
							}
							function sendfilesfunc() {
							  document.getElementById("myDropdown").classList.toggle("show");
							}

						</script>
							
					</nav>
					<nav  class="navbar navbar-default dropdown" id="messageheaderleft2" style="display:none;">
						<p style="text-align:center;font-family:Merienda One,cursive;margin-left:10%;float:left;font-size:1.5em;"> Group Details</p>  <i class="fa fa-times closegrpinfo" aria-hidden="true" id="closegrpinfo" style="font-size:1.8em;margin-top:3px;margin-right:4%;cursor:pointer;float:right;"></i>
							
					</nav>
				<?php }else{ ?>
					<div class="row">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
							<i class="fa fa-paper-plane-o" aria-hidden="true" id="messagepic"></i>
							<p style="font-family:bold;margin-left:10%;font-size:1.5em;color:#9d9e9d;margin-top:4%;">Send messages, pictures, files and a lot more in private or a group...</p>
							</div>
						<div class="col-sm-2">
						</div>
					</div>
				<?php } ?>
				</div>
			</div><br>
			<div id="messagesvertical" class="messagestab" style="height:86.5%;margin-left:0px;margin-top:14px;overflow-y:auto;background-color:#fcfcfa;">
			</div>
			<div id="groupdetails" style="display:none;">
			<?php
				global $con;
				$sessionuser=$_SESSION['uid'];
				$grp_id=htmlentities(mysqli_real_escape_string($con,$_GET['user_id']));
				$select_grpdata=mysqli_query($con,"select * from groups where grp_id='$grp_id'");
				$row_grpdata=mysqli_fetch_array($select_grpdata);
				$grp_name=$row_grpdata['grp_name'];
				$grp_pic=$row_grpdata['group_pic'];
				$grp_created_by=$row_grpdata['created_by'];
				$select_grpcreated=mysqli_query($con,"select user_name from users where user_id='$grp_created_by'");
				$row_grpcreated=mysqli_fetch_array($select_grpcreated);
				$grp_created_user=$row_grpcreated['user_name'];
				
				$selectgrp_member=mysqli_query($con,"select * from group_members where grp_id='$grp_id' AND grp_member='$sessionuser'");
				$select_grpmemdata=mysqli_fetch_array($selectgrp_member);
				$num_grpmem=mysqli_num_rows($selectgrp_member);
				$checkuseradmin=$select_grpmemdata['admin'];
			?>
				<div class="row" style="margin-top:13px;">
					<div class="col-sm-6">
					</div>
					<div class="col-sm-6" style="height:93%;background-color:white;border-left:1px solid #e6e6e6;overflow-y:auto;">
						<div class="row">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-8">
								<img src="<?php echo $grp_pic; ?>" style="height:250px;width:100%;border:solid #e6e6e6 1.5px;margin-top:5%;border-radius:10px;padding:10px;" />
								<label class='btn btn-default' id="editgrppicbtn"><b>Edit</b></label>
								<label class='btn btn-info' id="viewgrppicbtn"><b>View</b></label>
								<script>
									$("#editgrppicbtn").click(function(){
										$('#showgrppic').modal({
											show: true
										});
									});
									function readGrpURL(input) {
										if (input.files && input.files[0]) {
											var reader = new FileReader();

											reader.onload = function (e) {
												$('#grppicpreview')
													.attr('src', e.target.result)
													.width(150)
													.height(200);
											};

											reader.readAsDataURL(input.files[0]);
											
											$('#showgrppic').modal({
												show: true
											});
										}
									}
									
									//showing group pic
									$('#viewgrppicbtn').click(function(){
										//open prfpic modal
										$('#prfpicmodal').modal({
										show: true
										});
									});
								</script>
								<!-- Change group pic Modal -->
								<div class="modal fade" id="showgrppic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<div class="panel panel-default">
													<div class="panel-heading" style="background-color:white;">
														<p><strong style="font-family:bold;font-size:1.5em;">Change group picture</strong></p>
													</div>
													<div class="panel-body">
														<img id="grppicpreview" onerror="this.style.display='none'"/>
													</div>
													<div class="panel-footer">
														<form action="" method="post" enctype="multipart/form-data">
															<div class="row">
																<label class="btn btn-success" id="chooseprfpic"><b>Choose</b>
																<input type="file" name="newprfpic" id="newprfpic" onchange="readGrpURL(this);" style="display:none;" /></label>
																<button class="btn btn-info" type="submit" name="confirmgrppic" id="confirmgrppic" style="width:120px;"><b>Confirm</b></button>
																<button class='btn btn-default' type='button' data-dismiss='modal' id='chooseprofclose'><b>Cancel</b></button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- show group profile pic -->
								<div class="modal fade" id="prfpicmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-20px;font-size:3em;margin-bottom:-15px;"><span aria-hidden="true">&times;</span></button>
											<img class="img-responsive" src="<?php echo $grp_pic; ?>" id="modalprfpic" style="width:100%;height:75%;margin-top:-27px;border:solid 1px black;" />
										</div>
									</div>
								</div>
								
								
								
							</div>
							<div class="col-sm-2">
								<span class='dropdown'>
								<li id='grpverticalopt' style='margin-top:20%;cursor:pointer;' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu pull-left' id='grpinfodrpdwn' style='margin-left:-150px;margin-top:25px;'>
											<li><a href='#'>Report group...</a></li>  
											<li><a id="dropdowncleargrpchat" style="cursor:pointer;">Clear chat</a></li>  
											<li><a id="dropdownexitgroup" style="cursor:pointer;">Exit group</a></li> 
										<?php if($numexistmem == 0){ ?>
											<li><a id="drpdelgrpcon" style="cursor:pointer;">Delete conversation</a></li>
										<?php } ?>	
										</ul>
								</span>
							</div>
						</div>
						<form action="" method="post" enctype="multipart/form-data">
							<br>
							<h3 style="float:left;font-size:2em;color:#34baeb;margin-top:5px;margin-left:20px;font-family:bold;" id="grpusername"><?php echo $grp_name; ?></h3>
						<?php if($num_grpmem != 0){ ?>
							<i class="fa fa-pencil" aria-hidden="true" style="font-size:1.3em;margin-top:15px;margin-left:15px;cursor:pointer;" id="editgrpname"></i><br>
						<?php }else{ echo "<br><br>"; } ?>
							
							<div id="editgrpnamediv" style="display:none;">
								<input type="text" id="editgroupname" name="groupname" class="form-control" placeholder="Enter group name" value="<?php echo $grp_name; ?>" style="font-family:bold;font-size:1.5em;width:88%;float:left;" />
								<button type="submit" class="btn btn-default" id="chgrpnamebtn" name="chgrpnamebtn" style="margin-left:0px;"><i class="fa fa-paper-plane" aria-hidden="true"  style="font-size:1.4em;"></i>
								</button>
							</div>
							
							<br>
							<p style="font-family:bold;margin-left:20px;margin-top:-5px;font-size:1.1em;">created by : <a href="profile.php?user_id=<?php echo $grp_created_by; ?>"><?php echo $grp_created_user; ?></a></p>
						</form>
						<script type="text/javascript">
							$("#editgrpname").click(function(){
								$("#grpusername").css('display','none');
								$("#editgrpname").css('display','none');
								var editgrp=document.getElementById('editgrpnamediv');
								editgrp.setAttribute('style','display:display');
							});
						</script>
						<p style="font-family:'Merienda One',cursive;font-size:1.4em;">Group Members : </p>
						<div class="showgroupmembers"></div>
						<br>
						<?php
						if($num_grpmem != 0){
							if($checkuseradmin != "No"){ ?>
								<div class="alert alert-warning btn" id="addgrpmemlabel" style="width:100%;"><b>Add a member &nbsp <i class="fa fa-plus" aria-hidden="true"></i></b></div>
							<?php } ?>
							<div class="alert alert-danger btn" id="exitfrmgroup" style="width:100%;"><b>Exit Group</b></div>
							<p style="color:#969493;font-family:bold;">You won`t receive any further messages and you can still view the past messages in the group.</p>
						<?php } ?>
						<script type="text/javascript">
							$("#addgrpmemlabel").click(function(){
								$('#addgrpmembersmodal').modal({
									show: true
								});
							});
						</script>
						<?php 
							//creating a group
							global $con;
							$sessionuser=$_SESSION['uid'];
							$select_users=mysqli_query($con,"select followed_user from following where following_user='$sessionuser' AND user_type='user' AND status='accepted'");
						?>
						<!-- modal for adding a group member. -->
						<div class="modal fade" id="addgrpmembersmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<div class="panel-title"><p><strong>Adding a new user to group!</strong></p></div>	
									</div>
									<div class="modal-body">
										<div class="panel panel-deafult">
											<div class="panel-body">
												<form name="" method="post" action="" enctype="multipart/form-data" style="margin-top:-10px;">
													<input type="submit" class="btn btn-info" name="addmemtogrp" id="addmemtogrp" value="Done" style="float:right;margin-top:-15px;" />
													<label>Select members for your group : </label>
													<div style="border:solid #e6e6e6 1px;">
														<?php
															while($row_user=mysqli_fetch_array($select_users)){
																$userid=$row_user['followed_user'];
																$select_userdetails=mysqli_query($con,"select * from users where user_id='$userid'");
																$row_details=mysqli_fetch_array($select_userdetails);
																$username=$row_details['user_name'];
																if(str_word_count($username)>=2){
																	$username=explode(" ",$username,3);
																	$username=$username[0]." ".$username[1];
																}
																$prf_pic=$row_details['profile_pic'];
																echo "
																	<a class='btn setmsgtouser' id='setmsgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
																		<div class='row'>
																			<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;' />
																			<p id='setmsgtousername' style='margin-top:10px;'>$username</p>
																			<input type='checkbox' name='grpmember[]' id='grpmember' style='width:20px;height:20px;' value='$userid' />
																		</div>
																	</a>
																";
															}
														?>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
				</div>
			</div>
			<?php if($_GET['user_id'] != $_SESSION['uid']){
						global $con;
						$type=$_GET['type'];
						$sid=$_SESSION['uid'];
						$msgto=$_GET['user_id'];
						if($type=="direct"){
							$check_blocked=mysqli_query($con,"select * from blocked_users where (blocked_by='$sid' AND blocked_user='$msgto') OR (blocked_by='$msgto' AND blocked_user='$sid')");
							$num_users=mysqli_num_rows($check_blocked);
							if($num_users == 0){
						?>
							<div class="row" id="msgbar" style="margin-bottom:6px;padding:5px;">
								<div class="col-sm-1 col-lg-1">
								<label class='btn btn-default' id="msgimage" style="font-size:1.8em;margin-left:10px;" ><i class="fa fa-camera form" aria-hidden="true"></i></label> 
								</div>
								<div class="col-sm-10 col-lg-10">
								<textarea type="text" rows="1" class="form-control msgbox" name="msg_content" id="msg"  placeholder="write your message..." style="width:102%;height:40px;margin-bottom:-1px;resize:none;margin-left:-15px;" required></textarea>
								</div>
								<div class="col-sm-1 col-lg-1">
								<button type="submit" class="btn btn-default sendmsgbtn" id="msg" name="sendmsg" style="height:40px;width:150%;margin-left:-20px;"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
								</div>
							</div>
						<?php }else{
								echo "
									<div class='row'>
										<div class='col-sm-4'>
										</div>
										<div class='col-sm-4'>
											<p style='font-family:bold;font-size:1.2em;margin-top:3%;color:#9d9e9d;'>You cannot send messages to this user...</p>
										</div>
										<div class='col-sm-4'>
										</div>
									</div>
								";
							}
						}else{
							$check_grpmem=mysqli_query($con,"select * from group_members where grp_id='$msgto' AND grp_member='$sid'");
							$num_users=mysqli_num_rows($check_grpmem);
							if($num_users != 0){
						?>
							<div class="row" id="msgbar" style="margin-bottom:6px;padding:5px;">
								<div class="col-sm-1 col-lg-1">
								<label class='btn btn-default' id="msgimage" style="font-size:1.8em;margin-left:10px;" ><i class="fa fa-camera form" aria-hidden="true"></i></label> 
								</div>
								<div class="col-sm-10 col-lg-10">
								<textarea type="text" rows="1" class="form-control msgbox" name="msg_content" id="msg"  placeholder="write your message..." style="width:102%;height:40px;margin-bottom:-1px;resize:none;margin-left:-15px;" required></textarea>
								</div>
								<div class="col-sm-1 col-lg-1">
								<button type="submit" class="btn btn-default sendmsgbtn" id="msg" name="sendmsg" style="height:40px;width:150%;margin-left:-20px;"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
								</div>
							</div>
						<?php }else{
								echo "
									<div class='row'>
										<div class='col-sm-4'>
										</div>
										<div class='col-sm-4'>
											<p style='font-family:bold;font-size:1.2em;margin-top:3%;color:#9d9e9d;'>You cannot send messages to this group...</p>
										</div>
										<div class='col-sm-4'>
										</div>
									</div>
								";
							}
						}
					} ?>
			<script type="text/javascript">
				//function for showing the image preview.
				function readURL(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();
						var image = document.getElementById("selectimg").files[0]; 
							createReader(image, function(w, h) { 
								var imgheight=h;
								var imgwidth=w;
							}); 
						
						reader.onload = function (e) {
							$('#preview')
								.attr('src', e.target.result)
								.width(imgwidth)
								.height(imgheight);
								
						};
						

						reader.readAsDataURL(input.files[0]);
						
						$('#insertMspPicModal').modal({
							show: true
						});
					}
				}
				
				//function for returning the dimensions of the input image.
				function createReader(file, whenReady) { 
					var reader = new FileReader; 
					reader.onload = function(evt) { 
						var image = new Image(); 
						image.onload = function(evt) { 
							var width = this.width; 
							var height = this.height; 
							if (whenReady) whenReady(width, height); 
						}; 
						image.src = evt.target.result; 
					}; 
					reader.readAsDataURL(file); 
				} 
				
				
				//opening the modal for sending a pic or video
				$("#msgimage").click(function(){
					$("#insertMspPicModal").modal({
						show : true
					});
				});
				
				</script>
			
			<!-- Inserting message image Modal -->
			<div class="modal fade" id="insertMspPicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width:100%;height:100%;margin-top:-3%;">
				<div class="modal-dialog modal-lg" role="document" style="width:100%;height:100%;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#4691f2;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:3em;"><span aria-hidden="true">&times;</span></button>
							<div class="panel-title"><p><strong>Image Preview</strong></p></div>	
						</div>
						<div class="modal-body" style="height:65%;background-color:#eee;">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="row">
							<img id="preview" style="height:300px;width:80% auto;margin-top:10px;border:solid 1px black;" onerror="this.style.display='none'" />
							</div><br><br>
							<div class="row">
							<label class='btn btn-default' style="font-size:1.2em;margin-left:46%;width:120px;" >upload <i class="fa fa-camera form" aria-hidden="true"></i><input type='file' id="selectimg" name='selectimg' style="display:none;" onchange="readURL(this);" multiple /></label> 
							</div>
						</div>
						<div class="modal-footer" style="height:25%;background-color:#e6e6e6;">
							<textarea type="text" class="form-control" cols="1" id="msgwithpic" name="msgwithpic" style="resize:none;width:50%;margin-left:25%;height:40px;margin-top:3%;" placeholder="Add a message..."></textarea>
							<button type="submit" class="btn btn-default" name="submsgpic" id="submsgpic" style="float:left;font-size:1.8em;margin-top:3%;"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							<br><br>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-sm-4">
			<nav  class="navbar navbar-default "id="messageheaderright">
				<a id="createnewgroup" style="cursor:pointer;">New group &nbsp <i class="fa fa-plus" aria-hidden="true"></i></a>
			</nav><br><br>
			<script type="text/javascript">
				$("#createnewgroup").click(function(){
					$("#newgroupmodal").modal({
						show : true
					});
				});
			</script>
			
			<div id="messagetolist" class="messagetolist" style="height:83%;">
			</div>
			<a style="cursor:pointer;" id="newmsgbtn"><i class="fa fa-plus-circle" aria-hidden="true" ></i></a>
			
			<script>
				$('#newmsgbtn').click(function(){
					//open messageto list modal
					$('#messagetolistModal').modal({
					show: true
					});
				});
			</script>
			<?php
				global $con;
				$userid=$_SESSION['uid'];	
				$show_follow="select * from following where following_user='$userid' AND status='accepted' AND user_type='user' ORDER BY following_user ASC";
				$run_flowing=mysqli_query($con,$show_follow);
				
				
			
			?>
			
			<div class="modal fade" id="messagetolistModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<div class="panel-title"><p><strong>message to</strong></p></div>	
						</div>
						<div class="modal-body">
							<div class="panel panel-deafult">
								<div class="panel-body">
									<?php	
									echo "<h3 style='margin-top:-10px;'><b>following</b></h3>";
										while($row_show=mysqli_fetch_array($run_flowing)){
											$following=$row_show['followed_user'];
											$select_details="select * from users where user_id='$following'";
											$run_details=mysqli_query($con,$select_details);
											$row_details=mysqli_fetch_array($run_details);
											$prf_picture=$row_details['profile_pic'];
											$user_name=$row_details['user_name'];
											if(str_word_count($user_name)>=2){
												$username=explode(" ",$user_name,3);
												$user_name=$username[0]." ".$username[1];
											}
											$userid=$row_details['user_id'];
											echo "
												<a href='messages.php?type=direct&user_id=$userid' class='btn btn-default' name='setmsgtouser' style='width:100%'><img src='$prf_picture' id='modalprfpic' >
												<p id='modalusername'>$user_name </p></a>
												<br>
											";
										}
										echo "<h3><b>connections</b></h3>";
										global $con;
										$userid=$_SESSION['uid'];	
										$show_connect="select * from connections where connect_with='$userid' OR connect_by='$userid'";
										$run_connect=mysqli_query($con,$show_connect);
										
										while($row_show=mysqli_fetch_array($run_connect)){
											$userid=$_SESSION['uid'];
											$connected_with=$row_show['connect_with'];
											$connected_by=$row_show['connect_by'];
											if($connected_with==$userid){
												$connected=$connected_by;
											}else{$connected=$connected_with;}
											$select_details="select * from users where user_id='$connected'";
											$run_details=mysqli_query($con,$select_details);
											$row_details=mysqli_fetch_array($run_details);
											$prf_picture=$row_details['profile_pic'];
											$user_name=$row_details['user_name'];
											if(str_word_count($user_name)>=2){
												$username=explode(" ",$user_name,3);
												$user_name=$username[0]." ".$username[1];
											}
											$userid=$row_details['user_id'];
											echo "
												<a href='messages.php?type=direct&user_id=$userid' class='btn btn-default' name='setmsgtouser' style='width:100%'><img src='$prf_picture' id='modalprfpic' >
												<p id='modalusername'>$user_name</p></a>
												<br>
											";
										}
									
									?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
				//creating a group
				global $con;
				$sessionuser=$_SESSION['uid'];
				$select_users=mysqli_query($con,"select followed_user from following where following_user='$sessionuser' AND user_type='user' AND status='accepted'");
			?>
			
			<!-- modal for creating a group. -->
			<div class="modal fade" id="newgroupmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<div class="panel-title"><p><strong>Create a new group!</strong></p></div>	
						</div>
						<div class="modal-body">
							<div class="panel panel-deafult">
								<div class="panel-body">
									<form name="" method="post" action="" enctype="multipart/form-data" style="margin-top:-10px;">
										<input type="submit" class="btn btn-info" name="creategrpbtn" id="creategrpbtn" value="Done" style="float:right;margin-top:-15px;" />
										<label>Name of your group : </label>
										<input type="text" class="form-control" name="grpname" id="grpname" placeholder="Name of your group..." required /><br>
										<label>Select members for your group : </label>
										<div style="border:solid #e6e6e6 1px;">
											<?php
												while($row_user=mysqli_fetch_array($select_users)){
													$userid=$row_user['followed_user'];
													$select_userdetails=mysqli_query($con,"select * from users where user_id='$userid'");
													$row_details=mysqli_fetch_array($select_userdetails);
													$username=$row_details['user_name'];
													if(str_word_count($username)>=2){
														$username=explode(" ",$username,3);
														$username=$username[0]." ".$username[1];
													}
													$prf_pic=$row_details['profile_pic'];
													echo "
														<a class='btn setmsgtouser' id='setmsgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
															<div class='row'>
																<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;' />
																<p id='setmsgtousername' style='margin-top:10px;'>$username</p>
																<input type='checkbox' name='grpmember[]' id='grpmember' style='width:20px;height:20px;' value='$userid' />
															</div>
														</a>
													";
												}
											?>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- creating group modal end -->
			
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
	
	$(document).ready(function(){
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var user=<?php echo json_encode($_GET['user_id']); ?>;
		if(sessionuser == user){
			var msgspace=document.getElementById("messagesvertical");
			msgspace.setAttribute('style','color:white;');
		}
		//showing messages	
		showMessages();
		messageToList();
		changeBgColor();
		setInterval(function(){
			//showing messages	
			refreshMessages();
			messageToList();
			changeBgColor();
		},5000);
	});

	//inserting direct messages
	$('.msgbox').on('keyup',function(event){
		if(event.keyCode == 13 && !event.shiftKey){
			var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
			var messageto=<?php echo json_encode($_GET['user_id']); ?>;
			var message=$(".msgbox").val();
			var msgtype=<?php echo json_encode($_GET['type']); ?>;
			
			$.ajax({
				url:'messages.php',
				data:'insertmessage=1&message='+message+'&sessionuser='+sessionuser+'&messageto='+messageto+'&type='+msgtype,
				type:'post',
				async:false,
				success:function(){
					$('.msgbox').val('');
					showMessages();
					messageToList();
					changeBgColor();
				}
			});
			return false;
		}
	});
	
	//inserting direct message when the button is clicked.
	$(".sendmsgbtn").click(function(){
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
			var messageto=<?php echo json_encode($_GET['user_id']); ?>;
			var message=$(".msgbox").val();
			var msgtype=<?php echo json_encode($_GET['type']); ?>;
			
			$.ajax({
				url:'messages.php',
				data:'insertmessage=1&message='+message+'&sessionuser='+sessionuser+'&messageto='+messageto+'&type='+msgtype,
				type:'post',
				async:false,
				success:function(){
					$('.msgbox').val('');
					showMessages();
					messageToList();
					changeBgColor();
				}
			});
			return false;
	})
	
	//showing messages
	function showMessages(){
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var messageto=<?php echo json_encode($_GET['user_id']); ?>;
		var msgstype=<?php echo json_encode($_GET['type']); ?>;
		if(sessionuser != messageto){
			$.ajax({
				url:'functions/functions.php',
				data:'showmessages=1&sessionuser='+sessionuser+'&messageto='+messageto+'&msgstype='+msgstype,
				type:'post',
				async:false,
				success:function(res){
					$(".messagestab").html(' ');
					$(".messagestab").html(res);
					messageToList();
					var messageBody = document.querySelector('.messagestab');
					messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
				}
			});
			return false;
		}
	}
	
	//Refresh messages
	function refreshMessages(){
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var messageto=<?php echo json_encode($_GET['user_id']); ?>;
		var msgstype=<?php echo json_encode($_GET['type']); ?>;
		if(sessionuser != messageto){
			$.ajax({
				url:'functions/functions.php',
				data:'showmessages=1&sessionuser='+sessionuser+'&messageto='+messageto+'&msgstype='+msgstype,
				type:'post',
				async:false,
				success:function(res){
					$(".messagestab").html(' ');
					$(".messagestab").html(res);
					messageToList();
				}
			});
			return false;
		}
	}
	
	//showing message to List
	function messageToList(){
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'showmsgtolist=1&sessionuser='+sessionuser,
			type:'post',
			async:false,
			success:function(res){
				$(".messagetolist").html(res);
				changeBgColor();
			}
		});
		return false;
	}
	
	//deleting the conversation
	$("#deleteconversation").click(function(){
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		var messageto=<?php echo json_encode($_GET['user_id']); ?>;
		$.ajax({
			url:'messages.php',
			data:'delconversation=1&sessionuser='+sessionuser+'&messageto='+messageto,
			type:'post',
			async:false,
			success:function(){
				window.open('messages.php?type=direct&user_id='+sessionuser,'_self');
				//messageToList();
			}
		});
		return false;
	});
	
	//changing background-color of setmsgto links
	function changeBgColor(){
		var messageto=<?php echo json_encode($_GET['user_id']); ?>;
		var msgto=document.getElementById('setmsgto'+messageto);
		msgto.setAttribute('style','background-color:#e6e6e6');
		//$('#setmsgto'+messageto).css('background-color','#e6e6e6');
		//alert(messageto);
	}
	
	//showing group info
	$("#showgroupinfo").click(function(){
		var type = <?php echo json_encode($_GET['type']); ?>;
		var grp_id = <?php echo json_encode($_GET['user_id']); ?>;
		//grpdetails
		$(".messagestab").html('');
		$("#msgbar").html('');
		$("#messageheaderleft").css('display','none');
		$(".messagestab").css('display','none');
		var msghd=document.getElementById("messageheaderleft2");
		msghd.setAttribute('style','display:display');
		var gd=document.getElementById("groupdetails");
		gd.setAttribute('style','display:display');
		
		//showing group members
		$.ajax({
			url:'functions/functions.php',
			data:'showgroupmems=1&group_id='+grp_id,
			type:'post',
			async:false,
			success:function(res){
				$(".showgroupmembers").html(res);
			}
		});
	});
	
	//showing group members
	function showGroupMembers(){
		var type = <?php echo json_encode($_GET['type']); ?>;
		var grp_id = <?php echo json_encode($_GET['user_id']); ?>;
		//showing group members
		$.ajax({
			url:'functions/functions.php',
			data:'showgroupmems=1&group_id='+grp_id,
			type:'post',
			async:false,
			success:function(res){
				$(".showgroupmembers").html(res);
			}
		});
	}
	
	//closing group info
	$("#closegrpinfo").click(function(){
		var grp_id = <?php echo json_encode($_GET['user_id']); ?>;
		window.open('messages.php?type=group&user_id='+grp_id,'_self');
		/*$("#messageheaderleft2").css('display','none');
		var msghd=document.getElementById("messageheaderleft");
		msghd.setAttribute('style','display:display');
		showMessages();*/
	});
	
	//exit a group from big button
	$("#exitfrmgroup").click(function(){
		var grp_id=<?php echo json_encode($_GET['user_id']); ?>;
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/operations.php',
			data:'exitgroup=1&group_id='+grp_id+'&sessionuser='+sessionuser,
			type:'post',
			async:false,
			success:function(res){
				window.open('messages.php?type=group&user_id='+grp_id,'_self');
			}
		});
	});
	
	//exit a group from dropdown button
	$("#exitgroup").click(function(){
		var grp_id=<?php echo json_encode($_GET['user_id']); ?>;
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/operations.php',
			data:'exitgroup=1&group_id='+grp_id+'&sessionuser='+sessionuser,
			type:'post',
			async:false,
			success:function(res){
				window.open('messages.php?type=group&user_id='+grp_id,'_self');
			}
		});
	});
	
	//exit a group from grp details dropdown button
	$("#dropdownexitgroup").click(function(){
		var grp_id=<?php echo json_encode($_GET['user_id']); ?>;
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/operations.php',
			data:'exitgroup=1&group_id='+grp_id+'&sessionuser='+sessionuser,
			type:'post',
			async:false,
			success:function(res){
				window.open('messages.php?type=group&user_id='+grp_id,'_self');
			}
		});
	});
			
	//clearing group chat
	$("#cleargrpchat").click(function(){
		var grp_id=<?php echo json_encode($_GET['user_id']); ?>;
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/operations.php',
			data:'cleargrpchat=1&group_id='+grp_id+'&sessionuser='+sessionuser,
			type:'post',
			async:false,
			success:function(res){
				window.open('messages.php?type=group&user_id='+grp_id,'_self');
			}
		});
	});
	
	//clearing group chat from grp details dropdown btn
	$("#dropdowncleargrpchat").click(function(){
		var grp_id=<?php echo json_encode($_GET['user_id']); ?>;
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/operations.php',
			data:'cleargrpchat=1&group_id='+grp_id+'&sessionuser='+sessionuser,
			type:'post',
			async:false,
			success:function(res){
				window.open('messages.php?type=group&user_id='+grp_id,'_self');
			}
		});
	});
	
	//deleting group chat
	$("#deletegrpconversation").click(function(){
		var grp_id=<?php echo json_encode($_GET['user_id']); ?>;
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/operations.php',
			data:'deletegrpcon=1&group_id='+grp_id+'&sessionuser='+sessionuser,
			type:'post',
			async:false,
			success:function(res){
				window.open('messages.php?type=direct&user_id='+sessionuser,'_self');
			}
		});
	});
	
	//deleting group chat from grp details dropdown btn
	$("#drpdelgrpcon").click(function(){
		var grp_id=<?php echo json_encode($_GET['user_id']); ?>;
		var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/operations.php',
			data:'deletegrpcon=1&group_id='+grp_id+'&sessionuser='+sessionuser,
			type:'post',
			async:false,
			success:function(res){
				window.open('messages.php?type=direct&user_id='+sessionuser,'_self');
			}
		});
	});
</script>
<?php
if(isset($_POST['insertmessage'])){
	$insertmsg = new InsertMessage();
	$insertmsg->InsertingMsgFunction();
}

class InsertMessage{
	function InsertingMsgFunction(){
		global $con;
		$user_from_id=$_POST['sessionuser'];
		$user_to_id=$_POST['messageto'];
		$msg_type=$_POST['type'];
		
		$msg_cnt = htmlentities(mysqli_real_escape_string($con,$_POST['message']));
		if($msg_type=="direct"){
			if($user_from_id != $user_to_id and $msg_cnt != null){
				$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$user_from_id','$user_to_id','$msg_cnt','none','none','direct','self',NOW())";
				$run_msgcnt=mysqli_query($con,$insert_msg);
				
				$check_msgtolist="select * from messageto where (message_from='$user_from_id' AND message_to='$user_to_id') OR (message_from='$user_to_id' AND message_to='$user_from_id')";
				$run_msgtolist=mysqli_query($con,$check_msgtolist);
				$num_msgtolist=mysqli_num_rows($run_msgtolist);
				if($num_msgtolist == 0){
					$insert_msgtolist="insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$user_from_id','$user_to_id','none','direct',NOW())";
					$run_msglist=mysqli_query($con,$insert_msgtolist);
				}else{
					$row_msgtolist=mysqli_fetch_array($run_msgtolist);
					$deleted_by=$row_msgtolist['deleted_by'];
					if($deleted_by != "$user_from_id" and $deleted_by != "$user_to_id"){
						$update_time="update messageto set updated_time=NOW() where (message_from='$user_from_id' AND message_to='$user_to_id') OR (message_from='$user_to_id' AND message_to='$user_from_id')";
					}else{
						$update_time="update messageto set deleted_by='none',updated_time=NOW() where (message_from='$user_from_id' AND message_to='$user_to_id') OR (message_from='$user_to_id' AND message_to='$user_from_id')";
					}
					$run_update=mysqli_query($con,$update_time);
				}
				
			
				if($run_msgcnt){
					echo "<script>window.open('messages.php?type=direct&user_id=$user_to_id','_self');</script>";
				}
			}
		}elseif($msg_type=="group"){
			if($user_from_id != $user_to_id and $msg_cnt != null){
				$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$user_from_id','$user_to_id','$msg_cnt','none','none','group','self',NOW())";
				$run_msgcnt=mysqli_query($con,$insert_msg);
				
				$select_grpmembers=mysqli_query($con,"select grp_member from group_members where grp_id='$user_to_id'");
				while($row_mem=mysqli_fetch_array($select_grpmembers)){
					$user=$row_mem['grp_member'];
					$update_time="update messageto set updated_time=NOW() where message_from='$user' AND message_to='$user_to_id' AND msgto_type='group'";
					$run_update=mysqli_query($con,$update_time);
				}
			}
		}
	}
}

//deleting the conversation
if(isset($_POST['delconversation'])){
	global $con;
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$messageto=htmlentities(mysqli_real_escape_string($con,$_POST['messageto']));
	
	$delmsgs1=mysqli_query($con,"update messages set deleted_by='$sessionuser' where (sender_userid='$sessionuser' AND receiver_id='$messageto') AND deleted_by='none'");
	$delmsgs2=mysqli_query($con,"update messages set deleted_by='$sessionuser' where sender_userid='$messageto' AND receiver_id='$sessionuser' AND deleted_by='none'");
	
	$delmsgs3=mysqli_query($con,"delete from messages where (sender_userid='$sessionuser' AND receiver_id='$messageto') AND deleted_by = '$messageto'");
	$delmsgs4=mysqli_query($con,"delete from messages where sender_userid='$messageto' AND receiver_id='$sessionuser' AND deleted_by = '$messageto'");
	
	$delmsgs5=mysqli_query($con,"update messageto set deleted_by='$sessionuser' where (message_from='$sessionuser' AND message_to='$messageto') AND deleted_by='none'");
	$delmsgs6=mysqli_query($con,"update messageto set deleted_by='$sessionuser' where message_from='$messageto' AND message_to='$sessionuser' AND deleted_by='none'");
	
	$delmsgs7=mysqli_query($con,"delete from messageto where (message_from='$sessionuser' AND message_to='$messageto') AND deleted_by = '$messageto'");
	$delmsgs8=mysqli_query($con,"delete from messageto where message_from='$messageto' AND message_to='$sessionuser' AND deleted_by = '$messageto'");
	
}

//send a pic or video as message
if(isset($_POST['submsgpic'])){
	global $con;
	$user_from_id=htmlentities(mysqli_real_escape_string($con,$_SESSION['uid']));
	$user_to_id=htmlentities(mysqli_real_escape_string($con,$_GET['user_id']));
	$msgtype=htmlentities(mysqli_real_escape_string($con,$_GET['type']));
	$message=htmlentities(mysqli_real_escape_string($con,$_POST['msgwithpic']));
	$uploaded_file=$_FILES['selectimg']['name'];
	$file_tmp =$_FILES['selectimg']['tmp_name'];
	$file_id=rand(10000000,99999999);
	move_uploaded_file($file_tmp,"uploadedFiles/$file_id.$uploaded_file");
	
	if($msgtype=="direct"){
		$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$user_from_id','$user_to_id','$message','$file_id.$uploaded_file','none','direct','self',NOW())";
		$run_msgcnt=mysqli_query($con,$insert_msg);
		
		$check_msgtolist="select * from messageto where (message_from='$user_from_id' AND message_to='$user_to_id') OR (message_from='$user_to_id' AND message_to='$user_from_id')";
		$run_msgtolist=mysqli_query($con,$check_msgtolist);
		$num_msgtolist=mysqli_num_rows($run_msgtolist);
		if($num_msgtolist == 0){
			$insert_msgtolist="insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$user_from_id','$user_to_id','none','direct',NOW())";
			$run_msglist=mysqli_query($con,$insert_msgtolist);
		}else{
			$row_msgtolist=mysqli_fetch_array($run_msgtolist);
			$deleted_by=$row_msgtolist['deleted_by'];
			if($deleted_by != "$user_from_id" and $deleted_by != "$user_to_id"){
				$update_time="update messageto set updated_time=NOW() where (message_from='$user_from_id' AND message_to='$user_to_id') OR (message_from='$user_to_id' AND message_to='$user_from_id')";
			}else{
				$update_time="update messageto set deleted_by='none',updated_time=NOW() where (message_from='$user_from_id' AND message_to='$user_to_id') OR (message_from='$user_to_id' AND message_to='$user_from_id')";
			}
			$run_update=mysqli_query($con,$update_time);
		}
	}elseif($msgtype=="group"){
		$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$user_from_id','$user_to_id','$message','$file_id.$uploaded_file','none','group','self',NOW())";
		$run_msgcnt=mysqli_query($con,$insert_msg);
		
		$check_msgtolist="select * from messageto where (message_from='$user_from_id' AND message_to='$user_to_id')";
		$run_msgtolist=mysqli_query($con,$check_msgtolist);
		$num_msgtolist=mysqli_num_rows($run_msgtolist);
		if($num_msgtolist == 0){
			$select_grpmembers=mysqli_query($con,"select grp_member from group_members where grp_id='$user_to_id'");
			while($row_mem=mysqli_fetch_array($select_grpmembers)){
				$user=$row_mem['grp_member'];
				$insert_msgtolist="insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$user_from_id','$user','none','group',NOW())";
				$run_msglist=mysqli_query($con,$insert_msgtolist);
			}
		}else{
			$select_grpmembers=mysqli_query($con,"select grp_member from group_members where grp_id='$user_to_id'");
			while($row_mem=mysqli_fetch_array($select_grpmembers)){
				$user=$row_mem['grp_member'];
				
				$check_msgto=mysqli_query($con,"select * from messageto where message_from='$user' AND message_to='$user_to_id' AND msgto_type='group'");
				$num_mem=mysqli_num_rows($check_msgto);
				if($num_mem==0){
					$insert_msgtolist="insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$user_from_id','$user','none','group',NOW())";
					$run_msglist=mysqli_query($con,$insert_msgtolist);
				}else{
					$update_time="update messageto set updated_time=NOW() where message_from='$user' AND message_to='$user_to_id' AND msgto_type='group'";
					$run_update=mysqli_query($con,$update_time);
				}
			}
		}
	}
	
}

//code for creating a group
if(isset($_POST['creategrpbtn'])){
	global $con;
	$sessionuser=$_SESSION['uid'];
	$grpname=htmlentities(mysqli_real_escape_string($con,$_POST['grpname']));
	$grpid=rand(100000000000000,999999999999999);
	$create_grp=mysqli_query($con,"insert into groups(grp_id,grp_name,created_by,group_pic,created_date) values('$grpid','$grpname','$sessionuser','images/prfpics/grppic.jpg',NOW())");
	if($create_grp){
		$insert_grpmem=mysqli_query($con,"insert into group_members(grp_id,grp_member,admin,added_by,joined_date) values('$grpid','$sessionuser','Yes','$sessionuser',NOW())");
		$insert_intomsgto=mysqli_query($con,"insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$sessionuser','$grpid','none','group',NOW())");
		foreach($_POST['grpmember'] as $userid){
			$insert_grpmem=mysqli_query($con,"insert into group_members(grp_id,grp_member,admin,added_by,joined_date) values('$grpid','$userid','No','$sessionuser',NOW())");
			$insert_intomsgto=mysqli_query($con,"insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$userid','$grpid','none','group',NOW())");
		}
	}
}

//changing group pic
if(isset($_POST['confirmgrppic'])){
	$user_id=$_GET['user_id'];
	$u_image=$_FILES['newprfpic']['name'];
	$image_tmp=$_FILES['newprfpic']['tmp_name'];
	if($u_image==''){
		echo"<script>alert('Please choose a image.');</script>";
		echo "<script>window.open('messages.php?type=group&user_id=$user_id','_self');</script>";
	}else{
		move_uploaded_file($image_tmp,"images/prfpics/$u_image.$user_id");
		$update="update groups set group_pic='images/prfpics/$u_image.$user_id' where grp_id='$user_id'";
		$run=mysqli_query($con,$update);
		echo "<script>window.open('messages.php?type=group&user_id=$user_id','_self');</script>";
	}
}

//changing group name
if(isset($_POST['chgrpnamebtn'])){
	global $con;
	$grpname=htmlentities(mysqli_real_escape_string($con,$_POST['groupname']));
	$grpid=htmlentities(mysqli_real_escape_string($con,$_GET['user_id']));
	$update_grpname=mysqli_query($con,"update groups set grp_name='$grpname' where grp_id='$grpid'");
	if($update_grpname){
		echo "<script>window.open('messages.php?type=group&user_id=$grpid','_self');</script>";
	}
}

//code for adding a group member
if(isset($_POST['addmemtogrp'])){
	global $con;
	$sessionuser=$_SESSION['uid'];
	$grpid=htmlentities(mysqli_real_escape_string($con,$_GET['user_id']));
	
	foreach($_POST['grpmember'] as $userid){
		$insert_grpmem=mysqli_query($con,"insert into group_members(grp_id,grp_member,admin,added_by,joined_date) values('$grpid','$userid','No','$sessionuser',NOW())");
		$checkmsgto=mysqli_query($con,"select * from messageto where message_from='$userid' AND message_to='$grpid' AND msgto_type='group'");
		$num_msgto=mysqli_num_rows($checkmsgto);
		if($num_msgto == 0){
			$insert_intomsgto=mysqli_query($con,"insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$userid','$grpid','none','group',NOW())");
			$updatetime=mysqli_query($con,"update messageto set updated_time=NOW() where message_from='$sessionuser' AND message_to='$grpid' AND msgto_type='group'");
		}else{
			$updatetime1=mysqli_query($con,"update messageto set updated_time=NOW() where message_from='$userid' AND message_to='$grpid' AND msgto_type='group'");
			$updatetime2=mysqli_query($con,"update messageto set updated_time=NOW() where message_from='$sessionuser' AND message_to='$grpid' AND msgto_type='group'");
		}
	}
}

?>