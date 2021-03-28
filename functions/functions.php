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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
	<script crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver%2CIntersectionObserverEntry"></script> 

</head>
<style>
#pageprf_pic1{
	width:40px;
	height:40px;
	border:#e6e6e6 solid 2px;
	border-radius:20px;
}
#post_img{
	position:absolute;
	align:center;
}
#postid{
	line-height:20px;
}
#verticalopt,#grpverticalopt{
	float:right;
	margin-right:2%;
	list-style-type:none;
	font-size:1.5em;
	margin-top:10px;
}
#verticalopt:hover{
	background-color:#e6e6e6;
	border-radius:50px;
}
#pageverticalopt{
	float:right;
	margin-right:2%;
	list-style-type:none;
	font-size:1.5em;
	margin-top:10px;
}
#pageverticalopt:hover{
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
#edit1,#edit2,#edit{
	float:right;
	margin-right:20px;
	color:#34baeb;
	list-style-type:none;
	margin-top:-45px;
	border:1px solid #34baeb;
	padding:5px;
	padding-left:15px;
	padding-right:15px;
	border-radius:5px;
}
#edit1 a:hover,#edit2 a:hover,#edit a:hover,#remove a:hover{
	text-decoration:none;
}
#remove{
	color:#34baeb;
	list-style-type:none;
	margin-top:-45px;
	border:1px solid #34baeb;
	padding:5px;
	padding-left:15px;
	padding-right:20px;
	border-radius:5px;
	width:85px;
	float:right;
	margin-right:3%;
}
#verify,#editverify{
	color:#34baeb;
	list-style-type:none;
	margin-top:-48px;
	padding:5px;
	padding-left:15px;
	padding-right:20px;
	border-radius:5px;
	width:85px;
	float:right;
	margin-right:25%;
}
#editverify{
	margin-right:30%;
}
#achievetitle{
	width:100%;
	border-radius:5px;
	height:30px;
	border:solid #34beab 2px;
}
#achive_content{
	width:100%;
	padding:5px;
	border-radius:5px;
	border:solid #34beab 2px;
}
#achieveintimation{
	font-family:bold;
	font-size:1.1em;
	margin-top:-10px;
}
#addAchieve{
	width:200px;
	float:right;
	margin-right:50px;
}
#achives_btn{
	width:150px;
}
#modalclose{
	width:150px;
}
#achievecnt{
	margin-left:20px;
	font-family:bold;
	font-size:1.2em;
	margin-top:-20px;
}
#achieve_title{
	margin-left:20px;
}
#eventsbtn1{
	width:100%;
	overflow:hidden;
}
#eventsbtn2{
	width:100%;
	overflow:hidden;
}
#addskill a:hover{
	text-decoration:none;
}
#addskill{
	margin-right:50px;
	text-decoration:none;
	width:210px;
}
#skilltxtbox{
	width:100%;
	margin-left:10px;
	padding:5px;
	border:solid #34beab 2px;
	border-radius:5px;
}
#skillname{
	margin-left:50px;
	font-family:bold;
	font-size:1.5em;
}
#removeskill{
	font-size:1.3em;
	margin-left:40px;
}
#removeskill a:hover{
	text-decoration:none;
}
#removeachieve{
	float:right:
	margin-right:50px;
}
#achieveheading{
	margin-bottom:0px;
}
#addeventbtn{
	float:right;
	width:10%px;
	color:white;
}
#eventdesc{
	max-width:95%;
	overflow:hidden;
	white-space: pre-wrap;
	max-height:32%;
	font-size:1.2em;
	font-family: 'Noto Serif JP', serif;
}
.link:hover{
	text-decoration:none;
}
#followbtn1{
	width:26.5%;
}
#descriptn{
	max-width:95%;
	overflow:hidden;
	white-space: pre-wrap;
	word-break: keep-all;
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
	max-width:87%;
	overflow:hidden;
	white-space: pre-wrap;
	background-color:white;
	border:none;
	font-family: 'Noto Serif JP', serif;
	font-size:1.05em;
	margin-left:3%;
	padding:10px;
}
#replycmntsection{
	max-width:72%;
	overflow:hidden;
	white-space: pre-wrap;
	background-color:#fafafa;
	border:none;
	font-family: 'Noto Serif JP', serif;
	font-size:1.05em;
	margin-left:5%;
	border-radius:5px;
	padding:10px;
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
#dropmenu{
	margin-left:-95px;
	margin-top:40px;
}
#grpinfodrpdwn{
	margin-left:-30%;
}
.dropdown-toggle{
	cursor:pointer;
}
.downloadfile{
	border:solid 1px #e6e6e6;
	border-radius:50%;
	padding:10px;
	background-color:white;
	margin-left:5px;
}
.downloadfile:hover{
	background-color:#e6e6e6;
	border:solid 1px white;
}
.filetab{
	border:solid #e6e6e6 1px;
	border-radius:20px;
	padding:15px;
	cursor:pointer;
	background-color:#f5f7f5;
	margin-bottom:-5px;
}
.filetab:hover{
	background-color:white;
}
#activedot{
	margin-left:0px;
	color:#3cd938;
	margin-top:7.5%;
	float:left;
	margin-left:-4.5%;
	font-size:1.4em;
	border:3px solid white;
	border-radius:50%;
}
.picasmsg,.videoasmsg{
	cursor:pointer;
}
#playbtn{
	margin-left:-50%;
	margin-top:30%;
	font-size:3em;
	z-index:1;
	position:relative;
	color:white;
	cursor:pointer;
}
#mplaybtn{
	margin-top:30%;
	font-size:3em;
	z-index:1;
	position:relative;
	color:white;
	cursor:pointer;
	float:right;
	margin-right:40%;
}
#playbtn:hover,#mplaybtn:hover{
	color:black;
}
#setmsgtoprfpic{
	width:60px;
	height:60px;
	border:#757573 solid 1px;
	border-radius:30px;
	float:left;
	margin-left:2%;
}
#setmsgtousername{
	font-size:1.6em;
	color:black;
	margin-top:2px;
	float:left;
	margin-left:3%;
}
.fwrdmember,#fwrdmember,.fwrdprofile,#fwrdprofile{
	float:right;
	margin-right:5%;
	margin-top:20px;
}
.reportlinks{
	list-style-type:none;
}
.reportlinks li{
	width:130%;
	cursor:pointer;
	padding:5px;
	margin-left:-25%;
	font-size:1em;
}
.reportlinks li:hover{
	background-color:#e6e6e6;
}
</style>
</html>
<?php
		global $con;
		$sessionuserid = $_SESSION['uid'];
		$select_user="select * from users where user_id='$sessionuserid'";
		$run_user=mysqli_query($con,$select_user);
		$row_user=mysqli_fetch_array($run_user);
		$prf_picc=$row_user['profile_pic'];
		$user_name=$row_user['user_name'];
		$user_email=$row_user['user_email'];
		$user_id=$row_user['user_id'];
		$user_designation=$row_user['user_designation'];
		
if(isset($_POST['homeupdates'])){
	$home_updates = new HomeUpdates();
	$home_updates->displayUpdates();
}

if(isset($_POST['ownposts'])){
	$home_updates = new OwnPosts();
	$home_updates->displayOwnPosts();
}

if(isset($_POST['savedpost'])){
	$savedPsts = new SavedPosts();
	$savedPsts->showSavedPosts();
}

if(isset($_POST['pagepost'])){
	$pgpsts = new PagePosts();
	$pgpsts->showPagePosts();
}

if(isset($_POST['searcuser'])){
	$fp = new findPeople();
	$fp->displayPeople();
}

if(isset($_POST['showrecentsearches'])){
	$rs = new recentSearches();
	$rs->showRecentSearches();
}

if(isset($_POST['showmessages'])){
	$msgs = new Messages();
	$msgs->showMessages();
}

if(isset($_POST['showmsgtolist'])){
	$msgto = new messageToList();
	$msgto->showMsgToList();
}

if(isset($_POST['showgroupmems'])){
	$gpmem = new groupMembers();
	$gpmem->showGroupMembers();
}

if(isset($_POST['showuserstorestrict'])){
	$gpmem = new findUsersToRestrict();
	$gpmem->showUsersToRestrict();
}

