<?php
// if(!class_exists('PHPMailer')) {
//     // require_once('PHPMailer.php');
// 	// require('SMTP.php');
// 	require('phpautoloader.php');
// }

require_once("mail_configuration.php");
require_once('class.smtp.php');
require_once('class.phpmailer.php');

$mail = new PHPMailer();
$token = hash('sha256',date("Y/m/d"));
require_once 'dbconnect.php';
$update_pwd=mysql_query("UPDATE users set token='$token' where userEmail='$mail1'");
$emailBody = "<div>Hello " . $userinfo['userName'] . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "php-forgot-password-recover-code/reset_password.php?name=" ."MEMBERNAME" . "'>" . PROJECT_HOME . "re_set.php?id=".$userid."&token=" . $token . "</a><br><br></p>Regards,<br> Nymbl.io Team.</div>";

$mail->CharSet =  "utf-8";
$mail->IsSMTP();
// $mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
// $mail->Mailer   = MAILER;

$mail->SetFrom('nymblsupport@nymbl.io', 'your name');
// $mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
// $mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress($mail1, $userinfo['userName']);
$mail->Subject = "Forgot Password Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$error_message = 'Problem in Sending Password Recovery Email';
} else {
	$success_message = 'Please check your email to reset password!';
}



 
    // $mail = new PHPMailer();
    // $mail->CharSet =  "utf-8";
    // $mail->IsSMTP();
    // $mail->SMTPAuth = true;
    // $mail->Username = "nymblsupport@nymbl.io";
    // $mail->Password = "?k#xwFhW,)cb";
    // $mail->SMTPSecure = "ssl";  
    // $mail->Host = "mail.nymbl.io";
    // $mail->Port = "465";
 
    // $mail->setFrom('nymblsupport@nymbl.io', 'your name');
    // $mail->AddAddress('aoto.daiki@yandex.com', 'receivers name');
 
    // $mail->Subject  =  'using PHPMailer';
    // $mail->IsHTML(true);
    // $mail->Body    = 'Hi there ,
    //                     <br />
    //                     this mail was sent using PHPMailer...
    //                     <br />
    //                     cheers... :)';
  
    //  if($mail->Send())
    //  {
    //     echo "Message was Successfully Send :)";
    //  }
    //  else
    //  {
    //     echo "Mail Error - >".$mail->ErrorInfo;
    //  }
?>
