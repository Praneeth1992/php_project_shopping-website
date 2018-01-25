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
				<h1>LOGIN</h1>	
				</div>
   
   <div data-role="main" class="ui-content">
   <button style="margin-right: 80px; margin-left: 80px;" class="ui-btn ui-btn-inline ui-shadow ui-corner-all ui-btn-icon-left ui-nodisc-icon ui-icon-facebook">Facebook</button>
	<button id="google" class="ui-btn ui-btn-inline ui-shadow ui-corner-all ui-btn-icon-left ui-nodisc-icon ui-icon-google">Google</button>
	<form action="login.php" method="post">
		
		<input type="text" name="email_id" id="text-basic" value="" placeholder="Your email id">
		<input type="password" name="password" id="password" value="" autocomplete="off" placeholder="Password">
		
<button class="ui-btn ui-corner-all" name="login">Let's Go</button>

		<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    
    
    if (isset($_POST['login'])) { 
        
        require 'logindetails.php';
        
    }
else {
	 $_SESSION['message'] = 'Something went wrong!';
    header("location: error.php");
}
}?>
		</form>
  </div>

			<div data-role="footer" class="mainfoot">
				
			<a id="forgot_link"style="text-decoration:none;color:#ED7A78;"href="forgot.php">FORGOT PASSWORD!</a></br>
			<a class="no_account_link"style="text-decoration:none;color:#ED7A78;"href="registration.php">DON'T HAVE AN ACCOUNT</a>
			
			</div>
			
		</div>
		
		
	</body>
</html>