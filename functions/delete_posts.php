<?php
session_start();
include("../includes/connection.php");
?>
<?php
//deleting the achievement
if(isset($_GET['achieve_id'])){
	global $con;
	$achieve_id=$_GET['achieve_id'];
	$user_id=$_SESSION['uid'];
	$del_achieve="delete from achievements where achieve_id='$achieve_id' AND user_id='$user_id'";
	$run_del=mysqli_query($con,$del_achieve);
	if($run_del){
		$delete_from_verifications=mysqli_query($con,"delete from verification_requests where verification_id='$achieve_id' AND status='Not Verified'");
		echo "<script>window.open('../profile.php?user_id=$user_id','_self');</script>";
	}
}

//deleting a Skill
if(isset($_GET['skill_id'])){
	global $con;
	$skill_id=$_GET['skill_id'];
	$user_id=$_SESSION['uid'];
	$del_skill="delete from skills where skill_id='$skill_id' AND user_id='$user_id'";
	$run_del=mysqli_query($con,$del_skill);
	echo "<script>window.open('../profile.php?user_id=$user_id','_self');</script>";
}

//deleting a education details
if(isset($_GET['edu_id'])){
	global $con;
	$edu_id=$_GET['edu_id'];
	$user_id=$_SESSION['uid'];
	$del_edu="delete from education where edu_id='$edu_id' AND user_id='$user_id'";
	$run_del=mysqli_query($con,$del_edu);
	echo "<script>window.open('../edit_profile.php?user_id=$user_id','_self');</script>";
}

//deleting a work Experience details
if(isset($_GET['work_id'])){
	global $con;
	$work_id=$_GET['work_id'];
	$user_id=$_SESSION['uid'];
	$del_work="delete from work_experience where work_id='$work_id' AND user_id='$user_id'";
	$run_del=mysqli_query($con,$del_work);
	echo "<script>window.open('../edit_profile.php?user_id=$user_id','_self');</script>";
}
?>