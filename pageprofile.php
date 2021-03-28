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
	$page_privacy=$row_page['page_privacy'];
	
	$run_page_followers=mysqli_query($con,"select * from following where followed_user='$page_id'");
	$num_page_followers=mysqli_num_rows($run_page_followers);
?>
<style>
body{
	background-color:white;
	overflow-x:hidden;
}
#pagprfpic{
	width:100px;
	height:100px;
	border-radius:50px;
	border:solid 1px #e6e6e6;
	float:right;
	margin-right:40%;
	margin-top:20%;
	cursor:pointer;
}
#pagename{
	font-size:2.2em;
	color:#34baeb;
	font-family:bold;
}
#pagecat{
	font-family: 'Merienda One', cursive;
	color:#969493;
	margin-top:-15px;
}
#pagedesc{
	font-size:1em;
	font-family: 'Merienda One', cursive;
}
#modalprfpic{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
	float:left;
}
#editpageprof{
	width:120px;
	float:right;
	margin-right:12%;
}
#followpage{
	width:120px;
	float:right;
	margin-right:10%;
}
#followingpage{
	width:120px;
	float:right;
	margin-right:10%;
}
#coverpic{
	width:100%;
	height:200px; 
	padding:0px;
	margin:0px;
}
#panel_heading{
	height:30px;
}
label{
	padding:7px;
	display:table;
	color:black;
	width:150px;
	border-radius:30px;
}
input[type="file"]{
	display:none;
}
#camerapic{
	width:30px;
	height:25px;
}
#whoseespost{
	float:right;
	width:150px;
	height:38px;
	border-radius:5px;
}
#pagepost_btn{
	width:60%;
	align:center;
	margin-left:100px;
}
#prf_pic1{
	width:44px;
	height:44px;
	border:#e6e6e6 solid 2px;
	border-radius:22px;
}
#post_labelname{
	font-size:1.6em;
	color:black;
	margin-top:5px;
	text-decoration:none;
	margin-left:0px;
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
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<!-- Code after the nav bar -->
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" style="margin-left:2%;">
						<div class="col-sm-8" style="float:left;">
							<h3 id="pagename"><?php echo $pagename; ?></h3>
							<i id="pagecat"># <?php echo $pagecat; ?></i><br>
							<b style="color:#969493;font-size:1.2em">Description</b>
							<p id="pagedesc"><?php echo $pagedesc; ?></p>
						</div>
						<div class="col-sm-4">
							<img src="images/prfpics/<?php echo $pagepic; ?>" id="pagprfpic" />
							<script type="text/javascript">
								$('#pagprfpic').click(function(){
									//open prfpic modal
									$('#pagepicmodal').modal({
									show: true
									});
								});
							</script>
							<div class="modal fade" id="pagepicmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-20px;font-size:3em;margin-bottom:-15px;"><span aria-hidden="true">&times;</span></button>
										<img class="img-responsive" src="images/prfpics/<?php echo $pagepic; ?>" id="modalprfpic" style="width:100%;height:75%;margin-top:-27px;border:solid 1px black;" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row" style="margin-left:2%;">
						<p id="pgfwlrs" style="font-family:bold;font-size:1.4em;float:left;"><?php echo $num_page_followers; ?> followers</p>
						<a href="editpages.php?page_id=<?php echo $pageid; ?>" id="editpageprof" name="editpageprof" class="btn btn-default btn-md" style="display:;">Edit profile &nbsp <i class="fa fa-outdent" aria-hidden="true"></i></a>
						<button id="followpage" name="followpage" class="btn btn-info btn-md" style="display:;"><span id="follow">follow</span> &nbsp <i class="fa fa-plus" aria-hidden="true"></i></button>
						<button id="followingpage" name="followingpage" class="btn btn-default btn-md" style="display:;"><span id="follow">following</span> &nbsp <i style="color:green;" class="fa fa-check" aria-hidden="true"></i></button>
						<script type="text/javascript">
							//follow page
							$('#followpage').click(function(){
								user_id=<?php echo json_encode($_SESSION['uid']); ?>;
								page_id=<?php echo json_encode($_GET['page_id']); ?>;
								$.ajax({
									url:'pageprofile.php',
									data:'followingpg=1&user_id='+user_id+'&page_id='+page_id,
									type:'post',
									async:true,
									success:function(data){
										window.open('pageprofile.php?page_id='+page_id,'_self');
										var fwb=document.getElementById('followpage');
										fwb.setAttribute('style','display:none');
										var fgb=document.getElementById('followingpage');
										fgb.setAttribute('style','display:display');
									}
								});
								return false;
							});
							
							//unfollow page
							$('#followingpage').click(function(){
								user_id=<?php echo json_encode($_SESSION['uid']); ?>;
								page_id=<?php echo json_encode($_GET['page_id']); ?>;
								$.ajax({
									url:'pageprofile.php',
									data:'unfollowing=1&user_id='+user_id+'&page_id='+page_id,
									type:'post',
									async:true,
									success:function(){
										window.open('pageprofile.php?page_id='+page_id,'_self');
										var fwb=document.getElementById('followpage');
										fwb.setAttribute('style','display:display');
										var fgb=document.getElementById('followingpage');
										fgb.setAttribute('style','display:none');
									}
								});
								return false;
							});
						</script>
						<?php
							global $con;
							$page_id=$_GET['page_id'];
							$user_id=$_SESSION['uid'];
							$check_page="select * from pages where page_id='$page_id' and created_by_id='$user_id'";
							$run_check=mysqli_query($con,$check_page);
							$num_own_pages=mysqli_num_rows($run_check);
							$check_following="select * from following where following_user='$user_id' and followed_user='$page_id'";
							$run_following=mysqli_query($con,$check_following);
							$num_page_following=mysqli_num_rows($run_following);
							if($num_own_pages != 0){
							?>
								<script type="text/javascript">
									var edit=document.getElementById('editpageprof');
									edit.setAttribute('style','display:display');
									var fw=document.getElementById('followpage');
									fw.setAttribute('style','display:none');
									var fwg=document.getElementById('followingpage');
									fwg.setAttribute('style','display:none');
								</script>
							<?php
							}else{
								if($num_page_following != 0){
								?>
									<script type="text/javascript">
										var edit=document.getElementById('editpageprof');
										edit.setAttribute('style','display:none');
										var fw=document.getElementById('followpage');
										fw.setAttribute('style','display:none');
										var fwg=document.getElementById('followingpage');
										fwg.setAttribute('style','display:display');
									</script>
								<?php
								}else{
								?>
									<script type="text/javascript">
										var edit=document.getElementById('editpageprof');
										edit.setAttribute('style','display:none');
										var fw=document.getElementById('followpage');
										fw.setAttribute('style','display:display');
										var fwg=document.getElementById('followingpage');
										fwg.setAttribute('style','display:none');
									</script>
								<?php	
								}
							}
						?>
					</div>
				</div>
				<div class="panel-footer dropdown" style="background-color:white;">
					<!--div class="row" style="border-top:solid #e6e6e6 1px;margin-bottom:-2.5%;"-->
						<button type="button" id="pagepstsbtn" class="btn btn-default" >Posts <i class="fa fa-file-image-o" aria-hidden="true"></i></button>
						<button type="button" id="pagesharebtn" userid=<?php echo $_GET['page_id']; ?> class="btn btn-default" >Share <i class="fa fa-share" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-default dropdown-toggle" id="pagemorebtn" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
						<ul class="dropdown-menu" style="margin-left:30%;"> 
						<?php if($num_own_pages!=0){ ?>
						  <li><a href="editpages.php?page_id=<?php echo $pageid; ?>">edit page info</a></li>  
						<?php } ?>
						  <li><a href="#">create page</a></li>  
						  <li><a id="pagesharedrpbtn" style="cursor:pointer;" userid=<?php echo $_GET['page_id']; ?>>share</a></li>  
						  <li><a href="#">ceate Ad</a></li>  
						  <li><a href="#">Ads manager</a></li>  
						<?php if($num_own_pages!=0){ ?>
						  <li><a href="pagesettings.php?page_id=<?php echo $pageid; ?>">page settings</a></li>  
						<?php } ?>
						</ul> 
						
					<!--/div-->
					<script type="text/javascript">
						$('#pagepstsbtn').click(function(){
							var pbtn=document.getElementById('pagepstsbtn');
							pbtn.setAttribute('style','background-color:#e6e6e6');
							var pbtn=document.getElementById('pagesharebtn');
							pbtn.setAttribute('style','background-color:none');
							var pbm=document.getElementById('pagemorebtn');
							pbm.setAttribute('style','background-color:none');
						});
						$('#pagesharebtn').click(function(){
							var pbtn=document.getElementById('pagepstsbtn');
							pbtn.setAttribute('style','background-color:none');
							var pbtn=document.getElementById('pagesharebtn');
							pbtn.setAttribute('style','background-color:#e6e6e6');
							var pbm=document.getElementById('pagemorebtn');
							pbm.setAttribute('style','background-color:none');
							
							var userid=$(this).attr("userid");
								document.getElementById("fwrduserid").value=userid;
								document.getElementById("fwrdusertype").value="page";
								$('#sharePageProfAsMsg').modal({
									show: true
								});
								$.ajax({
									url:'functions/functions.php',
									data:'showusrstoshrprf=1',
									type:'post',
									async:true,
									success:function(res){
										$(".showuserstoshareprf").html(res);
									}
								});
								return false;
						});
						$('#pagemorebtn').click(function(){
							var pbtn=document.getElementById('pagepstsbtn');
							pbtn.setAttribute('style','background-color:none');
							var pbtn=document.getElementById('pagesharebtn');
							pbtn.setAttribute('style','background-color:none');
							var pbm=document.getElementById('pagemorebtn');
							pbm.setAttribute('style','background-color:#e6e6e6');
						});
						
						//Sharing page profile as message when dropdown btn clicked
							$("#pagesharedrpbtn").click(function(){
								var userid=$(this).attr("userid");
								document.getElementById("fwrduserid").value=userid;
								document.getElementById("fwrdusertype").value="page";
								$('#sharePageProfAsMsg').modal({
									show: true
								});
								$.ajax({
									url:'functions/functions.php',
									data:'showusrstoshrprf=1',
									type:'post',
									async:true,
									success:function(res){
										$(".showuserstoshareprf").html(res);
									}
								});
								return false;
							});
					</script>
				</div>
			</div>
			<!--  Sharing Page Profile As Message MOdal -->
				<div class="modal fade" id="sharePageProfAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="panel-title"><p><strong>Share profile!</strong></p></div>	
							</div>
							<div class="modal-body" style="height:450px;overflow-y:auto;">
								<div class="panel panel-deafult">
									<div class="panel-body">
										<label style="width:80%;margin-top:-20px;">select users to share profile : </label>
										<input type="text" name="fwrduserid" id="fwrduserid" style="display:none;" />
										<input type="text" name="fwrdusertype" id="fwrdusertype" style="display:none;" />
										<div style="border:solid #e6e6e6 1px;">
											<div class="showuserstoshareprf"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-info" id="clsshrasmsgmodal" data-dismiss="modal" aria-label="Close" style="width:50%;margin-right:25%;" value="Done" />
							</div>
						</div>
					</div>
				</div>
			
			
			<?php 
			if($_SESSION['uid'] == $userid){ ?>
				<div class="panel panel-deafult" style="border:solid #e6e6e6 2px;">
					<div class="panel-heading" id="panel_heading">
						<div class="panel-title"><p><strong>Write a post!</strong></p></div>
					</div>
					<div class="panel-body">
						<textarea placeholder="write..." rows="2" cols="50" class="form-control" style="resize:none;" id="postarea"></textarea>
						<strong>Add Photo/video</strong>
						<strong  style="float:right;">Who see`s your post?</strong><br>
						<label class='btn btn-default'>Photo/video &nbsp <img src="images/camerapic.jpg" id="camerapic" />
						<input type='file' name='selectimg' style="display:none" /></label>
						<select name="whoseespost" id="whoseespost">
							<option><span class="glyphicon glyphicon-globe">Public</option>
							<option><i class="glyphicon glyphicon-users"></i> Followers</option>
							<option><i class="glyphicon glyphicon-lock"></i> Only me</option>
						</select>
					</div>
				</div>
			<?php } ?>
			<script type="text/javascript">
				$('#postarea').focus(function(){
					//open bootsrap modal
					$('#PostModal').modal({
						show: true
					});
				});
			</script>
			<!-- Post Modal -->
			<div class="modal fade" id="PostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<div class="panel-title"><p><strong>Write a post!</strong></p></div>	
						</div>
						<div class="modal-body">
							<div class="panel panel-deafult">
								<div class="panel-body">
									<form name="post_form" method="post" action="" enctype="multipart/form-data">
										<textarea placeholder="write..." rows="4" cols="50" class="form-control" name="post_content" id="postarea" style="resize:none;"></textarea><br>
										<strong>Add Photo/video</strong>
										<strong  style="float:right;">Who see`s your post?</strong><br>
										<label class='btn btn-default'>Photo/video &nbsp <img src="images/camerapic.jpg" id="camerapic" />
										<input type='file' name='selectimg' style="display:none" /></label>
										<select name="whoseespost" id="whoseespost">
											<option><span class="glyphicon glyphicon-globe">Public</option>
											<option><i class="glyphicon glyphicon-users"></i> Followers</option>
											<option><i class="glyphicon glyphicon-lock"></i> Only me</option>
										</select><br><br>
										<input type="submit" class="btn btn-primary btn-md" value="post" name="pagepost_btn" id="pagepost_btn" />
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
				if($page_privacy!="private"){
			?>
				<div class="pagepostss"></div>
			<?php }else{
				if($num_page_following!=0){
			?>
				<div class="pagepostss"></div>
			<?php }else{
					echo"
						<h4 style='font-family:bold;color:#b3b5b4;text-align:center;margin-top:10%;'>Follow the page to see their posts!</h4>
					";
					} 
				}
			?>
			
		</div>
		<div class="col-sm-4">
			<div class="row">
				<div class="col-sm-9">
					<div class="panel panel-default" style="position:fixed;width:20%;">
						<div class="panel-body">
							<h3 style="font-family:'Merienda One',cursive;">Suggested Pages</h3>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
if(isset($_POST['pagepost_btn'])){
		$insertP = new insertPagePost();
		$insertP->insertPst();
}
class insertPagePost{
	function insertPst(){
		global $con;
		$user_id = $_SESSION['uid'];
		$page_id=$_GET['page_id'];
		$post_content=htmlentities(mysqli_real_escape_string($con,$_POST['post_content']));
		$post_privacy=htmlentities(mysqli_real_escape_string($con,$_POST['whoseespost']));
		$uploaded_file=$_FILES['selectimg']['name'];
		$file_tmp =$_FILES['selectimg']['tmp_name'];
		if(strlen($post_content)>=1 and strlen($file_tmp)==0){
			$file_id=rand(10000000,99999999);
			$insert_content="insert into user_postcontent (user_id,post_content,file_id,uploaded_date) values('$page_id','$post_content','$file_id',NOW())";
			$run_content=mysqli_query($con,$insert_content);
			
				$uploaded_file = $_FILES['selectimg']['name'];
				$file_tmp =$_FILES['selectimg']['tmp_name'];
				move_uploaded_file($file_tmp,"uploadedFiles/$uploaded_file");
				$insert_file="insert into user_posts(user_id,uploaded_file,file_id,user_type,post_privacy,uploaded_date) values('$page_id','$uploaded_file','$file_id','page','$post_privacy',NOW())";
				$run_file=mysqli_query($con,$insert_file);
			
			echo"<script>window.open('pageprofile.php?page_id=$page_id','_self');</script>";
		}elseif(strlen($file_tmp)!=0 and strlen($post_content)>=1){
			$file_id=rand(10000000,99999999);
				move_uploaded_file($file_tmp,"uploadedFiles/$file_id.$uploaded_file");
				$insert_file="insert into user_posts(user_id,uploaded_file,file_id,user_type,post_privacy,uploaded_date) values('$page_id','$file_id.$uploaded_file','$file_id','page','$post_privacy',NOW())";
				$run_file=mysqli_query($con,$insert_file);

			$insert_content="insert into user_postcontent (user_id,post_content,file_id,uploaded_date) values('$page_id','$post_content','$file_id',NOW())";
			$run_content=mysqli_query($con,$insert_content);
			echo"<script>window.open('pageprofile.php?page_id=$page_id','_self');</script>";
		} elseif(strlen($file_tmp)!=0 and strlen($post_content)==0){
			$file_id=rand(10000000,99999999);
			
				move_uploaded_file($file_tmp,"uploadedFiles/$file_id.$uploaded_file");
				$insert_file="insert into user_posts(user_id,uploaded_file,file_id,user_type,post_privacy,uploaded_date) values('$page_id','$file_id.$uploaded_file','$file_id','page','$post_privacy',NOW())";
				$run_file=mysqli_query($con,$insert_file);
				echo"<script>window.open('pageprofile.php?page_id=$page_id','_self');</script>";
			
		}else{
			echo "<script>alert('Write something to post!');</script>";
		}
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		pageposts();
		var pbtn=document.getElementById('pagepstsbtn');
		pbtn.setAttribute('style','background-color:#e6e6e6');
		setInterval(function(){
			pageposts();
		},300000);
	});
	function pageposts(){
		var page_id=<?php echo json_encode($_GET['page_id']); ?>;
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'pagepost=1'+'&page_id='+page_id+'&user_id='+user_id,
			type:'post',
			success:function(res){
				$('.pagepostss').html(res);
			}
		});
	}