//showing messages
class Messages{
	function showMessages(){
		global $con;
		$user_fromid=$_POST['sessionuser'];
		$user_toid=$_POST['messageto'];
		$msgstype=$_POST['msgstype'];
		date_default_timezone_set("Asia/Kolkata"); 
		if($msgstype=="direct"){
			$select_msg="select * from messages where (sender_userid='$user_fromid' AND receiver_id='$user_toid') OR (sender_userid='$user_toid' AND receiver_id='$user_fromid') ORDER BY sent_date ASC";
			$run_select_msg=mysqli_query($con,$select_msg);
			$selectfmsgdt=mysqli_query($con,"select * from messages where ((sender_userid='$user_fromid' AND receiver_id='$user_toid') OR (sender_userid='$user_toid' AND receiver_id='$user_fromid')) AND (deleted_by='none' AND deleted_by='$user_toid') ORDER BY sent_date ASC");
			$row_date=mysqli_fetch_array($selectfmsgdt);
			$sent_olddate=$row_date['sent_date'];
			$oldtime=strtotime($sent_olddate);
			$olddate=date("d/m/Y",$oldtime);
			$select_prfpic1=mysqli_query($con,"select profile_pic from users where user_id='$user_fromid'");
			$rowsender=mysqli_fetch_array($select_prfpic1);
			$senderprfpic=$rowsender['profile_pic'];
			$select_prfpic2=mysqli_query($con,"select profile_pic from users where user_id='$user_toid'");
			$rowreceiver=mysqli_fetch_array($select_prfpic2);
			$receiverprfpic=$rowreceiver['profile_pic'];
			$today=date("d/m/Y",time());
			
			while($row_message=mysqli_fetch_array($run_select_msg)){
				$msg_id=$row_message['msg_id'];
				$msg_cnt=$row_message['msg_content'];
				$user_from=$row_message['sender_userid'];
				$user_to=$row_message['receiver_id'];
				$uploaded_img=$row_message['uploaded_file'];
				$sent_date=$row_message['sent_date'];
				$content_type=$row_message['content_type'];
				$time=strtotime($sent_date);
				$newdate=date("d/m/Y",$time);
				$senttime=date("h:i A",$time);
				$deleted_by=$row_message['deleted_by'];
				$img_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
				$video_extensions = array('webm', 'mpg', 'mp2', 'mp3', 'mpeg','mpe','mpv','ogg','mp4','m4p','m4v','avi','wmv','mov','qt','flv','swf','avchd');
				
				if($deleted_by != "$user_fromid" AND $deleted_by != "both"){
					if($newdate!=$olddate){
						$olddate=$newdate;
						//echo "<script>alert('$olddate');</script>";
						if($olddate!=$today){
							echo "
								<p class='alert alert-info' style='border:1px #e6e6e6 solid;width:100px;text-align:center;margin-left:45%;margin-top:10px;border-radius:20px;'>$olddate</p>
							";
						}else{
							echo "
								<p class='alert alert-info' style='border:1px #e6e6e6 solid;width:100px;text-align:center;margin-left:45%;margin-top:10px;border-radius:20px;'>Today</p>
							";
						}
					}
					if($content_type=="self"){
						if($uploaded_img=="none"){
							if($user_from==$user_fromid){
								?>
									  <div class='mine messages'>
										<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
										<div class="dropdown" style="height:5px;">
											<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
											<ul class='dropdown-menu' id="msgmorelist">
												<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
												<li><a class="copymessage" style="cursor:pointer;" msgval="<?php echo $msg_cnt; ?>">Copy</a></li>  
												<li><a class="msgforward" msg_id="<?php echo $msg_id; ?>"  style="cursor:pointer;">forward</a></li>  
												<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
											</ul>
										</div>
										  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php echo $msg_cnt; ?></pre>
										  <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
										</div> 
										<a href="profile.php?user_id=<?php echo $user_fromid; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
									  </div>
								<?php
							}else{
								?>
									<div class='yours messages'>
										<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
										<div class="dropdown" style="height:5px;">
											<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
											<ul class='dropdown-menu' id="msgmorelist">
												<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
												<li><a class="copymessage" style="cursor:pointer;" msgval="<?php echo $msg_cnt; ?>">Copy</a></li>  
												<li><a class="msgforward" msg_id="<?php echo $msg_id; ?>"  style="cursor:pointer;">forward</a></li>  
											</ul>
										</div>
										   <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php echo $msg_cnt; ?></pre>
										   <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
										</div>
										<a href="profile.php?user_id=<?php echo $user_toid; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $receiverprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
									 </div>
								<?php
							}
						}elseif($uploaded_img != "none"){
							if($user_from==$user_fromid){
								?>
									  <div class='mine messages'>
										<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
										<div class="dropdown" style="height:5px;margin-bottom:10px;">
											<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
											<ul class='dropdown-menu' id="msgmorelist">
												<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
												<li><a class="msgforward" msg_id="<?php echo $msg_id; ?>"  style="cursor:pointer;">forward</a></li>  
												<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
											</ul>
										</div>
											<div style="padding:5px;padding-left:5px;padding-right:5px;">
											<div class="row" style="">
										<?php
										$ext = strtolower(pathinfo($uploaded_img, PATHINFO_EXTENSION));
										if(in_array($ext,$img_extensions)){
										?>
											<img src="uploadedFiles/<?php echo $uploaded_img; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;" class="picasmsg" upload_img="<?php echo $uploaded_img; ?>" />
										<?php }elseif(in_array($ext,$video_extensions)){ ?>
											<i class="fa fa-play playbtn" id="mplaybtn" aria-hidden="true" upload_video="<?php echo $uploaded_img; ?>"></i>
											<video src="uploadedFiles/<?php echo $uploaded_img; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;margin-top:-41%;margin-right:3%;" class="videoasmsg" upload_video="<?php echo $uploaded_img; ?>" ></video>
										<?php }else{
											$filenamelen=strlen($uploaded_img);
											if($filenamelen>35){
												$filename=substr($uploaded_img,0,35);
										?>
											<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploaded_img; ?>"></i></p>
										<?php  		
											}else{
										?>
											<p class="filetab"><?php echo $uploaded_img; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploaded_img; ?>"></i></p>
										<?php }
										}
										?>
											</div>
											<div class="row">
												<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php echo $msg_cnt; ?></pre>
											</div>
											</div>
											<p style="float:left;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><b><?php echo strtoupper($ext); ?></b></p>
											<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
										</div> 
										<a href="profile.php?user_id=<?php echo $user_fromid; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
									  </div>
								<?php
							}else{
								?>
									<div class='yours messages'>
										<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
										<div class="dropdown" style="height:5px;margin-bottom:10px;">
											<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
											<ul class='dropdown-menu' id="msgmorelist">
												<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
												<li><a class="msgforward" msg_id="<?php echo $msg_id; ?>"  style="cursor:pointer;">forward</a></li>  
											</ul>
										</div>
											<div style="padding:5px;padding-left:5px;padding-right:5px;">
											<div class="row" style="">
											<?php
										$ext = strtolower(pathinfo($uploaded_img, PATHINFO_EXTENSION));
										if(in_array($ext,$img_extensions)){
										?>
											<img src="uploadedFiles/<?php echo $uploaded_img; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="picasmsg" upload_img="<?php echo $uploaded_img; ?>" />
										<?php }elseif(in_array($ext,$video_extensions)){ ?>
											<video src="uploadedFiles/<?php echo $uploaded_img; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="videoasmsg" upload_video="<?php echo $uploaded_img; ?>" ></video><i class="fa fa-play playbtn" id="playbtn" aria-hidden="true" upload_video="<?php echo $uploaded_img; ?>"></i>
										<?php }else{
											$filenamelen=strlen($uploaded_img);
											if($filenamelen>35){
												$filename=substr($uploaded_img,0,35);
										?>
											<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploaded_img; ?>"></i></p>
										<?php  		
											}else{
										?>
											<p class="filetab"><?php echo $uploaded_img; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploaded_img; ?>"></i></p>
										<?php }
										}
										?>
										</div>
										<div class="row">
											<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php echo $msg_cnt; ?></pre>
										</div>
										</div>
										<p style="float:left;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><b><?php echo strtoupper($ext); ?></b></p>
										<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
										</div>
										<a href="profile.php?user_id=<?php echo $user_toid; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $receiverprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
									 </div>
								<?php
							}
						}
					}elseif($content_type=="shared"){
						$sel_post=mysqli_query($con,"select * from user_posts where file_id='$msg_cnt'");
						$row_post=mysqli_fetch_array($sel_post);
						$userid=$row_post['user_id'];
						$usertype=$row_post['user_type'];
						$uploadedimg=$row_post['uploaded_file'];
						if($usertype=="user"){
							$sel_username=mysqli_query($con,"select * from users where user_id='$userid'");
							$row_username=mysqli_fetch_array($sel_username);
							$user_name=$row_username['user_name'];
							$user_prfpic=$row_username['profile_pic'];
							if(str_word_count($user_name)>=2){
								$username=explode(" ",$user_name,3);
								$username=$username[0]." ".$username[1];
							}else{
								$username=$user_name;
							}
							
							//getting post content 
							$select_content="select post_content from user_postcontent where file_id='$msg_cnt'";
							$run_content=mysqli_query($con,$select_content);
							$row_cont=mysqli_fetch_array($run_content);
							$num_content=mysqli_num_rows($run_content);
							if($num_content!=0){
								$postcnt=$row_cont['post_content'];
							}
							if(strlen($uploadedimg)==0){
								if($user_from==$user_fromid){
									?>
										  <div class='mine messages'>
											<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
													<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
												</ul>
											</div>
											<div class="shpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
											<br>
											<a href="profile.php?user_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
											<img src="<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
											  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><span><?php echo $postcnt; ?></span></pre>
											 
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											  <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div> 
										</div>
											<a href="profile.php?user_id=<?php echo $user_fromid; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										  </div>
									<?php
								}else{
									?>
										<div class='yours messages'>
											<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
												</ul>
											</div>
											<div class="shpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
											   <br>
												<a href="profile.php?user_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
											  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><span><?php echo $postcnt; ?></span></pre>
											 
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											   <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div>
										</div>
											<a href="profile.php?user_id=<?php echo $user_toid; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $receiverprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										 </div>
									<?php
								}
							}else{
								if($num_content!=0){
									if(strlen($postcnt)>25){
										$postcnt=substr($postcnt,0,25)."...";
									}
								}
								if($user_from==$user_fromid){
									?>
										  <div class='mine messages'>
											<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;margin-bottom:10px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $msg_cnt; ?>" >View post</a></li>    
													<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
												</ul>
											</div>
											<div class="shpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<a href="profile.php?user_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												<div style="padding:5px;padding-left:5px;padding-right:5px;">
												<div class="row" style="">
											<?php
											$ext = strtolower(pathinfo($uploadedimg, PATHINFO_EXTENSION));
											if(in_array($ext,$img_extensions)){
											?>
												<img src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;" class="picasmsg" upload_img="<?php echo $uploadedimg; ?>" />
											<?php }elseif(in_array($ext,$video_extensions)){ ?>
												<i class="fa fa-play playbtn" id="mplaybtn" aria-hidden="true" upload_video="<?php echo $uploadedimg; ?>"></i>
												<video src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;margin-top:-41%;margin-right:3%;" class="videoasmsg" upload_video="<?php echo $uploadedimg; ?>" ></video>
											<?php }else{
												$filenamelen=strlen($uploadedimg);
												if($filenamelen>35){
													$filename=substr($uploadedimg,0,35);
											?>
												<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php  		
												}else{
											?>
												<p class="filetab"><?php echo $uploadedimg; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php }
											}
											?>
												</div>
												<div class="row">
													<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php if($num_content!=0){ ?><span><b>@<?php echo $userid; ?></b>  </span><?php echo $postcnt; }?></pre>
												</div>
												</div>
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
												<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div> 
										</div>
											<a href="profile.php?user_id=<?php echo $user_fromid; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										  </div>
									<?php
								}else{
									?>
										<div class='yours messages'>
											<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;margin-bottom:10px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
												</ul>
											</div>
											<div class="shpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<a href="profile.php?user_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												<div style="padding:5px;padding-left:5px;padding-right:5px;">
												<div class="row" style="">
												<?php
											$ext = strtolower(pathinfo($uploadedimg, PATHINFO_EXTENSION));
											if(in_array($ext,$img_extensions)){
											?>
												<img src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="picasmsg" upload_img="<?php echo $uploadedimg; ?>" />
											<?php }elseif(in_array($ext,$video_extensions)){ ?>
												<video src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="videoasmsg" upload_video="<?php echo $uploadedimg; ?>" ></video><i class="fa fa-play playbtn" id="playbtn" aria-hidden="true" upload_video="<?php echo $uploadedimg; ?>"></i>
											<?php }else{
												$filenamelen=strlen($uploadedimg);
												if($filenamelen>35){
													$filename=substr($uploadedimg,0,35);
											?>
												<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php  		
												}else{
											?>
												<p class="filetab"><?php echo $uploadedimg; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php }
											}
											?>
											</div>
											<div class="row">
												<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php if($num_content!=0){ ?><span><b>@<?php echo $userid; ?></b>  </span><?php echo $postcnt; }?></pre>
											</div>
											</div>
											<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div>
										</div>
											<a href="profile.php?user_id=<?php echo $user_toid; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $receiverprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										 </div>
									<?php
								}
							}
						}else{
							//showing shared page posts
							$sel_username=mysqli_query($con,"select * from pages where page_id='$userid'");
							$row_username=mysqli_fetch_array($sel_username);
							$user_name=$row_username['pagename'];
							$user_prfpic=$row_username['pagepic'];
							if(str_word_count($user_name)>=2){
								$username=explode(" ",$user_name,3);
								$username=$username[0]." ".$username[1];
							}else{
								$username=$user_name;
							}
							
							//getting post content 
							$select_content="select post_content from user_postcontent where file_id='$msg_cnt'";
							$run_content=mysqli_query($con,$select_content);
							$row_cont=mysqli_fetch_array($run_content);
							$num_content=mysqli_num_rows($run_content);
							if($num_content!=0){
								$postcnt=$row_cont['post_content'];
							}
							if(strlen($uploadedimg)==0){
								if($user_from==$user_fromid){
									?>
										  <div class='mine messages'>
											<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
													<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
												</ul>
											</div>
											<div class="shpgpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<br>
												<a href="pageprofile.php?page_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="images/prfpics/<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><span><?php echo $postcnt; ?></span></pre>
												 
													<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
												  <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
												</div> 
											</div>
												<a href="profile.php?user_id=<?php echo $user_fromid; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										  </div>
									<?php
								}else{
									?>
										<div class='yours messages'>
											<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
												</ul>
											</div>
											<div class="shpgpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
											   <br>
												<a href="pageprofile.php?page_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="images/prfpics/<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
											  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><span><?php echo $postcnt; ?></span></pre>
											 
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											   <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div>
										</div>
											<a href="profile.php?user_id=<?php echo $user_toid; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $receiverprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										 </div>
									<?php
								}
							}else{
								if($num_content!=0){
									if(strlen($postcnt)>25){
										$postcnt=substr($postcnt,0,25)."...";
									}
								}
								if($user_from==$user_fromid){
									?>
										  <div class='mine messages'>
											<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;margin-bottom:10px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $msg_cnt; ?>" >View post</a></li>    
													<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
												</ul>
											</div>
											<div class="shpgpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<a href="pageprofile.php?page_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="images/prfpics/<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												<div style="padding:5px;padding-left:5px;padding-right:5px;">
												<div class="row" style="">
											<?php
											$ext = strtolower(pathinfo($uploadedimg, PATHINFO_EXTENSION));
											if(in_array($ext,$img_extensions)){
											?>
												<img src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;" class="picasmsg" upload_img="<?php echo $uploadedimg; ?>" />
											<?php }elseif(in_array($ext,$video_extensions)){ ?>
												<i class="fa fa-play playbtn" id="mplaybtn" aria-hidden="true" upload_video="<?php echo $uploadedimg; ?>"></i>
												<video src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;margin-top:-41%;margin-right:3%;" class="videoasmsg" upload_video="<?php echo $uploadedimg; ?>" ></video>
											<?php }else{
												$filenamelen=strlen($uploadedimg);
												if($filenamelen>35){
													$filename=substr($uploadedimg,0,35);
											?>
												<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php  		
												}else{
											?>
												<p class="filetab"><?php echo $uploadedimg; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php }
											}
											?>
												</div>
												<div class="row">
													<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php if($num_content!=0){ ?><span><b>@<?php echo $userid; ?></b>  </span><?php echo $postcnt; }?></pre>
												</div>
												</div>
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
												<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
												</div> 
											</div>
											<a href="profile.php?user_id=<?php echo $user_fromid; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										  </div>
									<?php
								}else{
									?>
										<div class='yours messages'>
											<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;margin-bottom:10px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
												</ul>
											</div>
											<div class="shpgpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<a href="pageprofile.php?page_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="images/prfpics/<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												<div style="padding:5px;padding-left:5px;padding-right:5px;">
												<div class="row" style="">
												<?php
											$ext = strtolower(pathinfo($uploadedimg, PATHINFO_EXTENSION));
											if(in_array($ext,$img_extensions)){
											?>
												<img src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="picasmsg" upload_img="<?php echo $uploadedimg; ?>" />
											<?php }elseif(in_array($ext,$video_extensions)){ ?>
												<video src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="videoasmsg" upload_video="<?php echo $uploadedimg; ?>" ></video><i class="fa fa-play playbtn" id="playbtn" aria-hidden="true" upload_video="<?php echo $uploadedimg; ?>"></i>
											<?php }else{
												$filenamelen=strlen($uploadedimg);
												if($filenamelen>35){
													$filename=substr($uploadedimg,0,35);
											?>
												<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php  		
												}else{
											?>
												<p class="filetab"><?php echo $uploadedimg; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php }
											}
											?>
											</div>
											<div class="row">
												<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php if($num_content!=0){ ?><span><b>@<?php echo $userid; ?></b>  </span><?php echo $postcnt; }?></pre>
											</div>
											</div>
											<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div>
										</div>
											<a href="profile.php?user_id=<?php echo $user_toid; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $receiverprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										 </div>
									<?php
								}
							}
						}
					}elseif($content_type=="profile"){
						if($uploaded_img=="user"){
							$sel_user=mysqli_query($con,"select * from users where user_id='$msg_cnt'");
							$row_user=mysqli_fetch_array($sel_user);
							$user_name=$row_user['user_name'];
							$sprfpic=$row_user['profile_pic'];
						}elseif($uploaded_img=="page"){
							$sel_page=mysqli_query($con,"select * from pages where page_id='$msg_cnt'");
							$row_page=mysqli_fetch_array($sel_page);
							$user_name=$row_page['pagename'];
							$sprfpic=$row_page['pagepic'];
						}
						if(str_word_count($user_name)>=2){
							$username=explode(" ",$user_name,3);
							$username=$username[0]." ".$username[1];
						}else{
							$username=$user_name;
						}
						if($user_from==$user_fromid){
							?>
							  <div class='mine messages'>
								<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
								<div class="dropdown" style="height:5px;">
									<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
									<ul class='dropdown-menu' id="msgmorelist">
										<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
									<?php if($uploaded_img=="user"){ ?>
											<li><a href="profile.php?user_id=<?php echo $msg_cnt; ?>" style="cursor:pointer;">view profile</a></li>  
									<?php }else{ ?>
											<li><a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="cursor:pointer;">view profile</a></li>  
									<?php } ?> 	
										<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
									</ul>
								</div>
								<br>
								<div>
								<?php if($uploaded_img=="user"){ ?>
								    <a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="text-decoration:none;color:black;">
									<img src="<?php echo $sprfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
								<?php }else{ ?>
									<a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="text-decoration:none;color:black;">
									<img src="images/prfpics/<?php echo $sprfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
								<?php } ?> 	
								</div>
								  <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
								</div> 
								<a href="profile.php?user_id=<?php echo $user_fromid; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
							  </div>
								<?php
							}else{
								?>
							<div class='yours messages'>
								<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
								<div class="dropdown" style="height:5px;">
									<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
									<ul class='dropdown-menu' id="msgmorelist">
										<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
										<?php if($uploaded_img=="user"){ ?>
												<li><a href="profile.php?user_id=<?php echo $msg_cnt; ?>" style="cursor:pointer;">view profile</a></li>  
										<?php }else{ ?>
												<li><a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="cursor:pointer;">view profile</a></li>  
										<?php } ?> 	
									</ul>
								</div>
								<br>
								<div>
								   <?php if($uploaded_img=="user"){ ?>
								    <a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="text-decoration:none;color:black;">
									<img src="<?php echo $sprfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
								<?php }else{ ?>
									<a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="text-decoration:none;color:black;">
									<img src="images/prfpics/<?php echo $sprfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
								<?php } ?> 	
							</div>
								   <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
								</div>
								<a href="profile.php?user_id=<?php echo $user_toid; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $receiverprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
							 </div>
						<?php
							}
					}
				}
			}
		}elseif($msgstype=="group"){
			$select_joined=mysqli_query($con,"select joined_date from group_members where grp_id='$user_toid' AND grp_member='$user_fromid'");
			$row_joined=mysqli_fetch_array($select_joined);
			$joined_date=$row_joined['joined_date'];
			$select_grpcreated=mysqli_query($con,"select * from groups where grp_id='$user_toid'");
			$row_createdby=mysqli_fetch_array($select_grpcreated);
			$grpcreatedby=$row_createdby['created_by'];
			$select_createduser=mysqli_query($con,"select user_name from users where user_id='$grpcreatedby'");
			$row_username=mysqli_fetch_array($select_createduser);
			$createdbyuser=$row_username['user_name'];
			$select_msgs=mysqli_query($con,"select * from messages where receiver_id='$user_toid' AND msg_id not in(select msg_id from deleted_grpchats where deleted_by='$user_fromid') AND sent_date>='$joined_date' ORDER BY sent_date ASC");
			
			$sent_olddate=$row_createdby['created_date'];
			$oldtime=strtotime($sent_olddate);
			$olddate=date("d/m/Y",$oldtime);
			$today=date("d/m/Y",time());
			if($olddate!=$today){
				echo "
					<p class='alert alert-info' style='border:1px #e6e6e6 solid;width:100px;text-align:center;margin-left:45%;margin-top:10px;border-radius:20px;'>$olddate</p>
				";
			}else{
				echo "
					<p class='alert alert-info' style='border:1px #e6e6e6 solid;width:100px;text-align:center;margin-left:45%;margin-top:10px;border-radius:20px;'>Today</p>
				";
			}
			echo "
				<p class='alert alert-info' style='border:1px #e6e6e6 solid;width:40%;text-align:center;margin-left:30%;margin-top:10px;border-radius:20px;'>Group created by <br>$createdbyuser</p>
			";
			while($row_message=mysqli_fetch_array($select_msgs)){
				$msg_id=$row_message['msg_id'];
				$msg_cnt=$row_message['msg_content'];
				$user_from=$row_message['sender_userid'];
				//$user_to=$row_message['receiver_id'];
				$uploaded_img=$row_message['uploaded_file'];
				$content_type=$row_message['content_type'];
				$sent_date=$row_message['sent_date'];
				$time=strtotime($sent_date);
				$newdate=date("d/m/Y",$time);
				if($newdate!=$olddate){
					$olddate=$newdate;
					if($olddate!=$today){
						echo "
							<p class='alert alert-info' style='border:1px #e6e6e6 solid;width:100px;text-align:center;margin-left:45%;margin-top:10px;border-radius:20px;'>$olddate</p>
						";
					}else{
						echo "
							<p class='alert alert-info' style='border:1px #e6e6e6 solid;width:100px;text-align:center;margin-left:45%;margin-top:10px;border-radius:20px;'>Today</p>
						";
					}
				}
				$senttime=date("h:i A",$time);
				$deleted_by=$row_message['deleted_by'];
				$img_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
				$video_extensions = array('webm', 'mpg', 'mp2', 'mp3', 'mpeg','mpe','mpv','ogg','mp4','m4p','m4v','avi','wmv','mov','qt','flv','swf','avchd');
				
				$select_prfpic1=mysqli_query($con,"select * from users where user_id='$user_from'");
				$rowsender=mysqli_fetch_array($select_prfpic1);
				$senderprfpic=$rowsender['profile_pic'];
				$user_name=$rowsender['user_name'];
				if(str_word_count($user_name)>=2){
					$susername=explode(" ",$user_name,3);
					$susername=$susername[0]." ".$susername[1];
				}else{
					$susername=$user_name;
				}
				
				if($content_type=="self"){
					if($uploaded_img=="none"){
						if($user_from==$user_fromid){
							?>
								  <div class='mine messages'>
									<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
									<div class="dropdown" style="height:5px;margin-bottom:5px;">
										<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
										<ul class='dropdown-menu' id="msgmorelist">
											<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
											<li><a class="copymessage" style="cursor:pointer;" msgval="<?php echo $msg_cnt; ?>">Copy</a></li>  
											<li><a class="msgforward" msg_id="<?php echo $msg_id; ?>"  style="cursor:pointer;">forward</a></li>  
											<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
										</ul>
									</div>
									  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php echo $msg_cnt; ?></pre>
									  <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
									</div> 
									<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
								  </div>
							<?php
						}else{
							?>
								<div class='yours messages'>
									<a href="profile.php?user_id=<?php echo $user_from; ?>" style="font-size:1em;font-family:bold;color:#969493;margin-left:10%;"><b><?php echo $susername; ?></b></a>
									<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
									<div class="dropdown" style="height:5px;margin-bottom:5px;">
										<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
										<ul class='dropdown-menu' id="msgmorelist">
											<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
											<li><a class="copymessage" style="cursor:pointer;" msgval="<?php echo $msg_cnt; ?>">Copy</a></li>  
											<li><a class="msgforward" msg_id="<?php echo $msg_id; ?>"  style="cursor:pointer;">forward</a></li>  
										</ul>
									</div>
									   <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php echo $msg_cnt; ?></pre>
									   <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
									</div>
									<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
								 </div>
							<?php
						}
					}elseif($uploaded_img != "none"){
						if($user_from==$user_fromid){
							?>
								  <div class='mine messages'>
									<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
									<div class="dropdown" style="height:5px;margin-bottom:10px;">
										<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
										<ul class='dropdown-menu' id="msgmorelist">
											<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
											<li><a class="msgforward" msg_id="<?php echo $msg_id; ?>"  style="cursor:pointer;">forward</a></li>  
											<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
										</ul>
									</div>
										<div style="padding:5px;padding-left:5px;padding-right:5px;">
										<div class="row" style="">
									<?php
									$ext = strtolower(pathinfo($uploaded_img, PATHINFO_EXTENSION));
									if(in_array($ext,$img_extensions)){
									?>
										<img src="uploadedFiles/<?php echo $uploaded_img; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;" class="picasmsg" upload_img="<?php echo $uploaded_img; ?>" />
									<?php }elseif(in_array($ext,$video_extensions)){ ?>
										<i class="fa fa-play playbtn" id="mplaybtn" aria-hidden="true" upload_video="<?php echo $uploaded_img; ?>"></i>
										<video src="uploadedFiles/<?php echo $uploaded_img; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;margin-top:-41%;margin-right:3%;" class="videoasmsg" upload_video="<?php echo $uploaded_img; ?>"></video>
									<?php }else{
										$filenamelen=strlen($uploaded_img);
										if($filenamelen>35){
											$filename=substr($uploaded_img,0,35);
									?>
										<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploaded_img; ?>"></i></p>
									<?php  		
										}else{
									?>
										<p class="filetab"><?php echo $uploaded_img; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploaded_img; ?>"></i></p>
									<?php }
									}
									?>
										</div>
										<div class="row">
											<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php echo $msg_cnt; ?></pre>
										</div>
										</div>
										<p style="float:left;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><b><?php echo strtoupper($ext); ?></b></p>
										<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
									</div> 
									<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
								  </div>
							<?php
						}else{
							?>
								<div class='yours messages'>
									<a href="profile.php?user_id=<?php echo $user_from; ?>" style="font-size:1em;font-family:bold;color:#969493;margin-left:10%;"><b><?php echo $susername; ?></b></a>
									<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
									<div class="dropdown" style="height:5px;margin-bottom:5px;">
										<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
										<ul class='dropdown-menu' id="msgmorelist">
											<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
											<li><a class="msgforward" msg_id="<?php echo $msg_id; ?>"  style="cursor:pointer;">forward</a></li>  
										</ul>
									</div>
										<div style="padding:5px;padding-left:5px;padding-right:5px;">
										<div class="row" style="">
										<br>
										<?php
									$ext = strtolower(pathinfo($uploaded_img, PATHINFO_EXTENSION));
									if(in_array($ext,$img_extensions)){
									?>
										<img src="uploadedFiles/<?php echo $uploaded_img; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="picasmsg" upload_img="<?php echo $uploaded_img; ?>" />
									<?php }elseif(in_array($ext,$video_extensions)){ ?>
										<video src="uploadedFiles/<?php echo $uploaded_img; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;margin-left:5%;" class="videoasmsg" upload_video="<?php echo $uploaded_img; ?>" ></video><i class="fa fa-play playbtn" id="playbtn" aria-hidden="true" upload_video="<?php echo $uploaded_img; ?>"></i>
									<?php }else{
										$filenamelen=strlen($uploaded_img);
										if($filenamelen>35){
											$filename=substr($uploaded_img,0,35);
									?>
										<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploaded_img; ?>"></i></p>
									<?php  		
										}else{
									?>
										<p class="filetab"><?php echo $uploaded_img; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploaded_img; ?>"></i></p>
									<?php }
									}
									?>
									</div>
									<div class="row">
										<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php echo $msg_cnt; ?></pre>
									</div>
									</div>
									<p style="float:left;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><b><?php echo strtoupper($ext); ?></b></p>
									<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
									</div>
									<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
								 </div>
							<?php
						}
					}
				}elseif($content_type=="shared"){
					$sel_post=mysqli_query($con,"select * from user_posts where file_id='$msg_cnt'");
						$row_post=mysqli_fetch_array($sel_post);
						$userid=$row_post['user_id'];
						$usertype=$row_post['user_type'];
						$uploadedimg=$row_post['uploaded_file'];
						if($usertype=="user"){
							$sel_username=mysqli_query($con,"select * from users where user_id='$userid'");
							$row_username=mysqli_fetch_array($sel_username);
							$user_name=$row_username['user_name'];
							$user_prfpic=$row_username['profile_pic'];
							if(str_word_count($user_name)>=2){
								$username=explode(" ",$user_name,3);
								$username=$username[0]." ".$username[1];
							}else{
								$username=$user_name;
							}
							
							//getting post content 
							$select_content="select post_content from user_postcontent where file_id='$msg_cnt'";
							$run_content=mysqli_query($con,$select_content);
							$row_cont=mysqli_fetch_array($run_content);
							$num_content=mysqli_num_rows($run_content);
							if($num_content!=0){
								$postcnt=$row_cont['post_content'];
							}
							if(strlen($uploadedimg)==0){
								if($user_from==$user_fromid){
									?>
										  <div class='mine messages'>
											<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
													<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
												</ul>
											</div>
											<div class="shpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
											<br>
											<a href="profile.php?user_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
											<img src="<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
											  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><span><?php echo $postcnt; ?></span></pre>
											 
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											  <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div> 
										</div>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										  </div>
									<?php
								}else{
									?>
										
										<div class='yours messages'>
										<a href="profile.php?user_id=<?php echo $user_from; ?>" style="font-size:1em;font-family:bold;color:#969493;margin-left:10%;"><b><?php echo $susername; ?></b></a>
											<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
												</ul>
											</div>
											<div class="shpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
											   <br>
												<a href="profile.php?user_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
											  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><span><?php echo $postcnt; ?></span></pre>
											 
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											   <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div>
										</div>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										 </div>
									<?php
								}
							}else{
								if($num_content!=0){
									if(strlen($postcnt)>25){
										$postcnt=substr($postcnt,0,25)."...";
									}
								}
								if($user_from==$user_fromid){
									?>
										  <div class='mine messages'>
											<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;margin-bottom:10px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $msg_cnt; ?>" >View post</a></li>    
													<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
												</ul>
											</div>
											<div class="shpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<a href="profile.php?user_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												<div style="padding:5px;padding-left:5px;padding-right:5px;">
												<div class="row" style="">
											<?php
											$ext = strtolower(pathinfo($uploadedimg, PATHINFO_EXTENSION));
											if(in_array($ext,$img_extensions)){
											?>
												<img src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;" class="picasmsg" upload_img="<?php echo $uploadedimg; ?>" />
											<?php }elseif(in_array($ext,$video_extensions)){ ?>
												<i class="fa fa-play playbtn" id="mplaybtn" aria-hidden="true" upload_video="<?php echo $uploadedimg; ?>"></i>
												<video src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;margin-top:-41%;margin-right:3%;" class="videoasmsg" upload_video="<?php echo $uploadedimg; ?>" ></video>
											<?php }else{
												$filenamelen=strlen($uploadedimg);
												if($filenamelen>35){
													$filename=substr($uploadedimg,0,35);
											?>
												<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php  		
												}else{
											?>
												<p class="filetab"><?php echo $uploadedimg; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php }
											}
											?>
												</div>
												<div class="row">
													<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php if($num_content!=0){ ?><span><b>@<?php echo $userid; ?></b>  </span><?php echo $postcnt; }?></pre>
												</div>
												</div>
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
												<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div> 
										</div>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										  </div>
									<?php
								}else{
									?>
										<div class='yours messages'>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="font-size:1em;font-family:bold;color:#969493;margin-left:10%;"><b><?php echo $susername; ?></b></a>
											<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;margin-bottom:10px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&post_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
												</ul>
											</div>
											<div class="shpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<a href="profile.php?user_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												<div style="padding:5px;padding-left:5px;padding-right:5px;">
												<div class="row" style="">
												<?php
											$ext = strtolower(pathinfo($uploadedimg, PATHINFO_EXTENSION));
											if(in_array($ext,$img_extensions)){
											?>
												<img src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="picasmsg" upload_img="<?php echo $uploadedimg; ?>" />
											<?php }elseif(in_array($ext,$video_extensions)){ ?>
												<video src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="videoasmsg" upload_video="<?php echo $uploadedimg; ?>" ></video><i class="fa fa-play playbtn" id="playbtn" aria-hidden="true" upload_video="<?php echo $uploadedimg; ?>"></i>
											<?php }else{
												$filenamelen=strlen($uploadedimg);
												if($filenamelen>35){
													$filename=substr($uploadedimg,0,35);
											?>
												<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php  		
												}else{
											?>
												<p class="filetab"><?php echo $uploadedimg; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php }
											}
											?>
											</div>
											<div class="row">
												<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php if($num_content!=0){ ?><span><b>@<?php echo $userid; ?></b>  </span><?php echo $postcnt; }?></pre>
											</div>
											</div>
											<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div>
										</div>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										 </div>
									<?php
								}
							}
						}else{
							//showing shared page posts
							$sel_username=mysqli_query($con,"select * from pages where page_id='$userid'");
							$row_username=mysqli_fetch_array($sel_username);
							$user_name=$row_username['pagename'];
							$user_prfpic=$row_username['pagepic'];
							if(str_word_count($user_name)>=2){
								$username=explode(" ",$user_name,3);
								$username=$username[0]." ".$username[1];
							}else{
								$username=$user_name;
							}
							
							//getting post content 
							$select_content="select post_content from user_postcontent where file_id='$msg_cnt'";
							$run_content=mysqli_query($con,$select_content);
							$row_cont=mysqli_fetch_array($run_content);
							$num_content=mysqli_num_rows($run_content);
							if($num_content!=0){
								$postcnt=$row_cont['post_content'];
							}
							if(strlen($uploadedimg)==0){
								if($user_from==$user_fromid){
									?>
										  <div class='mine messages'>
											<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
													<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
												</ul>
											</div>
											<div class="shpgpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<br>
												<a href="pageprofile.php?page_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="images/prfpics/<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><span><?php echo $postcnt; ?></span></pre>
												 
													<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
												  <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
												</div> 
											</div>
												<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										  </div>
									<?php
								}else{
									?>
										<div class='yours messages'>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="font-size:1em;font-family:bold;color:#969493;margin-left:10%;"><b><?php echo $susername; ?></b></a>
											<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
												</ul>
											</div>
											<div class="shpgpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
											   <br>
												<a href="pageprofile.php?page_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="images/prfpics/<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
											  <pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><span><?php echo $postcnt; ?></span></pre>
											 
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											   <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div>
										</div>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										 </div>
									<?php
								}
							}else{
								if($num_content!=0){
									if(strlen($postcnt)>25){
										$postcnt=substr($postcnt,0,25)."...";
									}
								}
								if($user_from==$user_fromid){
									?>
										  <div class='mine messages'>
											<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;margin-bottom:10px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $msg_cnt; ?>" >View post</a></li>    
													<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
												</ul>
											</div>
											<div class="shpgpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<a href="pageprofile.php?page_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="images/prfpics/<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												<div style="padding:5px;padding-left:5px;padding-right:5px;">
												<div class="row" style="">
											<?php
											$ext = strtolower(pathinfo($uploadedimg, PATHINFO_EXTENSION));
											if(in_array($ext,$img_extensions)){
											?>
												<img src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;" class="picasmsg" upload_img="<?php echo $uploadedimg; ?>" />
											<?php }elseif(in_array($ext,$video_extensions)){ ?>
												<i class="fa fa-play playbtn" id="mplaybtn" aria-hidden="true" upload_video="<?php echo $uploadedimg; ?>"></i>
												<video src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:right;margin-top:-41%;margin-right:3%;" class="videoasmsg" upload_video="<?php echo $uploadedimg; ?>" ></video>
											<?php }else{
												$filenamelen=strlen($uploadedimg);
												if($filenamelen>35){
													$filename=substr($uploadedimg,0,35);
											?>
												<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php  		
												}else{
											?>
												<p class="filetab"><?php echo $uploadedimg; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php }
											}
											?>
												</div>
												<div class="row">
													<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php if($num_content!=0){ ?><span><b>@<?php echo $userid; ?></b>  </span><?php echo $postcnt; }?></pre>
												</div>
												</div>
												<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
												<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
												</div> 
											</div>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										  </div>
									<?php
								}else{
									?>
										<div class='yours messages'>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="font-size:1em;font-family:bold;color:#969493;margin-left:10%;"><b><?php echo $susername; ?></b></a>
											<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
											<div class="dropdown" style="height:5px;margin-bottom:10px;">
												<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
												<ul class='dropdown-menu' id="msgmorelist">
													<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
													<li><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $msg_cnt; ?>" >View post</a></li>  
												</ul>
											</div>
											<div class="shpgpstdetails" userid="<?php echo $userid; ?>" postid="<?php echo $msg_cnt; ?>">
												<a href="pageprofile.php?page_id=<?php echo $userid; ?>" style="text-decoration:none;color:black;">
												<img src="images/prfpics/<?php echo $user_prfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
												<div style="padding:5px;padding-left:5px;padding-right:5px;">
												<div class="row" style="">
												<?php
											$ext = strtolower(pathinfo($uploadedimg, PATHINFO_EXTENSION));
											if(in_array($ext,$img_extensions)){
											?>
												<img src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="picasmsg" upload_img="<?php echo $uploadedimg; ?>" />
											<?php }elseif(in_array($ext,$video_extensions)){ ?>
												<video src="uploadedFiles/<?php echo $uploadedimg; ?>" style="width:300px;height:250px;border:solid 2px #e6e6e6;border-radius:5px;float:left;" class="videoasmsg" upload_video="<?php echo $uploadedimg; ?>" ></video><i class="fa fa-play playbtn" id="playbtn" aria-hidden="true" upload_video="<?php echo $uploadedimg; ?>"></i>
											<?php }else{
												$filenamelen=strlen($uploadedimg);
												if($filenamelen>35){
													$filename=substr($uploadedimg,0,35);
											?>
												<p class="filetab"><?php echo $filename; ?>... <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php  		
												}else{
											?>
												<p class="filetab"><?php echo $uploadedimg; ?> <i class="fa fa-download downloadfile" aria-hidden="true" style="cursor:pointer" filename="<?php echo $uploadedimg; ?>"></i></p>
											<?php }
											}
											?>
											</div>
											<div class="row">
												<pre style="background:none;border:none;overflow-x:hidden;white-space: pre-wrap;word-wrap: break-word;word-break: keep-all;font-family:helvetica;padding:0px;margin-top:7px;font-size:1em;"><?php if($num_content!=0){ ?><span><b>@<?php echo $userid; ?></b>  </span><?php echo $postcnt; }?></pre>
											</div>
											</div>
											<p style="float:left;font-size:1em;margin-left:10px;margin-bottom:-5px;color:#969493;font-family:bold;"><b><i>Shared Post</i></b></p>
											<p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
											</div>
										</div>
											<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
										 </div>
									<?php
								}
							}
						}
				}elseif($content_type=="profile"){
					if($uploaded_img=="user"){
						$sel_user=mysqli_query($con,"select * from users where user_id='$msg_cnt'");
						$row_user=mysqli_fetch_array($sel_user);
						$user_name=$row_user['user_name'];
						$sprfpic=$row_user['profile_pic'];
					}elseif($uploaded_img=="page"){
						$sel_page=mysqli_query($con,"select * from pages where page_id='$msg_cnt'");
						$row_page=mysqli_fetch_array($sel_page);
						$user_name=$row_page['pagename'];
						$sprfpic=$row_page['pagepic'];
					}
					if(str_word_count($user_name)>=2){
						$username=explode(" ",$user_name,3);
						$username=$username[0]." ".$username[1];
					}else{
						$username=$user_name;
					}
					if($user_from==$user_fromid){
						?>
						  <div class='mine messages'>
							<div class=' message' style="margin-right:8%;" msgid="<?php echo $msg_id; ?>">
							<div class="dropdown" style="height:5px;">
								<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
								<ul class='dropdown-menu' id="msgmorelist">
									<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
								<?php if($uploaded_img=="user"){ ?>
										<li><a href="profile.php?user_id=<?php echo $msg_cnt; ?>" style="cursor:pointer;">view profile</a></li>  
								<?php }else{ ?>
										<li><a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="cursor:pointer;">view profile</a></li>  
								<?php } ?> 	
									<li class='delmsg' msg_touser="<?php echo $user_toid; ?>" msg_id="<?php echo $msg_id; ?>" style="cursor:pointer;"><a>delete</a></li>											
								</ul>
							</div>
							<br>
							<div>
							<?php if($uploaded_img=="user"){ ?>
							    <a href="profile.php?user_id=<?php echo $msg_cnt; ?>" style="text-decoration:none;color:black;">
								<img src="<?php echo $sprfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
							<?php }else{ ?>
								<a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="text-decoration:none;color:black;">
								<img src="images/prfpics/<?php echo $sprfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
							<?php } ?> 	
							</div>
							  <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
							</div> 
							<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-right:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
						  </div>
							<?php
						}else{
							?>
						<div class='yours messages'>
							<a href="profile.php?user_id=<?php echo $user_from; ?>" style="font-size:1em;font-family:bold;color:#969493;margin-left:10%;"><b><?php echo $susername; ?></b></a>
							<div class=' message' style="margin-left:8%;" msgid="<?php echo $msg_id; ?>">
							<div class="dropdown" style="height:5px;">
								<li id="<?php echo $msg_id; ?>" style="color:black;display:none;list-style-type:none;margin-top:-5px;" class='dropdown-toggle' data-toggle='dropdown'><b><i class='fa fa-chevron-down msgmore' style="font-size:1.2em;" msg_id="<?php echo $msg_id; ?>"></i></b></li>
								<ul class='dropdown-menu' id="msgmorelist">
									<li><a class="msgreply" style="cursor:pointer;">Reply</a></li>  
									<?php if($uploaded_img=="user"){ ?>
											<li><a href="profile.php?user_id=<?php echo $msg_cnt; ?>" style="cursor:pointer;">view profile</a></li>  
									<?php }else{ ?>
											<li><a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="cursor:pointer;">view profile</a></li>  
									<?php } ?> 	
								</ul>
							</div>
							<br>
							<div>
							   <?php if($uploaded_img=="user"){ ?>
							    <a href="profile.php?user_id=<?php echo $msg_cnt; ?>" style="text-decoration:none;color:black;">
								<img src="<?php echo $sprfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
							<?php }else{ ?>
								<a href="pageprofile.php?page_id=<?php echo $msg_cnt; ?>" style="text-decoration:none;color:black;">
								<img src="images/prfpics/<?php echo $sprfpic; ?>" style="width:40px;height:40px;border-radius:20px;margin-right:5px;" />   <span style="font-size:1.3em;font-family:bold;"><?php echo $username; ?></span></a>
							<?php } ?> 	
							</div>
							   <p style="float:right;font-size:0.82em;margin-left:10px;margin-bottom:-5px;color:#969493"><?php echo $senttime; ?></p>
							</div>
							<a href="profile.php?user_id=<?php echo $user_from; ?>" style="margin-top:-37px;margin-left:3.5%;"><img src="<?php echo $senderprfpic; ?>" style="width:30px;height:30px;border-radius:15px;border:1px #757573 solid;"></a>
						 </div>
					<?php
					}
				}
			}
		}
	}
}
?>
<script>
//showing more btn on message
$(".message").mouseover(function(){
	var msgid=$(this).attr("msgid");
	var msg=document.getElementById(msgid);
	msg.setAttribute('style','display:display');
	msg.setAttribute('style','list-style-type:none');
	//alert(user+"   hovered");
});
//hiding more btn on message
$(".message").mouseout(function(){
	var msgid=$(this).attr("msgid");
	var msg=document.getElementById(msgid);
	msg.setAttribute('style','display:none');
	//alert(user+"   hovered");
});
//deleting the message
$(".delmsg").click(function(){
	var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
	var msgtouser=$(this).attr("msg_touser");
	var msgid=$(this).attr("msg_id");
	$.ajax({
		url:'functions/operations.php',
		data:'delsinglemsg=1&msg_id='+msgid+'&sessionuser='+sessionuser+'&msgtouser='+msgtouser,
		type:'post',
		success:function(res){
			refreshMessages();
			messageToList();
			changeBgColor();
		}
	});
	return;
});
//copy message
$('.copymessage').click(function(){
	var dummy = document.createElement('input');
	text = $(this).attr("msgval");
	document.body.appendChild(dummy);
	dummy.value = text;
	dummy.select();
	document.execCommand('copy');
	document.body.removeChild(dummy);
});

//replying to the message
$(".msgreply").click(function(){
	$(".msgbox").focus();
});

//download a file
$(".downloadfile").click(function(){
	var filename=$(this).attr("filename");
	//alert(filename);
	window.open('functions/downloadfiles.php?downloadfiles=1&file_name='+filename,'_self')
});

//opening the msg forward modal
$(".msgforward").click(function(){
	var msg_id=$(this).attr("msg_id");
	document.getElementById("fwrdmsgid").value=msg_id;
	$("#msgforwardmodal").modal({
		show : true
	});
});

//showing pic as big picture
$(".picasmsg").click(function(){
	var upload_img=$(this).attr("upload_img");
	//alert(upload_img);
	//$("#modalprfpic").attr("src").val("uploadedFiles/"+upload_img);
	var msgpic=document.getElementById("modalprfpic");
	msgpic.setAttribute("src","uploadedFiles/"+upload_img);
	$("#msgpicmodal").modal({
		show : true
	});
});

//showing video as big 
$(".videoasmsg").click(function(){
	var upload_img=$(this).attr("upload_video");
	//alert(upload_img);
	//$("#modalprfpic").attr("src").val("uploadedFiles/"+upload_img);
	var msgpic=document.getElementById("modalvideo");
	msgpic.setAttribute("src","uploadedFiles/"+upload_img);
	$("#msgvideomodal").modal({
		show : true
	});
});
//showing video as big 
$(".playbtn").click(function(){
	var upload_img=$(this).attr("upload_video");
	var msgpic=document.getElementById("modalvideo");
	msgpic.setAttribute("src","uploadedFiles/"+upload_img);
	$("#msgvideomodal").modal({
		show : true
	});
});
//opening post details from message page
$(".shpstdetails").unbind().click(function(){
	var postid=$(this).attr("postid");
	var userid=$(this).attr("userid");
	window.open('postdetails.php?user_id='+userid+'&post_id='+postid,'_self');
});
//opening post details from message page
$(".shpgpstdetails").unbind().click(function(){
	var postid=$(this).attr("postid");
	var userid=$(this).attr("userid");
	window.open('postdetails.php?user_id='+userid+'&file_id='+postid,'_self');
});
</script>
<?php
//forwarding a message
	global $con;
	$sessionuser=$_SESSION['uid'];
	$select_fwrdusers=mysqli_query($con,"select followed_user from following where following_user='$sessionuser' AND user_type='user' AND status='accepted'");
	$select_fwrdgrps=mysqli_query($con,"select grp_id from group_members where grp_member='$sessionuser'");
?>
<!-- modal for creating a group. -->
<div class="modal fade" id="msgforwardmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="panel-title"><p><strong>Forward message to</strong></p></div>	
			</div>
			<div class="modal-body">
				<div class="panel panel-deafult">
					<div class="panel-body">
						<form name="" method="post" action="" enctype="multipart/form-data" style="margin-top:-10px;">
							<input type="submit" class="btn btn-info" name="fwrdmsgsbtn" id="fwrdmsgsbtn" value="Done" style="float:right;margin-top:-15px;" />
							<input type="text" name="fwrdmsgid" id="fwrdmsgid" style="display:none;" />
							<label>Select users to forward : </label>
							<div style="border:solid #e6e6e6 1px;">
								<?php
									//groups
									while($row_grp=mysqli_fetch_array($select_fwrdgrps)){
										$grpid=$row_grp['grp_id'];
										$select_grpdetails=mysqli_query($con,"select * from groups where grp_id='$grpid'");
										$row_details=mysqli_fetch_array($select_grpdetails);
										$username=$row_details['grp_name'];
										if(str_word_count($username)>=2){
											$username=explode(" ",$username,3);
											$username=$username[0]." ".$username[1];
										}
										$prf_pic=$row_details['group_pic'];
										echo "
											<a class='btn setmsgtouser' id='setmsgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
												<div class='row'>
													<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;' />
													<p id='setmsgtousername' style='margin-top:10px;'>$username</p>
													<input type='checkbox' name='fwrdmember[]' id='fwrdmember' style='width:20px;height:20px;' value='$grpid' />
												</div>
											</a>
										";
									}
									//following users
									while($row_user=mysqli_fetch_array($select_fwrdusers)){
										$userid=$row_user['followed_user'];
										$select_userdetails=mysqli_query($con,"select * from users where user_id='$userid'");
										$row_details=mysqli_fetch_array($select_userdetails);
										$username=$row_details['user_name'];
										if(str_word_count($username)>=2){
											$username=explode(" ",$username,3);
											$username=$username[0]." ".$username[1];
										}
										$prf_pic=$row_details['profile_pic'];
										echo "
											<a class='btn setmsgtouser' id='setmsgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
												<div class='row'>
													<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;' />
													<p id='setmsgtousername' style='margin-top:10px;'>$username</p>
													<input type='checkbox' name='fwrdmember[]' id='fwrdmember' style='width:20px;height:20px;' value='$userid' />
												</div>
											</a>
										";
									}
									
								?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- message forward modal end -->

<!-- showing pic as big -->
<div class="modal fade" id="msgpicmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-20px;font-size:3em;margin-bottom:-15px;"><span aria-hidden="true">&times;</span></button>
			<img class="img-responsive" src="" id="modalprfpic" style="width:100%;height:75%;margin-top:-27px;border:solid 1px black;" />
		</div>
	</div>
