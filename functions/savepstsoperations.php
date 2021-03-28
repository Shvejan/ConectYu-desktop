<?php
session_start();
$con=mysqli_connect("localhost","root","","conectyu");
?>
<html>
<head>
<script src="https://kit.fontawesome.com/6d15a9d73e.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="includes/stylesfile.css" media="screen"/>
<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 

</head>
<style>
#post_img{
	position:absolute;
	align:center;
}
#post_body{
	height:;
}
#postid{
	line-height:20px;
}
#verticalopt{
	float:right;
	margin-right:2%;
	list-style-type:none;
	font-size:1.5em;
	margin-top:10px;
	cursor:pointer;
}
#verticalopt:hover{
	background-color:#e6e6e6;
	border-radius:50px;
}
#hearto{
	font-size:2.2em;
	margin-left:20px;
	display:display;
}
#heart{
	font-size:2.2em;
	margin-left:20px;
	display:display;
}
#delpost{
	display:;
}
#userid{
	text-decoration:none;
	color:black;
	line-height:1px;
	font-size:0.9em;
}
#userid:hover{
	text-decoration:none;
}
#descriptn{
	max-width:95%;
	overflow:hidden;
	white-space: pre-wrap;
	max-height:32%;
	font-size:1.2em;
	font-family: 'Noto Serif JP', serif;
	background-color:white;
	border:none;
	margin-top:-10px;
	margin-left:2%;
}
.like,.unlike,.comment,.plike,.punlike{
	font-size:2em;
	margin-left:5%;
}
.share,.pshare{
	font-size:1.5em;
	margin-left:5%;
}
.save,.saved,.psave,.psaved{
	font-size:1.8em;
	float:right;
	margin-right:5%;
}
.like:hover,.unlike:hover,.comment:hover,.share:hover,.save:hover,.saved:hover{
	cursor:pointer;
}
.plike:hover,.punlike:hover,.pcomment:hover,.pshare:hover,.psave:hover,.psaved:hover{
	cursor:pointer;
}
.likescnt,.timeagocnt{
	margin-left:2%;
}
#cmntsection{
	max-width:95%;
	overflow:hidden;
	white-space: pre-wrap;
	background-color:white;
	border:none;
	font-family: 'Noto Serif JP', serif;
	font-size:1em;
}
#vallcmnts{
	color:#807e79;
}
#vallcmnts:hover{
	text-decoration:none;
}
#cmnttoprf{
	color:black;
}
#cmnttoprf:hover{
	text-decoration:none;
	curosr:pointer;
}
#seemorelink{
	font-size:1em;
}
#seemorelink:hover{
	text-decoration:none;
}
</style>
<?php
if(isset($_POST['unallsavedposts'])){
	global $con;
	$user_id=$_POST['user_id'];
	mysqli_query($con,"delete from saved_posts where user_id='$user_id'");
}
if(isset($_POST['savedpost'])){
	$savedPsts = new SavedPosts();
	$savedPsts->showSavedPosts();
}
// showing saved posts.

