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
	<title>ConectYu-Messages</title>
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
	<link href="https://fonts.googleapis.com/css?family=Akronim&display=swap" rel="stylesheet"> <!-- event name font-family: 'Akronim', cursive; -->
	<link href="https://fonts.googleapis.com/css?family=Sriracha|Courgette&display=swap" rel="stylesheet">
	
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

#addimg{
	width:20%;
}
input[type="file"]{
	display:none;
}
#camerapic{
	width:30px;
	height:25px;
}
#hosteventbtn,#reset{
	width:20%;
	float:right;
	margin-right:2%;
}
label{
	font-family: 'Courgette', cursive;
	font-size:1.2em;
}
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<h2 style="font-family: 'Sriracha', cursive;" >Host your event!</h2>
				</div>
				<div class="panel-body">
					<form method="post" action="" enctype="multipart/form-data">
						<label>Name of your event :</label>
						<input type="text" class="form-control" name="eventname" id="eventname" width="100%" placeholder="Enter the name of your event" required /><br>
						<label>Description :</label>
						<textarea type="text" class="form-control" rows="10" name="eventdesc" id="eventdesc" width="100%" placeholder="write about your event" required ></textarea><br>
						<label>Date of your event :</label>
						<input type="date" class="form-control" name="eventdate" id="eventdate" width="100%" placeholder="Enter the date of your event" required /><br>
						<label>Venue :</label>
						<textarea type="text" class="form-control" rows="3" name="eventvenue" id="eventvenue" placeholder="Enter the venue of your event" required></textarea><br>
						<label>Contact details :</label>
						<textarea type="text" class="form-control" rows="3" name="eventcontact" id="eventcontact" placeholder="Enter your contact details"></textarea><br>
						<label>Link for event registration (if there) :</label>
						<input type="url" class="form-control" name="eventlink" id="eventlink" placeholder="Give your registration link here (if there)" ><br>
						<label>Add event pictures :</label>
						<label class="btn btn-default" style="margin-left:50%;">Photo/video &nbsp <img src="images/camerapic.jpg" id="camerapic" />
						<input type="file" name="eventimage[]" id="addimg"  size="100" multiple="multiple" /></label><br><br>
						<script>
							function readURL(input) {
							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#previews')
										.attr('src', e.target.result)
										.width(150)
										.height(200);
								};

								reader.readAsDataURL(input.files[0]);
								
								
							}
						}
						function previewImages() {

						  var preview = document.querySelector('#previews');
						  
						  if (this.files) {
							[].forEach.call(this.files, readAndPreview);
						  }

						  function readAndPreview(file) {

							// Make sure `file.name` matches our extensions criteria
							if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
							  return alert(file.name + " is not an image");
							} // else...
							
							var reader = new FileReader();
							
							reader.addEventListener("load", function() {
							  var image = new Image();
							  image.height = 100;
							  image.title  = file.name;
							  image.src    = this.result;
							  preview.appendChild(image);
							});
							
							reader.readAsDataURL(file);
							
						  }

						}

						document.querySelector('#addimg').addEventListener("change", previewImages);
						

						</script>
						<div id="previews"></div><br><br>
						
						
						<input type="submit" class="btn btn-info"  name="hosteventbtn" id="hosteventbtn" value="Submit" />
						<input type="reset" value="Reset" id="reset" class="btn btn-deafult" />
						
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
$eventimg='';
	if(isset($_POST['hosteventbtn'])){
		$inrtevnt=new insertEvent();
		$inrtevnt->InsertEventFun();
	}
class insertEvent{
	function InsertEventFun(){
		global $con;
		$user_id=$_SESSION['uid'];
		
		$event_name=htmlentities(mysqli_real_escape_string($con,$_POST['eventname']));
		$event_desc=htmlentities(mysqli_real_escape_string($con,$_POST['eventdesc']));
		$event_date=htmlentities(mysqli_real_escape_string($con,$_POST['eventdate']));
		$event_venue=htmlentities(mysqli_real_escape_string($con,$_POST['eventvenue']));
		$event_con=htmlentities(mysqli_real_escape_string($con,$_POST['eventcontact']));
		$event_link=htmlentities(mysqli_real_escape_string($con,$_POST['eventlink']));
		
		
		$uploaded_files=$_FILES['eventimage']['name'];
		$file_tmp =$_FILES['eventimage']['tmp_name'][0];
		if((count($_FILES['eventimage']['name'])>0 and count($_FILES['eventimage']['name'])<3) and strlen($file_tmp)!=0){
			$file_id=rand(10000000,99999999);
			for($i=0;$i<count($_FILES['eventimage']['name']);$i++ ){
				$uploaded_file = $_FILES['eventimage']['name'][$i];
				$file_tmp =$_FILES['eventimage']['tmp_name'][$i];
				move_uploaded_file($file_tmp,"uploadedFiles/$uploaded_file.$file_id");
				$insert_file="insert into event_posts(user_id,event_image,file_id,event_reg_date) values('$user_id','$uploaded_file.$file_id','$file_id',NOW())";
				$run_file=mysqli_query($con,$insert_file);
			}
			$insert_event="insert into events (user_id,event_name,event_desc,event_venue,event_contact,event_date,event_link,file_id,event_reg_date) values('$user_id','$event_name','$event_desc','$event_venue','$event_con','$event_date','$event_link','$file_id',NOW())";
			$run_event=mysqli_query($con,$insert_event);
			if($run_file and $run_event){
				
				echo "<script>window.open('profile.php?user_id=$user_id','_self');</script>";
			}else{
				echo "<script>alert('error occurred.Try again!');</script>";
				echo "<script>window.open('hostevent.php?user_id=$user_id','_self');</script>";
			}
		}else{
			echo "<script>alert('Add upto 2 images to your post!');</script>";
		}
	}
}
?>