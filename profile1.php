<?php
session_start();
require 'db.php';
?>


<html>
	
	<head>
		
		<meta charset="utf-8" />
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	
	<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
		
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
<script>
<?php
global $id;
	$id=$_SESSION['user_id'];
 	$result = $mysqli->query("SELECT * FROM users WHERE id='$id'") or die($mysqli->error);

if ( $result->num_rows > 0 ) {
   global $fname1;
global $lname1;
global $email1;
global $address1;
global $phone1;
global $gender1;

   $fname1=$row["first_name"];
$lname1=$row["last_name"];
$email1=$row["email_id"];
$address1=$row["address"];
$phone1=$row["mobile"];
$gender1=$row["gender"];
}
 ?>
 	</script>
 <form action="" method="post">
  <label>First name:</label><input type="text" value="<?php echo $fname1; ?>" name="fname" id="fname" readonly="readonly" />
<label>Last name:</label><input type="text" value="<?php echo $lname1; ?>" name="lname" id="lname" readonly="readonly" />
<label>Email:</label><input type="text" value="<?php echo $email1; ?>" name="email" id="email" readonly="readonly" />
<label>Address:</label><input type="text" name="address" value="<?php echo $address1; ?>" id="address" readonly="readonly" />
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

// $("#update").click(function(){
// 	
	// <?php
	// global $fname;
	// global $lname;
	// global $email;
	// global $address;
	// global $phone;
	// global $gender;
// 	
	// if(isset($_POST['fname']))
	// {
		// $fname=$_POST['fname'];
		// //if(!$fname=$fname1)
		// //{
			// $fname1=$fname;
		// //}
	// }
	// if(isset($_POST['lname']))
	// {
		// $lname=$_POST['lname'];
		// $lname1=$lname;
	// }
	// if(isset($_POST['email']))
	// {
		// $email=$_POST['email'];
		// $email1=$email;
	// }
	// if(isset($_POST['address']))
	// {
		// $address=$_POST['address'];
		// $address1=$address;
	// }
	// if(isset($_POST['phone']))
	// {
		// $phone=$_POST['phone'];
		// $phone1=$phone;
	// }
	// if(isset($_POST['gender']))
	// {
		// $gender=$_POST['gender'];
		// $gender1=$gender;
	// }
// 	
//         
//     
// 
// global $mysqli;
	// $sql1="UPDATE users SET first_name='$fname1',last_name='$lname',email_id='$email',address='$address',mobile='$phone',gender='$gender' where id='$id'";
// if ( $mysqli->query($sql1)){ ?>
// 
// $("#positionWindow").popup("open").show();
// 
// 
// <?php
// }
// else{ $_SESSION['message'] = 'Some error';
      // header("location: error.php"); 
// }
// 
// 	
	// ?>
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