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
	$fname=$row_user['f_name'];
	$lname=$row_user['l_name'];
	$user_name=$row_user['user_name'];
	$dob=$row_user['user_dob'];
	$user_gender=$row_user['user_gender'];
	$tagline=$row_user['user_tagline'];
	$user_email=$row_user['user_email'];
	$user_id=$row_user['user_id'];
	$country=$row_user['user_country'];
	$state=$row_user['user_state'];
	$city=$row_user['user_city'];
	$pincode=$row_user['user_pincode'];
	$user_designation=$row_user['user_designation'];
	if($user_designation=="student"){
		$select_desg="select * from students where user_id='$user_id'";
		$run_desg=mysqli_query($con,$select_desg);
		$row_desg=mysqli_fetch_array($run_desg);
		$clg_name=$row_desg['college_name'];
		$course=$row_desg['course'];
		$s_year=$row_desg['start_year'];
		$e_year=$row_desg['end_year'];
		$clg_add=$row_desg['clg_add'];
		
		$take_edu="select * from education where user_id='$user_id'";
		$run_edu=mysqli_query($con,$take_edu);
		$num_edu=mysqli_num_rows($run_edu);
		
		$take_work="select * from work_experience where user_id='$user_id'";
		$run_work=mysqli_query($con,$take_work);
		$num_work=mysqli_num_rows($run_work);
	}elseif($user_designation=="org"){
		$select_desg="select * from organizations where user_id='$user_id'";
		$run_desg=mysqli_query($con,$select_desg);
		$row_desg=mysqli_fetch_array($run_desg);
		$org_name=$row_desg['org_name'];
		$web_url=$row_desg['web_url'];
		$org_add=$row_desg['org_add'];
	}elseif($user_designation=="indv"){
		$select_desg="select * from individuals where user_id='$user_id'";
		$run_desg=mysqli_query($con,$select_desg);
		$row_desg=mysqli_fetch_array($run_desg);
		$desg=$row_desg['designation'];
		$org_name=$row_desg['company_name'];
		$org_add=$row_desg['company_add'];
		
		$take_edu="select * from education where user_id='$user_id'";
		$run_edu=mysqli_query($con,$take_edu);
		$num_edu=mysqli_num_rows($run_edu);
		
		$take_work="select * from work_experience where user_id='$user_id'";
		$run_work=mysqli_query($con,$take_work);
		$num_work=mysqli_num_rows($run_work);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu - Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css" media="screen"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">	<!-- Logo -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet"> <!-- h2 -->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet"><!-- Tagline -->
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}

#prfpic{
	width:130px;
	height:130px;
	border:solid 1px black;
	border-radius:75px;
	margin-top:-100px;
}
input[type="file"]{
	display:none;
}

