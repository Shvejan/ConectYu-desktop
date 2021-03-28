<?php
//include("functions.php");
session_start();
$con=mysqli_connect("localhost","root","","conectyu");
?>
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
	height:480px;
	align:center;
}
#post_body{
	height:500px;
}
</style>
<?php
	//inserting comments
		if(isset($_POST['comment'])){
			global $con;
			$postid=htmlentities(mysqli_real_escape_string($con,$_POST['postid']));
			$cmnt=htmlentities(mysqli_real_escape_string($con,$_POST['comment']));
			$fileuserid=htmlentities(mysqli_real_escape_string($con,$_POST['fileuserid']));
			$user_id=$_POST['user_id'];
			if($cmnt!=""){
				$check_restrict=mysqli_query($con,"select * from cmnt_restrictions where restricted_by='$fileuserid' AND restricted_to='$user_id'");
				$num_restrictions=mysqli_num_rows($check_restrict);
				while(true){
					$notify_id=rand(1111111111,9999999999);
					$checkid=mysqli_query($con,"select notify_id from notifications where notify_id='$notify_id'");
					$num=mysqli_num_rows($checkid);
					if($num==0){
						$insert_cmnt="insert into comments (user_id,comment,post_id,cmnt_likes,cmnt_type,cmntnotify_id,commented_date) values('$user_id','$cmnt','$postid','0','post','$notify_id',NOW())";
						$run_cmnt=mysqli_query($con,$insert_cmnt);
						if($run_cmnt){
							$notify_to=mysqli_query($con,"select * from user_posts where file_id='$postid'");
							$row_notify_to=mysqli_fetch_array($notify_to);
							$userid=$row_notify_to['user_id'];
							$user_type=$row_notify_to['user_type'];
							if($user_type=="page"){
								$page_id=$userid;
								$select_pageadmin=mysqli_query($con,"select created_by_id from pages where page_id='$page_id'");
								$row_page=mysqli_fetch_array($select_pageadmin);
								$userid=$row_page['created_by_id'];
								if($num_restrictions==0){
									if($user_id != $userid){
										$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$userid','comment','unread','$user_type',NOW())";
										$run_insert_notify=mysqli_query($con,$insert_notify);
									}
								}
							}else{
								if($num_restrictions==0){
									if($user_id != $userid){
										$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$userid','comment','unread','$user_type',NOW())";
										$run_insert_notify=mysqli_query($con,$insert_notify);
									}
								}
							}
						}
						break;
					}
				}
			}else{
				echo "<script>alert('write something into the comment!');</script>";
			}
			exit();
		}
		
		//inserting reply comments
		if(isset($_POST['replycomment'])){
			global $con;
			$postid=htmlentities(mysqli_real_escape_string($con,$_POST['postid']));
			$cmnt=htmlentities(mysqli_real_escape_string($con,$_POST['replycomment']));
			$fileuserid=htmlentities(mysqli_real_escape_string($con,$_POST['fileuserid']));
			$user_id=$_POST['user_id'];
			$replytouser=$_POST['replytouser'];
			if($cmnt!=""){
				$check_restrict=mysqli_query($con,"select * from cmnt_restrictions where restricted_by='$fileuserid' AND restricted_to='$user_id'");
				$num_restrictions=mysqli_num_rows($check_restrict);
				while(true){
					$notify_id=rand(1111111111,9999999999);
					$checkid=mysqli_query($con,"select notify_id from notifications where notify_id='$notify_id'");
					$num=mysqli_num_rows($checkid);
					if($num==0){
						$insert_cmnt="insert into comments (user_id,comment,post_id,cmnt_likes,cmnt_type,cmntnotify_id,commented_date) values('$user_id','$cmnt','$postid','0','comment','$notify_id',NOW())";
						$run_cmnt=mysqli_query($con,$insert_cmnt);
						if($run_cmnt){
							if($num_restrictions==0){
								if($user_id != $replytouser){
									$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$replytouser','replycomment','unread','user',NOW())";
									$run_insert_notify=mysqli_query($con,$insert_notify);
								}
							}
						}
						break;
					}
				}
			}else{
				echo "<script>alert('write something into the comment!');</script>";
			}
			exit();
		}
		
		//inserting likes
		if(isset($_POST['liked'])){
			global $con;
			$postid=$_POST['postid'];
			$userid=$_SESSION['uid'];
			while(true){
				$notify_id=rand(1111111111,9999999999);
				$checkid=mysqli_query($con,"select notify_id from notifications where notify_id='$notify_id'");
				$num=mysqli_num_rows($checkid);
				if($num==0){
					$result=mysqli_query($con,"select * from user_posts where file_id='$postid'");
					$row=mysqli_fetch_array($result);
					$n=$row['likes'];
					
					mysqli_query($con,"update user_posts set likes=$n+1 where file_id='$postid'");
					
					$run_like=mysqli_query($con,"insert into likes(liked_by,post_id,like_type,likenotify_id,liked_date) values('$userid','$postid','post','$notify_id',NOW())");
					
					if($run_like){
						$user_id=$row['user_id'];
						$user_type=$row['user_type'];
						if($user_type=="page"){
							$page_id=$user_id;
							$select_pageadmin=mysqli_query($con,"select created_by_id from pages where page_id='$page_id'");
							$row_page=mysqli_fetch_array($select_pageadmin);
							$user_id=$row_page['created_by_id'];
							if($user_id != $userid){
								$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$user_id','like','unread','$user_type',NOW())";
								$run_insert_notify=mysqli_query($con,$insert_notify);
							}
						}else{
							if($user_id != $userid){
								$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$user_id','like','unread','$user_type',NOW())";
								$run_insert_notify=mysqli_query($con,$insert_notify);
							}
						}
					}
					break;
				}
			}
			exit();
		}
		
		//inserting comment likes
		if(isset($_POST['cmnt_liked'])){
			global $con;
			$postid=$_POST['postid'];
			$userid=$_SESSION['uid'];
			$notifytouser=$_POST['notifytouser'];
			$fileuserid=htmlentities(mysqli_real_escape_string($con,$_POST['fileuserid']));
			$check_restrict=mysqli_query($con,"select * from cmnt_restrictions where restricted_by='$fileuserid' AND restricted_to='$userid'");
			$num_restrictions=mysqli_num_rows($check_restrict);
			while(true){
				$notify_id=rand(1111111111,9999999999);
				$checkid=mysqli_query($con,"select notify_id from notifications where notify_id='$notify_id'");
				$num=mysqli_num_rows($checkid);
				if($num==0){
					$result=mysqli_query($con,"select * from comments where cmnt_id='$postid'");
					$row=mysqli_fetch_array($result);
					$n=$row['cmnt_likes'];
					
					mysqli_query($con,"update comments set cmnt_likes=$n+1 where cmnt_id='$postid'");
					
					$run_like=mysqli_query($con,"insert into likes(liked_by,post_id,like_type,likenotify_id,liked_date) values('$userid','$postid','comment','$notify_id',NOW())");
					
					if($run_like){
						$user_id=$row['user_id'];
						if($num_restrictions==0){
							if($user_id != $userid){
								$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$user_id','cmntlike','unread','user',NOW())";
									$run_insert_notify=mysqli_query($con,$insert_notify);
							}
						}
					}
					break;
				}
			}
			exit();
		}
		
		//unliking function
		if(isset($_POST['unliked'])){
			global $con;
			$postid=$_POST['postid'];
			$userid=$_POST['unliked'];	
			$result=mysqli_query($con,"select * from user_posts where file_id=$postid");
			$row=mysqli_fetch_array($result);
			$n=$row['likes'];
			
			mysqli_query($con,"update user_posts set likes=$n-1 where file_id='$postid'");
			$select_notify_id=mysqli_query($con,"select * from likes where post_id='$postid' and liked_by='$userid'");
			$run_unlike=mysqli_query($con,"delete from likes where post_id='$postid' and liked_by='$userid'");
			if($run_unlike){
				$row_notify_id=mysqli_fetch_array($select_notify_id);
				$notify_id=$row_notify_id['likenotify_id'];
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
			}
			exit();
		}
		
		//comment unliking
		if(isset($_POST['cmnt_unliked'])){
			global $con;
			$postid=$_POST['postid'];
			$userid=$_POST['cmnt_unliked'];	
			$result=mysqli_query($con,"select * from comments where cmnt_id=$postid");
			$row=mysqli_fetch_array($result);
			$n=$row['cmnt_likes'];
			
			mysqli_query($con,"update comments set cmnt_likes=$n-1 where cmnt_id='$postid'");
			$select_notify_id=mysqli_query($con,"select * from likes where post_id='$postid' and liked_by='$userid'");
			$run_unlike=mysqli_query($con,"delete from likes where post_id='$postid' and liked_by='$userid'");
			if($run_unlike){
				$row_notify_id=mysqli_fetch_array($select_notify_id);
				$notify_id=$row_notify_id['likenotify_id'];
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
			}
			exit();
		}
		
		//saving tht post
		if(isset($_POST['save'])){
			global $con;
			$postid=$_POST['postid'];
			$userid=$_POST['save'];	
			mysqli_query($con,"insert into saved_posts(user_id,post_id,saved_date) values('$userid','$postid',NOW())");
			exit();
		}
		
		//unsaving the post
		if(isset($_POST['saved'])){
			global $con;
			$postid=$_POST['postid'];
			$userid=$_POST['saved'];	
			mysqli_query($con,"delete from saved_posts where user_id='$userid' and post_id='$postid'");
			exit();
		}
	
	//showing post details when clicked on the post for more details of the post.
	if(isset($_POST['postdetails'])){
		global $con;
		$file_id=$_POST['post_id'];
		$sessionuserid = $_POST['user_id'];
		$select_userprf=mysqli_query($con,"select profile_pic from users where user_id='$sessionuserid'");
		$row_prf=mysqli_fetch_array($select_userprf);
		$prf_picc=$row_prf['profile_pic'];
		$select_post="select * from user_posts where file_id='$file_id'";
		$run_post=mysqli_query($con,$select_post);
		$row_post=mysqli_fetch_array($run_post);
		$post_date=$row_post['uploaded_date'];
		$post_img=$row_post['uploaded_file'];
		$img_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
		$likes=$row_post['likes'];
		$user_id=$row_post['user_id'];
		
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
			
			//checking comments condition
			$select_cmntsel=mysqli_query($con,"select comment_selection from privacy_settings where user_id='$user_id'");
			$row_cmntsel=mysqli_fetch_array($select_cmntsel);
			$cmntsel=$row_cmntsel['comment_selection'];
			if($cmntsel=="disable"){
				$cmntcond="No";
			}elseif($cmntsel=="everyone"){
				$cmntcond="Yes";
			}elseif($cmntsel=="followcon"){
				$checkfws=mysqli_query($con,"select * from following where following_user='$sessionuserid' AND followed_user='$user_id'");
				$numfws=mysqli_num_rows($checkfws);
				$checkcons=mysqli_query($con,"select * from connections where (connect_by='$sessionuserid' AND connect_with='$user_id') OR (connect_by='$user_id' AND connect_with='$sessionuserid')");
				$numcons=mysqli_num_rows($checkcons);
				if(($numfws != 0) OR ($numcons != 0)){
					$cmntcond="Yes";
				}else{
					$cmntcond="No";
				}
			}elseif($cmntsel=="fwfgcon"){
				$checkfws=mysqli_query($con,"select * from following where (following_user='$user_id' AND followed_user='$sessionuserid') OR (following_user='$sessionuserid' AND followed_user='$user_id')");
				$numfws=mysqli_num_rows($checkfws);
				$checkcons=mysqli_query($con,"select * from connections where (connect_by='$sessionuserid' AND connect_with='$user_id') OR (connect_by='$user_id' AND connect_with='$sessionuserid')");
				$numcons=mysqli_num_rows($checkcons);
				if(($numfws != 0) OR ($numcons != 0)){
					$cmntcond="Yes";
				}else{
					$cmntcond="No";
				}
			}else{
				$cmntcond="Yes";
			}
			
			if($user_designation=="student" and $post_img!=""){
				echo "
					<div class='panel panel-default'>
						<div class='panel-heading' style='background-color:white;'>
							<div class='row'>
								<div class='col-sm-2'>
									<a href='profile.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' ></a>
								</div>
								<div class='col-sm-8' id='postid'>
									<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
									<p><i><b>$user_designation at $clg_name</b></i></p>
								</div>
								<div class='col-sm-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu pull-left'>
											<li><a href='#'>Report</a></li>  
											<li><a href='#'>Share</a></li>											
											<li id='delpost' name='delpost'><a href=''>Delete the post</a></li>											
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
									<span><i class=" comment fa fa-comment-o" aria-hidden="true"></i></span>
									<!-- sharing of posts icon -->
									<span><i class=" share fa fa-share-alt sharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
									
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
										echo "
											<br>
											&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content</pre></span>
										";
									}
						echo "
							</div>
							<hr style='margin-top:5px'>
						";
								//checking commenting condition
								if($cmntcond=="Yes"){
								?>
								<div id="cmntsdiv">
								<?php
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
									<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" />
									<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
								</div>
							</div>
						<?php } 
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
									<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
									<p><i><b>$user_designation at $clg_name</b></i></p>
								</div>
								<div class='col-sm-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu pull-left'>
											<li><a href='#'>Report</a></li>  
											<li><a href='#'>Share</a></li>											
											<li id='delpost' name='delpost'><a href=''>Delete the post</a></li>											
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
								<span><i class=" comment fa fa-comment-o" aria-hidden="true"></i></span>
								<!-- sharing of posts icon -->
									<span><i class=" share fa fa-share-alt sharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
								
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
						<hr style='margin-top:0px'>
					";
								//checking commenting condition
								if($cmntcond=="Yes"){
								?>
								<div id="cmntsdiv">
								<?php 
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
									<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" />
									<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
								</div>
							</div>
						<?php } 
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
									<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
									<p><i><b>$org_add</b></i></p>
								</div>
								<div class='col-sm-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu pull-left'>
											<li><a href='#'>Report</a></li>  
											<li><a href='#'>Share</a></li> 
											<li id='delpost' name='delpost'><a href=''>Delete the post</a></li>
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
								<img src='uploadedFiles/$post_img' id='post_img' />
							";
						}else{
							echo "
								<video src='uploadedFiles/$post_img' id='post_img' controls></video>
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
							<span><i class=" comment fa fa-comment-o" aria-hidden="true"></i></span>
							<!-- sharing of posts icon -->
								<span><i class=" share fa fa-share-alt sharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
							
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
										echo "
											<br>
											&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content</pre></span>
										";
									}
						echo "
							</div>
							<hr style='margin-top:5px'>
						";
								//checking commenting condition
								if($cmntcond=="Yes"){
								?>
								<div id="cmntsdiv">
								<?php 
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
									<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" />
									<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
								</div>
							</div>
						<?php } 
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
									<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
									<p><i><b>$org_add</b></i></p>
								</div>
								<div class='col-sm-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu pull-left'>
											<li><a href='#'>Report</a></li>  
											<li><a href='#'>Share</a></li> 
											<li id='delpost' name='delpost'><a href=''>Delete the post</a></li>
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
							<span><i class=" comment fa fa-comment-o" aria-hidden="true"></i></span>
							<!-- sharing of posts icon -->
								<span><i class=" share fa fa-share-alt sharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
							
							
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
							<hr style='margin-top:0px'>
						";
								//checking commenting condition
								if($cmntcond=="Yes"){
								?>
								<div id="cmntsdiv">
								<?php 
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
									<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" />
									<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
								</div>
							</div>
						<?php } 
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
									<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
									<p><b><i>$desg at $org_name</i></b></p>
								</div>
								<div class='col-sm-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu pull-left'>
											<li><a href='#'>Report</a></li>  
											<li><a href='#'>Share</a></li>
											<li id='delpost' name='delpost'><a href=''>Delete the post</a></li>
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
								<img src='uploadedFiles/$post_img' id='post_img' />
							";
						}else{
							echo "
								<video src='uploadedFiles/$post_img' id='post_img' controls></video>
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
							<span><i class=" comment fa fa-comment-o" aria-hidden="true"></i></span>
							<!-- sharing of posts icon -->
								<span><i class=" share fa fa-share-alt sharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
							
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
										echo "
											<br>
											&nbsp&nbsp <strong>@$user_id</strong> &nbsp<span><pre id='descriptn'>$post_content</pre></span>
										";
									}
						echo "
							</div>
							<hr style='margin-top:5px'>
						";
							//checking commenting condition
								if($cmntcond=="Yes"){
								?>
								<div id="cmntsdiv">
								<?php 
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
									<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" />
									<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
								</div>
							</div>
						<?php } 
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
									<a href='profile.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									<a href='profile.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
									<p><b><i>$desg at $org_name</i></b></p>
								</div>
								<div class='col-sm-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu pull-left'>
											<li><a href='#'>Report</a></li>  
											<li><a href='#'>Share</a></li>
											<li id='delpost' name='delpost'><a href=''>Delete the post</a></li>
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
							<span><i class=" comment fa fa-comment-o" aria-hidden="true"></i></span>
							<!-- sharing of posts icon -->
								<span><i class=" share fa fa-share-alt sharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
							
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
						<hr style='margin-top:0px'>
					";
							//checking commenting condition
								if($cmntcond=="Yes"){
								?>
								<div id="cmntsdiv">
								<?php 
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
									<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" />
									<span><a class=" cmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
								</div>
							</div>
						<?php } 
						echo "
						</div>
					</div>
				";
			}  
	}
	
	?>
