<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Otp Verification</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet"> <!-- h2 -->
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
	font-size:1.5em;
	margin-left:20px;
}
#head{
	font-size:2.5em;
	text-align:center;
	margin-top:55px;
	font-family: 'Francois One', sans-serif;

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
#continue{
	width:80%;
}
#otpresendlink{
	font-size:1.5em;
	text-align:center;
}
#error{
	width:100%;
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
	#head{
		margin-top:0px;
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
							<center><h2 id="head">Verify that`s you</h2></center>
							<h2 id="heading">Enter the One Time Password which has been sent to your email here.</h2><br>
							<div class='alert alert-danger' id="invalidotp" style="display:none;">
									<strong>Invalid OTP.Please enter a valid OTP!</strong>
							</div>
						<div id="otpcode">
							<form action="" method="post">
								<div class="input-group">
									<input type="number" name="otp" class="form-control" id="otp" placeholder="Enter the OTP here" required="required" />
								</div><br><br>
								<center><button id="continue" class="btn btn-info btn-lg" name="continue" data-toggle="tooltip" title="Continue to the next step.">
								Continue</button></center><br>
								<p id="otpresendlink">Didn`t got a code? 
								<a href="" style="text-decoration:none; color:#187AB;" data-toggle="tooltip" title="Resend OTP">Click here</a>
								</p><br><br>
							</form>
						</div>
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
if(isset($_POST['continue'])){
	
	
	if(isset($_GET['user'])){	
		$user=$_GET['user'];
	}
		$first_name=$_SESSION['first_name'];
		$last_name=$_SESSION['last_name'];
		$user_email=$_SESSION['user_email'];
		$user_pass=$_SESSION['user_pass'];
		$user_dob=$_SESSION['user_dob'];
		$user_gender=$_SESSION['user_gender'];
		$user_country=$_SESSION['user_country'];
		$user_pincode=$_SESSION['user_pincode'];
		$default_prfpic=$_SESSION['default_prfpic'];
		$default_coverpic="images/prfpics/coverpic.jpg";
		$user_state="";
		$user_city="";
		$tagline="I`m new to ConectYu!";
		$newgid=sprintf('%05d',rand(100,999));
				
		global $con;
		
		if($user=="student"){
			$n=rand(1,3);
			if($n==1){
				$user_id = strtolower($first_name.".".$last_name.$newgid);
				$_SESSION['uid']=$user_id;
			}elseif($n==2){
				$user_id = strtolower($first_name.".".$newgid);
				$_SESSION['uid']=$user_id;
			}elseif($n==3){
				$user_id = strtolower($first_name.$newgid);
				$_SESSION['uid']=$user_id;
			}
			setcookie("sessionuid",$user_id,time() +3600*24*30);
			$user_name = $first_name." ".$last_name;
			$_SESSION['user_name']=$user_name;
			//Student details
			$user_clg=$_SESSION['user_clg'];
			$user_course=$_SESSION['user_course'];
			$start_year=$_SESSION['start_year'];
			$end_year=$_SESSION['end_year'];
			$clg_add=$_SESSION['clg_add'];
		
			$insert_user="insert into users(user_id,user_name,f_name,l_name,user_email,user_pass,user_phno,user_dob,user_gender,user_country,user_state,user_city,
			user_pincode,user_designation,profile_pic,cover_pic,user_tagline,account_type,status,reg_date) values('$user_id','$user_name','$first_name','$last_name','$user_email','$user_pass','0','$user_dob','$user_gender','$user_country','$user_state','$user_city','$user_pincode','student','$default_prfpic','$default_coverpic','$tagline','public','active',NOW())";
			$run_insert_user=mysqli_query($con,$insert_user);
		
			$insert_stu="insert into students(user_id,college_name,course,start_year,end_year,clg_add,rgs_date) values('$user_id',
			'$user_clg','$user_course','$start_year','$end_year','$clg_add',NOW())";
			$run = mysqli_query($con,$insert_stu);
		}elseif($user=="org"){
			//Organization details
			$org_name=$_SESSION['org_name'];
			$org_weburl=$_SESSION['org_weburl'];
			$org_add=$_SESSION['org_add'];
			$user_id = strtolower(strtok($org_name," ").$newgid);
			$_SESSION['uid']=$user_id;
			
			setcookie("sessionuid",$user_id,time() +3600*24*30);
			
			$user_name = $org_name;
			$_SESSION['user_name']=$user_name;
			$default_prfpic="images/prfpics/orgpic.jpg";
			
			$insert_user="insert into users(user_id,user_name,f_name,l_name,user_email,user_pass,user_phno,user_dob,user_gender,user_country,user_state,user_city,
			user_pincode,user_designation,profile_pic,cover_pic,user_tagline,account_type,status,reg_date) values('$user_id','$user_name','$first_name','$last_name','$user_email','$user_pass','0','$user_dob',
			'$user_gender','$user_country','$user_state','$user_city','$user_pincode','org','$default_prfpic','$default_coverpic','$tagline','public','active',NOW())";
			$run_insert_user=mysqli_query($con,$insert_user);
			
			$insert_org="insert into organizations(user_id,org_name,web_url,org_add,rgs_date) values('$user_id','$org_name','$org_weburl','$org_add',
			NOW())";
			$run = mysqli_query($con,$insert_org);
		}elseif($user=="indv"){
			$n=rand(1,3);
			if($n==1){
				$user_id = strtolower($first_name.".".$last_name.$newgid);
				$_SESSION['uid']=$user_id;
			}elseif($n==2){
				$user_id = strtolower($first_name.".".$newgid);
				$_SESSION['uid']=$user_id;
			}elseif($n==3){
				$user_id = strtolower($first_name.$newgid);
				$_SESSION['uid']=$user_id;
			}
			setcookie("sessionuid",$user_id,time() +3600*24*30);
			$user_name = $first_name." ".$last_name;
			$_SESSION['user_name']=$user_name;
			//Individual details
			$company_name=$_SESSION['company_name'];
			$designation=$_SESSION['designation'];
			$company_add=$_SESSION['company_add'];
			
			$insert_user="insert into users(user_id,user_name,f_name,l_name,user_email,user_pass,user_phno,user_dob,user_gender,user_country,user_state,user_city,
			user_pincode,user_designation,profile_pic,cover_pic,user_tagline,account_type,status,reg_date) values('$user_id','$user_name','$first_name','$last_name','$user_email','$user_pass','0','$user_dob',
			'$user_gender','$user_country','$user_state','$user_city','$user_pincode','indv','$default_prfpic','$default_coverpic','$tagline','public','active',NOW())";
			$run_insert_user=mysqli_query($con,$insert_user);
			
			$insert_indv="insert into individuals(user_id,company_name,designation,company_add,rgs_date) values('$user_id','$company_name',
			'$designation','$company_add',NOW())";
			$run = mysqli_query($con,$insert_indv);
		}

		if($run_insert_user and $run){
			while(true){
				$sessionid=rand(111111111111111,999999999999999);
				$checksid=mysqli_query($con,"select * from user_sessions where sessionid='$sessionid'");
				$numsid=mysqli_num_rows($checksid);
				if($numsid==0){
					$_SESSION['sid']=$sessionid;
					$startsession=mysqli_query($con,"insert into user_sessions(sessionid,user_id,start_time,end_time) values('$sessionid','$user_id',NOW(),'')");
					break;
				}
			}
			
			//ssettings up privacy settings
			$insert_prvsetgs=mysqli_query($con,"insert into privacy_settings(user_id,account_privacy,comment_selection,activity_status,updated_date) values('$user_id','public','everyone','everyone',NOW())");
			
			//ssettings up security settings
			$insert_securitysetgs=mysqli_query($con,"insert into security_settings(user_id,mobile_privacy,twostep_verf,verify_with,updated_date) values('$user_id','Yes','Off','none',NOW())");
			
			echo "<script>window.open('home.php?user_id=$user_id','_self');</script>";
			echo "<script>alert();</script>";
		}else{
			echo "<script>alert('An error occurred.Try again!');</script>";
			
		}
}
?>