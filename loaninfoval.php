<?php
session_start();
ob_start();
require 'config.php';
error_reporting(0);
$old_error_handler = set_error_handler("userErrorHandler");
//require 'class.smtp.php';
//require 'class.phpmailer.php';
$loanError=array();
$proceed=false;
include_once("PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php");
$check_error;
$loanarr;
if($_SERVER['REQUEST_METHOD']=='POST'){
 
  $loanarr=array();
  $loanarr=$_POST['myo'];
 unset($_POST['myo']);
  
  $count=0;
  foreach($loanarr as $key=>$value){
	$_SESSION[$key]=test_input($value);
	//echo $key;
	//echo $_SESSION[$key];// $count;
	
	  $count++;
	  
  }
		
loaninfovalidator();


exit();
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


function loaninfovalidator(){
	//global $loanError;
	
	$_SESSION['loanErrors']="";
	
	global $loanError;
	$_SESSION['debt_managementErr']=$_SESSION['payday_loansErr']=$_SESSION['own_houseErr']=$_SESSION['when_own_houseErr']=$_SESSION['bankruptcyErr']=$_SESSION['when_bankruptcyErr']=$_SESSION['amount_requestedErr']=$_SESSION['loan_purposeErr']=$_SESSION['loan_termErr']=$_SESSION['secured_collateralErr']=$_SESSION['describe_collateralErr']=$_SESSION['firstnameErr']=$_SESSION['lastnameErr']=$_SESSION['applicant_emailErr']=$_SESSION['applicant_addressErr']=$_SESSION['applicant_cityErr']=$_SESSION['applicant_provinceErr']=$_SESSION['applicant_postal_codeErr']=$_SESSION['applicant_home_phoneErr']=$_SESSION['applicant_cell_phoneErr']=$_SESSION['employed_byErr']=$_SESSION['applicant_positionErr']=$_SESSION['years_employedErr']=$_SESSION['months_employedErr']=$_SESSION['business_addressErr']=$_SESSION['business_cityErr']=$_SESSION['business_provinceErr']=$_SESSION['business_postal_codeErr']=$_SESSION['business_websiteErr']=$_SESSION['relative_nameErr']=$_SESSION['relative_addressErr']=$_SESSION['relative_cityErr']=$_SESSION['relative_relationErr']=$_SESSION['relative_provinceErr']=$_SESSION['relative_phoneErr']="";
	
	
	//$_SESSION['coborr']=empty($_SESSION['coborr']);
	//global$addressError;

 if (empty($_SESSION["debt_management"])) {
    
	$loanError['debt_managementErr']="Please select yes or no";
   } else {
     $_SESSION["debt_management"] = test_input($_SESSION["debt_management"]);
     // check if name only contains letters and whitespace
    
   }
   
    if (empty($_SESSION["payday_loans"])) {
    
	$loanError['payday_loansErr']="Please select yes or no";
   } else {
     $_SESSION["payday_loans"] = test_input($_SESSION["payday_loans"]);
     // check if name only contains letters and whitespace
    
   }
   
   if (empty($_SESSION["own_house"])) {
    
	$loanError['own_houseErr']="Please select yes or no";
   } elseif($_SESSION["own_house"]=="yes") {
	   if(empty($_SESSION['when_own_house'])){
		  $loanError['when_own_houseErr']="Please select a date"; 
		   
	   }
     $_SESSION["own_house"] = test_input($_SESSION["own_house"]);
     // check if name only contains letters and whitespace
    
   }
   
   if (empty($_SESSION["bankruptcy"])) {
    
	$loanError['bankruptcyErr']="Please select yes or no";
   } elseif($_SESSION["bankruptcy"]=="yes") {
	   if(empty($_SESSION['when_bankruptcy'])){
		  $loanError['when_bankruptcyErr']="Please select a date"; 
		   
	   }
     $_SESSION["bankruptcy"] = test_input($_SESSION["bankruptcy"]);
     // check if name only contains letters and whitespace
    
   }
   
   if (empty($_SESSION["secured_collateral"])) {
    
	$loanError['secured_collateralErr']="Please select yes or no";
   } elseif($_SESSION["secured_collateral"]=="yes") {
	   if(empty($_SESSION['describe_collateral'])){
		  $loanError['describe_collateralErr']="Please describe"; 
		   
	   }
     $_SESSION["describe_collateral"] = test_input($_SESSION["describe_collateral"]);
     // check if name only contains letters and whitespace
    
   }
   
   if (empty($_SESSION["amount_requested"])) {
   $loanError['amount_requestedErr'] = "Amount required";
   } else {
    $_SESSION["amonut_requested"] = test_input($_SESSION["amount_requested"]);
     // check if name only contains letters and whitespace
	/* if (!preg_match("[0-9]+(\.[0-9][0-9]?)?",$_SESSION['amount_requested'])) {
     $_SESSION['amount_requestedErr'] = "Only numbers allowed"; 
     }*/
     

   }
   
   if (empty($_SESSION["loan_term"])) {
    
	$loanError['loan_termErr']="Loan term required";
   } else {
     $_SESSION["loan_term"] = test_input($_SESSION["loan_term"]);
     // check if name only contains letters and whitespace
    /* if (!preg_match("^[0-9]+$",$_SESSION['loan_term'])) {
     $_SESSION['loan_termErr'] = "Only numbers allowed"; 
     }*/
   }
   
   
   if (empty($_SESSION["firstname"])) {
    // $_SESSION['firstnameErr'] = "first Name is required";
	 $loanError['firstnameErr']="First Name is required";
   } else {
     $_SESSION["firstname"] = test_input($_SESSION["firstname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION['firstname'])) {
       $loanError['firstnameErr'] = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_SESSION["lastname"])) {
     $loanError['lastnameErr'] = "Last Name is required";
   } else {
    $_SESSION["lastname"] = test_input($_SESSION["lastname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["lastname"])) {
       $loanError['lastnameErr'] = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_SESSION["applicant_address"])) {
    
	$loanError['applicant_addressErr']="Applicant address required";
   } else {
     $_SESSION["applicant_address"] = test_input($_SESSION["applicant_address"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$_SESSION['applicant_address'])) {
      $loanError['applicant_addressErr'] = "Only letters and numbers allowed"; 
     }
   }
   
   if (empty($_SESSION["applicant_city"])) {
   $loanError['applicant_cityErr'] = "Applicant city is required";
   } else {
    $_SESSION["applicant_city"] = test_input($_SESSION["applicant_city"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$_SESSION["applicant_city"])) {
     $loanError['applicant_cityErr'] = "Only letters allowed"; 
     }
   }
   
   if (empty($_SESSION["applicant_postal_code"])) {
    
	$loanError['applicant_postal_codeErr']="Postal code required";
   } else {
     $_SESSION["applicant_postal_code"] = test_input($_SESSION["applicant_postal_code"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z](\s)*[0-9][A-Z][0-9]$/i",$_SESSION['applicant_postal_code'])) {
     $loanError['applicant_postal_codeErr'] = "Only letters and numbers allowed"; 
     }
   }
   
   
   if (empty($_SESSION["applicant_province"])) {
   $loanError['applicant_provinceErr'] = "Province required";
   } else {
     $_SESSION["applicant_province"] = test_input($_SESSION["applicant_province"]);
     
   }
     
    if (empty($_SESSION["applicant_email"])) {
     $loanError['applicant_emailErr'] = "Email is required";
   } else {
     $_SESSION["applicant_email"] = test_input($_SESSION["applicant_email"]);
     // check if e-mail address is well-formed
     if (!filter_var($_SESSION["applicant_email"], FILTER_VALIDATE_EMAIL)) {
      $loanError["applicant_emailErr"] = "Invalid email format"; 
     }
   }
     
     if (empty($_SESSION["applicant_home_phone"])) {
     $loanError['applicant_home_phoneErr'] = "Home phone is required";
   } else {
     $_SESSION['applicant_home_phone']= test_input($_SESSION["applicant_home_phone"]);
     // check if name only contains letters and whitespace
    // if (!preg_match("^[+][0-9]\d{2}-\d{3}-\d{4}$",$_SESSION['applicant_home_phone'])) {
      // $loanError['applicant_home_phoneErr'] = "Only numbers allowed"; 
     //}
   }

	//
	if (empty($_SESSION["relative_name"])) {
    // $_SESSION['firstnameErr'] = "first Name is required";
	 $loanError['relative_nameErr']="Name is required";
   } else {
     $_SESSION["relative_name"] = test_input($_SESSION["relative_name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION['relative_name'])) {
       $loanError['relative_nameErr'] = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_SESSION["relative_relation"])) {
     $loanError['relative_relationErr'] = "Relative relation required";
   } else {
    $_SESSION["relative_relation"] = test_input($_SESSION["relative_relation"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["relative_relation"])) {
       $loanError['relative_relationErr'] = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_SESSION["relative_address"])) {
    
	$loanError['relative_addressErr']="Relative address required";
   } else {
     $_SESSION["relative_address"] = test_input($_SESSION["relative_address"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$_SESSION['relative_address'])) {
      $loanError['relative_addressErr'] = "Only letters and numbers allowed"; 
     }
   }
   
   if (empty($_SESSION["relative_city"])) {
   $loanError['relative_cityErr'] = "Relative city is required";
   } else {
    $_SESSION["relative_city"] = test_input($_SESSION["relative_city"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$_SESSION["relative_city"])) {
     $loanError['relative_cityErr'] = "Only letters allowed"; 
     }
   }
   
      
   if (empty($_SESSION["relative_province"])) {
   $loanError['relative_provinceErr'] = "Province required";
   } else {
     $_SESSION["relative_province"] = test_input($_SESSION["relative_province"]);
     
   }
	
	if (empty($_SESSION["relative_name2"])) {
    // $_SESSION['firstnameErr'] = "first Name is required";
	 $loanError['relative_name2Err']="Name is required";
   } else {
     $_SESSION["relative_name2"] = test_input($_SESSION["relative_name2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION['relative_name2'])) {
       $loanError['relative_name2Err'] = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_SESSION["relative_relation2"])) {
     $loanError['relative_relation2Err'] = "Relative relation is required";
   } else {
    $_SESSION["relative_relation2"] = test_input($_SESSION["relative_relation2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["relative_relation2"])) {
       $loanError['relative_relation2Err'] = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_SESSION["relative_address2"])) {
    
	$loanError['relative_address2Err']="Relative address required";
   } else {
     $_SESSION["relative_address2"] = test_input($_SESSION["relative_address2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$_SESSION['relative_address2'])) {
      $loanError['relative_address2Err'] = "Only letters and numbers allowed"; 
     }
   }
   
   if (empty($_SESSION["relative_city2"])) {
   $loanError['relative_city2Err'] = "Relative city is required";
   } else {
    $_SESSION["relative_city2"] = test_input($_SESSION["relative_city2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-z0-9- ]+$/i",$_SESSION["relative_city2"])) {
     $loanError['relative_city2Err'] = "Only letters allowed"; 
     }
   }
   
      
   if (empty($_SESSION["relative_province2"])) {
   $loanError['relative_province2Err'] = "Province required";
   } else {
     $_SESSION["relative_province2"] = test_input($_SESSION["relative_province2"]);
     
   }
  
	
	if(empty($loanError['debt_managementErr'])&&empty($loanError['payday_loansErr'])&&empty($loanError['own_houseErr'])&&empty($loanError['when_own_houseErr'])&&empty($loanError['bankruptcyErr'])&&empty($loanError['when_bankruptcyErr'])&&empty($loanError['amount_requestedErr'])&&empty($loanError['loan_purposeErr'])&&empty($loanError['loan_termErr'])&&empty($loanError['secured_collateralErr'])&&empty($loanError['describe_collateralErr'])&&empty($loanError['firstnameErr'])&&empty($loanError['lastnameErr'])&&empty($loanError['applicant_emailErr'])&&empty($loanError['applicant_addressErr'])&&empty($loanError['applicant_cityErr'])&&empty($loanError['applicant_provinceErr'])&&empty($loanError['applicant_postal_codeErr'])&&empty($loanError['applicant_home_phoneErr'])&&empty($loanError['applicant_cell_phoneErr'])&&empty($loanError['employed_byErr'])&&empty($loanError['applicant_positionErr'])&&empty($loanError['years_employedErr'])&&empty($loanError['months_employedErr'])&&empty($loanError['business_addressErr'])&&empty($loanError['business_cityErr'])&&empty($loanError['business_provinceErr'])&&empty($loanError['business_postal_codeErr'])&&empty($loanError['business_websiteErr'])&&empty($loanError['relative_nameErr'])&&empty($loanError['relative_addressErr'])&&empty($loanError['relative_cityErr'])&&empty($loanError['relative_relationErr'])&&empty($loanError['relative_provinceErr'])&&empty($loanError['relative_phoneErr'])&&empty($loanError['relative_name2Err'])&&empty($loanError['relative_address2Err'])&&empty($loanError['relative_city2Err'])&&empty($loanError['relative_relation2Err'])&&empty($loanError['relative_province2Err'])){
		
		//include_once 'loanAppController.php';
		global $loanError;
		$loanError['error']=false;
		global $loanarr;
		createLoan($loanarr);


		
		
		
		
		//$check_error=false;
		//global $loanarr;
		//createLoan($loanarr);
		
	}
	else{
		//$addressError=array();
		global $loanError;
		$loanError['error']=true;
		//$check_error=true;
		echo json_encode($loanError);
		
	}

exit();
}





function createLoan($array){
	//print_r($array);
	$servername = DB_HOST;
$username =DB_USER;
$password =DB_PASSWORD;
$dbname =DB_DATABASE;
$res=null;
$out="";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $conn->beginTransaction();
	   $stmt = $conn->prepare("INSERT INTO loanapplication(debt_management,payday_loans,own_house,when_own_house,bankruptcy,when_bankruptcy,amount_requested,loan_purpose,loan_term,secured_collateral,describe_collateral,firstname,lastname,applicant_email,applicant_address,applicant_city,applicant_province,applicant_postal_code,applicant_home_phone,applicant_cell_phone,employed_by,applicant_position,years_employed,months_employed,monthly_salary,business_address,business_city,business_province,business_postal_code,business_phone,business_website,relative_name,relative_relation,relative_address,relative_city,relative_province,relative_phone,relative_name2,relative_relation2,relative_address2,relative_city2,relative_province2,relative_phone2,loan_comment) VALUES(?,?,?,	?,	?,	?,	?,?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?)");
    
		$stmt->bindParam(1,$array['debt_management']);
 $stmt->bindParam(2,$array['payday_loans']);
 $stmt->bindParam(3,$array['own_house']);
$stmt->bindParam(4,$array['when_own_house']);
 $stmt->bindParam(5,$array['bankruptcy']); 
$stmt->bindParam(6,$array['when_bankruptcy']);
 $stmt->bindParam(7,$array['amount_requested']);
 $stmt->bindParam(8,$array['loan_purpose']);
 $stmt->bindParam(9,$array['loan_term']);
 $stmt->bindParam(10,$array['secured_collateral']);
$stmt->bindParam(11,$array['describe_collateral']);
$stmt->bindParam(12,$array['firstname']);
$stmt->bindParam(13,$array['lastname']);
$stmt->bindParam(14,$array['applicant_email']);
$stmt->bindParam(15,$array['applicant_address']);
$stmt->bindParam(16,$array['applicant_city']);
$stmt->bindParam(17,$array['applicant_province']); 
$stmt->bindParam(18,$array['applicant_postal_code']); 
$stmt->bindParam(19,$array['applicant_home_phone']);
$stmt->bindParam(20,$array['applicant_cell_phone']);
$stmt->bindParam(21,$array['employed_by']);
$stmt->bindParam(22,$array['applicant_position']);
$stmt->bindParam(23,$array['years_employed']);
$stmt->bindParam(24,$array['months_employed']);
$stmt->bindParam(25,$array['monthly_salary']);
$stmt->bindParam(26,$array['business_address']);
$stmt->bindParam(27,$array['business_city']);
$stmt->bindParam(28,$array['business_province']);
$stmt->bindParam(29,$array['business_postal_code']);
$stmt->bindParam(30,$array['business_phone']);
$stmt->bindParam(31,$array['business_website']);
$stmt->bindParam(32,$array['relative_name']);
$stmt->bindParam(33,$array['relative_relation']);
$stmt->bindParam(34,$array['relative_address']);
$stmt->bindParam(35,$array['relative_city']);
$stmt->bindParam(36,$array['relative_province']);
$stmt->bindParam(37,$array['relative_phone']);
$stmt->bindParam(38,$array['relative_name2']);
$stmt->bindParam(39,$array['relative_relation2']);
$stmt->bindParam(40,$array['relative_address2']);
$stmt->bindParam(41,$array['relative_city2']);
$stmt->bindParam(42,$array['relative_province2']);
$stmt->bindParam(43,$array['relative_phone2']);
$stmt->bindParam(44,$array['loan_comment']);
	
	/*$count=1;
	foreach($array as $key=>$value){
		
	$stmt->bindParam($count,$value);
	//echo "$count"."   ".$key." => ".$value;
	//echo"<br/>";
	$count=$count+1;
	//echo "$count".$value;
	}*/
    $stmt->execute();
	$record=$conn->lastInsertId();
	$conn->commit();
	if(isset($_SESSION['login_userid']) && isset($_SESSION['login_username'])){
		$aa=$_SESSION['login_userid'];
		$bb=$_SESSION['login_userid'];
		session_unset();
		$_SESSION['login_userid']=$aa;
		$_SESSION['login_userid']=$bb;
		
		
	}
	else{
		
		session_unset();
		
	}
	//this has already returned an array so no need to put in another array
	//of course the while loop can be used on the receiver to output the data
	
	//echo "success insert";
	applymail("loans@forshorelending.com",$array['applicant_email'],$array['firstname'],$record);
		global $loanError;
		$loanError['loanid']=$record;
		//echo json_encode($loanError);
		
		
		//START
		
		
		//END
		
	//}//end inner if

	
	
}
	catch(PDOException $e){
		$conn->rollBack();
		$loanError['error']=true;
		$loanError['message']="We do apologise. Your application could not be submitted. Admin was notified. Please try again.";
		 $dt = date("Y-m-d H:i:s (T)");
		 $mess=$dt."=>".$e;
		error_log($mess, 3, "c:\wamp1\logs\php_error.txt");
		}


$conn=null;	
	echo json_encode($loanError);
	exit();
	
	}
	
	
function applymail($admin,$useremail,$name,$appid){
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
//$mail->addReplyTo('loans@forshorelending.com','reply');
$mail->setFrom('loans@forshorelending.com', 'forshorelending');
$mail->addAddress("loans@forshorelending.com", $name);  
//$mail->addAddress($useremail, $name);  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('a.jpg');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Application was submitted';
$mail->Body    = "An application was submitted. Application id: <b>$appid</b>, customer name: $name";
$mail->AltBody = "An application was submitted. Application id: <b>$appid</b>, customer name: $name";

if(!$mail->send()) {
    
  //   'Message could not be sent.';
  $mail->ErrorInfo;
 $dt = date("Y-m-d H:i:s (T)");
	$mess=$dt."=>"."mail error from loaninfoval.php";
	global $loanError;
	error_log($mess, 3, "c:\wamp1\logs\php_error.txt");
	return;
} else {
   // echo 'Message has been sent';
    
}


	
	
	}	
/*

}*/
?>