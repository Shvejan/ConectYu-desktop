<?php
session_start();
$con=mysqli_connect("localhost","root","","conectyu");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
<style>
#notifyprfpic{
	width:44px;
	height:44px;
	border-radius:22px;
	float:left;
	margin-right:10px;
	border:1px solid #e6e6e6;
	margin-left:0px;
}
#ncnt{
	font-family:bold;
	font-size:0.9em;
	margin-left:15px;
}
#notifylink{
	padding:7px;
	padding-left:30px;
	cursor:pointer;
}
#notifylink:hover{
	width:100%;
}
#connectproofdesc{
	max-width:85%;
	overflow:hidden;
	white-space: pre-wrap;
	word-break: keep-all;
	font-size:1.1em;
	font-family: 'Noto Serif JP', serif;
}
#connectidproof{
	font-size:1.1em;
	font-family: 'Noto Serif JP', serif;
	margin-left:-3%;
}
#usermorebtn{
	color:black;
	font-size:1.6em;
	cursor:pointer;
	padding:10px;
	float:right;
	list-style-type:none;
}
.nmoredropdown{
	width:20%;
}
#nmoredropdown li{
	margin-left:24%;
	width:100%;
}
#nmoredropdown li a{
	font-size:1em;
}
</style>
<?php
if(isset($_POST['notifications'])){
	global $con;
	$user_id=$_POST['user_id'];
	$select_notifications="select * from notifications where notified_to='$user_id'";
	$run_notifications=mysqli_query($con,$select_notifications);
	$num_notifications=mysqli_num_rows($run_notifications);
	if($num_notifications!=0){
		$yesterdaydate = date("Y-m-d H:i:s", strtotime("today"));
		$select_todaysnotifys=mysqli_query($con,"select * from notifications where notified_to='$user_id' AND notification_date>'$yesterdaydate' ORDER BY notification_date DESC");
		$numtodaynotifys=mysqli_num_rows($select_todaysnotifys);
		if($numtodaynotifys!=0){
			?>
				<p style="margin-top:5px;font-family:bold;font-size:1.2em;"><b>Today</b></p>
			<?php
			while($row_notifications=mysqli_fetch_array($select_todaysnotifys)){
				$notification_type=$row_notifications['notification_type'];
				$notification_date=$row_notifications['notification_date'];
				$notification_status=$row_notifications['notification_status'];
				if($notification_type=="comment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$cmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($cmnt);
					if($cmntlen>30){
						$cmnt=substr($cmnt,0,30);
						$cmnt="$cmnt ...";
					}
					if($comment_by!=$user_id){
						$post_id=$row_cmntdetails['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:-5px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="replycomment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$repliedcmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($repliedcmnt);
					if($cmntlen>30){
						$repliedcmnt=substr($repliedcmnt,0,30);
						$repliedcmnt="$repliedcmnt ...";
					}
					if($comment_by!=$user_id){
						$cmnt_id=$row_cmntdetails['post_id'];
						$run_cmntid=mysqli_query($con,"select post_id from comments where cmnt_id='$cmnt_id'");
						$row_cmntid=mysqli_fetch_array($run_cmntid);
						$post_id=$row_cmntid['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="like"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$post_id=$row_likedetails['post_id'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
			?>
					<div class="w3-container">
					 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
						<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
					 </li>
					  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
					</div>
			<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="cmntlike"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$like_id=$row_likedetails['post_id'];
					
					$run_likeid=mysqli_query($con,"select * from comments where cmnt_id='$like_id'");
					$row_likeid=mysqli_fetch_array($run_likeid);
					$cmnt_type=$row_likeid['cmnt_type'];
					$post_id=$row_likeid['post_id'];
					$likedcmnt=$row_likeid['comment'];
					$cmntlen=strlen($likedcmnt);
					if($cmntlen>30){
						$likedcmnt=substr($likedcmnt,0,30);
						$likedcmnt="$likedcmnt ...";
					}
					
					if($cmnt_type=="comment"){
						$run_cmnt=mysqli_query($con,"select * from comments where cmnt_id='$post_id'");
						$row_cmnt=mysqli_fetch_array($run_cmnt);
						$post_id=$row_cmnt['post_id'];
					}
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
					?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="follow"){
					$notify_id=$row_notifications['notify_id'];
					$run_followdetails=mysqli_query($con,"select * from following where notify_id='$notify_id'");
					$row_followdetails=mysqli_fetch_array($run_followdetails);
					$followed_by=$row_followdetails['following_user'];
					$tobefollowed=$row_followdetails['followed_user'];
					$follow_status=$row_followdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$followed_by'");
					$row_user=mysqli_fetch_array($run_user);
					$followprfpic=$row_user['profile_pic'];
					
					if($follow_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
						<?php 
						}
					}elseif($follow_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a  class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;margin-bottom:0px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span>
								</a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:10px;"><?php echo time_ago_in_php($notification_date); ?></span></a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
						<?php 
						}
					}
				}elseif($notification_type=="connection"){
					$notify_id=$row_notifications['notify_id'];
					$run_connectdetails=mysqli_query($con,"select * from connections where notify_id='$notify_id'");
					$row_connectdetails=mysqli_fetch_array($run_connectdetails);
					$connect_by=$row_connectdetails['connect_by'];
					$connect_with=$row_connectdetails['connect_with'];
					$connect_status=$row_connectdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$connect_by'");
					$row_user=mysqli_fetch_array($run_user);
					$connectprfpic=$row_user['profile_pic'];
					
					if($connect_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:black;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:#696969;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
								</ul>
							 </li>
							</div>
							<?php
						}
					}elseif($connect_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}
					}
				}
			}
		}
		
		$todaydate = date("Y-m-d H:i:s", strtotime("today"));
		$yesterdaydate = date("Y-m-d H:i:s", strtotime("yesterday"));
		$select_yesterdaynotifys=mysqli_query($con,"select * from notifications where notified_to='$user_id' AND (notification_date<'$todaydate' AND notification_date>'$yesterdaydate') ORDER BY notification_date DESC");
		$numyesterdaynotifys=mysqli_num_rows($select_yesterdaynotifys);
		if($numyesterdaynotifys!=0){
			?>
				<p style="margin-top:15px;font-family:bold;font-size:1.2em;"><b>Yesterday</b></p>
			<?php
			while($row_notifications=mysqli_fetch_array($select_yesterdaynotifys)){
				$notification_type=$row_notifications['notification_type'];
				$notification_date=$row_notifications['notification_date'];
				$notification_status=$row_notifications['notification_status'];
				if($notification_type=="comment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$cmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($cmnt);
					if($cmntlen>30){
						$cmnt=substr($cmnt,0,30);
						$cmnt="$cmnt ...";
					}
					if($comment_by!=$user_id){
						$post_id=$row_cmntdetails['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:-5px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="replycomment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$repliedcmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($repliedcmnt);
					if($cmntlen>30){
						$repliedcmnt=substr($repliedcmnt,0,30);
						$repliedcmnt="$repliedcmnt ...";
					}
					if($comment_by!=$user_id){
						$cmnt_id=$row_cmntdetails['post_id'];
						$run_cmntid=mysqli_query($con,"select post_id from comments where cmnt_id='$cmnt_id'");
						$row_cmntid=mysqli_fetch_array($run_cmntid);
						$post_id=$row_cmntid['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="like"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$post_id=$row_likedetails['post_id'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
			?>
					<div class="w3-container">
					 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
						<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
					 </li>
					  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
					</div>
			<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="cmntlike"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$like_id=$row_likedetails['post_id'];
					
					$run_likeid=mysqli_query($con,"select * from comments where cmnt_id='$like_id'");
					$row_likeid=mysqli_fetch_array($run_likeid);
					$cmnt_type=$row_likeid['cmnt_type'];
					$post_id=$row_likeid['post_id'];
					$likedcmnt=$row_likeid['comment'];
					$cmntlen=strlen($likedcmnt);
					if($cmntlen>30){
						$likedcmnt=substr($likedcmnt,0,30);
						$likedcmnt="$likedcmnt ...";
					}
					
					if($cmnt_type=="comment"){
						$run_cmnt=mysqli_query($con,"select * from comments where cmnt_id='$post_id'");
						$row_cmnt=mysqli_fetch_array($run_cmnt);
						$post_id=$row_cmnt['post_id'];
					}
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
					?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="follow"){
					$notify_id=$row_notifications['notify_id'];
					$run_followdetails=mysqli_query($con,"select * from following where notify_id='$notify_id'");
					$row_followdetails=mysqli_fetch_array($run_followdetails);
					$followed_by=$row_followdetails['following_user'];
					$tobefollowed=$row_followdetails['followed_user'];
					$follow_status=$row_followdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$followed_by'");
					$row_user=mysqli_fetch_array($run_user);
					$followprfpic=$row_user['profile_pic'];
					
					if($follow_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
						<?php 
						}
					}elseif($follow_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a  class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;margin-bottom:0px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span>
								</a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:10px;"><?php echo time_ago_in_php($notification_date); ?></span></a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
						<?php 
						}
					}
				}elseif($notification_type=="connection"){
					$notify_id=$row_notifications['notify_id'];
					$run_connectdetails=mysqli_query($con,"select * from connections where notify_id='$notify_id'");
					$row_connectdetails=mysqli_fetch_array($run_connectdetails);
					$connect_by=$row_connectdetails['connect_by'];
					$connect_with=$row_connectdetails['connect_with'];
					$connect_status=$row_connectdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$connect_by'");
					$row_user=mysqli_fetch_array($run_user);
					$connectprfpic=$row_user['profile_pic'];
					
					if($connect_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:black;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:#696969;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
								</ul>
							 </li>
							</div>
							<?php
						}
					}elseif($connect_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}
					}
				}
			}
		}
		
		$lastweekdate = date("Y-m-d", strtotime('-1 week'));
		$select_yesterdaynotifys=mysqli_query($con,"select * from notifications where notified_to='$user_id' AND (notification_date<'$yesterdaydate' AND notification_date>= '$lastweekdate' ) ORDER BY notification_date DESC");
		$numweeknotifys=mysqli_num_rows($select_yesterdaynotifys);
		if($numweeknotifys!=0){
			?>
				<p style="margin-top:15px;font-family:bold;font-size:1.2em;"><b>Last week</b></p>
			<?php
			while($row_notifications=mysqli_fetch_array($select_yesterdaynotifys)){
				$notification_type=$row_notifications['notification_type'];
				$notification_date=$row_notifications['notification_date'];
				$notification_status=$row_notifications['notification_status'];
				if($notification_type=="comment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$cmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($cmnt);
					if($cmntlen>30){
						$cmnt=substr($cmnt,0,30);
						$cmnt="$cmnt ...";
					}
					if($comment_by!=$user_id){
						$post_id=$row_cmntdetails['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:-5px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="replycomment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$repliedcmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($repliedcmnt);
					if($cmntlen>30){
						$repliedcmnt=substr($repliedcmnt,0,30);
						$repliedcmnt="$repliedcmnt ...";
					}
					if($comment_by!=$user_id){
						$cmnt_id=$row_cmntdetails['post_id'];
						$run_cmntid=mysqli_query($con,"select post_id from comments where cmnt_id='$cmnt_id'");
						$row_cmntid=mysqli_fetch_array($run_cmntid);
						$post_id=$row_cmntid['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="like"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$post_id=$row_likedetails['post_id'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
			?>
					<div class="w3-container">
					 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
						<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
					 </li>
					  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
					</div>
			<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="cmntlike"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$like_id=$row_likedetails['post_id'];
					
					$run_likeid=mysqli_query($con,"select * from comments where cmnt_id='$like_id'");
					$row_likeid=mysqli_fetch_array($run_likeid);
					$cmnt_type=$row_likeid['cmnt_type'];
					$post_id=$row_likeid['post_id'];
					$likedcmnt=$row_likeid['comment'];
					$cmntlen=strlen($likedcmnt);
					if($cmntlen>30){
						$likedcmnt=substr($likedcmnt,0,30);
						$likedcmnt="$likedcmnt ...";
					}
					
					if($cmnt_type=="comment"){
						$run_cmnt=mysqli_query($con,"select * from comments where cmnt_id='$post_id'");
						$row_cmnt=mysqli_fetch_array($run_cmnt);
						$post_id=$row_cmnt['post_id'];
					}
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
					?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="follow"){
					$notify_id=$row_notifications['notify_id'];
					$run_followdetails=mysqli_query($con,"select * from following where notify_id='$notify_id'");
					$row_followdetails=mysqli_fetch_array($run_followdetails);
					$followed_by=$row_followdetails['following_user'];
					$tobefollowed=$row_followdetails['followed_user'];
					$follow_status=$row_followdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$followed_by'");
					$row_user=mysqli_fetch_array($run_user);
					$followprfpic=$row_user['profile_pic'];
					
					if($follow_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
						<?php 
						}
					}elseif($follow_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a  class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;margin-bottom:0px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span>
								</a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:10px;"><?php echo time_ago_in_php($notification_date); ?></span></a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
						<?php 
						}
					}
				}elseif($notification_type=="connection"){
					$notify_id=$row_notifications['notify_id'];
					$run_connectdetails=mysqli_query($con,"select * from connections where notify_id='$notify_id'");
					$row_connectdetails=mysqli_fetch_array($run_connectdetails);
					$connect_by=$row_connectdetails['connect_by'];
					$connect_with=$row_connectdetails['connect_with'];
					$connect_status=$row_connectdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$connect_by'");
					$row_user=mysqli_fetch_array($run_user);
					$connectprfpic=$row_user['profile_pic'];
					
					if($connect_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:black;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:#696969;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
								</ul>
							 </li>
							</div>
							<?php
						}
					}elseif($connect_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}
					}
				}
			}
		}
		
		$lastmonthdate = date("Y-m-d", strtotime('-1 month'));
		$select_lastmonthnotifys=mysqli_query($con,"select * from notifications where notified_to='$user_id' AND (notification_date<'$lastweekdate' AND notification_date>= '$lastmonthdate' ) ORDER BY notification_date DESC");
		$nummonthnotifys=mysqli_num_rows($select_lastmonthnotifys);
		if($nummonthnotifys!=0){
			?>
				<p style="margin-top:15px;font-family:bold;font-size:1.2em;"><b>Last month</b></p>
			<?php
			while($row_notifications=mysqli_fetch_array($select_lastmonthnotifys)){
				$notification_type=$row_notifications['notification_type'];
				$notification_date=$row_notifications['notification_date'];
				$notification_status=$row_notifications['notification_status'];
				if($notification_type=="comment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$cmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($cmnt);
					if($cmntlen>30){
						$cmnt=substr($cmnt,0,30);
						$cmnt="$cmnt ...";
					}
					if($comment_by!=$user_id){
						$post_id=$row_cmntdetails['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:-5px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="replycomment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$repliedcmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($repliedcmnt);
					if($cmntlen>30){
						$repliedcmnt=substr($repliedcmnt,0,30);
						$repliedcmnt="$repliedcmnt ...";
					}
					if($comment_by!=$user_id){
						$cmnt_id=$row_cmntdetails['post_id'];
						$run_cmntid=mysqli_query($con,"select post_id from comments where cmnt_id='$cmnt_id'");
						$row_cmntid=mysqli_fetch_array($run_cmntid);
						$post_id=$row_cmntid['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="like"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$post_id=$row_likedetails['post_id'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
			?>
					<div class="w3-container">
					 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
						<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
					 </li>
					  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
					</div>
			<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="cmntlike"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$like_id=$row_likedetails['post_id'];
					
					$run_likeid=mysqli_query($con,"select * from comments where cmnt_id='$like_id'");
					$row_likeid=mysqli_fetch_array($run_likeid);
					$cmnt_type=$row_likeid['cmnt_type'];
					$post_id=$row_likeid['post_id'];
					$likedcmnt=$row_likeid['comment'];
					$cmntlen=strlen($likedcmnt);
					if($cmntlen>30){
						$likedcmnt=substr($likedcmnt,0,30);
						$likedcmnt="$likedcmnt ...";
					}
					
					if($cmnt_type=="comment"){
						$run_cmnt=mysqli_query($con,"select * from comments where cmnt_id='$post_id'");
						$row_cmnt=mysqli_fetch_array($run_cmnt);
						$post_id=$row_cmnt['post_id'];
					}
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
					?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="follow"){
					$notify_id=$row_notifications['notify_id'];
					$run_followdetails=mysqli_query($con,"select * from following where notify_id='$notify_id'");
					$row_followdetails=mysqli_fetch_array($run_followdetails);
					$followed_by=$row_followdetails['following_user'];
					$tobefollowed=$row_followdetails['followed_user'];
					$follow_status=$row_followdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$followed_by'");
					$row_user=mysqli_fetch_array($run_user);
					$followprfpic=$row_user['profile_pic'];
					
					if($follow_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
						<?php 
						}
					}elseif($follow_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a  class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;margin-bottom:0px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span>
								</a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:10px;"><?php echo time_ago_in_php($notification_date); ?></span></a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
						<?php 
						}
					}
				}elseif($notification_type=="connection"){
					$notify_id=$row_notifications['notify_id'];
					$run_connectdetails=mysqli_query($con,"select * from connections where notify_id='$notify_id'");
					$row_connectdetails=mysqli_fetch_array($run_connectdetails);
					$connect_by=$row_connectdetails['connect_by'];
					$connect_with=$row_connectdetails['connect_with'];
					$connect_status=$row_connectdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$connect_by'");
					$row_user=mysqli_fetch_array($run_user);
					$connectprfpic=$row_user['profile_pic'];
					
					if($connect_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:black;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:#696969;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
								</ul>
							 </li>
							</div>
							<?php
						}
					}elseif($connect_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}
					}
				}
			}
		}
		
		$lastmonthdate = date("Y-m-d", strtotime('-1 month'));
		$select_earliernotifys=mysqli_query($con,"select * from notifications where notified_to='$user_id' AND notification_date< '$lastmonthdate' ORDER BY notification_date DESC");
		$numearliernotifys=mysqli_num_rows($select_earliernotifys);
		if($numearliernotifys!=0){
			?>
				<p style="margin-top:15px;font-family:bold;font-size:1.2em;"><b>Earlier</b></p>
			<?php
			while($row_notifications=mysqli_fetch_array($select_earliernotifys)){
				$notification_type=$row_notifications['notification_type'];
				$notification_date=$row_notifications['notification_date'];
				$notification_status=$row_notifications['notification_status'];
				if($notification_type=="comment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$cmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($cmnt);
					if($cmntlen>30){
						$cmnt=substr($cmnt,0,30);
						$cmnt="$cmnt ...";
					}
					if($comment_by!=$user_id){
						$post_id=$row_cmntdetails['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> commented on your post as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $cmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:-5px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="replycomment"){
					$notify_id=$row_notifications['notify_id'];
					$run_cmntdetails=mysqli_query($con,"select * from comments where cmntnotify_id='$notify_id'");
					$row_cmntdetails=mysqli_fetch_array($run_cmntdetails);
					$comment_by=$row_cmntdetails['user_id'];
					$repliedcmnt=$row_cmntdetails['comment'];
					$cmntlen=strlen($repliedcmnt);
					if($cmntlen>30){
						$repliedcmnt=substr($repliedcmnt,0,30);
						$repliedcmnt="$repliedcmnt ...";
					}
					if($comment_by!=$user_id){
						$cmnt_id=$row_cmntdetails['post_id'];
						$run_cmntid=mysqli_query($con,"select post_id from comments where cmnt_id='$cmnt_id'");
						$row_cmntid=mysqli_fetch_array($run_cmntid);
						$post_id=$row_cmntid['post_id'];
						
						$comment=$row_cmntdetails['comment'];
						
						$run_user=mysqli_query($con,"select profile_pic from users where user_id='$comment_by'");
						$row_user=mysqli_fetch_array($run_user);
						$cmntprfpic=$row_user['profile_pic'];
						if($notification_status=="unread"){
				?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
						</div>
			<?php 
						}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						  <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $cmntprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $comment_by; ?></b> replied to your comment as&nbsp &nbsp <span style="font-size:0.95em;"><?php echo $repliedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969"><?php echo time_ago_in_php($notification_date); ?></span></a>
						  </li>
						  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $comment_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
							</ul>
						 </li>
						</div>
					<?php 	
						}
					}
				}elseif($notification_type=="like"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$post_id=$row_likedetails['post_id'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
			?>
					<div class="w3-container">
					 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
						<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
					 </li>
					  <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
							</ul>
						 </li>
					</div>
			<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your post.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="cmntlike"){
					$notify_id=$row_notifications['notify_id'];
					$run_likedetails=mysqli_query($con,"select * from likes where likenotify_id='$notify_id'");
					$row_likedetails=mysqli_fetch_array($run_likedetails);
					$liked_by=$row_likedetails['liked_by'];
					$like_id=$row_likedetails['post_id'];
					
					$run_likeid=mysqli_query($con,"select * from comments where cmnt_id='$like_id'");
					$row_likeid=mysqli_fetch_array($run_likeid);
					$cmnt_type=$row_likeid['cmnt_type'];
					$post_id=$row_likeid['post_id'];
					$likedcmnt=$row_likeid['comment'];
					$cmntlen=strlen($likedcmnt);
					if($cmntlen>30){
						$likedcmnt=substr($likedcmnt,0,30);
						$likedcmnt="$likedcmnt ...";
					}
					
					if($cmnt_type=="comment"){
						$run_cmnt=mysqli_query($con,"select * from comments where cmnt_id='$post_id'");
						$row_cmnt=mysqli_fetch_array($run_cmnt);
						$post_id=$row_cmnt['post_id'];
					}
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$liked_by'");
					$row_user=mysqli_fetch_array($run_user);
					$likeprfpic=$row_user['profile_pic'];
					
					if($notification_status=="unread"){
					?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}elseif($notification_status=="read"){
						?>
						<div class="w3-container">
						 <li><a href="functions/notification_operations.php?user_id=<?php echo $user_id; ?>&post_id=<?php echo $post_id; ?>&notify_id=<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
							<img src="<?php echo $likeprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $liked_by; ?></b> liked your comment<br><span style="font-size:0.95em;"><?php echo $likedcmnt; ?></span></p>
							<span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969;"><?php echo time_ago_in_php($notification_date); ?></span></a>
						 </li>
						 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
							<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
								<li><a href="profile.php?user_id=<?php echo $liked_by; ?>">view profile</a></li>  
								<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
							</ul>
						 </li>
						</div>
					<?php 
					}
				}elseif($notification_type=="follow"){
					$notify_id=$row_notifications['notify_id'];
					$run_followdetails=mysqli_query($con,"select * from following where notify_id='$notify_id'");
					$row_followdetails=mysqli_fetch_array($run_followdetails);
					$followed_by=$row_followdetails['following_user'];
					$tobefollowed=$row_followdetails['followed_user'];
					$follow_status=$row_followdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$followed_by'");
					$row_user=mysqli_fetch_array($run_user);
					$followprfpic=$row_user['profile_pic'];
					
					if($follow_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> started following you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
						<?php 
						}
					}elseif($follow_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a  class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;margin-bottom:0px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span>
								</a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php 
						}elseif($notification_status=="read"){
						?>
							<div class="w3-container">
							 <li><a class="openprffromreadnotifys" userid="<?php echo $followed_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
								<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:10px;"><?php echo time_ago_in_php($notification_date); ?></span></a>
								<div class="row" style="margin-bottom:-18px;">
									<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-48.5px;margin-bottom:0px;float:left;" />
									<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:100px;margin-top:-48.5px;margin-bottom:0px;" />
								</div>
							 </li>
							 <li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $followed_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
						<?php 
						}
					}
				}elseif($notification_type=="connection"){
					$notify_id=$row_notifications['notify_id'];
					$run_connectdetails=mysqli_query($con,"select * from connections where notify_id='$notify_id'");
					$row_connectdetails=mysqli_fetch_array($run_connectdetails);
					$connect_by=$row_connectdetails['connect_by'];
					$connect_with=$row_connectdetails['connect_with'];
					$connect_status=$row_connectdetails['status'];
					
					$run_user=mysqli_query($con,"select profile_pic from users where user_id='$connect_by'");
					$row_user=mysqli_fetch_array($run_user);
					$connectprfpic=$row_user['profile_pic'];
					
					if($connect_status=="requested"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:black;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>      
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" id="notifylink" style="display:block;width:100%;height:100px;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p></a>
									<div class="row" style="margin-top:0px;">
									<span style="font-size:1em;margin-top:-25px;margin-bottom:0px;float:left;color:#696969;"><?php echo time_ago_in_php($notification_date); ?>.</span>
									<input type="button" id="showcnctdetailsbtn" class="btn btn-info showcnctdetailsbtn" value="show details" notifyid="<?php echo $notify_id; ?>" style="float:right;margin-right:19%;width:150px;margin-top:-48.5px;margin-bottom:0px;" />
									</div>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-20%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>    
								</ul>
							 </li>
							</div>
							<?php
						}
					}elseif($connect_status=="accepted"){
						if($notification_status=="unread"){
							?>
								<div class="w3-container">
								<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}elseif($notification_status=="read"){
							?>
								<div class="w3-container">
								<li><a class="openprffromreadnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;">
									<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $connect_by; ?></b> has connected with you.<br><span style="font-size:0.9em;margin-top:0px;margin-bottom:0px;"><?php echo time_ago_in_php($notification_date); ?></span></p></a>
								</li>
								<li class="dropdown"  style="float:left;margin-top:-15%;margin-left:90%;font-size:1.6em;"><i class='glyphicon glyphicon-option-vertical dropdown-toggle' data-toggle='dropdown' aria-haspopup="true" aria-expanded="false"></i>
								<ul class='dropdown-menu w3-left nmoredropdown' id='nmoredropdown' style="float:left;margin-left:-35%;">
									<li><a href="profile.php?user_id=<?php echo $connect_by; ?>">view profile</a></li>  
									<li><a class="deletenotif" notifyid="<?php echo $notify_id; ?>" style="cursor:pointer;">Delete</a></li>     
								</ul>
							 </li>
							</div>
							<?php
						}
					}
				}
			}
		}
	}else{
	?>
		<div>
			<p style="margin-left:100px;margin-top:150px;font-family:bold;font-size:1.5em;color:#9e9d9b;">No new Notifications!</p>
		</div>
	<?php
	}
}
?>
<?php

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


