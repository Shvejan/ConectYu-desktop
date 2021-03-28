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
	<title>ConectYu-Explore</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php echo $user_id; ?>'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet"> <!-- signin link -->
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
#expnav{
	position:fixed;
	background-color:white;
	width:100%;
	padding:10px;
	margin-left:0.1%;
	z-index:1;
}
.expnavlinks{
	color:#626663;
	font-size:1.2em;
	display:block;
	text-align:center;
	cursor:pointer;
}
.expnavlinks:hover{
	text-decoration:none;
	color:black;
}
#createpagebtn{
	width:100%;
}
#subpage{
	width:100%;
}
input[type="file"]{
	display:none;
}
#prfskipbtn{
	width:70%;
}
#prfcontinue{
	width:25%;
}
#pagelink{
	color:black;
	background-color:white;
	padding:10px;
	display:block;
	margin-bottom:5px;
}
#pagelink:hover{
	color:black;
	text-decoration:none;
	background-color:#f5f6f7;
}
#pagprfpic{
	width:60px;
	height:60px;
	border-radius:30px;
	float:left;
	border:solid 1px #e6e6e6;
}
#apgname{
	margin-left:80px;
	margin-top:0px;
}
#apgfollowers{
	margin-left:80px;
	margin-top:0px;
	color:#969493;
}
#yourpageslabel{
	font-family:'Merienda one', cursive;
	margin-top:0px;
}
#pagepluslbl{
	float:right;
	margin-top:3%;
	margin-right:10%;
	font-size:2.3em;
	color:#e6e6e6;
}
#searchconscore{
	border-radius:23px;
	float:right;
}
#scoresearchicon{
	float:right;
	margin-top:-5.3%;
	font-size:1.3em;
	margin-right:3%;
	background-color:white;
	cursor:pointer;
}
#prfpic1{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
}
#postlabelname{
	font-size:1.6em;
	color:black;
	margin-top:15px;
	text-decoration:none;
}
#postlabelname:hover{
	text-decoration:none;
}
#designation{
	margin-top:-30px;
	color:black;
}
#designation:hover,#credits:hover{
	text-decoration:none;
}
#credits{
	color:black;
	margin-top:-5px;
	font-size:1.2em;
	font-family:'Merienda One',cursive;
}
#scorepaneltab{
	height:82px;
}
#dropdownmenu{
	margin-left:50px;
	margin-top:30px;
}
.dropdown{
	cursor:pointer;
}
</style>
<style>
#prf_pic1{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
}
#post_labelname{
	font-size:1.6em;
	color:black;
	margin-top:5px;
	text-decoration:none;
}
#post_labelname:hover{
	text-decoration:none;
}
#post_img{
	position:absolute;
	width:95%;
	height:580px;
	align:center;
}
#post_body{
	height:600px;
}
@media only screen and (max-width: 760px) {
	#dropdownmenu{
		margin-right:100px;
		margin-top:30px;
	}
}

