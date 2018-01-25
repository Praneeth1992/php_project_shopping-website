<html>
	<body>
<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

                             
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;                          
$mail->Username = 'customerserviceby4you@gmail.com';                
$mail->Password = 'ls@2538858';                          
$mail->SMTPSecure = 'tls';                         
$mail->Port = 587;                                  
$_SESSION['emailid'] = $_POST['emailid'];
$email=$_SESSION['emailid'];                                 
$result = $mysqli->query("SELECT * FROM users WHERE email_id='$email'") or die($mysqli->error);

if ( $result->num_rows > 0 ) {
	
	 while($row = $result->fetch_assoc()) {
    
	    $_SESSION['firstname'] = $row["first_name"];
        $_SESSION['lastname'] = $row["last_name"];
    }
	 $name=$_SESSION['firstname'] ." " .$_SESSION['lastname'];
$mail->setFrom('customerserviceby4you@gmail.com', '4YouTeam');
$mail->addAddress($email, $name);    
//$mail->addAddress('ellen@example.com');               
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
 

//$mail->addAttachment('/var/tmp/file.tar.gz');         
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
$mail->isHTML(true);                                  

$mail->Subject = 'Your 4You Account-Verification Link';
$mail->Body    = 'Dear ' .$name .',' .'<br/><br/> Please click on the below link <br/> http://localhost:1234/xampp/phptest/Final%20Project/verify.php
<br/><br/>Thanks,<br/>4You Team';

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	 
}
else{
	 $_SESSION['message'] = 'Please check your mail';
     header("location: error.php");
}
if(!$mail->send()) {
    echo 'Message could not be sent.'.$name;
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
</body>
</html>