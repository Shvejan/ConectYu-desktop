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
	$user_desig=$row_user['user_designation'];
	
	
		global $con;
		$pageid=$_GET['page_id'];
		$run_pageid=mysqli_query($con,"select created_by_id from pages where page_id='$pageid'");
		$row_uid=mysqli_fetch_array($run_pageid);
		$userid=$row_uid['created_by_id'];
	
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
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
	
</head>
<?php
	global $con;
	$page_id=$_GET['page_id'];
	$page_details="select * from pages where page_id='$page_id'";
	$run_page=mysqli_query($con,$page_details);
	$row_page=mysqli_fetch_array($run_page);
	$pagename=$row_page['pagename'];
	$pagedesc=$row_page['pagedesc'];
	$pagecat=$row_page['pagecat'];
	$pagepic=$row_page['pagepic'];
	//$pagecover=$row_page['pagecover'];
	
	
?>
<style>
body{
	background-color:#f2f5f4;
	overflow-x:hidden;
}
#editpgpic{
	width:130px;
	height:130px;
	border-radius:65px;
	margin-left:41%;
	border:solid #e6e6e6 5px;
}
#editpagepicbtn{
	margin-left:43%;
	margin-top:-180px;
	width:100px;
	color:#34baeb;
	font-family:bold;
	font-size:1.2em;
}
#confirmpgpic{
	width:120px;
	margin-left:25%;
	margin-right:1px;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<!-- Code after the nav bar -->
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<img src="images/prfpics/<?php echo $pagepic; ?>" class="img-responsive"  id="editpgpic" ><br>
					<label class='btn btn-default' id="editpagepicbtn"><b>Edit</b></label>
					<script>
						$("#editpagepicbtn").click(function(){
							$('#showpagepic').modal({
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
								
								$('#showpagepic').modal({
									show: true
								});
							}
						}
					</script>
					<!-- Modal -->
					<div class="modal fade" id="showpagepic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="panel panel-default">
										<div class="panel-heading" style="background-color:white;">
											<p><strong style="font-family:bold;font-size:1.5em;">Change page profile picture</strong></p>
										</div>
										<div class="panel-body">
											<img id="preview" onerror="this.style.display='none'"/>
										</div>
										<div class="panel-footer">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="row">
													<label class="btn btn-success" id="chooseprfpic"><b>Choose</b>
													<input type="file" name="newpgpic" style="display:none;" id="newpgpic" onchange="readURL(this);" /></label>
													<button class="btn btn-info" type="submit" name="confirmpgpic" id="confirmpgpic"><b>Confirm</b></button>
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
							<legend id="legend"><b>Page information</b></legend>
							<div class="alert alert-danger" style="display:none;" id="pgcaterr">some information is missing!</div>
							<label id="llbl">Page name :</label>
							<input type="text" name="pagename" id="info" placeholder="write..." class="form-control" style="border:none;border-bottom:#8a8a8a 1.3px dotted;font-size:1.1em;font-family:'Merienda One',cursive;" value="<?php echo $pagename; ?>" required>
							<label id="llbl">Page category :</label>
							<select class="form-control" name="pagecat" id="pagecat" onchange="pagecatfun();" style="font-family:'Merienda One',cursive;" required >
								<option><i><?php echo $pagecat; ?></i></option>
								<option>select your page category</option>
								<option>Entrepreneur</option>
								<option>Bussiness/Brand</option>
								<option>Social Activist</option>
								<option>Venture Catalyst</option>
								<option>Investor</option>
								<option>Organization</option>
								<option>Educational Institution</option>
								<option>Sports Person</option>
								<option>Comics</option>
								<option>public figure</option>
								<option>Others</option>
							</select>
							<script type="text/javascript">
								function pagecatfun(){
									var pg=document.getElementById('pagecat').value;
									if(pg=="Others"){
										var pg1=document.getElementById('pagecat1');
										pg1.setAttribute('style','display:display');
									}
								}
							</script>
							<div id="pagecat1" style="display:none">
								<br>
								<input class="form-control" type="text" name="pagecat1" placeholder="specify the category of your page" style="font-family:'Merienda One',cursive;" />
								<br>
							</div>
							<label id="llbl">Page description :</label>
							<textarea type="text" name="pagedesc" id="info" placeholder="write..." class="form-control" style="border:none;border-bottom:#8a8a8a 1.3px dotted;font-size:1.1em;font-family:'Merienda One',cursive;"  required><?php echo $pagedesc; ?></textarea>
							<br>
							<p><i style="color:red;">*Note: Enter the valid information.</i></p>
							<hr>
							<button type="submit" class="btn btn-success btn-md" id="updatedetails" name="updatepgdetailsbtn"><i style="font-family:bold;font-size:1.3em;">Submit</i></button>
						</fieldset>
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
//updating page details
if(isset($_POST['updatepgdetailsbtn'])){
	global $con;
	$page_id=$_GET['page_id'];
	$pagename=htmlentities(mysqli_real_escape_string($con,$_POST['pagename']));
	$pagecat=htmlentities(mysqli_real_escape_string($con,$_POST['pagecat']));
	$pagedesc=htmlentities(mysqli_real_escape_string($con,$_POST['pagedesc']));
	if($pagecat=="select your page category"){
		echo "
			<script>
				var err=document.getElementById('pgcaterr');
				err.setAttribute('style','display:display');
			</script>
		";
		return;
	}elseif($pagecat=="Others"){
		$pagecat=htmlentities(mysqli_real_escape_string($con,$_POST['pagecat1']));
		if($pagecat==""){
			echo "
				<script>
					var err=document.getElementById('pgcaterr');
					err.setAttribute('style','display:display');
				</script>
			";
			return;
		}
	}
	
	$update_pgdetails="update pages set pagename='$pagename',pagedesc='$pagedesc',pagecat='$pagecat' where page_id='$page_id'";
	$run_update=mysqli_query($con,$update_pgdetails);
	if($run_update){
		echo "<script>window.open('editpages.php?page_id=$page_id','_self');</script>";
		echo "<script>alert('success!');</script>";
		echo "
			<script>$('#pagecat1').val('');</script>
		";
	}
}

//change page profile pic
if(isset($_POST['confirmpgpic'])){
	$user_id=$_GET['page_id'];
	$u_image=$_FILES['newpgpic']['name'];
	$image_tmp=$_FILES['newpgpic']['tmp_name'];
	if($u_image==''){
		echo"<script>alert('Please choose a image.');</script>";
		echo "<script>window.open('editpages.php?page_id=$page_id','_self');</script>";
	}else{
		move_uploaded_file($image_tmp,"images/prfpics/$u_image.$user_id");
		$update="update pages set pagepic='$u_image.$user_id' where page_id='$page_id'";
		$run=mysqli_query($con,$update);
		echo "<script>window.open('editpages.php?page_id=$page_id','_self');</script>";
	}
}
?>
