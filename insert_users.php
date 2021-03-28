<?php
include("includes/connection.php");
	if(isset($_POST['sign_up'])){
		
		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['f_name']));
		$last_name = htmlentities(mysqli_real_escape_string($con,$_POST['l_name']));
		$user_email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
		$user_pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
		$user_dob = htmlentities(mysqli_real_escape_string($con,$_POST['u_dob']));
		$user_gender = htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
		$user_country = htmlentities(mysqli_real_escape_string($con,$_POST['u_country']));
		$user_pincode = htmlentities(mysqli_real_escape_string($con,$_POST['u_pin']));
		$newgid=sprintf('%05d',rand(100,999));
		$user_id = strtolower($first_name.".".$last_name.$newgid);
		$user_name = $first_name." ".$last_name;
		$_SESSION['name']=$first_name;
		
		//Signup_Error class object
		$eObj = new Signup_Error();
		
		//Checking Email validity
		if(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
			$eObj->emailNotValid();	
		}
		
		//email already exists error
		$check_email = "select * from users where user_email='$user_email'";
		$run_check_email=mysqli_query($con,$check_email);
		$email_num=mysqli_num_rows($run_check_email);
		if($email_num>=1){	
			$eObj->emailExists();
		}else{
			$eObj->EmailNotExists();
		}
		
		// checking Password length is <8 or >16 error
		if(strlen($user_pass)<8 or strlen($user_pass)>16){
			$eObj->passNotValid();
		}
		
		//checking date of birth
		$endate = $user_dob;
		$todays_date = date("Y-m-d");	
		$today = strtotime($todays_date);
		$endate = strtotime($endate);
		if ($endate > $today) {
			$eObj->dobNotValid();
		} 
		
		//checking gender
		if($user_gender=='Select your Gender'){
			$eObj->genderNotValid();
		}else{
			if($user_gender=='male'){
				$default_prfpic="images/maleprfpic.jpg";
			}elseif($user_gender=='female'){
				$default_prfpic="images/femaleprfpic.jpg";
			}else{
				$default_prfpic="images/othersprfpic.jpg";
			}
		}
		
		//Checking Country
		if($user_country=='Select your country'){
			$eObj->countryNotValid();
		}
		
		//checking Pincode
		if(strlen($user_pincode)!=6){
			$eObj->pinNotValid();
		}
		
		/*$insert_user="insert into users(user_id,user_name,f_name,l_name,user_email,user_pass,user_dob,user_gender,user_country,user_pincode,
		profile_pic,reg_date) values('$user_id','$user_name','$first_name','$last_name','$user_email','$user_pass','$user_dob','$user_gender',
		'$user_country','$user_pincode','$default_prfpic',NOW())";
		
		$run_inser_user=mysqli_query($con,$insert_user);
		if($run_inser_user){
			echo "<script>window.open('signup2.php','_self');</script>";
		}
		else{
			echo "error occurred!";
		}
		*/
		echo "<script>window.open('signup2.php','_self');</script>";
		
	}

?>
<?php
class Signup_Error{
	function emailExists(){
		echo "
				<script type='text/javascript'>
					var emailError=document.getElementById('emailExists');
					emailError.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
	}
	function emailNotExists(){
		echo "
				<script type='text/javascript'>
					var emailError=document.getElementById('error');
					emailError.setAttribute('style', 'display:none;');
				</script>
			";
	}
	
	function emailNotValid(){
		echo "
				<script type='text/javascript'>
					var emailError=document.getElementById('emailNotValid');
					emailError.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
	}
	function passNotValid(){
		echo "
				<script type='text/javascript'>
					var emailError=document.getElementById('passwordNotValid');
					emailError.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
	}
	function dobNotValid(){
		echo "
				<script type='text/javascript'>
					var dobError=document.getElementById('dobNotValid');
					dobError.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
	}
	function genderNotValid(){
		echo "
				<script type='text/javascript'>
					var passError=document.getElementById('selectGender');
					passError.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
	}
	function countryNotValid(){
		echo "
				<script type='text/javascript'>
					var countryError=document.getElementById('selectCountry');
					countryError.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
	}
	function pinNotValid(){
		echo "
				<script type='text/javascript'>
					var pinError=document.getElementById('pinNotValid');
					pinError.setAttribute('style', 'display:display;');
				</script>
			";
			exit();
	}
	
}

?>