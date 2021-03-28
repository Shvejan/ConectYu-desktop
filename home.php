<?php
session_start();
include("includes/connection.php");
include("header.php");
//include("functions/functions.php");
?>
<?php
if(isset($_GET['user_id'])){
	$user_id=$_SESSION['uid'];
	$select_user="select * from users where user_id='$user_id'";
	$run_user=mysqli_query($con,$select_user);
	$row_user=mysqli_fetch_array($run_user);
	$prfpic=$row_user['profile_pic'];
	$user_name=$row_user['user_name'];
}else{
	echo "<script>window.open('logout.php','_self');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php echo $user_id; ?>'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
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
#postarea{
	width:100%;
	height:70px;
	border-radius:;
	padding:10px;
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
#post_btn{
	width:60%;
	align:center;
	margin-left:100px;
}
#bluetick{
	margin-top:-8px;
}
#prf_pic1{
	width:60px;
	height:60px;
	border:#e6e6e6 solid 2px;
	border-radius:30px;
}
#pageprf_pic1{
	width:40px;
	height:40px;
	border:#e6e6e6 solid 2px;
	border-radius:20px;
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
#suguserlink{
	color:black;
	background-color:white;
	padding:13px;
	margin-bottom:1px;
	padding:20px;
}
#suguserlink:hover{
	text-decoration:none;
	background-color:#e6e6e6;
}
#sugprfpic{
	width:48px;
	height:48px;
	border:2px solid #e6e6e6;
	border-radius:24px;
	float:left;
	margin-left:10px;
	margin-top:-10px;
	margin-right:20px;
}
#sugusername{
	font-size:1.2em;
	margin-left:15px;
}
#usermorebtn{
	color:black;
	font-size:1.4em;
	cursor:pointer;
	padding:10px;
	float:right;
	margin-top:-65px;
	margin-right:10px;
	list-style-type:none;
}
#moredropdown{
	margin-top:-15px;
	width:15%;
	margin-left:45%;
}
#foot li a{
	color:#6e6e6d;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50" id="body" bgcolor="#fcfcfc">
	
	<div class="row" style="margin-top:90px;">
		<div class="col-sm-3 col-xs-0">
		</div>
		<div class="col-sm-5 col-xs-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-deafult" style="border:solid #e6e6e6 2px;">
						<div class="panel-heading" id="panel_heading">
							<div class="panel-title"><p><strong>Write a post!</strong></p></div>
						</div>
						<div class="panel-body">
							<textarea placeholder="write..." rows="3" cols="50" class="form-control" id="postarea" style="resize:none;"></textarea>
							
						</div>
					</div>
					<script type="text/javascript">
						$('#postarea').focus(function(){
							//open bootsrap modal
							$('#PostModal').modal({
								show: true
							});
						});
					</script>
					<!-- Modal -->
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
												<input type='file' style="display:none;" name='selectimg' /></label>
												<select name="whoseespost" id="whoseespost">
													<option><span class="glyphicon glyphicon-globe">Public</option>
													<option><i class="glyphicon glyphicon-users"></i> Followers</option>
													<option><i class="glyphicon glyphicon-lock"></i> Only me</option>
												</select><br><br>
												<input type="submit" class="btn btn-primary btn-md" value="post" name="post_btn" id="post_btn" />
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="homeupdates col-sm-12">
					<?php
					/*	$home_updates = new HomeUpdates();
						$home_updates->displayUpdates();
					*/
					?>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-0">
			<div class="panel panel-default" style="position:fixed;width:20%;height:60%;overflow-y:auto;">
				<div class="panel-body">
					<div style="position:fixed;z-index:1;background-color:white;padding:15px;width:19.9%;margin-left:-1%;margin-top:-1%;border-bottom:1px solid #e6e6e6"><h4 style="margin-top:0px;margin-bottom:0px;font-family:'Merienda One',cursive;">People you may know</h4></div><br>
					<?php
						global $con;
						$sessionuser=$_GET['user_id'];
						$select_userdata=mysqli_query($con,"select * from users where user_id='$sessionuser'");
						$row_userdata=mysqli_fetch_array($select_userdata);
						$city=$row_userdata['user_city'];
						$state=$row_userdata['user_state'];
						$country=$row_userdata['user_country'];
						$pincode=$row_userdata['user_pincode'];
						$user_designation=$row_userdata['user_designation'];
						$suggestedusers=array();
						$select_users=mysqli_query($con,"select * from users where ((user_pincode='$pincode' AND user_city like '%$city') OR (user_pincode='$pincode' AND user_city like '%$city%') OR (user_pincode='$pincode' AND user_city like '$city%')  OR user_pincode='$pincode') AND (user_id != '$sessionuser') AND (user_id not in (select followed_user from following where following_user='$sessionuser')) AND (user_id not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY reg_date LIMIT 10");
						$num_citypinusers=mysqli_num_rows($select_users);
						if($num_citypinusers != 0){
							while($row_citypinusers=mysqli_fetch_array($select_users)){
								if($sessionuser != $row_citypinusers['user_id']){
									array_push($suggestedusers,$row_citypinusers['user_id']);
								}
							}
						}
						
						$select_fuser=mysqli_query($con,"select followed_user from following where following_user='$sessionuser' AND user_type='user' LIMIT 15");
						while($row_fuser=mysqli_fetch_array($select_fuser)){
							$fuser=$row_fuser['followed_user'];
							$select_mutual=mysqli_query($con,"select following_user from following where (followed_user='$fuser') AND (following_user not in (select followed_user from following where following_user='$sessionuser')) AND (following_user!='$sessionuser') AND (following_user not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY date");
							$num_mutuals=mysqli_num_rows($select_mutual);
							if($num_mutuals != 0){
								while($row_mutual=mysqli_fetch_array($select_mutual)){
									if($sessionuser != $row_mutual['following_user']){
										array_push($suggestedusers,$row_mutual['following_user']);
									}
								}
							}
						}
						
						$arrlen1=count($suggestedusers); 
						if($arrlen1==0 or $arrlen1<4){
							$select_defusers=mysqli_query($con,"select user_id from users where (user_state like '$state' OR user_state like '%$state' OR user_state like '%$state%' OR user_state like '$state%') AND (user_id not in (select followed_user from following where following_user='$sessionuser')) AND (user_id not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY reg_date LIMIT 10");
							$num_defusers=mysqli_num_rows($select_defusers);
							if($num_defusers!=0){
								while($row_defusers=mysqli_fetch_array($select_defusers)){
									if($sessionuser != $row_defusers['user_id']){
										array_push($suggestedusers,$row_defusers['user_id']);
									}
								}
							}else{
								$select_defusers=mysqli_query($con,"select user_id from users where (user_country like '$country' OR user_country like '%$country' OR user_country like '%$country%' OR user_country like '$country%' OR user_country='$country') AND (user_id not in (select followed_user from following where following_user='$sessionuser')) AND (user_id not in (select blocked_user from blocked_users where blocked_by='$sessionuser')) ORDER BY reg_date LIMIT 10");
								$num_defusers=mysqli_num_rows($select_defusers);
							}
						}
						$suggestedusers=array_unique($suggestedusers,SORT_REGULAR  );
						$suggestedusers=array_values($suggestedusers);
						$arrlen=count($suggestedusers);
						if($arrlen !=0){
						?>
							<div class="row" style="margin-top:17px;">
						<?php
						//echo print_r($suggestedusers);
							for($i=0;$i<$arrlen;$i++){
								$user = $suggestedusers[$i];
								$select_userdetails=mysqli_query($con,"select * from users where user_id='$user'");
								$row_details = mysqli_fetch_array($select_userdetails);
								$username=$row_details['user_name'];
								$profile_pic=$row_details['profile_pic'];
								$user_id=$row_details['user_id'];
								if(str_word_count($username)>2){
									$str=$username;  
									$string = explode(' ', $str, 3);
									$username="$string[0] $string[1]"; 
								}else{ 
									$username=$username;
								}
								
								?>
									
									<a href="profile.php?user_id=<?php echo $user_id; ?>" id="suguserlink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $profile_pic; ?>" id="sugprfpic"><p id="sugusername" style="color:black;white-space: pre-wrap;"><?php echo $username; ?></p>
									</a>
									
									<div class='dropdown'>
										<li id='usermorebtn' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu' id='moredropdown'>
											<li><a href='#'>Report...</a></li> 
											<li><a href="profile.php?user_id=<?php echo $user_id; ?>">view profile</a></li>  
											<li><a style='cursor:pointer;' onclick='sugstduserprf("<?php echo $user_id; ?>");'>Share</a></li>
										</ul>
									</div>
								<?php
							}
						?>
						</div>
						<?php
						}else{
							echo "
							<h4 style='color:#b3b5b4;text-align:center;margin-top:50%;font-family:bold;'>No suggested users to show!</h4>
							";
						}
					?>
				</div>
			</div><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="row" id="foot" style="position:fixed;margin-top:14%;padding:0px;width:20%;border-radius:5px;">
				<li><a href="">Privacy</a></li>
				<li><a href="">Data Policy</a></li>
				<li><a href="">Cookie Policy</a></li><br>
				<li><a href="">Terms& Conditions</a></li>

				<li><span id="copy" style="font-size:1.2em;color:#6e6e6d;">© Copyrights ConectYu 2020</span></li>
			</div>
		</div>
	</div>
	
	<!--  Sharing suggested Profiles As Message Modal -->
	<div class="modal fade" id="sugstdProfAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
								<div class="showuserstosharesugprf"></div>
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
	
