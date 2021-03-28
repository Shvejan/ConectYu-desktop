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
	<title>ConectYu-ConectYu Score</title>
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
	height:90px;
}
#dropdownmenu{
	margin-left:50px;
	margin-top:30px;
}
.dropdown{
	cursor:pointer;
}
#userNotFound{
	margin-top:20px;
}
.filters{
	list-style-type:none;
	text-align:center;
	border:solid #e6e6e6 1px;
	margin-top:8px;
	padding:7px;
	border-radius:30px;
	cursor:pointer;
	background-color:white;
}
.filters a{
	color:#626663;
}
.filters a:hover{
	color:black;
	text-decoration:none;
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
						<a  href="expuserscore.php?user_id=<?php echo $_SESSION['uid']; ?>" id="conectyuscore" class="expnavlinks conectyuscore" style="color:black;"><i class="fa fa-bar-chart" aria-hidden="true" style="color:black;font-size:1.2em;"></i> ConectYu Score</a>
					</div>
					<div class="col-sm-3">
						<a href="exppages.php?user_id=<?php echo $_SESSION['uid']; ?>" id="pages" class="expnavlinks pages"><i class="fa fa-columns" aria-hidden="true" style="color:#626663;font-size:1.2em;"></i> Pages</a>
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
			<div id="searcharea">
				<form action="" method="get">
					<input type="text" class="form-control input-lg" id="searchconscore" name="searchconscore" placeholder="search for someone's ConectYu Score" style="border:;" value="<?php echo isset($_GET["searchconscore"]) ? htmlentities($_GET["searchconscore"]) : ''; ?>" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1"></input>
					<label id="scoresearchicon" name="scoresearchicon"><input type="submit" style="display:none;"name="scoresearchicon" id="scoresearchicon"></input><i type="submit" class="fa fa-search" aria-hidden="true" name="scoresearchicon" id="scoresearchicon"></i></label>
				</form>
			</div>
			<div class="row" id="filters">
				<div class="col-sm-3 col-xs-3">
					<li class="filters" id="allfilter"><a><input type="radio" style="display:none;" id="allradiobtn" name="expfilter" value="all" checked /> All</a></li>
				</div>
				<div class="col-sm-3 col-xs-3">
					<li class="filters" id="stufilter"><a><input type="radio" style="display:none;" id="sturadiobtn" name="expfilter" value="students" /> students</a></li>
				</div>
				<div class="col-sm-3 col-xs-3">
					<li class="filters" id="orgfilter" ><a><input type="radio" style="display:none;" id="orgradiobtn" name="expfilter" value="orgs" /> orgs</a></li>
				</div>
				<div class="col-sm-3 col-xs-3">
					<li class="filters" id="othfilter"><a><input type="radio" style="display:none;" id="othradiobtn" name="expfilter" value="others"  /> others</a></li>
				</div>
			</div>
			<script type="text/javascript">
				//checking the filter radio buttons
				$(document).ready(function(){
					$("#allradiobtn"). prop("checked", true);
					var abg=document.getElementById('allfilter');
					abg.setAttribute('style','background-color:#e6e6e6');
					var sbg=document.getElementById('stufilter');
					sbg.setAttribute('style','background-color:white');
					var obg=document.getElementById('orgfilter');
					obg.setAttribute('style','background-color:white');
					var othbg=document.getElementById('othfilter');
					othbg.setAttribute('style','background-color:white');
				});
				$('#allfilter').click(function(){
					$("#allradiobtn"). prop("checked", true);
					var abg=document.getElementById('allfilter');
					abg.setAttribute('style','background-color:#e6e6e6');
					var sbg=document.getElementById('stufilter');
					sbg.setAttribute('style','background-color:white');
					var obg=document.getElementById('orgfilter');
					obg.setAttribute('style','background-color:white');
					var othbg=document.getElementById('othfilter');
					othbg.setAttribute('style','background-color:white');
					var filval=document.getElementById('allradiobtn').value;
					/*if(document.getElementById('allradiobtn').checked){
						var filval=document.getElementById('allradiobtn').value;
					}else if(document.getElementById('sturadiobtn').checked){
						var filval=document.getElementById('sturadiobtn').value;
					}else if(document.getElementById('orgradiobtn').checked){
						var filval=document.getElementById('orgradiobtn').value;
					}else if(document.getElementById('othradiobtn').checked){
						var filval=document.getElementById('othradiobtn').value;
					}*/
					
					var inp=document.getElementById('searchconscore').value;
					var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
					if(inp==""){
						var notFound=document.getElementById('userNotFound');
						notFound.setAttribute('style', 'display:none;');
						//defaultusercredits();
					}else{
						$.ajax({
							url:'functions/functions.php',
							data:'searchscore=1&'+'search_user='+inp+'&filter='+filval+'&user_id='+user_id,
							type:'post',
							async:false,
							success:function(res){
								$('#searchconscore').val(inp);
								$('.userswcredits').html('');
								$('.userswcredits').html(res);
								var ducredits=document.getElementById('defaultuserscredits');
								ducredits.setAttribute('style','display:none');
							}
						});
					}
					return;
				});
				$('#stufilter').click(function(){
					$("#sturadiobtn"). prop("checked", true);
					var abg=document.getElementById('allfilter');
					abg.setAttribute('style','background-color:white');
					var sbg=document.getElementById('stufilter');
					sbg.setAttribute('style','background-color:#e6e6e6');
					var obg=document.getElementById('orgfilter');
					obg.setAttribute('style','background-color:white');
					var othbg=document.getElementById('othfilter');
					othbg.setAttribute('style','background-color:white');
					var filval=document.getElementById('sturadiobtn').value;
					/*if(document.getElementById('allradiobtn').checked){
						var filval=document.getElementById('allradiobtn').value;
					}else if(document.getElementById('sturadiobtn').checked){
						var filval=document.getElementById('sturadiobtn').value;
					}else if(document.getElementById('orgradiobtn').checked){
						var filval=document.getElementById('orgradiobtn').value;
					}else if(document.getElementById('othradiobtn').checked){
						var filval=document.getElementById('othradiobtn').value;
					}*/
					
					var inp=document.getElementById('searchconscore').value;
					var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
					if(inp==""){
						var notFound=document.getElementById('userNotFound');
						notFound.setAttribute('style', 'display:none;');
						//defaultusercredits();
					}else{
						$.ajax({
							url:'functions/functions.php',
							data:'searchscore=1&'+'search_user='+inp+'&filter='+filval+'&user_id='+user_id,
							type:'post',
							async:false,
							success:function(res){
								$('#searchconscore').val(inp);
								$('.userswcredits').html('');
								$('.userswcredits').html(res);
								var ducredits=document.getElementById('defaultuserscredits');
								ducredits.setAttribute('style','display:none');
							}
						});
					}
					return;
				});
				$('#orgfilter').click(function(){
					$("#orgradiobtn"). prop("checked", true);
					var abg=document.getElementById('allfilter');
					abg.setAttribute('style','background-color:white');
					var sbg=document.getElementById('stufilter');
					sbg.setAttribute('style','background-color:white');
					var obg=document.getElementById('orgfilter');
					obg.setAttribute('style','background-color:#e6e6e6');
					var othbg=document.getElementById('othfilter');
					othbg.setAttribute('style','background-color:white');
					var filval=document.getElementById('orgradiobtn').value;
					/*if(document.getElementById('allradiobtn').checked){
						var filval=document.getElementById('allradiobtn').value;
					}else if(document.getElementById('sturadiobtn').checked){
						var filval=document.getElementById('sturadiobtn').value;
					}else if(document.getElementById('orgradiobtn').checked){
						var filval=document.getElementById('orgradiobtn').value;
					}else if(document.getElementById('othradiobtn').checked){
						var filval=document.getElementById('othradiobtn').value;
					}*/
					
					var inp=document.getElementById('searchconscore').value;
					var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
					if(inp==""){
						var notFound=document.getElementById('userNotFound');
						notFound.setAttribute('style', 'display:none;');
						//defaultusercredits();
					}else{
						$.ajax({
							url:'functions/functions.php',
							data:'searchscore=1&'+'search_user='+inp+'&filter='+filval+'&user_id='+user_id,
							type:'post',
							async:false,
							success:function(res){
								$('#searchconscore').val(inp);
								$('.userswcredits').html('');
								$('.userswcredits').html(res);
								var ducredits=document.getElementById('defaultuserscredits');
								ducredits.setAttribute('style','display:none');
							}
						});
					}
					return;
				});
				$('#othfilter').click(function(){
					$("#othradiobtn"). prop("checked", true);
					var abg=document.getElementById('allfilter');
					abg.setAttribute('style','background-color:white');
					var sbg=document.getElementById('stufilter');
					sbg.setAttribute('style','background-color:white');
					var obg=document.getElementById('orgfilter');
					obg.setAttribute('style','background-color:white');
					var othbg=document.getElementById('othfilter');
					othbg.setAttribute('style','background-color:#e6e6e6');
					var filval=document.getElementById('othradiobtn').value;
					/*if(document.getElementById('allradiobtn').checked){
						var filval=document.getElementById('allradiobtn').value;
					}else if(document.getElementById('sturadiobtn').checked){
						var filval=document.getElementById('sturadiobtn').value;
					}else if(document.getElementById('orgradiobtn').checked){
						var filval=document.getElementById('orgradiobtn').value;
					}else if(document.getElementById('othradiobtn').checked){
						var filval=document.getElementById('othradiobtn').value;
					}*/
					
					var inp=document.getElementById('searchconscore').value;
					var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
					if(inp==""){
						var notFound=document.getElementById('userNotFound');
						notFound.setAttribute('style', 'display:none;');
						//defaultusercredits();
					}else{
						$.ajax({
							url:'functions/functions.php',
							data:'searchscore=1&'+'search_user='+inp+'&filter='+filval+'&user_id='+user_id,
							type:'post',
							async:false,
							success:function(res){
								$('#searchconscore').val(inp);
								$('.userswcredits').html('');
								$('.userswcredits').html(res);
								var ducredits=document.getElementById('defaultuserscredits');
								ducredits.setAttribute('style','display:none');
							}
						});
					}
					return;
				});
				//searching for the users with conectyu scores
				$("#searchconscore").keyup(function(){
					if(document.getElementById('allradiobtn').checked){
						var filval=document.getElementById('allradiobtn').value;
					}else if(document.getElementById('sturadiobtn').checked){
						var filval=document.getElementById('sturadiobtn').value;
					}else if(document.getElementById('orgradiobtn').checked){
						var filval=document.getElementById('orgradiobtn').value;
					}else if(document.getElementById('othradiobtn').checked){
						var filval=document.getElementById('othradiobtn').value;
					}
					
					var inp=document.getElementById('searchconscore').value;
					var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
					if(inp==""){
						var notFound=document.getElementById('userNotFound');
						notFound.setAttribute('style', 'display:none;');
						defaultusercredits();
					}else{
						$.ajax({
							url:'functions/functions.php',
							data:'searchscore=1&'+'search_user='+inp+'&filter='+filval+'&user_id='+user_id,
							type:'post',
							async:false,
							success:function(res){
								$('#searchconscore').val(inp);
								$('.userswcredits').html('');
								$('.userswcredits').html(res);
								var ducredits=document.getElementById('defaultuserscredits');
								ducredits.setAttribute('style','display:none');
							}
						});
					}
					return;
				});
			</script>
			<div class='alert alert-warning' id="userNotFound" style="display:none;">
				<strong>No results found for the searched user!</strong>
			</div>
			<br>
			
			<div class="row" id="defaultuserscredits" style="display:;">
				<?php
					global $con;
					$user_id=$_SESSION['uid'];
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
						}else{
							echo "
								<script type='text/javascript'> 
									var notFound=document.getElementById('userNotFound');
									notFound.setAttribute('style', 'display:display;');
								</script>
								";
						}
					
					
					}
				?>
			</div>
			
			<div class=" row userswcredits">
				<?php
					if(isset($_GET['scoresearchicon'])){
						?>
							<script type='text/javascript'>
								var ducredits=document.getElementById('defaultuserscredits');
								ducredits.setAttribute('style','display:none');
							</script>
						<?php
						
						$sruserscore = new UserCredits();
						$sruserscore->showUserCredits();
					}
				?>
			</div>
		</div>
		<div class="cols-m-4">
		</div>
		
		<!--  Sharing Profile As Message Modal -->
		<div class="modal fade" id="shsrchcreditProfAsMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
		
		
	</div>
	
</body>
</html>
<script type="text/javascript">
	function defaultusercredits(){
		var user_id=<?php echo json_encode($_SESSION['uid']); ?>;
		$.ajax({
			url:'functions/functions.php',
			data:'defaultuserscore=1&user_id='+user_id,
			type:'post',
			async:false,
			success:function(res){
				$('.userswcredits').html(res);
			}
		});
	}
</script>
<?php

?>
