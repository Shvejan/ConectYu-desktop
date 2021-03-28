<?php
session_start();
include("includes/connection.php");
include("header.php");
include("functions/functions.php");
?>
<?php
	global $con;
	$u_id=$_SESSION['uid'];
	$page_id=$_GET['page_id'];
	$run_pagedetails=mysqli_query($con,"select * from pages where page_id='$page_id'");
	$row_pagedetails=mysqli_fetch_array($run_pagedetails);
	
	$select_pgsettings="select * from pagesettings where page_id='$page_id'";
	$run_pgsettings=mysqli_query($con,$select_pgsettings);
	$row_data=mysqli_fetch_array($run_pgsettings);
	$privacy_value=$row_data['page_privacy'];
	$cmnt_selection=$row_data['comment_selection'];
	
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
span{
	margin-left:3%;
	font-size:1.5em;
	font-weight:2px;
	font-family:bold;
}
.switch{
	float:right;
	margin-right:3%;
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

#changepgprivacybtn{
	width:150px;
}
input[type="radio"]{
	float:right;
	margin-right:5%;
	width:17px;
	height:17px;
}
label{
	font-size:1.2em;
	margin-left:35%;
}
#tagstab a,#blockedtab a{
	font-family:bold;
	font-size:1.5em;
	display:block;
	width:100%;
	color:black;
	padding:10px;
	cursor:pointer;
}
#tagstab a:hover,#blockedtab a:hover{
	text-decoration:none;
	background-color:#e6e6e6;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<!-- CODE FOR Page SETTINGS -->
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<a href="pageprofile.php?page_id=<?php echo $page_id; ?>" style="font-size:2em;color:black;"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<span style="font-size:1.5em;font-family: 'Merienda One',cursive;margin-left:4.5%;"><strong>Page Settings</strong></span>
				</div>
				<div class="panel-body" id="ssettings">
					<div class="row">
						<span>Page Privacy</span>
						<?php if($privacy_value=="private"){ ?>
						<label class="switch">
						  <input type="checkbox" checked onchange="changingprivacy()" />
						  <span class="slider round"></span>
						</label>
						<?php }else{ ?>
						<label class="switch">
						  <input type="checkbox" onchange="changingprivacy()" />
						  <span class="slider round"></span>
						</label>
						<?php } ?>
						
						<p style="margin-left:3%;font-family:bold;font-size:1.2em;color:#4588f5;"><?php echo $privacy_value; ?></p>
					</div><hr>
					<script>
					function changingprivacy(){
						$('#changeprivacy').modal({
								show: true
						});
					}
					</script>
					
					<div class="modal fade" id="changeprivacy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<div class="panel-title"><p><strong>Confirmation of Changing privacy</strong></p></div>	
								</div>
								<div class="modal-body">
									<form action="" method="post">
										<?php if($privacy_value=="private"){ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your page will be public now.So everyone could see your photos, videos, etc...</i></p>
										<?php }else{ ?>
										<p style="font-family:bold;font-size:1.3em;"><i>Your page will be private now.So no one could see your photos, videos, etc... except your followers.</i></p>
										<?php } ?>
								</div>
								<div class="modal-footer">
										<button class="btn btn-info" type="submit" id="changepgprivacybtn" name="changepgprivacybtn">Confirm</button>
									</form>
								</div>
							</div>
						</div>
					</div><!-- end of changing privacy modal -->
					
					<div class="row">
						<span>Comments</span>
						<p style="margin-left:3%;font-family:bold;font-size:1.2em;color:#4588f5;"><i>See who can comment you!</i></p>
						<form action="" method="post">
						<?php if($cmnt_selection == "everyone"){ ?>
							<label>Everyone</label>
							<input type="radio" name="comments" value="everyone" checked /><br>
							<label>Your followers</label>
							<input type="radio" name="comments" value="followingcon" /><br>
						<?php }elseif($cmnt_selection == "followingcon"){ ?>
							<label>Everyone</label>
							<input type="radio" name="comments" value="everyone" /><br>
							<label>Your followers</label>
							<input type="radio" name="comments" value="followingcon" checked /><br>
						<?php } ?>
					</div><hr>
					
					<div class="row" id="tagstab">
						<a href="" id="seetags">Tags<span style="float:right;margin-right:5%;font-size:1.2em;color:#b6b7b8;">see  <i class="fa fa-chevron-right" aria-hidden="true" style="font-size:0.7em;"></i></span>
						<br><i style="font-size:0.8em;color:#4588f5;">See who tagged you previously!</i></a>
					</div><hr>
					
					<input type="submit" class="btn btn-default" name="chpgsettings" id="chpgsettings" value="Save Changes" style="float:right;" />
				</form>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</body>
</html>
<?php
//changing privacy of the page.
if(isset($_POST['changepgprivacybtn'])){
	global $con;
	$page_id=$_GET['page_id'];
	$select_privacy="select page_privacy from pagesettings where page_id='$page_id'";
	$run_privacy=mysqli_query($con,$select_privacy);
	$row_value=mysqli_fetch_array($run_privacy);
	$value=$row_value['page_privacy'];
	if($value=="public"){
		$new_value="private";
	}else{
		$new_value="public";
	}
	
	$update_privacy="update pagesettings set page_privacy='$new_value' where page_id='$page_id'";
	$run_update=mysqli_query($con,$update_privacy);
	$update_privacy2="update pages set page_privacy='$new_value' where page_id='$page_id'";
	$run_update2=mysqli_query($con,$update_privacy2);
	if($run_update){
		echo "<script>window.open('pagesettings.php?page_id=$page_id','_self');</script>";
	}
}

//changing settings of page
if(isset($_POST['chpgsettings'])){
	$prisetngs = new PageSettings();
	$prisetngs->PageSettings();
}

class PageSettings{
	function PageSettings(){
		global $con;
		$page_id=$_GET['page_id'];
		$com_selection=htmlentities(mysqli_real_escape_string($con,$_POST['comments']));
		
		$update_privacy="update pagesettings set comment_selection='$com_selection' where page_id='$page_id'";
		$run_update=mysqli_query($con,$update_privacy);
		if($run_update){
			echo "<script>window.open('pagesettings.php?page_id=$page_id','_self');</script>";
		}
	}
}
?>