//updating notification with notification status as read
if(isset($_GET['user_id']) and isset($_GET['post_id'])){
	global $con;
	$user_id=$_GET['user_id'];
	$post_id=$_GET['post_id'];
	$notify_id=$_GET['notify_id'];
	$update_notify="update notifications set notification_status='read' where notify_id='$notify_id' and notified_to='$user_id'";
	$run_update=mysqli_query($con,$update_notify);
	if($run_update){
		echo "<script>window.open('../postdetails.php?user_id=$user_id&post_id=$post_id','_self');</script>";
	}
}

//marking all notifications as read
if(isset($_POST['markallread'])){
	global $con;
	$user_id=$_POST['user_id'];
	$update_notifystatus="update notifications set notification_status='read' where notified_to='$user_id'";
	$run_update=mysqli_query($con,$update_notifystatus);
}

//Accepting the follow request!
if(isset($_POST['acceptfollower'])){
	global $con;
	$notify_id=$_POST['notify_id'];
	$update_details="update following set status='accepted' where notify_id='$notify_id'";
	$run_followdetails=mysqli_query($con,$update_details);
	if($run_followdetails){
		mysqli_query($con,"update notifications set notification_status='unread',notification_date=NOW() where notify_id='$notify_id'");
	}
}

//Rejecting the follow request!
if(isset($_POST['rejectfollower'])){
	global $con;
	$notify_id=$_POST['notify_id'];
	$select_details="delete from following where notify_id='$notify_id' AND status='requested'";
	$run_followdetails=mysqli_query($con,$select_details);
	if($run_followdetails){
		mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
	}
}

