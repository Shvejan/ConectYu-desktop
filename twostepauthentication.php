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
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
#returnlink{
	padding:15px;
}
.switch{
	float:right;
	margin-right:8%;
	margin-top:-8.5%;
}


/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 55px;
  height: 29px;
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
  height: 21px;
  width: 21px;
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
#p{
	font-family: 'Alice', serif;
	font-size:1.1em;
	color:#878786;
	padding-left:20px;
	padding-right:20px;
	text-align:center;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<!-- getting security settings details
	<?php
		global $con;
		$select_sdetils=mysqli_query($con,"select * from security_settings where user_id='$u_id'");
		$row_sdetails=mysqli_fetch_array($select_sdetils);
		$mobpriv=$row_sdetails['mobile_privacy'];
		$twostepverf=$row_sdetails['twostep_verf'];
		$verifywith=$row_sdetails['verify_with'];
	?>
	<!-- CODE FOR SECURITY SETTINGS -->
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<a href="securitysettings.php" style="font-size:2em;color:black;" id="returnlink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<span style="font-size:1.5em;font-family: 'Merienda One',cursive;margin-left:4.5%;"><strong>Two - Step Authentication</strong></span>
				</div>
				<div class="panel-body" id="ssettings">
					<div class="row">
						<img src="https://img.icons8.com/cute-clipart/64/000000/phonelink-lock.png" width="80px" height="85px" style="margin-left:42.5%;"/><br>
						<h4 style="font-family: 'Roboto Slab', cursive;padding:25px;text-align:center;"><strong>Add extra security for your account with Two - Step Authentication</strong></h4>
						<p id="p">You can add extra/more protection for your account, everytime you login to your account.<br>We will send a verification code to your mobile number or email id you given. So, you need to use that code while logging into your account.</p>
					</div>
					<h4 style="font-family: 'Roboto Slab', cursive;" style="mar"><strong>Choose a way for verification</strong></h4>
					<hr>
					<div class="row" id="ssettings">
						<a id="changeph">Mobile number &nbsp <br><i style="font-size:0.8em;color:#4588f5;"><?php if($phno==0){ echo "Add phone number for verification";}else{ echo $phno; }?></i></a>
						<?php if($phno==0){ ?>
								<label class="switch">
									<input type="checkbox" onchange="addmobnumintimate();" />
									<span class="slider round"></span>
								</label>
						<?php }else{
								if($twostepverf=="Off" OR $verifywith!="mobile"){
							?>
									<label class="switch">
									<input type="checkbox" onchange="mobtwostepverf();" />
									<span class="slider round"></span>
								</label>
							<?php
								}elseif($twostepverf=="On" AND $verifywith=="mobile"){
							?>
									<label class="switch">
									<input type="checkbox" checked onchange="mobtwostepverf();" />
									<span class="slider round"></span>
								</label>
							<?php
								}
							} ?>
						<a id="changemail">Email address<br><i style="font-size:0.8em;color:#4588f5;"><?php echo $user_email; ?></i></a>
						<?php 
							if($twostepverf=="Off" OR $verifywith!="email"){
							?>
									<label class="switch">
									<input type="checkbox" onchange="emailtwostepverf();" />
									<span class="slider round"></span>
								</label>
							<?php
								}elseif($twostepverf=="On" AND $verifywith=="email"){
							?>
									<label class="switch">
									<input type="checkbox" checked onchange="emailtwostepverf();" />
									<span class="slider round"></span>
								</label>
							<?php
								}
							?>
					</div>
					<script type="text/javascript">
						//open mobile number changing modal
						$('#changeph').click(function(){
							$('#changephnoModal').modal({
								show: true
							});
						});
						//opening modal for two-step verification via phone.
						function mobtwostepverf(){
							$('#mobtwostepverfmodal').modal({
									show: true
							});
						}
						//opening modal for two-step verification via email.
						function emailtwostepverf(){
							$('#emailtwostepverfmodal').modal({
									show: true
							});
						}
						//closing modal
						function closemodalfun(){
							window.open('twostepauthentication.php','_self');
						}
						//intimating of adding mobile number
						function addmobnumintimate(){
							$('#mobnumintmatemodal').modal({
									show: true
							});
						}
					</script>
					
					<!-- Adding two-step authetication modal via mobile -->
					<div class="modal fade" id="mobtwostepverfmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Two-Step Verification</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<?php if($twostepverf=="On"  AND $verifywith=="mobile"){ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your two - step verification process will be disabled. You will be directly logged into your account only with your password.</i></p>
										<?php }elseif($twostepverf=="On" AND $verifywith=="email"){ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your two - step verification process will be disabled from your registered email address.<br>So, you need to keep your registered mobile number i.e <span style="color:#4588f5;"><?php echo $phno; ?></span> while logging into your account. You will recieve a Code/OTP for second step verification process.</i></p>
										<?php }else{ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Keep your registered mobile number i.e <span style="color:#4588f5;"><?php echo $phno; ?></span>  while logging into your account. You will recieve a Code/OTP for second step verification process.</i></p>
										<?php } ?>
								</div>
								<div class="modal-footer">
										<button class="btn btn-info" type="submit" id="mobverconfirm" name="mobverconfirm" style="width:120px;">Confirm</button>
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose' style="width:120px;" onclick="closemodalfun();">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of adding two-step authetication modal via mobile -->
					
					<!-- Adding two-step authetication modal via email -->
					<div class="modal fade" id="emailtwostepverfmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Two-Step Verification</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<?php if($twostepverf=="On" AND $verifywith=="email"){ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your two - step verification process will be disabled. You will be directly logged into your account only with your password.</i></p>
										<?php }elseif($twostepverf=="On" AND $verifywith=="mobile"){ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your two - step verification process will be disabled from your registered mobile number.<br>So, you need to keep your registered email address i.e <span style="color:#4588f5;"><?php echo $user_email; ?></span> while logging into your account. You will recieve a Code/OTP for second step verification process.</i></p>
										<?php }else{ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Keep your registered email address i.e <span style="color:#4588f5;"><?php echo $user_email; ?></span> while logging into your account. You will recieve a Code/OTP for second step verification process.</i></p>
										<?php } ?>
								</div>
								<div class="modal-footer">
										<button class="btn btn-info" type="submit" id="emailverconfirm" name="emailverconfirm" style="width:120px;">Confirm</button>
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose' style="width:120px;" onclick="closemodalfun();">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of adding two-step authetication modal via email -->
					
					<!-- Adding mobile number intimation -->
					<div class="modal fade" id="mobnumintmatemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Two-Step Verification</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<p style="font-family:bold;font-size:1.3em;"><i>Add your mobile number to continue with the two-step verification process.</i></p>
								</div>
								<div class="modal-footer">
										<button class="btn btn-info" type='button' data-dismiss='modal' id='modalclose' style="width:120px;" onclick="closemodalfun();">Okay</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of adding mobile number intimation -->
					
					<!-- Change Mobile number modal -->
					<div class="modal fade" id="changephnoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Change Phone number</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<label id="llbl">New Phone number :</label><br><input type="text" name="new_phno" id="phoneinfo" placeholder="new phone number..." style="width:90%" required>
										<br><br>
										<label id="llbl">password :</label><br><input type="password" name="pswrd" id="passinfo" placeholder="Enter your password..." style="width:90%" required>
										<br><br>
										
								</div>
								<div class="modal-footer">
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
										<button class="btn btn-info" type="submit" id="changephno" name="changephno">Confirm</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of changing mobile number modal -->
					
				</div>
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</body>
</html>

