
<!DOCTYPE html>
<html>
	<head>
		<title> Confirmation-4You </title>
		<meta name="viewport" content="width=device-width",initial-scale=1 />
		<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="js/jquery-1.11.3.min.js"></script>

<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.js"></script>
		</head>
	<body>
		<div data-role="page" id="Error">
    
			
				<div data-role="header">
				<h1>A small update!!</h1>	
				</div>
   
   <div data-role="main" class="ui-content">


    <p>



<?php
session_start(); 

require_once ('libraries/Google/autoload.php');
require_once ('mirror-quickstart-php-master/google-api-php-client/src/Google_Client.php');
require_once ('mirror-quickstart-php-master/google-api-php-client/src/contrib/Google_Oauth2Service.php');
require 'db.php';



const CLIENT_ID = '1067887529943-1odq7616hvn5dvgh363gqfmb1nd8rkgg.apps.googleusercontent.com';
const CLIENT_SECRET = 'uQHhZOgOjVKcRGfVK5o0HAzT';
const REDIRECT_URI = 'http://localhost:1234/xampp/phptest/Final%20Project/google.php';



 
$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setScopes('email');


$google_oauthV2 = new Google_Oauth2Service($client);

if (isset($_REQUEST['logout'])) {
   session_unset();
}


if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
}


if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
 
$gpUserProfile = $google_oauthV2->userinfo->get();

  $gpUserData = array(
         'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        );
	
$_SESSION['firstname'] = $gpUserData['first_name'];
		 $fname=$_SESSION['firstname'];
		 
		 
		 $_SESSION['lastname'] = $gpUserData['last_name'];
		 $lname=$_SESSION['lastname'];
		  
		 $_SESSION['email']=   $gpUserData['email'];
		 $email=$_SESSION['email'];
		        
		 $_SESSION['gender']= $gpUserData['gender'];
		 $gender=$_SESSION['gender'];
		 
   $result1 = $mysqli->query("SELECT * FROM users WHERE first_name='$fname' and last_name='$lname'") or die($mysqli->error);


if ( $result1->num_rows > 0 ) {
   
    
 header("location: welcome.php");
    
}
else { 

    $sql = "INSERT INTO users (first_name,last_name,email_id,password,mobile,gender) " 
            . "VALUES ('$fname','$lname','$email',null,null,'$gender')";
		 
 header("location: welcome.php");

} 
if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 1;
        $_SESSION['logged_in'] = true;
}
	
  
  
   
  

} else {
  
  $authUrl = $client->createAuthUrl();
}

?>

<div>
    <?php
    
    if (isset($authUrl)) {
    	echo 'We will be collecting basic information from Facebook,Please click on the link to proceed further';
		
        echo "<br><br><a class='login' href='" . $authUrl . "'>Login with Google</a>";
    } 
    ?>
</div>



