<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ConectYu-Signup</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	<link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">	<!-- Tagline -->
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet">   <!-- Signup link-->
</head>
<style>
body{
	overflow-x:hidden;
}
#logo{
	font-family:'Shrikhand', cursive;
	font-size: 2.5em; 
	letter-spacing: 0px;  
	text-shadow: 1px 1px 2px #c4c4c4;
	margin-left:100px;
}
#heading{
	margin-top:25px;
	font-family: 'Roboto Slab', serif;
}

.main-content{
		width:100%;
		height:100%;
		margin:10px auto;
		border-color:#fff;
		padding:40px 50px;
		
}
.input-group{
	width:100%;
}
#l_name{
	width:49%;
	float:right;
}
#f_name{
	width:49%;
}
#signup{
	width:80%;	
}
#signinlink{
	font-size:1.5em;
	text-align:center;
}
#error{
	width:100%;
}
</style>
<style>
@media only screen and (max-width: 760px) {  
	#heading{
		margin-top:0px;
	}
	#logo{
		text-align:center;
		margin-left:0px;
		margin-top:0px;
	}
	#col3{
		background-color:#e6e6e6;
		padding-top:10px;
		padding-bottom:10px;
		margin-bottom:0px;
	}
}
</style>
<body>
	<div class="row">
		<div class="col-sm-3" id="col3">
			<h1 href="" id="logo">ConectYu</h1>
		</div>
		<div class="col-sm-6">
			<div class="main-content">
					<div class="l-part">
						<form method="post" action="" name="signupForm">
							<h2 id="heading">Join <i>ConectYu</i> and become the best version of Yourself!</h2><br><br>
								<div class='alert alert-danger' id="emailExists" style="display:none;">
									<strong>This email already exists!</strong>
								</div>
								<div class='alert alert-danger' id="emailNotValid" style="display:none;">
									<strong>Invalid email!</strong>
								</div>
								<div class='alert alert-danger' id="passwordNotValid" style="display:none;">
									<strong>Your password must be 8-16 characters long!</strong>
								</div>
								<div class='alert alert-danger' id="dobNotValid" style="display:none;">
									<strong>please enter a valid date of birth!</strong>
								</div>
								<div class='alert alert-danger' id="selectGender" style="display:none;">
									<strong>Please select your gender!</strong>
								</div>
								<div class='alert alert-danger' id="selectCountry" style="display:none;">
									<strong>Please select your country!</strong>
								</div>
								<div class='alert alert-danger' id="pinNotValid" style="display:none;">
									<strong>Please enter a valid pincode!</strong>
								</div>
							<div class="input-group">
								<input type="text" name="f_name" class="form-control" id="f_name" placeholder="first name" required="required" 
								value="<?php echo isset($_POST["f_name"]) ? htmlentities($_POST["f_name"]) : ''; ?>"/>
								<input type="text" name="l_name" class="form-control" id="l_name" placeholder="last name" required="required"
								value="<?php echo isset($_POST["l_name"]) ? htmlentities($_POST["l_name"]) : ''; ?>"/>
							</div><br>
							<div class="input-group">
								<input type="email" name="u_email" class="form-control" placeholder="Enter your email" required="required" 
								value="<?php echo isset($_POST["u_email"]) ? htmlentities($_POST["u_email"]) : ''; ?>"/>
							</div><br>
							<div class="input-group">
								<input type="password" name="u_pass" class="form-control" placeholder="Choose your password" required="required" 
								value="<?php echo isset($_POST["u_pass"]) ? htmlentities($_POST["u_pass"]) : ''; ?>"/>
							</div><br>
							<div class="input-group">                                                                    
								<input type="date" name="u_dob" class="form-control" placeholder="Date of birth" required="required" data-toggle="tooltip"
								title="Date of birth" value="<?php echo isset($_POST["u_dob"]) ? htmlentities($_POST["u_dob"]) : ''; ?>"/>           
							</div><br>
							<div class="input-group">
								<select name="u_gender" id="u_gender" class="form-control input-md" required="required" 
								value="<?php echo isset($_POST["u_gender"]) ? htmlentities($_POST["u_gender"]) : ''; ?>"/>
									<option>Select your Gender</option>
									<option>male</option>
									<option >female</option>
									<option>others</option>
								</select>
							</div><br>
							<div class="input-group">
								<select name="u_country" class="form-control input-md" id="u_country" required="required">
									<option>Select your country</option>
									<option>Afghanistan</option>
									<option>Åland Islands</option>
									<option>Albania</option>
									<option>Algeria</option>
									<option>American Samoa</option>
									<option>Andorra</option>
									<option>Angola</option>
									<option>Anguilla</option>
									<option>Antarctica</option>
									<option>Antigua and Barbuda</option>
									<option>Argentina</option>
									<option>Armenia</option>
									<option>Aruba</option>
									<option>Australia</option>
									<option>Austria</option>
									<option>Azerbaijan</option>
									<option>Bahamas</option>
									<option>Bahrain</option>
									<option>Bangladesh</option>
									<option>Barbados</option>
									<option>Belarus</option>
									<option>Belgium</option>
									<option>Belize</option>
									<option>Benin</option>
									<option>Bermuda</option>
									<option>Bhutan</option>
									<option>Bolivia, Plurinational State of</option>
									<option>Bonaire, Sint Eustatius and Saba</option>
									<option>Bosnia and Herzegovina</option>
									<option>Botswana</option>
									<option>Bouvet Island</option>
									<option>Brazil</option>
									<option>British Indian Ocean Territory</option>
									<option>Brunei Darussalam</option>
									<option>Bulgaria</option>
									<option>Burkina Faso</option>
									<option>Burundi</option>
									<option>Cambodia</option>
									<option>Cameroon</option>
									<option>Canada</option>
									<option>Cape Verde</option>
									<option>Cayman Islands</option>
									<option>Central African Republic</option>
									<option>Chad</option>
									<option>Chile</option>
									<option>China</option>
									<option>Christmas Island</option>
									<option>Cocos (Keeling) Islands</option>
									<option>Colombia</option>
									<option>Comoros</option>
									<option>Congo</option>
									<option>Congo, the Democratic Republic of the</option>
									<option>Cook Islands</option>
									<option>Costa Rica</option>
									<option>Côte d'Ivoire</option>
									<option>Croatia</option>
									<option>Cuba</option>
									<option>Curaçao</option>
									<option>Cyprus</option>
									<option>Czech Republic</option>
									<option>Denmark</option>
									<option>Djibouti</option>
									<option>Dominica</option>
									<option>Dominican Republic</option>
									<option>Ecuador</option>
									<option>Egypt</option>
									<option>El Salvador</option>
									<option>Equatorial Guinea</option>
									<option>Eritrea</option>
									<option>Estonia</option>
									<option>Ethiopia</option>
									<option>Falkland Islands (Malvinas)</option>
									<option>Faroe Islands</option>
									<option>Fiji</option>
									<option>Finland</option>
									<option>France</option>
									<option>French Guiana</option>
									<option>French Polynesia</option>
									<option>French Southern Territories</option>
									<option>Gabon</option>
									<option>Gambia</option>
									<option>Georgia</option>
									<option>Germany</option>
									<option>Ghana</option>
									<option>Gibraltar</option>
									<option>Greece</option>
									<option>Greenland</option>
									<option>Grenada</option>
									<option>Guadeloupe</option>
									<option>Guam</option>
									<option>Guatemala</option>
									<option>Guernsey</option>
									<option>Guinea</option>
									<option>Guinea-Bissau</option>
									<option>Guyana</option>
									<option>Haiti</option>
									<option>Heard Island and McDonald Islands</option>
									<option>Holy See (Vatican City State)</option>
									<option>Honduras</option>
									<option>Hong Kong</option>
									<option>Hungary</option>
									<option>Iceland</option>
									<option>India</option>
									<option>Indonesia</option>
									<option>Iran, Islamic Republic of</option>
									<option>Iraq</option>
									<option>Ireland</option>
									<option>Isle of Man</option>
									<option>Israel</option>
									<option>Italy</option>
									<option>Jamaica</option>
									<option>Japan</option>
									<option>Jersey</option>
									<option>Jordan</option>
									<option>Kazakhstan</option>
									<option>Kenya</option>
									<option>Kiribati</option>
									<option>Korea, Democratic People's Republic of</option>
									<option>Korea, Republic of</option>
									<option>Kuwait</option>
									<option>Kyrgyzstan</option>
									<option>Lao People's Democratic Republic</option>
									<option>Latvia</option>
									<option>Lebanon</option>
									<option>Lesotho</option>
									<option>Liberia</option>
									<option>Libya</option>
									<option>Liechtenstein</option>
									<option>Lithuania</option>
									<option>Luxembourg</option>
									<option>Macao</option>
									<option>Macedonia, the former Yugoslav Republic of</option>
									<option>Madagascar</option>
									<option>Malawi</option>
									<option>Malaysia</option>
									<option>Maldives</option>
									<option>Mali</option>
									<option>Malta</option>
									<option>Marshall Islands</option>
									<option>Martinique</option>
									<option>Mauritania</option>
									<option>Mauritius</option>
									<option>Mayotte</option>
									<option>Mexico</option>
									<option>Micronesia, Federated States of</option>
									<option>Moldova, Republic of</option>
									<option>Monaco</option>
									<option>Mongolia</option>
									<option>Montenegro</option>
									<option>Montserrat</option>
									<option>Morocco</option>
									<option>Mozambique</option>
									<option>Myanmar</option>
									<option>Namibia</option>
									<option>Nauru</option>
									<option>Nepal</option>
									<option>Netherlands</option>
									<option>New Caledonia</option>
									<option>New Zealand</option>
									<option>Nicaragua</option>
									<option>Niger</option>
									<option>Nigeria</option>
									<option>Niue</option>
									<option>Norfolk Island</option>
									<option>Northern Mariana Islands</option>
									<option>Norway</option>
									<option>Oman</option>
									<option>Pakistan</option>
									<option>Palau</option>
									<option>Palestinian Territory, Occupied</option>
									<option>Panama</option>
									<option>Papua New Guinea</option>
									<option>Paraguay</option>
									<option>Peru</option>
									<option>Philippines</option>
									<option>Pitcairn</option>
									<option>Poland</option>
									<option>Portugal</option>
									<option>Puerto Rico</option>
									<option>Qatar</option>
									<option>Réunion</option>
									<option>Romania</option>
									<option>Russian Federation</option>
									<option>Rwanda</option>
									<option>Saint Barthélemy</option>
									<option>Saint Helena, Ascension and Tristan da Cunha</option>
									<option>Saint Kitts and Nevis</option>
									<option>Saint Lucia</option>
									<option>Saint Martin (French part)</option>
									<option>Saint Pierre and Miquelon</option>
									<option>Saint Vincent and the Grenadines</option>
									<option>Samoa</option>
									<option>San Marino</option>
									<option>Sao Tome and Principe</option>
									<option>Saudi Arabia</option>
									<option>Senegal</option>
									<option>Serbia</option>
									<option>Seychelles</option>
									<option>Sierra Leone</option>
									<option>Singapore</option>
									<option>Sint Maarten (Dutch part)</option>
									<option>Slovakia</option>
									<option>Slovenia</option>
									<option>Solomon Islands</option>
									<option>Somalia</option>
									<option>South Africa</option>
									<option>South Georgia and the South Sandwich Islands</option>
									<option>South Sudan</option>
									<option>Spain</option>
									<option>Sri Lanka</option>
									<option>Sudan</option>
									<option>Suriname</option>
									<option>Svalbard and Jan Mayen</option>
									<option>Swaziland</option>
									<option>Sweden</option>
									<option>Switzerland</option>
									<option>Syrian Arab Republic</option>
									<option>Taiwan, Province of China</option>
									<option>Tajikistan</option>
									<option>Tanzania, United Republic of</option>
									<option>Thailand</option>
									<option>Timor-Leste</option>
									<option>Togo</option>
									<option>Tokelau</option>
									<option>Tonga</option>
									<option>Trinidad and Tobago</option>
									<option>Tunisia</option>
									<option>Turkey</option>
									<option>Turkmenistan</option>
									<option>Turks and Caicos Islands</option>
									<option>Tuvalu</option>
									<option>Uganda</option>
									<option>Ukraine</option>
									<option>United Arab Emirates</option>
									<option>United Kingdom</option>
									<option>United States</option>
									<option>United States Minor Outlying Islands</option>
									<option>Uruguay</option>
									<option>Uzbekistan</option>
									<option>Vanuatu</option>
									<option>Venezuela, Bolivarian Republic of</option>
									<option>Viet Nam</option>
									<option>Virgin Islands, British</option>
									<option>Virgin Islands, U.S.</option> 
									<option>Wallis and Futuna</option>
									<option>Western Sahara</option>
									<option>Yemen</option>
									<option>Zambia</option>
									<option>Zimbabwe</option>
								</select>
							</div><br>
							<div class="input-group" id="pincode">
								<input type="number" class="form-control" placeholder="Enter a valid postal code. ex:508451" id="u_pin" name="u_pin" required="required" 
								value="<?php echo isset($_POST["u_pin"]) ? htmlentities($_POST["u_pin"]) : ''; ?>" />
							</div><br>
							<p>By clicking on Signup,you are agreeing to our <a href="" data-toggle="tooltip" title="privacy policy">privacy</a>,
							<a href="" data-toggle="tooltip" title="Terms & conditions"> Terms& conditions</a>,<a href="" data-toggle="tooltip"
							title="Data & cookie policy">Data& cookie policy</a>.</p>
							<center><input type="submit" value="Signup" id="signup" name="sign_up" class="btn btn-info btn-lg" data-toggle="tooltip"
							title="By Clicking on signup you agree to all the above terms."/></center><br>
							<p id="signinlink">Already on ConectYu? 
							<a href="signin" style="text-decoration:none; color:#187AB;" data-toggle="tooltip" title="Signin">Signin here</a></p><br><br>
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
include("includes/connection.php");
	if(isset($_POST['sign_up'])){
		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['f_name']));
		$_SESSION['first_name']=$first_name;
		$last_name = htmlentities(mysqli_real_escape_string($con,$_POST['l_name']));
		$_SESSION['last_name']=$last_name;
		$user_email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
		$_SESSION['user_email']=$user_email;
		$user_pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
		$user_dob = htmlentities(mysqli_real_escape_string($con,$_POST['u_dob']));
		$_SESSION['user_dob']=$user_dob;
		$user_gender = htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
		$_SESSION['user_gender']=$user_gender;
		$user_country = htmlentities(mysqli_real_escape_string($con,$_POST['u_country']));
		$_SESSION['user_country']=$user_country;
		$user_pincode = htmlentities(mysqli_real_escape_string($con,$_POST['u_pin']));
		$_SESSION['user_pincode']=$user_pincode;
		
		
		
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
		}else{
			$user_pass=md5($user_pass);
			$_SESSION['user_pass']=$user_pass;
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
			if($user_gender=="male"){
				$default_prfpic="images/prfpics/maleprfpic.jpg";
			}elseif($user_gender=='female'){
				$default_prfpic="images/prfpics/femaleprfpic.jpg";
			}
		}
		$_SESSION['default_prfpic']=$default_prfpic;
		
		//Checking Country
		if($user_country=="Select your country"){
			$eObj->countryNotValid();
		}
		
		
		//checking Pincode
		if(strlen($user_pincode)!=6){
			$eObj->pinNotValid();
		}
		//inserting data into the database
	/*	$insert_user="insert into users(user_id,user_name,f_name,l_name,user_email,user_pass,user_dob,user_gender,user_country,user_pincode,
		profile_pic,reg_date) values('$user_id','$user_name','$first_name','$last_name','$user_email','$user_pass','$user_dob','$user_gender',
		'$user_country','$user_pincode','$default_prfpic',NOW())";
		
		$run_inser_user=mysqli_query($con,$insert_user);
		if($run_inser_user){
			echo "<script>window.open('signup2.php','_self');</script>";
		}
		else{
			echo "<script>window.open('signup.php','_self');</script>";
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