</div>

<!-- showing pic as big -->
<div class="modal fade" id="msgvideomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-20px;font-size:3em;margin-bottom:-15px;"><span aria-hidden="true">&times;</span></button>
			<video class="img-responsive" src="" id="modalvideo" style="width:100%;height:75%;margin-top:-35px;border:solid 1px black;" controls />
		</div>
	</div>
</div>
<?php
//code for forwarding a message
if(isset($_POST['fwrdmsgsbtn'])){
	global $con;
	$sessionuser=$_SESSION['uid'];
	$msg_id=htmlentities(mysqli_real_escape_string($con,$_POST['fwrdmsgid']));
	$select_msg=mysqli_query($con,"select * from messages where msg_id='$msg_id'");
	$row_msg=mysqli_fetch_array($select_msg);
	$msg_cnt=$row_msg['msg_content'];
	$uploaded_file=$row_msg['uploaded_file'];
	
	foreach($_POST['fwrdmember'] as $userid){
		$check_asgrp=mysqli_query($con,"select * from groups where grp_id='$userid'");
		$num_grps=mysqli_num_rows($check_asgrp);
		if($num_grps==0){
			$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$sessionuser','$userid','$msg_cnt','$uploaded_file','none','direct','self',NOW())";
			$run_msgcnt=mysqli_query($con,$insert_msg);
			
			$check_msgtolist="select * from messageto where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
			$run_msgtolist=mysqli_query($con,$check_msgtolist);
			$num_msgtolist=mysqli_num_rows($run_msgtolist);
			if($num_msgtolist == 0){
				$insert_msgtolist="insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$sessionuser','$userid','none','direct',NOW())";
				$run_msglist=mysqli_query($con,$insert_msgtolist);
			}else{
				$row_msgtolist=mysqli_fetch_array($run_msgtolist);
				$deleted_by=$row_msgtolist['deleted_by'];
				if($deleted_by != "$sessionuser" and $deleted_by != "$userid"){
					$update_time="update messageto set updated_time=NOW() where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
				}else{
					$update_time="update messageto set deleted_by='none',updated_time=NOW() where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
				}
				$run_update=mysqli_query($con,$update_time);
			}
			
			
			/*if($run_msgcnt){
				echo "<script>window.open('messages.php?type=direct&user_id=$user_to_id','_self');</script>";
			}*/
		}else{
			$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$sessionuser','$userid','$msg_cnt','$uploaded_file','none','group','self',NOW())";
				$run_msgcnt=mysqli_query($con,$insert_msg);
				
				$select_grpmembers=mysqli_query($con,"select grp_member from group_members where grp_id='$userid'");
				while($row_mem=mysqli_fetch_array($select_grpmembers)){
					$user=$row_mem['grp_member'];
					$update_time="update messageto set updated_time=NOW() where message_from='$user' AND message_to='$userid' AND msgto_type='group'";
					$run_update=mysqli_query($con,$update_time);
				}
		}
	}
}

//showing message to list
class messageToList{
	function showMsgToList(){
		global $con;
		//$user_id=$_POST['message_to'];
		$uid=$_POST['sessionuser'];
		$show_msgto="select * from messageto where message_from='$uid' OR message_to='$uid' ORDER BY updated_time DESC";
		$run_msgto=mysqli_query($con,$show_msgto);
		$count_msgto=0;
		while($row_show=mysqli_fetch_array($run_msgto)){
			$msgto=$row_show['message_to'];
			$deleted_by=$row_show['deleted_by'];
			$msgto_type=$row_show['msgto_type'];
			if($deleted_by != "$uid"){
				$count_msgto=$count_msgto+1;
				if($msgto_type=="direct"){
					if($msgto=="$uid"){
						$msgto=$row_show['message_from'];
					}else{
						$msgto=$row_show['message_to'];
					}
					$check_msgs="select * from messages where ((sender_userid='$uid' AND receiver_id='$msgto') OR (sender_userid='$msgto' AND receiver_id='$uid')) AND (deleted_by='none' OR deleted_by='$msgto')";
					
					$run_msgs=mysqli_query($con,$check_msgs);
					$num_rows=mysqli_num_rows($run_msgs);
					if($num_rows != 0){
						$select_details="select * from users where user_id='$msgto'";
						$run_details=mysqli_query($con,$select_details);
						$row_details=mysqli_fetch_array($run_details);
						$prf_picture=$row_details['profile_pic'];
						$user_name=$row_details['user_name'];
						$user_status=$row_details['status'];
						if(str_word_count($user_name)>=2){
							$username=explode(" ",$row_details['user_name'],3);
							$user_name=$username[0]." ".$username[1];
						}
						$userid=$row_details['user_id'];
						$select_lastmsg=mysqli_query($con,"select * from messages where (sender_userid='$uid' AND receiver_id='$msgto') OR (sender_userid='$msgto' AND receiver_id='$uid') ORDER BY sent_date DESC LIMIT 1");
						$row_lastmsg=mysqli_fetch_array($select_lastmsg);
						$msg=$row_lastmsg['msg_content'];
						$sendby=$row_lastmsg['sender_userid'];
						$file=$row_lastmsg['uploaded_file'];
						$content_type=$row_lastmsg['content_type'];
						if($content_type=="self"){
							if($file=="none"){
								if($sendby!="$uid"){
									echo "
										<a href='messages.php?type=direct&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
											<div class='row'>
												<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;' />
									";
										if($user_status=="active"){
											$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$msgto'");
											$row_status=mysqli_fetch_array($check_actstatus);
											$act_status=$row_status['activity_status'];
											if($act_status=="everyone"){
												echo "
													<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
												";
											}elseif($act_status=="followcon"){
												$check_follower=mysqli_query($con,"select * from following where following_user='$msgto' AND followed_user='$uid' AND status='accepted'");
												$num_followers=mysqli_num_rows($check_follower);
												$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$msgto' AND status='accepted') OR (connect_by='$msgto' AND connect_with='$uid' AND status='accepted')");
												$num_con=mysqli_num_rows($check_con);
												if($num_followers != 0 OR $num_con != 0){
													echo "
														<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
													";
												}
											}
										}
									echo "
												<p id='setmsgtousername'>$user_name</p>
											</div>
									";
									if(strlen($msg)>50){
										$msg=substr($msg,0,50);
										echo "
											<p id='lastmessage'> $msg...</p>
										";
									}else{
										echo "
											<p id='lastmessage'> $msg</p>
										";
									}
									echo "
										</a>
									";
								}else{
									echo "
										<a href='messages.php?type=direct&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
											<div class='row'>
												<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;' />
									";
										if($user_status=="active"){
											$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$msgto'");
											$row_status=mysqli_fetch_array($check_actstatus);
											$act_status=$row_status['activity_status'];
											if($act_status=="everyone"){
												echo "
													<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
												";
											}elseif($act_status=="followcon"){
												$check_follower=mysqli_query($con,"select * from following where following_user='$msgto' AND followed_user='$uid' AND status='accepted'");
												$num_followers=mysqli_num_rows($check_follower);
												$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$msgto' AND status='accepted') OR (connect_by='$msgto' AND connect_with='$uid' AND status='accepted')");
												$num_con=mysqli_num_rows($check_con);
												if($num_followers != 0 OR $num_con != 0){
													echo "
														<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
													";
												}
											}
										}
									echo "
												<p id='setmsgtousername'>$user_name</p>
											</div>
									";
									if(strlen($msg)>50){
										$msg=substr($msg,0,50);
										echo "
											<p id='lastmessage'>You : $msg...</p>
										";
									}else{
										echo "
											<p id='lastmessage'>You : $msg</p>
										";
									}
									echo "
										</a>
									";
								}
							}else{
								if($sendby!="$uid"){
									echo "
										<a href='messages.php?type=direct&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
											<div class='row'>
												<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;' />
									";
										if($user_status=="active"){
											$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$msgto'");
											$row_status=mysqli_fetch_array($check_actstatus);
											$act_status=$row_status['activity_status'];
											if($act_status=="everyone"){
												echo "
													<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
												";
											}elseif($act_status=="followcon"){
												$check_follower=mysqli_query($con,"select * from following where following_user='$msgto' AND followed_user='$uid' AND status='accepted'");
												$num_followers=mysqli_num_rows($check_follower);
												$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$msgto' AND status='accepted') OR (connect_by='$msgto' AND connect_with='$uid' AND status='accepted')");
												$num_con=mysqli_num_rows($check_con);
												if($num_followers != 0 OR $num_con != 0){
													echo "
														<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
													";
												}
											}
										}
									echo "
												<p id='setmsgtousername'>$user_name</p>
											</div>
											<p id='lastmessage'>You recieved a file.</p>
										</a>
									";
								}else{
									echo "
										<a href='messages.php?type=direct&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
											<div class='row'>
												<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;' />
									";
										if($user_status=="active"){
											$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$msgto'");
											$row_status=mysqli_fetch_array($check_actstatus);
											$act_status=$row_status['activity_status'];
											if($act_status=="everyone"){
												echo "
													<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
												";
											}elseif($act_status=="followcon"){
												$check_follower=mysqli_query($con,"select * from following where following_user='$msgto' AND followed_user='$uid' AND status='accepted'");
												$num_followers=mysqli_num_rows($check_follower);
												$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$msgto' AND status='accepted') OR (connect_by='$msgto' AND connect_with='$uid' AND status='accepted')");
												$num_con=mysqli_num_rows($check_con);
												if($num_followers != 0 OR $num_con != 0){
													echo "
														<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
													";
												}
											}
										}
									echo "
												<p id='setmsgtousername'>$user_name</p>
											</div>
											<p id='lastmessage'>You sent a file.</p>
										</a>
									";

								}
							}
						}elseif($content_type=="shared"){
							if($sendby!="$uid"){
								echo "
									<a href='messages.php?type=direct&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;' />
								";
									if($user_status=="active"){
										$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$msgto'");
										$row_status=mysqli_fetch_array($check_actstatus);
										$act_status=$row_status['activity_status'];
										if($act_status=="everyone"){
											echo "
												<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
											";
										}elseif($act_status=="followcon"){
											$check_follower=mysqli_query($con,"select * from following where following_user='$msgto' AND followed_user='$uid' AND status='accepted'");
											$num_followers=mysqli_num_rows($check_follower);
											$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$msgto' AND status='accepted') OR (connect_by='$msgto' AND connect_with='$uid' AND status='accepted')");
											$num_con=mysqli_num_rows($check_con);
											if($num_followers != 0 OR $num_con != 0){
												echo "
													<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
												";
											}
										}
									}
								echo "
											<p id='setmsgtousername'>$user_name</p>
										</div>
										<p id='lastmessage'>You recieved a post.</p>
									</a>
								";
							}else{
								echo "
									<a href='messages.php?type=direct&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;' />
								";
									if($user_status=="active"){
										$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$msgto'");
										$row_status=mysqli_fetch_array($check_actstatus);
										$act_status=$row_status['activity_status'];
										if($act_status=="everyone"){
											echo "
												<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
											";
										}elseif($act_status=="followcon"){
											$check_follower=mysqli_query($con,"select * from following where following_user='$msgto' AND followed_user='$uid' AND status='accepted'");
											$num_followers=mysqli_num_rows($check_follower);
											$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$msgto' AND status='accepted') OR (connect_by='$msgto' AND connect_with='$uid' AND status='accepted')");
											$num_con=mysqli_num_rows($check_con);
											if($num_followers != 0 OR $num_con != 0){
												echo "
													<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
												";
											}
										}
									}
								echo "
											<p id='setmsgtousername'>$user_name</p>
										</div>
										<p id='lastmessage'>You shared a post.</p>
									</a>
								";

							}
						}elseif($content_type=="profile"){
							if($sendby!="$uid"){
								echo "
									<a href='messages.php?type=direct&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;' />
								";
									if($user_status=="active"){
										$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$msgto'");
										$row_status=mysqli_fetch_array($check_actstatus);
										$act_status=$row_status['activity_status'];
										if($act_status=="everyone"){
											echo "
												<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
											";
										}elseif($act_status=="followcon"){
											$check_follower=mysqli_query($con,"select * from following where following_user='$msgto' AND followed_user='$uid' AND status='accepted'");
											$num_followers=mysqli_num_rows($check_follower);
											$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$msgto' AND status='accepted') OR (connect_by='$msgto' AND connect_with='$uid' AND status='accepted')");
											$num_con=mysqli_num_rows($check_con);
											if($num_followers != 0 OR $num_con != 0){
												echo "
													<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
												";
											}
										}
									}
								echo "
											<p id='setmsgtousername'>$user_name</p>
										</div>
										<p id='lastmessage'>You recieved a profile.</p>
									</a>
								";
							}else{
								echo "
									<a href='messages.php?type=direct&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;' />
								";
									if($user_status=="active"){
										$check_actstatus=mysqli_query($con,"select activity_status from privacy_settings where user_id='$msgto'");
										$row_status=mysqli_fetch_array($check_actstatus);
										$act_status=$row_status['activity_status'];
										if($act_status=="everyone"){
											echo "
												<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
											";
										}elseif($act_status=="followcon"){
											$check_follower=mysqli_query($con,"select * from following where following_user='$msgto' AND followed_user='$uid' AND status='accepted'");
											$num_followers=mysqli_num_rows($check_follower);
											$check_con=mysqli_query($con,"select * from connections where (connect_by='$uid' AND connect_with='$msgto' AND status='accepted') OR (connect_by='$msgto' AND connect_with='$uid' AND status='accepted')");
											$num_con=mysqli_num_rows($check_con);
											if($num_followers != 0 OR $num_con != 0){
												echo "
													<i class='fa fa-circle' aria-hidden='true' id='activedot'></i>
												";
											}
										}
									}
								echo "
											<p id='setmsgtousername'>$user_name</p>
										</div>
										<p id='lastmessage'>You shared a profile.</p>
									</a>
								";

							}
						}
					}
				}elseif($msgto_type=="group"){
					$select_details="select * from groups where grp_id='$msgto'";
					$run_details=mysqli_query($con,$select_details);
					$row_details=mysqli_fetch_array($run_details);
					$prf_picture=$row_details['group_pic'];
					$user_name=$row_details['grp_name'];
					
					$userid=$row_details['grp_id'];
					$select_lastmsg=mysqli_query($con,"select * from messages where receiver_id='$msgto' ORDER BY sent_date DESC LIMIT 1");
					$num_lastmsg=mysqli_num_rows($select_lastmsg);
					$row_lastmsg=mysqli_fetch_array($select_lastmsg);
					$msg=$row_lastmsg['msg_content'];
					$sendby=$row_lastmsg['sender_userid'];
					$content_type=$row_lastmsg['content_type'];
					$select_username=mysqli_query($con,"select user_name from users where user_id='$sendby'");
					$row_username=mysqli_fetch_array($select_username);
					$senderusername=$row_username['user_name'];
					$file=$row_lastmsg['uploaded_file'];
					
					if($content_type=="self"){
						if($file=="none"){
							if($sendby!="$uid"){
								echo "
									<a href='messages.php?type=group&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;padding:3px;' />
											<p id='setmsgtousername'>$user_name</p>
										</div>
								";
								if(strlen($msg)>50){
									$msg=substr($msg,0,50);
									echo "
										<p id='lastmessage'>$senderusername : $msg...</p>
									";
								}else{
									echo "
										<p id='lastmessage'>$senderusername : $msg</p>
									";
								}
								echo "
									</a>
								";
							}else{
								echo "
									<a href='messages.php?type=group&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;padding:3px;' />
											<p id='setmsgtousername'>$user_name</p>
										</div>
								";
								if(strlen($msg)>50){
									$msg=substr($msg,0,50);
									echo "
										<p id='lastmessage'>You : $msg...</p>
									";
								}else{
									echo "
										<p id='lastmessage'>You : $msg</p>
									";
								}
								echo "
									</a>
								";

							}
						}else{
							if($sendby!="$uid"){
								echo "
									<a href='messages.php?type=group&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;padding:3px;' />
											<p id='setmsgtousername'>$user_name</p>
										</div>
								";
								if($num_lastmsg!=0){
								echo "
										<p id='lastmessage'>$senderusername : sent a file.</p>
									</a>
								";
								}
							}else{
								echo "
									<a href='messages.php?type=group&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;padding:3px;' />
											<p id='setmsgtousername'>$user_name</p>
										</div>
										<p id='lastmessage'>You sent a file.</p>
									</a>
								";
							}
						}
					}elseif($content_type=="shared"){
						if($sendby!="$uid"){
								echo "
									<a href='messages.php?type=group&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;padding:3px;' />
											<p id='setmsgtousername'>$user_name</p>
										</div>
								";
								if($num_lastmsg!=0){
								echo "
										<p id='lastmessage'>$senderusername : shared a post.</p>
									</a>
								";
								}
							}else{
								echo "
									<a href='messages.php?type=group&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;padding:3px;' />
											<p id='setmsgtousername'>$user_name</p>
										</div>
										<p id='lastmessage'>You shared a post.</p>
									</a>
								";
							}
					}elseif($content_type=="profile"){
						if($sendby!="$uid"){
								echo "
									<a href='messages.php?type=group&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;padding:3px;' />
											<p id='setmsgtousername'>$user_name</p>
										</div>
								";
								if($num_lastmsg!=0){
								echo "
										<p id='lastmessage'>$senderusername : shared a profile.</p>
									</a>
								";
								}
							}else{
								echo "
									<a href='messages.php?type=group&user_id=$userid' class='btn setmsgtouser' id='setmsgto$msgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
										<div class='row'>
											<img src='$prf_picture' id='setmsgtoprfpic' style='float:left;padding:3px;' />
											<p id='setmsgtousername'>$user_name</p>
										</div>
										<p id='lastmessage'>You shared a profile.</p>
									</a>
								";
							}
					}
				}
			}
		}
		if($count_msgto == 0){
			echo "
				<div class='row' style='margin-top:30%;'>
					<div class='col-sm-2'>
					</div>
					<div class='col-sm-8'>
						<i class='fa fa-paper-plane-o' aria-hidden='true' style='font-size:5em;border:solid 4px #9d9e9d;padding:30px;border-radius:50%;margin-left:25%;color:#9d9e9d'></i>
						<p style='margin-top:5%;font-size:1.2em;color:#9d9e9d;'>Choose a friend from your following and connections to send a message.</p>
						<i class='fa fa-hand-o-down' aria-hidden='true' style='float:right;font-size:2.5em;margin-top:15%;color:#9d9e9d;'></i>
					</div>
					<div class='col-sm-2'>
					</div>
				</div>
			";
		}
	}
}

//showing group members
class groupMembers{
	function showGroupMembers(){
		global $con;
		$sessionuser=$_SESSION['uid'];
		$grpid=htmlentities(mysqli_real_escape_string($con,$_POST['group_id']));
		$check_admin=mysqli_query($con,"select admin from group_members where grp_member='$sessionuser' AND grp_id='$grpid'");
		$row_admin=mysqli_fetch_array($check_admin);
		$admin=$row_admin['admin'];
		$selectcreated_by=mysqli_query($con,"select created_by from groups where grp_id='$grpid'");
		$row_createdby=mysqli_fetch_array($selectcreated_by);
		$createdby=$row_createdby['created_by'];
		$select_grpmem=mysqli_query($con,"select * from group_members where grp_id='$grpid'");
		while($row_grpmem=mysqli_fetch_array($select_grpmem)){
			$grp_member=$row_grpmem['grp_member'];
			$useradmin=$row_grpmem['admin'];
			$select_users=mysqli_query($con,"select * from users where user_id='$grp_member'");
			$row_user=mysqli_fetch_array($select_users);
			$user_name=$row_user['user_name'];
			$prf_pic=$row_user['profile_pic'];
			if(str_word_count($user_name)>=2){
				$username=explode(" ",$user_name,3);
				$user_name=$username[0]." ".$username[1];
			}
			
			$check_follow=mysqli_query($con,"select * from following where following_user='$sessionuser' AND followed_user='$grp_member'");
			$num_following=mysqli_num_rows($check_follow);
			
			echo "
				<a href='profile.php?user_id=$grp_member' class='btn setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
					<div class='row'>
						<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;padding:3px;' />
						<p id='setmsgtousername' style='margin-top:10px;'>$user_name</p>
					</div>
				";
				if($useradmin=="Yes"){
					echo "
						
							<span id='lastmessage' style='color:#34baeb;'>admin</span>
					";
				}
				echo "
				</a>
				<span class='dropdown'>
				<li id='verticalopt' style='margin-top:-12%;cursor:pointer;' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
						glyphicon-option-vertical'></i></li>
						<ul class='dropdown-menu pull-left' id='grpinfodrpdwn' style='margin-left:-200px;'>
			";
					if($grp_member != $sessionuser){
						echo "
							<li><a href='#'>Report</a></li>  
						";
					}
					if($grp_member != $createdby){
						if($admin == "Yes" and ($grp_member != $sessionuser)){
							echo "
								<li><a class='removefromgrp' grpid='$grpid' grpmember='$grp_member' style='cursor:pointer;'>Remove user</a></li>  
							";
						}
						if(($admin == "Yes") and ($useradmin=="No")  and ($grp_member != $sessionuser)){
							echo "
									<li><a class='makeadmin' grpid='$grpid' grpmember='$grp_member' style='cursor:pointer;'>Make as Admin</a></li>  
								";
						}
						if(($admin == "Yes") and ($useradmin=="Yes") and ($grp_member != $sessionuser)){
							echo "
									<li><a class='removeadmin' grpid='$grpid' grpmember='$grp_member' style='cursor:pointer;'>Remove as Admin</a></li>  
								";
						}
					}
					echo "
							<li><a href='#'>Share</a></li>											
						</ul>
				</span>
			";
				if($sessionuser != $grp_member){
					if($num_following == 0){
						echo "
							<button id='grpuserfollowbtn' name='grpuserfollowbtn' class='btn btn-info btn-md grpuserfollowbtn' style='margin-left:-30%;margin-top:3.5%;position:absolute;width:105px;' user_id='$grp_member'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
							</i></button>
						"; 
					}elseif($num_following != 0){
						$row_following=mysqli_fetch_array($check_follow);
						$status=$row_following['status'];
						if($status == "requested"){
							echo "
								<button id='grpuserfollowingbtn' name='grpuserfollowingbtn' class='btn btn-default btn-md grpuserfollowingbtn' style='margin-left:-30%;margin-top:3.5%;position:absolute;width:105px;' user_id='$grp_member'><span id='follow'>requested</span></button>
							"; 
						}elseif($status=="accepted"){
							echo "
								<button id='grpuserfollowingbtn' name='grpuserfollowingbtn' class='btn btn-default btn-md grpuserfollowingbtn' style='margin-left:-30%;margin-top:3.5%;position:absolute;width:105px;' user_id='$grp_member'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button>
							"; 
						}
					}
				}
			echo "
				<br>
			";
		}
	}
}
?>
<script type="text/javascript">
//follow user
$('.grpuserfollowbtn').click(function(){
	var followby=<?php echo json_encode($_SESSION['uid']); ?>;
	var followto=$(this).attr('user_id');
	$.ajax({
		url:'functions/operations.php',
		data:'insertfollow=1&followby='+followby+'&followto='+followto,
		type:'post',
		success:function(res){
			showGroupMembers();
		}
	});
	return;
});
//unfollow with following btn
$('.grpuserfollowingbtn').click(function(){
	var followby=<?php echo json_encode($_SESSION['uid']); ?>;
	var followto=$(this).attr('user_id');
	$.ajax({
		url:'functions/operations.php',
		data:'unfollowuser=1&followby='+followby+'&followto='+followto,
		type:'post',
		success:function(res){
			showGroupMembers();
		}
	});
	return;
});

//make the group as admin
$(".makeadmin").click(function(){
	var grpmember=$(this).attr("grpmember");
	var grpid=$(this).attr("grpid");
	var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
	$.ajax({
		url:'functions/operations.php',
		data:'makegrpadmin=1&grpmember='+grpmember+'&sessionuser='+sessionuser+'&grpid='+grpid,
		type:'post',
		success:function(res){
			showGroupMembers();
		}
	});
	return;
});

//remove the group as admin
$(".removeadmin").click(function(){
	var grpmember=$(this).attr("grpmember");
	var grpid=$(this).attr("grpid");
	var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
	$.ajax({
		url:'functions/operations.php',
		data:'removegrpadmin=1&grpmember='+grpmember+'&sessionuser='+sessionuser+'&grpid='+grpid,
		type:'post',
		success:function(res){
			showGroupMembers();
		}
	});
	return;
});

//remove a user from the group
$(".removefromgrp").click(function(){
	var grpmember=$(this).attr("grpmember");
	var grpid=$(this).attr("grpid");
	var sessionuser=<?php echo json_encode($_SESSION['uid']); ?>;
	$.ajax({
		url:'functions/operations.php',
		data:'removefromgrp=1&grpmember='+grpmember+'&sessionuser='+sessionuser+'&grpid='+grpid,
		type:'post',
		success:function(res){
			showGroupMembers();
		}
	});
	return;
});
</script>
<?php
//displaying the posts on the home page
class HomeUpdates{
	function displayUpdates(){
		global $con;
		$sessionuserid = $_POST['user_id'];
		global $prf_picc;
		//getting posted user data
		
		$select_post="select * from user_posts where user_id='$sessionuserid' OR user_id in (select followed_user from following where following_user='$sessionuserid') OR user_id in (select page_id from pages where created_by_id='$sessionuserid') ORDER BY uploaded_date DESC";
		$run_post=mysqli_query($con,$select_post);
		$num_post=mysqli_num_rows($run_post);
		if($num_post!=0){
		while($row_post=mysqli_fetch_array($run_post)){
			//getting post data
			$user_id=$row_post['user_id'];
			$post_date=$row_post['uploaded_date'];
			$post_img=$row_post['uploaded_file'];
			$img_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
			$file_id=$row_post['file_id'];
			$likes=$row_post['likes'];
			$user_type=$row_post['user_type'];
			$post_privacy=$row_post['post_privacy'];
			if($post_privacy=="Public" or $post_privacy=="Followers" or $user_id==$sessionuserid){
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
													<li><a style='cursor:pointer;' postid='$file_id' onclick='reportPost($file_id)'>Report post</a></li>  
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
										<video class='video' src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' controls></video>
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
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
							";
							?>
										<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
										<video class='video' src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' controls></video>
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
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
						";
						?>		<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
										<video class='video' src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' controls></video>
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
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
							";
							?>		
									<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
							<?php } 
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
										<video class='video' src='uploadedFiles/$post_img' id='post_img' width='100%' height='100%' controls></video>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
		}
		}else{
			echo"
				<span><i class='fa fa-paper-plane-o' aria-hidden='true' style='margin-left:45%;margin-top:10%;border:solid 2px #b3b5b4;color:#b3b5b4;padding:10px;font-size:2em;border-radius:50%;'></i></span>
				<h4 style='text-align:center;font-family:bold;color:#b3b5b4;margin-top:5%;'>Start by post something!</h4>
			";
		}
	}
}
?>
<script type="text/javascript">
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

$(".psharepost").click(function(){
	var postid=$(this).attr("postid");
	document.getElementById("fwrdpostid").value=postid;
	$('#sharepagePostAsMsg').modal({
		show: true
	});
	$.ajax({
		url:'functions/functions.php',
		data:'showusrstoshr=1',
		type:'post',
		async:true,
		success:function(res){
			$(".showuserstoshare1").html(res);
		}
	});
	return false;
});

//saved posts share
$(".ssharepost").click(function(){
	var postid=$(this).attr("postid");
	var userid=$(this).attr("userid");
	document.getElementById("fwrdpostid").value=postid;
	$('#sharesavedPostAsMsg').modal({
		show: true
	});
	$.ajax({
		url:'functions/functions.php',
		data:'showusrstoshr=1',
		type:'post',
		async:false,
		success:function(res){
			$(".showuserstoshare2").html(res);
		}
	});
	return false;
});

//closing the modal of sharing post as a msg
	$('#sharePostAsMsg').on('hidden.bs.modal', function () {
		fun();
	});
	$('#sharepagePostAsMsg').on('hidden.bs.modal', function () {
		pageposts();
		pagecomment_details();
	});
	$('#sharesavedPostAsMsg').on('hidden.bs.modal', function () {
		savedposts();
	});

//deleting the posted post
function deletepost(postid){
	$.ajax({
		url:'functions/functions.php',
		data:'deletepost=1&post_id='+postid,
		type:'post',
		async: true,
		success:function(){
			fun();
			savedposts();
		}
	});
}

//deleting the posted page post
function deletepagepost(postid){
	$.ajax({
		url:'functions/functions.php',
		data:'deletepost=1&post_id='+postid,
		type:'post',
		async: true,
		success:function(){
			pageposts();
		}
	});
}

//Report a Post
function reportPost(postid){
	$('#ReportPostModal').modal({
		show: true
	});
}
</script>
<?php
//deleting a post
if(isset($_POST['deletepost'])){
	global $con;
	$postid=htmlentities(mysqli_real_escape_string($con,$_POST['post_id']));
	$delete_post=mysqli_query($con,"delete from user_postcontent where file_id='$postid'");
	if($delete_post){
		mysqli_query($con,"delete from user_posts where file_id='$postid'");
	}
}

