<?php
ob_start();
include_once("PHPMailer-master\PHPMailer-master\PHPMailerAutoload.php");
//include_once("class.smtp.php");
//include_once 'class.phpmailer.php';
include 'config.php';
$errors=array();
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['action']) && $_POST['action']=="upload"){
	if(empty($_FILES['upload']['name'])){
		
		$errors['error']='Please select a file to upload';
		echo json_encode($errors);
		
			
		exit();
	}
	$loanid=json_decode($_POST["id"]);
	$dir="user/".$loanid."/contract/";
	$filename=$_FILES['upload']['name'];
	$fnom = explode(".", $filename);
	$fileExt = end($fnom);
	$i=rand(100,100000);
	$location = $dir.$loanid."_".$i.".".$fileExt;
	$type=$_FILES['upload']['type'];
	$size=$_FILES['upload']['size'];
	$servername =DB_HOST;
	$username =DB_USER;
	$password =DB_PASSWORD;
	$dbname =DB_DATABASE;

try {
	$res="";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
	$stmt = $conn->prepare("SELECT * FROM contracts WHERE loanid=:lid");
	$stmt->bindParam(':lid', $loanid);
	$stmt->execute();
	$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
	if($res){
		$errors['error']="A contract already exists for that loan please delete and then add a new one";
		echo json_encode($errors);
		exit();
	}
	$stmt=null;
    $stmt = $conn->prepare("INSERT INTO contracts(loanid,location,type,size) 
    VALUES (:lid, :loc, :ty, :sz)");
    $stmt->bindParam(':lid', $loanid);
    $stmt->bindParam(':loc', $location);
    $stmt->bindParam(':ty', $type);
	$stmt->bindParam(':sz', $size);
    $stmt->execute();
	
	if(!move_uploaded_file($_FILES['upload']['tmp_name'], $location)){
		$errors['error']="Sorry file could not be uploaded";
		
		$stmt = $conn->prepare("DELETE FROM contracts WHERE loanid=:o"); 
		$stmt->bindParam(':o', $loanid);
		$stmt->execute();
		echo json_encode($errors);
		exit();
	}
	
	
	
	
	$errors['success']=true;
	//echo json_encode($errors);
	}
	catch(PDOException $e){
		$errors['error']=$e;
		
		}

$conn=null;

	//$re=urlencode(base64_encode($loanid));
	//echo $errors;
	//header("Location:manageLoanTemplate.php?id=$re");
	echo json_encode($errors);
	//var_dump(debug_backtrace());	
exit();
}
elseif(isset($_POST['action']) && $_POST['action']=="viewcontract"){
	$loanid=json_decode($_POST['id']);
	viewContract($loanid);
	
	
	
	
	
}
elseif(isset($_POST['action']) && ($_POST['action']=="sendcontract")){
	$contractid=json_decode(base64_decode($_POST['contract']));
	sendContract($contractid);
	
	
	
	
	
}
elseif(isset($_POST['action']) && $_POST['action']=="deletecontract"){
	if(isset($_POST['contract'])){
	$conid=json_decode(base64_decode($_POST['contract']));
	
	deleteContract($conid);
	
	exit();
	
	
	
}
	

}

	
	
}



function redirect($url){
$ch = curl_init();

curl_setopt_array(
    $ch, array( 
    CURLOPT_URL => $url,
     CURLOPT_RETURNTRANSFER =>false,         // return web page 
	 CURLOPT_COOKIESESSION=>true,
	 CURLOPT_FORBID_REUSE=>true,
        CURLOPT_HEADER         => false,        // don't return headers 
        CURLOPT_FOLLOWLOCATION => true,         // follow redirects 
        CURLOPT_ENCODING       => "",           // handle all encodings 
       
        CURLOPT_AUTOREFERER    => false,         // set referer on redirect 
        CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect 
        CURLOPT_TIMEOUT        => 120,          // timeout on response 
        CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects 
        CURLOPT_POST            => 0,            // i am sending post data 
             // this are my post $s 
        CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl 
        CURLOPT_SSL_VERIFYPEER => false,        // 
       // CURLOPT_VERBOSE        => 0        
));
// execute
$output = curl_exec($ch);
echo curl_error($ch);

// free
curl_close($ch);		
}