<script>
//sharing a post and this happens when the send button is clicked
	$('.sharememberbtn').click(function(){
		var postid=document.getElementById("fwrdpostid").value;
		var userid=$(this).attr("userid");
		//alert(postid+" "+userid);
		$.ajax({
			url:'functions/functions.php',
			data:'sharepost=1&postid='+postid+'&userid='+userid,
			type:'post',
			async:false,
			success:function(){
				var chgbtn=document.getElementById("fwrdmember"+userid);
				chgbtn.setAttribute('style','display:none;');
				var shwbtn=document.getElementById("frwded"+userid);
				shwbtn.setAttribute('style','display:visible;');
			}
		});
		return false;
	});
//sharing a post tp other as a message
$(".sharepost").click(function(){
	var postid=$(this).attr("postid");
	var userid=$(this).attr("userid");
	document.getElementById("fwrdpostid").value=postid;
	$('#sharepagePostAsMsg').modal({
		show: true
	});
	$.ajax({
		url:'functions/functions.php',
		data:'showusrstoshr=1',
		type:'post',
		async:false,
		success:function(res){
			$(".showuserstoshare1").html(res);
		}
	});
	return false;
});
</script>	
	
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
						comment_details();
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
						comment_details();
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
						comment_details();
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
						comment_details();
					}
				});	
				return false;
			});
			 
			 
			//commenting insertion
			$('.cmntsubmit').click(function(){
				var postid=$(this).attr('postid');
				var userid=$(this).attr('userid');
				var comment=$('.'+postid).val();
				var fileuserid=$(this).attr('fileuserid');
				if(comment==""){
					alert('write something into the comment!');
					return;
				}
				$.ajax({
					url:'functions/operations.php',
					data:'postid='+postid+'&comment='+comment+'&user_id='+userid+'&fileuserid='+fileuserid,
					type:'post',
					async:false,
					success:function(){
						$('.'+postid).val('');
						comment_details();
					}
				});
				return false;
			});		
			
			//insertion of comment when enter button is hit
			$('.cmntbox').on('keyup',function(event){
			  if(event.keyCode == 13){
				var postid=$(this).attr('postid');
				var userid=$(this).attr('userid');
				var fileuserid=$(this).attr('fileuserid');
				var comment=$('.'+postid).val();
				if(comment==""){
					alert('write something into the comment!');
					return;
				}
				$.ajax({
					url:'functions/operations.php',
					data:'postid='+postid+'&comment='+comment+'&user_id='+userid+'&fileuserid='+fileuserid,
					type:'post',
					async:false,
					success:function(){
						$('.'+postid).val('');
						comment_details();
					}
				});
				return false;
			  }
			});
			
			//inserting reply comments on clicking the send button
			$(".replycmntbox").click(function(){
				var postid=$(this).attr('postid');
				//alert();
				var parentcmntid=$(this).attr('parentcmnt_id');
				var userid=$(this).attr('userid');
				var replytouser=$(this).attr('replytouser');
				var comment=$('.'+postid).val();
				var fileuserid=$(this).attr('fileuserid');
				if(comment==""){
					alert('write something into the comment!');
					return;
				}
				$.ajax({
					url:'functions/operations.php',
					data:'postid='+parentcmntid+'&replycomment='+comment+'&user_id='+userid+'&replytouser='+replytouser+'&fileuserid='+fileuserid,
					type:'post',
					async:false,
					success:function(){
						$('.'+postid).val('');
						comment_details();
					}
				});
				return false;
			});
			
			//insertion of comment replies when enter button is hit
			$('.replycmntbox').on('keyup',function(event){
			  if(event.keyCode == 13){
				var postid=$(this).attr('postid');
				//alert(postid);
				var parentcmntid=$(this).attr('parentcmnt_id');
				var userid=$(this).attr('userid');
				var replytouser=$(this).attr('replytouser');
				var comment=$('.'+postid).val();
				var fileuserid=$(this).attr('fileuserid');
				if(comment==""){
					alert('write something into the comment!');
					return;
				}
				$.ajax({
					url:'functions/operations.php',
					data:'postid='+parentcmntid+'&replycomment='+comment+'&user_id='+userid+'&replytouser='+replytouser+'&fileuserid='+fileuserid,
					type:'post',
					async:false,
					success:function(){
						$('.'+postid).val('');
						comment_details();
					}
				});
				return false;
			  }
			});
			
			//liking comments
			$('.cmntlikebtn').click(function(){
				var cmntid = $(this).attr('id');
				var userid = $(this).attr('userid');
				var notifytouser = $(this).attr('notifytouser');
				var fileuserid=$(this).attr('fileuserid');
				$.ajax({
					url:'functions/operations.php',
					type: 'post',
					data:'cmnt_liked='+userid+'&postid='+cmntid+'&notifytouser='+notifytouser+'&fileuserid='+fileuserid,
					async:false,
					success:function(data){
						comment_details();
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
						comment_details();
					}
				});
				return false;
			});
			
			//page operating functions.
			// when the user clicks on pagelike
		
			$('.plike').click(function(){
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
						 pagecomment_details();
					}
				});
				return false;
			});
			
			// when the user clicks on pageunlike
			
			$('.punlike').click(function(){
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
						pagecomment_details();
					}
				});	
				return false;
			});
			
			
			//saving the pagepost
			$('.psave').click(function(){
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
						pagecomment_details();
					}
				});	
				return false;
			});
			
			//unsaving the pagepost
			 $('.psaved').click(function(){
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
						pagecomment_details();
					}
				});	
				return false;
			});
			
			 
			//commenting insertion of page
			$('.pcmntsubmit').click(function(){
				var postid=$(this).attr('postid');
				var userid=$(this).attr('userid');
				var comment=$('.'+postid).val();
				//alert(postid+' '+userid+' '+comment);
				$.ajax({
					url:'functions/operations.php',
					data:'postid='+postid+'&comment='+comment+'&user_id='+userid,
					type:'post',
					async:false,
					success:function(){
						$('.'+postid).val('');
						pagecomment_details();
					}
				});
				return false;
			});		
			
			//insertion of comment when enter button is hit
			$('.pcmntbox').on('keyup',function(event){
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
						pagecomment_details();
					}
				});
				return false;
			  }
			});
			
			//page comment likes insertion
			$('.pcmntlikebtn').click(function(){
				var cmntid = $(this).attr('id');
				var userid = $(this).attr('userid');
				$.ajax({
					url:'functions/operations.php',
					type: 'post',
					data:'cmnt_liked='+userid+'&postid='+cmntid,
					async:false,
					success:function(data){
						pagecomment_details();
					}
				});
				return false;
			});
			
			//unliking page comments
			$('.pcmntunlikebtn').click(function(){
				var cmntid = $(this).attr('id');
				var userid = $(this).attr('userid');
				$.ajax({
					url:'functions/operations.php',
					type: 'post',
					data:'cmnt_unliked='+userid+'&postid='+cmntid,
					async:false,
					success:function(data){
						pagecomment_details();
					}
				});
				return false;
			});
			
			//inserting reply comments on clicking the send button
			$(".preplycmntbox").click(function(){
				var postid=$(this).attr('postid');
				//alert();
				var parentcmntid=$(this).attr('parentcmnt_id');
				var userid=$(this).attr('userid');
				var replytouser=$(this).attr('replytouser');
				var comment=$('.'+postid).val();
				if(comment==""){
					alert('write something into the comment!');
					return;
				}
				$.ajax({
					url:'functions/operations.php',
					data:'postid='+parentcmntid+'&replycomment='+comment+'&user_id='+userid+'&replytouser='+replytouser,
					type:'post',
					async:false,
					success:function(){
						$('.'+postid).val('');
						pagecomment_details();
					}
				});
				return false;
			});
			
			//insertion of comment replies when enter button is hit
			$('.preplycmntbox').on('keyup',function(event){
			  if(event.keyCode == 13){
				var postid=$(this).attr('postid');
				//alert(postid);
				var parentcmntid=$(this).attr('parentcmnt_id');
				var userid=$(this).attr('userid');
				var replytouser=$(this).attr('replytouser');
				var comment=$('.'+postid).val();
				if(comment==""){
					alert('write something into the comment!');
					return;
				}
				$.ajax({
					url:'functions/operations.php',
					data:'postid='+parentcmntid+'&replycomment='+comment+'&user_id='+userid+'&replytouser='+replytouser,
					type:'post',
					async:false,
					success:function(){
						$('.'+postid).val('');
						pagecomment_details();
					}
				});
				return false;
			  }
			});
			
			//cmnt Reply label
			$('.replylabel').click(function(){
				var cmnt_id=$(this).attr("id");
				var user=$(this).attr("user");
				var cmntbox=document.getElementById(cmnt_id+"cmntbox");
				cmntbox.setAttribute('style','display:display');
				$("#"+cmnt_id+"textbox").val("@"+user+"  ");
				$("#"+cmnt_id+"textbox").focus();
			});
			
			//pagecomment label
			$('.preplylabel').click(function(){
				var cmnt_id=$(this).attr("id");
				var user=$(this).attr("user");
				var cmntbox=document.getElementById(cmnt_id+"cmntbox");
				cmntbox.setAttribute('style','display:display');
				$("#"+cmnt_id+"textbox").val("@"+user+"  ");
				$("#"+cmnt_id+"textbox").focus();
			});
			
		});
