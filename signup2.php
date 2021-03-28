<?php
session_start();
include("includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Signup</title>
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
#s_year{
	width:49%;
}
#e_year{
	width:49%;
	float:right;
}
#continue1{
	width:80%;
}
#continue2{
	width:80%;
}
#continue3{
	width:80%;
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
							<h2 id="heading"><?php echo ($_SESSION['first_name']); ?>, Tell us more about yourself to get updated with more opportunities to you!</h2><br><br>
							<center><h2>Join as</h2></center>
							<div class="input-group">
								<select name="join_as" id="join_as" class="form-control input-md" required="required" onchange="stufun();">
									<option>-----Select-----</option>
									<option>Student</option>
									<option>Organization</option>
									<option>Individual</option>
								</select>
							</div><br>
						<script type="text/javascript">
							function stufun(){
								var value=document.getElementById("join_as").value;
								if(value=="Student"){
									var std1=document.getElementById("student");
									std1.setAttribute("style", "display:display;");
									var std2=document.getElementById("organization");
									std2.setAttribute("style", "display:none;");
									var std3=document.getElementById("individual");
									std3.setAttribute("style", "display:none;");
								}else if(value=="Organization"){
									var std2=document.getElementById("organization");
									std2.setAttribute("style", "display:display;");
									var std1=document.getElementById("student");
									std1.setAttribute("style", "display:none;");
									var std3=document.getElementById("individual");
									std3.setAttribute("style", "display:none;");
								}else if(value=="Individual"){
									var std3=document.getElementById("individual");
									std3.setAttribute("style", "display:display;");
									var std1=document.getElementById("student");
									std1.setAttribute("style", "display:none;");
									var std2=document.getElementById("organization");
									std2.setAttribute("style", "display:none;");
								}else{
									var std1=document.getElementById("student");
									std1.setAttribute("style", "display:none;");
									var std2=document.getElementById("organization");
									std2.setAttribute("style", "display:none;");
									var std3=document.getElementById("individual");
									std3.setAttribute("style", "display:none;");
								}
							}
						</script>
						<div class='alert alert-danger' id="seyears" style="display:none;">
							<strong>Enter valid start and end dates!</strong>
						</div>
						<div class='alert alert-danger' id="clgname" style="display:none;">
							<strong>College name must be less than 255 characters long!</strong>
						</div>
						<div class='alert alert-danger' id="clgcourse" style="display:none;">
							<strong>Course name must be less than 255 characters long!</strong>
						</div>
						<div class='alert alert-danger' id="add" style="display:none;">
							<strong>Address must be less than 255 characters long!</strong>
						</div>
						<div id="student" style="display:none;">
							<form action="" method="post" name="prof">
								<h3>Student</h3><br>
								<div class="input-group">
									<input type="text" name="college_name" class="form-control" id="college_name" placeholder="Name of your Institution" required="required" />
								</div><br>
								<div class="input-group">
									<input type="text" name="course" class="form-control" id="course" placeholder="Specialization/Course" required="required" />
								</div><br>
								<div class="input-group">
									<input type="number" name="s_year" class="form-control" id="s_year" placeholder="start year" required="required" />
									<input type="number" name="e_year" class="form-control" id="e_year" placeholder="end year" required="required"/>
								</div><br>
								<div class="input-group">
									<input type="text" name="college_address" class="form-control" id="college_address" placeholder="Address/city of the institution" required="required" />
								</div><br>
								<center><button id="continue1" class="btn btn-info btn-lg" name="continue1" data-toggle="tooltip" title="Continue to the next step.">
								Continue</button></center><br>
							</form>
						</div>
						
						<div class='alert alert-danger' id="orgname" style="display:none;">
							<strong>Organization name must be less than 255 characters long!</strong>
						</div>
						<div class='alert alert-danger' id="weburl" style="display:none;">
							<strong>Website Url must be less than 255 characters long!</strong>
						</div>
						<div id="organization" style="display:none;" name="prof">
							<form action="" method="post" name="prof">
								<h3>Organization</h3><br>
								<div class="input-group">
									<input type="text" name="org_name" class="form-control" id="org_name" placeholder="Name of your Organization" required="required" />
								</div><br>
								<div class="input-group">
									<input type="url" name="web_url" class="form-control" id="web_url" placeholder="Website Url  Ex:https://WWW.something.com"/>
								</div><br>
								<div class="input-group">
									<input type="text" name="org_address" class="form-control" id="org_address" placeholder="Address/city of your organization" required="required" />
								</div><br>
								<center><button id="continue2" class="btn btn-info btn-lg" name="continue2" data-toggle="tooltip" title="Continue to the next step.">
								Continue</button></center><br>
							</form>
						</div>
						<div id="individual" style="display:none;" name="prof">
							<form action="" method="post">
								<h3>Individual</h3><br>
								<div class="input-group">
									<input type="text" name="company_name" class="form-control" id="company_name" placeholder="Where do you work?" required="required" />
								</div><br>
								<div class="input-group">
									<input type="text" name="designation" class="form-control" id="designation" placeholder="Designation/Present Position" required="required" />
								</div><br>
								<div class="input-group">
									<input type="text" name="company_address" class="form-control" id="company_address" placeholder="city of the Organization" required="required" />
								</div><br>
								<center><button id="continue3" class="btn btn-info btn-lg" name="continue3" data-toggle="tooltip" title="Continue to the next step.">
								Continue</button></center><br>
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
	if(isset($_POST['continue1'])){
		$stObj = new Student();
		$stObj->inputDetails();
	}elseif(isset($_POST['continue2'])){
		$orgObj = new Organization();
		$orgObj->inputDetails();
	}elseif(isset($_POST['continue3'])){
		$indvObj = new Individual();
		$indvObj->inputDetails();
	}