</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default" id="editprofpanel">
				<div class="panel-body">
						<img src="<?php echo $prfpic; ?>" class="img-responsive"  id="editprfpic" ><br>
						<label class='btn btn-default' id="editprfpicbtn"><b>Edit</b></label>
					<script>
						$("#editprfpicbtn").click(function(){
							$('#showprfpic').modal({
									show: true
								});
						});
						function readURL(input) {
							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#preview')
										.attr('src', e.target.result)
										.width(150)
										.height(200);
								};

								reader.readAsDataURL(input.files[0]);
								
								$('#showprfpic').modal({
									show: true
								});
							}
						}
					</script>
					<!-- Modal -->
					<div class="modal fade" id="showprfpic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="panel panel-default">
										<div class="panel-heading" style="background-color:white;">
											<p><strong style="font-family:bold;font-size:1.5em;">Change profile picture</strong></p>
										</div>
										<div class="panel-body">
											<img id="preview" onerror="this.style.display='none'"/>
										</div>
										<div class="panel-footer">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="row">
													<label class="btn btn-success" id="chooseprfpic"><b>Choose</b>
													<input type="file" name="newprfpic" id="newprfpic" onchange="readURL(this);" /></label>
													<button class="btn btn-info" type="submit" name="confirmprfpic" id="confirmprfpic"><b>Confirm</b></button>
													<button class='btn btn-default' type='button' data-dismiss='modal' id='chooseprofclose'><b>Cancel</b></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<form action="" method="post">
						<!-- GENERAL INFORMATION FOR ALL -->
						<fieldset>
							<legend id="legend"><b>General information</b></legend>
							<?php if($user_designation=="org"){ ?>
							<label id="llbl">Organization :</label>&nbsp &nbsp <input type="text" name="org_name" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:79%;" value="<?php echo $org_name; ?>" required><br><br>
							<label id="llbl">Username :</label>&nbsp &nbsp <input type="text" name="user_name" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:82%;" value="<?php echo $user_name; ?>" required><br><br>
							<label id="llbl">Tagline :</label>&nbsp &nbsp <input type="text" name="tag_line" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:85%;" value="<?php echo $tagline; ?>" required>
							<br><br>
							<label id="llbl">Web Url :</label>&nbsp &nbsp <input type="text" name="org_weburl" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:39%;" value="<?php echo $web_url; ?>" required>
							<label id="llbl" style="margin-left:7%;">Address :</label>&nbsp &nbsp <input type="text" name="org_add" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:25%;" value="<?php echo $org_add; ?>" required><br><br><br>
							<label id="llbl" style="font-family:bold;font-size:1.5em;margin-top:-15px;color:green;text-decoration:underline"><i>Management details : (Not shown on profile) </i></label><br>
							<?php } ?>
							<label id="llbl">First name :</label>&nbsp &nbsp <input type="text" placeholder="write..." name="f_name" id="info" style="border:none;border-bottom:#8a8a8a 1.3px solid;" value="<?php echo $fname; ?>" required>
							<label id="rlbl" style="margin-left:19%;">Last name :</label>&nbsp &nbsp <input type="text" name="l_name" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:22%;" value="<?php echo $lname; ?>" required>
							<br><br>
							<?php if($user_designation!="org"){ ?>
								<label id="llbl">Username :</label>&nbsp &nbsp <input type="text" name="user_name" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:280px;" value="<?php echo $user_name; ?>" required>
								<label id="rlbl" style="margin-left:5%;">Date of birth :</label>&nbsp &nbsp <input type="text" name="user_dob" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:20%;" value="<?php echo $dob; ?>" required>
								<br><br>
								<label id="llbl">Tagline :</label>&nbsp &nbsp <input type="text" name="tag_line" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:85%;" value="<?php echo $tagline; ?>" required>
								<br><br>
							<?php }
								if($user_designation=="org"){ ?>
								<label id="llbl">Date of birth :</label>&nbsp &nbsp <input type="text" name="user_dob" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:22%;" value="<?php echo $dob; ?>" required>
								<label id="rlbl" style="margin-left:19%;">Gender :</label>&nbsp &nbsp <input type="text" name="user_gender" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:24.5%;" value="<?php echo $user_gender; ?>" required><br><br>
								<?php } ?>
								
								<label id="llbl">Country :</label>&nbsp &nbsp <input type="text" name="user_country" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:26%;" value="<?php echo $country; ?>" required>
								<label id="rlbl" style="margin-left:19%;">State:</label>&nbsp &nbsp <input type="text" name="user_state" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:29%;" value="<?php echo $state; ?>">
								<br><br>
								<label id="llbl">City :</label>&nbsp &nbsp <input type="text" name="user_city" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:30%;" value="<?php echo $city; ?>">
								<label id="rlbl" style="margin-left:19%;">Pincode :</label>&nbsp &nbsp <input type="text" name="user_pincode" id="info" placeholder="write..." style="border:none;border-bottom:#8a8a8a 1.3px solid;width:26%;" value="<?php echo $pincode; ?>" required>
								<br><br>
								
							<p><i style="color:red;">*Note: Enter the valid information.</i></p>
							<hr>
							<button type="submit" class="btn btn-success btn-md" id="updatedetails" name="updatedetailsbtn"><i style="font-family:bold;font-size:1.3em;">Submit</i></button>
						</fieldset>
					</form>
				</div>
			</div>
			
			
			<!-- EDUCATION FOR STUDENTS AND INDIVIDUALS -->
			
			<?php if($user_designation!="org"){?>
					<div class="panel panel-default" id="editprofpanel">
						<div class="panel-body">
							<fieldset>
								<legend id="legend"><b>Education</b></legend>
								<?php if($user_designation=="student"){
										if($e_year>=date("Y")){$e_year="currently";} ?>
											<label id='llbl' style='font-family:bold;font-size:1.5em;margin-top:-15px;color:green;text-decoration:underline;'><i>Studying at : </i></label><br>
											<label id="llbl">Institute name :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php  echo $clg_name;?></span>
											<strong><a  id="editedu" style="cursor:pointer"><i class='fa fa-pencil' aria-hidden='true'></i></a></strong>
											<br><br>
											<label id="llbl">Course :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php  echo $course;?></span>
											<label id="llbl" style="margin-left:10%;">From :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php echo $s_year; ?></span>
											<label id="llbl" style="margin-left:10%;">To :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php echo $e_year; ?></span>
								
								<script>
									$('#editedu').click(function(){
										//open edit education modal
										$('#editEduModal').modal({
										show: true
										});
									});
								</script>
									<!-- EDUCATION EDIT MODAL -->
									<div class="modal fade" id="editEduModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<div class="panel-title"><p style="font-family:bold;font-size:1.5em;"><strong>Edit education details</strong></p></div>	
												</div>
												<div class="modal-body">
												<form action="" method="post">
													<label id="llbl">Institute name :</label>&nbsp &nbsp <input type="text" name="institute_name" id="eduinfo" placeholder="write. . ." style="width:70%" value="<?php echo $clg_name; ?>" required>
													<br><br>
													<label id="llbl" style="margin-left:7%;">Start year :</label>&nbsp <input type="number" name="start_year" id="eduinfo" placeholder="From" value="<?php echo $s_year; ?>" required>&nbsp
													<label id="rlbl" style="margin-left:17%;">End year :</label>&nbsp <input type="number" name="end_year" id="eduinfo" placeholder="..." required  value="<?php echo $e_year; ?>">
													<br><br>
													<label id="llbl"  style="margin-left:7%;">Course :</label>&nbsp <input type="text" name="course" id="eduinfo" style="width:25%"  placeholder="Course" value="<?php echo $course; ?>" required>
													<label id="llbl"  style="margin-left:14%;">City :</label>&nbsp <input type="text" name="clg_add" id="eduinfo" style="width:25%" placeholder="city" value="<?php echo $clg_add; ?>" required>
													<br><br>
													<p style="color:red;"><i>*Enter currently studying education details.</i></p>
												</div>
												<div class="modal-footer">
													<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
													<button class="btn btn-info" type="submit" style="width:150px;"name="editedubtn" id="editedubtn">Confirm</button>
												</form>
												</div>
											</div>
										</div>
									</div>
							<?php } ?>
								<?php 
									if($num_edu != 0){ 
										echo "<hr>
											<label id='llbl' style='font-family:bold;font-size:1.5em;margin-top:-15px;color:green;text-decoration:underline;'><i>Studied at : </i></label><br>
										";
										while($row_edu=mysqli_fetch_array($run_edu)){
											$clg_name=$row_edu['institute_name'];
											$course=$row_edu['course'];
											$s_year=$row_edu['s_year'];
											$e_year=$row_edu['e_year'];
											$edu_id=$row_edu['edu_id'];
											if($e_year>date("Y")){
												$e_year="currently";
											}
								?>
											<label id="llbl">Institute name :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php  echo $clg_name;?></span>
											<strong id='removeedu'><a href='functions/delete_posts.php?edu_id=<?php echo $edu_id; ?>'><b aria-hidden='true'>X</b></a></strong>
											<br><br>
											<label id="llbl">Course :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php  echo $course;?></span>
											<label id="llbl" style="margin-left:10%;">From :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php echo $s_year; ?></span>
											<label id="llbl" style="margin-left:10%;">To :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php echo $e_year; ?></span>
											<hr>
								<?php 
										}
									}else{
										echo "
											<div class='panel panel-default'>
												<div class='panel-body'>
													<div class='alert alert-danger'>
														<p style='font-family:bold;font-size:1.5em;text-align:center;'>No Education details to show!</p>
													</div>
												</div>	
											</div>
										";
									}
								?>
									<button type="button" class="btn btn-success btn-md" id="addeducation"><i style="font-family:bold;font-size:1.3em;">Add education</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
								</fieldset>
							</div>
						</div>
						
						
						<script>
							$('#addeducation').click(function(){
								$('#addeduModal').modal({
									show: true
								});
							});
						</script>
				
				
				
				
				<!-- <!-- EDUCATION ADD MODAL -->
				<div class="modal fade" id="addeduModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<div class="panel-title"><p style="font-family:bold;font-size:1.5em;"><strong>Add education details</strong></p></div>	
							</div>
							<div class="modal-body">
							<form action="" method="post">
								<label id="llbl">Institute name :</label>&nbsp &nbsp <input type="text" name="institute_name" id="eduaddinfo" placeholder="Enter Institute name" style="width:73%" required>
								<br><br>
								<label id="llbl">Course :</label>&nbsp <input type="text" name="course" id="eduaddinfo" placeholder="Enter your course" style="width:84%" required>
								<br><br>
								<label id="llbl">Start Year :</label>&nbsp <input type="number" name="start_year" id="eduaddinfo" placeholder="From" style="width:30%;" required>
								<label id="llbl" style="margin-left:2%;">End Year :</label>&nbsp <input type="number" name="end_year" id="eduaddinfo" placeholder="To" style="width:30%;" required>	
							</div>
							<div class="modal-footer">
								<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
								<button class="btn btn-info" type="submit" style="width:150px;"name="addedubtn" id="addedubtn">Confirm</button>
							</form>
							</div>
						</div>
					</div>
				</div>
				
				<!-- WORK EXPERIENCE  -->
				
				<div class="panel panel-default" id="editprofpanel">
					<div class="panel-body">
						<fieldset>
							<legend id="legend"><b>Work Experience</b></legend>
							<?php if($user_designation=="indv"){ ?>
										<label id="llbl" style="font-family:bold;font-size:1.5em;margin-top:-15px;color:green;text-decoration:underline"><i>Working at : (currently)</i></label><br>
										<label id="llbl">Company name :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php  echo $org_name;?></span>
										<strong><a  id="editCompany" style="cursor:pointer"><i class='fa fa-pencil' aria-hidden='true'></i></a></strong>
										<br><br>
										<label id="llbl">Designation :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php echo $desg; ?></span>
										<label id="llbl" style="margin-left:20%;">Address :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php echo $org_add; ?></span>
										<hr>
							<?php } ?>
							<script>
								$('#editCompany').click(function(){
									//open edit education modal
									$('#editCompanyModal').modal({
									show: true
									});
								});
							</script>
								<!-- COMPANY EDIT MODAL -->
								<div class="modal fade" id="editCompanyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<div class="panel-title"><p style="font-family:bold;font-size:1.5em;"><strong>Edit Company details</strong></p></div>	
											</div>
											<div class="modal-body">
											<form action="" method="post">
												<label id="llbl">Company name :</label>&nbsp &nbsp <input type="text" name="company_name" id="cominfo" placeholder="Company name" style="width:70%" value="<?php echo $org_name; ?>" required>
												<br><br>
												<label id="llbl" style="margin-left:0%;">Designation :</label>&nbsp <input type="text" name="user_desg" id="cominfo" placeholder="Designation" value="<?php echo $desg; ?>" required>&nbsp
												<label id="rlbl" style="margin-left:1%;">Address :</label>&nbsp <input type="text" name="company_add" id="cominfo" placeholder="City" value="<?php echo $org_add; ?>"  required>	
											</div>
											<div class="modal-footer">
												<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
												<button class="btn btn-info" type="submit" style="width:150px;"name="editcompanybtn" id="editcompanybtn">Confirm</button>
											</form>
											</div>
										</div>
									</div>
								</div>	
								
								
							<?php 
								if($num_work != 0){ 
									echo "
										<label id='llbl' style='font-family:bold;font-size:1.5em;margin-top:-15px;color:green;text-decoration:underline;'><i>Worked at : </i></label><br>
									";
									while($row_work=mysqli_fetch_array($run_work)){
										$company_name=$row_work['company_name'];
										$user_desg=$row_work['user_designation'];
										$company_add=$row_work['company_add'];
										$work_id=$row_work['work_id'];
							?>
										<label id="llbl">Company name :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php  echo $company_name;?></span>
										<strong id='removework'><a href='functions/delete_posts.php?work_id=<?php echo $work_id; ?>'><b aria-hidden='true'>X</b></a></strong>
										<br><br>
										<label id="llbl">Designation :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php echo $user_desg; ?></span>
										<label id="llbl" style="margin-left:20%;">Address :</label>&nbsp &nbsp <span style="width:60%;font-family:bold;font-size:1.2em;"><?php echo $company_add; ?></span>
										<hr>
							<?php 
									}
								}else{
									echo "
										<div class='panel panel-default'>
											<div class='panel-body'>
												<div class='alert alert-danger'>
													<p style='font-family:bold;font-size:1.5em;text-align:center;'>Not Yet Working.</p>
												</div>
											</div>	
										</div>
									";
								}
							?>
							
							
							
							<button type="button" class="btn btn-success btn-md" id="addcompany"><i style="font-family:bold;font-size:1.3em;">Add Work</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
							
							<script>
								$('#addcompany').click(function(){
									//open edit education modal
									$('#addCompanyModal').modal({
									show: true
									});
								});
							</script>
							
							<!-- COMPANY ADD MODAL -->
								
							<div class="modal fade" id="addCompanyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<div class="panel-title"><p style="font-family:bold;font-size:1.5em;"><strong>Add Company details</strong></p></div>	
										</div>
										<div class="modal-body">
										<form action="" method="post">
											<label id="llbl">Company name :</label>&nbsp &nbsp <input type="text" name="company_name" id="cominfo" placeholder="Company name" style="width:70%" required>
											<br><br>
											<label id="llbl" style="margin-left:0%;">Designation :</label>&nbsp <input type="text" name="user_desg" id="cominfo" placeholder="Designation" required>&nbsp
											<label id="rlbl" style="margin-left:1%;">Address :</label>&nbsp <input type="text" name="company_add" id="cominfo" placeholder="City" required>	
										</div>
										<div class="modal-footer">
											<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
											<button class="btn btn-info" type="submit" style="width:150px;"name="addcompanybtn" id="editcompanybtn">Confirm</button>
										</form>
										</div>
									</div>
								</div>
							</div>
									
						</fieldset>
					</div>
				</div>
				
			<?php } ?>
			
			<?php
			if($user_designation!="org"){
				$skillsObj = new Skills();
				$skillsObj->showEditSkills();	
			}
				$achivesObj = new Achivements();
				$achivesObj->showEditAchieves();							
			?>
		</div>
		<div class="col-sm-3">
		</div>
	</div>
	
	
	<footer>
		<div class="row">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-8" id="foot">
				<li><a href="">Privacy</a></li>
				<li><a href="">Data Policy</a></li>
				<li><a href="">Cookie Policy</a></li>
				<li><a href="">Terms& Conditions</a></li>

				<li><h4 id="copy" style="float:right;font-size:1.5em;margin-left:10px;">©copyrights ConectYu 2020</h4></li>
			</div>
			<div class="col-sm-1">
			</div>
		</div>
	</footer>
