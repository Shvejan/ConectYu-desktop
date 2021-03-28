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
	padding:5px;
}
.switch{
	float:right;
	margin-right:8%;
	margin-top:-6%;
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
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<!-- getting security settings details
	<?php
		global $con;
		$select_sdetils=mysqli_query($con,"select * from security_settings where user_id='$u_id'");
		$row_sdetails=mysqli_fetch_array($select_sdetils);
		$mobpriv=$row_sdetails['mobile_privacy'];
		$twostepverf=$row_sdetails['twostep_verf'];
	?>
	<!-- CODE FOR SECURITY SETTINGS -->
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<a href="settings.php" style="font-size:2em;color:black;" id="returnlink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<span style="font-size:1.5em;font-family: 'Merienda One',cursive;margin-left:4.5%;"><strong>Security Settings</strong></span>
				</div>
				<div class="panel-body" id="ssettings">
					<h4 style="font-family: 'Roboto Slab', cursive;"><strong>Login Security</strong></h4>
					<a id="changemail">Email address<br><i style="font-size:0.8em;color:#4588f5;"><?php echo $user_email; ?></i></a>
					<a id="chnagepswrd">Change password<br><i style="font-size:0.8em;color:#4588f5;">new password</i></a>
					<a id="changeph">Mobile number &nbsp <span style="font-size:0.8em;float:right;margin-right:3%;margin-top:5px;">Show on profile</span><br><i style="font-size:0.8em;color:#4588f5;"><?php if($phno==0){ echo "add phone number";}else{ echo $phno; }?></i></a>
					
					<?php if($mobpriv=="No"){ ?>
						<label class="switch">
							<input type="checkbox" onchange="changemobpriv();" />
							<span class="slider round"></span>
						</label>
					<?php }elseif($mobpriv=="Yes"){ ?>
						<label class="switch">
							<input type="checkbox" checked onchange="changemobpriv();" />
							<span class="slider round"></span>
						</label>
					<?php } ?>
					<a id="twostepauthent" href="twostepauthentication.php">Two-step Authentication<br><i style="font-size:0.8em;color:#4588f5;">Add two-step authentication for more secured login</i></a>
					<hr>
					<h4 style="font-family: 'Roboto Slab', cursive;"><strong>Data and History</strong></h4>
					<a id="downloaddata">Download Data<br><i style="font-size:0.8em;color:#4588f5;"></i></a>
					<a href="search_history.php?user_id=<?php echo $_SESSION['uid']; ?>" id="search_history">Search History<br><i style="font-size:0.8em;color:#4588f5;"></i></a>
					<script type="text/javascript">
						$('#chnagepswrd').click(function(){
							//open password changing modal
							$('#chnagepswrdModal').modal({
								show: true
							});
						});
						$('#changemail').click(function(){
							//open email changing modal
							$('#changeemailModal').modal({
								show: true
							});
						});
						$('#changeph').click(function(){
							//open mobile number changing modal
							$('#changephnoModal').modal({
								show: true
							});
						});
						
						//changing mobile privacy
						function changemobpriv(){
							$('#changemobprivmodal').modal({
									show: true
							});
						}
						//closing modal
						function closemodalfun(){
							window.open('securitysettings.php','_self');
						}
					</script>
					<!-- Change password modal -->
					<div class="modal fade" id="chnagepswrdModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Change password</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<label id="llbl">Old password :</label><br><input type="password" name="old_pass" id="passinfo" placeholder="old password..." style="width:90%" required>
										<br><br>
										<label id="llbl">New password :</label><br><input type="password" name="new_pass1" id="passinfo" placeholder="New password..." style="width:90%" required>
										<br><br>
										<label id="llbl">Rewrite password :</label><br><input type="password" name="new_pass2" id="passinfo" placeholder="Rewrite password..." style="width:90%" required>
										<br><br>
								</div>
								<div class="modal-footer">
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
										<button class="btn btn-info" type="submit" id="changepass" name="changepass">Confirm</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of changing password modal -->
					
					<!-- Change Email Address modal -->
					<div class="modal fade" id="changeemailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Change Email Address</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<label id="llbl"> New Email Address :</label><br><input type="email" name="new_email" id="emailinfo" placeholder="new email address..." style="width:90%" required>
										<br><br>
										<label id="llbl">password :</label><br><input type="password" name="pswrd" id="passinfo" placeholder="Enter your password..." style="width:90%" required>
										<br><br>
										
								</div>
								<div class="modal-footer">
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
										<button class="btn btn-info" type="submit" id="changeemail" name="changeemail">Confirm</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of changing Email Address modal -->
					
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
					
					<!-- Changing mobile number privacy modal -->
					<div class="modal fade" id="changemobprivmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Confirmation of Changing privacy</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<?php if($mobpriv=="No"){ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your mobile number will be public now.So everyone could see your mobile number.</i></p>
										<?php }else{ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your mobile number will be private now.So nobody could see your mobile number.</i></p>
										<?php } ?>
								</div>
								<div class="modal-footer">
										<button class="btn btn-info" type="submit" id="changemobprivbtn" name="changemobprivbtn" style="width:120px;">Confirm</button>
										<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose' style="width:120px;" onclick="closemodalfun();">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of changing mobile number privacy modal -->
					
				</div>
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</body>
</html>

