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
	<title>ConectYu - Event Info</title>
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
	<link href="https://fonts.googleapis.com/css?family=Cantata+One|Kaushan+Script|Merienda+One|Philosopher|Yeseva+One&display=swap" rel="stylesheet">
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}

#homeheader{
	width:100%;
	background-color:white;
	padding:10px;
}
#logo{
	font-family:'Shrikhand', cursive;
	font-size: 2em; 
	letter-spacing: 0px;  
	text-shadow: 1px 1px 2px #c4c4c4;
	color:black;
	float:right;
}
#logo:hover{
	text-decoration:none;
}
#searchbox{
	width:80%;
	height:40px;
	border:2px solid #e6e6e6;
	border-radius:5px;
	padding:10px;
}
#search_btn{
	height:39.5px;
	margin-left:-4px;
	width:20%;
}
#search_btn:hover{
	background-color:#bdbbbb;
}
#navlist{
	list-style-type:none;
}
#navlist li a{
	float:left;
	color:#626663;
	display:block;
	width:50px;
	margin-top:7px;
	margin-right:2%;
	padding-left:12px;
	font-size:20px;
}
#navlist li a:hover{
	color:black;
}
#menuhamburger{
	float:right;
	margin-right:2%;
	margin-top:3px;
	cursor:pointer;
}
#prf_pic{
	width:40px;
	height:40px;
	border-radius:20px;
}
#prfpiclink{
	margin-left:81%;
}

#event_desc,#event_contact,#event_venue{
	max-width:95%;
	overflow:hidden;
	white-space: pre-wrap;
	font-size:1.5em;
	font-family: 'Philosopher', sans-serif;
	background-color:white;
	border:none;
}
#venue,#contactinfor,#link{
	font-family: 'Merienda One', cursive;
	font-size:1.7em;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
<?php
	global $con;
	$user_id=$_GET['user_id'];
	$event_id=$_GET['event_id'];
	$select_event_details="select * from events where user_id='$user_id' AND event_id='$event_id'";
	$run_event_details=mysqli_query($con,$select_event_details);
	$row_event=mysqli_fetch_array($run_event_details);
	
	$event_name=$row_event['event_name'];
	$event_desc=$row_event['event_desc'];
	$event_date=$row_event['event_date'];
	$event_con=$row_event['event_contact'];
	$event_venue=$row_event['event_venue'];
	$event_link=$row_event['event_link'];
	$file_id=$row_event['file_id'];
	
	date_default_timezone_set("Asia/Kolkata"); 
	$input = strtotime($event_date); 
	$today=strtotime(date("Y-m-d H:i:s",time()));
	if($input>$today){
		$checkdate="Yes";
	}else{
		$checkdate="No";
	}
	$date = date('d M, Y ', $input);
	
	$select_event_img="select * from event_posts where (user_id='$user_id' AND file_id='$file_id')";
	$run_event_img=mysqli_query($con,$select_event_img);
	$num_imgs=mysqli_num_rows($run_event_img);
	

?>

	<div class="row" style="margin-top:50px">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3 style="font-family: 'Cantata One', serif;font-size:2em;">Complete details about the event!</h3><hr>
					
					<h2 style="font-family: 'Kaushan Script', cursive;text-align:center;color:#1da6f0"><?php echo $event_name;?></h2><br>
					<?php if($num_imgs==1){
						$row_event_img=mysqli_fetch_array($run_event_img);
						$image=$row_event_img['event_image'];
					?>
						<div class="row">
							<div class="col-sm-12">
								<img src="uploadedFiles/<?php echo $image; ?>" style="width:80%;height:60%;margin-left:10%;border:solid 3px #e6e6e6;" />
							</div>
						</div>
					<?php }elseif($num_imgs==2){
							while($row_event_img=mysqli_fetch_array($run_event_img)){
								$image=$row_event_img['event_image'];
							echo"
								<img src='uploadedFiles/$image' style='width:80%;height:50%;border:solid #e6e6e6 3px;margin-left:10%;' />
								<br><br>";
							
							}
						}
					?>
					
					<pre id="event_desc"><?php echo $event_desc; ?></pre><br>
					<?php if($checkdate != "Yes"){ ?>
						<h3 style="font-family: 'Yeseva One', cursive;font-size:1.6em;color:#f01d71">The event is hosted on <?php echo $date; ?></h3>
					<?php }else{ ?>
						<h3 style="font-family: 'Yeseva One', cursive;font-size:1.6em;color:#f01d71">The event is going to host on <?php echo $date; ?></h3>
					<?php } ?>
					<label id="venue">Venue :</label><br>
					<pre id="event_venue"><?php echo $event_venue; ?></pre><br>
					<label id="contactinfor">Contact :</label><br>
					<?php if($event_con != null){?>
					<pre id="event_contact"><?php echo $event_con; ?></pre><br>
					<?php } 
						if($event_link != null){
					?>
						<label id="link">You can register through the following link </label><br>
						<a href="<?php echo $event_link; ?>" id="event_url" style="font-family: 'Philosopher', sans-serif;font-size:1.5em;"><?php echo $event_link; ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
		</div>
	</div>
</body>
</html>