<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Sign Up-4You </title>
		<meta name="viewport" content="width=device-width",initial-scale=1 />
		<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="css/main.css">
		<script src="js/jquery-1.11.3.min.js"></script>

		<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
	</head>
	<body>
		<div data-role="page" id="Registration">

			<div data-role="header">
				<h1>Sign Up in 4YOU</h1>
			</div>

			<div data-role="main" class="ui-content">
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					if (isset($_POST['register'])) {

						require 'regdetails.php';

					} else {
						$_SESSION['message'] = 'Something went wrong!';
						header("location: error.php");
					}
				}
				?>
				<p  class="easypara">
					For easy Registration!!!
				</p>

				<button style="margin-right: 60px; margin-left: 60px;" class="ui-btn ui-btn-inline ui-shadow ui-corner-all ui-btn-icon-left ui-nodisc-icon ui-icon-facebook">
					Facebook
				</button>
				<button id="google" class="ui-btn ui-btn-inline ui-shadow ui-corner-all ui-btn-icon-left ui-nodisc-icon ui-icon-google">
					Google
				</button>
				<p class="easypara1">
					Or Using with
				</p>
				<form action="registration.php" method="post">

					<input type="text" name="first_name" id="fname" value="" placeholder="Your first name">
					<span id="error1" style="color:red"> </span>
					<input type="text" name="last_name"  id="lname" value="" placeholder="Your last name">
					<span id="error2" style="color:red"> </span>
					<input type="text" name="email_id"  id="email" value="" placeholder="Your email id">
					<span id="error3" style="color:red"> </span>
					<input type="password" name="password" id="password" value="" autocomplete="off" placeholder="Password">
					<span id="error4" style="color:red"> </span>
					<input type="tel" name="mobile" id="tel" value="" placeholder="Your phone number">
					<span id="error5" style="color:red"> </span>
					<fieldset data-role="controlgroup">

						        
						<input type="radio" name="gender" class="gen" id="radio-choice-1" value="Male" >
						        <label for="radio-choice-1">Male</label>
						        
						<input type="radio" name="gender" class="gen" id="radio-choice-2" value="Female">
						        <label for="radio-choice-2">Female</label>
						        
						<input type="radio" name="gender" class="gen" id="radio-choice-3" value="Nope">
						        <label for="radio-choice-3">Not to mention</label>
						       
					</fieldset>
					<span id="error6" style="color:red"> </span>
					<button class="ui-btn ui-corner-all" id="sub" name="register">
						You're Ready
					</button>

				</form>
				<script>
										$(function(){

					$("#error1").hide();
					$("#error2").hide();
					$("#error3").hide();
					$("#error4").hide();
					$("#error5").hide();
					$("#error6").hide();
					var error_fname;
					var error_lname;

					var error_email;
					var error_pass;
					var error_pho;
					var error_gen;

					check_error ();

					function check_error()
					{
					if(error_fname==false && error_lname==false && error_email==false && error_pass==false && error_pho==false && error_gen==false)
					{

					document.getElementById("sub").disabled = false;

					}
					else{
					console.log("Check_error");
					document.getElementById("sub").disabled = true;
					}
					}

					$("#fname").focusout(function(){
					check_fname();
					});
					$("#lname").focusout(function(){
					check_lname();
					});
					$("#email").focusout(function(){

					check_email();
					});
					$("#password").focusout(function(){

					check_pass();
					});
					$("#tel").focusout(function(){

					check_tel();
					});
					$('.gen').click(function(){

					check_gen();
					});

					function check_fname() {
					var name_len = $("#fname").val().length;
					if(name_len<1){
					$("#error1").html("please enter first name");
					$("#error1").show();
					error_fname=true;
					}
					else if (name_len <5 || name_len>20 ) {
					$("#error1").html("please enter between 5 to 20 chars");
					$("#error1").show();
					error_fname=true;
					}
					else{
					$("#error1").hide();
					error_fname=false;
					console.log("check fname: ",error_fname);
					check_error ();
					}}
					function check_lname() {
					var name_len = $("#lname").val().length;
					if(name_len<1){
					$("#error2").html("please enter last name");
					$("#error2").show();
					error_lname=true;
					}
					else if (name_len <5 || name_len>20 ) {
					$("#error2").html("please enter between 5 to 20 chars");
					$("#error2").show();
					error_lname=true;
					}
					else{
					$("#error2").hide();
					error_lname=false;
					console.log("check lname: ",error_lname);
					check_error ();
					}}
					function validate_email() {
					var x = $("#email").val();
					var atpos = x.indexOf("@");
					var dotpos = x.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
					{

					return false;
					}
					else{
					return true;

					}}
					function check_email(){
					var email1= $("#email").val();
					if (email1==""){
					$("#error3").html("please enter email address");
					$("#error3").show();
					error_email=true;

					}

					else if(validate_email()==false)
					{
					$("#error3").html("Invalid email address");
					$("#error3").show();
					error_email=true;

					}
					else{
					$("#error3").hide();
					error_email=false;
					console.log("Check email:",error_email);
					check_error ();
					}
					}
					function check_pass(){
					var add1=$("#password").val();

					if (add1==""){
					$("#error4").html("please enter password");
					$("#error4").show();
					error_pass=true;

					}

					else{
					$("#error4").hide();
					error_pass=false;
					console.log("Check pass:",error_pass);
					check_error ();
					}
					}

					function check_tel() {
					var name_len = $("#tel").val().length;
					if(name_len<10){
					$("#error5").html("please check your number");
					$("#error5").show();
					error_pho=true;
					}

					else{
					$("#error5").hide();
					error_pho=false;
					console.log("check tel: ",error_pho);
					check_error ();
					}}

					function check_gen() {
					var gen=document.getElementsByName('gender');
					if(gen!="")
					{
					error_gen=false;
					$("#error6").hide();
					console.log("check gen: ",error_gen);
					check_error ();
					}
					else{
					$("#error6").html("please select gender");
					$("#error6").show();
					error_gen=true;
					console.log("check gen else: ",error_gen);
					check_error ();
					}}
					check_error();    });
				</script>

			</div>

			<div data-role="footer" class="mainfoot">

				<p class="already_memeber">
					&nbsp;&nbsp;&nbsp;Already a Member?&nbsp;&nbsp;<a style="text-decoration:none;color:#ED7A78;"href="login.php">Login!</a>
				</p>
			</div>

		</div>

	</body>
</html>
