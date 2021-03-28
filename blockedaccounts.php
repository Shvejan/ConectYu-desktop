<?php
session_start();
include("includes/connection.php");
include("header.php");
?>
<?php
	$u_id=$_SESSION['uid'];
	$select_user="select * from users where user_id='$u_id'";
	$run_user=mysqli_query($con,$select_user);
	$row_user=mysqli_fetch_array($run_user);
	$prfpic=$row_user['profile_pic'];
	$user_name=$row_user['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu - Blocked accounts</title>
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
#post_img{
	position:absolute;
	align:center;
}
#bluetick{
	margin-top:-8px;
}
#bprfpic{
	width:60px;
	height:60px;
	border:#757573 solid 1px;
	border-radius:30px;
	float:left;
	margin-left:2%;
}
#busername{
	font-size:1.6em;
	color:black;
	margin-top:10px;
	float:left;
	margin-left:3%;
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
	font-size:1.4em;
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
</style>
<?php
	//get blocked users data
	global $con;
	$suid=$_SESSION['uid'];
	$select_blocked=mysqli_query($con,"select * from blocked_users where blocked_by='$suid'");
	$num_blocked=mysqli_num_rows($select_blocked);
?>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5" style="background-color:white;margin-top:100px;">
			<div class="row" id="blockedacc">
				<div class="col-sm-12">
					<span><a id="unblockallaccs" class="btn btn-default" style="float:right;margin-top:2.5%;margin-right:3%;">unblock all</a></span>
					<a href="privacysettings.php" style="font-size:2.5em;color:black;float:left;margin-top:2%;" id="returnlink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<h3 style="font-family: 'Merienda One', cursive;margin-left:10%;">Blocked Accounts </h3>
					<hr>
					<?php
						if($num_blocked != 0){
							while($row_blocked=mysqli_fetch_array($select_blocked)){
								$blocked_user=$row_blocked['blocked_user'];
								$select_user=mysqli_query($con,"select * from users where user_id='$blocked_user'");
								$row_user=mysqli_fetch_array($select_user);
								$userid=$row_user['user_id'];
								$prfpic=$row_user['profile_pic'];
								$username=$row_user['user_name'];
								if(str_word_count($username)>2){
									$username=explode(" ",$username,3);
									$username=$username[0]." ".$username[1];
								}
							?>
								<div class="panel panel-default">
									<div class="panel-body">
										<a href="profile.php?user_id=<?php echo $userid; ?>">
											<div class='row'>
												<img src="<?php echo $prfpic; ?>" id="bprfpic" style="float:left;" />
												<p id="busername"><?php echo $username; ?></p>
											</div>
										</a>
										<button id="unblockbtn" blocked_id="<?php echo $userid; ?>" name='followbtn' class='btn btn-info btn-md unblockbtn' style='display:;float:right;margin-top:-7%;right:7%;position:absolute;width:105px;'><span id='unblock'>unblock</span> &nbsp <i class='fa fa-plus' aria-hidden='true'></i></button>
									</div>
								</div>
							<?php
							}
						}else{
							?>
							<div>
								<p style="margin-left:35%;margin-top:50px;font-family:bold;font-size:1.5em;color:#9e9d9b;">No blocked accounts!</p>
							</div>
						<?php
						}
					?>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default" style="position:fixed;width:20%;height:60%;overflow-y:auto;margin-top:100px;">
				<div class="panel-body">
					<div style="position:fixed;z-index:1;background-color:white;padding:15px;width:19.9%;margin-left:-1%;margin-top:-1%;border-bottom:1px solid #e6e6e6"><h4 style="margin-top:0px;margin-bottom:0px;font-family:'Merienda One',cursive;">People you may know</h4></div><br>
					<?php
						global $con;
						$sessionuser=$_SESSION['uid'];
						$select_userdata=mysqli_query($con,"select * from users where user_id='$sessionuser'");
						$row_userdata=mysqli_fetch_array($select_userdata);
						$city=$row_userdata['user_city'];
						$pincode=$row_userdata['user_pincode'];
						$user_designation=$row_userdata['user_designation'];
						$suggestedusers=array();
						$select_users=mysqli_query($con,"select * from users where ((user_pincode='$pincode' AND user_city like '%$city') OR (user_pincode='$pincode' AND user_city like '%$city%') OR (user_pincode='$pincode' AND user_city like '$city%')  OR user_pincode='$pincode') AND (user_id != '$sessionuser') AND (user_id not in (select followed_user from following where following_user='$sessionuser')) AND (user_id not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY reg_date LIMIT 10");
						$num_citypinusers=mysqli_num_rows($select_users);
						if($num_citypinusers != 0){
							while($row_citypinusers=mysqli_fetch_array($select_users)){
									array_push($suggestedusers,$row_citypinusers['user_id']);
							}
						}
						
						$select_fuser=mysqli_query($con,"select followed_user from following where following_user='$sessionuser' AND user_type='user' LIMIT 15");
						while($row_fuser=mysqli_fetch_array($select_fuser)){
							$fuser=$row_fuser['followed_user'];
							$select_mutual=mysqli_query($con,"select following_user from following where (followed_user='$fuser') AND (following_user not in (select followed_user from following where following_user='$sessionuser')) AND (following_user!='$sessionuser') AND (following_user not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY date");
							$num_mutuals=mysqli_num_rows($select_mutual);
							if($num_mutuals != 0){
								while($row_mutual=mysqli_fetch_array($select_mutual)){
									array_push($suggestedusers,$row_mutual['following_user']);
								}
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
											<li><a href='#'>Share</a></li>    
										</ul>
									</div>
								<?php
							}
						?>
						</div>
						<?php
						}else{

						}
					?>
				</div>
			</div><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="row" id="foot" style="position:fixed;margin-top:20%;padding:0px;width:20%;border-radius:5px;">
				<li><a href="">Privacy</a></li>
				<li><a href="">Data Policy</a></li>
				<li><a href="">Cookie Policy</a></li><br>
				<li><a href="">Terms& Conditions</a></li>

				<li><span id="copy" style="font-size:1.2em;color:#6e6e6d;">© Copyrights ConectYu 2020</span></li>
			</div>
		</div>
	</div>
</body>
</html>
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
				<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose' style="width:150px;">Cancel</button>
				<input class="btn btn-info confirmunblock" type="button" unblocked_id="" id="confirmunblock" style="width:150px;" value="Confirm" />
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
//unblock a user
$('.unblockbtn').click(function(){
	var blockedby=<?php echo json_encode($_SESSION['uid']); ?>;
	var blockeduser=$(this).attr('blocked_id');
	$("#confirmunblock").attr("unblocked_id",blockeduser);
	$('#unblockUserModal').modal({
		show: true
	});
});
//cofirming unblocking the user
$('.confirmunblock').click(function(){
	var uid=<?php echo json_encode($_SESSION['uid']); ?>;
	var blockeduser=$(this).attr('unblocked_id');
	$.ajax({
		url:'functions/functions.php',
		data:'unblockuser=1'+'&user_id='+blockeduser+'&uid='+uid,
		type:'post',
		success:function(rest){
			window.open('profile.php?user_id='+blockeduser,'_self');
		}
	});
});

//unblocking all blocked users at a single click
$("#unblockallaccs").click(function(){
	var uid=<?php echo json_encode($_SESSION['uid']); ?>;
	$.ajax({
		url:'functions/functions.php',
		data:'unblockallusers=1&uid='+uid,
		type:'post',
		success:function(rest){
			window.open('blockedaccounts.php','_self');
		}
	}); 
});
</script>
