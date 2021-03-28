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
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Report</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="includes/stylesfile.css">
	<meta http-equiv='refresh' content='; URL=http://localhost/conectyu/home.php?user_id=<?php $user_id ?>'>
	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet"> <!-- signin link -->
	<link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<style>
body{
	background-color:#fcfcfc;
	overflow-x:hidden;
}
#returnlink{
	padding:5px;
}
#reportlinks a{
	font-family:bold;
	font-size:1.5em;
	display:block;
	width:100%;
	color:black;
	padding:10px;
	cursor:pointer;
}
#reportlinks a:hover{
	text-decoration:none;
	background-color:#e6e6e6;
}
label{
	padding:7px;
	display:table;
	color:black;
	width:100px;
	border-radius:30px;
}
input[type="file"]{
	display:none;
}

</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<!-- CODE FOR GENERAL SETTINGS -->
	
	<div class="row" style="margin-top:50px;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					<a href="profile.php?user_id=<?php echo $_SESSION['uid']; ?>" style="font-size:2em;color:black;" id="returnlink"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<span style="font-size:1.5em;font-family: 'Merienda One',cursive;margin-left:4.5%;"><strong>Report</strong></span>
				</div>
				<div class="panel-body">
					<div id="reportlinks">
						<a class="clink" data-toggle="collapse" href="#collapse1">Send feedback  <i class="fa fa-chevron-down" aria-hidden="true" style="font-size:0.8em;"></i></a>
						<div id="collapse1" class="panel-collapse collapse clpse1"> 
							<br>
							<form action="" method="post" enctype="multipart/form-data">
								<textarea class="form-control feedbacktext" name="feedbacktext" placeholder="Please share your feedback" style="resize:none"></textarea>
								<br>
								<label class='btn btn-default'>Add a pic<input type="file" style="display:none;" name="selfeedbkimg" /></label>
								<input type="submit" class="btn btn-info subfback" name="subfback" style="width:100px;margin-left:20px;" value="Submit" />
							</form>
						 </div>  
						 <hr>
						<a class="clink2" data-toggle="collapse" href="#collapse2">Report something  <i class="fa fa-chevron-down" aria-hidden="true" style="font-size:0.8em;"></i></a>
						 
						 <div id="collapse2" class="panel-collapse collapse clpse2"> 
							<br>
							<form action="" method="post" enctype="multipart/form-data">
								<textarea class="form-control reporttext" name="reporttext" placeholder="write something..." style="resize:none"></textarea>
								<br>
								<label class='btn btn-default'>Add a pic<input type='file' style="display:none;" name="selreportimg" /></label>
								<input type="submit" class="btn btn-info subreport" name="subreport" style="width:100px;margin-left:20px;" value="Submit" />
							</form>
						 </div>  
					 </div>
				</div>
				
				<!-- Alert showing the feedback sent successfully -->
				<div class="modal fade" id="fdbksentsucful" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="panel-title"><p><strong>Alert!</strong></p></div>	
							</div>
							<div class="modal-body">
								<h4 style="font-family:bold;">feedback sent successfully!</h4>
							</div>
							<div class="modal-footer">
								<button class='btn btn-info' type='button' data-dismiss='modal' style='align:center;' id='modalclose'>Okay</button>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Alert showing the report sent successfully -->
				<div class="modal fade" id="reportsentsucful" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="panel-title"><p><strong>Alert!</strong></p></div>	
							</div>
							<div class="modal-body">
								<h4 style="font-family:bold;">Your report sent successfully!</h4>
							</div>
							<div class="modal-footer">
								<button class='btn btn-info' type='button' data-dismiss='modal' style='align:center;' id='modalclose'>Okay</button>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Alert showing the null feedback error -->
				<div class="modal fade" id="nullfeedbackerr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="panel-title"><p><strong>Alert!</strong></p></div>	
							</div>
							<div class="modal-body">
								<h4 style="font-family:bold;">Please enter something!</h4>
							</div>
							<div class="modal-footer">
								<button class='btn btn-info' type='button' data-dismiss='modal' style='align:center;' id='modalclose'>Okay</button>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
//showing and hiding of the divs
	 $(function () {
		  $(".clink").on("click", function(){
			   $(".clpse1").toggle();
		  });
		  $('.haha1').hide();
		  $(".clink2").on("click", function(){
			   $(".clpse2").toggle();
		  });
		  $('.haha2').hide();
	 }); 

</script>
<?php
//inserting feedback
if(isset($_POST['subfback'])){
	global $con;
	$userid=$_SESSION['uid'];
	$feedbktxt=htmlentities(mysqli_real_escape_string($con,$_POST['feedbacktext']));
	$uploaded_file=$_FILES['selfeedbkimg']['name'];
	$file_tmp =$_FILES['selfeedbkimg']['tmp_name'];
	if(strlen($feedbktxt)==0){
		?>
			<script>
				function successful(){
					$('#nullfeedbackerr').modal({
						show: true
					});
				}
				successful();
			</script>
		<?php
	}else{
		if(strlen($feedbktxt)>=1 and strlen($file_tmp)==0){
			$insertfdbk=mysqli_query($con,"insert into feedbacks(user_id,type,feedback_text,feedback_pic,date) values('$userid','feedback','$feedbktxt','$uploaded_file',NOW())");
			?>
				<script>
					function successful(){
						$('#fdbksentsucful').modal({
							show: true
						});
					}
					successful();
				</script>
			<?php
		}elseif(strlen($file_tmp)!=0 and strlen($feedbktxt)>=1){
			$file_id=rand(10000000,99999999);
			move_uploaded_file($file_tmp,"uploadedFiles/$file_id.$uploaded_file");
			$insertfdbk=mysqli_query($con,"insert into feedbacks(user_id,type,feedback_text,feedback_pic,date) values('$userid','feedback','$feedbktxt','$file_id.$uploaded_file',NOW())");
			?>
				<script>
					function successful(){
						$('#fdbksentsucful').modal({
							show: true
						});
					}
					successful();
				</script>
			<?php
		} 
	}
}

//reporting something
if(isset($_POST['subreport'])){
	global $con;
	$userid=$_SESSION['uid'];
	$reporttext=htmlentities(mysqli_real_escape_string($con,$_POST['reporttext']));
	$uploaded_file=$_FILES['selreportimg']['name'];
	$file_tmp =$_FILES['selreportimg']['tmp_name'];
	if(strlen($reporttext)==0){
		?>
			<script>
				function successful(){
					$('#nullfeedbackerr').modal({
						show: true
					});
				}
				successful();
			</script>
		<?php
	}else{
		if(strlen($reporttext)>=1 and strlen($file_tmp)==0){
			$insertfdbk=mysqli_query($con,"insert into feedbacks(user_id,type,feedback_text,feedback_pic,date) values('$userid','report','$reporttext','$uploaded_file',NOW())");
			?>
				<script>
					function successful(){
						$('#reportsentsucful').modal({
							show: true
						});
					}
					successful();
				</script>
			<?php
		}elseif(strlen($file_tmp)!=0 and strlen($reporttext)>=1){
			$file_id=rand(10000000,99999999);
			move_uploaded_file($file_tmp,"uploadedFiles/$file_id.$uploaded_file");
			$insertfdbk=mysqli_query($con,"insert into feedbacks(user_id,type,feedback_text,feedback_pic,date) values('$userid','report','$reporttext','$file_id.$uploaded_file',NOW())");
			?>
				<script>
					function successful(){
						$('#reportsentsucful').modal({
							show: true
						});
					}
					successful();
				</script>
			<?php
		} 
	}
}
?>