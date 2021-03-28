<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Signin</title>
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

#signin{
	width:80%;	
}
#signinlink{
	font-size:1.5em;
	text-align:center;
}
.overlap-text{
		position:relative;
	}
	.overlap-text a{
		position:absolute;
		top:8px;
		right:10px;
		font-size:14px;
		text-decoration:none;
		font-family:'Overpass Mono',monospace;
		letter-spacing:-1;
	}
#fpass{
	
	font-size:1.2em;
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
							<h2 id="heading">Signin to explore!</h2><br><br>
							<div class='alert alert-danger' id="NotValid" style="display:none;">
									<strong>Invalid email or Password!</strong>
								</div>
							<div class="input-group">
								<input type="email" name="u_email" class="form-control" placeholder="Enter your email" required="required"
								value="<?php echo isset($_POST["u_email"]) ? htmlentities($_POST["u_email"]) : ''; ?>" />
							</div><br>
							<div class="input-group overlap-text">
								<input type="password" name="u_pass" placeholder="Enter your Password" required="required" class="form-control input-md">
							<a href="" style="text-decoration:none;float:right;color:#187FAB;" id="showpass" data-toggle="tooltip"title="Show Password">show</a>

							</div><br>
<!-- Forgot password --><a href="forgot_password.php" style="text-decoration:none;float:right;color:#187FAB;" id="fpass" data-toggle="tooltip"title="Reset Password">
						 Forgot pasword?</a><br><br>
						<center><button id="signin" class="btn btn-info btn-lg" name="sign_in" data-toggle="tooltip" title="Signin">
						Signin</button></center><br>
						<p id="signinlink">Didn`t have an account? 
						<a href="signup" style="text-decoration:none; color:#187AB;" data-toggle="tooltip" title="Signup">Signup</a></p><br><br>
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
	
	if(isset($_POST['sign_in'])){
		$u_email=htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
		$u_pass=htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
		$u_pass=md5($u_pass);
		$select_user = "select * from users where user_email='$u_email' AND user_pass='$u_pass'";
		$run_user = mysqli_query($con,$select_user);
		$row_user=mysqli_fetch_array($run_user);
		$check_user=mysqli_num_rows($run_user);
		if($check_user==1&&$row_user['user_pass']==$u_pass){
			$_SESSION['user_email']=$u_email;
			$select_uid = "select user_id from users where user_email='$u_email'";
			$run_uid=mysqli_query($con,$select_uid);
			$row_uid=mysqli_fetch_array($run_uid);
			$uid=$row_uid['user_id'];
			$_SESSION['uid']=$uid;
			setcookie("sessionuid",$uid,time() +3600*24*30);
			$changestatus=mysqli_query($con,"update users set status='active' where user_id='$uid'");
			while(true){
				$sessionid=rand(111111111111111,999999999999999);
				$checksid=mysqli_query($con,"select * from user_sessions where sessionid='$sessionid'");
				$numsid=mysqli_num_rows($checksid);
				if($numsid==0){
					$_SESSION['sid']=$sessionid;
					$startsession=mysqli_query($con,"insert into user_sessions(sessionid,user_id,start_time,end_time) values('$sessionid','$uid',NOW(),'')");
					break;
				}
			}
			echo "<script>window.open('home.php?user_id=$uid','_self');</script>";				
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
?>