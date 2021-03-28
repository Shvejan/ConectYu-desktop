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
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
#settings a{
	font-family:bold;
	font-size:1.5em;
	display:block;
	width:100%;
	color:black;
	padding:10px;
	cursor:pointer;
}
#settings a:hover{
	text-decoration:none;
	background-color:#e6e6e6;
}

</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<!-- CODE FOR GENERAL SETTINGS -->
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-body" id="settings">
					<a href="generalsettings.php?user_id=<?php echo $_SESSION['uid']; ?>" id="accountlink"><img src="https://img.icons8.com/carbon-copy/100/000000/test-account.png" height="40px" width="40px"> &nbsp <label>Account</label></a><hr>
					<a href="privacysettings.php?user_id=<?php echo $_SESSION['uid']; ?>" id="privacylink"><img src="https://img.icons8.com/material-outlined/24/000000/lock.png" width="30px" height="30px">&nbsp &nbsp <label> Privacy</label></a><hr>
					<a href="securitysettings.php?user_id=<?php echo $_SESSION['uid']; ?>" id="securitylink"><img src="https://img.icons8.com/cotton/64/000000/security-shield.png" width="30px" height="30px"> &nbsp <label>Security</label></a><hr>
					<a href="" id="notifylink"> <i class="fa fa-bell-o" aria-hidden="true" style="font-size:1.1em;"></i> &nbsp <label>Notifications</label></a><hr>
					<a href="" id="adslink"><img src="https://img.icons8.com/ios/50/000000/sound-speaker.png" width="30px" height="30px">&nbsp <label>Ads</label></a><hr>
					<a href="verifications.php" id="accverify"><img src="https://img.icons8.com/wired/64/000000/pull-request.png" width="30px" height="30px">&nbsp<label>Request Verification</label></a><hr>
					<a href="" id="switchaccounts" style="color:#039dfc">Switch Accounts</a>
					<a id="logout" style="color:#039dfc">Logout</a>
					<script type="text/javascript">
						$('#logout').click(function(){
							//open bootsrap modal
							$('#signoutModal').modal({
							show: true
							});
						});
					</script>
					<!-- SIGNOUT MODAL -->
					<div class="modal fade" id="signoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
					</script>
					
				</div>
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</body>
</html>

<?php

?>