?>
<?php
class Student{
	function inputDetails(){
		$con=mysqli_connect("localhost","root","","conectyu");

		$user_clg=htmlentities(mysqli_real_escape_string($con,$_POST['college_name']));
		$_SESSION['user_clg']=$user_clg;
		$user_course=htmlentities(mysqli_real_escape_string($con,$_POST['course']));
		$_SESSION['user_course']=$user_course;
		$start_year=htmlentities(mysqli_real_escape_string($con,$_POST['s_year']));
		$_SESSION['start_year']=$start_year;
		$end_year=htmlentities(mysqli_real_escape_string($con,$_POST['e_year']));
		$_SESSION['end_year']=$end_year;
		$clg_add=htmlentities(mysqli_real_escape_string($con,$_POST['college_address']));
		$_SESSION['clg_add']=$clg_add;
		$stu="student";
		
		$stuerrObj = new ProfDetailsError();		
		if(strlen($user_clg)>255){
			$stueerObj->stuClgName();
		}
		
		if(strlen($start_year)!=4 or strlen($end_year)!=4){
			$stuerrObj->stuSEYears();
		}
		
		if(strlen($user_course)>255){
			$stuerrObj->stuCourse();
		}
		
		if(strlen($clg_add)>255){
			$stuerrObj->Address();
		}
		
		
		echo "<script>window.open('otp.php?user=$stu','_self');</script>";
		
	/*	$insert_stu="insert into students(user_id,college_name,course,start_year,end_year,clg_add,rgs_date) values('$user_id','$user_clg','$user_course',
		'$start_year','$end_year','$clg_add',NOW())";
		$run_stu = mysqli_query($con,$insert_stu);
		$stu="student";
		if($run_stu){
			echo "<script>window.open('otp.php?user=$stu','_self');</script>";
		}else{
			echo "<script>alert('An error occurred.Try again!');</script>";
		}
	*/
	
	
		
	}
}
class Organization{
	function inputDetails(){
		$con=mysqli_connect("localhost","root","","conectyu");

		$org_name=htmlentities(mysqli_real_escape_string($con,$_POST['org_name']));
		$_SESSION['org_name']=$org_name;
		$org_weburl=htmlentities(mysqli_real_escape_string($con,$_POST['web_url']));
		$_SESSION['org_weburl']=$org_weburl;
		$org_add=htmlentities(mysqli_real_escape_string($con,$_POST['org_address']));	
		$_SESSION['org_add']=$org_add;
		$org="org";
		
		$orgErrObj = new ProfDetailsError();
		
		if(strlen($org_name)>255){
			$orgErrObj->orgNameError();
		}
		if(strlen($org_weburl)>255){
			$orgErrObj->orgUrlError();			
		}
		if(strlen($org_add)>255){
			$orgErrObj->Address();					
		}
		
		echo "<script>window.open('otp.php?user=$org','_self');</script>";
		
		
	/*	$insert_org="insert into organizations(user_id,org_name,web_url,org_add,rgs_date) values('$user_id','$org_name','$org_weburl','$org_add',
		NOW())";
		$run_org = mysqli_query($con,$insert_org);
		$org="org";
		if($run_org){
			echo "<script>window.open('otp.php?user=$org','_self');</script>";
		}else{
			echo "<script>alert('An error occurred.Try again!');</script>";
		}
	*/
	}
}
class Individual{
	function inputDetails(){
		$con=mysqli_connect("localhost","root","","conectyu");

		$company_name=htmlentities(mysqli_real_escape_string($con,$_POST['company_name']));
		$_SESSION['company_name']=$company_name;
		$designation=htmlentities(mysqli_real_escape_string($con,$_POST['designation']));
		$_SESSION['designation']=$designation;
		$company_add=htmlentities(mysqli_real_escape_string($con,$_POST['company_address']));
		$_SESSION['company_add']=$company_add;
		$indv="indv";
		
		if(strlen($company_name)>255){
			$orgErrObj->orgNameError();
		}
		if(strlen($company_add)>255){
			$orgErrObj->Address();					
		}
		
		echo "<script>window.open('otp.php?user=$indv','_self');</script>";


	/*	$insert_indv="insert into individuals(user_id,company_name,designation,company_add,rgs_date) values('$user_id','$company_name','$designation',
		'$company_add',NOW())";
		$run_indv = mysqli_query($con,$insert_indv);
		$indv="indv";
		if($run_indv){
			echo "<script>window.open('otp.php?user=$indv','_self');</script>";
		}else{
			echo "<script>alert('An error occurred.Try again!');</script>";
		}	
	*/	
	
	}
}
?>
<?php
class ProfDetailsError{
	function stuClgName(){
		echo "
			<script type='text/javascript'>
				var datesError=document.getElementById('clgname');
				datesError.setAttribute('style', 'display:display;');
			</script>
			";
			exit();
	}
	function stuSEYears(){
		echo "
			<script type='text/javascript'>
				var datesError=document.getElementById('seyears');
				datesError.setAttribute('style', 'display:display;');
			</script>
			";
			exit();
	}
	function stuCourse(){
		echo "
			<script type='text/javascript'>
				var datesError=document.getElementById('clgcourse');
				datesError.setAttribute('style', 'display:display;');
			</script>
			";
			exit();
	}
	function Address(){
		echo "
			<script type='text/javascript'>
				var datesError=document.getElementById('clgadd');
				datesError.setAttribute('style', 'display:display;');
			</script>
			";
			exit();
	}
	function orgNameError(){
		echo "
			<script type='text/javascript'>
				var datesError=document.getElementById('orgname');
				datesError.setAttribute('style', 'display:display;');
			</script>
			";
			exit();
	}
	function orgUrlError(){
		echo "
			<script type='text/javascript'>
				var datesError=document.getElementById('weburl');
				datesError.setAttribute('style', 'display:display;');
			</script>
			";
			exit();
	}
}

?>