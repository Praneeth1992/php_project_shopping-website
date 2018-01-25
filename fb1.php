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
require_once __DIR__ . '/Facebook/autoload.php';
require 'db.php';
$fb = new \Facebook\Facebook([ 
   'app_id' => '491305077890217',
  'app_secret' => 'b6648b406f4de9cf0a0c684ca1b24a49',
  'default_graph_version' => 'v2.10',
  'persistent_data_handler'=>'session'
]);
   $permissions = []; 
   $helper = $fb->getRedirectLoginHelper();
   
   try {
    $accessToken = $helper->getAccessToken();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
  
if (isset($accessToken)) {
	
 		$url = "https://graph.facebook.com/v2.6/me?fields=id,first_name,last_name,gender&access_token={$accessToken}";
$headers = array("Content-type: application/json");
		
			 
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt($ch, CURLOPT_URL, $url);
	         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		 curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		   
		 $st=curl_exec($ch); 
		 $result=json_decode($st,TRUE);
		 
		 $_SESSION['firstname'] = $result['first_name'];
		 $fname=$_SESSION['firstname'];
		 
		 $_SESSION['lastname'] = $result['last_name'];
		 $lname=$_SESSION['lastname'];
		       	        
		 $_SESSION['gender']= $result['gender'];
		 $gender=$_SESSION['gender'];
		 

		 $result1 = $mysqli->query("SELECT * FROM users WHERE first_name='$fname' and last_name='$lname'") or die($mysqli->error);

if ( $result1->num_rows > 0 ) {
   
 header("location: welcome.php");
    
}
else { 

    $sql = "INSERT INTO users (first_name,last_name,email_id,password,mobile,gender) " 
            . "VALUES ('$fname','$lname',null,null,null,'$gender')";
		 
 header("location: welcome.php");

} 
if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 1; 
        $_SESSION['logged_in'] = true; 
}
}
else {

	$loginUrl = $helper->getLoginUrl('http://localhost:1234/xampp/phptest/Final%20Project/fb1.php', $permissions);
	echo 'We will be collecting basic information from Facebook,Please click on the link to proceed further';
	echo '<br><br><a href="' . $loginUrl . '">Login with Facebook</a>';
}



