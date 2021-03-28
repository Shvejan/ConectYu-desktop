<?php
session_start();
include("../includes/connection.php");
?>
<?php
if(isset($_GET['user_id']) and !isset($_GET['remove_user'])){
	global $con;
	$user_id=$_GET['user_id'];
	$uid=$_SESSION['uid'];
	if($user_id != $uid){
		$check_user="select * from recent_searches where checked_for='$user_id' AND checked_by='$uid'";
		$run_check_user=mysqli_query($con,$check_user);
		$num_users=mysqli_num_rows($run_check_user);

		if($num_users == 0){
			$insert_user="insert into recent_searches(checked_by,checked_for,user_type,checked_date) values('$uid','$user_id','user',NOW())";
			$run_insert_user=mysqli_query($con,$insert_user);
			
			if($run_insert_user){
				echo "<script>window.open('../profile.php?user_id=$user_id','_self');</script>";
			}
		}else{
			$update_user="update recent_searches set checked_date=NOW() where checked_by='$uid' AND checked_for='$user_id'";
			$run_update_user=mysqli_query($con,$update_user);
			
			if($run_update_user){
				echo "<script>window.open('../profile.php?user_id=$user_id','_self');</script>";
			}
		}
	}else{
		echo "<script>window.open('../profile.php?user_id=$user_id','_self');</script>";
	}
}

if(isset($_GET['page_id']) and !isset($_GET['remove_user'])){
	global $con;
	$user_id=$_GET['page_id'];
	$select_pgcreated_id=mysqli_query($con,"select created_by_id from pages where page_id='$user_id'");
	$row_pg=mysqli_fetch_array($select_pgcreated_id);
	$page_created_by=$row_pg['created_by_id'];
	$uid=$_SESSION['uid'];
	if($page_created_by != $uid){
		$check_user="select * from recent_searches where checked_for='$user_id' AND checked_by='$uid'";
		$run_check_user=mysqli_query($con,$check_user);
		$num_users=mysqli_num_rows($run_check_user);

		if($num_users == 0){
			$insert_user="insert into recent_searches(checked_by,checked_for,user_type,checked_date) values('$uid','$user_id','page',NOW())";
			$run_insert_user=mysqli_query($con,$insert_user);
			
			if($run_insert_user){
				echo "<script>window.open('../pageprofile.php?page_id=$user_id','_self');</script>";
			}
		}else{
			$update_user="update recent_searches set checked_date=NOW() where checked_by='$uid' AND checked_for='$user_id'";
			$run_update_user=mysqli_query($con,$update_user);
			
			if($run_update_user){
				echo "<script>window.open('../pageprofile.php?page_id=$user_id','_self');</script>";
			}
		}
	}else{
		echo "<script>window.open('../pageprofile.php?page_id=$user_id','_self');</script>";
	}
}

if(isset($_GET['user_id']) and isset($_GET['remove_user'])){
	global $con;
	$user_id=$_GET['user_id'];
	$uid=$_SESSION['uid'];
	$delete_user="delete from recent_searches where checked_by='$uid' AND checked_for='$user_id'";
	$run_delete_user=mysqli_query($con,$delete_user);
	
	if($run_delete_user){
		echo "<script>window.open('../find_people.php','_self');</script>";
	}
}


?>