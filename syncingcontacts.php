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
	margin-top:1%;
}
span{
	margin-left:3%;
	font-size:1.5em;
	font-weight:2px;
	font-family:bold;
}

/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
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
  height: 26px;
  width: 26px;
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
	<?php
		global $con;
		$user_id=$_SESSION['uid'];
		$select_cnctsync=mysqli_query($con,"select contacts_sync from general_settings where user_id='$user_id'");
		$row_cnctsync=mysqli_fetch_array($select_cnctsync);
		$synccontact=$row_cnctsync['contacts_sync'];
	?>
	<!-- CODE FOR CONTACT SYNCING SETTINGS -->
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<a href="generalsettings.php" style="font-size:2em;color:black;" id="returnlink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<span style="font-size:1.5em;font-family: 'Merienda One',cursive;margin-left:4.5%;"><strong>Contact sync settings</strong></span>
				</div>
				<div class="panel-body" id="gsettings">
					<div class="row">
						<span>Sync Contacts</span>
					<?php if($synccontact=="on"){ ?>
						<label class="switch">
						  <input type="checkbox" checked onchange="changecontactsync()" />
						  <span class="slider round"></span>
						</label>
					<?php }elseif($synccontact=="off"){ ?>
						<label class="switch">
						  <input type="checkbox" onchange="changecontactsync()" />
						  <span class="slider round"></span>
						</label>
					<?php } ?>
						<br><br>
						<p style="margin-left:3%;font-family:bold;font-size:1.2em;color:#878787;">This helps finding your contacts easy to connect in the ConectYu community. Your contacts will be recommended by storing them in our servers so that you could choose whom to connect.</p>
					</div>
					
					<script type="text/javascript">
						function changecontactsync(){
							$.ajax({
								url:'syncingcontacts.php',
								data:'chngcnctsync=1',
								type:'post',
								success:function(res){
									window.open('syncingcontacts.php','_self');
								}
							});
						}
					</script>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</body>
</html>

<?php
//changing data usage
if(isset($_POST['chngcnctsync'])){
	global $con;
	$user_id=$_SESSION['uid'];
	$select_cnctsync=mysqli_query($con,"select contacts_sync from general_settings where user_id='$user_id'");
	$row_cnctsync=mysqli_fetch_array($select_cnctsync);
	$synccontact=$row_cnctsync['contacts_sync'];
	
	if($synccontact=="on"){
		$change_datausage=mysqli_query($con,"update general_settings set contacts_sync='off',updated_date=NOW() where user_id='$user_id'");
	}else{
		$change_datausage=mysqli_query($con,"update general_settings set contacts_sync='on',updated_date=NOW() where user_id='$user_id'");
	}
}
?>
