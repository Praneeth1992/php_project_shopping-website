<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Log Out-4You </title>
		<meta name="viewport" content="width=device-width",initial-scale=1 />
		<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="css/main.css">


<script src="js/jquery-1.11.3.min.js"></script>

<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
		</head>
	<body>
		<div data-role="page" id="Error">
    
			
				<div data-role="header">
				<h1>LOG OUT</h1>	
				</div>
   
   <div data-role="main" class="ui-content">
           <?php
			$fname=$_SESSION['firstname'];
			$lname=$_SESSION['lastname'];
			$name=$fname ." " .$lname; 
			?>

    <p>
    	Thank You <?php echo($name); ?> for stopping by, Please visit again!!!
    
    </p>     
    
    <a href="index1.html"><button id="home" class="ui-btn ui-shadow ui-corner-all">HOME</button>
	</a>
	
</div>
</body>
</html>
<?php
session_destroy();
?>
