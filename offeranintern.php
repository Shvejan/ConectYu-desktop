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
	<title>Offer an Internship</title>
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
	<link href="https://fonts.googleapis.com/css?family=Sriracha|Courgette&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}

label{
	font-family: 'Courgette', cursive;
	font-size:1.2em;
}

#offerinternbtn,#reset{
	width:20%;
	float:right;
	margin-right:2%;
}

</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	

	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<h2 style="font-family: 'Kaushan Script', cursive;color:#a3124f;text-align:center;" >Propose an Internship.</h2>
				</div>
				<div class="panel-body">
					<form method="post" action="">
						<label>Internship title :</label>
						<input type="text" class="form-control" name="internshipname" id="internshipname" width="100%" placeholder="Enter the name of the internship" required /><br>
						<label>Category of the internship :</label>
						<textarea type="text" class="form-control" rows="5" name="category" id="category" width="100%" placeholder="like to which specification the internship belongs to" required ></textarea><br>
						<label>Contact details :</label>
						<textarea type="text" class="form-control" rows="3" name="interncontact" id="interncontact" placeholder="Enter your contact details"></textarea><br>
						
						
						<input type="submit" class="btn btn-info"  name="offerinternbtn" id="offerinternbtn" value="Submit" />
						<input type="reset" value="Reset" id="reset" class="btn btn-deafult" />
						
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

//Inserting an internship offer

if(isset($_POST['offerinternbtn'])){
	$offerintern = new OfferingInternshipClass();
	$offerintern->OfferInternFun();
}

class OfferingInternshipClass{
	function OfferInternFun(){
		global $con;
		$user_id=$_SESSION['uid'];
		
		$internship_name=htmlentities(mysqli_real_escape_string($con,$_POST['internshipname']));
		$category=htmlentities(mysqli_real_escape_string($con,$_POST['category']));
		$intern_contact=htmlentities(mysqli_real_escape_string($con,$_POST['interncontact']));
		
		$insert_internoffer="insert into internship_offers(user_id,internship_name,category,internship_contact,intern_views,intern_applications,offered_date) values('$user_id','$internship_name','$category','$intern_contact','0','0',NOW())";
		$run_internoffer=mysqli_query($con,$insert_internoffer);
		
		if($run_internoffer){
			echo "<script>window.open('internships.php?user_id=$user_id','_self');</script>";
		}else{
			echo "<script>window.open('offeranintern.php?user_id=$user_id','_self');</script>";
		}
	}
}

?>