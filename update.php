<?php

session_start();
require 'db.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$id=$_SESSION['user_id'];



$sql1="UPDATE users SET first_name='$fname',last_name='$lname',email_id='$email',address='$address',mobile='$phone',gender='$gender' where id='$id'";
if ( $mysqli->query($sql1)){
$_SESSION['message'] = 'Your details have been updated';
        header("location: success1.php");
   
}
else{
	$_SESSION['message'] = 'Some error!';
        header("location: error.php");
}


?>
