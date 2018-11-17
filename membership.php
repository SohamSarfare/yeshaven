<?php
require('src/autoload.php');
 
$siteKey = '6Lcs_GMUAAAAAHf4IgtTEm2dPuOCkXFPpFJihA18';
$secret = '6Lcs_GMUAAAAAOK1oQOKH55vpIIRoh4VOkDccYJ1';
 
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
 
$gRecaptchaResponse = $_POST['g-recaptcha-response']; //google captcha post data
$remoteIp = $_SERVER['REMOTE_ADDR']; //to get user's ip
 
$recaptchaErrors = ''; // blank varible to store error
 
$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp); //method to verify captcha
if ($resp->isSuccess()) {
   // send mail or insert in db or do whatver you wish to
	if(isset($_POST['email'] )){
//	Change your email here
	
		$mailTo = "yesstrathaven@gmail.com";
		$subject = "New Subsciption";
		$body = "New Subscription Info:
<br><br>
EMAIL: ".$_POST['email']."<br>
NAME: ".$_POST['name']."<br>
SURNAME: ".$_POST['surname']."<br>
DATE OF BIRTH: ".POST['dob']."<br>
OCCUPATION: ".$_POST['occupation']."<br>
SPECIAL SKILLS: ".$_POST['skills']."<br>
HOME PHONE NUMBER: ".$_POST['homephone']."<br>
MOBILE PHONE NUMBER: ".$_POST['mobilephone']."<br>
POSTCODE: ".$_POST['postcode']."<br>
HOME ADDRESS: ".$_POST['address']."<br>";	
		
		$headers = "To: <".$mailTo.">\r\n";
		$headers .= "From: ".$_POST['name']." <".$_POST['email'].">\r\n";
		$headers .= "Content-Type: text/html";
		//send email
		$mail_success =  mail($mailTo, utf8_decode($subject), utf8_decode($body), $headers);
	header('Location: membership_pay.html');
	
}
} else {
   $recaptchaErrors = $resp->getErrorCodes(); // set the error in varible
	
}



?>  