function viewContract($id){
	$errors=array();
	$errors['success']=false;
	$c=$id;
	$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		$res="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT * from contracts WHERE loanid=:b");
			$stmt->bindParam(":b",$c);
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($res){
			
			$out="<h2>Your records</h2><table class='table table-hover table-bordered table-striped'><thead ><tr class='bg-primary'><th>Contract id</th><th>Loan id</th><th>File Location</th><th>File type</th><th>File size</th><th>Date added</th><th>Emailed</th></tr></thead><tbody>";
			foreach($res as $row){
			 $out.= "<tr data-loanid=".$row['loanid']." ><td>"
			 .$row['contractid']."</td><td>"
			 .$row['loanid']."</td><td>"
			 .$row['location']."</td><td>"
			 .$row['type']."</td><td>"
			 .$row['size']."</td><td>".
			 $row['date']."</td><td>".
			  $row['emailed']."</td>";
			 $out.="<td><button class='btn btn-danger' onclick='deletecontract(".json_encode(base64_encode($row['contractid'])).")'>delete contract</button></td>";
			$out.="<td><a href='".$row['location']."'><button>view</button></a></td>";
			$out.="<td><button class='btn btn-success' type='button' onclick='mailcontract(".json_encode(base64_encode($row['contractid'])).")'>email contract</button></td>";
				}
			$out.="</tr></tbody></table>";
			echo $out;
			}
			else{
			echo $out="Sorry no records found.";	
				
			}
			
		
			}
		catch(PDOException $e){
			$errors['error']=$e;
			
		}	
		
		exit();
	
	
	
	
}
function deleteContract($id){
		$errors=array();
	$errors['success']=true;
		$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
    			
			/*
			if(is_file($loc)){
				
			$fp=fopen($loc,"r");
			//echo $files;
			flock($fp, LOCK_EX);
			fclose($fp);
			
			}*/		
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT location FROM contracts WHERE contractid=:a LIMIT 1");
			$stmt->bindParam(":a",$id);
			$stmt->execute();
			$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($res){
				foreach($res as $row){
					unlink($row['location']);
					$stmt=$conn->prepare("DELETE FROM contracts WHERE contractid=:b LIMIT 1");
					$stmt->bindParam(":b",$id);
					$stmt->execute();
				}
				$errors['success']="Contract deleted!";
			}
			
			//$r=base64_encode($id);
			//header("Location:manageLoanTemplate.php?id=$r");
		}
		catch(PDOException $e){
			$errors['error']=$e;
			
		}
	$conn=null;
	echo json_encode($errors);
	exit();
	
	
}


function sendContract($con){
		
		$errors=array();
		$errors['success']=false;
		$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		$row="";
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("SELECT register.loanid,register.firstname,register.email,contracts.location FROM register,contracts WHERE contracts.loanid=register.loanid AND contracts.contractid=:d LIMIT 1");
			$stmt->bindParam(":d",$con);
			$stmt->execute();
			$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($row);
			if($row){
				foreach($row as $res){
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
$mail->addAddress($res['email'], $res['firstname']);  
//$mail->addAddress($useremail, $name);  // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('a.jpg');         // Add attachments
$mail->addAttachment($res['location'], 'Your contract');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your contract.';
$mail->Body    = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Forshorelending customer contract.</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.forshorelending.com">forshorelending</a></div><div style="padding:24px; font-size:17px;">Hello '.$res['firstname'].',<br /><br />Please find attached your contract. Download sign and return via email to the address below:<br /><br /><br />*Email: <b>loans@forshorelending.com</b></div></body></html>';
$mail->AltBody = 'Your contract from forshorelending.';

if(!$mail->send()) {
	$mail->ErrorInfo;
    $errors['error']=$mail;
	$errors['success']=false;
	
	
} else {
	$errors['success']=true;
    updateEmail($con);
				}
				}
			}
			
		}
		catch(PDOException $e){
		$errors['error']= $e;
		}
		echo json_encode($errors);
		exit();
		}		
	

function updateEmail($sid){
	$c=$sid;
	$servername=DB_HOST;
		$dbname=DB_DATABASE;
		$out="";
		try {
			 //$dt = date("Y-m-d H:i:s (T)");
    		$conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASSWORD);
    		// set the PDO error mode to exception
  			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt=$conn->prepare("UPDATE contracts SET emailed=NOW() where contractid=:n");
			$stmt->bindParam(":n",$c);
			//$stmt->bindParam(":d",$dt);
			$stmt->execute();
		}
		catch(PDOException $e){
			
			
		}	
	return;
	
}			

?>