class SavedPosts{
	function showSavedPosts(){
		global $con;
		$sessionuserid = $_POST['user_id'];
		$selectprfpic=mysqli_query($con,"select profile_pic from users where user_id='$sessionuserid'");
		$row=mysqli_fetch_array($selectprfpic);
		$prf_picc=$row['profile_pic'];
		//getting posted user data
		
		$select_post="select * from saved_posts where user_id='$sessionuserid' ORDER BY saved_date DESC";
		$run_post=mysqli_query($con,$select_post);
		$num_posts=mysqli_num_rows($run_post);
		if($num_posts>=1){
			while($row_postt=mysqli_fetch_array($run_post)){
				$postid=$row_postt['post_id'];
				
				$select_postdetails="select * from user_posts where file_id='$postid'";
				$run_postdetails=mysqli_query($con,$select_postdetails);
				$row_post=mysqli_fetch_array($run_postdetails);
				//getting post data
				$post_date=$row_post['uploaded_date'];
				$post_img=$row_post['uploaded_file'];
				$img_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
				$file_id=$row_post['file_id'];
				$likes=$row_post['likes'];
				$user_id=$row_post['user_id'];
				$user_type=$row_post['user_type'];
				
				if($user_type=="user"){
					//getting the posted user data
					$select_user="select * from users where user_id='$user_id'";
					$run_user=mysqli_query($con,$select_user);
					$row_user=mysqli_fetch_array($run_user);
					$prfpic=$row_user['profile_pic'];
					$user_name=$row_user['user_name'];
					$user_email=$row_user['user_email'];
					$user_id=$row_user['user_id'];
					$user_designation=$row_user['user_designation'];
					if($user_designation=="student"){
						$select_desg="select * from students where user_id='$user_id'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$clg_name=$row_desg['college_name'];
					}elseif($user_designation=="org"){
						$select_desg="select * from organizations where user_id='$user_id'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$org_name=$row_desg['org_name'];
						$org_add=$row_desg['org_add'];
					}elseif($user_designation=="indv"){
						$select_desg="select * from individuals where user_id='$user_id'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$desg=$row_desg['designation'];
						$org_name=$row_desg['company_name'];
					}

					//getting post content 
					$select_content="select post_content from user_postcontent where user_id='$user_id' AND file_id='$file_id'";
					$run_content=mysqli_query($con,$select_content);
					$num_content=mysqli_num_rows($run_content);
					
					$check_verified=mysqli_query($con,"select status from account_verifications where user_id='$user_id'");
					$row_sts=mysqli_fetch_array($check_verified);
					$status=$row_sts['status'];
					
					if($user_designation=="student" and $post_img!=""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='profile.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
											<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name
										";
											if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="17px" height="17px" ></span> <?php }
									echo "	
											</p></a>
											<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p><i><b>$user_designation at $clg_name</b></i></p>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left'>
													<li><a href='#'>Report</a></li>  
													<li><a class='sharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $user_id){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepost($file_id);'>Delete the post</a></li>	
													";
												}
												echo "										
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class='panel-body' id='post_body'>
									<div class='row'>
										<div class='col-sm-12'>
							";
								$ext = strtolower(pathinfo($post_img, PATHINFO_EXTENSION));
								if(in_array($ext,$img_extensions)){
									echo "
										<img src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' />
									";
								}else{
									echo "
										<video src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' controls></video>
									";
								}
								echo "
										</div>
									</div>
								</div>
								<div class='panel-footer' style='background-color:white;'>
									<div class='row'>
							";
										$userid=$sessionuserid;
										$run_liked_user=mysqli_query($con,"select * from likes where liked_by='$userid' and post_id='$file_id'");
										if(mysqli_num_rows($run_liked_user)>=1){ ?>
											<!-- user already likes post -->
											<span><i class="unlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
											
										<?php }else{ ?>
											<!-- user has not yet liked post -->
											<span><i class="like fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
											
										<?php	}?>
											<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
											<span><i class=" share fa fa-share-alt" aria-hidden="true"></i></span>
											
										<!-- saving and unsaving posts -->
										<?php
											$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
											$num_saves=mysqli_num_rows($select_saves);
											if($num_saves>=1){
										?>
											<span><i class="saved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										<?php }else{ ?>
											<span><i class="save fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
										<?php } ?>
											
									
												<br>
										<!--  showing number of likes. -->
										<?php if($likes==1){ ?>
											<span class="likescnt"><?php echo $likes; ?> like</span>
										<?php }else{ ?>
											<span class="likescnt"><?php echo $likes; ?> likes</span>
										<?php } ?>
											<br>
										<span class="timeagocnt">
										<?php
											//showing time i.e 1 min ago,etc...
											echo time_ago_in_php($post_date);
										?>
										</span>		
										<?php
											if($num_content>=1){
												$row_content=mysqli_fetch_array($run_content);
												$post_content=$row_content['post_content'];
												if(strlen($post_content)>150){
													$post_content=substr($post_content,0,149);
													echo "
													<br>
														&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content  <a href='postdetails.php?user_id=$userid&post_id=$file_id' id='seemorelink'><i>see more...</i></a></pre></span>
														
													";
												}else{
												echo "
													<br>
													&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content</pre></span>
												";
												}
											}
								echo "
									</div>
								";
							?>
									<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									?>
									<div id="cmntsdiv">
									<?php if(mysqli_num_rows($run_num_cmnts)>1){ ?>
									<p style="color:#807e79"><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" id="vallcmnts">View all comments</a></p>
									<?php
									}
										showcomments($file_id);
									?>
									</div>
									<script>
									/*	var name = <?php echo json_encode($file_id); ?>;
										list_comments(name);
										/*$(document).ready(function(){
											setInterval(function(){
												list_comments(name);
											},10000);
										});*/
									</script>
									<div class="cmntlist<?php echo $file_id ?>"></div>
								
								<!-- commenting part -->
								<div class="row" style="margin-bottom:-11px;" >
									<div>
										<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
										<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
							<?php
								echo "
								</div>
							</div>
						";
					}elseif($user_designation=="student" and $post_img==""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='profile.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
											<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name
										";
											if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="17px" height="17px" ></span> <?php }
									echo "	
											</p></a>
											<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p><i><b>$user_designation at $clg_name</b></i></p>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left'>
													<li><a href='#'>Report</a></li>  
													<li><a class='sharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $user_id){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepost($file_id);'>Delete the post</a></li>	
													";
												}
												echo "										
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-12'> 
							";
									if($num_content>=1){
										$row_content=mysqli_fetch_array($run_content);
										$post_content=$row_content['post_content'];
										echo "
											<pre id='descriptn'>$post_content</pre>
										";
									}
							echo "
										</div>
									</div>
								</div>
								<div class='panel-footer' style='background-color:white;'>
									<div class='row'>
							";
										$userid=$sessionuserid;
										$run_liked_user=mysqli_query($con,"select * from likes where liked_by='$userid' and post_id='$file_id'");
										if(mysqli_num_rows($run_liked_user)>=1){ ?>
											<!-- user already likes post -->
											<span><i class="unlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
											
										<?php }else{ ?>
											<!-- user has not yet liked post -->
											<span><i class="like fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
											
										<?php	}
										?>
										<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
										<span><i class=" share fa fa-share-alt" aria-hidden="true"></i></span>
										
									<!-- saving and unsaving posts -->
										<?php
											$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
											$num_saves=mysqli_num_rows($select_saves);
											if($num_saves>=1){
										?>
											<span><i class="saved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										<?php }else{ ?>
											<span><i class="save fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
										<?php } ?>
										
										<br>
										<!--  showing number of likes. -->
										<?php if($likes==1){ ?>
											<span class="likescnt"><?php echo $likes; ?> like</span>
										<?php }else{ ?>
											<span class="likescnt"><?php echo $likes; ?> likes</span>
										<?php } ?>
											<br>
										<span class="timeagocnt">
										<?php
											//showing time i.e 1 min ago,etc...
											echo time_ago_in_php($post_date);
										?>
										</span>		
							<?php
							echo "
								</div>
								<br>
							";
							?>
										<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									?>
									<div id="cmntsdiv">
									<?php if(mysqli_num_rows($run_num_cmnts)>1){ ?>
									<p style="color:#807e79"><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" id="vallcmnts">View all comments</a></p>
									<?php
									}
										showcomments($file_id);
									?>
									</div>
									<script>
									/*	var name = <?php echo json_encode($file_id); ?>;
										list_comments(name);
										/*$(document).ready(function(){
											setInterval(function(){
												list_comments(name);
											},10000);
										});*/
									</script>
									<div class="cmntlist<?php echo $file_id ?>"></div>
								
								<!-- commenting part -->
								<div class="row" style="margin-bottom:-11px;" >
									<div>
										<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
										<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
								
								<?php		
								echo "
								</div>
							</div>
						";
					}elseif($user_designation=="org" and $post_img!=""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='profile.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
											<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name
										";
											if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="17px" height="17px" ></span> <?php }
									echo "	
											</p></a>
											<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p><i><b>$org_add</b></i></p>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left'>
													<li><a href='#'>Report</a></li>  
													<li><a class='sharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $user_id){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepost($file_id);'>Delete the post</a></li>	
													";
												}
												echo "
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class='panel-body' id='post_body'>
									<div class='row'>
										<div class='col-sm-12'>
								";
								$ext = strtolower(pathinfo($post_img, PATHINFO_EXTENSION));
								if(in_array($ext,$img_extensions)){
									echo "
										<img src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' />
									";
								}else{
									echo "
										<video src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' controls></video>
									";
								}
								echo "
										</div>
									</div>
								</div>
								<div class='panel-footer' style='background-color:white;'>
									<div class='row'>
							";
								$userid=$sessionuserid;
								$run_liked_user=mysqli_query($con,"select * from likes where liked_by='$userid' and post_id='$file_id'");
								if(mysqli_num_rows($run_liked_user)>=1){ ?>
									<!-- user already likes post -->
									<span><i class="unlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
									
								<?php }else{ ?>
									<!-- user has not yet liked post -->
									<span><i class="like fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
									
								<?php	}
								?>
									<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
									<span><i class=" share fa fa-share-alt" aria-hidden="true"></i></span>
								<!-- saving and unsaving posts -->
										<?php
											$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
											$num_saves=mysqli_num_rows($select_saves);
											if($num_saves>=1){
										?>
											<span><i class="saved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										<?php }else{ ?>
											<span><i class="save fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
										<?php } ?>
										<br>
										<!--  showing number of likes. -->
										<?php if($likes==1){ ?>
											<span class="likescnt"><?php echo $likes; ?> like</span>
										<?php }else{ ?>
											<span class="likescnt"><?php echo $likes; ?> likes</span>
										<?php } ?>
											<br>
										<span class="timeagocnt">
										<?php
											//showing time i.e 1 min ago,etc...
											echo time_ago_in_php($post_date);
										?>
										</span>		
										<?php
											if($num_content>=1){
												$row_content=mysqli_fetch_array($run_content);
												$post_content=$row_content['post_content'];
												if(strlen($post_content)>150){
													$post_content=substr($post_content,0,149);
													echo "
													<br>
														&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content  <a href='postdetails.php?user_id=$userid&post_id=$file_id' id='seemorelink'><i>see more...</i></a></pre></span>
														
													";
												}else{
													echo "
														<br>
														&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content</pre></span>
													";
												}
											}
								echo "
									</div>
								";
							?>
									<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									?>
									<div id="cmntsdiv">
									<?php if(mysqli_num_rows($run_num_cmnts)>1){ ?>
									<p style="color:#807e79"><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" id="vallcmnts">View all comments</a></p>
									<?php
									}
										showcomments($file_id);
									?>
									</div>
									<script>
									/*	var name = <?php echo json_encode($file_id); ?>;
										list_comments(name);
										/*$(document).ready(function(){
											setInterval(function(){
												list_comments(name);
											},10000);
										});*/
									</script>
									<div class="cmntlist<?php echo $file_id ?>"></div>
								
								<!-- commenting part -->
								<div class="row" style="margin-bottom:-11px;" >
									<div>
										<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
										<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
								
								<?php
								echo "
								</div>
							</div>
						";
					}elseif($user_designation=="org" and $post_img==""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='profile.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
											<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name
										";
											if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="17px" height="17px" ></span> <?php }
									echo "	
											</p></a>
											<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p><i><b>$org_add</b></i></p>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left'>
													<li><a href='#'>Report</a></li>  
													<li><a class='sharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $user_id){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepost($file_id);'>Delete the post</a></li>	
													";
												}
												echo "
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-12'>
								";
									if($num_content>=1){
										$row_content=mysqli_fetch_array($run_content);
										$post_content=$row_content['post_content'];
										echo "
											<pre id='descriptn'>$post_content</pre>
										";
									}
								echo "
										</div>
									</div>
								</div>
								<div class='panel-footer' style='background-color:white;'>
									<div class='row'>
							";
								$userid=$sessionuserid;
								$run_liked_user=mysqli_query($con,"select * from likes where liked_by='$userid' and post_id='$file_id'");
								if(mysqli_num_rows($run_liked_user)>=1){ ?>
									<!-- user already likes post -->
									<span><i class="unlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
									
								<?php }else{ ?>
									<!-- user has not yet liked post -->
									<span><i class="like fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
									
							<?php	}
							?>
									<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
									<span><i class=" share fa fa-share-alt" aria-hidden="true"></i></span>
									
								<!-- saving and unsaving posts -->
										<?php
											$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
											$num_saves=mysqli_num_rows($select_saves);
											if($num_saves>=1){
										?>
											<span><i class="saved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										<?php }else{ ?>
											<span><i class="save fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
										<?php } ?>
									<br>
										<!--  showing number of likes. -->
										<?php if($likes==1){ ?>
											<span class="likescnt"><?php echo $likes; ?> like</span>
										<?php }else{ ?>
											<span class="likescnt"><?php echo $likes; ?> likes</span>
										<?php } ?>
											<br>
										<span class="timeagocnt">
										<?php
											//showing time i.e 1 min ago,etc...
											echo time_ago_in_php($post_date);
										?>
										</span>	
						<?php
						echo "
							</div>
							<br>
						";
						?>		<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									?>
									<div id="cmntsdiv">
									<?php if(mysqli_num_rows($run_num_cmnts)>1){ ?>
									<p style="color:#807e79"><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" id="vallcmnts">View all comments</a></p>
									<?php
									}
										showcomments($file_id);
									?>
									</div>
									<script>
									/*	var name = <?php echo json_encode($file_id); ?>;
										list_comments(name);
										/*$(document).ready(function(){
											setInterval(function(){
												list_comments(name);
											},10000);
										});*/
									</script>
									<div class="cmntlist<?php echo $file_id ?>"></div>
								
								<!-- commenting part -->
								<div class="row" style="margin-bottom:-11px;" >
									<div>
										<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
										<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
								<?php
								echo "
								</div>
							</div>
						";
					}elseif($user_designation=="indv" and $post_img!=""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='profile.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
											<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name
										";
											if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="17px" height="17px" ></span> <?php }
									echo "	
											</p></a>
											<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p><b><i>$desg at $org_name</i></b></p>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left'>
													<li><a href='#'>Report</a></li>  
													<li><a class='sharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $user_id){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepost($file_id);'>Delete the post</a></li>	
													";
												}
												echo "
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class='panel-body' id='post_body'>
									<div class='row'>
										<div class='col-sm-12'>
								";
								$ext = strtolower(pathinfo($post_img, PATHINFO_EXTENSION));
								if(in_array($ext,$img_extensions)){
									echo "
										<img src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' />
									";
								}else{
									echo "
										<video src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' controls></video>
									";
								}
								echo "
										</div>
									</div>
								</div>
								<div class='panel-footer' style='background-color:white;'>
									<div class='row'>
							";
								$userid=$sessionuserid;
								$run_liked_user=mysqli_query($con,"select * from likes where liked_by='$userid' and post_id='$file_id'");
								if(mysqli_num_rows($run_liked_user)==1){ ?>
									<!-- user already likes post -->
									<span><i class="unlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
									
								<?php }else{ ?>
									<!-- user has not yet liked post -->
									<span><i class="like fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
									
									<?php	}
									?>
									<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
									<span><i class=" share fa fa-share-alt" aria-hidden="true"></i></span>
									
								<!-- saving and unsaving posts -->
										<?php
											$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
											$num_saves=mysqli_num_rows($select_saves);
											if($num_saves>=1){
										?>
											<span><i class="saved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										<?php }else{ ?>
											<span><i class="save fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
										<?php } ?>
									
											<br>
										<!--  showing number of likes. -->
										<?php if($likes==1){ ?>
											<span class="likescnt"><?php echo $likes; ?> like</span>
										<?php }else{ ?>
											<span class="likescnt"><?php echo $likes; ?> likes</span>
										<?php } ?>
											<br>
										<span class="timeagocnt">
										<?php
											//showing time i.e 1 min ago,etc...
											echo time_ago_in_php($post_date);
										?>
										</span>		
										<?php
											if($num_content>=1){
												$row_content=mysqli_fetch_array($run_content);
												$post_content=$row_content['post_content'];
												if(strlen($post_content)>150){
													$post_content=substr($post_content,0,149);
													echo "
													<br>
														&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content  <a href='postdetails.php?user_id=$userid&post_id=$file_id' id='seemorelink'><i>see more...</i></a></pre></span>
														
													";
												}else{
													echo "
														<br>
														&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content</pre></span>
													";
												}
											}
								echo "
									</div>
								";
							?>
									<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									?>
									<div id="cmntsdiv">
									<?php if(mysqli_num_rows($run_num_cmnts)>1){ ?>
									<p style="color:#807e79"><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" id="vallcmnts">View all comments</a></p>
									<?php
									}
										showcomments($file_id);
									?>
									</div>
									<script>
									/*	var name = <?php echo json_encode($file_id); ?>;
										list_comments(name);
										/*$(document).ready(function(){
											setInterval(function(){
												list_comments(name);
											},10000);
										});*/
									</script>
									<div class="cmntlist<?php echo $file_id ?>"></div>
								
								<!-- commenting part -->
								<div class="row" style="margin-bottom:-11px;" >
									<div>
										<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
										<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
									
								<?php	
								echo "
								</div>
							</div>
						";
					}elseif($user_designation=="indv" and $post_img==""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='profile.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
											<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name
										";
											if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="17px" height="17px" ></span> <?php }
									echo "	
											</p></a>
											<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p><b><i>$desg at $org_name</i></b></p>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left'>
													<li><a href='#'>Report</a></li>  
													<li><a class='sharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $user_id){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepost($file_id);'>Delete the post</a></li>	
													";
												}
												echo "
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-12'>
								";
									if($num_content>=1){
										$row_content=mysqli_fetch_array($run_content);
										$post_content=$row_content['post_content'];
										echo "
											<pre id='descriptn'>$post_content</pre>
										";
									}
								echo "
										</div>
									</div>
								</div>
								<div class='panel-footer' style='background-color:white;'>
									<div class='row'>
							";
								$userid=$sessionuserid;
								$run_liked_user=mysqli_query($con,"select * from likes where liked_by='$userid' and post_id='$file_id'");
								if(mysqli_num_rows($run_liked_user)>=1){ ?>
									<!-- user already likes post -->
									<span><i class="unlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
									
								<?php }else{ ?>
									<!-- user has not yet liked post -->
									<span><i class="like fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
									
									<?php	}
									?>
									<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
									<span><i class=" share fa fa-share-alt" aria-hidden="true"></i></span>
									
								<!-- saving and unsaving posts -->
										<?php
											$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
											$num_saves=mysqli_num_rows($select_saves);
											if($num_saves>=1){
										?>
											<span><i class="saved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										<?php }else{ ?>
											<span><i class="save fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
										<?php } ?>
									
									<br>
										<!--  showing number of likes. -->
										<?php if($likes==1){ ?>
											<span class="likescnt"><?php echo $likes; ?> like</span>
										<?php }else{ ?>
											<span class="likescnt"><?php echo $likes; ?> likes</span>
										<?php } ?>
											<br>
										<span class="timeagocnt">
										<?php
											//showing time i.e 1 min ago,etc...
											echo time_ago_in_php($post_date);
										?>
										</span>
							<?php
							echo "
								</div>
								<br>
							";
							?>		
									<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									?>
									<div id="cmntsdiv">
									<?php if(mysqli_num_rows($run_num_cmnts)>1){ ?>
									<p style="color:#807e79"><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $file_id ?>">View all comments</a></p>
									<?php
									}
										showcomments($file_id);
									?>
									</div>
									<script>
									/*	var name = <?php echo json_encode($file_id); ?>;
										list_comments(name);
										/*$(document).ready(function(){
											setInterval(function(){
												list_comments(name);
											},10000);
										});*/
									</script>
									<div class="cmntlist<?php echo $file_id ?>"></div>
								
								<!-- commenting part -->
								<div class="row" style="margin-bottom:-11px;" >
									<div>
										<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
										<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
									
								<?php		
								echo "
								</div>
							</div>
						";
					}  
				}elseif($user_type=="page"){
					//getting page data
					$select_pagedata=mysqli_query($con,"select * from pages where page_id='$user_id'");
					$row_page=mysqli_fetch_array($select_pagedata);
					$user_name=$row_page['pagename'];
					$prfpic=$row_page['pagepic'];
					$created_by=$row_page['created_by_id'];
					$pagecat=$row_page['pagecat'];
					
					//getting post content 
					$select_content="select post_content from user_postcontent where user_id='$user_id' AND file_id='$file_id'";
					$run_content=mysqli_query($con,$select_content);
					$num_content=mysqli_num_rows($run_content);
					
					$check_verified=mysqli_query($con,"select status from account_verifications where user_id='$user_id'");
					$row_sts=mysqli_fetch_array($check_verified);
					$status=$row_sts['status'];
					
					if($post_img!=""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='pageprofile.php?page_id=$user_id'><img src='images/prfpics/$prfpic' id='pageprf_pic1' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
											<br>
											<a href='pageprofile.php?page_id=$user_id' id='post_labelname'><p style='margin-top:-20px;margin-left:-30px;'>$user_name
											</p>
											<a href='pageprofile.php?page_id=$user_id' id='userid'><p style='margin-top:px;margin-left:-30px;'>$pagecat</p></a></a>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left'>
													<li><a href='#'>Report</a></li>  
													<li><a class='sharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $created_by){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepost($file_id);'>Delete the post</a></li>	
													";
												}
												echo "												
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class='panel-body' id='post_body'>
									<div class='row'>
										<div class='col-sm-12'>
							";
								$ext = strtolower(pathinfo($post_img, PATHINFO_EXTENSION));
								if(in_array($ext,$img_extensions)){
									echo "
										<img src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' />
									";
								}else{
									echo "
										<video src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' controls></video>
									";
								}
								echo "
										</div>
									</div>
								</div>
								<div class='panel-footer' style='background-color:white;'>
									<div class='row'>
							";
										$userid=$sessionuserid;
										$run_liked_user=mysqli_query($con,"select * from likes where liked_by='$userid' and post_id='$file_id'");
										if(mysqli_num_rows($run_liked_user)>=1){ ?>
											<!-- user already likes post -->
											<span><i class="unlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
											
										<?php }else{ ?>
											<!-- user has not yet liked post -->
											<span><i class="like fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
											
										<?php	}?>
											<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
											<span><i class=" share fa fa-share-alt" aria-hidden="true"></i></span>
											
										<!-- saving and unsaving posts -->
										<?php
											$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
											$num_saves=mysqli_num_rows($select_saves);
											if($num_saves>=1){
										?>
											<span><i class="saved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										<?php }else{ ?>
											<span><i class="save fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
										<?php } ?>
											
									
												<br>
										<!--  showing number of likes. -->
										<?php if($likes==1){ ?>
											<span class="likescnt"><?php echo $likes; ?> like</span>
										<?php }else{ ?>
											<span class="likescnt"><?php echo $likes; ?> likes</span>
										<?php } ?>
											<br>
										<span class="timeagocnt">
										<?php
											//showing time i.e 1 min ago,etc...
											echo time_ago_in_php($post_date);
										?>
										</span>		
										<?php
											if($num_content>=1){
												$row_content=mysqli_fetch_array($run_content);
												$post_content=$row_content['post_content'];
												if(strlen($post_content)>150){
													$post_content=substr($post_content,0,149);
													echo "
													<br>
														&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content  <a href='postdetails.php?user_id=$userid&post_id=$file_id' id='seemorelink'><i>see more...</i></a></pre></span>
														
													";
												}else{
												echo "
													<br>
													&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content</pre></span>
												";
												}
											}
								echo "
									</div>
								";
							?>
									<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									?>
									<div id="cmntsdiv">
									<?php if(mysqli_num_rows($run_num_cmnts)>1){ ?>
									<p style="color:#807e79"><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $file_id ?>" id="vallcmnts">View all comments</a></p>
									<?php
									}
										showcomments($file_id);
									?>
									</div>
									<script>
									/*	var name = <?php echo json_encode($file_id); ?>;
										list_comments(name);
										/*$(document).ready(function(){
											setInterval(function(){
												list_comments(name);
											},10000);
										});*/
									</script>
									<div class="cmntlist<?php echo $file_id ?>"></div>
								
								<!-- commenting part -->
								<div class="row" style="margin-bottom:-11px;" >
									<div>
										<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
										<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
							<?php
								echo "
								</div>
							</div>
						";
					}elseif($post_img==""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='pageprofile.php?page_id=$user_id'><img src='images/prfpics/$prfpic' id='pageprf_pic1' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
											<br>
											<a href='pageprofile.php?page_id=$user_id' id='post_labelname'><p style='margin-top:-20px;margin-left:-30px;'>$user_name
											</p>
											<a href='pageprofile.php?page_id=$user_id' id='userid'><p style='margin-top:px;margin-left:-30px;'>$pagecat</p></a></a></a>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left'>
													<li><a href='#'>Report</a></li>  
													<li><a class='sharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $created_by){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepost($file_id);'>Delete the post</a></li>	
													";
												}
												echo "												
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-12'> 
							";
									if($num_content>=1){
										$row_content=mysqli_fetch_array($run_content);
										$post_content=$row_content['post_content'];
										echo "
											<pre id='descriptn'>$post_content</pre>
										";
									}
							echo "
										</div>
									</div>
								</div>
								<div class='panel-footer' style='background-color:white;'>
									<div class='row'>
							";
										$userid=$sessionuserid;
										$run_liked_user=mysqli_query($con,"select * from likes where liked_by='$userid' and post_id='$file_id'");
										if(mysqli_num_rows($run_liked_user)>=1){ ?>
											<!-- user already likes post -->
											<span><i class="unlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
											
										<?php }else{ ?>
											<!-- user has not yet liked post -->
											<span><i class="like fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
											
										<?php	}
										?>
										<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
										<span><i class=" share fa fa-share-alt" aria-hidden="true"></i></span>
										
									<!-- saving and unsaving posts -->
										<?php
											$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
											$num_saves=mysqli_num_rows($select_saves);
											if($num_saves>=1){
										?>
											<span><i class="saved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										<?php }else{ ?>
											<span><i class="save fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
										<?php } ?>
										
										<br>
										<!--  showing number of likes. -->
										<?php if($likes==1){ ?>
											<span class="likescnt"><?php echo $likes; ?> like</span>
										<?php }else{ ?>
											<span class="likescnt"><?php echo $likes; ?> likes</span>
										<?php } ?>
											<br>
										<span class="timeagocnt">
										<?php
											//showing time i.e 1 min ago,etc...
											echo time_ago_in_php($post_date);
										?>
										</span>		
							<?php
							echo "
								</div>
								<br>
							";
							?>
										<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									?>
									<div id="cmntsdiv">
									<?php if(mysqli_num_rows($run_num_cmnts)>1){ ?>
									<p style="color:#807e79"><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $file_id ?>" id="vallcmnts">View all comments</a></p>
									<?php
									}
										showcomments($file_id);
									?>
									</div>
									<script>
									/*	var name = <?php echo json_encode($file_id); ?>;
										list_comments(name);
										/*$(document).ready(function(){
											setInterval(function(){
												list_comments(name);
											},10000);
										});*/
									</script>
									<div class="cmntlist<?php echo $file_id ?>"></div>
								
								<!-- commenting part -->
								<div class="row" style="margin-bottom:-11px;" >
									<div>
										<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
										<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
								
								<?php		
								echo "
								</div>
							</div>
						";
					}
				}
			}
		}else{
			echo "
				<div class='panel panel-default' id='profsavedtab'>
					<div class='panel-body'>
						<div class='alert alert-danger'>
							<p style='text-align:center;font-family:bold;font-size:1.5em;'>No Posts Saved Yet!</p>
						</div>
					</div>	
				</div>
			";
		}
	}
}

