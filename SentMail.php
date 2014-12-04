<?php
function SendMail($smtpuser,$smtppwd,$smtpName,$sendtoEmail,$sendtoName,$subject){
	date_default_timezone_set('Asia/Taipei');
	require 'PHPMailer-master/PHPMailerAutoload.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 2;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = $smtpuser."@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = $smtppwd;
	//Set who the message is to be sent from
	$mail->setFrom($smtpuser.'@gmail',$smtpName);
	//Set who the message is to be sent to
	if(count($sendtoEmail)>=1){
		for($i=0;$i<=count($sendtoEmail);$i++){
			$mail->addAddress($sendtoEmail[$i],$sendtoName[$i]);
		}
	}else{
		$mail->addAddress($smtpuser.'@gmail.com',$smtpName);
	}
	//Set the subject line
	$mail->Subject =  "=?UTF-8?B?".base64_encode($subject )."?=";
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a ENL message ';
	//Attach an image file
	//send the message, check for errors
		if (!$mail->send()) {
			return FALSE;
		} else {
			return TRUE;
		}
}
?>