//opening profile page from notification tab.
if(isset($_POST['openprfpage'])){
	global $con;
	$notify_id=$_POST['notify_id'];
	mysqli_query($con,"update notifications set notification_status='read' where notify_id='$notify_id'");
}

//showing follow and connection requests requests
if(isset($_POST['showallrequests'])){
	global $con;
	$user_id=$_POST['user_id'];
	$select_rqsts="select * from following where followed_user='$user_id' AND status='requested' ORDER BY date DESC";
	$run_rqsts=mysqli_query($con,$select_rqsts);
	$num_rqsts=mysqli_num_rows($run_rqsts);
	if($num_rqsts!=0){
		while($row_rqsts=mysqli_fetch_array($run_rqsts)){
			$notify_id=$row_rqsts['notify_id'];
			$followed_by=$row_rqsts['following_user'];
			$tobefollowed=$row_rqsts['followed_user'];
			$follow_status=$row_rqsts['status'];
			$select_notifications="select * from notifications where notify_id='$notify_id'";
			$run_notifications=mysqli_query($con,$select_notifications);
			$row_notifications=mysqli_fetch_array($run_notifications);
			$notification_status=$row_notifications['notification_status'];
			$notification_date=$row_notifications['notification_date'];
			
			$run_user=mysqli_query($con,"select profile_pic from users where user_id='$followed_by'");
			$row_user=mysqli_fetch_array($run_user);
			$followprfpic=$row_user['profile_pic'];
			
			if($notification_status=="unread"){
				?>
					<li><a  class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;margin-bottom:0px;border-bottom:1px solid #e6e6e6;">
					<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:black;"><?php echo time_ago_in_php($notification_date); ?></span>
					</a>
					<div class="row" style="margin-bottom:-18px;">
						<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-58.5px;margin-bottom:0px;float:left;" />
						<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="margin-left:60%;width:100px;margin-top:-103px;margin-bottom:0px;" />
					</div>
					</li>
				<?php 
			}elseif($notification_status=="read"){
				?>
				 <li><a  class="openprffromnotifys" userid="<?php echo $followed_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;height:100px;margin-bottom:0px;border-bottom:1px solid #e6e6e6;">
					<img src="<?php echo $followprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;"><b><?php echo $followed_by; ?></b> requested to follow you.</p><br><span style="font-size:0.7em;margin-top:0px;margin-bottom:0px;color:#696969;"><?php echo time_ago_in_php($notification_date); ?></span>
					</a>
					<div class="row" style="margin-bottom:-18px;">
						<input type="button" id="acceptfollowerbtn" class="btn btn-info acceptfollowerbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:35%;width:100px;margin-top:-58.5px;margin-bottom:0px;float:left;" />
						<input type="button" id="rejectfollowerbtn" class="btn btn-default rejectfollowerbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="margin-left:60%;width:100px;margin-top:-103px;margin-bottom:0px;" />
					</div>
					</li>
			<?php 
			}
		}
		?>
		<?php
	}else{
		?>
		<div>
			<p style="margin-left:100px;margin-top:150px;font-family:bold;font-size:1.5em;color:#9e9d9b;">No new Requests!</p>
		</div>
	<?php
	}
}
?>
<script type="text/javascript">
//Accepting the follower!
$('.acceptfollowerbtn').click(function(){
	var notifyid=$(this).attr('notifyid');
	$.ajax({
		url:'functions/notification_operations.php',
		data:'acceptfollower=1&notify_id='+notifyid,
		type:'post',
		async:false,
		success:function(){
			Notifications();
		}
	});
	return false;
});