?>
</html>
<!-- Add Jquery to page -->
			<script>
				$(document).ready(function(){
					// when the user clicks on like
						$('.like').click(function(){
							var postid = $(this).attr('id');
							var userid = $(this).attr('userid');
							$.ajax({
								url:'functions/operations.php',
								type: 'post',
								data:{
									'liked':userid,
									'postid':postid
								},
								success:function(data){
									savedpsts();
									likedPosts();
								}
							});
							return false;
						});
						
						// when the user clicks on unlike
						
						$('.unlike').click(function(){
							var postid = $(this).attr('id');
							var userid = $(this).attr('userid');
							$.ajax({
								url:'functions/operations.php',
								type: 'post',
								data:{
									'unliked':userid,
									'postid':postid
								},
								success:function(data){
									savedpsts();
									likedPosts();
								}
							});	
							return false;
						});
						
						//saving the post
						$('.save').click(function(){
							var postid = $(this).attr('id');
							var userid = $(this).attr('userid');
							$.ajax({
								url:'functions/operations.php',
								type: 'post',
								data:{
									'save':userid,
									'postid':postid
								},
								success:function(data){
									savedpsts();
									likedPosts();
								}
							});	
							return false;
						});
						
						//unsaving the post
						 $('.saved').click(function(){
							var postid = $(this).attr('id');
							var userid = $(this).attr('userid');
							$.ajax({
								url:'functions/operations.php',
								type: 'post',
								data:{
									'saved':userid,
									'postid':postid
								},
								success:function(data){
									savedpsts();
									likedPosts();
								}
							});	
							return false;
						});
						 						 
						//commenting insertion
						$('.cmntsubmit').click(function(){
							var postid=$(this).attr('postid');
							var userid=$(this).attr('userid');
							var comment=$('.'+postid).val();
							if(comment==""){
								alert('write something into the comment!');
								return;
							}
							$.ajax({
								url:'functions/operations.php',
								data:'postid='+postid+'&comment='+comment+'&user_id='+userid,
								type:'post',
								async:false,
								success:function(){
									$('.'+postid).val('');
									savedpsts();
									likedPosts();
								}
							});
							return false;
						});

						//comment likes insertion
						$('.cmntlikebtn').click(function(){
							var cmntid = $(this).attr('id');
							var userid = $(this).attr('userid');
							$.ajax({
								url:'functions/operations.php',
								type: 'post',
								data:'cmnt_liked='+userid+'&postid='+cmntid,
								async:false,
								success:function(data){
									savedpsts();
									likedPosts();
								}
							});
							return false;
						});
						
						//unliking comments
						$('.cmntunlikebtn').click(function(){
							var cmntid = $(this).attr('id');
							var userid = $(this).attr('userid');
							$.ajax({
								url:'functions/operations.php',
								type: 'post',
								data:'cmnt_unliked='+userid+'&postid='+cmntid,
								async:false,
								success:function(data){
									savedpsts();
									likedPosts();
								}
							});
							return false;
						});
						
						//insertion of comment when enter button is hit
						$('.cmntbox').on('keyup',function(event){
						  if(event.keyCode == 13){
							var postid=$(this).attr('postid');
							var userid=$(this).attr('userid');
							var comment=$('.'+postid).val();
							if(comment==""){
								alert('write something into the comment!');
								return;
							}
							$.ajax({
								url:'functions/operations.php',
								data:'postid='+postid+'&comment='+comment+'&user_id='+userid,
								type:'post',
								async:false,
								success:function(){
									$('.'+postid).val('');
									savedpsts();
									likedPosts();
								}
							});
							return false;
						  }
						});
					});
					
					//deleting a post
					function deletepost(postid){
						//alert(postid);
						$.ajax({
							url:'functions/functions.php',
							data:'deletepost=1&post_id='+postid,
							type:'post',
							async: true,
							success:function(){
								savedpsts();
								likedPosts();
							}
						});
					}
					
					//sharing a post tp other as a message
					$(".sharepost").click(function(){
						var postid=$(this).attr("postid");
						document.getElementById("fwrdpostid").value=postid;
						$('#sharePostAsMsg').modal({
							show: true
						});
						$.ajax({
							url:'functions/functions.php',
							data:'showusrstoshr=1',
							type:'post',
							async:false,
							success:function(res){
								$(".showuserstoshare").html(res);
							}
						});
						return false;
					});

					//closing the modal of sharing post as a msg
					$('#sharePostAsMsg').on('hidden.bs.modal', function () {
						likedPosts();
					});
			</script>
			
			<!--  Sharing Post As Message MOdal -->
			<div class="modal fade" id="sharePostAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<div class="panel-title"><p><strong>Share a post!</strong></p></div>	
						</div>
						<div class="modal-body" style="height:450px;overflow-y:auto;">
							<div class="panel panel-deafult">
								<div class="panel-body">
									<label style="width:80%;margin-top:-20px;">select users to share post: </label>
									<input type="text" name="fwrdpostid" id="fwrdpostid" style="display:none;" />
									<div style="border:solid #e6e6e6 1px;">
										<div class="showuserstoshare"></div>
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
	
	//showing comments
	function showcomments($file_id){
		global $con;
		$sessionuserid=$_SESSION['uid'];
		$result=mysqli_query($con,"select * from comments where post_id='$file_id' ORDER BY commented_date DESC LIMIT 1");
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result)){
				$user=$row['user_id'];
				$cmnt_likes=$row['cmnt_likes'];
				$cmnt_id=$row['cmnt_id'];
				$commented_date=$row['commented_date'];
				$select_prfpic=mysqli_query($con,"select profile_pic from users where user_id='$user'");
				$rowpic=mysqli_fetch_array($select_prfpic);
				$prfpic=$rowpic['profile_pic'];
				
				$check_cmntlike=mysqli_query($con,"select * from likes where liked_by='$sessionuserid' AND post_id='$cmnt_id'");
				$num_likes=mysqli_num_rows($check_cmntlike);
				?>
					<a href="profile.php?user_id=<?php echo $user; ?>" id="cmnttoprf"><img src="<?php echo $prfpic; ?>" width="20px" height="20px"  class="img" style="float:left;border-radius:15px;" />
					<strong style="margin-left:1%;"><i><?php echo $user; ?> : </strong></i></a>&nbsp
					<span><i><?php echo time_ago_in_php($commented_date) ?></i></span>
					<?php if($num_likes==0){ ?>
							<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;"><i class="fa fa-thumbs-o-up cmntlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>"></i></span>
					<?php }else{ ?>
							<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;color:#34baeb;"><i class="fa fa-thumbs-o-up cmntunlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>"></i></span>
					<?php } ?>
					<pre id='cmntsection'>&nbsp;&nbsp;&nbsp;<?php echo $row['comment']; ?></pre>
					<div class="row" style="margin-top:-20px;padding:5px;">
						<div style="margin-left:50px;">
						<?php if($cmnt_likes!=0){ 
							if($cmnt_likes==1){?>
								<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Like</span>&nbsp &nbsp &nbsp &nbsp
						<?php }else{ ?>
								<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Likes</span>&nbsp &nbsp &nbsp &nbsp
						<?php } }?>
							<span style="font-size:0.9em;cursor:pointer;color:#34baeb;">Reply</span>
						</div>
					</div>
					<!--div class="clearfix"></div-->
				<?php
			}
		}
	}

		

