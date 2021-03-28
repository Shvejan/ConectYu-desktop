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
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css" media="screen"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">	<!-- Logo -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet"> <!-- h2 -->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet"><!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
</head>
<?php
	global $con;
	$user_id=$_GET['user_id'];
	$sel_user="select * from users where user_id='$user_id'";
	$r_user=mysqli_query($con,$sel_user);
	$ro_user=mysqli_fetch_array($r_user);
	$prf_pic=$ro_user['profile_pic'];
	$username=$ro_user['user_name'];
	$user_email=$ro_user['user_email'];
	$tagline=$ro_user['user_tagline'];
	$cover_pic=$ro_user['cover_pic'];
	$user_gender=$ro_user['user_gender'];
	$user_designation=$ro_user['user_designation'];
	$account_privacy=$ro_user['account_type'];
		if($user_designation=="student"){
			$select_desg="select * from students where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$user_desg="Student";
			$org_name=$row_desg['college_name'];
			$org_add=$row_desg['clg_add'];
		}elseif($user_designation=="org"){
			$select_desg="select * from organizations where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$user_desg=$row_desg['org_name'];
			$org_add=$row_desg['org_add'];
		}elseif($user_designation=="indv"){
			$select_desg="select * from individuals where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$user_desg=$row_desg['designation'];
			$org_name=$row_desg['company_name'];
			$org_add=$row_desg['company_add'];
		}
		
		$uid=$_SESSION['uid'];
		$check_blocked=mysqli_query($con,"select * from blocked_users where blocked_by='$uid' AND blocked_user='$user_id'");
		$num_blockeduser=mysqli_num_rows($check_blocked);
?>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
#bluetick{
	margin-top:-8px;
}
#prfpic,#bprfpic{
	width:130px;
	height:130px;
	border:solid 1px black;
	border-radius:75px;
	margin-top:-100px;
}
#peoplinks li a{
	float:left;
}
#peoplinks li{
	list-style-type:none;
}
#following a,#bfollowing a,#nafollowing a{
	font-family:bold;
	font-size:1.4em;
	font-weight:1.5px;
	list-style-type:none;
	color:black;
	text-align:center;
}
#following a:hover,#followers a:hover,#connections a:hover,#bfollowing a:hover,#bfollowers a:hover,#bconnections a:hover,#nafollowing a:hover,#nafollowers a:hover,#naconnections a:hover{
	text-decoration:none;
	cursor:pointer;
	color:black;
}
#followersnum{
	font-size:1.5em;
	margin-left:-5px;
}
#followingnum{
	font-size:1.5em;
	margin-left:-12%;
}
#connectorsnum{
	font-size:1.5em;
	margin-left:-10%;
}
#followers a,#bfollowers a,#nafollowers a{
	font-family:bold;
	font-size:1.4em;
	list-style-type:none;
	color:black;
}
#connections a,#bconnections a,#naconnections a{
	font-family:bold;
	font-size:1.4em;
	list-style-type:none;
	color:black;
}
#username{
	font-size:2em;
	color:#34baeb;
	margin-top:5px;
	margin-left:50px;
	font-family:bold;
}
#tagline{
	margin-left:10%;
	font-size:1em;
	font-family: 'Merienda One', cursive;
}
#editprof{
	width:150px;
	margin-top:50px;
}
#followbtn,#unblockbtn{
	width:150px;
	font-size:1.1em;
	margin-top:50px;
}
#followingbtn{
	width:150px;
	font-size:1.1em;
	margin-top:50px;
}
#requestedbtn{
	width:150px;
	font-size:1.1em;
	margin-top:50px;
}
#designation{
	margin-left:10%;
	font-size:1.2em;
	color:#9e9d9b;
}
#coverpic{
	width:100%;
	height:200px; 
	padding:0px;
	margin:0px;
}
#profbtns{
	margin-top:-19px;
}
/*#prolinks{
	margin-top:-19px;
	border:solid #e6e6e6 1px;
	margin-left:14px;
	margin-right:1px;
	color:#e6e6e6;
}
#proflinks ul{
	list-style-type:none;
	margin-top:-19px;
}
#proflinks li a{
	color:black;
	float:left;
	border:solid #e6e6e6 1px;
	width:218px;
	margin-left:px;
	text-align:center;
	font-size:1.2em;
	padding-top:5px;
	padding-bottom:5px;
	display:block;
	
}
#proflinks li a:hover{
	text-decoration:none;
}*/

