<?php

$_SESSION['emailid'] = $_POST['emailid'];
$email=$_SESSION['emailid'];
$_SESSION['password'] = $_POST['newpass'];
$password=$_SESSION['password'];
$_SESSION['password1'] = $_POST['newpass1'];
$password1=$_SESSION['password1'];
    

$result = $mysqli->query("UPDATE users SET password='$password' WHERE email_id='$email'") or die($mysqli->error);


if ( $result->num_rows > 0) {
	
	 $_SESSION['message'] = "Please check your Credentials";
     header("location: error.php");
	
    
}
else {
          $_SESSION['message'] = 'Your password has been reset';
     header("location: success.php");
	   
	
	  

    }


?>