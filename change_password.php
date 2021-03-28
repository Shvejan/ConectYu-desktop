<?php
session_start();
if(!isset($_SESSION['newpassword'])){
	echo "<script>window.open('forgot_password.php','_self');</script>";
	return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Change Password</title>
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
#subpswrd{
	width:80%;
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
							<h2 id="heading">Create your new password</h2><br><br>
							<div class='alert alert-danger' id="pswrdnotmatch" style="display:none;">
								<span style="font-family:bold;"><strong><center>Your passwords didn`t match. Try again!</center></strong></span>
							</div>
							<div class='alert alert-danger' id="pswrdlenerror" style="display:none;">
								<span style="font-family:bold;"><strong><center>Your password length must be in between 8 and 16!</center></strong></span>
							</div>
							<div class="input-group">
								<input type="password" name="newpass1" id="newpass1" class="form-control" placeholder="Enter your password" required="required"/><br><br><br>
								<input type="password" name="newpass2" id="newpass2" class="form-control" placeholder="Rewrite your password" required="required"/><br>
							</div><br>
							<br>
							<center><button id="subpswrd" type="submit" class="btn btn-info btn-lg" name="subpswrd" data-toggle="tooltip" title="Submit your password" >Continue</button></center><br>
						</form>			
					</div>
			</div>
		</div>
		<div class="col-sm-3">
		</div>
	</div>
</body>
</html>
<?php
	include("includes/connection.php");
	global $con;
	
	//sending otp for resetting password
	if(isset($_POST['subpswrd'])){
		$newpass1=htmlentities(mysqli_real_escape_string($con,$_POST['newpass1']));
		$newpass2=htmlentities(mysqli_real_escape_string($con,$_POST['newpass2']));
		$userid=htmlentities(mysqli_real_escape_string($con,$_GET['user_id']));
		$passlen=strlen($newpass1);
		if($newpass1 == $newpass2 and ($passlen>=8 and $passlen<=16)){
			$newpass1=md5($newpass1);
			$change_pswrd=mysqli_query($con,"update users set user_pass='$newpass1' where user_id='$userid'");
			if($change_pswrd){
				$_SESSION['uid']=$userid;
				setcookie("sessionuid",$userid,time() +3600*24*30);
			$changestatus=mysqli_query($con,"update users set status='active' where user_id='$userid'");
			while(true){
				$sessionid=rand(111111111111111,999999999999999);
				$checksid=mysqli_query($con,"select * from user_sessions where sessionid='$sessionid'");
				$numsid=mysqli_num_rows($checksid);
				if($numsid==0){
					$_SESSION['sid']=$sessionid;
					$startsession=mysqli_query($con,"insert into user_sessions(sessionid,user_id,start_time,end_time) values('$sessionid','$userid',NOW(),'')");
					break;
				}
			}
			
			echo "
				<script>window.open('home.php?user_id=$userid','_self');</script>
			";
			//deleting the session
			unset($_SESSION['newpassword']);
			}else{
				echo "<script>window.open('change_password.php','_self');</script>";
			}			
		}else if($newpass1 != $newpass2){
			echo "
				<script type='text/javascript'>
					var Error=document.getElementById('pswrdnotmatch');
					Error.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
		}else if($passlen<8 or $passlen>16){
			echo "
				<script type='text/javascript'>
					var Error=document.getElementById('pswrdlenerror');
					Error.setAttribute('style', 'display:display;');
				</script>
			";
		}
		
	}
	
?>