//Rejecting the follower!
$('.rejectfollowerbtn').click(function(){
	var notifyid=$(this).attr('notifyid');
	$.ajax({
		url:'functions/notification_operations.php',
		data:'rejectfollower=1&notify_id='+notifyid,
		type:'post',
		async:false,
		success:function(){
			Notifications();
		}
	});
	return false;
});

//open profile page from notifications.
$('.openprffromnotifys').click(function(){
	var userid=$(this).attr('userid');
	var notifyid=$(this).attr('notifyid');
	$.ajax({
		url:'functions/notification_operations.php',
		data:'openprfpage=1&notify_id='+notifyid,
		type:'post',
		async:false,
		success:function(){
			window.open('profile.php?user_id='+userid,'_self');
		}
	});
	return false;
});
$('.openprffromreadnotifys').click(function(){
	var userid=$(this).attr('userid');
	window.open('profile.php?user_id='+userid,'_self');
});
			
$(".showcnctdetailsbtn").click(function(){
	var notify_id=$(this).attr("notifyid");
	//$(".notifymenu").html('anil');
	$.ajax({
		url:'functions/notification_operations.php',
		data:'showconnectdetails=1&notify_id='+notify_id,
		type:'post',
		async:false,
		success:function(res){
			$(".notifymenu").html(res);
		}
	});
	return false;
	
});