</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<nav class="navbar navbar-default navbar-fixed-top navbar-sticky" id="expnav" style="margin-top:64px;">
		<div class="row">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-3">
						<a href="explore.php?user_id=<?php echo $_SESSION['uid']; ?>" id="newsfeed" class="expnavlinks newsfeed" style="color:;font-size:;"><i class="fa fa-newspaper-o" aria-hidden="true" style="color:#626663;font-size:1.25em;"></i> News Feed</a>
					</div>
					<div class="col-sm-3">
						<a  href="expuserscore.php?user_id=<?php echo $_SESSION['uid']; ?>" id="conectyuscore" class="expnavlinks conectyuscore"><i class="fa fa-bar-chart" aria-hidden="true" style="color:#626663;font-size:1.2em;"></i> ConectYu Score</a>
					</div>
					<div class="col-sm-3">
						<a href="exppages.php?user_id=<?php echo $_SESSION['uid']; ?>" id="pages" class="expnavlinks pages" style="color:black;"><i class="fa fa-columns" aria-hidden="true" style="color:black;font-size:1.2em;"></i> Pages</a>
					</div>
					<div class="col-sm-3">
						<a href="expevents.php?user_id=<?php echo $_SESSION['uid']; ?>" id="events" class="expnavlinks events"><i class="fa fa-calendar" aria-hidden="true" style="color:#626663;font-size:1.2em;"></i> Events</a>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
			</div>
		</div>
	</nav>
	<div class="row" style="margin-top:95px;">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-5">
				<button class="btn btn-md btn-info" id="createpagebtn">Create page &nbsp <i class="fa fa-plus" aria-hidden="true" style="color:white"></i></button>
				
				<script>
					$('#createpagebtn').click(function(){
						$('#creatingpagemodal').modal({
							show: true
						});
					});
				</script>
					<!-- creating page modal  -->
					<div class="modal fade" id="creatingpagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header" style="background-color:#4691f2;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<div class="panel-title"><p><strong>Create a page!</strong></p></div>	
								</div>
								<div class="modal-body">
									<div class="panel panel-deafult">
										<div class="panel-body">
											<h3 style="margin-top:-15px;font-family: 'Merienda One', cursive;">Connect, share, showcase your products and services with people in your community, organization, team or group.</h3><br>
											<div class="row">
												<div class="col-sm-6">
													<img src="images/page3.png" width="100%" height="50%" />
												</div>
												<div class="col-sm-6">
													<!--form action="" method="post"-->
														<div class="alert alert-danger" width="100%" style="display:none;" id="caterror">Please fill all the details.</div>
														<label>Name of the page</label>
														<input class="form-control" type="text" name="pagename" id="pagename" placeholder="Name of the page" required />
														<br>
														<label>Descrition</label>
														<textarea rows="2" cols="10" class="form-control" name="pagedesc" id="pagedesc" placeholder="write..." required ></textarea>
														<br>
														<label>Category</label>
														<select class="form-control" name="pagecat" id="pagecat" onchange="pagecatfun();" required >
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
														<div id="pagecat1" style="display:none">
															<br>
															<input class="form-control" type="text" name="pgcat" id="pgcat" placeholder="specify the category of your page" />
														</div>
														<br>
														<div class="row">
															<div class="col-sm-12">
																<p>By clicking on submit, you will agree to <a href="">page policy</a>,<a href="">Terms & conditions</a>.<p>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-2">
															</div>
															<div class="col-sm-8">
																<input type="submit" class="btn btn-info btn-md" id="subpage" name="subpage" value="submit" />
															</div>
															<div class="col-sm-2">
															</div>
														</div>
													<!--/form-->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						function pagecatfun(){
							var cat=document.getElementById('pagecat').value;
							if(cat=="Others"){
								var oth=document.getElementById('pagecat1');
								oth.setAttribute('style','display:display');
							}else{
								var oth=document.getElementById('pagecat1');
								oth.setAttribute('style','display:none');
							}
						}
					</script>
					
					<!-- Taking page profile pic and cover pic -->
					<div class="modal fade" id="pageprfpiccovermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header" style="background-color:#4691f2;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<div class="panel-title"><p><strong>Create a page!</strong></p></div>	
								</div>
								<div class="modal-body">
									<div class="panel panel-deafult">
										<div class="panel-body">
											<h3 style="margin-top:-15px;font-family: 'Merienda One', cursive;">Help people find your page with the profile picture of your page.</h3><br>
											<div class="row">
												<div class="col-sm-3">
												</div>
												<div class="col-sm-6">
													<img src="images/profile.png" width="100%" height="100%" />
												</div>
												<div class="col-sm-3">
												</div>
											</div>
											<br>
											<div class="row">
												<form name="post_form" method="post" action="" enctype="multipart/form-data">
													<input type="text" id="pageid" name="pageid" style="display:none;" />
													<div class="col-sm-2 col-xs-3">
														<button class="btn btn-default btn-md" id="prfskipbtn">Skip</button>
													</div>
													<div class="col-sm-10 col-xs-9">
														<input type="submit" class="btn btn-info" name="prfcontinue" id="prfcontinue" style="float:right;" value="Continue" />
														<label class='btn btn-default' style="float:right;margin-right:5px;">select &nbsp <i class="fa fa-camera-retro" aria-hidden="true"></i><input type="file"  name="pgprfpic" /></label>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<br><br>
				<div id="allpages">
					<h3 id="yourpageslabel">Your pages</h3>
					<?php
						//showing all the pages 
						global $con;
						$user_id=$_SESSION['uid'];
						$select_page="select * from pages where created_by_id='$user_id'";
						$run_page=mysqli_query($con,$select_page);
						$num_pages=mysqli_num_rows($run_page);
						if($num_pages!=0){
							while($row_page=mysqli_fetch_array($run_page)){
								$pagename=$row_page['pagename'];
								$pageid=$row_page['page_id'];
								$page_prf=$row_page['pagepic'];
								$run_num_followers=mysqli_query($con,"select * from following where followed_user='$pageid'");
								$num_page_followers=mysqli_num_rows($run_num_followers);
								
								echo "
									<div class='row'>
										<div class='col-sm-12'>
											<a href='pageprofile.php?page_id=$pageid' id='pagelink'>
												<i class='fa fa-plus' aria-hidden='true' id='pagepluslbl'></i>
												<img src='images/prfpics/$page_prf' class='img img-responsive' id='pagprfpic' />
												<h3 id='apgname'>$pagename</h3>
												<p id='apgfollowers'>$num_page_followers followers</p>
											</a>
										</div>
									</div>
								";
							}
						}else{
							echo"
								<h4 style='font-family:bold;color:#b3b5b4;text-align:center;margin-top:20%;'>You have not created pages yet!</h4>
							";
						}
						
					?>
				</div>
				
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
	