<?php
if(isset($_POST['changepass'])){
	$pass = new ChangePassword();
	$pass->passwordChanging();
}

if(isset($_POST['changeemail'])){
	$email = new ChangeEmail();
	$email->EmailChanging();
}
if(isset($_POST['changephno'])){
	$phno = new ChangePhoneNum();
	$phno->PhnoChanging();
}
class ChangePassword{
	function passwordChanging(){
		global $con;
		$user_id=$_SESSION['uid'];
		
		$old_pass = htmlentities(mysqli_real_escape_string($con,$_POST['old_pass']));
		$old_pass=md5($old_pass);
		$new_pass1 = htmlentities(mysqli_real_escape_string($con,$_POST['new_pass1']));
		$new_pass2 = htmlentities(mysqli_real_escape_string($con,$_POST['new_pass2']));
		$select_oldpass="select * from users where user_id='$user_id'";
		$run_oldpass=mysqli_query($con,$select_oldpass);
		$row_oldpass=mysqli_fetch_array($run_oldpass);
		$old_password=$row_oldpass['user_pass'];
		if($old_pass==$old_password){
			if($new_pass1 == $new_pass2){
				if(strlen($new_pass1)>=8 and strlen($new_pass1)<=16){
					$new_pass1=md5($new_pass1);
					$update_pass="update users set user_pass='$new_pass1' where user_id='$user_id'";
					$run_update=mysqli_query($con,$update_pass);
					if($run_update){
						echo "<script>alert('Your password has been changed successfully.');</script>";
					}
				}else{
					echo "<script>alert('Your password must be in between 8-16 characters long.');</script>";
				}
			}else{
				echo "<script>alert('Passwords didn't match.Try again!');</script>";
			}
		}else{
			echo "<script>alert('check your old password correctly.');</script>";
		}
	}
}

class ChangeEmail{
	function EmailChanging(){
		global $con;
		$user_id=$_SESSION['uid'];
		
		$new_email= htmlentities(mysqli_real_escape_string($con,$_POST['new_email']));
		$pswrd = htmlentities(mysqli_real_escape_string($con,$_POST['pswrd']));
		$pswrd=md5($pswrd);
		
		$select_oldpass="select * from users where user_id='$user_id'";
		$run_oldpass=mysqli_query($con,$select_oldpass);
		$row_oldpass=mysqli_fetch_array($run_oldpass);
		$old_password=$row_oldpass['user_pass'];
		if($pswrd==$old_password){
			$update_email="update users set user_email='$new_email' where user_id='$user_id'";
			$run_email=mysqli_query($con,$update_email);
			if($run_email){
				echo "<script>window.open('securitysettings.php','_self');</script>";
			}else{
				echo "<script>window.open('securitysettings.php','_self');</script>";
			}
		}else{
			echo "<script>alert('Invalid password. Try again!');</script>";
		}
	}
}

class ChangePhoneNum{
	function PhnoChanging(){
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
				echo "<script>window.open('securitysettings.php','_self');</script>";
			}else{
				echo "<script>window.open('securitysettings.php','_self');</script>";
			}
		}else{
			echo "<script>alert('Invalid password. Try again!');</script>";
		}
	}
}

//changing mobile privacy
if(isset($_POST['changemobprivbtn'])){
	global $con;
	$user_id=$_SESSION['uid'];
	$select_mobpriv=mysqli_query($con,"select mobile_privacy from security_settings where user_id='$user_id'");
	$row_mobpriv=mysqli_fetch_array($select_mobpriv);
	$oldmobpriv=$row_mobpriv['mobile_privacy'];
	if($oldmobpriv=="Yes"){
		$newmobpriv="No";
	}else{
		$newmobpriv="Yes";
	}
	
	$update_mobpriv=mysqli_query($con,"update security_settings set mobile_privacy='$newmobpriv',updated_date=NOW() where user_id='$user_id'");
	if($update_mobpriv){
		echo "<script>window.open('securitysettings.php','_self');</script>";
	}
}
?>
