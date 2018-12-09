<?php 
//include "loanAppController.php";
 //	viewAll();
 require 'C:\wamp1\www\PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php';
 require 'C:\Documents and Settings\krishna\Desktop\foreshore\fpdf18\fpdf.php';

/*
class PDF extends FPDF
{
function Header()
{
    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    // Title
    $this->Cell($w,9,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Text color in gray
    $this->SetTextColor(128);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Background color
    $this->SetFillColor(200,220,255);
    // Title
    $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
    // Line break
    $this->Ln(4);
}

function ChapterBody($file)
{
    // Read text file
    $txt = file_get_contents($file);
    // Times 12
    $this->SetFont('Times','',12);
    // Output justified text
    $this->MultiCell(0,5,$txt);
    // Line break
    $this->Ln();
    // Mention in italics
    $this->SetFont('','I');
    $this->Cell(0,5,'(end of excerpt)');
}

function PrintChapter($num, $title, $file)
{
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = '20000 Leagues Under the Seas';
$pdf->SetTitle($title);
$pdf->SetAuthor('Jules Verne');
$pdf->PrintChapter(1,'A RUNAWAY REEF','tryme.txt');
//$pdf->PrintChapter(2,'THE PROS AND CONS','20k_c2.txt');
$pdf->Output();
*/

 
$to="keltic19@yahoo.com";
 $subject="a test";
 $message="the message";
// $additional_parameters='Username:loans@forshorelending.com'."\r\n";
 //$additional_parameters.='Password:Abraham_123'."\r\n";
//echo $ans= mail ( $to ,$subject , $message);

if($_SERVER['REQUEST_METHOD']=='POST'){
	echo $_FILES['up']['type'];
	echo move_uploaded_file($_FILES['up']['tmp_name'],"c:\wamp1\www\'");
	$var=$_POST['firstname'];
	$res=fopen("C:\wamp1\www\forshore\test.doc","w");
	fwrite($res,$var);
	
	}
	
	


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
$mail->addReplyTo('keltic19@yahoo.com','reply');
$mail->setFrom('keltic19@yahoo.com', 'user');
$mail->addAddress('loans@forshorelending.com', 'Joe User');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('doc.pdf');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}




$string=<<<EOT
well well
point one
point two 6559959590+jghjkgh;
.jggfjgfjkfgjkfg
1.hdfhjdfhjdfh
EOT;

echo $string;






?>
<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<input type="file" name="up" />
<input type="text" name="firstname"/>
<input type="image" src="a.jpg" />
</form>
</body>

</html>