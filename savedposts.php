<?php
session_start();
include("includes/connection.php");
include("header.php");
include("functions/savepstsoperations.php");
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
	<title>ConectYu - Saved Posts</title>
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
#bluetick{
	margin-top:-8px;
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
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5" style="background-color:white;">
			<div class="row" id="savedposts" style="border:1px solid #e6e6e6;padding:10px;">
				<div class="col-sm-12">
					<span><a id="unsaveallposts" class="btn btn-default" style="float:right;margin-top:2.5%;margin-right:3%;">unsave all posts</a></span>
					<a href="generalsettings.php" style="font-size:2.5em;color:black;float:left;margin-top:2%;" id="returnlink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<h3 style="font-family: 'Merienda One', cursive;margin-left:10%;">Saved Posts </h3>
					<hr>
					<div class='row savedposts'></div>
					
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default" style="position:fixed;width:20%;height:60%;overflow-y:auto;">
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
									if($sessionuser != $row_mutual['following_user']){
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
			</div>
			<div class="row" id="foot" style="position:fixed;margin-top:29%;padding:0px;width:20%;border-radius:5px;">
				<li><a href="">Privacy</a></li>
				<li><a href="">Data Policy</a></li>
				<li><a href="">Cookie Policy</a></li><br>
				<li><a href="">Terms& Conditions</a></li>

				<li><span id="copy" style="font-size:1.2em;color:#6e6e6d;">© Copyrights ConectYu 2020</span></li>
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
	
</body>
</html>
<script>
	$(document).ready(function(){
		savedpsts();
		setInterval(function(){
			savedpsts();
		},50000);
	});
	
	function savedpsts(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/savepstsoperations.php',
			data:'savedpost=1'+'&user_id='+user_id,
			type:'post',
			success:function(res){
				//alert(rest);
				$('.savedposts').html(res);
			}
		});
	}
	$('#unsaveallposts').click(function(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/savepstsoperations.php',
			data:'unallsavedposts=1'+'&user_id='+user_id,
			type:'post',
			success:function(res){
				//alert(rest);
				$('.savedposts').html(res);
			}
		});
	});
	
//sharing suggested profile as message
function sugstduserprf(userid){
	document.getElementById("fwrduserid").value=userid;
	document.getElementById("fwrdusertype").value="user";
	$('#sugstdProfAsMsg').modal({
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
}
</script>