</body>
</html>

<?php
//insering a post
if(isset($_POST['post_btn'])){
		$insertP = new insertPost();
		$insertP->insertPst();
}
class insertPost{
	function insertPst(){
		global $con;
		$user_id = $_SESSION['uid'];
		$post_content=htmlentities(mysqli_real_escape_string($con,$_POST['post_content']));
		$post_privacy=htmlentities(mysqli_real_escape_string($con,$_POST['whoseespost']));
		$uploaded_file=$_FILES['selectimg']['name'];
		$file_tmp =$_FILES['selectimg']['tmp_name'];
		if(strlen($post_content)>=1 and strlen($file_tmp)==0){
			$file_id=rand(10000000,99999999);
			$insert_content="insert into user_postcontent (user_id,post_content,file_id,uploaded_date) values('$user_id','$post_content','$file_id',NOW())";
			$run_content=mysqli_query($con,$insert_content);
			
				$uploaded_file = $_FILES['selectimg']['name'];
				$file_tmp =$_FILES['selectimg']['tmp_name'];
				move_uploaded_file($file_tmp,"uploadedFiles/$uploaded_file");
				$insert_file="insert into user_posts(user_id,uploaded_file,file_id,user_type,post_privacy,uploaded_date) values('$user_id','$uploaded_file','$file_id','user','$post_privacy',NOW())";
				$run_file=mysqli_query($con,$insert_file);
			
			
			echo"<script>window.open('home.php?user_id=$user_id','_self');</script>";
		}elseif(strlen($file_tmp)!=0 and strlen($post_content)>=1){
			$file_id=rand(10000000,99999999);
				move_uploaded_file($file_tmp,"uploadedFiles/$file_id.$uploaded_file");
				$insert_file="insert into user_posts(user_id,uploaded_file,file_id,user_type,post_privacy,uploaded_date) values('$user_id','$file_id.$uploaded_file','$file_id','user','$post_privacy',NOW())";
				$run_file=mysqli_query($con,$insert_file);

			$insert_content="insert into user_postcontent (user_id,post_content,file_id,uploaded_date) values('$user_id','$post_content','$file_id',NOW())";
			$run_content=mysqli_query($con,$insert_content);
			echo"<script>window.open('home.php?user_id=$user_id','_self');</script>";
		} elseif(strlen($file_tmp)!=0 and strlen($post_content)==0){
			$file_id=rand(10000000,99999999);
				move_uploaded_file($file_tmp,"uploadedFiles/$file_id.$uploaded_file");
				$insert_file="insert into user_posts(user_id,uploaded_file,file_id,user_type,post_privacy,uploaded_date) values('$user_id','$file_id.$uploaded_file','$file_id','user','$post_privacy',NOW())";
				$run_file=mysqli_query($con,$insert_file);
				echo"<script>window.open('home.php?user_id=$user_id','_self');</script>";
			
		}else{
			echo "<script>alert('Write something to post!');</script>";
		}
	}
}
?>
<script type="text/javascript">
	
	$(document).ready(function(){
		fun();
		setInterval(function(){
			fun();
		},50000);
	});
	function fun(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'homeupdates=1'+'&user_id='+user_id,
			type:'post',
			success:function(res){
				$('.homeupdates').html(res);
			}
		});
	}
</script>