</body>
</html>
<?php
//change profile pic
if(isset($_POST['confirmprfpic'])){
	$user_id=$_SESSION['uid'];
	$u_image=$_FILES['newprfpic']['name'];
	$image_tmp=$_FILES['newprfpic']['tmp_name'];
	if($u_image==''){
		echo"<script>alert('Please choose a image.');</script>";
		echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
	}else{
		move_uploaded_file($image_tmp,"images/prfpics/$u_image.$user_id");
		$update="update users set profile_pic='images/prfpics/$u_image.$user_id' where user_id='$user_id'";
		$run=mysqli_query($con,$update);
		echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
	}
}


// Insering education details into database
if(isset($_POST['addedubtn'])){
	$edu = new AddEducation();
	$edu->insertEdu();
}


class AddEducation{
	function insertEdu(){
		global $con;
		$user_id=$_SESSION['uid'];
		
		$institute_name = htmlentities(mysqli_real_escape_string($con,$_POST['institute_name']));
		$course = htmlentities(mysqli_real_escape_string($con,$_POST['course']));
		$s_year = htmlentities(mysqli_real_escape_string($con,$_POST['start_year']));
		$e_year = htmlentities(mysqli_real_escape_string($con,$_POST['end_year']));
		
		$insert_edu="insert into education (user_id,institute_name,course,s_year,e_year,updated_date) values('$user_id','$institute_name','$course','$s_year','$e_year',NOW())";
		$run_insert=mysqli_query($con,$insert_edu);
		if($run_insert){
			echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
		}
	}
}