//forwarding a post by showing users
if(isset($_POST['showusrstoshr'])){	
	global $con;
	$sessionuser=$_SESSION['uid'];
	$sel_shareusers=mysqli_query($con,"select followed_user from following where following_user='$sessionuser' AND user_type='user' AND status='accepted'");
	$sel_sharegrps=mysqli_query($con,"select grp_id from group_members where grp_member='$sessionuser'");
	//groups
	while($row_grp=mysqli_fetch_array($sel_sharegrps)){
		$grpid=$row_grp['grp_id'];
		$select_grpdetails=mysqli_query($con,"select * from groups where grp_id='$grpid'");
		$row_details=mysqli_fetch_array($select_grpdetails);
		$username=$row_details['grp_name'];
		if(str_word_count($username)>=2){
			$username=explode(" ",$username,3);
			$username=$username[0]." ".$username[1];
		}
		$prf_pic=$row_details['group_pic'];
		echo "
			<a class='btn setmsgtouser' id='setmsgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
				<div class='row'>
					<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;' />
					<p id='setmsgtousername' style='margin-top:10px;'>$username</p>
					<input type='button' class='btn btn-info fwrdmember sharememberbtn' name='sharemember' id='fwrdmember$grpid' style='width:60px;display:;' userid='$grpid' value='send' />
					<input type='button' class='btn btn-default fwrdmember' name='sharemember' id='frwded$grpid' style='width:60px;display:none;' userid='$grpid' value='sent' />
				</div>
			</a>
		";
	}
	//following users
	while($row_user=mysqli_fetch_array($sel_shareusers)){
		$userid=$row_user['followed_user'];
		$select_userdetails=mysqli_query($con,"select * from users where user_id='$userid'");
		$row_details=mysqli_fetch_array($select_userdetails);
		$username=$row_details['user_name'];
		if(str_word_count($username)>=2){
			$username=explode(" ",$username,3);
			$username=$username[0]." ".$username[1];
		}
		$prf_pic=$row_details['profile_pic'];
		echo "
			<a class='btn setmsgtouser' id='setmsgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
				<div class='row'>
					<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;' />
					<p id='setmsgtousername' style='margin-top:10px;'>$username</p>
					<input type='button' class='btn btn-info fwrdmember sharememberbtn' name='sharemember' id='fwrdmember$userid' style='width:60px;display:;' userid='$userid' value='send' />
					<input type='button' class='btn btn-default fwrdmember' name='sharemember' id='frwded$userid' style='width:60px;display:none;' userid='$userid' value='sent' />
				</div>
			</a>
		";
	}
}


//forwarding a profile by showing users
if(isset($_POST['showusrstoshrprf'])){	
	global $con;
	$sessionuser=$_SESSION['uid'];
	$sel_shareusers=mysqli_query($con,"select followed_user from following where following_user='$sessionuser' AND user_type='user' AND status='accepted'");
	$sel_sharegrps=mysqli_query($con,"select grp_id from group_members where grp_member='$sessionuser'");
	//groups
	while($row_grp=mysqli_fetch_array($sel_sharegrps)){
		$grpid=$row_grp['grp_id'];
		$select_grpdetails=mysqli_query($con,"select * from groups where grp_id='$grpid'");
		$row_details=mysqli_fetch_array($select_grpdetails);
		$username=$row_details['grp_name'];
		if(str_word_count($username)>=2){
			$username=explode(" ",$username,3);
			$username=$username[0]." ".$username[1];
		}
		$prf_pic=$row_details['group_pic'];
		echo "
			<a class='btn setmsgtouser' id='setmsgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
				<div class='row'>
					<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;' />
					<p id='setmsgtousername' style='margin-top:10px;'>$username</p>
					<input type='button' class='btn btn-info fwrdprofile fwrdprofilebtn' name='fwrdprofile' id='fwrdprofile$grpid' style='width:60px;display:;' userid='$grpid' value='send' />
					<input type='button' class='btn btn-default fwrdprofile' name='fwrdprofile' id='frwdedprofile$grpid' style='width:60px;display:none;' userid='$grpid' value='sent' />
				</div>
			</a>
		";
	}
	//following users
	while($row_user=mysqli_fetch_array($sel_shareusers)){
		$userid=$row_user['followed_user'];
		$select_userdetails=mysqli_query($con,"select * from users where user_id='$userid'");
		$row_details=mysqli_fetch_array($select_userdetails);
		$username=$row_details['user_name'];
		if(str_word_count($username)>=2){
			$username=explode(" ",$username,3);
			$username=$username[0]." ".$username[1];
		}
		$prf_pic=$row_details['profile_pic'];
		echo "
			<a class='btn setmsgtouser' id='setmsgto' name='setmsgtouser' style='width:100%;border-bottom:1px solid #e6e6e6;margin-bottom:3px;'>
				<div class='row'>
					<img src='$prf_pic' id='setmsgtoprfpic' style='float:left;' />
					<p id='setmsgtousername' style='margin-top:10px;'>$username</p>
					<input type='button' class='btn btn-info fwrdprofile fwrdprofilebtn' name='fwrdprofile' id='fwrdprofile$userid' style='width:60px;display:;' userid='$userid' value='send' />
					<input type='button' class='btn btn-default fwrdprofile' name='fwrdprofile' id='frwdedprofile$userid' style='width:60px;display:none;' userid='$userid' value='sent' />
				</div>
			</a>
		";
	}
}
?>
<!--  Reporting a Post Modal -->
<div class="modal fade" id="ReportPostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="height:5%;width:20%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="panel-title"><p><strong>Report a post!</strong></p></div>	
			</div>
			<div class="modal-body" style="overflow-y:auto;">
				<label style="width:100%;margin-top:-20px;">Why are you reporting this post?</label><br>
				<ul class="reportlinks">
				<li>It`s Spam</li><br>
				<li>It`s not appropriate</li><br>
				<li>others<li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!--  Sharing Post As Message Modal -->
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

<!--  Sharing Page Post As Message MOdal -->
<div class="modal fade" id="sharepagePostAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
							<div class="showuserstoshare1"></div>
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

<!--  Sharing Saved Post As Message MOdal -->
<div class="modal fade" id="sharesavedPostAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
							<div class="showuserstoshare2"></div>
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
	
	//sharing a profile and this happens when the send button is clicked
	$('.fwrdprofilebtn').click(function(){
		var userid=$(this).attr("userid");
		var shareduserid=document.getElementById("fwrduserid").value;
		var user_type=document.getElementById("fwrdusertype").value;
		//alert(postid+" "+userid);
		$.ajax({
			url:'functions/functions.php',
			data:'shareprof=1&userid='+userid+'&shareduserid='+shareduserid+'&user_type='+user_type,
			type:'post',
			async:false,
			success:function(){
				var chgbtn=document.getElementById("fwrdprofile"+userid);
				chgbtn.setAttribute('style','display:none;');
				var shwbtn=document.getElementById("frwdedprofile"+userid);
				shwbtn.setAttribute('style','display:visible;');
			}
		});
		return false;
	});
</script>
<?php
//when the share button is clicked the below process will happen
if(isset($_POST['sharepost'])){
	global $con;
	$sessionuser=$_SESSION['uid'];
	$postid=htmlentities(mysqli_real_escape_string($con,$_POST['postid']));
	$userid=htmlentities(mysqli_real_escape_string($con,$_POST['userid']));
	
	$check_asgrp=mysqli_query($con,"select * from groups where grp_id='$userid'");
	$num_grps=mysqli_num_rows($check_asgrp);
	if($num_grps==0){
		$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$sessionuser','$userid','$postid','none','none','direct','shared',NOW())";
		$run_msgcnt=mysqli_query($con,$insert_msg);
		
		$check_msgtolist="select * from messageto where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
		$run_msgtolist=mysqli_query($con,$check_msgtolist);
		$num_msgtolist=mysqli_num_rows($run_msgtolist);
		if($num_msgtolist == 0){
			$insert_msgtolist="insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$sessionuser','$userid','none','direct',NOW())";
			$run_msglist=mysqli_query($con,$insert_msgtolist);
		}else{
			$row_msgtolist=mysqli_fetch_array($run_msgtolist);
			$deleted_by=$row_msgtolist['deleted_by'];
			if($deleted_by != "$sessionuser" and $deleted_by != "$userid"){
				$update_time="update messageto set updated_time=NOW() where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
			}else{
				$update_time="update messageto set deleted_by='none',updated_time=NOW() where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
			}
			$run_update=mysqli_query($con,$update_time);
		}
		
		
		/*if($run_msgcnt){
			echo "<script>window.open('messages.php?type=direct&user_id=$user_to_id','_self');</script>";
		}*/
	}else{
		$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$sessionuser','$userid','$postid','none','none','group','shared',NOW())";
			$run_msgcnt=mysqli_query($con,$insert_msg);
			
			$select_grpmembers=mysqli_query($con,"select grp_member from group_members where grp_id='$userid'");
			while($row_mem=mysqli_fetch_array($select_grpmembers)){
				$user=$row_mem['grp_member'];
				$update_time="update messageto set updated_time=NOW() where message_from='$user' AND message_to='$userid' AND msgto_type='group'";
				$run_update=mysqli_query($con,$update_time);
			}
	}
}

//when the profile share button is clicked the below process will happen
if(isset($_POST['shareprof'])){
	global $con;
	$sessionuser=$_SESSION['uid'];
	$userid=htmlentities(mysqli_real_escape_string($con,$_POST['userid']));
	$shareduserid=htmlentities(mysqli_real_escape_string($con,$_POST['shareduserid']));
	$user_type=htmlentities(mysqli_real_escape_string($con,$_POST['user_type']));
	
	$check_asgrp=mysqli_query($con,"select * from groups where grp_id='$userid'");
	$num_grps=mysqli_num_rows($check_asgrp);
	if($num_grps==0){
		$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$sessionuser','$userid','$shareduserid','$user_type','none','direct','profile',NOW())";
		$run_msgcnt=mysqli_query($con,$insert_msg);
		
		$check_msgtolist="select * from messageto where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
		$run_msgtolist=mysqli_query($con,$check_msgtolist);
		$num_msgtolist=mysqli_num_rows($run_msgtolist);
		if($num_msgtolist == 0){
			$insert_msgtolist="insert into messageto(message_from,message_to,deleted_by,msgto_type,updated_time) values('$sessionuser','$userid','none','direct',NOW())";
			$run_msglist=mysqli_query($con,$insert_msgtolist);
		}else{
			$row_msgtolist=mysqli_fetch_array($run_msgtolist);
			$deleted_by=$row_msgtolist['deleted_by'];
			if($deleted_by != "$sessionuser" and $deleted_by != "$userid"){
				$update_time="update messageto set updated_time=NOW() where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
			}else{
				$update_time="update messageto set deleted_by='none',updated_time=NOW() where (message_from='$sessionuser' AND message_to='$userid') OR (message_from='$userid' AND message_to='$sessionuser')";
			}
			$run_update=mysqli_query($con,$update_time);
		}
		
		
		/*if($run_msgcnt){
			echo "<script>window.open('messages.php?type=direct&user_id=$user_to_id','_self');</script>";
		}*/
	}else{
		$insert_msg="insert into messages(sender_userid,receiver_id,msg_content,uploaded_file,deleted_by,msg_type,content_type,sent_date) values('$sessionuser','$userid','$shareduserid','$user_type','none','group','profile',NOW())";
			$run_msgcnt=mysqli_query($con,$insert_msg);
			
			$select_grpmembers=mysqli_query($con,"select grp_member from group_members where grp_id='$userid'");
			while($row_mem=mysqli_fetch_array($select_grpmembers)){
				$user=$row_mem['grp_member'];
				$update_time="update messageto set updated_time=NOW() where message_from='$user' AND message_to='$userid' AND msgto_type='group'";
				$run_update=mysqli_query($con,$update_time);
			}
	}
}

//displaying the own posts on the profile page
class OwnPosts{
	function displayOwnPosts(){
		global $con;
		$sessionuserid = $_POST['user_id'];
		$userid= $_POST['userid'];
		global $prf_picc;
		//getting posted user data
		
		$select_post="select * from user_posts where user_id='$userid' ORDER BY uploaded_date DESC";
		$run_post=mysqli_query($con,$select_post);
		$num_ownposts=mysqli_num_rows($run_post);
		if($num_ownposts != 0){
			while($row_post=mysqli_fetch_array($run_post)){
				//getting post data
				$post_date=$row_post['uploaded_date'];
				$post_img=$row_post['uploaded_file'];
				$img_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
				$file_id=$row_post['file_id'];
				$likes=$row_post['likes'];
				$user_id=$row_post['user_id'];
				$post_privacy=$row_post['post_privacy'];
			
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
					if(($numfws != 0) OR ($numcons != 0) OR ($user_id == $sessionuserid)){
						$cmntcond="Yes";
					}else{
						$cmntcond="No";
					}
				}elseif($cmntsel=="fwfgcon"){
					$checkfws=mysqli_query($con,"select * from following where (following_user='$user_id' AND followed_user='$sessionuserid') OR (following_user='$sessionuserid' AND followed_user='$user_id')");
					$numfws=mysqli_num_rows($checkfws);
					$checkcons=mysqli_query($con,"select * from connections where (connect_by='$sessionuserid' AND connect_with='$user_id') OR (connect_by='$user_id' AND connect_with='$sessionuserid')");
					$numcons=mysqli_num_rows($checkcons);
					if(($numfws != 0) OR ($numcons != 0) OR ($user_id == $sessionuserid)){
						$cmntcond="Yes";
					}else{
						$cmntcond="No";
					}
				}else{
					$cmntcond="Yes";
				}
				if($post_privacy=="Public" or $post_privacy=="Followers" or $user_id==$sessionuserid){	
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
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
							";
							?>
										<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
						";
						?>		<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
							";
							?>		
									<?php
										$run_num_cmnts=mysqli_query($con,"select * from comments where post_id='$file_id'");
									//checking commenting condition
									if($cmntcond=="Yes"){
									?>
									<div id="cmntsdiv">
									<?php 
									if(mysqli_num_rows($run_num_cmnts)>1){
									?>
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control cmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="cmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" cmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="cmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
									</div>
								</div>
							<?php } 
								echo "
								</div>
							</div>
						";
					} 
				}				
			}
		}else{
			echo "
				<div class='panel panel-deafult' style='border:1px solid #e6e6e6'>
					<div class='panel-body'>
						<div class='alert alert-danger' id='intimation' style='text-align:center;font-family:bold;font-size:1.5em;'>No posts yet.</div>
					</div>
				</div>
			";
		}
	}
}
?>
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
									fun();
									savedposts();
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
									fun();
									savedposts();
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
									fun();
									savedposts();
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
									fun();
									savedposts();
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
									fun();
									savedposts();
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
									fun();
									savedposts();
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
									fun();
									savedposts();
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
									fun();
									savedposts();
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
									fun();
									savedposts();
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
									fun();
									savedposts();
								}
							});
							return false;
						});
					
					
					//page likes , comments, etc...
					// when the user clicks on like
					
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
									 pageposts();
								}
							});
							return false;
						});
						
						// when the user clicks on unlike
						
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
									pageposts();
								}
							});	
							return false;
						});
						
						//saving the post
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
									pageposts();
								}
							});	
							return false;
						});
						
						//unsaving the post
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
									pageposts();
								}
							});	
							return false;
						});
						 
						 
						//commenting insertion
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
									pageposts();
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
									pageposts();
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
									pageposts();
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
									pageposts();
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
									pageposts();
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
									pageposts();
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
			$numiter=0;
			while($row=mysqli_fetch_array($result)){
				$user=$row['user_id'];
				//checking comment restriction
				$check_cmntrestict=mysqli_query($con,"select * from cmnt_restrictions where restricted_by='$fileuserid' AND restricted_to='$user'");
				$num_cmntrestict=mysqli_num_rows($check_cmntrestict);
				if(($num_cmntrestict==0 OR $sessionuserid==$user) AND $numiter==0){
					 $numiter=1;
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
			$numiter=0;
			while($row=mysqli_fetch_array($result)){
				$user=$row['user_id'];
				//checking comment restriction
				$check_cmntrestict=mysqli_query($con,"select * from cmnt_restrictions where restricted_by='$fileuserid' AND restricted_to='$user'");
				$num_cmntrestict=mysqli_num_rows($check_cmntrestict);
				if(($num_cmntrestict==0 OR $sessionuserid==$user) AND $numiter==0){
					$numiter=1;
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
		$result=mysqli_query($con,"select * from comments where post_id='$cmnt_id' ORDER BY commented_date DESC LIMIT 1");
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

    return "just now";

  } else if ($minutes <= 60){

    if ($minutes == 1){

      return "1 min ago";

    } else {

      return "$minutes min ago";

    }

  } else if ($hours <= 24){

    if ($hours == 1){

      return "1h ago";

    } else {

      return "$hours h ago";

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
?>
<script type="text/javascript">
//sharing searched page as message
$(".shsearchedpgprf").click(function(){
	var userid=$(this).attr("userid");
	document.getElementById("fwrduserid").value=userid;
	document.getElementById("fwrdusertype").value="page";
	$('#shsearchedProfAsMsg').modal({
		show: true
	});
	$.ajax({
		url:'functions/functions.php',
		data:'showusrstoshrprf=1',
		type:'post',
		async:false,
		success:function(res){
			$(".showuserstoshareprf").html(res);
		}
	});
	return false;
});

//sharing searched profile as message
$(".shsearcheduserprf").click(function(){
	var userid=$(this).attr("userid");
	document.getElementById("fwrduserid").value=userid;
	document.getElementById("fwrdusertype").value="user";
	$('#shsearchedProfAsMsg').modal({
		show: true
	});
	$.ajax({
		url:'functions/functions.php',
		data:'showusrstoshrprf=1',
		type:'post',
		async:false,
		success:function(res){
			$(".showuserstoshareprf").html(res);
		}
	});
	return false;
});

//sharing suggested profile as message
function sugstduserprf(userid){
	document.getElementById("fwrduserid").value=userid;
	document.getElementById("fwrdusertype").value="user";
	$('#sugstdProfAsMsg').modal({
		show: true
	});
	$.ajax({
		url:'functions/functions.php',
		data:'showusrstoshrprf=1',
		type:'post',
		async:false,
		success:function(res){
			$(".showuserstosharesugprf").html(res);
		}
	});
	return false;
}
</script>

<?php
//finding people by searching.

class findPeople{
	function displayPeople(){
		global $con;
		$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['user_id']));
		$search_input=htmlentities(mysqli_real_escape_string($con,$_POST['searchinput']));
		$filter=htmlentities(mysqli_real_escape_string($con,$_POST['filter']));
		
		if($filter=="pages"){
			if($search_input==null){
				echo "
					<script type='text/javascript'> 
						var notFound=document.getElementById('intimateLabel');
						notFound.setAttribute('style', 'display:display;');
					</script>
				";
					$rs = new recentSearches;
					$rs->showRecentSearches();
			}else{
				$select_pages = mysqli_query($con,"select * from pages where page_id='$search_input' or pagename='$search_input' or pagename like '$search_input%'
									or pagename like '%$search_input'");
				$num_pages=mysqli_num_rows($select_pages);
				if($num_pages != 0){
					while($row_page=mysqli_fetch_array($select_pages)){
						$pagename=$row_page['pagename'];
						$pagepic=$row_page['pagepic'];
						$page_id=$row_page['page_id'];
						$page_created_by=$row_page['created_by_id'];
						
						$uid=$_SESSION['uid'];
						$check_following="select * from following where following_user='$uid' and followed_user='$page_id'";
						$run_check=mysqli_query($con,$check_following);
						$row_check=mysqli_fetch_array($run_check);
						$follow_status=$row_check['status'];
						$num=mysqli_num_rows($run_check);
						
						echo "
							<div class='panel panel-default' id='paneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='functions/recent_searches.php?page_id=$page_id'><img src='images/prfpics/$pagepic' id='prf_pic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
						";
											if($page_created_by !=$uid){
												if($num>0 and $follow_status=="accepted"){
													echo "
														<button id='pagefollowingbtn' name='followingbtn' class='btn btn-default btn-md pagefollowingbtn' style='display:;float:right;margin-right:0%;margin-top:2.2%;right:-10%;position:absolute;width:105px;' page_id='$page_id'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button>
													"; 
												}elseif($num>0 and $follow_status=="requested"){
													echo "
														<button id='pagerequestedbtn' name='requestedbtn' class='btn btn-default btn-md pagerequestedbtn' style='display:;float:right;margin-right:0%;margin-top:2.2%;right:-11%;position:absolute;width:105px;' page_id='$page_id'><span id='follow'>requested</span></button>
													"; 
												}else{
													echo "
														<button id='pagefollowbtn' name='followbtn' class='btn btn-info btn-md pagefollowbtn' style='display:;float:right;margin-right:0%;margin-top:2.2%;right:-11%;position:absolute;width:105px;' page_id='$page_id'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
														</i></button>
													"; 
												}
											}
						echo "
											<a href='functions/recent_searches.php?page_id=$page_id' id='page_labelname'><p style='margin-left:-10px;margin-top:10px;'>$pagename</p></a>
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='pageverticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropmenu'>
													<li><a href='functions/recent_searches.php?page_id=$page_id''>view profile</a></li>  
													<li><a class='shsearchedpgprf' userid='$page_id' style='cursor:pointer;'>Share</a></li>																				
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
					}
				}else{
						echo "
							<script type='text/javascript'> 
								var notFound=document.getElementById('userNotFound');
								notFound.setAttribute('style', 'display:display;');
							</script>
						";
					}
			}
		}else{
			$select_userdata=mysqli_query($con,"select * from users where user_id='$sessionuser'");
			$row_userdata=mysqli_fetch_array($select_userdata);
			$city=$row_userdata['user_city'];
			$state=$row_userdata['user_state'];
			$pincode=$row_userdata['user_pincode'];
			$user_designation=$row_userdata['user_designation'];
			
			if($search_input==null){
				echo "
					<script type='text/javascript'> 
						var notFound=document.getElementById('intimateLabel');
						notFound.setAttribute('style', 'display:display;');
					</script>
				";
					$rs = new recentSearches;
					$rs->showRecentSearches();
			}else{
				if($filter=="top"){
					$select_search="select * from users where (user_id='$search_input' or user_name='$search_input' or user_name like '$search_input%'
								or user_name like '%$search_input') AND user_id not in (select blocked_by from blocked_users where blocked_user='$sessionuser')";
				}elseif($filter=="students"){
					$select_search="select * from users where (user_id='$search_input' or user_name='$search_input' or user_name like '$search_input%'
								or user_name like '%$search_input') AND user_designation='student' AND user_id not in (select blocked_by from blocked_users where blocked_user='$sessionuser')";
				}elseif($filter=="orgs"){
					$select_search="select * from users where (user_id='$search_input' or user_name='$search_input' or user_name like '$search_input%'
								or user_name like '%$search_input') AND user_designation='org' AND user_id not in (select blocked_by from blocked_users where blocked_user='$sessionuser')";
				}elseif($filter=="all"){
					$select_search="select * from users where (user_id='$search_input' or user_name='$search_input' or user_name like '$search_input%'
								or user_name like '%$search_input') AND user_id not in (select blocked_by from blocked_users where blocked_user='$sessionuser')";
				}elseif($filter=="others"){
					$select_search="select * from users where (user_id='$search_input' or user_name='$search_input' or user_name like '$search_input%'
								or user_name like '%$search_input') AND user_designation='indv' AND user_id not in (select blocked_by from blocked_users where blocked_user='$sessionuser')";
				}
			
			
				$run_search=mysqli_query($con,$select_search);
				$num_rows=mysqli_num_rows($run_search);
				if($num_rows>=1){
					while($row_search=mysqli_fetch_array($run_search)){
						$prfpic=$row_search['profile_pic'];
						$user_name=$row_search['user_name'];
						$user_id=$row_search['user_id'];
						
						$checkblocked=mysqli_query($con,"select * from blocked_users where blocked_by='$sessionuser' AND blocked_user='$user_id'");
						$numblocked=mysqli_num_rows($checkblocked);
						//$tagline=$row_search['tagline'];
						$user_designation=$row_search['user_designation'];
						
						$uid=$_SESSION['uid'];
						$check_following="select * from following where following_user='$uid' and followed_user='$user_id'";
						$run_check=mysqli_query($con,$check_following);
						$row_check=mysqli_fetch_array($run_check);
						$follow_status=$row_check['status'];
						$num=mysqli_num_rows($run_check);
						
						$check_connections="select * from connections where (connect_by='$uid' and connect_with='$user_id') OR (connect_by='$user_id' and connect_with='$uid')";
						$run_cnctcheck=mysqli_query($con,$check_connections);
						$row_cnctcheck=mysqli_fetch_array($run_cnctcheck);
						$connect_status=$row_cnctcheck['status'];
						$num3=mysqli_num_rows($run_cnctcheck);
						
						
						if($user_designation=="student"){
							$select_desg="select * from students where user_id='$user_id'";
							$run_desg=mysqli_query($con,$select_desg);
							$row_desg=mysqli_fetch_array($run_desg);
							$clg_name=$row_desg['college_name'];
							
							echo "
								<div class='panel panel-default' id='paneltab'>
									<div class='panel-body'>
										<div class='row'>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
											</div>
											<div class='col-sm-8' id='postid'>
							";
												if($user_id !=$uid){
													if($numblocked == 0){
														if($num>0 and $follow_status=="accepted"){
															echo "
																<button id='followingbtn' name='followingbtn' class='btn btn-default btn-md followingbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
															"; 
														}elseif($num>0 and $follow_status=="requested"){
															echo "
																<button id='requestedbtn' name='requestedbtn' class='btn btn-default btn-md requestedbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>requested</span></button><br>
															"; 
														}else{
															echo "
																<button id='followbtn' name='followbtn' class='btn btn-info btn-md followbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
																</i></button><br>
															"; 
														}
													}else{
														echo "
															<button id='unblockbtn' name='unblockbtn' class='btn btn-info btn-md unblockbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>unblock</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
															</i></button><br>
														"; 
													}
												}
							echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									";
									if($numblocked == 0){
										echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
												<p id='designation'><i>$user_designation at $clg_name</i></p>
											";
									}
								echo  "
											</div>
											<div class='col-sm-2'>
												<div class='dropdown'>
													<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
													glyphicon-option-vertical'></i></li>
													<ul class='dropdown-menu' id='dropmenu'>
														<li><a href='functions/recent_searches.php?user_id=$user_id''>view profile</a></li>  
														<li><a class='shsearcheduserprf' style='cursor:pointer;' userid='$user_id'>Share</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							";
						}elseif($user_designation=="org"){
							$select_desg="select * from organizations where user_id='$user_id'";
							$run_desg=mysqli_query($con,$select_desg);
							$row_desg=mysqli_fetch_array($run_desg);
							$org_name=$row_desg['org_name'];
							$org_add=$row_desg['org_add'];
							
							echo "
								<div class='panel panel-default' id='paneltab'>
									<div class='panel-body'>
										<div class='row'>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
											</div>
											<div class='col-sm-8' id='postid'>
							";
											
											if($user_id != $uid){
												if($numblocked == 0){
													if($num3>0 and $connect_status=="accepted"){
														echo "
															<button id='connectedbtn' name='connectedbtn' class='btn btn-default btn-md connectedbtn' style='display:;float:right;margin-right:1%;margin-top:2.5%;right:-13%;position:absolute;width:110px;' user_id='$user_id'>connected &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
														"; 
													}elseif($num3>0 and $connect_status=="requested"){
														echo "
															<button id='cnctrequestedbtn' name='cnctrequestedbtn' class='btn btn-default btn-md cnctrequestedbtn' style='display:;float:right;margin-right:1%;margin-top:2.5%;right:-13%;position:absolute;width:105px;' user_id='$user_id'>connect rqstd</i></button><br>
														"; 
													}else{
														echo "
															<button id='connectbtn' name='connectbtn' class='btn btn-default btn-md connectbtn' style='display:;float:right;margin-right:1%;margin-top:2.5%;right:-13%;position:absolute;width:105px;' user_id='$user_id'>connect &nbsp <i class='fa fa-plus' aria-hidden='true'></i></button><br>
														"; 
													}
												}else{
													echo "
														<button id='unblockbtn' name='unblockbtn' class='btn btn-info btn-md unblockbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>unblock</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
														</i></button><br>
													"; 
												}
											}
							echo "				
												<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									";
									if($numblocked == 0){
										echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
												<p id='designation'><i>$org_name, $org_add</i></p>
											";
									}
								echo  "
											</div>
											<div class='col-sm-2'>
												<div class='dropdown'>
													<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
													glyphicon-option-vertical'></i></li>
													<ul class='dropdown-menu pull-left' id='dropmenu'>
														<li><a href='functions/recent_searches.php?user_id=$user_id''>view profile</a></li>  
														<li><a class='shsearcheduserprf' style='cursor:pointer;' userid='$user_id'>Share</a></li>    
													</ul>
												</div>
											</div>
										</div>
									</div>	
								</div>
							";
						}elseif($user_designation=="indv"){
							$select_desg="select * from individuals where user_id='$user_id'";
							$run_desg=mysqli_query($con,$select_desg);
							$row_desg=mysqli_fetch_array($run_desg);
							$desg=$row_desg['designation'];
							$org_name=$row_desg['company_name'];
							
							echo "
								<div class='panel panel-default' id='paneltab'>
									<div class='panel-body'>
										<div class='row'>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
											</div>
											<div class='col-sm-8' id='postid'>
							";
												if($user_id !=$uid){
													if($numblocked == 0){
														if($num>0 and $follow_status=="accepted"){
															echo "
																<button id='followingbtn' name='followingbtn' class='btn btn-default btn-md followingbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
															"; 
														}elseif($num>0 and $follow_status=="requested"){
															echo "
																<button id='requestedbtn' name='requestedbtn' class='btn btn-default btn-md requestedbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>requested</span></button><br>
															"; 
														}else{
															echo "
																<button id='followbtn' name='followbtn' class='btn btn-info btn-md followbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
																</i></button><br>
															"; 
														}
													}else{
														echo "
															<button id='unblockbtn' name='unblockbtn' class='btn btn-info btn-md unblockbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>unblock</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
															</i></button><br>
														"; 
													}	
												}
							echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									";
									if($numblocked == 0){
										echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
												<p id='designation'><i>$desg at $org_name</i></p>
											";
									}
								echo  "
											</div>
											<div class='col-sm-2'>
												<div class='dropdown'>
													<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
													glyphicon-option-vertical'></i></li>
													<ul class='dropdown-menu pull-left' id='dropmenu'>
														<li><a href='functions/recent_searches.php?user_id=$user_id''>view profile</a></li>  
														<li><a class='shsearcheduserprf' style='cursor:pointer;' userid='$user_id'>Share</a></li>    
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							";
						}
					}
				}else{
					echo "
						<script type='text/javascript'> 
							var notFound=document.getElementById('userNotFound');
							notFound.setAttribute('style', 'display:display;');
						</script>
					";
				}
			}
		}
	}
} //find people class end
?>

