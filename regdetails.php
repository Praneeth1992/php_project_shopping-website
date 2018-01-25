<?php
include('session.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_SESSION['emailid'];
$password = $_POST['password'];
$phone = $_POST['mobile'];

 $gender=$_POST['gender'];   
  
$result = $mysqli->query("SELECT * FROM users WHERE email_id='$email'") or die($mysqli->error);

if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { 
global $mysqli;
    
    $sql = "INSERT INTO users (first_name, last_name, email_id, password, mobile,gender,address) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$phone','$gender','')";


    
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 1; 
        $_SESSION['logged_in'] = true; 
       $_SESSION['message'] = 'Registration Successfull!';
        header("location: success.php");

    }

    

}

?>