<?php
 require 'PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php';
 //echo "here";
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$name=test_input($_POST['name']);
	$email=test_input($_POST['email']);
	$phone=test_input($_POST['phone']);
	$subject=test_input($_POST['subject']);
	$message=test_input($_POST['message']);
	
	$mess=$name."\n".$phone."\n".$message;
	
	
	
	
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.forshorelending.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'loans@forshorelending.com';                 // SMTP username
$mail->Password = 'Abraham_123';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
$mail->confirmReadingTo='loans@forshorelending.com';
$mail->addReplyTo($email,$name);
$mail->setFrom($email,$name);
$mail->addAddress('loans@forshorelending.com', 'Admin');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('doc.pdf');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $mess;
$mail->AltBody = $mess;

if(!$mail->send()) {
   $mess="Message could not be sent.Please try again";
	
	header("Location:contactsuccess.php?message=$mess");
	exit();
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    
	 $mess="Message successfully sent!";
	
	header("Location:contactsuccess.php?message=$mess");
	exit();

}

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>