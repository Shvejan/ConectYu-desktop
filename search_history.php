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
#post_labelname:hover{
	text-decoration:none;
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
	margin-top:0px;
	margin-left:0px;
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
#delrecentbtn{
	width:150px;
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
			<div class="row" id="recentsearches">
				<div class="col-sm-12">
					<span><a id="delrecentsearches" class="btn btn-default" style="float:right;margin-top:2.5%;margin-right:3%;">Clear history</a></span>
					<a href="securitysettings.php" style="font-size:2.5em;color:black;float:left;margin-top:2%;" id="returnlink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<h3 style="font-family: 'Merienda One', cursive;margin-left:10%;">Recent searches :</h3>
					<hr>
					
					<script>
						$('#delrecentsearches').click(function(){
							//open Deleting the recent history modal
							$('#delrecentsearchesModal').modal({
								show: true
							});
						});
					</script>
					<!-- Deleting the recent history -->
					<div class="modal fade" id="delrecentsearchesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Confirmation of Changing privacy</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<p style="font-family:bold;font-size:1.3em;"><img src="https://img.icons8.com/carbon-copy/100/000000/question-mark.png" width="50px" height="50px"> &nbsp <i>Do you want clear your recent search history?</i></p>
								</div>
								<div class="modal-footer">
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
										<button class="btn btn-info" type="submit" id="delrecentbtn" name="delrecentbtn">Confirm</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of Deleting the recent history modal -->
					
					
					<?php
						global $con;
						$uid=$_SESSION['uid'];
						$select_recent_user="select * from recent_searches where checked_by='$uid' ORDER BY checked_date DESC LIMIT 10";
						$run_recent_user=mysqli_query($con,$select_recent_user);
						$num_recent_searches=mysqli_num_rows($run_recent_user);
						
						if($num_recent_searches != 0){
							while($row_recent_user=mysqli_fetch_array($run_recent_user)){
								$user=$row_recent_user['checked_for'];
								$select_from_users="select * from users where user_id='$user'";
								$run_from_users=mysqli_query($con,$select_from_users);
								$row_search=mysqli_fetch_array($run_from_users);
								$prfpic=$row_search['profile_pic'];
								$user_name=$row_search['user_name'];
								$user_id=$row_search['user_id'];
								//$tagline=$row_search['tagline'];
								$user_designation=$row_search['user_designation'];
								
								$uid=$_SESSION['uid'];
								$check_following="select * from following where following_user='$uid' and followed_user='$user_id'";
								$run_check=mysqli_query($con,$check_following);
								$num=mysqli_num_rows($run_check);
								
								$check_connections="select * from connections where (connect_by='$uid' and connect_with='$user_id') OR (connect_by='$user_id' and connect_with='$uid')";
								$run_check=mysqli_query($con,$check_connections);
								$num3=mysqli_num_rows($run_check);
								
								
								if($user_designation=="student"){
									$select_desg="select * from students where user_id='$user_id'";
									$run_desg=mysqli_query($con,$select_desg);
									$row_desg=mysqli_fetch_array($run_desg);
									$clg_name=$row_desg['college_name'];
									
									echo "
										<div class='panel panel-default' id='paneltab'>
											<div class='panel-body'>
												<div class='row'>
													<div class='col-sm-2'>
														<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
													</div>
													<div class='col-sm-8' id='postid'>
									";
														if($user_id !=$uid){
															if($num>0){
																echo "
																	<button id='followingbtn1' name='followingbtn' class='btn btn-default btn-md' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
																"; 
															}else{
																echo "
																	<button id='followbtn1' name='followbtn' class='btn btn-info btn-md' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
																	</i></button><br>
																"; 
															}
														}
									echo "
														<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
														<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
														<p id='designation'><i>$user_designation at $clg_name</i></p>
													</div>
													<div class='col-sm-2'>
														
													</div>
												</div>
											</div>
										</div>
									";
								}elseif($user_designation=="org"){
									$select_desg="select * from organizations where user_id='$user_id'";
									$run_desg=mysqli_query($con,$select_desg);
									$row_desg=mysqli_fetch_array($run_desg);
									$org_name=$row_desg['org_name'];
									$org_add=$row_desg['org_add'];
									
									echo "
										<div class='panel panel-default' id='paneltab'>
											<div class='panel-body'>
												<div class='row'>
													<div class='col-sm-2'>
														<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
													</div>
													<div class='col-sm-8' id='postid'>
									";
													
													if($user_id != $uid){
														if($num3>0){
															echo "
																<button id='connectedbtn1' name='connectedbtn1' class='btn btn-default btn-md' style='display:;float:right;margin-right:1%;margin-top:2.5%;right:-13%;position:absolute;'>connected &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
															"; 
														}else{
															echo "
																<button id='connectbtn1' name='connectbtn1' class='btn btn-default btn-md' style='display:;float:right;margin-right:1%;margin-top:2.5%;right:-13%;position:absolute;'>connect &nbsp <i class='fa fa-plus' aria-hidden='true'></i></button><br>
															"; 
														}
													}
									echo "				
														<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
														<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
														<p id='designation'><i>$org_name, $org_add</i></p>
													</div>
													<div class='col-sm-2'>
														
													</div>
												</div>
											</div>	
										</div>
									";
								}elseif($user_designation=="indv"){
									$select_desg="select * from individuals where user_id='$user_id'";
									$run_desg=mysqli_query($con,$select_desg);
									$row_desg=mysqli_fetch_array($run_desg);
									$desg=$row_desg['designation'];
									$org_name=$row_desg['company_name'];
									
									echo "
										<div class='panel panel-default' id='paneltab'>
											<div class='panel-body'>
												<div class='row'>
													<div class='col-sm-2'>
														<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
													</div>
													<div class='col-sm-8' id='postid'>
									";
														if($user_id !=$uid){
															if($num>0){
																echo "
																	<button id='followingbtn1' name='followingbtn' class='btn btn-default btn-md' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
																"; 
															}else{
																echo "
																	<button id='followbtn1' name='followbtn' class='btn btn-info btn-md' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
																	</i></button><br>
																"; 
															}
														}
									echo "
														<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
														<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
														<p id='designation'><i>$desg at $org_name</i></p>
													</div>
													<div class='col-sm-2'>
														
													</div>
												</div>
											</div>
										</div>
									";
								}
							}
						}else{
							echo "
								<div class='alert alert-info' style='text-align:center;'>
									<strong>No recent searches!</strong>
								</div>
							";
						}
						
						
						
					?>
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
			<div class="row" id="foot" style="position:fixed;margin-top:14%;padding:0px;width:20%;border-radius:5px;">
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
<?php
if(isset($_POST['delrecentbtn'])){
	global $con;
	$user_id=$_SESSION['uid'];
	
	$delete_searches="delete from recent_searches where checked_by='$user_id'";
	$run_delete=mysqli_query($con,$delete_searches);
	if($run_delete){
		echo "<script>window.open('search_history.php?user_id=$user_id','_self');</script>";
	}
}
?>