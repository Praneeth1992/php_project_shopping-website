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
 <form action="" method="post">
  <label>First name:</label><input type="text" value="<?php echo $_SESSION['lastname'];?>" name="fname" id="fname" readonly="readonly" />
<label>Last name:</label><input type="text" value="<?php echo $_SESSION['lastname'];?>" name="lname" id="lname" readonly="readonly" />
<label>Email:</label><input type="text" value="<?php echo $_SESSION['emailid'];?>" name="email" id="email" readonly="readonly" />
<label>Address:</label><input type="text" name="address" id="address" readonly="readonly" />
<label>Gender:</label><input type="text" name="gender" value="<?php echo $_SESSION['gender'];?>" id="gender" readonly="readonly" />
<label>Phone:</label><input type="text" name="phone" value="<?php echo $_SESSION['phone'];?>" id="phone" readonly="readonly" />

 
 
 
 
   
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

$("#update").click(function(){
	
	<?php
	global $fname,$fname1;
	global $lname,$lname1;
	global $email,$email1;
	global $address,$add1;
	global $phone,$phone1;
	global $gender,$gender1;
	global $id;
	$id=$_SESSION['user_id'];
	if(isset($_POST['fname']))
	{
		$fname=$_POST['fname'];
		if(!empty($fname))
		{
			$fname1=$fname;
		}
	}
	if(isset($_POST['lname']))
	{
		$lname=$_POST['lname'];
	}
	if(isset($_POST['email']))
	{
		$email=$_POST['email'];
	}
	if(isset($_POST['address']))
	{
		$address=$_POST['address'];
	}
	if(isset($_POST['phone']))
	{
		$phone=$_POST['phone'];
	}
	if(isset($_POST['gender']))
	{
		$gender=$_POST['gender'];
	}
	
        
    

global $mysqli;
	$sql1="UPDATE users SET first_name='$fname1',last_name='$lname',email_id='$email',address='$address',mobile='$phone',gender='$gender' where id='$id'";
if ( $mysqli->query($sql1)){ ?>

$("#positionWindow").popup("open");


<?php
}
else{ $_SESSION['message'] = 'Some error';
      header("location: error.php"); 
}

	
	?>
});
   </script>
   <button id="update" type="submit" name="update" class="ui-btn ui-btn-inline ui-corner-all">Update</button>
   <a href="welcome.php" class="ui-btn ui-btn-inline ui-corner-all">Home</a>
</form>
<p id="upd_msg"> </p>
</div>
</div>
</div>
</body>
</html>