function time_ago_in_php($timestamp){
  
  date_default_timezone_set("Asia/Kolkata");         
  $time_ago        = strtotime($timestamp);
  $current_time    = time();
  $time_difference = $current_time - $time_ago;
  $seconds         = $time_difference;
  
  $minutes = round($seconds / 60); // value 60 is seconds  
  $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
  $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
  $weeks   = round($seconds / 604800); // 7*24*60*60;  
  $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
  $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
                
  if ($seconds <= 60){

    return "just Now";

  } else if ($minutes <= 60){

    if ($minutes == 1){

      return "1min ago";

    } else {

      return "$minutes minutes ago";

    }

  } else if ($hours <= 24){

    if ($hours == 1){

      return "1h ago";

    } else {

      return "$hours hrs ago";

    }

  } else if ($days <= 7){

    if ($days == 1){

      return "yesterday";

    } else {

      return "$days days ago";

    }

  } else if ($weeks <= 4.3){

    if ($weeks == 1){

      return "1 week ago";

    } else {

      return "$weeks weeks ago";

    }

  } else if ($months <= 12){

    if ($months == 1){

      return "1 month ago";

    } else {

      return "$months months ago";

    }

  } else {
    
    if ($years == 1){

      return "1 year ago";

    } else {

      return "$years years ago";

    }
  }
}