</script>
<?php
	
	//showing user comments
	function showcomments($file_id){
		global $con;
		$sessionuserid=$_SESSION['uid'];
		$select_fuserid=mysqli_query($con,"select user_id from comments where post_id='$file_id'");
		$row_fuserid=mysqli_fetch_array($select_fuserid);
		$fileuserid=$row_fuserid['user_id'];
		$result=mysqli_query($con,"select * from comments where post_id='$file_id' ORDER BY commented_date DESC");
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result)){
				$user=$row['user_id'];
				//checking comment restriction
				$check_cmntrestict=mysqli_query($con,"select * from cmnt_restrictions where restricted_by='$fileuserid' AND restricted_to='$user'");
				$num_cmntrestict=mysqli_num_rows($check_cmntrestict);
				if($num_cmntrestict==0 OR $sessionuserid==$user){
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
								<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;"><i class="fa fa-thumbs-o-up cmntlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>" fileuserid="<?php echo $fileuserid; ?>"></i></span>
						<?php }else{ ?>
								<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;color:#34baeb;"><i class="fa fa-thumbs-o-up cmntunlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>"></i></span>
						<?php } ?>
						<p id='cmntsection'>&nbsp;&nbsp;&nbsp;<?php echo $row['comment']; ?></p>
						<div class="row" style="margin-top:-20px;padding:5px;">
							<div style="margin-left:50px;">
							<?php if($cmnt_likes!=0){ 
								if($cmnt_likes==1){?>
									<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Like</span>&nbsp &nbsp &nbsp &nbsp
							<?php }else{ ?>
									<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Likes</span>&nbsp &nbsp &nbsp &nbsp
							<?php } }?>
								<span class="replylabel" id=<?php echo $cmnt_id; ?> user="<?php echo $user; ?>" style="font-size:0.9em;cursor:pointer;color:#34baeb;">Reply</span>
								
								<div class="row repcmntbox" id="<?php echo $cmnt_id; ?>cmntbox" style="display:none;">
									<input type="text" class="<?php echo $cmnt_id; ?> form-control replycmntbox" id="<?php echo $cmnt_id; ?>textbox" placeholder="write..." style="float:left;width:50%;margin-left:10%;margin-top:5px;" userid="<?php echo $sessionuserid; ?>" postid="<?php echo $cmnt_id; ?>" parentcmnt_id="<?php echo $cmnt_id; ?>" replytouser="<?php echo $user; ?>" fileuserid="<?php echo $fileuserid; ?>" />
									
									<i class="fa fa-paper-plane replycmntbox" aria-hidden="true" style="position:absolute;z-index:1;margin-left:-25px;margin-top:13px;font-size:1.3em;cursor:pointer;" userid="<?php echo $sessionuserid; ?>" postid="<?php echo $cmnt_id; ?>" parentcmnt_id="<?php echo $cmnt_id; ?>" replytouser="<?php echo $user; ?>" fileuserid="<?php echo $fileuserid; ?>"></i>
								</div>
								<div id="cmntreplies" style="margin-top:10px;"><?php echo commentReplies($cmnt_id,$fileuserid); ?></div>
							</div>
						</div>
						<!--div class="clearfix"></div-->
					<?php
				}
			}
		}
	}
	
	//showing comment replies
	function commentReplies($cmnt_id,$fileuserid){
		global $con;
		$sessionuserid=$_SESSION['uid'];
		$parentcmnt_id=$cmnt_id;
		$result=mysqli_query($con,"select * from comments where post_id='$cmnt_id' AND cmnt_type='comment'  ORDER BY commented_date DESC");
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result)){
				$user=$row['user_id'];
				//checking comment restriction
				$check_cmntrestict=mysqli_query($con,"select * from cmnt_restrictions where restricted_by='$fileuserid' AND restricted_to='$user'");
				$num_cmntrestict=mysqli_num_rows($check_cmntrestict);
				if($num_cmntrestict==0 OR $sessionuserid==$user){
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
								<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;margin-right:11px;"><i class="fa fa-thumbs-o-up cmntlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>" fileuserid="<?php echo $fileuserid; ?>"></i></span>
						<?php }else{ ?>
								<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;color:#34baeb;margin-right:11px;"><i class="fa fa-thumbs-o-up cmntunlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>"></i></span>
						<?php } ?>
						<p id='replycmntsection'>&nbsp;&nbsp;&nbsp;<?php echo $row['comment']; ?></p>
						<div class="row" style="margin-top:-15px;padding:5px;">
							<div style="margin-left:50px;">
							<?php if($cmnt_likes!=0){ 
								if($cmnt_likes==1){?>
									<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Like</span>&nbsp &nbsp &nbsp &nbsp
							<?php }else{ ?>
									<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Likes</span>&nbsp &nbsp &nbsp &nbsp
							<?php } }?>
								<span class="replylabel" id=<?php echo $cmnt_id; ?> user="<?php echo $user; ?>" style="font-size:0.9em;cursor:pointer;color:#34baeb;">Reply</span>
								<!--div id="cmntreplies"><?php //commentReplies($parentcmnt_id); ?></div-->
								<div class="row repcmntbox" id="<?php echo $cmnt_id; ?>cmntbox" style="display:none;">
									<input type="text" class="<?php echo $cmnt_id; ?> form-control replycmntbox" id="<?php echo $cmnt_id; ?>textbox" placeholder="write..." style="float:left;width:50%;margin-left:10%;margin-top:5px;" userid="<?php echo $sessionuserid; ?>" postid="<?php echo $cmnt_id; ?>" parentcmnt_id="<?php echo $parentcmnt_id; ?>" replytouser="<?php echo $user; ?>" fileuserid="<?php echo $fileuserid; ?>" />
									
									<i class="fa fa-paper-plane replycmntbox" aria-hidden="true" style="position:absolute;z-index:1;margin-left:-25px;margin-top:13px;font-size:1.3em;cursor:pointer;" userid="<?php echo $sessionuserid; ?>" postid="<?php echo $cmnt_id; ?>" parentcmnt_id="<?php echo $parentcmnt_id; ?>" replytouser="<?php echo $user; ?>" fileuserid="<?php echo $fileuserid; ?>" ></i>
								</div>
							</div>
						</div>
						<!--div class="clearfix"></div-->
					<?php
				}
			}
		}
	}
	
	//showing page comments
	function showPageComments($file_id){
		global $con;
		$sessionuserid=$_SESSION['uid'];
		$result=mysqli_query($con,"select * from comments where post_id='$file_id' ORDER BY commented_date DESC");
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
							<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;"><i class="fa fa-thumbs-o-up pcmntlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>" notifytouser="<?php echo $user; ?>"></i></span>
					<?php }else{ ?>
							<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;color:#34baeb;"><i class="fa fa-thumbs-o-up pcmntunlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>" notifytouser="<?php echo $user; ?>"></i></span>
					<?php } ?>
					<p id='cmntsection'>&nbsp;&nbsp;&nbsp;<?php echo $row['comment']; ?></p>
					<div class="row" style="margin-top:-20px;padding:5px;">
						<div style="margin-left:50px;">
						<?php if($cmnt_likes!=0){ 
							if($cmnt_likes==1){?>
								<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Like</span>&nbsp &nbsp &nbsp &nbsp
						<?php }else{ ?>
								<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Likes</span>&nbsp &nbsp &nbsp &nbsp
						<?php } }?>							
							<span class="preplylabel" id=<?php echo $cmnt_id; ?> user="<?php echo $user; ?>" style="font-size:0.9em;cursor:pointer;color:#34baeb;">Reply</span>
							
							<div class="row prepcmntbox" id="<?php echo $cmnt_id; ?>cmntbox" style="display:none;">
								<input type="text" class="<?php echo $cmnt_id; ?> form-control preplycmntbox" id="<?php echo $cmnt_id; ?>textbox" placeholder="write..." style="float:left;width:50%;margin-left:10%;margin-top:5px;" userid="<?php echo $sessionuserid; ?>" postid="<?php echo $cmnt_id; ?>" parentcmnt_id="<?php echo $cmnt_id; ?>" replytouser="<?php echo $user; ?>" />
								
								<i class="fa fa-paper-plane preplycmntbox" aria-hidden="true" style="position:absolute;z-index:1;margin-left:-25px;margin-top:13px;font-size:1.3em;cursor:pointer;" userid="<?php echo $sessionuserid; ?>" postid="<?php echo $cmnt_id; ?>" parentcmnt_id="<?php echo $cmnt_id; ?>" replytouser="<?php echo $user; ?>"></i>
							</div>
							<div id="cmntreplies" style="margin-top:10px;"><?php echo pageCommentReplies($cmnt_id); ?></div>
						</div>
					</div>
					<!--div class="clearfix"></div-->
				<?php
			}
		}
	}
	
	//showing page comments replies.
	function pageCommentReplies($cmnt_id){
		global $con;
		$sessionuserid=$_SESSION['uid'];
		$parentcmnt_id=$cmnt_id;
		$result=mysqli_query($con,"select * from comments where post_id='$cmnt_id' ORDER BY commented_date DESC");
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
							<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;margin-right:11px;"><i class="fa fa-thumbs-o-up pcmntlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>" notifytouser="<?php echo $user; ?>"></i></span>
					<?php }else{ ?>
							<span style="float:right;font-size:1.3em;margin-bottom:-3px;cursor:pointer;color:#34baeb;margin-right:11px;"><i class="fa fa-thumbs-o-up pcmntunlikebtn" aria-hidden="true" id="<?php echo $cmnt_id; ?>" userid="<?php echo $_SESSION['uid']; ?>" notifytouser="<?php echo $user; ?>"></i></span>
					<?php } ?>
					<p id='replycmntsection'>&nbsp;&nbsp;&nbsp;<?php echo $row['comment']; ?></p>
					<div class="row" style="margin-top:-20px;padding:10px;">
						<div style="margin-left:50px;">
						<?php if($cmnt_likes!=0){ 
							if($cmnt_likes==1){?>
								<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Like</span>&nbsp &nbsp &nbsp &nbsp
						<?php }else{ ?>
								<span style="font-size:0.9em;cursor:pointer;color:#34baeb;"><?php echo $cmnt_likes; ?>  Likes</span>&nbsp &nbsp &nbsp &nbsp
						<?php } }?>							
							<span class="preplylabel" id=<?php echo $cmnt_id; ?> user="<?php echo $user; ?>" style="font-size:0.9em;cursor:pointer;color:#34baeb;">Reply</span>
							
							<div class="row prepcmntbox" id="<?php echo $cmnt_id; ?>cmntbox" style="display:none;">
								<input type="text" class="<?php echo $cmnt_id; ?> form-control preplycmntbox" id="<?php echo $cmnt_id; ?>textbox" placeholder="write..." style="float:left;width:50%;margin-left:10%;margin-top:5px;" userid="<?php echo $sessionuserid; ?>" postid="<?php echo $cmnt_id; ?>" parentcmnt_id="<?php echo $parentcmnt_id; ?>" replytouser="<?php echo $user; ?>" />
								
								<i class="fa fa-paper-plane preplycmntbox" aria-hidden="true" style="position:absolute;z-index:1;margin-left:-25px;margin-top:13px;font-size:1.3em;cursor:pointer;" userid="<?php echo $sessionuserid; ?>" postid="<?php echo $cmnt_id; ?>" parentcmnt_id="<?php echo $parentcmnt_id; ?>" replytouser="<?php echo $user; ?>"></i>
							</div>
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