#connectbtn{
	width:150px;
	margin-top:25px;
}
#connectedbtn,#cnctrequestedbtn{
	width:150px;
	margin-top:25px;
}
#postarea{
	width:100%;
	height:70px;
	border-radius:;
	padding:10px;
}
#panel_heading{
	height:30px;
}
label{
	padding:7px;
	display:table;
	color:black;
	width:150px;
	border-radius:30px;
}
input[type="file"]{
	display:none;
}
#camerapic{
	width:30px;
	height:25px;
}
#post_btn{
	width:60%;
	align:center;
	margin-left:100px;
}
#prfmorebtn{
	position:absolute;
	z-index:1;
	right:45px;
	top:25px;
	color:white;
	font-size:1.5em;
	cursor:pointer;
	padding:10px;
}
#moredropdown{
	z-index:1;
	right:70px;
	top:40px;
	width:15%;
	margin-left:75%;
}
</style>
<style>
#prf_pic1{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
}
#pageprf_pic1{
	width:40px;
	height:40px;
	border:#e6e6e6 solid 2px;
	border-radius:20px;
}
#post_labelname{
	font-size:1.6em;
	color:black;
	margin-top:10px;
	text-decoration:none;
}
#post_labelname:hover{
	text-decoration:none;
}
#post_img{
	position:absolute;
	width:95%;
	height:480px;
	align:center;
}
#post_body{
	height:500px;
}

/* Styling code for showing users on modals */