//accepting connection
$(".acceptconnectbtn").click(function(){
	var notify_id=$(this).attr("notifyid");
	$.ajax({
		url:'functions/notification_operations.php',
		data:'acceptconnectrqst=1&notify_id='+notify_id,
		type:'post',
		async:false,
		success:function(res){
			Notifications();
		}
	});
	return false;
});

//accepting connection
$(".rejectconnectbtn").click(function(){
	var notify_id=$(this).attr("notifyid");
	$.ajax({
		url:'functions/notification_operations.php',
		data:'rejectconnectrqst=1&notify_id='+notify_id,
		type:'post',
		async:false,
		success:function(res){
			Notifications();
		}
	});
	return false;
});

//back to notifications
$(".backtonotifys").click(function(){
	Notifications();
});

//delete notification
$(".deletenotif").click(function(){
	var notify_id=$(this).attr("notifyid");
	//alert(notifyid);
	$.ajax({
		url:'functions/notification_operations.php',
		data:'delnotification=1&notify_id='+notify_id,
		type:'post',
		async:false,
		success:function(res){
			Notifications();
		}
	});
	return false;
});
</script>				
<?php
//showing all the unread notifications using the badge
if(isset($_POST['unreadnotifys'])){
	global $con;
	$user_id=$_POST['user_id'];
	$select_numnotifications="select * from notifications where notified_to='$user_id' AND notification_status='unread'";
	$run_numnotifications=mysqli_query($con,$select_numnotifications);
	$num_unreadnotifications=mysqli_num_rows($run_numnotifications);
	if($num_unreadnotifications!=0){
	?>
		<span class="badge badge-danger" style="background-color:red;"><?php echo $num_unreadnotifications; ?></span>
	<?php
	}
}

