<?php
include 'config.php';
require "PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php";//PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php";
require "account.php";
//require "class.smtp.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
 $email=$_POST['email'];

 $randsalt=mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

$servername =DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$dbname = DB_DATABASE;
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $stmt = $conn->prepare("SELECT loanid,firstname,email FROM register WHERE email=:ema LIMIT 1");
	   $stmt->bindParam(":ema",$email);
	   $stmt->execute();
	   $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
	  
	   if($res){
	   foreach($res as $row){
	   $pass=crypt($row['email'],$randsalt);
	   $stmt=null;
	   $stmt = $conn->prepare("SELECT id FROM recovery WHERE userid=:uid2");
	   $stmt->bindParam(":uid2",$row['loanid']);
	   $stmt->execute();
	   $temp=$stmt->fetch(PDO::FETCH_ASSOC);
	  
	   if($temp){
	   $stmt = $conn->prepare("DELETE FROM recovery WHERE id=:tmp");
	   $stmt->bindParam(":tmp",$temp['id']);
	   $stmt->execute();
	    
	   
	   }
     	   $stmt = $conn->prepare("INSERT INTO recovery (loanid,username,email,salt) values(:uid,:un,:em,:sa)");
	   $stmt->bindParam(":uid",$row['loanid']);
	   $stmt->bindParam(":un",$row['firstname']);
	   $stmt->bindParam(":sa",$randsalt);
	   $stmt->bindParam(":em",$pass);
	   $stmt->execute();
	   applymail($row['email'],$row['firstname'],$row['loanid'],$pass);	
		echo "<script>alert('An email was sent to have your password reset!');</script>";	
	   }
	   }
	   else{
	   $emailerr="no records found";
	   
	   }
	    $conn=null;
	 
}
catch(PDOException $e){}

}



function applymail($useremail,$name,$id,$enc){
	$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.forshorelending.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'loans@forshorelending.com';                 // SMTP username
$mail->Password = 'Abraham_123';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
//$mail->confirmReadingTo='loans@forshorelending.com';
//$mail->addReplyTo('loans@forshorelending.com','reply');
$mail->setFrom('loans@forshorelending.com', 'forshorelending');
$mail->addAddress($useremail, $name);  
//$mail->addAddress($useremail, $name);  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('a.jpg');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your password reset link';
$mail->Body    = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Forshorelending Password reset</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.forshorelending.com">home page</a>Forshorelending password reset</div><div style="padding:24px; font-size:17px;">Hello '.$name.',<br /><br />Click the link below to reset your password (link valid for one(1) hour):<br /><br /><a href="http://www.forshorelending.com/recover.php?action=recover&id='.base64_encode($id).'&username='.base64_encode($name).'&confirm='.base64_encode($enc).'">Click here to activate your account now</a><br /><br />Login after successful password change using your userid and new password:<br />* loanid: <b>'.$id.'</b></div></body></html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}




	
	
	}



/*
echo $pass;
echo "<br>";
//one way of comparing passwords
if(crypt("keltic19@yahoo.com",$randsalt)==$pass){
	echo $pass;
	echo "<br>";
	echo $be=base64_encode($pass);
	echo "<br>";
	echo base64_decode($be);
	}
if(!function_exists('hash_equals')) {
  function hash_equals($str1, $str2) {
    if(strlen($str1) != strlen($str2)) {
      return false;
    } else {
      $res = $str1 ^ $str2;
      $ret = 0;
      for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
      return !$ret;
    }
  }
}
//second way. note here the user string should be second arg in has equal	
$expected  = crypt('12345', $randsalt);//original password wth salt
$correct   = crypt('12345', $randsalt);//correct password entered, allow entry77777																								
$incorrect = crypt('apple',  $randsalt);//incorrect password

var_dump(hash_equals($expected, $correct));
var_dump(hash_equals($expected, $incorrect));
echo "<br>";
$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),//generate random salt. the options array can then be passed a the 3rd arg to password hash
];	
//passwordhash and password veify are like a pair use to create and verify hashes 
// password_hash ("keltic19@yahoo.com" ,PASSWORD_DEFAULT);
	echo mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
	echo "<br>";
	echo mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
	echo "<br>";
	echo mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
	echo "<br>";
	//echo password_verify($correct,$expected);
	*/
	
?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
fieldset { 
    display: block;
    margin-left: 2px;
    margin-right: 2px;
    padding-top: 0.35em;
    padding-bottom: 0.625em;
    padding-left: 0.75em;
    padding-right: 0.75em;
    border: 2px groove (internal value);
}

	body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
     /* background-color: #318E31/*#8CD08C;*/
      background:url("Forest-Background.jpg");
	  color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #318E31;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #318E31 !important;
      background-color: #fff !important;
  }
  .dropdown-menu li a{
	  color:#318E31 !important;
  }
  .dropdown-menu li a:hover{
	background-color:#318E31 !important;
	color:#fff !important;	
	  
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;	
      animation-duration: 1s;	
      -webkit-animation-duration: 1s;
      visibility: visible;			
  }
  @keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }	
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  legend{color:green;}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #318E31;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#318E31;
}
span i{
    color:#318E31;
}
.headicon{
	color:#0C0;	
	}
	.show{
		display:block;
		
	}
	.hide{
		display:hidden;
		
	}
	.error{
	color:red;	
		
	}

</style>

</head>
<body>
<?php echo $nav;?>
<div class="container-fluid" style="margin-top:150px;">
<div class="row">
<div class="col-sm-4 col-sm-offset-4">
<div class="panel panel-primary">
<div class="panel-heading">Verify email</div>
<div class="panel-body">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<fieldset>
<div class="form-group">

<label>What is your email address</label>
<input name="email" class="form-control" type="text"><span><?php echo $emailerr;?></span>
</div>
<input name="send" class="form-control" value="send" type="submit">


<!--
<label>id</label>
<input name="userid" type="text">
<label>name</label>
<input name="username" type="text">-->

</fieldset>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>