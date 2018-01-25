<?php
session_start();

include_once 'mirror-quickstart-php-master/google-api-php-client/src/Google_Client.php';
include_once 'mirror-quickstart-php-master/google-api-php-client/src/contrib/Google_Oauth2Service.php';
include_once 'User.php';

$clientId = '1067887529943-1odq7616hvn5dvgh363gqfmb1nd8rkgg.apps.googleusercontent.com';
$clientSecret = 'uQHhZOgOjVKcRGfVK5o0HAzT';
$redirectURL = 'http://localhost:1234/xampp/phptest/Final%20Project/google1.php';

$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
   
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    $gpUserData = array(
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        );
    
    $_SESSION['userData'] = $userData;
   echo $gpUserData['first_name']; 
    
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
?>

<div><?php echo $output; ?></div>