<script type="text/javascript">
//follow, following, connecting operations on findPeople page
$(".pagefollowbtn").click(function(){
	var followby=<?php echo json_encode($_SESSION['uid']); ?>;
	var followto=$(this).attr('page_id');
		$.ajax({
			url:'functions/operations.php',
			data:'insertpagefollow=1&followby='+followby+'&followto='+followto,
			type:'post',
			success:function(res){
				searchResults();
			}
		});
		return;
});
//unfollow page when following btn is clicked
$(".pagefollowingbtn").click(function(){
	var followby=<?php echo json_encode($_SESSION['uid']); ?>;
	var followto=$(this).attr('page_id');
		$.ajax({
			url:'functions/operations.php',
			data:'unfollowpage=1&followby='+followby+'&followto='+followto,
			type:'post',
			success:function(res){
				searchResults();
			}
		});
		return;
});
//unfollow page when requested btn is clicked
$(".pagerequestedbtn").click(function(){
	var followby=<?php echo json_encode($_SESSION['uid']); ?>;
	var followto=$(this).attr('page_id');
	$.ajax({
		url:'functions/operations.php',
		data:'unfollowpage=1&followby='+followby+'&followto='+followto,
		type:'post',
		success:function(res){
			searchResults();
		}
	});
	return;
});

//follow user
$('.followbtn').click(function(){
	var followby=<?php echo json_encode($_SESSION['uid']); ?>;
	var followto=$(this).attr('user_id');
	$.ajax({
		url:'functions/operations.php',
		data:'insertfollow=1&followby='+followby+'&followto='+followto,
		type:'post',
		success:function(res){
			searchResults();
		}
	});
	return;
});
//unfollow with following btn
$('.followingbtn').click(function(){
	var followby=<?php echo json_encode($_SESSION['uid']); ?>;
	var followto=$(this).attr('user_id');
	$.ajax({
		url:'functions/operations.php',
		data:'unfollowuser=1&followby='+followby+'&followto='+followto,
		type:'post',
		success:function(res){
			searchResults();
		}
	});
	return;
});
//unfollow with requested btn
$('.requestedbtn').click(function(){
	var followby=<?php echo json_encode($_SESSION['uid']); ?>;
	var followto=$(this).attr('user_id');
	$.ajax({
		url:'functions/operations.php',
		data:'unfollowuser=1&followby='+followby+'&followto='+followto,
		type:'post',
		success:function(res){
			searchResults();
		}
	});
	return;
});

//connect to an org
$('.connectbtn').click(function(){
	var connectby=<?php echo json_encode($_SESSION['uid']); ?>;
	var connectto=$(this).attr('user_id');
	document.getElementById("mconnectby").value=connectby;
	document.getElementById("mconnectwith").value=connectto;
	$('#mshowconnectidmodal').modal({
		show: true
	});
});
//disconnect from an org
$('.connectedbtn').click(function(){
	var connectby=<?php echo json_encode($_SESSION['uid']); ?>;
	var connectto=$(this).attr('user_id');
	$.ajax({
		url:'functions/operations.php',
		data:'disconnectuser=1&connectby='+connectby+'&connectto='+connectto,
		type:'post',
		success:function(res){
			searchResults();
		}
	});
	return;
});
//disconnect from an org
$('.cnctrequestedbtn').click(function(){
	var connectby=<?php echo json_encode($_SESSION['uid']); ?>;
	var connectto=$(this).attr('user_id');
	$.ajax({
		url:'functions/operations.php',
		data:'disconnectuser=1&connectby='+connectby+'&connectto='+connectto,
		type:'post',
		success:function(res){
			searchResults();
		}
	});
	return;
});

//unblock a user
$('.unblockbtn').click(function(){
	var blockedby=<?php echo json_encode($_SESSION['uid']); ?>;
	var blockeduser=$(this).attr('user_id');
	$("#gotoprofilebtn").attr("href", "profile.php?user_id="+blockeduser);
	$('#funblockUserModal').modal({
		show: true
	});
});

//submmitng the details need for a connection with org
$('.msubconnectid').click(function(){
	var connectby=document.getElementById("mconnectby").value;
	var connectwith=document.getElementById("mconnectwith").value;
	var idtoconnect=document.getElementById("idtoconnect").value;
	var connecttocnt=document.getElementById("connecttocnt").value;
	//alert(connectby+" "+connectwith+" "+idtoconnect+" "+connecttocnt);
	$.ajax({
		url:'functions/operations.php',
		data:'getconnected=1&connectby='+connectby+'&connectto='+connectwith+'&idtoconnect='+idtoconnect+'&connecttocnt='+connecttocnt,
		type:'post',
		success:function(res){
			//$('.showconnectidmodal').modal('hide');
			var idmdl=document.getElementById("mshowconnectidmodal");
			$('.modal-backdrop').hide();
			idmdl.setAttribute("style","display:none;");
			searchResults();
			$("#connecttocnt").val("");
			$("#idtoconnect").val("");
		}
	});
	return;
});
</script>
<!-- SHOWING Connect to id  MODAL -->
<div class="modal fade mshowconnectidmodal" id="mshowconnectidmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="panel-title"><p><strong>ID to connect</strong></p></div>	
			</div>
			<div class="modal-body">
				<div class="alert alert-warning" style="text-align:center;display:none;">ID is required</div>
				<div class="alert alert-warning" style="text-align:center;display:none;">Description is required</div>
				<input type="text" id="mconnectby" style="display:none" />
				<input type="text" id="mconnectwith" style="display:none" />
				<label>ID Proof :</label>
				<input type="text" class="form-control" id="idtoconnect" name="idtoconnect" placeholder=" Your ID number in the org" required />
				<label>Decription :</label>
				<textarea type="text" class="form-control" rows="2" id="connecttocnt" name="connecttocnt" placeholder="Describe yourself which concerns the org to accept you..." style="resize:none;" required ></textarea><br>
				<span style="color:red;font-size:0.9em;">*Your Id is something which represents you in the org.</span>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-info msubconnectid" name="msubconnectid" id="msubconnectid" style="width:130px;float:right;" value="submit"/>
				<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose' style="float:right;margin-right:2%;">Cancel</button>
			</div>
		</div>
	</div>
</div>

<!-- Unblocking The User Modal -->
<div class="modal fade funblockUserModal" id="funblockUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<br><br>
				<span style="font-size:5em;margin-left:40%;border:2px solid black;padding:30px;border-radius:130px;"><i class="fa fa-user-plus" aria-hidden="true"></i></span><br><br><br>
				<p style="padding:35px;font-family:'Merienda One',cursive;">By unblocking this user, they will be able to see your profile, posts, comments and can find you even by search.<br>
				Unblock the user from the profile.</p>
			</div>
			<div class="modal-footer">
				<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
				<a href="" class="btn btn-info" id="gotoprofilebtn" type="button" style="width:150px;">Go to profile</a>
			</div>
		</div>
	</div>
</div>
								
<?php
//Recent Searches
class recentSearches{
	function showRecentSearches(){
	?>
		<div class="col-sm-12">
		<h3 style="font-family: 'Merienda One', cursive;">Recent searches :</h3><br>
		<?php
			global $con;
			$uid=$_SESSION['uid'];
			$select_recent_user="select * from recent_searches where checked_by='$uid' ORDER BY checked_date DESC LIMIT 10";
			$run_recent_user=mysqli_query($con,$select_recent_user);
			$num_recent_searches=mysqli_num_rows($run_recent_user);
			
			if($num_recent_searches != 0){
				while($row_recent_user=mysqli_fetch_array($run_recent_user)){
					$user=$row_recent_user['checked_for'];
					$user_type=$row_recent_user['user_type'];
					if($user_type=="user"){
						$select_from_users="select * from users where user_id='$user'";
						$run_from_users=mysqli_query($con,$select_from_users);
						$row_search=mysqli_fetch_array($run_from_users);
						$prfpic=$row_search['profile_pic'];
						$user_name=$row_search['user_name'];
						$user_id=$row_search['user_id'];
						
						$checkblocked=mysqli_query($con,"select * from blocked_users where blocked_by='$uid' AND blocked_user='$user_id'");
						$numblocked=mysqli_num_rows($checkblocked);
						//$tagline=$row_search['tagline'];
						$user_designation=$row_search['user_designation'];
						
						$uid=$_SESSION['uid'];
						$check_following="select * from following where following_user='$uid' and followed_user='$user_id'";
						$run_check=mysqli_query($con,$check_following);
						$row_check=mysqli_fetch_array($run_check);
						$follow_status=$row_check['status'];
						$num=mysqli_num_rows($run_check);
						
						$check_connections="select * from connections where (connect_by='$uid' and connect_with='$user_id') OR (connect_by='$user_id' and connect_with='$uid')";
						$run_cnctcheck=mysqli_query($con,$check_connections);
						$row_cnctcheck=mysqli_fetch_array($run_cnctcheck);
						$connect_status=$row_cnctcheck['status'];
						$num3=mysqli_num_rows($run_cnctcheck);
						
						
						if($user_designation=="student"){
							$select_desg="select * from students where user_id='$user_id'";
							$run_desg=mysqli_query($con,$select_desg);
							$row_desg=mysqli_fetch_array($run_desg);
							$clg_name=$row_desg['college_name'];
							
							echo "
								<div class='panel panel-default' id='paneltab'>
									<div class='panel-body'>
										<div class='row'>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
											</div>
											<div class='col-sm-8' id='postid'>
							";
												if($user_id !=$uid){
													if($numblocked == 0){
														if($num>0 and $follow_status=="accepted"){
															echo "
																<button id='followingbtn' name='followingbtn' class='btn btn-default btn-md followingbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
															"; 
														}elseif($num>0 and $follow_status=="requested"){
															echo "
																<button id='requestedbtn' name='requestedbtn' class='btn btn-default btn-md requestedbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>requested</span></button><br>
															"; 
														}else{
															echo "
																<button id='followbtn' name='followbtn' class='btn btn-info btn-md followbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
																</i></button><br>
															"; 
														}
													}else{
														echo "
															<button id='unblockbtn' name='unblockbtn' class='btn btn-info btn-md unblockbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>unblock</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
															</i></button><br>
														"; 
													}	
												}
							echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									";
									if($numblocked == 0){
										echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
												<p id='designation'><i>$user_designation at $clg_name</i></p>
											";
									}
								echo  "
											</div>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?remove_user=$user_id&user_id=$user_id' id='removesearch'><b>X</b></a>
											</div>
										</div>
									</div>
								</div>
							";
						}elseif($user_designation=="org"){
							$select_desg="select * from organizations where user_id='$user_id'";
							$run_desg=mysqli_query($con,$select_desg);
							$row_desg=mysqli_fetch_array($run_desg);
							$org_name=$row_desg['org_name'];
							$org_add=$row_desg['org_add'];
							
							echo "
								<div class='panel panel-default' id='paneltab'>
									<div class='panel-body'>
										<div class='row'>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
											</div>
											<div class='col-sm-8' id='postid'>
							";
											
											if($user_id != $uid){
												if($numblocked == 0){
													if($num3>0 and $connect_status=="accepted"){
														echo "
															<button id='connectedbtn' name='connectedbtn' class='btn btn-default btn-md connectedbtn' style='display:;float:right;margin-right:1%;margin-top:2.5%;right:-13%;position:absolute;width:110px;' user_id='$user_id'>connected &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
														"; 
													}elseif($num3>0 and $connect_status=="requested"){
														echo "
															<button id='cnctrequestedbtn' name='cnctrequestedbtn' class='btn btn-default btn-md cnctrequestedbtn' style='display:;float:right;margin-right:1%;margin-top:2.5%;right:-13%;position:absolute;width:105px;' user_id='$user_id'>connect rqstd</i></button><br>
														"; 
													}else{
														echo "
															<button id='connectbtn' name='connectbtn' class='btn btn-default btn-md connectbtn' style='display:;float:right;margin-right:1%;margin-top:2.5%;right:-13%;position:absolute;width:105px;' user_id='$user_id'>connect &nbsp <i class='fa fa-plus' aria-hidden='true'></i></button><br>
														"; 
													}
												}else{
													echo "
														<button id='unblockbtn' name='unblockbtn' class='btn btn-info btn-md unblockbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>unblock</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
														</i></button><br>
													"; 
												}	
											}
							echo "				
												<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									";
									if($numblocked == 0){
										echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
												<p id='designation'><i>$org_name, $org_add</i></p>
										";
									}
								echo  "
											</div>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?remove_user=$user_id&user_id=$user_id' id='removesearch'><b>X</b></a>
											</div>
										</div>
									</div>	
								</div>
							";
						}elseif($user_designation=="indv"){
							$select_desg="select * from individuals where user_id='$user_id'";
							$run_desg=mysqli_query($con,$select_desg);
							$row_desg=mysqli_fetch_array($run_desg);
							$desg=$row_desg['designation'];
							$org_name=$row_desg['company_name'];
							
							echo "
								<div class='panel panel-default' id='paneltab'>
									<div class='panel-body'>
										<div class='row'>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
											</div>
											<div class='col-sm-8' id='postid'>
							";
												if($user_id !=$uid){
													if($numblocked == 0){
														if($num>0 and $follow_status=="accepted"){
															echo "
																<button id='followingbtn' name='followingbtn' class='btn btn-default btn-md followingbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
															"; 
														}elseif($num>0 and $follow_status=="requested"){
															echo "
																<button id='requestedbtn' name='requestedbtn' class='btn btn-default btn-md requestedbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>requested</span></button><br>
															"; 
														}else{
															echo "
																<button id='followbtn' name='followbtn' class='btn btn-info btn-md followbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
																</i></button><br>
															"; 
														}
													}else{
														echo "
															<button id='unblockbtn' name='unblockbtn' class='btn btn-info btn-md unblockbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>unblock</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
															</i></button><br>
														"; 
													}	
												}
							echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
									";
									if($numblocked == 0){
										echo "
												<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
												<p id='designation'><i>$desg at $org_name</i></p>
										";
									}
								echo  "
											</div>
											<div class='col-sm-2'>
												<a href='functions/recent_searches.php?remove_user=$user_id&user_id=$user_id' id='removesearch'><b>X</b></a>
											</div>
										</div>
									</div>
								</div>
							";
						}
					}else{
						//selecting page data
						$select_pagedata=mysqli_query($con,"select * from pages where page_id='$user'");
						$row_page=mysqli_fetch_array($select_pagedata);
						$pagename=$row_page['pagename'];
						$pagepic=$row_page['pagepic'];
						$page_id=$row_page['page_id'];
						$page_created_by=$row_page['created_by_id'];
						
						$uid=$_SESSION['uid'];
						$check_following="select * from following where following_user='$uid' and followed_user='$page_id'";
						$run_check=mysqli_query($con,$check_following);
						$row_check=mysqli_fetch_array($run_check);
						$follow_status=$row_check['status'];
						$num=mysqli_num_rows($run_check);
						
						echo "
							<div class='panel panel-default' id='paneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='functions/recent_searches.php?page_id=$page_id'><img src='images/prfpics/$pagepic' id='prf_pic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
						";
											if($page_created_by !=$uid){
												if($num>0 and $follow_status=="accepted"){
													echo "
														<button id='pagefollowingbtn' name='pagefollowingbtn' class='btn btn-default btn-md pagefollowingbtn' style='display:;float:right;margin-right:0%;margin-top:2.2%;right:-10%;position:absolute;width:105px;' page_id='$page_id'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button>
													"; 
												}elseif($num>0 and $follow_status=="requested"){
													echo "
														<button id='pagerequestedbtn' name='pagerequestedbtn' class='btn btn-default btn-md pagerequestedbtn' style='display:;float:right;margin-right:0%;margin-top:2.2%;right:-11%;position:absolute;width:105px;' page_id='$page_id'><span id='follow'>requested</span></button>
													"; 
												}else{
													echo "
														<button id='pagefollowbtn' name='pagefollowbtn' class='btn btn-info btn-md pagefollowbtn' style='display:;float:right;margin-right:0%;margin-top:2.2%;right:-11%;position:absolute;width:105px;' page_id='$page_id'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
														</i></button>
													"; 
												}
											}
						echo "
											<a href='functions/recent_searches.php?page_id=$page_id' id='page_labelname'><p style='margin-left:-10px;margin-top:10px;'>$pagename</p></a>
										</div>
										<div class='col-sm-2'>
											<a href='functions/recent_searches.php?remove_user=$page_id&user_id=$page_id' id='removesearch'><b>X</b></a>
										</div>
									</div>
								</div>
							</div>
						";
					}
				}
			}else{
				echo "
					<div class='alert alert-info' style='text-align:center;'>
						<strong>No recent searches!</strong>
					</div>
				";
			}
			
			
			
		?>
	</div>
	<?php
	}
}

// showing details of user on user profile 
class UserProfileDetails{
	function showUserDetails(){
		global $con;
		global $user_id;
		$select_user="select * from users where user_id='$user_id'";
		$run_user=mysqli_query($con,$select_user);
		$row_user=mysqli_fetch_array($run_user);
		$prfpic=$row_user['profile_pic'];
		$user_name=$row_user['user_name'];
		$user_email=$row_user['user_email'];
		$user_phno=$row_user['user_phno'];
		$user_id=$row_user['user_id'];
		$user_designation=$row_user['user_designation'];
		$reg_date=$row_user['reg_date'];
		
		//check mobile privacy
		$select_mobpriv=mysqli_query($con,"select mobile_privacy from security_settings where user_id='$user_id'");
		$row_mobpriv=mysqli_fetch_array($select_mobpriv);
		$mobpriv=$row_mobpriv['mobile_privacy'];
		
		if($user_designation=="student"){
			$select_desg="select * from students where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$clg_name=$row_desg['college_name'];
			$s_yr=$row_desg['start_year'];
			$e_yr=$row_desg['end_year'];
			if($e_yr>date("Y")){
				$e_yr="currently";
			}
			$course=$row_desg['course'];
			$take_edu="select * from education where user_id='$user_id'";
			$run_edu=mysqli_query($con,$take_edu);
			$num_edu=mysqli_num_rows($run_edu);
			
			echo "
				<div class='panel panel-default' id='profemailtab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Contact</strong></p>
						<strong style='font-size:1.5em;margin-left:20px;margin-top:-15px;'><img src='https://img.icons8.com/color/50/000000/filled-sent.png' width='35px' height='35px'> Email : </strong><span style='font-size:1.2em;color:#0664c2;'> $user_email</span>
				";
					if($user_phno != 0 and $mobpriv=="Yes"){
						echo "
							<br><br>
							<strong style='font-size:1.5em;margin-left:20px;margin-top:-15px;'><img src='https://img.icons8.com/carbon-copy/100/000000/phone.png' width='35px' height='35px'> Ph no : </strong><span style='font-size:1.2em;color:#0664c2;'> $user_phno</span>
						";
					}
			echo "
					</div>	
				</div>
			
				<div class='panel panel-default' id='profedutab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Education</strong></p>
						 <b style='font-family:bold;font-size:1.5em;margin-left:20px;margin-top:-5px;'><img src='https://img.icons8.com/color/48/000000/graduation-cap.png' width='35px' height='35px'> <i style='color:green;text-decoration:underline''>Studing at :</i></b><br>
						 <span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
						<span style='font-size:1.2em;'><span style='margin-left:10%;'>From </span><strong> $s_yr </strong><span> to </span><strong> $e_yr</strong></span><br>
						<span style='font-size:1.2em;'><span style='margin-left:10%;'>Course : </span><strong> $course</strong></span>
						<hr>
					
			";
			if($num_edu != 0){ 
				echo "
					<b style='font-family:bold;font-size:1.5em;margin-left:20px;margin-top:-5px;'><img src='https://img.icons8.com/color/48/000000/graduation-cap.png' width='35px' height='35px'> <i style='color:green;text-decoration:underline''>Studied at :</i>  </b><br>
				";
				while($row_edu=mysqli_fetch_array($run_edu)){
					$clg_name=$row_edu['institute_name'];
					$s_year=$row_edu['s_year'];
					$e_year=$row_edu['e_year'];
					$d=date("Y");
					if($d>$e_year){
						echo "
							<span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
							<span style='font-size:1.2em;margin-left:10%;'>From <strong> $s_year </strong> to <strong> $e_year</strong></span><br>
							
						";
					}else{
						echo "
							<span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
							<span style='font-size:1.2em;margin-left:10%;'>From <strong> $s_year </strong> to <strong> currently</strong></span><br>
							
						";
					}
				}
			}
			echo "
				</div>	
				</div>
			";
		}elseif($user_designation=="org"){
			$select_desg="select * from organizations where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$org_name=$row_desg['org_name'];
			$org_add=$row_desg['org_add'];
			$org_url=$row_desg['web_url'];
			echo "
				<div class='panel panel-default' id='profemailtab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Contact</strong></p>
						<strong style='font-size:1.5em;margin-left:20px;margin-top:-15px;'><i class='fa fa-envelope-o' aria-hidden='true'></i> Email : </strong><span style='font-size:1.2em;color:#0664c2;'> $user_email</span><br><br>
						<strong style='font-size:1.2em;margin-left:20px;margin-top:px;'><i class='fa fa-link' aria-hidden='true'></i> Visit at : </strong><span style='color:#0664c2'> <a href='$org_url'>$org_url </a></span>
					</div>	
				</div>
			";
		}elseif($user_designation=="indv"){
			$select_desg="select * from individuals where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$desg=$row_desg['designation'];
			$org_name=$row_desg['company_name'];
			
			echo "
				<div class='panel panel-default' id='profemailtab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Contact</strong></p>
						<strong style='font-size:1.5em;margin-left:20px;margin-top:-15px;'><i class='fa fa-envelope-o' aria-hidden='true'></i> Email : </strong><span style='font-size:1.2em;color:#0664c2;'> $user_email</span>
					</div>	
				</div>
			";
			
			//showing education details
			$select_edu=mysqli_query($con,"select * from education where user_id='$user_id'");
			$num_education=mysqli_num_rows($select_edu);
			if($num_education != 0){
				echo "
					<div class='panel panel-default' id='profedutab'>
						<div class='panel-body'>
							<p><strong style='font-family:bold;font-size:2em;'>Education</strong></p>
							<b style='font-family:bold;font-size:1.5em;margin-left:20px;margin-top:-5px;'><img src='https://img.icons8.com/color/48/000000/graduation-cap.png' width='35px' height='35px'> <i style='color:green;text-decoration:underline''>Studied at :</i>  </b><br>
				";
				while($row_edu=mysqli_fetch_array($select_edu)){
					$clg_name=$row_edu['institute_name'];
					$s_year=$row_edu['s_year'];
					$e_year=$row_edu['e_year'];
					$d=date("Y");
					if($d>$e_year){
						echo "
							<span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
							<span style='font-size:1.2em;margin-left:10%;'>From <strong> $s_year </strong> to <strong> $e_year</strong></span><br>
							
						";
					}else{
						echo "
							<span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
							<span style='font-size:1.2em;margin-left:10%;'>From <strong> $s_year </strong> to <strong> currently</strong></span><br>
						";
					}
				}
				echo "
					</div>
				</div>
				";
			}
		}
		if($_SESSION['uid']==$user_id){
			echo "<script>$('#edit2').css({'display':'display'});</script>";
		}else{
			echo "<script>$('#edit2').css({'display':'none'});</script>";
		}
		
		//work Experience
			$select_work=mysqli_query($con,"select * from work_experience where user_id='$user_id'");
			$num_works=mysqli_num_rows($select_work);
			if($user_designation=="student"){
				if($num_works != 0){
					echo "
						<div class='panel panel-default' id='profskillstab'>
							<div class='panel-body'>
								<p><strong style='font-family:bold;font-size:2em;'>Work Experience</strong></p>
								<i style='font-size:1.5em;float:left;margin-left:20px;' class='fa fa-suitcase' aria-hidden=true'></i>
							<label style='font-family:bold;font-size:1.5em;margin-top:-8px;color:green;text-decoration:underline'> <i>Worked at :</i></label>
					";
					while($row_work=mysqli_fetch_array($select_work)){
						$company_name=$row_work['company_name']; 
						$user_desig=$row_work['user_designation'];
						$company_add=$row_work['company_add'];
						echo "
							<span style='font-size:1.3em;margin-left:10%;font-family:bold;'>-  $user_desig
							at $company_name, &nbsp$company_add.</span><br>
						";
					}
					echo "
						</div>
					</div>
					";
				}
			}elseif($user_designation=="indv"){
				$select_pwork=mysqli_query($con,"select * from individuals where user_id='$user_id'");
				$row_pwork=mysqli_fetch_array($select_pwork);
				$company_name=$row_pwork['company_name']; 
				$user_desig=$row_pwork['designation'];
				$company_add=$row_pwork['company_add'];
				echo "
					<div class='panel panel-default' id='profskillstab'>
						<div class='panel-body'>
							<p><strong style='font-family:bold;font-size:2em;'>Work Experience</strong></p>
							<i style='font-size:1.5em;float:left;margin-left:20px;' class='fa fa-suitcase' aria-hidden=true'></i>
							<label style='font-family:bold;font-size:1.5em;margin-top:-8px;color:green;text-decoration:underline'> <i>Working at :</i></label>
							<span style='font-size:1.3em;margin-left:10%;font-family:bold;'>-  $user_desig at $company_name, &nbsp$company_add.</span><br><br>
				";
				if($num_works != 0){
					echo "
						<i style='font-size:1.5em;float:left;margin-left:20px;' class='fa fa-suitcase' aria-hidden=true'></i>
						<label style='font-family:bold;font-size:1.5em;margin-top:-8px;color:green;text-decoration:underline'> <i>Worked at :</i></label>
					";
					while($row_work=mysqli_fetch_array($select_work)){
						$company_name=$row_work['company_name']; 
						$user_desig=$row_work['user_designation'];
						$company_add=$row_work['company_add'];
						echo "
							<span style='font-size:1.3em;margin-left:10%;font-family:bold;'>-  $user_desig
							at $company_name, &nbsp$company_add.</span><br>
						";
					}
				}
				echo "
					</div>
				</div>
				";
			}
		
		//showing achievements
		$select_achieves="select * from achievements where user_id='$user_id' ORDER BY updated_date ASC";
		$run_achieves=mysqli_query($con,$select_achieves);
		$num_rows=mysqli_num_rows($run_achieves);
		if($num_rows!=0){
			echo "
				<div class='panel panel-default' id='achieveheading'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Achievements</strong></p>

			";
			while($row_achieves=mysqli_fetch_array($run_achieves)){
				$title=$row_achieves['achieve_title'];
				$achieve_content=$row_achieves['achieve_content'];
				$updated_date=$row_achieves['updated_date'];
				if($_SESSION['uid']==$user_id){
					$achieve_id=$row_achieves['achieve_id'];
					echo "
						<div class='panel panel-default' id='profachivestab'>
							<div class='panel-body'>
								<h3 id='achieve_title'><strong style='font-family:bold;'>$title</strong></h3>
								<li id='verify'><a href='verifications.php?achieve_id=$achieve_id' class='btn btn-info' name='verifyachieve'> Request Verification</a></li>
								<li id='remove'><a href='functions/delete_posts.php?achieve_id=$achieve_id' name='remove'>remove</a></li><br>
								<p id='achievecnt'>$achieve_content</p>
							</div>	
						</div>
					";
				}else{
					echo "
						<div class='panel panel-default' id='profachivestab'>
							<div class='panel-body'>
								<h3 id='achieve_title'><strong>$title</strong></h3><br>
								<p id='achievecnt'>$achieve_content</p>
							</div>	
						</div>
					";
				}
			}
			echo "
				</div>	
			</div>
			";
		}
		echo "<br>";
		
		//showing skills
		if($user_designation!="org"){
			$select_skill="select * from skills where user_id='$user_id'";
			$run_skill=mysqli_query($con,$select_skill);
			$num_rows=mysqli_num_rows($run_skill);
			if($num_rows!=0){
				echo "
					<div class='panel panel-default' id='profskillstab'>
						<div class='panel-body'>
							<p><strong style='font-family:bold;font-size:2em;'>Skills</strong></p>
				";
					while($row_skill=mysqli_fetch_array($run_skill)){
						$skill_name=$row_skill['skill_name'];
						$skill_id=$row_skill['skill_id'];
						if($_SESSION['uid']==$_GET['user_id']){
							echo "
								<hr>
								<div class='row'>
									<div class='col-sm-10'>
										<p id='skillname'># $skill_name</p>
									</div>
									<div class='col-sm-2'>
										<strong id='removeskill'><a href='functions/delete_posts.php?skill_id=$skill_id'><b aria-hidden='true'>X</b></a></strong>
									</div>
								</div>
							";
						}else{
							echo "
							<hr>
							<div class='row'>
								<p id='skillname'># $skill_name</p>
							</div>	
							
						";
						}
					}	
					echo "
							</div>	
						</div>
					";
			}
		}
		
		if($user_designation=="org"){
			echo "
				<div class='panel panel-default' id='profskillstab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Events</strong></p>
			";
				$eventsObj = new Events();
				$eventsObj->showEvents();
			echo "
					</div>
				</div>
			";
		}
		
		//showing the registration date. 
		$input = strtotime($reg_date); 
		$date = date('d M, Y ', $input); 
		echo "
			<div class='panel panel-default' id='regdatetab'>
				<div class='panel-body'>
					<h3 style='text-align:center;font-family:Merienda One, cursive;'><strong>Joined On</strong></h3><br>
					<h4 style='font-size:2em;text-align:center;margin-top:-20px;color:yellow'><i class='fa fa-star' aria-hidden='true' ></i><h4><br>
					<h4 style='font-size:1.2em;text-align:center;margin-top:-20px;font-family:Merienda One, cursive;'> $date</h4>
				</div>	
			</div>
		";
	}
} //recentSearches class end