//Inserting Work Experience into database
if(isset($_POST['addcompanybtn'])){
	$work = new AddWorkExperience();
	$work->insertWorkExperience();
}

class AddWorkExperience{
	function insertWorkExperience(){
		global $con;
		$user_id=$_SESSION['uid'];
		
		$company_name = htmlentities(mysqli_real_escape_string($con,$_POST['company_name']));
		$user_desg = htmlentities(mysqli_real_escape_string($con,$_POST['user_desg']));
		$company_add = htmlentities(mysqli_real_escape_string($con,$_POST['company_add']));
		
		$insert_work="insert into work_experience (user_id,company_name,user_designation,company_add,updated_date) values('$user_id','$company_name','$user_desg','$company_add',NOW())";
		$run_insert=mysqli_query($con,$insert_work);
		if($run_insert){
			echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
		}
	}
}


if(isset($_POST['updatedetailsbtn'])){
	$updetails = new UpdatedDetails();
	$updetails->UpdateInfo();
}

class UpdatedDetails{
	function UpdateInfo(){
		global $con;
		global $user_designation;
		global $user_id;
		
		$fname=htmlentities(mysqli_real_escape_string($con,$_POST['f_name']));
		$lname=htmlentities(mysqli_real_escape_string($con,$_POST['l_name']));
		$username=htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
		$tag_line=htmlentities(mysqli_real_escape_string($con,$_POST['tag_line']));
		$user_dob=htmlentities(mysqli_real_escape_string($con,$_POST['user_dob']));
		$user_country=htmlentities(mysqli_real_escape_string($con,$_POST['user_country']));
		$user_state=htmlentities(mysqli_real_escape_string($con,$_POST['user_state']));
		$user_city=htmlentities(mysqli_real_escape_string($con,$_POST['user_city']));
		$user_pincode=htmlentities(mysqli_real_escape_string($con,$_POST['user_pincode']));
		
		if($user_designation=="org"){
			$user_gender=htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
			$org_name=htmlentities(mysqli_real_escape_string($con,$_POST['org_name']));
			$org_weburl=htmlentities(mysqli_real_escape_string($con,$_POST['org_weburl']));
			$org_add=htmlentities(mysqli_real_escape_string($con,$_POST['org_add']));
			
			$insert_info="update users set user_name='$username',f_name='$fname',l_name='$lname',user_dob='$user_dob',user_gender='$user_gender',user_country='$user_country',user_state='$user_state',user_city='$user_city',user_pincode='$user_pincode',user_tagline='$tag_line' where user_id='$user_id'";
			$run_info=mysqli_query($con,$insert_info);
			
			$insert_orginfo = "update organizations set org_name='$org_name',web_url='$org_weburl',org_add='$org_add' where user_id='$user_id'";
			$run_orginfo = mysqli_query($con,$insert_orginfo);
			
			if($run_info and $insert_orginfo){
				echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
			}
		}else{
			$update_info="update users set user_name='$username',f_name='$fname',l_name='$lname',user_dob='$user_dob',user_country='$user_country',user_state='$user_state',user_city='$user_city',user_pincode='$user_pincode',user_tagline='$tag_line' where user_id='$user_id'";
			$run_info=mysqli_query($con,$update_info);
			if($run_info){
				echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
			}
		}
		
		
	}
}

