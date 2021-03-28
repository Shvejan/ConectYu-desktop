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
	$user_email=$row_user['user_email'];
	$phno=$row_user['user_phno'];
	
	
	$select_privacy="select * from privacy_settings where user_id='$u_id'";
	$run_privacy=mysqli_query($con,$select_privacy);
	$row_value=mysqli_fetch_array($run_privacy);
	$privacy_value=$row_value['account_privacy'];
	$cmnt_selection=$row_value['comment_selection'];
	$activity_sts=$row_value['activity_status'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-settings</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php $user_id ?>'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet"> <!-- signin link -->
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	
</head>
<style>
span{
	margin-left:3%;
	font-size:1.5em;
	font-weight:2px;
	font-family:bold;
}
#returnlink{
	padding:5px;
}
.switch{
	float:right;
	margin-right:5%;
	margin-top:3%;
}


/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

#changeprivacybtn{
	width:150px;
}
input[type="radio"]{
	float:right;
	margin-right:5%;
	width:17px;
	height:17px;
}
label{
	font-size:1.2em;
	margin-left:35%;
}
#tagstab a,#blockedtab a{
	font-family:bold;
	font-size:1.5em;
	display:block;
	width:100%;
	color:black;
	padding:10px;
	cursor:pointer;
}
#tagstab a:hover,#blockedtab a:hover{
	text-decoration:none;
	background-color:#e6e6e6;
}
#restrictedusers:hover{
	text-decoration:none;
	background-color:#e6e6e6;
}
#restrictedusers{
	font-family:bold;
	font-size:1.5em;
	display:block;
	width:100%;
	color:black;
	padding:10px;
	cursor:pointer;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<!-- CODE FOR PRIVACY SETTINGS -->
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<a id="returnlink" href="settings.php" style="font-size:2em;color:black;"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<span style="font-size:1.5em;font-family: 'Merienda One',cursive;margin-left:4.5%;"><strong>Privacy Settings</strong></span>
				</div>
				<div class="panel-body" id="ssettings">
					<div class="row">
						<span>Account Privacy</span>
						<?php if($privacy_value=="private"){ ?>
						<label class="switch">
						  <input type="checkbox" checked onchange="changingprivacy()" />
						  <span class="slider round"></span>
						</label>
						<?php }else{ ?>
						<label class="switch">
						  <input type="checkbox" onchange="changingprivacy()" />
						  <span class="slider round"></span>
						</label>
						<?php } ?>
						
						<p style="margin-left:3%;font-family:bold;font-size:1.2em;color:#4588f5;"><?php echo $privacy_value; ?></p>
					</div><hr>
					<script type="text/javascript">
						function changingprivacy(){
							$('#changeprivacy').modal({
									show: true
							});
						}
						//closing modal
						function closemodalfun(){
							window.open('privacysettings.php','_self');
						}
					</script>
					
					<!-- Changing privacy modal -->
					<div class="modal fade" id="changeprivacy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Confirmation of Changing privacy</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<?php if($privacy_value=="private"){ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your account will be public now.So everyone could see your photos, videos, etc...</i></p>
										<?php }else{ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your account will be private now.So no one could see your photos, videos, etc... except your followers and connections.</i></p>
										<?php } ?>
								</div>
								<div class="modal-footer">
										<button class="btn btn-info" type="submit" id="changeprivacybtn" name="changeprivacybtn" style="width:120px;">Confirm</button>
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose' style="width:120px;" onclick="closemodalfun();">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of changing privacy modal -->
					
					<div class="row">
						<span>Comments</span>
						<p style="margin-left:3%;font-family:bold;font-size:1.2em;color:#4588f5;"><i>See who can comment you!</i></p>
						<form action="" method="post">
						<?php if($cmnt_selection == "everyone"){ ?>
							<label>Everyone</label>
							<input type="radio" name="comments" value="everyone" checked /><br>
							<label>Your followers,connections</label>
							<input type="radio" name="comments" value="followcon" /><br>
							<label>Your followers,following & connections</label>
							<input type="radio" name="comments" value="fwfgcon" /><br>
							<label>disable for everyone</label>
							<input type="radio" name="comments" value="disable" />
						<?php }elseif($cmnt_selection == "followcon"){ ?>
							<label>Everyone</label>
							<input type="radio" name="comments" value="everyone"  /><br>
							<label>Your followers,connections</label>
							<input type="radio" name="comments" value="followcon" checked /><br>
							<label>Your followers,following & connections</label>
							<input type="radio" name="comments" value="fwfgcon" /><br>
							<label>disable for everyone</label>
							<input type="radio" name="comments" value="disable" />
						<?php }elseif($cmnt_selection == "fwfgcon"){ ?>
							<label>Everyone</label>
							<input type="radio" name="comments" value="everyone"  /><br>
							<label>Your followers,connections</label>
							<input type="radio" name="comments" value="followcon" /><br>
							<label>Your followers,following & connections</label>
							<input type="radio" name="comments" value="fwfgcon" checked /><br>
							<label>disable for everyone</label>
							<input type="radio" name="comments" value="disable" />
						<?php }elseif($cmnt_selection == "disable"){ ?>
							<label>Everyone</label>
							<input type="radio" name="comments" value="everyone"  /><br>
							<label>Your followers,connections</label>
							<input type="radio" name="comments" value="followcon" /><br>
							<label>Your followers,following & connections</label>
							<input type="radio" name="comments" value="fwfgcon" /><br>
							<label>disable for everyone</label>
							<input type="radio" name="comments" value="disable" checked />
						<?php } ?>
						<br><br>
						<a href="cmntrestrictions.php" id="restrictedusers"><span style="float:right;margin-right:5%;font-size:1.2em;color:#b6b7b8;">see  <i class="fa fa-chevron-right" aria-hidden="true" style="font-size:0.7em;"></i></span>
						<i style="font-size:0.8em;color:#4588f5;">Restrict a particular user from commenting!</i></a>
					</div><hr>
					
					<div class="row" id="tagstab">
						<a href="" id="seetags">Tags<span style="float:right;margin-right:5%;font-size:1.2em;color:#b6b7b8;">see  <i class="fa fa-chevron-right" aria-hidden="true" style="font-size:0.7em;"></i></span>
						<br><i style="font-size:0.8em;color:#4588f5;">See who tagged you previously!</i></a>
					</div><hr>
					
					<div class="row">
						<span>Activity Status</span>
						<p style="margin-left:3%;font-family:bold;font-size:1.2em;color:#4588f5;"><i>See who can see you online!</i></p>
						<?php if($activity_sts== "everyone"){ ?>
							<label>Everyone</label>
							<input type="radio" name="activitystatus" value="everyone" checked /><br>
							<label>Your followers & connections</label>
							<input type="radio" name="activitystatus" value="followcon" /><br>
							<label>Only me</label>
							<input type="radio" name="activitystatus" value="onlyme" />
						<?php }elseif($activity_sts== "followcon"){ ?>
							<label>Everyone</label>
							<input type="radio" name="activitystatus" value="everyone"  /><br>
							<label>Your followers & connections</label>
							<input type="radio" name="activitystatus" value="followcon" checked /><br>
							<label>Only me</label>
							<input type="radio" name="activitystatus" value="onlyme" />
						<?php }elseif($activity_sts== "onlyme"){ ?>
							<label>Everyone</label>
							<input type="radio" name="activitystatus" value="everyone"  /><br>
							<label>Your followers & connections</label>
							<input type="radio" name="activitystatus" value="followcon"  /><br>
							<label>Only me</label>
							<input type="radio" name="activitystatus" value="onlyme" checked />
						<?php } ?>
					</div><hr>
					<div class="row" id="blockedtab">
						<a href="blockedaccounts.php" id="seetags">Blocked Accounts<span style="float:right;margin-right:5%;font-size:1.2em;color:#b6b7b8;">see  <i class="fa fa-chevron-right" aria-hidden="true" style="font-size:0.7em;"></i></span>
						<br><i style="font-size:0.8em;color:#4588f5;">See whom you blocked!</i></a>
					</div><hr>
					<input type="submit" class="btn btn-default" name="chprisettings" id="chprisettings" value="Save Changes" style="float:right;" />
				</form>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
	