//finding users to restrict from commenting
class findUsersToRestrict{
	function showUsersToRestrict(){
		global $con;
		$sessionuser=htmlentities(mysqli_real_escape_string($con,$_POST['uid']));
		$search_input=htmlentities(mysqli_real_escape_string($con,$_POST['searchinput']));
		
			
		$select_userdata=mysqli_query($con,"select * from users where user_id='$sessionuser'");
		$row_userdata=mysqli_fetch_array($select_userdata);
		$city=$row_userdata['user_city'];
		$state=$row_userdata['user_state'];
		$pincode=$row_userdata['user_pincode'];
		$user_designation=$row_userdata['user_designation'];
			
		if($search_input!=null){
			$select_search="select * from users where (user_id='$search_input' or user_name='$search_input' or user_name like '$search_input%' or user_name like '%$search_input') AND user_id not in (select blocked_by from blocked_users where blocked_user='$sessionuser') AND user_id not in (select restricted_to from cmnt_restrictions where restricted_by='$sessionuser')";
		
			$run_search=mysqli_query($con,$select_search);
			$num_rows=mysqli_num_rows($run_search);
			if($num_rows>=1){
				while($row_search=mysqli_fetch_array($run_search)){
					$prfpic=$row_search['profile_pic'];
					$user_name=$row_search['user_name'];
					$user_id=$row_search['user_id'];
					$uid=$_SESSION['uid'];
					
					$checkblocked=mysqli_query($con,"select * from cmnt_restrictions where restricted_by='$sessionuser' AND restricted_to='$user_id'");
					$numblocked=mysqli_num_rows($checkblocked);
					//$tagline=$row_search['tagline'];
					$user_designation=$row_search['user_designation'];
					
					if($user_designation=="student"){
						$select_desg="select * from students where user_id='$user_id'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$clg_name=$row_desg['college_name'];
						
						echo "
							<div class='panel panel-default' id='paneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
						";
											if($user_id !=$uid){
												if($numblocked == 0){
													echo "
														<button id='restrictbtn' name='restrictbtn' class='btn btn-info btn-md restrictbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>Restrict</span> &nbsp <i class='fa fa-plus' aria-hidden='true'></i></button><br>
													"; 
												}else{
													echo "
														<button id='removerestrictbtn' name='removerestrictbtn' class='btn btn-default btn-md removerestrictbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>Remove</span></button><br>
													"; 
												}
												
											}
						echo "
											<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
								
											<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p id='designation'><i>$user_designation at $clg_name</i></p>
										
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropmenu'>
													<li><a href='functions/recent_searches.php?user_id=$user_id''>view profile</a></li>  
													<li><a href='#'>Share</a></li>																				
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
					}elseif($user_designation=="org"){
						$select_desg="select * from organizations where user_id='$user_id'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$org_name=$row_desg['org_name'];
						$org_add=$row_desg['org_add'];
						
						echo "
							<div class='panel panel-default' id='paneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
						";
										
										if($user_id !=$uid){
											if($numblocked == 0){
												echo "
													<button id='restrictbtn' name='restrictbtn' class='btn btn-info btn-md restrictbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>Restrict</span> &nbsp <i class='fa fa-plus' aria-hidden='true'></i></button><br>
												"; 
											}else{
												echo "
													<button id='removerestrictbtn' name='removerestrictbtn' class='btn btn-default btn-md removerestrictbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>Remove</span></button><br>
												"; 
											}
											
										}
						echo "				
											<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
								
											<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p id='designation'><i>$org_name, $org_add</i></p>
										
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left' id='dropmenu'>
													<li><a href='functions/recent_searches.php?user_id=$user_id''>view profile</a></li>  
													<li><a href='#'>Share</a></li>    
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
						";
					}elseif($user_designation=="indv"){
						$select_desg="select * from individuals where user_id='$user_id'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$desg=$row_desg['designation'];
						$org_name=$row_desg['company_name'];
						
						echo "
							<div class='panel panel-default' id='paneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2'>
											<a href='functions/recent_searches.php?user_id=$user_id'><img src='$prfpic' id='prf_pic1' style='margin-top:18%;' ></a>
										</div>
										<div class='col-sm-8' id='postid'>
						";
										if($user_id !=$uid){
											if($numblocked == 0){
												echo "
													<button id='restrictbtn' name='restrictbtn' class='btn btn-info btn-md restrictbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>Restrict</span> &nbsp <i class='fa fa-plus' aria-hidden='true'></i></button><br>
												"; 
											}else{
												echo "
													<button id='removerestrictbtn' name='removerestrictbtn' class='btn btn-default btn-md removerestrictbtn' style='display:;float:right;margin-right:0%;margin-top:2.5%;right:-11%;position:absolute;width:105px;' user_id='$user_id'><span id='follow'>Remove</span></button><br>
												"; 
											}
											
										}
						echo "
											<a href='functions/recent_searches.php?user_id=$user_id' id='post_labelname'><p>$user_name</p></a>
											<a href='functions/recent_searches.php?user_id=$user_id' id='userid'><p>@$user_id</p></a>
											<p id='designation'><i>$desg at $org_name</i></p>
										
										</div>
										<div class='col-sm-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu pull-left' id='dropmenu'>
													<li><a href='functions/recent_searches.php?user_id=$user_id''>view profile</a></li>  
													<li><a href='#'>Share</a></li>    
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
					}
				}
			}else{
				echo "
					<script type='text/javascript'> 
						var notFound=document.getElementById('userNotFound');
						notFound.setAttribute('style', 'display:display;');
					</script>
				";
			}
		}
		
	}
} //finding users for cmnt restriction class ends
?>
<script type="text/javascript">
//user restriction from commenting
$(".restrictbtn").click(function(){
	var restrictby=<?php echo json_encode($_SESSION['uid']); ?>;
	var restrictto=$(this).attr('user_id');
	$.ajax({
		url:'functions/operations.php',
		data:'cmntrestrictuser=1&restrictby='+restrictby+'&restrictto='+restrictto,
		type:'post',
		success:function(res){
			window.open('cmntrestrictions.php','_self');
		}
	});
	return;
});
</script>
<?php
// showing 'About' on the profile page!
class AboutOnProfile extends HomeUpdates{
	function showAbt(){
		global $con;
		global $user_id;
		$select_user="select * from users where user_id='$user_id'";
		$run_user=mysqli_query($con,$select_user);
		$row_user=mysqli_fetch_array($run_user);
		$prfpic=$row_user['profile_pic'];
		$user_name=$row_user['user_name'];
		$user_email=$row_user['user_email'];
		$user_phno=$row_user['user_phno'];
		$user_id=$row_user['user_id'];
		$user_designation=$row_user['user_designation'];
		$reg_date=$row_user['reg_date'];
		
		//check mobile privacy
		$select_mobpriv=mysqli_query($con,"select mobile_privacy from security_settings where user_id='$user_id'");
		$row_mobpriv=mysqli_fetch_array($select_mobpriv);
		$mobpriv=$row_mobpriv['mobile_privacy'];
	
		if($user_designation=="student"){
			$select_desg="select * from students where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$clg_name=$row_desg['college_name'];
			$s_yr=$row_desg['start_year'];
			$e_yr=$row_desg['end_year'];
			if($e_yr>date("Y")){
				$e_yr="currently";
			}
			$course=$row_desg['course'];
			$take_edu="select * from education where user_id='$user_id'";
			$run_edu=mysqli_query($con,$take_edu);
			$num_edu=mysqli_num_rows($run_edu);
			
			echo "
				<div class='panel panel-default' id='profemailtab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Contact</strong></p>
						<strong style='font-size:1.5em;margin-left:20px;margin-top:-15px;'><img src='https://img.icons8.com/color/50/000000/filled-sent.png' width='35px' height='35px'> Email : </strong><span style='font-size:1.2em;color:#0664c2;'> $user_email</span>
			";
				if($user_phno != 0 and $mobpriv=="Yes"){
					echo "
						<br><br>
						<strong style='font-size:1.5em;margin-left:20px;margin-top:-15px;'><img src='https://img.icons8.com/carbon-copy/100/000000/phone.png' width='35px' height='35px'> Ph no : </strong><span style='font-size:1.2em;color:#0664c2;'> $user_phno</span>
					";
				}
			echo "
					</div>	
				</div>
				
				<div class='panel panel-default' id='profedutab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Education</strong></p><li id='edit2'><a href='edit_profile.php?user_id=$user_id'>edit</a></li>
						 <b style='font-family:bold;font-size:1.5em;margin-left:20px;margin-top:-5px;'><img src='https://img.icons8.com/color/48/000000/graduation-cap.png' width='35px' height='35px'> <i style='color:green;text-decoration:underline''>Studing at :</i></b><br>
						 <span style='font-size:1.5em;font-family:bold;margin-left:10%;'><b>$clg_name</b></span><br>
						<span style='font-size:1.2em;'><span style='margin-left:10%;'>From </span><strong> $s_yr </strong><span> to </span><strong> $e_yr</strong></span><br>
						<span style='font-size:1.2em;'><span style='margin-left:10%;'>Course : </span><strong> $course</strong></span>
						<hr>
					
			";
			if($num_edu != 0){ 
				echo "
					<b style='font-family:bold;font-size:1.5em;margin-left:20px;margin-top:-5px;'><img src='https://img.icons8.com/color/48/000000/graduation-cap.png' width='35px' height='35px'> <i style='color:green;text-decoration:underline''>Studied at :</i></b><br>
				";
				while($row_edu=mysqli_fetch_array($run_edu)){
					$clg_name=$row_edu['institute_name'];
					$s_year=$row_edu['s_year'];
					$e_year=$row_edu['e_year'];
					$d=date("Y");
					if($d>$e_year){
						echo "
							<span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
							<span style='font-size:1.2em;margin-left:10%;'>From <strong> $s_year </strong> to <strong> $e_year</strong></span><br>
							
						";
					}else{
						echo "
							<span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
							<span style='font-size:1.2em;margin-left:10%;'>From <strong> $s_year </strong> to <strong> currently</strong></span><br>
						";
					}
				}
			}
			echo "
				</div>	
				</div>
			";
		}elseif($user_designation=="org"){
			$select_desg="select * from organizations where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$org_name=$row_desg['org_name'];
			$org_add=$row_desg['org_add'];
			$org_url=$row_desg['web_url'];
			echo "
				<div class='panel panel-default' id='profemailtab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Contact</strong></p>
						<strong style='font-size:1.5em;margin-left:20px;margin-top:-15px;'><i class='fa fa-envelope-o' aria-hidden='true'></i> Email : </strong><span style='font-size:1.2em;color:#0664c2;'> $user_email</span><br><br>
						<strong style='font-size:1.2em;margin-left:20px;margin-top:px;'><i class='fa fa-link' aria-hidden='true'></i> Visit at : </strong><span style='color:#0664c2'> <a href='$org_url'>$org_url </a></span>
					</div>	
				</div>
			";
		}elseif($user_designation=="indv"){
			$select_desg="select * from individuals where user_id='$user_id'";
			$run_desg=mysqli_query($con,$select_desg);
			$row_desg=mysqli_fetch_array($run_desg);
			$desg=$row_desg['designation'];
			$org_name=$row_desg['company_name'];
			
			echo "
				<div class='panel panel-default' id='profemailtab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Contact</strong></p>
						<strong style='font-size:1.5em;margin-left:20px;margin-top:-15px;'><i class='fa fa-envelope-o' aria-hidden='true'></i> Email : </strong><span style='font-size:1.2em;color:#0664c2;'> $user_email</span>
					</div>	
				</div>
			";
			
			//showing education details
			$select_edu=mysqli_query($con,"select * from education where user_id='$user_id'");
			$num_education=mysqli_num_rows($select_edu);
			if($num_education != 0){
				echo "
					<div class='panel panel-default' id='profedutab'>
						<div class='panel-body'>
							<p><strong style='font-family:bold;font-size:2em;'>Education</strong></p><li id='edit2'><a href='edit_profile.php?user_id=$user_id'>edit</a></li>
							<b style='font-family:bold;font-size:1.5em;margin-left:20px;margin-top:-5px;'><img src='https://img.icons8.com/color/48/000000/graduation-cap.png' width='35px' height='35px'> <i style='color:green;text-decoration:underline''>Studied at :</i>  </b><br>
				";
				while($row_edu=mysqli_fetch_array($select_edu)){
					$clg_name=$row_edu['institute_name'];
					$s_year=$row_edu['s_year'];
					$e_year=$row_edu['e_year'];
					$d=date("Y");
					if($d>$e_year){
						echo "
							<span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
							<span style='font-size:1.2em;margin-left:10%;'>From <strong> $s_year </strong> to <strong> $e_year</strong></span><br>
							
						";
					}else{
						echo "
							<span style='font-size:1.5em;margin-left:10%;font-family:bold;'><b>$clg_name</b></span><br>
							<span style='font-size:1.2em;margin-left:10%;'>From <strong> $s_year </strong> to <strong> currently</strong></span><br>
						";
					}
				}
				echo "
					</div>
				</div>
				";
			}
			
		}
		if($_SESSION['uid']==$user_id){
			echo "<script>$('#edit2').css({'display':'display'});</script>";
		}else{
			echo "<script>$('#edit2').css({'display':'none'});</script>";
		}
		
		//work Experience
			$select_work=mysqli_query($con,"select * from work_experience where user_id='$user_id'");
			$num_works=mysqli_num_rows($select_work);
			if($user_designation=="student"){
				if($num_works != 0){
					echo "
						<div class='panel panel-default' id='profskillstab'>
							<div class='panel-body'>
								<p><strong style='font-family:bold;font-size:2em;'>Work Experience</strong></p><li id='edit2'><a href='edit_profile.php?user_id=$user_id'>edit</a></li>
								<i style='font-size:1.5em;float:left;margin-left:20px;' class='fa fa-suitcase' aria-hidden=true'></i>
							<label style='font-family:bold;font-size:1.5em;margin-top:-8px;color:green;text-decoration:underline'> <i>Worked at :</i></label>
					";
					while($row_work=mysqli_fetch_array($select_work)){
						$company_name=$row_work['company_name']; 
						$user_desig=$row_work['user_designation'];
						$company_add=$row_work['company_add'];
						echo "
							<span style='font-size:1.3em;margin-left:10%;font-family:bold;'>-  $user_desig
							at $company_name, &nbsp$company_add.</span><br>
						";
					}
					echo "
						</div>
					</div>
					";
				}
			}elseif($user_designation=="indv"){
				$select_pwork=mysqli_query($con,"select * from individuals where user_id='$user_id'");
				$row_pwork=mysqli_fetch_array($select_pwork);
				$company_name=$row_pwork['company_name']; 
				$user_desig=$row_pwork['designation'];
				$company_add=$row_pwork['company_add'];
				echo "
					<div class='panel panel-default' id='profskillstab'>
						<div class='panel-body'>
							<p><strong style='font-family:bold;font-size:2em;'>Work Experience</strong></p>
							<i style='font-size:1.5em;float:left;margin-left:20px;' class='fa fa-suitcase' aria-hidden=true'></i>
							<label style='font-family:bold;font-size:1.5em;margin-top:-8px;color:green;text-decoration:underline'> <i>Working at :</i></label>
							<span style='font-size:1.3em;margin-left:10%;font-family:bold;'>-  $user_desig at $company_name, &nbsp$company_add.</span><br><br>
				";
				if($num_works != 0){
					echo "
						<i style='font-size:1.5em;float:left;margin-left:20px;' class='fa fa-suitcase' aria-hidden=true'></i>
						<label style='font-family:bold;font-size:1.5em;margin-top:-8px;color:green;text-decoration:underline'> <i>Worked at :</i></label>
					";
					while($row_work=mysqli_fetch_array($select_work)){
						$company_name=$row_work['company_name']; 
						$user_desig=$row_work['user_designation'];
						$company_add=$row_work['company_add'];
						echo "
							<span style='font-size:1.3em;margin-left:10%;font-family:bold;'>-  $user_desig
							at $company_name, &nbsp$company_add.</span><br>
						";
					}
				}
				echo "
					</div>
				</div>
				";
			}
		
		
		//showing the registration date. 
		$input = strtotime($reg_date); 
		$date = date('d M, Y ', $input); 
		echo "
			<div class='panel panel-default' id='regdatetab'>
				<div class='panel-body'>
					<h3 style='text-align:center;font-family:Merienda One, cursive;'><strong>Joined On</strong></h3><br>
					<h4 style='font-size:2em;text-align:center;margin-top:-20px;color:yellow'><i class='fa fa-star' aria-hidden='true' ></i><h4><br>
					<h4 style='font-size:1.2em;text-align:center;margin-top:-20px;font-family:Merienda One, cursive;'> $date</h4>
				</div>	
			</div>
		";
		
	}		
}

//Inserting and Showing 'Achivements' on profile page.

class Achivements{
	function insertAchieves(){
		global $user_id;
		if($_SESSION['uid']==$user_id){
			echo "
				<div class='panel panel-default' id='profileachivestab'>
					<div class='panel-body'>
						<p><strong style='font-family:bold;font-size:2em;'>Add Achievements</strong></p><br>
						<p id='achieveintimation' style='margin-top:-20px;'><span style='color:red'>*</span>Note: Please add the achievements which has some proof.So that your ahievements can be verified by ConectYu team.</p>
						<p id='achieveintimation' style='margin-left:10px;'>Achievements cannot be verified without a valid proof.</p><hr>
						<p id='achieveintimation' style='margin-top:-20px;'><span style='color:red'>#</span> Achivements cannot be edited. They can be removed or added because of verification issue.</p>
						<button type='button' class='btn btn-success btn-md' id='addAchieve'><i style='font-family:bold;font-size:1.3em;'>Add Achievement</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
					</div>	
				</div>
				<script type='text/javascript'>
					$('#addAchieve').click(function(){
						$('#AchiveModal').modal({
							show: true
						});
					});
				</script>
			";
			echo "
				<div class='modal fade' id='AchiveModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
					<div class='modal-dialog' role='document'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<div class='panel-title'><p><strong>Add your Achievement!</strong></p></div>
							</div>
							<div class='modal-body'>
								<div class='panel panel-deafult'>
									<div class='panel-body'>
										<form  method='post' action='' enctype='multipart/form-data'>
											<span style='font-size:1.5em;'>Title of your Achivement</span><br>
											<input placeholder='write...' class='form-control' id='achievetitle' name='achievetitle' required></input><br>
											<h5>Write something about your achievement.</h5>
											<textarea placeholder='write...' class='form-control' rows='2' cols='50' name='achieve_content' id='achive_content' style='resize:none;' required></textarea><br><br>
											<p style='color:red'>*Note: Add your achievements and empower your true potential.</p>
									</div>
								</div>
							</div>
							<div class='modal-footer' style='margin-top:-15px;overflow:display'>
											<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
											<input type='submit' class='btn btn-success btn-md' value='Add' name='achives_btn' id='achives_btn' />
										</form>
							</div>
						</div>
					</div>
				</div>
			";
		}
	}
	
	function showAboutAchieves(){
		$user_id=$_GET['user_id'];
		global $con;
		$select_achieves="select * from achievements where user_id='$user_id' ORDER BY updated_date ASC";
		$run_achieves=mysqli_query($con,$select_achieves);
		$num_rows=mysqli_num_rows($run_achieves);
		if($num_rows==0){
			echo "
				<div class='panel panel-default' id='profachivestab'>
					<div class='panel-body'>
						<div class='alert alert-danger'>
							<p style='font-family:bold;font-size:1.5em;text-align:center;'>No Achievements to show!</p>
						</div>
					</div>	
				</div>
			";
		}else{
			echo "
				<div class='panel panel-default' id='achieveheading'>
					<div class='panel-body'>
							<p style='font-family:bold;font-size:2em;text-align:center;color:#0f3069'><strong>Achievements</strong></p>
					</div>	
				</div>
			";
			while($row_achieves=mysqli_fetch_array($run_achieves)){
				$title=$row_achieves['achieve_title'];
				$achieve_content=$row_achieves['achieve_content'];
				$updated_date=$row_achieves['updated_date'];
				if($_SESSION['uid']==$user_id){
					$achieve_id=$row_achieves['achieve_id'];
					echo "
						<div class='panel panel-default' id='profachivestab'>
							<div class='panel-body'>
								<h3 id='achieve_title'><strong style='font-family:bold;'>$title</strong></h3>
								<li id='verify'><a href='verifications.php?achieve_id=$achieve_id' class='btn btn-info' name='verifyachieve'> Request Verification</a></li>
								<li id='remove'><a href='functions/delete_posts.php?achieve_id=$achieve_id' name='remove'>remove</a></li><br>
								<p id='achievecnt'>$achieve_content</p>
							</div>	
						</div>
					";
				}else{
					echo "
						<div class='panel panel-default' id='profachivestab'>
							<div class='panel-body'>
								<h3 id='achieve_title'><strong>$title</strong></h3><br>
								<p id='achievecnt'>$achieve_content</p>
							</div>	
						</div>
					";
				}
			}
		}
	}
	
	
	//showing Achievements on the edit profile page.
	
	function showEditAchieves(){
		$user_id=$_SESSION['uid'];
		global $con;
		$select_achieves="select * from achievements where user_id='$user_id' ORDER BY updated_date ASC";
		$run_achieves=mysqli_query($con,$select_achieves);
		$num_rows=mysqli_num_rows($run_achieves);
		if($num_rows==0){
			echo "
				<div class='panel panel-default' id='profachivestab'>
					<div class='panel-body'>
					<legend id='legend'><p><strong>Achievements</strong></p></legend>
						<div class='alert alert-danger'>
							<p style='font-family:bold;font-size:1.5em;text-align:center;'>No Achievements to show!</p>
						</div>
						<div class='panel panel-default' id='profileachivestab'>
							<div class='panel-body'><br>
								<p id='achieveintimation' style='margin-top:-20px;'><span style='color:red'>*</span>Note: Please add the achievements which has some proof.So that your ahievements can be verified by ConectYu team.</p>
								<p id='achieveintimation' style='margin-left:10px;'>Achievements cannot be verified without a valid proof.</p><hr>
								<p id='achieveintimation' style='margin-top:-20px;'><span style='color:red'>#</span> Achivements cannot be edited. They can be removed or added because of verification issue.</p>
								<button type='button' class='btn btn-success btn-md' id='addAchieve'><i style='font-family:bold;font-size:1.3em;'>Add Achievement</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
							</div>	
						</div>
					</div>	
				</div>
			";
		}else{
			echo "
				<div class='panel panel-default' id='achieveheading'>
					<div class='panel-body'>
							<p id='legend'><strong>Achievements</strong></p>
					</div>	
				</div>
				<div class='panel panel-default' id='profachivestab' style='margin-top:0px;'>
						<div class='panel-body'>
			";
			while($row_achieves=mysqli_fetch_array($run_achieves)){
				$title=$row_achieves['achieve_title'];
				$achieve_content=$row_achieves['achieve_content'];
				$updated_date=$row_achieves['updated_date'];
				$achieve_id=$row_achieves['achieve_id'];
				echo "
					<div class='panel panel-default' id='profachivestab' style='margin-top:0px;'>
						<div class='panel-body'>
							<h3 id='achieve_title'><strong style='font-family:bold;'>$title</strong></h3>
							<li id='editverify'><a href='verifications.php?achieve_id=$achieve_id' class='btn btn-info' name='verifyachieve'> Request Verification</a></li>
							<li id='remove'><a href='functions/delete_posts.php?achieve_id=$achieve_id' name='remove'>remove</a></li><br>
							<p id='achievecnt'>$achieve_content</p>
						</div>	
					</div>
				";
			}
			
			echo "
				<div class='panel panel-default' id='profileachivestab'>
					<div class='panel-body'><br>
						<p id='achieveintimation' style='margin-top:-20px;'><span style='color:red'>*</span>Note: Please add the achievements which has some proof.So that your ahievements can be verified by ConectYu team.</p>
						<p id='achieveintimation' style='margin-left:10px;'>Achievements cannot be verified without a valid proof.</p><hr>
						<p id='achieveintimation' style='margin-top:-20px;'><span style='color:red'>#</span> Achivements cannot be edited. They can be removed or added because of verification issue.</p>
						<button type='button' class='btn btn-success btn-md' id='addAchieve'><i style='font-family:bold;font-size:1.3em;'>Add Achievement</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
					</div>	
				</div>
			";
			
	
			echo "</div>	
					</div>
			";
		}
		echo "
				<script type='text/javascript'>
					$('#addAchieve').click(function(){
						$('#AchiveModal').modal({
							show: true
						});
					});
				</script>
				<div class='modal fade' id='AchiveModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
					<div class='modal-dialog' role='document'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<div class='panel-title'><p><strong>Add your Achievement!</strong></p></div>
							</div>
							<div class='modal-body'>
								<div class='panel panel-deafult'>
									<div class='panel-body'>
										<form  method='post' action='' enctype='multipart/form-data'>
											<span style='font-size:1.5em;'>Title of your Achivement</span><br>
											<input placeholder='write...'class=' form-control' id='achievetitle' name='achievetitle' required></input><br>
											<h5>Write something about your achievement.</h5>
											<textarea placeholder='write...' class='form-control' rows='2' cols='50' name='achieve_content' style='resize:none;' id='achive_content' required></textarea><br><br>
											<p style='color:red'>*Note: Add your achievements and empower your true potential.</p>
									</div>
								</div>
							</div>
							<div class='modal-footer' style='margin-top:-15px;overflow:display'>
											<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
											<input type='submit' class='btn btn-success btn-md' value='Add' name='achives_btn' id='achives_btn' />
										</form>
							</div>
						</div>
					</div>
				</div>
			";
	}
}
//inserting achievements into database.
if(isset($_POST['achives_btn'])){
	$user_id=$_SESSION['uid'];
	$title=htmlentities(mysqli_real_escape_string($con,$_POST['achievetitle']));
	$achieve_content=htmlentities(mysqli_real_escape_string($con,$_POST['achieve_content']));
	$insert_achieve="insert into achievements(user_id,achieve_title,achieve_content,verify_status,credits,updated_date) values('$user_id','$title','$achieve_content','Not Verified','0',NOW())";
	$run_achieve=mysqli_query($con,$insert_achieve);
}	


//Showing Events Upcoming and Completed
class Events{
	function showEvents(){
		$user_id=$_SESSION['uid'];
		
?>
			<div class='panel panel-default' id='profeventstab'>
				<div class='panel-heading' style='background-color:white;'>
					<div class='row'>
						<div class='col-sm-6'>
							<button class='btn btn-default' style='background-color:none;' name='eventsbtn1' id='eventsbtn1' >Upcoming Events</button>
						</div>
						<div class='col-sm-6'>
							<button class='btn btn-default' style='background-color:;' data-toggle='collapse' data-target='#completedevents' name='eventsbtn2' id='eventsbtn2'>Completed Events</button>
						</div>
					</div>
				</div>
				<div class='panel-body'>
					<div class='row'>
						<div class='alert alert-warning' id="intimation" style='text-align:center;font-family:bold;font-size:1.5em;'>click on upcoming events to check events.</div>
						<?php if($_GET['user_id'] == $_SESSION['uid']){ ?>
						<a href='hostevent.php?user_id=<?php echo $user_id; ?>' style='margin-right:2%;' class='btn btn-success' id='addeventbtn'><i style='font-family:bold;font-size:1.3em;'>Host an event </i></a><br><br><hr>
						<?php } ?>
					</div>
					
						<script>
							$("#eventsbtn1").click(function(){
								var up=document.getElementById("upevnts");
								up.setAttribute('style','display:display');
								var com=document.getElementById("comevnts");
								com.setAttribute('style','display:none');
								var intimate=document.getElementById("intimation");
								intimate.setAttribute('style','display:none;');
							});
							$("#eventsbtn2").click(function(){
								var up=document.getElementById("upevnts");
								up.setAttribute('style','display:none');
								var com=document.getElementById("comevnts");
								com.setAttribute('style','display:display');
								var intimate=document.getElementById("intimation");
								intimate.setAttribute('style','display:none;');
							});
								
						
							/*$("#completedevents").click(function(){
								var up2=document.getElementById("eventsbtn1");
								up2.setAttribute('style','background-color:none');
								var comp2=document.getElementById("eventsbtn2");
								comp2.setAttribute('style','background-color:e6e6e6;');
							});*/
						</script>
						<div id="upevnts" style="display:none;">
						
							<?php
								global $con;
								$user_id=$_GET['user_id'];
								$today_date=date("Y-m-d");
								$select_events="select * from events where user_id='$user_id' AND event_date>'$today_date' ORDER BY event_reg_date DESC";
								$run_events=mysqli_query($con,$select_events);
								$num_upevents=mysqli_num_rows($run_events);
								if($num_upevents != 0){
									while($row_events=mysqli_fetch_array($run_events)){
										$event_name=$row_events['event_name'];
										$event_desc=$row_events['event_desc'];
										$file_id=$row_events['file_id'];
										$event_id=$row_events['event_id'];
										$select_img="select * from event_posts where (user_id='$user_id' AND file_id='$file_id')";
										$run_img=mysqli_query($con,$select_img);
										$row_img=mysqli_fetch_array($run_img);
										$event_img=$row_img['event_image'];
										
										echo "
											<div class='row'>
												<div class='col-sm-2'>
												</div>
												<div class='col-sm-8'>
													<a href='events.php?user_id=$user_id&event_id=$event_id' class='link'>
													<div class='card' style='border:2px solid #e6e6e6;width:100%;height:475px;'>
													  <img src='uploadedFiles/$event_img' alt='Avatar' style='width:100%;height:250px;'>
														<h4 style='font-family:Kaushan Script,cursive;font-size:1.8em;margin-left:2%;'><b>$event_name</b></h4>
														<pre style='margin-left:2%;background-color:white;border:none' id='eventdesc'>$event_desc</pre>
													
													<p style='color:#bcbec2;float:right;margin-right:3%;margin-top:-5px;'>click for more info...</p>
													</div>
													</a>
												</div>
												<div class='col-sm-2'>
												</div>
											</div><br>
										";
					
									}
								}else{
									echo "
										<div class='alert alert-danger' id='intimation' style='text-align:center;font-family:bold;font-size:1.5em;'>No events to show.</div>
									";
								}
								
							?>
							
						</div>
						
						<!--  Completed events  -->
						
						<div id="comevnts" style="display:none;">
							<?php
								global $con;
								$user_id=$_GET['user_id'];
								$today_date=date("Y-m-d");
								$select_events="select * from events where user_id='$user_id' AND event_date<'$today_date' ORDER BY event_reg_date DESC";
								$run_events=mysqli_query($con,$select_events);
								$num_comevents=mysqli_num_rows($run_events);
								if($num_comevents != 0){
									while($row_events=mysqli_fetch_array($run_events)){
										$event_name=$row_events['event_name'];
										$event_desc=$row_events['event_desc'];
										$file_id=$row_events['file_id'];
										$event_id=$row_events['event_id'];
										$select_img="select * from event_posts where (user_id='$user_id' AND file_id='$file_id')";
										$run_img=mysqli_query($con,$select_img);
										$row_img=mysqli_fetch_array($run_img);
										$event_img=$row_img['event_image'];
										
										echo "
											<div class='row'>
												<div class='col-sm-2'>
												</div>
												<div class='col-sm-8'>
													<a href='events.php?user_id=$user_id&event_id=$event_id' class='link'>
													<div class='card' style='border:2px solid #e6e6e6;width:100%;height:475px;'>
													  <img src='uploadedFiles/$event_img' alt='Avatar' style='width:100%;height:250px;'>
														<h4 style='font-family:Kaushan Script,cursive;font-size:1.8em;margin-left:2%;'><b>$event_name</b></h4>
														<pre style='margin-left:2%;background-color:white;border:none' id='eventdesc'>$event_desc</pre>
													
													<p style='color:#bcbec2;float:right;margin-right:3%;margin-top:-5px;'>click for more info...</p>
													</div>
													</a>
												</div>
												<div class='col-sm-2'>
												</div>
											</div><br>
										";
					
									}
								}else{
									echo "
										<div class='alert alert-danger' id='intimation' style='text-align:center;font-family:bold;font-size:1.5em;'>No events to show.</div>
									";
								}
								
							?>
						</div>
						
					
					
					
<?php
		echo "
				</div>	
			</div>
		";
	}
	