//showing page posts in the page postdetails page
if(isset($_POST['pagepostdetails'])){
	global $con;
		$sessionuserid = $_SESSION['uid'];
		$post_id = $_POST['post_id'];
		$select_prfpic=mysqli_query($con,"select profile_pic from users where user_id='$sessionuserid'");
		$row_prfpic=mysqli_fetch_array($select_prfpic);
		$prf_picc=$row_prfpic['profile_pic'];
		$select_pageid=mysqli_query($con,"select * from user_posts where file_id='$post_id'");
		$row_pgid=mysqli_fetch_array($select_pageid);
		$page_id=$row_pgid['user_id'];
		//$select_posts="select * from user_posts where user_id='$page_id'";
		//$run_posts=mysqli_query($con,$select_posts);
		//$row_posts=mysqli_fetch_array($run_posts);
		$post_img=$row_pgid['uploaded_file'];
		$likes=$row_pgid['likes'];
		$file_id=$row_pgid['file_id'];
		$uploaded_date=$row_pgid['uploaded_date'];
		$img_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
		
		$select_cnt="select * from user_postcontent where user_id='$page_id' and file_id='$file_id'";
		$run_cnt=mysqli_query($con,$select_cnt);
		$num_content=mysqli_num_rows($run_cnt);
		
		$select_page=mysqli_query($con,"select * from pages where page_id='$page_id'");
		$row_page=mysqli_fetch_array($select_page);
		$page_name=$row_page['pagename'];
		$pagecat=$row_page['pagecat'];
		$pagepic=$row_page['pagepic'];
		
		if($post_img != ""){
			echo "
				<div class='panel panel-default'>
					<div class='panel-heading' style='background-color:white;'>
						<div class='row'>
							<div class='col-sm-1'>
								<a href='pageprofile.php?page_id=$page_id'><img src='images/prfpics/$pagepic' id='prf_pic12' ></a>
							</div>
							<div class='col-sm-9' id='postid'>
								<a href='pageprofile.php?page_id=$page_id' id='post_labelname1'><p>$page_name
							";
								/*if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="17px" height="17px" ></span> <?php }*/
						echo "	
								</p></a>
								<a href='pageprofile.php?page_id=$page_id' id='userid'><p>$pagecat</p></a>
							</div>
							<div class='col-sm-2'>
								<div class='dropdown'>
									<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
									glyphicon-option-vertical'></i></li>
									<ul class='dropdown-menu pull-left'>
										<li><a href='#'>Report</a></li>  
										<li><a href='#'>Share</a></li>											
										<li id='delpost' name='delpost'><a href=''>Delete the post</a></li>											
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
								<span><i class="punlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
								
							<?php }else{ ?>
								<!-- user has not yet liked post -->
								<span><i class="plike fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
								
							<?php	}?>
								<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
								<!-- sharing of posts icon -->
								<span><i class=" share fa fa-share-alt sharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
								
							<!-- saving and unsaving posts -->
							<?php
								$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
								$num_saves=mysqli_num_rows($select_saves);
								if($num_saves>=1){
							?>
								<span><i class="psaved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
							<?php }else{ ?>
								<span><i class="psave fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
								
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
								echo time_ago_in_php($uploaded_date);
							?>
							</span>		
							<?php
								if($num_content>=1){
									$row_content=mysqli_fetch_array($run_cnt);
									$post_content=$row_content['post_content'];
									if(strlen($post_content)>150){
										$post_content=substr($post_content,0,149);
										echo "
										<br>
											&nbsp&nbsp <strong>@$page_name</strong> &nbsp<span><pre id='descriptn'>$post_content  <a href='postdetails.php?user_id=$userid&post_id=$file_id' id='seemorelink'><i>see more...</i></a></pre></span>
											
										";
									}else{
									echo "
										<br>
										&nbsp&nbsp <strong>@$page_name</strong> &nbsp<span><pre id='descriptn'>$post_content</pre></span>
									";
									}
								}
					echo "
						</div>
						<hr style='margin-top:0px'>
					";
				
							showPageComments($file_id);
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
								<input type="text" class="<?php echo $file_id; ?> form-control pcmntbox" placeholder="   Add a comment..." style="width:84%;float:left;border-radius:20px;" id="pcmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
								<span><a class=" pcmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="pcmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
							</div>
						</div>
				<?php
					echo "
					</div>
				</div>
			";
		}else if($post_img == ""){
			echo "
				<div class='panel panel-default'>
					<div class='panel-heading' style='background-color:white;'>
						<div class='row'>
							<div class='col-sm-1'>
								<a href='pageprofile.php?page_id=$page_id'><img src='images/prfpics/$pagepic' id='prf_pic12' ></a>
							</div>
							<div class='col-sm-9' id='postid'>
								<a href='pageprofile.php?page_id=$page_id' id='post_labelname1'><p>$page_name
							";
								/*if($status=="Verified"){ ?> <span><img style="display:inline" id="bluetick" src="images/verifylogos/bluetik.png" class="img img-responsive" width="17px" height="17px" ></span> <?php }*/
						echo "	
								</p></a>
								<a href='pageprofile.php?page_id=$page_id' id='userid'><p>$pagecat</p></a>
							</div>
							<div class='col-sm-2'>
								<div class='dropdown'>
									<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
									glyphicon-option-vertical'></i></li>
									<ul class='dropdown-menu pull-left'>
										<li><a href='#'>Report</a></li>  
										<li><a href='#'>Share</a></li>											
										<li id='delpost' name='delpost'><a href=''>Delete the post</a></li>											
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
							$row_content=mysqli_fetch_array($run_cnt);
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
								<span><i class="punlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
								
							<?php }else{ ?>
								<!-- user has not yet liked post -->
								<span><i class="plike fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
								
							<?php	}?>
								<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
								<!-- sharing of posts icon -->
								<span><i class=" share fa fa-share-alt sharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
								
							<!-- saving and unsaving posts -->
							<?php
								$select_saves=mysqli_query($con,"select * from saved_posts where user_id='$userid' and post_id='$file_id'");
								$num_saves=mysqli_num_rows($select_saves);
								if($num_saves>=1){
							?>
								<span><i class="psaved fa fa-bookmark" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
							<?php }else{ ?>
								<span><i class="psave fa fa-bookmark-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
								
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
								echo time_ago_in_php($uploaded_date);
							?>
							</span>		
							<?php
								
					echo "
						</div>
						<hr style='margin-top:0px'>
					";
		
						showPageComments($file_id);
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
						<div class="row" style="margin-bottom:-2px;" >
							<div style="margin-left:2%;">
								<img src="<?php echo $prf_picc; ?>" width="36px" height="36px" class="img img-responsive img-circle" style="float:left;" />
								<input type="text" class="<?php echo $file_id; ?> form-control pcmntbox" placeholder="   Add a comment..." style="width:82%;float:left;border-radius:20px;" id="pcmntbox" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> />
								<span><a class=" pcmntsubmit btn btn-default" style="width:10%;border-radius:20px;" id="pcmntsubmit" postid="<?php echo $file_id; ?>" userid=<?php echo $sessionuserid; ?> ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
							</div>
						</div>
				<?php
					echo "
					</div>
				</div>
			";
		}
		
}

