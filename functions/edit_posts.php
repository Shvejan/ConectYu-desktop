<?php
session_start();
include("../includes/connection.php");
?>

<?php

if(isset($_GET['editedubtn'])){
				echo "<script>alert();</script>";

	$editedu = new EditEducation();
	$editedu->EditEdu();
}
class EditEducation{
	function EditEdu(){
		global $con;
		$user_id=$_SESSION['uid'];
		$institute_name = htmlentities(mysqli_real_escape_string($con,$_POST['institute_name']));
		$s_year = htmlentities(mysqli_real_escape_string($con,$_POST['start_year']));
		$e_year = htmlentities(mysqli_real_escape_string($con,$_POST['end_year']));
		
		$edit_edu="update students set institute_name='$institute_name' where 
		user_id='$user_id'";
		$run_insert=mysqli_query($con,$edit_edu);
		if($run_insert){
			echo "<script>alert();</script>";
			echo "<script>window.open('edit_profile.php?user_id=$user_id','_self');</script>";
		}
	}
}
						
?>