	// showing Explore Events
	
	function showexpEvents(){
		$user_id=$_SESSION['uid'];
?>
			<div class='panel panel-default' id='profeventstab'>
				<div class='panel-heading' style='background-color:white;'>
					<div class='row'>
						<div class='col-sm-6'>
							<button class='btn btn-default' style='background-color:none;' name='eventsbtn1' id='eventsbtn1' >Upcoming Events</button>
						</div>
						<div class='col-sm-6'>
							<button class='btn btn-default' style='background-color:;' data-toggle='collapse' data-target='#completedevents' name='eventsbtn2' id='eventsbtn2'>Completed Events</button>
						</div>
					</div>
				</div>
				<div class='panel-body'>
					<div class='row'>
						<div class='alert alert-warning' id="intimation" style='text-align:center;font-family:bold;font-size:1.5em;'>click on upcoming events to check events.</div>
						<?php if($_GET['user_id'] == $_SESSION['uid']){ ?>
						<a href='hostevent.php?user_id=<?php echo $user_id; ?>' style='margin-right:2%;' class='btn btn-success' id='addeventbtn'><i style='font-family:bold;font-size:1.3em;'>Host an event </i></a><br><br><hr>
						<?php } ?>
					</div>
					
						<script>
							$("#eventsbtn1").click(function(){
								var up=document.getElementById("upevnts");
								up.setAttribute('style','display:display');
								var com=document.getElementById("comevnts");
								com.setAttribute('style','display:none');
								var intimate=document.getElementById("intimation");
								intimate.setAttribute('style','display:none;');
							});
							$("#eventsbtn2").click(function(){
								var up=document.getElementById("upevnts");
								up.setAttribute('style','display:none');
								var com=document.getElementById("comevnts");
								com.setAttribute('style','display:display');
								var intimate=document.getElementById("intimation");
								intimate.setAttribute('style','display:none;');
							});
								
						
							/*$("#completedevents").click(function(){
								var up2=document.getElementById("eventsbtn1");
								up2.setAttribute('style','background-color:none');
								var comp2=document.getElementById("eventsbtn2");
								comp2.setAttribute('style','background-color:e6e6e6;');
							});*/
						</script>
						<div id="upevnts" style="display:none;">
						
							<?php
								global $con;
								$uid=$_SESSION['uid'];
								$select_evtuser="select * from following where following_user='$uid'";
								$run_evtuser=mysqli_query($con,$select_evtuser);
								$evnts=0;
								while($row_evtuser=mysqli_fetch_array($run_evtuser)){
									$user_id=$row_evtuser['followed_user'];
									$today_date=date("Y-m-d");
									$select_events="select * from events where user_id='$user_id' AND event_date>'$today_date' ORDER BY event_reg_date ASC";
									$run_events=mysqli_query($con,$select_events);
									$num_upevents=mysqli_num_rows($run_events);
									if($num_upevents != 0){
										$evnts=1;
										while($row_events=mysqli_fetch_array($run_events)){
											$event_name=$row_events['event_name'];
											$event_desc=$row_events['event_desc'];
											$file_id=$row_events['file_id'];
											$event_id=$row_events['event_id'];
											$select_img="select * from event_posts where (user_id='$user_id' AND file_id='$file_id')";
											$run_img=mysqli_query($con,$select_img);
											$row_img=mysqli_fetch_array($run_img);
											$event_img=$row_img['event_image'];
											
											echo "
												<div class='row'>
													<div class='col-sm-2'>
													</div>
													<div class='col-sm-8'>
														<a href='events.php?user_id=$user_id&event_id=$event_id' class='link'>
														<div class='card' style='border:2px solid #e6e6e6;width:100%;height:475px;'>
														  <img src='uploadedFiles/$event_img' alt='Avatar' style='width:100%;height:250px;'>
															<h4 style='font-family:Kaushan Script,cursive;font-size:1.8em;margin-left:2%;'><b>$event_name</b></h4>
															<pre style='margin-left:2%;background-color:white;border:none' id='eventdesc'>$event_desc</pre>
														
														<p style='color:#bcbec2;float:right;margin-right:3%;margin-top:-5px;'>click for more info...</p>
														</div>
														</a>
													</div>
													<div class='col-sm-2'>
													</div>
												</div><br>
											";
						
										}
									}
								}
								if($evnts==0){
									echo "
										<div class='alert alert-danger' id='intimation' style='text-align:center;font-family:bold;font-size:1.5em;'>No events to show.</div>
									";
								}
								
							?>
							
						</div>
						
						<!--  Completed events  -->
						
						<div id="comevnts" style="display:none;">
							<?php
								global $con;
								$uid=$_SESSION['uid'];
								$select_evtuser="select * from following where following_user='$uid'";
								$run_evtuser=mysqli_query($con,$select_evtuser);
								$evnts=0;
								while($row_evtuser=mysqli_fetch_array($run_evtuser)){
									$user_id=$row_evtuser['followed_user'];
									$today_date=date("Y-m-d");
									$select_events="select * from events where user_id='$user_id' AND event_date<'$today_date' ORDER BY event_reg_date ASC";
									$run_events=mysqli_query($con,$select_events);
									$num_upevents=mysqli_num_rows($run_events);
									if($num_upevents != 0){
										$evnts=1;
										while($row_events=mysqli_fetch_array($run_events)){
											$event_name=$row_events['event_name'];
											$event_desc=$row_events['event_desc'];
											$file_id=$row_events['file_id'];
											$event_id=$row_events['event_id'];
											$select_img="select * from event_posts where (user_id='$user_id' AND file_id='$file_id')";
											$run_img=mysqli_query($con,$select_img);
											$row_img=mysqli_fetch_array($run_img);
											$event_img=$row_img['event_image'];
											
											echo "
												<div class='row'>
													<div class='col-sm-2'>
													</div>
													<div class='col-sm-8'>
														<a href='events.php?user_id=$user_id&event_id=$event_id' class='link'>
														<div class='card' style='border:2px solid #e6e6e6;width:100%;height:475px;'>
														  <img src='uploadedFiles/$event_img' alt='Avatar' style='width:100%;height:250px;'>
															<h4 style='font-family:Kaushan Script,cursive;font-size:1.8em;margin-left:2%;'><b>$event_name</b></h4>
															<pre style='margin-left:2%;background-color:white;border:none' id='eventdesc'>$event_desc</pre>
														
														<p style='color:#bcbec2;float:right;margin-right:3%;margin-top:-5px;'>click for more info...</p>
														</div>
														</a>
													</div>
													<div class='col-sm-2'>
													</div>
												</div><br>
											";
						
										}
									}
								}
								if($evnts==0){
									echo "
										<div class='alert alert-danger' id='intimation' style='text-align:center;font-family:bold;font-size:1.5em;'>No events to show.</div>
									";
								}
								
							?>
						</div>
						
					
					
					
<?php
		echo "
				</div>	
			</div>
		";
	}
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
													<li><a class='ssharepost' style='cursor:pointer' postid='$file_id'>Share</a></li>											
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
											<!-- sharing of posts icon -->
											<span><i class=" share fa fa-share-alt ssharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
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
													<li><a class='ssharepost' style='cursor:pointer' postid='$file_id'>Share</a></li>
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
										<!-- sharing of posts icon -->
										<span><i class=" share fa fa-share-alt ssharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										
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
													<li><a class='ssharepost' style='cursor:pointer' postid='$file_id'>Share</a></li>
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
									<!-- sharing of posts icon -->
									<span><i class=" share fa fa-share-alt ssharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
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
													<li><a class='ssharepost' style='cursor:pointer' postid='$file_id'>Share</a></li>
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
									<!-- sharing of posts icon -->
									<span><i class=" share fa fa-share-alt ssharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
									
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
													<li><a class='ssharepost' style='cursor:pointer' postid='$file_id'>Share</a></li>
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
									<!-- sharing of posts icon -->
									<span><i class=" share fa fa-share-alt ssharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
									
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
													<li><a class='ssharepost' style='cursor:pointer' postid='$file_id'>Share</a></li>
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
									<!-- sharing of posts icon -->
									<span><i class=" share fa fa-share-alt ssharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
									
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
													<li><a class='ssharepost' style='cursor:pointer' postid='$file_id'>Share</a></li>
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
											<!-- sharing of posts icon -->
											<span><i class=" share fa fa-share-alt ssharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
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
													<li><a class='ssharepost' style='cursor:pointer' postid='$file_id'>Share</a></li>
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
										<!-- sharing of posts icon -->
										<span><i class=" share fa fa-share-alt ssharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
										
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

//showing skills on the profile page.

class Skills{
	function showAboutSkills(){
		global $con;
		global $user_id;
		$select_skill="select * from skills where user_id='$user_id'";
		$run_skill=mysqli_query($con,$select_skill);
		$num_rows=mysqli_num_rows($run_skill);
		if($num_rows==0){
			echo "
				<div class='panel panel-danger' id='profachivestab'>
					<div class='panel-body'>
						<div class='alert alert-danger'>
							<p style='font-family:bold;font-size:1.5em;text-align:center;'>No Skills to show!</p>
						</div>
				";
				if($user_id==$_SESSION['uid']){
				echo "		
					<hr>
					<button type='button' style='float:right;width:210px;' class='btn btn-success btn-md' id='addskill'><i style='font-family:bold;font-size:1.3em;'>Add a skill</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
				";
			}
			echo "
					</div>	
				</div>
			";
		}else{
			echo "
				<div class='panel panel-default' id='profskillstab'>
					<div class='panel-body'>
						<p style='margin-left:20px;font-family:bold;font-size:2em;text-align:center;color:#0f3069;'><strong>Skills</strong></p>
			";
				while($row_skill=mysqli_fetch_array($run_skill)){
					$skill_name=$row_skill['skill_name'];
					$skill_id=$row_skill['skill_id'];
					if($_SESSION['uid']==$_GET['user_id']){
						echo "
							<hr>
							<div class='row'>
								<div class='col-sm-10'>
									<p id='skillname'># $skill_name</p>
								</div>
								<div class='col-sm-2'>
									<strong id='removeskill'><a href='functions/delete_posts.php?skill_id=$skill_id'><b aria-hidden='true'>X</b></a></strong>
								</div>
							</div>
						";
					}else{
						echo "
						<hr>
						<div class='row'>
							<p id='skillname'># $skill_name</p>
						</div>	
						
					";
					}
				}	
		
			if($user_id==$_SESSION['uid']){
				echo "		
					<hr>
					<button type='button' style='float:right;width:210px;' class='btn btn-success btn-md' id='addskill'><i style='font-family:bold;font-size:1.3em;'>Add a skill</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
				";
			}
		}
			echo "
					</div>	
				</div>
				</div>	
			</div>
			<script type='text/javascript'>
			$('#addskill').click(function(){
				$('#SkillModal').modal({
					show: true
				});
			});
		</script>
		
		<div class='modal fade' id='SkillModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
			<div class='modal-dialog' role='document'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						<div class='panel-title'><p><strong>Add your Skill!</strong></p></div>
					</div>
					<div class='modal-body'>
						<div class='panel panel-deafult'>
							<div class='panel-body'>
								<form action='' method='post'>
									<p style='font-family:bold;font-size:1.5em;'><strong>Name of your Skill</strong></p>
									<input type='text' class='form-control' id='skilltxtbox' name='skilltxtbox' placeholder='write...' required/>	
							</div>
						</div>
					</div>
					<div class='modal-footer' style='margin-top:-15px;overflow:display'>
							<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
							<input type='submit' class='btn btn-info' name='addskillbtn' style='width:125px;' value='Add Skill'/>
						</form>
					</div>
				</div>
			</div>
		</div>
		";
	}

		
	
	//showing edit skills in edit profile page.
	
	function showEditSkills(){
		global $con;
		global $user_id;
		$select_skill="select * from skills where user_id='$user_id'";
		$run_skill=mysqli_query($con,$select_skill);
		$num_rows=mysqli_num_rows($run_skill);
		if($num_rows==0){
			echo "
				<div class='panel panel-danger' id='profachivestab'>
					<div class='panel-body'>
						<legend id='legend'><p><strong>Skills</strong></p></legend>
						<div class='alert alert-danger'>
							<p style='font-family:bold;font-size:1.5em;text-align:center;'>No Skills to show!</p>
						</div>
						<button type='button' style='float:right;width:210px;' class='btn btn-success btn-md' id='addskill'><i style='font-family:bold;font-size:1.3em;'>Add a skill</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
					</div>	
				</div>
			";
		}else{
			echo "
				<div class='panel panel-default' id='profskillstab'>
					<div class='panel-body'>
						<fieldset>
						<legend id='legend'><p><strong>Skills</strong></p></legend>
			";
				while($row_skill=mysqli_fetch_array($run_skill)){
					$skill_name=$row_skill['skill_name'];
					$skill_id=$row_skill['skill_id'];
					echo "
						<div class='row'>
							<div class='col-sm-9'>
								<p id='skillname'># $skill_name</p>
							</div>
							<div class='col-sm-3'>
								<strong id='removeskill'><a href='functions/delete_posts.php?skill_id=$skill_id' style='font-size:1.2em;'><b aria-hidden='true'>X</b></a></strong>
							</div>
						</div>
						<hr>
					";
				}	
				echo "		
					<button type='button' style='float:right;width:210px;' class='btn btn-success btn-md' id='addskill'><i style='font-family:bold;font-size:1.3em;'>Add a skill</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
						</fieldset>
					</div>	
				</div>
				";
		}
		echo "
				<script type='text/javascript'>
					$('#addskill').click(function(){
						$('#SkillModal').modal({
							show: true
						});
					});
				</script>
				
				<div class='modal fade' id='SkillModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
					<div class='modal-dialog' role='document'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<div class='panel-title'><p><strong>Add your Skill!</strong></p></div>
							</div>
							<div class='modal-body'>
								<div class='panel panel-deafult'>
									<div class='panel-body'>
										<form action='' method='post'>
											<p style='font-family:bold;font-size:1.5em;'><strong>Name of your Skill</strong></p>
											<input type='text' class='form-control' id='skilltxtbox' name='skilltxtbox' placeholder='write...' required/>	
									</div>
								</div>
							</div>
							<div class='modal-footer' style='margin-top:-15px;overflow:display'>
									<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose'>Cancel</button>
									<input type='submit' class='btn btn-info' name='addskillbtn' style='width:125px;' value='Add Skill'/>
								</form>
							</div>
						</div>
					</div>
				</div>
			";
		
	}
	
	
	// modal for inserting the skills.
	