//editing college details
if(isset($_POST['editedubtn'])){
	$editedu = new EditEducation();
	$editedu->EditEdu();
}
class EditEducation{
	function EditEdu(){
		global $con;
		$user_id=$_SESSION['uid'];
		$institute_name = htmlentities(mysqli_real_escape_string($con,$_POST['institute_name']));
		$s_year = htmlentities(mysqli_real_escape_string($con,$_POST['start_year']));
		$e_year = htmlentities(mysqli_real_escape_string($con,$_POST['end_year']));
		$course = htmlentities(mysqli_real_escape_string($con,$_POST['course']));
		$clg_add = htmlentities(mysqli_real_escape_string($con,$_POST['clg_add']));
		if($e_year>=date("Y")){
			$edit_edu="update students set college_name='$institute_name',course='$course',start_year='$s_year',end_year='$e_year',clg_add='$clg_add' where user_id='$user_id'";
			$run_edu=mysqli_query($con,$edit_edu);
			if($run_edu){
				echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
			}
		}else{
			echo "<script>alert('Enter the details of currently studying institution.');</script>";
		}
	}
}



//Editing present company details
if(isset($_POST['editcompanybtn'])){
	$editCompany = new EditCompany();
	$editCompany->updateCompany();
}

class EditCompany{
	function updateCompany(){
		global $con;
		$user_id=$_SESSION['uid'];
		
		$company=htmlentities(mysqli_real_escape_string($con,$_POST['company_name']));
		$user_desg=htmlentities(mysqli_real_escape_string($con,$_POST['user_desg']));
		$company_add=htmlentities(mysqli_real_escape_string($con,$_POST['company_add']));
		
		$update_company = "update individuals set company_name='$company',designation='$user_desg',company_add='$company_add' where user_id='$user_id'";
		$run_company = mysqli_query($con,$update_company);
		if($run_company){
			echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
		}
	}
}
?>