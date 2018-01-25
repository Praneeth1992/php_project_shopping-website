<?php

session_start();
require 'db.php';
?>


<html>
	
	<head>
		
		<meta charset="utf-8" />
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="themes/prod_desc.css" />
        <link rel="stylesheet" href="themes/prod_desc.min.css" />

  		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" /> 
  		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
  		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 

		
	</head>

<body>
  <div data-theme="a" data-role="page" id="pageTwo">
  	<div data-role="header" id="heading">Personal Details</div>
    <div data-role="content" id="header">
    	 <div data-role="main" class="ui-content">
    	 	<button id="edit" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-edit">Edit</button>
 
 <div data-role="popup" id="positionWindow">
<p>Your details have been updated</p>
</div>

<?php

	$id1=$_SESSION['user_id'];
 	$result = $mysqli->query("SELECT * FROM users WHERE id='$id1'") or die($mysqli->error);

if ( $result->num_rows > 0 ) {
  
while($row = $result->fetch_assoc()) {
   $fname1=$row["first_name"];
$lname1=$row["last_name"];
$email1=$row["email_id"];
$address1=$row["address"];
$phone1=$row["mobile"];
$gender1=$row["gender"];
} }
 ?>






 <form action="update.php" method="post">
  <label>First name:</label><input type="text" value="<?php echo $fname1; ?>" name="fname" id="fname" readonly="readonly" />
<label>Last name:</label><input type="text" value="<?php echo $lname1; ?>" name="lname" id="lname" readonly="readonly" />
<label>Email:</label><input type="text" value="<?php echo $email1; ?>" name="email" id="email" readonly="readonly" />
<label>Address:</label><input type="text" name="address" value="<?php echo $address1; ?>"  id="address" readonly="readonly" />
<label>Gender:</label><input type="text" name="gender" value="<?php echo $phone1; ?>" id="gender" readonly="readonly" />
<label>Phone:</label><input type="text" name="phone" value="<?php echo $gender1; ?>" id="phone" readonly="readonly" />

 
 
 
 
   
 <script>
$("#edit").click(function()
{
	document.getElementById("fname").readOnly=false;
	document.getElementById("lname").readOnly=false;
	document.getElementById("email").readOnly=false;
	document.getElementById("address").readOnly=false;
	document.getElementById("gender").readOnly=false;
	document.getElementById("phone").readOnly=false;
	
});


   </script>
   <button id="update" type="submit" name="update" class="ui-btn ui-btn-inline ui-corner-all">Update</button>
   <a href="welcome.php" class="ui-btn ui-btn-inline ui-corner-all">Home</a>
</form>

</div>
</div>
</div>
</body>
</html>