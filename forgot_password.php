<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Reset Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet"> <!-- signin link -->
</head>
<style>
body{
	overflow-x:hidden;
}
#logo{
	font-family:'Shrikhand', cursive;
	font-size: 2.5em; 
	letter-spacing: 0px;  
	text-shadow: 1px 1px 2px #c4c4c4;
	margin-left:100px;
}
#heading{
	margin-top:25px;
	font-family: 'Roboto Slab', serif;
}

.main-content{
		width:100%;
		height:100%;
		margin:10px auto;
		border-color:#fff;
		padding:40px 50px;
	/*	border:5px solid #e6e6e6; */
		margin-top:0px;
		
}
.input-group{
	width:100%;
}

#sendotp,#confirmotp{
	width:80%;	
}
#otpresendlink{
	font-size:1.5em;
	text-align:center;
}

</style>
<style>
@media only screen and (max-width: 760px) {  
	#heading{
		margin-top:0px;
	}
	#logo{
		text-align:center;
		margin-left:0px;
		margin-top:0px;
	}
	#col3{
		background-color:#e6e6e6;
		padding-top:10px;
		padding-bottom:10px;
		margin-bottom:0px;
	}
}
</style>
<body>
	<div class="row">
		<div class="col-sm-3" id="col3">
			<h1 href="" id="logo">ConectYu</h1>
		</div>
		<div class="col-sm-6">
			<div class="main-content">
					<div class="l-part">
						<form method="post" action="">
							<h2 id="heading">Enter your Registered Email Address</h2><br><br>
							<div class='alert alert-danger' id="NotValid" style="display:none;">
								<strong>Invalid email</strong>
							</div>
							<div class="input-group">
								<input type="email" name="u_email" id="u_email" class="form-control" placeholder="Enter your email" required="required"
								value="<?php echo isset($_POST["u_email"]) ? htmlentities($_POST["u_email"]) : ''; ?>" />
							</div><br>
							<p id="signinlink">Return back to signin?
							<a href="signin" style="text-decoration:none; color:#187AB;" data-toggle="tooltip" title="Signin">Click here</a></p>
							<center><button id="sendotp" type="submit" class="btn btn-info btn-lg" name="sendotp" data-toggle="tooltip" title="Continue" >Continue</button></center><br>
						</form>
						<form method="post" action="" id="verifyotpform" style="display:none;">
							<div class='alert alert-success' id="otpsent" style="display:;">
								<span style="font-family:bold;"><strong>An OTP has been sent to registered email, Please enter it below.</strong></span>
							</div>
							<div class='alert alert-success' id="otpsentagain" style="display:none;">
								<span style="font-family:bold;"><strong>An OTP has been sent again to registered email, Please enter it below.</strong></span>
							</div>
							<div class='alert alert-danger' id="invalidotp" style="display:none;">
								<span style="font-family:bold;"><strong>Invalid OTP. Please enter a valid OTP.</strong></span>
							</div>
							<input type="email" id="useremail" name="useremail" style="display:none;" />
							<input type="number" class="form-control" placeholder="Enter OTP" id="eotp" name="eotp" required /><br>
							<center><button id="confirmotp" type="submit" class="btn btn-info btn-lg" name="confirmotp" data-toggle="tooltip" title="confirm OTP">Confirm</button></center><br>
							<p id="otpresendlink">Didn`t got a code? 
							<a style="text-decoration:none; color:#187AB;cursor:pointer" data-toggle="tooltip" title="Resend OTP" onclick="resendotp();">Click here</a></p><br><br>
						</form>						
					</div>
			</div>
		</div>
		<div class="col-sm-3">
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
//Resend OTP
	function resendotp(){
		var email=document.getElementById('useremail').value;
		$.ajax({
			url:'forgot_password.php',
			data:'resendotp=1&u_email='+email,
			type:'post',
			async:true,
			success:function(res){
				var pinError=document.getElementById('invalidotp');
				pinError.setAttribute('style', 'display:none;');
				var otpsent=document.getElementById('otpsent');
				otpsent.setAttribute('style', 'display:none;');
				var otpsentag=document.getElementById('otpsentagain');
				otpsentag.setAttribute('style', 'display:display;');
			}
		});
	}
</script>
<?php
	include("includes/connection.php");
	global $con;
	
	//sending otp for resetting password
	if(isset($_POST['sendotp'])){
		$u_email=htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
		$select_user = "select * from users where user_email='$u_email'";
		$run_user = mysqli_query($con,$select_user);
		$check_user=mysqli_num_rows($run_user);
		if($check_user != 0){
			$row_user=mysqli_fetch_array($run_user);
			$fname=$row_user['f_name'];
			//sending OTP (One Time Password!)
			$to=$u_email;
			$sub="Welcome ".$fname."!";
			$otp=rand(100000,999999);
			$_SESSION['pswrdotp']=$otp;
			$body="Your OTP (One Time Password) for verifying your ConectYu account is $otp.";
			$headers="From: ConectYu noreply@conectyu.com";
			if(mail($to,$sub,$body,$headers)){
				echo "
					<script>
						var otpform = document.getElementById('verifyotpform');
						otpform.setAttribute('style','display:display');
						document.getElementById('useremail').value='$u_email';
					</script>
				";
			}else{
				echo "<script>window.open('forgot_password.php','_self');</script>";
			}			
		}else{
			echo "
				<script type='text/javascript'>
					var Error=document.getElementById('NotValid');
					Error.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
		}
		
	}
	
	//verifying the otp
	if(isset($_POST['confirmotp'])){
		$otp=htmlentities(mysqli_real_escape_string($con,$_POST['eotp']));
		$email=htmlentities(mysqli_real_escape_string($con,$_POST['useremail']));
		$select_user=mysqli_query($con,"select user_id from users where user_email='$email'");
		$row_user=mysqli_fetch_array($select_user);
		$userid=$row_user['user_id'];
		$sentotp=$_SESSION['pswrdotp'];
		if($otp == $sentotp){
			unset($_SESSION['pswrdotp']);
			$_SESSION['newpassword']="verified";
			echo "<script>window.open('change_password.php?user_id=$userid','_self');</script>";
		}else{
			echo "
				<script type='text/javascript'>
					document.getElementById('u_email').value='$email';
					document.getElementById('useremail').value='$email';
					var otpform = document.getElementById('verifyotpform');
					otpform.setAttribute('style','display:display');
					var Error=document.getElementById('otpsent');
					Error.setAttribute('style', 'display:none;');
					var Error=document.getElementById('invalidotp');
					Error.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
		}
	}
	
//resending Otp
if(isset($_POST['resendotp'])){
	//sending OTP (One Time Password!)
	$to=htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
	$select_user=mysqli_query($con,"select f_name from users where user_email='$to'");
	$row_user=mysqli_fetch_array($select_user);
	$f_name=$row_user['f_name'];
	$sub="Welcome ".$f_name."!";
	$otp=rand(100000,999999);
	$_SESSION['pswrdotp']=$otp;
	$body="Your OTP (One Time Password) for verifying your ConectYu account is $otp.";
	$headers="From: ConectYu noreply@conectyu.com";
	if(mail($to,$sub,$body,$headers)){
		return;
	}else{
		echo "<script>window.open('forgot_password.php','_self');</script>";
	}
}
?>