</body>
</html>

<?php
if(isset($_POST['changeprivacybtn'])){
	global $con;
	$user_id=$_SESSION['uid'];
	$select_privacy="select account_privacy from privacy_settings where user_id='$user_id'";
	$run_privacy=mysqli_query($con,$select_privacy);
	$row_value=mysqli_fetch_array($run_privacy);
	$value=$row_value['account_privacy'];
	if($value=="public"){
		$new_value="private";
	}else{
		$new_value="public";
	}
	
	$update_privacy="update privacy_settings set account_privacy='$new_value' where user_id='$user_id'";
	$run_update=mysqli_query($con,$update_privacy);
	$update_privacy2="update users set account_type='$new_value' where user_id='$user_id'";
	$run_update2=mysqli_query($con,$update_privacy2);
	if($run_update){
		echo "<script>window.open('privacysettings.php','_self');</script>";
	}
}

if(isset($_POST['chprisettings'])){
	$prisetngs = new PrivateSettings();
	$prisetngs->UpdatePrivSettings();
}

class PrivateSettings{
	function UpdatePrivSettings(){
		global $con;
		$user_id=$_SESSION['uid'];
		$com_selection=htmlentities(mysqli_real_escape_string($con,$_POST['comments']));
		$activity_status=htmlentities(mysqli_real_escape_string($con,$_POST['activitystatus']));
		
		$update_privacy="update privacy_settings set comment_selection='$com_selection',activity_status='$activity_status',updated_date=NOW() where user_id='$user_id'";
		$run_update=mysqli_query($con,$update_privacy);
		if($run_update){
			echo "<script>window.open('privacysettings.php?user_id=$user_id','_self');</script>";
		}
	}
}
?>
