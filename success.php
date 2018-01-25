<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Success-4You </title>
		<meta name="viewport" content="width=device-width",initial-scale=1 />
		<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="js/jquery-1.11.3.min.js"></script>

<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
		</head>
	<body>
		<div data-role="page" id="Error">
    
			
				<div data-role="header">
				<h1>Success</h1>	
				</div>
   
   <div data-role="main" class="ui-content">


    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: index1.html" );
    endif;
    ?>
    </p>     
    <a href="login.php"><button id="home" class="ui-btn ui-shadow ui-corner-all">LOGIN</button>
	</a>
</div>
</body>
</html>