//insert into following
if(isset($_POST['insertfollow'])){
	global $con;
	$followed_user=htmlentities(mysqli_real_escape_string($con,$_POST['followto']));
	$following_user=htmlentities(mysqli_real_escape_string($con,$_POST['followby']));
	
	$select_follow="select * from following where following_user='$following_user' AND followed_user='$followed_user'";
	$run_follow=mysqli_query($con,$select_follow);
	$num=mysqli_num_rows($run_follow);
	
	if($num==0){
		while(true){
			$notify_id=rand(1111111111,9999999999);
			$checkid=mysqli_query($con,"select notify_id from notifications where notify_id='$notify_id'");
			$num=mysqli_num_rows($checkid);
			if($num==0){
				$check_privacy=mysqli_query($con,"select account_type from users where user_id='$followed_user'");
				$row_privacy=mysqli_fetch_array($check_privacy);
				$privacy=$row_privacy['account_type'];
				if($privacy=="public"){
					$insert_following = "insert into following (following_user,followed_user,user_type,status,notify_id,date) values('$following_user','$followed_user','user','accepted','$notify_id',NOW())";
					$run_following = mysqli_query($con,$insert_following);
				}elseif($privacy=="private"){
					$insert_following = "insert into following (following_user,followed_user,user_type,status,notify_id,date) values('$following_user','$followed_user','user','requested','$notify_id',NOW())";
					$run_following = mysqli_query($con,$insert_following);
				}
				if($run_following){
					$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$followed_user','follow','unread','user',NOW())";
					$run_insert_notify=mysqli_query($con,$insert_notify);
				}
				break;
			}
		}
	}else{
		echo "<script>alert('An error occurred.Try again!');</script>";
	}
}