//showing connection user details
if(isset($_POST['showconnectdetails'])){
	global $con;
	$notify_id=htmlentities($_POST['notify_id']);
	$select_cnctn=mysqli_query($con,"select * from connections where notify_id='$notify_id'");
	$row_cnctn=mysqli_fetch_array($select_cnctn);
	$connect_by=$row_cnctn['connect_by'];
	$idproof=$row_cnctn['id_proof'];
	$proofdesc=$row_cnctn['proof_cnt'];
	
	$select_notifydate=mysqli_query($con,"select * from notifications where notify_id='$notify_id'");
	$row_notifydate=mysqli_fetch_array($select_notifydate);
	$notification_status=$row_notifydate['notification_status'];
	$notification_date=$row_notifydate['notification_date'];
	
	$run_user=mysqli_query($con,"select profile_pic from users where user_id='$connect_by'");
	$row_user=mysqli_fetch_array($run_user);
	$connectprfpic=$row_user['profile_pic'];
	
	if($notification_status=="unread"){
	?>
		<button type="button" class="btn btn-default backtonotifys" style="margin-top:2%;"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp Back</button>
		<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;border-top:1px solid #e6e6e6;">
			<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:black;white-space: pre-wrap;margin-top:10px;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p>
			</a></li>
			<p id="connectidproof" style="margin-top:20px;"><b>Id proof : </b><?php echo $idproof; ?></p>
			<div class="row">
				<p id="connectproofdesc"><b>Description : </b><?php echo $proofdesc; ?></p>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-sm-4">
				<span style="font-size:1em;margin-top:5px;margin-bottom:0px;float:left;color:black;"><?php echo time_ago_in_php($notification_date); ?>.</span>
				</div>
				<div class="col-sm-8">
				<input type="button" id="acceptconnectbtn" class="btn btn-info acceptconnectbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:0%;width:100px;" />
				
				<input type="button" id="rejectconnectbtn" class="btn btn-default rejectconnectbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="margin-left:0%;width:100px;" />
				</div>
			</div>
	<?php	
	}elseif($notification_status=="read"){
	?>
		<button type="button" class="btn btn-default backtonotifys" style="margin-top:2%;"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp Back</button>
		<li><a class="openprffromnotifys" userid="<?php echo $connect_by; ?>" notifyid="<?php echo $notify_id; ?>" id="notifylink" style="display:block;width:100%;border-bottom:1px solid #e6e6e6;border-top:1px solid #e6e6e6;">
			<img src="<?php echo $connectprfpic; ?>" id="notifyprfpic"><p id="ncnt" style="color:#696969;white-space: pre-wrap;margin-top:10px;"><b><?php echo $connect_by; ?></b> requested to connect with you.</p>
			</a></li>
			<p id="connectidproof" style="margin-top:20px;"><b>Id proof : </b><?php echo $idproof; ?></p>
			<div class="row">
				<p id="connectproofdesc"><b>Description : </b><?php echo $proofdesc; ?></p>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-sm-4">
				<span style="font-size:1em;margin-top:5px;margin-bottom:0px;float:left;color:#696969;"><?php echo time_ago_in_php($notification_date); ?>.</span>
				</div>
				<div class="col-sm-8">
				<input type="button" id="acceptconnectbtn" class="btn btn-info acceptconnectbtn" value="accept" notifyid="<?php echo $notify_id; ?>" style="margin-left:0%;width:100px;" />
				
				<input type="button" id="rejectconnectbtn" class="btn btn-default rejectconnectbtn" value="reject" notifyid="<?php echo $notify_id; ?>" style="margin-left:0%;width:100px;" />
				</div>
			</div>
	<?php	
	}
}

//accepting connect request
if(isset($_POST['acceptconnectrqst'])){
	global $con;
	$notify_id=htmlentities(mysqli_real_escape_string($con,$_POST['notify_id']));
	$acceptrqst=mysqli_query($con,"update connections set status='accepted' where notify_id='$notify_id'");
	if($acceptrqst){
		mysqli_query($con,"update notifications set notification_status='unread',notification_date=NOW() where notify_id='$notify_id'");
	}
}

//rejecting connect request
if(isset($_POST['rejectconnectrqst'])){
	global $con;
	$notify_id=htmlentities(mysqli_real_escape_string($con,$_POST['notify_id']));
	$rejectrqst=mysqli_query($con,"delete from connections where notify_id='$notify_id'");
	if($rejectrqst){
		mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
	}
}

//deleting notification
if(isset($_POST['delnotification'])){
	global $con;
	$notify_id=htmlentities(mysqli_real_escape_string($con,$_POST['notify_id']));
	mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
}
 ?>