<?php
//change phone number
if(isset($_POST['changephno'])){
	global $con;
	$user_id=$_SESSION['uid'];
	
	$new_phno= htmlentities(mysqli_real_escape_string($con,$_POST['new_phno']));
	$pswrd = htmlentities(mysqli_real_escape_string($con,$_POST['pswrd']));
	$pswrd=md5($pswrd);
	
	$select_oldpass="select * from users where user_id='$user_id'";
	$run_oldpass=mysqli_query($con,$select_oldpass);
	$row_oldpass=mysqli_fetch_array($run_oldpass);
	$old_password=$row_oldpass['user_pass'];
	if($pswrd==$old_password){
		$update_phno="update users set user_phno='$new_phno' where user_id='$user_id'";
		$run_phno=mysqli_query($con,$update_phno);
		if($run_phno){
			echo "<script>window.open('twostepauthentication.php','_self');</script>";
		}else{
			echo "<script>window.open('twostepauthentication.php','_self');</script>";
		}
	}else{
		echo "<script>alert('Invalid password. Try again!');</script>";
	}
}

//setting mobile as the two-step verification.
if(isset($_POST['mobverconfirm'])){
	global $con;
	$user_id=$_SESSION['uid'];
	$select_verfdetails=mysqli_query($con,"select * from security_settings where user_id='$user_id'");
	$row_verfdetails=mysqli_fetch_array($select_verfdetails);
	$twostep_verf=$row_verfdetails['twostep_verf'];
	$verify_with=$row_verfdetails['verify_with'];
	
	if($twostep_verf=="Off"){
		$ontwostep_verf=mysqli_query($con,"update security_settings set twostep_verf='On' where user_id='$user_id'");
	}
	if($verify_with=="none" OR $verify_with=="email"){
		$setmobverf=mysqli_query($con,"update security_settings set verify_with='mobile' where user_id='$user_id'");
		echo "<script>window.open('twostepauthentication.php','_self');</script>";
	}elseif($verify_with=="mobile"){
		$removemobverf=mysqli_query($con,"update security_settings set verify_with='none' where user_id='$user_id'");
		$offtwostep_verf=mysqli_query($con,"update security_settings set twostep_verf='Off' where user_id='$user_id'");
		echo "<script>window.open('twostepauthentication.php','_self');</script>";
	}
}

//setting mobile as the two-step verification.
if(isset($_POST['emailverconfirm'])){
	global $con;
	$user_id=$_SESSION['uid'];
	$select_verfdetails=mysqli_query($con,"select * from security_settings where user_id='$user_id'");
	$row_verfdetails=mysqli_fetch_array($select_verfdetails);
	$twostep_verf=$row_verfdetails['twostep_verf'];
	$verify_with=$row_verfdetails['verify_with'];
	
	if($twostep_verf=="Off"){
		$ontwostep_verf=mysqli_query($con,"update security_settings set twostep_verf='On' where user_id='$user_id'");
	}
	if($verify_with=="none" OR $verify_with=="mobile"){
		$setmobverf=mysqli_query($con,"update security_settings set verify_with='email' where user_id='$user_id'");
		echo "<script>window.open('twostepauthentication.php','_self');</script>";
	}elseif($verify_with=="email"){
		$removemobverf=mysqli_query($con,"update security_settings set verify_with='none' where user_id='$user_id'");
		$offtwostep_verf=mysqli_query($con,"update security_settings set twostep_verf='Off' where user_id='$user_id'");
		echo "<script>window.open('twostepauthentication.php','_self');</script>";
	}
}
?>