</script>
<?php
//code for inserting following page
if(isset($_POST['followingpg'])){
	$fwl= new FollowPage();
	$fwl->fwpagefun();
}
class FollowPage{
	function fwpagefun(){
		global $con;
		$user_id=htmlentities(mysqli_real_escape_string($con,$_POST['user_id']));
		$page_id=htmlentities(mysqli_real_escape_string($con,$_POST['page_id']));
		$check_user=mysqli_query($con,"select * from following where followed_user='$page_id' AND following_user='$user_id'");
		$num_users=mysqli_num_rows($check_user);
		if($num_users==0){
			while(true){
				$notify_id=rand(1111111111,9999999999);
				$checkid=mysqli_query($con,"select notify_id from notifications where notify_id='$notify_id'");
				$num=mysqli_num_rows($checkid);
				if($num==0){
					$check_privacy=mysqli_query($con,"select page_privacy from pages where page_id='$page_id'");
					$row_privacy=mysqli_fetch_array($check_privacy);
					$privacy=$row_privacy['page_privacy'];
					if($privacy=="public"){
						$insert_fwuser="insert into following(following_user,followed_user,user_type,status,notify_id,date) values('$user_id','$page_id','page','accepted','$notify_id',NOW())";
						$run_fwuser=mysqli_query($con,$insert_fwuser);
					}elseif($privacy=="private"){
						$insert_fwuser="insert into following(following_user,followed_user,user_type,status,notify_id,date) values('$user_id','$page_id','page','requested','$notify_id',NOW())";
						$run_fwuser=mysqli_query($con,$insert_fwuser);
					}
					if($run_fwuser){
						$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$page_id','follow','unread','page',NOW())";
						$run_insert_notify=mysqli_query($con,$insert_notify);
					}else{
						echo "alert('something went wrong!');";
					}
					break;
				}
			}
		}else{
			return;
		}
	}
}

//code for unfollow the page
if(isset($_POST['unfollowing'])){
	$unfwl = new UnFollowPage();
	$unfwl->unfollowpgfun();
}
class UnFollowPage{
	function unfollowpgfun(){
		global $con;
		$user_id=htmlentities(mysqli_real_escape_string($con,$_POST['user_id']));
		$page_id=htmlentities(mysqli_real_escape_string($con,$_POST['page_id']));
		
		$select_notify_id=mysqli_query($con,"select notify_id from following where following_user='$user_id' AND followed_user='$page_id'");
		$unfollow_fwuser="delete from following where followed_user='$page_id' AND following_user='$user_id'";
		$run_unfwuser=mysqli_query($con,$unfollow_fwuser);
		if($run_unfwuser){
			$row_notify_id=mysqli_fetch_array($select_notify_id);
			$notify_id=$row_notify_id['notify_id'];
			mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
		}else{
			echo "alert('something went wrong!');";
		}
	}
}
?>