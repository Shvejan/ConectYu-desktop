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
	$user_deisg=$row_user['user_designation'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jobs</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet"> <!-- recent searches -->
	<link href="https://fonts.googleapis.com/css?family=Sriracha|Courgette&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}

#jobname,#workexp{
	margin-right:25%;
	font-family: 'Courgette', cursive;
	font-size:2em;
}
#workexp{
	font-size:1.2em;
}
#jobname:hover,#workexp:hover{
	text-decoration:none;
}
#comprfpic{
	margin-left:10%;
	border:solid #e6e6e6 2px;
}
#jv,#ja{
	font-size:1.3em;
	text-align:center;
	font-family: 'EB Garamond', serif;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	
	
	<?php if($user_deisg=="org" and $_GET['user_id'] == $_SESSION['uid']){ ?>
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<h3 style="float:left;font-family: 'Kaushan Script', cursive;font-size:2em;color:#a3124f"><strong>Offer Employment opportunities.</strong></h3>
					<a href='offerajob.php?<?php echo $_SESSION['uid']; ?>' style='float:right;margin-right:2%;margin-top:2%;' class='btn btn-success' id='offerjobbtn'><i style='font-family:bold;font-size:1.3em;'>Offer a job </i></a><br><br><br>
				</div>
				<div class="panel-body">
					<h3 style="font-family: 'Merienda One', cursive;">Recent Jobs Proposed :</h3>
					<p style="color:red">*check your email for responses of your job proposal. (if any)</p><br>
					<?php
						global $con;
						$user_id=$_GET['user_id'];
						$select_jobsoffered="select * from job_offers where user_id='$user_id' ORDER BY offered_date DESC";
						$run_jobsoffered=mysqli_query($con,$select_jobsoffered);
						
						$select_prfpic="select profile_pic from users where user_id='$user_id'";
						$run_prfpic=mysqli_query($con,$select_prfpic);
						$rowpic=mysqli_fetch_array($run_prfpic);
						$pefpic=$rowpic['profile_pic'];
						
						while($row_jobs=mysqli_fetch_array($run_jobsoffered)){
							$job_name=$row_jobs['job_name'];
							$work_experience=$row_jobs['work_experience'];
							$job_views=$row_jobs['job_views'];
							$job_applications=$row_jobs['job_applications'];
							
							echo "
								<div class='panel panel-default'>
									<div class='panel-body'>
										<a href='' class='btn' style='width:100%;'>
											<img src='$prfpic' style='width:70px;height:70px;border-radius:35px;float:left;' id='comprfpic' />
											<p id='jobname' style='margin-left:5%;'><strong>$job_name</strong></p>
											<p id='workexp'>with $work_experience year work experience</p>
										</a>
									</div>
									<div class='panel-footer' style='background-color:white;'>
										<div class='row'>
											<div class='col-sm-6' style='border-right:black solid 1px;'>
												<p style='float:;' id='jv'><strong>Job Views &nbsp&nbsp $job_views</strong></p>
												
											</div>
											<div class='col-sm-6'>
												<p id='ja'><strong>Job Applications &nbsp&nbsp $job_applications</strong></p>
											</div>
										</div>
									</div>
								</div>
							";
						}
					?>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
		</div>
	</div>
	<?php }else{ ?>
		<div class="row" style="margin-top:50px;">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 style="font-family:bold;text-align:center;">No job notifications matches your profile yet!</h3>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
			</div>
		</div>
	<?php } ?>
</body>
</html>