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
	$username=$row_user['user_name'];
	$user_email=$row_user['user_email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu- Verifications</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php $user_id ?>'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alice|Marmelad&display=swap" rel="stylesheet">
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
input[type='file']{
	display:none;
}
#choosephoto{
	float:right;
	width:15%;
}
#submitver,#submitaccver{
	width:70%;
	margin-left:15%;
}
#p{
	font-family: 'Alice', serif;
	font-size:1.2em;
	color:#878786;
}
label{
	font-family: 'Marmelad', sans-serif;
	font-size:1.3em;
}
option{
	padding:10px;
	font-size:1.2em;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="row" style="margin-top:50px">
		<div class="col-sm-3">
		</div>
		<?php if(isset($_GET['achieve_id'])){ ?>
			<div class="col-sm-5">
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 style="text-align:center;font-family:Merienda One, cursive;">Apply for ConectYu Verification</h3><br>
							<?php
								global $con;
								$user_id=$_SESSION['uid'];
								$achieve_id=$_GET['achieve_id'];
								$select_achieve="select achieve_title from achievements where user_id='$user_id' and achieve_id='$achieve_id'";
								$run_achieve=mysqli_query($con,$select_achieve);
								$row_achieve=mysqli_fetch_array($run_achieve);
								$achieve_name=$row_achieve['achieve_title'];
							?>
								<div>
									<p id="p">A verification badge is a check symbol that appears next to your achievement name indicating that the achievement is noticable and adds skillset potential to the account holder.</p>
									<p id="p"><span style='color:red'>*</span> Note: Submitting a verification request does not gurantee that your achievement will be verified.</p>
								</div>
							<form action="" method="post" enctype="multipart/form-data">
								<label>User Id </label>
								<input type="text" class="form-control" name="userid" id="user_id" value="<?php echo $user_id; ?>" disabled style="background-color:white;" /><br>
								<label>Achievement Name </label>
								<input id="achievever" name="achieve_name" type="text" class="form-control" value="<?php echo $achieve_name; ?>" disabled style="background-color:white;"/><br>
								<label>Write something that concerns your achievement</label>
								<textarea name="achievedesc" id="achievedesc" class="form-control" placeholder="write..."></textarea><br>
								<label>Please attach a photo of your Achievement certification</label>
								<label class="btn btn-default" id="choosephoto"><b>Photo/ID</b>
								<input type="file" name="photoid" id="photoid" /></label>
								<p id="p"><span style="color:red;">*</span>Note: we require the photocopy of the certificate with accurate details on it and has to match the data provided by you. The certificate must be issued by the respective competition helder or any organization. This photocopy is mandatory inorder to review your request.</p><br>
								<input type="submit" class="btn btn-info form-control" name="submitver" id="submitver" value="submit" /><br><br>
							</form>
						</div>
					</div>
				</div>	
			</div>
		<?php }else{ ?>
				<?php
					global $con;
					$user_id=$_SESSION['uid'];
					$run_user_info=mysqli_query($con,"select * from users where user_id='$user_id'");
					$row_user=mysqli_fetch_array($run_user_info);
					$user_name=$row_user['user_name'];
				?>
				<div class="col-sm-5">
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 style="text-align:center;font-family:Merienda One, cursive;">Apply for ConectYu Verification</h3><br>
								<label>Choose the type of verification Request</label><br>
								<select name="verifytype" id="verifytype" class="form-control" onchange="selecttypefun();">
									<option>Account Verification</option>
									<option>Achievement Verification</option>
								</select><br>
								<script>
									function selecttypefun(){
										var type=document.getElementById('verifytype').value;
										if(type=="Account Verification"){
											var accver=document.getElementById('accver');
											accver.setAttribute('style','display:display');
											var achievever=document.getElementById('achievever');
											achievever.setAttribute('style','display:none');
										}else if(type=="Achievement Verification"){
											var accver=document.getElementById('accver');
											accver.setAttribute('style','display:none');
											var achievever=document.getElementById('achievever');
											achievever.setAttribute('style','display:display');
										}else{
											var accver=document.getElementById('accver');
											accver.setAttribute('style','display:display');
											var achievever=document.getElementById('achievever');
											achievever.setAttribute('style','display:none');
										}
									}
								</script>
								<?php
									
								?>
								<div id="accver" style="display:">
									<form action="" method="post" enctype="multipart/form-data">
										<p id="p">A verification badge is a check symbol that appears next to your username indicating that the account is in the presence of a public figure, a celebrity, global brand or any organization it represents.</p>
										<p id="p"><span style='color:red'>*</span> Note: Submitting a verification request does not gurantee that your account will be verified.</p><br>
										<label>User Id </label>
										<input type="text" class="form-control" name="userid" id="user_id" value="<?php echo $user_id; ?>" disabled style="background-color:white;"/><br>
										<label>User name</label>
										<input type="text" class="form-control" name="username" id="username" value="<?php echo $user_name; ?>" disabled style="background-color:white;" /><br>
										<label>famously known as</label><span style="color:red;font-size:1.3em;">*</span>
										<input type="text" class="form-control" name="knownas" id="knownas" placeholder="famoulsy known as" required /><br>
										<label>Category</label><span style="color:red;font-size:1.3em;">*</span>
										<select name="category" id="category" class="form-control" required >
											<option>Choose the type of category for your account</option>
											<option>Entrepreneur</option>
											<option>Investor</option>
											<option>Organization</option>
											<option>Company</option>
											<option>Educational Institution</option>
											<option>Influencer</option>
											<option>Government/Politics</option>
											<option>Fashion</option>
											<option>Sports</option>
											<option>News/Media</option>
											<option>Bussiness</option>
											<option>Others</option>
										</select><br>
										<label>Please attach a photocopy of your Identification</label>
										<label class="btn btn-default" id="choosephoto"><b>Photo/ID</b>
										<input type="file" name="photoid" id="photoid" /></label>
										<p id="p"><span style="color:red;">*</span>Note: we require the photocopy of your identification. This must be government issued photo-ID which shows your name and date of birth (e.g: Passport,National Identification card,Driver`s License,Voter Id,etc...) or any bussiness document shows your accurate details (e.g: tax filing,etc...) inorder to review your verification request.</p><br>
										<input type="submit" class="btn btn-info form-control" name="submitaccver" id="submitaccver" value="submit" /><br><br>
									</form>
								</div>
								<div id="achievever" style="display:none">
									<form action="" method="post" enctype="multipart/form-data">
										<p id="p">A verification badge is a check symbol that appears next to your achievement name indicating that the achievement is noticable and adds skillset potential to the account holder.</p>
										<p id="p"><span style='color:red'>*</span> Note: Submitting a verification request does not gurantee that your achievement will be verified.</p><br>
										<label>User Id </label>
										<input type="text" class="form-control" name="userid" id="user_id" value="<?php echo $user_id; ?>" disabled style="background-color:white;" /><br>
										<label>Achievement Name</label><span style="color:red;font-size:1.3em;">*</span>
										<select name="achieve_name" id="achieve_name" class="form-control" required >
											<option>select your achievement to get verified</option>
											<?php
												global $con;
												$user_id=$_SESSION['uid'];
												$run_achieves=mysqli_query($con,"select * from achievements where user_id='$user_id'");
												while($row=mysqli_fetch_array($run_achieves)){
													$achieve_name=$row['achieve_title'];
												?> <option><?php echo $achieve_name; ?> </option><?php	
												}
											?>
										</select><br>
										<label>Write something that concerns your achievement</label>
										<textarea name="achievedesc" id="achievedesc" class="form-control" placeholder="write..." style="resize:none;"></textarea><br>
										<label>Please attach a photo of your Achievement certification</label>
										<label class="btn btn-default" id="choosephoto"><b>Photo/ID</b>
										<input type="file" name="photoid" id="photoid" /></label>
										<p id="p"><span style="color:red;">*</span>Note: we require the photocopy of the certificate with accurate details on it and has to match the data provided by you. The certificate must be issued by the respective competition helder or any organization. This photocopy is mandatory inorder to review your request.</p><br>
										<input type="submit" class="btn btn-info form-control" name="submitver2" id="submitver" value="submit" /><br><br>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<div class="col-sm-4">
		</div>
	</div>
		<!-- Alert Modal -->
		<div class="modal fade" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="panel-title"><p><strong>Alert!</strong></p></div>	
					</div>
					<div class="modal-body">
						<h3 style="font-family:Merienda One, cursive;">Please attach a photocopy of the proof !</h3>
					</div>
					<div class="modal-footer">
						<button class='btn btn-info' type='button' data-dismiss='modal' style='align:center;' id='modalclose'>Okay</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Alert select category Modal -->
		<div class="modal fade" id="selectcategorymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="panel-title"><p><strong>Alert!</strong></p></div>	
					</div>
					<div class="modal-body">
						<h3 style="font-family:Merienda One, cursive;">Please select the category of your account !</h3>
					</div>
					<div class="modal-footer">
						<button class='btn btn-info' type='button' data-dismiss='modal' style='align:center;' id='modalclose'>Okay</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Alert select achievemnt Modal -->
		<div class="modal fade" id="selectachievemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="panel-title"><p><strong>Alert!</strong></p></div>	
					</div>
					<div class="modal-body">
						<h3 style="font-family:Merienda One, cursive;">Please select an Achievement to verify !</h3>
					</div>
					<div class="modal-footer">
						<button class='btn btn-info' type='button' data-dismiss='modal' style='align:center;' id='modalclose'>Okay</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Success Modal -->
		<div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="panel-title"><p><strong>Alert!</strong></p></div>	
					</div>
					<div class="modal-body">
						<h3 style="font-family:Merienda One, cursive;">Your verification request has been sent!</h3>
					</div>
					<div class="modal-footer">
						<a href="verifications.php" class='btn btn-info' type='button' id='modalclose'>Okay</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Already Requested Modal -->
		<div class="modal fade" id="alreadyreqstd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="panel-title"><p><strong>Alert!</strong></p></div>	
					</div>
					<div class="modal-body">
						<h3 style="font-family:Merienda One, cursive;">You have already requested for a verification.</h3>
					</div>
					<div class="modal-footer">
						<a href="verifications.php" class='btn btn-info' type='button' id='modalclose'>Okay</a>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
<?php
if(isset($_POST['submitver'])){ 
	global $con;
	$achievedesc=mysqli_real_escape_string($con,$_POST['achievedesc']);	
	$select_achieve_name=mysqli_query($con,"select achieve_title from achievements where achieve_id='$achieve_id'");
	$row=mysqli_fetch_array($select_achieve_name);
	$achieve_name=$row['achieve_title'];
	$fileName = $_FILES["photoid"]["name"]; 
	if($fileName==""){ ?>
		<script>
		function NoPhotoId(){
			$('#alertmodal').modal({
				show: true
			});
		}
		NoPhotoId();
	</script>
	<?php 
		exit();
	}
	
	$check_achieve_exists=mysqli_query($con,"select * from verification_requests where (verification_id='$achieve_id' AND status='Verified') OR (verification_id='$achieve_id' AND status='Not Verified')");
	$num_achieves=mysqli_num_rows($check_achieve_exists);
	if($num_achieves==0){
		$targetFilePath = "images/verificationphotos/".$fileName.".".$user_id; 
		move_uploaded_file($_FILES["photoid"]["tmp_name"], $targetFilePath);
		$insert_ver="insert into verification_requests(user_id,verification_type,achieve_name,verification_id,document,achieve_desc,status,requested_date) values('$user_id','Achievement Verification','$achieve_name','$achieve_id','$targetFilePath','$achievedesc','Not Verified',NOW())";
		$run_ver=mysqli_query($con,$insert_ver);
		if($run_ver){
			?>
			<script>
				function successful(){
					$('#successmodal').modal({
						show: true
					});
				}
				successful();
			</script>
	<?php
		}
	}else{
		?>
			<script>
				function successful(){
					$('#alreadyreqstd').modal({
						show: true
					});
				}
				successful();
			</script>
	<?php
	}
}

//verificationof User Accounts

if(isset($_POST['submitaccver'])){ 
	global $con;
	$knownas=mysqli_real_escape_string($con,$_POST['knownas']);	
	$category=mysqli_real_escape_string($con,$_POST['category']);	
	if($category=="Choose the type of category for your account"){ ?>
		<script>
		function NoCategory(){
			$('#selectcategorymodal').modal({
				show: true
			});
		}
		NoCategory();
	</script>
	<?php 
		exit();
	}
	$fileName = $_FILES["photoid"]["name"]; 
	if($fileName==""){ ?>
		<script>
		function NoPhotoId(){
			$('#alertmodal').modal({
				show: true
			});
		}
		NoPhotoId();
	</script>
	<?php 
		exit();
	}
	
	$check_user=mysqli_query($con,"select * from account_verifications where (user_id='$user_id' and status='Verified') OR (user_id='$user_id' and status='Not Verified')");
	$num_users=mysqli_num_rows($check_user);
	if($num_users==0){
		$targetFilePath = "images/AccountVerifications/".$fileName.".".$user_id; 
		move_uploaded_file($_FILES["photoid"]["tmp_name"], $targetFilePath);
		$insert_ver="insert into account_verifications(user_id,verification_type,user_name,known_as,category,document,status,requested_date) values('$user_id','Account Verification','$username','$knownas','$category','$targetFilePath','Not Verified',NOW())";
		$run_ver=mysqli_query($con,$insert_ver);
		if($run_ver){
			?>
			<script>
				function successful(){
					$('#successmodal').modal({
						show: true
					});
				}
				successful();
			</script>
<?php
		}
	}else{
		?>
		<script>
			function successful(){
				$('#alreadyreqstd').modal({
					show: true
				});
			}
			successful();
		</script>
	<?php
	}
}

//inserting indirect achievements
if(isset($_POST['submitver2'])){ 
	global $con;
	$achieve_name=mysqli_real_escape_string($con,$_POST['achieve_name']);	
	if($achieve_name=="select your achievement to get verified"){ ?>
		<script>
			function NoPhotoId(){
				$('#selectachievemodal').modal({
					show: true
				});
			}
			NoPhotoId();
		</script>
	<?php 
		exit();
	}
	$achievedesc=mysqli_real_escape_string($con,$_POST['achievedesc']);	
	$select_achieve_id=mysqli_query($con,"select achieve_id from achievements where achieve_title='$achieve_name' and user_id='$user_id'");
	$row=mysqli_fetch_array($select_achieve_id);
	$achieve_id=$row['achieve_id'];
	$fileName = $_FILES["photoid"]["name"]; 
	if($fileName==""){ ?>
		<script>
			function NoPhotoId(){
				$('#alertmodal').modal({
					show: true
				});
			}
			NoPhotoId();
		</script>
	<?php 
		exit();
	}
	
	$check_achieve_exists=mysqli_query($con,"select * from verification_requests where (verification_id='$achieve_id' AND status='Verified') OR (verification_id='$achieve_id' AND status='Not Verified')");
	$num_achieves=mysqli_num_rows($check_achieve_exists);
	if($num_achieves==0){
		$targetFilePath = "images/verificationphotos/".$fileName.".".$user_id; 
		move_uploaded_file($_FILES["photoid"]["tmp_name"], $targetFilePath);
		$insert_ver="insert into verification_requests(user_id,verification_type,achieve_name,verification_id,document,achieve_desc,status,requested_date) values('$user_id','Achievement Verification','$achieve_name','$achieve_id','$targetFilePath','$achievedesc','Not Verified',NOW())";
		$run_ver=mysqli_query($con,$insert_ver);
		if($run_ver){
			?>
			<script>
				function successful(){
					$('#successmodal').modal({
						show: true
					});
				}
				successful();
			</script>
	<?php
		}
	}else{
		?>
			<script>
				function successful(){
					$('#alreadyreqstd').modal({
						show: true
					});
				}
				successful();
			</script>
	<?php
	}
}
?>