<?php
require_once('PHPMailer-master/src/PHPMailer.php');
require("PHPMailer-master/src/SMTP.php");
require("PHPMailer-master/src/Exception.php");
require('admin2.php');

$mail = new  PHPMailer\PHPMailer\PHPMailer();

$mail->CharSet =  "utf-8";
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPAuth = true;                  
// GMAIL username
$mail->Username = "testsummed924";
// GMAIL password
$mail->Password = "test@123456";
// $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
 
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com";
// set the SMTP port for the GMAIL server
$mail->Port = 465;
$mail->From='testsummed924@gmail.com';
$mail->FromName='your_name';
$mail->AddAddress('doofyy8@gmail.com', 'kkk');
$mail->Subject  =  'SMTP Mail Testing';
$mail->IsHTML(true);
$mail->Body    = 'Hi there , This is just a testing mail';

var_dump($mail->Send());
die();

if($mail->Send())
	echo "Message was Successfully Send :)";
else
	echo "Mail Error - >".$mail->ErrorInfo;
?>