</body>
</html>

<script type="text/javascript">
//sending page creation data to database
$('#subpage').click(function(){
	var pagename=document.getElementById('pagename').value;
	var pagedesc=document.getElementById('pagedesc').value;
	var pagecat=document.getElementById('pagecat').value;
	if(pagecat=="select your page category"){
		var err=document.getElementById('caterror');
		err.setAttribute('style','display:display');
		return;
	}else if(pagecat=="Others"){
		var pagecat=document.getElementById('pgcat').value;
	}
	if(pagecat==""){
		var err=document.getElementById('caterror');
		err.setAttribute('style','display:display');
		return;
	}
	var pageid=<?php echo json_encode(rand(111111111111111,999999999999999)); ?>;
	$.ajax({
		url:'exppages.php',
		data:'creatingpage=1&pagename='+pagename+'&pagedesc='+pagedesc+'&pagecat='+pagecat+'&pageid='+pageid,
		type:'post',
		success:function(res){
			$('#creatingpagemodal').modal('hide');
			$('#pageid').val(pageid);
			$('#pagename').val('');
			$('#pagedesc').val('');
			$('#pagecat').val('select your page category');
			var err=document.getElementById('caterror');
			err.setAttribute('style','display:none');
			$('#pgcat').val('');
			var pgc=document.getElementById('pgcat');
			pgc.setAttribute('style','display:none');
			$('#pageprfpiccovermodal').modal({
				show: true
			});
		}
	});
	
});
</script>
<?php	
//creating ConectYu Page
if(isset($_POST['creatingpage'])){
	global $con;
	$user_id=$_SESSION['uid'];
	$pagename=htmlentities(mysqli_real_escape_string($con,$_POST['pagename']));
	$pagedesc=htmlentities(mysqli_real_escape_string($con,$_POST['pagedesc']));
	$category=htmlentities(mysqli_real_escape_string($con,$_POST['pagecat']));
	$page_id=htmlentities(mysqli_real_escape_string($con,$_POST['pageid']));
	
	$create_page="insert into pages(created_by_id,page_id,pagename,pagedesc,pagecat,pagepic,page_privacy,created_date) values('$user_id','$page_id','$pagename','$pagedesc','$category','','public',NOW())";
	$run_page=mysqli_query($con,$create_page);
	if($run_page){
		$insert_pagesettings="insert into pagesettings(page_id,comment_selection,page_privacy,updated_date) values('$page_id','everyone','public',NOW())";
		$run_pagesettings=mysqli_query($con,$insert_pagesettings);
	}
	return;
}

//uploading profile picture for page
if(isset($_POST['prfcontinue'])){
	global $con;
	$user_id=$_SESSION['uid'];
	$pageid=htmlentities(mysqli_real_escape_string($con,$_POST['pageid']));
	$uploaded_file=$_FILES['pgprfpic']['name'];
	$file_tmp =$_FILES['pgprfpic']['tmp_name'];
	$file_id=rand(10000000,99999999);
	move_uploaded_file($file_tmp,"images/prfpics/$uploaded_file.$file_id");
	$update_pagepic="update pages set pagepic='$uploaded_file.$file_id' where created_by_id='$user_id' and page_id='$pageid'";
	$run_pagepic=mysqli_query($con,$update_pagepic);
	echo "<script>window.open('exppages.php?user_id=$user_id','_self')</script>";
	return;
}

?>