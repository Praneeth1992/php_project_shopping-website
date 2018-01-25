<?php

include('session1.php');

$email = $_SESSION['emailid'];
$password = $_SESSION['sec_pass'];
    
$result = $mysqli->query("SELECT * FROM users WHERE email_id='$email' and password='$password'") or die($mysqli->error);

if ( $result->num_rows > 0 ) {
	
	 while($row = $result->fetch_assoc()) {
    
	    $_SESSION['firstname'] = $row["first_name"];
        $_SESSION['lastname'] = $row["last_name"];
		$_SESSION['phone'] = $row["mobile"];
		$_SESSION['gender'] = $row["gender"];
		
		$_SESSION['user_id']=$row["id"];
    }
	  header("location: welcome.php");
    
}
else { 

   echo "<p style='color:red;'>"."Please check out your Username/Password"."</p>";
     
}



?>