#modalprfpic{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
	float:left;
}
#modalusername{
	margin-right:250px;
	font-size:1.6em;
	color:black;
	margin-top:10px;
	text-decoration:none;
}
.modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	

	<!-- Code after the nav bar -->
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-7">
			<div class='panel panel-default' id='paneltab'>
				<div class='panel-heading'>
					<?php 
						$userid=$_GET['user_id'];
						if($userid!=$_SESSION['uid']){
						 ?>
						<i class="fa fa-ellipsis-v dropdown-toggle" aria-hidden="true" id="prfmorebtn" data-toggle="dropdown"></i>
						<ul class="dropdown-menu" id="moredropdown"> 
							<li><a href="#">Report user...</a></li>  
						<?php if($num_blockeduser==0){ ?>
							<li><a href="messages.php?type=direct&user_id=<?php echo $_GET['user_id']; ?>">Message</a></li>  
							<li><a id="shareprofile" style="cursor:pointer;" userid="<?php echo $_GET['user_id']; ?>">Share profile</a></li>  
							<li><a id="blockuser" style="cursor:pointer;">Block user</a></li>  
						<?php }elseif($num_blockeduser!=0){ ?>
							<li><a id="unblockuser" style="cursor:pointer;">Unblock user</a></li>  
						<?php } ?>
							<li><a id="copyprfurl" style="cursor:pointer;">Copy URL</a></li>  
						</ul> 
						
						<script type="text/javascript">
							//blocking the user
							$('#blockuser').click(function(){
								//open blocking modal
								$('#blockUserModal').modal({
								show: true
								});
							});
							//unblocking the user
							$('#unblockuser').click(function(){
								//open unblocking modal
								$('#unblockUserModal').modal({
									show: true
								});
							});
							//copying profile url
							$('#copyprfurl').click(function(){
								var dummy = document.createElement('input'),
								text = window.location.href;
								
								document.body.appendChild(dummy);
								dummy.value = text;
								dummy.select();
								document.execCommand('copy');
								document.body.removeChild(dummy);
								
								$('#copiedinfomodal').modal({
									show: true
								}); 
								setTimeout(function(){ 
									var userid=<?php echo json_encode($_GET['user_id']); ?>;
									window.open('profile.php?user_id='+userid,'_self');
								 }, 1000);
							});
							
							//Sharing profile as message
							$("#shareprofile").click(function(){
								var userid=$(this).attr("userid");
								document.getElementById("fwrduserid").value=userid;
								document.getElementById("fwrdusertype").value="user";
								$('#shareProfAsMsg').modal({
									show: true
								});
								$.ajax({
									url:'functions/functions.php',
									data:'showusrstoshrprf=1',
									type:'post',
									async:false,
									success:function(res){
										$(".showuserstoshareprf").html(res);
									}
								});
								return false;
							});
							
						</script>
						<!-- showing copied info  -->
								<div class="modal fade" id="copiedinfomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  data-backdrop="false">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<p style="text-align:center;font-family:'Merienda One',cursive;">The Url has been copied!</p>
											</div>
										</div>
									</div>
								</div>
						
						<!--  Sharing Profile As Message MOdal -->
							<div class="modal fade" id="shareProfAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
						
						<!-- Blocking The User Modal -->
								<div class="modal fade" id="blockUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<br><br>
												<span style="font-size:5em;margin-left:35%;border:2px solid black;padding:30px;border-radius:130px;"><i class="fa fa-user-times" aria-hidden="true"></i></span><br><br>
												<p style="padding:35px;font-family:'Merienda One',cursive;">By blocking this user, they won`t be able to see your profile, posts, comments and can`t find you even by search.<br>You can unblock him from blocked settings and even from his profile too. ConectYu don`t let them know that you blocked them.</p>
											</div>
											<div class="modal-footer">
												<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
												<input class="btn btn-info" type="button" id="confirmblock" style="width:150px;" value="Confirm" />
											</div>
										</div>
									</div>
								</div>
								
								<!-- Unblocking The User Modal -->
								<div class="modal fade" id="unblockUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<br><br>
												<span style="font-size:5em;margin-left:40%;border:2px solid black;padding:30px;border-radius:130px;"><i class="fa fa-user-plus" aria-hidden="true"></i></span><br><br><br>
												<p style="padding:35px;font-family:'Merienda One',cursive;">By unblocking this user, they will be able to see your profile, posts, comments and can find you even by search.</p>
											</div>
											<div class="modal-footer">
												<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
												<input class="btn btn-info" type="button" id="confirmunblock" style="width:150px;" value="Confirm" />
											</div>
										</div>
									</div>
								</div>
								
								<script type="text/javascript">
									//cofirming unblocking the user
									$('#confirmblock').click(function(){
										var uid=<?php echo json_encode($_SESSION['uid']); ?>;
										var user_id=<?php echo json_encode($_GET['user_id']); ?>;
										$.ajax({
											url:'functions/functions.php',
											data:'blockuser=1'+'&user_id='+user_id+'&uid='+uid,
											type:'post',
											success:function(rest){
												window.open('profile.php?user_id='+user_id,'_self');
											}
										});
									});
									
									//cofirming unblocking the user
									$('#confirmunblock').click(function(){
										var uid=<?php echo json_encode($_SESSION['uid']); ?>;
										var user_id=<?php echo json_encode($_GET['user_id']); ?>;
										$.ajax({
											url:'functions/functions.php',
											data:'unblockuser=1'+'&user_id='+user_id+'&uid='+uid,
											type:'post',
											success:function(rest){
												window.open('profile.php?user_id='+user_id,'_self');
											}
										});
									});
								</script>
					<?php } ?>
					<img id="coverpic" src="<?php echo $cover_pic; ?>" class="img img-responsive img-fluid" />
				</div>
				<div class='panel-body'>
					<div class='row'>
						<div class='col-sm-9'>
							<div class="row">
							<?php
								$uid=$_GET['user_id'];
								$check_verified=mysqli_query($con,"select * from account_verifications where user_id='$uid'");
								$row_sts=mysqli_fetch_array($check_verified);
								$status=$row_sts['status'];
								$category=$row_sts['category'];
							?>
								<p id="username"><b style="display:inline"><?php echo $username; ?><?php if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="20px" height="20px" ></span> <?php } ?></b>
								<span style="color:#969493;margin-left:5px;margin-top:-15px;font-size:0.6em;display:inline"><i><?php echo "@$user_id"; ?></i></span></p>
								<?php if($status=="Verified"){ echo "<p style='margin-left:10%;font-family:Merienda One, cursive;margin-top:-10px;color:#969493;font-size:1.1em;'>$category</p>"; } ?>
							</div>
							<div style="margin-top:5px;" class="row">
								<?php
									$uid=$_GET['user_id'];
									$select_followers="select * from following where followed_user='$uid' AND status='accepted'";
									$run_followers=mysqli_query($con,$select_followers);
									$num_followers=mysqli_num_rows($run_followers);
									
									$select_following="select * from following where following_user='$uid' AND status='accepted' AND user_type='user'";
									$run_following=mysqli_query($con,$select_following);
									$num_followings=mysqli_num_rows($run_following);
									
									$select_connectors="select * from connections where (connect_by='$uid' OR connect_with='$uid') AND status='accepted'";
									$run_connectors=mysqli_query($con,$select_connectors);
									$num_connectors=mysqli_num_rows($run_connectors);
									
									$sessionuid=$_SESSION['uid'];
									$check_accepted=mysqli_query($con,"select status from following where following_user='$sessionuid' AND followed_user='$uid' AND status='accepted'");
									$num_acceptance=mysqli_num_rows($check_accepted);
									
									$check_cnctaccepted=mysqli_query($con,"select status from connections where ((connect_by='$sessionuid' AND connect_with='$uid') OR (connect_by='$uid' AND connect_with='$sessionuid')) AND status='accepted'");
									$num_cnctaccept=mysqli_num_rows($check_cnctaccepted);
									
								?>
								<ul id="peoplinks">
								<?php if($num_blockeduser==0){ 
									if($num_acceptance!=0 or $num_cnctaccept!=0 or $_GET['user_id'] == $_SESSION['uid']){
								?>
									<div class="row" style="margin-left:2%;">
										<div class="col-sm-3">
											<li id="followers"><a>followers</a></li>
										</div>
										<div class="col-sm-3">
											<li id="following"><a>following</a></li>
										</div>
										<div class="col-sm-3">
											<li id="connections"><a>connections</a></li>
										</div>
										<div class="col-sm-3"></div>
									</div>
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-3">
											<span id="followersnum"><?php echo $num_followers; ?></span>
										</div>
										<div class="col-sm-3">
											<span id="followingnum"><?php echo $num_followings; ?></span>
										</div>
										<div class="col-sm-3">
											<span id="connectorsnum"><?php echo $num_connectors; ?></span>
										</div>
										<div class="col-sm-2"></div>
									</div>
									<?php }else{?>
										<div class="row" style="margin-left:2%;">
										<div class="col-sm-3">
											<li id="nafollowers"><a>followers</a></li>
										</div>
										<div class="col-sm-3">
											<li id="nafollowing"><a>following</a></li>
										</div>
										<div class="col-sm-3">
											<li id="naconnections"><a>connections</a></li>
										</div>
										<div class="col-sm-3"></div>
									</div>
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-3">
											<span id="followersnum"><?php echo $num_followers; ?></span>
										</div>
										<div class="col-sm-3">
											<span id="followingnum"><?php echo $num_followings; ?></span>
										</div>
										<div class="col-sm-3">
											<span id="connectorsnum"><?php echo $num_connectors; ?></span>
										</div>
										<div class="col-sm-2"></div>
									</div>
									<?php }
									}elseif($num_blockeduser!=0){ ?>
									<div class="row" style="margin-left:2%;">
										<div class="col-sm-3">
											<li id="bfollowers"><a>followers</a></li>
										</div>
										<div class="col-sm-3">
											<li id="bfollowing"><a>following</a></li>
										</div>
										<div class="col-sm-3">
											<li id="bconnections"><a>connections</a></li>
										</div>
										<div class="col-sm-3"></div>
									</div>
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-3">
											<span id="followersnum">0</span>
										</div>
										<div class="col-sm-3">
											<span id="followingnum">0</span>
										</div>
										<div class="col-sm-3">
											<span id="connectorsnum">0</span>
										</div>
										<div class="col-sm-2"></div>
									</div>
								<?php } ?>
								</ul>
								<script type="text/javascript">
									$('#followers').click(function(){
										//open followers modal
										$('#showFollowersModal').modal({
											show: true
										});
										
										var user_id=<?php echo json_encode($_GET['user_id']); ?>;
										var uid=<?php echo json_encode($_SESSION['uid']); ?>;
										$.ajax({
											url:'functions/functions.php',
											data:'showfollowers=1'+'&user_id='+user_id+'&uid='+uid,
											type:'post',
											success:function(rest){
												//alert(rest);
												$('.showfollowers').html(rest);
											}
										});
									});
										$('#following').click(function(){
										//open following modal
										$('#showFollowingModal').modal({
											show: true
										});
										
										var user_id=<?php echo json_encode($_GET['user_id']); ?>;
										var uid=<?php echo json_encode($_SESSION['uid']); ?>;
										$.ajax({
											url:'functions/functions.php',
											data:'showfollowing=1'+'&user_id='+user_id+'&uid='+uid,
											type:'post',
											success:function(rest){
												//alert(rest);
												$('.showfollowing').html(rest);
											}
										});
									});
										$('#connections').click(function(){
										//open connections modal
											$('#showConnectorsModal').modal({
											show: true
										});
										
										var user_id=<?php echo json_encode($_GET['user_id']); ?>;
										var uid=<?php echo json_encode($_SESSION['uid']); ?>;
										$.ajax({
											url:'functions/functions.php',
											data:'showconnections=1'+'&user_id='+user_id+'&uid='+uid,
											type:'post',
											success:function(rest){
												//alert(rest);
												$('.showconnections').html(rest);
											}
										});
									});
								</script>
								
								<!-- SHOWING FOLLOWERS MODAL -->
								<div class="modal fade" id="showFollowersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<div class="panel-title"><p><strong>followers</strong></p></div>	
											</div>
											<div class="modal-body">
												<div class="panel panel-deafult">
													<div class="panel-body showfollowers"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- SHOWING FOLLOWING MODAL -->
								<div class="modal fade" id="showFollowingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<div class="panel-title"><p><strong>following</strong></p></div>	
											</div>
											<div class="modal-body">
												<div class="panel panel-deafult">
													<div class="panel-body showfollowing"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<!-- SHOWING CONNECTIONS MODAL -->
								<div class="modal fade" id="showConnectorsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<div class="panel-title"><p><strong>connections</strong></p></div>	
											</div>
											<div class="modal-body">
												<div class="panel panel-deafult">
													<div class="panel-body showconnections">
														
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
							</div>
							<?php if($num_blockeduser==0){ ?>
							<div class="row">
								<p id="tagline"><?php echo $tagline; ?></p>
							</div>
							<div class="row">
								<p id="designation"><?php
											if($user_designation=="student" or $user_designation=="indv" ){echo "$user_desg at $org_name, $org_add";}else{
											echo "$user_desg, $org_add";}?></p>
							</div>
							<?php } ?>
						</div>
						<div class="col-sm-3">
					<?php	if($num_blockeduser==0){ ?>
								<img src="<?php echo $prf_pic; ?>" id="prfpic" style="cursor:pointer;" /><br>
					<?php   }else{ 
								if($user_designation=="org"){
									echo '<img src="images/prfpics/orgpic.jpg" id="bprfpic" style="cursor:pointer;" /><br>';
								}else{ 
									if($user_gender=="male"){
										echo '<img src="images/prfpics/maleprfpic.jpg" id="bprfpic" style="cursor:pointer;" /><br>';
									}else{
										echo '<img src="images/prfpics/femaleprfpic.jpg" id="bprfpic" style="cursor:pointer;" /><br>';
									} 
								}
							}
					?>
								<script type="text/javascript">
									$('#prfpic').click(function(){
										//open prfpic modal
										$('#prfpicmodal').modal({
										show: true
										});
									});
								</script>
							<div class="modal fade" id="prfpicmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-20px;font-size:3em;margin-bottom:-15px;"><span aria-hidden="true">&times;</span></button>
										<img class="img-responsive" src="<?php echo $prf_pic; ?>" id="modalprfpic" style="width:100%;height:75%;margin-top:-27px;border:solid 1px black;" />
									</div>
								</div>
							</div>
							
							<button id="editprof" name="editprof" class="btn btn-default btn-md" style="display:none;">Edit profile &nbsp
							<i class="fa fa-outdent" aria-hidden="true"></i></button>
							<script>
								$('#editprof').click(function(){
									window.open('edit_profile.php','_self');
								});
							</script>
							<?php if($num_blockeduser==0){ ?>
							<form action ="" method="post">
								<button id="followbtn" name="followbtn" class="btn btn-info btn-md" style="display:;"><span id="follow">follow</span> &nbsp <i class="fa fa-plus" aria-hidden="true">
								</i></button>
								<button id="followingbtn" name="followingbtn" class="btn btn-default btn-md" style="display:none;"><span id="follow">following</span> &nbsp <i style="color:green;" class="fa fa-check" aria-hidden="true"></i></button>
								<button id="requestedbtn" name="requestedbtn" class="btn btn-default btn-md" style="display:none;"><span id="follow">Requested</span></button>
								<button id="cnctrequestedbtn" name="cnctrequestedbtn" class="btn btn-default btn-md" style="display:none;">connect rqstd</button>
								<button id="connectedbtn" name="connectedbtn" class="btn btn-default btn-md" style="display:none;">connected &nbsp <i style="color:green;" class="fa fa-check" aria-hidden="true"></i></button>
							</form>
								<button id="connectbtn" name="connectbtn" class="btn btn-default btn-md" style="display:none;">connect &nbsp <i class="fa fa-plus" aria-hidden="true"></i></button>
							<?php }elseif($num_blockeduser!=0){ ?>
									<button id="unblockbtn" name="unblockbtn" class="btn btn-info btn-md" style="display:;"><span id="unblock">unblock user</span> &nbsp <i class="fa fa-plus" aria-hidden="true">
									</i></button>
									<script>
										//unblocking the user
										$('#unblockbtn').click(function(){
											//open unblocking modal
											$('#unblockUserModal').modal({
												show: true
											});
										});
									</script>
										
							<?php } 
								$uid=$_SESSION['uid'];
								$user_id=$_GET['user_id'];
								$sel_from_following="select * from following where following_user='$uid' AND followed_user='$user_id'";
								$run_from_following=mysqli_query($con,$sel_from_following);
								$row_following=mysqli_fetch_array($run_from_following);
								$follow_status=$row_following['status'];
								$num_following=mysqli_num_rows($run_from_following);
								
								$select_from_connect="select * from connections where (connect_by='$uid' AND connect_with='$user_id') OR (connect_by='$user_id' AND connect_with='$uid')";
								$run_from_connect=mysqli_query($con,$select_from_connect);
								$num_connect=mysqli_num_rows($run_from_connect);
								$row_connect=mysqli_fetch_array($run_from_connect);
								$cnct_status=$row_connect['status'];
								
								if($user_designation=="org"){
									if($num_connect==0){
										echo '
											<script>
												var show4=document.getElementById("connectbtn");
												show4.setAttribute("style", "display:display;");
												var connectedbtn=document.getElementById("connectedbtn");
												connectedbtn.setAttribute("style", "display:none;");
												var cnctrqstbtn=document.getElementById("cnctrequestedbtn");
												cnctrqstbtn.setAttribute("style", "display:none;");
											</script>
										';	
									}else{
										if($cnct_status=="requested"){
											echo '
												<script>
													var show4=document.getElementById("connectbtn");
													show4.setAttribute("style", "display:none;");
													var connectedbtn=document.getElementById("connectedbtn");
													connectedbtn.setAttribute("style", "display:none;");
													var cnctrqstbtn=document.getElementById("cnctrequestedbtn");
													cnctrqstbtn.setAttribute("style", "display:display;");
												</script>
											';	
										}else{
											echo '
												<script>
													var show4=document.getElementById("connectbtn");
													show4.setAttribute("style", "display:none;");
													var connectedbtn=document.getElementById("connectedbtn");
													connectedbtn.setAttribute("style", "display:display;");
													var cnctrqstbtn=document.getElementById("cnctrequestedbtn");
													cnctrqstbtn.setAttribute("style", "display:none;");
												</script>
											';	

										}
									}
								}else{
									echo '<script>
											var Nshow4=document.getElementById("connectbtn");
											Nshow4.setAttribute("style", "display:none;");
										</script>
									';
								}
								if($u_id == $user_id){
									echo '<script type="text/javascript">
										var show1=document.getElementById("editprof");
										show1.setAttribute("style", "display:display;");
										var Nshow2=document.getElementById("followbtn");
										Nshow2.setAttribute("style", "display:none;");
										var Nshow3=document.getElementById("connectbtn");
										Nshow3.setAttribute("style", "display:none;");
									</script>';
								}else{ 
									echo '<script>
										var Nshow1=document.getElementById("editprof");
										Nshow1.setAttribute("style","display:none;");
										</script>
									';
									if($num_following==0){
										echo '
											<script>
												var show2=document.getElementById("followbtn");
												show2.setAttribute("style","display:display;");
												var following=document.getElementById("followingbtn");
												following.setAttribute("style","display:none;");
												var requested=document.getElementById("requestedbtn");
												requested.setAttribute("style","display:none;");
											</script>
										';	
									}elseif($num_following!=0 and $follow_status=="accepted"){
										echo '
											<script>
												var show2=document.getElementById("followbtn");
												show2.setAttribute("style","display:none;");
												var following=document.getElementById("followingbtn");
												following.setAttribute("style","display:display;");
												var requested=document.getElementById("requestedbtn");
												requested.setAttribute("style","display:none;");
											</script>
										';	
									}elseif($num_following!=0 and $follow_status=="requested"){
										echo '
											<script>
												var show2=document.getElementById("followbtn");
												show2.setAttribute("style","display:none;");
												var following=document.getElementById("followingbtn");
												following.setAttribute("style","display:none;");
												var requested=document.getElementById("requestedbtn");
												requested.setAttribute("style","display:display;");
											</script>
										';	
									}
								} 
							?>
						</div>
					</div>
					<script type="text/javascript">
						//showing connect to modal
						$("#connectbtn").click(function(){
							$('#showconnectidmodal').modal({
								show: true
							});
						});
					</script>
					<!-- SHOWING Connect to id  MODAL -->
					<div class="modal fade" id="showconnectidmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<div class="panel-title"><p><strong>ID to connect</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<label>ID Proof :</label>
										<input type="text" class="form-control" name="idtoconnect" placeholder=" Your ID number in the org" required />
										<label>Decription :</label>
										<textarea type="text" class="form-control" rows="2" name="connecttocnt" placeholder="Describe yourself which concerns the org to accept you..." style="resize:none;" required ></textarea><br>
										<span style="color:red;font-size:0.9em;">*Your Id is something which represents you in the org.</span>
										<hr>
										<input type="submit" class="btn btn-info" name="subconnectid" id="subconnectid" style="width:130px;float:right;"/>
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose' style="float:right;margin-right:2%;">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="panel-footer" style="background-color:white;">
					<form method="post" action="">
						<div class="row">
				<?php
				if($num_blockeduser==0){ 
						$uid=$_SESSION['uid'];
						$userid=$_GET['user_id'];
						$check_following=mysqli_query($con,"select * from following where following_user='$uid' AND followed_user='$userid' AND status='accepted'");
						$numuser=mysqli_num_rows($check_following);
						
						$check_cnctaccept=mysqli_query($con,"select * from connections where ((connect_by='$uid' AND connect_with='$userid') OR (connect_by='$userid' AND connect_with='$uid')) AND status='accepted'");
						$num_cnctacceptd=mysqli_num_rows($check_cnctaccept);
						
						//$checkaccprivacy=mysqli_query($con,"select account_type from users where user_id");
						
						if(($numuser != 0) OR ($uid==$user_id) OR ($num_cnctacceptd != 0) OR ($account_privacy=="public")){
							if($uid == $userid){
							?>
							<div class="col-sm-2">
								<button class="btn btn-default" name="abt" id="abt" style="width:100%;" >About</button>
							</div>
							<div class="col-sm-3">
								<button class="btn btn-default" name="posts" id="posts" style="width:100%;" onclick="postsfun()">Posts</button>
							</div>
							<div class="col-sm-2">
								<button class="btn btn-default" name="achives" style="width:100%;" id="achives">Achievements</button>
							</div>
							<div class="col-sm-3">
							<?php if($user_designation!="org"){ ?>
									<button class="btn btn-default" name="skills" style="width:100%;" id="skills">Skills</button>
							<?php }else{ ?>
									<button class="btn btn-default" name="events" style="width:100%;" id="events">Events</button>
							<?php } ?>
							</div>
							<div class="col-sm-2">
								<button class="btn btn-default" name="saved" style="width:100%;" id="saved" style="display:none;">Saved</button>
							</div>
							<?php
							}else{
							?>
							<div class="col-sm-3">
								<button class="btn btn-default" name="abt" id="abt" style="width:100%;" >About</button>
							</div>
							<div class="col-sm-3">
								<button class="btn btn-default" name="posts" id="posts" style="width:100%;" onclick="postsfun()">Posts</button>
							</div>
							<div class="col-sm-3">
								<button class="btn btn-default" name="achives" style="width:100%;" id="achives">Achievements</button>
							</div>
							<div class="col-sm-3">
							<?php if($user_designation!="org"){ ?>
									<button class="btn btn-default" name="skills" style="width:100%;" id="skills">Skills</button>
							<?php }else{ ?>
									<button class="btn btn-default" name="events" style="width:100%;" id="events" >Events</button>
							<?php } ?>
							</div>
							<?php
							}
						?>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12"><!-- About -->
					<?php
						if(isset($_POST['abt'])){
							$abt = new AboutOnProfile();
							$abt->showAbt();
						}elseif(isset($_POST['posts'])){
						}elseif(isset($_POST['achives'])){
							$achivesObj = new Achivements();
							$achivesObj->showAboutAchieves();
							if($_SESSION['uid']==$user_id){
								$achivesObj->insertAchieves();
							}
						}elseif(isset($_POST['skills'])){
							$skillsObj = new Skills();
							$skillsObj->showAboutSkills();
							/*if($_SESSION['uid']==$user_id){
								$skillsObj->insertSkills();
							}*/
						}elseif(isset($_POST['saved'])){
						}elseif(isset($_POST['events'])){
							$eventsObj = new Events();
							$eventsObj->showEvents();
						}else{
							$abt = new AboutOnProfile();
							$abt->showAbt();
						}
						
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<?php  
					if(isset($_POST['posts'])){
						echo "<script>$('#posts').css({'background-color':'#e6e6e6'});</script>";
						//$home_updates = new HomeUpdates();
						//$home_updates->displayUpdates();
					?>
							<div class='row ownposts'></div>
					<?php	
					}elseif(isset($_POST['achives'])){
						echo "<script>$('#achives').css({'background-color':'#e6e6e6'});</script>";
					}elseif(isset($_POST['skills'])){
						echo "<script>$('#skills').css({'background-color':'#e6e6e6'});</script>";
					}elseif(isset($_POST['abt'])){
						echo "<script>$('#abt').css({'background-color':'#e6e6e6'});</script>";
					}elseif(isset($_POST['saved'])){
						echo "<script>$('#saved').css({'background-color':'#e6e6e6'});</script>";
						//$savedPsts = new SavedPosts();
						//$savedPsts->showSavedPosts();
					?>
						<div class='row savedposts'></div>
					<?php
					}elseif(isset($_POST['events'])){
						echo "<script>$('#events').css({'background-color':'#e6e6e6'});</script>";
					}else{
						echo "<script>$('#abt').css({'background-color':'#e6e6e6'});</script>";
					}
					?>
				</div>
				<div class="col-sm-2">
				</div>
			</div>
		<?php 
			}else{
		?>
			</div>
				<div class="row">
					<div class="col-sm-12"><!-- About -->
						<?php
							$abtuser = new UserProfileDetails();
							$abtuser->showUserDetails();
						?>
					</div>
				</div>
		<?php
			}
		}elseif($num_blockeduser != 0){ ?>
			<div class="row">
				<br><br><br>
				<span style="font-size:5em;margin-left:40%;border:2px solid #a7a7a8;padding:30px;border-radius:130px;color:#a7a7a8;"><i class="fa fa-user-plus" aria-hidden="true"></i></span><br><br><br>
				<p style="text-align:center;padding:20px;color:#a7a7a8;font-size:1.1em;">By unblocking the user, they will be able to see your profile, posts,comments and can find you even by search.<br>You can unblock this user from the profile.</p>
			</div>
		<?php } ?>
		</div>
		<div class="col-sm-2">
		</div>
	</div>
	
</body>
<html>
<script>
	$(document).ready(function(){
		fun();
		savedposts();
		setInterval(function(){
			fun();
			savedposts();
		},50000);
	});
	function fun(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		var userid=<?php echo json_encode($_GET['user_id']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'ownposts=1'+'&user_id='+user_id+'&userid='+userid,
			type:'post',
			success:function(res){
				$('.ownposts').html(res);
			}
		});
	}
	function savedposts(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'savedpost=1'+'&user_id='+user_id,
			type:'post',
			success:function(rest){
				//alert(rest);
				$('.savedposts').html(rest);
			}
		});
	}
	
	//showing followers
	function showFollowers(){
		var user_id=<?php echo json_encode($_GET['user_id']); ?>;
		var uid=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'showfollowers=1'+'&user_id='+user_id+'&uid='+uid,
			type:'post',
			success:function(rest){
				//alert(rest);
				$('.showfollowers').html(rest);
			}
		});
	}
	
	//showing following
	function showFollowing(){
		var user_id=<?php echo json_encode($_GET['user_id']); ?>;
		var uid=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'showfollowing=1'+'&user_id='+user_id+'&uid='+uid,
			type:'post',
			success:function(rest){
				//alert(rest);
				$('.showfollowing').html(rest);
			}
		});
	}
	
	//showing connections
	function showConnections(){
		var user_id=<?php echo json_encode($_GET['user_id']); ?>;
		var uid=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'showconnections=1'+'&user_id='+user_id+'&uid='+uid,
			type:'post',
			success:function(rest){
				//alert(rest);
				$('.showconnections').html(rest);
			}
		});
	}
	
</script>