//insert page follow
if(isset($_POST['insertpagefollow'])){
	global $con;
	$user_id=htmlentities(mysqli_real_escape_string($con,$_POST['followby']));
	$page_id=htmlentities(mysqli_real_escape_string($con,$_POST['followto']));
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

//unfollow user
if(isset($_POST['unfollowuser'])){
	global $con;
	$followed_user=htmlentities(mysqli_real_escape_string($con,$_POST['followto']));
	$following_user=htmlentities(mysqli_real_escape_string($con,$_POST['followby']));
	
	$select_notify_id=mysqli_query($con,"select notify_id from following where following_user='$following_user' AND followed_user='$followed_user'");
	$delete_follow="delete from following where following_user='$following_user' AND followed_user='$followed_user'";
	$run_delete=mysqli_query($con,$delete_follow);
	if($run_delete){
		$row_notify_id=mysqli_fetch_array($select_notify_id);
		$notify_id=$row_notify_id['notify_id'];
		mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
	}else{
		echo "<script>alert('An error occurred.Try again!');</script>";
	}
}
//unfollow page
if(isset($_POST['unfollowpage'])){
	global $con;
	$followed_user=htmlentities(mysqli_real_escape_string($con,$_POST['followto']));
	$following_user=htmlentities(mysqli_real_escape_string($con,$_POST['followby']));
	
	$select_notify_id=mysqli_query($con,"select notify_id from following where following_user='$following_user' AND followed_user='$followed_user'");
	$delete_follow="delete from following where following_user='$following_user' AND followed_user='$followed_user'";
	$run_delete=mysqli_query($con,$delete_follow);
	if($run_delete){
		$row_notify_id=mysqli_fetch_array($select_notify_id);
		$notify_id=$row_notify_id['notify_id'];
		mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
	}else{
		echo "<script>alert('An error occurred.Try again!');</script>";
	}
}

//connect with org
if(isset($_POST['getconnected'])){
	echo "<script>alert();</script>";
	global $con;
	$connect_by=htmlentities(mysqli_real_escape_string($con,$_POST['connectby']));
	$connect_with=htmlentities(mysqli_real_escape_string($con,$_POST['connectto']));
	$idtoconnect=htmlentities(mysqli_real_escape_string($con,$_POST['idtoconnect']));
	$connecttocnt=htmlentities(mysqli_real_escape_string($con,$_POST['connecttocnt']));
	
	$select_connect="select * from connections where (connect_by='$connect_by' AND connect_with='$connect_with') OR (connect_by='$connect_with' AND connect_with='$connect_by')";
	$run_connect=mysqli_query($con,$select_connect);
	$num=mysqli_num_rows($run_connect);
	
	if($num==0){
		while(true){
			$notify_id=rand(1111111111,9999999999);
			$checkid=mysqli_query($con,"select notify_id from notifications where notify_id='$notify_id'");
			$num=mysqli_num_rows($checkid);
			if($num==0){
				$insert_connections = "insert into connections (connect_by,connect_with,id_proof,proof_cnt,status,notify_id,date) values('$connect_by','$connect_with','$idtoconnect','$connecttocnt','requested','$notify_id',NOW())";
				$run_connections = mysqli_query($con,$insert_connections);
				if($run_connections){
					$insert_notify="insert into notifications(notify_id,notified_to,notification_type,notification_status,user_type,notification_date) values('$notify_id','$connect_with','connection','unread','user',NOW())";
					$run_insert_notify=mysqli_query($con,$insert_notify);
				}
				break;
			}
		}
	}else{
		echo "<script>alert('An error occurred.Try again!');</script>";
	}
}

//Disconnect with org
if(isset($_POST['disconnectuser'])){
	global $con;
	$connect_by=htmlentities(mysqli_real_escape_string($con,$_POST['connectby']));
	$connect_with=htmlentities(mysqli_real_escape_string($con,$_POST['connectto']));
	
	$select_notify_id=mysqli_query($con,"select notify_id from connections where (connect_by='$connect_by' AND connect_with='$connect_with') OR (connect_by='$connect_with' AND connect_with='$connect_by')");
	$delete_connect="delete from connections where (connect_by='$connect_by' AND connect_with='$connect_with') OR (connect_by='$connect_with' AND connect_with='$connect_by')";
	$run_delete=mysqli_query($con,$delete_connect);
	if($run_delete){
		$row_notify_id=mysqli_fetch_array($select_notify_id);
		$notify_id=$row_notify_id['notify_id'];
		mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
	}else{
		
		echo "<script>alert('An error occurred.Try again!');</script>";
	}
}

//making group member as admin
if(isset($_POST['makegrpadmin'])){
	global $con;
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$grpmember=htmlentities(mysqli_real_escape_string($con,$_POST['grpmember']));
	$grpid=htmlentities(mysqli_real_escape_string($con,$_POST['grpid']));
	$makeadmin=mysqli_query($con,"update group_members set admin='Yes' where grp_member='$grpmember' AND grp_id='$grpid'");
}

//removing group member as admin
if(isset($_POST['removegrpadmin'])){
	global $con;
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$grpmember=htmlentities(mysqli_real_escape_string($con,$_POST['grpmember']));
	$grpid=htmlentities(mysqli_real_escape_string($con,$_POST['grpid']));
	$removeadmin=mysqli_query($con,"update group_members set admin='No' where grp_member='$grpmember' AND grp_id='$grpid'");
}

//removing user from the group
if(isset($_POST['removefromgrp'])){
	global $con;
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$grpmember=htmlentities(mysqli_real_escape_string($con,$_POST['grpmember']));
	$grpid=htmlentities(mysqli_real_escape_string($con,$_POST['grpid']));
	$removefromuser=mysqli_query($con,"delete from group_members where grp_member='$grpmember' AND grp_id='$grpid'");
}

//exiting a group
if(isset($_POST['exitgroup'])){
	global $con;
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$grpid=htmlentities(mysqli_real_escape_string($con,$_POST['group_id']));
	$exitfromuser=mysqli_query($con,"delete from group_members where grp_member='$sessionuser' AND grp_id='$grpid'");
}

//clearing grp chat!
if(isset($_POST['cleargrpchat'])){
	global $con;
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$grpid=htmlentities(mysqli_real_escape_string($con,$_POST['group_id']));
	$select_msgs=mysqli_query($con,"select * from messages where receiver_id='$grpid'");
	while($row_msgs=mysqli_fetch_array($select_msgs)){
		$msgid=$row_msgs['msg_id'];
		$insert_into_delchats=mysqli_query($con,"insert into deleted_grpchats(grp_id,msg_id,deleted_by,deleted_date) values('$grpid','$msgid','$sessionuser',NOW())");
	}
}

//deleting group conversation permanently
if(isset($_POST['deletegrpcon'])){
	global $con;
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$grpid=htmlentities(mysqli_real_escape_string($con,$_POST['group_id']));
	$delete_frommsgto=mysqli_query($con,"delete from messageto where message_from='$sessionuser' AND message_to='$grpid'");
	$del_frmclearmsgs=mysqli_query($con,"delete from deleted_grpchats where grp_id='$grpid' AND deleted_by='$sessionuser'");
}

//deleting a single message
if(isset($_POST['delsinglemsg'])){
	global $con;
	$msg_id=htmlentities(mysqli_real_escape_string($con,$_POST['msg_id']));
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$msgtouser=htmlentities(mysqli_real_escape_string($con,$_POST['msgtouser']));
	$select_file=mysqli_query($con,"select uploaded_file from messages where msg_id='$msg_id'");
	$row_file=mysqli_fetch_array($select_file);
	$uploaded_file=$row_file['uploaded_file'];
	$del_msg=mysqli_query($con,"delete from messages where msg_id='$msg_id'");
	if($del_msg){
		$check_msgs=mysqli_query($con,"select * from messages where (sender_userid='$sessionuser' AND receiver_id='$msgtouser') OR (sender_userid='$msgtouser' AND receiver_id='$sessionuser')");
		$num_msgs=mysqli_num_rows($check_msgs);
		if($num_msgs==0){
			mysqli_query($con,"delete from messageto where (message_from='$sessionuser' AND message_to='$msgtouser') OR (message_from='$msgtouser' AND message_to='$sessionuser')");
		}
		
		if($uploaded_file!="none"){
			unlink("../uploadedFiles/$uploaded_file");
		}
	}
}

//restricting user from commenting 
if(isset($_POST['cmntrestrictuser'])){
	global $con;
	$restrictby=htmlentities(mysqli_real_escape_string($con,$_POST['restrictby']));
	$restrictto=htmlentities(mysqli_real_escape_string($con,$_POST['restrictto']));
	$insert_cmntrestrict=mysqli_query($con,"insert into cmnt_restrictions(restricted_by,restricted_to,restricted_on) values('$restrictby','$restrictto',NOW())");
	if(!$insert_cmntrestrict){
		echo "<script>alert(''something went wrong, Try again!);</script>";
	}
}

//getting user activity
if(isset($_POST['useractivity'])){
	global $con;
	date_default_timezone_set("Asia/Kolkata"); 
	$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['sessionuser']));
	$range=htmlentities(mysqli_real_escape_string($con,$_POST['range']));
	$select_sessions=mysqli_query($con,"select * from user_sessions where user_id='$sessionuser' ORDER BY start_time DESC");
			
	?>
	
		
	<?php
		if($range=="day"){
			/*while($row_sessions=mysqli_fetch_array($select_sessions)){
				$start=strtotime($row_sessions['start_time']);
				$end=strtotime($row_sessions['end_time']);
				if($end="0000-00-00 00:00:00"){
					$end=date("Y-m-d H:i:s",time());
				}*/
	?>
			
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			<span style="width:25px;height:151px;background-color:#00d3fe;margin-left:10px;"></span>
			
			
	<?php 
			//}
		}
}
?>
