<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Forgot Password-4You </title>
		<meta name="viewport" content="width=device-width",initial-scale=1 />
		<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="js/jquery-1.11.3.min.js"></script>

<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
		</head>
	<body>
		<div data-role="page" id="Forgot">
    
       <div data-role="header">
			<h1>No Worries!!!</h1>	
		</div>
  

   <div data-role="main" class="ui-content">
   	<form action="forgot.php" method="post">
<input type="text" name="emailid" id="text-basic" value="" placeholder="Your email id">
		<button id="home" name="mail" class="ui-btn ui-shadow ui-corner-all">Go to your mail</button>
	
    <a href="index1.html"><button id="home" class="ui-btn ui-shadow ui-corner-all">HOME</button>
	</a>
	</form>	
	 <?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    
    
    if (isset($_POST['mail'])) { 
        
        require 'mail1.php';
        
    }
else {
	 $_SESSION['message'] = 'Something went wrong!';
    header("location: error.php");
}
}
?>
</div>
</body>
</html>

   