	/*function insertSkills(){
		global $user_id;
		if($_SESSION['uid']==$user_id){
			echo "
				
				<div class='panel panel-default' id='profskillstab'>
					<div class='panel-body'>
						<button type='button' style='float:right;' class='btn btn-success btn-md' id='addskill'><i style='font-family:bold;font-size:1.3em;'>Add a skill</i> <i class='fa fa-plus' aria-hidden='true'></i></button>
					</div>	
				</div>
				
				
			";
		}
	}*/
}

//insert skill into db
if(isset($_POST['addskillbtn'])){
	$user_id=$_SESSION['uid'];
	$skill_name=htmlentities(mysqli_real_escape_string($con,$_POST['skilltxtbox']));
	$insert_skill="insert into skills (user_id,skill_name,date) values('$user_id','$skill_name',NOW())";
	$run_skill=mysqli_query($con,$insert_skill);
}


//inserting into "following" table
if(isset($_POST['followbtn'])){
	global $con;
	$followed_user=$_GET['user_id'];
	$following_user=$_SESSION['uid'];
	
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

//inserting into "Connections" table
if(isset($_POST['subconnectid'])){
	global $con;
	$connect_with=$_GET['user_id'];
	$connect_by=$_SESSION['uid'];
	$idtoconnect=htmlentities(mysqli_real_escape_string($con,$_POST['idtoconnect']));
	$connecttocnt=htmlentities(mysqli_real_escape_string($con,$_POST['connecttocnt']));
	
	$select_connect="select * from connections where connect_by='$connect_by' AND connect_with='$connect_with'";
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

//deleting from connections
if(isset($_POST['cnctrequestedbtn'])){
	global $con;
	$connect_with=$_GET['user_id'];
	$connect_by=$_SESSION['uid'];
	
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

//deleting from following
if(isset($_POST['followingbtn']) or isset($_POST['requestedbtn'])){
	global $con;
	$followed_user=$_GET['user_id'];
	$following_user=$_SESSION['uid'];
	
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

//deleting from connections

if(isset($_POST['connectedbtn'])){
	global $con;
	$connect_with=$_GET['user_id'];
	$connect_by=$_SESSION['uid'];
	
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

//showing Page Posts

class PagePosts{
	function showPagePosts(){
		global $con;
		$sessionuserid = $_POST['user_id'];
		$select_prfpic=mysqli_query($con,"select profile_pic from users where user_id='$sessionuserid'");
		$row_prfpic=mysqli_fetch_array($select_prfpic);
		$prf_picc=$row_prfpic['profile_pic'];
		$page_id=htmlentities(mysqli_real_escape_string($con,$_POST['page_id']));
		$select_posts="select * from user_posts where user_id='$page_id' ORDER BY uploaded_date DESC";
		$run_posts=mysqli_query($con,$select_posts);
		$num_posts=mysqli_num_rows($run_posts);
		if($num_posts!=0){
			while($row_posts=mysqli_fetch_array($run_posts)){
				$post_img=$row_posts['uploaded_file'];
				$likes=$row_posts['likes'];
				$file_id=$row_posts['file_id'];
				$uploaded_date=$row_posts['uploaded_date'];
				$post_privacy=$row_posts['post_privacy'];
				
				$img_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
				
				$select_cnt="select * from user_postcontent where user_id='$page_id' and file_id='$file_id'";
				$run_cnt=mysqli_query($con,$select_cnt);
				$num_content=mysqli_num_rows($run_cnt);
				
				$select_page=mysqli_query($con,"select * from pages where page_id='$page_id'");
				$row_page=mysqli_fetch_array($select_page);
				$page_name=$row_page['pagename'];
				$pgcreated_by=$row_page['created_by_id'];
				$pagecat=$row_page['pagecat'];
				$pagepic=$row_page['pagepic'];
				if($post_privacy=="Public" or $post_privacy=="Followers" or $pgcreated_by==$sessionuserid){
					if($post_img != ""){
						echo "
							<div class='panel panel-default'>
								<div class='panel-heading' style='background-color:white;'>
									<div class='row'>
										<div class='col-sm-1'>
											<a href='pageprofile.php?page_id=$page_id'><img src='images/prfpics/$pagepic' id='prf_pic1' ></a>
										</div>
										<div class='col-sm-9' id='postid'>
											<a href='pageprofile.php?page_id=$page_id' id='post_labelname'><p>$page_name
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
													<li><a class='psharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $pgcreated_by){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepagepost($file_id);'>Delete the post</a></li>	
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
											<span><i class="punlike fa fa-heart" style="color:red" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>			
											
										<?php }else{ ?>
											<!-- user has not yet liked post -->
											<span><i class="plike fa fa-heart-o" aria-hidden="true" id="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i>	
											
										<?php	}?>
											<span><a href="postdetails.php?user_id=<?php echo $userid; ?>&file_id=<?php echo $file_id ?>" style="color:black;"><i class=" comment fa fa-comment-o" aria-hidden="true"></i></a></span>
										<!-- sharing of posts icon -->
										<span><i class=" share fa fa-share-alt psharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control pcmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="pcmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" pcmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="pcmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
											<a href='pageprofile.php?page_id=$page_id'><img src='images/prfpics/$pagepic' id='prf_pic1' ></a>
										</div>
										<div class='col-sm-9' id='postid'>
											<a href='pageprofile.php?page_id=$page_id' id='post_labelname'><p>$page_name
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
													<li><a class='psharepost' style='cursor:pointer;' postid='$file_id'>Share</a></li>
												";
												if($sessionuserid == $pgcreated_by){
													echo "
														<li><a id='delpost' name='delpost' style='cursor:pointer;' onclick='deletepagepost($file_id);'>Delete the post</a></li>	
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
											<span><i class=" share fa fa-share-alt psharepost"  aria-hidden="true" postid="<?php echo $file_id; ?>" userid="<?php echo $userid; ?>"></i></span>
											
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
									<div class="col-sm-1 col-lg-1">
										<img src="<?php echo $prf_picc; ?>" style="width:38px;height:38px;border-radius:20px;margin-left:-15px;"/>
									</div>
									<div class="col-sm-10 col-lg-10">
										<input type="text" class="<?php echo $file_id; ?> form-control pcmntbox" placeholder="   Add a comment..." style="border-radius:20px;margin-left:-20px;width:104%;margin-bottom:-2px;" id="pcmntbox" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>"/>
									</div>
									<div class="col-sm-1 col-lg-1">
										<span><a class=" pcmntsubmit btn btn-default" style="border-radius:20px;margin-left:-28px;width:55px;float:left;margin-bottom:-2px;" id="pcmntsubmit" postid="<?php echo $file_id; ?>" userid="<?php echo $sessionuserid; ?>" fileuserid="<?php echo $user_id ?>" ><i class="fa fa-paper-plane" aria-hidden="true" ></i></a></span>
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
			echo"
				<h4 style='font-family:bold;color:#7a7979;margin-left:35%;margin-top:10%;'>No posts to show!</h4>
			";
		}
		
	}
}

//showing default users score
if(isset($_POST['defaultuserscore'])){
	global $con;
	$user_id=$_POST['user_id'];
	$select_users="select * from following where following_user='$user_id'";
	$run_users=mysqli_query($con,$select_users);
	$userscore_array=array();
	while($row_users=mysqli_fetch_array($run_users)){
		$user=$row_users['followed_user'];
		$run_userscore=mysqli_query($con,"select credits from achievements where user_id='$user'");
		$creditscore=0;
		while($row=mysqli_fetch_array($run_userscore)){
			$creditscore=$creditscore+$row['credits'];
		}
		if($creditscore!=0){
			$userscore_array[$user]=$creditscore;
		}
	}
	arsort($userscore_array);
	foreach($userscore_array as $user=>$credits){
		$credits=$userscore_array[$user];
		$user_details="select * from users where user_id='$user'";
		$run_details=mysqli_query($con,$user_details);
		$row_details=mysqli_fetch_array($run_details);
		$user_name=$row_details['user_name'];
		$prf_pic=$row_details['profile_pic'];
		$user_designation=$row_details['user_designation'];
		if($user_designation=="student"){
				$select_desg="select * from students where user_id='$user'";
				$run_desg=mysqli_query($con,$select_desg);
				$row_desg=mysqli_fetch_array($run_desg);
				$clg_name=$row_desg['college_name'];
				
				echo "
					<div class='panel panel-default' id='scorepaneltab'>
						<div class='panel-body'>
							<div class='row'>
								<div class='col-sm-2 col-xs-2'>
									<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
								</div>
								<div class='col-sm-8 col-xs-8' id='postid'>
									<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a>
									<a href='profile.php?user_id=$user' id='designation'><i>$user_designation at $clg_name</i></a><br>
									<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
								</div>
								<div class='col-sm-2 col-xs-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu' id='dropdownmenu'>
											<li><a href='profile.php?user_id=$user'>view profile</a></li>  
										"; ?>
											<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
										<?php echo "								
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				";
			}elseif($user_designation=="org"){
				$select_desg="select * from organizations where user_id='$user'";
				$run_desg=mysqli_query($con,$select_desg);
				$row_desg=mysqli_fetch_array($run_desg);
				$org_name=$row_desg['org_name'];
				$org_add=$row_desg['org_add'];
				
				echo "
					<div class='panel panel-default' id='scorepaneltab'>
						<div class='panel-body'>
							<div class='row'>
								<div class='col-sm-2 col-xs-2'>
									<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
								</div>
								<div class='col-sm-8 col-xs-8' id='postid'>
									<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
									<a href='profile.php?user_id=$user' id='designation'><i>$org_name, $org_add</i></a><br>
									<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
								</div>
								<div class='col-sm-2 col-xs-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu' id='dropdownmenu'>
											<li><a href='profile.php?user_id=$user'>view profile</a></li>  
										"; ?>
											<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
										<?php echo "    
										</ul>
									</div>
								</div>
							</div>
						</div>	
					</div>
				";
			}elseif($user_designation=="indv"){
				$select_desg="select * from individuals where user_id='$user'";
				$run_desg=mysqli_query($con,$select_desg);
				$row_desg=mysqli_fetch_array($run_desg);
				$desg=$row_desg['designation'];
				$org_name=$row_desg['company_name'];
				
				echo "
					<div class='panel panel-default' id='scorepaneltab'>
						<div class='panel-body'>
							<div class='row'>
								<div class='col-sm-2 col-xs-2'>
									<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
								</div>
								<div class='col-sm-8 col-xs-8' id='postid'>
									<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
									<a href='profile.php?user_id=$user' id='designation'><i>$desg at $org_name</i></a><br>
									<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
								</div>
								<div class='col-sm-2 col-xs-2'>
									<div class='dropdown'>
										<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
										glyphicon-option-vertical'></i></li>
										<ul class='dropdown-menu' id='dropdownmenu'>
											<li><a href='profile.php?user_id=$user'>view profile</a></li>  
										"; ?>
											<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
										<?php echo "  
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				";
		}
	}
}
?>
<script type="text/javascript">
//sharing searched profile as message
function shsrchdcredituserprf(userid){
	document.getElementById("fwrduserid").value=userid;
	document.getElementById("fwrdusertype").value="user";
	$('#shsrchcreditProfAsMsg').modal({
		show: true
	});
	$.ajax({
		url:'functions/functions.php',
		data:'showusrstoshrprf=1',
		type:'post',
		async:false,
		success:function(res){
			$(".showuserstoshareprf").html(res);
		}
	});
	return false;
}
</script>
<?php
//search for user conectyu score
if(isset($_POST['searchscore'])){
	global $con;
	$user_id=$_POST['user_id'];
	$search_input=htmlentities(mysqli_real_escape_string($con,$_POST['search_user']));
	$filter=htmlentities(mysqli_real_escape_string($con,$_POST['filter']));
	if($filter=="all"){
		$select_search="select * from users where user_id='$search_input' or user_name='$search_input' or user_name like '$search_input%' or user_name like '%$search_input' LIMIT 50";
		$run_search=mysqli_query($con,$select_search);
		$num_rows=mysqli_num_rows($run_search);
		$userscore_array=array();
		if($num_rows>=1){
			while($row_search=mysqli_fetch_array($run_search)){
				$prfpic=$row_search['profile_pic'];
				$user_name=$row_search['user_name'];
				$user=$row_search['user_id'];
				//$tagline=$row_search['tagline'];
				$user_designation=$row_search['user_designation'];
				
				$run_userscore=mysqli_query($con,"select credits from achievements where user_id='$user'");
				$creditscore=0;
				while($row=mysqli_fetch_array($run_userscore)){
					$creditscore=$creditscore+$row['credits'];
				}
				$userscore_array[$user]=$creditscore;
			}
			arsort($userscore_array);
			foreach($userscore_array as $user=>$credits){
				$credits=$userscore_array[$user];
				$user_details="select * from users where user_id='$user'";
				$run_details=mysqli_query($con,$user_details);
				$row_details=mysqli_fetch_array($run_details);
				$user_name=$row_details['user_name'];
				$prf_pic=$row_details['profile_pic'];
				$user_designation=$row_details['user_designation'];
				if($user_designation=="student"){
						$select_desg="select * from students where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$clg_name=$row_desg['college_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$user_designation at $clg_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "								
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
					}elseif($user_designation=="org"){
						$select_desg="select * from organizations where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$org_name=$row_desg['org_name'];
						$org_add=$row_desg['org_add'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$org_name, $org_add</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "   
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
						";
					}elseif($user_designation=="indv"){
						$select_desg="select * from individuals where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$desg=$row_desg['designation'];
						$org_name=$row_desg['company_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$desg at $org_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "  
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
				}
			}
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:none;');
				</script>
			";
		}else{
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:display;');
				</script>
			";
		}
	}else if($filter=="students"){
		$select_search="select * from users where (user_id='$search_input' AND user_designation='student') or (user_name='$search_input' AND user_designation='student') or (user_name like '$search_input%' AND user_designation='student') or (user_name like '%$search_input' AND user_designation='student') LIMIT 50";
		$run_search=mysqli_query($con,$select_search);
		$num_rows=mysqli_num_rows($run_search);
		$userscore_array=array();
		if($num_rows>=1){
			while($row_search=mysqli_fetch_array($run_search)){
				$prfpic=$row_search['profile_pic'];
				$user_name=$row_search['user_name'];
				$user=$row_search['user_id'];
				//$tagline=$row_search['tagline'];
				$user_designation=$row_search['user_designation'];
				
				$run_userscore=mysqli_query($con,"select credits from achievements where user_id='$user'");
				$creditscore=0;
				while($row=mysqli_fetch_array($run_userscore)){
					$creditscore=$creditscore+$row['credits'];
				}
				$userscore_array[$user]=$creditscore;
			}
			arsort($userscore_array);
			foreach($userscore_array as $user=>$credits){
				$credits=$userscore_array[$user];
				$user_details="select * from users where user_id='$user'";
				$run_details=mysqli_query($con,$user_details);
				$row_details=mysqli_fetch_array($run_details);
				$user_name=$row_details['user_name'];
				$prf_pic=$row_details['profile_pic'];
				$user_designation=$row_details['user_designation'];
				if($user_designation=="student"){
						$select_desg="select * from students where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$clg_name=$row_desg['college_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$user_designation at $clg_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "						
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
					}elseif($user_designation=="org"){
						$select_desg="select * from organizations where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$org_name=$row_desg['org_name'];
						$org_add=$row_desg['org_add'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$org_name, $org_add</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "    
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
						";
					}elseif($user_designation=="indv"){
						$select_desg="select * from individuals where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$desg=$row_desg['designation'];
						$org_name=$row_desg['company_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$desg at $org_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "  
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
				}
			}
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:none;');
				</script>
			";
		}else{
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:display;');
				</script>
			";
		}
	}else if($filter=="orgs"){
		$select_search="select * from users where (user_id='$search_input' AND user_designation='org') or (user_name='$search_input' AND user_designation='org') or (user_name like '$search_input%' AND user_designation='org') or (user_name like '%$search_input' AND user_designation='org') LIMIT 50";
		$run_search=mysqli_query($con,$select_search);
		$num_rows=mysqli_num_rows($run_search);
		$userscore_array=array();
		if($num_rows>=1){
			while($row_search=mysqli_fetch_array($run_search)){
				$prfpic=$row_search['profile_pic'];
				$user_name=$row_search['user_name'];
				$user=$row_search['user_id'];
				//$tagline=$row_search['tagline'];
				$user_designation=$row_search['user_designation'];
				
				$run_userscore=mysqli_query($con,"select credits from achievements where user_id='$user'");
				$creditscore=0;
				while($row=mysqli_fetch_array($run_userscore)){
					$creditscore=$creditscore+$row['credits'];
				}
				$userscore_array[$user]=$creditscore;
			}
			arsort($userscore_array);
			foreach($userscore_array as $user=>$credits){
				$credits=$userscore_array[$user];
				$user_details="select * from users where user_id='$user'";
				$run_details=mysqli_query($con,$user_details);
				$row_details=mysqli_fetch_array($run_details);
				$user_name=$row_details['user_name'];
				$prf_pic=$row_details['profile_pic'];
				$user_designation=$row_details['user_designation'];
				if($user_designation=="student"){
						$select_desg="select * from students where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$clg_name=$row_desg['college_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$user_designation at $clg_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "					
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
					}elseif($user_designation=="org"){
						$select_desg="select * from organizations where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$org_name=$row_desg['org_name'];
						$org_add=$row_desg['org_add'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$org_name, $org_add</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "    
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
						";
					}elseif($user_designation=="indv"){
						$select_desg="select * from individuals where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$desg=$row_desg['designation'];
						$org_name=$row_desg['company_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$desg at $org_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
				}
			}
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:none;');
				</script>
			";
		}else{
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:display;');
				</script>
			";
		}
	}else if($filter=="others"){
		$select_search="select * from users where (user_id='$search_input' AND user_designation='indv') or (user_name='$search_input' AND user_designation='indv') or (user_name like '$search_input%' AND user_designation='indv') or (user_name like '%$search_input' AND user_designation='indv') LIMIT 50";
		$run_search=mysqli_query($con,$select_search);
		$num_rows=mysqli_num_rows($run_search);
		$userscore_array=array();
		if($num_rows>=1){
			while($row_search=mysqli_fetch_array($run_search)){
				$prfpic=$row_search['profile_pic'];
				$user_name=$row_search['user_name'];
				$user=$row_search['user_id'];
				//$tagline=$row_search['tagline'];
				$user_designation=$row_search['user_designation'];
				
				$run_userscore=mysqli_query($con,"select credits from achievements where user_id='$user'");
				$creditscore=0;
				while($row=mysqli_fetch_array($run_userscore)){
					$creditscore=$creditscore+$row['credits'];
				}
				$userscore_array[$user]=$creditscore;
			}
			arsort($userscore_array);
			foreach($userscore_array as $user=>$credits){
				$credits=$userscore_array[$user];
				$user_details="select * from users where user_id='$user'";
				$run_details=mysqli_query($con,$user_details);
				$row_details=mysqli_fetch_array($run_details);
				$user_name=$row_details['user_name'];
				$prf_pic=$row_details['profile_pic'];
				$user_designation=$row_details['user_designation'];
				if($user_designation=="student"){
						$select_desg="select * from students where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$clg_name=$row_desg['college_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$user_designation at $clg_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
					}elseif($user_designation=="org"){
						$select_desg="select * from organizations where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$org_name=$row_desg['org_name'];
						$org_add=$row_desg['org_add'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$org_name, $org_add</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "   
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
						";
					}elseif($user_designation=="indv"){
						$select_desg="select * from individuals where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$desg=$row_desg['designation'];
						$org_name=$row_desg['company_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$desg at $org_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "   
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
				}
			}
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:none;');
				</script>
			";
		}else{
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:display;');
				</script>
			";
		}
	}
}


class UserCredits{
	function showUserCredits(){
		global $con;
		$user_id=$_SESSION['uid'];
		$search_input=htmlentities(mysqli_real_escape_string($con,$_GET['searchconscore']));
		$select_search="select * from users where user_id='$search_input' or user_name='$search_input' or user_name like '$search_input%' or user_name like '%$search_input' LIMIT 50";
		$run_search=mysqli_query($con,$select_search);
		$num_rows=mysqli_num_rows($run_search);
		$userscore_array=array();
		if($num_rows>=1){
			while($row_search=mysqli_fetch_array($run_search)){
				$prfpic=$row_search['profile_pic'];
				$user_name=$row_search['user_name'];
				$user=$row_search['user_id'];
				//$tagline=$row_search['tagline'];
				$user_designation=$row_search['user_designation'];
				
				$run_userscore=mysqli_query($con,"select credits from achievements where user_id='$user'");
				$creditscore=0;
				while($row=mysqli_fetch_array($run_userscore)){
					$creditscore=$creditscore+$row['credits'];
				}
				$userscore_array[$user]=$creditscore;
			}
			arsort($userscore_array);
			foreach($userscore_array as $user=>$credits){
				$credits=$userscore_array[$user];
				$user_details="select * from users where user_id='$user'";
				$run_details=mysqli_query($con,$user_details);
				$row_details=mysqli_fetch_array($run_details);
				$user_name=$row_details['user_name'];
				$prf_pic=$row_details['profile_pic'];
				$user_designation=$row_details['user_designation'];
				if($user_designation=="student"){
						$select_desg="select * from students where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$clg_name=$row_desg['college_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$user_designation at $clg_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "					
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
					}elseif($user_designation=="org"){
						$select_desg="select * from organizations where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$org_name=$row_desg['org_name'];
						$org_add=$row_desg['org_add'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$org_name, $org_add</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "   
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
						";
					}elseif($user_designation=="indv"){
						$select_desg="select * from individuals where user_id='$user'";
						$run_desg=mysqli_query($con,$select_desg);
						$row_desg=mysqli_fetch_array($run_desg);
						$desg=$row_desg['designation'];
						$org_name=$row_desg['company_name'];
						
						echo "
							<div class='panel panel-default' id='scorepaneltab'>
								<div class='panel-body'>
									<div class='row'>
										<div class='col-sm-2 col-xs-2'>
											<a href='profile.php?user_id=$user'><img src='$prf_pic' id='prfpic1' style='margin-top:0%;' ></a>
										</div>
										<div class='col-sm-8 col-xs-8' id='postid'>
											<a href='profile.php?user_id=$user' id='postlabelname'>$user_name</a><br>
											<a href='profile.php?user_id=$user' id='designation'><i>$desg at $org_name</i></a><br>
											<a href='profile.php?user_id=$user' id='credits'><i>credits : $credits</i></a>
										</div>
										<div class='col-sm-2 col-xs-2'>
											<div class='dropdown'>
												<li id='verticalopt' class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon 
												glyphicon-option-vertical'></i></li>
												<ul class='dropdown-menu' id='dropdownmenu'>
													<li><a href='profile.php?user_id=$user'>view profile</a></li>  
												"; ?>
													<li><a style='cursor:pointer;' onclick='shsrchdcredituserprf("<?php echo $user; ?>");'>Share</a></li>
												<?php echo "   
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						";
				}
			}
			
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:none;');
				</script>
			";
		}else{
			echo "
				<script type='text/javascript'> 
					var notFound=document.getElementById('userNotFound');
					notFound.setAttribute('style', 'display:display;');
				</script>
				";
		}
	}
}


//showing followers
if(isset($_POST['showfollowers'])){
	global $con;
	$user_id=htmlentities(mysqli_real_escape_string($con,$_POST['user_id']));
	$show_followers="select * from following where followed_user='$user_id' AND status='accepted'";
	$run_fllow=mysqli_query($con,$show_followers);
	while($row_show=mysqli_fetch_array($run_fllow)){
		$follower=$row_show['following_user'];
		$select_details="select * from users where user_id='$follower'";
		$run_details=mysqli_query($con,$select_details);
		$row_details=mysqli_fetch_array($run_details);
		$prf_picture=$row_details['profile_pic'];
		$user_name=$row_details['user_name'];
		
		if(str_word_count($user_name)>=2){
			$username=explode(" ",$row_details['user_name'],3);
			$user_name=$username[0]." ".$username[1];
		}
		$userid=$row_details['user_id'];
		$uid=htmlentities(mysqli_real_escape_string($con,$_POST['uid']));
		$check_following="select * from following where following_user='$uid' and followed_user='$follower'";
		$run_check=mysqli_query($con,$check_following);
		$row_status=mysqli_fetch_array($run_check);
		$follow_status=$row_status['status'];
		$num=mysqli_num_rows($run_check);
		echo "
			<a href='profile.php?user_id=$userid' class='btn btn-default'  style='width:100%'><img src='$prf_picture' id='modalprfpic' >
			<p id='modalusername'>$user_name</p></a>
		";
		if($userid!=$uid){
			if($num>0){
				if($follow_status=="accepted"){
					echo "
						<button id='followingbtn1' followby='$uid' followto='$userid' name='followingbtn' class='btn btn-default btn-md followingbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
					"; 
				}else{
					echo "
						<button id='requestedbtn1' followby='$uid' followto='$userid' name='requestedbtn1' class='btn btn-default btn-md requestedbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>requested</span> &nbsp</button><br>
					"; 
				}
			}else{
				echo "
					<button id='followbtn1' followby='$uid' followto='$userid' name='followbtn' class='btn btn-info btn-md followbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
					</i></button><br>
				"; 
			}
		}
					
		
	}
}

//showing following
if(isset($_POST['showfollowing'])){
	global $con;
	$user_id=htmlentities(mysqli_real_escape_string($con,$_POST['user_id']));
	$show_follow="select * from following where following_user='$user_id' AND status='accepted' AND user_type='user'";
	$run_flowing=mysqli_query($con,$show_follow);
	while($row_show=mysqli_fetch_array($run_flowing)){
		$following=$row_show['followed_user'];
		$select_details="select * from users where user_id='$following'";
		$run_details=mysqli_query($con,$select_details);
		$row_details=mysqli_fetch_array($run_details);
		$prf_picture=$row_details['profile_pic'];
		$user_name=$row_details['user_name'];
		if(str_word_count($user_name)>=2){
			$username=explode(" ",$row_details['user_name'],3);
			$user_name=$username[0]." ".$username[1];
		}
		$userid=$row_details['user_id'];
		$uid=htmlentities(mysqli_real_escape_string($con,$_POST['uid']));
		$check_following="select * from following where following_user='$uid' and followed_user='$userid'";
		$run_check=mysqli_query($con,$check_following);
		$row_status=mysqli_fetch_array($run_check);
		$follow_status=$row_status['status'];
		$num=mysqli_num_rows($run_check);
		echo "
			<a href='profile.php?user_id=$userid' class='btn btn-default'  style='width:100%'><img src='$prf_picture' id='modalprfpic' >
			<p id='modalusername'>$user_name</p></a>
		";
		if($userid!=$uid){
			if($num>0){
				if($follow_status=="accepted"){
					echo "
						<button id='followingbtn1' followby='$uid' followto='$userid' name='followingbtn' class='btn btn-default btn-md followingbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
					"; 
				}else{
					echo "
						<button id='requestedbtn1' followby='$uid' followto='$userid' name='requestedbtn1' class='btn btn-default btn-md requestedbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>requested</span> &nbsp</button><br>
					"; 
				}
			}else{
				echo "
					<button id='followbtn1' followby='$uid' followto='$userid' name='followbtn' class='btn btn-info btn-md followbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
					</i></button><br>
				"; 
			}
		}
	}
}

//showing connections
if(isset($_POST['showconnections'])){
	global $con;
	$userid=htmlentities(mysqli_real_escape_string($con,$_POST['user_id']));
	$uid=htmlentities(mysqli_real_escape_string($con,$_POST['uid']));
	$show_connect="select * from connections where (connect_with='$userid' OR connect_by='$userid') AND status='accepted'";
	$run_connect=mysqli_query($con,$show_connect);
	
	while($row_show=mysqli_fetch_array($run_connect)){
		$userid=htmlentities(mysqli_real_escape_string($con,$_POST['user_id']));
		$connected_with=$row_show['connect_with'];
		$connected_by=$row_show['connect_by'];
		if($connected_with==$userid){
			$connected=$connected_by;
		}else{
			$connected=$connected_with;
		}
		$select_details="select * from users where user_id='$connected'";
		$run_details=mysqli_query($con,$select_details);
		$row_details=mysqli_fetch_array($run_details);
		$prf_picture=$row_details['profile_pic'];
		$user_name=$row_details['user_name'];
		$desguser=$row_details['user_designation'];
		if(str_word_count($user_name)>=2){
			$username=explode(" ",$row_details['user_name'],3);
			$user_name=$username[0]." ".$username[1];
		}
		$userid=$row_details['user_id'];
		$uid=$uid=htmlentities(mysqli_real_escape_string($con,$_POST['uid']));
		$check_connections="select * from connections where (connect_by='$uid' and connect_with='$userid') OR (connect_by='$userid' and connect_with='$uid')";
		$run_check=mysqli_query($con,$check_connections);
		$row_connect=mysqli_fetch_array($run_check);
		$cnct_status=$row_connect['status'];
		$num3=mysqli_num_rows($run_check);
		echo "
			<a href='profile.php?user_id=$userid' class='btn btn-default'  style='width:100%'><img src='$prf_picture' id='modalprfpic' >
			<p id='modalusername'>$user_name</p></a>
		";
		if($userid != $uid){
			if($num3>0 and $cnct_status=="accepted"){
				echo "
					<button id='connectedbtn1' connectby='$uid' connectto='$userid' name='connectedbtn1' class='btn btn-default btn-md connectedbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'>connected &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
				"; 
			}elseif($num3>0 and $cnct_status=="requested"){
				echo "
					<button id='cnctrequestedbtn1' connectby='$uid' connectto='$userid' name='cnctrequestedbtn1' class='btn btn-default btn-md cnctrequestedbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'>connect rqstd</button><br>
				"; 
			}else{
				if($desguser=="org"){
					echo "
						<button id='connectbtn1' connectby='$uid' connectto='$userid' name='connectbtn1' class='btn btn-default btn-md connectbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'>connect &nbsp <i class='fa fa-plus' aria-hidden='true'></i></button><br>
					"; 
				}else{
					$check_following="select * from following where following_user='$uid' and followed_user='$userid'";
					$run_check=mysqli_query($con,$check_following);
					$num=mysqli_num_rows($run_check);
					$row_status=mysqli_fetch_array($run_check);
					$follow_status=$row_status['status'];
					if($userid!=$uid){
						if($num>0){
							if($follow_status=="accepted"){
								echo "
									<button id='followingbtn1' followby='$uid' followto='$userid' name='followingbtn' class='btn btn-default btn-md followingbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>following</span> &nbsp <i style='color:green;' class='fa fa-check' aria-hidden='true'></i></button><br>
								"; 
							}else{
								echo "
									<button id='requestedbtn1' followby='$uid' followto='$userid' name='requestedbtn1' class='btn btn-default btn-md requestedbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>requested</span> &nbsp</button><br>
								"; 
							}
						}else{
							echo "
								<button id='followbtn1' followby='$uid' followto='$userid' name='followbtn' class='btn btn-info btn-md followbtn1' style='display:;float:right;margin-right:1%;margin-top:3.5%;right:7%;position:absolute;width:110px;'><span id='follow'>follow</span> &nbsp <i class='fa fa-plus' aria-hidden='true'>
								</i></button><br>
							"; 
						}
					}
				}
			}
		}
	}
														
}
?>
<script type="text/javascript">
	//follow
	$('.followbtn1').click(function(){
		var followby=$(this).attr('followby');
		var followto=$(this).attr('followto');
		$.ajax({
			url:'functions/operations.php',
			data:'insertfollow=1&followby='+followby+'&followto='+followto,
			type:'post',
			success:function(res){
				showFollowers();
				showFollowing();
				showConnections();
			}
		});
		return;
	});
	//unfollow
	$('.followingbtn1').click(function(){
		var followby=$(this).attr('followby');
		var followto=$(this).attr('followto');
		$.ajax({
			url:'functions/operations.php',
			data:'unfollowuser=1&followby='+followby+'&followto='+followto,
			type:'post',
			success:function(res){
				showFollowers();
				showFollowing();
				showConnections();
			}
		});
		return;
	});
	//unfollow user through requested btn
	$('.requestedbtn1').click(function(){
		var followby=$(this).attr('followby');
		var followto=$(this).attr('followto');
		$.ajax({
			url:'functions/operations.php',
			data:'unfollowuser=1&followby='+followby+'&followto='+followto,
			type:'post',
			success:function(res){
				showFollowers();
				showFollowing();
				showConnections();
			}
		});
		return;
	});
	
	//connect
	$('.connectbtn1').click(function(){
		var connectby=$(this).attr('connectby');
		var connectto=$(this).attr('connectto');
		
		document.getElementById("mconnectby1").value=connectby;
		document.getElementById("mconnectwith1").value=connectto;

		var idmdl=document.getElementById("showConnectorsModal");
		$('.modal-backdrop').hide();
		idmdl.setAttribute("style","display:none;");
		$('#mshowconnectidmodal1').modal({
			show: true
		});
	});
	$('.connectedbtn1').click(function(){
		var connectby=$(this).attr('connectby');
		var connectto=$(this).attr('connectto');
		$.ajax({
			url:'functions/operations.php',
			data:'disconnectuser=1&connectby='+connectby+'&connectto='+connectto,
			type:'post',
			success:function(res){
				showFollowers();
				showFollowing();
				showConnections();
			}
		});
		return;
	});
	$('.cnctrequestedbtn1').click(function(){
		var connectby=$(this).attr('connectby');
		var connectto=$(this).attr('connectto');
		$.ajax({
			url:'functions/operations.php',
			data:'disconnectuser=1&connectby='+connectby+'&connectto='+connectto,
			type:'post',
			success:function(res){
				showFollowers();
				showFollowing();
				showConnections();
			}
		});
		return;
	});
	$('.msubconnectid1').click(function(){
		var connectby=document.getElementById("mconnectby1").value;
		var connectwith=document.getElementById("mconnectwith1").value;
		var idtoconnect=document.getElementById("idtoconnect1").value;
		var connecttocnt=document.getElementById("connecttocnt1").value;
		$.ajax({
			url:'functions/operations.php',
			data:'getconnected=1&connectby='+connectby+'&connectto='+connectwith+'&idtoconnect='+idtoconnect+'&connecttocnt='+connecttocnt,
			type:'post',
			success:function(res){
				//$('.showconnectidmodal').modal('hide');
				var idmdl=document.getElementById("mshowconnectidmodal1");
				$('.modal-backdrop').hide();
				idmdl.setAttribute("style","display:none;");
				$('#showConnectorsModal').modal({
					show: true
				});
				showFollowers();
				showFollowing();
				showConnections();
				$("#connecttocnt1").val("");
				$("#idtoconnect1").val("");
			}
		});
		return;
	});
</script>
<!-- SHOWING Connect to id  MODAL1 -->
<div class="modal fade mshowconnectidmodal1" id="mshowconnectidmodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="panel-title"><p><strong>ID to connect</strong></p></div>	
			</div>
			<div class="modal-body">
				<div class="alert alert-warning" style="text-align:center;display:none;">ID is required</div>
				<div class="alert alert-warning" style="text-align:center;display:none;">Description is required</div>
				<input type="text" id="mconnectby1" style="display:none" />
				<input type="text" id="mconnectwith1" style="display:none" />
				<label>ID Proof :</label>
				<input type="text" class="form-control" id="idtoconnect1" name="idtoconnect1" placeholder=" Your ID number in the org" required />
				<label>Decription :</label>
				<textarea type="text" class="form-control" rows="2" id="connecttocnt1" name="connecttocnt1" placeholder="Describe yourself which concerns the org to accept you..." style="resize:none;" required ></textarea><br>
				<span style="color:red;font-size:0.9em;">*Your Id is something which represents you in the org.</span>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-info msubconnectid1" name="msubconnectid1" id="msubconnectid1" style="width:130px;float:right;" value="submit"/>
				<button class='btn btn-default' type='button' data-dismiss='modal' id='modalclose' style="float:right;margin-right:2%;">Cancel</button>
			</div>
		</div>
	</div>
</div>

<?php
//blocking the user
if(isset($_POST['blockuser'])){
	$blockuser = new blockUser();
	$blockuser->insertBlockUser();
}
class blockUser{
	function insertBlockUser(){
		global $con;
		$user_id=$_POST['user_id'];
		$uid=$_POST['uid'];
		$block_user="insert into blocked_users(blocked_by,blocked_user,blocked_date) values('$uid','$user_id',NOW())";
		$run_blockuser=mysqli_query($con,$block_user);
		if($run_blockuser){
			//deleting from notifications
			$select_notify_id1=mysqli_query($con,"select notify_id from connections where (connect_by='$user_id' AND connect_with='$uid') OR (connect_by='$uid' AND connect_with='$user_id')");
			$delete_connect1="delete from connections where (connect_by='$user_id' AND connect_with='$uid') OR (connect_by='$uid' AND connect_with='$user_id')";
			$run_delete1=mysqli_query($con,$delete_connect1);
			if($run_delete1){
				$row_notify_id1=mysqli_fetch_array($select_notify_id1);
				$notify_id=$row_notify_id1['notify_id'];
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
			}
			
			//deleting from following 1
			$select_notify_id2=mysqli_query($con,"select notify_id from following where following_user='$uid' AND followed_user='$user_id'");
			$delete_follow2="delete from following where following_user='$uid' AND followed_user='$user_id'";
			$run_delete2=mysqli_query($con,$delete_follow2);
			if($run_delete2){
				$row_notify_id2=mysqli_fetch_array($select_notify_id2);
				$notify_id=$row_notify_id2['notify_id'];
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
			}
			
			//deleting from following 2
			$select_notify_id3=mysqli_query($con,"select notify_id from following where following_user='$user_id' AND followed_user='$uid'");
			$delete_follow3="delete from following where following_user='$user_id' AND followed_user='$uid'";
			$run_delete3=mysqli_query($con,$delete_follow3);
			if($run_delete3){
				$row_notify_id3=mysqli_fetch_array($select_notify_id3);
				$notify_id=$row_notify_id3['notify_id'];
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
			}
			
			//disliking their likes from their posts
			$dislike=mysqli_query($con,"select * from likes where liked_by='$user_id' AND post_id in (select file_id from user_posts where user_id='$uid')");
			while($row_like=mysqli_fetch_array($dislike)){
				$postid=$row_like['post_id'];
				$notify_id=$row_like['likenotify_id'];
				$result=mysqli_query($con,"select * from user_posts where file_id=$postid");
				$row=mysqli_fetch_array($result);
				$n=$row['likes'];
				mysqli_query($con,"update user_posts set likes=$n-1 where file_id='$postid'");
				mysqli_query($con,"delete from likes where post_id='$postid' and liked_by='$user_id'");
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
			}
			//deleting their comments from their posts
			$deletecmnt1=mysqli_query($con,"select * from comments where user_id='$user_id' AND post_id in (select file_id from user_posts where user_id='$uid')");
			while($row_cmnt1=mysqli_fetch_array($deletecmnt1)){
				$postid=$row_cmnt1['post_id'];
				$notify_id=$row_cmnt1['cmntnotify_id'];
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
				mysqli_query($con,"delete from comments where user_id='$user_id' AND post_id='$postid'");
			}
			
			//disliking our likes from their posts
			$mydislike=mysqli_query($con,"select * from likes where liked_by='$uid' AND post_id in (select file_id from user_posts where user_id='$user_id')");
			while($row_like=mysqli_fetch_array($mydislike)){
				$postid=$row_like['post_id'];
				$notify_id=$row_like['likenotify_id'];
				$result=mysqli_query($con,"select * from user_posts where file_id=$postid");
				$row=mysqli_fetch_array($result);
				$n=$row['likes'];
				mysqli_query($con,"update user_posts set likes=$n-1 where file_id='$postid'");
				mysqli_query($con,"delete from likes where post_id='$postid' and liked_by='$uid'");
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
			}
			//deleting our comments from their posts
			$mydeletecmnt2=mysqli_query($con,"select * from comments where user_id='$uid' AND post_id in (select file_id from user_posts where user_id='$user_id')");
			while($row_cmnt2=mysqli_fetch_array($mydeletecmnt2)){
				$postid=$row_cmnt2['post_id'];
				$notify_id=$row_cmnt2['cmntnotify_id'];
				mysqli_query($con,"delete from notifications where notify_id='$notify_id'");
				mysqli_query($con,"delete from comments where user_id='$uid' AND post_id='$postid'");
			}
			
			//deleting the posts which we saved of them.
			$select_savedpost1=mysqli_query($con,"delete from saved_posts where user_id='$uid' AND post_id in (select file_id from user_posts where user_id='$user_id')");
			
			//deleting the posts which they saved of ours.
			$select_savedpost2=mysqli_query($con,"delete from saved_posts where user_id='$user_id' AND post_id in (select file_id from user_posts where user_id='$uid')");
			
			echo "<script>window.open('profile.php?user_id=$user_id','_self');</script>";
		}else{
			echo "<script>alert('something went wrong. Try again!');</script>";
		}
	}
}

//unblocking the user
if(isset($_POST['unblockuser'])){
	global $con;
	$user_id=$_POST['user_id'];
	$uid=$_POST['uid'];
	$unblock_user="delete from blocked_users where blocked_by='$uid' AND blocked_user='$user_id'";
	$run_unblockuser=mysqli_query($con,$unblock_user);
	if($run_unblockuser){
		echo "<script>window.open('profile.php?user_id=$user_id','_self');</script>";
	}else{
		echo "<script>alert('something went wrong. Try again!');</script>";
	}
}

//unblocking all blocked users at a single click
if(isset($_POST['unblockallusers'])){
	global $con;
	$uid=htmlentities(mysqli_real_escape_string($con,$_POST['uid']));
	$unblock_user="delete from blocked_users where blocked_by='$uid'";
	$run_unblockuser=mysqli_query($con,$unblock_user);
	if(!$run_unblockuser){
		echo "<script>alert('something went wrong. Try again!');</script>";
	}
}

//removing a single user from comment restrictions
if(isset($_POST['removerestrict'])){
	global $con;
	$restrictby=htmlentities(mysqli_real_escape_string($con,$_POST['restrictby']));
	$restrictto=htmlentities(mysqli_real_escape_string($con,$_POST['restrictto']));
	$unrestrict_user="delete from cmnt_restrictions where restricted_by='$restrictby' AND restricted_to='$restrictto'";
	$unrestrict_user=mysqli_query($con,$unrestrict_user);
	if(!$unrestrict_user){
		echo "<script>alert('something went wrong. Try again!');</script>";
	}
}

//releasing or unrestricting all restricted users at a single click
if(isset($_POST['unrestrictallusers'])){
	global $con;
	$uid=htmlentities(mysqli_real_escape_string($con,$_POST['uid']));
	$unrestrict_user="delete from cmnt_restrictions where restricted_by='$uid'";
	$unrestrict_user=mysqli_query($con,$unrestrict_user);
	if(!$unrestrict_user){
		echo "<script>alert('something went wrong. Try again!');</script>";
	}
}
?>